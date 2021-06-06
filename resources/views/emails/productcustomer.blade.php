@component('mail::message')
<strong>Dear {{$details['names']}},</strong><br><br>

<p>We have received your interest in {{$details['product']}} product, our customer care personel will contact you within minutes</p><br />
Regards, <br />

{{ config('app.name') }}
@endcomponent

