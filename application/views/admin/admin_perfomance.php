<link href="https://fonts.googleapis.com/css?family=Lato:400,700" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script>
<style>
    canvas#horizontalBarChartCanvas {
      max-width: 768px;
      margin: 40px auto;
    }
</style>
<div class="right_col" role="main">
            <div class="page-title">
                <div class="title_left"><h3><i class="fa fa-ioxhost"></i> Manage Admin Perfomance</h3></div>
             
            </div>

            <div class="clearfix"></div>

            <div class="row">
			    <div class="col-md-12 col-sm-12 col-xs-12">
			  
                    <div class="x_panel">
                      <div class="x_title">
                        <h2 class="xs-pb-10">Admin Perfomance</h2>
                        <form action="<?php echo base_url('backend/admin_perfomance'); ?>" method="post" name="get_admin_performance" id="get_admin_performance">
                        <div class="col-md-3">
                        <input type="month" name="pdate" id="pdate" class="form-control" value="<?php if(!empty($month)){ echo date('Y-m',strtotime('1-'.$month.'-'.$year)); }else{ echo date('Y-m'); } ?>">
                        </div>
                        <div class="col-md-3">
                        <input type="submit" name="submit" id="submit" value="Get">
                        </div>
                        </form>
    					
                        
                        <div class="clearfix"></div>
                      </div>
                      <div class="x_content">
                          
                          
                        <!--<table id="datatable-buttons" class="table table-bordered table-striped">
                            <thead style="background:#337ab7;color:white;"> 
                            <tr>
            				  <th>Sno.</th>
            				  <th>Admin Id</th>
            				  <th>Name</th>
            				  <th>Mobile</th>
            				  <th>Email</th>
             				  <th>Address</th>
             				  <th>Gender</th>
             				  <th>Properties Id</th>
             				  <th>Owner/Builder/Agent Name</th>
             				  <th>Final Ammout</th>
             				  <th>Net Ammount</th>
             				  <th>Brockerage</th>
             				  <th>Properties Adrdress</th>
             				  <th>Properties City</th>
             				  <th>Properties Location</th>
             				  <th>Mobile</th>
             				  <th>Date</th>
             				  <th>Deal With</th>
             				  <th>Mobile</th>
             				  <th>Brockerage</th>
             				  <th>City</th>
             				  <th>Location</th>
             				  <th >Email</th>
             				  <th>Status</th>
             				  <th>Payment Status</th>
             				  <th>Category</th>
            				  <th>Properties Image</th>
            		          <th>Action</th>
                            </tr>
                            
                            <tr>
            				  <th>Sno.</th>
            				  <th>Admin Id</th>
            				  <th>Admin Name</th>
            				  <th>Seller/Buyer ID</th>
            				  <th>Seller/Buyer Name</th>
             				  <th>Sale Type</th>
             				  <th>Property Type</th>
             				  <th>Deal Amount</th>
             				  <th>Commission Amount</th>
             				  <th>Admin Partial Ammout</th>
                            </tr>
                            </thead>
                            <tbody>
                                 <tr>
                    				  <td>Sno.</td>
                    				  <td>Admin Id</td>
                    				  <td>Admin Name</td>
                    				  <td>Seller/Buyer ID</td>
                    				  <td>Seller/Buyer Name</td>
                     				  <td>Sale Type</td>
                     				  <td>Property Type</td>
                     				  <td>Deal Amount</td>
                     				  <td>Commission Amount</td>
                     				  <td>Admin Partial Ammout</td>
                                    </tr>
                            </tbody>
                    </table>-->
                    
                    
                        <table id="datatable" class="table table-bordered table-striped">
                            <thead> 
                            <tr>
            				  <th>Sno.</th>
            				  <th>Id</th>
            				  <th>Name</th>
            				  <th>Month/Year</th>
            				  <th>Salary</th>
            				  <th>Target</th>
             				  <th>Achieve</th>
             				  <th>Status</th>
             				  <th>Lead Partners</th>
             				  <th>Builder</th>
             				  <th>Agent</th>
             				  <th>Owners</th>
             				  <th>Seller</th>
             				  <th>Buyers</th>
             				  <th>Closed</th>
             				  <th>In Process</th>
             				  <th>Verify</th>
                            </tr>
                            </thead>
                            <tbody>
                                <?php if(!empty($performance_list)){ ?>
                                <?php foreach($performance_list as $i=>$user){?>
                                <?php if(($this->session->userdata('user_type') == 'admin' && $user['id'] == $this->session->userdata('admin_id')) || ($this->session->userdata('user_type') != 'admin')){ ?>
                                 <tr>
                    				  <td><?php echo $i+1; ?></td>
                    				  <td><?php echo $user['id']; ?></td>
                    				  <td><?php echo $user['name']; ?></td>
                    				  <td><?php echo $user['month_year']; ?></td>
                    				  <td><?php echo $user['salary']; ?></td>
                    				  <td><?php echo $user['target']; ?></td>
                    				  <td><?php echo $user['achieved']; ?></td>
                     				  <td><?php echo $user['status']; ?></td>
                     				  <td><?php echo $user['lead_partners']; ?></td>
                     				  <td><?php echo $user['builder']; ?></td>
                     				  <td><?php echo $user['agent']; ?></td>
                     				  <td><?php echo $user['owner']; ?></td>
                     				  <td><?php echo $user['seller']; ?></td>
                     				  <td><?php echo $user['buyers']; ?></td>
                     				  <td><?php echo $user['closed']; ?></td>
                     				  <td><?php echo $user['in_process']; ?></td>
                     				  <td><?php echo $user['verify']; ?></td>
                                </tr>
                                <?php } ?>
                                <?php } ?>
                                <?php } ?>
                            </tbody>
                        </table>
                    
                      </div>
                    </div>
                      
                    <div class="x_panel">
                        <div class="x_title">
                            <h2 class="xs-pb-10">Admin Performance</h2>
                            <form action="<?php echo base_url('backend/admin_perfomance'); ?>" method="post" name="get_performance_by_admin_id" id="get_performance_by_admin_id">
                                <div class="col-md-3">
                                    <select class="form-control" id="admin_id" name="admin_id" required>
                                        <option value="">Select Admin</option>
                                        <?php if(!empty($users)){ ?>
                                        <?php foreach($users as $admin){ ?>
                                        <?php if(($this->session->userdata('user_type') == 'admin' && $admin->user_id == $this->session->userdata('admin_id')) || ($this->session->userdata('user_type') != 'admin')){ ?>
                                        <option value="<?php echo $admin->user_id; ?>" <?php if(@$admin_id == $admin->user_id){ echo 'selected'; } ?>><?php echo $admin->name; ?></option>
                                        <?php } ?>
                                        <?php } ?>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <input type="submit" name="submit" id="submit" value="Get">
                                </div>
                            </form>
                            <div class="clearfix"></div>
                        </div>
                        <?php //echo json_encode($graphData); ?>
                        <?php //pre($graphData); ?>
                        <div class="x_content">
                          <canvas id="horizontalBarChartCanvas"></canvas>
                        </div>
                    </div>
                </div>
            </div>
</div>
        <!-- /page content -->

		<script>
					function deleteRecord(id)
					{
						var x=confirm("do you want to Delete?")
						if(x==true)
						{
							window.location="user_delete.php?did="+id;
						}
						
					}
	</script>
	<script>
function getamount(val)
		{
			$.ajax
		  ({
		   type: "POST",
		   url: "room_floor.php",
		   data: 'timing='+val,
		   success: function(data)
		   {
			   $("#amount_list").html(data);
		   }
		  
		   });	
		}
		</script>
		
		
<script>
    Chart.defaults.global.defaultFontFamily = "Lato";

var horizontalBarChart = new Chart(horizontalBarChartCanvas, {
   type: 'horizontalBar',
   data: {
      labels: ["Achieve", "Lead_Partner","Owner", "Builder", "Agent", "Seller", "Buyer","Closed" , "Verify"],
      datasets: [{
         /*data: [280, 380, 480, 290, 120],*/
         data: <?php echo json_encode($graphData); ?>,
         backgroundColor: ["#ffe0e6", "#ffe0e6", "#ffe0e6", "#ffe0e6", "#ffe0e6", "#ffe0e6", "#ffe0e6", "#ffe0e6", "#ffe0e6"], 
      }]
   },
   options: {
      tooltips: {
        enabled: true
      },
      responsive: true,
      legend: {
         display: false,
         position: 'bottom',
         fullWidth: true,
         labels: {
           boxWidth: 10,
           padding: 50
         }
      },
      scales: {
         yAxes: [{
           gridLines: {
             display: true,
             drawTicks: true,
             drawOnChartArea: false
           },
           ticks: {
             fontColor: '#555759',
             fontFamily: 'Lato',
             fontSize: 11
           }
            
         }],
         xAxes: [{
             gridLines: {
               display: true,
               drawTicks: false,
               tickMarkLength: 5,
               drawBorder: true
             },
           ticks: {
             padding: 5,
             beginAtZero: true,
             fontColor: '#555759',
             fontFamily: 'Lato',
             fontSize: 11,
             borderColor:'#ff8fa6',
             callback: function(label, index, labels) {
              return parseInt(label);
             }
               
           },
            scaleLabel: {
              display: true,
              padding: 10,
              fontFamily: 'Lato',
              fontColor: '#555759',
              fontSize: 16,
              fontStyle: 700,
              labelString: 'Total Count'
            },
           
         }]
      }
   }
});

</script>
		