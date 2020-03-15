@component('mail::message')
# Hello From SMARTI'M Application

Welcome to you Cool application. In this application you will find anything you looking for to be happy!
{{-- 
@component('mail::button', ['url' => ''])
Button Text
@endcomponent --}}

Thanks,<br>
{{ config('app.name') }}
@endcomponent
