@extends('admin.layouts.app')

@section('content')

<div class="pagetitle">
    <h1>Edit Medicine</h1>
</div>

<section class="section">
    <div class="row">
        <div class="col-lg-12">
            @include('message')
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Edit Medicine Details</h5>

                    <form action="{{ route('admin.medicines.update', $medicine->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row mb-3">
                            <label for="name" class="col-sm-2 col-form-label">Medicine Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="name" name="name" value="{{ $medicine->name }}" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="type" class="col-sm-2 col-form-label">Type</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="type" name="type" value="{{ $medicine->type }}" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="manufacturer" class="col-sm-2 col-form-label">Manufacturer</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="manufacturer" name="manufacturer" value="{{ $medicine->manufacturer }}" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="expiry_date" class="col-sm-2 col-form-label">Expiry Date</label>
                            <div class="col-sm-10">
                                <input type="date" class="form-control" id="expiry_date" name="expiry_date" value="{{ $medicine->expiry_date }}" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="price" class="col-sm-2 col-form-label">Price</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" id="price" name="price" value="{{ $medicine->price }}" step="0.01" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="stock_quantity" class="col-sm-2 col-form-label">Stock Quantity</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" id="stock_quantity" name="stock_quantity" value="{{ $medicine->stock_quantity }}" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-sm-10 offset-sm-2">
                                <button type="submit" class="btn btn-primary">Update Medicine</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</section>

@endsection
