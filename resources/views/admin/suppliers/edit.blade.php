@extends('admin.layouts.app')

@section('content')

<div class="pagetitle">
    <h1>Edit Supplier</h1>
</div>

<section class="section">
    <div class="row">
        <div class="col-lg-12">
            @include('message')

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Edit Supplier Details</h5>

                    <form action="{{ route('admin.suppliers.update', $supplier->id) }}" method="POST">
                        @csrf
                        @method('PUT') <!-- Indicates that this is a PUT request -->

                        <div class="form-group">
                            <label for="supplier_name">Name</label>
                            <input type="text" class="form-control" id="supplier_name" name="supplier_name" value="{{ old('supplier_name', $supplier->supplier_name) }}" required>
                        </div>
                        <div class="form-group">
                            <label for="supplier_email">Email</label>
                            <input type="email" class="form-control" id="supplier_email" name="supplier_email" value="{{ old('supplier_email', $supplier->supplier_email) }}" required>
                        </div>
                        <div class="form-group">
                            <label for="supplier_number">Number</label>
                            <input type="text" class="form-control" id="supplier_number" name="supplier_number" value="{{ old('supplier_number', $supplier->supplier_number) }}" required>
                        </div>
                        <div class="form-group">
                            <label for="address">Address</label>
                            <textarea class="form-control" id="address" name="address" rows="3" required>{{ old('address', $supplier->address) }}</textarea>
                        </div>
                        <button type="submit" class="btn btn-primary mt-3">Update</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</section>

@endsection
