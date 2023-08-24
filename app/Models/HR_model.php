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

}
