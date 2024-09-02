@extends('admin.layouts.app')

@section('content')

<div class="pagetitle">
    <h1>Edit Customer</h1>
</div>

<section class="section">
    <div class="row">
        <div class="col-lg-12">
            @include('message')
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Update Customer Details</h5>

                    <form action="{{ route('admin.customers.update', $customer->id) }}" method="POST">
                        @csrf
                        @method('PUT') <!-- Use PUT method for updates -->

                        <div class="form-group mb-3">
                            <label for="name">Customer Name</label>
                            <input type="text" name="name" class="form-control" value="{{ $customer->name }}" required>
                        </div>

                        <div class="form-group mb-3">
                            <label for="contact">Contact Number</label>
                            <input type="text" name="contact" class="form-control" value="{{ $customer->contact }}" required>
                        </div>

                        <div class="form-group mb-3">
                            <label for="address">Address</label>
                            <input type="text" name="address" class="form-control" value="{{ $customer->address }}" required>
                        </div>

                        <div class="form-group mb-3">
                            <label for="doctor_name">Doctor's Name</label>
                            <input type="text" name="doctor_name" class="form-control" value="{{ $customer->doctor_name }}">
                        </div>

                        <div class="form-group mb-3">
                            <label for="doctor_address">Doctor's Address</label>
                            <input type="text" name="doctor_address" class="form-control" value="{{ $customer->doctor_address }}">
                        </div>

                        <button type="submit" class="btn btn-primary">Update Customer</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
