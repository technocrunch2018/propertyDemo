<div class="right_col" role="main">
    <div class="page-title"><div class="title_left"><h3><i class="fa fa-ioxhost"></i> Update Lead Partners</h3></div></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">  
            <div class="x_panel">
                <form method="post" enctype="multipart/form-data" action="<?php echo base_url('backend/update_lead_partners');?>">
                <div class="x_content">
                    <div class="tab"> 
                        <div class="col-md-4 col-sm-4 col-xs-12">
                            <label>Name</label><b style="color:red;">*</b>
                            <input type="text"required value = "<?php echo $users[0]->name;?>" name="name" />
                        </div>
      
                        <div class="col-md-4 col-sm-4 col-xs-12">
                            <label>Mobile</label><b style="color:red;">*</b>
                            <input type="text" required onKeyPress="if(this.value.length==13) return false;" value = "<?php echo $users[0]->phone;?>" size="20" maxlength="10" onkeypress='return isNumberKey(event)' name="mobile"     />
                        </div>
                        <div class="col-md-4 col-sm-6 col-xs-6">
                            <label>Alternate Mobile</label>
                            <input value = "<?php echo $users[0]->alt_mobile;?>" onKeyPress="if(this.value.length==13) return false;" type="text" name="alt_mobile"  onblur="checkValue(this)"  />
                        </div>
                        
                        <div class="col-md-4 col-sm-6 col-xs-6">
                            <label>Landline</label>
                            <input value = "<?php echo $users[0]->landline;?>" onKeyPress="if(this.value.length==14) return false;" type="text" name="landline"  onblur="checkValue(this)"  />
                        </div>

                        <div class="col-md-4 col-sm-4 col-xs-12">
                            <label>E-mail</label><b style="color:red;">*</b>
                            <input type="email" required value = "<?php echo $users[0]->email;?>" name="email"  onblur="checkValue(this)"  />
                        </div>

                        <div class="col-md-4 col-sm-4 col-xs-12">
                            <label>Bank Name</label>
                            <input value = "<?php echo $users[0]->bank_name;?>" type="text" name="bankname"  onblur="checkValue(this)"  />
                        </div>

                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <label>Bank Branch</label>
                            <input value = "<?php echo $users[0]->bank_branch;?>" type="text" name="bank_branch"  onblur="checkValue(this)"  />
                        </div>
                        
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <label>Account Holder</label>
                            <input value = "<?php echo $users[0]->ac_holder;?>" type="text" name="ac_holder"  onblur="checkValue(this)"  />
                        </div>

                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <label>IFSC</label>
                            <input class = "blockspecial" onKeyPress="if(this.value.length==11) return false;" value = "<?php echo $users[0]->ifsc;?>" type="text" name="ifsc"  onblur="checkValue(this)"  />
                        </div>
                        
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <label>Account Number</label>
                            <input value = "<?php echo $users[0]->account_no;?>" type="number" name="acc_number"  onblur="checkValue(this)"  />
                        </div>
                        <div class="col-md-4 col-sm-6 col-xs-6">
                            <label>Aadhar </label><b style="color:red;">*</b>
                            <input required value = "<?php echo $users[0]->aadhar;?>" onKeyPress="if(this.value.length==12) return false;" type="number" name="aadhar"  onblur="checkValue(this)"  />
                        </div>
                        
                        <div class="col-md-4 col-sm-6 col-xs-6">
                            <label>Pan</label><b style="color:red;">*</b>
                            <input class = "blockspecial" required onKeyPress="if(this.value.length==10) return false;" value = "<?php echo $users[0]->pan;?>" type="text" name="pan"  >
                        </div>
                        
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <label>Address</label>
                            <input value = "<?php echo $users[0]->address;?>" type="text" name="address"  onblur="checkValue(this)"  />
                        </div>
                        <input type = "hidden" name = "user_id" value = "<?php echo $users[0]->user_id;?>">

                        </div>
                    </div>
                    <div class="col-md-12 col-sm-12 col-xs-12 pt-10 pb-10">
                        <button type ="submit" class = "effect effect-5 red">Update</button>
                    </div>
                 </div>
                 </form>
            </div>
        </div>
    </div>
</div>