<?php

namespace App\Http\Controllers;

class PageController extends Controller
{
    public function aPropos()
    {
        return view('pages.a-propos');
    }

    public function contact()
    {
        return view('pages.contact');
    }

    public function faq()
    {
        return view('pages.faq');
    }
}