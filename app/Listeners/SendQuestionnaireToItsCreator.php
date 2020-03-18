<?php

namespace App\Listeners;

use App\Events\NewQuestionnaireCreatedEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendQuestionnaireToItsCreator implements ShouldQueue
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  NewQuestionnaireCreatedEvent  $event
     * @return void
     */
    public function handle(NewQuestionnaireCreatedEvent $event)
    {
        //
    }
}
