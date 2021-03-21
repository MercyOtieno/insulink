@component('mail::message')
# Dear Team, 
Below is a New Motor {{trans('plugins/quotation::general.'.$quote['quotation']->cover_type)}} Quotation | {{$quote['vehicle']->registration}},<br><br>
Quotation number <strong>{{$quote['quotation']->quotation_number}}</strong><br>
<table style="width: 100%;">
    <tbody>
        <tr>
        <td>Customer's Full Names</td>
        <td>{{$quote['vehicle']->customer->users->first_name .' '. $quote['vehicle']->customer->users->last_name}}</td>
        </tr>
        <tr>
        <td>Email</td>
        <td>{{$quote['vehicle']->customer->email}}</td>
        </tr>
        <tr>
        <td>Cellphone</td>
        <td>{{$quote['vehicle']->customer->cellphone}}</td>
        </tr>
        <tr>
        <td>Vehicle Registration</td>
        <td>{{$quote['vehicle']->registration}}</td>
        </tr>
        <tr>
        <td>Vehicle to Insure - Make & Model</td>
        <td>{{$quote['vehicle']->make_model}}</td>
        </tr>
        <tr>
        <td>Year of Manufacture</td>
        <td>{{$quote['vehicle']->year_manufacture}}</td>
        </tr>
        <tr>
        <td>Vehicle Value</td>
        <td>Kes {{number_format($quote['vehicle']->value_of_vehicle, 2)}}</td>
        </tr>
        <tr>
        <td>Engine Number</td>
        <td>{{$quote['vehicle']->engine_no}}</td>
        </tr>
        <tr>
        <td>Chasis Number</td>
        <td>{{$quote['vehicle']->chasis_no}}</td>
        </tr>
        <tr>
        <td>Type of Cover i want</td>
        <td>{{trans('plugins/quotation::general.'.$quote['quotation']->cover_type)}}</td>
        </tr>
        <tr>
        <td>Prefered Underwriter</td>
        <td>{{$quote['quotation']->products->underwriters->company}}</td>
        </tr>
        <tr>
        <td><strong>Benefits Added</strong><br>Loss of Use</td>
        <td>@if ($quote['quotation']->loss_use)
            {{$quote['quotation']->loss_use}}
            @else
            Not added!
            @endif
        </td>
        </tr>
        <tr>
        <td>Political, Violence & Terrorism</td>
        <td>@if ($quote['quotation']->pvt)
            {{$quote['quotation']->pvt}}
        @else
            Not added!
        @endif
        </td>
        </tr>
        <tr>
        <td>Excess Protector</td>
        <td>@if ($quote['quotation']->excess_protector)
            {{$quote['quotation']->excess_protector}}
            @else
            Not added!
            @endif
        </td>
        </tr>
        <tr>
        <td>Road Rescue</td>
        <td>@if ($quote['quotation']->road_rescue)
            {{$quote['quotation']->road_rescue}}
            @else
            Not added!
            @endif
        </td>
        </tr>
        <tr>
        <td>Policy Start Date</td>
        <td>{{\Carbon\Carbon::parse($quote['payment']->policy_start_date)->format('d/M/Y')}}</td>
        </tr>
        <tr>
        <td>Mpesa Transaction code</td>
        <td>{{$quote['payment']->transaction_code}}</td>
        </tr>
        <tr>
        <td>Premium Amount</td>
        <td>Kes {{number_format($quote['quotation']->total_price, 2)}}</td>
        </tr>
        <tr>
        <td>Customer National ID</td>
        <td>{{$quote['vehicle']->customer->document_number}}</td>
        <td>@component('mail::button', ['url' => config('app.url').'/documents/customer/'.$quote['kyc']->copy_id])
            view image @endcomponent</td>
        </tr>
        <tr>
        <td>KRA PIN</td>
        <td>{{$quote['vehicle']->customer->kra_number}}</td>
        <td>@component('mail::button', ['url' => config('app.url').'/documents/customer/'.$quote['kyc']->copy_kra_certificate])
            view image @endcomponent</td>
        </tr>
        <tr>
        <td>Log Book</td>
        <td>@component('mail::button', ['url' => config('app.url').'/documents/customer/'.$quote['kyc']->logbook])
                view image @endcomponent</td>
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
