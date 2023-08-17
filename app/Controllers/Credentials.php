<?php

namespace App\Controllers;

use App\Models\Credentials_model;

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

    public function login_check()
    {
        $encryption = \Config\Services::encryption();
        $hash = ($this->credentials_model->get_hash($_POST['email']));
        if (!sizeof($hash)) {
            echo ("<script>alert('Credentials Doesn't Exist. Please Reverify Details');</script>");
            return redirect()->to(base_url());
        }
        var_dump($hash);
        die();
        if (!empty($hash) && password_verify($_POST['password'], $hash)) {
            $this->session->set(["password_check" => true, "profile" => ($this->credentials_model->get_profile($_POST['email']))]);
            return redirect()->to(base_url('databliss/organization_verify/' . $_POST['username']));
        } else {
            echo ("<script>alert('Password Entered is Incorrect');</script>");
            return redirect()->to(base_url());
        }
    }
    public function register()
    {
        $_POST['password'] = password_hash($_POST['password'], PASSWORD_BCRYPT);
        // var_dump($_POST);
        // die();
        $this->credentials_model->register_user($_POST);
        $this->session->set(["password_check" => true, "profile" => ($this->credentials_model->get_profile($_POST['email']))]);
        // return redirect()->to(base_url('databliss/organization_verify/' . $_POST['username']));
    }
}