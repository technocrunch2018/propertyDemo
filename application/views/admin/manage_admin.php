<!-- page content -->
<div class="right_col" role="main">    
    <div class="page-title">
      	<div class="title_left">
        	<h3><i class="fa fa-ioxhost"></i> Manage Admin</h3>
      	</div>             
    </div>

    <div class="clearfix"></div>

    <div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
		  
            <div class="x_panel">
              	<div class="x_title">
              	    <div class="col-md-6 col-sm-6 col-xs-12">
              	        <h2 class="xs-pb-10">Admin List</h2>
              	    </div>
              	    <?php if($this->session->userdata('user_type') != 'admin'){ ?>
              	    <div class="col-md-6 col-sm-6 col-xs-12">
              	        <a href = "<?php echo base_url('backend/manage_ex_admin');?>"><button type="button" class="effect blue effect-5 pull-right">Ex-Admin</button> </a>   
					    <button type="button" class="effect red effect-5 pull-right" data-toggle="modal" data-target="#myModal">ADD Admin</button>
              	    </div>
              	    <?php } ?>
                	<div class="clearfix"></div>
              	</div>
              	<div class="x_content">
                	<table id="datatable-buttons" class="table table-bordered table-striped">
            			<thead> 
            				<tr>
								<th>Sno.</th>
								<th>Name</th>
								<th>Mobile</th>
								<th>Official mobile</th>
								<th>Email</th>
								<th>Official E-mail</th>
								<th>Designation</th>
								<th>Join Date</th>
								<th>Status </th>
								<?php if($this->session->userdata('user_type') != 'admin'){ ?>
								<th>Action</th>
								<?php } ?>
							</tr>
						</thead>
						<tbody>
						    <?php $sr = 1; foreach($admin as $list){?>
						        <?php if(($this->session->userdata('user_type') == 'admin' && $list->user_id == $this->session->userdata('admin_id')) || ($this->session->userdata('user_type') != 'admin')){ ?>
    							<tr>
    								<td><?php echo $sr; ++$sr;?></td>
    								<td><a title = "View Record" href = "<?php echo base_url('backend/view_admin/' . $list->user_id);?>"><?php echo $list->name;?></a></td>
    								<td><?php echo $list->mobile;?></td>
    								<td><?php echo $list->official_mobile;?></td>
    								<td><?php echo $list->email;?></td>
    								<td><?php echo $list->official_email;?></td>
    								<td><?php echo $list->desognation;?></td>
    								<td><?php echo date('d M, Y', strtotime($list->join_date));?></td>	
    								<td><?php if($list->status ==1){echo "Active";}else{echo "Inactive";}?></td>
    								<?php if($this->session->userdata('user_type') != 'admin'){ ?>
    					  			<td>
    								  	<a class="action-btn edit" data-toggle="tooltip" data-placement="top" title = "Edit" href="<?php echo base_url('backend/edit_admins/' . $list->user_id);?>"><i class="fa fa-pencil"></i></a>
    								  	<a class="action-btn delete" data-toggle="tooltip" data-placement="top" title = "Delete" onclick="deleteRecord(<?php echo $list->user_id;?>)" href="javascript:void(0)"> <i class="fa fa-trash"></i></a>
    								</td>
    								<?php } ?>
    							</tr>
    							<?php } ?>
							<?php }?>
                		</tbody>               
          			</table>
            	</div>
        	</div>
    	</div>
	</div>
</div>


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
				    <form method="POST" action = "<?php echo base_url('backend/save_admin');?>"  enctype = "multipart/form-data">
    					<div class="row">
    						
    						<div class="col-md-6 col-sm-6 col-xs-12">
    							<label>Name</label><b style="color:red;">*</b>
    							<input type="text" name="name" required />
    						</div>
                            
                            <div class="col-md-3 col-sm-3 col-xs-12">
    							<label>Designation</label><b style="color:red;">*</b>
    							<input type="text" required name="desognation" />
    						</div>
    						
    						<div class="col-md-3 col-sm-3 col-xs-12">
    							<label>Department</label><b style="color:red;">*</b>
    							<input type="text" required name="department" />
    						</div>
    						
    						<div class="col-md-3 col-sm-3 col-xs-12">
    							<label>Mobile</label><b style="color:red;">*</b>
    							<input type="number" required onKeyPress="if(this.value.length==13) return false;" name="mobile"   />
    						</div>
    
                            <div class="col-md-3 col-sm-3 col-xs-12">
    							<label>Official Mobile</label>
    							<input type="number" onKeyPress="if(this.value.length==13) return false;" name="official_mobile"   />
    						</div>
    
    						<div class="col-md-6 col-sm-6 col-xs-12">
    							<label>E-mail</label><b style="color:red;">*</b>
    							<input type="email" required name="email"   />
    						</div>
    
                            <div class="col-md-6 col-sm-6 col-xs-12">
    							<label>Official E-mail</label>
    							<input type="email" name="official_email"   />
    						</div>
    
    						<div class="col-md-6 col-sm-6 col-xs-12">
    							<label>Address</label><b style="color:red;">*</b>
    							<input required type="text" name="address"   />
    						</div>
    
    						<div class="col-md-6 col-sm-6 col-xs-12">
    							<label>Password</label><b style="color:red;">*</b>
    							<input required type="text" name="password"   />
    						</div>
    
    
    						<div class="col-md-6 col-sm-6 col-xs-12">
    							<label>Bank Name</label><b style="color:red;">*</b>
    							<input required type="text" name="bank_name"   />
    						</div>
                            
                            <div class="col-md-6 col-sm-6 col-xs-12">
    							<label>Bank Branch</label><b style="color:red;">*</b>
    							<input required type="text" name="bank_branch"   />
    						</div>
                            
                            <div class="col-md-6 col-sm-6 col-xs-12">
    							<label>Account No</label><b style="color:red;">*</b>
    							<input required type="number" name="account_no"   />
    						</div>
                            
                            <div class="col-md-6 col-sm-6 col-xs-12">
    							<label>IFSC</label><b style="color:red;">*</b>
    							<input required type="text" name="ifsc" class = "blockspecial" onKeyPress="if(this.value.length==11) return false;"   />
    						</div>
                            
    						<div class="col-md-3 col-sm-3 col-xs-12">
    							<label>Salary</label><b style="color:red;">*</b>
    							<input required type="number" name="sallery"   />
    						</div>
    						
    						<div class="col-md-3 col-sm-6 col-xs-12">
    							<label>Target</label><b style="color:red;">*</b>
    							<input required type="number" name="targer"   />
    						</div>
    						
    						<div class="col-md-3 col-sm-6 col-xs-12">
    							<label>PF</label><b style="color:red;">*</b>
    							<input required type="number" name="pf"   />
    						</div>
    						
    						<div class="col-md-3 col-sm-6 col-xs-12">
    							<label>TA</label><b style="color:red;">*</b>
    							<input required type="number" name="ta"   />
    						</div>
    						
    						<div class="col-md-3 col-sm-6 col-xs-12">
    							<label>ESI</label><b style="color:red;">*</b>
    							<input required type="number" name="esi"   />
    						</div>
                            
                            <div class="col-md-3 col-sm-6 col-xs-12">
    							<label>After Target Percentage</label><b style="color:red;">*</b>
    							<input required type="text" name="after_target_percentage"   />
    						</div>
    
    						<div class="col-md-3 col-sm-3 col-xs-12">
    							<label>Insurance</label>
    							<input type="number" name="insurance"   />
    						</div>
    						
    						<div class="col-md-3 col-sm-3 col-xs-12">
    							<label>P. Tax</label>
    							<input type="number" name="p_tax"   />
    						</div>
    
    						<div class="col-md-3 col-sm-3 col-xs-12">
    							<label>Aadhar No</label><b style="color:red;">*</b>
    							<input type="number" onKeyPress="if(this.value.length==12) return false;" required name="aadhar_no"   />
    						</div>

    						<div class="col-md-3 col-sm-3 col-xs-12">
    							<label>Pan</label><b style="color:red;">*</b>
    							<input type="text" required name="pan" class = "blockspecial" onKeyPress="if(this.value.length==10) return false;"   />
    						</div>
    				
    						
    						<div class="col-md-3 col-sm-3 col-xs-12 radiobtn pb-10">
    							<input id="radio-1" required type="radio" name="gender" value = "1"   />
    							<label for="radio-1">Male</label>
    						</div>
    						
    						<div class="col-md-3 col-sm-3 col-xs-12 radiobtn pb-10">
    							<input id="radio-2" required type="radio" name="gender" value = "0"   />
    							<label for="radio-2">Female</label>
    						</div>
    
    						<div class="col-md-6 col-sm-6 col-xs-12">
    							<label>Weekly Off</label><b style="color:red;">*</b>
    						    <select name="weeky_off" required >
    						        <option value = "Sunday">Sunday</option>
    						        <option value = "Monday">Monday</option>
    						        <option value = "Tuesday">Tuesday</option>
    						        <option value = "Wednesday">Wednesday</option>
    						        <option value = "Thuesday">Thuesday</option>
    						        <option value = "Friday">Friday</option>
    						        <option value = "Saturday">Saturday</option>
    						    </select>
    						</div>
    						
    						<div class="col-md-6 col-sm-6 col-xs-12">
    							<label>Profile</label>
    							<input type="file" name="profile" accept="image/*">
    						</div>
    						
    						<div class="col-md-6 col-sm-6 col-xs-12">
    							<label>CV</label>
    							<input type="file" name="cv">
    						</div>
    						
    						<div class="col-md-6 col-sm-6 col-xs-12">
    							<label>Join Date</label><b style="color:red;">*</b>
    							<input type="date" required name="join_date" placeholder="DD/MM/YYYY" style="text-transform:uppercase;"/>
    						</div> 
    						<div class="col-md-6 col-sm-6 col-xs-12">
    							<label>Status</label><b style="color:red;">*</b>
    						    <select name="status" required >
    						        <option hidden>Select Status</option>
    						        <option value = "1">Active</option>
    						        <option value = "0">Inactive</option>
    						    </select>
    						</div>
    						
    						</div>
    					<div class="modal-footer">
    					    <button type="submit" class="effect red effect-5">Save</button>
    				    </div>
					</form>
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
			window.location="<?php echo base_url('backend/delete_admin/');?>"+id;
		}
		
	}
</script>