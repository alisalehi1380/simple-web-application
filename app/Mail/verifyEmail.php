<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class verifyEmail extends Mailable
{
    use Queueable, SerializesModels;


    protected $first_name;
    protected $activation_token;

    public function __construct(User $user)
    {
        $this->first_name = $user->first_name;
        $this->activation_token = $user->activation_token;
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            subject: 'تایید ثبت نام در سایت بایک',
        );
    }

    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    public function content()
    {
        return new Content(
            view: 'email.userSignup',
            with: [
                'first_name'       => $this->first_name,
                'activation_token' => $this->activation_token
            ]
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    public function attachments()
    {
        return [];
    }
}
