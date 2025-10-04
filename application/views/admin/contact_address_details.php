<div class="right_col" role="main">
    <div class="page-title"><div class="title_left"><h3><i class="fa fa-ioxhost"></i> Update Contact Details</h3></div></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">  
            <div class="x_panel">
                <form method="post" enctype="multipart/form-data" action="<?php echo base_url('backend/update_address_contact_details');?>">
                <div class="x_content">
                    <div class="tab"> 
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <label>Name</label><b style="color:red;">*</b>
                            <input type="text" value = "<?php echo $tab[0]->name;?>" name="name" />
                        </div>

                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <label>Mobile 1</label><b style="color:red;">*</b>
                            <input type="text" value = "<?php echo $tab[0]->mobile1;?>" name="mobile1"  onblur="checkValue(this)"  />
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <label>Mobile 2</label><b style="color:red;">*</b>
                            <input type="text" value = "<?php echo $tab[0]->mobile2;?>" name="mobile2"  onblur="checkValue(this)"  />
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <label>Mobile 3</label><b style="color:red;">*</b>
                            <input type="text" value = "<?php echo $tab[0]->mobile3;?>" name="mobile3"  onblur="checkValue(this)"  />
                        </div>
                        
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <label>Email 1</label><b style="color:red;">*</b>
                            <input type="text" value = "<?php echo $tab[0]->email1;?>" name="email1"  onblur="checkValue(this)"  />
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <label>Email 2</label><b style="color:red;">*</b>
                            <input type="text" value = "<?php echo $tab[0]->email2;?>" name="email2"  onblur="checkValue(this)"  />
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <label>Email 3</label><b style="color:red;">*</b>
                            <input type="text" value = "<?php echo $tab[0]->email3;?>" name="email3"  onblur="checkValue(this)"  />
                        </div>
                        
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <label>Address 1</label><b style="color:red;">*</b>
                            <input type="text" value = "<?php echo $tab[0]->address1;?>" name="address1"  onblur="checkValue(this)"  />
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <label>Address 2</label><b style="color:red;">*</b>
                            <input type="text" value = "<?php echo $tab[0]->address2;?>" name="address2"  onblur="checkValue(this)"  />
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <label>Address 3</label><b style="color:red;">*</b>
                            <input type="text" value = "<?php echo $tab[0]->address3;?>" name="address3"  onblur="checkValue(this)"  />
                        </div>
                    </div>
                 </div>
                 <div class="col-md-12 col-sm-12 col-xs-12">
                     <button type ="submit" class = "effect effect-5 red" style="margin:15px 0 15px 0;">Save</button>
                 </div>
                 </form>
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">  
            <div class="x_panel">
                <h2>Notice Board</h2>
                <form method="post" enctype="multipart/form-data" action="<?php echo base_url('backend/update_accept_terms');?>">
                <div class="x_content">
                    <div class="tab"> 
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <label>Notice</label><b style="color:red;">*</b>
                            <input type = "text" name="accept_terms" value = "<?php echo $tab[0]->accept_terms;?>" required >
                        </div>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <label>Notice</label><b style="color:red;">*</b>
                        </div>
                        <div class="col-md-3 col-sm-3 col-xs-6 radiobtn">
                            <input type="radio" id="seller" name="status" value="0" <?php if($tab[0]->accept_terms_status == 0 ){ echo 'checked'; } ?> />
                            <label for="seller">Active</label>
                        </div>
                        <div class="col-md-3 col-sm-3 col-xs-6 radiobtn">
                            <input type="radio" id="buyer" name="status" value="1" <?php if($tab[0]->accept_terms_status == 1) { echo 'checked'; }?> />
                            <label for="buyer">Deactive</label>    
                        </div>
                    </div>
                 </div>
                 <div class="col-md-12 col-sm-12 col-xs-12">
                     <button type ="submit" class = "effect effect-5 red" style="margin:15px 0 15px 0;">Save</button>
                 </div>
                 </form>
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">  
            <div class="x_panel">
                <h2>Terms & Condition</h2>
                <form method="post" enctype="multipart/form-data" action="<?php echo base_url('backend/update_terms');?>">
                <div class="x_content">
                    <div class="tab"> 
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <label>Terms & Condition</label><b style="color:red;">*</b>
                            <textarea class="summernote" name="terms"><?php echo $tab[0]->terms;?></textarea>
                        </div>
                    </div>
                 </div>
                 <div class="col-md-12 col-sm-12 col-xs-12">
                     <button type ="submit" class = "effect effect-5 red" style="margin:15px 0 15px 0;">Save</button>
                 </div>
                 </form>
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">  
            <div class="x_panel">
                <h2>Privacy Policy</h2>
                <form method="post" enctype="multipart/form-data" action="<?php echo base_url('backend/policy');?>">
                <div class="x_content">
                    <div class="tab"> 
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <label>Privacy Policy</label><b style="color:red;">*</b>
                            <textarea class="summernote" name="policy"><?php echo $tab[0]->policy;?></textarea>
                        </div>
                    </div>
                 </div>
                 <div class="col-md-12 col-sm-12 col-xs-12">
                     <button type ="submit" class = "effect effect-5 red" style="margin:15px 0 15px 0;">Save</button>
                 </div>
                 </form>
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">  
            <div class="x_panel">
                <h2>Disclaimer</h2>
                <form method="post" enctype="multipart/form-data" action="<?php echo base_url('backend/disclaimer');?>">
                <div class="x_content">
                    <div class="tab"> 
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <label>Disclaimer</label><b style="color:red;">*</b>
                            <textarea class="summernote" name="disclaimer"><?php echo $tab[0]->disclaimer;?></textarea>
                        </div>
                    </div>
                 </div>
                 <div class="col-md-12 col-sm-12 col-xs-12">
                     <button type ="submit" class = "effect effect-5 red" style="margin:15px 0 15px 0;">Save</button>
                 </div>
                 </form>
            </div>
        </div>
    </div>
    
</div>
