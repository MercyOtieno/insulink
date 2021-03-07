<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;
use Theme\Insulink\Http\Models\Customer;
use Theme\Insulink\Http\Models\Quotation;

class QuotationComposer
{

    /**
     * The logged in user.
     *
     */
    protected $currentUser;

    /**
     * Constructor.
     *
     * @return void
     */
    public function __construct()
    {
        $this->currentUser = Auth::user();
    }
    public function compose(View $view)
    {
        
        dd($this->currentUser);
        $loggedcustomer = Customer::where('user_id', $loggeduser)->first();
        $quotations = Quotation::with('products', 'customer')->where('customer_id', $loggedcustomer->id)->get();
        $view->with('allquotations', $quotations);
    }
}