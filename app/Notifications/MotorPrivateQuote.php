<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class MotorPrivateQuote extends Notification
{
    use Queueable;
    public $fleet;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(array $fleet = array())
    {
        $this->fleet = $fleet;
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
        $quote = $this->fleet;
        return (new MailMessage())->cc($quote['quotation']->products->underwriters->email)->bcc("dsccreatives@gmail.com")->markdown('mail.quotes.privatecommercial', ['quote' => $quote])
                ->subject('New Motor ('.trans('plugins/quotation::general.'.$quote['quotation']->cover_type).') Quotation Purchase | '. $quote['vehicle']->registration);
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
