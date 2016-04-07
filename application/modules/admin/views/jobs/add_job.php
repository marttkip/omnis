
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
				
				$attributes = array('role' => 'form', 'class' => 'form-horizontal');
		
				echo form_open($this->uri->uri_string(), $attributes);
				
				?>
                <div class="row">
                	<div class="col-md-6">
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="job_title">Job title</label>
                            <div class="col-md-8">
                            	<input type="text" class="form-control" name="job_title" placeholder="Enter job title" value="<?php echo set_value("job_title");?>">
                            </div>
                        </div>
					</div>
                	<div class="col-md-6">
                        <!-- Activate checkbox -->
                        <div class="form-group">
                            <label class="col-md-4 control-label">Activate job?</label>
                            <div class="col-md-8">
                                <div class="radio">
                                    <label>
                                        <input id="optionsRadios1" type="radio" checked value="1" name="job_status">
                                        Yes
                                    </label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input id="optionsRadios2" type="radio" value="0" name="job_status">
                                        No
                                    </label>
                                </div>
                            </div>
                        </div>
                	</div>
                </div>
                
                <div class="row">
                	<div class="col-md-12">
                        <div class="form-group">
                            <label class="col-md-2 control-label" for="job_description">Job description</label>
                            <div class="col-md-10">
                            	<textarea class="cleditor" name="job_description"><?php echo set_value("job_description");?></textarea>
                            </div>
                        </div>
                    </div>
                </div>
				
				<div class="form-group center-align">
					<input type="submit" value="Add job" class="login_btn btn btn-success btn-lg">
				</div>
				<?php
					form_close();
				?>
		</div>