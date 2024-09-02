<!-- resources/views/admin/suppliers/show.blade.php -->
@extends('admin.layouts.app')

@section('content')

<div class="pagetitle">
    <h1>Supplier Details</h1>
</div>

<section class="section">
    <div class="row">
        <div class="col-lg-12">
            @include('message') <!-- For displaying success/error messages -->

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Supplier Information</h5>

                    <!-- Supplier Details -->
                    <ul class="list-group">
                        <li class="list-group-item"><strong>ID:</strong> {{ $supplier->id }}</li>
                        <li class="list-group-item"><strong>Name:</strong> {{ $supplier->supplier_name }}</li>
                        <li class="list-group-item"><strong>Email:</strong> {{ $supplier->supplier_email }}</li>
                        <li class="list-group-item"><strong>Number:</strong> {{ $supplier->supplier_number }}</li>
                        <li class="list-group-item"><strong>Address:</strong> {{ $supplier->address }}</li>
                    </ul>

                    <a href="{{ route('admin.suppliers.edit', $supplier->id) }}" class="btn btn-warning mt-3">Edit</a>
                    <a href="{{ route('admin.suppliers.index') }}" class="btn btn-secondary mt-3">Back to List</a>

                </div>
            </div>
        </div>
    </div>
</section>

@endsection
