<?php 
class Home_model extends CI_Model {

  public function __construct()
    {
        parent::__construct();

        // Load all required models
        $this->load->model('admin/Manageprivacy_model');
        $this->load->model('admin/Managenewsevents_model');
        $this->load->model('admin/Managelearningmaterial_model');
        $this->load->model('admin/Quiz_model');
        $this->load->model('admin/Managedepartmentalinfo_model');
        $this->load->model('admin/Manageapp_model');
        $this->load->model('admin/Manageleader_model');
        $this->load->model('admin/Manageleadershipdesk_model');
    }

public function get_this_month_birthday()
{
    $currentMonth = date('m');
    $currentDay   = date('d');

    $this->db->select('CONCAT(salutation, " ", full_name) as name, date_of_birth, image');
    $this->db->where('is_active', 1);
    $this->db->where('MONTH(date_of_birth)', $currentMonth);
    $this->db->where('DAY(date_of_birth) >=', $currentDay);

    $users = $this->db->get('users')->result_array();

    foreach ($users as &$user) {
        $user['image'] = !empty($user['image'])
            ? base_url('uploads/hr/' . $user['image'])
            : base_url('uploads/default.png');
    }

    $this->db->select('CONCAT(salutation, " ", full_name) as name, date_of_birth, employee_image as image');
    $this->db->where('is_active', 1);
    $this->db->where('MONTH(date_of_birth)', $currentMonth);
    $this->db->where('DAY(date_of_birth) >=', $currentDay);

    $employees = $this->db->get('employees')->result_array();

    foreach ($employees as &$emp) {
        $emp['image'] = !empty($emp['image'])
            ? base_url('uploads/employee/' . $emp['image'])
            : base_url('uploads/default.png');
    }

    $birthdays = array_merge($users, $employees);

    usort($birthdays, function ($a, $b) {
        return date('d', strtotime($a['date_of_birth'])) - date('d', strtotime($b['date_of_birth']));
    });

    return $birthdays;
}

    public function get_moments()
    {
        return $this->db->get('moments')->result();
    }

        public function get_policies()
        {
            return $this->Manageprivacy_model->get_all_active();
        }

        public function get_newevents()
        {
            $news = $this->Managenewsevents_model->get_all_active();

            if (!empty($news)) {
                foreach ($news as &$m) {
                    $m['image'] = !empty($m['image'])
                        ? base_url('uploads/news/' . $m['image'])
                        : base_url('uploads/default.png');
                }
            }

            return $news;
        }

        public function get_learning_material()
        {
            return $this->Managelearningmaterial_model->get_all_active();
        }
       

        public function get_quiz()
        {
            return $this->Quiz_model->get_all_active();
        }

        public function get_departmental_information()
        {
            return $this->Managedepartmentalinfo_model->get_all_active();
        }
        public function get_apps()
        {
            $apps = $this->Manageapp_model->get_all_active();

            foreach ($apps as &$app) {
                $app['image_url'] = !empty($app['image'])
                    ? base_url($app['image'])
                    : null;
            }

            return $apps;
        }

        public function get_leader()
        {
            $leaders = $this->Manageleader_model->get_all_active();

            foreach ($leaders as &$leader) {
                $leader['image_url'] = !empty($leader['image'])
                    ? base_url($leader['image'])
                    : null;
            }

            return $leaders;
        }

        public function get_leadership_desk()
        {
            try {

                $leadershipitem = $this->Manageleadershipdesk_model->get_all_active();

                if(!empty($leadershipitem))
                {
                    foreach($leadershipitem as &$row)
                    {
                        $row['image'] = !empty($row['image'])
                            ? base_url('uploads/leadership/'.$row['image'])
                            : base_url('uploads/default.png');
                    }
                }

                return $leadershipitem;

            } catch (Exception $e) {

                log_message('error', $e->getMessage());
                return [];
            }
        }
}
?>