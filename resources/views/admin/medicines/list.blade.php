@extends('admin.layouts.app')

@section('content')

<div class="pagetitle">
    <h1>Medicine List</h1>
</div>

<section class="section">
    <div class="row">
        <div class="col-lg-12">
            @include('message')
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">
                        <a href="{{ url('admin/medicines/add') }}" class="btn btn-primary">Add New Medicine</a>
                    </h5>

                    <table class="table datatable">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Type</th>
                                <th scope="col">Manufacturer</th>
                                <th scope="col">Expiry Date</th>
                                <th scope="col">Price</th>
                                <th scope="col">Stock Quantity</th>
                                <th scope="col">Created At</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($medicines as $medicine)
                            <tr>
                                <th scope="row">{{ $medicine->id }}</th>
                                <td>{{ $medicine->name }}</td>
                                <td>{{ $medicine->type }}</td>
                                <td>{{ $medicine->manufacturer }}</td>
                                <td>{{ date('d-m-Y', strtotime($medicine->expiry_date)) }}</td>
                                <td>{{ $medicine->price }}</td>
                                <td>{{ $medicine->stock_quantity }}</td>
                                <td>{{ date('d-m-Y H:i:s', strtotime($medicine->created_at)) }}</td>
                                <td>
                                    <a href="{{ route('admin.medicines.edit', $medicine->id) }}" class="btn btn-sm btn-warning">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>
                                    @if(!$medicine->trashed())
                                        <form action="{{ route('admin.medicines.delete', $medicine->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this medicine?')">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                    @else
                                        <a href="{{ route('admin.medicines.restore', $medicine->id) }}" class="btn btn-warning btn-sm">
                                            <i class="bi bi-arrow-clockwise"></i> Restore
                                        </a>
                                        <form action="{{ route('admin.medicines.forceDelete', $medicine->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to permanently delete this medicine?')">
                                                <i class="bi bi-trash"></i> Hard Delete
                                            </button>
                                        </form>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
