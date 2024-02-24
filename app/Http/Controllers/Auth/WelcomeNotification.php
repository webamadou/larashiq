<?php

namespace App\Http\Controllers\Auth;

use Spatie\WelcomeNotification\WelcomeNotification as BaseWelcomeNotification;
use Illuminate\Notifications\Messages\MailMessage;

class WelcomeNotification extends BaseWelcomeNotification
{
    public function buildWelcomeNotificationMessage(): MailMessage
    {
        return (new MailMessage)
            ->subject('Welcome to my app')
            ->greeting("Bonjour!\n")
            ->lines([
                "Vous recevez cet e-mail car un compte a été créé pour vous.",
                "Avant de continuer, vous devez créer le mot de passe pour vous authentifier à votre compte"
            ])
            ->action(__('Définir mon mot de passe'), $this->showWelcomeFormUrl);
    }
}
