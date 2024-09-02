@extends('admin.layouts.app')

@section('content')

<div class="pagetitle">
    <h1>Edit Invoice</h1>
</div>

<section class="section">
    <div class="row">
        <div class="col-lg-12">
            @include('message')
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Edit Invoice</h5>
                    
                    <form action="{{ route('admin.invoices.update', $invoice->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <!-- Customer ID -->
                        <div class="mb-3">
                            <label for="customer_id" class="form-label">Customer</label>
                            <select name="customer_id" id="customer_id" class="form-select">
                                <option value="">Select Customer</option>
                                @foreach($customers as $customer)
                                    <option value="{{ $customer->id }}" {{ $invoice->customer_id == $customer->id ? 'selected' : '' }}>
                                        {{ $customer->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('customer_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Invoice Date -->
                        <div class="mb-3">
                            <label for="invoice_date" class="form-label">Invoice Date</label>
                            <input type="date" name="invoice_date" id="invoice_date" class="form-control" value="{{ old('invoice_date', $invoice->invoice_date) }}">
                            @error('invoice_date')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Total Amount -->
                        <div class="mb-3">
                            <label for="total_amount" class="form-label">Total Amount</label>
                            <input type="number" name="total_amount" id="total_amount" class="form-control" value="{{ old('total_amount', $invoice->total_amount) }}">
                            @error('total_amount')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Total Discount -->
                        <div class="mb-3">
                            <label for="total_discount" class="form-label">Total Discount</label>
                            <input type="number" name="total_discount" id="total_discount" class="form-control" value="{{ old('total_discount', $invoice->total_discount) }}">
                            @error('total_discount')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Net Total -->
                        <div class="mb-3">
                            <label for="net_total" class="form-label">Net Total</label>
                            <input type="number" name="net_total" id="net_total" class="form-control" value="{{ old('net_total', $invoice->net_total) }}">
                            @error('net_total')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" class="btn btn-primary">Update Invoice</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
