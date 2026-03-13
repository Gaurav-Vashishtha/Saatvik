<?php

class Managedepartmentalinfo_model extends CI_Model {

    private $table = 'departmental_info';

    public function get_all($section = null)
    {
        if($section){
            $this->db->where('section',$section);
        }

        return $this->db->order_by('id','DESC')->get($this->table)->result();
    }

    public function get_by_id($id)
    {
        return $this->db->where('id',$id)->get($this->table)->row();
    }

    public function insert($data)
    {
        return $this->db->insert($this->table,$data);
    }

    public function update($id,$data)
    {
        return $this->db->where('id',$id)->update($this->table,$data);
    }

    public function delete($id)
    {
        return $this->db->where('id',$id)->delete($this->table);
    }

    public function toggle($id)
    {
        $row = $this->get_by_id($id);

        $status = $row->status ? 0 : 1;

        return $this->db->where('id',$id)->update($this->table,['status'=>$status]);
    }

     public function get_all_active() {
        return $this->db->where('status', 1)
                        ->order_by('id', 'DESC')
                        ->get($this->table)
                        ->result_array();
    }

}