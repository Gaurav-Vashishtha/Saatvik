<?php
class Manageleadershipdesk_model extends CI_Model {

    private $table = 'leadership_desk';


    public function get_all($section = null){
        if (!empty($section)) {
            $this->db->where('section', $section);
        }
        return $this->db
            ->order_by('id','DESC')
            ->get($this->table)
            ->result();
    }


    public function get_by_id($id) {
        return $this->db
            ->where('id',$id)
            ->get($this->table)
            ->row();
    }

    public function insert($data){
        return $this->db->insert($this->table,$data);
    }


    public function update($id,$data){
        return $this->db
            ->where('id',$id)
            ->update($this->table,$data);
    }


    public function delete($id){
        return $this->db
            ->where('id',$id)
            ->delete($this->table);
    }


    public function toggle_status($id) {     
        $row = $this->get_by_id($id);
        if(!$row){
            return false;
        }
        $status = ($row->status == 1) ? 0 : 1;
        return $this->update($id, ['status'=>$status]);
    }


    public function get_all_active() {
        $today = date('Y-m-d');
        return $this->db
            ->where('status', 1)
            ->where('DATE(publish_date) <=', $today)
            ->where('DATE(expiry_date) >=', $today)
            ->order_by('id', 'DESC')
            ->get($this->table)
            ->result_array();
    }

}