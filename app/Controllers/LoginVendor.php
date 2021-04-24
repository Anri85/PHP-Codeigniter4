<?php

namespace App\Controllers;

class LoginVendor extends BaseController
{

    public function __construct()
    {
    }

    public function index()
    {
        return view('e-commerce/login-vendor');
    }
}
