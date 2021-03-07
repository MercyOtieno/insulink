@component('mail::message')
# Dear Team, below is a Travel Quote Request from <strong>{{$quote->names}}</strong>,

<table style="width: 100%" border="1">
    <tbody>
        <tr>
            <td>Full Names</td>
            <td>{{$quote->names}}</td>
        </tr>
        <tr>
        <td>Email</td>
        <td>{{$quote->email}}</td>
        </tr>
        <tr>
        <td>Cellphone</td>
        <td>{{$quote->cellphone}}</td>
        </tr>
        <tr>
        <td>Age</td>
        <td>{{$quote->age}} years old</td>
        </tr>
        <tr>
        <td>Purpose of Travel</td>
        @if ($quote->purpose =='holiday-business')
        <td>This is a Holiday or Business trip</td>
        @else
        <td>This is an Education trip</td>
        @endif
        </tr>
        <tr>
        <td>Destination</td>
        <td>{{$quote->destination}}</td>
        </tr>
        <tr>
        <td>Travelling From</td>
        <td>{{\Carbon\Carbon::parse($quote->travel_duration_from)->format('d/M/Y')}}</td>
        </tr>
        <tr>
        <td>Travelling To</td>
        <td>{{\Carbon\Carbon::parse($quote->travel_duration_to)->format('d/M/Y')}}</td>
        </tr>
        <tr>
        <td>Travellers</td>
        @if ($quote->travellers =='me-spouse')
        <td>its just me or someone else</td>
        @elseif($quote->travellers =='couple')
        <td>I am travelling with my Spouse</td>
        @elseif($quote->travellers =='family')
        <td>I am travelling with my Spouse and our child(ren)</td>
        @elseif($quote->travellers =='me-spouse-children')
        <td>I am travelling with child(ren) or My Spouse is travelling with child(ren)</td>
        @endif
        </tr>
    </tbody>
</table>
<br>
<br>
<i>This is an automated email, please do not reply</i><br>
<i><strong>With thanks,</strong></i><br>
<br>
<p class="lead">Digital Platform</p>
{{ config('app.name') }}<br>
<img src="{{asset('images/logo.png')}}" alt="logo" />
@endcomponent