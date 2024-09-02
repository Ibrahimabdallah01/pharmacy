@extends('admin.layouts.app')

@section('content')

<div class="pagetitle">
    <h1>Medicine Stock List</h1>
</div>

<section class="section">
    <div class="row">
        <div class="col-lg-12">
            @include('message')

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">
                        <a href="{{ route('admin.medicines_stock.add') }}" class="btn btn-primary">Add Stock Medicine</a>
                    </h5>

                    <table class="table datatable">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Medicine Name</th>
                                <th scope="col">Batch ID</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">MRP</th>
                                <th scope="col">Rate</th>
                                <th scope="col">Expiry Date</th>
                                <th scope="col">Created At</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($medicine_stocks as $stock)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $stock->medicine->name }}</td>
                                <td>{{ $stock->batch_id }}</td>
                                <td>{{ $stock->quantity }}</td>
                                <td>{{ $stock->mrp }}</td>
                                <td>{{ $stock->rate }}</td>
                                <td>{{ \Carbon\Carbon::parse($stock->expiry_date)->format('Y-m-d') }}</td>
                                <td>{{ $stock->created_at->format('d-m-Y H:i:s') }}</td>
                                <td>
                                    <a href="{{ route('admin.medicines_stock.edit', $stock->id) }}" class="btn btn-sm btn-warning">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>
                                    <form action="{{ route('admin.medicines_stock.delete', $stock->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this stock?')">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="9" class="text-center">No medicine stock available</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>

                    <!-- Add pagination here if needed -->
                    {{ $medicine_stocks->links() }}

                </div>
            </div>
        </div>
    </div>
</section>

@endsection
