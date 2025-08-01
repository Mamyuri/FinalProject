<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
  <meta charset="UTF-8">
  <title>إنشاء حساب - سوّاح</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@700&display=swap" rel="stylesheet">
  <style>
    body {
      font-family: 'Cairo', sans-serif;
      background-image: url('{{ asset('images/S.jpg') }}');
      background-size: cover;
      background-position: center;
      height: 100vh;
      color: #fff;
      display: flex;
      justify-content: center;
      align-items: center;
      margin: 0;
    }

    .container {
      background-color: rgba(16, 17, 75, 0.9);
      padding: 40px;
      border-radius: 15px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
      width: 90%;
      max-width: 500px;
      text-align: center;
    }

    h2 {
      margin-bottom: 30px;
      font-size: 32px;
    }

    input {
      width: calc(100% - 22px); /* Adjusted to fit padding and borders */
      padding: 10px;
      margin: 10px 0;
      border: none;
      border-radius: 5px;
      font-family: 'Cairo', sans-serif;
      box-sizing: border-box; /* Ensure padding is included in width */
    }

    button {
      background-color: #ffc107; /* Yellow background */
      color: #10114b; /* Purple text */
      padding: 10px 20px;
      border: none;
      font-weight: bold;
      border-radius: 5px;
      cursor: pointer;
      margin-top: 10px; /* Space above button */
      width: 100%; /* Full width for consistency */
      transition: background-color 0.3s, color 0.3s; /* Transition for hover effects */
    }

    button:hover {
      background-color: #ffeb3b; /* Brighter yellow on hover */
    }

    .back-button {
      display: inline-block;
      margin-top: 20px; /* Space above back button */
      background-color: #10114b; /* Button background color */
      color: #fff; /* Button text color */
      padding: 10px 20px; /* Button padding */
      border-radius: 5px; /* Button border radius */
      text-decoration: none; /* Remove underline */
      font-weight: bold; /* Bold text */
      width: calc(100% - 22px); /* Match input width */
      transition: color 0.3s; /* Transition for color change */
      box-sizing: border-box; /* Ensure padding is included in width */
    }

    .back-button:hover {
      color: #ffeb3b; /* Change text color on hover */
    }

    .error-message {
      color: #ffaaaa;
      font-size: 14px;
      margin-top: 5px;
    }

    @media (max-width: 600px) {
      h2 {
        font-size: 28px;
      }

      button {
        font-size: 16px;
      }

      .back-button {
        font-size: 16px; /* Font size for back button */
      }
    }
  </style>
</head>
<body>
  <div class="container">
    <h2>إنشاء حساب جديد</h2>
    <form method="POST" action="{{ route('register') }}">
      @csrf

      <input type="text" name="name" placeholder="الاسم الكامل" value="{{ old('name') }}" required>
      @error('name')
        <div class="error-message">{{ $message }}</div>
      @enderror

      <input type="email" name="email" placeholder="البريد الإلكتروني" value="{{ old('email') }}" required>
      @error('email')
        <div class="error-message">{{ $message }}</div>
      @enderror

      <input type="password" name="password" placeholder="كلمة المرور" required>
      @error('password')
        <div class="error-message">{{ $message }}</div>
      @enderror

      <input type="password" name="password_confirmation" placeholder="تأكيد كلمة المرور" required>

      <button type="submit">تسجيل</button>
    </form>

    <!-- Back button -->
    <a href="{{ route('home') }}" class="back-button">إلغاء</a>
  </div>
</body>
</html>