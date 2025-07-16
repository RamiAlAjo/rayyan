<?php

namespace App\Http\Controllers\Admin;

use App\Models\WebsiteSetting;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminWebsiteSettingController extends Controller
{
    public function index()
    {
        $settings = WebsiteSetting::first();

        $phones = [];
        $faxes = [];

        if ($settings) {
            // Decode phone if exists
            if ($settings->phone) {
                $decodedPhones = json_decode($settings->phone, true);
                $phones = is_array($decodedPhones) ? $decodedPhones : [];
            }

            // Decode fax if exists
            if ($settings->fax) {
                $decodedFaxes = json_decode($settings->fax, true);
                $faxes = is_array($decodedFaxes) ? $decodedFaxes : [];
            }
        }

        return view('admin.setting.index')->with(compact('settings', 'phones', 'faxes'));
    }




    public function store(Request $request)
{
    // Validate the phone field to ensure it's an array and contains no more than 3 items
    $request->validate([
        'facebook' => 'nullable|url',
        'instagram' => 'nullable|url',
        'twitter' => 'nullable|url',
        'youtube' => 'nullable|url',
        'title' => 'nullable|string',
        'description' => 'nullable|string',
        'key_words' => 'nullable|string',
        'phone' => 'nullable|array|max:3',  // Max 3 phone numbers
        'phone.*' => 'nullable|string', // Each phone must be a string
        'fax' => 'nullable|string',
        'logo' => 'nullable|image',
        'address' => 'nullable|string',
        'url' => 'nullable|url',
        'contact_email' => 'nullable|email',
        'carrers_email' => 'nullable|email',
        'location' => 'nullable', // Validate Google Maps link as a URL
    ]);

    // Fetch the existing settings or create a new one
    $setting = WebsiteSetting::firstOrNew([]);

    // Save the phone numbers as a JSON encoded string or comma-separated string
    // Ensure phone numbers are stored as an array
    if ($request->has('phone')) {
        $setting->phone = json_encode($request->phone); // Store phone numbers as a JSON array
    } else {
        $setting->phone = json_encode([]); // Store as an empty array if no phones are provided
    }

    // Save other fields as usual
    $setting->facebook = $request->facebook;
    $setting->instagram = $request->instagram;
    $setting->twitter = $request->twitter;
    $setting->youtube = $request->youtube;
    $setting->title = $request->title;
    $setting->description = $request->description;
    $setting->key_words = $request->key_words;
    $setting->fax = $request->fax;
    $setting->address = $request->address;
    $setting->url = $request->url;
    $setting->contact_email = $request->contact_email;
    $setting->carrers_email = $request->carrers_email;
    $setting->location = $request->location;

    $setting->save();

    return redirect()->route('admin.setting.index')->with('status-success', 'Settings have been updated successfully!');
}


}
