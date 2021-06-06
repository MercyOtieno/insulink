<?php

namespace Theme\Insulink\Http\Controllers;

use Mail;
use Carbon\Carbon;
use App\Models\Lead;
use App\Models\Travel;
use Botble\Theme\Theme;
use Botble\ACL\Models\User;
use Illuminate\Support\Str;
use App\Mail\CorporateOrder;
use Illuminate\Http\Request;
use App\Mail\NotifyProductAdmin;
use App\Notifications\TravelQuote;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use App\Mail\notifyproductcustomer;
use App\Notifications\NewQuotation;
use App\Http\Controllers\Controller;
use App\ModelFilters\HealthRateFilter;
use Botble\Base\Supports\EmailHandler;
use Theme\Insulink\Http\Models\Product;
use Theme\Insulink\Http\Models\Quotation;
use Theme\Insulink\Http\Models\Commercial;
use Theme\Insulink\Http\Models\HealthRate;
use App\Notifications\MotorCommercialQuote;
use Theme\Insulink\Dsc\Helpers\MotorHelper;
use Theme\Insulink\Http\Models\Underwriter;
use Theme\Insulink\Http\Models\VehicleBook;
use Theme\Insulink\Http\Models\Vehiclemake;
use Botble\Quotation\Models\CorporateHealth;
use Illuminate\Support\Facades\Notification;
use Theme\Insulink\Http\Models\Privaterates;
use Theme\Insulink\Http\Models\Vehiclemodel;
use Theme\Insulink\Http\Models\Domesticrates;
use Theme\Insulink\Http\Models\Commercialfleet;
use Theme\Insulink\Http\Models\Thirdpartyrates;
use Botble\Base\Http\Responses\BaseHttpResponse;
use Theme\Insulink\Http\Models\Commercialowngoods;
use Botble\Theme\Http\Controllers\PublicController;
use Theme\Insulink\Dsc\Calculators\MotorCalculator;
use Theme\Insulink\Dsc\Calculators\HealthCalculator;
use Theme\Insulink\Dsc\Calculators\DomesticCalculator;
use Theme\Insulink\Http\Models\CommercialGeneralcartage;

class QuotationController extends Controller
{

    public function PurchaseMotorPrivate($product)
    {
        $checkproduct = Product::with('underwriters', 'motorprivaterates')->where('id', $product)->where('status', 'active')->first();
        return response()->json([
            'productPurchase' => $checkproduct,
            'paybill' => Underwriter::with('paymentmethod')->where('id', $checkproduct->underwriter_id)->first()
        ]);
    }
    /**
     * Purchasethirdparty
     *
     * @param  mixed $product
     * @param  mixed $premium
     * @param  mixed $value
     * @param  mixed $year_manufacture
     * @param  mixed $vehicle
     * @param  mixed $cover_type
     * @return void
     */
    public function Purchasethirdparty($product)
    {

        $checkproduct = Product::with('underwriters', 'thirdparty')->where('id', $product)->where('status', 'active')->first();

        return response()->json([
            'productPurchase' => $checkproduct,
            'paybill' => Underwriter::with('paymentmethod')->where('id', $checkproduct->underwriter_id)->first()
        ]);
    }

    /**
     * Purchasecommercialonline
     *
     * @param  mixed $product 
     * @param  mixed $premium
     * @param  mixed $value
     * @param  mixed $year_manufacture
     * @param  mixed $vehicle
     * @param  mixed $cover_type
     * @return void
     */
    public function Purchasecommercialonline($product)
    {

        $checkproduct = Product::with('underwriters', 'commercialonline')->where('id', $product)->where('status', 'active')->first();
        return response()->json([
            'productPurchase' => $checkproduct,
            'paybill' => Underwriter::with('paymentmethod')->where('id', $checkproduct->underwriter_id)->first()
        ]);
    }

    /**
     * Purchasecommercialowngoods
     *
     * @param  mixed $product
     * @param  mixed $premium
     * @param  mixed $value
     * @param  mixed $year_manufacture
     * @param  mixed $vehicle
     * @param  mixed $cover_type
     * @return void
     */
    public function Purchasecommercialowngoods($product)
    {

        $checkproduct = Product::with('underwriters', 'commercialowngoods')->where('id', $product)->where('status', 'active')->first();
        return response()->json([
            'productPurchase' => $checkproduct,
            'paybill' => Underwriter::with('paymentmethod')->where('id', $checkproduct->underwriter_id)->first()
        ]);
    }

    /**
     * Purchasecommercialcartage
     *
     * @param  mixed $product
     * @param  mixed $premium
     * @param  mixed $value
     * @param  mixed $year_manufacture
     * @param  mixed $vehicle
     * @param  mixed $cover_type
     * @return void
     */
    public function Purchasecommercialcartage($product)
    {

        $checkproduct = Product::with('underwriters', 'generalcartages')->where('id', $product)->where('status', 'active')->first();
        return response()->json([
            'productPurchase' => $checkproduct,
            'paybill' => Underwriter::with('paymentmethod')->where('id', $checkproduct->underwriter_id)->first()
        ]);
    }
    public function PurchaseDomestic($product)
    {
        $checkproduct = Product::with('underwriters', 'domestic')->where('id', $product)->where('status', 'active')->first();
        return response()->json([
            'productPurchase' => $checkproduct,
            'paybill' => Underwriter::with('paymentmethod')->where('id', $checkproduct->underwriter_id)->first()
        ]);
    }

    public function PurchaseHealth($product)
    {
        $checkproduct = Product::with('underwriters', 'healthrates')->where('id', $product)->where('status', 'active')->first();
        return response()->json([
            'productPurchase' => $checkproduct,
            'paybill' => Underwriter::with('paymentmethod')->where('id', $checkproduct->underwriter_id)->first()
        ]);
    }
    /**
     * Calculate
     * @param MotorCalculator $motorPremium
     * @param $productresults
     */
    public function getMotorRates(MotorCalculator $motorPremium, $type, $cover_type, $v_value, $v_make, $v_model, $v_manufacture)
    {

        $products = Product::with('underwriters', 'motorprivaterates', 'thirdparty', 'commercialonline', 'commercialowngoods', 'generalcartages')->where('cover_type', $cover_type)->where('status', 'active')->first();

        $vehicle = Vehiclemake::where('id', $v_make)->pluck('name');
        $vehicletype = Vehiclemodel::with('makes')->where('make_id', $v_make)->where('id', $v_model)->first();
        $rates = $this->checkrates($products)->get();

        $rateused = 0;
        //get number of years
        $numberofyears = date("Y") - $v_manufacture;

        if ($cover_type == 'c7') {
            foreach ($rates as $rate) {
                $rateused = $rate->amount;
                $computedrate = [
                    'basicpremium' => $motorPremium->calculateThirdParty($rateused, $v_value),
                    'rateused' => $rateused,
                    'productID' => $rate->product_id,
                    'product_name' => $rate->products->name,
                    'underwriter' => $rate->products->underwriters->company,
                    'image' => $rate->products->underwriters->logo,
                    'emergency' => $rate->emergency,
                    'tppd' => $rate->tppd,
                    'vehicletype' => $vehicletype,
                    'passenger_legal_liability' => $rate->passenger_legal_liability,
                ];
                $resultArray[] = $computedrate;
            }
            return response()->json([
                'products' => $resultArray,
                'value_vehicle' => $v_value,
                'year_of_manufacture' => $v_manufacture,
                'used_for' => $type,
                'motorvehicle' => preg_replace("/[^A-Za-z0-9 ]/", '', $vehicle),
                'cover_type' => $cover_type,
                'vehicletype' => $vehicletype,
            ]);
        } elseif ($cover_type == 'c3') {
            foreach ($rates as $rate) {
                switch ($rate->product_id) {
                    case 29:
                        switch ($numberofyears) {
                                //Year of manufacture is less than 10 years

                            case $numberofyears <= 10:
                                $rateused = $rate->amount_10years;

                                break;
                                //Year of manufacture is less than 10 years
                            case $numberofyears > 11 && ($numberofyears < 15):
                                $rateused = $rate->amount_above10years;
                                break;
                        }
                        break;
                    default:
                        if ($numberofyears <= 10) {
                            $rateused = $rate->amount_10years;
                        } else {
                            $rateused = $rate->amount_above10years;
                        }
                        break;
                }
                $computedrate = [
                    'basicpremium' => $motorPremium->calculate($rateused, $v_value),
                    'rateused' => $rateused,
                    'productID' => $rate->product_id,
                    'product_name' => $rate->products->name,
                    'underwriter' => $rate->products->underwriters->company,
                    'image' => $rate->products->underwriters->logo,
                    'medical' => $rate->medical,
                    'tppd' => $rate->tppd,
                    'vehicletype' => $vehicletype,
                    'passenger_legal_liability' => $rate->passenger_legal_liability,
                ];
                $resultArray[] = $computedrate;
            }
            return response()->json([
                'products' => $resultArray,
                'value_vehicle' => $v_value,
                'year_of_manufacture' => $v_manufacture,
                'used_for' => $type,
                'motorvehicle' => preg_replace("/[^A-Za-z0-9 ]/", '', $vehicle),
                'cover_type' => $cover_type,
                'vehicletype' => $vehicletype,
            ]);
        } elseif ($cover_type == 'c12') {
            foreach ($rates as $rate) {
                switch ($rate->product_id) {
                    case 35:
                        switch ($numberofyears) {
                                //Year of manufacture is less than 10 years

                            case $numberofyears <= 10:
                                $rateused = $rate->amount_10years;

                                break;
                                //Year of manufacture is less than 10 years
                            case $numberofyears > 11 && ($numberofyears < 15):
                                $rateused = $rate->amount_above10years;
                                break;
                        }
                        break;
                    default:
                        if ($numberofyears <= 10) {
                            $rateused = $rate->amount_10years;
                        } else {
                            $rateused = $rate->amount_above10years;
                        }
                        break;
                }
                $computedrate = [
                    'basicpremium' => $motorPremium->calculate($rateused, $v_value),
                    'rateused' => $rateused,
                    'productID' => $rate->product_id,
                    'product_name' => $rate->products->name,
                    'underwriter' => $rate->products->underwriters->company,
                    'image' => $rate->products->underwriters->logo,
                    'medical' => $rate->medical,
                    'tppd' => $rate->tppd,
                    'vehicletype' => $vehicletype,
                    'passenger_legal_liability' => $rate->passenger_legal_liability,
                ];
                $resultArray[] = $computedrate;
            }
            return response()->json([
                'products' => $resultArray,
                'value_vehicle' => $v_value,
                'year_of_manufacture' => $v_manufacture,
                'used_for' => $type,
                'motorvehicle' => preg_replace("/[^A-Za-z0-9 ]/", '', $vehicle),
                'cover_type' => $cover_type,
                'vehicletype' => $vehicletype,
            ]);
        } elseif ($cover_type == 'c1') {
            foreach ($rates as $rate) {
                switch ($rate->product_id) {
                    case 22:
                        switch ($numberofyears) {
                                //Year of manufacture is less than 10 years

                            case $numberofyears <= 10:
                                $rateused = $rate->amount_10years;

                                break;
                                //Year of manufacture is less than 10 years
                            case $numberofyears > 11 && ($numberofyears < 15):
                                $rateused = $rate->amount_above10years;
                                break;
                        }
                        break;
                    default:
                        if ($numberofyears <= 10) {
                            $rateused = $rate->amount_10years;
                        } else {
                            $rateused = $rate->amount_above10years;
                        }
                        break;
                }
                $computedrate = [
                    'basicpremium' => $motorPremium->calculate($rateused, $v_value),
                    'rateused' => $rateused,
                    'productID' => $rate->product_id,
                    'product_name' => $rate->products->name,
                    'underwriter' => $rate->products->underwriters->company,
                    'image' => $rate->products->underwriters->logo,
                    'medical' => $rate->medical,
                    'tppd' => $rate->tppd,
                    'vehicletype' => $vehicletype,
                    'passenger_legal_liability' => $rate->passenger_legal_liability,
                ];
                $resultArray[] = $computedrate;
            }
            return response()->json([
                'products' => $resultArray,
                'value_vehicle' => $v_value,
                'year_of_manufacture' => $v_manufacture,
                'used_for' => $type,
                'motorvehicle' => preg_replace("/[^A-Za-z0-9 ]/", '', $vehicle),
                'cover_type' => $cover_type,
                'vehicletype' => $vehicletype,
            ]);
        } else {
            foreach ($rates as $rate) {
                switch ($rate->product_id) {
                    case 13:
                        if ($this->isriskCIC($v_make)) {
                            switch ($v_value) {
                                    //value is greater > than 1.5 Million
                                case $v_value > 1500000:
                                    $rateused = $rate->rate_value_above;
                                    break;
                                    //value is less < than 1.5 Million
                                case $v_value < 1500000:
                                    $rateused = $rate->rate_value_below;
                                    break;
                            }
                        }
                        if ($this->isnotriskCIC($v_make)) {
                            switch ($v_value) {
                                    //value is greater > than 1.5 Million
                                case $v_value > 1500000:
                                    $rateused = 3.5;
                                    break;
                                    //value is less < than 1.5 Million
                                case $v_value < 1500000:
                                    $rateused = 5.0;
                                    break;
                            }
                        }
                        break;
                    default:
                        if ($v_value > 1000000) {
                            $rateused = $rate->rate_value_below;
                        } else {
                            $rateused = $rate->rate_value_above;
                        }
                        break;
                }
                $computedrate = [
                    'basicpremium' => $motorPremium->calculate($rateused, $v_value),
                    'rateused' => $rateused,
                    'productID' => $rate->product_id,
                    'product_name' => $rate->products->name,
                    'underwriter' => $rate->products->underwriters->company,
                    'image' => $rate->products->underwriters->logo,
                    'medical_expense' => $rate->medical_expense,
                    'windscreen' => $rate->windscreen,
                    'towing_recovery' => $rate->towing_recovery,
                    'entertainment' => $rate->entertainment,
                    'authorised_repair' => $rate->authorised_repair,
                    'per_event' => $rate->per_event,
                    'per_person' => $rate->per_person,
                    'vehicletype' => $vehicletype,
                ];


                $resultArray[] = $computedrate;
            }
            return response()->json([
                'products' => $resultArray,
                'value_vehicle' => $v_value,
                'year_of_manufacture' => $v_manufacture,
                'used_for' => $type,
                'motorvehicle' => preg_replace("/[^A-Za-z0-9 ]/", '', $vehicle),
                'cover_type' => $cover_type,
                'vehicletype' => $vehicletype,
            ]);
        }
    }

    /**
     * check Motor Rates
     *
     * @param  mixed $products
     * @return void
     */
    public function checkrates($products)
    {
        $ids = $products->pluck('id');
        if ($products->cover_type == 'c7') {
            return $rates = Thirdpartyrates::with('products')->whereIn('product_id', $ids)->first();
        }
        if ($products->cover_type == 'c3') {
            return $rates = Commercial::with('products')->whereIn('product_id', $ids)->first();
        }
        if ($products->cover_type == 'c1') {
            return $rates = Commercialowngoods::with('products')->whereIn('product_id', $ids)->first();
        }
        if ($products->cover_type == 'c12') {
            return $rates = CommercialGeneralcartage::with('products')->whereIn('product_id', $ids)->first();
        }
        if ($products->cover_type == 'd1') {
            return $rates = Domesticrates::with('products')->whereIn('product_id', $ids)->first();
        }
        if ($products->cover_type == 'h1') {
            return $rates = HealthRate::with('products')->whereIn('product_id', $ids)->first();
        }
        $rates = Privaterates::with('products')->whereIn('product_id', $ids)->first();
        return $rates;
    }

    /**
     * check Motor Rates
     *
     * @param  mixed $products
     * @return void
     */
    public function checkhealthrates($agebracket, $ip, $cover_details)
    {
        $cleanageb = str_replace("-", ",", $agebracket);
        $currentagebracket = preg_split("/[,]/", $cleanageb);
        //dd($currentagebracket);
        if ($cover_details == 'me-spouse') {
            return DB::table('healthrates')
                ->join('products', 'products.id', '=', 'healthrates.product_id')
                ->join('underwriters', 'underwriters.id', '=', 'products.underwriter_id')
                ->join('paymentmethods', 'underwriters.id', '=', 'paymentmethods.underwriter_id')
                ->select('healthrates.*', 'products.*', 'underwriters.*', 'paymentmethods.*')
                ->where('healthrates.age_limits_min', '>=', $currentagebracket[0])
                ->where('healthrates.age_limits_max', '<=', $currentagebracket[1])
                ->where('healthrates.ip', '=', $ip)
                ->where('healthrates.is_individual', '=', "1")
                ->get();
        } else {
            return DB::table('healthrates')
                ->join('products', 'products.id', '=', 'healthrates.product_id')
                ->join('underwriters', 'underwriters.id', '=', 'products.underwriter_id')
                ->join('paymentmethods', 'underwriters.id', '=', 'paymentmethods.underwriter_id')
                ->select('healthrates.*', 'products.*', 'underwriters.*', 'paymentmethods.*')
                ->where('healthrates.age_limits_min', '>=', $currentagebracket[0])
                ->where('healthrates.age_limits_max', '<=', $currentagebracket[1])
                ->where('healthrates.ip', '=', $ip)
                ->where('healthrates.is_family', '=', "1")
                ->get();
        }
    }

    public function checkage($age)
    {
        if ($age == 1) {
            $agecheck = '18-30';
        } elseif ($age == 2) {
            $agecheck = '31-40';
        } elseif ($age == 3) {
            $agecheck = '41-50';
        } elseif ($age == 4) {
            $agecheck = '51-60';
        } elseif ($age == 5) {
            $agecheck = '61-70';
        } else {
            $agecheck = '71-above';
        }
        return $agecheck;
    }
    /**
     * isriskCIC
     *
     * @param  mixed $v_make
     * @return void
     */
    private function isriskCIC($v_make)
    {
        $highrisk = new Collection(['26', '1', 2, 3, 4, 6, 7, 9, 10, 12, 13, 15, 16, 17, 18, 19, 20, 21, 23, 24, 25, 27, 28, '42', '64', '70', '33', '36', '54', '56', '32', '14', '28', '5', '11', '22', '51', '67']);
        return $highrisk->contains($v_make);
    }

    /**
     * isnotriskCIC
     *
     * @param  mixed $v_make
     * @return void
     */
    private function isnotriskCIC($v_make)
    {
        $lowrisk = new Collection(['48', '8', '30', '49', '65', '44', '69']);
        return $lowrisk->contains($v_make);
    }

    public function OrderMotor(Request $request)
    {

        //Quote
        $quotation = new Quotation();
        $quotation->quotation_number = MotorHelper::getQuotationNumber();
        $quotation->product_id = $request['productID'];
        $quotation->total_price = $request->total;
        $quotation->road_rescue = $request->road_rescue;
        $quotation->excess_protector = $request->excess_protector;
        $quotation->pvt = $request->pvt;
        $quotation->loss_use = $request->loss_use;
        $quotation->value_of_vehicle = $request->v_value;
        $quotation->cover_type = $request->cover_type;
        $quotation->quotation_type = MotorHelper::C1;
        $quotation->status = 'not paid';
        $quotation->save();
        //     $user = User::whereHas('roles',function ($query){
        //        $query->where('roles.id','=',1);
        //    })->first();
        //     $user->notify(new NewQuotation($quotation));

        return response()->json([
            'quotation_number' => $quotation->quotation_number,
            'quotation_id' => $quotation->id
        ]);
    }

    public function getDomesticRates(DomesticCalculator $domesticratesgen, $content_value, $cover_type, $product_type, $furniture, $phones_laptops, $personal_accident, $occupiers_liabity, $owners_liabity, $building_value, $what_to_insure, $wiba_servants_indoor, $wiba_servants_outdoor)
    {
        $products = Product::with('underwriters', 'domestic')->where('cover_type', $cover_type)->where('status', 'active')->first();
        $rates = $this->checkrates($products)->get();

        $rateused = 0;
        if ($product_type == Domesticrates::LANDLORD) {
            foreach ($rates as $rate) {
                $rateused = $rate;


                $computedrate = [
                    'basicpremium' => $domesticratesgen->calculateLandlord($rateused, $building_value, $personal_accident, $owners_liabity),
                    'rateused' => $rateused,
                    'productID' => $rate->product_id,
                    'product_name' => $rate->products->name,
                    'underwriter' => $rate->products->underwriters->company,
                    'image' => $rate->products->underwriters->logo,
                ];
                $resultArray[] = $computedrate;
            }
            return response()->json([
                'products' => $resultArray,
            ]);
        } elseif ($product_type == Domesticrates::HOMEOWNER) {
            foreach ($rates as $rate) {
                $rateused = $rate;
                $portables = $phones_laptops;
                $value_content = $content_value +  $furniture;
                $computedrate = [
                    'basicpremium' => $domesticratesgen->calculateHomeowner($rateused, $value_content, $building_value, $portables, $what_to_insure, $wiba_servants_indoor, $wiba_servants_outdoor, $personal_accident, $owners_liabity),
                    'rateused' => $rateused,
                    'productID' => $rate->product_id,
                    'product_name' => $rate->products->name,
                    'underwriter' => $rate->products->underwriters->company,
                    'image' => $rate->products->underwriters->logo,
                ];
                $resultArray[] = $computedrate;
            }
            return response()->json([
                'products' => $resultArray,
            ]);
        } else {
            foreach ($rates as $rate) {
                $rateused = $rate->items_rate;
                $productID = $rate->product_id;
                $portables = $phones_laptops;
                $value_content = $content_value +  $furniture;

                $computedrate = [
                    'basicpremium' => $domesticratesgen->calculateTenant($rateused, $value_content, $portables, $productID),
                    'rateused' => $rateused,
                    'productID' => $rate->product_id,
                    'product_name' => $rate->products->name,
                    'underwriter' => $rate->products->underwriters->company,
                    'image' => $rate->products->underwriters->logo,
                ];
                $resultArray[] = $computedrate;
            }
            return response()->json([
                'products' => $resultArray,
                'cover_type' => $cover_type
            ]);
        }
    }

    public function getHealthRates(HealthCalculator $healthratesgen, $ip, $no_children, $preexisting, $dob, $age, $cover_type, $cover_details)
    {

        $products = Product::with('underwriters', 'healthrates')->where('cover_type', $cover_type)->where('status', 'active')->get();
        $agebracket = $this->checkage($age);
        $rates = $this->checkhealthrates($agebracket, $ip, $cover_details);
        $currentage = date("Y") - Carbon::createFromTimestamp($dob)->format('Y');
        $checkJubilee = array(49, 50, 51, 52, 53);

        $rateused = 0;

        switch ($cover_details) {
            case 'family':
                foreach ($rates as $rate) {
                    if (in_array($rate->product_id, $checkJubilee, TRUE)) {
                        switch ($ip) {
                            case '200000':
                                switch ($no_children) {
                                    case '2':
                                        $rateused = ($rate->child * 2) + ($rate->m + $rate->spouse) + ($rate->op * 4);
                                        break;
                                    case '3':
                                        $rateused = ($rate->child * 3) + ($rate->m + $rate->spouse) + ($rate->op * 5);
                                        break;
                                    case '4':
                                        $rateused = ($rate->child * 4) + ($rate->m + $rate->spouse) + ($rate->op * 6);
                                        break;
                                    case '5':
                                        $rateused = ($rate->child * 5) + ($rate->m + $rate->spouse) + ($rate->op * 7);
                                        break;
                                    case '6':
                                        $rateused = ($rate->child * 6) + ($rate->m + $rate->spouse) + ($rate->op * 8);
                                        break;

                                    default:
                                        $rateused = $rate->child + $rate->m + $rate->spouse + ($rate->op * 3);
                                        break;
                                }
                                break;
                            case '300000':
                                switch ($no_children) {
                                    case '2':
                                        $rateused = ($rate->child * 2) + ($rate->m + $rate->spouse) + ($rate->op * 4);
                                        break;
                                    case '3':
                                        $rateused = ($rate->child * 3) + ($rate->m + $rate->spouse) + ($rate->op * 5);
                                        break;
                                    case '4':
                                        $rateused = ($rate->child * 4) + ($rate->m + $rate->spouse) + ($rate->op * 6);
                                        break;
                                    case '5':
                                        $rateused = ($rate->child * 5) + ($rate->m + $rate->spouse) + ($rate->op * 7);
                                        break;
                                    case '6':
                                        $rateused = ($rate->child * 6) + ($rate->m + $rate->spouse) + ($rate->op * 8);
                                        break;

                                    default:
                                        $rateused = $rate->child + $rate->m + $rate->spouse + ($rate->op * 3);
                                        break;
                                }
                                break;
                            case '400000':
                                switch ($no_children) {
                                    case '2':
                                        $rateused = ($rate->child * 2) + ($rate->m + $rate->spouse) + ($rate->op * 4);
                                        break;
                                    case '3':
                                        $rateused = ($rate->child * 3) + ($rate->m + $rate->spouse) + ($rate->op * 5);
                                        break;
                                    case '4':
                                        $rateused = ($rate->child * 4) + ($rate->m + $rate->spouse) + ($rate->op * 6);
                                        break;
                                    case '5':
                                        $rateused = ($rate->child * 5) + ($rate->m + $rate->spouse) + ($rate->op * 7);
                                        break;
                                    case '6':
                                        $rateused = ($rate->child * 6) + ($rate->m + $rate->spouse) + ($rate->op * 8);
                                        break;

                                    default:
                                        $rateused = $rate->child + $rate->m + $rate->spouse + ($rate->op * 3);
                                        break;
                                }
                                break;
                            case '500000':
                                switch ($no_children) {
                                    case '2':
                                        $rateused = ($rate->child * 2) + ($rate->m + $rate->spouse) + ($rate->op * 4);
                                        break;
                                    case '3':
                                        $rateused = ($rate->child * 3) + ($rate->m + $rate->spouse) + ($rate->op * 5);
                                        break;
                                    case '4':
                                        $rateused = ($rate->child * 4) + ($rate->m + $rate->spouse) + ($rate->op * 6);
                                        break;
                                    case '5':
                                        $rateused = ($rate->child * 5) + ($rate->m + $rate->spouse) + ($rate->op * 7);
                                        break;
                                    case '6':
                                        $rateused = ($rate->child * 6) + ($rate->m + $rate->spouse) + ($rate->op * 8);
                                        break;

                                    default:
                                        $rateused = $rate->child + $rate->m + $rate->spouse + ($rate->op * 3);
                                        break;
                                }
                                break;
                            case '750000':
                                switch ($no_children) {
                                    case '2':
                                        $rateused = ($rate->child * 2) + ($rate->m + $rate->spouse) + ($rate->op * 4);
                                        break;
                                    case '3':
                                        $rateused = ($rate->child * 3) + ($rate->m + $rate->spouse) + ($rate->op * 5);
                                        break;
                                    case '4':
                                        $rateused = ($rate->child * 4) + ($rate->m + $rate->spouse) + ($rate->op * 6);
                                        break;
                                    case '5':
                                        $rateused = ($rate->child * 5) + ($rate->m + $rate->spouse) + ($rate->op * 7);
                                        break;
                                    case '6':
                                        $rateused = ($rate->child * 6) + ($rate->m + $rate->spouse) + ($rate->op * 8);
                                        break;

                                    default:
                                        $rateused = $rate->child + $rate->m + $rate->spouse + ($rate->op * 3);
                                        break;
                                }
                                break;
                            case '1000000':
                                switch ($no_children) {
                                    case '2':
                                        $rateused = ($rate->child * 2) + ($rate->m + $rate->spouse) + ($rate->op * 4);
                                        break;
                                    case '3':
                                        $rateused = ($rate->child * 3) + ($rate->m + $rate->spouse) + ($rate->op * 5);
                                        break;
                                    case '4':
                                        $rateused = ($rate->child * 4) + ($rate->m + $rate->spouse) + ($rate->op * 6);
                                        break;
                                    case '5':
                                        $rateused = ($rate->child * 5) + ($rate->m + $rate->spouse) + ($rate->op * 7);
                                        break;
                                    case '6':
                                        $rateused = ($rate->child * 6) + ($rate->m + $rate->spouse) + ($rate->op * 8);
                                        break;

                                    default:
                                        $rateused = $rate->child + $rate->m + $rate->spouse + ($rate->op * 3);
                                        break;
                                }
                                break;
                            case '2000000':
                                switch ($no_children) {
                                    case '2':
                                        $rateused = ($rate->child * 2) + ($rate->m + $rate->spouse) + ($rate->op * 4);
                                        break;
                                    case '3':
                                        $rateused = ($rate->child * 3) + ($rate->m + $rate->spouse) + ($rate->op * 5);
                                        break;
                                    case '4':
                                        $rateused = ($rate->child * 4) + ($rate->m + $rate->spouse) + ($rate->op * 6);
                                        break;
                                    case '5':
                                        $rateused = ($rate->child * 5) + ($rate->m + $rate->spouse) + ($rate->op * 7);
                                        break;
                                    case '6':
                                        $rateused = ($rate->child * 6) + ($rate->m + $rate->spouse) + ($rate->op * 8);
                                        break;

                                    default:
                                        $rateused = $rate->child + $rate->m + $rate->spouse + ($rate->op * 3);
                                        break;
                                }
                                break;
                            case '3000000':
                                switch ($no_children) {
                                    case '2':
                                        $rateused = ($rate->child * 2) + ($rate->m + $rate->spouse) + ($rate->op * 4);
                                        break;
                                    case '3':
                                        $rateused = ($rate->child * 3) + ($rate->m + $rate->spouse) + ($rate->op * 5);
                                        break;
                                    case '4':
                                        $rateused = ($rate->child * 4) + ($rate->m + $rate->spouse) + ($rate->op * 6);
                                        break;
                                    case '5':
                                        $rateused = ($rate->child * 5) + ($rate->m + $rate->spouse) + ($rate->op * 7);
                                        break;
                                    case '6':
                                        $rateused = ($rate->child * 6) + ($rate->m + $rate->spouse) + ($rate->op * 8);
                                        break;

                                    default:
                                        $rateused = $rate->child + $rate->m + $rate->spouse + ($rate->op * 3);
                                        break;
                                }
                                break;
                            case '4000000':
                                switch ($no_children) {
                                    case '2':
                                        $rateused = ($rate->child * 2) + ($rate->m + $rate->spouse) + ($rate->op * 4);
                                        break;
                                    case '3':
                                        $rateused = ($rate->child * 3) + ($rate->m + $rate->spouse) + ($rate->op * 5);
                                        break;
                                    case '4':
                                        $rateused = ($rate->child * 4) + ($rate->m + $rate->spouse) + ($rate->op * 6);
                                        break;
                                    case '5':
                                        $rateused = ($rate->child * 5) + ($rate->m + $rate->spouse) + ($rate->op * 7);
                                        break;
                                    case '6':
                                        $rateused = ($rate->child * 6) + ($rate->m + $rate->spouse) + ($rate->op * 8);
                                        break;

                                    default:
                                        $rateused = $rate->child + $rate->m + $rate->spouse + ($rate->op * 3);
                                        break;
                                }
                                break;
                            case '5000000':
                                switch ($no_children) {
                                    case '2':
                                        $rateused = ($rate->child * 2) + ($rate->m + $rate->spouse) + ($rate->op * 4);
                                        break;
                                    case '3':
                                        $rateused = ($rate->child * 3) + ($rate->m + $rate->spouse) + ($rate->op * 5);
                                        break;
                                    case '4':
                                        $rateused = ($rate->child * 4) + ($rate->m + $rate->spouse) + ($rate->op * 6);
                                        break;
                                    case '5':
                                        $rateused = ($rate->child * 5) + ($rate->m + $rate->spouse) + ($rate->op * 7);
                                        break;
                                    case '6':
                                        $rateused = ($rate->child * 6) + ($rate->m + $rate->spouse) + ($rate->op * 8);
                                        break;

                                    default:
                                        $rateused = $rate->child + $rate->m + $rate->spouse + ($rate->op * 3);
                                        break;
                                }
                                break;
                            case '7500000':
                                switch ($no_children) {
                                    case '2':
                                        $rateused = ($rate->child * 2) + ($rate->m + $rate->spouse) + ($rate->op * 4);
                                        break;
                                    case '3':
                                        $rateused = ($rate->child * 3) + ($rate->m + $rate->spouse) + ($rate->op * 5);
                                        break;
                                    case '4':
                                        $rateused = ($rate->child * 4) + ($rate->m + $rate->spouse) + ($rate->op * 6);
                                        break;
                                    case '5':
                                        $rateused = ($rate->child * 5) + ($rate->m + $rate->spouse) + ($rate->op * 7);
                                        break;
                                    case '6':
                                        $rateused = ($rate->child * 6) + ($rate->m + $rate->spouse) + ($rate->op * 8);
                                        break;

                                    default:
                                        $rateused = $rate->child + $rate->m + $rate->spouse + ($rate->op * 3);
                                        break;
                                }
                                break;
                            case '10000000':
                                switch ($no_children) {
                                    case '2':
                                        $rateused = ($rate->child * 2) + ($rate->m + $rate->spouse) + ($rate->op * 4);
                                        break;
                                    case '3':
                                        $rateused = ($rate->child * 3) + ($rate->m + $rate->spouse) + ($rate->op * 5);
                                        break;
                                    case '4':
                                        $rateused = ($rate->child * 4) + ($rate->m + $rate->spouse) + ($rate->op * 6);
                                        break;
                                    case '5':
                                        $rateused = ($rate->child * 5) + ($rate->m + $rate->spouse) + ($rate->op * 7);
                                        break;
                                    case '6':
                                        $rateused = ($rate->child * 6) + ($rate->m + $rate->spouse) + ($rate->op * 8);
                                        break;

                                    default:
                                        $rateused = $rate->child + $rate->m + $rate->spouse + ($rate->op * 3);
                                        break;
                                }
                                break;
                            case '20000000':
                                switch ($no_children) {
                                    case '2':
                                        $rateused = ($rate->child * 2) + ($rate->m + $rate->spouse) + ($rate->op * 4);
                                        break;
                                    case '3':
                                        $rateused = ($rate->child * 3) + ($rate->m + $rate->spouse) + ($rate->op * 5);
                                        break;
                                    case '4':
                                        $rateused = ($rate->child * 4) + ($rate->m + $rate->spouse) + ($rate->op * 6);
                                        break;
                                    case '5':
                                        $rateused = ($rate->child * 5) + ($rate->m + $rate->spouse) + ($rate->op * 7);
                                        break;
                                    case '6':
                                        $rateused = ($rate->child * 6) + ($rate->m + $rate->spouse) + ($rate->op * 8);
                                        break;

                                    default:
                                        $rateused = $rate->child + $rate->m + $rate->spouse + ($rate->op * 3);
                                        break;
                                }
                                break;
                            case '40000000':
                                switch ($no_children) {
                                    case '2':
                                        $rateused = ($rate->child * 2) + ($rate->m + $rate->spouse) + ($rate->op * 4);
                                        break;
                                    case '3':
                                        $rateused = ($rate->child * 3) + ($rate->m + $rate->spouse) + ($rate->op * 5);
                                        break;
                                    case '4':
                                        $rateused = ($rate->child * 4) + ($rate->m + $rate->spouse) + ($rate->op * 6);
                                        break;
                                    case '5':
                                        $rateused = ($rate->child * 5) + ($rate->m + $rate->spouse) + ($rate->op * 7);
                                        break;
                                    case '6':
                                        $rateused = ($rate->child * 6) + ($rate->m + $rate->spouse) + ($rate->op * 8);
                                        break;

                                    default:
                                        $rateused = $rate->child + $rate->m + $rate->spouse + ($rate->op * 3);
                                        break;
                                }
                                break;
                            case '60000000':
                                switch ($no_children) {
                                    case '2':
                                        $rateused = ($rate->child * 2) + ($rate->m + $rate->spouse) + ($rate->op * 4);
                                        break;
                                    case '3':
                                        $rateused = ($rate->child * 3) + ($rate->m + $rate->spouse) + ($rate->op * 5);
                                        break;
                                    case '4':
                                        $rateused = ($rate->child * 4) + ($rate->m + $rate->spouse) + ($rate->op * 6);
                                        break;
                                    case '5':
                                        $rateused = ($rate->child * 5) + ($rate->m + $rate->spouse) + ($rate->op * 7);
                                        break;
                                    case '6':
                                        $rateused = ($rate->child * 6) + ($rate->m + $rate->spouse) + ($rate->op * 8);
                                        break;

                                    default:
                                        $rateused = $rate->child + $rate->m + $rate->spouse + ($rate->op * 3);
                                        break;
                                }
                                break;
                            default:
                                switch ($no_children) {
                                    case '2':
                                        $rateused = ($rate->child * 2) + ($rate->m + $rate->spouse) + ($rate->op * 4);
                                        break;
                                    case '3':
                                        $rateused = ($rate->child * 3) + ($rate->m + $rate->spouse) + ($rate->op * 5);
                                        break;
                                    case '4':
                                        $rateused = ($rate->child * 4) + ($rate->m + $rate->spouse) + ($rate->op * 6);
                                        break;
                                    case '5':
                                        $rateused = ($rate->child * 5) + ($rate->m + $rate->spouse) + ($rate->op * 7);
                                        break;
                                    case '6':
                                        $rateused = ($rate->child * 6) + ($rate->m + $rate->spouse) + ($rate->op * 8);
                                        break;

                                    default:
                                        $rateused = $rate->child + $rate->m + $rate->spouse + ($rate->op * 3);
                                        break;
                                }
                                break;
                        }
                    } else {
                        switch ($ip) {
                            case '200000':
                                switch ($no_children) {
                                    case '1':
                                        $rateused = $rate->m2 + ($rate->op * 3);
                                        break;
                                    case '2':
                                        $rateused = $rate->m3 + ($rate->op * 4);
                                        break;
                                    case '3':
                                        $rateused = $rate->m4 + ($rate->op * 5);
                                        break;
                                    case '4':
                                        $rateused = $rate->m5 + ($rate->op * 6);
                                        break;
                                    case '5':
                                        $rateused = $rate->m5 + $rate->extra_dependant + ($rate->op * 7);
                                        break;
                                    case '6':
                                        $rateused = $rate->m5 + $rate->extra_dependant + $rate->extra_dependant + ($rate->op * 8);
                                        break;

                                    default:
                                        $rateused = $rate->m1 + ($rate->op * 2);
                                        break;
                                }
                                break;
                            case '300000':
                                switch ($no_children) {
                                    case '1':
                                        $rateused = $rate->m2 + ($rate->op * 3);
                                        break;
                                    case '2':
                                        $rateused = $rate->m3 + ($rate->op * 4);
                                        break;
                                    case '3':
                                        $rateused = $rate->m4 + ($rate->op * 5);
                                        break;
                                    case '4':
                                        $rateused = $rate->m5 + ($rate->op * 6);
                                        break;
                                    case '5':
                                        $rateused = $rate->m5 + $rate->extra_dependant + ($rate->op * 7);
                                        break;
                                    case '6':
                                        $rateused = $rate->m5 + $rate->extra_dependant + $rate->extra_dependant + ($rate->op * 8);
                                        break;

                                    default:
                                        $rateused = $rate->m1 + ($rate->op * 2);
                                        break;
                                }
                                break;
                            case '400000':
                                switch ($no_children) {
                                    case '1':
                                        $rateused = $rate->m2 + ($rate->op * 3);
                                        break;
                                    case '2':
                                        $rateused = $rate->m3 + ($rate->op * 4);
                                        break;
                                    case '3':
                                        $rateused = $rate->m4 + ($rate->op * 5);
                                        break;
                                    case '4':
                                        $rateused = $rate->m5 + ($rate->op * 6);
                                        break;
                                    case '5':
                                        $rateused = $rate->m5 + $rate->extra_dependant + ($rate->op * 7);
                                        break;
                                    case '6':
                                        $rateused = $rate->m5 + $rate->extra_dependant + $rate->extra_dependant + ($rate->op * 8);
                                        break;

                                    default:
                                        $rateused = $rate->m1 + ($rate->op * 2);
                                        break;
                                }
                                break;
                            case '500000':
                                switch ($no_children) {
                                    case '1':
                                        $rateused = $rate->m2 + ($rate->op * 3);
                                        break;
                                    case '2':
                                        $rateused = $rate->m3 + ($rate->op * 4);
                                        break;
                                    case '3':
                                        $rateused = $rate->m4 + ($rate->op * 5);
                                        break;
                                    case '4':
                                        $rateused = $rate->m5 + ($rate->op * 6);
                                        break;
                                    case '5':
                                        $rateused = $rate->m5 + $rate->extra_dependant + ($rate->op * 7);
                                        break;
                                    case '6':
                                        $rateused = $rate->m5 + $rate->extra_dependant + $rate->extra_dependant + ($rate->op * 8);
                                        break;

                                    default:
                                        $rateused = $rate->m1 + ($rate->op * 2);
                                        break;
                                }
                                break;
                            case '750000':
                                switch ($no_children) {
                                    case '1':
                                        $rateused = $rate->m2 + ($rate->op * 3);
                                        break;
                                    case '2':
                                        $rateused = $rate->m3 + ($rate->op * 4);
                                        break;
                                    case '3':
                                        $rateused = $rate->m4 + ($rate->op * 5);
                                        break;
                                    case '4':
                                        $rateused = $rate->m5 + ($rate->op * 6);
                                        break;
                                    case '5':
                                        $rateused = $rate->m5 + $rate->extra_dependant + ($rate->op * 7);
                                        break;
                                    case '6':
                                        $rateused = $rate->m5 + $rate->extra_dependant + $rate->extra_dependant + ($rate->op * 8);
                                        break;

                                    default:
                                        $rateused = $rate->m1 + ($rate->op * 2);
                                        break;
                                }
                                break;
                            case '1000000':
                                switch ($no_children) {
                                    case '1':
                                        $rateused = $rate->m2 + ($rate->op * 3);
                                        break;
                                    case '2':
                                        $rateused = $rate->m3 + ($rate->op * 4);
                                        break;
                                    case '3':
                                        $rateused = $rate->m4 + ($rate->op * 5);
                                        break;
                                    case '4':
                                        $rateused = $rate->m5 + ($rate->op * 6);
                                        break;
                                    case '5':
                                        $rateused = $rate->m5 + $rate->extra_dependant + ($rate->op * 7);
                                        break;
                                    case '6':
                                        $rateused = $rate->m5 + $rate->extra_dependant + $rate->extra_dependant + ($rate->op * 8);
                                        break;

                                    default:
                                        $rateused = $rate->m1 + ($rate->op * 2);
                                        break;
                                }
                                break;
                            case '2000000':
                                switch ($no_children) {
                                    case '1':
                                        $rateused = $rate->m2 + ($rate->op * 3);
                                        break;
                                    case '2':
                                        $rateused = $rate->m3 + ($rate->op * 4);
                                        break;
                                    case '3':
                                        $rateused = $rate->m4 + ($rate->op * 5);
                                        break;
                                    case '4':
                                        $rateused = $rate->m5 + ($rate->op * 6);
                                        break;
                                    case '5':
                                        $rateused = $rate->m5 + $rate->extra_dependant + ($rate->op * 7);
                                        break;
                                    case '6':
                                        $rateused = $rate->m5 + $rate->extra_dependant + $rate->extra_dependant + ($rate->op * 8);
                                        break;

                                    default:
                                        $rateused = $rate->m1 + ($rate->op * 2);
                                        break;
                                }
                                break;
                            case '3000000':
                                switch ($no_children) {
                                    case '1':
                                        $rateused = $rate->m2 + ($rate->op * 3);
                                        break;
                                    case '2':
                                        $rateused = $rate->m3 + ($rate->op * 4);
                                        break;
                                    case '3':
                                        $rateused = $rate->m4 + ($rate->op * 5);
                                        break;
                                    case '4':
                                        $rateused = $rate->m5 + ($rate->op * 6);
                                        break;
                                    case '5':
                                        $rateused = $rate->m5 + $rate->extra_dependant + ($rate->op * 7);
                                        break;
                                    case '6':
                                        $rateused = $rate->m5 + $rate->extra_dependant + $rate->extra_dependant + ($rate->op * 8);
                                        break;

                                    default:
                                        $rateused = $rate->m1 + ($rate->op * 2);
                                        break;
                                }
                                break;
                            case '4000000':
                                switch ($no_children) {
                                    case '1':
                                        $rateused = $rate->m2 + ($rate->op * 3);
                                        break;
                                    case '2':
                                        $rateused = $rate->m3 + ($rate->op * 4);
                                        break;
                                    case '3':
                                        $rateused = $rate->m4 + ($rate->op * 5);
                                        break;
                                    case '4':
                                        $rateused = $rate->m5 + ($rate->op * 6);
                                        break;
                                    case '5':
                                        $rateused = $rate->m5 + $rate->extra_dependant + ($rate->op * 7);
                                        break;
                                    case '6':
                                        $rateused = $rate->m5 + $rate->extra_dependant + $rate->extra_dependant + ($rate->op * 8);
                                        break;

                                    default:
                                        $rateused = $rate->m1 + ($rate->op * 2);
                                        break;
                                }
                                break;
                            case '5000000':
                                switch ($no_children) {
                                    case '1':
                                        $rateused = $rate->m2 + ($rate->op * 3);
                                        break;
                                    case '2':
                                        $rateused = $rate->m3 + ($rate->op * 4);
                                        break;
                                    case '3':
                                        $rateused = $rate->m4 + ($rate->op * 5);
                                        break;
                                    case '4':
                                        $rateused = $rate->m5 + ($rate->op * 6);
                                        break;
                                    case '5':
                                        $rateused = $rate->m5 + $rate->extra_dependant + ($rate->op * 7);
                                        break;
                                    case '6':
                                        $rateused = $rate->m5 + $rate->extra_dependant + $rate->extra_dependant + ($rate->op * 8);
                                        break;

                                    default:
                                        $rateused = $rate->m1 + ($rate->op * 2);
                                        break;
                                }
                                break;
                            case '7500000':
                                switch ($no_children) {
                                    case '1':
                                        $rateused = $rate->m2 + ($rate->op * 3);
                                        break;
                                    case '2':
                                        $rateused = $rate->m3 + ($rate->op * 4);
                                        break;
                                    case '3':
                                        $rateused = $rate->m4 + ($rate->op * 5);
                                        break;
                                    case '4':
                                        $rateused = $rate->m5 + ($rate->op * 6);
                                        break;
                                    case '5':
                                        $rateused = $rate->m5 + $rate->extra_dependant + ($rate->op * 7);
                                        break;
                                    case '6':
                                        $rateused = $rate->m5 + $rate->extra_dependant + $rate->extra_dependant + ($rate->op * 8);
                                        break;

                                    default:
                                        $rateused = $rate->m1 + ($rate->op * 2);
                                        break;
                                }
                                break;
                            case '10000000':
                                switch ($no_children) {
                                    case '1':
                                        $rateused = $rate->m2 + ($rate->op * 3);
                                        break;
                                    case '2':
                                        $rateused = $rate->m3 + ($rate->op * 4);
                                        break;
                                    case '3':
                                        $rateused = $rate->m4 + ($rate->op * 5);
                                        break;
                                    case '4':
                                        $rateused = $rate->m5 + ($rate->op * 6);
                                        break;
                                    case '5':
                                        $rateused = $rate->m5 + $rate->extra_dependant + ($rate->op * 7);
                                        break;
                                    case '6':
                                        $rateused = $rate->m5 + $rate->extra_dependant + $rate->extra_dependant + ($rate->op * 8);
                                        break;

                                    default:
                                        $rateused = $rate->m1 + ($rate->op * 2);
                                        break;
                                }
                                break;
                            case '20000000':
                                switch ($no_children) {
                                    case '1':
                                        $rateused = $rate->m2 + ($rate->op * 3);
                                        break;
                                    case '2':
                                        $rateused = $rate->m3 + ($rate->op * 4);
                                        break;
                                    case '3':
                                        $rateused = $rate->m4 + ($rate->op * 5);
                                        break;
                                    case '4':
                                        $rateused = $rate->m5 + ($rate->op * 6);
                                        break;
                                    case '5':
                                        $rateused = $rate->m5 + $rate->extra_dependant + ($rate->op * 7);
                                        break;
                                    case '6':
                                        $rateused = $rate->m5 + $rate->extra_dependant + $rate->extra_dependant + ($rate->op * 8);
                                        break;

                                    default:
                                        $rateused = $rate->m1 + ($rate->op * 2);
                                        break;
                                }
                                break;
                            case '40000000':
                                switch ($no_children) {
                                    case '1':
                                        $rateused = $rate->m2 + ($rate->op * 3);
                                        break;
                                    case '2':
                                        $rateused = $rate->m3 + ($rate->op * 4);
                                        break;
                                    case '3':
                                        $rateused = $rate->m4 + ($rate->op * 5);
                                        break;
                                    case '4':
                                        $rateused = $rate->m5 + ($rate->op * 6);
                                        break;
                                    case '5':
                                        $rateused = $rate->m5 + $rate->extra_dependant + ($rate->op * 7);
                                        break;
                                    case '6':
                                        $rateused = $rate->m5 + $rate->extra_dependant + $rate->extra_dependant + ($rate->op * 8);
                                        break;

                                    default:
                                        $rateused = $rate->m1 + ($rate->op * 2);
                                        break;
                                }
                                break;
                            case '60000000':
                                switch ($no_children) {
                                    case '1':
                                        $rateused = $rate->m2 + ($rate->op * 3);
                                        break;
                                    case '2':
                                        $rateused = $rate->m3 + ($rate->op * 4);
                                        break;
                                    case '3':
                                        $rateused = $rate->m4 + ($rate->op * 5);
                                        break;
                                    case '4':
                                        $rateused = $rate->m5 + ($rate->op * 6);
                                        break;
                                    case '5':
                                        $rateused = $rate->m5 + $rate->extra_dependant + ($rate->op * 7);
                                        break;
                                    case '6':
                                        $rateused = $rate->m5 + $rate->extra_dependant + $rate->extra_dependant + ($rate->op * 8);
                                        break;

                                    default:
                                        $rateused = $rate->m1 + ($rate->op * 2);
                                        break;
                                }
                                break;
                            default:
                                switch ($no_children) {
                                    case '1':
                                        $rateused = $rate->m2 + ($rate->op * 3);
                                        break;
                                    case '2':
                                        $rateused = $rate->m3 + ($rate->op * 4);
                                        break;
                                    case '3':
                                        $rateused = $rate->m4 + ($rate->op * 5);
                                        break;
                                    case '4':
                                        $rateused = $rate->m5 + ($rate->op * 6);
                                        break;
                                    case '5':
                                        $rateused = $rate->m5 + $rate->extra_dependant + ($rate->op * 7);
                                        break;
                                    case '6':
                                        $rateused = $rate->m5 + $rate->extra_dependant + $rate->extra_dependant + ($rate->op * 8);
                                        break;

                                    default:
                                        $rateused = $rate->m1 + ($rate->op * 2);
                                        break;
                                }
                                break;
                        }
                    }
                    $computedrate = [
                        'basicpremium' => $healthratesgen->calculate($rateused, $ip, $no_children, $preexisting, $dob, $age, $cover_type, $currentage, $cover_details),
                        'rateused' => $rateused,
                        'productID' => $rate->product_id,
                        'product_name' => $rate->name,
                        'product_description' => $rate->product_description,
                        'product_brochure' => $rate->product_brochure,
                        'has_benefits' => $rate->has_benefits,
                        'maternity' => $rate->maternity,
                        'dental' => $rate->dental,
                        'optical' => $rate->optical,
                        'underwriter' => $rate->company,
                        'image' => $rate->logo,
                        'paybill' => $rate->paybill,
                        'method' => $rate->method,
                        'account_number' => $rate->account_number,
                        'account_name' => $rate->account_name,
                        'branch_code' => $rate->branch_code,
                        'paypalemail' => $rate->paypalemail,
                        'category' => $rate->category,
                        'cover' => $cover_details,
                        'cover_type' => $cover_type,
                        'age_bracket' => $rate->age_limits_min . '-' . $rate->age_limits_max,
                        'rate' => $rate
                    ];
                    $resultArray[] = $computedrate;
                }
                return response()->json([
                    'products' => $resultArray,
                ]);
                break;

            case 'me-spouse-children':
                foreach ($rates as $rate) {

                    if (in_array($rate->product_id, $checkJubilee, TRUE)) {
                        switch ($ip) {
                            case '200000':
                                switch ($no_children) {
                                    case '2':
                                        $rateused = ($rate->child * 2) + $rate->m +  ($rate->op * 3);
                                        break;
                                    case '3':
                                        $rateused = ($rate->child * 3) + $rate->m +  ($rate->op * 4);
                                        break;
                                    case '4':
                                        $rateused = ($rate->child * 4) + $rate->m +  ($rate->op * 5);
                                        break;
                                    case '5':
                                        $rateused = ($rate->child * 5) + $rate->m +  ($rate->op * 6);
                                        break;
                                    case '6':
                                        $rateused = ($rate->child * 6) + $rate->m +  ($rate->op * 7);
                                        break;

                                    default:
                                        $rateused = $rate->child + $rate->m +  ($rate->op * 2);
                                        break;
                                }
                                break;
                            case '300000':
                                switch ($no_children) {
                                    case '2':
                                        $rateused = ($rate->child * 2) + $rate->m +  ($rate->op * 3);
                                        break;
                                    case '3':
                                        $rateused = ($rate->child * 3) + $rate->m +  ($rate->op * 4);
                                        break;
                                    case '4':
                                        $rateused = ($rate->child * 4) + $rate->m +  ($rate->op * 5);
                                        break;
                                    case '5':
                                        $rateused = ($rate->child * 5) + $rate->m +  ($rate->op * 6);
                                        break;
                                    case '6':
                                        $rateused = ($rate->child * 6) + $rate->m +  ($rate->op * 7);
                                        break;

                                    default:
                                        $rateused = $rate->child + $rate->m +  ($rate->op * 2);
                                        break;
                                }
                                break;
                            case '400000':
                                switch ($no_children) {
                                    case '2':
                                        $rateused = ($rate->child * 2) + $rate->m +  ($rate->op * 3);
                                        break;
                                    case '3':
                                        $rateused = ($rate->child * 3) + $rate->m +  ($rate->op * 4);
                                        break;
                                    case '4':
                                        $rateused = ($rate->child * 4) + $rate->m +  ($rate->op * 5);
                                        break;
                                    case '5':
                                        $rateused = ($rate->child * 5) + $rate->m +  ($rate->op * 6);
                                        break;
                                    case '6':
                                        $rateused = ($rate->child * 6) + $rate->m +  ($rate->op * 7);
                                        break;

                                    default:
                                        $rateused = $rate->child + $rate->m +  ($rate->op * 2);
                                        break;
                                }
                                break;
                            case '500000':
                                switch ($no_children) {
                                    case '2':
                                        $rateused = ($rate->child * 2) + $rate->m +  ($rate->op * 3);
                                        break;
                                    case '3':
                                        $rateused = ($rate->child * 3) + $rate->m +  ($rate->op * 4);
                                        break;
                                    case '4':
                                        $rateused = ($rate->child * 4) + $rate->m +  ($rate->op * 5);
                                        break;
                                    case '5':
                                        $rateused = ($rate->child * 5) + $rate->m +  ($rate->op * 6);
                                        break;
                                    case '6':
                                        $rateused = ($rate->child * 6) + $rate->m +  ($rate->op * 7);
                                        break;

                                    default:
                                        $rateused = $rate->child + $rate->m +  ($rate->op * 2);
                                        break;
                                }
                                break;
                            case '750000':
                                switch ($no_children) {
                                    case '2':
                                        $rateused = ($rate->child * 2) + $rate->m +  ($rate->op * 3);
                                        break;
                                    case '3':
                                        $rateused = ($rate->child * 3) + $rate->m +  ($rate->op * 4);
                                        break;
                                    case '4':
                                        $rateused = ($rate->child * 4) + $rate->m +  ($rate->op * 5);
                                        break;
                                    case '5':
                                        $rateused = ($rate->child * 5) + $rate->m +  ($rate->op * 6);
                                        break;
                                    case '6':
                                        $rateused = ($rate->child * 6) + $rate->m +  ($rate->op * 7);
                                        break;

                                    default:
                                        $rateused = $rate->child + $rate->m +  ($rate->op * 2);
                                        break;
                                }
                                break;
                            case '1000000':
                                switch ($no_children) {
                                    case '2':
                                        $rateused = ($rate->child * 2) + $rate->m +  ($rate->op * 3);
                                        break;
                                    case '3':
                                        $rateused = ($rate->child * 3) + $rate->m +  ($rate->op * 4);
                                        break;
                                    case '4':
                                        $rateused = ($rate->child * 4) + $rate->m +  ($rate->op * 5);
                                        break;
                                    case '5':
                                        $rateused = ($rate->child * 5) + $rate->m +  ($rate->op * 6);
                                        break;
                                    case '6':
                                        $rateused = ($rate->child * 6) + $rate->m +  ($rate->op * 7);
                                        break;

                                    default:
                                        $rateused = $rate->child + $rate->m +  ($rate->op * 2);
                                        break;
                                }
                                break;
                            case '2000000':
                                switch ($no_children) {
                                    case '2':
                                        $rateused = ($rate->child * 2) + $rate->m +  ($rate->op * 3);
                                        break;
                                    case '3':
                                        $rateused = ($rate->child * 3) + $rate->m +  ($rate->op * 4);
                                        break;
                                    case '4':
                                        $rateused = ($rate->child * 4) + $rate->m +  ($rate->op * 5);
                                        break;
                                    case '5':
                                        $rateused = ($rate->child * 5) + $rate->m +  ($rate->op * 6);
                                        break;
                                    case '6':
                                        $rateused = ($rate->child * 6) + $rate->m +  ($rate->op * 7);
                                        break;

                                    default:
                                        $rateused = $rate->child + $rate->m +  ($rate->op * 2);
                                        break;
                                }
                                break;
                            case '3000000':
                                switch ($no_children) {
                                    case '2':
                                        $rateused = ($rate->child * 2) + $rate->m +  ($rate->op * 3);
                                        break;
                                    case '3':
                                        $rateused = ($rate->child * 3) + $rate->m +  ($rate->op * 4);
                                        break;
                                    case '4':
                                        $rateused = ($rate->child * 4) + $rate->m +  ($rate->op * 5);
                                        break;
                                    case '5':
                                        $rateused = ($rate->child * 5) + $rate->m +  ($rate->op * 6);
                                        break;
                                    case '6':
                                        $rateused = ($rate->child * 6) + $rate->m +  ($rate->op * 7);
                                        break;

                                    default:
                                        $rateused = $rate->child + $rate->m +  ($rate->op * 2);
                                        break;
                                }
                                break;
                            case '4000000':
                                switch ($no_children) {
                                    case '2':
                                        $rateused = ($rate->child * 2) + $rate->m +  ($rate->op * 3);
                                        break;
                                    case '3':
                                        $rateused = ($rate->child * 3) + $rate->m +  ($rate->op * 4);
                                        break;
                                    case '4':
                                        $rateused = ($rate->child * 4) + $rate->m +  ($rate->op * 5);
                                        break;
                                    case '5':
                                        $rateused = ($rate->child * 5) + $rate->m +  ($rate->op * 6);
                                        break;
                                    case '6':
                                        $rateused = ($rate->child * 6) + $rate->m +  ($rate->op * 7);
                                        break;

                                    default:
                                        $rateused = $rate->child + $rate->m +  ($rate->op * 2);
                                        break;
                                }
                                break;
                            case '5000000':
                                switch ($no_children) {
                                    case '2':
                                        $rateused = ($rate->child * 2) + $rate->m +  ($rate->op * 3);
                                        break;
                                    case '3':
                                        $rateused = ($rate->child * 3) + $rate->m +  ($rate->op * 4);
                                        break;
                                    case '4':
                                        $rateused = ($rate->child * 4) + $rate->m +  ($rate->op * 5);
                                        break;
                                    case '5':
                                        $rateused = ($rate->child * 5) + $rate->m +  ($rate->op * 6);
                                        break;
                                    case '6':
                                        $rateused = ($rate->child * 6) + $rate->m +  ($rate->op * 7);
                                        break;

                                    default:
                                        $rateused = $rate->child + $rate->m +  ($rate->op * 2);
                                        break;
                                }
                                break;
                            case '7500000':
                                switch ($no_children) {
                                    case '2':
                                        $rateused = ($rate->child * 2) + $rate->m +  ($rate->op * 3);
                                        break;
                                    case '3':
                                        $rateused = ($rate->child * 3) + $rate->m +  ($rate->op * 4);
                                        break;
                                    case '4':
                                        $rateused = ($rate->child * 4) + $rate->m +  ($rate->op * 5);
                                        break;
                                    case '5':
                                        $rateused = ($rate->child * 5) + $rate->m +  ($rate->op * 6);
                                        break;
                                    case '6':
                                        $rateused = ($rate->child * 6) + $rate->m +  ($rate->op * 7);
                                        break;

                                    default:
                                        $rateused = $rate->child + $rate->m +  ($rate->op * 2);
                                        break;
                                }
                                break;
                            case '10000000':
                                switch ($no_children) {
                                    case '2':
                                        $rateused = ($rate->child * 2) + $rate->m +  ($rate->op * 3);
                                        break;
                                    case '3':
                                        $rateused = ($rate->child * 3) + $rate->m +  ($rate->op * 4);
                                        break;
                                    case '4':
                                        $rateused = ($rate->child * 4) + $rate->m +  ($rate->op * 5);
                                        break;
                                    case '5':
                                        $rateused = ($rate->child * 5) + $rate->m +  ($rate->op * 6);
                                        break;
                                    case '6':
                                        $rateused = ($rate->child * 6) + $rate->m +  ($rate->op * 7);
                                        break;

                                    default:
                                        $rateused = $rate->child + $rate->m +  ($rate->op * 2);
                                        break;
                                }
                                break;
                            case '20000000':
                                switch ($no_children) {
                                    case '2':
                                        $rateused = ($rate->child * 2) + $rate->m +  ($rate->op * 3);
                                        break;
                                    case '3':
                                        $rateused = ($rate->child * 3) + $rate->m +  ($rate->op * 4);
                                        break;
                                    case '4':
                                        $rateused = ($rate->child * 4) + $rate->m +  ($rate->op * 5);
                                        break;
                                    case '5':
                                        $rateused = ($rate->child * 5) + $rate->m +  ($rate->op * 6);
                                        break;
                                    case '6':
                                        $rateused = ($rate->child * 6) + $rate->m +  ($rate->op * 7);
                                        break;

                                    default:
                                        $rateused = $rate->child + $rate->m +  ($rate->op * 2);
                                        break;
                                }
                                break;
                            case '40000000':
                                switch ($no_children) {
                                    case '2':
                                        $rateused = ($rate->child * 2) + $rate->m +  ($rate->op * 3);
                                        break;
                                    case '3':
                                        $rateused = ($rate->child * 3) + $rate->m +  ($rate->op * 4);
                                        break;
                                    case '4':
                                        $rateused = ($rate->child * 4) + $rate->m +  ($rate->op * 5);
                                        break;
                                    case '5':
                                        $rateused = ($rate->child * 5) + $rate->m +  ($rate->op * 6);
                                        break;
                                    case '6':
                                        $rateused = ($rate->child * 6) + $rate->m +  ($rate->op * 7);
                                        break;

                                    default:
                                        $rateused = $rate->child + $rate->m +  ($rate->op * 2);
                                        break;
                                }
                                break;
                            case '60000000':
                                switch ($no_children) {
                                    case '2':
                                        $rateused = ($rate->child * 2) + $rate->m +  ($rate->op * 3);
                                        break;
                                    case '3':
                                        $rateused = ($rate->child * 3) + $rate->m +  ($rate->op * 4);
                                        break;
                                    case '4':
                                        $rateused = ($rate->child * 4) + $rate->m +  ($rate->op * 5);
                                        break;
                                    case '5':
                                        $rateused = ($rate->child * 5) + $rate->m +  ($rate->op * 6);
                                        break;
                                    case '6':
                                        $rateused = ($rate->child * 6) + $rate->m +  ($rate->op * 7);
                                        break;

                                    default:
                                        $rateused = $rate->child + $rate->m +  ($rate->op * 2);
                                        break;
                                }
                                break;
                            default:
                                switch ($no_children) {
                                    case '2':
                                        $rateused = ($rate->child * 2) + $rate->m +  ($rate->op * 3);
                                        break;
                                    case '3':
                                        $rateused = ($rate->child * 3) + $rate->m +  ($rate->op * 4);
                                        break;
                                    case '4':
                                        $rateused = ($rate->child * 4) + $rate->m +  ($rate->op * 5);
                                        break;
                                    case '5':
                                        $rateused = ($rate->child * 5) + $rate->m +  ($rate->op * 6);
                                        break;
                                    case '6':
                                        $rateused = ($rate->child * 6) + $rate->m +  ($rate->op * 7);
                                        break;

                                    default:
                                        $rateused = $rate->child + $rate->m +  ($rate->op * 2);
                                        break;
                                }
                                break;
                        }
                    } else {
                        switch ($ip) {
                            case '200000':
                                switch ($no_children) {
                                    case '2':
                                        $rateused = $rate->m2 +  ($rate->op * 3);
                                        break;
                                    case '3':
                                        $rateused = $rate->m3 +  ($rate->op * 4);
                                        break;
                                    case '4':
                                        $rateused = $rate->m4 +  ($rate->op * 5);
                                        break;
                                    case '5':
                                        $rateused = $rate->m5 +  ($rate->op * 6);
                                        break;
                                    case '6':
                                        $rateused = $rate->m5 + $rate->extra_dependant +  ($rate->op * 7);
                                        break;

                                    default:
                                        $rateused = $rate->m1 +  ($rate->op * 2);
                                        break;
                                }
                                break;
                            case '300000':
                                switch ($no_children) {
                                    case '2':
                                        $rateused = $rate->m2 +  ($rate->op * 3);
                                        break;
                                    case '3':
                                        $rateused = $rate->m3 +  ($rate->op * 4);
                                        break;
                                    case '4':
                                        $rateused = $rate->m4 +  ($rate->op * 5);
                                        break;
                                    case '5':
                                        $rateused = $rate->m5 +  ($rate->op * 6);
                                        break;
                                    case '6':
                                        $rateused = $rate->m5 + $rate->extra_dependant +  ($rate->op * 7);
                                        break;

                                    default:
                                        $rateused = $rate->m1 +  ($rate->op * 2);
                                        break;
                                }
                                break;
                            case '400000':
                                switch ($no_children) {
                                    case '2':
                                        $rateused = $rate->m2 +  ($rate->op * 3);
                                        break;
                                    case '3':
                                        $rateused = $rate->m3 +  ($rate->op * 4);
                                        break;
                                    case '4':
                                        $rateused = $rate->m4 +  ($rate->op * 5);
                                        break;
                                    case '5':
                                        $rateused = $rate->m5 +  ($rate->op * 6);
                                        break;
                                    case '6':
                                        $rateused = $rate->m5 + $rate->extra_dependant +  ($rate->op * 7);
                                        break;

                                    default:
                                        $rateused = $rate->m1 +  ($rate->op * 2);
                                        break;
                                }
                                break;
                            case '500000':
                                switch ($no_children) {
                                    case '2':
                                        $rateused = $rate->m2 +  ($rate->op * 3);
                                        break;
                                    case '3':
                                        $rateused = $rate->m3 +  ($rate->op * 4);
                                        break;
                                    case '4':
                                        $rateused = $rate->m4 +  ($rate->op * 5);
                                        break;
                                    case '5':
                                        $rateused = $rate->m5 +  ($rate->op * 6);
                                        break;
                                    case '6':
                                        $rateused = $rate->m5 + $rate->extra_dependant +  ($rate->op * 7);
                                        break;

                                    default:
                                        $rateused = $rate->m1 +  ($rate->op * 2);
                                        break;
                                }
                                break;
                            case '750000':
                                switch ($no_children) {
                                    case '2':
                                        $rateused = $rate->m2 +  ($rate->op * 3);
                                        break;
                                    case '3':
                                        $rateused = $rate->m3 +  ($rate->op * 4);
                                        break;
                                    case '4':
                                        $rateused = $rate->m4 +  ($rate->op * 5);
                                        break;
                                    case '5':
                                        $rateused = $rate->m5 +  ($rate->op * 6);
                                        break;
                                    case '6':
                                        $rateused = $rate->m5 + $rate->extra_dependant +  ($rate->op * 7);
                                        break;

                                    default:
                                        $rateused = $rate->m1 +  ($rate->op * 2);
                                        break;
                                }
                                break;
                            case '1000000':
                                switch ($no_children) {
                                    case '2':
                                        $rateused = $rate->m2 +  ($rate->op * 3);
                                        break;
                                    case '3':
                                        $rateused = $rate->m3 +  ($rate->op * 4);
                                        break;
                                    case '4':
                                        $rateused = $rate->m4 +  ($rate->op * 5);
                                        break;
                                    case '5':
                                        $rateused = $rate->m5 +  ($rate->op * 6);
                                        break;
                                    case '6':
                                        $rateused = $rate->m5 + $rate->extra_dependant +  ($rate->op * 7);
                                        break;

                                    default:
                                        $rateused = $rate->m1 +  ($rate->op * 2);
                                        break;
                                }
                                break;
                            case '2000000':
                                switch ($no_children) {
                                    case '2':
                                        $rateused = $rate->m2 +  ($rate->op * 3);
                                        break;
                                    case '3':
                                        $rateused = $rate->m3 +  ($rate->op * 4);
                                        break;
                                    case '4':
                                        $rateused = $rate->m4 +  ($rate->op * 5);
                                        break;
                                    case '5':
                                        $rateused = $rate->m5 +  ($rate->op * 6);
                                        break;
                                    case '6':
                                        $rateused = $rate->m5 + $rate->extra_dependant +  ($rate->op * 7);
                                        break;

                                    default:
                                        $rateused = $rate->m1 +  ($rate->op * 2);
                                        break;
                                }
                                break;
                            case '3000000':
                                switch ($no_children) {
                                    case '2':
                                        $rateused = $rate->m2 +  ($rate->op * 3);
                                        break;
                                    case '3':
                                        $rateused = $rate->m3 +  ($rate->op * 4);
                                        break;
                                    case '4':
                                        $rateused = $rate->m4 +  ($rate->op * 5);
                                        break;
                                    case '5':
                                        $rateused = $rate->m5 +  ($rate->op * 6);
                                        break;
                                    case '6':
                                        $rateused = $rate->m5 + $rate->extra_dependant +  ($rate->op * 7);
                                        break;

                                    default:
                                        $rateused = $rate->m1 +  ($rate->op * 2);
                                        break;
                                }
                                break;
                            case '4000000':
                                switch ($no_children) {
                                    case '2':
                                        $rateused = $rate->m2 +  ($rate->op * 3);
                                        break;
                                    case '3':
                                        $rateused = $rate->m3 +  ($rate->op * 4);
                                        break;
                                    case '4':
                                        $rateused = $rate->m4 +  ($rate->op * 5);
                                        break;
                                    case '5':
                                        $rateused = $rate->m5 +  ($rate->op * 6);
                                        break;
                                    case '6':
                                        $rateused = $rate->m5 + $rate->extra_dependant +  ($rate->op * 7);
                                        break;

                                    default:
                                        $rateused = $rate->m1 +  ($rate->op * 2);
                                        break;
                                }
                                break;
                            case '5000000':
                                switch ($no_children) {
                                    case '2':
                                        $rateused = $rate->m2 +  ($rate->op * 3);
                                        break;
                                    case '3':
                                        $rateused = $rate->m3 +  ($rate->op * 4);
                                        break;
                                    case '4':
                                        $rateused = $rate->m4 +  ($rate->op * 5);
                                        break;
                                    case '5':
                                        $rateused = $rate->m5 +  ($rate->op * 6);
                                        break;
                                    case '6':
                                        $rateused = $rate->m5 + $rate->extra_dependant +  ($rate->op * 7);
                                        break;

                                    default:
                                        $rateused = $rate->m1 +  ($rate->op * 2);
                                        break;
                                }
                                break;
                            case '7500000':
                                switch ($no_children) {
                                    case '2':
                                        $rateused = $rate->m2 +  ($rate->op * 3);
                                        break;
                                    case '3':
                                        $rateused = $rate->m3 +  ($rate->op * 4);
                                        break;
                                    case '4':
                                        $rateused = $rate->m4 +  ($rate->op * 5);
                                        break;
                                    case '5':
                                        $rateused = $rate->m5 +  ($rate->op * 6);
                                        break;
                                    case '6':
                                        $rateused = $rate->m5 + $rate->extra_dependant +  ($rate->op * 7);
                                        break;

                                    default:
                                        $rateused = $rate->m1 +  ($rate->op * 2);
                                        break;
                                }
                                break;
                            case '10000000':
                                switch ($no_children) {
                                    case '2':
                                        $rateused = $rate->m2 +  ($rate->op * 3);
                                        break;
                                    case '3':
                                        $rateused = $rate->m3 +  ($rate->op * 4);
                                        break;
                                    case '4':
                                        $rateused = $rate->m4 +  ($rate->op * 5);
                                        break;
                                    case '5':
                                        $rateused = $rate->m5 +  ($rate->op * 6);
                                        break;
                                    case '6':
                                        $rateused = $rate->m5 + $rate->extra_dependant +  ($rate->op * 7);
                                        break;

                                    default:
                                        $rateused = $rate->m1 +  ($rate->op * 2);
                                        break;
                                }
                                break;
                            case '20000000':
                                switch ($no_children) {
                                    case '2':
                                        $rateused = $rate->m2 +  ($rate->op * 3);
                                        break;
                                    case '3':
                                        $rateused = $rate->m3 +  ($rate->op * 4);
                                        break;
                                    case '4':
                                        $rateused = $rate->m4 +  ($rate->op * 5);
                                        break;
                                    case '5':
                                        $rateused = $rate->m5 +  ($rate->op * 6);
                                        break;
                                    case '6':
                                        $rateused = $rate->m5 + $rate->extra_dependant +  ($rate->op * 7);
                                        break;

                                    default:
                                        $rateused = $rate->m1 +  ($rate->op * 2);
                                        break;
                                }
                                break;
                            case '40000000':
                                switch ($no_children) {
                                    case '2':
                                        $rateused = $rate->m2 +  ($rate->op * 3);
                                        break;
                                    case '3':
                                        $rateused = $rate->m3 +  ($rate->op * 4);
                                        break;
                                    case '4':
                                        $rateused = $rate->m4 +  ($rate->op * 5);
                                        break;
                                    case '5':
                                        $rateused = $rate->m5 +  ($rate->op * 6);
                                        break;
                                    case '6':
                                        $rateused = $rate->m5 + $rate->extra_dependant +  ($rate->op * 7);
                                        break;

                                    default:
                                        $rateused = $rate->m1 +  ($rate->op * 2);
                                        break;
                                }
                                break;
                            case '60000000':
                                switch ($no_children) {
                                    case '2':
                                        $rateused = $rate->m2 +  ($rate->op * 3);
                                        break;
                                    case '3':
                                        $rateused = $rate->m3 +  ($rate->op * 4);
                                        break;
                                    case '4':
                                        $rateused = $rate->m4 +  ($rate->op * 5);
                                        break;
                                    case '5':
                                        $rateused = $rate->m5 +  ($rate->op * 6);
                                        break;
                                    case '6':
                                        $rateused = $rate->m5 + $rate->extra_dependant +  ($rate->op * 7);
                                        break;

                                    default:
                                        $rateused = $rate->m1 +  ($rate->op * 2);
                                        break;
                                }
                                break;
                            default:
                                switch ($no_children) {
                                    case '2':
                                        $rateused = $rate->m2 +  ($rate->op * 3);
                                        break;
                                    case '3':
                                        $rateused = $rate->m3 +  ($rate->op * 4);
                                        break;
                                    case '4':
                                        $rateused = $rate->m4 +  ($rate->op * 5);
                                        break;
                                    case '5':
                                        $rateused = $rate->m5 +  ($rate->op * 6);
                                        break;
                                    case '6':
                                        $rateused = $rate->m5 + $rate->extra_dependant +  ($rate->op * 7);
                                        break;

                                    default:
                                        $rateused = $rate->m1 +  ($rate->op * 2);
                                        break;
                                }
                                break;
                        }
                    }
                    $computedrate = [
                        'basicpremium' => $healthratesgen->calculate($rateused, $ip, $no_children, $preexisting, $dob, $age, $cover_type, $currentage, $cover_details),
                        'rateused' => $rateused,
                        'productID' => $rate->product_id,
                        'product_name' => $rate->name,
                        'product_description' => $rate->product_description,
                        'product_brochure' => $rate->product_brochure,
                        'has_benefits' => $rate->has_benefits,
                        'maternity' => $rate->maternity,
                        'dental' => $rate->dental,
                        'optical' => $rate->optical,
                        'underwriter' => $rate->company,
                        'image' => $rate->logo,
                        'paybill' => $rate->paybill,
                        'method' => $rate->method,
                        'account_number' => $rate->account_number,
                        'account_name' => $rate->account_name,
                        'branch_code' => $rate->branch_code,
                        'paypalemail' => $rate->paypalemail,
                        'category' => $rate->category,
                        'cover' => $cover_details,
                        'cover_type' => $cover_type,
                        'age_bracket' => $rate->age_limits_min . '-' . $rate->age_limits_max,
                        'rate' => $rate
                    ];
                    $resultArray[] = $computedrate;
                }
                return response()->json([
                    'products' => $resultArray,
                ]);
                break;

            case 'couple':
                foreach ($rates as $rate) {
                    if (in_array($rate->product_id, $checkJubilee, TRUE)) {
                        switch ($ip) {
                            case '200000':
                                $rateused = $rate->m + $rate->spouse + ($rate->op * 2);
                                break;
                            case '300000':
                                $rateused = $rate->m + $rate->spouse + ($rate->op * 2);
                                break;
                            case '400000':
                                $rateused = $rate->m + $rate->spouse + ($rate->op * 2);
                                break;
                            case '500000':
                                $rateused = $rate->m + $rate->spouse + ($rate->op * 2);
                                break;
                            case '750000':
                                $rateused = $rate->m + $rate->spouse + ($rate->op * 2);
                                break;
                            case '1000000':
                                $rateused = $rate->m + $rate->spouse + ($rate->op * 2);
                                break;
                            case '2000000':
                                $rateused = $rate->m + $rate->spouse + ($rate->op * 2);
                                break;
                            case '3000000':
                                $rateused = $rate->m + $rate->spouse + ($rate->op * 2);
                                break;
                            case '4000000':
                                $rateused = $rate->m + $rate->spouse + ($rate->op * 2);
                                break;
                            case '5000000':
                                $rateused = $rate->m + $rate->spouse + ($rate->op * 2);
                                break;
                            case '7500000':
                                $rateused = $rate->m + $rate->spouse + ($rate->op * 2);
                                break;
                            case '10000000':
                                $rateused = $rate->m + $rate->spouse + ($rate->op * 2);
                                break;
                            case '20000000':
                                $rateused = $rate->m + $rate->spouse + ($rate->op * 2);
                                break;
                            case '40000000':
                                $rateused = $rate->m + $rate->spouse + ($rate->op * 2);
                                break;
                            case '60000000':
                                $rateused = $rate->m + $rate->spouse + ($rate->op * 2);
                                break;
                            default:
                                $rateused = $rate->m + $rate->spouse + ($rate->op * 2);
                                break;
                        }
                    } else {
                        switch ($ip) {
                            case '200000':
                                $rateused = $rate->m1 + ($rate->op * 2);
                                break;
                            case '300000':
                                $rateused = $rate->m1 + ($rate->op * 2);
                                break;
                            case '400000':
                                $rateused = $rate->m1 + ($rate->op * 2);
                                break;
                            case '500000':
                                $rateused = $rate->m1 + ($rate->op * 2);
                                break;
                            case '750000':
                                $rateused = $rate->m1 + ($rate->op * 2);
                                break;
                            case '1000000':
                                $rateused = $rate->m1 + ($rate->op * 2);
                                break;
                            case '2000000':
                                $rateused = $rate->m1 + ($rate->op * 2);
                                break;
                            case '3000000':
                                $rateused = $rate->m1 + ($rate->op * 2);
                                break;
                            case '4000000':
                                $rateused = $rate->m1 + ($rate->op * 2);
                                break;
                            case '5000000':
                                $rateused = $rate->m1 + ($rate->op * 2);
                                break;
                            case '7500000':
                                $rateused = $rate->m1 + ($rate->op * 2);
                                break;
                            case '10000000':
                                $rateused = $rate->m1 + ($rate->op * 2);
                                break;
                            case '20000000':
                                $rateused = $rate->m1 + ($rate->op * 2);
                                break;
                            case '40000000':
                                $rateused = $rate->m1 + ($rate->op * 2);
                                break;
                            case '60000000':
                                $rateused = $rate->m1 + ($rate->op * 2);
                                break;
                            default:
                                $rateused = $rate->m1 + ($rate->op * 2);
                                break;
                        }
                    }
                    $computedrate = [
                        'basicpremium' => $healthratesgen->calculate($rateused, $ip, $no_children, $preexisting, $dob, $age, $cover_type, $rate, $cover_details),
                        'rateused' => $rateused,
                        'productID' => $rate->product_id,
                        'product_name' => $rate->name,
                        'product_description' => $rate->product_description,
                        'product_brochure' => $rate->product_brochure,
                        'has_benefits' => $rate->has_benefits,
                        'maternity' => $rate->maternity,
                        'dental' => $rate->dental,
                        'optical' => $rate->optical,
                        'underwriter' => $rate->company,
                        'image' => $rate->logo,
                        'paybill' => $rate->paybill,
                        'method' => $rate->method,
                        'account_number' => $rate->account_number,
                        'account_name' => $rate->account_name,
                        'branch_code' => $rate->branch_code,
                        'paypalemail' => $rate->paypalemail,
                        'category' => $rate->category,
                        'cover' => $cover_details,
                        'cover_type' => $cover_type,
                        'age_bracket' => $rate->age_limits_min . '-' . $rate->age_limits_max,
                        'rate' => $rate
                    ];
                    $resultArray[] = $computedrate;
                }
                return response()->json([
                    'products' => $resultArray,
                ]);
                break;

            default:
                foreach ($rates as $rate) {
                    if (in_array($rate->product_id, $checkJubilee, TRUE)) {
                        switch ($ip) {
                            case '200000':
                                $rateused =  $rate->m;
                                break;
                            case '300000':
                                $rateused =  $rate->m;
                                break;
                            case '400000':
                                $rateused =  $rate->m;
                                break;
                            case '500000':
                                $rateused =  $rate->m + $rate->op;
                                break;
                            case '750000':
                                $rateused =  $rate->m + $rate->op;
                                break;
                            case '1000000':
                                $rateused =  $rate->m + $rate->op;
                                break;
                            case '2000000':
                                $rateused =  $rate->m + $rate->op;
                                break;
                            case '3000000':
                                $rateused =  $rate->m + $rate->op;
                                break;
                            case '4000000':
                                $rateused =  $rate->m + $rate->op;
                                break;
                            case '5000000':
                                $rateused =  $rate->m + $rate->op;
                                break;
                            case '7500000':
                                $rateused =  $rate->m + $rate->op;
                                break;
                            case '10000000':
                                $rateused =  $rate->m + $rate->op;
                                break;
                            case '20000000':
                                $rateused =  $rate->m + $rate->op;
                                break;
                            case '40000000':
                                $rateused =  $rate->m + $rate->op;
                                break;
                            case '60000000':
                                $rateused =  $rate->m + $rate->op;
                                break;
                            default:
                                $rateused =  $rate->m + $rate->op;
                                break;
                        }
                    } else {
                        switch ($ip) {
                            case '200000':
                                $rateused =  $rate->m + $rate->op;
                                break;
                            case '300000':
                                $rateused =  $rate->m + $rate->op;
                                break;
                            case '400000':
                                $rateused =  $rate->m + $rate->op;
                                break;
                            case '500000':
                                $rateused =  $rate->m + $rate->op;
                                break;
                            case '750000':
                                $rateused =  $rate->m + $rate->op;
                                break;
                            case '1000000':
                                $rateused =  $rate->m + $rate->op;
                                break;
                            case '2000000':
                                $rateused =  $rate->m + $rate->op;
                                break;
                            case '3000000':
                                $rateused =  $rate->m + $rate->op;
                                break;
                            case '4000000':
                                $rateused =  $rate->m + $rate->op;
                                break;
                            case '5000000':
                                $rateused =  $rate->m + $rate->op;
                                break;
                            case '7500000':
                                $rateused =  $rate->m + $rate->op;
                                break;
                            case '10000000':
                                $rateused =  $rate->m + $rate->op;
                                break;
                            case '20000000':
                                $rateused =  $rate->m + $rate->op;
                                break;
                            case '40000000':
                                $rateused =  $rate->m + $rate->op;
                                break;
                            case '60000000':
                                $rateused =  $rate->m + $rate->op;
                                break;
                            default:
                                $rateused =  $rate->m + $rate->op;
                                break;
                        }
                    }
                    $computedrate = [
                        'basicpremium' => $healthratesgen->calculate($rateused, $ip, $no_children, $preexisting, $dob, $age, $cover_type, $currentage, $cover_details),
                        'rateused' => $rateused,
                        'productID' => $rate->product_id,
                        'product_name' => $rate->name,
                        'product_description' => $rate->product_description,
                        'product_brochure' => $rate->product_brochure,
                        'has_benefits' => $rate->has_benefits,
                        'maternity' => $rate->maternity,
                        'dental' => $rate->dental,
                        'optical' => $rate->optical,
                        'underwriter' => $rate->company,
                        'image' => $rate->logo,
                        'paybill' => $rate->paybill,
                        'method' => $rate->method,
                        'account_number' => $rate->account_number,
                        'account_name' => $rate->account_name,
                        'branch_code' => $rate->branch_code,
                        'paypalemail' => $rate->paypalemail,
                        'category' => $rate->category,
                        'cover' => $cover_details,
                        'cover_type' => $cover_type,
                        'age_bracket' => $rate->age_limits_min . '-' . $rate->age_limits_max,
                        'rate' => $rate
                    ];
                    $resultArray[] = $computedrate;
                }
                return response()->json([
                    'products' => $resultArray,
                ]);
                break;
        }
    }

    /**
     * OrderDomestic
     *
     * @param  mixed $request
     * @return void
     */
    public function OrderDomestic(Request $request)
    {
        //Quote
        $quotation = new Quotation();
        $quotation->quotation_number = MotorHelper::getQuotationNumber();
        $quotation->product_id = $request->data['productID'];
        $quotation->total_price = number_format($request->data['basicpremium']['premium']);
        $quotation->levies = number_format($request->data['basicpremium']['levies']);
        $quotation->premium = number_format($request->data['basicpremium']['premium']);
        $quotation->stamp_duty = $request->data['basicpremium']['stamp_duty'];
        $quotation->personal_accident = $request->personal_accident;
        $quotation->occupier_liability = $request->occupier_liability;
        $quotation->owners_liability = $request->owners_liability;
        $quotation->what_is_insured =  $request->what_to_insure;
        $quotation->wiba_servants_indoor = $request->wiba_servants_indoor;
        $quotation->wiba_servants_outdoor =  $request->wiba_servants_outdoor;
        $quotation->content_value = $request->content_value;
        $quotation->building_value = $request->building_value;
        $quotation->domestic_type = $request->domestic_type;
        $quotation->cover_type = $request->cover_type;
        $quotation->location = $request->location;
        $quotation->quotation_type = MotorHelper::C1;
        $quotation->status = 'not paid';
        $quotation->save();
        //     $user = User::whereHas('roles',function ($query){
        //        $query->where('roles.id','=',1);
        //    })->first();
        //     $user->notify(new NewQuotation($quotation));
        return response()->json([
            'quotation_number' => $quotation->quotation_number,
            'quotation_id' => $quotation->id,
            'status' => 200
        ]);
    }

    /**
     * OrderHealth
     *
     * @param  mixed $request
     * @return void
     */
    public function OrderHealth(Request $request)
    {
        //Quote
        $quotation = new Quotation();
        $quotation->quotation_number = MotorHelper::getQuotationNumber();
        $quotation->product_id = $request->productID;
        $quotation->total_price = number_format($request->total);
        $quotation->levies = number_format($request->levies);
        $quotation->premium = number_format($request->premium);
        $quotation->stamp_duty = $request->stamp_duty;
        $quotation->inpatient = $request->ip;
        $quotation->maternity = $request->maternity;
        $quotation->dental = $request->dental;
        $quotation->optical = $request->optical;
        $quotation->pre_existing = $request->pre_existing;
        $quotation->pre_existing_details = $request->pre_existing_details;
        $quotation->children = $request->children;
        $quotation->cover_details =  $request->cover_details;
        $quotation->dob = $request->dob;
        $quotation->age =  Carbon::now()->format('Y') - Str::substr($request->dob, 0, 4);;
        $quotation->cover_type = $request->cover_type;
        $quotation->quotation_type = MotorHelper::C2;
        $quotation->status = 'not paid';
        $quotation->save();
        //     $user = User::whereHas('roles',function ($query){
        //        $query->where('roles.id','=',1);
        //    })->first();
        //     $user->notify(new NewQuotation($quotation));
        return response()->json([
            'quotation_number' => $quotation->quotation_number,
            'quotation_id' => $quotation->id,
            'status' => 200
        ]);
    }

    public function healthcorporatepurchase(Request $request)
    {
        $this->validate($request, [
            'company' => 'required',
            'contact_person' => 'required',
            'telephone' => 'required',
            'no_employees' => 'required',
            'ip' => 'required',
            'op' => 'required',
            'underwriter_id' => 'required',
            'email' => 'required|email',
        ]);
        $corp = new CorporateHealth();
        $corp->company = $request->company;
        $corp->contact_person = $request->contact_person;
        $corp->telephone = MotorHelper::formatMobileNumber($request->telephone);
        $corp->no_employees = $request->no_employees;
        $corp->ip = $request->ip;
        $corp->op = $request->op;
        $corp->underwriter_id = $request->underwriter_id;
        $corp->email = $request->email;
        $corp->status = CorporateHealth::REQUESTED;
        $corp->save();
        $emailContent = [
            'first_name' => $corp->company,
            'email' => $corp->email
        ];
        $this->sendCorporateWelcomeEmail($emailContent);
        return response()->json([
            'message' => 'we have sent you an email, kindly check for more information'
        ]);
    }

    public function getadmins()
    {
        $user = User::whereHas('roles', function ($query) {
            $query->where('roles.id', '=', 1);
        })->first();
        $admins = $user->roles->where('id', 1)->first();
        return $user;
    }

    protected function sendCorporateWelcomeEmail($emailContent)
    {
        try {
            Mail::to($emailContent['email'])
            ->bcc('boaz@dsc.co.ke')
            ->bcc('dsccreatives@gmail.com')
                ->send(new CorporateOrder($emailContent));
            echo 'Mail sent Successfully';
        } catch (\Exception $e) {
            echo 'Error - ' . $e;
        }
    }

    public function travelQuote(Request $request)
    {
        $this->validate($request, [
            'travel_duration' => 'required',
            'names'  => 'required',
            'travellers' => 'required',
            'cellphone' => 'required',
            'destination' => 'required',
            'purpose' => 'required',
            'age' => 'required',
            'email' => 'required|email',
        ]);
        $travel = new Travel();
        $travel->travel_duration_from = $request->travel_duration[0];
        $travel->travel_duration_to = $request->travel_duration[1];
        $travel->names = $request->names;
        $travel->travellers = $request->travellers;
        $travel->cellphone = MotorHelper::formatMobileNumber($request->cellphone);
        $travel->destination = $request->destination;
        $travel->purpose = $request->purpose;
        $travel->age = $request->age;
        $travel->email = $request->email;
        $travel->status = Travel::PENDINGQUOTES;
        $travel->save();
        try {
            Notification::route('mail', 'info@insulink.co.ke')
                ->notify(new TravelQuote($travel));
            echo 'Mail sent Successfully';
        } catch (\Exception $e) {
            echo 'Error - ' . $e;
        }
        return response()->json([
            'message' => 'Request sent! We will respond to your email soon',
            'status' => 200
        ]);
    }

    public function otherProducts(Request $request)
    {
        $this->validate($request, [
            'names'  => 'required',
            'cellphone' => 'required|numeric|min:10',
            'email' => 'required|email',
        ]);
        $cleanup = str_replace('-', ' ', $request->product);
        $product = new Lead();
        $product->lead_no = MotorHelper::getLeadNumber();
        $product->cellphone = MotorHelper::formatMobileNumber($request->cellphone);
        $product->email = $request->email;
        $product->names = $request->names;
        $product->underwriter_id = $request->underwriter;
        $product->product = ucwords(str_replace('/', '', $cleanup));
        $product->status = 'New';
        $product->save();
        $details = [
            'products' => $product,
            'underwriter' => Underwriter::where('id', $product->underwriter_id)->first()
        ];
        try {
            Mail::to($product->email)->send(new notifyproductcustomer($product));
            $admins = User::where('super_user', 1)->get();
            foreach ($admins as $admin) {
                Mail::to($admin->email)->bcc('info@insulink.co.ke')->send(new NotifyProductAdmin($details));
            }
        } catch (\Throwable $th) {
            //throw $th;
            echo 'Error - ' . $th;
        }
        return response()->json([
            'message' => 'Request sent! We will respond to your email soon',
            'status' => 200
        ]);
    }

    /**
     * sendfleetform
     *
     * @param  mixed $request
     * @return void
     */
    public function sendfleetform(Request $request)
    {

        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'fleet' => 'required',
            'cover_type' => 'required'
        ]);

        $fleet = new Commercialfleet();
        $fleet->name = $request->name;
        $fleet->email = $request->email;
        $fleet->phone = $request->phone;
        $fleet->fleet = $request->fleet;
        $fleet->cover_type = $request->cover_type;
        $fleet->status_backoffice = 'request received';
        $fleet->save();
        try {
            Notification::route('mail', 'info@insulink.co.ke')
                ->route('mail', 'boaz@dsc.co.ke')
                ->notify(new MotorCommercialQuote($fleet));
            echo 'Mail sent Successfully';
        } catch (\Exception $e) {
            echo 'Error - ' . $e;
        }
        return response()->json(['message' => 'We have received your Quote Request, we shall get back to you soon via email, thanks']);
    }
}
