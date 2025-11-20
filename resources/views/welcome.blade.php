<!DOCTYPE html> 
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pisces Accessories</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">


  <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">

  <style>
    body {
      background-color: #05061a;
      color: #fff;
      font-family: 'Poppins', sans-serif;
      overflow-x: hidden;
    }

   
    .navbar {
      background: rgba(5, 6, 26, 0.85);
      backdrop-filter: blur(8px);
      border-bottom: 1px solid rgba(255,255,255,0.1);
    }

    .navbar-brand {
      font-family: 'Great Vibes', cursive;
      font-size: 1.8rem;
      color: #b3e9ff !important;
      text-shadow: 0 0 10px #58d6ff, 0 0 20px #58d6ff;
      display: flex;
      align-items: center;
      gap: 8px;
    }

    .logo-img {
      height: 35px;
      width: auto;
    }

    .nav-link {
      color: #56CCF2 !important; 
      font-weight: 500;
      margin: 0 8px;
      transition: all 0.3s ease;
      text-shadow: 0 0 6px #56CCF2;
    }

    .nav-link.active {
      color: #FF3484 !important; 
      text-shadow: 0 0 8px #FF3484;
    }

   
    .nav-link:hover {
      color: #FF3484 !important;
      text-shadow: 0 0 8px #FF3484;
    }

    .nav-link.active:hover {
      color: #56CCF2 !important;
      text-shadow: 0 0 8px #56CCF2;
    }

    .btn-logout {
      border: 1px solid #FF3484;
      color: #FF3484;
      border-radius: 20px;
      padding: 6px 20px;
      transition: 0.3s;
    }

    .btn-logout:hover {
      background: linear-gradient(90deg, #FF3484, #56CCF2);
      color: #fff !important;
      box-shadow: 0 0 15px #56CCF2;
      border: none;
      transform: scale(1.05);
    }

   
    .hero {
      min-height: 100vh;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      text-align: center;
      padding: 80px 20px;
    }

    .hero h1 {
      font-family: 'Great Vibes', cursive;
      font-size: 4.5rem;
      color: #b3e9ff;
      text-shadow: 0 0 15px #58d6ff, 0 0 30px #58d6ff;
    }

    .hero p {
      font-size: 1.1rem;
      color: #c0c3d3;
      margin-top: 12px;
      max-width: 600px;
    }

    .btn-glow {
      background: linear-gradient(90deg, #FF3484, #56CCF2);
      border: none;
      color: white;
      font-weight: 600;
      border-radius: 50px;
      padding: 12px 40px;
      margin-top: 30px;
      box-shadow: 0 0 15px rgba(88,214,255,0.6);
      transition: all 0.3s ease;
    }

    .btn-glow:hover {
      box-shadow: 0 0 25px rgba(88,214,255,0.9);
      transform: scale(1.05);
    }

    footer {
      text-align: center;
      color: #9ca0b3;
      font-size: 0.9rem;
      padding: 20px 0;
      border-top: 1px solid rgba(255,255,255,0.1);
      background: rgba(5,6,26,0.8);
      backdrop-filter: blur(5px);
    }
  </style>
</head>

<body>

 
 @extends('layouts.main')

@section('title', 'Produk')

@section('content')

  <section class="hero">
    <h1>Pisces Accessories</h1>
    <p>Elegant; radiant; and full of character like the stars in the night sky.</p>
    <a href="/transaksi" class="btn btn-glow">Mulai Transaksi</a>
  </section>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  @endsection
</body>
</html>
