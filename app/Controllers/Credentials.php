<?php

namespace App\Controllers;

class Credentials extends BaseController
{
    public function __construct()
    {
        $this->credentials_model = new Credentials_model();
        $this->session = \Config\Services::session();
    }
    public function Login()
    {
        return view('Credentials/login');
    }
}