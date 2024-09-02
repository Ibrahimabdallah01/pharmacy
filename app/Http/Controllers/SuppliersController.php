<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Supplier;
use Illuminate\Http\Request;

class SuppliersController extends Controller
{
    public function index()
    {
        $suppliers = Supplier::paginate(10); // Paginate results
        return view('admin.suppliers.list', compact('suppliers'));
    }

    public function create()
    {
        return view('admin.suppliers.add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'supplier_name' => 'required|string|max:255',
            'supplier_email' => 'required|email|unique:suppliers',
            'supplier_number' => 'required|string|max:20|unique:suppliers',
            'address' => 'required|string',
        ]);

        Supplier::create($request->only(['supplier_name', 'supplier_email', 'supplier_number', 'address']));
        return redirect()->route('admin.suppliers.index')->with('success', 'Supplier added successfully.');
    }

    public function show($id)
    {
        $supplier = Supplier::find($id);
        if (!$supplier) {
            abort(404, 'Supplier not found');
        }
        return view('admin.suppliers.show', ['supplier' => $supplier]);
    }
    



    public function edit(Supplier $supplier)
    {
        return view('admin.suppliers.edit', compact('supplier'));
    }

    public function update(Request $request, Supplier $supplier)
    {
    $request->validate([
        'supplier_name' => 'required|string|max:255',
        'supplier_email' => 'required|email|unique:suppliers,supplier_email,' . $supplier->id,
        'supplier_number' => 'required|string|max:20',
        'address' => 'required|string',
    ]);

    $supplier->update($request->all());
    return redirect()->route('admin.suppliers.index')->with('success', 'Supplier updated successfully.');
    }


    public function destroy(Supplier $supplier)
    {
    $supplier->delete();
    return redirect()->route('admin.suppliers.index')->with('success', 'Supplier deleted successfully.');
    }

} 