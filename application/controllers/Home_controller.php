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

    }


   public function index()
    {
    $type  = $this->input->get('type');
    $month = $this->input->get('month');

    $month = $month ?? date('m');

    if (!empty($type)) {

        switch ($type) {

            case 'birthday':
                $data = $this->Home_model->get_birthdays($month);
                break;

            case 'anniversary':
                $data = $this->Home_model->get_anniversaries($month);
                break;

            case 'joining':
                $data = $this->Home_model->get_joinings($month);
                break;

            default:
                $data = [];
        }

        return $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($data));
    }

    $data['birthdays'] = array_slice($this->Home_model->get_birthdays($month),0,3);

    $data['anniversaries'] = array_slice($this->Home_model->get_anniversaries($month),0,3);

    $data['joinings'] = array_slice($this->Home_model->get_joinings($month),0,3);

        $data['moments']       = $this->Home_model->get_moments();
        $data['policies']      = $this->Home_model->get_policies();
        $data['news']          = $this->Home_model->get_newevents();
        $data['apps']          = $this->Home_model->get_apps();
        $data['employees']     = $this->Home_model->get_employees();
        $data['learning']      = $this->Home_model->get_learning_material();

        // Quiz data
        $quiz_raw = $this->Home_model->get_quiz();
        $quiz = [];
        if (!empty($quiz_raw)) {
            $options = [
                'a' => $quiz_raw['option_a'] ?? '',
                'b' => $quiz_raw['option_b'] ?? '',
                'c' => $quiz_raw['option_c'] ?? '',
                'd' => $quiz_raw['option_d'] ?? '',
            ];
            $quiz[] = [
                'question'       => $quiz_raw['question'],
                'options'        => $options,
                'correct_option' => $quiz_raw['correct_option'] ?? '',
            ];
        }
        $data['quiz'] = $quiz;

        // Leader profile
        $leaders = $this->Home_model->get_leader();
        $data['leaders'] = $leaders;

        // Leadership desk
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



            $dept_items = $this->Home_model->get_departmental_information();

            $data['sops'] = [];
            $data['technical_docs'] = [];

            foreach ($dept_items as $item) {
                if (!isset($item['section'])) continue;

                if ($item['section'] === 'sops') {
                    $data['sops'][] = $item;
                } elseif ($item['section'] === 'technical_document') {
                    $data['technical_docs'][] = $item;
                }
            }



        $data['current_month'] = $month;
        
        $year = date('Y');
        $data['trainings'] = $this->Home_model->get_training_calender($year);

        // Load views
        $this->load->view('frontend/include/header', $data);
        $this->load->view('frontend/index', $data);
        $this->load->view('frontend/include/footer', $data);
    }




}