<?php

namespace App\Models;

use CodeIgniter\Model;

class HR_model extends Model
{

    public function fetch_application($organization_id)
    {
        $query = "SELECT user_credentials.uid,user_credentials.first_name,user_credentials.last_name,user_credentials.username FROM organization_buffer LEFT JOIN user_credentials ON organization_buffer.user_id= user_credentials.uid where organization_buffer.organization_id = ?";
        $result = $this->db->query($query, [(int)$organization_id])->getResult();
        return empty($result) ? [] : $result;
    }
    public function remove_candidate_organization($user_id,$organization_id){
        $query = "DELETE FROM organization_buffer WHERE user_id = ? AND organization_id=?";
        $this->db->query($query, [$user_id, $organization_id]);
    }

    public function candidate_data($username){
        $query = "SELECT uid, username, first_name, last_name, email, contact_no FROM user_credentials WHERE username = ?";
        return $this->db->query($query, [$username])->getRow();
    }

    public function insert_employee($data,$org){
        $query = "INSERT INTO `employees` (`first_name`, `last_name`, `email`, `contact_no`, `govt_id`, `address`, `organization_id`, `employee_username`,  `salary`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?);";
        $this->db->query($query, [$data['first_name'], $data['last_name'], $data['email'], $data['phone'], $data['govt'], $data['address'], $org, $data['username'],$data['salary']]);
    }

    public function manage_employee($organization_id){
        $query = "SELECT uid, username, first_name, last_name, email, contact_no FROM employees WHERE organization_id = ?";
        return $this->db->query($query, [$organization_id])->getResult();
    }

}
