<?php

namespace App\Http\Controllers;

use App\Models\AccountType;
use App\Models\CardType;
use App\Models\Customer;
use App\Models\CustomerAccount;
use App\Models\CustomerCard;
use App\Models\CustomerPersonal;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class AuthController extends Controller
{
    public function login(Request $request){
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('username', 'password');
        if (Auth::guard('customer')->attempt($credentials)) {
            return redirect()->intended('dashboard')
                        ->withSuccess('Signed in');
        }

        return redirect("/")->withSuccess('Login details are not valid');
    }

    public function logout(Request $request){
        Auth::guard('customer')->logout();
        return redirect('/');
    }


    public function register(Request $request){
        $customer = new Customer();
        $customer->username = $request->email;
        $customer->password = Hash::make($request->password);
        $customer->save();

        $selfie_picture = null;
        $identity_picture = null;
        $npwp_picture = null;

        if($request->hasFile('identity_photo')){
            $path = Storage::disk('s3')->put('uploads/', $request->file('identity_photo'));
            $path = Storage::url($path);
            $identity_picture = $path;
        }
        if($request->hasFile('selfie_photo')){
            $path = Storage::disk('s3')->put('uploads/', $request->file('selfie_photo'));
            $path = Storage::url($path);
            $selfie_picture = $path;
        }
        if($request->hasFile('npwp_photo')){
            $path = Storage::disk('s3')->put('uploads/', $request->file('npwp_photo'));
            $path = Storage::url($path);
            $npwp_picture = $path;
        }


        $customer_personal = new CustomerPersonal();
        $customer_personal->customer_id = $customer->id;
        $customer_personal->full_name = $request->first_name.' '.$request->last_name;
        $customer_personal->date_of_birth = Carbon::parse($request->date_of_birth)->format('Y-m-d');
        $customer_personal->place_of_birth = $request->place_of_birth;
        $customer_personal->nationality_id = $request->nationality ?? 1;
        $customer_personal->identity_id = $request->identity_type ?? 1;
        $customer_personal->identity_no = $request->identity_no;
        $customer_personal->npwp_no = $request->npwp_no;
        $customer_personal->mother_name = $request->mother_name;
        $customer_personal->identity_address =$request->address;
        $customer_personal->is_domicile_match = $request->is_domicile_match_identity == 'on' ? true : false;
        $customer_personal->phone = $request->phone;
        $customer_personal->gender = $request->gender;
        $customer_personal->identity_village_id = $request->village;
        $customer_personal->domicile_village_id = $request->village_dom;
        $customer_personal->selfie_picture = $selfie_picture;
        $customer_personal->identity_picture = $identity_picture;
        $customer_personal->npwp_picture = $npwp_picture;
        $customer_personal->save();



        // Generate Account
        $account_type = AccountType::where('id', $request->account_type)->firstOrFail();
        $account = new CustomerAccount();
        $account->customer_id = $customer->id;
        $account->account_no = $this->generateAccount();
        $account->account_type_id = $account_type->id;
        $account->currency_id = 1;
        $account->balance = 500000;
        $account->is_active = 1;
        $account->save();

        // Generate Card
        // Find Card
        $card_type = CardType::where('id', $request->card_type)->firstOrFail();
        $customer_card = new CustomerCard();
        $customer_card->customer_account_id = $account->id;
        $customer_card->card_type_id = $card_type->id;
        $customer_card->card_no = $this->generateCard($card_type->start_number);
        $customer_card->card_name = $customer_personal->full_name;
        $customer_card->cvc = mt_rand('100', '999');
        $customer_card->is_active = true;
        $customer_card->transaction_limit = 10000000;
        $customer_card->expired_date = Carbon::now()->addYears(4)->format('Y-m-d');
        $customer_card->save();

        Auth::guard("customer")->loginUsingId($customer->id);
        return redirect()->route('dashboard');
    }

    private function generateAccount(){
        $loop = true;
        $str_rand = null;
        while ($loop) {
            $str_rand = '16'.mt_rand(1000000000, 9999999999);
            $cek_unique = CustomerAccount::where('account_no', $str_rand)->first();
            if(!$cek_unique){
                $loop = false;
            }
        }

        return $str_rand;
    }

    private function generateCard($first){
        $loop = true;
        $str_rand = null;
        while ($loop) {
            $str_rand = $first.mt_rand(100000000000000, 999999999999999);
            $cek_unique = CustomerCard::where('card_no', $str_rand)->first();
            if(!$cek_unique){
                $loop = false;
            }
        }

        return $str_rand;
    }
}
