<?php
	$active_flights = $this->reports_model->get_active_flights();
	$total_payments = number_format($this->reports_model->get_total_payments(), 0, '.', ',');
?>
            <!-- Page header start -->
            <div class="page-header">
                <div class="page-title">
                    <h3>PBF</h3>
                    <span>
					<?php 
					//salutation
					if(date('a') == 'am')
					{
						echo 'Good morning, ';
					}
					
					else if((date('H') >= 12) && (date('H') < 17))
					{
						echo 'Good afternoon, ';
					}
					
					else
					{
						echo 'Good evening, ';
					}
					echo $this->session->userdata('first_name');
					?>
                    </span>
                </div>
                <ul class="page-stats">
                    <li>
                        <div class="summary">
                            <span>Active Flights</span>
                            <h3><?php echo $active_flights;?></h3>
                        </div>
                        <span id="sparklines1"></span>
                    </li>
                    <li>
                        <div class="summary">
                            <span>Total Payments</span>
                            <h3>KES <?php echo $total_payments;?></h3>
                        </div>
                        <span id="sparklines2"></span>
                    </li>
                </ul>
            </div>
            <!-- Page header ends -->