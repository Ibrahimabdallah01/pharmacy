@extends('layouts.app')

@section('content')
<div class="card mb-3">
    <div class="card-body">
        <div class="pt-4 pb-2">
            @include('message')
            <h5 class="card-title text-center pb-0 fs-4">Reset Your Password</h5>
            <p class="text-center small">Enter your new password below to reset it</p>
        </div>

        <form action="{{ route('reset.post') }}" method="POST" class="row g-3 needs-validation" novalidate>
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">
            <input type="hidden" name="email" value="{{ $email }}">

            <div class="col-12">
                <label class="form-label">New Password</label>
                <div class="input-group has-validation">
                    <input type="password" name="password" id="newPassword" class="form-control" required>
                    <div class="invalid-feedback">Please enter your new password.</div>
                </div>
            </div>

            <div class="col-12">
                <label class="form-label">Confirm New Password</label>
                <input type="password" name="password_confirmation" id="confirmPassword" class="form-control" required>
                <div class="invalid-feedback">Please confirm your new password.</div>
            </div>

            <div class="col-12">
                <button class="btn btn-primary w-100" type="submit">Reset Password</button>
            </div>
        </form>
    </div>
</div>
@endsection
