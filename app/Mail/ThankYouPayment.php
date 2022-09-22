<?php

/**
 * Putting this here to help remind you where this came from.
 *
 * I'll get back to improving this and adding more as time permits
 * if you need some help feel free to drop me a line.
 *
 * * Twenty-Years Experience
 * * PHP, JavaScript, Laravel, MySQL, Java, Python and so many more!
 *
 *
 * @author  Simple-Pleb <plebeian.tribune@protonmail.com>
 * @website https://www.simple-pleb.com
 * @source https://github.com/simplepleb/laravel-email-templates
 *
 * @license Free to do as you please
 *
 * @since 1.0
 *
 */

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ThankYouPayment extends Mailable
{
    use Queueable, SerializesModels;

    public $name;
    public $infaq;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name, $infaq)
    {
        $this->name = $name;
        $this->infaq = $infaq;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject("Terima Kasih")->view('email.thank_you_payment')->with([
            'name' => $this->name,
            'infaq' => $this->infaq,
        ]);
    }
}
