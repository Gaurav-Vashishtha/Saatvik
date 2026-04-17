<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Quiz_model extends CI_Model {

    protected $table = 'quiz_questions';

    public function getAll()
    {
        return $this->db->order_by('id', 'DESC')->get($this->table)->result();
    }

    public function getById($id)
    {
        return $this->db->where('id', $id)->get($this->table)->row();
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

        public function toggle($id)
        {
            $row = $this->getById($id);

            if (!$row) {
                return false;
            }

            $new_status = ($row->is_active == 1) ? 0 : 1;

            return $this->update($id, ['is_active' => $new_status]);
        }

    public function get_last_active() {
        return $this->db->where('is_active', 1)
                        ->order_by('id', 'DESC')
                        ->limit(1)
                        ->get($this->table)
                        ->row_array();
    }
}