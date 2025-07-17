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
        $request->validate([
            'facebook' => 'nullable|url',
            'instagram' => 'nullable|url',
            'twitter' => 'nullable|url',
            'youtube' => 'nullable|url',
            'title' => 'nullable|string',
            'description' => 'nullable|string',
            'key_words' => 'nullable|string',
            'phone' => 'nullable|array|max:3',
            'phone.*' => 'nullable|string',
            'fax' => 'nullable', // change to array for consistency
            'fax.*' => 'nullable|string',
            'email' => 'nullable|email', // ✅ add missing email
            'logo' => 'nullable|image',
            'address' => 'nullable|string',
            'url' => 'nullable|url',
            'contact_email' => 'nullable|email',
            'carrers_email' => 'nullable|email',
            'location' => 'nullable',
        ]);

        $setting = WebsiteSetting::firstOrNew([]);

        $setting->facebook = $request->facebook;
        $setting->instagram = $request->instagram;
        $setting->twitter = $request->twitter;
        $setting->youtube = $request->youtube;
        $setting->title = $request->title;
        $setting->description = $request->description;
        $setting->key_words = $request->key_words;
        $setting->address = $request->address;
        $setting->url = $request->url;
        $setting->email = $request->email; // ✅ Save the email
        $setting->contact_email = $request->contact_email;
        $setting->carrers_email = $request->carrers_email;
        $setting->location = $request->location;

        // ✅ Save phone as JSON
        $setting->phone = json_encode($request->phone ?? []);

        // ✅ Save fax as JSON too
        $setting->fax = json_encode($request->fax ?? []);

        // ✅ Handle logo upload
        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $filename = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('logos', $filename, 'public');
            $setting->logo = 'storage/' . $path;
        }

        $setting->save();

        return redirect()->route('admin.setting.index')->with('status-success', 'Settings have been updated successfully!');
    }
}
