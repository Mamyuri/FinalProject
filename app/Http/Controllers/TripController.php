<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Trip;
use Illuminate\Support\Facades\Auth;

class TripController extends Controller
{
    // عرض نموذج طلب الحجز (للعضو فقط)
    public function request($id)
    {
        $trip = Trip::findOrFail($id);
        return view('TripRequest', compact('trip'));
    }

    // عرض نموذج تعديل الرحلة (للأدمن فقط)
    public function edit($id)
    {
        $trip = Trip::findOrFail($id);
        return view('TripEdit', compact('trip'));
    }

    // تحديث بيانات الرحلة (للأدمن فقط)
    public function update(Request $request, $id)
    {
        $trip = Trip::findOrFail($id);
        $trip->update([
            'name' => $request->name,
            'city' => $request->city,
            'date' => $request->date,
            'people' => $request->people,
            'price' => $request->price,
        ]);
        return redirect()->route('trips.index')->with('success', 'تم تعديل الرحلة بنجاح');
    }

    // عرض نموذج إضافة مكان سياحي (للأدمن فقط)
    public function create()
    {
        return view('add-trip');
    }

    // تخزين بيانات المكان السياحي الجديد
    public function store(Request $request)
    {
        $request->validate([
            'name'   => 'required|string|max:255',
            'city'   => 'required|string|max:255',
            'date'   => 'required|date',
            'people' => 'required|integer|min:1',
            'price'  => 'required|numeric|min:0',
            'image'  => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // تخزين الصورة في مجلد public/images إذا وُجدت
        $imageName = null;
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);
        }

        Trip::create([
            'name'   => $request->name,
            'city'   => $request->city,
            'date'   => $request->date,
            'people' => $request->people,
            'price'  => $request->price,
            'image'  => $imageName ?? 'default.jpg',
        ]);

        return redirect()->route('trips.index')->with('success', 'تمت إضافة المكان السياحي بنجاح!');
    }
}