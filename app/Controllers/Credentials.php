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
        $hash = ($this->credentials_model->get_info_username($_POST['username']))->password;
        if (!empty($hash) && password_verify($_POST['password'], $hash)) {
            $this->session->set(["password_check" => true, "username" => $_POST['username'], "uid" => ($this->credentials_model->get_uid($_POST['username'])[0]->uid), "profile" => ($this->credentials_model->get_profile($_POST['username']))[0]]);
            return redirect()->to(base_url('databliss/organization_verify/' . $_POST['username']));
        } else {
            echo 'Password is incorrect';
        }

    }
    public function register()
    {
        $_POST['name'] = explode(' ', $_POST['name']);
        $_POST['password'] = password_hash($_POST['password'], PASSWORD_BCRYPT);
        // var_dump($_POST);
        // die();
        $this->credentials_model->register_user($_POST);
        $this->session->set(["password_check" => true, "username" => $_POST['username'], "uid" => ($this->credentials_model->get_uid($_POST['username'])[0]->uid), "role" => "", "profile" => ($this->credentials_model->get_profile($_POST['username']))[0]]);
        return redirect()->to(base_url('databliss/organization_verify/' . $_POST['username']));
    }
}