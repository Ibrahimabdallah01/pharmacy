@extends('admin.layouts.app')

@section('content')

<div class="pagetitle">
    <h1>Edit Purchase</h1>
</div>

<section class="section">
    <div class="row">
        <div class="col-lg-12">
            @include('message')
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Edit Purchase</h5>

                    <form action="{{ route('admin.purchases.update', $purchase->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="suppliers_id">Supplier</label>
                            <select name="suppliers_id" id="suppliers_id" class="form-control" required>
                                <option value="">Select a Supplier</option>
                                @foreach ($suppliers as $supplier)
                                    <option value="{{ $supplier->id }}" {{ $supplier->id == $purchase->suppliers_id ? 'selected' : '' }}>
                                        {{ $supplier->id }}
                                    </option>
                                @endforeach
                            </select>
                        </div>   
                        
                        <div class="form-group">
                            <label for="invoices_id">Invoice</label>
                            <select name="invoices_id" id="invoices_id" class="form-control" required>
                                <option value="">Select an Invoice</option>
                                @foreach ($invoices as $invoice)
                                    <option value="{{ $invoice->id }}" {{ $invoice->id == $purchase->invoices_id ? 'selected' : '' }}>
                                        {{ $invoice->id }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="voucher_number">Voucher Number</label>
                            <input type="text" name="voucher_number" id="voucher_number" class="form-control" value="{{ $purchase->voucher_number }}" required>
                        </div>

                        <div class="form-group">
                            <label for="purchase_date">Purchase Date</label>
                            <input type="date" name="purchase_date" id="purchase_date" class="form-control" value="{{ $purchase->purchase_date->format('Y-m-d') }}" required>
                        </div>

                        <div class="form-group">
                            <label for="total_amount">Total Amount</label>
                            <input type="number" name="total_amount" id="total_amount" class="form-control" step="0.01" value="{{ $purchase->total_amount }}" required>
                        </div>

                        <div class="form-group">
                            <label for="payment_status">Payment Status</label>
                            <select name="payment_status" id="payment_status" class="form-control" required>
                                <option value="paid" {{ $purchase->payment_status == 'paid' ? 'selected' : '' }}>Paid</option>
                                <option value="pending" {{ $purchase->payment_status == 'pending' ? 'selected' : '' }}>Pending</option>
                                <option value="failed" {{ $purchase->payment_status == 'failed' ? 'selected' : '' }}>Failed</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary">Update Purchase</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
