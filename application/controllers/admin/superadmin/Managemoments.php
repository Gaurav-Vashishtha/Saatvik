<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @property CI_Input $input
 * @property CI_Session $session
 * @property CI_Form_validation $form_validation
 * @property Managemoments_model $Managemoments_model
 * @property upload $upload
 */

class Managemoments extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        $this->load->model('admin/Managemoments_model');
        $this->load->library(['session','form_validation']);
        $this->load->helper(['url','form', 'common']);


        if (!$this->session->userdata('admin_logged_in')) {
            redirect('admin');
        }
    }

    public function index()
    {
        $data['title'] = 'Moments';

        $data['breadcrumb'] = [
            ['name'=>'Dashboard','url'=>site_url('admin/dashboard')],
            ['name'=>'Moments']
        ];

        $data['moments'] = $this->Managemoments_model->get_all();

        $this->load->view('admin/layouts/header',$data);
        $this->load->view('admin/manageMoments/list',$data);
        $this->load->view('admin/layouts/footer');
    }

    public function create()
    {
        $this->form_validation->set_rules('title','Title','required');

        if ($this->form_validation->run() === FALSE) {

            $data['title'] = 'Add Moment';

            $data['breadcrumb'] = [
                ['name'=>'Dashboard','url'=>site_url('admin/dashboard')],
                ['name'=>'Moments','url'=>site_url('admin/manage-moments')],
                ['name'=>'Add Moment']
            ];

            $this->load->view('admin/layouts/header',$data);
            $this->load->view('admin/manageMoments/add',$data);
            $this->load->view('admin/layouts/footer');
            return;
        }

        $post = $this->input->post(NULL, TRUE);

        $uploaded_image = _upload_file('image','./uploads/moments/');

        $payload = [

            'title' => $post['title'],
            'description' => $post['description'],
            'image' => $uploaded_image,
            'is_active' => $post['status'],
            'created_at' => date('Y-m-d H:i:s')

        ];

        $this->Managemoments_model->insert($payload);

        $this->session->set_flashdata('success','Moment added successfully.');

        redirect('admin/manage-moments');
    }


    public function edit($id = null)
    {
        if(!$id) show_404();

        $moment = $this->Managemoments_model->get_by_id($id);

        if(!$moment) show_404();

        $this->form_validation->set_rules('title','Title','required');

        if ($this->form_validation->run() === FALSE) {

            $data['title'] = 'Edit Moment';
            $data['moment'] = $moment;

            $data['breadcrumb'] = [
                ['name'=>'Dashboard','url'=>site_url('admin/dashboard')],
                ['name'=>'Moments','url'=>site_url('admin/manage-moments')],
                ['name'=>'Edit Moment']
            ];

            $this->load->view('admin/layouts/header',$data);
            $this->load->view('admin/manageMoments/edit',$data);
            $this->load->view('admin/layouts/footer');
            return;
        }

        $post = $this->input->post(NULL, TRUE);

        $uploaded_image = _upload_file('image','./uploads/moments/',$moment->image);

        $payload = [

            'title' => $post['title'],
            'description' => $post['description'],
            'image' => $uploaded_image ?? $moment->image,
            'is_active' => $post['status'],
            'updated_at' => date('Y-m-d H:i:s')

        ];

        $this->Managemoments_model->update($id,$payload);

        $this->session->set_flashdata('success','Moment updated successfully.');

        redirect('admin/manage-moments');
    }


    public function delete($id)
    {
        $this->Managemoments_model->delete($id);

        $this->session->set_flashdata('success','Moment deleted.');

        redirect('admin/manage-moments');
    }


    public function toggle($id)
    {
        $this->Managemoments_model->toggle($id);

        $this->session->set_flashdata('success','Status changed.');

        redirect('admin/manage-moments');
    }

}