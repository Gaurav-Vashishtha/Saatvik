<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once(APPPATH.'core/MY_Admin_Controller.php');
/**
 * @property CI_Input $input
 * @property CI_Session $session
 * @property CI_Form_validation $form_validation
 * @property Managenewsevents_model $Managenewsevents_model
 */

class manageNewsEvents extends MY_Admin_Controller {

    public function __construct()
    {
        parent::__construct();

        $this->load->model('admin/Managenewsevents_model');
        $this->load->library(['session','form_validation']);
        $this->load->helper(['url','form','common']);

        if (!$this->session->userdata('admin_logged_in')) {
            redirect('admin');
        }
    }

    public function index()
    {
        $data['title'] = 'Manage News & Events';

        $data['breadcrumb'] = [
            ['name'=>'Dashboard','url'=>site_url('admin/dashboard')],
            ['name'=>'Manage News & Events']
        ];

        $data['news'] = $this->Managenewsevents_model->get_all();

        $this->load->view('admin/layouts/header',$data);
        $this->load->view('admin/manageNewsEvents/list',$data);
        $this->load->view('admin/layouts/footer');
    }

    public function create()
    {
        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('description', 'Description', 'required');
        $this->form_validation->set_rules('event_date', 'Date', 'required');

        if ($this->form_validation->run() === FALSE) {

            $data['title'] = 'Add News & Event';

            $data['breadcrumb'] = [
                ['name'=>'Dashboard','url'=>site_url('admin/dashboard')],
                ['name'=>'Manage News & Events','url'=>site_url('admin/manage-news-events')],
                ['name'=>'Add News & Event']
            ];

            $this->load->view('admin/layouts/header',$data);
            $this->load->view('admin/manageNewsEvents/add',$data);
            $this->load->view('admin/layouts/footer');
            return;
        }

        $post = $this->input->post(NULL, TRUE);

        $uploaded_image = _upload_file('image', './uploads/news/');

        $payload = [

            'title'        => $post['title'],
            'description'  => $post['description'],
            'event_date'    => $post['event_date'],
            'image'        => $uploaded_image,
            'is_active'    => isset($post['is_active']) ? 1 : 0,
            'created_at'   => date('Y-m-d H:i:s')

        ];

        // print_r($payload); die;

        $this->Managenewsevents_model->insert($payload);

        $this->session->set_flashdata('success','News/Event added successfully.');
        redirect('admin/manage-news-events');
    }


    public function edit($id = null)
    {
        if(!$id) show_404();

        $news = $this->Managenewsevents_model->get_by_id($id);

        if(!$news) show_404();

        $this->form_validation->set_rules('title', 'Title', 'required');

        if ($this->form_validation->run() === FALSE) {

            $data['title'] = 'Edit News & Event';
            $data['news'] = $news;

            $data['breadcrumb'] = [
                ['name'=>'Dashboard','url'=>site_url('admin/dashboard')],
                ['name'=>'Manage News & Events','url'=>site_url('admin/manage-news-events')],
                ['name'=>'Edit News & Event']
            ];

            $this->load->view('admin/layouts/header',$data);
            $this->load->view('admin/manageNewsEvents/edit',$data);
            $this->load->view('admin/layouts/footer');
            return;
        }

        $post = $this->input->post(NULL, TRUE);

        $uploaded_image = _upload_file('image', './uploads/news/', $news->image);

        $payload = [

            'title'        => $post['title'],
            'description'  => $post['description'],
            'event_date'    => $post['event_date'],
            'image'        => $uploaded_image ?? $news->image,
            'is_active'    => isset($post['is_active']) ? 1 : 0,
            'updated_at'   => date('Y-m-d H:i:s')

        ];

        $this->Managenewsevents_model->update($id,$payload);

        $this->session->set_flashdata('success','News/Event updated successfully.');
        redirect('admin/manage-news-events');
    }


    public function delete($id)
    {
        $this->Managenewsevents_model->delete($id);

        $this->session->set_flashdata('success','News/Event deleted.');
        redirect('admin/manage-news-events');
    }


    public function toggle($id)
    {
        $this->Managenewsevents_model->toggle($id);

        $this->session->set_flashdata('success','Status changed.');
        redirect('admin/manage-news-events');
    }

}