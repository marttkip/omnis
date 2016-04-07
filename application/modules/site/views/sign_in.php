<article id="login-welcome" >

</article>
<section id="content" class="a">

	<!-- multistep form -->
	<form id="msform">

	  <fieldset>

	    <h2 class="fs-title">Login</h2>
	    <h3 class="fs-subtitle"></h3>
	    <div class="row">
	    	<input type="email" id="email_address" name="email_address" placeholder="Email Address" required />
		    <input type="password" id="password" name="password" placeholder="Password" required />
		    <div class="pull-right">
				<input type="submit" name="login" id="login" class="next action-button" value="Login" />
			</div>
	    </div>
	    
	  
	    <div class="row"  style="margin-top:90px; ">
			<div class="pull-left">
				<a href="#">Forgot Password ?</a>
			</div>
			<div class="pull-right">
				<a href="<?php echo base_url();?>sign-up"> Dont have an account. Sign up?</a>
			</div>
		</div>
		
	  </fieldset>
	</form>
</section>