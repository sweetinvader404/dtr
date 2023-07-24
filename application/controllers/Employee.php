<?php

class Employee extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Employee_model');
    }

    public function index() {
        $data['employees'] = $this->Employee_model->get_all_employees();
        $this->load->view('employee_list', $data);
    }

    public function add() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = array(
                'first_name' => $this->input->post('first_name'),
                'last_name' => $this->input->post('last_name'),
                'created_by' => $this->session->userdata('user_id'),
                'datetime_added' => date('Y-m-d H:i:s'),
                'datetime_updated' => date('Y-m-d H:i:s')
            );
            $this->Employee_model->add_employee($data);
            redirect('employee');
        } else {
            $this->load->view('employee_add');
        }
    }

    public function edit($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = array(
                'first_name' => $this->input->post('first_name'),
                'last_name' => $this->input->post('last_name'),
                'datetime_updated' => date('Y-m-d H:i:s')
            );
            $this->Employee_model->update_employee($id, $data);
            redirect('employee');
        } else {
            $data['employee'] = $this->Employee_model->get_employee($id);
            $this->load->view('employee_edit', $data);
        }
    }

    public function delete() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $ids = $this->input->post('ids');
            if (!empty($ids)) {
                foreach ($ids as $id) {
                    $this->Employee_model->delete_employee($id);
                }
            }
        }
        redirect('employee');
    }
    public function list() {
        $this->load->model('Employee_model');
        $data['employees'] = $this->Employee_model->get_all_employees();
        $this->load->view('employee_list', $data);
    }
}
?>