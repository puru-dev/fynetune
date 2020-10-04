<?php
class Home_model extends CI_Model 
{
	function insert($fields)
	{
	  $this->db->insert('subscribers',$fields);
      return $this->db->insert_id();
	}
	function marks($fields,$user_id)
	{
	  $this->db->where('id', $user_id);
	  $this->db->update('subscribers', $fields);
	  return true;
	}
    function check_marks($user_id)
	{
		//$this->db->where('filed2',$filed2);
	    //$result = $this->db->get('table_name')->num_rows();
	    $this->db->where('id',$user_id);
		$this->db->where('marks is NOT NULL', NULL, FALSE);
		return $result=$this->db->get('subscribers')->num_rows();
    }
}