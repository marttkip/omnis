<article id="login-welcome" >
	
</article>
<section id="content" class="a">

	<div class="row">
		<p><span class="small">My</span> <span class="strong">Omnis</span> Accounts <a href="<?php echo site_url();?>new-account">Add new account ?</a> </p>
		<?php
            $success = $this->session->userdata('success_message');

			if(!empty($success))
			{
				echo '<div class="alert alert-success"> <strong>Success!</strong> '.$success.' </div>';
				$this->session->unset_userdata('success_message');
			}
			
			$error = $this->session->userdata('error_message');
			
			if(!empty($error))
			{
				echo '<div class="alert alert-danger">'.$error.' </div>';
				$this->session->unset_userdata('error_message');
			}

        ?>
		<div class="col-md-10">
			
			<?php

				if($my_accounts->num_rows() > 0)
				{
					foreach ($my_accounts->result() as $key) {
						# code...
						$company_name = $key->company_name;
						$company_email = $key->company_email;
						$admin_first_name = $key->admin_first_name;
						$admin_other_names = $key->admin_other_names;
						$company_web_url = $key->company_web_url;
						?>
						<div class="article">
				
							<div class="column-left">
								<h5 class="title-item"><?php echo $company_name;?></h5>

							</div>

						   <div class="column-center">
						   		<strong>Admin Name: </strong><?php echo $admin_first_name.''.$admin_other_names;?><br/>
						   		<strong>Email Address :</strong> <?php echo $company_email;?>	<br/>		   		
						   		<strong>Package :</strong> Human Resource <br/>
						   </div>
						   <div class="column-right ">
						   		<a href="<?php echo $company_web_url;?>" target="_blank"><button >Go to site</button></a>
						   </div>
						</div>
						
						<?php
					}
				}
				else
				{
					echo '<div class="alert alert-danger">No accounts registered</div>';
				}
				?>
			
		</div>
		
	</div>
</section>