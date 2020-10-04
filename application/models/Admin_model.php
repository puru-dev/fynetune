<?php
class Admin_model extends CI_Model 
{
	function list()
	{
      $query = $this->db->get('subscribers');
	  return $query->result_array();
	}
}