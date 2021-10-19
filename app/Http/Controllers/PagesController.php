<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index() {
        return view('pages.index', ['title' => 'Scorng']);
    }

    public function howitworks()
    {
        return view('pages.howtoworks', ['title' => 'How It Works']);
    }

    public function signupmycompany()
    {
        return view('pages.signupmycompany', ['title' => 'Signing Up My Company']);
    }

    public function invitedtojoin()
    {
        return view('pages.invitedtojoin', ['title' => 'Invited To Join']);
    }

    public function features()
    {
        return view('pages.features', ['title' => 'Features']);
    }

    public function faq()
    {
        return view('pages.faq', ['title' => 'FAQ']);
    }

    public function about()
    {
        return view('pages.about', ['title' => 'About']);
    }

    public function pricing()
    {
        return view('pages.pricing', ['title' => 'Pricing']);
    }

    public function legal()
    {
        return view('pages.legal', ['title' => 'Legal']);
    }

    public function privacy()
    {
        return view('pages.privacy', ['title' => 'Privacy']);
    }
}
