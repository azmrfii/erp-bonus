<nav class="navbar navbar-expand-lg bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">ERP</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{ route('dashboard') }}">Dashboard</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Bonus
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="{{ route('bonuses.index') }}">List</a></li>
              <li><a class="dropdown-item" href="{{ route('bonuses.create') }}">Create</a></li>
            </ul>
          </li>
          @guest
            @if (Route::has('login'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
            @endif
          @else
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                {{ Auth::user()->name }}
              </a>
              <ul class="dropdown-menu">
                <a href="" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Profile</a>
                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
                </form>
              </ul>
            </li>
          @endguest
        </ul>
      </div>
    </div>
</nav>
{{-- profile --}}
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Profile</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="{{ route('profile.update', Auth::user()->id) }}" method="POST">
      @csrf
      @method('PUT')
          <div class="modal-body">
              <label for="name">Name:</label>
              <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" placeholder="Name" value="{{ Auth::user()->name }}">
              @error('name')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
              <label for="email">Email:</label>
              <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" value="{{ Auth::user()->email }}">
              @error('email')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
              <label for="role">Role:</label>
              <input type="text" name="role" id="role" class="form-control @error('role') is-invalid @enderror" placeholder="role" value="{{ Auth::user()->role }}" disabled>
              @error('role') 
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
          </div>
          <div class="modal-footer">
          {{-- <button type="submit" class="btn btn-primary">Update</button> --}}
          </div>
      </form>
    </div>
  </div>
</div>