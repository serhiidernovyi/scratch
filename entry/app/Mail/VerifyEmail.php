<?php

declare(strict_types=1);

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Support\Facades\URL;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class VerifyEmail extends Mailable implements ShouldQueue
{
    use Queueable;
    use SerializesModels;

    public User $user;
    public string $url;
    public string $from_address;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user)
    {
        $this->from_address = config('mail.from.address');
        $this->user = $user;
        $this->url = URL::signedRoute(
            'verification.verify',
            ['id' => $user->id]
        );
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from($this->from_address)->markdown('emails.verify-email');
    }
}
