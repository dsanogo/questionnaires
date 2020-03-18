@component('mail::message')
# New Questionnaire Created

Hey a new Questionnaire has just been created.
Kindly review it and take it asap please.

<div>
    <div>
        <strong>Questionnaire: </strong> {{ $questionnaire->title }}
    </div>
    <div>
        <strong>Purpose:</strong> {{ $questionnaire->purpose }}
    </div>
</div>
Thanks,<br>
{{ config('app.name') }}
@endcomponent
