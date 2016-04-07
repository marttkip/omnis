<?php

class Login_model extends CI_Model 
{
	/*
	*	Check if user has logged in
	*
	*/
	public function check_login()
	{
		if($this->session->userdata('login_status'))
		{
			return TRUE;
		}
		
		else
		{
			return FALSE;
		}
	}
	
	/*
	*	Validate a user's login request
	*
	*/
	public function validate_user()
	{
		//select the user by email from the database
		$this->db->select('*');
		$this->db->where(array('email' => $this->input->post('email'), 'activated' => 1, 'password' => md5($this->input->post('password'))));
		$query = $this->db->get('users');
		
		//if users exists
		if ($query->num_rows() > 0)
		{
			$result = $query->result();
			//create user's login session
			$newdata = array(
                   'login_status'     => TRUE,
                   'first_name'     => $result[0]->first_name,
                   'email'     => $result[0]->email,
                   'user_id'  => $result[0]->user_id,
                   'user_type_id'  => 3
               );

			$this->session->set_userdata($newdata);
			
			//update user's last login date time
			$this->update_user_login($result[0]->user_id);
			return TRUE;
		}
		
		//if user doesn't exist
		else
		{
			return FALSE;
		}
	}
	public function validate_airline()
	{
		//select the user by email from the database
		$this->db->select('*');
		$this->db->where(array('airline_user_email' => $this->input->post('email'), 'airline_status' => 1, 'airline_user_password' => md5($this->input->post('password'))));
		$query = $this->db->get('airline');
		
		//if users exists
		if ($query->num_rows() > 0)
		{
			$result = $query->result();
			//create user's login session
			$newdata = array(
                   'airline_login_status'     => TRUE,
                   'airline_name'     => $result[0]->airline_name,
                   'airline_logo'     => $result[0]->airline_logo,
                   'airline_id'  => $result[0]->airline_id,
                   'airline_user_email'  => $result[0]->airline_user_email,
                   'user_type_id'  => 2
               );

			$this->session->set_userdata($newdata);
			
			//update user's last login date time
			$this->update_airline_login($result[0]->airline_id);
			return TRUE;
		}
		
		//if user doesn't exist
		else
		{
			return FALSE;
		}
	}
	
	/*
	*	Update user's last login date
	*
	*/
	private function update_user_login($user_id)
	{
		$data['last_login'] = date('Y-m-d H:i:s');
		$this->db->where('user_id', $user_id);
		$this->db->update('users', $data); 
	}
	/*
	*	Update user's last login date
	*
	*/
	private function update_airline_login($user_id)
	{
		$data['last_login'] = date('Y-m-d H:i:s');
		$this->db->where('airline_id', $user_id);
		$this->db->update('airline', $data); 
	}
	/*
	*	Reset a user's password
	*
	*/
	public function reset_password($user_id)
	{
		$new_password = substr(md5(date('Y-m-d H:i:s')), 0, 6);
		
		$data['password'] = md5($new_password);
		$this->db->where('user_id', $user_id);
		$this->db->update('users', $data); 
		
		return $new_password;
	}
}