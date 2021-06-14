<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendClaimAdmin extends Mailable
{
    use Queueable, SerializesModels;
    public $claim;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($claim)
    {
        $this->claim = $claim;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Claim -'. $this->claim['claim_number'])->markdown('emails.claims.admin', ['claim'=> $this->claim]);
    }
}
