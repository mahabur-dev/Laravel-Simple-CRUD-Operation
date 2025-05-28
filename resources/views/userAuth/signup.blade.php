@extends('layouts.app')
@section('main')

<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-7 col-lg-6">
      <div class="card shadow">
        <div class="card-header bg-secondary text-white text-center">
          <h2 class="mb-0">Signup Page</h2>
        </div>
        <div class="card-body">
         <form action="{{route('userAuth.store')}}" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>

            @csrf

            <div class="row mb-3">
              <div class="col">
                <label for="firstName" class="form-label">First Name</label>
                <input type="text" name="firstName" id="firstName" class="form-control" required placeholder="User firstName">
              </div>
              <div class="col">
                <label for="lastName" class="form-label">Last Name</label>
                <input type="text" name="lastName" id="lastName" class="form-control" required placeholder="User lastName">
              </div>
            </div>

            <div class="mb-3">
              <label for="email" class="form-label">Email</label>
              <input type="email" name="email" id="email" class="form-control" required placeholder="User email">
            </div>

            <div class="mb-3">
              <label for="password" class="form-label">Password</label>
              <input type="password" name="password" id="password" class="form-control" required placeholder="User password">
            </div>

            <div class="mb-3">
              <label for="confirmPassword" class="form-label">Confirm Password</label>
              <input type="password" name="password_confirmation" id="confirmPassword" class="form-control" required placeholder="User confirm Password">
            </div>

            <div class="mb-3">
              <label for="image" class="form-label">Image</label>
              <input type="file" name="image" id="image" class="form-control" required>
            </div>

            <div class="mb-4">
              <label for="PhoneNumber" class="form-label">Phone Number</label>
              <input type="tel" name="phoneNumber" id="PhoneNumber" class="form-control" required placeholder="User phone number">
            </div>

            <div class="d-grid">
              <button type="submit" class="btn btn-primary btn-lg">Sign Up</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection