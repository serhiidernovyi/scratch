<?php

namespace App\Listeners;

use App\Mail\Forgot;
use App\Events\ForgotEvent;
use Illuminate\Support\Facades\Mail;

class SendForgotEmail
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\ForgotEvent  $event
     * @return void
     */
    public function handle(ForgotEvent $event)
    {
        Mail::to($event->user->email)
            ->queue(new Forgot($event->user, $event->password));
    }
}
