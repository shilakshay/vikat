<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class VerifyAdminEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    public $user;

    public function __construct($user)
    {
        //
        $this->name = $user['name'];
        $this->email = $user['email'];
        $this->token = $user['token'];
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.verifyadmin')->subject('Verify New Admin')->with([
            'name' => $this->name,
            'email' => $this->email,
            'token' => $this->token
        ]);
    }
}
