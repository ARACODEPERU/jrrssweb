<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Address;
use Modules\Socialevents\Entities\EvenEvent;

class ConfirmTicketEventMailable extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            from: new Address(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME')),
            subject: env('APP_NAME').' - Confirmación de compra de ticket a evento',
        );
    }

    public function build()
    {
        $event =  EvenEvent::find($this->data['event_id']);
        return $this->view('layouts.email_gratitude', [
            'data' => $this->data,
            'event' => $event
        ]);
    }

    /**
     * Get the message content definition.
     */
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
