<?php

namespace Botble\Quotation\Http\Controllers;

use Assets;
use Exception;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Botble\Base\Forms\FormBuilder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\View\Factory;
use Botble\Quotation\Models\Underwriter;
use Botble\Quotation\Models\PaymentMethod;
use Botble\Base\Events\CreatedContentEvent;
use Botble\Base\Events\DeletedContentEvent;
use Botble\Base\Events\UpdatedContentEvent;
use Botble\Quotation\Forms\UnderwriterForm;
use Botble\Quotation\Tables\UnderwriterTable;
use Botble\Base\Events\BeforeEditContentEvent;
use Botble\Base\Http\Controllers\BaseController;
use Botble\Base\Http\Responses\BaseHttpResponse;
use Botble\Quotation\Http\Requests\UnderwriterRequest;
use Botble\Quotation\Repositories\Interfaces\UnderwriterInterface;

class UnderwriterController extends BaseController
{
    /**
     * @var UnderwriterInterface
     */
    protected $underwriterRepository;

    /**
     * @param UnderwriterInterface $underwriterRepository
     */
    public function __construct(UnderwriterInterface $underwriterRepository)
    {
        $this->underwriterRepository = $underwriterRepository;
    }

    /**
     * @param UnderwriterTable $table
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Throwable
     */
    public function index()
    {
        page_title()->setTitle(trans('plugins/quotation::underwriter.name'));
        $underwriters = Underwriter::all();
        return view('plugins/quotation::underwriters.index', compact('underwriters'));
    }

    /**
     * @param FormBuilder $formBuilder
     * @return string
     */
    public function create(FormBuilder $formBuilder)
    {
        page_title()->setTitle(trans('plugins/quotation::general.create'));

        return view('plugins/quotation::underwriters.create');
    }

    public function store(Request $request, BaseHttpResponse $response)
    {   
        
        $this->validate($request, [
            'company' => 'required',
            'email' => 'required',
            'phone' => 'required'
        ]);

        $files = $request->file('logo');
        $destinationPath = 'images/underwriter'; // upload path
        $logo = $request->company . '.' . $files->getClientOriginalExtension();
        $logopath = $files->move($destinationPath, $logo);

        $underwriter = Underwriter::create([
            'company' => $request->company,
            'api_key' => $request->api_key,
            'api_email' => $request->api_email,
            'api_password' => $request->api_password,
            'api_prod_url' => $request->api_prod_url,
            'api_uat_url' => $request->api_uat_url,
            'api_secret' => $request->api_secret,
            'address' => $request->address,
            'phone' => $request->phone,
            'email' => $request->email,
            'status' => Underwriter::ACTIVE,
            'logo' => $logo
        ]);
        event(new CreatedContentEvent(UNDERWRITER_MODULE_SCREEN_NAME, $request, $underwriter));

        return $response
            ->setNextUrl(route('underwriters.index'))
            ->setMessage(trans('core/base::notices.create_success_message'));
    }
    public function edit(Underwriter $underwriter) {
        return view('plugins/quotation::underwriters.edit', compact('underwriter'));
    }
    
    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $id
     * @param  mixed $response
     * @return void
     */
    public function update(Request $request, Underwriter $underwriter, BaseHttpResponse $response)
    {   
        if ($request->has('logo')) {
            $files = $request->file('logo');
            $destinationPath = 'images/underwriter'; // upload path
            $logo = $request->company . '.' . $files->getClientOriginalExtension();
            $logopath = $files->move($destinationPath, $logo);
            $underwriter->update(['logo' => $logo]);
        } 
        $underwriter->update([
            'company' => $request->company,
            'api_key' => $request->api_key,
            'api_email' => $request->api_email,
            'api_password' => $request->api_password,
            'api_prod_url' => $request->api_prod_url,
            'api_uat_url' => $request->api_uat_url,
            'api_secret' => $request->api_secret,
            'address' => $request->address,
            'phone' => $request->phone,
            'email' => $request->email,
            'status' => Underwriter::ACTIVE
        ]);
        

        
        event(new UpdatedContentEvent(UNDERWRITER_MODULE_SCREEN_NAME, $request, $underwriter));

        return $response
            ->setNextUrl(route('underwriters.index'))
            ->setMessage(trans('core/base::notices.update_success_message'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, BaseHttpResponse $response)
    {
        $underwriter = Underwriter::findOrFail($id);
        $underwriter->delete();
        return $response
            ->setNextUrl(route('underwriters.list'))
            ->setMessage(trans('core/base::notices.delete_success_message'));
    }

    public function AddPaymentMethod(Request $request, $id, BaseHttpResponse $response) {
        
        $payment = new PaymentMethod();
        $payment->paybill = $request->paybill;
        $payment->account_number = $request->account_number;
        $payment->account_name = $request->account_name;
        $payment->branch_code = $request->branch_code;
        $payment->paypalemail = $request->paypalemail;
        $payment->underwriter_id = $id;
        $payment->method = $request->method;
        $payment->added_by = Auth::user()->id;
        $payment->save();
        return $response
            ->setNextUrl(route('underwriters.index'))
            ->setMessage(trans('core/base::notices.create_success_message'));
    }
}
