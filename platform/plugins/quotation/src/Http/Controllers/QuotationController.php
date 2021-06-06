<?php

namespace Botble\Quotation\Http\Controllers;

use Exception;
use Carbon\Carbon;
use Botble\ACL\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Botble\Base\Forms\FormBuilder;
use Botble\Quotation\Models\Quotation;
use Theme\Insulink\Http\Models\Payment;
use Theme\Insulink\Http\Models\Customer;
use Botble\Quotation\Forms\QuotationForm;
use Botble\Base\Events\CreatedContentEvent;
use Botble\Base\Events\DeletedContentEvent;
use Botble\Base\Events\UpdatedContentEvent;
use Botble\Quotation\Tables\QuotationTable;
use Theme\Insulink\Dsc\Helpers\MotorHelper;
use Theme\Insulink\Http\Models\Underwriter;
use Botble\Base\Events\BeforeEditContentEvent;
use Theme\Insulink\Http\Models\HealthDependant;
use Botble\Base\Http\Controllers\BaseController;
use Botble\Base\Http\Responses\BaseHttpResponse;
use Theme\Insulink\Http\Models\CustomerDocument;
use Botble\Quotation\Http\Requests\QuotationRequest;
use Botble\Quotation\Repositories\Interfaces\QuotationInterface;

class QuotationController extends BaseController
{
    /**
     * @var QuotationInterface
     */
    protected $quotationRepository;

    /**
     * @param QuotationInterface $quotationRepository
     */
    // public function __construct(QuotationInterface $quotationRepository)
    // {
    //     $this->quotationRepository = $quotationRepository;
    // }

    /**
     * @param QuotationTable $table
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Throwable
     */
    public function index()
    {
        page_title()->setTitle(trans('plugins/quotation::quotation.name'));
        $quotations = Quotation::with('customers', 'products')->get();
        return view('plugins/quotation::quotations.index', compact('quotations'));
    }

    /**
     * @param FormBuilder $formBuilder
     * @return string
     */
    public function cleanUp(Request $request, BaseHttpResponse $response)
    {
        $cleanup = Quotation::where('customer_id', '=', null)->get();
        $ids = $cleanup->pluck('id');
        if (empty($ids)) {
            return $response
                ->setError()
                ->setMessage(trans('core/base::notices.no_select'));
        }

        foreach ($ids as $id) {
            $quotation = Quotation::findOrFail($id);
            $quotation->delete();
            event(new DeletedContentEvent(QUOTATION_MODULE_SCREEN_NAME, $request, $quotation));
        }

        return redirect()->back();
    }

    /**
     * @param QuotationRequest $request
     * @param BaseHttpResponse $response
     * @return BaseHttpResponse
     */
    public function store(QuotationRequest $request, BaseHttpResponse $response)
    {
        $quotation = $this->quotationRepository->createOrUpdate($request->input());

        event(new CreatedContentEvent(QUOTATION_MODULE_SCREEN_NAME, $request, $quotation));

        return $response
            ->setPreviousUrl(route('quotation.index'))
            ->setNextUrl(route('quotation.edit', $quotation->id))
            ->setMessage(trans('core/base::notices.create_success_message'));
    }

    /**
     * @param $id
     * @param Request $request
     * @param FormBuilder $formBuilder
     * @return string
     */
    public function edit($id)
    {
        $quotation = Quotation::with('customers.users', 'products')->findOrFail($id);
        page_title()->setTitle(trans('plugins/quotation::quotation.edit') . ' / ' . $quotation->quotation_number);
        $underwriters = Underwriter::all();
        return view('plugins/quotation::quotations.edit', compact('quotation', 'underwriters'));
    }

    /**
     * @param $id
     * @param QuotationRequest $request
     * @param BaseHttpResponse $response
     * @return BaseHttpResponse
     */
    public function updateQuotation(Request $request, $id, BaseHttpResponse $response)
    {
        $quotation = Quotation::where('id', $id)->first();
        //dd($quotation);
        if ($quotation->cover_type == 'h1') {
            $quotation->total_price  = preg_replace('/[^A-Za-z0-9\-]/', '', $request->total_price);
            // $quotation->levies  = number_format($request->levies);
            // $quotation->premium  = number_format($request->premium);
            // $quotation->stamp_duty  = $request->stamp_duty;
            // $quotation->inpatient  = $request->ip;
            $quotation->maternity  = $request->maternity;
            $quotation->dental  = $request->dental;
            $quotation->optical  = $request->optical;
            $quotation->pre_existing  = $request->pre_existing;
            $quotation->pre_existing_details  = $request->pre_existing_details;
            $quotation->children  = $request->children;
            $quotation->cover_details  =  $request->cover_details;
            $quotation->dob  = $request->principal_dob;
            $quotation->age  =  Carbon::now()->format('Y') - Str::substr($request->principal_dob, 0, 4);
            //dd($updateHealthQuote);
            if ($quotation->save()) {
                //Update Customer
                $customer = Customer::where('id', $quotation->customer_id)->first();
                $customer->kra_number = $request->kra_number;
                $customer->document_number = $request->document_number;
                $customer->cellphone = $request->cellphone;
                $customer->users->email = $request->email;
                $customer->email = $request->email;
                //update User
                $user = User::where('id', $customer->user_id)->first();
                $user->first_name = $request->first_name;
                $user->last_name = $request->last_name;
                $user->email = $request->email;
                $user->save();
            }
            if ($customer->save()) {
                $dependant = HealthDependant::where('customer_id', $customer->id)->first();

                $depNames[] = $request->dependant_name;
                $depDob[] = $request->dependant_dob;
                $depRelate[] = $request->relationship;
                foreach ($depNames as $i => $value) {
                    $dependant->dependant_name = $value[$i];
                }
                foreach ($depDob as $i => $value) {
                    $dependant->dependant_dob = $value[$i];
                }
                foreach ($depRelate as $i => $value) {
                    $dependant->relationship = $value[$i];
                }

                $dependant->save();
            }
            if ($customer) {
                //Store documents
                $docs = CustomerDocument::where('customer_id', $customer->id)->first();
                $docs->customer_id = $customer->id;
                if ($request->has('copy_id')) {
                    $files = $request->file('copy_id');
                    $destination = 'documents/customer'; // upload path
                    $copy_id = $quotation->id . '-ID' . '.' . $files->getClientOriginalExtension();
                    $files->move($destination, $copy_id);
                    $docs->copy_id = $copy_id;
                }

                if ($request->has('copy_kra_certificate')) {
                    $doc = $request->file('copy_kra_certificate');
                    $destinationPath = 'documents/customer'; // upload path
                    $copy_kra_certificate = $quotation->id . '-kra' . '.' . $doc->getClientOriginalExtension();
                    $doc->move($destinationPath, $copy_kra_certificate);
                    $docs->copy_kra_certificate = $copy_kra_certificate;
                }

                $docs->save();
            }
        } else {
            $quotation->quotation_number = MotorHelper::getQuotationNumber();
            $quotation->total_price  = preg_replace('/[^A-Za-z0-9\-]/', '', $request->total_price);
            $quotation->road_rescue = $request->road_rescue;
            $quotation->excess_protector = $request->excess_protector;
            $quotation->pvt = $request->pvt;
            $quotation->loss_use = $request->loss_use;
            $quotation->value_of_vehicle = $request->value_of_vehicle;
            $quotation->cover_type = $request->cover_type;
            $quotation->quotation_type = MotorHelper::C1;
            if ($quotation->save()) {
                //Update Customer
                $customer = Customer::where('id', $quotation->customer_id)->first();
                $customer->kra_number = $request->kra_number;
                $customer->document_number = $request->document_number;
                $customer->cellphone = $request->cellphone;
                $customer->users->email = $request->email;
                $customer->email = $request->email;
                //update User
                $user = User::where('id', $customer->user_id)->first();
                $user->first_name = $request->first_name;
                $user->last_name = $request->last_name;
                $user->email = $request->email;
                $user->save();
                //Store documents
                $docs = CustomerDocument::where('customer_id', $customer->id)->first();
                $docs->customer_id = $customer->id;
                if ($request->has('logbook')) {
                    $file = $request->file('logbook');
                    $destinationPathe = 'documents/customer'; // upload path
                    $logbook = $quotation->id . '-logbook' . '.' . $file->getClientOriginalExtension();
                    $file->move($destinationPathe, $logbook);
                    $docs->logbook = $logbook;
                }

                if ($request->has('copy_id')) {
                    $files = $request->file('copy_id');
                    $destination = 'documents/customer'; // upload path
                    $copy_id = $quotation->id . '-ID' . '.' . $files->getClientOriginalExtension();
                    $files->move($destination, $copy_id);
                    $docs->copy_id = $copy_id;
                }

                if ($request->has('copy_kra_certificate')) {
                    $doc = $request->file('copy_kra_certificate');
                    $destinationPath = 'documents/customer'; // upload path
                    $copy_kra_certificate = $quotation->id . '-kra' . '.' . $doc->getClientOriginalExtension();
                    $doc->move($destinationPath, $copy_kra_certificate);
                    $docs->copy_kra_certificate = $copy_kra_certificate;
                }

                $docs->save();
            }
        }

        event(new UpdatedContentEvent(QUOTATION_MODULE_SCREEN_NAME, $request, $quotation));

        return $response
            ->setPreviousUrl(route('quotation.index'))
            ->setMessage(trans('core/base::notices.update_success_message'));
    }

    /**
     * @param $id
     * @param Request $request
     * @param BaseHttpResponse $response
     * @return BaseHttpResponse
     */
    public function destroy(Request $request, $id, BaseHttpResponse $response)
    {
        try {
            $quotation = $this->quotationRepository->findOrFail($id);

            $this->quotationRepository->delete($quotation);

            event(new DeletedContentEvent(QUOTATION_MODULE_SCREEN_NAME, $request, $quotation));

            return $response->setMessage(trans('core/base::notices.delete_success_message'));
        } catch (Exception $exception) {
            return $response
                ->setError()
                ->setMessage($exception->getMessage());
        }
    }
    public function show($id)
    {
        $quotation = Quotation::with('customers', 'products')->where('id', $id)->first();
        return view('plugins/quotation::quotations.show', compact('quotation'));
    }
    /**
     * @param Request $request
     * @param BaseHttpResponse $response
     * @return BaseHttpResponse
     * @throws Exception
     */
    public function deletes(Request $request, BaseHttpResponse $response)
    {
        $ids = $request->input('ids');
        if (empty($ids)) {
            return $response
                ->setError()
                ->setMessage(trans('core/base::notices.no_select'));
        }

        foreach ($ids as $id) {
            $quotation = $this->quotationRepository->findOrFail($id);
            $this->quotationRepository->delete($quotation);
            event(new DeletedContentEvent(QUOTATION_MODULE_SCREEN_NAME, $request, $quotation));
        }

        return $response->setMessage(trans('core/base::notices.delete_success_message'));
    }

    public function addPayment(Request $request, $id, BaseHttpResponse $response)
    {
        $quotation = Quotation::where('id', $id)->first();

        $payment = new Payment();
        $payment->quotation_id = $id;
        $payment->transaction_code = $request->transaction_code;
        $payment->policy_start_date = $request->policy_start_date;
        $payment->amount_paid = $request->amount_paid;
        $payment->date_paid = Carbon::now();
        $payment->phone_paid = $request->phone_paid;
        $amount = $request->amount_paid;
        $payment->balance =  $this->checkbalance($amount, $quotation);

        $payment->status = $this->checkstatus($amount, $quotation);;
        $payment->save();
        $quotation->update([
            'status' => $payment->status
        ]);
        event(new UpdatedContentEvent(QUOTATION_MODULE_SCREEN_NAME, $request, $quotation));

        return $response
            ->setNextUrl(route('quotation.index'))
            ->setMessage(trans('core/base::notices.update_success_message'));
    }

    private function checkbalance($amount, $quotation)
    {

        $price = str_replace(',', '', $quotation->total_price);
        $paidamount = str_replace(',', '', $amount);
        if ($paidamount >= $price) {
            $balance = 0;
        } else {
            $balance = $price - $paidamount;
        }
        return $balance;
    }

    private function checkstatus($amount, $quotation)
    {
        $price = str_replace(',', '', $quotation->total_price);
        $paidamount = str_replace(',', '', $amount);
        if ($paidamount >= $price) {
            $status = 'paid';
        } else {
            $status = 'balance remaining';
        }
        return $status;
    }
}
