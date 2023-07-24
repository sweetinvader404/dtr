<?php
class User extends CI_Controller {
    public function login() {
        $this->load->view('login'); 
    }

    public function index() {
        $data['users'] = $this->User_model->get_all_users();
        $this->load->view('user_list', $data);
    }

public function add() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $user_name = $this->input->post('user_name');
        $user_password = $this->input->post('user_password');
        $user_type = $this->input->post('user_type');

        // Validate that the password is not empty
        if (empty($user_password)) {
            // Handle the case when the password is empty
            // For example, you can display an error message or redirect back to the form
            echo "Password cannot be empty!";
            return;
        }

        $data = array(
            'user_name' => $user_name,
            'user_password' => $user_password,
            'user_type' => $user_type,
            'datetime_added' => date('Y-m-d H:i:s'),
            'datetime_modified' => date('Y-m-d H:i:s')
        );

        $this->User_model->add_user($data);
        redirect('user');
    } else {
        $this->load->view('user_add');
    }
}

    public function edit($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = array(
                'user_name' => $this->input->post('user_name'),
                'user_type' => $this->input->post('user_type'),
                'datetime_modified' => date('Y-m-d H:i:s')
            );

            $this->User_model->update_user($id, $data);
            redirect('user');
        } else {
            $data['user'] = $this->User_model->get_user($id);
            $this->load->view('user_edit', $data);
        }
    }

    public function delete() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $ids = $this->input->post('ids');
            if (!empty($ids)) {
                if (($key = array_search($this->session->userdata('user_id'), $ids)) !== false) {
                    unset($ids[$key]);
                }

                if (!empty($ids)) {
                    foreach ($ids as $id) {
                        $this->User_model->delete_user($id);
                    }
                }
            }
        }
        redirect('user');
    }

    public function __construct() {
        parent::__construct();
        $this->load->model('User_model');
    }

    private function generate_password($length) {
        $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()-_=+';
        $password = '';
        $charLength = strlen($chars) - 1;
        for ($i = 0; $i < $length; $i++) {
            $password .= $chars[rand(0, $charLength)];
        }
        return $password;
    }

    public function process_login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $user = $this->User_model->check_login($username, $password);

            if ($user) {
                $user_data = array(
                    'user_id' => $user->id,
                    'user_name' => $user->user_name,
                    'user_type' => $user->user_type
                );

                $this->session->set_userdata($user_data);
                redirect('time_record');
            } else {
                echo "Invalid username or password.";
            }
        } else {
            redirect('user/login');
        }
    }

  
}
