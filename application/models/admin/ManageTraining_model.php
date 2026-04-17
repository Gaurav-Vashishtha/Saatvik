<?php
class ManageTraining_model extends CI_Model {

    public function get_all()
    {
        return $this->db->order_by('id','DESC')->get('training_calendar')->result();
    }

    public function get_by_id($id)
    {
        return $this->db->where('id',$id)->get('training_calendar')->row();
    }

    public function insert($data)
    {
        return $this->db->insert('training_calendar',$data);
    }

    public function update($id,$data)
    {
        return $this->db->where('id',$id)->update('training_calendar',$data);
    }

    public function delete($id)
    {
        return $this->db->where('id',$id)->delete('training_calendar');
    }

    public function toggle($id)
    {
        $row = $this->get_by_id($id);
        $status = ($row->is_active == 1) ? 0 : 1;

        return $this->db->where('id',$id)->update('training_calendar',['is_active'=>$status]);
    }

        public function get_training_by_year($year)
        {
            return $this->db
                ->where('YEAR(training_date)', $year)
                ->where('is_active', 1)
                ->get('training_calendar')
                ->result();
        }
}