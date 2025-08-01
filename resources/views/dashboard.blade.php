<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>لوحة التحكم - سوّاح</title>
  <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@600&display=swap" rel="stylesheet">
  <style>
    body {
      margin: 0;
      font-family: 'Cairo', sans-serif;
      background-image: url('{{ asset('images/S.jpg') }}');
      background-size: cover;
      background-position: center;
      color: #fff;
      padding: 20px;
    }

    h1 {
      text-align: center;
      margin-bottom: 40px;
    }

    .admin-section {
      background-color: rgba(255, 255, 255, 0.9);
      color: #333;
      border-radius: 12px;
      padding: 20px;
      margin-bottom: 30px;
      box-shadow: 0 6px 10px rgba(0, 0, 0, 0.2);
    }

    .admin-section h2 {
      color: #10114b;
      margin-bottom: 15px;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      background: #fff;
    }

    th, td {
      padding: 10px;
      border: 1px solid #ddd;
      text-align: center;
    }

    .btn {
      padding: 8px 12px;
      border: none;
      border-radius: 6px;
      cursor: pointer;
    }

    .btn-edit {
      background-color: #ffc107;
      color: #000;
    }

    .btn-delete {
      background-color: #dc3545;
      color: #fff;
    }

    .form-group {
      margin-bottom: 20px; /* Increased margin for better spacing */
    }

    label {
      display: block;
      margin-bottom: 5px;
      color: #10114b;
      font-weight: bold; /* Make labels bold for better visibility */
    }

    input, textarea {
      width: calc(100% - 22px); /* Adjust width to fit padding and borders */
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 8px;
      font-family: 'Cairo', sans-serif;
      margin-top: 5px; /* Added margin above input fields */
      box-sizing: border-box; /* Ensure padding is included in width */
    }

    textarea {
      resize: vertical; /* Allow vertical resizing */
      min-height: 100px; /* Set a minimum height for textarea */
    }

    input[type="file"] {
      padding: 6px;
    }

    button.submit-btn {
      background-color: #10114b;
      color: #fff;
      padding: 10px 20px;
      border: none;
      border-radius: 8px;
      font-size: 16px;
      cursor: pointer;
      transition: background-color 0.3s;
    }

    button.submit-btn:hover {
      background-color: #00003a; /* Change background on hover */
    }

    .back-button {
      display: inline-block; /* Changed to inline-block */
      margin: 20px auto; /* Center using auto margins */
      text-align: center;
      background-color: #10114b;
      color: white;
      padding: 10px 15px; /* Adjusted padding */
      border-radius: 8px;
      text-decoration: none;
      font-size: 16px;
      font-weight: bold;
      transition: color 0.3s; /* Added color transition */
      width: 200px; /* Set a fixed width */
    }

    .back-button:hover {
      color: #ffeb3b; /* Change text color on hover */
    }

    @media (max-width: 768px) {
      .admin-section {
        padding: 15px;
      }

      .back-button {
        width: auto; /* Set width to auto for smaller screens */
      }
    }
  </style>
</head>
<body>

  <h1>لوحة تحكم الإدارة</h1>

  <!-- قسم الطلبات -->
  <div class="admin-section">
    <h2>قائمة الطلبات</h2>
    <table>
      <thead>
        <tr>
          <th>الاسم</th>
          <th>الرحلة</th>
          <th>عدد الأشخاص</th>
          <th>الإجراءات</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($requests as $req)
        <tr>
          <td>{{ $req->user->name }}</td>
          <td>{{ $req->trip->name }}</td>
          <td>{{ $req->people }}</td>
          <td>
            <form action="{{ route('requests.destroy', $req->id) }}" method="POST" style="display:inline">
              @csrf
              @method('DELETE')
              <button class="btn btn-delete">حذف</button>
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>

  <!-- إضافة مكان سياحي -->
  <div class="admin-section">
    <h2>إضافة مكان سياحي</h2>
    <form action="{{ route('trips.store') }}" method="POST" enctype="multipart/form-data">
      @csrf
      <div class="form-group">
        <label>اسم المكان</label>
        <input name="name" type="text" required>
      </div>
      <div class="form-group">
        <label>الوصف</label>
        <textarea name="description" required></textarea>
      </div>
      <div class="form-group">
        <label>السعر (ريال)</label>
        <input name="price" type="number" required>
      </div>
      <div class="form-group">
        <label>التاريخ</label>
        <input name="date" type="date" required>
      </div>
      <div class="form-group">
        <label>المدينة</label>
        <input name="city" type="text" required>
      </div>
      <div class="form-group">
        <label>عدد الأشخاص</label>
        <input name="people" type="number" required>
      </div>
      <div class="form-group">
        <label>صورة للمكان</label>
        <input name="image" type="file" accept="image/*" required>
      </div>
      <button class="submit-btn" type="submit">إضافة</button>
    </form>
  </div>

  <!-- إدارة التوصيات -->
  <div class="admin-section">
    <h2>مراجعة التوصيات</h2>
    <table>
      <thead>
        <tr>
          <th>الاسم</th>
          <th>الاقتراح</th>
          <th>الإجراءات</th>
        </tr>
      </thead>
      <tbody>
        @foreach($contacts as $contact)
        <tr>
          <td>{{ $contact->name }}</td>
          <td>{{ $contact->message }}</td>
          <td>
            <form action="{{ route('contact.destroy', $contact->id) }}" method="POST">
              @csrf
              @method('DELETE')
              <button class="btn btn-delete">حذف</button>
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>

  <!-- زر الرجوع -->
  <a href="{{ route('home') }}" class="back-button">الرجوع إلى الصفحة الرئيسية</a>

</body>
</html>