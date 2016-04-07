<?php
		
		$result = '<a href="'.site_url().'administration/add-job" class="btn btn-success pull-right">Add job</a>';
		
		//if users exist display them
		if ($jobs->num_rows() > 0)
		{
			$count = $page;
			
			$result .= 
			'
				<table class="table table-hover table-bordered ">
				  <thead>
					<tr>
					  <th>#</th>
					  <th><a href="'.site_url().'administration/all-jobs/jobs.created/'.$order_method.'/'.$page.'">Created</a></th>
					  <th><a href="'.site_url().'administration/all-jobs/jobs.last_modified/'.$order_method.'/'.$page.'">Last modified</a></th>
					  <th><a href="'.site_url().'administration/all-jobs/jobs.job_title/'.$order_method.'/'.$page.'">Job title</a></th>
					  <th><a href="'.site_url().'administration/all-jobs/jobs.job_status/'.$order_method.'/'.$page.'">Status</a></th>
					  <th colspan="5">Actions</th>
					</tr>
				  </thead>
				  <tbody>
			';
			
			foreach ($jobs->result() as $row)
			{
				$job_id = $row->job_id;
				$job_title = $row->job_title;
				$job_status = $row->job_status;
				$job_description = $row->job_description;
				$created = $row->created;
				$last_modified = $row->last_modified;
				
				//create deactivated status display
				if($job_status == 0)
				{
					$status = '<span class="label label-important">Deactivated</span>';
					$button = '<a class="btn btn-info" href="'.site_url().'administration/activate-job/'.$job_id.'/'.$job_id.'" onclick="return confirm(\'Do you want to activate '.$job_title.'?\');">Activate</a>';
				}
				//create activated status display
				else if($job_status == 1)
				{
					$status = '<span class="label label-success">Active</span>';
					$button = '<a class="btn btn-default" href="'.site_url().'administration/deactivate-job/'.$job_id.'/'.$job_id.'" onclick="return confirm(\'Do you want to deactivate '.$job_title.'?\');">Deactivate</a>';
				}
				
				$count++;
				$result .= 
				'
					<tr>
						<td>'.$count.'</td>
						<td>'.date('jS M Y H:i a',strtotime($created)).'</td>
						<td>'.date('jS M Y H:i a',strtotime($last_modified)).'</td>
						<td>'.$job_title.'</td>
						<td>'.$status.'</td>
						<td>'.$button.'</td>
						<td>
							<!-- Button to trigger modal -->
							<a href="#user'.$job_id.'" class="btn btn-primary" data-toggle="modal">View</a>
							
							<!-- Modal -->
							<div id="user'.$job_id.'" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
											<h4 class="modal-title">'.$job_title.'</h4>
										</div>
										
										<div class="modal-body">
											'.$job_description.'
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-default" data-dismiss="modal" aria-hidden="true">Close</button>
											<a href="'.site_url().'administration/edit-job/'.$job_id.'/'.$job_id.'" class="btn btn-sm btn-success">Edit</a>
										</div>
									</div>
								</div>
							</div>
						</td>
						<td><a href="'.site_url().'administration/edit-job/'.$job_id.'/'.$job_id.'" class="btn btn-sm btn-success">Edit</a></td>
						<td><a href="'.site_url().'administration/delete-job/'.$job_id.'/'.$job_id.'" class="btn btn-sm btn-danger" onclick="return confirm(\'Do you really want to delete '.$job_title.'?\');">Delete</a></td>
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
			$result .= "There are no jobs";
		}
		
		echo $result;
?>