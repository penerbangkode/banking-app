<?php

namespace App\Http\Controllers;

use App\Models\AccountType;
use App\Models\CardType;
use App\Models\DataEnumDetail;
use App\Models\District;
use App\Models\Province;
use App\Models\Regencie;
use App\Models\Regency;
use App\Models\Village;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(){
        return view('index');
    }

    public function openAccount(){
        $provinces = Province::all();
        $genders = DataEnumDetail::where('rule_name', DataEnumDetail::GENDER_TYPE)->get();
        $nationality = DataEnumDetail::where('rule_name', DataEnumDetail::NATIONALITY_TYPE)->get();
        $identity = DataEnumDetail::where('rule_name', DataEnumDetail::IDENTITY_TYPE)->get();
        $accounts = AccountType::all();
        $cards = CardType::all();
        return view('open-account',compact('provinces', 'genders', 'nationality', 'identity', 'accounts', 'cards'));
    }

    public function city(Request $request){
        $request->validate([
            'province' => 'required|exists:provinces,id'
        ]);

        $city = Regency::select('id', 'name')->where('province_id', $request->province)->get();
        return response()->json($city);
    }

    public function district(Request $request){
        $request->validate([
            'regency' => 'required|exists:regencies,id'
        ]);

        $district = District::select('id', 'name')->where('regency_id', $request->regency)->get();
        return response()->json($district);
    }

    public function village(Request $request){
        $request->validate([
            'district' => 'required|exists:districts,id'
        ]);

        $village = Village::select('id', 'name')->where('district_id', $request->district)->get();
        return response()->json($village);
    }
}

