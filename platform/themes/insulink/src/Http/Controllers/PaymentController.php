<?php

namespace Theme\Insulink\Http\Controllers;

use Botble\Theme\Theme;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Notifications\HealthQuotation;
use Theme\Insulink\Http\Models\Payment;
use Theme\Insulink\Http\Models\Product;
use App\Notifications\MotorPrivateQuote;
use Theme\Insulink\Http\Models\Quotation;
use Theme\Insulink\Http\Models\Commercial;
use App\Notifications\MotorCommercialQuote;
use Theme\Insulink\Dsc\Helpers\MotorHelper;
use Theme\Insulink\Http\Models\Underwriter;
use Theme\Insulink\Http\Models\VehicleBook;
use Theme\Insulink\Http\Models\Vehiclemake;
use Illuminate\Support\Facades\Notification;
use Theme\Insulink\Http\Models\Privaterates;
use Theme\Insulink\Http\Models\Thirdpartyrates;
use Botble\Base\Http\Responses\BaseHttpResponse;
use Theme\Insulink\Http\Models\CustomerDocument;
use Theme\Insulink\Http\Models\Commercialowngoods;
use Theme\Insulink\Dsc\Calculators\MotorCalculator;
use Theme\Insulink\Http\Models\CommercialGeneralcartage;
use Botble\Quotation\Models\Quotation as ModelsQuotation;
use Carbon\Carbon;
use Theme\Insulink\Http\Models\HealthDependant;

class PaymentController extends Controller
{
    public function customerPayment(Request $request) {
        //dd($request->all());
        $this->validate($request, [
                'quotation_id' => 'required',
                'transaction_code' => 'required',
                'phone_paid' => 'required',
        ]);
        $quote = Quotation::findOrFail($request->quotation_id);
        
        // if ($quote->total_price > $request->amount_paid) {
        //     $balance = $quote->total_price - preg_replace('/\D/', '', $request->amount_paid);
        // } else {
        //     $balance = 0;
        // }
        if (!empty($request->policy_start_date)) {
            $date_commence = Carbon::parse($request->policy_start_date)->format('d/M/Y');
        } else {
            $date_commence = Carbon::parse(Carbon::now())->format('d/M/Y');
        }
        
        $payment = new Payment();
        $payment->quotation_id = $request->quotation_id;
        $payment->transaction_code = $request->transaction_code;
        $payment->policy_start_date = $date_commence;
        // $payment->amount_paid = preg_replace('/\D/', '', $request->amount_paid);
        // $payment->balance = $balance;
        $payment->date_paid = $request->date_paid;
        $payment->phone_paid = $request->phone_paid;
        $payment->status = 'pending confirmation';
        $payment->termsnconditions = $request->tnl;
        $payment->save();
        $this->SendAdminNotification($payment);
        
        return response()->json([
            'success' => 'Payment Method added successfully',
            'status' => 200
        ]);
    }

    public function SendAdminNotification($payment)
    {
        $quote = Quotation::findOrFail($payment->quotation_id);
        if (in_array($quote->cover_type, ['c1','c2', 'c3','c4','c5','c6','c7','c8','c9','c10','c11','c12'])) {
            
            $fleet = [
                'payment' => $payment,
                'quotation' => $quote,
                'vehicle' => VehicleBook::with('customer')->where('customer_id', $quote->customer_id)->orderBy('id', 'desc')->first(),
                'kyc' => CustomerDocument::with('customer')->where('customer_id', $quote->customer_id)->orderBy('id', 'desc')->first()
            ];
        //dd($fleet['vehicle']);
            try {
                Notification::send(new MotorPrivateQuote($fleet));
            } catch(\Exception $e) {
                echo 'Error - '. $e;
            }
        } elseif (in_array($quote->cover_type, ['h1','h2'])) {
            if (in_array($quote->cover_details, ['me-spouse', 'family', 'couple'])) {
                $dependants = HealthDependant::with('customers')->where('customer_id', $quote->customer_id)->get();
            } else {
                $dependants = 'none';
            }
            
            $quotation = [
                'payment' => $payment,
                'quotation' => $quote,
                'dependants' => $dependants
            ];
            //dd($quotation['quotation']->customer->document_number);
            try {
                Notification::send(new HealthQuotation($quotation));
            } catch(\Exception $e) {
                echo 'Error - '. $e;
            }
        }
    }
}