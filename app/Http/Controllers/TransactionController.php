<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\CustomerAccount;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TransactionController extends Controller
{
    public function submit(Request $request){

        $account = CustomerAccount::where('account_no',$request->account_no)->where('customer_id','!=',Auth::user()->id)->first();
        if(!$account){
            return redirect()->back()->with('error-trf', 'Account not Found / Same As Sender Account');
        }

        $amount = (int) str_replace('.', "", $request->amount);
        DB::beginTransaction();
        try{
            $sender_account = CustomerAccount::where('customer_id', Auth::user()->id)->lockForUpdate()->first();
            if($sender_account->balance < $amount){
                return redirect()->back()->with('error-trf', 'Balance Insufficient!');
            }
            $sender_account->balance = $sender_account->balance - $amount;

            $receive_account = CustomerAccount::where('account_no', $request->account_no)->lockForUpdate()->first();
            $receive_account->balance = $receive_account->balance + $amount;

            $transaction_sender = new Transaction();
            $transaction_sender->customer_account_id = $sender_account->id;
            $transaction_sender->from_account_id = $sender_account->id;
            $transaction_sender->to_account_id = $receive_account->id;
            $transaction_sender->from_currency_id = 1;
            $transaction_sender->to_currency_id = 1;
            $transaction_sender->transaction_type = 'DB';
            $transaction_sender->amount = $amount;
            $transaction_sender->rate = 1;
            $transaction_sender->final_amount = $amount * $transaction_sender->rate;
            $transaction_sender->last_balance = $sender_account->balance;
            $transaction_sender->trail = 'D/'.microtime(true).'/'.date('dmY');
            $transaction_sender->status = 1;
            $transaction_sender->transaction_via = 'TRANSFER';

            $transaction_receive = new Transaction();
            $transaction_receive->customer_account_id = $receive_account->id;
            $transaction_receive->from_account_id = $sender_account->id;
            $transaction_receive->to_account_id = $receive_account->id;
            $transaction_receive->from_currency_id = 1;
            $transaction_receive->to_currency_id = 1;
            $transaction_receive->transaction_type = 'CR';
            $transaction_receive->amount = $amount;
            $transaction_receive->rate = 1;
            $transaction_receive->final_amount = $amount * $transaction_receive->rate;
            $transaction_receive->last_balance = $sender_account->balance;
            $transaction_receive->trail = 'C/'.microtime(true).'/'.date('dmY');
            $transaction_receive->status = 1;
            $transaction_receive->transaction_via = 'TRANSFER';

            $sender_account->save();
            $receive_account->save();
            $transaction_receive->save();
            $transaction_sender->save();
            DB::commit();
            return redirect()->back()->with('success-trf', 'Success Transfer');
        }catch (\Exception $e) {
            DB::rollBack();
            dd($e);
            return redirect()->back()->with('error-trf', $e->getMessage());
        }
    }

    public function history(Request $request){
        $account = CustomerAccount::where('id',$request->customer_account_id)->where('customer_id','=',Auth::user()->id)->first();
        if(!$account){
            return response()->json([]);
        }
        $transactions = Transaction::where('customer_account_id', $request->customer_account_id)
        ->leftJoin('customer_accounts as cas', 'cas.id', 'transactions.from_account_id')
        ->leftJoin('customer_accounts as cav', 'cav.id', 'transactions.to_account_id')
        ->select([
            'transactions.id',
            'cas.account_no as from_account',
            'cav.account_no as to_account',
            'transactions.created_at as created_at',
            'transaction_type',
            'trail',
            'amount'
        ])
        ->orderBy('transactions.created_at', 'DESC')
        ->get();

        return response()->json($transactions);
    }
}
