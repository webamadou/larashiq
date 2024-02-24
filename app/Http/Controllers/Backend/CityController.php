<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Pole;
use App\Http\Requests\CityRequest;
use App\Models\City;
use App\Models\Country;
use App\Models\Role;
use Exception;
use Faker\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use PharIo\Manifest\Application;

class CityController extends Controller
{
    public function __construct()
    {
        $this->middleware(['role:'.Role::SUPER_ADMIN.'|'.Role::ADMIN]);
    }
    /**
     * Display a listing of the resource.
     * @return Factory|View|Application
     */
    public function index():Factory|View|Application
    {
        return view('bo.cities.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Factory|View|Application
     */
    public function create(): Factory|View|Application
    {
        $city = new City();
        $city->country_id = Country::getSenegal()?->id;
        $countries = Country::orderBy('name')->pluck('name', 'id')->toArray();
        return view('bo.cities.create', compact('city', 'countries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CityRequest $request
     * @return RedirectResponse
     */
    public function store(CityRequest $request): RedirectResponse
    {
        $city = City::create($request->validated());

        return redirect()
            ->route('bo.cities.index')
            ->with('success', __('cities.message_created', ['name' => $city->name]));
    }

    /**
     * Display the specified resource.
     *
     * @param  City  $city
     * @return RedirectResponse
     */
    public function show(City $city): RedirectResponse
    {
        return redirect()->route('bo.cities.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  City  $city
     * @return View
     */
    public function edit(City $city): View
    {
        $countries = Country::orderBy('name')->pluck('name', 'id')->toArray();
        return view('bo.cities.edit', compact('city', 'countries'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  CityRequest  $request
     * @param  City  $city
     * @return RedirectResponse
     */
    public function update(CityRequest $request, City $city): RedirectResponse
    {
        $city->update($request->validated());

        return redirect()
            ->back()
            ->with('success', __('cities.message_update', ['name' => $city->name]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  City  $city
     * @return mixed
     */
    public function destroy(City $city): mixed
    {
        try {
            $city->delete();
        } catch (Exception $e) {
            return redirect()
                ->back()
                ->with('error', __('cities.message_cannot_delete', ['name' => $city->name,]));
        }

        return redirect()
            ->route('bo.cities.index')
            ->with('success', __('cities.message_deleted', ['name' => $city->name,]));
    }

    /**
     * Method is used to build the content of select pole in edit/create form
     * @param Pole|null $pole if set the given pole will be excluded from the query
     * @return array
     */
    private function getCountriesList(): array
    {
        $poles = Country::all();

        $poles = $poles->pluck('name', 'id')->toArray();
        $poles[0] = ' --- ';
        ksort($poles);

        return $poles;
    }
}
