<?php

namespace Botble\Quotation\Http\Controllers;

use Botble\Base\Events\BeforeEditContentEvent;
use Botble\Quotation\Http\Requests\PaymentmethodRequest;
use Botble\Quotation\Repositories\Interfaces\PaymentmethodInterface;
use Botble\Base\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use Exception;
use Botble\Quotation\Tables\PaymentmethodTable;
use Botble\Base\Events\CreatedContentEvent;
use Botble\Base\Events\DeletedContentEvent;
use Botble\Base\Events\UpdatedContentEvent;
use Botble\Base\Http\Responses\BaseHttpResponse;
use Botble\Quotation\Forms\PaymentmethodForm;
use Botble\Base\Forms\FormBuilder;

class PaymentmethodController extends BaseController
{
    /**
     * @var PaymentmethodInterface
     */
    protected $paymentmethodRepository;

    /**
     * @param PaymentmethodInterface $paymentmethodRepository
     */
    public function __construct(PaymentmethodInterface $paymentmethodRepository)
    {
        $this->paymentmethodRepository = $paymentmethodRepository;
    }

    /**
     * @param PaymentmethodTable $table
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Throwable
     */
    public function index(PaymentmethodTable $table)
    {
        page_title()->setTitle(trans('plugins/quotation::paymentmethod.name'));

        return $table->renderTable();
    }

    /**
     * @param FormBuilder $formBuilder
     * @return string
     */
    public function create(FormBuilder $formBuilder)
    {
        page_title()->setTitle(trans('plugins/quotation::paymentmethod.create'));

        return $formBuilder->create(PaymentmethodForm::class)->renderForm();
    }

    /**
     * @param PaymentmethodRequest $request
     * @param BaseHttpResponse $response
     * @return BaseHttpResponse
     */
    public function store(PaymentmethodRequest $request, BaseHttpResponse $response)
    {
        $paymentmethod = $this->paymentmethodRepository->createOrUpdate($request->input());

        event(new CreatedContentEvent(PAYMENTMETHOD_MODULE_SCREEN_NAME, $request, $paymentmethod));

        return $response
            ->setPreviousUrl(route('paymentmethod.index'))
            ->setNextUrl(route('paymentmethod.edit', $paymentmethod->id))
            ->setMessage(trans('core/base::notices.create_success_message'));
    }

    /**
     * @param $id
     * @param Request $request
     * @param FormBuilder $formBuilder
     * @return string
     */
    public function edit($id, FormBuilder $formBuilder, Request $request)
    {
        $paymentmethod = $this->paymentmethodRepository->findOrFail($id);

        event(new BeforeEditContentEvent($request, $paymentmethod));

        page_title()->setTitle(trans('plugins/quotation::paymentmethod.edit') . ' "' . $paymentmethod->name . '"');

        return $formBuilder->create(PaymentmethodForm::class, ['model' => $paymentmethod])->renderForm();
    }

    /**
     * @param $id
     * @param PaymentmethodRequest $request
     * @param BaseHttpResponse $response
     * @return BaseHttpResponse
     */
    public function update($id, PaymentmethodRequest $request, BaseHttpResponse $response)
    {
        $paymentmethod = $this->paymentmethodRepository->findOrFail($id);

        $paymentmethod->fill($request->input());

        $this->paymentmethodRepository->createOrUpdate($paymentmethod);

        event(new UpdatedContentEvent(PAYMENTMETHOD_MODULE_SCREEN_NAME, $request, $paymentmethod));

        return $response
            ->setPreviousUrl(route('paymentmethod.index'))
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
            $paymentmethod = $this->paymentmethodRepository->findOrFail($id);

            $this->paymentmethodRepository->delete($paymentmethod);

            event(new DeletedContentEvent(PAYMENTMETHOD_MODULE_SCREEN_NAME, $request, $paymentmethod));

            return $response->setMessage(trans('core/base::notices.delete_success_message'));
        } catch (Exception $exception) {
            return $response
                ->setError()
                ->setMessage($exception->getMessage());
        }
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
            $paymentmethod = $this->paymentmethodRepository->findOrFail($id);
            $this->paymentmethodRepository->delete($paymentmethod);
            event(new DeletedContentEvent(PAYMENTMETHOD_MODULE_SCREEN_NAME, $request, $paymentmethod));
        }

        return $response->setMessage(trans('core/base::notices.delete_success_message'));
    }

    public function customerPayment(Request $request) {
        $payment = new Payment();
        $payment->quotation_id = $request->quotation_id;
        $payment->transaction_code = $request->transaction_code;
        $payment->policy_start_date = $request->policy_start_date;
        $payment->amount_paid = $request->amount_paid;
        $payment->date_paid = $request->date_paid;
        $payment->phone_paid = $request->phone_paid;
        $payment->status = 'pending confirmation';
        $payment->termsnconditions = $request->tnl;
        $payment->save();
        return response()->json('confirmation')->with([
            'success' => 'Payment Method added successfully',
            'status' => 200
        ]);
    }
}
