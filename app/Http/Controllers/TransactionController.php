<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Exports\GenericExport;
use Maatwebsite\Excel\Facades\Excel;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->user()->hasRole('kasir')) {
            $transactions = Transaction::where('user_id', auth()->id())->get();
        } else {
            $transactions = Transaction::all();
        }
        return view('transactions.index', compact('transactions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (auth()->user()->hasRole('pemilik')) abort(403);
        // Contoh: tampilkan form transaksi (bisa pilih menu, meja, jumlah, diskon, pembayaran)
        // Untuk demo, tampilkan form sederhana
        return view('transactions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (auth()->user()->hasRole('pemilik')) abort(403);
        $request->validate([
            'total' => 'required|numeric',
            'paid' => 'required|numeric',
            'payment_method' => 'required',
        ]);
        $trx = Transaction::create([
            'user_id' => auth()->id(),
            'total' => $request->total,
            'discount' => $request->discount ?? 0,
            'paid' => $request->paid,
            'payment_method' => $request->payment_method,
            'receipt_number' => 'TRX'.date('YmdHis').rand(100,999),
        ]);
        return redirect()->route('transactions.show', $trx->id)->with('success', 'Transaksi berhasil!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $transaction = Transaction::with('user')->findOrFail($id);
        return view('transactions.show', compact('transaction'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (auth()->user()->hasRole('pemilik')) abort(403);
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (auth()->user()->hasRole('pemilik')) abort(403);
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (auth()->user()->hasRole('pemilik')) abort(403);
        $trx = Transaction::findOrFail($id);
        // Hapus detail transaksi jika ada
        if (method_exists($trx, 'details')) {
            $trx->details()->delete();
        } else {
            \App\Models\TransactionDetail::where('transaction_id', $trx->id)->delete();
        }
        $trx->delete();
        return redirect()->route('transactions.index')->with('success', 'Transaksi berhasil dihapus!');
    }

    /**
     * Export transactions to Excel.
     *
     * @return \Illuminate\Http\Response
     */
    public function exportExcel()
    {
        $transactions = \App\Models\Transaction::with('user')->get();
        return Excel::download(new GenericExport('transactions.excel', ['transactions' => $transactions]), 'transactions.xlsx');
    }
}
