<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class MotorCommercialQuote extends Notification
{
    use Queueable;
    public $fleet;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($fleet)
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
        return (new MailMessage)->markdown('mail.quotes.commercial', ['quote' => $quote])
                ->subject('New Motor ('.trans('plugins/quotation::general.'.$quote['quotation']->cover_type).') Quotation Request');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toDatabase($notifiable)
    {
        return [
            'quotation_id' => $this->fleet->id,
            'cover_type' => trans('plugins/quotation::general.'.$this->fleet->cover_type),
            'requested_date' => $this->fleet->created_at,
            'status' =>$this->fleet->status_backoffice
        ];
    }
}
