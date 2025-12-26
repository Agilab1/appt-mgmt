<?php
class Visitor_model extends CI_Model {

    public function insert($data) {
        return $this->db->insert('visitors', $data);
    }

    public function get_by_host($host_id) {
        return $this->db
            ->where('host_id', $host_id)
            ->order_by('id','DESC')
            ->get('visitors')
            ->result();
    }

    public function update_status($id, $status) {
        return $this->db
            ->where('id', $id)
            ->update('visitors', ['status' => $status]);
    }

    public function today_visitors() {
        return $this->db
            ->order_by('id','DESC')
            ->get('visitors')
            ->result();
    }
}
