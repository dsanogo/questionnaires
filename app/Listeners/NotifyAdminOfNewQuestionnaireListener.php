<?php

namespace App\Listeners;

use App\Mail\NewQuestionnaireMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class NotifyAdminOfNewQuestionnaireListener implements ShouldQueue
{
    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        Mail::to('admin@admin.com')->send(new NewQuestionnaireMail($event->questionnaire));
    }
}
