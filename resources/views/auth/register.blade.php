<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Register</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('lte/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{ asset('lte/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('lte/dist/css/adminlte.min.css') }}">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="{{ route('login') }}" class="h1"><b>Admin</b>LTE</a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Halaman Register</p>

      <form action="{{ route('register.proses') }}" method="post">
        @csrf

        <div class="input-group mb-3">
          <input type="text" name="nama" class="form-control" placeholder="Nama Lengkap" required>
          <div class="input-group-append">
            <div class="input-group-text"><span class="fas fa-user"></span></div>
          </div>
        </div>
        @error('nama')
          <small class="text-danger">{{ $message }}</small>
        @enderror

        <div class="input-group mb-3">
          <input type="text" name="username" class="form-control" placeholder="Username" required>
          <div class="input-group-append">
            <div class="input-group-text"><span class="fas fa-user-tag"></span></div>
          </div>
        </div>
        @error('username')
          <small class="text-danger">{{ $message }}</small>
        @enderror

        <div class="input-group mb-3">
            <select name="level_id" class="form-control" required>
                <option value="" disabled selected>Pilih Role</option>
                @foreach($roles as $role)
                    <option value="{{ $role->level_id }}">{{ $role->role }}</option>
                @endforeach
            </select>
            <div class="input-group-append">
                <div class="input-group-text"><span class="fas fa-users-cog"></span></div>
            </div>
        </div>
        @error('level_id')
            <small class="text-danger">{{ $message }}</small>
        @enderror
        

        <div class="input-group mb-3">
          <input type="password" name="password" class="form-control" placeholder="Password" required>
          <div class="input-group-append">
            <div class="input-group-text"><span class="fas fa-lock"></span></div>
          </div>
        </div>
        @error('password')
          <small class="text-danger">{{ $message }}</small>
        @enderror

        <div class="row">
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block">Register</button>
          </div>
        </div>
      </form>

      <p class="mt-3 mb-1">
        <a href="{{ route('login') }}">Sudah punya akun? Login di sini</a>
      </p>
    </div>
  </div>
</div>

<!-- Scripts -->
<script src="{{ asset('lte/plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('lte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('lte/dist/js/adminlte.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@if (session('success'))
<script>
  Swal.fire('Berhasil', "{{ session('success') }}", 'success');
</script>
@endif

@if (session('failed'))
<script>
  Swal.fire('Gagal', "{{ session('failed') }}", 'error');
</script>
@endif

</body>
</html>
