<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class HealthQuotation extends Notification
{
    use Queueable;
    public $quotation;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(array $quotation = array())
    {
        $this->quotation = $quotation;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $quote = $this->quotation;
        return (new MailMessage())->cc('info@insulink.co.ke')->cc($quote['quotation']->products->underwriters->email)->bcc("dsccreatives@gmail.com")->markdown('emails.health', ['quote' => $quote])
                ->subject('New Health ('.trans('plugins/quotation::general.'.$quote['quotation']->cover_type).') Quotation');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
