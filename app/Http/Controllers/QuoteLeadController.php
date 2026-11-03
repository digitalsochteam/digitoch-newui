<?php

namespace App\Http\Controllers;

use App\Models\QuoteLead;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;

class QuoteLeadController extends Controller
{
    /**
     * Display all leads
     */
    public function index()
    {
        $leads = QuoteLead::orderBy('created_at', 'desc')->get();
        return view('backend.quoteleads.list', compact('leads'));
    }


    /**
     * Store a new quote lead or update count if mobile already exists
     */
    public function store(Request $request)
    {
        Log::info('Storing quote lead', ['request' => $request->all()]);

        // Validate input
        $request->validate([
            'fullname' => 'required|string|max:255',
            'city' => 'nullable|string|max:150',
            'mobile' => 'required|string|max:20',
            'email' => 'nullable|email|max:255',
            'subject' => 'nullable|string|max:255',
            'message' => 'nullable|string',
        ]);

        // Normalize IP
        $ipAddress = $request->ip() === '::1' ? '127.0.0.1' : $request->ip();

        // Capture headers
        $headers = json_encode([
            'user-agent' => $request->header('user-agent'),
            'referer' => $request->header('referer'),
            'origin' => $request->header('origin'),
        ], JSON_UNESCAPED_SLASHES);

        // Unique lead ID
        $leadId = 'LEAD-' . now()->format('YmdHis') . '-' . strtoupper(Str::random(4));

        // Get today's date
        $today = now()->toDateString();

        // Check limits
        $mobileCount = QuoteLead::where('mobile', $request->mobile)
            ->whereDate('created_at', $today)
            ->count();

        $ipCount = QuoteLead::where('ipaddress', $ipAddress)
            ->whereDate('created_at', $today)
            ->count();

        // 🚫 If mobile exceeded 2 per day
        if ($mobileCount >= 2) {
            Log::warning("Daily limit reached for mobile", ['mobile' => $request->mobile]);
            $status = "error";
            $message = "We've received your request. Our team will reach out shortly.";
            return view('frontend.dashboard.thanku', compact('status', 'message'));
        }

        // 🚫 If IP exceeded 2 per day
        if ($ipCount >= 2) {
            Log::warning("Daily limit reached for IP", ['ip' => $ipAddress]);
            $status = "error";
            $message = "We've received your request. Our team will reach out shortly.";
            return view('frontend.dashboard.thanku', compact('status', 'message'));
        }

        // ✅ If allowed, create or update record
        // $existingLead = QuoteLead::where('mobile', $request->mobile)->latest()->first();

        // if ($existingLead) {
        //     $existingLead->update([
        //         'fullname' => $request->fullname,
        //         'city' => $request->city ?? $existingLead->city,
        //         'email' => $request->email ?? $existingLead->email,
        //         'subject' => $request->subject ?? $existingLead->subject,
        //         'message' => $request->message ?? $existingLead->message,
        //         'leadid' => $existingLead->leadid ?? $leadId,
        //         'status' => 'Pending',
        //         'source' => 'Website',
        //         'ipaddress' => $ipAddress,
        //         'header' => $headers,
        //     ]);

        //     $status = "success";
        //     $message = "Your quote request has been updated. Please wait for our team to contact you.";
        //     return view('frontend.dashboard.thanku', compact('status', 'message'));
        // }

        // Create new lead
        QuoteLead::create([
            'fullname' => $request->fullname,
            'city' => $request->city,
            'mobile' => $request->mobile,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
            'leadid' => $leadId,
            'status' => 'Pending',
            'source' => 'Website',
            'ipaddress' => $ipAddress,
            'header' => $headers,
        ]);

        $status = "success";
        $message = "Your response has been saved successfully!";
        return view('frontend.dashboard.thanku', compact('status', 'message'));
    }


}