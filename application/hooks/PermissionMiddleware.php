<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PermissionMiddleware {

    public function check()
    {
        $CI =& get_instance();

        $user = $CI->session->userdata('admin');

        if(!$user) return;

        if($user->role_id == 1){
            return true;
        }

        $module = 'admin/'.$CI->uri->segment(2);

        $method = $CI->router->fetch_method();

        $action = 'view';

        switch ($method) {

            case 'create':
                $action = 'add';
            break;

            case 'edit':
            case 'toggle':
                $action = 'edit';
            break;

            case 'delete':
                $action = 'delete';
            break;

            default:
                $action = 'view';
        }

        if (!checkPermission($module,$action)) {

            show_error('Permission Denied',403);

        }

    }

}