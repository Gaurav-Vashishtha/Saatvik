<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once(APPPATH.'core/MY_Admin_Controller.php');
/**
 * @property CI_Input $input
 * @property CI_Session $session
 * @property CI_Form_validation $form_validation
 * @property Managedepartmentalinfo_model $Managedepartmentalinfo_model
 * @property upload $upload
 */

class Managedepartmentalinfo extends MY_Admin_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin/Managedepartmentalinfo_model');
    }


    public function index()
        {
            $section = $this->input->get('section');

            if(empty($section)){
                $section = 'sops';   
            }

            $data['section'] = $section;

            $data['items'] = $this->Managedepartmentalinfo_model->get_all($section);

            $data['title'] = 'Departmental Information';

            $data['breadcrumb'] = [
                ['name'=>'Dashboard','url'=>site_url('admin/dashboard')],
                ['name'=>'Departmental Information']
            ];

            $this->load->view('admin/layouts/header',$data);
            $this->load->view('admin/manageDepartmentalInfo/list',$data);
            $this->load->view('admin/layouts/footer');
        }



    public function create()
    {

        $this->form_validation->set_rules('section','Section','required');
        $this->form_validation->set_rules('title','Title','required');


        if ($this->form_validation->run() === FALSE) {

            $data['title'] = 'Add Departmental Information Content';

            $data['breadcrumb'] = [
                ['name'=>'Dashboard','url'=>site_url('admin/dashboard')],
                ['name'=>'Departmental Information','url'=>site_url('admin/manage-departmental-information')],
                ['name'=>'Add']
            ];

            $this->load->view('admin/layouts/header',$data);
            $this->load->view('admin/manageDepartmentalInfo/add',$data);
            $this->load->view('admin/layouts/footer');
            return;
        }


        $post = $this->input->post(NULL, TRUE);

        $payload = [

            'section'      => $post['section'],
            'category'       => $post['category'],
            'title'        => $post['title'],
            'description'  => $post['description'],
            'document_link'  => $post['document_link'],
            'department'     => $post['department'],
            'version'        => $post['version'],
            'effective_date' => !empty($post['effective_date']) ? $post['effective_date'] : NULL,
            'owner'          => $post['owner'],
            'status'       => $post['status'],
            'created_at'   => date('Y-m-d H:i:s')

        ];

        $this->Managedepartmentalinfo_model->insert($payload);

        $this->session->set_flashdata('success','Content added successfully.');

        redirect('admin/manage-departmental-information?section='.$post['section']);
    }



    public function edit($id)
    {

        $item = $this->Managedepartmentalinfo_model->get_by_id($id);

        if(!$item){
            show_404();
        }


        $this->form_validation->set_rules('title','Title','required');


        if ($this->form_validation->run() === FALSE) {

            $data['item'] = $item;

            $data['title'] = 'Edit Departmental Information Content';

            $data['breadcrumb'] = [
                ['name'=>'Dashboard','url'=>site_url('admin/dashboard')],
                ['name'=>'Departmental Information','url'=>site_url('admin/manage-departmental-information?section='.$item->section)],
                ['name'=>'Edit']
            ];

            $this->load->view('admin/layouts/header',$data);
            $this->load->view('admin/manageDepartmentalInfo/edit',$data);
            $this->load->view('admin/layouts/footer');
            return;
        }


        $post = $this->input->post(NULL, TRUE);

        $payload = [

            'title'        => $post['title'],
            'category'       => $post['category'],
            'description'  => $post['description'],
            'document_link'  => $post['document_link'],
            'department'     => $post['department'],
            'version'        => $post['version'],
            'effective_date' => !empty($post['effective_date']) ? $post['effective_date'] : NULL,
            'owner'          => $post['owner'],
            'status'       => $post['status'],
            'updated_at'   => date('Y-m-d H:i:s')

        ];

        $this->Managedepartmentalinfo_model->update($id,$payload);

        $this->session->set_flashdata('success','Content updated successfully.');

        redirect('admin/manage-departmental-information?section='.$item->section);

    }



    public function delete($id)
    {

        $item = $this->Managedepartmentalinfo_model->get_by_id($id);

        if(!$item){
            show_404();
        }

        $this->Managedepartmentalinfo_model->delete($id);

        $this->session->set_flashdata('success','Record deleted.');

        redirect('admin/manage-departmental-information?section='.$item->section);

    }



    public function toggle($id)
    {

        $item = $this->Managedepartmentalinfo_model->get_by_id($id);

        if(!$item){
            show_404();
        }

        $status = ($item->status == 1) ? 0 : 1;

        $this->Managedepartmentalinfo_model->update($id,['status'=>$status]);

        redirect('admin/manage-departmental-information?section='.$item->section);

    }

}