<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Quotation extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        $loggeduser = Auth::user()->id;
        $loggedcustomer = Customer::where('user_id', $loggeduser)->first();
        $quotations = Quotation::with('products', 'customer')->where('customer_id', $loggedcustomer->id)->get();
        return view('components.quotation', compact('quotations'));
    }
}
