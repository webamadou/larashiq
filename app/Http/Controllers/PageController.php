<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Support\Facades\View as ViewFacades;

class PageController extends Controller
{
    public function show(Page $page)
    {
        $title = " - $page->name";
        $shareButtons =     $this->renderShareButtonsPartial($page);
        return view('showPage', compact('page', 'title', 'shareButtons'));
    }

    public function indexCategory($category_slug)
    {
    }

    public function renderShareButtonsPartial(Page $page): string
    {
        $shareButtons = \Share::page(
            route('see-page', $page->slug),
            $page->name,
        )
            ->facebook()
            ->twitter()
            ->linkedin()
            ->whatsapp()
            /*->telegram()
            ->reddit()*/
            ->getRawLinks();

        return ViewFacades::make('partials.social-medias-share', ['shareButtons' => $shareButtons])->render();
    }
}
