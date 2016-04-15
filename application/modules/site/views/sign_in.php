<article id="login-welcome" >

</article>
<section id="content" class="a">

	<article id="contact">

        <form action="<?php echo site_url();?>login-account" method="post">
        	<h5>LOGIN</h5>
        	<?php 
        	$login_error = $this->session->userdata('login_error');
			$this->session->unset_userdata('login_error');
			
			if(!empty($login_error))
			{
				echo '<div class="alert alert-danger">'.$login_error.'</div>';
			}
        	?>
        	
            <fieldset>
                <p>
                    <label for="ca">Email address</label>
                    <input type="email" id="ca" name="admin_email" autocomplete="off" required>
                </p>
                <p>
                    <label for="cb">Password</label>
                    <input type="password" id="cb" name="admin_password" autocomplete="off" required>
                </p>
                <p><button type="submit">login</button></p>
            </fieldset>
             <div class="pull-left">
	        	<a href="">Forgot password ?</a>
	        </div>
	         <div class="pull-right">
	        	<a href="<?php echo site_url();?>sign-up">Dont have an account sign in ?</a>
	        </div>

        </form>
       
    </article>
</section>