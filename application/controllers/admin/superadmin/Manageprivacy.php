<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once(APPPATH.'core/MY_Admin_Controller.php');
/**
 * @property CI_Input $input
 * @property CI_Session $session
 * @property CI_Form_validation $form_validation
 * @property Manageprivacy_model $Manageprivacy_model
 * @property upload $upload
 */

class Manageprivacy extends MY_Admin_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin/Manageprivacy_model');
        $this->load->helper('text');

          if (!$this->session->userdata('admin_logged_in')) {
            redirect('admin');
        }
    }

    public function index()
    {

    // echo "hii"; die;
        $data['title'] = 'Policy & Procedures';
        $data['breadcrumb'] = [
            ['name'=>'Dashboard','url'=>site_url('admin/dashboard')],
            ['name'=>'Policy & Procedures']
        ];

        $data['policies'] = $this->Manageprivacy_model->get_all();

        $this->load->view('admin/layouts/header',$data);
        $this->load->view('admin/managePolicyProcedures/list',$data);
        $this->load->view('admin/layouts/footer');
    }

    public function create()
    {
        if($this->input->post())
        {
            $data = [
                'title'=>$this->input->post('title'),
                'slug'=>url_title($this->input->post('title'),'dash',TRUE),
                'short_description'=>$this->input->post('short_description'),
                'description'=>$this->input->post('description'),
                'document_link'=>$this->input->post('document_link'),
                'is_active' => $this->input->post('is_active'),
            ];

            $this->Manageprivacy_model->insert($data);
            $this->session->set_flashdata('success','Policy added successfully');
            redirect('admin/policy-procedures');
        }

        $data['title'] = 'Add Policy';
        $data['breadcrumb'] = [
            ['name'=>'Dashboard','url'=>site_url('admin/dashboard')],
            ['name'=>'Policy & Procedures','url'=>site_url('admin/policy-procedures')],
            ['name'=>'Add Policy']
        ];

        $this->load->view('admin/layouts/header',$data);
        $this->load->view('admin/managePolicyProcedures/add',$data);
        $this->load->view('admin/layouts/footer');
    }

    public function edit($id)
    {
        if($this->input->post())
        {
            $data = [
                'title'=>$this->input->post('title'),
                'slug'=>url_title($this->input->post('title'),'dash',TRUE),
                'short_description'=>$this->input->post('short_description'),
                'description'=>$this->input->post('description'),
                'document_link'=>$this->input->post('document_link'),
                'is_active' => $this->input->post('is_active'),
                'updated_at'=>date('Y-m-d H:i:s')
            ];

            $this->Manageprivacy_model->update($id,$data);
            $this->session->set_flashdata('success','Policy updated successfully');
            redirect('admin/policy-procedures');
        }

        $data['policy'] = $this->Manageprivacy_model->get_by_id($id);
        $data['title'] = 'Edit Policy';
        $data['breadcrumb'] = [
            ['name'=>'Dashboard','url'=>site_url('admin/dashboard')],
            ['name'=>'Policy & Procedures','url'=>site_url('admin/policy-procedures')],
            ['name'=>'Edit Policy']
        ];

        $this->load->view('admin/layouts/header',$data);
        $this->load->view('admin/managePolicyProcedures/edit',$data);
        $this->load->view('admin/layouts/footer');
    }

    public function delete($id)
    {
        $this->Manageprivacy_model->delete($id);
        $this->session->set_flashdata('success','Policy deleted');
        redirect('admin/policy-procedures');
    }

    public function toggle($id)
    {
        $this->Manageprivacy_model->toggle($id);
        $this->session->set_flashdata('success', 'Status changed.');
        redirect('admin/policy-procedures');
    }
}

?>
