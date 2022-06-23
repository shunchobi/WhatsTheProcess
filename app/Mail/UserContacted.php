<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class UserContacted extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
        ->from('test@laravel.com')
        ->to('kondo@qumu.co.jp')
        ->subject('test mailing')
        ->view('mails.mail');   

        // ->text('mails.mail')
        // ->with([
        //     'text' => '本文',
        //   ]);
    }
}
