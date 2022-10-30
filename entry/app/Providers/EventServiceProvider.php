<?php

namespace App\Providers;


use App\Events\ForgotEvent;
use App\Listeners\SendForgotEmail;
use Illuminate\Auth\Events\Registered;
use App\Listeners\SendVerificationEmail;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendVerificationEmail::class,
        ],
        ForgotEvent::class => [
            SendForgotEmail::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();
    }
}
