<?php

namespace App\Controllers;

use App\Models\Credentials_model;
use App\Models\Organization_model;

class Organization extends BaseController
{
    protected $credentials_model;
    protected $organization_model;
    protected $session;
    public function __construct()
    {
        $this->credentials_model = new Credentials_model();
        $this->organization_model = new Organization_model();
        $this->session = \Config\Services::session();
    }

    public function organization_choice()
    {
        $session = $this->session->get();
        $session["profile"]->organization_id = $this->organization_model->profile_organization($session["profile"]->uid);
        if (isset($session["password_check"])) {
            $data['organizations'] = str_replace('|', ',', trim($session["profile"]->organization_id, '|'));
            if (!empty($data['organizations'])) {
                $data['organizations'] = $this->organization_model->organization_name($data['organizations']);
            }
            $this->session->set(['organization' => ""]);
            $this->session->set(['role' => ""]);

            $data['profile'] = $session["profile"];
            $data['title'] = 'Organizations';
            $data['role'] = "";

            echo view('Templates/header', $data);  //$profile, $title
            echo view('Organization/organization_choice', $data); //$organizations[]

            echo view('Templates/footer');
        } else {
            return redirect()->to(base_url(''));
        }
    }
    public function organization_make()
    {
        $session = $this->session->get();
        if (isset($session["password_check"])) {
            $data['profile'] = $session["profile"];
            $data['title'] = 'Create Organization';
            $data['role'] = "";
            echo view('Templates/header', $data);
            echo view('Organization/organization_make');
            echo view('Templates/footer');
        } else {
            return redirect()->to(base_url(''));
        }
    }

    public function organization_create()
    {
        $session = $this->session->get();
        if (isset($session["password_check"])) {
            $sessionProfile = $session["profile"];
            $organization_id = $this->organization_model->organization_create($_POST, $sessionProfile);
            $sessionProfile->organization_id = $organization_id;
            $this->session->set('profile', $sessionProfile);

            return redirect()->to(base_url('/Organization/verify/' . substr($organization_id, -1)));
        } else {
            return redirect()->to(base_url(''));
        }
    }

    //verified
    public function search_organization()
    {
        $session = $this->session->get();
        if (isset($session["password_check"])) {
            $data['profile'] = $session["profile"];
            $data['title'] = 'Join Organization';
            $data['role'] = "";
            echo view('Templates/header', $data);
            echo view('Organization/organization_search', $data);
            echo view('Templates/footer');
        } else {
            return redirect()->to(base_url(''));
        }
    }
    public function apply_organization()
    {
        $session = $this->session->get();
        if (isset($session["password_check"])) {
            $data['profile'] = $session["profile"];
            $data['title'] = 'Apply Organization';
            $data['role'] = "";
            echo view('Templates/header', $data);
            echo view('Organization/organization_apply');
            echo view('Templates/footer');
        } else {
            return redirect()->to(base_url(''));
        }
    }

    public function join_organization()
    {
        $session = $this->session->get();
        if (isset($session["password_check"])) {
            var_dump($_POST);
            var_dump($session['profile']->uid);
            die();
            return redirect()->to(base_url('Organizations'))
        } else {
            return redirect()->to(base_url(''));
        }
    }

    public function organization_verify($organization_id)
    {
        $session = $this->session->get();
        if (isset($session["password_check"])) {
            $user_organization = $this->organization_model->get_organization($session['profile']->uid);

            if (str_contains($user_organization, $organization_id)) {
                $this->session->set(['organization' => $organization_id]);
                $this->session->set(['role' => $this->organization_model->get_role($organization_id, $session["profile"]->uid)]);
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
        if (isset($session["password_check"])) {
            $data['profile'] = $session["profile"];
            $data['title'] = 'Dashboard';
            $data['role'] = $session["role"];
            echo view('Templates/header', $data);  //$profile, $title
            echo view('Templates/footer');
        } else {
            return redirect()->to(base_url(''));
        }
    }
}
