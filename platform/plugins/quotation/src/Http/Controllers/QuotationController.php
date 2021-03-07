<?php

namespace Botble\Quotation\Http\Controllers;

use Exception;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Botble\Base\Forms\FormBuilder;
use Botble\Quotation\Models\Quotation;
use Theme\Insulink\Http\Models\Payment;
use Botble\Quotation\Forms\QuotationForm;
use Botble\Base\Events\CreatedContentEvent;
use Botble\Base\Events\DeletedContentEvent;
use Botble\Base\Events\UpdatedContentEvent;
use Botble\Quotation\Tables\QuotationTable;
use Botble\Base\Events\BeforeEditContentEvent;
use Botble\Base\Http\Controllers\BaseController;
use Botble\Base\Http\Responses\BaseHttpResponse;
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
    public function __construct(QuotationInterface $quotationRepository)
    {
        $this->quotationRepository = $quotationRepository;
    }

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
    public function create(FormBuilder $formBuilder)
    {
        page_title()->setTitle(trans('plugins/quotation::quotation.create'));

        return $formBuilder->create(QuotationForm::class)->renderForm();
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
        $quotation = Quotation::with('customers', 'products')->findOrFail($id);
        page_title()->setTitle(trans('plugins/quotation::quotation.edit') . ' "' . $quotation->name . '"');

        return view('plugins/quotation::quotations.edit', compact('quotation'));
    }

    /**
     * @param $id
     * @param QuotationRequest $request
     * @param BaseHttpResponse $response
     * @return BaseHttpResponse
     */
    public function update($id, QuotationRequest $request, BaseHttpResponse $response)
    {
        $quotation = $this->quotationRepository->findOrFail($id);

        $quotation->fill($request->input());

        $this->quotationRepository->createOrUpdate($quotation);

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
    public function show($id) {
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

    public function addPayment(Request $request, $id, BaseHttpResponse $response) {
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
       
        $payment->status =$this->checkstatus($amount, $quotation);;
        $payment->save();
        $quotation->update([
            'status' => $payment->status
        ]);
        event(new UpdatedContentEvent(QUOTATION_MODULE_SCREEN_NAME, $request, $quotation));

        return $response
            ->setNextUrl(route('quotation.index'))
            ->setMessage(trans('core/base::notices.update_success_message'));
    }

    private function checkbalance($amount, $quotation) {
        
        $price = str_replace(',', '', $quotation->total_price);
        $paidamount = str_replace(',', '', $amount);
        if ($paidamount >=$price ) {
            $balance = 0;
        } else {
            $balance = $price - $paidamount;
        }
        return $balance;
    }

    private function checkstatus($amount, $quotation) {
        $price = str_replace(',', '', $quotation->total_price);
        $paidamount = str_replace(',', '', $amount);
        if ($paidamount >=$price ) {
            $status = 'paid';
        } else {
            $status = 'balance remaining';
        }
        return $status;
    }
}
