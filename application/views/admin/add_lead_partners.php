<div class="right_col" role="main">
    <div class="page-title"><div class="title_left"><h3><i class="fa fa-ioxhost"></i> Add Lead Partners</h3></div></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">  
            <form method="post" enctype="multipart/form-data" action="<?php echo base_url('backend/save_lead_partners');?>">
                <div class="x_panel">
                    <div class="x_content">
                        <div class="tab"> 
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <label>Name</label><b style="color:red;">*</b>
                                <input type="text" required name="name" />
                            </div>
          
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <label>Mobile</label><b style="color:red;">*</b>
                                <input type="number" required size="20" onKeyPress="if(this.value.length==13) return false;" maxlength="10" name="mobile"     />
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <label>Alternate Mobile</label>
                                <input type="text" name="alt_mobile" onKeyPress="if(this.value.length==13) return false;" onblur="checkValue(this)"  />
                            </div>
                            
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <label>Landline</label>
                                <input type="number" name="landline" onKeyPress="if(this.value.length==14) return false;" onblur="checkValue(this)"  />
                            </div>
    
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <label>E-mail</label><b style="color:red;">*</b>
                                <input type="email" required name="email"  onblur="checkValue(this)"  />
                            </div>
    
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <label>Bank Name</label>
                                <input type="text" name="bankname"  onblur="checkValue(this)"  />
                            </div>
    
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <label>Bank Branch</label>
                                <input type="text" name="bank_branch"  onblur="checkValue(this)"  />
                            </div>
                            
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <label>Account Holder</label>
                                <input type="text" name="ac_holder"  onblur="checkValue(this)"  />
                            </div>
    
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <label>IFSC</label>
                                <input type="text" class = "blockspecial" onKeyPress="if(this.value.length==11) return false;" name="ifsc" onblur="checkValue(this)"  />
                            </div>
                            
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <label>Account Number</label>
                                <input type="number" name="acc_number"  onblur="checkValue(this)"  />
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <label>Aadhar </label><b style="color:red;">*</b>
                                <input type="number" required name="aadhar" onKeyPress="if(this.value.length==12) return false;" onblur="checkValue(this)"  />
                            </div>
                            
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <label>Pan</label><b style="color:red;">*</b>
                                <input type="text"  class = "blockspecial" required name="pan" onKeyPress="if(this.value.length==10) return false;"   >
                            </div>
                            
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <label>Address</label><b style="color:red;">*</b>
                                <textarea type="text" name="address"  onblur="checkValue(this)"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <button type ="submit" class = "effect red effect-5" style="margin:20px 0 10px 0;">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>