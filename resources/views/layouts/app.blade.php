<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Laravel CRUD Project</title>
  @vite(['resources/js/app.js'])
</head>
<body>
    <header class="p-3 mb-3 border-bottom bg-primary">
      <div class="container">
        {{-- @auth
          <span class="text-white me-3">Welcome, {{ Auth::user()->name }}</span>
        @endauth --}}
        <div class="d-flex flex-wrap align-items-center justify-content-between">
          <div>
            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
              <li><a href="/" class="nav-link px-2 text-white text-bold">Home</a></li>
              <li><a href="/projects/all_projects" class="nav-link px-2 text-white text-bold">Projects</a></li>
            </ul>
          </div>
          <div>
            @if(!Auth::check())
              <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                <li><a href="{{ route('userAuth.login') }}" class="nav-link px-2 text-white text-bold">Login</a></li>
                <li><a href="{{ route('userAuth.userSignup') }}" class="nav-link px-2 text-white text-bold">Sign up</a></li>
              </ul>
            @else
              <ul class="d-flex col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0 list-inline">
                 <li><span class="text-white me-3 nav-link px-2">Welcome, {{ Auth::user()->name }}</span></li>
                <li>
                  <form action="{{ route('Logout') }}" method="POST" style="display:inline;">
                    @csrf
                    <button type="submit" class="nav-link px-2 text-white text-bold btn btn-link" style="padding:0; border:none; background:none;">Logout</button>
                  </form>
                </li>
              </ul>
            @endif
          </div>

        </div>
        
      </div>
    </header>

    @yield('main')
    
</body>
</html>