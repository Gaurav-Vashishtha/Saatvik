<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once(APPPATH.'core/MY_Admin_Controller.php');
/**
 * @property CI_Input $input
 * @property CI_Session $session
 * @property CI_Form_validation $form_validation
 * @property Manageprivacy_model $Manageprivacy_model
 * @property upload $upload
 */

class Manageprivacy extends MY_Admin_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin/Manageprivacy_model');
        $this->load->helper(['url','form','common']);


          if (!$this->session->userdata('admin_logged_in')) {
            redirect('admin');
        }
    }

    public function index()
    {

    // echo "hii"; die;
        $data['title'] = 'Policy & Procedures';
        $data['breadcrumb'] = [
            ['name'=>'Dashboard','url'=>site_url('admin/dashboard')],
            ['name'=>'Policy & Procedures']
        ];

        $data['policies'] = $this->Manageprivacy_model->get_all();

        $this->load->view('admin/layouts/header',$data);
        $this->load->view('admin/managePolicyProcedures/list',$data);
        $this->load->view('admin/layouts/footer');
    }

    public function create()
    {
        $data['categories'] = $this->Manageprivacy_model->get_categories();
        if($this->input->post())
        {
        $post = $this->input->post(NULL, TRUE);
         $content_type = $this->input->post('content_type');
          $pdf = upload_file('pdf_file','uploads/policy/','pdf',10240);

          $pdf = basename($pdf);
            
        $data = [
            'title'          => $post['title'],
            'slug'           => url_title($post['title'], 'dash', TRUE),
            'category'       => $post['category'],
            'effective_date' => !empty($post['effective_date']) ? $post['effective_date'] : NULL,
            'version'        => $post['version'],
            // 'short_description' => $post['short_description'],
            'description'    => $post['description'],
            'content_type'   => $content_type,
            'pdf_file'       => $pdf,
            'is_active'      => $post['is_active'],
        ];

            $this->Manageprivacy_model->insert($data);
            $this->session->set_flashdata('success','Policy added successfully');
            redirect('admin/policy-procedures');
        }

        $data['title'] = 'Add Policy';
        $data['breadcrumb'] = [
            ['name'=>'Dashboard','url'=>site_url('admin/dashboard')],
            ['name'=>'Policy & Procedures','url'=>site_url('admin/policy-procedures')],
            ['name'=>'Add Policy']
        ];

        $this->load->view('admin/layouts/header',$data);
        $this->load->view('admin/managePolicyProcedures/add',$data);
        $this->load->view('admin/layouts/footer');
    }


       public function edit($id)
        {
             $data['categories'] = $this->Manageprivacy_model->get_categories(); 
            $policy = $this->Manageprivacy_model->get_by_id($id);
    
            if ($this->input->post()) {
    
                $post = $this->input->post(NULL, TRUE);
    
                $pdf = $policy->pdf_file;
                $uploaded = _upload_file('pdf_file', 'uploads/policy/', $policy->pdf_file, 'pdf');
                if (!empty($uploaded)) {
                    $pdf = basename($uploaded);
                }
    
                $data = [
                    'title'              => $post['title'] ?? '',
                    'slug'               => url_title($post['title'], 'dash', TRUE),
                    'category'           => $post['category'] ?? '',
                    'effective_date'     => !empty($post['effective_date']) ? $post['effective_date'] : NULL,
                    'version'            => $post['version'] ?? '',
                    'short_description'  => $post['short_description'] ?? '',
                    'description'        => $post['description'] ?? '',
                    'content_type'       => $post['content_type'] ?? '',
                    'pdf_file'           => $pdf,
                    'is_active'          => isset($post['is_active']) ? $post['is_active'] : 0,
                    'updated_at'         => date('Y-m-d H:i:s')
                ];
    
                $this->Manageprivacy_model->update($id, $data);
    
                $this->session->set_flashdata('success', 'Policy updated successfully');
                redirect('admin/policy-procedures');
            }
    
            $data['policy'] = $policy;
            $data['title'] = 'Edit Policy';
            $data['breadcrumb'] = [
                ['name'=>'Dashboard','url'=>site_url('admin/dashboard')],
                ['name'=>'Policy & Procedures','url'=>site_url('admin/policy-procedures')],
                ['name'=>'Edit Policy']
            ];
    
            $this->load->view('admin/layouts/header', $data);
            $this->load->view('admin/managePolicyProcedures/edit', $data);
            $this->load->view('admin/layouts/footer');
        }

    public function delete($id)
    {
        $this->Manageprivacy_model->delete($id);
        $this->session->set_flashdata('success','Policy deleted');
        redirect('admin/policy-procedures');
    }

    public function toggle($id)
    {
        $this->Manageprivacy_model->toggle($id);
        $this->session->set_flashdata('success', 'Status changed.');
        redirect('admin/policy-procedures');
    }
    
    
    public function add_category()
    {
         $name = ucfirst(strtolower(trim($this->input->post('name'))));

        if (empty($name)) {
            echo json_encode(['status' => false, 'message' => 'Category required']);
            return;
        }

        if ($this->Manageprivacy_model->check_category($name)) {
            echo json_encode(['status' => false, 'message' => 'Category already exists']);
            return;
        }

        $id = $this->Manageprivacy_model->insert_category([
            'name' => $name
        ]);

        echo json_encode([
            'status' => true,
            'id' => $id,
            'name' => $name
        ]);
    }
}

?>
