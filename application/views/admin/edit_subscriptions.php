<div class="right_col" role="main">
    <div class="page-title"><div class="title_left"><h3><i class="fa fa-ioxhost"></i> Edit Subscriptions</h3></div></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">  
            <div class="x_panel">
                <form method="post" enctype="multipart/form-data" action="<?php echo base_url('backend/upate_subscription');?>">
                <div class="x_content">
                    <div class="tab"> 
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <label>Name</label><b style="color:red;">*</b>
                            <input type="text" value = "<?php echo $active_sub[0]->name; ?>" name="name"     />
                        </div>
      
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <label>User Type</label><b style="color:red;">*</b>
                            
                            <select name = "user_type" >
                                <option hidden>Select User Type</option>
                                <option value = "Owner" <?php if($active_sub[0]->user_type == "Owner"){echo "selected";}?>>Owner</option>
                                <option value = "Agent" <?php if($active_sub[0]->user_type == "Agent"){echo "selected";}?>>Agent</option>
                                <option value = "Builder" <?php if($active_sub[0]->user_type == "Builder"){echo "selected";}?>>Builder</option>
                            </select>
                        </div>
                        
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <label>Purpose</label><b style="color:red;">*</b>
                            
                            <select name = "purpose" >
                                <option hidden>Select Purpose</option>
                                <option value = "1" <?php if($active_sub[0]->purpose == "1"){echo "selected";}?>>Sale</option>
                                <option value = "2" <?php if($active_sub[0]->purpose == "2"){echo "selected";}?>>Rent</option>
                                <option value = "3" <?php if($active_sub[0]->purpose == "3"){echo "selected";}?>>Both</option>
                            </select>
                        </div>

                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <label>Validity (In Days)</label><b style="color:red;">*</b>
                            <input type="text" value = "<?php echo $active_sub[0]->validity; ?>"  name="validity"  onblur="checkValue(this)"  />
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <label>Number Of listings</label><b style="color:red;">*</b>
                            <input type="text" value = "<?php echo $active_sub[0]->listings; ?>" name="listings"  onblur="checkValue(this)"  />
                        </div>
                        <div class="col-md-3 col-sm-3 col-xs-6">
                                <label>OLD Price</label>
                                <input type="text" value = "<?php echo $active_sub[0]->oldPrice; ?>"  name="oldprice"  onblur="checkValue(this)"  />
                            </div>
                            <div class="col-md-3 col-sm-3 col-xs-6">
                                <label>NEW Price</label><b style="color:red;">*</b>
                                <input type="text" value = "<?php echo $active_sub[0]->price; ?>"  name="price"  onblur="checkValue(this)"  />
                            </div>

                        <div class="col-md-12 col-sm-12 col-xs-12">
                                <?php if(!empty($subElements)){ ?>
                                <?php foreach($subElements as $i=>$row){ ?>
                                    <?php $subElements = explode(',', $active_sub[0]->subElements); ?>
                                <input type="checkbox" id="sub-<?php echo $row->id;?>" name="subElements[]" <?php if (in_array($row->id, $subElements)) { echo "checked";}?> value="<?php echo $row->id;?>">
                                <label for="sub-<?php echo $row->id;?>"> <?php echo $row->name;?></label>
                                <?php } ?>
                                <?php } ?><br>
                            </div>

                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <label>Details</label><b style="color:red;">*</b>
                            <textarea  name="details"  onblur="checkValue(this)"  /><?php echo $active_sub[0]->details; ?></textarea>
                        </div>
                        <input type = "hidden" name = "id" value = "<?php echo $active_sub[0]->id; ?>">
                    </div>
                 </div>
                 <div class="col-md-12 col-sm-12 col-xs-12 pt-10 pb-20">
                     <button type ="submit" class = "effect effect-5 red">Update</button>
                 </div>
                 
                 </form>
            </div>
        </div>
    </div>
</div>