<article id="login-welcome" >
	
</article>
<section id="content" class="a">

	
	<article id="contact">

        <form action="<?php echo site_url();?>new-account" method="post" >
        <p>Company Registration <a href="<?php echo site_url();?>my-account">Back to profile</a> </p>
        	<!-- <h5>Sign Up</h5> -->
        	
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
            <fieldset>
        		 <p >
                    <label for="ca">Company Name</label>
                    <input type="text" id="ca" name="company_name" autocomplete="off" required>
                </p>
            	
            	<p >
                    <label for="cb">Company Email</label>
                    <input type="email" id="cb" name="company_email" autocomplete="off" required>
                </p>               
                
                 <p>
                    <label for="cb">Phone Number</label>
                    <input type="text" id="cb" name="phone_number" autocomplete="off" required>
                </p>
                
                <p><button type="submit">sign up</button></p>
            </fieldset>
            
	         <div class="pull-right">
	        	<a href="<?php echo site_url();?>sign-in">Already have an account ?</a>
	        </div>

        </form>
       
    </article>
	
</section>