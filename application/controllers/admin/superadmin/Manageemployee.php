<?php

use PSpell\Config;

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @property CI_Input $input
 * @property CI_Session $session
 * @property CI_Form_validation $form_validation
 * @property Manageemployee_model $Manageemployee_model
 * @property upload $upload
 */

class Manageemployee extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->model('admin/Manageemployee_model');
        $this->load->library(['session','form_validation']);
        $this->load->helper(['url','form','common']);

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
            ['name' => 'Manage Employee']
        ];

        $data['filters'] = $filters;
        $data['employees'] = $this->Manageemployee_model->get_all($filters);

        $this->load->view('admin/layouts/header', $data);
        $this->load->view('admin/mangeEmployee/list', $data);
        $this->load->view('admin/layouts/footer');
    }


    public function create()
    {
        $this->form_validation->set_rules('first_name', 'First Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('phone', 'Phone', 'required');

        if ($this->form_validation->run() === FALSE) {

            $data['title'] = 'Add Employee';
            $data['breadcrumb'] = [
                ['name' => 'Dashboard', 'url' => site_url('admin/dashboard')],
                ['name' => 'Manage Employee', 'url' => site_url('admin/employee')],
                ['name' => 'Add Employee']
            ];

            $this->load->view('admin/layouts/header', $data);
            $this->load->view('admin/mangeEmployee/add', $data);
            $this->load->view('admin/layouts/footer');
            return;
        }

        $post = $this->input->post(NULL, TRUE);
        $uploaded_image = _upload_file('employee_image', './uploads/employee/');
        $employee_code = generate_employee_code('employees', 'EMP');

        $payload = [
            'employee_code'     => $employee_code,
            'first_name'        => $post['first_name'] ?? '',
            'last_name'         => $post['last_name'] ?? '',
            'gender'            => $post['gender'] ?? NULL,
            'date_of_birth'     => !empty($post['date_of_birth']) ? $post['date_of_birth'] : NULL,
            'marital_status'    => $post['marital_status'] ?? NULL,
            'anniversary_date'  => !empty($post['anniversary_date']) ? $post['anniversary_date'] : NULL,
            'email'             => $post['email'] ?? '',
            'phone'             => $post['phone'] ?? '',
            'designation'       => $post['designation'] ?? '',
            'department'        => $post['department'] ?? '',
            'address'           => $post['address'] ?? '',
            'city'              => $post['city'] ?? '',
            'state'             => $post['state'] ?? '',
            'pincode'           => $post['pincode'] ?? '',
            'employee_image'    => $uploaded_image,
            'is_active'         => isset($post['is_active']) ? $post['is_active'] : 0,
            'updated_at'        => date('Y-m-d H:i:s')
        ];

        $this->Manageemployee_model->insert($payload);

        $this->session->set_flashdata('success', 'Employee created successfully.');
        redirect('admin/employee');
    }

    public function edit($id = null)
    {
        if (!$id) show_404();

        $employee = $this->Manageemployee_model->get_by_id($id);
        if (!$employee) show_404();

        $this->form_validation->set_rules('first_name', 'First Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('phone', 'Phone', 'required');

        if ($this->form_validation->run() === FALSE) {

            $data['title'] = 'Edit Employee';
            $data['employee'] = $employee;

            $data['breadcrumb'] = [
                ['name' => 'Dashboard', 'url' => site_url('admin/dashboard')],
                ['name' => 'Manage Employee', 'url' => site_url('admin/employee')],
                ['name' => 'Edit Employee']
            ];

            $this->load->view('admin/layouts/header', $data);
            $this->load->view('admin/mangeEmployee/edit', $data);
            $this->load->view('admin/layouts/footer');
            return;
        }

        $post = $this->input->post(NULL, TRUE);
        $uploaded_image = _upload_file('employee_image', './uploads/employee/', $employee->employee_image);

        $payload = [
            'first_name'        => $post['first_name'] ?? '',
            'last_name'         => $post['last_name'] ?? '',
            'gender'            => $post['gender'] ?? NULL,
            'date_of_birth'     => !empty($post['date_of_birth']) ? $post['date_of_birth'] : NULL,
            'marital_status'    => $post['marital_status'] ?? NULL,
            'anniversary_date'  => !empty($post['anniversary_date']) ? $post['anniversary_date'] : NULL,
            'email'             => $post['email'] ?? '',
            'phone'             => $post['phone'] ?? '',
            'designation'       => $post['designation'] ?? '',
            'department'        => $post['department'] ?? '',
            'address'           => $post['address'] ?? '',
            'city'              => $post['city'] ?? '',
            'state'             => $post['state'] ?? '',
            'pincode'           => $post['pincode'] ?? '',
            'employee_image'    => $uploaded_image ?? $employee->employee_image,
            'is_active'         => isset($post['is_active']) ? $post['is_active'] : 0,
            'updated_at'        => date('Y-m-d H:i:s')
        ];

        $this->Manageemployee_model->update($id, $payload);

        $this->session->set_flashdata('success', 'Employee updated successfully.');
        redirect('admin/employee');
    }


    public function delete($id = null)
    {
        if (!$id) show_404();

        $this->Manageemployee_model->delete($id);

        $this->session->set_flashdata('success', 'Employee deleted successfully.');
        redirect('admin/employee');
    }

    public function toggle($id = null)
    {
        if (!$id) show_404();

        $employee = $this->Manageemployee_model->get_by_id($id);

        $this->Manageemployee_model->update($id, [
            'is_active' => $employee->is_active ? 0 : 1
        ]);

        $this->session->set_flashdata('success', 'Status changed successfully.');
        redirect('admin/employee');
    }




}