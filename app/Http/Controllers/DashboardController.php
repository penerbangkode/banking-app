<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\CustomerAccount;
use App\Models\CustomerCard;
use App\Models\CustomerPersonal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(){
        $user_id = Auth::guard('customer')->user()->id;
        $account = CustomerAccount::where('customer_id', $user_id)->first();
        $customer_personal = CustomerPersonal::where('customer_id', $user_id)->first();
        $card = CustomerCard::where('customer_account_id', $account->id)->first();
        return view('dashboard', compact('account', 'customer_personal', 'card'));
    }

    public function profile(){
        $user_id = Auth::guard('customer')->user()->id;
        $customer = Customer::find($user_id);
        $customer_personal = CustomerPersonal::where('customer_id', $user_id)->first();
        $account = CustomerAccount::where('customer_id', $user_id)->first();
        $customer_personal = CustomerPersonal::where('customer_id', $user_id)->first();
        $card = CustomerCard::where('customer_account_id', $account->id)->first();
        return view('profile',  compact('account', 'customer_personal', 'card', 'customer'));
    }

    public function searchAccount(Request $request){
        $account = CustomerAccount::where('account_no', $request->account)->firstOrFail();
        $customer_personal = CustomerPersonal::where('customer_id', $account->customer_id)->firstOrFail();
        return response()->json([
            'name' => $customer_personal->full_name
        ]);
    }
}
