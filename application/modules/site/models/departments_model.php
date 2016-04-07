<?php

class Departments_model extends CI_Model 
{	
	/*
	*	Retrieve all departments
	*	@param string $table
	* 	@param string $where
	*
	*/
	public function get_all_departments($table, $where, $per_page, $page)
	{
		//retrieve all users
		$this->db->from($table);
		$this->db->select('*');
		$this->db->where($where);
		$this->db->order_by('department_id', 'DESC');
		$query = $this->db->get('', $per_page, $page);
		
		return $query;
	}
	public function get_department($department_id)
	{
		$table = "department";
		$where = "department_status = 1 AND department_id = ".$department_id."";
		$this->db->where($where);
		$query = $this->db->get($table);
		return $query;

	}

	public function check_previous_department($department_id)
	{
		//retrieve all users
		$this->db->from('department');
		$this->db->select('*');
		$this->db->where('department_status = 1 AND department_id < '.$department_id);
		$this->db->order_by('department_id');
		$query = $this->db->get();
		
		if($query->num_rows() > 0)
		{
			$row = $query->result();
			$count = $query->num_rows() - 1;

			$department_id = $row[$count]->department_id;

			return $department_id;
		}
		else
		{
			return FALSE;
		}
	}
	public function check_department_department($department_id)
	{
		//retrieve all users
		$this->db->from('department');
		$this->db->select('*');
		$this->db->where('department_status = 1 AND department_id > '.$department_id);
		$query = $this->db->get();
				
		if($query->num_rows() > 0)
		{
			$row = $query->result();

			$count = $query->num_rows() + 1;

			$department_id = $row[0]->department_id;

			return $department_id;
		}
		else
		{
			return FALSE;
		}
	}
}