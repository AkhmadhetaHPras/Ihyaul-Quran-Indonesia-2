<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class InfaqInstruction extends Mailable
{
    use Queueable, SerializesModels;

    public $nama;
    public $nominal;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($nama, $nominal)
    {
        $this->nama = $nama;
        $this->nominal = $nominal;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject("Instruksi Infaq")->view('email.instruction_payment')->with([
            'nama' => $this->nama,
            'nominal' => $this->nominal
        ]);
    }
}
