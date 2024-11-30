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
        $pendingBookings = Inquiry::where('status', 'pending')->count();
        $approvedBookings = Inquiry::where('status', 'approved')->count();
        $declinedBookings = Inquiry::where('status', 'declined')->count();

        return view('admin.dashboard', compact('totalVisits', 'totalUsers', 'totalPackages', 'pendingBookings', 'approvedBookings', 'declinedBookings'));
    }
}
