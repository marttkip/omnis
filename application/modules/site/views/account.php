<article id="login-welcome" >

</article>
<section id="content" class="a">
	<!-- multistep form -->
	<form id="msform" style="height:600px;">
	  <!-- progressbar -->
	  <ul id="progressbar">
	    <li class="active">Company Details</li>
	    <li>User Profile</li>
	    <li>Complete Sign up</li>
	  </ul>
	  <!-- fieldsets -->
	  <fieldset>

	    <h2 class="fs-title">Company Details</h2>
	    <h3 class="fs-subtitle">This is step 1</h3>
	    <div class="row">
	    	<input type="text" id="company_name" placeholder="Company name" required />
		  <!--   <input type="text" id="postal_address" placeholder="Postal Address" required />
		    <input type="text" id="postal_code" placeholder="Postal Code" required />
		    <input type="text" id="location" placeholder="Location" required />
		    <input type="text" id="city" placeholder="City" required/> -->
		    <input type="text" id="company_email" placeholder="Company email" required/>
		    <input type="text" id="phone_number" placeholder="Phone Number" required/>
	    	
	    	
	    </div>
	  
	    <input type="button" name="next" class="next action-button" value="Next" />
	  </fieldset>
	  <fieldset>
	    <h2 class="fs-title">User Profile</h2>
	    <h3 class="fs-subtitle">Your presence on the social network</h3>
	    <input type="text" id="first_name" placeholder="First name" autocomplete="off" />
	    <input type="text" id="other_names" placeholder="Other names" autocomplete="off" />
	    <input type="email" id="email" placeholder="Email" autocomplete="off" />
	    <input type="password" id="password" placeholder="Password" autocomplete="off" />
	    <input type="password" id="confirm_password" placeholder="Confirm Password" />
	    <input type="button" name="previous" class="previous action-button" value="Previous" />
	    <input type="button" name="next" class="next action-button" value="Next" />
	  </fieldset>
	  <fieldset>
	    <h2 class="fs-title">Complete account set up</h2>
	    <h3 class="fs-subtitle">Select application you would want to use</h3>
	    <p><input type="checkbox" value="" checked/> Human Resource Package</p>
	    <div id="brick">
	    	<p>
	    		Checkboxes (and radio buttons) are on/off switches that may be toggled by the user. A switch is "on" when the control element's checked attribute is set. When a form is submitted, only "on" checkbox controls can become successful. Several checkboxes in a form may share the same control name. Thus, for example, checkboxes allow users to select several values for the same property. The INPUT element is used to create a checkbox control.
	    	</p>
	    	<p>
	    		Checkboxes (and radio buttons) are on/off switches that may be toggled by the user. A switch is "on" when the control element's checked attribute is set. When a form is submitted, only "on" checkbox controls can become successful. Several checkboxes in a form may share the same control name. Thus, for example, checkboxes allow users to select several values for the same property. The INPUT element is used to create a checkbox control.
	    	</p>

	    	
	    </div>
	    <div><input type="checkbox" value="" placeholder="sdasdasda" checked/> I accept the terms and conditions of OMNIS LIMITED</div>
	    <input type="button" name="previous" class="previous action-button" value="Previous" />
	    <input type="submit" name="submit" class="submit action-button" value="Submit"  onclick="submit_account();" />
	  </fieldset>
	  <div class="row"  style="margin-top:15px; ">
		
		<div class="">
			<a href="<?php echo base_url();?>sign-in"> Already have an account ?</a>
		</div>
	</div>
	</form>
</section>