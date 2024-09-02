@extends('admin.layouts.app')

@section('content')

<div class="pagetitle">
    <h1>Edit Medicine Stock</h1>
</div>

<section class="section">
    <div class="row">
        <div class="col-lg-12">
            @include('message')
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Edit Medicine Stock Details</h5>

                    <form action="{{ route('admin.medicines_stock.update', $medicine_stock->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row mb-3">
                            <label for="medicines_id" class="col-sm-2 col-form-label">Medicine</label>
                            <div class="col-sm-10">
                                <select class="form-control" id="medicines_id" name="medicines_id" required>
                                    @foreach(App\Models\Medicine::all() as $medicine)
                                        <option value="{{ $medicine->id }}" {{ $medicine->id == $medicine_stock->medicines_id ? 'selected' : '' }}>
                                            {{ $medicine->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="batch_id" class="col-sm-2 col-form-label">Batch ID</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="batch_id" name="batch_id" value="{{ $medicine_stock->batch_id }}" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="expiry_date" class="col-sm-2 col-form-label">Expiry Date</label>
                            <div class="col-sm-10">
                                <input type="date" class="form-control" id="expiry_date" name="expiry_date" value="{{ \Carbon\Carbon::parse($medicine_stock->expiry_date)->format('Y-m-d') }}" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="quantity" class="col-sm-2 col-form-label">Quantity</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" id="quantity" name="quantity" value="{{ $medicine_stock->quantity }}" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="mrp" class="col-sm-2 col-form-label">MRP</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" id="mrp" name="mrp" value="{{ $medicine_stock->mrp }}" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="rate" class="col-sm-2 col-form-label">Rate</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" id="rate" name="rate" value="{{ $medicine_stock->rate }}" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-sm-10 offset-sm-2">
                                <button type="submit" class="btn btn-primary">Update Stock</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</section>

@endsection
