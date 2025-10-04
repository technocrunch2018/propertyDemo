<div class="right_col" role="main">
    <div class="page-title"><div class="title_left"><h3><i class="fa fa-ioxhost"></i> Update Admin</h3></div></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">  
            <div class="x_panel">
                <form method="post" enctype="multipart/form-data" action="<?php echo base_url('backend/update_admin');?>">
                <div class="x_content">
                    <div class="row">
    					
    						<div class="col-md-6 col-sm-6 col-xs-12">
    							<label>Name</label><b style="color:red;">*</b>
    							<input type="text" required value = "<?php echo $admin[0]->name;?>" name="name"   />
    						</div>
                            
                            <div class="col-md-3 col-sm-3 col-xs-12">
    							<label>Designation</label><b style="color:red;">*</b>
    							<input type="text" required value = "<?php echo $admin[0]->desognation;?>" name="desognation"   />
    						</div>
    						
    						<div class="col-md-3 col-sm-3 col-xs-12">
    							<label>Department</label><b style="color:red;">*</b>
    							<input type="text" required name="department" value = "<?php echo $admin[0]->department;?>">
    						</div>
    						
    						<div class="col-md-3 col-sm-3 col-xs-12">
    							<label>Mobile</label><b style="color:red;">*</b>
    							<input type="number" required onKeyPress="if(this.value.length==13) return false;" value = "<?php echo $admin[0]->mobile;?>" name="mobile"   />
    						</div>
    
                            <div class="col-md-3 col-sm-3 col-xs-12">
    							<label>Official Mobile</label>
    							<input type="number" onKeyPress="if(this.value.length==13) return false;" value = "<?php echo $admin[0]->official_mobile;?>" name="official_mobile"   />
    						</div>
    
    						<div class="col-md-6 col-sm-6 col-xs-12">
    							<label>E-mail</label><b style="color:red;">*</b>
    							<input type="text" required value = "<?php echo $admin[0]->email;?>" name="email"   />
    						</div>
    
                            <div class="col-md-6 col-sm-6 col-xs-12">
    							<label>Official E-mail</label>
    							<input type="email" value = "<?php echo $admin[0]->official_email;?>" name="official_email"   />
    						</div>
    
    						<div class="col-md-6 col-sm-6 col-xs-12">
    							<label>Address</label><b style="color:red;">*</b>
    							<input type="text" required value = "<?php echo $admin[0]->address;?>" name="address"   />
    						</div>
    
    
    						<div class="col-md-6 col-sm-6 col-xs-12">
    							<label>Password</label><b style="color:red;">*</b>
    							<input type="text" required value = "<?php echo $admin[0]->password;?>" name="password"   />
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
    							<input type="text" value = "<?php echo $admin[0]->account_no;?>" name="account_no"   />
    						</div>
    						
    						<div class="col-md-6 col-sm-6 col-xs-12">
    							<label>IFSC</label><b style="color:red;">*</b>
    							<input type="text" class = "blockspecial" value = "<?php echo $admin[0]->ifsc;?>" onKeyPress="if(this.value.length==11) return false;" name="ifsc"   />
    						</div>
    						<div class="col-md-3 col-sm-3 col-xs-12">
    							<label>Salary</label><b style="color:red;">*</b>
    							<input type="number" value = "<?php echo $admin[0]->sallery;?>" name="sallery"   />
    						</div>
    						
    						<div class="col-md-3 col-sm-3 col-xs-12">
    							<label>Target</label><b style="color:red;">*</b>
    							<input type="number" value = "<?php echo $admin[0]->target;?>" name="targer"   />
    						</div>
    						
                            	<div class="col-md-3 col-sm-3 col-xs-12">
    							<label>PF</label><b style="color:red;">*</b>
    							<input type="number" value = "<?php echo $admin[0]->pf;?>" name="pf"   />
    						</div>
    
    						<div class="col-md-3 col-sm-3 col-xs-3">
    							<label>TA</label><b style="color:red;">*</b>
    							<input type="number" value = "<?php echo $admin[0]->ta;?>" name="ta"   />
    						</div>
    						
    						<div class="col-md-3 col-sm-6 col-xs-12">
    							<label>ESI</label><b style="color:red;">*</b>
    							<input required type="number" name="esi" value = "<?php echo $admin[0]->esi;?>"  />
    						</div>
    
    						<div class="col-md-3 col-sm-3 col-xs-12">
    							<label>After Target Percentage</label><b style="color:red;">*</b>
    							<input type="text" value = "<?php echo $admin[0]->after_target_payment;?>" name="after_target_percentage"   />
    						</div>
  
    						<div class="col-md-3 col-sm-3 col-xs-3">
    							<label>Insurance</label><b style="color:red;">*</b>
    							<input type="number" value = "<?php echo $admin[0]->insurance;?>" name="insurance"   />
    						</div>
                            
                            <div class="col-md-3 col-sm-3 col-xs-12">
    							<label>P. Tax</label>
    							<input type="number" name="p_tax"  value = "<?php echo $admin[0]->p_tax;?>" />
    						</div>
    						
    						<div class="col-md-3 col-sm-3 col-xs-3">
    							<label>Aadhar No</label><b style="color:red;">*</b>
    							<input type="number" required onKeyPress="if(this.value.length==12) return false;" value = "<?php echo $admin[0]->adhar_no;?>" name="aadhar_no"   />
    						</div>
    
    						<div class="col-md-3 col-sm-3 col-xs-3">
    							<label>Pan</label><b style="color:red;">*</b>
    							<input type="text" required value = "<?php echo $admin[0]->pan;?>" onKeyPress="if(this.value.length==10) return false;" name="pan" class = "blockspecial" style="text-transform:uppercase; width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;"  />
    						</div>

    						<div class="col-md-6 col-sm-6 col-xs-12" style="padding:0;margin:0;">
    						    
    						<div class="col-md-12 col-sm-6 col-xs-12">
    						    <label>Gender</label><b style="color:red;">*</b>
    						</div>
    							
    						<div class="col-md-6 col-sm-6 col-xs-12 radiobtn">
    							<input required <?php if($admin[0]->gender == 1){echo "checked";}?> type="radio" name="gender" id="male-gender" value = "1"   />
    							<label for="male-gender">Male</label>
    						</div>
    
    						<div class="col-md-6 col-sm-6 col-xs-12 radiobtn">
    							<input required <?php if($admin[0]->gender == 0){echo "checked";}?> type="radio" name="gender" id="female-gender" value = "0"   />
    							<label for="female-gender">Female</label>
    						</div>
    						
    						</div>
    						<div class="col-md-6 col-sm-6 col-xs-12">
    							<label>Weekly Off</label><b style="color:red;">*</b>
    						    <select name="weeky_off" required >
    						        <option value = "Sunday" <?php if($admin[0]->weekly_offs == "Sunday"){echo "selected";}?>>Sunday</option>
    						        <option value = "Monday" <?php if($admin[0]->weekly_offs == "Monday"){echo "selected";}?>>Monday</option>
    						        <option value = "Tuesday" <?php if($admin[0]->weekly_offs == "Tuesday"){echo "selected";}?>>Tuesday</option>
    						        <option value = "Wednesday" <?php if($admin[0]->weekly_offs == "Wednesday"){echo "selected";}?>>Wednesday</option>
    						        <option value = "Thuesday" <?php if($admin[0]->weekly_offs == "Thuesday"){echo "selected";}?>>Thuesday</option>
    						        <option value = "Friday" <?php if($admin[0]->weekly_offs == "Friday"){echo "selected";}?>>Friday</option>
    						        <option value = "Saturday" <?php if($admin[0]->weekly_offs == "Saturday"){echo "selected";}?>>Saturday</option>
    						    </select>
    						</div>
    						<div class="col-md-6 col-sm-6 col-xs-12">
    							<label>Join Date</label><b style="color:red;">*</b>
    							<input type="date" value = "<?php echo $admin[0]->join_date;?>" name="join_date"   />
    						</div>
    						
    						<div class="col-md-6 col-sm-6 col-xs-12">
    							<label>Resignation Date</label>
    							<input type="date" value = "<?php echo $admin[0]->resignation_date;?>" name="resignation_date"   />
    						</div>
        
    						
    							<div class="col-md-6 col-sm-6 col-xs-12">
    							<label>Profile</label>
    							<div class="file-drop-area">
                                    <span class="fake-btn">Choose files</span>
                                    <span class="file-msg">or drag and drop Image here</span>
                                    <input class="file-input" type="file" name="profile" accept="image/*" id="fileImage UploadImages">
                                    <input class="file-input" type="hidden" name="profile" id="prevUploadImages">
                                </div>
    						</div>
    						
    						<div class="col-md-6 col-sm-6 col-xs-12">
    							<label>CV</label>
    							<div class="file-drop-area">
                                    <span class="fake-btn">Choose files</span>
                                    <span class="file-msg">or drag and drop Image here</span>
                                    <input class="file-input" type="file" name="cv" accept="image/*" id="fileImage UploadImages">
                                    <input class="file-input" type="hidden" value = "<?php echo $admin[0]->user_id;?>" name = "id" id="prevUploadImages">
                                </div>
    						</div>
    						<div class="col-md-6 col-sm-6 col-xs-12">
    							<label>Status</label><b style="color:red;">*</b>
    						    <select required name="status" >
    						        <option hidden>Select Status</option>
    						        <option value = "1" <?php if($admin[0]->status == 1) {echo "selected";}?>>Active</option>
    						        <option value = "0" <?php if($admin[0]->status == 0) {echo "selected";}?>>Inactive</option>
    						    </select>
    						</div>
                    </div>
                    <button type ="submit" class = "effect red effect-5" style="margin:20px 0">Update</button>
                 </div>
                 
                 </form>
            </div>
        </div>
    </div>
</div>