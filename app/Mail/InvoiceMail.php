<?php

namespace App\Mail;

use App\Models\Invoice;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class InvoiceMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    protected Invoice $invoice;
    public $url, $pdf;

    public function __construct($invoice,$pdf, $url)
    
    {
        //
        $this->invoice = $invoice;
        $this->url = $url;
        $this->pdf = $pdf;
        
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Invoice Mail',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            markdown:'invoice.email',
            with:[
                'url'=>$this->url,
                'invoice'=> $this->invoice,
            ],
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        //$pdfString = $this->pdf->saveHTML();
        return [
            Attachment::fromData(fn () => $this->pdf->output(), 'invoice.pdf')
                    ->withMime('application/pdf'),
        ];
    }
}
