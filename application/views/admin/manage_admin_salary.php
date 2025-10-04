<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left"><h3><i class="fa fa-ioxhost"></i> Manage Admin Salary</h3></div>
             
            </div>

            <div class="clearfix"></div>

            <div class="row">
			  <div class="col-md-12 col-sm-12 col-xs-12">
			  
                <div class="x_panel">
                  <div class="x_title">
                    <h2 class="xs-pb-10">Admin Salary Details</h2>
                    <form action="<?php echo base_url('backend/manage_admin_salary'); ?>" method="post" name="manage_admin_salary" id="manage_admin_salary">
                    <div class="col-md-3">
                    <input type="month" name="sdate" id="sdate" class="form-control" value="<?php if(!empty($month)){ echo date('Y-m',strtotime('1-'.$month.'-'.$year)); }else{ echo date('Y-m'); } ?>">
                    </div>
                    <div class="col-md-3">
                    <input type="submit" name="submit" id="submit" value="Get">
                    </div>
                    </form>
					
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <table id="datatable-buttons" class="table table-bordered table-striped">
                        <thead> 
                        <tr>
        				  <th>Sno.</th>
        				  <th>Admin Id</th>
        				  <th>Admin Name</th>
        				  <th>Monthly Salary</th>
        				  <th>Total Leaves(Year)</th>
        				  <th>Remaining Paid Leaves</th>
        				  <th>Paid Leaves of this month</th>
        				  <th>Unpaid Leaves of this month</th>
        				  <th>Salary Amount</th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php if(!empty($admin_list)){?>
                            <?php foreach($admin_list as $i=>$user){?>
                             <tr>
                				  <td><?php echo $i+1; ?></td>
                				  <td><?php echo $user->user_id; ?></td>
                				  <td><?php echo $user->name; ?></td>
                				  <td><?php echo $user->sallery; ?></td>
                				  <td><?php echo @$user->total_leaves; ?></td>
                				  <td><?php echo @$user->remaining_leaves; ?></td>
                				  <td><?php echo @$user->total_paid_leaves; ?></td>
                 				  <td><?php echo @$user->total_unpaid_leaves; ?></td>
                 				  <td style="text-align:right;"><?php echo number_format($user->salary_amount, 2); ?></td>
                            </tr>
                            <?php } ?>
                            <?php } ?>
                        </tbody>
                    </table>
  <div class="container">
  <!-- Trigger the modal with a button -->
 

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog  modal-lg">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style="background:linear-gradient(to right,#03709e,#18c3fd 100%);">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title" style="color:white;font-weight:bold;font-size:20px;">Add Admin</h4>
        </div>
        <div class="modal-body">
		<form method="POST">
          <div class="row">
		   
		      <div class="col-md-4 col-sm-4 col-xs-12">
			  <center><label>Admin</label><b style="color:red;">*</b>
 			  </div>
 			  
 			  <div class="col-md-4 col-sm-4 col-xs-12">
			  <center><label>Owner/Builder/Agent</label><b style="color:red;">*</b>
 			  </div>
 			  
 			  <div class="col-md-4 col-sm-4 col-xs-12">
			  <center><label>Buyer</label><b style="color:red;">*</b>
 			  </div>
		    
 			   <div class="col-md-6 col-sm-6 col-xs-12">
			  <label>User Id</label><b style="color:red;">*</b>
				<input type="text" name="user_id" id="room" onblur="checkValue(this)"  />
			  </div>
			 
			  <div class="col-md-6 col-sm-6 col-xs-12">
			  <label>Name</label><b style="color:red;">*</b>
				<input type="text" name="name" id="room" onblur="checkValue(this)"  />
			  </div>

			   <div class="col-md-6 col-sm-6 col-xs-12">
			  <label>Mobile</label><b style="color:red;">*</b>
				<input type="text" name="mobile" id="room" onblur="checkValue(this)"  />
			  </div>
  

			   <div class="col-md-6 col-sm-6 col-xs-12">
			  <label>E-mail</label><b style="color:red;">*</b>
				<input type="text" name="email" id="room" onblur="checkValue(this)"  />
			  </div>
 

			   <div class="col-md-6 col-sm-6 col-xs-12">
			  <label>Address</label><b style="color:red;">*</b>
				<input type="text" name="name" id="room" onblur="checkValue(this)"  />
			  </div>
  

			  <div class="col-md-6 col-sm-6 col-xs-12">
			  <label>Bank Name</label><b style="color:red;">*</b>
				<input type="text" name="name" id="room" onblur="checkValue(this)"  />
			  </div>

			  <div class="col-md-6 col-sm-6 col-xs-12">
			  <label>Sallery</label><b style="color:red;">*</b>
				<input type="text" name="name" id="room" onblur="checkValue(this)"  />
			  </div>

			  <div class="col-md-6 col-sm-6 col-xs-12">
			  <label>Bank Branch</label><b style="color:red;">*</b>
				<input type="text" name="name" id="room" onblur="checkValue(this)"  />
			  </div>
 
			 
			</div>
 			  <div class="col-md-6 col-sm-6 col-xs-12">
			  <label>Target</label><b style="color:red;">*</b>
				<input type="text" name="security_deposite" id="room" onblur="checkValue(this)"  />
			  </div>

			   <div class="col-md-6 col-sm-6 col-xs-12">
			  <label>Account No</label><b style="color:red;">*</b>
				<input type="text" name="rent_month" id="room" onblur="checkValue(this)"  />
			  </div>

			  <div class="col-md-6 col-sm-6 col-xs-12">
			  <label>PF</label><b style="color:red;">*</b>
				<input type="text" name="furnished_status" id="room" onblur="checkValue(this)"  />
			  </div>

			  <div class="col-md-6 col-sm-6 col-xs-12">
			  <label>IFSC</label><b style="color:red;">*</b>
				<input type="text" name="furnished_status" id="room" onblur="checkValue(this)"  />
			  </div>

			  <div class="col-md-6 col-sm-6 col-xs-12">
			  <label>Insurance</label><b style="color:red;">*</b>
				<input type="text" name="s_b_u_a" id="room" onblur="checkValue(this)"  />
			  </div>
			   
			   <div class="col-md-6 col-sm-6 col-xs-12">
			  <label>Aadhar No</label><b style="color:red;">*</b>
				<input type="text" name="b_u_a" id="room" onblur="checkValue(this)"  />
			  </div>

			   <div class="col-md-6 col-sm-6 col-xs-12">
			  <label>TA</label><b style="color:red;">*</b>
				<input type="text" name="s_b_u_a" id="room" onblur="checkValue(this)"  />
			  </div>

			   <div class="col-md-6 col-sm-6 col-xs-12">
			  <label>Pan</label><b style="color:red;">*</b>
				<input type="text" name="b_u_a" id="room" onblur="checkValue(this)"  />
			  </div>

			  <div class="col-md-6 col-sm-6 col-xs-12">
			  <label>After Target Percentage</label><b style="color:red;">*</b>
				<input type="text" name="Admin_number" id="room" onblur="checkValue(this)"  />
			  </div>

			  <div class="col-md-6 col-sm-6 col-xs-12">
			  <label>Join Date</label><b style="color:red;">*</b>
				<input type="date" name="floor" id="room" onblur="checkValue(this)"  />
			  </div>

             <div class="col-md-12 col-sm-12 col-xs-12">
			  <label>Gender</label><b style="color:red;">*</b>
 			  </div>
 			  
 			  <div class="col-md-6 col-sm-6 col-xs-6 radiobtn">
				<input id="radio-1" type="checkbox" name="total_floor" id="room" onblur="checkValue(this)"  />
				<label for="radio-1">Male</label>
			  </div>

			  <div class="col-md-6 col-sm-6 col-xs-6 radiobtn">
				<input id="radio-2" type="checkbox" name="number_of_cabin" id="room" onblur="checkValue(this)"  />
				<label for="radio-2">Female</label>
			  </div>

               
 
			  <form>
              </div>

                <div class="modal-footer">
                  <input type="submit" name="save" value="Save"/>
                </div>
              </div>
      
    </div>
  </div>
  
</div>
                  </div>
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
		