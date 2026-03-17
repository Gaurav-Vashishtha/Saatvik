<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * @property CI_Input $input
 * @property Activity_model $Activity_model
 * @property CI_Output $output
 * @property Managemoments_model $Managemoments_model
 * @property Manageprivacy_model $Manageprivacy_model
 * @property Managehr_model $Managehr_model
 * @property Manageemployee_model $Manageemployee_model
 * @property Managenewsevents_model $Managenewsevents_model
 * @property Managelearningmaterial_model $Managelearningmaterial_model
 * @property Quiz_model $Quiz_model
 * @property Managedepartmentalinfo_model $Managedepartmentalinfo_model
 * @property Manageleadershipdesk_model $Manageleadershipdesk_model
 * @property Manageapp_model $Manageapp_model
 * @property Manageleader_model $Manageleader_model
 * @property db $db
 */

class ApiController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin/Manageleader_model');
        $this->load->model('admin/Manageapp_model');
        $this->load->model('admin/Quiz_model');
        $this->load->model('admin/Managedepartmentalinfo_model');
        $this->load->model('admin/Manageleadershipdesk_model');
        $this->load->model('admin/Managelearningmaterial_model');
        $this->load->model('admin/Manageprivacy_model');
        $this->load->model('admin/Managemoments_model');
        $this->load->model('admin/Managehr_model');
        $this->load->model('admin/Manageemployee_model');
        $this->load->model('admin/Managenewsevents_model');

        $this->output->set_content_type('application/json');
    }

//birthdays
    public function get_this_month_birthday()
    {
        $currentMonth = date('m');

        $this->db->select('CONCAT(first_name, " ", last_name) as name, date_of_birth, image');
        $this->db->where('role_id', 2);
        $this->db->where('is_active', 1);
        $this->db->where('MONTH(date_of_birth)', $currentMonth);
        $this->db->order_by('DAY(date_of_birth)', 'ASC');
        $users = $this->db->get('users')->result_array();

        foreach ($users as &$user) {
            $user['image'] = !empty($user['image']) ? base_url('uploads/hr/' . $user['image']) : base_url('uploads/default.png');
        }

        $this->db->select('CONCAT(first_name, " ", last_name) as name, date_of_birth, employee_image as image');
        $this->db->where('is_active', 1);
        $this->db->where('MONTH(date_of_birth)', $currentMonth);
        $this->db->order_by('DAY(date_of_birth)', 'ASC');
        $employees = $this->db->get('employees')->result_array();

        foreach ($employees as &$emp) {
            $emp['image'] = !empty($emp['image']) ? base_url('uploads/employee/' . $emp['image']) : base_url('uploads/default.png');
            unset($emp['employee_image']);
        }

        $response = [
            'status' => true,
            'message' => 'Birthday list for this month',
            'users' => $users,
            'employees' => $employees
        ];

        return $this->output
            ->set_status_header(200)
            ->set_output(json_encode($response));
    }


//moments
public function get_moments()
{
    try {

        $moments = $this->Managemoments_model->get_all_active();

        if (!empty($moments)) {

            foreach ($moments as &$m) {

                if (!empty($m['image'])) {
                    $m['image'] = base_url('uploads/moments/' . $m['image']);
                } else {
                    $m['image'] = base_url('uploads/default.png');
                }
            }
        }

        $response = [
            'status' => true,
            'message' => 'List for this moments',
            'data' => $moments
        ];

        return $this->output
            ->set_status_header(200)
            ->set_output(json_encode($response));

    } catch (Exception $e) {

        $response = [
            'status' => false,
            'message' => $e->getMessage()
        ];

        return $this->output
            ->set_status_header(500)
            ->set_output(json_encode($response));
    }
}


//polices
public function get_policies()
{
    try {

        $privacy = $this->Manageprivacy_model->get_all_active();



        $response = [
            'status' => true,
            'message' => 'List for this privacy',
            'data' => $privacy
        ];

        return $this->output
            ->set_status_header(200)
            ->set_output(json_encode($response));

    } catch (Exception $e) {

        $response = [
            'status' => false,
            'message' => $e->getMessage()
        ];

        return $this->output
            ->set_status_header(500)
            ->set_output(json_encode($response));
    }
}

//news&events

public function get_newevents()
{
    try {

        $news = $this->Managenewsevents_model->get_all_active();

        if (!empty($news)) {

            foreach ($news as &$m) {

                if (!empty($m['image'])) {
                    $m['image'] = base_url('uploads/news/' . $m['image']);
                } else {
                    $m['image'] = base_url('uploads/default.png');
                }
            }
        }

        $response = [
            'status' => true,
            'message' => 'List for this news',
            'data' => $news
        ];

        return $this->output
            ->set_status_header(200)
            ->set_output(json_encode($response));

    } catch (Exception $e) {

        $response = [
            'status' => false,
            'message' => $e->getMessage()
        ];

        return $this->output
            ->set_status_header(500)
            ->set_output(json_encode($response));
    }
}

//learning material

public function get_learning_material()
{
    try {

        $learning = $this->Managelearningmaterial_model->get_all_active();



        $response = [
            'status' => true,
            'message' => 'List for this questions',
            'data' => $learning
        ];

        return $this->output
            ->set_status_header(200)
            ->set_output(json_encode($response));

    } catch (Exception $e) {

        $response = [
            'status' => false,
            'message' => $e->getMessage()
        ];

        return $this->output
            ->set_status_header(500)
            ->set_output(json_encode($response));
    }
}

//Quiz
public function get_quiz()
{
    try {

        $quiz = $this->Quiz_model->get_all_active();



        $response = [
            'status' => true,
            'message' => 'List for this quiz',
            'data' => $quiz
        ];

        return $this->output
            ->set_status_header(200)
            ->set_output(json_encode($response));

    } catch (Exception $e) {

        $response = [
            'status' => false,
            'message' => $e->getMessage()
        ];

        return $this->output
            ->set_status_header(500)
            ->set_output(json_encode($response));
    }
}

//leadership desk

public function get_ledership_desk()
{
    try {

        $leadershipitem = $this->Manageleadershipdesk_model->get_all_active();



        $response = [
            'status' => true,
            'message' => 'List for this items',
            'data' => $leadershipitem
        ];

        return $this->output
            ->set_status_header(200)
            ->set_output(json_encode($response));

    } catch (Exception $e) {

        $response = [
            'status' => false,
            'message' => $e->getMessage()
        ];

        return $this->output
            ->set_status_header(500)
            ->set_output(json_encode($response));
    }
}



//departmental information
public function get_departmental_information()
{
    try {

        $departmentalitem = $this->Managedepartmentalinfo_model->get_all_active();



        $response = [
            'status' => true,
            'message' => 'List for this items',
            'data' => $departmentalitem
        ];

        return $this->output
            ->set_status_header(200)
            ->set_output(json_encode($response));

    } catch (Exception $e) {

        $response = [
            'status' => false,
            'message' => $e->getMessage()
        ];

        return $this->output
            ->set_status_header(500)
            ->set_output(json_encode($response));
    }
}

// departmental information
    public function get_apps()
    {
        try {

            $apps = $this->Manageapp_model->get_all_active();
            foreach($apps as &$app){
                if(!empty($app['image'])){
                    $app['image_url'] = base_url($app['image']);
                }
                else{
                 $app['image_url'] = NULL;
                }
            }


            $response = [
                'status' => true,
                'message' => 'List for this items',
                'data' => $apps
            ];

            return $this->output
                ->set_status_header(200)
                ->set_output(json_encode($response));

        } catch (Exception $e) {

            $response = [
                'status' => false,
                'message' => $e->getMessage()
            ];

            return $this->output
                ->set_status_header(500)
                ->set_output(json_encode($response));
        }
    }


//leader information
    public function get_leader()
    {
        try {

            $leaders = $this->Manageleader_model->get_all_active();

                foreach ($leaders as &$leader) {
                    if (!empty($leader['image'])) {
                        $leader['image_url'] = base_url($leader['image']);
                    } else {
                        $leader['image_url'] = null;
                    }
                }

            $response = [
                'status' => true,
                'message' => 'List for this items',
                'data' => $leaders
            ];

            return $this->output
                ->set_status_header(200)
                ->set_output(json_encode($response));

        } catch (Exception $e) {

            $response = [
                'status' => false,
                'message' => $e->getMessage()
            ];

            return $this->output
                ->set_status_header(500)
                ->set_output(json_encode($response));
        }
    }

}