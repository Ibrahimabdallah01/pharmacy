<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Supplier;
use App\Models\Invoice;
use App\Models\Purchase;

class PurchasesController extends Controller
{
    public function index()
    {
    $purchases = Purchase::with('supplier', 'invoice')->get(); // Fetch purchases with relationships
    return view('admin.purchases.list', compact('purchases'));
    }


    public function create()
{
    $suppliers = Supplier::all(); // Fetch all suppliers
    $invoices = Invoice::all(); // Fetch all invoices
    
    return view('admin.purchases.add', compact('suppliers', 'invoices'));
}

    public function store(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'suppliers_id' => 'required|exists:suppliers,id',
            'invoices_id' => 'required|exists:invoices,id',
            'voucher_number' => 'required|string|unique:purchases',
            'purchase_date' => 'required|date',
            'total_amount' => 'required|numeric',
            'payment_status' => 'required|in:paid,pending,failed',
        ]);

        // Create a new purchase
        Purchase::create($validatedData);

        // Redirect with a success message
        return redirect()->route('admin.purchases.index')->with('success', 'Purchase created successfully.');
    }


    public function edit($id)
    {
    $purchase = Purchase::findOrFail($id); // Fetch the specific purchase
    $suppliers = Supplier::all(); // Fetch all suppliers
    $invoices = Invoice::all(); // Fetch all invoices

    return view('admin.purchases.edit', compact('purchase', 'suppliers', 'invoices'));
    }


    public function update(Request $request, $id)
    {
    // Validate the request data
    $validatedData = $request->validate([
        'suppliers_id' => 'required|exists:suppliers,id',
        'invoices_id' => 'required|exists:invoices,id',
        'voucher_number' => 'required|string|unique:purchases,voucher_number,' . $id,
        'purchase_date' => 'required|date',
        'total_amount' => 'required|numeric',
        'payment_status' => 'required|in:paid,pending,failed',
    ]);

    // Find the purchase and update it
    $purchase = Purchase::findOrFail($id);
    $purchase->update($validatedData);

    // Redirect with a success message
    return redirect()->route('admin.purchases.index')->with('success', 'Purchase updated successfully.');
    }

    public function destroy(Purchase $purchase)
    {
    $purchase->delete();
    return redirect()->route('admin.purchases.index')->with('success', 'Purchases deleted successfully.');
    }

}