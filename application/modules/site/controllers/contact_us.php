<?php   if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contact_us extends MX_Controller {
	
	function __construct()
	{
		parent:: __construct();
		$this->load->model('admin/users_model');
		$this->load->model('site/departments_model');
		// $this->load->model('site/contact_us_model');
		$this->load->model('site/site_model');
		$this->load->model('admin/blog_model');
		
	}
    
	/*
	*
	*	Default action is to show all the posts
	*
	*/
	public function index($category = 0) 
	{

		$data['content'] = $this->load->view('contact_us/contact_us', '', true);
		$data['title'] = 'Contact Us';
		$this->load->view("site/contact_us/templates/contact_us", $data);
	}
	/*
	*
	*	Default action is to show all the posts
	*
	*/

}