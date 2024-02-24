<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\PoleRequest;
use App\Models\Pole;
use App\Models\Role;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class PoleController extends Controller
{
    public function __construct()
    {
        $this->middleware(['role:'.Role::SUPER_ADMIN]);
    }
    /**
     * Display a listing of the resource.
     *
     */
    public function index(): Factory|View|Application
    {
        return view('bo.poles.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Factory|View|Application
     */
    public function create(): Factory|View|Application
    {
        $poles = $this->getPolesList();
        $pole = new Pole();
        return view('bo.poles.create', compact('pole', 'poles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param PoleRequest $request
     *
     * @return RedirectResponse
     */
    public function store(PoleRequest $request): RedirectResponse
    {
        $pole = Pole::create($request->validated());

        return redirect()
            ->route('bo.poles.index')
            ->with('success', __('poles.message_created', ['name' => $pole->name]));
    }

    /**
     * Display the specified resource.
     *
     * @param Pole $pole
     * @return RedirectResponse
     */
    public function show(Pole $pole): RedirectResponse
    {
        // No deed to have a show page
        return redirect()->route('bo.poles.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Pole $pole
     * @return View
     */
    public function edit(Pole $pole): View
    {
        $poles = $this->getPolesList($pole);
        return view('bo.poles.edit', compact('pole', 'poles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param PoleRequest $request
     * @param Pole $pole
     */
    public function update(PoleRequest $request, Pole $pole)
    {
        $pole->update($request->validated());

        return redirect()
            ->back()
            ->with('success', __('poles.message_update', ['name' => $pole->name]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Pole $pole
     * @return mixed
     */
    public function destroy(Pole $pole): mixed
    {
        try {
            $pole->delete();
        } catch (Exception $exception) {
            return redirect()
                ->back()
                ->with('error', __('poles.message_cannot_delete', ['name' => $pole->name]));
        }

        return redirect()
            ->route('bo.poles.index')
            ->with('success', __(
                'poles.message_deleted',
                ['name' => $pole->name,]
            ));
    }

    /**
     * Method is used to build the content of select pole in edit/create form
     * @param Pole|null $pole if set the given pole will be excluded from the query
     * @return array
     */
    private function getPolesList(Pole $pole = null): array
    {
        $poles = Pole::all();
        if ($pole?->id) {
            $poles = $poles->except([$pole->id]);
        }

        $poles = $poles->pluck('name', 'id')->toArray();
        $poles[0] = ' --- ';
        ksort($poles);

        return $poles;
    }
}
