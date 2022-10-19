<?php

namespace App\Listeners;

use App\Mail\VerifyEmail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Auth\Events\Registered;

class SendVerificationEmail
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
     * @param Registered $event
     *
     * @return void
     */
    public function handle(Registered $event)
    {
        Mail::to($event->user->email)
            ->queue(new VerifyEmail($event->user));
    }
}
