<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RequestTeamMember extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;
    public $mailData;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($mailData)
    {
        $this->mailData = $mailData;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        if($this->mailData['usertype'] == 'Buyer') {
            return $this->subject('You’ve been invited to join Scorng as a buyer ' . $this->mailData['invited'])
                ->markdown('Email.RequestTeamMember')
                ->with('mailData', $this->mailData);
        } else {
            return $this->subject('You’ve been invited to join Scorng as a listing agent by ' . $this->mailData['invited'])
                ->markdown('Email.RequestTeamMember')
                ->with('mailData', $this->mailData);
        }

    }
}
