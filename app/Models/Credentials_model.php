<?php

namespace App\Models;

use CodeIgniter\Model;

class Credentials_model extends Model
{
    public function get_info_username($username)
    {
        $query = "SELECT password FROM user_credentials WHERE username = ? ";
        return $this->db->query($query, [$username])->getResult()[0];
    }
    public function get_uid($username)
    {
        $query = "SELECT uid FROM user_credentials WHERE username = ?";
        return $this->db->query($query, [$username])->getResult();
    }
}