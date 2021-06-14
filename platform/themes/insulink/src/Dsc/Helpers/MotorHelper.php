<?php
namespace Theme\Insulink\Dsc\Helpers;

use App\Models\Claim;
use App\Models\Lead;
use Theme\Insulink\Http\Models\Quotation;

class MotorHelper
{
    const C1 = 'general';
    const C2 = 'health';
    const C3 = 'life & pensions';

    public static function getQuotationNumber() {

        $lastQuotation = Quotation::orderBy('id', 'desc')->first();

        if ($lastQuotation) {
            $current_quotation_number = substr($lastQuotation->quotation_number, 4) + 1;
            $newquotation = 'INS/' . str_pad($current_quotation_number, 7, '0', STR_PAD_LEFT);
            $checkquote = Quotation::where('quotation_number', $newquotation)->first();
            if (!empty($checkquote)) {
                $current_quotation_number = substr($lastQuotation->quotation_number, 4) + 1;
                return 'INS/' . str_pad($current_quotation_number, 7, '0', STR_PAD_LEFT);
            }
            else {
                return $newquotation;
            }
        }
        else {
            return 'INS/0000001';
        }
    }

    public static function getLeadNumber() {

        $lastQuotation = Lead::orderBy('id', 'desc')->first();

        if ($lastQuotation) {
            $current_quotation_number = substr($lastQuotation->lead_no, 4) + 1;
            $newquotation = 'INS/' . str_pad($current_quotation_number, 7, '0', STR_PAD_LEFT);
            $checkquote = Lead::where('lead_no', $newquotation)->first();
            if (!empty($checkquote)) {
                $current_quotation_number = substr($lastQuotation->lead_no, 4) + 1;
                return 'INS/' . str_pad($current_quotation_number, 7, '0', STR_PAD_LEFT);
            }
            else {
                return $newquotation;
            }
        }
        else {
            return 'INS/0000001';
        }
    }

    public static function getClaimNumber() {

        $lastClaim = Claim::orderBy('id', 'desc')->first();

        if ($lastClaim) {
            $current_lastClaim_number = substr($lastClaim->claim_number, 4) + 1;
            $newlastClaim = 'INS/' . str_pad($current_lastClaim_number, 7, '0', STR_PAD_LEFT);
            $checkquote = Claim::where('claim_number', $newlastClaim)->first();
            if (!empty($checkquote)) {
                $current_lastClaim_number = substr($lastClaim->claim_number, 4) + 1;
                return 'INS/' . str_pad($current_lastClaim_number, 7, '0', STR_PAD_LEFT);
            } else {
                return $newlastClaim;
            }
        } else {
            return 'INS/0000001';
        }
    }

    //Format phone number to mpesa format
    public static function formatMobileNumber($mobile_number)
    {
        $trimed_number = preg_replace('/\s+/', '', $mobile_number);
        $first_digit = substr($trimed_number, 0, 1);
        if ($first_digit == "0") {
            $number_without_zero = mb_substr($trimed_number, 1);
            $formated_number = "254" . $number_without_zero;
            return $formated_number;
        } elseif ($first_digit == "7") {
            $formated_number = "254" . $trimed_number;
            return $formated_number;
        } elseif ($first_digit == "2") {
            $formated_number = $trimed_number;
            return $formated_number;
        } elseif ($first_digit == "+") {
            $formated_number = substr($trimed_number, 1);
            return $formated_number;
        } else {
            return $trimed_number;
        }
    }
}

