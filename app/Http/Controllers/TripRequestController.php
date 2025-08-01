<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TripRequest;
use App\Models\Trip;
use Illuminate\Support\Facades\Auth;

class TripRequestController extends Controller
{
    // عرض جميع الطلبات في لوحة التحكم (للأدمن)
    public function index()
    {
        $requests = TripRequest::with(['user', 'trip'])->get();
        return view('dashboard', compact('requests'));
    }

    // تخزين طلب الرحلة من المستخدم
    public function store(Request $request)
    {
        $request->validate([
            'trip_id' => 'required|exists:trips,id',
            'name'    => 'required|string|max:255',
            'phone'   => 'required|string|max:20',
            'people'  => 'required|numeric|min:1',
            'note'    => 'nullable|string|max:1000'
        ]);

        TripRequest::create([
            'user_id' => Auth::id(),
            'trip_id' => $request->trip_id,
            'name'    => $request->name,
            'phone'   => $request->phone,
            'people'  => $request->people,
            'note'    => $request->note
        ]);

        // بعد الحجز يرجع المستخدم إلى صفحة الرحلات مع رسالة نجاح
        return redirect()->route('trips.index')->with('success', 'تم إرسال طلبك بنجاح!');
    }

    // حذف الطلب من لوحة التحكم (للأدمن)
    public function destroy($id)
    {
        $tripRequest = TripRequest::findOrFail($id);
        $tripRequest->delete();

        return redirect()->route('dashboard')->with('success', 'تم حذف الطلب بنجاح!');
    }
}