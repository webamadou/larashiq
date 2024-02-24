<?php

namespace App\Providers;

use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Lang;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        VerifyEmail::toMailUsing(function (object $notifiable, string $url) {
            return (new MailMessage)
                ->subject(__('front.email_verification_subject'))
                ->greeting('Merci de votre confiance!')
                ->line(__('front.email_verification_content'))
                ->action(__('front.email_verification_btn'), $url);
        });

        ResetPassword::toMailUsing(function (object $notifiable, string $token) {
            $url = route('password.reset', $token).'?email='.$notifiable->getEmailForPasswordReset();
            return (new MailMessage)
                ->subject(__('front.email_reset_pwd_subject'))
                ->line(__('front.email_reset_pwd_line1'))
                ->action(__('front.email_reset_pwd_btn'), $url)
                ->line(
                    __(
                        'front.email_reset_pwd_line2',
                        ['count' => config('auth.passwords.'.config('auth.defaults.passwords').'.expire')]
                    )
                )
                ->line(__('front.email_reset_pwd_line3'));
        });
    }
}
