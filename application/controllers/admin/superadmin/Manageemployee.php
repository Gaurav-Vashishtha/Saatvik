<?php

use PSpell\Config;

defined('BASEPATH') OR exit('No direct script access allowed');
require_once(APPPATH.'core/MY_Admin_Controller.php');
/**
 * @property CI_Input $input
 * @property CI_Session $session
 * @property CI_Form_validation $form_validation
 * @property Manageemployee_model $Manageemployee_model
 * @property upload $upload
 */

class Manageemployee extends MY_Admin_Controller {

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
        $this->form_validation->set_rules('full_name', 'First Name', 'required');
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
        // $employee_code = generate_employee_code('employees', 'EMP');

        $payload = [
            'employee_code'    => $post['employee_code'] ?? '',
            'full_name'        => $post['full_name'] ?? '',
            'salutation'         => $post['salutation'] ?? '',
            'gender'            => $post['gender'] ?? NULL,
            'date_of_birth'     => !empty($post['date_of_birth']) ? $post['date_of_birth'] : NULL,
            'marital_status'    => $post['marital_status'] ?? NULL,
            'anniversary_date'  => !empty($post['anniversary_date']) ? $post['anniversary_date'] : NULL,
            'email'             => $post['email'] ?? '',
            'phone'             => $post['phone'] ?? '',
            'designation'       => $post['designation'] ?? '',
            'department'        => $post['department'] ?? '',
            'location_name'           => $post['location_name'] ?? '',
            'city'              => $post['city'] ?? '',
            'state'             => $post['state'] ?? '',
            'pincode'           => $post['pincode'] ?? '',
            'employee_image'    => $uploaded_image,
            'company_name'    => $post['company_name'] ?? '',
            'age'             => $post['age'] ?? NULL,
            'date_of_joining' => !empty($post['date_of_joining']) ? $post['date_of_joining'] : NULL,
            'remark'          => $post['remark'] ?? '',
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

        $this->form_validation->set_rules('full_name', 'First Name', 'required');
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
            'full_name'        => $post['full_name'] ?? '',
            'employee_code'        => $post['employee_code'] ?? '',
            'salutation'         => $post['salutation'] ?? '',
            'gender'            => $post['gender'] ?? NULL,
            'date_of_birth'     => !empty($post['date_of_birth']) ? $post['date_of_birth'] : NULL,
            'marital_status'    => $post['marital_status'] ?? NULL,
            'anniversary_date'  => !empty($post['anniversary_date']) ? $post['anniversary_date'] : NULL,
            'email'             => $post['email'] ?? '',
            'phone'             => $post['phone'] ?? '',
            'designation'       => $post['designation'] ?? '',
            'department'        => $post['department'] ?? '',
            'location_name'           => $post['location_name'] ?? '',
            'city'              => $post['city'] ?? '',
            'state'             => $post['state'] ?? '',
            'pincode'           => $post['pincode'] ?? '',
            'employee_image'    => $uploaded_image ?? $employee->employee_image,
            'company_name'    => $post['company_name'] ?? '',
            'age'             => $post['age'] ?? NULL,
            'date_of_joining' => !empty($post['date_of_joining']) ? $post['date_of_joining'] : NULL,
            'remark'          => $post['remark'] ?? '',
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

    // public function export_csv()
    // {
    //     $employees = $this->Manageemployee_model->get_all();

    //     header('Content-Type: text/csv');
    //     header('Content-Disposition: attachment; filename="employees_' . date('Y-m-d') . '.csv";');

    //     $output = fopen("php://output", "w");

    //     fputcsv($output, [
    //         'ID',
    //         'Employee Code',
    //         'First Name',
    //         'Last Name',
    //         'Gender',
    //         'Date of Birth',
    //         'Anniversary Date',
    //         'Marital Status',
    //         'Email',
    //         'Phone',
    //         'Designation',
    //         'Department',
    //         'Address',
    //         'Employee Image',
    //         'Status',
    //         'Created At',
    //         'Updated At'
    //     ]);

    //     if (!empty($employees)) {
    //         foreach ($employees as $emp) {
    //             fputcsv($output, [
    //                 $emp->id,
    //                 $emp->employee_code,
    //                 $emp->full_name,
    //                 $emp->last_name,
    //                 $emp->gender,
    //                 $emp->date_of_birth,
    //                 $emp->anniversary_date,
    //                 $emp->marital_status,
    //                 $emp->email,
    //                 $emp->phone,
    //                 $emp->designation,
    //                 $emp->department,
    //                 $emp->location_name,
    //                 $emp->employee_image,
    //                 $emp->is_active ? 'Active' : 'Inactive',
    //                 $emp->created_at,
    //                 $emp->updated_at
    //             ]);
    //         }
    //     }

    //     fclose($output);
    //     exit;
    // }
    
    public function export_csv()
{
    $employees = $this->Manageemployee_model->get_all();

    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename="employees_' . date('Y-m-d') . '.csv";');

    $output = fopen("php://output", "w");

    // CSV Header (ALL fields properly ordered)
    fputcsv($output, [
        'ID',
        'Employee Code',
        'Salutation',
        'Full Name',
        'Gender',
        'Date of Birth',
        'Age',
        'Marital Status',
        'Anniversary Date',
        'Email',
        'Phone',
        'Designation',
        'Department',
        'Company Name',
        'Location',
        'Date of Joining',
        'Remark',
        'Employee Image',
        'Status',
        'Created At',
        'Updated At'
    ]);

    if (!empty($employees)) {
        foreach ($employees as $emp) {
            fputcsv($output, [
                $emp->id ?? '',
                $emp->employee_code ?? '',
                $emp->salutation ?? '',
                $emp->full_name ?? '',
                $emp->gender ?? '',
                $emp->date_of_birth ?? '',
                $emp->age ?? '',
                $emp->marital_status ?? '',
                $emp->anniversary_date ?? '',
                $emp->email ?? '',
                $emp->phone ?? '',
                $emp->designation ?? '',
                $emp->department ?? '',
                $emp->company_name ?? '',
                $emp->location_name ?? '',
                $emp->date_of_joining ?? '',
                $emp->remark ?? '',
                $emp->employee_image ?? '',
                (isset($emp->is_active) && $emp->is_active) ? 'Active' : 'Inactive',
                $emp->created_at ?? '',
                $emp->updated_at ?? ''
            ]);
        }
    }

    fclose($output);
    exit;
}


public function import_csv()
{
    if (empty($_FILES['csv_file']['name'])) {
        $this->session->set_flashdata('error', 'Please upload CSV file');
        return redirect('admin/employee');
    }

    $file = fopen($_FILES['csv_file']['tmp_name'], "r");

    if (!$file) {
        $this->session->set_flashdata('error', 'Unable to read file');
        return redirect('admin/employee');
    }

    fgetcsv($file);

    $inserted = 0;
    $skipped  = 0;

    while (($row = fgetcsv($file)) !== FALSE) {

        $full_name = trim($row[2] ?? '');
        $email     = trim($row[8] ?? '');
        $phone     = trim($row[9] ?? '');
        $emp_code  = trim($row[0] ?? '');

        if (empty($full_name) || empty($email) || empty($phone)) {
            $skipped++;
            continue;
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $skipped++;
            continue;
        }

        $emailExists = $this->db
            ->where('email', $email)
            ->get('employees')
            ->row();

        if ($emailExists) {
            $skipped++;
            continue;
        }

        if (!empty($emp_code)) {
            $codeExists = $this->db
                ->where('employee_code', $emp_code)
                ->get('employees')
                ->row();

            if ($codeExists) {
                $skipped++;
                continue;
            }
        }

        $data = [
            'employee_code'    => $emp_code,
            'salutation'       => $row[1] ?? '',
            'full_name'        => $full_name,
            'gender'           => $row[3] ?? NULL,
            'date_of_birth'    => !empty($row[4]) ? $row[4] : NULL,
            'age'              => $row[5] ?? NULL,
            'marital_status'   => $row[6] ?? NULL,
            'anniversary_date' => !empty($row[7]) ? $row[7] : NULL,
            'email'            => $email,
            'phone'            => $phone,
            'designation'      => $row[10] ?? '',
            'department'       => $row[11] ?? '',
            'company_name'     => $row[12] ?? '',
            'location_name'    => $row[13] ?? '',
            'date_of_joining'  => !empty($row[14]) ? $row[14] : NULL,
            'remark'           => $row[15] ?? '',
            'is_active'        => 1,
            'created_at'       => date('Y-m-d H:i:s'),
            'updated_at'       => date('Y-m-d H:i:s')
        ];

        $this->Manageemployee_model->insert($data);
        $inserted++;
    }

    fclose($file);

    $this->session->set_flashdata(
        'success',
        "CSV Import Completed: $inserted added, $skipped skipped"
    );

    redirect('admin/employee');
}


public function download_sample_csv()
{
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename="employee_sample.csv";');

    $output = fopen("php://output", "w");

    fputcsv($output, [
        'employee_code',
        'salutation',
        'full_name',
        'gender',
        'date_of_birth',
        'age',
        'marital_status',
        'anniversary_date',
        'email',
        'phone',
        'designation',
        'department',
        'company_name',
        'location_name',
        'date_of_joining',
        'remark'
    ]);

    fputcsv($output, [
        'EMP001',
        'Mr',
        'Rahul Sharma',
        'Male',
        '1995-06-15',
        '29',
        'Single',
        '',
        'rahul@example.com',
        '9876543210',
        'Software Engineer',
        'IT',
        'ABC Pvt Ltd',
        'Delhi',
        '2023-01-01',
        'Good Performer'
    ]);

    fclose($output);
    exit;
}

}