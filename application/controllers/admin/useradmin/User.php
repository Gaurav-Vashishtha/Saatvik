<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @property CI_Input $input
 * @property CI_Session $session
 * @property CI_Form_validation $form_validation
 * @property Admin_model $Admin_model
 * @property db $db
 */

class User extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('admin/Admin_model');
        $this->load->library(['session','form_validation']);
        $this->load->helper(['form','url']);
    }

    public function index() {
        if ($this->session->userdata('admin_logged_in')) {
            redirect('user/dashboard');
        }
        $this->load->view('user/login');
    }

    public function userLogged() {

        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('user/login');
            return;
        }

        $email    = strtolower(trim($this->input->post('email', TRUE)));
        $password = $this->input->post('password', TRUE); 

        $users = $this->Admin_model->get_by_email($email);

        if ($users && $users->role_id == 2 && password_verify($password, $users->password)) {

            $this->session->sess_regenerate(TRUE);

            $this->session->set_userdata([
                'admin_id'        => $users->id,
                'admin_email'     => $users->email,
                'admin_name'      => $users->name,
                'admin_logged_in' => TRUE,
                'role_id'         => $users->role_id
            ]);

            redirect('user/dashboard');

        } else {

            $this->session->set_flashdata('error', 'Invalid credentials or unauthorized access.');
            redirect('user');
        }
    }

    public function userdashboard() {
        if (!$this->session->userdata('admin_logged_in')) {
            redirect('user');
        }

        $data['title'] = 'Dashboard';

        $this->load->view('user/layouts/header', $data);
        $this->load->view('user/dashboard', $data);
        $this->load->view('user/layouts/footer');
    }

    public function userLogout() {
        $this->session->sess_destroy();
        redirect('user');
    }

    public function userChangePassword() {

        if (!$this->session->userdata('admin_logged_in')) {
            redirect('user');
        }

        $this->form_validation->set_rules('current_password', 'Current Password', 'required');
        $this->form_validation->set_rules('new_password', 'New Password', 'required|min_length[6]');
        $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[new_password]');

        if ($this->form_validation->run() == FALSE) {  
            $this->load->view('user/change_password');  
        } else {

            $current_password = $this->input->post('current_password');
            $new_password     = $this->input->post('new_password');
            $users_id         = $this->session->userdata('admin_id');
            
            $users = $this->Admin_model->get_by_id($users_id);

            if ($users && password_verify($current_password, $users->password)) {

                $hashed_new_password = password_hash($new_password, PASSWORD_BCRYPT);
                $this->Admin_model->update_password($users_id, $hashed_new_password);

                $this->session->set_flashdata('success', 'Password updated successfully.');
                redirect('user/dashboard');

            } else {

                $this->session->set_flashdata('error', 'Current password is incorrect.');
                redirect('user/changePassword');
            }
        }
    }
}
?>