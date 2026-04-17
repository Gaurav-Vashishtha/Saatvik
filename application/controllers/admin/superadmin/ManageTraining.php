<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once(APPPATH.'core/MY_Admin_Controller.php');

/**
 * @property CI_Input $input
 * @property CI_Session $session
 * @property CI_Form_validation $form_validation
 * @property ManageTraining_model $ManageTraining_model
 * @property upload $upload
 */

class ManageTraining extends MY_Admin_Controller {

    public function __construct()
    {
        parent::__construct();

        $this->load->model('admin/ManageTraining_model');
        $this->load->library(['session','form_validation']);
        $this->load->helper(['url','form','common']);

        if (!$this->session->userdata('admin_logged_in')) {
            redirect('admin');
        }
    }

    public function index()
    {
        $data['title'] = 'Training Calendar';

        $data['breadcrumb'] = [
            ['name'=>'Dashboard','url'=>site_url('admin/dashboard')],
            ['name'=>'Training Calendar']
        ];

        $data['trainings'] = $this->ManageTraining_model->get_all();

        $this->load->view('admin/layouts/header',$data);
        $this->load->view('admin/manageTraining/list',$data);
        $this->load->view('admin/layouts/footer');
    }

    public function create()
    {
        $this->form_validation->set_rules('title','Title','required');
        $this->form_validation->set_rules('training_date','Date','required');

        if ($this->form_validation->run() === FALSE) {

            $data['title'] = 'Add Training';

            $data['breadcrumb'] = [
                ['name'=>'Dashboard','url'=>site_url('admin/dashboard')],
                ['name'=>'Training Calendar','url'=>site_url('admin/manage-training')],
                ['name'=>'Add Training']
            ];

            $this->load->view('admin/layouts/header',$data);
            $this->load->view('admin/manageTraining/add',$data);
            $this->load->view('admin/layouts/footer');
            return;
        }

        $post = $this->input->post(NULL, TRUE);

        $uploaded_image = _upload_file('image','./uploads/training/');

        $payload = [
            'title' => $post['title'],
            'description' => $post['description'],
            'training_date' => $post['training_date'],
            'image' => $uploaded_image,
            'is_active' => $post['status'],
            'created_at' => date('Y-m-d H:i:s')
        ];

        $this->ManageTraining_model->insert($payload);

        $this->session->set_flashdata('success','Training added successfully.');
        redirect('admin/manage-training');
    }

    public function edit($id = null)
    {
        if(!$id) show_404();

        $training = $this->ManageTraining_model->get_by_id($id);

        if(!$training) show_404();

        $this->form_validation->set_rules('title','Title','required');
        $this->form_validation->set_rules('training_date','Date','required');

        if ($this->form_validation->run() === FALSE) {

            $data['title'] = 'Edit Training';
            $data['training'] = $training;

            $data['breadcrumb'] = [
                ['name'=>'Dashboard','url'=>site_url('admin/dashboard')],
                ['name'=>'Training Calendar','url'=>site_url('admin/manage-training')],
                ['name'=>'Edit Training']
            ];

            $this->load->view('admin/layouts/header',$data);
            $this->load->view('admin/manageTraining/edit',$data);
            $this->load->view('admin/layouts/footer');
            return;
        }

        $post = $this->input->post(NULL, TRUE);

        $uploaded_image = _upload_file('image','./uploads/training/',$training->image);

        $payload = [
            'title' => $post['title'],
            'description' => $post['description'],
            'training_date' => $post['training_date'],
            'image' => $uploaded_image ?? $training->image,
            'is_active' => $post['status'],
            'updated_at' => date('Y-m-d H:i:s')
        ];

        $this->ManageTraining_model->update($id,$payload);

        $this->session->set_flashdata('success','Training updated successfully.');
        redirect('admin/manage-training');
    }

    public function delete($id)
    {
        $this->ManageTraining_model->delete($id);

        $this->session->set_flashdata('success','Training deleted.');
        redirect('admin/manage-training');
    }

    public function toggle($id)
    {
        $this->ManageTraining_model->toggle($id);

        $this->session->set_flashdata('success','Status changed.');
        redirect('admin/manage-training');
    }
}