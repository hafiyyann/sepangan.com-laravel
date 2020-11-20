<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SignUpEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
     public function __construct($data)
     {
         $this->email_data = $data;
     }

     /**
      * Build the message.
      *
      * @return $this
      */
     public function build()
     {
         return $this->from(env('MAIL_USERNAME'), 'Sepangan.com_no-reply')->subject("Welcome to Sepangan.com!")->view('auth.email_template', ['email_data' => $this->email_data]);
     }
}
