@component('mail::message')

<strong>Hello admin!</strong> <br /><br />

<table>
    <tbody>
    <tr>
    <td>Lead #</td>
    <td>{{$details['products']->lead_no}}</td>
    </tr>
    <tr>
    <td>Customer</td>
    <td>{{$details['products']->names}}</td>
    </tr>
    <tr>
    <td>Email</td>
    <td>{{$details['products']->email}}</td>
    </tr>
    <tr>
    <td>Cellphone</td>
    <td>{{$details['products']->cellphone}}</td>
    </tr>
    <tr>
    <td>Product</td>
    <td>{{$details['products']->product}}</td>
    </tr>
    <tr>
    <td>Prefered Underwriter</td>
    <td>{{$details['underwriter']->company}}</td>
    </tr>
    </tbody>
    </table>
<br>
<br>
Regards, <br /><br>
{{ config('app.name') }}
@endcomponent

