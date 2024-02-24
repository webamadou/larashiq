<?php

namespace App\Http\Livewire\Components;

use App\Models\Configuration;
use App\Traits\KaylooAPIV1;
use Illuminate\Support\Facades\App;
use Livewire\Component;

class KaylooActions extends Component
{
    use KaylooAPIV1;

    public bool $updating = false;
    public ?Configuration $callStatus = null;

    public function mount()
    {
        $this->callStatus = Configuration::select('kayloo_api_calls_status', 'latest_kayloo_api_calls')->first();
        // if status = 1 (pending) or status = 2 running we set the updating to true
        $this->updating = $this->callStatus?->kayloo_api_calls_status >= 1;
    }

    public function render()
    {
        return view('livewire.components.kayloo-actions');
    }

    public function callKaylooAPI()
    {
        // We set kayloo API call to pending
        Configuration::get()->map(
            fn ($conf) => $conf->update([
                'kayloo_api_calls_status' => 1,
                'latest_kayloo_api_calls' => \Carbon\Carbon::now(),
            ])
        );
        $this->updating = true;/*
       /* if ($this->callStatus->save()) {
        }*

        return redirect()
            ->back()
            ->with('success', __('properties.api_update_success'));*/
    }
}
