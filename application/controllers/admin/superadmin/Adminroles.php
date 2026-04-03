<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once(APPPATH.'core/MY_Admin_Controller.php');

/**
 * @property CI_Input $input
 * @property CI_Session $session
 * @property CI_Form_validation $form_validation
 * @property db $db
 * @property upload $upload
 */

class Adminroles extends MY_Admin_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->library(['session','form_validation']);
        $this->load->helper(['url','form','permission']);
    }

    public function index()
    {
        $data['roles']=$this->db->get('admin_roles')->result();
        
        $this->load->view('admin/layouts/header');
        $this->load->view('admin/roles/list',$data);
        $this->load->view('admin/layouts/footer');
    }

    public function create()
    {
        if($this->input->post()){

            $this->db->insert('admin_roles',[
                'name'=>$this->input->post('name'),
                'status'=>$this->input->post('status')
            ]);

            redirect('admin/admin-roles');
        }

        $this->load->view('admin/layouts/header');
        $this->load->view('admin/roles/add');
        $this->load->view('admin/layouts/footer');
    }


    public function edit($id)
    {
        $data['role'] = $this->db->where('id', $id)->get('admin_roles')->row();

        $data['sidebars'] = $this->db
            ->where('status', 1)
            ->order_by('sort_order', 'ASC')
            ->get('admin_sidebar')
            ->result();

        $permissions = $this->db
            ->where('role_id', $id)
            ->get('admin_permission')
            ->result();

        $perm_data = [];

        foreach ($permissions as $p) {
            $perm_data[$p->sidebar_id] = $p;
        }

        $data['permissions'] = $perm_data;

        if ($this->input->post()) {

            $this->db->where('id', $id)->update('admin_roles', [
                'name' => $this->input->post('name'),
                'status' => $this->input->post('status')
            ]);

            $this->db->where('role_id', $id)->delete('admin_permission');

            $permissions = $this->input->post('permission');

            if ($permissions) {
                foreach ($permissions as $sidebar_id => $perm) {

                    $this->db->insert('admin_permission', [
                        'role_id' => $id,
                        'sidebar_id' => $sidebar_id,
                        'can_view' => isset($perm['view']) ? 1 : 0,
                        'can_add' => isset($perm['add']) ? 1 : 0,
                        'can_edit' => isset($perm['edit']) ? 1 : 0,
                        'can_delete' => isset($perm['delete']) ? 1 : 0
                    ]);
                }
            }

            redirect('admin/admin-roles');
        }

        $this->load->view('admin/layouts/header');
        $this->load->view('admin/roles/edit', $data);
        $this->load->view('admin/layouts/footer');
    }
  
    public function toggle($id)
    {
        $role = $this->db->where('id', $id)->get('admin_roles')->row();

        if (!$role) {
            show_404();
        }

        $new_status = ($role->status == 1) ? 0 : 1;

        $this->db->where('id', $id)->update('admin_roles', [
            'status' => $new_status
        ]);

        redirect('admin/admin-roles');
    }
}