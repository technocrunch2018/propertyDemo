<div class="right_col" role="main">
    <div class="page-title"><div class="title_left"><h3><i class="fa fa-ioxhost"></i> View Admin</h3></div></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">  
            <div class="x_panel">
                <div class="x_content">
                    <div class="row">
    						<div class="col-md-6 col-sm-6 col-xs-12">
    							<label>Name</label><b style="color:red;">*</b>
    							<input type="text" value = "<?php echo $admin[0]->name;?>" name="name"   />
    						</div>
    
    						<div class="col-md-6 col-sm-6 col-xs-12">
    							<label>Mobile</label><b style="color:red;">*</b>
    							<input type="text" value = "<?php echo $admin[0]->mobile;?>" name="mobile"   />
    						</div>
    
    						<div class="col-md-6 col-sm-6 col-xs-12">
    							<label>E-mail</label><b style="color:red;">*</b>
    							<input type="text" value = "<?php echo $admin[0]->email;?>" name="email"   />
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
    							<label>Sallery</label><b style="color:red;">*</b>
    							<input type="text" value = "<?php echo $admin[0]->sallery;?>" name="sallery"   />
    						</div>
    
    						<div class="col-md-6 col-sm-6 col-xs-12">
    							<label>Bank Branch</label><b style="color:red;">*</b>
    							<input type="text" value = "<?php echo $admin[0]->bank_branch;?>" name="bank_branch"   />
    						</div>
    
    
    						
    						<div class="col-md-6 col-sm-6 col-xs-12">
    							<label>Target</label><b style="color:red;">*</b>
    							<input type="text" value = "<?php echo $admin[0]->target;?>" name="targer"   />
    						</div>
    
    						<div class="col-md-6 col-sm-6 col-xs-12">
    							<label>Account No</label><b style="color:red;">*</b>
    							<input type="text" value = "<?php echo $admin[0]->account_no;?>" name="account_no"   />
    						</div>
    
    						<div class="col-md-6 col-sm-6 col-xs-12">
    							<label>PF</label><b style="color:red;">*</b>
    							<input type="text" value = "<?php echo $admin[0]->pf;?>" name="pf"   />
    						</div>
    
    						<div class="col-md-6 col-sm-6 col-xs-12">
    							<label>IFSC</label><b style="color:red;">*</b>
    							<input type="text" value = "<?php echo $admin[0]->ifsc;?>" name="ifsc"   />
    						</div>
    
    						<div class="col-md-3 col-sm-3 col-xs-3">
    							<label>Insurance</label><b style="color:red;">*</b>
    							<input type="text" value = "<?php echo $admin[0]->insurance;?>" name="insurance"   />
    						</div>
    
    						<div class="col-md-3 col-sm-3 col-xs-3">
    							<label>Aadhar No</label><b style="color:red;">*</b>
    							<input type="text" value = "<?php echo $admin[0]->adhar_no;?>" name="aadhar_no"   />
    						</div>
    
    						<div class="col-md-3 col-sm-3 col-xs-3">
    							<label>TA</label><b style="color:red;">*</b>
    							<input type="text" value = "<?php echo $admin[0]->ta;?>" name="ta"   />
    						</div>
    
    						<div class="col-md-3 col-sm-3 col-xs-3">
    							<label>Pan</label><b style="color:red;">*</b>
    							<input type="text" value = "<?php echo $admin[0]->pan;?>" name="pan"   />
    						</div>
    
    						<div class="col-md-6 col-sm-6 col-xs-12">
    							<label>After Target Percentage</label><b style="color:red;">*</b>
    							<input type="text" value = "<?php echo $admin[0]->after_target_payment;?>" name="after_target_percentage"   />
    						</div>
    
    						<div class="col-md-6 col-sm-6 col-xs-12">
    							<label>Join Date</label><b style="color:red;">*</b>
    							<input type="date" value = "<?php echo $admin[0]->join_date;?>" name="join_date"   />
    						</div>
    
    						<div class="col-md-12 col-sm-12 col-xs-12">
    							<label>Gender</label><b style="color:red;">*</b>
    						</div>
    						<div class="col-md-3 col-sm-3 col-xs-6 radiobtn">
    							<input <?php if($admin[0]->gender == 1){echo "checked";}?> type="radio" id="male" name="gender" value = "1"   />
    							<label for="male">Male</label><b style="color:red;">*</b>
    						</div>
    
    						<div class="col-md-3 col-sm-3 col-xs-6 radiobtn">
    							<input <?php if($admin[0]->gender == 0){echo "checked";}?> type="radio" id="female" name="gender" value = "0"   />
    							<label for="female">Female</label><b style="color:red;">*</b>
    						</div>
    						<input type = "hidden" value = "<?php echo $admin[0]->user_id;?>" name = "id">
    						</div>
                    </div>
                 </div>
            </div>
        </div>
    </div>
</div>