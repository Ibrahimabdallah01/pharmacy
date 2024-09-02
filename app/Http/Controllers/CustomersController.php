<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomersController extends Controller
{
    public function customers(Request $request)
    {
        $customers = Customer::all();
        return view('admin.customers.list', compact('customers'));
    }

    public function add_customers(Request $request)
    {
        return view('admin.customers.add');
    }

    // Function to handle the form submission and insert data into the database
    public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'contact' => 'required|string|max:20',
        'address' => 'required|string|max:255',
        'doctor_name' => 'nullable|string|max:255',
        'doctor_address' => 'nullable|string|max:255',
    ]);

    Customer::create([
        'name' => $request->name,
        'contact' => $request->contact,
        'address' => $request->address,
        'doctor_name' => $request->doctor_name,
        'doctor_address' => $request->doctor_address,
    ]);

    return redirect()->route('admin.customers')->with('success', 'Customer added successfully!');
    }


    public function edit($id)
    {
    $customer = Customer::findOrFail($id); // Find the customer by ID or fail if not found
    return view('admin.customers.edit', compact('customer')); // Pass the customer to the edit view
    }


    public function update(Request $request, $id)
    {
    $request->validate([
        'name' => 'required|string|max:255',
        'contact' => 'required|string|max:20',
        'address' => 'required|string|max:255',
        'doctor_name' => 'nullable|string|max:255',
        'doctor_address' => 'nullable|string|max:255',
    ]);

    $customer = Customer::findOrFail($id); // Find the customer by ID or fail if not found
    $customer->update([
        'name' => $request->name,
        'contact' => $request->contact,
        'address' => $request->address,
        'doctor_name' => $request->doctor_name,
        'doctor_address' => $request->doctor_address,
    ]);

    return redirect()->route('admin.customers')->with('success', 'Customer updated successfully!');
    }


    public function destroy($id)
    {
    $customer = Customer::findOrFail($id); // Find the customer by ID or fail if not found
    $customer->delete(); // Delete the customer record
    return redirect()->route('admin.customers')->with('success', 'Customer deleted successfully!');
    }



}
