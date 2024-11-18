<?php
namespace App\Http\Controllers;

use App\Models\Inquiry;
use Illuminate\Http\Request;

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
}
