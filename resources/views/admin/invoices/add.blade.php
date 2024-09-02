@extends('admin.layouts.app')

@section('content')

<div class="pagetitle">
    <h1>Add Invoice</h1>
</div>

<section class="section">
    <div class="row">
        <div class="col-lg-12">
            @include('message')
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Invoice Details</h5>

                    <form action="{{ route('admin.invoices.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="customer_id" class="form-label">Customer</label>
                            <select name="customer_id" id="customer_id" class="form-select" required>
                                <option value="" disabled selected>Select Customer</option>
                                {{-- Assuming you pass customers data from the controller --}}
                                @foreach($customers as $customer)
                                    <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="invoice_date" class="form-label">Invoice Date</label>
                            <input type="date" name="invoice_date" id="invoice_date" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="total_amount" class="form-label">Total Amount</label>
                            <input type="number" name="total_amount" id="total_amount" class="form-control" step="0.01" required>
                        </div>

                        <div class="mb-3">
                            <label for="total_discount" class="form-label">Total Discount</label>
                            <input type="number" name="total_discount" id="total_discount" class="form-control" step="0.01">
                        </div>

                        <div class="mb-3">
                            <label for="net_total" class="form-label">Net Total</label>
                            <input type="number" name="net_total" id="net_total" class="form-control" step="0.01" required>
                        </div>

                        <button type="submit" class="btn btn-primary">Save Invoice</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</section>

@endsection
