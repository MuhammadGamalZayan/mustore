<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MainPages extends Controller
{
    public function about() {
        return view('about');
    }

    public function contact() {
        return view('contact');
    }

    public function faq() {
        return view('faq');
    }

    public function privacy() {
        return view('privacy');
    }

    public function terms() {
        return view('terms');
    }

}
