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
        $this->load->helper(['url','form','common']);
    }

    private function section_handler($section)
    {
        $data['section'] = $section;
        $data['items']   = $this->Manageleadershipdesk_model->get_all($section);
        $data['title']   = ucfirst($section).' - Leadership Desk';
        $data['section_url'] = $this->get_section_url($section); 

        $this->load->view('admin/layouts/header',$data);
        $this->load->view('admin/manageLeadershipDesk/list',$data);
        $this->load->view('admin/layouts/footer');
    }

    private function create_by_section($section)
    {
        $this->form_validation->set_rules('title','Title','required');
        $this->form_validation->set_rules('publish_date','Publish Date','required');

        if ($this->form_validation->run() === FALSE) {

            $data['section'] = $section;
            $data['section_url'] = $this->get_section_url($section);

            $this->load->view('admin/layouts/header',$data);
            $this->load->view('admin/manageLeadershipDesk/add',$data);
            $this->load->view('admin/layouts/footer');
            return;
        }

        $post = $this->input->post(NULL, TRUE);
        $pdf  = upload_file('pdf_file','uploads/leadershipdesk/','pdf',5120);

        $payload = [
            'section'      => $section,
            'title'        => $post['title'],
            'publish_date' => $post['publish_date'],
            'expiry_date'  => $post['expiry_date'],
            'description'  => $post['description'],
            'content_type' => $post['content_type'],
            'pdf_file'     => $pdf ? basename($pdf) : null,
            'status'       => $post['status'],
            'created_at'   => date('Y-m-d H:i:s')
        ];

        $this->Manageleadershipdesk_model->insert($payload);
        $this->session->set_flashdata('success','Content added successfully.');
        return redirect($this->get_section_url($section));
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
            $data['section'] = $item->section;
            $data['section_url'] = $this->get_section_url($item->section); 
            $this->load->view('admin/layouts/header',$data);
            $this->load->view('admin/manageLeadershipDesk/edit',$data);
            $this->load->view('admin/layouts/footer');
            return;
        }

        $post = $this->input->post(NULL, TRUE);
        $pdf  = _upload_file('pdf_file','uploads/leadershipdesk/',$item->pdf_file,'pdf');

        $payload = [
            'title'        => $post['title'],
            'publish_date' => $post['publish_date'],
            'expiry_date'  => $post['expiry_date'],
            'description'  => $post['description'],
            'content_type' => $post['content_type'],
            'pdf_file'     => $pdf,
            'status'       => $post['status'],
            'updated_at'   => date('Y-m-d H:i:s')
        ];

        $this->Manageleadershipdesk_model->update($id,$payload);
        $this->session->set_flashdata('success','Content updated successfully.');
        return redirect($this->get_section_url($item->section));
    }

    public function delete($id){
        $item = $this->Manageleadershipdesk_model->get_by_id($id);
        if(!$item){
            show_404();
        }
        $this->Manageleadershipdesk_model->delete($id);
        $this->session->set_flashdata('success','Record deleted.');
        return redirect($this->get_section_url($item->section));
    }


    public function toggle($id) {
        $item = $this->Manageleadershipdesk_model->get_by_id($id);
        if(!$item){
            show_404();
        }
        $status = ($item->status == 1) ? 0 : 1;
        $this->Manageleadershipdesk_model->update($id,['status'=>$status]);
        return redirect($this->get_section_url($item->section));
    }

    public function corporate()
    {
        return $this->section_handler('corporate');
    }

    public function notice()
    {
        return $this->section_handler('notice');
    }

    public function joinee()
    {
        return $this->section_handler('joinee');
    }


    public function create_corporate()
    {
        return $this->create_by_section('corporate');
    }

    public function create_notice()
    {
        return $this->create_by_section('notice');
    }

    public function create_joinee()
    {
        return $this->create_by_section('joinee');
    }


    private function get_section_url($section)
    {
        $map = [
            'corporate' => 'admin/corporate-communication',
            'notice'    => 'admin/notice-circulars',
            'joinee'    => 'admin/new-joinee',
        ];

        return $map[$section] ?? 'admin/dashboard';
    }
}