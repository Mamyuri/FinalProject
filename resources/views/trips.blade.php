<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>سوّاح - الرحلات</title>
  <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@700&display=swap" rel="stylesheet">
  <style>
    body {
      margin: 0;
      font-family: 'Cairo', sans-serif;
      background-image: url({{ asset('images/S.jpg') }});
      background-size: cover;
      background-position: center;
      color: #ffffff;
    }

    header {
      text-align: center;
      padding: 30px;
    }

    header h1 {
      margin: 0;
      font-size: 32px;
    }

    .trips-container {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      gap: 20px;
      padding: 20px;
    }

    .trip-card {
      background-color: rgba(255, 255, 255, 0.9);
      border-radius: 12px;
      width: 260px;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
      overflow: hidden;
      text-align: center;
      transition: 0.3s;
    }

    .trip-card:hover {
      transform: translateY(-5px);
    }

    .trip-card img {
      width: 100%;
      height: 150px;
      object-fit: cover;
    }

    .trip-card h3 {
      color: #10114b;
      margin: 10px 0;
      font-size: 20px;
    }

    .trip-card p {
      color: #333;
      font-size: 14px;
      margin: 5px 0;
    }

    .book-btn, .back-button {
      background-color: #10114b;
      color: #fff;
      text-decoration: none;
      display: inline-block; /* Changed to inline-block */
      padding: 10px 15px; /* Adjusted padding for a smaller button */
      border-radius: 6px;
      margin: 10px;
      transition: background-color 0.3s, color 0.3s; /* Added color transition */
    }

    .book-btn:hover, .back-button:hover {
      background-color: #050632;
      color: #ffeb3b; /* Change text color on hover */
    }

    .login-msg {
      color: red;
      font-size: 14px;
      text-align: center;
      margin-bottom: 10px;
    }

    .back-link {
      text-align: center;
      margin: 30px;
    }

    @media (max-width: 768px) {
      .trip-card {
        width: 100%;
        max-width: 300px; /* Ensure cards are responsive on small screens */
      }
    }
  </style>
</head>
<body>

  <header>
    <h1>سوّاح - رحلات داخل السعودية</h1>
  </header>

  <section class="trips-container">
    @foreach($trips as $trip)
      <div class="trip-card">
        <img src="{{ asset('images/' . $trip->image) }}" alt="{{ $trip->name }}">
        <h3>{{ $trip->name }}</h3>
        <p>السعر: {{ $trip->price }} ريال</p>
        <p>التاريخ: {{ $trip->date }}</p>
        <p>المدينة: {{ $trip->city }}</p>
        <p>عدد الأشخاص: {{ $trip->people }}</p>

        @auth
            @if(Auth::user()->role === 'admin')
                <a href="{{ route('trips.edit', $trip->id) }}" class="book-btn">تعديل</a>
            @else
                <a href="{{ route('trip.request', $trip->id) }}" class="book-btn">احجز الآن</a>
            @endif
        @else
            <a href="{{ route('login') }}" class="login-msg">سجل دخولك لحجز الرحلة</a>
        @endauth
      </div>
    @endforeach
  </section>

  <div class="back-link">
    <a href="{{ route('home') }}" class="back-button"> الرجوع إلى الصفحة الرئيسية</a>
  </div>

</body>
</html>