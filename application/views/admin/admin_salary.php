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
                    <form action="<?php echo base_url('backend/admin_salary'); ?>" method="post" name="admin_salary" id="admin_salary">
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
                    <table id="datatable" class="table table-bordered table-striped">
                        <thead> 
                        <tr>
        				  <th>Sno.</th>
        				  <th>Id</th>
        				  <th>Name</th>
        				  <th>Month/Year</th>
        				  <th>Salary</th>
        				  <th>Incentive</th>
        				  <th>TA</th>
        				  <th>ESI</th>
        				  <th>PF</th>
        				  <!--<th>Leaves</th>
        				  <th>Paid Leaves</th>-->
        				  <th>Over Days</th>
        				  <th>Less Any</th>
        				  <th>Add Any</th>
        				  <th>PT</th>
        				  <th>Amount</th>
        				  <!--<th>Date</th>-->
        				  <th>Transaction ID</th>
        				  <th>Transaction Date</th>
        				  <th>Generated Date</th>
        				  <?php if($this->session->userdata('user_type') != 'admin'){ ?>
        				  <th>Action</th>
        				  <?php } ?>
                        </tr>
                        </thead>
                        <tbody>
                            <?php if(!empty($admin_list)){?>
                            <?php foreach($admin_list as $i=>$user){?>
                            <?php if(($this->session->userdata('user_type') == 'admin' && $user['id'] == $this->session->userdata('admin_id')) || ($this->session->userdata('user_type') != 'admin')){ ?>
                             <tr>
                				  <td><?php echo $i+1; ?></td>
                				  <td><?php echo $user['id']; ?></td>
                				  <td><?php echo $user['name']; ?></td>
                				  <td><?php echo $user['month_year']; ?></td>
                				  <td><?php echo $user['salary']; ?></td>
                				  <td><?php echo $user['incentive']; ?></td>
                				  <td><?php echo $user['TA']; ?></td>
                				  <td><?php echo $user['ESI']; ?></td>
                				  <td><?php echo $user['PF']; ?></td>
                				  <!--<td><?php echo $user['leave']; ?></td>-->
                 				  <!--<td><?php echo $user['paid_leave']; ?></td>-->
                 				  <td><?php echo $user['over_day']; ?></td>
                 				  <td><?php echo $user['less_any']; ?></td>
                 				  <td><?php echo $user['add_any']; ?></td>
                 				  <td><?php echo $user['PT']; ?></td>
                 				  <td><?php echo $user['amount']; ?></td>
                 				  <!--<td><?php echo $user['date']; ?></td>-->
                 				  <td><?php echo $user['transaction_id']; ?></td>
                 				  <td><?php echo $user['transaction_date']; ?></td>
                 				  <td><?php echo $user['date']; ?></td>
                 				  <?php if($this->session->userdata('user_type') != 'admin'){ ?>
                 				  <td style="text-align:right;">
                 				    <?php if($user['generation_flag'] == 1){ ?>
                 				    <a target="_BLANK" href="<?php echo base_url(); ?>backend/print_admin_salary_slip/<?php echo $user['id']; ?>/<?php echo $user['month_year']; ?>"><button onclick="">Print</button></a>
                 				    <?php }else{ ?>
                 				    <button onclick="generate_admin_salary('<?php echo $user['amount']; ?>', '<?php echo $user['id']; ?>', '<?php echo $user['name']; ?>', '<?php echo $user['month_year']; ?>', '<?php echo $user['bank_name']; ?>')">Pay</button>
                 				    <?php } ?>
                 				  </td>
                 				  <?php } ?>
                            </tr>
                            <?php } ?>
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
		<!--<form method="POST">-->
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

               
 
			  <!--</form>-->
              </div>

                <div class="modal-footer">
                  <input type="submit" name="save" value="Save"/>
                </div>
              </div>
      
    </div>
  </div>
  
  
  
  
  <div class="modal fade" id="generateAdminSalaryPopup" role="dialog">
        <div class="modal-dialog  modal-lg">
            <div class="modal-content">
                <div class="modal-header" style="background:linear-gradient(to right,#03709e,#18c3fd 100%);">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title" style="color:white;font-weight:bold;font-size:20px;">Add Admin Salary details - <span id="salary_month_year"></span></h4>
                </div>
                <!--<form method="POST" enctype="multipart/form-data" action="<?php echo base_url(); ?>backend/save_admin_salary_details">-->
                <?php echo form_open_multipart(base_url()."backend/save_admin_salary_details", array('id' => 'my_id')); ?>
                    <div class="modal-body">
                    
                        <div class="row">
                            <input type="hidden" name="admin_id" value="0" id="admin_id" />
                            <input type="hidden" name="admin_salary_month_year" value="" id="admin_salary_month_year" />
                            <div class="col-md-3">
                                <label>Admin Name</label>
                                <input type="text" class="form-control" name="admin_salary_name" id="admin_salary_name" readonly/>
                            </div>
                            
                            <div class="col-md-3">
                                <label>Transaction ID</label>
                                <input type="text" class="form-control" name="admin_salary_transaction_id" id="admin_salary_transaction_id"  placeholder="Transaction ID" required/>
                            </div>
                            <div class="col-md-3">
                                <label>Transaction Date</label>
                                <input type="date" class="form-control" name="admin_salary_transaction_date" id="admin_salary_transaction_date" required />
                            </div>
                            <div class="col-md-3">
                                <label>Salary Amount</label>
                                <input type="text" class="form-control" name="admin_salary_amount" id="admin_salary_amount" readonly/>
                            </div>
                            
                        </div>
                        <div class="row">
                            <!--<div class="col-md-3">
                                <label>Add Any</label>
                                <input type="number" class="form-control" name="add_any" id="add_any"  placeholder="Add Any" value="0" onkeyup="calculate_admin_salary_final_amount()" />
                            </div>
                            <div class="col-md-3">
                                <label>Less Any</label>
                                <input type="number" class="form-control" name="less_any" id="less_any" placeholder="Less Any" value="0" onkeyup="calculate_admin_salary_final_amount()" />
                            </div>-->
                            
                            <div class="col-md-3">
                                <label>Bonus</label>
                                <input type="number" class="form-control" name="bonus" id="bonus" placeholder="Bonus" value="0" onkeyup="calculate_admin_salary_final_amount()" />
                            </div>
                            
                            <div class="col-md-3">
                                <label>Advance Amount</label>
                                <input type="number" class="form-control" name="admin_salary_advance_amount" id="admin_salary_advance_amount" value="0" onkeyup="calculate_admin_salary_final_amount()" placeholder="Advance Amount" />
                            </div>
                            <div class="col-md-3">
                                <label>Advance Cutting Amount</label>
                                <input type="number" class="form-control" name="admin_salary_cutting_amount" id="admin_salary_cutting_amount" value="0" onkeyup="calculate_admin_salary_final_amount()" placeholder="Cutting Amount" />
                            </div>
                            <div class="col-md-3">
                                <label>Income Tax</label>
                                <input type="number" class="form-control" name="income_tax" id="income_tax" value="0" onkeyup="calculate_admin_salary_final_amount()" placeholder="Income Tax" />
                            </div>
                            
                        </div>


                        <div class="row">
                          <div class="col-md-3">
                                <label>Final Amount</label>
                                <input type="text" class="form-control" name="admin_salary_final_amount" id="admin_salary_final_amount"  placeholder="Final Amount" readonly />
                            </div> 

                            <div class="col-md-9">
                                <label>Bank Name</label>
                                <input type="text" class="form-control" name="admin_salary_bank_name" id="admin_salary_bank_name"  placeholder="Bank Name" />
                            </div> 
                            
                        </div>


                        <div class="row">
                            <div class="col-md-12">
                                <label>Remark</label>
                                <input type="text" class="form-control" name="admin_salary_remark" id="admin_salary_remark"  placeholder="Remark"  />
                            </div> 
                        </div>
                        
                    </div>
                    <div class="modal-footer">
                        <input type="submit" name="save" value="Save"/>
                    </div>
                </form>
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
		
		
		function generate_admin_salary(amount, id, name, month_year, bank_name){
		    $("#admin_salary_amount").val(amount);
		    $("#admin_id").val(id);
		    $("#admin_salary_name").val(name);
		    $("#admin_salary_month_year").val(month_year);
		    $("#salary_month_year").html(month_year);
        $("#admin_salary_bank_name").val(bank_name);
		    $("#generateAdminSalaryPopup").modal();
		}
		
		function calculate_admin_salary_final_amount(){
		    if($("#admin_salary_amount").val() == '' || $("#admin_salary_amount").val() == undefined)
		        var admin_salary_amount = 0;
		    else
		        var admin_salary_amount = parseFloat($("#admin_salary_amount").val());
		    if($("#less_any").val() == '' || $("#less_any").val() == undefined)
		        var less_any = 0;
		    else
		        var less_any = parseFloat($("#less_any").val());
		    if($("#add_any").val() == '' || $("#add_any").val() == undefined)
		        var add_any = 0;
		    else
		        var add_any = parseFloat($("#add_any").val());
            if($("#admin_salary_advance_amount").val() == '' || $("#admin_salary_advance_amount").val() == undefined)
                var advance_amount = 0;
            else
                var advance_amount = parseFloat($("#admin_salary_advance_amount").val());
            if($("#admin_salary_cutting_amount").val() == '' || $("#admin_salary_cutting_amount").val() == undefined)
                var cutting_amount = 0;
            else
                var cutting_amount = parseFloat($("#admin_salary_cutting_amount").val());
            if($("#bonus").val() == '' || $("#bonus").val() == undefined)
                var bonus = 0;
            else
                var bonus = parseFloat($("#bonus").val());
            if($("#income_tax").val() == '' || $("#income_tax").val() == undefined)
                var income_tax = 0;
            else
                var income_tax = parseFloat($("#income_tax").val());
		    var new_admin_salary_amount = ((admin_salary_amount + add_any + advance_amount + bonus) - less_any - cutting_amount - income_tax);
		    $("#admin_salary_final_amount").val(new_admin_salary_amount);
		}
		</script>
		