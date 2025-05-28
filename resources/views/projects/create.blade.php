@extends('layouts.app')
@section('main')

 <style>
    body{
      background-color:#EAEAEA;
    }
  </style>
  @if($message = Session::get('success'))
    <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
      {{ $message }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  @endif

  <div class="container py-5">
    <div class="row justify-content-center align-items-center" style="min-height: 80vh;">
      <div class="col-md-8 col-lg-6">
        <div class="card shadow-lg border-0 rounded-4">
          <div class="card-header text-primary text-center rounded-top-4">
            <h1 class="mb-0 fs-3 fw-bold">Create New Project</h1>
          </div>
          <div class="card-body p-4">
            <form action="/projects/storeForProject" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
              @csrf
              <div class="mb-3">
                <label for="title" class="form-label fw-semibold">Project Title</label>
                <input type="text" class="form-control form-control-lg" id="title" name="name" required placeholder="Enter project title">
                <div class="invalid-feedback">Please enter a project title.</div>
              </div>
              <div class="mb-3">
                <label for="description" class="form-label fw-semibold">Project Description</label>
                <textarea class="form-control form-control-lg" id="description" name="description" rows="4" required placeholder="Describe your project"></textarea>
                <div class="invalid-feedback">Please enter a description.</div>
              </div>
              <div class="mb-3">
                <label for="url" class="form-label fw-semibold">Project URL</label>
                <input type="url" class="form-control form-control-lg" id="url" name="github_url" required placeholder="https://github.com/your-repo">
                <div class="invalid-feedback">Please enter a valid URL.</div>
              </div>
              <div class="mb-3">
                <label for="image" class="form-label fw-semibold">Project Image</label>
                <input type="file" class="form-control form-control-lg" id="image" name="image" accept="image/*" required>
                <div class="invalid-feedback">Please upload a project image.</div>
              </div>
              <div class="mb-4">
                <label for="status" class="form-label fw-semibold">Project Status</label>
                <select class="form-select form-select-lg" id="status" name="status" required>
                  <option value="" disabled selected>Select status</option>
                  <option value="draft">Draft</option>
                  <option value="published">Published</option>
                </select>
                <div class="invalid-feedback">Please select a status.</div>
              </div>
              <button type="submit" class="btn btn-primary btn-lg w-100 shadow-sm">Create Project</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection