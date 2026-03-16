<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @property CI_Input $input
 * @property CI_Session $session
 * @property CI_Form_validation $form_validation
 * @property Manageleader_model $Manageleader_model
 */

class Manageleader extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        $this->load->model('admin/Manageleader_model');
        $this->load->library(['session','form_validation']);
        $this->load->helper(['url','form','common']);

        if (!$this->session->userdata('admin_logged_in')) {
            redirect('admin');
        }
    }

    public function index()
    {
        $data['breadcrumb'] = [
            ['name' => 'Dashboard', 'url' => site_url('admin/dashboard')],
            ['name' => 'Manage Leadership']
        ];

        $data['leaders'] = $this->Manageleader_model->get_all();

        $this->load->view('admin/layouts/header',$data);
        $this->load->view('admin/manageLeadership/list',$data);
        $this->load->view('admin/layouts/footer');
    }


    public function create()
    {
        $this->form_validation->set_rules('name','Name','required');
        $this->form_validation->set_rules('designation','Designation','required');

        if ($this->form_validation->run() === FALSE) {

            $data['title'] = 'Add Leadership';

            $data['breadcrumb'] = [
                ['name' => 'Dashboard','url'=>site_url('admin/dashboard')],
                ['name' => 'Manage Leadership','url'=>site_url('admin/manage-leadership')],
                ['name' => 'Add Leadership']
            ];

            $this->load->view('admin/layouts/header',$data);
            $this->load->view('admin/manageLeadership/add',$data);
            $this->load->view('admin/layouts/footer');
            return;
        }

        $post = $this->input->post(NULL,TRUE);

        $image = _upload_file('image','./uploads/leadership/');

        $payload = [

            'name' => $post['name'],
            'designation' => $post['designation'],
            'description' => $post['description'],
            'image' => $image,
            'status' => (int)$post['status'],
            'created_at' => date('Y-m-d H:i:s')

        ];

        $this->Manageleader_model->insert($payload);

        $this->session->set_flashdata('success','Leadership added successfully');

        redirect('admin/manage-leadership');
    }


    public function edit($id=null)
    {
        if(!$id) show_404();

        $leader = $this->Manageleader_model->get($id);
        if(!$leader) show_404();

        $this->form_validation->set_rules('name','Name','required');
        $this->form_validation->set_rules('designation','Designation','required');

        if ($this->form_validation->run() === FALSE) {

            $data['title'] = 'Edit Leadership';
            $data['leader'] = $leader;

            $data['breadcrumb'] = [
                ['name'=>'Dashboard','url'=>site_url('admin/dashboard')],
                ['name'=>'Manage Leadership','url'=>site_url('admin/manage-leadership')],
                ['name'=>'Edit Leadership']
            ];

            $this->load->view('admin/layouts/header',$data);
            $this->load->view('admin/manageLeadership/edit',$data);
            $this->load->view('admin/layouts/footer');
            return;
        }

        $post = $this->input->post(NULL,TRUE);

        $image = _upload_file('image','./uploads/leadership/',$leader->image);

        $payload = [

            'name' => $post['name'],
            'designation' => $post['designation'],
            'description' => $post['description'],
            'image' => $image ?? $leader->image,
            'status' => (int)$post['status'],
            'updated_at' => date('Y-m-d H:i:s')

        ];

        $this->Manageleader_model->update($id,$payload);

        $this->session->set_flashdata('success','Leadership updated successfully');

        redirect('admin/manage-leadership');
    }


    public function delete($id=null)
    {
        if(!$id) show_404();

        $this->Manageleader_model->delete($id);

        $this->session->set_flashdata('success','Leadership deleted');

        redirect('admin/manage-leadership');
    }


    public function toggle($id=null)
    {
        if(!$id) show_404();

        $this->Manageleader_model->toggle($id);

        $this->session->set_flashdata('success','Status changed');

        redirect('admin/manage-leadership');
    }

}