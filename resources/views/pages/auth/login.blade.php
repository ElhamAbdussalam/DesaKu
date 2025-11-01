<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>DesaKu - Login</title>

  <!-- Custom fonts for this template-->
  <link href="{{ asset('template/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
    rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="{{ asset('template/css/sb-admin-2.min.css') }}" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <style>
    * {
      font-family: 'Inter', sans-serif;
    }

    body {
      background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .login-container {
      width: 100%;
      max-width: 450px;
      padding: 0 20px;
    }

    .login-card {
      background: white;
      border-radius: 20px;
      box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
      overflow: hidden;
      animation: slideUp 0.5s ease;
    }

    @keyframes slideUp {
      from {
        opacity: 0;
        transform: translateY(30px);
      }

      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    .login-header {
      background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
      padding: 2.5rem 2rem;
      text-align: center;
      color: white;
    }

    .login-header .logo-circle {
      width: 80px;
      height: 80px;
      background: rgba(255, 255, 255, 0.2);
      backdrop-filter: blur(10px);
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      margin: 0 auto 1rem;
      border: 3px solid rgba(255, 255, 255, 0.3);
    }

    .login-header .logo-circle i {
      font-size: 2rem;
    }

    .login-header h1 {
      font-size: 1.75rem;
      font-weight: 700;
      margin-bottom: 0.5rem;
    }

    .login-header p {
      font-size: 0.95rem;
      opacity: 0.9;
      margin-bottom: 0;
    }

    .login-body {
      padding: 2.5rem 2rem;
    }

    .form-group {
      margin-bottom: 1.5rem;
    }

    .form-label {
      font-weight: 600;
      color: #4a5568;
      font-size: 0.9rem;
      margin-bottom: 0.5rem;
      display: block;
    }

    .form-control {
      border-radius: 12px;
      padding: 0.85rem 1rem;
      border: 2px solid #e2e8f0;
      font-size: 0.95rem;
      transition: all 0.3s ease;
    }

    .form-control:focus {
      border-color: #667eea;
      box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
    }

    .input-group {
      position: relative;
    }

    .input-group .input-icon {
      position: absolute;
      left: 1rem;
      top: 50%;
      transform: translateY(-50%);
      color: #a0aec0;
      z-index: 10;
    }

    .input-group .form-control {
      padding-left: 2.75rem;
    }

    .btn-login {
      width: 100%;
      padding: 0.9rem;
      font-weight: 600;
      font-size: 1rem;
      border-radius: 12px;
      background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
      border: none;
      color: white;
      transition: all 0.3s ease;
      margin-top: 1rem;
    }

    .btn-login:hover {
      transform: translateY(-2px);
      box-shadow: 0 10px 25px rgba(102, 126, 234, 0.4);
    }

    .btn-login:active {
      transform: translateY(0);
    }

    .btn-login:disabled {
      opacity: 0.6;
      cursor: not-allowed;
    }

    .divider {
      position: relative;
      text-align: center;
      margin: 1.5rem 0;
    }

    .divider::before {
      content: '';
      position: absolute;
      top: 50%;
      left: 0;
      right: 0;
      height: 1px;
      background: #e2e8f0;
    }

    .divider span {
      position: relative;
      background: white;
      padding: 0 1rem;
      color: #a0aec0;
      font-size: 0.85rem;
    }

    .register-link {
      text-align: center;
      margin-top: 1.5rem;
    }

    .register-link a {
      color: #667eea;
      font-weight: 600;
      text-decoration: none;
      transition: all 0.2s ease;
    }

    .register-link a:hover {
      color: #764ba2;
      text-decoration: underline;
    }

    /* Loading spinner */
    .btn-login.loading::after {
      content: '';
      width: 16px;
      height: 16px;
      border: 2px solid #ffffff;
      border-top-color: transparent;
      border-radius: 50%;
      display: inline-block;
      animation: spin 0.6s linear infinite;
      margin-left: 8px;
      vertical-align: middle;
    }

    @keyframes spin {
      to {
        transform: rotate(360deg);
      }
    }

    /* Responsive */
    @media (max-width: 576px) {
      .login-header {
        padding: 2rem 1.5rem;
      }

      .login-body {
        padding: 2rem 1.5rem;
      }

      .login-header h1 {
        font-size: 1.5rem;
      }
    }
  </style>
</head>

<body>
  @if ($errors->any())
    <script>
      Swal.fire({
        title: "Terjadi Kesalahan",
        text: "@foreach ($errors->all() as $error) {{ $error }}{{ $loop->last ? '.' : ',' }} @endforeach",
        icon: "error",
        confirmButtonColor: '#667eea'
      });
    </script>
  @endif

  <div class="login-container">
    <div class="login-card">
      <!-- Header -->
      <div class="login-header">
        <div class="logo-circle">
          <i class="fas fa-home"></i>
        </div>
        <h1>DesaKu</h1>
        <p>Sistem Informasi Desa</p>
      </div>

      <!-- Body -->
      <div class="login-body">
        <form action="/login" method="POST" id="loginForm">
          @csrf
          @method('POST')

          <div class="form-group">
            <label class="form-label">Email</label>
            <div class="input-group">
              <i class="fas fa-envelope input-icon"></i>
              <input type="email" class="form-control" id="inputEmail" name="email" placeholder="nama@email.com"
                required>
            </div>
          </div>

          <div class="form-group">
            <label class="form-label">Password</label>
            <div class="input-group">
              <i class="fas fa-lock input-icon"></i>
              <input type="password" class="form-control" id="inputPassword" name="password"
                placeholder="Masukkan password" required>
            </div>
          </div>

          <button type="submit" class="btn-login" id="submitBtn">
            <i class="fas fa-sign-in-alt mr-2"></i>Masuk
          </button>
        </form>

        <div class="divider">
          <span>atau</span>
        </div>

        <div class="register-link">
          <span style="color: #718096;">Belum punya akun?</span>
          <a href="/register">Daftar Sekarang</a>
        </div>
      </div>
    </div>
  </div>

  <script>
    // Handle form submission
    document.getElementById('loginForm').addEventListener('submit', function(e) {
      const submitBtn = document.getElementById('submitBtn');
      submitBtn.disabled = true;
      submitBtn.classList.add('loading');
      submitBtn.innerHTML = '<span>Memproses</span>';
    });
  </script>

  <!-- Bootstrap core JavaScript-->
  <script src="{{ asset('template/vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('template/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

  <!-- Core plugin JavaScript-->
  <script src="{{ asset('template/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

  <!-- Custom scripts for all pages-->
  <script src="{{ asset('template/js/sb-admin-2.min.js') }}"></script>

</body>

</html>
