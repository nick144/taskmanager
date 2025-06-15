<!-- resources/views/layouts/navbar.blade.php -->

<nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
  <div class="container">
    <a class="navbar-brand fw-bold text-primary" href="{{ url('/') }}">TaskManager</a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" 
      aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">

        {{-- <li class="nav-item">
          <a class="nav-link" href="{{ route('home') }}">Home</a>
        </li> --}}

        @auth
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Tasks</a>
            <ul class="dropdown-menu dropdown-menu-end">
            <li>
                <a class="dropdown-item" href="{{ route('tasks.index') }}">List</a>
            </li>
              <li>
                <a class="dropdown-item" href="{{ route('tasks.create')}} ">Create Task</a>
              </li>
            </ul>
          </li>
          
          <li class="nav-item">
            <a class="nav-link" href="{{ route('categories.index') }}">Categories</a>
          </li>

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
              {{ Auth::user()->name }}
            </a>
            <ul class="dropdown-menu dropdown-menu-end">
              <li>
                <form method="POST" action="{{ route('logout') }}">
                  @csrf
                  <button class="dropdown-item" type="submit">Logout</button>
                </form>
              </li>
            </ul>
          </li>
        @endauth

        @guest
          <li class="nav-item">
            <a class="nav-link" href="{{ route('login.form') }}">Login</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('signup.form') }}">Register</a>
          </li>
        @endguest

      </ul>
    </div>
  </div>
</nav>
