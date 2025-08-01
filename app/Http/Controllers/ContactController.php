<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    // عرض صفحة التوصيات للمستخدمين
    public function show()
    {
        return view('contact');
    }

    // حفظ رسالة التوصية في قاعدة البيانات
    public function store(Request $request)
    {
        $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'required|email|max:255',
            'message' => 'required|string|max:1000',
        ]);

        Contact::create([
            'name'    => $request->name,
            'email'   => $request->email,
            'message' => $request->message,
        ]);

        return redirect()->route('contact')->with('success', 'تم إرسال توصيتك بنجاح!');
    }

    // عرض جميع الرسائل في لوحة التحكم (للمدير فقط)
    public function index()
    {
        $contacts = Contact::latest()->get();
        return view('dashboard.contacts', compact('contacts'));
    }

    // حذف رسالة من لوحة التحكم
    public function destroy($id)
    {
        Contact::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'تم حذف الرسالة بنجاح!');
    }
}