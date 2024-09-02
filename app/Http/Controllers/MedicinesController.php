<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\MedicineStock;
use App\Models\Medicine;
use Illuminate\Http\Request;

class MedicinesController extends Controller
{
    public function medicines(Request $request)
{
    $medicines = Medicine::all();
    return view('admin.medicines.list', ['medicines' => $medicines]);
}


    public function add_medicines(Request $request)
    {
        return view('admin.medicines.add');
    }

    public function store(Request $request)
    {
    $request->validate([
        'name' => 'required|string|max:255',
        'type' => 'required|string|max:255',
        'manufacturer' => 'required|string|max:255',
        'expiry_date' => 'required|date',
        'price' => 'required|numeric',
        'stock_quantity' => 'required|integer',
    ]);

    Medicine::create([
        'name' => $request->name,
        'type' => $request->type,
        'manufacturer' => $request->manufacturer,
        'expiry_date' => $request->expiry_date,
        'price' => $request->price,
        'stock_quantity' => $request->stock_quantity,
    ]);

    return redirect()->route('admin.medicines')->with('success', 'Medicine added successfully');
    }

    public function edit($id)
    {
    $medicine = Medicine::findOrFail($id);
    $medicine->expiry_date = \Carbon\Carbon::parse($medicine->expiry_date)->format('Y-m-d'); // Format the date
    return view('admin.medicines.edit', compact('medicine'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'manufacturer' => 'required|string|max:255',
            'expiry_date' => 'required|date',
            'price' => 'required|numeric',
            'stock_quantity' => 'required|integer',
        ]);

        $medicine = Medicine::findOrFail($id);
        $medicine->update([
            'name' => $request->name,
            'type' => $request->type,
            'manufacturer' => $request->manufacturer,
            'expiry_date' => $request->expiry_date,
            'price' => $request->price,
            'stock_quantity' => $request->stock_quantity,
        ]);

        return redirect()->route('admin.medicines')->with('success', 'Medicine updated successfully');
    }

    public function destroy($id)
    {
    $medicine = Medicine::findOrFail($id);
    $medicine->delete(); // Soft delete

    return redirect()->route('admin.medicines')->with('success', 'Medicine soft deleted successfully');
    }

    public function restore($id)
    {
    $medicine = Medicine::withTrashed()->findOrFail($id);
    $medicine->restore();

    return redirect()->route('admin.medicines')->with('success', 'Medicine restored successfully');
    }

    public function forceDelete($id)
    {
    $medicine = Medicine::withTrashed()->findOrFail($id);
    $medicine->forceDelete(); // Hard delete

    return redirect()->route('admin.medicines')->with('success', 'Medicine permanently deleted successfully');
    }






    // Display list of medicine stock
    public function medicines_stock_list(Request $request)
{
    // Use paginate with eager loading to retain pagination
    $medicine_stocks = MedicineStock::with('medicine')->paginate(10);

    return view('admin.medicines_stock.list', compact('medicine_stocks'));
}


    // Show form to add new medicine stock
    public function add_medicines_stock(Request $request)
    {
        return view('admin.medicines_stock.add');
    }

    // Store new medicine stock
    public function store_medicines_stock(Request $request)
{
    $request->validate([
        'medicine_id' => 'required|exists:medicines,id', // Validate that medicine_id exists in medicines table
        'batch_id' => 'required|string|max:255',
        'expiry_date' => 'required|date',
        'quantity' => 'required|integer',
        'mrp' => 'required|numeric',
        'rate' => 'required|numeric',
    ]);

    MedicineStock::create([
        'medicine_id' => $request->medicine_id, // Ensure this matches your field name
        'batch_id' => $request->batch_id,
        'expiry_date' => $request->expiry_date,
        'quantity' => $request->quantity,
        'mrp' => $request->mrp,
        'rate' => $request->rate,
    ]);

    return redirect()->route('admin.medicines_stock')->with('success', 'Medicine stock added successfully.');
}


    // Edit medicine stock
    public function edit_medicines_stock($id)
    {
        $medicine_stock = MedicineStock::findOrFail($id);
        return view('admin.medicines_stock.edit', compact('medicine_stock'));
    }

    // Update medicine stock
    public function update_medicines_stock(Request $request, $id)
    {
        $request->validate([
            'medicines_id' => 'required|exists:medicines,id',
            'batch_id' => 'required|string|max:255',
            'expiry_date' => 'required|date',
            'quantity' => 'required|integer',
            'mrp' => 'required|numeric',
            'rate' => 'required|numeric',
        ]);

        $medicine_stock = MedicineStock::findOrFail($id);
        $medicine_stock->update([
            'medicines_id' => $request->medicines_id,
            'batch_id' => $request->batch_id,
            'expiry_date' => $request->expiry_date,
            'quantity' => $request->quantity,
            'mrp' => $request->mrp,
            'rate' => $request->rate,
        ]);

        return redirect()->route('admin.medicines_stock')->with('success', 'Medicine stock updated successfully.');
    }

    // Delete medicine stock
    public function delete_medicines_stock($id)
    {
        $medicine_stock = MedicineStock::findOrFail($id);
        $medicine_stock->delete();

        return redirect()->route('admin.medicines_stock')->with('success', 'Medicine stock deleted successfully.');
    }
}