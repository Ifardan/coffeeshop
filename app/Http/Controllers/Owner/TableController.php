<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use App\Models\Table;
use Illuminate\Http\Request;

class TableController extends Controller
{
    public function index()
    {
    $tables = Table::where('status', 'active')->get();

    return view('owner.tables.index', compact('tables'));
    }

    public function create()
    {
        return view('owner.tables.create');
    }

    public function store(Request $request)
    {
    Table::create([
        'table_number' => $request->table_number,
        'capacity' => $request->capacity,
        'status' => $request->status,
        'description' => $request->description,
    ]);

    return redirect()->route('tables.index');
    }

    public function edit($id)
    {
        $table = Table::findOrFail($id);
        return view('owner.tables.edit', compact('table'));
    }

    public function update(Request $request, $id)
    {
        $table = Table::findOrFail($id);

        $table->update([
            'table_number' => $request->table_number,
            'capacity' => $request->capacity,
            'status' => $request->status,
            'description' => $request->description,
        ]);

        return redirect()->route('tables.index');
    }

    public function destroy($id)
    {
        Table::findOrFail($id)->delete();

        return back();
    }
}