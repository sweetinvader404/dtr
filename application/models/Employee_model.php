<?php
class Employee_model extends CI_Model {
     public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    public function add_employee($data) {
        $this->db->insert('employees', $data);
        return $this->db->insert_id();
    }

    public function update_employee($id, $data) {
        $this->db->where('id', $id);
        $this->db->update('employees', $data);
    }

    public function delete_employee($id) {
        $this->db->where('id', $id);
        $this->db->delete('employees');
    }

    public function get_employee($id) {
        $this->db->where('id', $id);
        return $this->db->get('employees')->row();
    }

    public function get_all_employees() {
        return $this->db->get('employees')->result();
    }
}
?>