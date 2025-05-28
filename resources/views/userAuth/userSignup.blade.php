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
              <div class="mb-3">
                <label for="name" class="form-label">User Name</label>
                <input type="text" name="name" id="name" class="form-control" required placeholder="User Name">
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