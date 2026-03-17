<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get_by_email($email)
    {
        return $this->db
                    ->where('email', $email)
                    ->where('is_active', 1)
                    // ->limit(1)
                    ->get('users')
                    ->row();
    }

    public function create($data) {
        $this->db->insert('users', $data);
        return $this->db->insert_id();
    }
    
    public function update_password($users_id, $new_password) {
        $this->db->where('id', $users_id);
        return $this->db->update('users', ['password' => $new_password]);
    }
    
    public function get_by_id($users_id) {
        return $this->db->get_where('users', ['id' => $users_id])->row();
    }
}   
?>