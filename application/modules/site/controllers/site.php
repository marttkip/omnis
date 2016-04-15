<?php session_start();
/*
	This module loads the head, header, footer &/or Social media sections.
*/
class Site extends CI_Controller 
{	
	var $slideshow_location;
	var $service_location;
	var $gallery_location;
	
	function __construct() 
	{
		parent:: __construct();
		$this->load->library('xmlapi');
		$this->load->model('site_model');
		$this->load->model('admin/blog_model');
		$this->load->model('admin/gallery_model');
		$this->load->model('admin/users_model');
		$this->load->model('site/departments_model');

		$this->load->library('Mandrill', $this->config->item('mandrill_key'));
		$this->load->model('site/email_model');
		
		$this->slideshow_location = base_url().'assets/slideshow/';
		$this->service_location = base_url().'assets/service/';
		$this->gallery_location = base_url().'assets/gallery/';
  	}
	
	public function index()
	{
		redirect('home');
	}
	
	function home_page()
	{
		//Retrieve active slides
		$data['company_details'] = $this->site_model->get_contacts();
		$data['slides'] = $this->site_model->get_slides();
		$data['latest_posts'] = $this->blog_model->get_recent_posts(3);
		$data['departments'] = $this->site_model->get_departments();
		
		$data['slideshow_location'] = $this->slideshow_location;
		$data['service_location'] = $this->service_location;
		
		$v_data['title'] = 'Home';
		$v_data['content'] = $this->load->view("home", $data, TRUE);
		
		$this->load->view("includes/templates/general", $v_data);
	}
	
	public function about()
	{
		$data['title'] = 'About us';
		$v_data['title'] = 'About us';
		$data['company_details'] = $this->site_model->get_contacts();
		$v_data['content'] = $this->load->view('about_us/about_us', $data, true);
		
		$this->load->view("includes/templates/general", $v_data);
	}
	
	public function services($department_web_name = NULL)
	{
  		$table = "service, department";
		$where = "service.service_status = 1 AND service.department_id = department.department_id";
		
		if($department_web_name != NULL)
		{
			$department_name = $this->site_model->decode_web_name($department_web_name);
			$where .= ' AND department.department_name = \''.$department_name.'\'';
			$data['services'] = $this->site_model->get_services($table, $where, NULL);
		}
		
		else
		{
			$data['services'] = $this->site_model->get_services($table, $where, 12);
		}
		$data['service_location'] = $this->service_location;
		
		$data['title'] = 'Services';
		$v_data['title'] = 'Services';
		$v_data['class'] = '';
		$v_data['content'] = $this->load->view("services", $data, TRUE);
		
		$this->load->view("includes/templates/general", $v_data);
	}
	
	public function view_service($web_name)
	{
		$service_name = $this->site_model->decode_web_name($web_name);
		
		if($service_name)
		{
			$query = $this->site_model->get_service($service_name);
	
			if ($query->num_rows() > 0)
			{
				foreach ($query->result() as $row)
				{
					$service_name = $row->service_name;
				}
				$data['title'] = $service_name;
				$v_data['title'] = $service_name;
				$v_data['row'] = $query->row();
				$data['content'] = $this->load->view('single_service', $v_data, true);
			}
			
			else
			{
				$data['title'] = 'Services';
				$v_data['title'] = 'Services';
				$data['content'] = 'Service not found';
			}
		}
		
		else
		{
			$data['title'] = 'Services';
			$v_data['title'] = 'Services';
			$data['content'] = 'Service not found';
		}
		
		$this->load->view("includes/templates/general", $data);
	}
	
	public function contact()
	{
		$data['contacts'] = $this->site_model->get_contacts();
		
		$v_data['title'] = 'Contact us';
		$v_data['class'] = '';
		$v_data['content'] = $this->load->view("contacts", $data, TRUE);
		
		$this->load->view("includes/templates/general", $v_data);
	}
	public function account()
	{
		$data['contacts'] = $this->site_model->get_contacts();
		
		//form validation rules
		$this->form_validation->set_rules('first_name', 'First Name', 'required|xss_clean');
		$this->form_validation->set_rules('other_names', 'Other Names', 'required|xss_clean');
		$this->form_validation->set_rules('email_address', 'Admin Email', 'is_unique[admins.admin_email]|valid_email|xss_clean');
		$this->form_validation->set_rules('password', 'Password', 'required|xss_clean');
		$this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|xss_clean');
	
		
		//if form has been submitted
		if ($this->form_validation->run() == FALSE)
		{
			$validation_errors = validation_errors();

			$this->session->unset_userdata('error_message');
			$this->session->set_userdata('error_message', $validation_errors);		
		}
		
		else
		{
			// check if the two passwords  match

			if($this->input->post('password') == $this->input->post('confirm_password'))
			{
				$visit_data = array('admin_first_name'=>$this->input->post('first_name'),
										'admin_other_names'=>$this->input->post('other_names'),
										'admin_email'=>$this->input->post('email_address'),
										'admin_password'=>md5($this->input->post('password'))
										);
				if($this->db->insert('admins', $visit_data))
				{
					$this->session->unset_userdata('success_message');
					$this->session->set_userdata('success_message', 'Your account has been successfully created. Please login to get started with OMNIS <a href="'.site_url().'sign-in">Sign in</a>');		
				}
				else
				{
					$this->session->unset_userdata('error_message');
					$this->session->set_userdata('error_message', 'Something went wrong. Please try again');	
				}
				
			}
			else
			{
				$this->session->unset_userdata('error_message');
				$this->session->set_userdata('error_message', 'Password do not match');	
			}
		}

		$v_data['title'] = 'Account';
		$v_data['class'] = '';
		$v_data['content'] = $this->load->view("account", $data, TRUE);
		
		$this->load->view("includes/templates/general", $v_data);
	}
	public function create_new_company()
	{

	}
	public function sign_in()
	{
		$data['contacts'] = $this->site_model->get_contacts();

		//form validation rules
		$this->form_validation->set_rules('admin_email', 'Admin Email', 'required|xss_clean|exists[admins.admin_email]');
		$this->form_validation->set_rules('admin_password', 'Password', 'required|xss_clean');
		
		//if form has been submitted
		if ($this->form_validation->run())
		{
			// var_dump("sdakjsdha"); die();
			//check if user has valid login credentials
			if($this->site_model->validate_user())
			{				
				
				$this->session->set_userdata('success','You have successfully logged in');

				redirect('my-account');
			}
			
			else
			{				
				$this->session->set_userdata('login_error','The email or password provided is incorrect. Please try again');
				
			}
		}
		
		else
		{
			$validation_errors = validation_errors();
			$this->session->set_userdata('login_error',$validation_errors);
		}
		
		
		$v_data['title'] = 'Sign In';
		$v_data['class'] = '';
		$v_data['content'] = $this->load->view("sign_in", $data, TRUE);
		
		$this->load->view("includes/templates/general", $v_data);
	}
    
	public function gallery() 
	{
		$where = 'gallery.department_id = department.department_id AND gallery_status = 1';
		$segment = 2;
		$base_url = site_url().'gallery';
		
		$table = 'department, gallery';
		//pagination
		$this->load->library('pagination');
		$config['base_url'] = $base_url;
		$config['total_rows'] = $this->users_model->count_items($table, $where);
		$config['uri_segment'] = $segment;
		$config['per_page'] = 24;
		$config['num_links'] = 5;
		
		$config['full_tag_open'] = '<div class="wp-pagenavi">';
		$config['full_tag_close'] = '</div>';
		
		$config['next_link'] = 'Next';
		
		$config['prev_link'] = 'Prev';
		
		$config['cur_tag_open'] = '<span class="current">';
		$config['cur_tag_close'] = '</span>';
		$this->pagination->initialize($config);
		
		$page = ($this->uri->segment($segment)) ? $this->uri->segment($segment) : 0;
        $v_data["links"] = $this->pagination->create_links();
		$query = $this->site_model->get_all_gallerys($table, $where);
		
		if ($query->num_rows() > 0)
		{
			$v_data['gallery'] = $query;
			$v_data['page'] = $page;
			$v_data['title'] = 'Gallery';
			$v_data['gallery_departments'] = $this->site_model->get_gallery_departments($table, $where, $config["per_page"], $page);
			$v_data['gallery_location'] = $this->gallery_location;
			$data['content'] = $this->load->view('gallery/gallery_list', $v_data, true);
		}
		
		else
		{
			$data['content'] = '<p>There are no pictures posted yet</p>';
		}
		$data['title'] = 'Gallery';
		$this->load->view("includes/templates/general", $data);
	}
	
	public function departments() 
	{
		$where = 'department_status = 1';
		$segment = 2;
		$base_url = base_url().'departments';
		
		$table = 'department';
		//pagination
		$this->load->library('pagination');
		$config['base_url'] = $base_url;
		$config['total_rows'] = $this->users_model->count_items($table, $where);
		$config['uri_segment'] = $segment;
		$config['per_page'] = 20;
		$config['num_links'] = 5;
		
		$config['full_tag_open'] = '<div class="wp-pagenavi">';
		$config['full_tag_close'] = '</div>';
		
		$config['next_link'] = 'Next';
		
		$config['prev_link'] = 'Prev';
		
		$config['cur_tag_open'] = '<span class="current">';
		$config['cur_tag_close'] = '</span>';
		$this->pagination->initialize($config);
		
		$page = ($this->uri->segment($segment)) ? $this->uri->segment($segment) : 0;
        $v_data["links"] = $this->pagination->create_links();
		$query = $this->departments_model->get_all_departments($table, $where, $config["per_page"], $page);
		
		if ($query->num_rows() > 0)
		{
			$v_data['query'] = $query;
			$v_data['page'] = $page;
			$v_data['title'] = 'Departments';
			$data['content'] = $this->load->view('departments/department_list', $v_data, true);
		}
		
		else
		{
			$data['content'] = '<p>There are no departments posted yet</p>';
		}
		$data['title'] = 'Departments';
		$this->load->view("includes/templates/general", $data);
	}

	/*
	*
	*	Add a new comment
	*
	*/
	public function add_new_account() 
	{
		//form validation rules
		$this->form_validation->set_rules('company_name', 'Company Name', 'required|xss_clean');
		$this->form_validation->set_rules('company_email', 'Company Email', 'is_unique[companies.company_email]|valid_email|xss_clean');
		$this->form_validation->set_rules('phone_number', 'Company Phone', 'required|xss_clean');

	
		
		//if form has been submitted
		if ($this->form_validation->run() == FALSE)
		{
			$validation_errors  = validation_errors();

			$this->session->unset_userdata('error_message');
			$this->session->set_userdata('error_message', $validation_errors);
		}
		
		else
		{
			// check if the two passwords  match
			$company_id = $this->site_model->add_company();
			if($company_id > 0)
			{				
				$admin_id = $this->db->insert_id();
				// insert into the company admin
				$company_admin = array('company_id'=>$company_id,
									   'admin_id'=>$this->session->userdata('admin_id')									
									  );
				if($this->db->insert('company_admin', $company_admin))
				{
					$company_admin_id = $this->db->insert_id();
					// success now create the folder you were talking about
				
					$this->site_model->perform_company_creation($company_admin_id);

					$this->session->unset_userdata('success_message');
					$this->session->set_userdata('success_message', 'Please check your email for more information about your account creation');

					redirect('my-account');	
				}
				else
				{
					$this->session->unset_userdata('error_message');
					$this->session->set_userdata('error_message', 'Something went wrong. Please try again');
				}
			}
			
			else
			{
				$this->session->unset_userdata('error_message');
					$this->session->set_userdata('error_message', 'Something went wrong. Please try again');
			}			
		}
		$data['contacts'] = $this->site_model->get_contacts();

		$v_data['title'] = 'Account';
		$v_data['class'] = '';
		$v_data['content'] = $this->load->view("create_new_account", $data, TRUE);
		
		$this->load->view("includes/templates/general", $v_data);
		
	}
	public function perform_company_creation()
	{
		$this->site_model->perform_company_creation(1);
	}

	public function login_account()
	{
		//form validation rules
		$this->form_validation->set_rules('admin_email', 'Email', 'required|xss_clean|exists[admins.admin_email]');
		$this->form_validation->set_rules('admin_password', 'Password', 'required|xss_clean');
		
		//if form has been submitted
		if ($this->form_validation->run())
		{
			var_dump("sdakjsdha"); die();
			//check if user has valid login credentials
			if($this->site_model->validate_user())
			{				
				
				$this->session->set_userdata('success','You have successfully logged in');

				redirect('my-account');
			}
			
			else
			{				
				$this->session->set_userdata('login_error','The email or password provided is incorrect. Please try again');
				
			}
		}
		
		else
		{
			$this->session->set_userdata('login_error','The email or password provided is incorrect. Please try again');
		}
		

	}

	public function my_account()
	{

		$data['contacts'] = $this->site_model->get_contacts();
		$data['my_accounts'] = $this->site_model->get_my_accounts();
		$v_data['title'] = 'Account';
		$v_data['class'] = '';
		$v_data['content'] = $this->load->view("user_account", $data, TRUE);
		
		$this->load->view("includes/templates/general", $v_data);

	}
	public function logout_admin()
	{
		$this->session->sess_destroy();
		redirect('sign-in');
	}

	public function send_email()
	{
		$response = $this->site_model->send_account_message('Hello Martin','marttkip@gmail.com');

		var_dump($response);
	}

}