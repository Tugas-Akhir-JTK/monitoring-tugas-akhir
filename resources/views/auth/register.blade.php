@extends('adminlte.layouts.auth')

@section('title', 'Register')

@section('content')

  <body class="hold-transition login-page vh-100">
    <div class="card login-box w-100 py-3" style="max-width:28rem; height:auto">
      <div class="w-100 d-flex justify-content-center border-bottom mb-1 mt-3 pb-4">
        <img src="{{ asset('assets/dist/img/polban.png') }}" class="img-fluid" style="width: auto; height: auto;"
          alt="Polban Logo">
      </div>

      <div class="card-body px-4">
        <div class="d-flex align-items-center text-secondary flex-column mb-4 text-center">
          <h5>Register Account Form</h5>
          <div class="div w-50 border-primary border border-2"></div>
        </div>
        <form action="{{ route('register') }}" method="POST">
          @csrf
          <div class="input-group mb-3">
            <select id="selected_role_register" type="text" class="form-control @error('role') is-invalid @enderror"
              name="role" placeholder="Role" value="{{ old('role') }}" required>
              <option value="">-- Select Role --</option>
              <option value="1">Koordinator</option>
              <option value="2">Dosen Pembimbing</option>
              <option value="3">Mahasiswa</option>
            </select>
            @error('role')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
          </div>

          <div class="input-group mb-3">
            <input id="name_register_input" type="text" class="form-control @error('name') is-invalid @enderror"
              name="name" placeholder="Nama" value="{{ old('name') }}" disabled>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
            @error('name')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
          </div>

          <div class="input-group mb-3">
            <input id="nomor_induk_register_input" type="text"
              class="form-control @error('nomor_induk') is-invalid @enderror" placeholder="NIM/NIP" name="nomor_induk"
              value="{{ old('nomor_induk') }}" disabled>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-key"></span>
              </div>
            </div>
            @error('nomor_induk')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
          </div>

          <div id="kelas_register_container" class="input-group d-none mb-3">
            <select type="text" class="form-control @error('kelas') is-invalid @enderror" name="kelas"
              placeholder="Kelas" value="{{ old('kelas') }}" required>
              <option value="">-- Select Kelas --</option>
              <option value="1">D3 - 3A</option>
              <option value="2">D3 - 3B</option>
              <option value="3">D4 - 4A</option>
              <option value="4">D4 - 4B</option>
            </select>
            @error('kelas')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
          </div>

          <div class="input-group mb-3">
            <input id="email_register_input" type="email" class="form-control @error('email') is-invalid @enderror"
              name="email" placeholder="Email" value="{{ old('email') }}" disabled>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
            @error('email')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
          </div>

          <div class="input-group mb-3">
            <input id="password_register_input" type="password"
              class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password"
              disabled>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
            @error('password')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
          </div>
          <div class="input-group mb-3">
            <input id="confirm_password_register_input" type="password" class="form-control" name="password_confirmation"
              placeholder="Confirm Password" disabled>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>

          <div class="row">
            <div>
              <button type="submit" class="btn btn-primary btn-block">Register</button>
            </div>
          </div>
        </form>

        @if (Route::has('login'))
          <div class="d-flex justify-content-center align-content-center mt-3">
            Already have an account?<a href="{{ route('login') }}" class="fw-bold text-decoration-none mx-1">
              Login
            </a>
          </div>
        @endif
      </div>
    </div>

    <script>
      let selected_role = "";
      let container_kelas = document.getElementById("kelas_register_container");
      let name_input = document.getElementById("name_register_input");
      let nomor_induk_input = document.getElementById("nomor_induk_register_input");
      let email_input = document.getElementById("email_register_input");
      let password_input = document.getElementById("password_register_input");
      let confirm_password_input = document.getElementById("confirm_password_register_input");

      document.getElementById("selected_role_register").addEventListener("change", (event) => {
        selected_role = event.target.value;

        if (selected_role !== "") {
          name_input.removeAttribute("disabled");
          nomor_induk_input.removeAttribute("disabled");
          email_input.removeAttribute("disabled");
          password_input.removeAttribute("disabled");
          confirm_password_input.removeAttribute("disabled");
        }

        if (selected_role === "1" || selected_role === "2") {
          container_kelas.classList.add("d-none");
          nomor_induk_input.placeholder = "NIP";
        }

        if (selected_role === "3") {
          container_kelas.classList.remove("d-none");
          nomor_induk_input.placeholder = "NIM";
        }
      });
    </script>

  @endsection
