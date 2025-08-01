<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>تسجيل الدخول - سوّاح</title>
  <link href="{{ asset('images/S.jpg') }}" rel="stylesheet">
  <style>
    body, html {
      margin: 0;
      padding: 0;
      height: 100%;
      font-family: 'Cairo', sans-serif;
      direction: rtl;
    }

    .hero {
      background-image: url('{{ asset('images/S.jpg') }}');
      background-size: cover;
      background-position: center;
      height: 100vh;
      position: relative;
      color: white;
      display: flex;
      align-items: center;
      justify-content: center;
      text-align: center;
      flex-direction: column;
    }

    .overlay {
      position: absolute;
      top: 0; left: 0;
      width: 100%; height: 100%;
      background-color: rgba(0, 0, 0, 0.5);
      z-index: 1;
    }

    .content {
      position: relative;
      z-index: 2;
    }

    .title {
      font-size: 70px;
      font-family: 'Amiri', serif;
      margin-bottom: 10px;
    }

    .subtitle {
      font-size: 24px;
      margin-bottom: 20px;
    }

    .login-form {
      display: flex;
      flex-direction: column;
      align-items: center;
      background-color: rgba(255, 255, 255, 0.9);
      padding: 20px;
      border-radius: 10px;
      position: relative;
      z-index: 3;
      margin-top: 20px;
      width: 280px;
    }

    .login-form input {
      margin: 10px;
      padding: 10px;
      width: 90%;
      border: 1px solid #ccc;
      border-radius: 5px;
    }

    .login-form button {
      background-color: #10114b;
      color: white;
      border: none;
      padding: 10px 20px;
      cursor: pointer;
      margin-top: 10px;
      width: 100%;
      border-radius: 5px;
      transition: background-color 0.3s;
    }

    .login-form button:hover {
      background-color: #00003a;
    }

    .register-link {
      margin-top: 15px;
      font-size: 14px;
      color: #10114b;
      text-decoration: none;
    }

    .error-message {
      color: red;
      font-size: 13px;
      margin-top: 5px;
    }
  </style>
</head>
<body>
  <div class="hero" id="hero">
    <div class="overlay"></div>
    <div class="content">
      <div class="title">سوّاح</div>
      <div class="subtitle">تسجيل الدخول للوصول إلى جميع المزايا</div>

      <form method="POST" action="{{ route('login') }}" class="login-form">
        @csrf

        <input type="email" name="email" placeholder="البريد الإلكتروني" value="{{ old('email') }}" required>
        @error('email')
          <div class="error-message">{{ $message }}</div>
        @enderror

        <input type="password" name="password" placeholder="كلمة المرور" required>
        @error('password')
          <div class="error-message">{{ $message }}</div>
        @enderror

        <button type="submit">دخول</button>

        <a href="{{ route('register') }}" class="register-link">ليس لديك حساب؟ تسجيل جديد</a>
      </form>
    </div>
  </div>
</body>
</html>