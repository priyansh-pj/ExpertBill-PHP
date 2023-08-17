<?php

namespace App\Models;

use CodeIgniter\Model;

class Credentials_model extends Model
{
    public function get_hash($email)
    {
        $query = "SELECT password FROM user_credentials WHERE email = ? ";
        return $this->db->query($query, [$email])->getResult();
    }
    public function get_profile($email)
    {
        $query = "SELECT uid,username,first_name,last_name,email,contact_no FROM user_credentials WHERE email = ?";
        return $this->db->query($query, [$email])->getResult();
    }
    public function register_user($data)
    {
        $query = "INSERT INTO user_credentials (username, first_name, last_name, email, contact_no ,password) VALUES(?, ?, ?, ?, ?)";
        $this->db->query($query, [$data['username'], $data['first_name'], $data['last_name'], $data['email'], $data['contact_number'], $data['password']]);
    }
}