<?php

// use PSpell\Config;

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @property CI_Input $input
 * @property CI_Session $session
 * @property CI_Form_validation $form_validation
 * @property Managelearningmaterial_model $Managelearningmaterial_model
 * @property upload $upload
 */

class Managelearningmaterial extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->model('admin/Managelearningmaterial_model');
        $this->load->library(['session','form_validation']);
        $this->load->helper(['url','form','common']);

        if (!$this->session->userdata('admin_logged_in')) {
            redirect('admin');
        }
    }

    public function index()
    {
        $data['title'] = 'Learning Material';
        $data['breadcrumb'] = [
            ['name'=>'Dashboard','url'=>site_url('admin/dashboard')],
            ['name'=>'Learning Material']
        ];

        $data['laerning_material'] = $this->Managelearningmaterial_model->get_all();

        $this->load->view('admin/layouts/header',$data);
        $this->load->view('admin/manageLearningMaterial/list',$data);
        $this->load->view('admin/layouts/footer');
    }



    public function create()
    {
    $data['title'] = 'Add Learning Material';
    $data['breadcrumb'] = [
        ['name'=>'Dashboard','url'=>site_url('admin/dashboard')],
        ['name'=>'Learning Material','url'=>site_url('admin/manage-learning-material')],
        ['name'=>'Add']
    ];

    if ($this->input->method() === 'post') {

        $post = $this->input->post(NULL, TRUE);

        $payload = [
            'question'   => $post['question'],
            'answer'     => $post['answer'],
            'is_active'  => $post['is_active'],
            'created_at' => date('Y-m-d H:i:s'),
        ];

        $this->Managelearningmaterial_model->insert($payload);

        $this->session->set_flashdata('success','Learning Material added successfully');
        redirect('admin/manage-learning-material');
    }

    $this->load->view('admin/layouts/header',$data);
    $this->load->view('admin/manageLearningMaterial/add',$data);
    $this->load->view('admin/layouts/footer');
    }


    public function edit($id = null)
    {
        if (!$id) show_404();

        $learning_material = $this->Managelearningmaterial_model->get_by_id($id);
        if (!$learning_material) show_404();

        $data['title'] = 'Edit Learning Material';
        $data['learning_material'] = $learning_material;

        $data['breadcrumb'] = [
            ['name'=>'Dashboard','url'=>site_url('admin/dashboard')],
            ['name'=>'Learning Material','url'=>site_url('admin/manage-learning-material')],
            ['name'=>'Edit']
        ];

        if ($this->input->method() === 'post') {

            $post = $this->input->post(NULL, TRUE);

            $payload = [
                'question'   => $post['question'],
                'answer'     => $post['answer'],
                'is_active'  => $post['is_active'],
                'updated_at' => date('Y-m-d H:i:s'),
            ];

            $this->Managelearningmaterial_model->update($id, $payload);

            $this->session->set_flashdata('success','Learning Material updated successfully');
            redirect('admin/manage-learning-material');
        }

        $this->load->view('admin/layouts/header',$data);
        $this->load->view('admin/manageLearningMaterial/edit',$data);
        $this->load->view('admin/layouts/footer');
    }



    public function delete($id = null)
    {
        if (!$id) show_404();

        $this->Managelearningmaterial_model->delete($id);

        $this->session->set_flashdata('success', 'Learning Material deleted successfully.');
        redirect('admin/manage-learning-material');
    }


    public function toggle($id = null)
    {
        if (!$id) show_404();

        $this->Managelearningmaterial_model->toggle_status($id);

        $this->session->set_flashdata('success', 'Status changed.');
        redirect('admin/manage-learning-material');
    }

}