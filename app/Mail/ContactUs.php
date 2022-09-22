<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactUs extends Mailable
{
    use Queueable, SerializesModels;

    public $subject;
    public $email;
    public $nama;
    public $pesan;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($subject, $email, $nama, $pesan)
    {
        $this->subject = $subject;
        $this->email = $email;
        $this->nama = $nama;
        $this->pesan = $pesan;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject("Contact Us | " . $this->subject)->view('email.email_contact_us')->with([
            'email' => $this->email,
            'nama' => $this->nama,
            'pesan' => $this->pesan
        ]);
    }
}
