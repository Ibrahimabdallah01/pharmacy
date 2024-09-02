@extends('admin.layouts.app')

@section('content')

<div class="pagetitle">
    <h1>Customer List</h1>
</div>

<section class="section">
    <div class="row">
        <div class="col-lg-12">
            @include('message')
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">
                        <a href="{{ url('admin/customers/add') }}" class="btn btn-primary">Add New Customer</a>
                    </h5>

                    <table class="table datatable">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Contact Number</th>
                                <th scope="col">Address</th>
                                <th scope="col">Doctor Name</th>
                                <th scope="col">Doctor Address</th>
                                <th scope="col">Created At</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($customers as $customer)
                            <tr>
                                <th scope="row">{{ $customer->id }}</th>
                                <td>{{ $customer->name }}</td>
                                <td>{{ $customer->contact }}</td>
                                <td>{{ $customer->address }}</td>
                                <td>{{ $customer->doctor_name }}</td>
                                <td>{{ $customer->doctor_address }}</td>
                                <td>{{ date('d-m-Y H:i:s', strtotime($customer->created_at)) }}</td>
                                <td>
                                    <a href="{{ route('admin.customers.edit', $customer->id) }}" class="btn btn-warning">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>

                                    <form action="{{ route('admin.customers.delete', $customer->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete?')">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
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
