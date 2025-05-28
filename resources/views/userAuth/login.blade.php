@extends('layouts.app')
@section('main')

<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-7 col-lg-6">
      <div class="card shadow">
        <div class="card-header bg-secondary text-white text-center">
          <h2 class="mb-0">login Page</h2>
        </div>
        <div class="card-body">
          <form action="{{route('userAuth.userLogin')}}" method="POST" class="needs-validation" novalidate>
            @csrf
            <div class="mb-3">
              <label for="email" class="form-label">Email</label>
              <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" required placeholder="User email" value="{{ old('email') }}">
              @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>

            <div class="mb-3">
              <label for="password" class="form-label">Password</label>
              <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" required placeholder="User password">
              @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>

            <div class="d-grid">
              <button type="submit" class="btn btn-primary btn-lg">Login</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection