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
        var_dump($this->session->getFlashdata('Login'));
        if ($this->session->get("password_check")) {
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
        if ($this->session->get("password_check")) {
            $data['organizations'] = str_replace('|', ',', trim($this->session->get('profile')->organization_id,'|'));
            if (!empty($data['organizations'])) {
                $data['organizations'] = $this->credentials_model->organization_name($data['organizations']);
            }

            $this->session->set(['role' => ""]);

            $data['profile'] = $this->session->get('profile');
            $data['title'] = 'Organizations';
            $data['role'] = "";

            echo "<pre>";var_dump($data);die();

            // echo view('Templates/header', $data);  //$profile, $title
            // echo view('Credentials/organization_select', $data); //$organizations[]
            // echo view('Templates/footer');
        } else {
            return redirect()->to(base_url(''));
        }
    }
    public function organization_make(){
        $data['profile'] = ($this->session->get('profile'));
        $data['title'] = 'Create Organization';
        $data['role'] = "";
        echo view('Templates/header',$data);
        echo view('Credentials/organization_make');
        echo view('Templates/footer');
    }
    //verified
    public function organization_create(){
        var_dump()
        $this->credentials_model->insert_organization($_POST);
        $org_id = $this->credentials_model->find_org_id($_POST)[0]->organization_id;
        $uid = $this->session->get('uid');
        $prev_org_id = ($this->credentials_model->create_organization_role($org_id,$uid)[0]->organization_id) ? $this->credentials_model->create_organization_role($org_id,$uid)[0]->organization_id : "";
        $this->credentials_model->set_up_new_organization($org_id);
        $org_id = empty($prev_org_id) ? "$org_id" : "$prev_org_id".","."$org_id";
        $this->credentials_model->update_organization($org_id,$uid);
        return redirect()->to(base_url('databliss/organization_verify/'.$this->session->get('username')));
    }
    

}