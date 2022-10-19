<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Forgot extends Mailable implements ShouldQueue
{
    use Queueable;
    use SerializesModels;

    public User $user;
    public string $password;
    public string $from_address;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user, string $password)
    {
        $this->from_address = config('mail.from.address');
        $this->password = $password;
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from($this->from_address)->markdown('emails.reset-email');
    }
}
