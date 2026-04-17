<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Manageprivacy_model extends CI_Model {

    private $table = 'policy_procedures';

    public function get_all()
    {
        return $this->db
            ->select('p.*, c.name as category_name')
            ->from('policy_procedures p')
            ->join('policy_categories c', 'c.id = p.category', 'left')
            ->order_by('p.id', 'DESC')
            ->get()
            ->result();
    }

    public function get_by_id($id)
    {
        return $this->db->where('id',$id)
                        ->get($this->table)
                        ->row();
    }

    public function insert($data)
    {
        return $this->db->insert($this->table,$data);
    }

    public function update($id,$data)
    {
        return $this->db->where('id',$id)
                        ->update($this->table,$data);
    }

    public function delete($id)
    {
        return $this->db->where('id',$id)
                        ->delete($this->table);
    }

    public function toggle($id)
    {
        $policy = $this->get_by_id($id);
        $new_status = ($policy->is_active == 1) ? 0 : 1;

        return $this->update($id, ['is_active'=>$new_status]);
    }

     public function get_all_active()
{
    $this->db->select('p.*, c.name as category_name');
    $this->db->from($this->table . ' p');

    $this->db->join('policy_categories c', 'c.id = p.category', 'left');

    $this->db->where('p.is_active', 1);
    $this->db->where('c.status', 1);

    $this->db->group_start();
        $this->db->where('p.effective_date <=', date('Y-m-d'));
        $this->db->or_where('p.effective_date IS NULL', null, false);
    $this->db->group_end();

    $this->db->order_by('p.id', 'DESC');

    $data = $this->db->get()->result_array();

    $result = [];

    foreach ($data as $row) {
        $category = $row['category_name'] ?? 'Uncategorized';
        $result[$category][] = $row;
    }

    return $result;
}
        
       public function insert_category($data)
        {
            $this->db->insert('policy_categories', $data);
            return $this->db->insert_id();
        }

        public function get_categories()
        {
            return $this->db->where('status', 1)
                            ->order_by('name', 'ASC')
                            ->get('policy_categories')
                            ->result();
        }

        public function check_category($name)
        {
            return $this->db->where('name', $name)
                            ->get('policy_categories')
                            ->row();
        }
}

?>