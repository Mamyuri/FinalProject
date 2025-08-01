@extends('layout')

@section('title', 'الصفحة الرئيسية')

@section('content')
<div style="text-align: right; color: #272226; padding: 40px;">
    <h1>مرحبًا بك في سوّاح 🌍</h1>
    <p>هنا تبدأ مغامرتك السياحية لاكتشاف أجمل الأماكن في العالم.</p>
    <p>اختر وجهتك، واستمتع بتجربة لا تُنسى!</p>
</div>

    <h2 style="margin-top: 40px; color:rgb(48, 48, 48); text-align: center;">أبرز الأماكن السياحية</h2>

    <div style="display: flex; gap: 20px; flex-wrap: wrap; justify-content: center; margin-top: 20px;">
        <!-- العلا -->
        <div style="width: 300px; background-color: rgba(255, 255, 255, 0.9); border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); overflow: hidden;">
            <img src="{{ asset('images/A.jpg') }}" alt="العلا" style="width: 100%; height: 180px; object-fit: cover;">
            <div style="padding: 15px;">
                <h3>العُلا</h3>
                <p style="font-size: 14px;">من أروع المناطق الأثرية في السعودية، تشتهر بصخرة الفيل ومواقع حضارات قديمة.</p>
            </div>
        </div>

        <!-- الرياض -->
        <div style="width: 300px; background-color: rgba(255, 255, 255, 0.9); border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); overflow: hidden;">
            <img src="{{ asset('images/y.jpg') }}" alt="الرياض" style="width: 100%; height: 180px; object-fit: cover;">
            <div style="padding: 15px;">
                <h3>الرياض</h3>
                <p style="font-size: 14px;">العاصمة النابضة بالحياة، مليئة بالمولات والمتاحف والمطاعم والمهرجانات طوال العام.</p>
            </div>
        </div>

        <!-- أبها -->
        <div style="width: 300px; background-color: rgba(255, 255, 255, 0.9); border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); overflow: hidden;">
            <img src="{{ asset('images/AB.jpg') }}" alt="أبها" style="width: 100%; height: 180px; object-fit: cover;">
            <div style="padding: 15px;">
                <h3>أبها</h3>
                <p style="font-size: 14px;">مدينة الجمال والطبيعة الخضراء في الجنوب، مناسبة للأجواء الباردة والمغامرات الجبلية.</p>
            </div>
        </div>
    </div>
@endsection