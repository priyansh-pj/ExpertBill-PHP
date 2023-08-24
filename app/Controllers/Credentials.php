<?php

namespace App\Controllers;

use App\Models\Credentials_model;

class Credentials extends BaseController
{
    protected $credentials_model;
    protected $session;
    public function __construct()
    {
        $this->credentials_model = new Credentials_model();
        $this->session = \Config\Services::session();
    }
    public function login()
    {
        $session = $this->session->get();
        var_dump($this->session->getFlashdata('Login'));
        if (isset($session["password_check"])) {
            return redirect()->to(base_url('Organizations/'));
        }
        return view('Credentials/login');
    }


    public function register()
    {
        if (isset($session["password_check"])) {
            return redirect()->to(base_url('Organizations/'));
        }
        $_POST['password'] = password_hash($_POST['password'], PASSWORD_BCRYPT);
        $this->credentials_model->register_user($_POST);
        $this->session->set([
            "password_check" => true,
            "profile" => ($this->credentials_model->get_profile($_POST['email']))
        ]);
        // return redirect()->to(base_url('Organizations/','refresh'));
        return redirect()->to(base_url('Organizations/'));
    }
    public function credential_validation()
    {
        $encryption = \Config\Services::encryption();
        $hash = ($this->credentials_model->get_hash($_POST['email']));
        if (!empty($hash) && password_verify($_POST['password'], $hash)) {
            $this->session->set([
                "password_check" => true,
                "profile" => ($this->credentials_model->get_profile($_POST['email']))
            ]);
            return redirect()->to(base_url('Organizations/'));
        } else {
            $this->session->setFlashdata('Login', 'Unable to verify user credentails');
            return redirect()->to(base_url());
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to(base_url());
    }
}
