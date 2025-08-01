<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TripRequest;
use App\Models\Contact;
use App\Models\Trip;

class DashboardController extends Controller
{
    public function index()
    {
        $requests = TripRequest::with(['user', 'trip'])->get();
        $contacts = Contact::latest()->get();
        $trips = Trip::latest()->get();

        return view('dashboard', compact('requests', 'contacts', 'trips'));
    }
}