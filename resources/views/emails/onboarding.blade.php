@component('mail::message')
# Dear {{$emailContent['first_name']}},

You are receiving this email because you purchased an Insurance policy with us.<br>
An Account was Automatically created for you;<br><br>
Username: <strong>{{$emailContent['email']}}</strong><br>
Password: <strong>{{$emailContent['password']}}</strong><br><br>
{{ config('app.name') }}<br>
{{ config('app.name') }}<br>
<img src="{{asset('images/logo.png')}}" alt="logo" />
@endcomponent
