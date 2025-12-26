<?php
class User_model extends CI_Model
{

    public function get_hosts()
    {

        $sql = "SELECT * FROM users WHERE role='Host' AND status='Active'";
        $query = $this->db->query($sql);

        return $query->result();
    }
}
