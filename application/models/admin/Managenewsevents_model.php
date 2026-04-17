<?php
class Managenewsevents_model extends CI_Model {

    private $table = 'news_events';

    public function get_all()
    {
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

        $new_status = ($row->is_active == 1) ? 0 : 1;

        return $this->update($id,['is_active'=>$new_status]);
    }

        public function get_all_active() {
            return $this->db
                ->where('is_active', 1)
                ->where('event_date <=', date('Y-m-d')) // key condition
                ->order_by('id', 'DESC')
                ->get($this->table)
                ->result_array();
        }
}