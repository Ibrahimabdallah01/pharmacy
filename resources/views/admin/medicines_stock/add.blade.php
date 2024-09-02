@extends('admin.layouts.app')

@section('content')

<div class="pagetitle">
    <h1>Add Medicine Stock</h1>
</div>

<section class="section">
    <div class="row">
        <div class="col-lg-12">
            @include('message')
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Medicine Stock Details</h5>

                    <form action="{{ route('admin.medicines_stock.store') }}" method="POST">
                        @csrf
                        <div class="row mb-3">
                            <label for="medicine_id" class="col-sm-2 col-form-label">Medicine</label>
                            <div class="col-sm-10">
                                <select class="form-control" id="medicine_id" name="medicine_id" required>
                                    @foreach(App\Models\Medicine::all() as $medicine)
                                        <option value="{{ $medicine->id }}">{{ $medicine->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="batch_id" class="col-sm-2 col-form-label">Batch ID</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="batch_id" name="batch_id" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="expiry_date" class="col-sm-2 col-form-label">Expiry Date</label>
                            <div class="col-sm-10">
                                <input type="date" class="form-control" id="expiry_date" name="expiry_date" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="quantity" class="col-sm-2 col-form-label">Quantity</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" id="quantity" name="quantity" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="mrp" class="col-sm-2 col-form-label">MRP</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" id="mrp" name="mrp" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="rate" class="col-sm-2 col-form-label">Rate</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" id="rate" name="rate" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-sm-10 offset-sm-2">
                                <button type="submit" class="btn btn-primary">Add Stock</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</section>

@endsection
