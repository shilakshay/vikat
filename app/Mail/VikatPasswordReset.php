<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class VikatPasswordReset extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    public $data;

    public function __construct($data)
    {
        $this->email = $data['email'];
        $this->token = $data['token'];
        $this->name = $data['name'];
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.passwordreset')->with([
                        'email' => $this->email,
                        'token' => $this->token,
                        'name' => $this->name
                    ])
                    ->subject('New admin notification');
    }
}
