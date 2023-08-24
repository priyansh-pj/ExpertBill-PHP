<?php

namespace App\Models;

use CodeIgniter\Model;

class Organization_model extends Model
{

    public function profile_organization($user_id)
    {
        $query = "SELECT organization_id FROM user_credentials WHERE uid = (?)";
        $result = $this->db->query($query, [$user_id])->getRow()->organization_id;
        return empty($result) ? '' : $result;
    }

    public function organization_name($organization)
    {


        $query = "SELECT id, name FROM organization WHERE id IN ($organization)";

        return $this->db->query($query)->getResult();
    }


    public function organization_create($data, $profile)
    {
        // $this->db->transStart();

        // Insert into organization table
        $query = "INSERT INTO organization (name, gst_id, contact_no, email, address, city, state, pincode) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $this->db->query($query, [$data['name'], $data['gstin'], $data['phone'], $data['email'], $data['address'], strtolower($data['city']), strtolower($data['state']), $data['pincode']]);

        // Fetch org_id

        $org_id = $this->db->insertID();

        // Insert role
        $query = "INSERT INTO role (user_id, organization_id, role) VALUES (?, ?, 'OWNER')";
        $this->db->query($query, [$profile->uid, $org_id]);

        // Update user role
        $profile_org_id = ($profile->organization_id) ? $profile->organization_id . "|" . $org_id : $org_id;

        // Update profile
        $query = "UPDATE user_credentials SET organization_id = ? WHERE uid = ?";
        $this->db->query($query, [$profile_org_id, $profile->uid]);

        if ($this->db->transStatus() === FALSE) {
            $this->db->transRollback();
        } else {
            $this->db->transCommit();
        }

        return $profile_org_id;
    }

    public function get_organization($uid)
    {
        $query = "SELECT organization_id FROM user_credentials WHERE uid = ?";
        return $this->db->query($query, [$uid])->getRow()->organization_id;
    }

    public function join_organizations()
    {
        $query = "";
        return $this->db->query($query)->getResult();
    }

    public function get_role($organization_id, $user_id)
    {
        $query = "SELECT role FROM role WHERE user_id = ? AND organization_id = ? ";
        return $this->db->query($query, [$user_id, $organization_id])->getRow()->role;
    }
}
