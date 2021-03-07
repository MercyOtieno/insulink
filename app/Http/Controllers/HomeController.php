<?php

namespace App\Http\Controllers;

use Auth;
use View;
use Botble\ACL\Models\User;
use Illuminate\Http\Request;
use App\Rules\MatchOldPassword;
use App\Http\Controllers\Controller;
use Theme\Insulink\Http\Models\Customer;
use Theme\Insulink\Http\Models\Quotation;
use Botble\Base\Events\CreatedContentEvent;
use Botble\Base\Events\UpdatedContentEvent;
use Botble\Base\Http\Responses\BaseHttpResponse;

class HomeController extends Controller
{
    
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {   
        $loggeduser = Auth::user()->id;
        $loggedcustomer = Customer::where('user_id', $loggeduser)->first();
        $quotations = Quotation::with('products', 'customer')->where('customer_id', $loggedcustomer->id)->get();
        return view('home', compact('quotations'));
    }

    public function customerQuotations(){
        $loggeduser = Auth::user()->id;
        $loggedcustomer = Customer::where('user_id', $loggeduser)->first();
        $quotations = Quotation::with('products', 'customer')->where('customer_id', $loggedcustomer->id)->get();
        return view('quotations', compact('quotations'));
    }

    public function profile($id) {
        $loggeduser = Auth::user()->id;
        $loggedcustomer = Customer::where('user_id', $loggeduser)->first();
        $quotations = Quotation::with('products', 'customer')->where('customer_id', $loggedcustomer->id)->get();
        $user = User::where('id', $id)->first();
        return view('auth.profile', compact('user', 'quotations'));
    }

    public function updatepersonal(Request $request, $id) {
        $profile = User::findorfail($id);
        $profile->first_name = $request->first_name;
        $profile->last_name = $request->last_name;
        $profile->email = $request->email;

        $profile->update();
        return back()->with('success','Your Profile Infomation was Updated successfully!');
    }

    public function updatePassword(Request $request) {

        $request->validate([
            'current_password' => ['required', new MatchOldPassword],
            'new_password' => ['required'],
            'new_confirm_password' => ['same:new_password'],
        ]);
   
        User::find(auth()->user()->id)->update(['password'=> Hash::make($request->new_password)]);

        return back()->with('success','Your Password has been Updated successfully!');
    }

}
