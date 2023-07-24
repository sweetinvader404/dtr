<?php

class User_model extends CI_Model {
    public function __construct() {
        parent::__construct();
        $this->load->database(); 
    }
    public function add_user($data) {
        $this->db->insert('users', $data);
        return $this->db->insert_id();
    }

    public function update_user($id, $data) {
        $this->db->where('id', $id);
        $this->db->update('users', $data);
    }

    public function delete_user($id) {
        $this->db->where('id', $id);
        $this->db->delete('users');
    }

    public function get_user($id) {
        $this->db->where('id', $id);
        return $this->db->get('users')->row();
    }

    public function get_all_users() {
        return $this->db->get('users')->result();
    }

    public function check_login($username, $password) {
        $this->db->where('user_name', $username);
        $this->db->where('user_password', $password);
        return $this->db->get('users')->row();
    }
}
?>