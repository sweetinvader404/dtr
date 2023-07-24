<?php

class TimeRecord_model extends CI_Model {
    public function __construct() {
        parent::__construct();
        $this->load->database(); 
    }
    public function get_time_records_by_date($date) {
        $this->db->select('time_records.*, employees.first_name, employees.last_name');
        $this->db->from('time_records');
        $this->db->join('employees', 'time_records.employee_id = employees.id', 'left');
        $this->db->where('date_added', $date);
        $query = $this->db->get();

        return $query->result();
    }
    public function add_time_record($data) {
    if (!$this->session->userdata('user_id')) {
        redirect('user/login'); 
    }else{
        $this->db->insert('time_records', $data);
        return $this->db->insert_id();
    }
        
    }

    public function get_employee_by_qrcode_or_id($qrcodeOrId) {
        $this->db->where('qrcode', $qrcodeOrId); 
        $this->db->or_where('id', $qrcodeOrId);
        return $this->db->get('employees')->row();
    }


    public function update_time_out($time_record_id) {
        $data = array(
            'time_out' => date('Y-m-d H:i:s')
        );

        $this->db->where('id', $time_record_id);
        $this->db->update('time_records', $data);
    }
    public function get_time_record_by_date_employee($date, $employee_id)
    {
        $this->db->where('date_added', $date);
        $this->db->where('employee_id', $employee_id);
        $query = $this->db->get('time_records');

        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return null;
        }
    }
    
}
?>
