<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class InquiryNotification extends Mailable
{
    use Queueable,SerializesModels;
    public $name;
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
    public function __construct($name,$category_name,$package_name,$start_date,$end_date,$location_name,$people,$room_name)
    {
        $this->name = $name;
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
            subject: 'Your Inquiry at Yoga Holiday',
        );
    }

    /**
     * Get the message content definition.
     */
    public function build()
    {
        return $this->view('emails.inquiry')->with([
            'name' => $this->name,
            'category_name' => $this->category_name,
            'package_name' => $this->package_name,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'location_name' => $this->location_name,
            'people' => $this->people,
            'room_name' => $this->room_name,
        ]);
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
