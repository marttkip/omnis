<?php   if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Blog extends MX_Controller {
	
	function __construct()
	{
		parent:: __construct();
		$this->load->model('admin/users_model');
		$this->load->model('admin/blog_model');
		$this->load->model('site/site_model');
	}
    
	/*
	*
	*	Default action is to show all the posts
	*
	*/
	public function index($category = 0) 
	{
		$where = 'post.blog_category_id = blog_category.blog_category_id AND post.post_status = 1';
		$segment = 3;
		$base_url = base_url().'blog/'.$category;
		$page_title = 'Blog';
		if($category > 0)
		{
			$segment = 4;
			$base_url = base_url().'blog/category/'.$category;
			$where .= ' AND (blog_category.blog_category_id = '.$category.' OR blog_category.blog_category_parent = '.$category.')';
			$category_query = $this->blog_model->get_blog_category($category);
			$category_row = $category_query->row();
			$page_title = $category_row->blog_category_name;
		}
		$table = 'post, blog_category';
		//pagination
		$this->load->library('pagination');
		$config['base_url'] = $base_url;
		$config['total_rows'] = $this->users_model->count_items($table, $where);
		$config['uri_segment'] = $segment;
		$config['per_page'] = 5;
		$config['num_links'] = 5;
		$config['full_tag_open'] = '<ul class="pagination pagination-lg">';
		$config['full_tag_close'] = '</ul>';
		
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		
		$config['next_tag_open'] = '<li>';
		$config['next_link'] = 'Next Page<i class="fa fa-long-arrow-right"></i>';
		$config['next_tag_close'] = '</li>';
		
		$config['prev_tag_open'] = '<li>';
		$config['prev_link'] = '<i class="fa fa-long-arrow-left"></i>Previous Page';
		$config['prev_tag_close'] = '</li>';
		
		$config['cur_tag_open'] = '<li class="active"><a href="#">';
		$config['cur_tag_close'] = '</a></li>';
		
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$this->pagination->initialize($config);
		
		$page = ($this->uri->segment($segment)) ? $this->uri->segment($segment) : 0;
        $v_data["links"] = $this->pagination->create_links();
		$query = $this->blog_model->get_all_posts($table, $where, $config["per_page"], $page);
		
		if ($query->num_rows() > 0)
		{
			$v_data['query'] = $query;
			$v_data['page'] = $page;
			$v_data['page_title'] = $page_title;
			$data['content'] = $this->load->view('all_posts', $v_data, true);
		}
		
		else
		{
			$data['content'] = '<p>There are no posts</p>';
		}
		$data['title'] = 'Blog Posts';
		
		$this->load->view('templates/blog', $data);
	}
	
	public function view_post($post_id)
	{
		$this->blog_model->update_views_count($post_id);
		$query = $this->blog_model->get_post($post_id);
		$v_data['comments_query'] = $this->blog_model->get_post_comments($post_id);
		
		if ($query->num_rows() > 0)
		{
			$v_data['row'] = $query->row();
			$v_data['page_title'] = $v_data['row']->post_title;
			$data['content'] = $this->load->view('single_post', $v_data, true);
		}
		
		else
		{
			$data['content'] = 'Post not found';
		}
		$data['title'] = 'Blog Posts';
		
		$this->load->view('templates/blog', $data);
	}
    
	/*
	*
	*	Add a new comment
	*
	*/
	public function add_comment($post_id) 
	{
		//form validation rules
		$this->form_validation->set_rules('post_comment_description', 'Comment', 'required|xss_clean');
		$this->form_validation->set_rules('name', 'Name', 'required|xss_clean');
		$this->form_validation->set_rules('email', 'Email', 'valid_email|xss_clean');
		
		//if form has been submitted
		if ($this->form_validation->run() == FALSE)
		{
			$this->view_post($post_id);
		}
		
		else
		{
			if($this->blog_model->add_comment_user($post_id))
			{
				$this->session->set_userdata('success_message', 'Comment added successfully. Pending approval by admin');
				redirect('blog/post/'.$post_id);
			}
			
			else
			{
				$this->session->set_userdata('error_message', 'Could not add comment. Please try again');
				$this->view_post($post_id);
			}
		}
	}
}