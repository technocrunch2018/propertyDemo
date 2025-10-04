<div class="right_col" role="main">
    <div class="page-title"><div class="title_left"><h3><i class="fa fa-ioxhost"></i> Add New PG</h3></div></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">  
        <?php if(@$pg_details){?>
            <form method="POST" action="<?php echo base_url('backend/update_pg'); ?>" enctype="multipart/form-data">
        <?php } else{?>
           <form method="POST" action="<?php echo base_url('backend/save_pg'); ?>" enctype="multipart/form-data">
               <?php }?>
                <div class="x_panel">
    		        <input type="hidden" name="post_id" id="post_id" value="0"   />
                    <div class="row">
        			    <div class="col-md-6 col-sm-6 col-xs-6">
        			        <label>State</label><b style="color:red;">*</b>
        				    <input type="text" name="state" id="state" value = "<?php echo @$pg_details[0]->state;?>" required>
        				    <input type="hidden" name="id" id="id" value = "<?php echo @$pg_details[0]->id;?>" required>
        			    </div>
        			    
        			    <div class="col-md-6 col-sm-6 col-xs-6">
        			        <label>City</label><b style="color:red;">*</b>
        				    <input type="text" name="city" id="city" value = "<?php echo @$pg_details[0]->city;?>" required>
        			    </div>
        			    <div class="col-md-6 col-sm-6 col-xs-12">
        			        <label>Locations</label><b style="color:red;">*</b>
        				    <input type="text" name="location" id="location" value = "<?php echo @$pg_details[0]->location;?>" required>
        			    </div>
        			    
        			    <div class="col-md-6 col-sm-6 col-xs-12">
        			        <label>Landmark</label><b style="color:red;">*</b>
        				    <input type="text" name="landmark" id="landmark" value = "<?php echo @$pg_details[0]->landmark;?>" >
        			    </div>
        			    
        			    <div class="col-md-6 col-sm-6 col-xs-12">
        			        <label>Pincode</label><b style="color:red;">*</b>
        				    <input type="number" name="pincode"  id="pincode" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==6) return false;" value = "<?php echo @$pg_details[0]->pincode;?>" required>
        			    </div>
        			    
        			    <div class="col-md-6 col-sm-6 col-xs-12">
        			        <label>Managed by</label>
        				    <input type="text" name="managedby" id="managedby" value = "<?php echo @$pg_details[0]->managedby;?>">
        			    </div>
        			    
        			    <div class="col-md-12 col-sm-12 col-xs-12">
        			        <label>PG Name</label><b style="color:red;">*</b>
        				    <input type="text" name="pg_name" id="pg_name" value = "<?php echo @$pg_details[0]->pg_name;?>" required>
        			    </div>
        			    
        			    <div class="col-md-3 col-sm-3 col-xs-6">
        			        <label>Private Room Price</label>
        				    <input type="number" name="private_room_price" id="private_room_price"  value = "<?php echo @$pg_details[0]->private_room_price;?>">
        			    </div>
        			    
        			    <div class="col-md-3 col-sm-3 col-xs-6">
        			        <label>Double Sharing Price</label>
        				    <input type="number" name="double_sharing_room" id="double_sharing_room" value = "<?php echo @$pg_details[0]->double_sharing_room;?>">
        			    </div>
        			    <div class="col-md-3 col-sm-3 col-xs-6">
        			        <label>Triple sharing Price</label>
        				    <input type="number" name="triple_sharing_room" id="triple_sharing_room" value = "<?php echo @$pg_details[0]->triple_sharing_room;?>">
        			    </div>
        			    
        			    <div class="col-md-6 col-sm-6 col-xs-6">
        			        <label>Nearby location 1</label><b style="color:red;">*</b>
        				    <input type="text" name="near_location1" id="near_location1" value = "<?php echo @$pg_details[0]->near_location1;?>">
        			    </div>
        			    
        			    <div class="col-md-6 col-sm-6 col-xs-6">
        			        <label>Nearby location 2</label><b style="color:red;">*</b>
        				    <input type="text" name="near_location2" id="near_location2" value = "<?php echo @$pg_details[0]->near_location2;?>">
        			    </div>
        			    <div class="col-md-6 col-sm-6 col-xs-6">
        			        <label>Nearby location 3</label><b style="color:red;">*</b>
        				    <input type="text" name="near_location3" id="near_location3" value = "<?php echo @$pg_details[0]->near_location3;?>">
        			    </div>
        			    
        			    <div class="col-md-12 col-sm-12 col-xs-12">
        			        <label style="color:#444;">Parking</label><b style="color:red;">*</b>
        			    </div>
        			    
        			    <div class="col-md-2 col-sm-6 col-xs-4">
        			        <input type="checkbox" id="Bike" value="Bike" name="bike" <?php if(@$pg_details[0]->bike == 'Bike'){echo "checked";}?>>                                
                            <label for="Bike" >Bike</label>
                        </div>
                        
                        <div class="col-md-2 col-sm-6 col-xs-4">
                            <input type="checkbox" id="Car" value="Car" name="car" <?php if(@$pg_details[0]->car == 'Car'){echo "checked";}?>>
                            <label for="Car" >Car</label>
                        </div>
                        
                        
                        <div class="col-md-2 col-sm-12 col-xs-12">
        			        <label style="color:#444;">PG For</label><b style="color:red;">*</b>
        			    </div>
        			    
        			    <div class="col-md-2 col-sm-6 col-xs-4">
        			        <input type="checkbox" id="Girls" value="Girls" name="girls" <?php if(@$pg_details[0]->girls == 'Girls'){echo "checked";}?>>                                
                            <label for="Girls" >Girls</label>
                        </div>
                        
                        <div class="col-md-2 col-sm-6 col-xs-4">
                            <input type="checkbox" id="Boys" value="Boys" name="boys" <?php if(@$pg_details[0]->boys == 'Boys'){echo "checked";}?>>
                            <label for="Boys" >Boys</label>
                        </div>
                        
                        <div class="col-md-2 col-sm-6 col-xs-4">
                            <input type="checkbox" id="Both" value="Both" name="both" <?php if(@$pg_details[0]->both == 'Both'){echo "checked";}?>>
                            <label for="Both" >Both</label>
                        </div>
                        
        			    
        			    <div class="col-md-12 col-sm-12 col-xs-12 pt-20">
                            <label style="color:#444;">Amenities</label><b style="color:red;">*</b>
                        </div>
        			    <?php if(!empty($ami_booked))
        			    {
        			        foreach($ami_booked as $list)
            			    {$data[] = $list['amenities_id'];}  $ami_main = implode(",",$data); 
            			}else{$data = [];} ?>

        			    <?php foreach($ami as $list)
        			    {?>
            			    <div class="col-md-3 col-sm-6 col-xs-6">
        			            <input type="checkbox" name="pgami[]" id="pgami-<?php echo $list->id;?>" <?php if(in_array($list->id, $data)){echo "checked";}?> value="<?php echo $list->id;?>">
                                <label for="pgami-<?php echo $list->id;?>"><?php echo $list->name;?></label>
                            </div>
                        <?php }?>
                         
        			    
        			    
        			    	    <div class="col-md-12 col-sm-12 col-xs-12 pt-20 pb-10">
        			        <label style="color:#444;">Upload Files (Only 10 Images Required)</label><b style="color:red;">*</b>
        			    </div>
        			    
        			    <div class="col-md-12 col-sm-12 col-xs-12" style="padding:0;margin:0;">
        			        
        			    <div class="col-md-6 col-sm-6 col-xs-12">
        			        <div class="file-drop-area">
                                <span class="fake-btn">Choose images</span>
                                <span class="file-msg">or drag and drop images here</span>
                                <input class="file-input" type="file" name="UploadImages[]" accept="image/*" >
                                <input type="hidden" class="gui-file" name="prev_image" id="prev_image" value="">
                            </div>
                            <div class="col-md-3 col-sm-3 col-xs- pt-10 xs-pb-10">
                                <a class="outln-hvr" href="javascript:void(0);" onclick="load_more_project_images()">+ Add More</a>
                            </div>
        			    </div>

        			    <div class="col-md-12 col-sm-6 col-xs-12" style="padding:0;margin:0;" id="loadProjectImagesDiv">
                            </div>
                            <div class="col-md-12 col-sm-6 col-xs-12" style="padding:0;margin:0;color:red;text-align:center;" id="loadProjectImagesErrorDiv">
                            </div>
        			    </div>
    
        			    
        			    <div class="col-md-12 col-sm-12 col-xs-12 pt-20">
        			        <label>Description / Notes / Details</label><b style="color:red;">*</b>
    			            <textarea id="details" name="details" placeholder="100 words only"><?php echo @$pg_details[0]->details;?></textarea>
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