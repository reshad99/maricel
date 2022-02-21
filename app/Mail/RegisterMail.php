<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RegisterMail extends Mailable
{
    use Queueable, SerializesModels;
    protected $name;
    protected $email;
    protected $phone;
    protected $card_name;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name, $phone, $email, $card_name)
    {
        $this->name = $name;
        $this->email = $email;
        $this->phone = $phone;
        $this->card_name = $card_name;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('front.emails.register')
        ->with([
            'name' => $this->name,
            'phone' => $this->phone,
            'email' => $this->email,
            'card_name' => $this->card_name,
        ])->subject('Maricel Qeydiyyat');
    }
}
