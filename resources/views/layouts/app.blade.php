<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>سوّاح</title>
  <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@700&display=swap" rel="stylesheet">
  <style>
    body {
      margin: 0;
      font-family: 'Cairo', sans-serif;
      background-image: url('{{ asset('images/S.jpg') }}');
      background-size: cover;
      background-position: center;
      min-height: 100vh;
    }

    .navbar {
      width: 120px;
      height: 100vh;
      background-color: #10114b;
      color: white;
      position: fixed;
      right: 0;
      top: 0;
      display: flex;
      flex-direction: column;
      align-items: flex-end;
      padding: 20px 10px;
    }

    .navbar h2 {
      font-size: 20px;
      margin-bottom: 20px;
      text-align: right;
    }

    .navbar a {
      color: white;
      text-decoration: none;
      padding: 10px 0;
      margin: 5px 0;
      font-size: 14px;
      text-align: right;
      display: block;
      width: 100%;
      transition: color 0.3s;
    }

    .navbar a:hover {
      color: #ffeb3b;
    }

    .main-content {
      margin-right: 140px;
      padding: 40px;
    }

    .card {
      background: white;
      padding: 15px;
      border-radius: 8px;
      margin-bottom: 20px;
      box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    }

    .card img {
      width: 100%;
      border-radius: 8px;
      object-fit: cover;
      max-height: 300px;
    }

    @media (max-width: 600px) {
      .navbar {
        width: 90px;
        padding: 10px;
      }

      .main-content {
        margin-right: 100px;
        padding: 20px;
      }
    }
  </style>
</head>
<body>
  <div class="navbar">
    <h2>سوّاح</h2>
    <a href="{{ route('home') }}">الرئيسية</a>
    <a href="{{ route('trips.index') }}">الرحلات</a>
    <a href="{{ route('dashboard') }}">الإدارة</a>
    <a href="{{ route('contact') }}">التواصل</a>
    @guest
      <a href="{{ route('register') }}">تسجيل</a>
      <a href="{{ route('login') }}">دخول</a>
    @endguest
    @auth
      <form method="POST" action="{{ route('logout') }}" style="margin: 0;">
        @csrf
        <button style="background:none;border:none;color:white;cursor:pointer;">تسجيل خروج</button>
      </form>
    @endauth
  </div>

  <div class="main-content">
    @yield('content')
  </div>
</body>
</html>