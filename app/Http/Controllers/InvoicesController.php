<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\Customer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class InvoicesController extends Controller
{
    public function index(Request $request)
    {
        $invoices = Invoice::with('customer')->paginate(10);

        return view('admin.invoices.list', compact('invoices'));
    }

    public function create(Request $request)
    {
        $customers = Customer::all(); // Retrieve all customers

        return view('admin.invoices.add', compact('customers')); // Pass customers to the view
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'invoice_date' => 'required|date',
            'total_amount' => 'required|numeric',
            'total_discount' => 'nullable|numeric',
            'net_total' => 'required|numeric',
        ]);

        Invoice::create($validatedData);

        return redirect()->route('admin.invoices.index')->with('success', 'Invoice created successfully.');
    }

    public function edit($id)
    {
    $invoice = Invoice::findOrFail($id);
    $customers = Customer::all();

    return view('admin.invoices.edit', compact('invoice', 'customers'));
    }


    public function update(Request $request, $id)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'invoice_date' => 'required|date',
            'total_amount' => 'required|numeric',
            'total_discount' => 'nullable|numeric',
            'net_total' => 'required|numeric',
        ]);

        // Find the invoice by ID
        $invoice = Invoice::findOrFail($id);

        // Update the invoice details
        $invoice->update($validatedData);

        // Redirect to the invoices list with a success message
        return redirect()->route('admin.invoices.index')->with('success', 'Invoice updated successfully.');
    }


    public function destroy($id)
    {
        $invoice = Invoice::findOrFail($id);
        $invoice->delete();

        return redirect()->route('admin.invoices.index')->with('success', 'Invoice deleted successfully.');
    }

}