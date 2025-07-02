<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Table;

class TableController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tables = Table::orderBy('number')->get();
        return view('tables.index', compact('tables'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tables.create');
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
            'number' => 'required|unique:tables,number',
            'status' => 'required',
        ]);
        Table::create([
            'number' => $request->number,
            'status' => $request->status,
        ]);
        return redirect()->route('tables.index')->with('success', 'Meja berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $table = Table::findOrFail($id);
        return view('tables.show', compact('table'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $table = Table::findOrFail($id);
        return view('tables.edit', compact('table'));
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
        $request->validate([
            'number' => 'required|unique:tables,number,'.$id,
            'status' => 'required',
        ]);
        $table = Table::findOrFail($id);
        $table->update([
            'number' => $request->number,
            'status' => $request->status,
        ]);
        return redirect()->route('tables.index')->with('success', 'Meja berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $table = Table::findOrFail($id);
        $table->delete();
        return redirect()->route('tables.index')->with('success', 'Meja berhasil dihapus');
    }

    /**
     * Export the tables data to Excel.
     *
     * @return \Illuminate\Http\Response
     */
    public function exportExcel()
    {
        $tables = Table::orderBy('number')->get();
        return \Maatwebsite\Excel\Facades\Excel::download(
            new \App\Exports\GenericExport('tables.excel', ['tables' => $tables]),
            'tables.xlsx'
        );
    }
}
