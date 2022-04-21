<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ResetPasswordMail extends Mailable
{
    use Queueable, SerializesModels;
    private $email;
    private $token;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($email, $token)
    {
        $this->email = $email;
        $this->token = $token;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $userId = User::where('email', $this->email)->first()->id;
        $data = [
            "url" => "http://127.0.0.1:8000/forgot_password/change_password?userid=".$userId."&token=".$this->token,
            "username" => User::where('email', $this->email)->first()->name
        ];
        return $this->from(env("MAIL_FROM_ADDRESS"))
                    ->markdown('emails.reset_password_mail')
                    ->with($data);
    }
}
