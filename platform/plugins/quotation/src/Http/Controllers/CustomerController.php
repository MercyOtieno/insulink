<?php

namespace Botble\Quotation\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Botble\Base\Forms\FormBuilder;
use Botble\Quotation\Models\Customer;
use Botble\Quotation\Forms\CustomerForm;
use Botble\Quotation\Tables\CustomerTable;
use Botble\Base\Events\CreatedContentEvent;
use Botble\Base\Events\DeletedContentEvent;
use Botble\Base\Events\UpdatedContentEvent;
use Botble\Base\Events\BeforeEditContentEvent;
use Botble\Base\Http\Controllers\BaseController;
use Botble\Base\Http\Responses\BaseHttpResponse;
use Botble\Quotation\Http\Requests\CustomerRequest;
use DB;

class CustomerController extends BaseController
{

    /**
     * @param CustomerTable $table
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Throwable
     */
    public function index()
    {
        page_title()->setTitle(trans('plugins/quotation::customer.name'));
        $customers = Customer::with('users','quotations')->get();
        // //$customers [] = DB::table('customers')
        //                 ->join('users', 'customers.user_id', '=','users.id')
        //                 ->join('quotations', 'quotations.customer_id', '=', 'customers.id')
        //                 ->join('products', 'products.id', '=', 'quotations.product_id')
        //                 ->select('products.*', 'quotations.*', 'users.*', 'customers.*')
        //                 ->groupBy('email')
        //                 ->get();
        return view('plugins/quotation::customers.index', compact('customers'));
    }

    /**
     * @param FormBuilder $formBuilder
     * @return string
     */
    public function create(FormBuilder $formBuilder)
    {
        page_title()->setTitle(trans('plugins/quotation::customer.create'));

        return $formBuilder->create(CustomerForm::class)->renderForm();
    }

    /**
     * @param CustomerRequest $request
     * @param BaseHttpResponse $response
     * @return BaseHttpResponse
     */
    public function store(CustomerRequest $request, BaseHttpResponse $response)
    {
        $customer = $this->customerRepository->createOrUpdate($request->input());

        event(new CreatedContentEvent(CUSTOMER_MODULE_SCREEN_NAME, $request, $customer));

        return $response
            ->setPreviousUrl(route('customer.index'))
            ->setNextUrl(route('customer.edit', $customer->id))
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
        $customer = $this->customerRepository->findOrFail($id);

        event(new BeforeEditContentEvent($request, $customer));

        page_title()->setTitle(trans('plugins/quotation::customer.edit') . ' "' . $customer->name . '"');

        return $formBuilder->create(CustomerForm::class, ['model' => $customer])->renderForm();
    }

    /**
     * @param $id
     * @param CustomerRequest $request
     * @param BaseHttpResponse $response
     * @return BaseHttpResponse
     */
    public function update($id, CustomerRequest $request, BaseHttpResponse $response)
    {
        $customer = $this->customerRepository->findOrFail($id);

        $customer->fill($request->input());

        $this->customerRepository->createOrUpdate($customer);

        event(new UpdatedContentEvent(CUSTOMER_MODULE_SCREEN_NAME, $request, $customer));

        return $response
            ->setPreviousUrl(route('customer.index'))
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
            $customer = $this->customerRepository->findOrFail($id);

            $this->customerRepository->delete($customer);

            event(new DeletedContentEvent(CUSTOMER_MODULE_SCREEN_NAME, $request, $customer));

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
            $customer = $this->customerRepository->findOrFail($id);
            $this->customerRepository->delete($customer);
            event(new DeletedContentEvent(CUSTOMER_MODULE_SCREEN_NAME, $request, $customer));
        }

        return $response->setMessage(trans('core/base::notices.delete_success_message'));
    }
}
