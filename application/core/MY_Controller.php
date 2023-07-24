<?php

class MY_Controller extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->helper('url');

        $allowed_urls = array('user/login', 'user/process_login');
        $current_url = $this->uri->uri_string();

        // Check if the current URL is in the allowed list or if the user has a valid session
        if (!in_array($current_url, $allowed_urls) && !$this->session->userdata('user_id')) {
            // User's session is expired, redirect to the login page
            redirect('user/login');
        }
    }
}
?>
