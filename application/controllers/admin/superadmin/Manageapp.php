<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once(APPPATH.'core/MY_Admin_Controller.php');

/**
 * @property CI_Input $input
 * @property CI_Session $session
 * @property CI_Form_validation $form_validation
 * @property Manageapp_model $Manageapp_model
 * @property upload $upload
 */

class Manageapp extends MY_Admin_Controller {

    public function __construct()
    {
        parent::__construct();

        $this->load->model('admin/Manageapp_model');
        $this->load->library(['session','form_validation']);
        $this->load->helper(['url','form','common']);

        if (!$this->session->userdata('admin_logged_in')) {
            redirect('admin');
        }
    }

    public function index()
    {
        $data['title'] = "Manage Apps";

        $data['breadcrumb'] = [
            ['name'=>'Dashboard','url'=>site_url('admin/dashboard')],
            ['name'=>'Manage Apps']
        ];

        $data['apps'] = $this->Manageapp_model->get_all();

        $this->load->view('admin/layouts/header',$data);
        $this->load->view('admin/manageApps/list',$data);
        $this->load->view('admin/layouts/footer');
    }

    public function create()
    {
        $this->form_validation->set_rules('title','Title','required');
        $this->form_validation->set_rules('app_name','App Name','required');

        if ($this->form_validation->run() == FALSE)
        {

            $data['title']="Add App";

            $data['breadcrumb'] = [
                ['name'=>'Dashboard','url'=>site_url('admin/dashboard')],
                ['name'=>'Manage Apps','url'=>site_url('admin/manage-apps')],
                ['name'=>'Add App']
            ];

            $this->load->view('admin/layouts/header',$data);
            $this->load->view('admin/manageApps/add',$data);
            $this->load->view('admin/layouts/footer');
            return;
        }

        $post = $this->input->post(NULL, TRUE);

        $image = _upload_file('image','./uploads/apps/');

        $payload = [

            'title'=>$post['title'],
            'app_name'=>$post['app_name'],
            'document_link'=>$post['document_link'],
            'image'=>$image,
            'status' => (int) $post['status'],
            'created_at'=>date('Y-m-d H:i:s')

        ];

        $this->Manageapp_model->insert($payload);

        $this->session->set_flashdata('success','App added successfully');

        redirect('admin/manage-apps');
    }

    public function edit($id=null)
    {

        if(!$id) show_404();

        $app = $this->Manageapp_model->get($id);

        if(!$app) show_404();

        $this->form_validation->set_rules('title','Title','required');
        $this->form_validation->set_rules('app_name','App Name','required');

        if ($this->form_validation->run() == FALSE)
        {

            $data['title']="Edit App";
            $data['app']=$app;

            $data['breadcrumb'] = [
                ['name'=>'Dashboard','url'=>site_url('admin/dashboard')],
                ['name'=>'Manage Apps','url'=>site_url('admin/manage-apps')],
                ['name'=>'Edit App']
            ];

            $this->load->view('admin/layouts/header',$data);
            $this->load->view('admin/manageApps/edit',$data);
            $this->load->view('admin/layouts/footer');
            return;
        }

        $post = $this->input->post(NULL, TRUE);

        $image = _upload_file('image','./uploads/apps/',$app->image);

        $payload=[

            'title'=>$post['title'],
            'app_name'=>$post['app_name'],
            'document_link'=>$post['document_link'],
            'image'=>$image ?? $app->image,
            'status' => (int) $post['status'],
            'updated_at'=>date('Y-m-d H:i:s')

        ];

        $this->Manageapp_model->update($id,$payload);

        $this->session->set_flashdata('success','App updated successfully');

        redirect('admin/manage-apps');
    }

    public function delete($id=null)
    {
        if(!$id) show_404();

        $this->Manageapp_model->delete($id);

        $this->session->set_flashdata('success','App deleted');

        redirect('admin/manage-apps');
    }

    public function toggle($id=null)
    {
        if(!$id) show_404();

        $this->Manageapp_model->toggle($id);

        $this->session->set_flashdata('success','Status updated');

        redirect('admin/manage-apps');
    }

}