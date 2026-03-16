<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Manageleader_model extends CI_Model {

    private $table = 'leadership';

    public function get_all()
    {
        return $this->db->order_by('id','DESC')->get($this->table)->result();
    }

    public function get($id)
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
        $leader = $this->get($id);

        $status = ($leader->status == 1) ? 0 : 1;

        return $this->db
            ->where('id',$id)
            ->update($this->table,['status'=>$status]);
    }

}