@extends('admin.layouts.app')

@section('content')

<div class="pagetitle">
    <h1>Add Medicine</h1>
</div>

<section class="section">
    <div class="row">
        <div class="col-lg-12">
            @include('message')
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Medicine Details</h5>

                    <form action="{{ url('admin/medicines/store') }}" method="POST">
                        @csrf
                        <div class="row mb-3">
                            <label for="name" class="col-sm-2 col-form-label">Medicine Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="type" class="col-sm-2 col-form-label">Type</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="type" name="type" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="manufacturer" class="col-sm-2 col-form-label">Manufacturer</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="manufacturer" name="manufacturer" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="expiry_date" class="col-sm-2 col-form-label">Expiry Date</label>
                            <div class="col-sm-10">
                                <input type="date" class="form-control" id="expiry_date" name="expiry_date" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="price" class="col-sm-2 col-form-label">Price</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" id="price" name="price" step="o.o1" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="stock_quantity" class="col-sm-2 col-form-label">Stock Quantity</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" id="stock_quantity" name="stock_quantity" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-sm-10 offset-sm-2">
                                <button type="submit" class="btn btn-primary">Add Medicine</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</section>

@endsection
