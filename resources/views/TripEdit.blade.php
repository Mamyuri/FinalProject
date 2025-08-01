<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>تعديل الرحلة</title>
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

    form {
      background-color: rgba(16, 17, 75, 0.9);
      padding: 30px;
      border-radius: 15px;
      width: 100%;
      max-width: 400px;
      box-shadow: 0 8px 15px rgba(65, 62, 62, 0.2);
    }

    h2 {
      color: #fff;
      margin: 0 0 20px; /* Removed top margin */
      text-align: center; /* Center alignment */
      font-size: 24px; /* Increased font size */
    }

    .form-group {
      margin-bottom: 15px;
    }

    .form-group label {
      display: block;
      margin-bottom: 5px;
      color: #faf7f7;
      margin-right: 10px; /* Added margin for labels */
    }

    .form-group input, .form-group select {
      width: calc(100% - 20px); /* Adjusted width to account for padding */
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 8px;
      background-color: #f9f9f9;
      color: #333;
      margin-right: 0; /* Reset margin for inputs */
      font-size: 15px; /* Consistent font size */
    }

    button {
      width: 100%;
      padding: 12px;
      background-color: #C3BCCC; /* Yellow color for save button */
      border: none;
      color: #10114b;
      font-size: 18px;
      border-radius: 8px;
      cursor: pointer;
      transition: background-color 0.3s ease;
      margin-top: 10px; /* Margin for separation */
    }

    button:hover {
      background-color: #7b7b9c; /* Hover color */
      color: #fff;
    }

    .cancel-btn {
      background-color: #e74c3c; /* Red color for cancel button */
      color: #fff;
    }

    .cancel-btn:hover {
      background-color: #c0392b;
    }

    @media (max-width: 768px) {
      form {
        padding: 20px;
      }
    }
  </style>
</head>
<body>

  <form action="{{ route('trips.update', $trip->id) }}" method="POST">
    @csrf
    @method('PUT')
    <h2>تعديل بيانات الرحلة</h2>

    <div class="form-group">
      <label for="name">اسم الرحلة:</label>
      <input type="text" id="name" name="name" value="{{ $trip->name }}" required>
    </div>

    <div class="form-group">
      <label for="city">المدينة:</label>
      <input type="text" id="city" name="city" value="{{ $trip->city }}" required>
    </div>

    <div class="form-group">
      <label for="date">التاريخ:</label>
      <input type="date" id="date" name="date" value="{{ $trip->date }}" required>
    </div>

    <div class="form-group">
      <label for="people">عدد الأشخاص:</label>
      <input type="number" id="people" name="people" value="{{ $trip->people }}" required>
    </div>

    <div class="form-group">
      <label for="price">السعر:</label>
      <input type="number" id="price" name="price" value="{{ $trip->price }}" required>
    </div>

    <button type="submit">حفظ التعديلات</button>
    <button type="button" class="cancel-btn" onclick="window.history.back();">إلغاء</button>
  </form>

</body>
</html>