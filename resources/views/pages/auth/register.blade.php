<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>DesaKu - Registrasi</title>

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
      padding: 2rem 0;
    }

    .register-container {
      width: 100%;
      max-width: 480px;
      padding: 0 20px;
    }

    .register-card {
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

    .register-header {
      background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
      padding: 2.5rem 2rem;
      text-align: center;
      color: white;
    }

    .register-header .logo-circle {
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

    .register-header .logo-circle i {
      font-size: 2rem;
    }

    .register-header h1 {
      font-size: 1.75rem;
      font-weight: 700;
      margin-bottom: 0.5rem;
    }

    .register-header p {
      font-size: 0.95rem;
      opacity: 0.9;
      margin-bottom: 0;
    }

    .register-body {
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

    .btn-register {
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

    .btn-register:hover {
      transform: translateY(-2px);
      box-shadow: 0 10px 25px rgba(102, 126, 234, 0.4);
    }

    .btn-register:active {
      transform: translateY(0);
    }

    .btn-register:disabled {
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

    .login-link {
      text-align: center;
      margin-top: 1.5rem;
    }

    .login-link a {
      color: #667eea;
      font-weight: 600;
      text-decoration: none;
      transition: all 0.2s ease;
    }

    .login-link a:hover {
      color: #764ba2;
      text-decoration: underline;
    }

    /* Info box */
    .info-box {
      background: #f7fafc;
      border-left: 4px solid #667eea;
      padding: 1rem;
      border-radius: 8px;
      margin-bottom: 1.5rem;
    }

    .info-box p {
      margin: 0;
      font-size: 0.85rem;
      color: #4a5568;
      line-height: 1.6;
    }

    .info-box i {
      color: #667eea;
      margin-right: 0.5rem;
    }

    /* Loading spinner */
    .btn-register.loading::after {
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

    /* Password strength indicator */
    .password-strength {
      height: 4px;
      background: #e2e8f0;
      border-radius: 2px;
      margin-top: 0.5rem;
      overflow: hidden;
    }

    .password-strength-bar {
      height: 100%;
      width: 0;
      transition: all 0.3s ease;
    }

    .password-strength-bar.weak {
      width: 33%;
      background: #f56565;
    }

    .password-strength-bar.medium {
      width: 66%;
      background: #ed8936;
    }

    .password-strength-bar.strong {
      width: 100%;
      background: #48bb78;
    }

    /* Responsive */
    @media (max-width: 576px) {
      .register-header {
        padding: 2rem 1.5rem;
      }

      .register-body {
        padding: 2rem 1.5rem;
      }

      .register-header h1 {
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
        html: "@foreach ($errors->all() as $error)<div>• {{ $error }}</div>@endforeach",
        icon: "error",
        confirmButtonColor: '#667eea'
      });
    </script>
  @endif

  <div class="register-container">
    <div class="register-card">
      <!-- Header -->
      <div class="register-header">
        <div class="logo-circle">
          <i class="fas fa-user-plus"></i>
        </div>
        <h1>Daftar Akun</h1>
        <p>Sistem Informasi Desa</p>
      </div>

      <!-- Body -->
      <div class="register-body">
        <!-- Info Box -->
        <div class="info-box">
          <p>
            <i class="fas fa-info-circle"></i>
            <strong>Perhatian:</strong> Akun Anda akan diverifikasi oleh admin sebelum dapat digunakan.
          </p>
        </div>

        <form action="/register" method="POST" id="registerForm">
          @csrf
          @method('POST')

          <div class="form-group">
            <label class="form-label">Nama Lengkap</label>
            <div class="input-group">
              <i class="fas fa-user input-icon"></i>
              <input type="text" class="form-control" id="inputName" name="name"
                placeholder="Masukkan nama lengkap" value="{{ old('name') }}" required>
            </div>
          </div>

          <div class="form-group">
            <label class="form-label">Email</label>
            <div class="input-group">
              <i class="fas fa-envelope input-icon"></i>
              <input type="email" class="form-control" id="inputEmail" name="email" placeholder="nama@email.com"
                value="{{ old('email') }}" required>
            </div>
          </div>

          <div class="form-group">
            <label class="form-label">Password</label>
            <div class="input-group">
              <i class="fas fa-lock input-icon"></i>
              <input type="password" class="form-control" id="inputPassword" name="password"
                placeholder="Minimal 8 karakter" required>
            </div>
            <div class="password-strength">
              <div class="password-strength-bar" id="strengthBar"></div>
            </div>
            <small class="text-muted" id="strengthText"></small>
          </div>

          <div class="form-group">
            <label class="form-label">Konfirmasi Password</label>
            <div class="input-group">
              <i class="fas fa-lock input-icon"></i>
              <input type="password" class="form-control" id="inputPasswordConfirm" name="password_confirmation"
                placeholder="Ulangi password" required>
            </div>
          </div>

          <button type="submit" class="btn-register" id="submitBtn">
            <i class="fas fa-user-plus mr-2"></i>Daftar Sekarang
          </button>
        </form>

        <div class="divider">
          <span>atau</span>
        </div>

        <div class="login-link">
          <span style="color: #718096;">Sudah punya akun?</span>
          <a href="/">Masuk di sini</a>
        </div>
      </div>
    </div>
  </div>

  <script>
    // Password strength checker
    const passwordInput = document.getElementById('inputPassword');
    const strengthBar = document.getElementById('strengthBar');
    const strengthText = document.getElementById('strengthText');

    passwordInput.addEventListener('input', function() {
      const password = this.value;
      let strength = 0;

      if (password.length >= 8) strength++;
      if (password.match(/[a-z]/) && password.match(/[A-Z]/)) strength++;
      if (password.match(/[0-9]/)) strength++;
      if (password.match(/[^a-zA-Z0-9]/)) strength++;

      strengthBar.className = 'password-strength-bar';

      if (password.length === 0) {
        strengthText.textContent = '';
      } else if (strength <= 1) {
        strengthBar.classList.add('weak');
        strengthText.textContent = 'Password lemah';
        strengthText.style.color = '#f56565';
      } else if (strength <= 2) {
        strengthBar.classList.add('medium');
        strengthText.textContent = 'Password sedang';
        strengthText.style.color = '#ed8936';
      } else {
        strengthBar.classList.add('strong');
        strengthText.textContent = 'Password kuat';
        strengthText.style.color = '#48bb78';
      }
    });

    // Handle form submission
    document.getElementById('registerForm').addEventListener('submit', function(e) {
      const password = document.getElementById('inputPassword').value;
      const confirmPassword = document.getElementById('inputPasswordConfirm').value;

      if (password !== confirmPassword) {
        e.preventDefault();
        Swal.fire({
          title: "Password Tidak Cocok",
          text: "Password dan konfirmasi password harus sama",
          icon: "error",
          confirmButtonColor: '#667eea'
        });
        return;
      }

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
