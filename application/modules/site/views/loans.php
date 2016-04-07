<?php
if($loans->num_rows() > 0)
{
	$row = $loans->row();
	$requirements = $row->requirements;
	$conditions = $row->conditions;
	$approval = $row->approval;
	$insurance_fee = $row->insurance_fee;
	$application_fee = $row->application_fee;
	$disbursement = $row->disbursement;
	$perfection = $row->perfection;
	$negotiation = $row->negotiation;
	$acceptable_securities = $row->acceptable_securities;
	$asset_finance = $row->asset_finance;
	$rescheduling = $row->rescheduling;
?>
    <section id="about-us">
        <div class="container">
			<div class="center wow fadeInDown" style="padding-bottom:0;">
				<h2>Loans</h2>
			</div>
			
			<!-- Our Skill -->
			<div class="skill-wrap clearfix">
			
				<div class=" wow fadeInDown">
					<h2>Loan requirements</h2>
                    <div class="row">
                    	<div class="col-lg-6 col-md-6">
							<?php echo $requirements;?>
                        </div>
                    </div>
				</div>
	
            </div><!--/.our-skill-->
			
			<!-- Our Skill -->
			<div class="skill-wrap clearfix">
			
				<div class=" wow fadeInDown">
					<h2>Loan conditions</h2>
					<p><?php echo $conditions;?></p>
				</div>
	
            </div><!--/.our-skill-->
			
			<!-- Our Skill -->
			<div class="skill-wrap clearfix">
			
				<div class=" wow fadeInDown">
					<h2>Loan approval</h2>
					<p><?php echo $approval;?></p>
				</div>
	
            </div><!--/.our-skill-->
			
			<!-- Our Skill -->
			<div class="skill-wrap clearfix">
			
				<div class=" wow fadeInDown">
					<h2>Loan insurance fee</h2>
					<p><?php echo $insurance_fee;?></p>
				</div>
	
            </div><!--/.our-skill-->
			
			<!-- Our Skill -->
			<div class="skill-wrap clearfix">
			
				<div class=" wow fadeInDown">
					<h2>Loan application fee</h2>
					<p><?php echo $application_fee;?></p>
				</div>
	
            </div><!--/.our-skill-->
			
			<!-- Our Skill -->
			<div class="skill-wrap clearfix">
			
				<div class=" wow fadeInDown">
					<h2>Loan disbursement</h2>
					<p><?php echo $disbursement;?></p>
				</div>
	
            </div><!--/.our-skill-->
			
			<!-- Our Skill -->
			<div class="skill-wrap clearfix">
			
				<div class=" wow fadeInDown">
					<h2>Loan perfection</h2>
					<p><?php echo $perfection;?></p>
				</div>
	
            </div><!--/.our-skill-->
			
			<!-- Our Skill -->
			<div class="skill-wrap clearfix">
			
				<div class=" wow fadeInDown">
					<h2>Loan negotiation</h2>
					<p><?php echo $negotiation;?></p>
				</div>
	
            </div><!--/.our-skill-->
			
			<!-- Our Skill -->
			<div class="skill-wrap clearfix">
			
				<div class=" wow fadeInDown">
					<h2>Acceptable collateral securities</h2>
					<p><?php echo $acceptable_securities;?></p>
				</div>
	
            </div><!--/.our-skill-->
			
			<!-- Our Skill -->
			<div class="skill-wrap clearfix">
			
				<div class=" wow fadeInDown">
					<h2>Asset finance</h2>
					<p><?php echo $asset_finance;?></p>
				</div>
	
            </div><!--/.our-skill-->
			
			<!-- Our Skill -->
			<div class="skill-wrap clearfix">
			
				<div class=" wow fadeInDown">
					<h2>Loan rescheduling</h2>
					<p><?php echo $rescheduling;?></p>
				</div>
	
            </div><!--/.our-skill-->
			
		</div><!--/.container-->
    </section><!--/about-us-->
<?php
}
?>