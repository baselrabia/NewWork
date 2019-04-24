<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Cartalyst\Sentinel\Users\EloquentUser;
use Cartalyst\Sentinel\Activations\EloquentActivation;

class Activation extends Mailable
{
    use Queueable, SerializesModels;
    public $user,$token;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(EloquentUser $user,EloquentActivation $token)
    {
        $this->user = $user;
        $this->token = $token->code;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
         return $this->subject('verify')
                    ->markdown('emails.activation');
    }
}
