<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class HomepageController extends Controller
{
    function index() {
        return view('homepage.index');
    }

    function about() {
        return view('homepage.about');
    }

    function doctors() {
        return view('homepage.doctors');
    }

    function laboratory() {
        return view('homepage.laboratory');
    }

    function contact() {
        return view('homepage.contact');
    }

}
