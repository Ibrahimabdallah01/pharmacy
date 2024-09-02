@extends('admin.layouts.app')

@section('content')

<div class="pagetitle">
    <h1>Add Supplier</h1>
</div>

<section class="section">
    <div class="row">
        <div class="col-lg-12">
            @include('message')

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Supplier Details</h5>

                    <form action="{{ route('admin.suppliers.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="supplier_name">Name</label>
                            <input type="text" class="form-control" id="supplier_name" name="supplier_name" required>
                        </div>
                        <div class="form-group">
                            <label for="supplier_email">Email</label>
                            <input type="email" class="form-control" id="supplier_email" name="supplier_email" required>
                        </div>
                        <div class="form-group">
                            <label for="supplier_number">Number</label>
                            <input type="text" class="form-control" id="supplier_number" name="supplier_number" required>
                        </div>
                        <div class="form-group">
                            <label for="address">Address</label>
                            <textarea class="form-control" id="address" name="address" rows="3" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary mt-3">Save</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</section>

@endsection
