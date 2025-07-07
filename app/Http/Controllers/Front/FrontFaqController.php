<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Faq;

class FrontFaqController extends Controller
{
    public function index()
    {
        $faqs = Faq::where('is_active', true)->get();
        return view('front.faq', compact('faqs'));
    }
}
