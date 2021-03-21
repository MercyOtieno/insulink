<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Notifications\Messages\MailMessage;

class HealthQuotation extends Mailable
{
    use Queueable, SerializesModels;
    public $quotation;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(array $quotation = array())
    {
        $this->quotation = $quotation;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $quote = $this->quotation;
        return (new MailMessage())->bcc("dsccreatives@gmail.com")->markdown('emails.health', ['quote' => $quote])
                ->subject('New Motor ('.trans('plugins/quotation::general.'.$quote['quotation']->cover_type).') Health Quotation');
    }
}
