<?php

// application/hooks/SessionCheck.php

class SessionCheck {
    public function checkSession() {
        $CI =& get_instance();

        // Load the session library if not already loaded
        if (!isset($CI->session)) {
            $CI->load->library('session');
        }

        $CI->load->helper('url'); // Load the URL Helper

        // Rest of the code remains the same...
    }
}

?>
