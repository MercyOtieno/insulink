@component('mail::message')
<strong>Dear {{$claim['names']}},</strong><br><br>

<p>We have received your Claim under claim number <strong>{{$claim['claim_number']}}</strong>,<br />we shall contact you soon </p><br />
Regards, <br />

{{ config('app.name') }}
@endcomponent