<?php

class Site_model extends CI_Model 
{
	public function get_slides()
	{
  		$table = "slideshow";
		$where = "slideshow_status = 1";
		
		$this->db->where($where);
		$query = $this->db->get($table);
		
		return $query;
	}
	
	public function get_services($table, $where, $limit = NULL)
	{
		$this->db->where($where);
		$this->db->select('service.*, department.department_name');
		if($limit != NULL)
		{
			$this->db->order_by('last_modified', 'RANDOM');
			$query = $this->db->get($table, $limit);
		}
		
		else
		{
			$this->db->order_by('service_name', 'ASC');
			$query = $this->db->get($table);
		}
		
		return $query;
	}
	
	public function get_departments()
	{
  		$table = "department";
		$where = "department_status = 1";
		
		$this->db->where($where);
		$this->db->order_by('department_name');
		$query = $this->db->get($table);
		
		return $query;
	}

	public function validate_user()
	{
			//select the user by email from the database
		$this->db->select('*');
		$this->db->where(array('admin_email' => $this->input->post('admin_email'), 'admin_status' => 1, 'admin_password' => md5($this->input->post('admin_password'))));
		$query = $this->db->get('admins');
		
		//if users exists
		if ($query->num_rows() > 0)
		{
			$result = $query->result();
			//create user's login session
			$newdata = array(
                   'login_status'     => TRUE,
                   'admin_first_name'     => $result[0]->admin_first_name,
                   'admin_email'     => $result[0]->admin_email,
                   'admin_id'  => $result[0]->admin_id
               );

			$this->session->set_userdata($newdata);
			
			//update user's last login date time
			return TRUE;
		}
		
		//if user doesn't exist
		else
		{
			return FALSE;
		}
	}
	
	public function get_gallery_departments()
	{
  		$table = "department, gallery";
		$where = "department.department_status = 1 AND gallery.department_id = department.department_id";
		
		$this->db->where($where);
		$this->db->group_by('department_name');
		$this->db->order_by('department_name');
		$query = $this->db->get($table);
		
		return $query;
	}
	
	public function get_all_gallerys($table, $where)
	{
		//retrieve all gallerys
		$this->db->from($table);
		$this->db->select('*');
		$this->db->where($where);
		$this->db->order_by('department.department_name');
		$query = $this->db->get();
		
		return $query;
	}
	
	public function get_gallery_services()
	{
  		$table = "service, gallery";
		$where = "gallery.gallery_status = 1 AND service.service_status = 1 AND gallery.service_id = service.service_id";
		
		$this->db->select('DISTINCT(service.service_name), service.service_id');
		$this->db->where($where);
		$query = $this->db->get($table);
		
		return $query;
	}
	
	public function get_service($service_name)
	{
  		$table = "service";
		$where = array('service_name' => $service_name);
		
		$this->db->where($where);
		$query = $this->db->get($table);
		
		return $query;
	}
	
	public function get_jobs()
	{
  		$table = "jobs";
		$where = "job_status = 1";
		
		$this->db->where($where);
		$query = $this->db->get($table);
		
		return $query;
	}
	
	public function get_loans()
	{
  		$table = "loans";
		
		$query = $this->db->get($table);
		
		return $query;
	}
	
	public function get_contacts()
	{
  		$table = "contacts";
		
		$query = $this->db->get($table);
		$contacts = array();
		if($query->num_rows() > 0)
		{
			$row = $query->row();
			$contacts['email'] = $row->email;
			$contacts['phone'] = $row->phone;
			$contacts['facebook'] = $row->facebook;
			$contacts['twitter'] = $row->twitter;
			$contacts['linkedin'] = $row->pintrest;
			$contacts['company_name'] = $row->company_name;
			$contacts['logo'] = $row->logo;
			$contacts['address'] = $row->address;
			$contacts['city'] = $row->city;
			$contacts['post_code'] = $row->post_code;
			$contacts['building'] = $row->building;
			$contacts['floor'] = $row->floor;
			$contacts['location'] = $row->location;
			$contacts['working_weekend'] = $row->working_weekend;
			$contacts['working_weekday'] = $row->working_weekday;
			$contacts['mission'] = $row->mission;
			$contacts['vision'] = $row->vision;
			$contacts['motto'] = $row->motto;
			$contacts['about'] = $row->about;
			$contacts['objectives'] = $row->objectives;
			$contacts['core_values'] = $row->core_values;
		}
		return $contacts;
	}
	
	public function limit_text($text, $limit) 
	{
		$pieces = explode(" ", $text);
		$total_words = count($pieces);
		
		if ($total_words > $limit) 
		{
			$return = "<i>";
			$count = 0;
			for($r = 0; $r < $total_words; $r++)
			{
				$count++;
				if(($count%$limit) == 0)
				{
					$return .= $pieces[$r]."</i><br/><i>";
				}
				else{
					$return .= $pieces[$r]." ";
				}
			}
		}
		
		else{
			$return = "<i>".$text;
		}
		return $return.'</i><br/>';
    }
	
	public function get_navigation()
	{
		$page = explode("/",uri_string());
		$total = count($page);
		
		$name = strtolower($page[0]);
		
		$home = '';
		$about = '';
		$services = '';
		$departments = '';
		$blog = '';
		$contact = '';
		$gallery = '';
		
		if($name == 'home')
		{
			$home = 'active';
		}
		
		if($name == 'about')
		{
			$about = 'active';
		}
		
		if($name == 'services')
		{
			$services = 'active';
		}
		
		if($name == 'departments')
		{
			$departments = 'active';
		}
		
		if($name == 'blog')
		{
			$blog = 'active';
		}
		
		if($name == 'contact-us')
		{
			$contact = 'active';
		}
		
		if($name == 'gallery')
		{
			$gallery = 'active';
		}
		
		//get departments
		$query = $this->get_active_departments();
		$sub_menu_services = '';
		if($query->num_rows() > 0)
		{
			foreach($query->result() as $res)
			{
				$department_name = $res->department_name;
				$web_name = $this->create_web_name($department_name);
				$sub_menu_services .= '<li><a href="'.site_url().'services/'.$web_name.'">'.$department_name.'</a></li>';
			}
		}
		
		$navigation = 
		'
			<li class="'.$home.'"><a href="'.site_url().'home">Home</a></li>
			<li class="'.$departments.'"><a href="'.site_url().'departments">Departments</a></li>
			<li class="'.$services.'">
				<a href="'.site_url().'services">Services</a>
				<ul>
					'.$sub_menu_services.'
				</ul>
			</li>
			<li class="'.$gallery.'"><a href="'.site_url().'gallery">Gallery</a></li>
			<li class="'.$blog.'"><a href="'.site_url().'blog">Blog</a></li>
			<li class="'.$about.'"><a href="'.site_url().'about-us">About us</a></li>
			<li class="'.$contact.'"><a href="'.site_url().'contact-us">Contact</a></li>
			
		';
		
		return $navigation;
	}
	
	public function get_navigation_footer()
	{
		$page = explode("/",uri_string());
		$total = count($page);
		
		$name = strtolower($page[0]);
		
		$home = '';
		$about = '';
		$services = '';
		$departments = '';
		$blog = '';
		$contact = '';
		$gallery = '';
		
		if($name == 'home')
		{
			$home = 'active';
		}
		
		if($name == 'about')
		{
			$about = 'active';
		}
		
		if($name == 'services')
		{
			$services = 'active';
		}
		
		if($name == 'departments')
		{
			$departments = 'active';
		}
		
		if($name == 'blog')
		{
			$blog = 'active';
		}
		
		if($name == 'contact-us')
		{
			$contact = 'active';
		}
		
		if($name == 'gallery')
		{
			$gallery = 'active';
		}
		
		$navigation = 
		'
			<li><a href="'.site_url().'home" class="'.$home.'">Home</a></li>
			<li><a href="'.site_url().'departments" class="'.$departments.'">Departments</a></li>
			<li><a href="'.site_url().'services" class="'.$services.'">Services</a></li>
			<li><a href="'.site_url().'gallery" class="'.$gallery.'">Gallery</a></li>
			<li><a href="'.site_url().'blog" class="'.$blog.'">Blog</a></li>
			<li><a href="'.site_url().'about-us" class="'.$about.'">About us</a></li>
			<li><a href="'.site_url().'contact-us" class="'.$contact.'">Contact</a></li>
			
		';
		
		return $navigation;
	}
	
	public function create_web_name($field_name)
	{
		$web_name = str_replace(" ", "-", $field_name);
		
		return $web_name;
	}
	
	public function decode_web_name($web_name)
	{
		$field_name = str_replace("-", " ", $web_name);
		
		return $field_name;
	}
	
	public function get_breadcrumbs()
	{
		$page = explode("/",uri_string());
		$total = count($page);
		$last = $total - 1;
		$crumbs = '<li><a href="'.site_url().'home">HOME </a></li>';
		
		for($r = 0; $r < $total; $r++)
		{
			$name = $this->decode_web_name($page[$r]);
			if($r == $last)
			{
				$crumbs .= '<li><i class="fa fa-angle-right"></i></li>
                        <li>'.strtoupper($name).'</li>';
			}
			else
			{
				if($total == 3)
				{
					if($r == 1)
					{
						$crumbs .= '<li><i class="fa fa-angle-right"></i></li>
                        <li><a href="'.site_url().$page[$r-1].'/'.strtolower($name).'">'.strtoupper($name).'</a></li>';
					}
					else
					{
						$crumbs .= '<li><i class="fa fa-angle-right"></i></li>
							<li><a href="'.site_url().strtolower($name).'">'.strtoupper($name).'</a></li>';
					}
				}
				else
				{
					$crumbs .= '<li><i class="fa fa-angle-right"></i></li>
                        <li><a href="'.site_url().strtolower($name).'">'.strtoupper($name).'</a></li>';
				}
			}
		}
		
		return $crumbs;
	}
	
	public function get_active_departments()
	{
  		$table = "service, department";
		$where = "department.department_status = 1 AND service.department_id = department.department_id";
		
		$this->db->select('department.*');
		$this->db->where($where);
		$this->db->group_by('department_name');
		$this->db->order_by('department_name', 'ASC');
		$query = $this->db->get($table);
		
		return $query;
	}

	/*
	*	Add a new post
	*	@param string $image_name
	*
	*/
	public function add_company()
	{
		$company_name = $this->input->post('company_name');
		$company_name = str_replace(' ','',$company_name);
		$company_name = preg_replace('/[^A-Za-z\-]/', '', $company_name);
		
		$folder_name = strtolower($company_name);

		if (!file_exists('/home/omniscok/public_html/'.$folder_name)) {
	    	
	    
		// check if company exist
			$table = "service, department";
			$where = "department.department_status = 1 AND service.department_id = department.department_id";
			
			$this->db->select('*');
			$this->db->where('concat_company = "'.$folder_name.'"');
			$query = $this->db->get('companies');
			if($query->num_rows() > 0)
			{
				return FALSE;
			}
			else
			{
				$url = base_url().''.$folder_name;
				$data = array(
						'company_name'=>ucwords(strtolower($this->input->post('company_name'))),
						'company_postal_address'=>$this->input->post('postal_address'),
						'company_postal_code'=>$this->input->post('postal_code'),
						'company_city'=>$this->input->post('city'),
						'company_phone_number'=>$this->input->post('phone_number'),
						'company_email'=>$this->input->post('company_email'),
						'concat_company'=>$folder_name,
						'company_web_url'=>$url,
						'company_status'=>1
					);

				if($this->db->insert('companies', $data))
				{
					$company_id = $this->db->insert_id();
					mkdir('/home/omniscok/public_html/'.$folder_name.'', 0777, true);
					return $company_id;
				}
				else{
					return FALSE;
				}
			}

			
		}
	}
	public function perform_company_creation($company_admin_id)
	{
		// get company data 
		$table = "company_admin,companies,admins";
		$where = "companies.company_id = .company_admin.company_id AND admins.admin_id = company_admin.admin_id AND company_admin.company_admin_id =".$company_admin_id;
		
		$this->db->select('*');
		$this->db->where($where);
		$this->db->group_by('company_name');
		$query = $this->db->get($table);

		if($query->num_rows() > 0)
		{
			foreach ($query->result() as $items_key) {
				# code...
				$company_id = $items_key->company_id;
				$company_name = $items_key->company_name;
				$admin_first_name = $items_key->admin_first_name;
				$admin_other_names = $items_key->admin_other_names;
				$company_email = $items_key->company_email;
				$company_phone_number = $items_key->company_phone_number;
				$admin_email = $items_key->admin_email;
				$folder_name = $items_key->concat_company;
			}

			// start the process

			// get the link to pass
			// $company_array = explode(' ',$company_name);
			// $folder_name = strtolower($company_array[0]);

			$company_user = $this->get_random_string($folder_name, 7);

			$zip = new ZipArchive;
			$res = $zip->open('/home/omniscok/public_html/human_resource.zip');
			// var_dump($res); die();

			if ($res === TRUE) {
								
					$zip->extractTo('/home/omniscok/public_html/'.$folder_name);
					$zip->close();

					// change config file
					$file = '/home/omniscok/public_html/'.$folder_name.'/application/config/config.php';

					file_put_contents($file,str_replace("\$config['base_url'] = 'http://localhost/human_resource/';","\$config['base_url'] = '".base_url()."".$folder_name."/';",file_get_contents($file)));

					file_put_contents($file,str_replace("\$config['encryption_key'] = 'OHCOSHODPKISIIAMMTSBOMNISERP2015';","\$config['encryption_key'] = '".base_url()."".$folder_name."';",file_get_contents($file)));

					

					// super user rights
					

					// change the database connection
					$database_file = '/home/omniscok/public_html/'.$folder_name.'/application/config/database.php';

					file_put_contents(
						$database_file,
						str_replace(
							"\$db['default']['username'] = 'root';",
							"\$db['default']['username'] = 'omniscok_".$company_user."';",
							file_get_contents($database_file)
						)
					);
					
					file_put_contents(
						$database_file,
						str_replace(
							"\$db['default']['password'] = '';",
							"\$db['default']['password'] = 'r6r5bb!!';",
							file_get_contents($database_file)
						)
					);
					file_put_contents(
						$database_file,
						str_replace(
							"\$db['default']['database'] = 'human_resource';",
							"\$db['default']['database'] = 'omniscok_".$folder_name."';",
							file_get_contents($database_file)
						)
					);
					
					// accessing files in cpanel 

					$opts['user'] = 'omniscok';
					$opts['pass'] = 'N2birBw308';

					$xmlapi = new xmlapi("omnis.co.ke");   
					$xmlapi->set_port( 2083 );   
					$xmlapi->password_auth($opts['user'],$opts['pass']);    
					$xmlapi->set_debug(0);//output actions in the error log 1 for true and 0 false 

					$cpaneluser=$opts['user'];
					$databasename= $folder_name;
					$databaseuser= $company_user;
					$databasepass= 'r6r5bb!!';

					//create database    
					$createdb = $xmlapi->api1_query($cpaneluser, "Mysql", "adddb", array($databasename));   
					//create user 
					$usr = $xmlapi->api1_query($cpaneluser, "Mysql", "adduser", array($databaseuser, $databasepass));   
					//add user 
					$addusr = $xmlapi->api1_query($cpaneluser, "Mysql", "adduserdb", array("".$cpaneluser."_".$databasename."", "".$cpaneluser."_".$databaseuser."", 'all'));


					$target_db = $cpaneluser.'_'.$folder_name;
					$source_db = 'omniscok_hrparent';

					// Get names of all tables in source database
					// Loading second db and running query.
					$CI = &get_instance();
					//setting the second parameter to TRUE (Boolean) the function will return the database object.
					$this->db2 = $CI->load->database('db2', TRUE);
					$query = $this->db2->query("show tables");
							

					foreach ($query->result() as $key) {
						$name=$key->Tables_in_omniscok_hrparent;
						$sql = "show create table `".$name."`";
						
						$this_result= $this->db2->query($sql);
						foreach ($this_result->result() as  $value) {
							$item = 'Create Table';
							
						}
						$newstr = str_replace('CREATE TABLE ', 'CREATE TABLE '.$target_db.'.', $value->$item);
						$tables[]=array('name'=>$name,'query'=>$newstr);
					}

					$CI = &get_instance();
					$this->db3 = $CI->load->database('db3', TRUE);
					$total=count($tables);
					for($i=0;$i < $total;$i++){
						$name=$tables[$i]['name'];
						$q=$tables[$i]['query'];
						
						$insert_sql = "insert into $target_db.$name select * from $source_db.$name";
						
						$this->db3->query($q);
						$this->db3->query($insert_sql);
					}
					// truncate table branch and also table personnel

					$truncate_branch = 'TRUNCATE TABLE '.$target_db.'.branch';
					$this->db3->query($truncate_branch);

					$truncate_personnel = 'TRUNCATE TABLE '.$target_db.'.personnel';
					$this->db3->query($truncate_personnel);

					$truncate_personnel = 'TRUNCATE TABLE '.$target_db.'.personnel_section';
					$this->db3->query($truncate_personnel);

					//$password = $this->generateRandomString(8);
					//$company_code = get_random_string($folder_name,4);

					// insert into company
					
					$this->db3->query('INSERT INTO '.$target_db.'.branch (branch_email,branch_phone,branch_name,branch_image_name,branch_thumb_name,branch_status,branch_code) VALUES("'.$company_email.'","'.$company_phone_number.'","'.$company_name.'","","",1,"OMN")');
					// $branch_id = $this->db3->insert_id();
					
					$this->db3->query('INSERT INTO '.$target_db.'.personnel (personnel_onames,personnel_fname,personnel_email,personnel_username,personnel_password,personnel_status,branch_id) VALUES("'.$admin_other_names.'","'.$admin_first_name.'","'.$admin_email.'","'.$admin_email.'","'.md5(123456).'",1,1)');

					$this->db3->query('INSERT INTO '.$target_db.'.`personnel_section` ( `personnel_id`, `section_id`, `created_by`, `modified_by`, `created`, `deleted`, `deleted_on`, `deleted_by`) VALUES(1, 14, 0, 0, "'.date('Y-m-d H:i:s').'", 0, NULL, NULL)');

					$this->db3->query('INSERT INTO '.$target_db.'.`personnel_section` ( `personnel_id`, `section_id`, `created_by`, `modified_by`, `created`, `deleted`, `deleted_on`, `deleted_by`) VALUES(1, 19, 1, 1, "'.date('Y-m-d H:i:s').'", 0, NULL, NULL)');

					$this->db3->query('INSERT INTO '.$target_db.'.`personnel_section` ( `personnel_id`, `section_id`, `created_by`, `modified_by`, `created`, `deleted`, `deleted_on`, `deleted_by`) VALUES(1, 127, 1, 1, "'.date('Y-m-d H:i:s').'", 0, NULL, NULL)');



					// created a username 
					// $url = base_url().''.$folder_name;

					// $company_items = array('company_web_url' => $url);
					// $this->db->where('company_id',$company_id);
					// $this->db->update('companies',$company_items);
				

					// create a username: 
					$message = "
								<p>Welcome ".$admin_first_name." ".$admin_other_names."</p>
								<p>You company account ".$folder_name." has been created successfull, you may log in to application using the following credentials:</p>
								<ol>
									<li>
										<strong>URL : </strong> ".base_url()."".$folder_name." 
									</li>
									<li>
										<strong>Username : </strong> ".$folder_name."
									</li>
									<li>
										<strong>Password : </strong> 123456
									</li>
								</ol>
								<p>For any questions please feel free to drop an email to info@omnis.co.ke </p>
								";

					// send an email to the admin with a username and password for the other system

					$this->send_account_message($message,$admin_email);
					return TRUE;
				
			} else {
				$message = "<p>Hello ".$admin_first_name." ".$admin_other_names."</p>
							<p>Sorry something went wrong. Please try again to create your account</p>
							<p>For any questions please feel free to drop an email to info@omnis.co.ke </p>
							";
					// send an email to the admin with a username and password for the other system
				$this->send_account_message($message,$admin_email);
			  return FALSE;
			}


		}
		else
		{
			$message = "<p>Hello ".$admin_first_name." ".$admin_other_names."</p>
							<p>Sorry something went wrong. Please try again to create your account</p>
							<p>For any questions please feel free to drop an email to info@omnis.co.ke </p>
							";
					// send an email to the admin with a username and password for the other system
			$this->send_account_message($message,$admin_email);
			return FALSE;
		}

		// get admin_data 
		
	}

	public function send_account_message($message,$admin_email)
	{
		//send mail to SUMC
			$subject = 'Omnis Account Opening';
			$message = '
			<p>'.$message.'</p>			
			';
			$sender_email = 'info@omnis.co.ke';
			$shopping = "";
			$from = 'Omnis Limited';
			
			$button = '';
			$response = $this->email_model->send_mandrill_mail($admin_email, "Hi ", $subject, $message, $sender_email, $shopping, $from, $button, $cc = NULL);	
			return $response;		
			
	}
	function generateRandomString($length) {
	    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	    $charactersLength = strlen($characters);
	    $randomString = '';
	    for ($i = 0; $i < $length; $i++) {
	        $randomString .= $characters[rand(0, $charactersLength - 1)];
	    }
	    return $randomString;
	}
	function get_random_string($valid_chars, $length)
	{
	    // start with an empty random string
	    $random_string = "";

	    // count the number of chars in the valid chars string so we know how many choices we have
	    $num_valid_chars = strlen($valid_chars);

	    // repeat the steps until we've created a string of the right length
	    for ($i = 0; $i < $length; $i++)
	    {
	        // pick a random number from 1 up to the number of valid chars
	        $random_pick = mt_rand(1, $num_valid_chars);

	        // take the random character out of the string of valid chars
	        // subtract 1 from $random_pick because strings are indexed starting at 0, and we started picking at 1
	        $random_char = $valid_chars[$random_pick-1];

	        // add the randomly-chosen char onto the end of our string so far
	        $random_string .= $random_char;
	    }

	    // return our finished random string
	    return $random_string;
	}
	public function get_my_accounts()
	{
		$where='admins.admin_id = company_admin.admin_id AND company_admin.company_id = companies.company_id AND company_admin.admin_id ='.$this->session->userdata('admin_id');
		$table = 'admins,companies,company_admin';
		$this->db->select('*');
		$this->db->where($where);
		$this->db->order_by('company_name');
		$query = $this->db->get($table);
		return $query;
	}
}
?>