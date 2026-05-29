<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Modules\Socialevents\Entities\EvenEventTicketClient;

class ConfirmTicketEventMailable extends Mailable
{
    use Queueable, SerializesModels;

    public EvenEventTicketClient $ticket;

    public function __construct(EvenEventTicketClient $ticket)
    {
        $this->ticket = $ticket->loadMissing(['event', 'type']);
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            from: new Address(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME')),
            subject: 'Confirmacion de compra de entrada - ' . env('APP_NAME'),
        );
    }

    public function build()
    {
        return $this->view('emails.confirm-ticket-event', [
            'ticket' => $this->ticket,
        ]);
    }

    public function attachments(): array
    {
        return [];
    }
}
