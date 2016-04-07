<?php   if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once "./application/modules/auth/controllers/admin_auth.php";

class Admin extends admin_auth {
	
	function __construct()
	{
		parent:: __construct();
		$this->load->model('login/login_model');
		$this->load->model('reports_model');
	}
    
	/*
	*
	*	Default action is to show the dashboard
	*
	*/
	public function index() 
	{
		$data['title'] = 'Dashboard';
		
		$this->load->view('dashboard', $data);
	}
    
	/*
	*
	*	Login an administrator
	*
	*/
	public function admin_login() 
	{
		redirect('login/login_admin');
	}
}
?>