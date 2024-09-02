@extends('admin.layouts.app')

@section('content')

<div class="pagetitle">
    <h1>Purchases List</h1>
</div>

<section class="section">
    <div class="row">
        <div class="col-lg-12">
            @include('message')
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">
                        <a href="{{ url('admin/purchases/add') }}" class="btn btn-primary">Add New Purchase</a>
                    </h5>

                    {{-- <!-- Search bar -->
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <form action="{{ route('admin.purchases.index') }}" method="GET">
                                <div class="input-group">
                                    <input type="text" name="search" class="form-control" placeholder="Search by supplier, invoice ID, or date" value="{{ request()->query('search') }}">
                                    <button type="submit" class="btn btn-secondary"><i class="bi bi-search"></i></button>
                                </div>
                            </form>
                        </div>
                    </div> --}}

                    <div class="table-responsive">
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Supplier</th>
                                    <th scope="col">Invoice ID</th>
                                    <th scope="col">Voucher Number</th>
                                    <th scope="col">Purchase Date</th>
                                    <th scope="col">Total Amount</th>
                                    <th scope="col">Payment Status</th>
                                    <th scope="col">Created At</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($purchases as $purchase)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $purchase->supplier->id }}</td> <!-- Assuming supplier name relationship is set -->
                                    <td>{{ $purchase->invoice->id }}</td>
                                    <td>{{ $purchase->voucher_number }}</td>
                                    <td>{{ $purchase->purchase_date->format('Y-m-d') }}</td>
                                    <td>{{ number_format($purchase->total_amount, 2) }}</td>
                                    <td>{{ ucfirst($purchase->payment_status) }}</td>
                                    <td>{{ $purchase->created_at->format('Y-m-d H:i:s') }}</td>
                                    <td>
                                        <a href="{{ route('admin.purchases.edit', $purchase->id) }}" class="btn btn-sm btn-warning">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>
                                        <form action="{{ route('admin.purchases.delete', $purchase->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this purchase?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="9" class="text-center">No purchases available</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>

@endsection
