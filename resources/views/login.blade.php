<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Kasir - Pisces Accessories</title>

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Google Font -->
  <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&family=Urbanist:wght@400;600;700&display=swap" rel="stylesheet">

  <style>
    body {
      background: radial-gradient(circle at top, #0A0E29 0%, #060818 100%);
      color: #fff;
      font-family: 'Urbanist', sans-serif;
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .login-box {
      background: rgba(15, 20, 45, 0.85);
      border-radius: 18px;
      padding: 40px 35px;
      width: 360px;
      box-shadow: 0 0 25px rgba(86, 204, 242, 0.4);
    }

    .neon-title {
      font-family: 'Great Vibes', cursive;
      font-size: 42px;
      font-weight: 400;
      color: #58d6ff;
      text-shadow: 0 0 10px rgba(88, 214, 255, 0.9),
                   0 0 22px rgba(88, 214, 255, 0.7),
                   0 0 32px rgba(88, 214, 255, 0.5);
    }

    .form-label {
      font-weight: 600;
      font-size: 14px;
    }

    .form-control {
      background: #0c122f;
      color: #c9f1ff;
      border: 1px solid #56CCF2;
      border-radius: 12px;
      padding: 10px;
    }

    .form-control:focus {
      outline: none;
      box-shadow: 0 0 10px #56CCF2;
      border-color: #56CCF2;
    }

    .btn-login {
      background: linear-gradient(90deg, #FF3484, #56CCF2);
      border: none;
      border-radius: 25px;
      width: 100%;
      padding: 10px;
      margin-top: 15px;
      font-weight: 700;
      box-shadow: 0 0 14px rgba(86, 204, 242, 0.7);
      transition: 0.2s ease-in-out;
    }

    .btn-login:hover {
      transform: translateY(-2px);
      box-shadow: 0 0 20px rgba(86, 204, 242, 1);
    }
  </style>
</head>

<body>
  <div class="login-box">
    <h2 class="neon-title text-center mb-4">Piscash</h2>

    @if(session('error'))
      <div class="alert alert-danger text-center">{{ session('error') }}</div>
    @endif

    <form method="POST" action="/login">
      @csrf

      <div class="mb-3">
        <label class="form-label">Username</label>
        <input type="text" name="username" required class="form-control" placeholder="Masukkan username">
      </div>

      <div class="mb-3">
        <label class="form-label">Password</label>
        <input type="password" name="password" required class="form-control" placeholder="Masukkan password">
      </div>

      <button type="submit" class="btn-login">Masuk</button>

    </form>
  </div>
</body>
</html>
