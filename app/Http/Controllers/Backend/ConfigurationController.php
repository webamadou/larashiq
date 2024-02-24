<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\ConfigurationRequest;
use App\Models\Configuration;
use App\Models\Role;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\View\View;
use Illuminate\Contracts\Foundation\Application;

class ConfigurationController extends Controller
{
    public $configuration;

    public function __construct()
    {
        $this->middleware(['role:'.Role::SUPER_ADMIN.'|'.Role::ADMIN]);
        $this->configuration = Configuration::first() ?? Configuration::factory()->create();
    }

    public function index()
    {
        return view('bo.configurations.index')
            ->with('configuration', $this->configuration);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(): View|Factory|Application
    {
        $configuration = Configuration::first();
        return view('bo.configurations.edit', compact('configuration'));
    }

    public function update(ConfigurationRequest $request): RedirectResponse
    {
        $this->configuration->update($request->validated());

        return redirect()
            ->back()
            ->with('success', __('Modifications enregistrées'));
    }
}
