<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewQuestionnaireMail extends Mailable
{
    use Queueable, SerializesModels;

    public $questionnaire;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($questionnaire)
    {
        $this->questionnaire = $questionnaire;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.new-questionnaire');
    }
}
