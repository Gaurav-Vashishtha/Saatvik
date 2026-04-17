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

// public function get_this_month_birthday()
// {
//     $currentMonth = date('m');
//     $currentDay   = date('d');

//     $this->db->select('CONCAT(salutation, " ", full_name) as name, date_of_birth, image');
//     $this->db->where('is_active', 1);
//     $this->db->where('MONTH(date_of_birth)', $currentMonth);
//     $this->db->where('DAY(date_of_birth) >=', $currentDay);

//     $users = $this->db->get('users')->result_array();

//     foreach ($users as &$user) {
//         $user['image'] = !empty($user['image'])
//             ? base_url('uploads/hr/' . $user['image'])
//             : base_url('uploads/default.png');
//     }

//     $this->db->select('CONCAT(salutation, " ", full_name) as name, date_of_birth, employee_image as image');
//     $this->db->where('is_active', 1);
//     $this->db->where('MONTH(date_of_birth)', $currentMonth);
//     $this->db->where('DAY(date_of_birth) >=', $currentDay);

//     $employees = $this->db->get('employees')->result_array();

//     foreach ($employees as &$emp) {
//         $emp['image'] = !empty($emp['image'])
//             ? base_url('uploads/employee/' . $emp['image'])
//             : base_url('uploads/default.png');
//     }

//     $birthdays = array_merge($users, $employees);

//     usort($birthdays, function ($a, $b) {
//         return date('d', strtotime($a['date_of_birth'])) - date('d', strtotime($b['date_of_birth']));
//     });

//     return $birthdays;
// }

            public function get_moments() {
                return $this->db
                    ->where('is_active', 1)
                    ->where('date <=', date('Y-m-d'))
                    ->order_by('id', 'DESC')
                    ->get('moments')
                    ->result();
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
            return $this->Quiz_model->get_last_active();
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



        public function get_employees()
        {
            $this->db->select('*');
            $this->db->from('employees'); // your employee table
            $this->db->where('is_active',1);
            return $this->db->get()->result_array();
        }


        // public function get_birthdays()
        // {
        //     $this->db->select('full_name, employee_image, date_of_birth');
        //     $this->db->from('employees');
        //     $this->db->where('is_active',1);
        //     $this->db->where('MONTH(date_of_birth)', date('m'));

        //     $query = $this->db->get()->result_array();

        //     $data = [];

        //     foreach($query as $row)
        //     {
        //        $data[] = [
        //             'name'  => $row['full_name'],
        //             'image' => !empty($row['employee_image'])
        //                 ? base_url('uploads/employees/'.$row['employee_image'])
        //                 : base_url('assets/images/default-user.png'),
        //             'date'  => $row['date_of_birth'] ?? null
        //         ];
        //     }

        //     return $data;
        // }


        // public function get_anniversaries()
        // {
        //     $this->db->select('full_name, employee_image, anniversary_date');
        //     $this->db->from('employees');
        //     $this->db->where('is_active',1);
        //     $this->db->where('marital_status','Married');
        //     $this->db->where('MONTH(anniversary_date)', date('m'));

        //     $query = $this->db->get()->result_array();

        //     $data = [];

        //     foreach($query as $row)
        //     {
        //       $data[] = [
        //             'name'  => $row['full_name'],
        //             'image' => !empty($row['employee_image'])
        //                 ? base_url('uploads/employees/'.$row['employee_image'])
        //                 : base_url('assets/images/default-user.png'),
        //             'date'  => $row['anniversary_date'] ?? null
        //         ];
        //     }

        //     return $data;
        // }


        // public function get_joinings()
        // {
        //     $this->db->select('full_name, employee_image, date_of_joining');
        //     $this->db->from('employees');
        //     $this->db->where('is_active',1);
        //     $this->db->where('MONTH(date_of_joining)', date('m'));

        //     $query = $this->db->get()->result_array();

        //     $data = [];

        //     foreach($query as $row)
        //     {
        //         $data[] = [
        //             'name'  => $row['full_name'],
        //             'image' => !empty($row['employee_image'])
        //                 ? base_url('uploads/employees/'.$row['employee_image'])
        //                 : base_url('assets/images/default-user.png'),
        //             'date'  => $row['date_of_joining'] ?? null
        //         ];
        //     }

        //     return $data;
        // }

      private function format_employee_data($query, $date_field)
        {
            $data = [];
            foreach ($query as $row) {
                $data[] = [
                    'name'  => $row['full_name'],
                    'image' => !empty($row['employee_image'])
                        ? base_url('uploads/employee/'.$row['employee_image'])
                        : base_url('assets/images/default-user.png'),
                    'date'  => $row[$date_field] ?? null
                ];
            }
            return $data;
        }

            public function get_birthdays($month = null)
            {
                $month = (int) ($month ?? date('m'));
                $today = date('m-d');
                $current_month = (int) date('m');

                $this->db->select('full_name, employee_image, date_of_birth');
                $this->db->from('employees');
                $this->db->where('is_active', 1);
                $this->db->where('MONTH(date_of_birth)', $month);

                // Only filter by day if it's the current month
                if ($month === $current_month) {
                    $this->db->where('DATE_FORMAT(date_of_birth, "%m-%d") >=', $today);
                }

                $this->db->order_by('DATE_FORMAT(date_of_birth, "%m-%d")', 'ASC', FALSE);

                $query = $this->db->get()->result_array();

                return $this->format_employee_data($query, 'date_of_birth');
            }
    
            public function get_anniversaries($month = null)
            {
                $month = (int) ($month ?? date('m'));
                $today = date('m-d');
                $current_month = (int) date('m');

                $this->db->select('full_name, employee_image, anniversary_date');
                $this->db->from('employees');
                $this->db->where('is_active', 1);
                $this->db->where('marital_status', 'Married');
                $this->db->where('MONTH(anniversary_date)', $month);

                // Only filter by day if it's the current month
                if ($month === $current_month) {
                    $this->db->where('DATE_FORMAT(anniversary_date, "%m-%d") >=', $today);
                }

                $this->db->order_by('DATE_FORMAT(anniversary_date, "%m-%d")', 'ASC', FALSE);

                $query = $this->db->get()->result_array();

                return $this->format_employee_data($query, 'anniversary_date');
            }

    public function get_joinings($month = null)
    {
        $month = $month ?? date('m');
        $year  = date('Y'); // only current year

        $this->db->select('full_name, employee_image, date_of_joining');
        $this->db->from('employees');
        $this->db->where('is_active', 1);
        $this->db->where('MONTH(date_of_joining)', $month);
        $this->db->where('YEAR(date_of_joining)', $year);

        $query = $this->db->get()->result_array();

        return $this->format_employee_data($query, 'date_of_joining');
    }
    
    
    public function get_training_calender($year)
    {
     return $this->db
    ->where('YEAR(training_date)', $year)
    ->where('is_active', 1)
    ->get('training_calendar')
    ->result();
    }
}
?>