@extends('admin.layouts.app')

@section('content')

<div class="pagetitle">
    <h1>Invoices List</h1>
</div>

<section class="section">
    <div class="row">
        <div class="col-lg-12">
            @include('message')
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">
                        <a href="{{ route('admin.invoices.add') }}" class="btn btn-primary">Add New Invoice</a>
                    </h5>

                    {{-- <!-- Search bar -->
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <form action="{{ route('admin.invoices.index') }}" method="GET">
                                <div class="input-group">
                                    <input type="text" name="search" class="form-control" placeholder="Search by customer name, date, or amount" value="{{ request()->query('search') }}">
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
                                    <th scope="col">Customer Name</th>
                                    <th scope="col">Invoice Date</th>
                                    <th scope="col">Total Amount</th>
                                    <th scope="col">Total Discount</th>
                                    <th scope="col">Net Total</th>
                                    <th scope="col">Created At</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($invoices as $invoice)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $invoice->customer->name }}</td>
                                    <td>{{ \Carbon\Carbon::parse($invoice->invoice_date)->format('d-m-Y') }}</td>
                                    <td>{{ $invoice->total_amount }}</td>
                                    <td>{{ $invoice->total_discount }}</td>
                                    <td>{{ $invoice->net_total }}</td>
                                    <td>{{ $invoice->created_at->format('d-m-Y H:i:s') }}</td>
                                    <td>
                                        <a href="{{ route('admin.invoices.edit', $invoice->id) }}" class="btn btn-sm btn-warning">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>
                                        <form action="{{ route('admin.invoices.delete', $invoice->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this invoice?')">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="8" class="text-center">No invoices found</td>
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
