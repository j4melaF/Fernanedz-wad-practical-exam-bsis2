<?php

namespace App\Http\Controllers;
use App\Models\Transaction;

use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function showTransactions()
    {
        $transactions = Transaction::orderBy('created_at', 'desc')->get();
        return view('transactions', ['transactions'=>$transactions]);
    
    }

    public function createTransaction()
    {
        return view('create-transaction');
    }

    public function storeTransaction(Request $request)
    {
        $validated = $request->validate(
            [
                'transaction_title' => 'required|string|max:255',
                'description' => 'nullable',
                'status' => 'required|in:successful,declined',
                'total_amount' => 'required|numeric',
                'transaction_number' => 'required|unique:transactions',

            ]
        );

        $transaction = new Transaction();
        $transaction->transaction_title = $validated['transaction_title'];
        $transaction->description = $validated['description'];
        $transaction->status = $validated['status'];
        $transaction->total_amount = $validated['total_amount'];
        $transaction->transaction_number = $validated['transaction_number'];
        $transaction->save();


        return redirect()->route('showTransactions')->with('success', 'Transaction created successfully.');
    }

    public function viewTransaction(Request $request)
    {
        $transaction = Transaction::find($request->id);
        return view('transaction', ['transaction'=>$transaction]);
    }

    public function editTransaction(Request $request)
    {
        $transaction = Transaction::find($request->id);
        return view('edit-transaction', ['transaction' => $transaction]);
    }

    public function updateTransaction(Request $request)
    {
        $validated = $request->validate(
            [
                'transaction_title' => 'required|string|max:255',
                'description' => 'nullable',
                'status' => 'required|in:successful,declined',
                'total_amount' => 'required|numeric',
                'transaction_number' => 'required|unique:transactions',

            ]
        );

        $transaction = Transaction::find($request->id);
        $transaction->transaction_title = $validated['transaction_title'];
        $transaction->description = $validated['description'];
        $transaction->status = $validated['status'];
        $transaction->total_amount = $validated['total_amount'];
        $transaction->transaction_number = $validated['transaction_number'];
        $transaction->save();

        return redirect()->route('viewTransaction', ['id'=>$transaction->id])->with('success', 'Transaction updated successfully.');
    }

    public function deleteTransaction(Request $request)
    {
        $transaction = Transaction::find($request->id);

        if ($transaction)
        {
            $transaction->delete();
        }

        return redirect()->route('showTransactions')->with('success', 'Transaction deleted successfully.');
    }

    
}
