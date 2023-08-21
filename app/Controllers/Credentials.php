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
    public function login()
    {
        $session = $this->session->get();
        var_dump($this->session->getFlashdata('Login'));
        if ($session["password_check"]) {
            // return redirect()->to(base_url('Organizations/','refresh'));
            return redirect()->to(base_url('Organizations/'));
        }
        return view('Credentials/login');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to(base_url());
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

            // return redirect()->to(base_url('Organizations/','refresh'));
            return redirect()->to(base_url('Organizations/'));
        } else {
            $this->session->setFlashdata('Login', 'Unable to verify user credentails');
            return redirect()->to(base_url());
        }
    }
    public function register()
    {
        $_POST['password'] = password_hash($_POST['password'], PASSWORD_BCRYPT);
        $this->credentials_model->register_user($_POST);
        $this->session->set([
            "password_check" => true,
            "profile" => ($this->credentials_model->get_profile($_POST['email']))
        ]);
        // return redirect()->to(base_url('Organizations/','refresh'));
        return redirect()->to(base_url('Organizations/'));
    }

    public function organization_choice()
    {
        $session = $this->session->get();
        if ($session["password_check"]) {
            $data['organizations'] = str_replace('|', ',', trim($session["profile"]->organization_id, '|'));
            if (!empty($data['organizations'])) {
                $data['organizations'] = $this->credentials_model->organization_name($data['organizations']);
            }
            $this->session->set(['organization' => ""]);
            $this->session->set(['role' => ""]);

            $data['profile'] = $session["profile"];
            $data['title'] = 'Organizations';
            $data['role'] = "";

            // echo view('Templates/header', $data);  //$profile, $title
            // echo view('Credentials/organization_select', $data); //$organizations[]
            // echo view('Templates/footer');
        } else {
            return redirect()->to(base_url(''));
        }
    }
    public function organization_make()
    {
        $session = $this->session->get();
        if ($session["password_check"]) {
            $data['profile'] = $session["profile"];
            $data['title'] = 'Create Organization';
            $data['role'] = "";
            // echo view('Templates/header',$data);
            echo view('Organization/organization_make');
            // echo view('Templates/footer');
        } else {
            return redirect()->to(base_url(''));
        }

    }
    //verified
    public function organization_create()
    {
        $session = $this->session->get();
        if ($session["password_check"]) {
            $sessionProfile = $session["profile"];
            $organization_id = $this->credentials_model->organization_create($_POST, $sessionProfile);
            $sessionProfile->organization_id = $organization_id;
            $this->session->set('profile', $sessionProfile);

            return redirect()->to(base_url('/Organization/verify/' . substr($organization_id, -1)));
        } else {
            return redirect()->to(base_url(''));
        }
    }

    public function organization_verify($organization_id)
    {
        $session = $this->session->get();
        if ($session['password_check']) {
            $user_organization = $this->credentials_model->get_organization($session['profile']->uid);
            if (str_contains($user_organization, $organization_id)) {
                $this->session->set(['organization' => $organization_id]);
                $this->session->set(['role' => $this->credentials_model->get_role($organization_id, $session["profile"]->uid)]);
                return redirect()->to(base_url('Dashboard'));
            } else {
                return redirect()->to(base_url('Organizations/'));
            }
        } else {
            return redirect()->to(base_url(''));
        }
    }

    public function dashboard()
    {
        $session = $this->session->get();
        if ($session['password_check']) {

        } else {
            return redirect()->to(base_url(''));
        }
    }
}