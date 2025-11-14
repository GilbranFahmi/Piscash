<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Kasir - Pisces Accessories</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Urbanist:wght@400;600;700&display=swap" rel="stylesheet">
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
        background: rgba(15, 20, 45, 0.8);
        border-radius: 15px;
        padding: 40px;
        box-shadow: 0 0 25px rgba(86, 204, 242, 0.4);
        width: 350px;
    }
    .login-box h2 {
        color: #56CCF2;
        font-weight: 700;
        text-align: center;
        margin-bottom: 30px;
    }
    .btn-login {
        background: linear-gradient(90deg, #2F80ED, #56CCF2);
        border: none;
        color: #fff;
        font-weight: 600;
        border-radius: 50px;
        width: 100%;
        padding: 10px;
        box-shadow: 0 0 15px rgba(86, 204, 242, 0.6);
    }
  </style>
</head>
<body>
  <div class="login-box">
    <h2>Piscash</h2>

    @if(session('error'))
        <div class="alert alert-danger text-center">{{ session('error') }}</div>
    @endif

    <form method="POST" action="/login">
      @csrf
      <div class="mb-3">
        <label class="form-label">Username</label>
        <input type="text" name="username" class="form-control" placeholder="Masukkan username" required>
      </div>
      <div class="mb-3">
        <label class="form-label">Password</label>
        <input type="password" name="password" class="form-control" placeholder="Masukkan password" required>
      </div>
      <button type="submit" class="btn-login">Masuk</button>

   
    </form>
  </div>
</body>
</html>
