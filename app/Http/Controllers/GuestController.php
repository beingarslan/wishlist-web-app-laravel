<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GuestController extends Controller
{
    //
    public function index()
    {
        return view('guest.index');
    }

    public function faq()
    {
        return view('guest.faq');
    }

    public function profile ()
    {
        return view('guest.profile');
    }
    
}
