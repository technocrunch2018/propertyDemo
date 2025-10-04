<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left"><h3><i class="fa fa-key "></i> Profile</h3></div>
            <div class="title_right"><div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search"></div></div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-4 col-xs-12">
                <div class="x_panel">
                    <div class="x_content">
                    <?php if(isset($_REQUEST['status'])){?>
						<div style="color:green;"><b>Password Changed Successfully</b></div>
					<?php } ?> 
                    
                            <form method="post" enctype="multipart/form-data" action="<?php echo base_url('backend/update_admin');?>">
                <div class="x_content">
                    <div class="row">
    					
    						<div class="col-md-6 col-sm-6 col-xs-12">
    							<label>Name</label><b style="color:red;">*</b>
    							<input type="text" value = "<?php echo $admin[0]->name;?>" name="name"   />
    						</div>
                            
                            <div class="col-md-6 col-sm-6 col-xs-12">
    							<label>Designation</label><b style="color:red;">*</b>
    							<input type="text" value = "<?php echo $admin[0]->desognation;?>" name="desognation"   />
    						</div>
    						
    						<div class="col-md-6 col-sm-6 col-xs-6">
    							<label>Mobile</label><b style="color:red;">*</b>
    							<input type="number" value = "<?php echo $admin[0]->mobile;?>" name="mobile"   />
    						</div>
    
                            <div class="col-md-6 col-sm-6 col-xs-6">
    							<label>Official Mobile</label><b style="color:red;">*</b>
    							<input type="number" value = "<?php echo $admin[0]->official_mobile;?>" name="official_mobile"   />
    						</div>
    
    						<div class="col-md-6 col-sm-6 col-xs-12">
    							<label>E-mail</label><b style="color:red;">*</b>
    							<input type="text" value = "<?php echo $admin[0]->email;?>" name="email"   />
    						</div>
    
                            <div class="col-md-6 col-sm-6 col-xs-12">
    							<label>Official E-mail</label><b style="color:red;">*</b>
    							<input type="text" value = "<?php echo $admin[0]->official_email;?>" name="official_email"   />
    						</div>
    
    						<div class="col-md-6 col-sm-6 col-xs-12">
    							<label>Address</label><b style="color:red;">*</b>
    							<input type="text" value = "<?php echo $admin[0]->address;?>" name="address"   />
    						</div>
    
    
    						<div class="col-md-6 col-sm-6 col-xs-12">
    							<label>Password</label><b style="color:red;">*</b>
    							<input type="text" value = "<?php echo $admin[0]->password;?>" name="password"   />
    						</div>
    
    
    						<div class="col-md-6 col-sm-6 col-xs-12">
    							<label>Bank Name</label><b style="color:red;">*</b>
    							<input type="text" value = "<?php echo $admin[0]->bank_name;?>" name="bank_name"   />
    						</div>
                            
                            <div class="col-md-6 col-sm-6 col-xs-12">
    							<label>Bank Branch</label><b style="color:red;">*</b>
    							<input type="text" value = "<?php echo $admin[0]->bank_branch;?>" name="bank_branch"   />
    						</div>
    						<div class="col-md-6 col-sm-6 col-xs-12">
    							<label>Account No</label><b style="color:red;">*</b>
    							<input type="number" value = "<?php echo $admin[0]->account_no;?>" name="account_no"   />
    						</div>
    						
    						<div class="col-md-6 col-sm-6 col-xs-12">
    							<label>IFSC</label><b style="color:red;">*</b>
    							<input type="text" value = "<?php echo $admin[0]->ifsc;?>" name="ifsc"   />
    						</div>
    						<div class="col-md-6 col-sm-6 col-xs-6">
    							<label>Sallery</label><b style="color:red;">*</b>
    							<input type="number" value = "<?php echo $admin[0]->sallery;?>" name="sallery"   />
    						</div>
                            	<div class="col-md-6 col-sm-6 col-xs-6">
    							<label>PF</label><b style="color:red;">*</b>
    							<input type="number" value = "<?php echo $admin[0]->pf;?>" name="pf"   />
    						</div>
    
    						<div class="col-md-4 col-sm-3 col-xs-6">
    							<label>TA</label><b style="color:red;">*</b>
    							<input type="text" value = "<?php echo $admin[0]->ta;?>" name="ta"   />
    						</div>
    
    						<div class="col-md-4 col-sm-6 col-xs-6">
    							<label>Target</label><b style="color:red;">*</b>
    							<input type="text" value = "<?php echo $admin[0]->target;?>" name="targer"   />
    						</div>
    
    						<div class="col-md-4 col-sm-4 col-xs-12">
    							<label>After Target Percentage</label><b style="color:red;">*</b>
    							<input type="text" value = "<?php echo $admin[0]->after_target_payment;?>" name="after_target_percentage"   />
    						</div>
    
    						<div class="col-md-4 col-sm-4 col-xs-12">
    							<label>Insurance</label><b style="color:red;">*</b>
    							<input type="text" value = "<?php echo $admin[0]->insurance;?>" name="insurance"   />
    						</div>
    
    						<div class="col-md-4 col-sm-4 col-xs-12">
    							<label>Aadhar No</label><b style="color:red;">*</b>
    							<input type="text" value = "<?php echo $admin[0]->adhar_no;?>" name="aadhar_no"   />
    						</div>
    
    						<div class="col-md-4 col-sm-4 col-xs-12">
    							<label>Pan</label><b style="color:red;">*</b>
    							<input type="text" value = "<?php echo $admin[0]->pan;?>" name="pan"   />
    						</div>
    
    						<div class="col-md-12 col-sm-12 col-xs-12">
    							<label>Gender</label><b style="color:red;">*</b>
    						</div>
    						
    						<div class="col-md-3 col-sm-3 col-xs-6 radiobtn">
    							<input id="radio-1" <?php if($admin[0]->gender == 1){echo "checked";}?> type="radio" name="gender" value = "1"/>
    							<label for="radio-1">Male</label>
    						</div>
    
    						<div class="col-md-3 col-sm-3 col-xs-6 radiobtn">
    							<input id="radio-2" <?php if($admin[0]->gender == 0){echo "checked";}?> type="radio" name="gender" value = "0"/>
    							<label for="radio-2">Female</label>
    						</div>
    						
    						<div class="col-md-6 col-sm-6 col-xs-6">
    							<label>Join Date</label><b style="color:red;">*</b>
    							<input type="date" value = "<?php echo $admin[0]->join_date;?>" name="join_date" />
    						</div>
    						
    						<div class="col-md-6 col-sm-6 col-xs-6">
    							<label>Resignation Date</label><b style="color:red;">*</b>
    							<input type="date" value = "<?php echo $admin[0]->resignation_date;?>" name="resignation_date"   />
    						</div>
    
    						<div class="col-md-6 col-sm-6 col-xs-12">
    							<label>Status</label><b style="color:red;">*</b>
    						    <select name="status" >
    						        <option hidden>Select Status</option>
    						        <option value = "1" <?php if($admin[0]->status == 1) {echo "selected";}?>>Active</option>
    						        <option value = "0" <?php if($admin[0]->status == 0) {echo "selected";}?>>Inactive</option>
    						    </select>
    						</div>
    						
    						<hr>
    						<input type = "hidden" value = "<?php echo $admin[0]->user_id;?>" name = "id">
    						</div>
                    </div>
                    <?php if($this->session->userdata('user_type') != 'admin'){ ?>
                    <button type ="submit" class="effect effect-5 red pt-20">Update</button>
                    <?php }?>
                 </div>
                 
                 </form>
          
                  </div>
                </div>
              </div>
			  
            </div>
          </div>
        </div>
        <!-- /page content -->

	