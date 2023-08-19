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
        if (!empty($hash) && password_verify($_POST['password'], $hash)) {
            $this->session->set(["password_check" => true, "profile" => ($this->credentials_model->get_profile($_POST['email']))]);
            return redirect()->to(base_url('organization_verify/', 'refresh'));
        } else {
            echo ("<script>alert('Credentials Doesn't Exist. Please Reverify Details'');</script>");
            return redirect()->to(base_url());
        }
    }
    public function register()
    {
        $_POST['password'] = password_hash($_POST['password'], PASSWORD_BCRYPT);
        $this->credentials_model->register_user($_POST);
        $this->session->set(["password_check" => true, "profile" => ($this->credentials_model->get_profile($_POST['email']))]);
        return redirect()->to(base_url('organization_verify/', 'refresh'));
    }

    public function organization_verify()
    {
        if ($this->session->get("password_check")) {
            $organizations = $this->session->get('organization_id');
            $data['organization'] = ($organizations) ? explode("|", $organizations) : [];
            if (!empty($data['organization'])) {
                $data['organization'] = $this->credentials_model->organization_name($organizations);
            }
            $data['profile'] = $this->session->get('profile');
            $data['title'] = 'Organization';
            $this->session->set(['role' => ""]);
            $data['role'] = "";

            echo view('Templates/header', $data);
            // echo view('Credentials/organization_select', $data);
            echo "<pre>";
            var_dump($data);
            // die();
            echo view('Templates/footer');
        } else {
            redirect(base_url("databliss/login"));
        }
    }
}