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
    public $status;
    public $category_name;
    public $package_name;
    public $start_date;
    public $end_date;
    public $location_name;
    public $people;
    public $room_name;


    /**
     * Create a new message instance.
     */
    public function __construct($name,$status,$category_name,$package_name,$start_date,$end_date,$location_name,$people,$room_name)
    {
        $this->name = $name;
        $this->status = $status;
        $this->category_name = $category_name;
        $this->package_name = $package_name;
        $this->start_date = $start_date;
        $this->end_date = $end_date;
        $this->location_name = $location_name;
        $this->people = $people;
        $this->room_name = $room_name;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Booking Alert: Have a look of your booking!!',
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
