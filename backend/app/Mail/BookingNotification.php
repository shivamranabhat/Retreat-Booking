<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class BookingNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $name;
    public $phone;
    public $email;
    public $tour;
    public $start_date;
    public $companion;
    public $package;
    public $method;
    /**
     * Create a new message instance.
     */
    public function __construct($name,$phone,$email,$tour,$start_date,$companion,$package,$method)
    {
        $this->name = $name;
        $this->phone = $phone;
        $this->email = $email;
        $this->tour = $tour;
        $this->start_date = $start_date;
        $this->companion = $companion;
        $this->package = $package;
        $this->method = $method;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Booking Alert: Have a look for new booking!!',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.booking-notification',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
