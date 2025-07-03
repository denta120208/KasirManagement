<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\GenericExport;
use Maatwebsite\Excel\Facades\Excel;

class StockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stocks = \App\Models\Stock::all();
        return view('stocks.index', compact('stocks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('stocks.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'quantity' => 'required|integer',
            'unit' => 'required',
            'min_stock' => 'required|integer',
        ]);
        \App\Models\Stock::create($request->only(['name','quantity','unit','min_stock']));
        return redirect()->route('stocks.index')->with('success', 'Stok berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
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
        $stock = \App\Models\Stock::findOrFail($id);
        $stock->delete();
        return redirect()->route('stocks.index')->with('success', 'Stok berhasil dihapus!');
    }

    /**
     * Export stocks data to Excel.
     *
     * @return \Illuminate\Http\Response
     */
    public function exportExcel()
    {
        $stocks = \App\Models\Stock::all();
        return Excel::download(
            new GenericExport('stocks.excel', ['stocks' => $stocks]),
            'stocks.xlsx'
        );
    }
}
