<?php 
 
class Member_model extends CI_Model 
{
    public function addMember($data)
    {
        $q = $this->db->insert('member',$data);
                
        if( !$q )
        { 
            return "No insert"; 
        }
        else
        { 
            return "Insert successful"; 
        }
    }

    public function getAll()
    {
        $q = $this->db->get('member');
        return $q->result_array();
    }

    public function updateRow($id,$data)
    {
        $this->db->where('id',$id);
        $this->db->update('member',$data);
    }

}