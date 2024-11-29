<?php
namespace App\Http\Controllers;

use App\Models\Inquiry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\BookingNotification;

class InquiryController extends Controller
{
    // For Pending Inquiries
    public function pending()
    {
        $pendingInquiries = Inquiry::with(['roomType', 'package'])->where('status', 'Pending')->get();
        return view('admin.inquiry.pending', compact('pendingInquiries'));
    }

    // For Declined Inquiries
    public function declined()
    {
        $declinedInquiries = Inquiry::with(['roomType', 'package'])->where('status', 'Declined')->get();
        return view('admin.inquiry.declined', compact('declinedInquiries'));
    }

    // For Accepted Inquiries
    public function accepted()
    {
        $acceptedInquiries = Inquiry::with(['roomType', 'package'])->where('status', 'Accepted')->get();
        return view('admin.inquiry.accepted', compact('acceptedInquiries'));
    }

    public function show(string $slug)
    {
        $inquiry = Inquiry::with(['roomType', 'package'])->where('slug', $slug)->firstOrFail();
        return view('admin.inquiry.show', compact('inquiry'));
    }

    public function changeStatus(Request $request, Inquiry $inquiry, $status)
    {
        // Validate status
        $validStatuses = ['Accepted', 'Declined'];

        if (!in_array($status, $validStatuses)) {
            return redirect()->route('inquiry.index')->with('error', 'Invalid status');
        }

        // Update the inquiry status
        $inquiry->status = $status;
        $inquiry->save();
        $firstName = [];
        if (is_string($inquiry->name)) {
            $inquiry->name = json_decode($inquiry->name, true);
        }        
        foreach ($inquiry->name as $firstOne) {
            $nameParts = explode(' ', $firstOne);
            $firstName[] = $nameParts[0]; 
        }
        // Redirect to the appropriate view based on the new status
        $name = $firstName[0];
        $category_name = $inquiry->package->category->name;
        $start_date = $inquiry->start_date ? $inquiry->start_date : $inquiry->package->start_date;
        $end_date = $inquiry->end_date ? $inquiry->end_date : $inquiry->package->end_date;
        $package_name = $inquiry->package->title;
        $people = $inquiry->people;
        $location_name = $inquiry->package->location->name;
        $room_name = $inquiry->roomType->name; 
        Mail::to($inquiry->email)->send(new BookingNotification($name,$status,$category_name,$package_name,$start_date,$end_date,$location_name,$people,$room_name));
        if ($status == 'Accepted') {
            return redirect()->route('inquiry.accepted')->with('success', 'Inquiry accepted successfully.');
        } elseif ($status == 'Declined') {
            return redirect()->route('inquiry.declined')->with('success', 'Inquiry declined successfully.');
        }
    }
}
