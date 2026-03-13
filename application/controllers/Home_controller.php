<?php

use PSpell\Config;

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @property CI_Input $input
 * @property CI_Session $session
 * @property CI_Form_validation $form_validation
 * @property Manageemployee_model $Manageemployee_model
 * @property upload $upload
 */

class Home_controller extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->model('admin/Manageemployee_model');
        $this->load->library(['session','form_validation']);
        $this->load->helper(['url','form','common']);

        if (!$this->session->userdata('admin_logged_in')) {
            redirect('admin');
        }
    }


    public function index()
    {
        $this->load->view('frontend/include/header');
        $this->load->view('frontend/index');
        $this->load->view('frontend/include/footer');
    }
}