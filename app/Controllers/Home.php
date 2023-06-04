<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        return view('index');
    }
    public function signup()
    {
        return view('signup');
    }
    public function dashboard()
    { 
       
        return view('header')
        . view('sidemenu')
        . view('view_assests/dashboard')
        . view('footer');
    }
}
