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
		

		$data = array(
					'company_name'=>ucwords(strtolower($this->input->post('company_name'))),
					'company_postal_address'=>$this->input->post('postal_address'),
					'company_postal_code'=>$this->input->post('postal_code'),
					'company_city'=>$this->input->post('city'),
					'company_phone_number'=>$this->input->post('phone_number'),
					'company_email'=>$this->input->post('company_email'),
					'company_status'=>1
				);

		if($this->db->insert('companies', $data))
		{
			$company_id = $this->db->insert_id();
			
			return $company_id;
		}
		else{
			return FALSE;
		}
	}
	public function perform_company_creation($company_id,$admin_id)
	{
		// get company data 
		$table = "company_admin,companies,admins";
		$where = "companies.company_id = .company_admin.company_id AND admins.admin_id = company_admin.admin_id";
		
		$this->db->select('*');
		$this->db->where($where);
		$this->db->group_by('company_name');
		$query = $this->db->get($table);

		if($query->num_rows() > 0)
		{
			foreach ($query->result() as $key) {
				# code...
				$company_id = $key->company_id;
				$company_name = $key->company_name;
				$admin_first_name = $key->admin_first_name;
				$admin_other_names = $key->admin_other_names;
				$company_email = $key->company_email;
				$company_phone_number = $key->company_phone_number;
				$admin_email = $key->admin_email;
			}

			// start the process

			// get the link to pass
			$company_array = explode(' ',$company_name);
			$folder_name = strtolower($company_array[0]);

			$company_user = substr($folder_name,0,7);

			$zip = new ZipArchive;
			$res = $zip->open(''.base_url().'inventory.zip');
			if ($res === TRUE) {
				$zip->extractTo(''.base_url().''.$folder_name);
				$zip->close();

				// change config file
				$file = ''.base_url().''.$folder_name.'\application/config.php';
				file_put_contents($file,str_replace('$config["base_url"] = "http://localhost/nefris/";','$config["base_url"] = "'.base_url().''.$folder_name.'/";',file_get_contents($file)));

				// change the database connection
				$database_file = ''.base_url().''.$folder_name.'\application/database.php';

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
						"\$db['default']['database'] = '';",
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
				$databasename= $databasename;
				$databaseuser= $company_user;
				$databasepass= 'r6r5bb!!';

				//create database    
				$createdb = $xmlapi->api1_query($cpaneluser, "Mysql", "adddb", array($databasename));   
				//create user 
				$usr = $xmlapi->api1_query($cpaneluser, "Mysql", "adduser", array($databaseuser, $databasepass));   
				//add user 
				$addusr = $xmlapi->api1_query($cpaneluser, "Mysql", "adduserdb", array("".$cpaneluser."_".$databasename."", "".$cpaneluser."_".$databaseuser."", 'all'));


				$source_db='omniscok_setson';
				$server='localhost';
				$user='omniscok_setson';
				$password='r6r5bb!!';

				$target_db='omniscok_inventory';
				$db2_server='localhost';
				$db2_user='omniscok_invento';
				$db2_password='r6r5bb!!';

				$user_main='omniscok';
				$password_main ='N2birBw308';

				$db_main = mysql_connect($server,$user_main,$password_main);

				$db1 = mysql_connect($server,$user,$password);
				mysql_select_db($source_db,$db1);

				// Get names of all tables in source database
				$result=mysql_query("show tables");
				while($row=mysql_fetch_array($result)){
					$name=$row[0];
					$this_result=mysql_query("show create table $name");
					$this_row=mysql_fetch_array($this_result);
					$tables[]=array('name'=>$name,'query'=>$this_row[1]);
				}

				// Connect target database to create and populate tables
				$db2 = mysql_connect($db2_server,$db2_user,$db2_password);
				mysql_select_db($target_db,$db2);

				$total=count($tables);
				for($i=0;$i < $total;$i++){
					$name=$tables[$i]['name'];
					$q=$tables[$i]['query'];
					
					$insert_sql = "insert into $target_db.$name select * from $source_db.$name";
					echo $insert_sql.'<hr>';
					mysql_query($q,$db2);

					mysql_query($insert_sql,$db_main);
				}

			} else {
			  echo 'doh!';
			}


		}
		else
		{
			return FALSE;
		}

		// get admin_data 
		
	}
}
?>