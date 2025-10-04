<div class="right_col" role="main">
    <div class="page-title"><div class="title_left"><h3><i class="fa fa-ioxhost"></i> Update Users</h3></div></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">  
            <div class="x_panel">
                <form method="post" enctype="multipart/form-data" action="<?php echo base_url('backend/update_users');?>">
                <div class="x_content">
                    <div class="tab"> 
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <label>Name</label><b style="color:red;">*</b>
                            <input type="text" value = "<?php echo $users[0]->name;?>" name="name"     READONLY/>
                        </div>
      
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <label>Mobile</label><b style="color:red;">*</b>
                            <input type="text" value = "<?php echo $users[0]->phone;?>" size="20" maxlength="10" onkeypress='return isNumberKey(event)' name="mobile"  READONLY   />
                        </div>

                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <label>E-mail</label><b style="color:red;">*</b>
                            <input type="text" value = "<?php echo $users[0]->email;?>" name="email"  onblur="checkValue(this)" READONLY />
                        </div>
      
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <label>State</label><b style="color:red;">*</b>
                            <select name="state" >
                                <option hidden value="">--Select--</option>
                                    <option disabled >Select one </option>
                                <?php foreach($state as $list){?>
                                    <option value="<?php echo $list->id;?>" <?php if($list->id == $users[0]->state){echo "selected";}?>><?php echo $list->name;?></option>
                                <?php }?>
                                
                            </select>
                        </div>

                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <label>City</label><b style="color:red;">*</b>
                            <select name="city" >
                                <option hidden value="">--Select--</option>
                                    <option disabled >Select one </option>
                                <?php foreach($city as $list){?>
                                    <option value="<?php echo $list->id;?>" <?php if($list->id == $users[0]->city){echo "selected";}?> ><?php echo $list->name; ?></option>
                                <?php }?>
                                
                            </select>
                        </div>

                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <label>Land Mark</label><b style="color:red;">*</b>
                            <input value = "<?php echo $users[0]->landmark;?>" type="text" name="landmark"  onblur="checkValue(this)"  />
                        </div>

       
      
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <label>Pincode</label><b style="color:red;">*</b>
                            <input value = "<?php echo $users[0]->pincode;?>" type="text" onkeypress='return isNumberKey(event)' name="pincode"  onblur="checkValue(this)"  />
                        </div>
       

                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <label>Address</label><b style="color:red;">*</b>
                            <input value = "<?php echo $users[0]->address;?>" type="text" name="address"  onblur="checkValue(this)"  />
                        </div>
                        <?php if($users[0]->usertype != "Owner"){?>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <label>Company Name</label><b style="color:red;">*</b>
                            <input value = "<?php echo $users[0]->company_name;?>" type="text" name="com_name"  onblur="checkValue(this)"  />
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <label>Website</label><b style="color:red;">*</b>
                            <input value = "<?php echo $users[0]->website;?>" type="text" name="website"  onblur="checkValue(this)"  />
                        </div>
                        <?php }?>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <label>About Us</label><b style="color:red;">*</b>
                            <input value = "<?php echo $users[0]->about_us;?>" type="text" name="about_us"  onblur="checkValue(this)"  />
                        </div>
                        <input type = "hidden" name = "user_id" value = "<?php echo $users[0]->user_id;?>">
                        <input type = "hidden" name = "last_url" value = "<?php echo $last_url;?>">
                        </div>
                    </div>
                 </div>
                 <button type ="submit" class = "effect effect-5 red">Update</button>
                 </form>
            </div>
        </div>
    </div>
</div>

                
             
        <!-- /page content -->
<style>
    table {
      font-family: arial, sans-serif;
      border-collapse: collapse;
      width: 100%;
    }

    td, th {
      border: 1px solid #dddddd;
      text-align: left;
      padding: 8px;
    }

    tr:nth-child(even) {
      background-color: #dddddd;
    }
</style>
