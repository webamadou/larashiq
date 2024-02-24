<?php

namespace App\Http\Controllers;

use App\Models\Acquisition;
use App\Models\Configuration;
use App\Models\Page;
use App\Models\Post;
use App\Models\PropertyType;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Mail;
use App\Models\Property;
use Jenssegers\Agent\Agent;
use Illuminate\Support\Facades\Config;
use Spatie\WelcomeNotification\WelcomeController as BaseWelcomeController;
use Symfony\Component\HttpFoundation\Response;

class WelcomeController extends BaseWelcomeController
{
    public function index()
    {
        $agent = new Agent();
        $duration = Config::get('cache.duration');

        $pinnedProperties = ($agent->isDesktop() || $agent->isTablet())
            ? Cache::remember('pinned_properties', $duration, fn () => Property::has('pin')
                ->select('id', 'name', 'slug', 'nbr_lounge_rooms', 'nbr_bedrooms', 'nbr_kitchens', 'nbr_bathrooms')
                ->get())
            : [];
        $properties = Cache::remember('home_page_properties_listing', $duration, fn () => Property::take(6)->orderBy('id', 'desc')->get());
        $vogueProperties = Cache::remember(
            'home_page_en_vogue_properties',
            $duration,
            fn () => Property::byHighlighted()->select($this->getPropertySelection())->orderBy('id', 'desc')->get()
        );
        $furnishedProperties = Cache::remember(
            'furnished_properties',
            $duration,
            fn () => Property::where('furnished', 2)
                ->orderBy('created_at', 'desc')
                ->select($this->getPropertySelection())
                ->with('country', 'city', 'localisation')
                ->take(6)
                ->get()
        );
        $posts = Cache::remember(
            'home_posts',
            $duration,
            fn () => Post::take(3)->orderBy('updated_at', 'desc')->get()
        );
        $rentingPropTypes = Cache::remember(
            'home_renting_properties',
            $duration,
            fn () => PropertyType::isRoot()
                ->pluck('name', 'id')
                ->filter(fn ($name, $id) => ! in_array($id, [12, 13]))
        );
        $buyingPropTypes = Cache::remember(
            'home_buying_properties',
            $duration,
            fn () => PropertyType::isRoot()->pluck('name', 'id')
        );
        $totalRenting = Cache::remember(
            'home_total_renting',
            $duration,
            fn () => Property::byAcquisition(Acquisition::RENTING)
                ->select($this->getPropertySelection())
                ->count()
        );
        $totalSaling = Cache::remember(
            'home_total_salings',
            $duration,
            fn () => Property::byAcquisition(Acquisition::SALE)
                ->select($this->getPropertySelection())
                ->count()
        );
        $homeStaging = Cache::remember(
            'home_home_staging',
            $duration,
            fn () => Page::where('slug', 'home_staging')->first()
        );
        $program = Cache::remember(
            'home_programs',
            $duration,
            fn () => \App\Models\Program::where('is_active', 1)->orderBy('updated_at')->first()
        );
        $title = "- Page d'accueil";

        return view('home_page')
            ->with('properties', $properties)
            ->with('vogueProperties', $vogueProperties)
            ->with('furnishedProperties', $furnishedProperties)
            ->with('posts', $posts)
            ->with('rentingPropTypes', $rentingPropTypes)
            ->with('buyingPropTypes', $buyingPropTypes)
            ->with('rentings', $totalRenting)
            ->with('salings', $totalSaling)
            ->with('homeStaging', $homeStaging)
            ->with('program', $program)
            ->with('configuration', Configuration::first())
            ->with('pinnedProperties', $pinnedProperties)
            ->with('title', $title);
    }

    public function createMeeting()
    {
        $property = Cache::remember(
            'create_meeting_property',
            Config::get('cache.duration'),
            fn () => Property::find(1)
        );
        $title = " - Prendre rendez-vous";
        return view('meeting', compact('property', 'title'));
    }

    public function sendPasswordSavedResponse(): Response
    {
        $title = "- Mot de passe";
        return redirect()->route('home')->with('title', $title);
    }

    public function webhook()
    {
        $details = [
            'title' => 'Mail from ItSolutionStuff.com',
            'body' => 'This is for testing email using smtp'
        ];
        Mail::to('paab26@gmail.com')->send(new \App\Mail\TestMail($details));
        dd("Email is Sent.");
    }

    public function seeProgram(\App\Models\Program $program)
    {
        $title = "- Programme $program?->name";
        return view('showProgram', compact('program', 'title'));
    }

    public function page($slug)
    {
        return 'page here';
    }

    private function getPropertySelection(): array
    {
        return [
            'id',
            'name',
            'slug',
            'nbr_lounge_rooms',
            'nbr_bedrooms',
            'nbr_kitchens',
            'nbr_bathrooms',
            'city_id',
            'country_id',
            'localisation_id',
            'acquisition_type'
        ] ;
    }
}
