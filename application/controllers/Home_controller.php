<?php

use PSpell\Config;

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @property CI_Input $input
 * @property CI_Session $session
 * @property CI_Form_validation $form_validation
 * @property Home_model $Home_model
 * @property upload $upload
 */

class Home_controller extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->model('Home_model');
        $this->load->library(['session','form_validation']);
        $this->load->helper(['url','form','common','text']);

        if (!$this->session->userdata('admin_logged_in')) {
            redirect('admin');
        }
    }


    // public function index()
    // {
    //     $this->load->view('frontend/include/header');
    //     $this->load->view('frontend/index');
    //     $this->load->view('frontend/include/footer');
    // }
public function index()
{

    $data['birthdays'] = $this->Home_model->get_this_month_birthday();
    $data['moments']   = $this->Home_model->get_moments();
    $data['policies']  = $this->Home_model->get_policies();
    $data['news']      = $this->Home_model->get_newevents();
    $data['apps']      = $this->Home_model->get_apps();
    $data['employees'] = $this->Home_model->get_employees();
    $data['learning']  = $this->Home_model->get_learning_material();
  // Fetch quiz data
        $quiz_raw = $this->Home_model->get_quiz();

        $quiz = [];

        if (!empty($quiz_raw)) {
            foreach ($quiz_raw as $item) {
                $options = [
                    'a' => $item['option_a'] ?? '',
                    'b' => $item['option_b'] ?? '',
                    'c' => $item['option_c'] ?? '',
                    'd' => $item['option_d'] ?? '',
                ];

                $quiz[] = [
                    'question' => $item['question'],
                    'options' => $options,
                    'correct_option' => $item['correct_option'] ?? '', // e.g., 'a', 'b', etc.
                ];
            }
        }

        $data['quiz'] = $quiz;

    // Leader profile
    $leaders = $this->Home_model->get_leader();
    $data['leader_profile'] = !empty($leaders) ? $leaders[0] : [];

    // Leadership desk posts
    $desk = $this->Home_model->get_leadership_desk();

        $data['corp'] = [];
        $data['notice'] = [];
        $data['welcome'] = [];

        foreach ($desk as $row)
        {
            if(!isset($row['section'])) continue;

            if($row['section'] == 'corporate')
            {
                $data['corp'][] = $row;
            }
            elseif($row['section'] == 'notice')
            {
                $data['notice'][] = $row;
            }
            elseif($row['section'] == 'joinee')
            {
                $data['welcome'][] = $row;
            }
        }


    // ✅ Departmental Information (NEW PART)

    $dept_items = $this->Home_model->get_departmental_information();

    $data['sops'] = [];
    $data['technical_docs'] = [];

    foreach ($dept_items as $item)
    {
        if(!isset($item['section'])) continue;

        if($item['section'] == 'sops')
        {
            $data['sops'][] = $item;
        }
        elseif($item['section'] == 'technical_document')
        {
            $data['technical_docs'][] = $item;
        }
    }


    $this->load->view('frontend/include/header',$data);
    $this->load->view('frontend/index',$data);
    $this->load->view('frontend/include/footer',$data);
}


}
