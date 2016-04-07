<div class="headline"><h3>Make an order</h3></div>

<?php 
	if(isset($_SESSION['email_success']))
	{
		?><div class="headline success"><h2><?php echo $_SESSION['email_success']; ?></h2></div><?php
		$_SESSION['email_success'] = NULL;
	}
?>
<div class="errors">

<?php 
	$errors = validation_errors();
	if(isset($errors))
	{
		echo validation_errors();
	}
?>
</div>

<p>Use this page to make an order for one of the listed services. We shall get back to you as soon as we can.</p><br />
<form action="<?php echo site_url()."site/save_order/".$page;?>" method="POST">
    <label>Names <span class="color-red">*</span></label>
    <input type="text" class="span10 border-radius-none" name="names" placeholder="Please enter your names" />
    <label>Email <span class="color-red">*</span></label>
    <input type="text" class="span10 border-radius-none" name="email" placeholder="Please enter your email"/>
    <label>Phone <span class="color-red">*</span></label>
    <input type="text" class="span10 border-radius-none" name="phone" placeholder="Please enter your phone number"/>
    <label>Service <span class="color-red">*</span></label>
    <select name="service" class="span10">
    	<option value="">Select a service</option>
    	<option value="Photography">Photography</option>
    	<option value="Photo Editing & Printing">Photo Editing & Printing</option>
    	<option value="Framing & Montages">Framing & Montages</option>
    	<option value="Videography">Videography</option>
    </select>
    <label>Order Description</label>
    <textarea rows="5" class="span10" name="description" placeholder="Please enter your order description"></textarea>
    <p><button type="submit" class="btn-u">Place Order</button></p>
</form>