<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Transaction;

class TransactionController extends Controller
{
    //
    function loadAll() {
        $start = microtime(true);
        $result = DB::select('select * from transactions');
        // Alternative: $result = Transaction::all();
        $end = (microtime(true) - $start);

        return view('transactions', [
            'transactionData'=>$result,
            'elapsedTime'=>$end
        ]);
    }

    function add(Request $request) {
        $request->validate(
            [
                'amount'=>'required',
                'transaction_date'=>'required'
            ]
        );

        $transaction = new Transaction();
        $transaction->amount = $request->amount;
        $transaction->transaction_date = $request->transaction_date;
        $transaction->remarks = $request->remarks;

        if ($request->exists('projection')) {
            $transaction->projection=1;
        } else {
            $transaction->projection=0;
        }

        $result = $transaction->save();
        return redirect('entry')->with('add_result', $result);
    }

    function delete($id) {
        $data = Transaction::find($id);
        $result = $data->delete();
        return redirect('transactions')->with('delete_result', $result);
    }
}
