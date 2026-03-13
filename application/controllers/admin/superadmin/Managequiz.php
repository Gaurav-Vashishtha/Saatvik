<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @property CI_Input $input
 * @property CI_Session $session
 * @property CI_Form_validation $form_validation
 * @property Quiz_model $Quiz_model
 * @property upload $upload
 */


class Managequiz extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin/Quiz_model');
        $this->load->library(['session','form_validation']);
        $this->load->helper(['url','form', 'text']);
    }

    public function index()
    {
        $data['title'] = 'Manage Quiz';
        $data['breadcrumb'] = [
            ['name' => 'Dashboard', 'url' => site_url('admin/dashboard')],
            ['name' => 'Manage Quiz']
        ];

        $data['questions'] = $this->Quiz_model->getAll();
        $this->load->view('admin/layouts/header', $data);
        $this->load->view('admin/manageQuiz/list', $data);
        $this->load->view('admin/layouts/footer');
    }

    public function create()
    {
        $this->form_validation->set_rules('question', 'Question', 'required');
        $this->form_validation->set_rules('option_a', 'Option A', 'required');
        $this->form_validation->set_rules('option_b', 'Option B', 'required');
        $this->form_validation->set_rules('correct_option', 'Correct Option', 'required');

        if ($this->form_validation->run() === FALSE) {

           $data['breadcrumb'] = [
                ['name' => 'Dashboard', 'url' => site_url('admin/dashboard')],
                ['name' => 'Manage Quiz', 'url' => site_url('admin/manage-quiz')],
                ['name' => 'Add Quiz ']
                    ];

            $data['title'] = 'Add Quiz Question';
            $this->load->view('admin/layouts/header', $data);
            $this->load->view('admin/manageQuiz/add', $data);
            $this->load->view('admin/layouts/footer');
            return;
        }

        $post = $this->input->post(NULL, TRUE);

        $payload = [
            'question'       => $post['question'],
            'option_a'       => $post['option_a'],
            'option_b'       => $post['option_b'],
            'option_c'       => $post['option_c'],
            'option_d'       => $post['option_d'],
            'correct_option' => $post['correct_option'],
            'is_active'      => isset($post['status']) ? 1 : 0,
            'created_at'     => date('Y-m-d H:i:s'),
        ];

        $this->Quiz_model->insert($payload);

        $this->session->set_flashdata('success', 'Question added successfully');
        redirect('admin/manage-quiz');
    }

    public function edit($id)
    {
        $question = $this->Quiz_model->getById($id);
        if (!$question) show_404();

        $this->form_validation->set_rules('question', 'Question', 'required');

        if ($this->form_validation->run() === FALSE) {
            $data['title'] = 'Edit Quiz Question';
            $data['breadcrumb'] = [
                ['name' => 'Dashboard', 'url' => site_url('admin/dashboard')],
                ['name' => 'Manage Quiz', 'url' => site_url('admin/manage-quiz')],
                ['name' => 'Edit Quiz ']
                    ];

            $data['question'] = $question;

            $this->load->view('admin/layouts/header', $data);
            $this->load->view('admin/manageQuiz/edit', $data);
            $this->load->view('admin/layouts/footer');
            return;
        }

        $post = $this->input->post(NULL, TRUE);

        $payload = [
            'question'       => $post['question'],
            'option_a'       => $post['option_a'],
            'option_b'       => $post['option_b'],
            'option_c'       => $post['option_c'],
            'option_d'       => $post['option_d'],
            'correct_option' => $post['correct_option'],
            'is_active'      => isset($post['status']) ? 1 : 0,
            'updated_at'     => date('Y-m-d H:i:s'),
        ];

        $this->Quiz_model->update($id, $payload);

        $this->session->set_flashdata('success', 'Question updated successfully');
        redirect('admin/manage-quiz');
    }

    public function delete($id)
    {
        $this->Quiz_model->delete($id);
        $this->session->set_flashdata('success', 'Question deleted');
        redirect('admin/manage-quiz');
    }

        public function toggle($id = null)
    {
        if (!$id) show_404();

        $this->Quiz_model->toggle($id);

        $this->session->set_flashdata('success', 'Status changed.');
        redirect('admin/manage-quiz');
    }
}