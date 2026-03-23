<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AuthMiddleware {

    public function check()
    {
        $CI =& get_instance();

        $uri = trim($CI->uri->uri_string(),'/');

        $except = [
            'admin/login',
            'admin/login/authenticate',
            'admin/logout'
        ];

        if (in_array($uri, $except)) {
            return;
        }

        if (!$CI->session->userdata('admin_logged_in')) {

            redirect('admin/login');
            exit;

        }
    }
}

?>