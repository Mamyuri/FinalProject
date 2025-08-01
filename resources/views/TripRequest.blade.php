<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>طلب حجز رحلة - سوّاح</title>
  <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@600&display=swap" rel="stylesheet">
  <style>
    body {
      margin: 0;
      font-family: 'Cairo', sans-serif;
      background-image: url('{{ asset('images/S.jpg') }}');
      background-size: cover;
      background-position: center;
      color: #fff;
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
      padding: 20px;
    }

    .booking-form {
      background-color: #10114b;
      padding: 30px;
      border-radius: 15px;
      width: 100%;
      max-width: 500px;
      box-shadow: 0 8px 15px rgba(65, 62, 62, 0.2);
      color: #fff;
    }

    .booking-form h2 {
      color: #fff;
      margin-bottom: 20px;
      text-align: center;
      font-size: 24px; /* Increased font size */
    }

    .form-group {
      margin-bottom: 15px;
    }

    .form-group label {
      display: block;
      margin-bottom: 5px;
      color: #fff;
      margin-right: 10px; /* Added margin for labels */
    }

    .form-group input, .form-group textarea {
      width: calc(100% - 20px); /* Adjusted width to account for padding */
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 8px;
      font-family: 'Cairo', sans-serif;
      font-size: 15px;
      background-color: #f9f9f9;
      color: #333;
      margin-right: 0; /* Reset margin for inputs */
    }

    .form-group textarea {
      resize: vertical;
      height: 80px;
      margin-right: 0; /* Reset margin for textarea */
    }

    .submit-btn {
      width: 100%;
      padding: 12px;
      background-color: #C3BCCC; /* Changed to the specified yellow */
      border: none;
      color: #10114b;
      font-size: 18px;
      border-radius: 8px;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }

    .submit-btn:hover {
      background-color: #7b7b9c;
      color: #fff;
    }

    .cancel-btn {
      width: 100%;
      padding: 12px;
      background-color: #e74c3c; /* Red color for cancel button */
      border: none;
      color: #fff;
      font-size: 18px;
      border-radius: 8px;
      cursor: pointer;
      margin-top: 10px; /* Margin for separation */
      transition: background-color 0.3s ease;
    }

    .cancel-btn:hover {
      background-color: #c0392b;
    }

    .trip-info {
      margin-bottom: 20px;
      background-color: rgba(242, 230, 239, 0.8);
      padding: 15px;
      border-radius: 8px;
      color: #444;
    }

    @media (max-width: 768px) {
      .booking-form {
        padding: 20px;
      }

      .submit-btn, .cancel-btn {
        font-size: 16px;
      }
    }
  </style>
</head>
<body>

  <div class="booking-form">
    <h2>طلب حجز رحلة</h2>

    <div class="trip-info">
      <strong>الرحلة المختارة:</strong> {{ $trip->name }} <br>
      <strong>السعر:</strong> {{ $trip->price }} ريال <br>
      <strong>التاريخ:</strong> {{ \Carbon\Carbon::parse($trip->date)->format('d M Y') }}
    </div>

    <form method="POST" action="{{ route('trip.submit') }}">
      @csrf
      <input type="hidden" name="trip_id" value="{{ $trip->id }}">

      <div class="form-group">
        <label for="name">الاسم الكامل</label>
        <input type="text" id="name" name="name" placeholder="اكتب اسمك الكامل" required>
      </div>

      <div class="form-group">
        <label for="phone">رقم الجوال</label>
        <input type="tel" id="phone" name="phone" placeholder="05XXXXXXXX" required>
      </div>

      <div class="form-group">
        <label for="people">عدد الأشخاص</label>
        <input type="number" id="people" name="people" min="1" value="1" required>
      </div>

      <div class="form-group">
        <label for="message">رسالة إضافية</label>
        <textarea id="message" name="note" placeholder="هل لديك متطلبات خاصة؟"></textarea>
      </div>

      <button type="submit" class="submit-btn">إرسال الطلب</button>
      <button type="button" class="cancel-btn" onclick="window.history.back();">إلغاء</button>
    </form>
  </div>

</body>
</html>