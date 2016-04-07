<?php	
		$result = '<a href="'.site_url().'add-user" class="btn btn-success pull-right">Add Administrator</a>';
		$success = $this->session->userdata('success_message');
		
		if(!empty($success))
		{
			echo '<div class="alert alert-success"> <strong>Success!</strong> '.$success.' </div>';
			$this->session->unset_userdata('success_message');
		}
		
		$error = $this->session->userdata('error_message');
		
		if(!empty($error))
		{
			echo '<div class="alert alert-danger"> <strong>Oh snap!</strong> '.$error.' </div>';
			$this->session->unset_userdata('error_message');
		}
		
		//if users exist display them
		if ($users->num_rows() > 0)
		{
			$count = $page;
			
			$result .= 
			'
				<table class="table table-hover table-bordered ">
				  <thead>
					<tr>
					  <th>#</th>
					  <th>Name</th>
					  <th>Date Created</th>
					  <th>Last Login</th>
					  <th>Status</th>
					  <th colspan="5">Actions</th>
					</tr>
				  </thead>
				  <tbody>
			';
			foreach ($users->result() as $row)
			{
				$user_id = $row->user_id;
				$fname = $row->first_name;
				//create deactivated status display
				if($row->activated == 0)
				{
					$status = '<span class="label label-important">Deactivated</span>';
					$button = '<a class="btn btn-info" href="'.site_url().'activate-user/'.$user_id.'" onclick="return confirm(\'Do you want to activate '.$fname.'?\');">Activate</a>';
				}
				//create activated status display
				else if($row->activated == 1)
				{
					$status = '<span class="label label-success">Active</span>';
					$button = '<a class="btn btn-info" href="'.site_url().'deactivate-user/'.$user_id.'" onclick="return confirm(\'Do you want to deactivate '.$fname.'?\');">Deactivate</a>';
				}
				$count++;
				$result .= 
				'
					<tr>
						<td>'.$count.'</td>
						<td>'.$row->first_name.' '.$row->other_names.'</td>
						<td>'.date('jS M Y H:i a',strtotime($row->created)).'</td>
						<td>'.date('jS M Y H:i a',strtotime($row->last_login)).'</td>
						<td>'.$status.'</td>
						<td><a href="'.site_url().'edit-user/'.$user_id.'" class="btn btn-sm btn-success">Edit</a></td>
						<td>'.$button.'</td>
						<td><a href="'.site_url().'reset-user-password/'.$user_id.'" class="btn btn-sm btn-warning" onclick="return confirm(\'Do you want to reset '.$fname.'\'s password?\');">Reset Password</a></td>
						<td><a href="'.site_url().'delete-user/'.$user_id.'" class="btn btn-sm btn-danger" onclick="return confirm(\'Do you really want to delete '.$fname.'?\');">Delete</a></td>
					</tr> 
				';
			}
			
			$result .= 
			'
						  </tbody>
						</table>
			';
		}
		
		else
		{
			$result .= "There are no users";
		}
		
		echo $result;
?>