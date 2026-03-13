<?php
class Manageemployee_model extends CI_Model
{
    private $table = 'employees';

public function get_all($filters = [])
{
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

    return $this->db->order_by('id', 'DESC')
                    ->get('employees')
                    ->result();
}

    public function get_by_id($id)
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
}