<?php

namespace Botble\Quotation\Http\Controllers;

use Auth;
use Exception;
use Illuminate\Http\Request;
use Botble\Quotation\Models\Product;
use Botble\Quotation\Models\HealthRate;
use Botble\Quotation\Models\Underwriter;
use Botble\Quotation\Models\Privaterates;
use Botble\Quotation\Models\Domesticrates;
use Botble\Base\Events\CreatedContentEvent;
use Botble\Base\Events\DeletedContentEvent;
use Botble\Base\Events\UpdatedContentEvent;
use Botble\Base\Events\BeforeEditContentEvent;
use Botble\Quotation\Tables\PrivateratesTable;
use Botble\Base\Http\Controllers\BaseController;
use Botble\Base\Http\Responses\BaseHttpResponse;
use Botble\Quotation\Http\Requests\PrivateratesRequest;

class RateController extends BaseController
{
    
    /**
     * @param PrivateratesTable $table
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Throwable
     */
     /**
     * Get all Privaterates
     */
    public function index()
    {
        return view('plugins/quotation::products.rates.index', ['rates' => Privaterates::all()]);
    }

    /**
     * Create Motor Rate Card
     */
    public function motorcreate($product)
    {   
        page_title()->setTitle(trans('plugins/quotation::general.rate.rate_create'));
        $product = Product::with('underwriters')->findOrFail($product);
        $products = Product::all();
        return view('plugins/quotation::products.rates.create', ['product' => $product, 'allproducts' => $product]);
    }

    public function motorstore(Request $request, BaseHttpResponse $response)
    {
       
        $this->validate($request, [
            'product_id' => 'required',
            'age_limit' => 'required',
            'rate_value_below' => 'numeric',
            'rate_value_above' => 'numeric',
        ]);

        $ratecard = new Privaterates();
        $ratecard->product_id = $request->product_id;
        $ratecard->rate_value_below = $request->rate_value_below;
        $ratecard->rate_value_above = $request->rate_value_above;
        $ratecard->age_limit = $request->age_limit;
         $ratecard->medical_expense = $request->medical_expense;
         $ratecard->windscreen = $request->windscreen;
         $ratecard->towing_recovery = $request->towing_recovery;
         $ratecard->entertainment = $request->entertainment;
         $ratecard->authorised_repair = $request->authorised_repair;
         $ratecard->per_event = $request->per_event;
         $ratecard->per_person = $request->per_person;
         $ratecard->tppd = $request->tppd;
         $ratecard->added_by = Auth::id();

         //Excess Protector
         if($request->excess_cond =="exclusive") {
                $ratecard->excess_protector = $request->excess_protector;
            } else {
                $ratecard->excess_protector = Privaterates::ISINCLUSIVE;
            }
        //Loss of use
        if($request->loss_use_cond =="exclusive") {
            $ratecard->loss_use = $request->loss_use;
        } else {
            $ratecard->loss_use = Privaterates::ISINCLUSIVE;
        }

        //Road Rescue
        if($request->rescue_cond =="exclusive") {
            $ratecard->road_rescue = $request->rescue;
        } else {
            $ratecard->road_rescue = Privaterates::ISINCLUSIVE;
        }
        //Riots
        if($request->riot_cond =="exclusive") {
            $ratecard->riot = $request->riot;
        } else {
            $ratecard->riot = Privaterates::ISINCLUSIVE;
        }

        //PVT
        if($request->pvt_cond =="exclusive") {
            $ratecard->political_terrorism = $request->terrorism;
        } else {
            $ratecard->political_terrorism = Privaterates::ISINCLUSIVE;
        }
         $ratecard->status = $request->status;
         
         $ratecard->save();

        event(new CreatedContentEvent(RATE_MODULE_SCREEN_NAME, $request, $ratecard));

        return $response
            ->setNextUrl(route('products.index'))
            ->setMessage(trans('core/base::notices.create_success_message'));
    }

    public function updateMotorPrivate(Request $request, Privaterates $ratecard, BaseHttpResponse $response) {

        $this->validate($request, [
            'product_id' => 'required'
        ]);
        $ratecard->update($request->all());

        event(new UpdatedContentEvent(RATE_MODULE_SCREEN_NAME, $request, $ratecard));

        return $response
            ->setNextUrl(route('products.index'))
            ->setMessage(trans('core/base::notices.update_success_message'));
    }

    public function domesticCreate($product){
        page_title()->setTitle('Add Domestic Rate');
        $product = Product::with('underwriters')->findOrFail($product);
        $products = Product::all();
        return view('plugins/quotation::products.rates.domesticcreate', ['product' => $product, 'allproducts' => $product]);
    }

    public function domesticstore(Request $request, BaseHttpResponse $response){
        $this->validate($request, [
            'product_id' => 'required',
        ]);

        $domestic = new Domesticrates();
        $domestic->building_rate = $request->building_rate;
        $domestic->items_rate = $request->items_rate;
        $domestic->allrisk_rate_a = $request->allrisk_rate_a;
        $domestic->allrisk_rate_b = $request->allrisk_rate_b;
        $domestic->product_id = $request->product_id;
        $domestic->status = $request->status;
        $domestic->rent_recievable = $request->rent_recievable;
        $domestic->machinery_breakdown_risk = $request->machinery_breakdown_risk;
        $domestic->wiba_servants_indoor = $request->wiba_servants_indoor;
        $domestic->wiba_servants_outdoor = $request->wiba_servants_outdoor;
        $domestic->employers_liability = $request->employers_liability;
        $domestic->occupiers_liability = $request->occupiers_liability;
        $domestic->owners_liability = $request->owners_liability;
        $domestic->personal_accident = $request->personal_accident;
        $domestic->home_office = $request->home_office;
        $domestic->terrorism_political = $request->terrorism_political;
        $domestic->added_by = Auth::id();
        $domestic->save();

        event(new CreatedContentEvent(RATE_MODULE_SCREEN_NAME, $request, $domestic));

        return $response
            ->setNextUrl(route('products.index'))
            ->setMessage(trans('core/base::notices.create_success_message'));
    }

    public function updateDomestic(Request $request, Domesticrates $ratecard, BaseHttpResponse $response) {

        $this->validate($request, [
            'product_id' => 'required'
        ]);
        $ratecard->update($request->all());

        event(new UpdatedContentEvent(RATE_MODULE_SCREEN_NAME, $request, $ratecard));

        return $response
            ->setNextUrl(route('products.index'))
            ->setMessage(trans('core/base::notices.update_success_message'));
    }

    public function healthCreate($product) {
        page_title()->setTitle('Add Domestic Rate');
        $product = Product::with('underwriters')->findOrFail($product);
        $products = Product::all();
        return view('plugins/quotation::products.rates.healthcreate', ['product' => $product, 'allproducts' => $product]);
    }

    public function healthStore(Request $request, BaseHttpResponse $response) {
         $this->validate($request, [
            'product_id' => 'required',
        ]);

        $health = new HealthRate();
        $health->m = $request->member_rate;
        $health->m1 = $request->member_plus_one_rate;
        $health->m2 = $request->member_plus_two_rate;
        $health->m3 = $request->member_plus_three_rate;
        $health->m4 = $request->member_plus_four_rate;
        $health->m5 = $request->member_plus_five_rate;
        $health->extra_dependant = $request->member_extra_rate;
        $health->ip = $request->member_ip_rate;
        $health->op = $request->member_op_rate;
        $health->maternity = $request->member_maternity_rate;
        $health->ip_accident = $request->ip_accident;
        $health->ip_illness = $request->ip_illness;
        $health->spouse = $request->spouse_rate;
        $health->child = $request->child_rate;
        $health->ip_marternity_complications = $request->ip_marternity_complications;
        $health->chronic_pre_existing = $request->chronic_pre_existing;
        $health->newlydiagnosedcondition = $request->newlydiagnosedcondition;
        $health->bed_limit = $request->bed_limit;
        $health->congenital_cond = $request->congenital_cond;
        $health->psychiatric = $request->psychiatric;
        $health->funeral = $request->funeral;
        $health->personal_accident = $request->personal_accident;
        $health->dental = $request->dental;
        $health->product_id = $request->product_id;
        $health->optical = $request->optical;
        $health->annual_checkup = $request->annual_checkup;
        $health->status = $request->status;
        $health->age_limits_min = $request->age_limits_min;
        $health->age_limits_max = $request->age_limits_max;
        $health->added_by = Auth::id();
        $health->save();

        event(new CreatedContentEvent(RATE_MODULE_SCREEN_NAME, $request, $health));

        return $response
            ->setNextUrl(route('products.index'))
            ->setMessage(trans('core/base::notices.create_success_message'));
    }

    public function updateHealth(Request $request, $rate, BaseHttpResponse $response) {

        $this->validate($request, [
            'product_id' => 'required'
        ]);
        $ratecard = HealthRate::findOrFail($rate);
        $ratecard->update($request->all());

        event(new UpdatedContentEvent(RATE_MODULE_SCREEN_NAME, $request, $ratecard));

        return $response
            ->setNextUrl(route('products.index'))
            ->setMessage(trans('core/base::notices.update_success_message'));
    }

    public function deleteHealth(Request $request, $ratecard, BaseHttpResponse $response){
        $rate = HealthRate::findOrFail($ratecard);
        $rate->delete();
        event(new DeletedContentEvent(RATE_MODULE_SCREEN_NAME, $request, $rate));

        return $response
            ->setNextUrl(route('products.index'))
            ->setMessage(trans('core/base::notices.delete_success_message'));
    }
}
