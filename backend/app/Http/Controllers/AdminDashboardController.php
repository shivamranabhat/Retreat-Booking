<?php

namespace App\Http\Controllers;

use App\Models\Inquiry;
use App\Models\Package;
use App\Models\User;
use App\Models\Visit;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $totalVisits = Visit::distinct()->count('ip_address');
        $totalUsers = User::count();
        $totalPackages = Package::where('status', 1)->count();
        $pendingBookings = Inquiry::where('status', 'Pending')->count();
        $approvedBookings = Inquiry::where('status', 'Approved')->count();
        $declinedBookings = Inquiry::where('status', 'Declined')->count();
        return view('admin.dashboard', compact('totalVisits', 'totalUsers', 'totalPackages', 'pendingBookings', 'approvedBookings', 'declinedBookings'));
    }
}
