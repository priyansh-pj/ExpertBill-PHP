<?php

namespace App\Models;

use CodeIgniter\Model;

class Credentials_model extends Model
{
    public function get_hash($email)
    {
        $query = "SELECT password FROM user_credentials WHERE email = ?";
        $result = $this->db->query($query, [$email])->getResult();

        return empty($result) ? [] : $result[0]->password;
    }


    public function get_profile($email)
    {
        $query = "SELECT uid,username,first_name,last_name,email,contact_no,organization_id FROM user_credentials WHERE email = ?";
        $result = $this->db->query($query, [$email])->getResult();
        return empty($result) ? [] : $result[0];

    }
    public function register_user($data)
    {
        $this->db->transStart();
        $query = "INSERT INTO user_credentials (username, first_name, last_name, email, contact_no, password) VALUES (?, ?, ?, ?, ?, ?)";
        $this->db->query($query, [$data['username'], $data['first_name'], $data['last_name'], $data['email'], $data['contact_number'], $data['password']]);
        if ($this->db->transStatus() === FALSE) {
            $this->db->transRollback();
            return false;
        } else {
            $this->db->transCommit();
        }
    }

    public function organization_name($organization)
    {
        $query = "SELECT id, name FROM organization WHERE id IN ($organization)";
        return $this->db->query($query)->getResult();
    }

}