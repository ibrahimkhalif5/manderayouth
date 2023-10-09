<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function home()
    {
        return view('frontend.home');
    }
    public function aboutus()
    {
        return view('frontend.about');
    }
    public function gallery()
    {
        return view('frontend.gallery');
    }
    public function contact()
    {
        return view('frontend.contact');
    }


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
   
}