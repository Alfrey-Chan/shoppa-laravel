<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use App\Models\RequestSubmission;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Contracts\Queue\ShouldQueue;

class RequestSubmissionMail extends Mailable
{
    use Queueable, SerializesModels;

    public $requestSubmission;

    /**
     * Create a new message instance.
     */
    public function __construct(RequestSubmission $requestSubmission)
    {
        $this->requestSubmission = $requestSubmission;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Order Request Received',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.request-submission',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {   
        $attachments = [];

        foreach ($this->requestSubmission->images as $image) {
            $attachments[] = Attachment::fromStorageDisk('public', $image->image_path)
                ->as($image->original_name);
        }
        return $attachments;
    }
}
