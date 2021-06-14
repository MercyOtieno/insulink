<?php

namespace Theme\Insulink\Http\Controllers;

use App\Models\Claim;
use Botble\ACL\Models\User;
use App\Mail\SendClaimAdmin;
use Illuminate\Http\Request;
use App\Mail\SendClaimCustomer;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Theme\Insulink\Dsc\Helpers\MotorHelper;

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
        return view('home');
    }

    public function fileClaim(Request $request) 
    {
        
        $this->validate($request, [
            'name' => 'required',
            'cellphone' => 'required',
            'email' => 'required',
            'policy_number' => 'required',
            'underwriter' => 'required',
            'police_abstract' => 'required|mimes:jpeg,png,jpg,gif,pdf',
            'driver_license' => 'required|mimes:jpeg,png,jpg,gif,pdf',
            'logbook' => 'required|mimes:jpeg,png,jpg,gif,pdf',
        ]);

        $claim = new Claim();
        $claim->names = $request->name;
        $claim->cellphone = $request->cellphone;
        $claim->email = $request->email;
        $claim->policy_number = $request->policy_number;
        $claim->underwriter = $request->underwriter;
        $claim->claim_number = MotorHelper::getClaimNumber();

        //upload Police abstract
        if ($request->has('police_abstract')) {
            $files = $request->file('police_abstract');
            $destination = 'documents/customer/claims'; // upload path
            $police_abstract = $request->policy_number . '-POLICEABSTRACT' . '.' . $files->getClientOriginalExtension();
            $files->move($destination, $police_abstract);
            $claim->police_abstract = $police_abstract;
        }
        //upload DL
        if ($request->has('driver_license')) {
            $doc = $request->file('driver_license');
            $destinationPath = 'documents/customer/claims'; // upload path
            $driver_license = $request->policy_number . '-DL' . '.' . $doc->getClientOriginalExtension();
            $doc->move($destinationPath, $driver_license);
            $claim->driver_license = $driver_license;
        }
        //upload logbook
        if ($request->has('logbook')) {
            $file = $request->file('logbook');
            $destinationPathe = 'documents/customer/claims'; // upload path
            $logbook = $request->policy_number . '-logbook' . '.' . $file->getClientOriginalExtension();
            $file->move($destinationPathe, $logbook);
            $claim->logbook = $logbook;
        }
        
        $claim->status = 'filed';
        $claim->save();
        $this->sendEmails($claim);
        $updateClaim = Claim::where('id', $claim->id)->first();
        $updateClaim->notification = 'email';
        $updateClaim->save();
        return response()->json([
            'status' => 200,
            'message' => 'Claim Filed successfully'
        ]);
    }


    private function sendEmails($claim)
    {
        try {
            //send mail to customer
            Mail::to($claim->email)->send(new SendClaimCustomer($claim));

            //send mail to admin
            $admins = User::where('super_user', 1)->get();
            foreach ($admins as $admin) {
                Mail::to($admin->email)->bcc('info@insulink.co.ke')
                ->send(new SendClaimAdmin($claim));
            }
        } catch (\Throwable $th) {
            //throw $th;
            echo 'Error - ' . $th;
        }
    }
}
