<article id="login-welcome" >

</article>

<section id="content" class="a">

	<article id="contact">

        <form action="<?php echo site_url();?>sign-up" method="post" >
        	<h5>Sign Up</h5>
        	
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
            	<div class="pull-left">
            		 <p >
	                    <label for="ca">First Name</label>
	                    <input type="text" id="ca" name="first_name" autocomplete="off" required>
	                </p>
            	</div>
            	<div class="pull-right">
            		<p >
                    <label for="cb">Other Names</label>
                    <input type="text" id="cb" name="other_names" autocomplete="off" required>
                </p>
            	</div>
               
                
                 <p>
                    <label for="cb">Email</label>
                    <input type="email" id="cb" name="email_address" autocomplete="off" required>
                </p>
                 <p>
                    <label for="cb">Password</label>
                    <input type="password" id="cb" name="password" autocomplete="off" required>
                </p>
                 <p>
                    <label for="cb">Confirm password</label>
                    <input type="password" id="cb" name="confirm_password" autocomplete="off" required>
                </p>
                <p><button type="submit">sign up</button></p>
            </fieldset>
            
	         <div class="pull-right">
	        	<a href="<?php echo site_url();?>sign-in">Already have an account ?</a>
	        </div>

        </form>
       
    </article>
</section>


