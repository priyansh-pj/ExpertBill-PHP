<?php

namespace App\Controllers;

use App\Models\HR_model;

class HR extends BaseController
{
    protected $organization_model;
    protected $session;
    public function __construct()
    {
        $this->hr_model = new HR_model();
        $this->session = \Config\Services::session();
    }


    public function add_employee()
    {
        $session = $this->session->get();
        if (isset($session["password_check"])) {
            if (in_array($session["role"], ["HR", "OWNER"])) {
                $data['profile'] = $session["profile"];
                $data['title'] = "Add Employee (Organization ID : {$session['organization']})";
                $data['role'] = $session["role"];
                $data['Candidates'] = $this->hr_model->fetch_application($session['organization']);
                echo view('Templates/header', $data);  //$profile, $title
                echo view('HR/add_employee', $data);
                echo view('Templates/footer');
            } else {
                return redirect()->to(base_url('Organizations'));
            }
        } else {
            return redirect()->to(base_url(''));
        }
    }
    public function remove_candidate($user_id)
    {
        $session = $this->session->get();
        if (isset($session["password_check"])) {
            if (in_array($session["role"], ["HR", "OWNER"])) {
                $this->hr_model->remove_candidate_organization($user_id, $session['organization']);
            }
        }
    }
    public function view_profile() {
        $session = $this->session->get();

        if (isset($session["password_check"])) {
            if (in_array($session["role"], ["HR", "OWNER"])) {
                $candidateUsername = $this->request->getGet('candidate_username'); // Get candidate_username from POST data

                if (!$candidateUsername) {
                    return redirect()->to(base_url('HR/add_employee'));
                }

                $data['candidate_profile'] = $this->hr_model->candidate_data($candidateUsername);

                if (is_null($data['candidate_profile'])) {
                    return redirect()->to(base_url('HR/add_employee'));
                }

                $data['profile'] = $session["profile"];
                $data['username'] = $candidateUsername;
                $data['title'] = "View Candidate: (Organization ID : {$session['organization']}, Username : {$candidateUsername}) ";
                $data['role'] = $session["role"];

                echo view('Templates/header', $data);
                echo view('HR/view_profile');
                echo view('Templates/footer');
            } else {
                return redirect()->to(base_url('Dashboard'));
            }
        } else {
            return redirect()->to(base_url(''));
        }
    }

    public function create_employee(){
        $session = $this->session->get();

        if (isset($session["password_check"])) {
            if (in_array($session["role"], ["HR", "OWNER"])) {
                $data = $this->request->getPost();
                $this->hr_model->insert_employee($data, $session['organization']);
                return redirect()->to(base_url('HR/add_employee'));
            } else {
                return redirect()->to(base_url('Dashboard'));
            }
        } else {
            return redirect()->to(base_url(''));
        }
    }

    public function list_employee(){
        $session = $this->session->get();

        if (isset($session["password_check"])) {
            if (in_array($session["role"], ["HR", "OWNER"])) {
                $data = $this->request->getPost();
                $this->hr_model->insert_employee($data, $session['organization']);
                return redirect()->to(base_url('HR/add_employee'));
            } else {
                return redirect()->to(base_url('Dashboard'));
            }
        } else {
            return redirect()->to(base_url(''));
        }
    }
}
