@component('mail::message')
<strong>Hi Admin,</strong><br><br>

<p><strong>{{$claim['names']}}</strong> of email address <strong>{{$claim['email']}}</strong> and cellphone number <strong>{{$claim['cellphone']}}</strong>, has filed a claim successfully under claim number <strong>{{$claim['claim_number']}}</strong> for Policy number <strong>{{$claim['policy_number']}}</strong>, under <strong>{{$claim['underwriter']}}</strong></p><br />
<p><strong>Attachments</strong></p>
<p><strong>Police Abstract</strong> <a href="{{URL::to('/')}}/documents/customer/claims/{{$claim['police_abstract']}}" download>Download Police Abstract</a></p>
<p><strong>Logbook</strong> <a href="{{URL::to('/')}}/documents/customer/claims/{{$claim['logbook']}}" download>Download Logbook</a></p>
<p><strong>Driver's License</strong> <a href="{{URL::to('/')}}/documents/customer/claims/{{$claim['driver_license']}}" download>Download Driver's License</a></p><br/>

Regards, <br />

{{ config('app.name') }}
@endcomponent