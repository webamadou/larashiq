<?php

namespace App\Http\Livewire;

use Illuminate\Validation\Rule;
use Livewire\Component;
use App\Models\NewsLetter;
use Illuminate\Validation\ValidationException;

class SubscribeNewsLetter extends Component
{
    public bool $isSaved = false;
    public string $email = '';

    public function handleSubmit()
    {
        $data = $this->validate(
            [
                'email' => 'required|email',
            ]
        );

        if (NewsLetter::firstOrCreate($data)) {
            $this->isSaved = true;
        }
    }

    public function render()
    {
        return view('livewire.subscribe-news-letter');
    }
}
