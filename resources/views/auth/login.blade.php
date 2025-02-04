@extends('adminlte.layouts.auth')

@section('title', 'Login')

@section('content')

  <body class="hold-transition login-page">
    <div class="card login-box py-4" style="width:28rem;">
      <div class="w-100 d-flex justify-content-center border-bottom mb-2 mt-3 pb-4">
        <img src="{{ asset('assets/dist/img/polban.png') }}" class="img-fluid" style="width: auto; height: auto;"
          alt="Polban Logo">
      </div>

      <div class="card-body px-4">
        <form action="{{ route('login') }}" method="POST">
          @csrf
          <label for="email" class="fw-normal mb-1">Email</label>
          <div class="input-group mb-3">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
            <input type="email" id="email" class="form-control @error('email') is-invalid @enderror" name="email"
              value="{{ old('email') }}" placeholder="Enter Email" style="outline: none; box-shadow: none;">
            @error('email')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
          </div>
          <label for="password" class="fw-normal mb-1">Password</label>
          <div class="input-group mb-3">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
            <input type="password" id="password" class="form-control @error('password') is-invalid @enderror"
              name="password" placeholder="Password" style="outline: none; box-shadow: none;">
            @error('password')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
          </div>
          @if (Route::has('password.request'))
            <div class="d-flex justify-content-end mb-2">
              <a href="{{ route('password.request') }}" class="fw-bold text-decoration-none text-sm">Forgot Password</a>
            </div>
          @endif
          <div class="row">
            <div>
              <button type="submit" class="btn btn-primary btn-block">Login</button>
            </div>
          </div>
        </form>

        @if (Route::has('register'))
          <div class="d-flex justify-content-center align-content-center mt-3">
            Don't have an account yet?<a href="{{ route('register') }}" class="fw-bold text-decoration-none mx-1">
              Register
            </a>
          </div>
        @endif
      </div>
    </div>

  @endsection
