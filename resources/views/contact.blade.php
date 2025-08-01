<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
  <meta charset="UTF-8">
  <title>التوصيات والمقترحات</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@700&display=swap" rel="stylesheet">
  <style>
    body {
      font-family: 'Cairo', sans-serif;
      background-image: url('{{ asset('images/S.jpg') }}');
      background-size: cover;
      background-position: center;
      color: #fff;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
      padding: 0;
    }

    .container {
      background-color: rgba(16, 17, 75, 0.9);
      padding: 30px;
      border-radius: 15px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
      width: 90%;
      max-width: 500px;
      text-align: center;
    }

    h2 {
      margin-bottom: 20px;
    }

    input, textarea {
      width: calc(100% - 22px); /* Adjusted to fit padding and borders */
      padding: 10px;
      margin: 10px 0;
      border: none;
      border-radius: 5px;
      font-family: 'Cairo', sans-serif;
      box-sizing: border-box; /* Ensure padding is included in width */
    }

    input::placeholder, textarea::placeholder {
      color: #aaa;
    }

    button {
      background-color: #fff;
      color: #10114b;
      padding: 10px 20px;
      border: none;
      font-weight: bold;
      border-radius: 5px;
      cursor: pointer;
      margin-top: 10px;
      transition: background-color 0.3s;
    }

    button:hover {
      background-color: #f0f0f0;
    }

    .success {
      color: lightgreen;
      margin-bottom: 15px;
    }

    .back-button {
      display: inline-block;
      margin-top: 20px;
      background-color: #10114b; /* Button background color */
      color: #fff; /* Button text color */
      padding: 10px 20px; /* Button padding */
      border-radius: 5px; /* Button border radius */
      text-decoration: none; /* Remove underline */
      font-weight: bold; /* Bold text */
      transition: color 0.3s; /* Transition for color change */
    }

    .back-button:hover {
      color: #ffeb3b; /* Change text color on hover */
    }

    @media (max-width: 768px) {
      .container {
        padding: 20px;
      }

      button {
        width: 100%;
      }
    }
  </style>
</head>
<body>
  <div class="container">
    <h2>أرسل توصيتك أو مقترحك</h2>

    @if(session('success'))
      <div class="success">{{ session('success') }}</div>
    @endif

    <form method="POST" action="{{ route('contact.submit') }}">
      @csrf
      <input type="text" name="name" placeholder="الاسم" required>
      <input type="email" name="email" placeholder="البريد الإلكتروني" required>
      <textarea name="message" placeholder="اكتب مقترحك هنا..." rows="4" required></textarea>
      <button type="submit">إرسال</button>
    </form>

    <!-- Back button -->
    <a href="{{ route('home') }}" class="back-button">إلغاء</a>
  </div>
</body>
</html>