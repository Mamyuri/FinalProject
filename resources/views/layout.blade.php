<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'سوّاح')</title>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@700&display=swap" rel="stylesheet">
    <style>
        body {
            margin: 0;
            font-family: 'Cairo', sans-serif;
            background-image: url('{{ asset('images/S.jpg') }}');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            color: #333;
            overflow-x: hidden; /* Prevent horizontal scrolling */
        }

        .navbar {
            width: 108px;
            height: 100vh;
            background-color: #10114b;
            color: white;
            position: fixed;
            right: 0;
            top: 0;
            display: flex;
            flex-direction: column;
            align-items: flex-end;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
        }

        .navbar h2 {
            margin-bottom: 15px;
            font-size: 24px;
            text-align: right; /* Right alignment */
            width: 100%; /* Ensure it fills the width */
        }

        .navbar a {
            color: white;
            text-decoration: none;
            padding: 10px 0;
            margin: 5px 0;
            font-size: 14px;
            transition: 0.3s;
            text-align: right;
            display: block;
            width: 100%;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .navbar a:hover {
            color: #ffeb3b;
        }

        .main-content {
            margin-right: 120px; /* Space for the navbar */
            padding: 40px;
            background-color: rgba(255, 255, 255, 0.509);
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
        }

        .back-to-top {
            position: fixed;
            bottom: 20px;
            right: 20px;
            background-color: #10114b;
            color: white;
            border: none;
            border-radius: 50%;
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
            transition: background-color 0.3s;
        }

        .back-to-top:hover {
            background-color: #ffeb3b;
            color: #10114b;
        }

        @media (max-width: 768px) {
            .navbar {
                width: 100%; /* Full width */
                height: auto; /* Adjust height */
                position: static; /* Remove fixed positioning */
                flex-direction: row; /* Align items horizontally */
                justify-content: space-between; /* Space elements evenly */
                padding: 10px; /* Adjust padding */
            }

            .navbar h2 {
                flex-grow: 1;
                text-align: center; /* Center-aligned on smaller screens */
            }

            .main-content {
                margin-right: 0; /* Remove right margin */
                padding: 20px; /* Adjust padding */
            }
        }
    </style>
</head>
<body>
    <div class="navbar">
        <h2>سوّاح</h2>
        <a href="{{ route('home') }}">الصفحة الرئيسية</a>
        <a href="{{ route('trips.index') }}">الرحلات</a>

        @auth
            @if(Auth::user()->role === 'admin')
                <a href="{{ route('dashboard') }}">الإدارة</a>
            @else
                <a href="{{ route('contact') }}">التوصيات</a>
            @endif
        @endauth

        @guest
            <a href="{{ route('register') }}">إنشاء حساب</a>
            <a href="{{ route('login') }}">تسجيل الدخول</a>
        @else
            <a href="#" onclick="event.preventDefault();document.getElementById('logout-form').submit();">تسجيل الخروج</a>
            <form id="logout-form" method="POST" action="{{ route('logout') }}" style="display:none;">
                @csrf
            </form>
        @endguest
    </div>

    <div class="main-content">
        @yield('content')
    </div>

    <button class="back-to-top" onclick="window.scrollTo({top: 0, behavior: 'smooth'});">
        ↑
    </button>
</body>
</html>