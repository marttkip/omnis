   
        <!-- Jasny -->
        <link href="<?php echo base_url();?>assets/jasny/jasny-bootstrap.css" rel="stylesheet">		
        <script type="text/javascript" src="<?php echo base_url();?>assets/jasny/jasny-bootstrap.js"></script> 
        <div class="padd">
            <?php
				$error2 = validation_errors(); 
				if(!empty($error2)){?>
					<div class="row">
						<div class="col-md-6 col-md-offset-2">
							<div class="alert alert-danger">
								<strong>Error!</strong> <?php echo validation_errors(); ?>
							</div>
						</div>
					</div>
				<?php }
			
				if(isset($_SESSION['error'])){?>
					<div class="row">
						<div class="col-md-6 col-md-offset-2">
							<div class="alert alert-danger">
								<strong>Error!</strong> <?php echo $_SESSION['error']; $_SESSION['error'] = NULL;?>
							</div>
						</div>
					</div>
				<?php }?>
			
				<?php
				$attributes = array('role' => 'form');
		
				echo form_open_multipart($this->uri->uri_string(), $attributes);
				
				if(!empty($error))
				{
					?>
					<div class="alert alert-danger">
						<?php echo $error;?>
					</div>
					<?php
				}
				?>
                <div class="row">
                	<div class="col-md-6">
                        <div class="form-group">
                            <label for="department_name">Department Name</label>
                            <input type="text" class="form-control" name="department_name" placeholder="Department Name" value="<?php echo $department_row->department_name;?>">
                        </div>
					</div>
                	<div class="col-md-6">
                        <label class="control-label" for="image">Department Image</label>
						<div class="fileinput fileinput-new" data-provides="fileinput">
							<div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 200px; height: 150px;">
								<img src="<?php echo $department_location;?>" class="img-responsive"/>
							</div>
							
							<div>
								<span class="btn btn-default btn-file"><span class="fileinput-new">Select image</span><span class="fileinput-exists">Change</span><input type="file" name="department_image"></span>
								<a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
							</div>
						</div>
                    </div>
                </div>
                
                <div class="row">
                	<div class="col-md-12">
                        <div class="form-group">
                            <label class="col-md-2 control-label" for="department_description">Department description</label>
                            <div class="col-md-10">
                            	<textarea class="cleditor" name="department_description" id="department_description"><?php echo $department_row->department_description;?></textarea>
                            </div>
                        </div>
                    </div>
                </div>
				<div class="form-group center-align">
					<input type="submit" value="Edit Department" class="login_btn btn btn-success btn-lg">
				</div>
				<?php
					echo form_close();
				?>
		</div>