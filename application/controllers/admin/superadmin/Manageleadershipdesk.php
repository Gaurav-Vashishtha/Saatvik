<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once(APPPATH.'core/MY_Admin_Controller.php');
/**
 * @property CI_Input $input
 * @property CI_Session $session
 * @property CI_Form_validation $form_validation
 * @property Manageleadershipdesk_model $Manageleadershipdesk_model
 * @property upload $upload
 */

class Manageleadershipdesk extends MY_Admin_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin/Manageleadershipdesk_model');
    }


    public function index()
        {
            $section = $this->input->get('section');

            if(empty($section)){
                $section = 'corporate';   
            }

            $data['section'] = $section;

            $data['items'] = $this->Manageleadershipdesk_model->get_all($section);

            $data['title'] = 'Leadership Desk';

            $data['breadcrumb'] = [
                ['name'=>'Dashboard','url'=>site_url('admin/dashboard')],
                ['name'=>'Leadership Desk']
            ];

            $this->load->view('admin/layouts/header',$data);
            $this->load->view('admin/manageLeadershipDesk/list',$data);
            $this->load->view('admin/layouts/footer');
        }



    public function create()
    {

        $this->form_validation->set_rules('section','Section','required');
        $this->form_validation->set_rules('title','Title','required');
        $this->form_validation->set_rules('publish_date','Publish Date','required');


        if ($this->form_validation->run() === FALSE) {

            $data['title'] = 'Add Leadership Desk Content';

            $data['breadcrumb'] = [
                ['name'=>'Dashboard','url'=>site_url('admin/dashboard')],
                ['name'=>'Leadership Desk','url'=>site_url('admin/manage-leadership-desk')],
                ['name'=>'Add']
            ];

            $this->load->view('admin/layouts/header',$data);
            $this->load->view('admin/manageLeadershipDesk/add',$data);
            $this->load->view('admin/layouts/footer');
            return;
        }


        $post = $this->input->post(NULL, TRUE);

        $payload = [

            'section'      => $post['section'],
            'title'        => $post['title'],
            'publish_date' => $post['publish_date'],
            'description'  => $post['description'],
            'document_link'  => $post['document_link'],
            'status'       => $post['status'],
            'created_at'   => date('Y-m-d H:i:s')

        ];

        $this->Manageleadershipdesk_model->insert($payload);

        $this->session->set_flashdata('success','Content added successfully.');

        redirect('admin/manage-leadership-desk?section='.$post['section']);
    }



    public function edit($id)
    {

        $item = $this->Manageleadershipdesk_model->get_by_id($id);

        if(!$item){
            show_404();
        }


        $this->form_validation->set_rules('title','Title','required');
        $this->form_validation->set_rules('publish_date','Publish Date','required');


        if ($this->form_validation->run() === FALSE) {

            $data['item'] = $item;

            $data['title'] = 'Edit Leadership Desk Content';

            $data['breadcrumb'] = [
                ['name'=>'Dashboard','url'=>site_url('admin/dashboard')],
                ['name'=>'Leadership Desk','url'=>site_url('admin/manage-leadership-desk?section='.$item->section)],
                ['name'=>'Edit']
            ];

            $this->load->view('admin/layouts/header',$data);
            $this->load->view('admin/manageLeadershipDesk/edit',$data);
            $this->load->view('admin/layouts/footer');
            return;
        }


        $post = $this->input->post(NULL, TRUE);

        $payload = [

            'title'        => $post['title'],
            'publish_date' => $post['publish_date'],
            'description'  => $post['description'],
            'document_link'  => $post['document_link'],
            'status'       => $post['status'],
            'updated_at'   => date('Y-m-d H:i:s')

        ];

        $this->Manageleadershipdesk_model->update($id,$payload);

        $this->session->set_flashdata('success','Content updated successfully.');

        redirect('admin/manage-leadership-desk?section='.$item->section);

    }



    public function delete($id)
    {

        $item = $this->Manageleadershipdesk_model->get_by_id($id);

        if(!$item){
            show_404();
        }

        $this->Manageleadershipdesk_model->delete($id);

        $this->session->set_flashdata('success','Record deleted.');

        redirect('admin/manage-leadership-desk?section='.$item->section);

    }



    public function toggle($id)
    {

        $item = $this->Manageleadershipdesk_model->get_by_id($id);

        if(!$item){
            show_404();
        }

        $status = ($item->status == 1) ? 0 : 1;

        $this->Manageleadershipdesk_model->update($id,['status'=>$status]);

        redirect('admin/manage-leadership-desk?section='.$item->section);

    }

}