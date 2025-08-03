<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\WebsiteSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail; // If you plan to send emails

class FrontContactController extends Controller
{
    // Show contact form
    public function index()
    {
        $settings = WebsiteSetting::first(); // Assuming there's one row
        return view('front.contact', compact('settings'));
    }

    // Handle form submission
    // public function submit(Request $request)
    // {
    //     // Validation for the contact form
    //     $request->validate([
    //         'full_name' => 'required|string|max:255',
    //         'email' => 'required|email|max:255',
    //         'message' => 'required|string',
    //     ]);

    //     // Prepare the data to send
    //     $data = $request->only('full_name', 'email', 'message');
    //     $settings = WebsiteSetting::first(); // Fetch website settings again to get contact email

    //     // You can save the message to the database or send it by email
    //     // Sending an email (example)
    //     Mail::to($settings->contact_email)
    //         ->send(new \App\Mail\ContactFormMail($data));

    //     // Optionally, save the contact message in the database (if you want to store it)
    //     // \App\Models\ContactMessage::create($data);

    //     // Flash a success message and redirect back
    //     return back()->with('success', __('Your message has been sent successfully.'));
    // }
}
