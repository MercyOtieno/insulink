<?php

namespace Theme\Insulink\Http\Controllers;

use Carbon\Carbon;
use App\Mail\WelcomeMail;
use Botble\ACL\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Botble\ACL\Traits\RegistersUsers;
use Illuminate\Auth\Events\Registered;
use Theme\Insulink\Http\Models\Customer;
use Theme\Insulink\Http\Models\Quotation;
use Theme\Insulink\Dsc\Helpers\MotorHelper;
use Theme\Insulink\Http\Models\VehicleBook;
use Theme\Insulink\Http\Models\HealthDependant;
use Botble\Base\Http\Responses\BaseHttpResponse;
use Theme\Insulink\Http\Models\CustomerDocument;
use Botble\ACL\Repositories\Interfaces\UserInterface;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Botble\Member\Notifications\ConfirmEmailNotification;

class CustomerController extends Controller
{   use ValidatesRequests;
    use RegistersUsers;

    protected $userRepository;

     public function __construct(UserInterface $userRepository) {
        $this->userRepository = $userRepository;
    }



    public function storemotor(Request $request, BaseHttpResponse $response) {
            $this->validate($request, [
                'name' => 'required',
                'email' => 'required|email',
                'cellphone' => 'required',
                'copy_id' => 'required|image|mimes:jpeg,png,jpg,gif',
                'copy_kra_certificate' => 'required|image|mimes:jpeg,png,jpg,gif',
                'logbook' => 'required|image|mimes:jpeg,png,jpg,gif',
                'kra_number' => array(
                    'required',
                    'regex:/^a\d{9}[a-z]$/i'
                ),
            ]);
            $dataset = $request->all();
            $userdata = $this->CreateUser($dataset);

            //create customer
            $customer = $this->CreateCustomer($dataset, $userdata);

            //Update Quotation
            $quotation = Quotation::where('id', $request->quotationId)->first();
            $quotation->customer_id = $customer->id;
            $quotation->update();

            //Create Vehicle
            $vehicle = new VehicleBook();
            $vehicle->customer_id = $customer->id;
            $vehicle->registration = Str::upper($request->registration);
            $vehicle->engine_no = $request->engine;
            $vehicle->chasis_no = $request->chassis;
            $vehicle->make_model = $request->makemodel;
            $vehicle->seating_capacity = $request->seat_capacity;
            $vehicle->cc = $request->cc;
            $vehicle->year_manufacture = $request->year_manufacture;
            $vehicle->value_of_vehicle = $request->value_vehicle;
            $vehicle->save();

            //Store documents
            $docs = new CustomerDocument();
            $docs->customer_id = $customer->id;
            $docs->vehicle_book_id = $vehicle->id;
            if ($request->has('copy_id')) {
                $files = $request->file('copy_id');
                $destination = 'documents/customer'; // upload path
                $copy_id = $request->quotationId . '-ID' . '.' . $files->getClientOriginalExtension();
                $files->move($destination, $copy_id);
                $docs->copy_id = $copy_id;
            }
            

            if ($request->has('copy_kra_certificate')) {
                $doc = $request->file('copy_kra_certificate');
                $destinationPath = 'documents/customer'; // upload path
                $copy_kra_certificate = $request->quotationId . '-kra' . '.' . $doc->getClientOriginalExtension();
                $doc->move($destinationPath, $copy_kra_certificate);
                $docs->copy_kra_certificate = $copy_kra_certificate;
            }

            if ($request->has('logbook')) {
                $file = $request->file('logbook');
                $destinationPathe = 'documents/customer'; // upload path
                $logbook = $request->quotationId . '-logbook' . '.' . $file->getClientOriginalExtension();
                $file->move($destinationPathe, $logbook);
                $docs->logbook = $logbook;
            }

            $docs->save();
            

            return response()->json([
                'number_plate' => $request->registration,
            ]);

    }
    public function storeDomestic(Request $request, BaseHttpResponse $response) {
        
            $this->validate($request, [
                'name' => 'required',
                'email' => 'required|email',
                'cellphone' => 'required',
                'copy_id' => 'required|image|mimes:jpeg,png,jpg,gif',
                'copy_kra_certificate' => 'required|image|mimes:jpeg,png,jpg,gif',
                'kra_number' => array(
                    'required',
                    'regex:/^a\d{9}[a-z]$/i'
                ),
            ]);
            $dataset = $request->all();
            $userdata = $this->CreateUser($dataset);

            //create customer
            $customer = $this->CreateCustomer($dataset, $userdata);

            //Update Quotation
            $quotation = Quotation::where('id', $request->quotationId)->first();
            $quotation->customer_id = $customer->id;
            $quotation->update();

            

            //Store documents
            $docs = new CustomerDocument();
            $docs->customer_id = $customer->id;
            if ($request->has('copy_id')) {
                $files = $request->file('copy_id');
                $destination = 'documents/customer'; // upload path
                $copy_id = $request->quotationId . '-ID' . '.' . $files->getClientOriginalExtension();
                $files->move($destination, $copy_id);
                $docs->copy_id = $copy_id;
            }

            if ($request->has('copy_kra_certificate')) {
                $doc = $request->file('copy_kra_certificate');
                $destinationPath = 'documents/customer'; // upload path
                $copy_kra_certificate = $request->quotationId . '-kra' . '.' . $doc->getClientOriginalExtension();
                $doc->move($destinationPath, $copy_kra_certificate);
                $docs->copy_kra_certificate = $copy_kra_certificate;
            }

            $docs->save();
            

            return;

    }

    public function storeHealth(Request $request, BaseHttpResponse $response) {
       //dd($request->copy_id);
            $this->validate($request, [
                'name' => 'required', "regex:/^[a-zA-Z'` ]+$/i",
                'email' => 'required', 'email', 'regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix',
                'copy_id' => 'required|image|mimes:jpeg,png,jpg,gif',
                'copy_kra_certificate' => 'required|image|mimes:jpeg,png,jpg,gif',
                'cellphone' => 'required',
                'kra_number' => array(
                    'required',
                    'regex:/^a\d{9}[a-z]$/i'
                ),
            ]);
            $dataset = $request->all();
            $userdata = $this->CreateUser($dataset);

            //create customer
            $customer = $this->CreateCustomer($dataset, $userdata);

            

            //Store Dependants
            if(!empty($request->dependants)){
                $mydependats = json_decode($request->dependants, true);
                foreach ($mydependats as $key => $value) {
                  $dependants = HealthDependant::create([
                            'customer_id' => $customer->id,
                            'dependant_name' => $value['name'],
                            'dependant_dob' => date('Y-m-d', strtotime($value['dob'])),
                            'relationship' =>$value['relationship'],
                        
                    ]);
                    // $checkfornull = $dependants->where('dependant_name', '=', null)->get();
                    // dd($checkfornull);
                    // if ($checkfornull) {
                    //     $checkfornull->delete();
                    // }
                }
            }

            //Store documents
            $docs = new CustomerDocument();
            $docs->customer_id = $customer->id;
            if ($request->has('copy_id')) {
                $files = $request->file('copy_id');
                $destination = 'documents/customer'; // upload path
                $copy_id = $request->quotationId . '-ID' . '.' . $files->getClientOriginalExtension();
                $files->move($destination, $copy_id);
                $docs->copy_id = $copy_id;
            }

            if ($request->has('copy_kra_certificate')) {
                $doc = $request->file('copy_kra_certificate');
                $destinationPath = 'documents/customer'; // upload path
                $copy_kra_certificate = $request->quotationId . '-kra' . '.' . $doc->getClientOriginalExtension();
                $doc->move($destinationPath, $copy_kra_certificate);
                $docs->copy_kra_certificate = $copy_kra_certificate;
            }

            $docs->save();
             //Update Quotation
            $quotation = Quotation::where('id', $request->quotationId)->first();
            $quotation->customer_id =  $docs->customer_id;
            $quotation->update();
            

            return response()->json(['message' => 'Customer Stored Successfully']);

    }

    /**
     * Get the guard to be used during registration.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return auth('customer');
    }
    
    /**
     * Create User
     *
     * @param  mixed $request
     * @return void
     */
    protected function CreateUser($dataset){
        //dd($dataset);
            $user = User::where('email', $dataset['email'])->first();
            if ($user == null || $user === null || !$user) {
               $name = explode(" ", $dataset['name']);
               $pw = $this->generatePassword();
               $newuser = new User();
               $newuser->username = $dataset['email'];
                $newuser->first_name = $name[0];
                $newuser->last_name = $name[1];
                $newuser->email = $dataset['email'];
                $newuser->password = bcrypt($pw);
                $newuser->save();
                $emailContent = [
                    'first_name' => $newuser->first_name,
                    'email' => $newuser->email,
                    'password' => $pw,
                    'user' => $newuser,
                ];
                //welcome email
                $this->sendWelcomeEmail($emailContent);
                return $newuser;
            } else{
                return $user;
            }
            
    }
    
    /**
     * Create Customer
     *
     * @param  mixed $request
     * @param  mixed $userdata
     * @return void
     */
    protected function CreateCustomer($dataset, $userdata) {
        $customer = Customer::where('email', $userdata->email)->first();
        $motorcovers = ['c1', 'c2', 'c3', 'c4', 'c5', 'c6', 'c7', 'c8', 'c9', 'c10', 'c11', 'c12'];
        if($customer) {
            return $customer;
        } else {
            if ($dataset['cover_type'] =='h1' || $dataset['cover_type'] =='h2') {
                $customer = new Customer();
                $customer->user_id = $userdata->id;
                $customer->cellphone = MotorHelper::formatMobileNumber($dataset['cellphone']);
                $customer->document_number = $dataset['document_number'];
                $customer->principal_dob = date('Y-m-d', strtotime($dataset['principal_dob']));
                $customer->kra_number = $dataset['kra_number'];
                $customer->email = $userdata['email'];
                $customer->pre_existing = $dataset['pre_existing'];
                $customer->save();
                return $customer;
            } elseif( in_array( $dataset['cover_type'], $motorcovers ) ) {
                $customer = new Customer();
                $customer->user_id = $userdata->id;
                $customer->cellphone = MotorHelper::formatMobileNumber($dataset['cellphone']);
                $customer->document_number = $dataset['document_number'];
                $customer->kra_number = $dataset['kra_number'];
                $customer->email = $userdata['email'];
                $customer->save();
                return $customer;
            }else {
                $customer = new Customer();
                $customer->user_id = $userdata->id;
                $customer->cellphone = MotorHelper::formatMobileNumber($dataset['cellphone']);
                $customer->document_number = $dataset['document_number'];
                $customer->kra_number = $dataset['kra_number'];
                $customer->email = $userdata['email'];
                $customer->save();
                return $customer;
            }
        }
        
        
        
        
    }
    /**
     * Send the confirmation code to a user.
     *
     * @param Member $member
     */
    protected function generatePassword()
    {
      // Generate random string and encrypt it. 
      return str_random(9);
    }

    protected function sendWelcomeEmail($emailContent)
    {
      // Generate a new reset password token
      $token = app('auth.password.broker')->createToken($emailContent['user']);
      try {
                Mail::to($emailContent['email'])
                    ->send(new WelcomeMail($emailContent));
                        echo 'Mail sent Successfully';
            } catch(\Exception $e) {
                echo 'Error - '. $e;
            }
      
    }
}