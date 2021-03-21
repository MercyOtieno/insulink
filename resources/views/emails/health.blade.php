@component('mail::message')
# Dear Team, 
Below is a New Health {{trans('plugins/quotation::general.'.$quote['quotation']->cover_type)}} Quotation,<br><br>
Quotation number <strong>{{$quote['quotation']->quotation_number}}</strong><br>
<table style="width: 100%;">
    <tbody>
        <tr>
        <td>Customer's Full Names</td>
        <td>{{$quote['quotation']->customer->users->first_name .' '. $quote['quotation']->customer->users->last_name}}</td>
        </tr>
        <tr>
        <td>Email</td>
        <td>{{$quote['quotation']->customer->email}}</td>
        </tr>
        <tr>
        <td>Cellphone</td>
        <td>{{$quote['quotation']->customer->cellphone}}</td>
        </tr>
        <tr>
        <td>Prefered OutPatient Limit</td>
        <td>{{$quote['quotation']->outpatient}}</td>
        </tr>
        <tr>
        <td>Prefered InPatient Limit</td>
        <td>{{$quote['quotation']->inpatient}}</td>
        </tr>
        <tr>
        <td>Date of Birth of Principal Member</td>
        <td>{{\Carbon\Carbon::parse($quote['payment']->dob)->format('d/M/Y')}}</td>
        </tr>
        <tr>
        <td>Type of Cover i want</td>
        <td>{{trans('plugins/quotation::general.'.$quote['quotation']->cover_type)}}</td>
        </tr>
        <tr>
        <td>Prefered Underwriter</td>
        <td>{{$quote['quotation']->products->underwriters->company}}</td>
        </tr>
        <tr><br>
        <td>Dependants<br> @if ($quote['dependants'] =='none' || !strlen($quote['dependants']) > 0)
                !None
            @else
        <tr>
        <td><strong>Name: </strong></td>
        <td><strong>Date of Birth: </strong></td>
        <td><strong>Relationship: </strong></td>
        </tr>
            @foreach ($quote['dependants'] as $item)
        <tr>
        <td>{{$item->dependant_name}}</td>
        <td>{{\Carbon\Carbon::parse($item->dependant_dob)->format('d/M/Y')}}</td>
        <td>{{$item->relationship}}</td>
        </tr>@endforeach
            @endif
        </td>   
        </tr>
        <tr><br>
        <td><strong>Benefits Added</strong><br>Maternity</td>
        <td>@if ($quote['quotation']->maternity)
            Kes {{number_format($quote['quotation']->maternity, 2)}}
            @else
            Not added!
            @endif
        </td>
        </tr>
        <tr>
        <td>Dental</td>
        <td>@if ($quote['quotation']->dental)
            Kes {{number_format($quote['quotation']->dental, 2)}}
        @else
            Not added!
        @endif
        </td>
        </tr>
        <tr>
        <td>Optical</td>
        <td>@if ($quote['quotation']->optical)
            Kes {{number_format($quote['quotation']->optical, 2)}}
            @else
            Not added!
            @endif
        </td>
        </tr>
        <tr>
        <td>Policy Start Date</td>
        <td>{{$quote['payment']->policy_start_date}}</td>
        </tr>
        <tr>
        <td>Mpesa Transaction code</td>
        <td>{{$quote['payment']->transaction_code}}</td>
        </tr>
        <tr>
        <td>Premium Amount</td>
        <td>Kes {{number_format(preg_replace('/\D/', '', $quote['quotation']->total_price), 2)}}</td>
        </tr>
        <tr>
        <td>Customer National ID</td>
        <td>{{$quote['quotation']->customer->document_number}}</td>
        </tr>
        <tr>
        <td>KRA PIN</td>
        <td>{{$quote['quotation']->customer->kra_number}}</td>
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
