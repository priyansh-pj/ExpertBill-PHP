<?php

namespace App\Models;

use CodeIgniter\Model;

class Credentials_model extends Model
{
    public function get_hash($email)
    {
        $query = "SELECT password FROM user_credentials WHERE email = ? ";
        return $this->db->query($query, [$email])->getResult()[0];
    }
    public function get_profile($email)
    {
        $query = "SELECT uid,username,first_name,last_name,email,contact_no FROM user_credentials WHERE email = ?";
        return $this->db->query($query, [$email])->getResult()[0];
    }
}