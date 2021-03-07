@component('mail::message')
# Dear Team, 
Below is a Motor Commercial-Fleet Quote Request,

<table style="width: 100%;">
    <tbody>
        <tr>
        <td>Customer's Full Names</td>
        <td>{{$quote->name}}</td>
        </tr>
        <tr>
        <td>Email</td>
        <td>{{$quote->email}}</td>
        </tr>
        <tr>
        <td>Cellphone</td>
        <td>{{$quote->phone}}</td>
        </tr>
        <tr>
        <td>Number of Fleet to insure</td>
        <td>{{$quote->fleet}} Vehicles</td>
        </tr>
        <tr>
        <td>Type of Cover to Quote</td>
        <td>{{trans('plugins/quotation::general.'.$quote->cover_type)}}</td>
        </tr>
        <tr>
        <td>Status</td>
        <td>{{$quote->status_backoffice}}</td>
        </tr>
    </tbody>
</table>
<br>
<br>
<i>This is an automated email, please do not reply</i><br>
<i><strong>With thanks,</strong></i>
<p class="lead">Digital Platform</p>
{{ config('app.name') }}<br>
<img src="{{asset('images/logo.png')}}" alt="logo" />
@endcomponent
