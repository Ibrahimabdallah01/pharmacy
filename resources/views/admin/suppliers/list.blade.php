@extends('admin.layouts.app')

@section('content')

<div class="pagetitle">
    <h1>Suppliers List</h1>
</div>

<section class="section">
    <div class="row">
        <div class="col-lg-12">
            @include('message') <!-- For displaying success/error messages -->

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">
                        <a href="{{ route('admin.suppliers.create') }}" class="btn btn-primary">Add New Supplier</a>
                    </h5>

                    {{-- <!-- Search form -->
                    <form method="GET" action="{{ route('admin.suppliers.index') }}" class="mb-3">
                        <div class="input-group">
                            <input type="text" class="form-control" name="search" placeholder="Search suppliers" value="{{ request()->input('search') }}">
                            <button class="btn btn-primary" type="submit">Search</button>
                        </div>
                    </form> --}}

                    <!-- Suppliers table -->
                    <table class="table table-striped datatable">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Number</th>
                                <th>Address</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($suppliers as $supplier)
                            <tr>
                                <td>{{ $supplier->id }}</td>
                                <td>{{ $supplier->supplier_name }}</td>
                                <td>{{ $supplier->supplier_email }}</td>
                                <td>{{ $supplier->supplier_number }}</td>
                                <td>{{ $supplier->address }}</td>
                                <td>
                                    <a href="{{ route('admin.suppliers.show', $supplier->id) }}" class="btn btn-info btn-sm">View</a>
                                    <a href="{{ route('admin.suppliers.edit', $supplier->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('admin.suppliers.destroy', $supplier->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this supplier?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <!-- Pagination links -->
                    {{ $suppliers->links() }}

                </div>
            </div>
        </div>
    </div>
</section>

@endsection
