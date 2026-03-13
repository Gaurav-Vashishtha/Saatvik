<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Managehr_model extends CI_Model {

    private $table = 'users';

    public function get_all($filters = [])
    {
        $this->db->from('users');
        $this->db->where('role_id', 2);

        if (!empty($filters['search'])) {
            $this->db->group_start();
            $this->db->like('first_name', $filters['search']);
            $this->db->or_like('last_name', $filters['search']);
            $this->db->or_like('email', $filters['search']);
            $this->db->group_end();
        }

        if (isset($filters['is_active']) && $filters['is_active'] !== '') {
            $this->db->where('is_active', $filters['is_active']);
        }

        return $this->db->order_by('id','DESC')->get()->result();
    }


    public function get_by_id($id)
    {
        return $this->db
            ->where('id', $id)
            ->where('role_id', 2)
            ->get($this->table)
            ->row();
    }

    public function insert($data)
    {
        return $this->db->insert($this->table, $data);
    }

    public function update($id, $data)
    {
        return $this->db->where('id', $id)->update($this->table, $data);
    }

    public function delete($id)
    {
        return $this->db->where('id', $id)->delete($this->table);
    }

    public function toggle_status($id)
    {
        $user = $this->get_by_id($id);

        if ($user) {
            $new_is_active = ($user->is_active == 1) ? 0 : 1;

            $this->db->where('id', $id)
                     ->update($this->table, ['is_active' => $new_is_active]);
        }
    }
}