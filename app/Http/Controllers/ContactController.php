<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Cache;


class ContactController extends Controller
{

    public function send(Request $request)
    {
        $ip = $request->ip();
        $cacheKey = 'contact_requests_' . $ip;
        $maxRequests = 2; // only allow 2 requests
        $decayTime = now()->addDay();

        // 🔒 Check how many requests this IP has made
        $requestCount = Cache::get($cacheKey, 0);

        if ($requestCount >= $maxRequests) {
            // Too many requests

            return view('frontend.dashboard.thanku', [
                'status' => 'success',
                'message' => 'You requst is already submitted. we are looking into it.'
            ]);
        }

        // 🚀 Increment count and set expiration
        Cache::put($cacheKey, $requestCount + 1, $decayTime);

        // ✅ Validate input
        $request->validate([
            'first_name' => 'required|string|max:100',
            'last_name' => 'required|string|max:100',
            'email' => 'required|email',
            'phone' => 'required|string|max:20',
            'subject' => 'required|string|max:150',
            'message' => 'required|string',
        ]);

        // 📦 Prepare mail data
        $mailData = [
            'name' => $request->first_name . ' ' . $request->last_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'subject' => $request->subject,
            'messageBody' => $request->message,
        ];

        // 📨 1️⃣ Send email to Admin
        Mail::send('emails.contact', $mailData, function ($message) use ($mailData) {
            $message->to('support@digitalsochmedia.com')
                ->subject('New Enquiry: ' . $mailData['subject']);
        });

        // 📨 2️⃣ Send Thank You email to User
        Mail::send('emails.thankyou', $mailData, function ($message) use ($mailData) {
            $message->to($mailData['email'])
                ->subject('Thank You for Contacting Digital Soch');
        });

        // ✅ Success Response
        return view('frontend.dashboard.thanku', [
            'status' => 'success',
            'message' => 'Thank you for contacting us. We will get back to you shortly.'
        ]);
    }


}