<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function showAbout() {
        return view('about');
    }

    public function showContact() {
        return view('contact');
    }
}
