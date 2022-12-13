<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class AppointmentMailable extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    protected $firstName, $lastName, $schedule, $refNum;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($firstName, $lastName, $schedule, $refNum)
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->schedule = $schedule;
        $this->refNum = $refNum;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $subject = "Appointment Confirmation";
        return $this->subject($subject)
                    ->view('emails.confirmMail')
                    ->with([
                        'firstName' => $this->firstName,
                        'lastName' => $this->lastName,
                        'schedule' => $this->schedule,
                        'refNum' => $this->refNum
                    ]);
    }
}
