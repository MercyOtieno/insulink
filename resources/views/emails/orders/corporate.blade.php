@component('mail::message')
# Welcome, {{$emailContent['first_name']}}

We are more than Happy to have you on board.<br>
Our Customer Care personnel may contact you for further information if required for preparing the quotations.


Thanks,<br>
{{ config('app.name') }}
@endcomponent
