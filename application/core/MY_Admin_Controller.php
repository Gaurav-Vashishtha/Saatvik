<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Admin_Controller extends MY_Controller  {

    public function __construct()
    {
        parent::__construct();

        $this->authMiddleware();
        $this->permissionMiddleware();
    }

    private function authMiddleware()
    {

            // if ($this->uri->segment(1) !== 'admin') {
            //     return; // skip authentication for frontend
            // }

        $uri = $this->uri->uri_string();

        $except = [
            'admin/login',
            'admin/login/authenticate',
            'admin/logout'
        ];

        if (in_array($uri,$except)) {
            return;
        }

        if (!$this->session->userdata('admin_logged_in')) {
            redirect('admin/login');
            exit;
        }
    }

private function permissionMiddleware()
{
    if(!$this->session->userdata('admin_logged_in')){
        return;
    }

    $role_id = $this->session->userdata('role_id');

    if($role_id == 1){
        return;
    }

    if($this->uri->segment(2) == 'login'){
    return;
    }

    if($this->uri->segment(2) == 'dashboard'){
    return;
    }

    if($this->uri->segment(2) == 'logout'){
        return;
    }

    if($this->uri->segment(2) == 'change_password'){
        return;
    }

    $module = 'admin/'.$this->uri->segment(2);
    $method = $this->router->fetch_method();

    switch ($method) {

        case 'create':
        case 'store':
        case 'save':
            $action = 'add';
        break;

        case 'edit':
        case 'update':
        case 'toggle':
            $action = 'edit';
        break;

        case 'delete':
            $action = 'delete';
        break;

        default:
            $action = 'view';
    }

if ($module != 'admin/dashboard' && !checkPermission($module,$action)) {
    show_error('Access Denied',403);
}
}
}