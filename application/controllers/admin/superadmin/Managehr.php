<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once(APPPATH.'core/MY_Admin_Controller.php');
/**
 * @property CI_Input $input
 * @property CI_Session $session
 * @property CI_Form_validation $form_validation
 * @property Managehr_model $Managehr_model
 * @property upload $upload
 */

class manageHR extends MY_Admin_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->model('admin/Managehr_model');
        $this->load->library(['session','form_validation']);
        $this->load->helper(['url','form', 'common']);

        if (!$this->session->userdata('admin_logged_in')) {
            redirect('admin');
        }
    }


        public function index()
        {
            $filters = [];

            if ($this->input->get('search')) {
                $filters['search'] = $this->input->get('search');
            }

            if ($this->input->get('is_active') !== null && $this->input->get('is_active') !== '') {
                $filters['is_active'] = $this->input->get('is_active');
            }
            
            $data['breadcrumb'] = [
            ['name' => 'Dashboard', 'url' => site_url('admin/dashboard')],
            ['name' => 'Manage Admin User']
                ];
            $data['filters'] = $filters;
            $data['hrs'] = $this->Managehr_model->get_all($filters);


            $this->load->view('admin/layouts/header', $data);
            $this->load->view('admin/manageHR/list', $data);
            $this->load->view('admin/layouts/footer');
        }


    public function create()
    {
        $this->form_validation->set_rules('first_name', 'First Name', 'required');
        $this->form_validation->set_rules('last_name', 'Last Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.email]');
        $this->form_validation->set_rules('phone', 'Phone', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');
        $this->form_validation->set_rules('role_id', 'Role', 'required');

         

        if ($this->form_validation->run() === FALSE) {

            $data['title'] = 'Add Admin User';

            $data['breadcrumb'] = [
            ['name' => 'Dashboard', 'url' => site_url('admin/dashboard')],
            ['name' => 'Manage Admin User', 'url' => site_url('admin/manage-hr')],
            ['name' => 'Add Admin User']
        ];

             $data['roles'] = $this->Managehr_model->get_roles();

            $this->load->view('admin/layouts/header', $data);
            $this->load->view('admin/manageHR/add', $data);
            $this->load->view('admin/layouts/footer');
            return;
        }

        $post = $this->input->post(NULL, TRUE);
        $uploaded_image = _upload_file('image', './uploads/hr/');
        $employee_code = generate_employee_code('users', 'ADMU');
        
        $payload = [
            'employee_code'     => $employee_code,
            'first_name'        => $post['first_name'],
            'last_name'         => $post['last_name'],
            'email'             => $post['email'],
            'phone'             => $post['phone'],
            'password'          => password_hash($post['password'], PASSWORD_DEFAULT),
            'role_id'           => $post['role_id'],
            'gender'            => $post['gender'] ?? NULL,
            'date_of_birth'     => !empty($post['date_of_birth']) ? $post['date_of_birth'] : NULL,
            'marital_status'    => $post['marital_status'] ?? NULL,
            'anniversary_date'  => !empty($post['anniversary_date']) ? $post['anniversary_date'] : NULL,
            'department'        => $post['department'] ?? '',
            'address'           => $post['address'] ?? '',
            'image'          => $uploaded_image,
            'is_active'     => isset($post['status']) ? 1 : 0,
            'created_at' => date('Y-m-d H:i:s'),
        ];
   
        //  print_r($payload); die;
        $this->Managehr_model->insert($payload);

        $this->session->set_flashdata('success', 'HR created successfully.');
        redirect('admin/manage-hr');
    }



    public function edit($id = null)
    {
        if (!$id) show_404();

        $hr = $this->Managehr_model->get_by_id($id);
        if (!$hr) show_404();

        $this->form_validation->set_rules('first_name', 'First Name', 'required');
        $this->form_validation->set_rules('last_name', 'Last Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('phone', 'Phone', 'required');



        if ($this->form_validation->run() === FALSE) {

            $data['title'] = 'Edit Admin User';
            $data['hr']    = $hr;

            $data['breadcrumb'] = [
                ['name' => 'Dashboard', 'url' => site_url('admin/dashboard')],
                ['name' => 'Manage Admin User', 'url' => site_url('admin/manage-hr')],
                ['name' => 'Edit Admin User']
            ];


            $this->load->view('admin/layouts/header', $data);
            $this->load->view('admin/manageHR/edit', $data);
            $this->load->view('admin/layouts/footer');
            return;
        }

        $post = $this->input->post(NULL, TRUE);
        $uploaded_image = _upload_file('image', './uploads/hr/',$hr->image);
        $payload = [
            'first_name'        => $post['first_name'],
            'last_name'         => $post['last_name'],
            'email'             => $post['email'],
            'phone'             => $post['phone'],
            'gender'            => $post['gender'] ?? NULL,
            'date_of_birth'     => !empty($post['date_of_birth']) ? $post['date_of_birth'] : NULL,
            'marital_status'    => $post['marital_status'] ?? NULL,
            'anniversary_date'  => !empty($post['anniversary_date']) ? $post['anniversary_date'] : NULL,
            'department'        => $post['department'] ?? '',
            'address'           => $post['address'] ?? '',
            'image'    => $uploaded_image ?? $hr->image ,
            'is_active'     => isset($post['status']) ? 1 : 0,
            'updated_at' => date('Y-m-d H:i:s'),
        ];

        if (!empty($post['password'])) {
            $payload['password'] = password_hash($post['password'], PASSWORD_DEFAULT);
        }

        $this->Managehr_model->update($id, $payload);

        $this->session->set_flashdata('success', 'HR updated successfully.');
        redirect('admin/manage-hr');
    }



    public function delete($id = null)
    {
        if (!$id) show_404();

        $this->Managehr_model->delete($id);

        $this->session->set_flashdata('success', 'HR deleted successfully.');
        redirect('admin/manage-hr');
    }


    public function toggle($id = null)
    {
        if (!$id) show_404();

        $this->Managehr_model->toggle_status($id);

        $this->session->set_flashdata('success', 'Status changed.');
        redirect('admin/manage-hr');
    }
}