
<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3><i class="fa fa-ioxhost"></i> Projects</h3>
      </div>
     
    </div>

    <div class="clearfix"></div>

    <div class="row">
	  <div class="col-md-12 col-sm-12 col-xs-12">
	  
        <div class="x_panel">
          <div class="x_title">
             <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <h2>Project List</h2>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <button class="effect red effect-5 pull-right" data-toggle="modal" data-target="#addNewProjectModal" style="width:150px;">Add Project</button>
                </div>
            </div>
            <div class="clearfix"></div>
          </div> 
          <div class="x_content">
              <table id="datatable-buttons" class="table table-bordered table-striped">
        <thead> 
        <tr>
		  <th>Sno.</th>
		  <th>Prop ID</th>
		  <th>Status</th>
		  <th>Property Status</th>
		  <th>Starting</th>
		  <th>BHK</th>
		  <th>Property Type</th>
		  <!--<th>Size Upto</th>-->
		  <th>Price</th>
		  <th>State</th>
		  <th>Location</th>
		  <th>City</th>
		  <th>Landmark</th>
		  <th>Pincode</th>
		  <th>Marketing By</th>
		  <th>Section</th>
		  <!--<th>Age</th>-->
		  <!--<th>Possession Date</th>-->
		  <!--<th>Property Type</th>-->
	<!--	  <th>Open</th>
		  <th>Covered</th>
		  <th>Basement</th>
		  <th>Lift</th>
		  <th>Two Wheeler</th>
		  <th>Comment</th>
		  <th>PDF</th>-->
		  <!--<th>Image</th>-->
		  <!--<th>Video</th>-->
		  <th>Action</th>
        </tr>
        </thead>
        <tbody>	
		    <?php if(!empty($project_list)){ ?>
		    <?php foreach($project_list as $i=>$row){ ?>
			<tr>
			  <td><?php echo $i+1;?></td>
			  <td><?php echo $row->lead_id; ?></td>
			  <td>
			      <!--<?php if($row->status == 0){echo '<i title="Pending for approval" style="color:#f96108;" class="fa fa-clock-o"></i>'; }elseif($row->status == 1){echo '<i title="Active" style="color:green;" class="fa fa-check"></i>'; }elseif($row->status == 2){ echo '<i title="Rejected" style="color:red;" class="fa fa-ban"></i>'; }else{ echo '<i title="Expired" style="color:green;" class="fa fa-hourglass-end"></i>'; } ?>
			      <?php if($row->ad_flag == 1){echo '| <span title="Advertisement" style="color:green;"> Ad</span>'; } ?>-->
			      <?php if($row->status == 0){echo '<span title="Pending" class="label label-warning">Pending</span>'; }elseif($row->status == 1){echo '<span title="Active" class="label label-success">Active</span>'; }elseif($row->status == 2){ echo '<span title="Rejected" class="label label-danger">Rejected</span>'; }else{ echo '<span title="Expired" class="label label-info">Expired</span>'; } ?>
                  <?php if($row->ad_flag==1){ echo '<span title="Advertisement" class="label label-success"> Ad</span>'; } ?>
			  </td>
			  <td><?php echo $row->PropertyStatus; ?></td>
			  <td><?php echo $row->sizestartingfrom.' '.$row->sizestartingfromUnit; ?></td>
			  <td><?php echo $row->bhk1.' - '.$row->bhk2; ?></td>
			  <td><?php if($row->PropertyStatus == 'Residential'){ echo $row->propertyTypeRes; }else{ echo $row->propertyTypeCom; } ?></td>
			  <!--<td><?php echo $row->sizeupto.' '.$row->sizeuptoUnit; ?></td>-->
			  <td><?php echo $row->price.' '.$row->priceUnit; ?></td>
			  <td><?php echo $row->state; ?></td>
			  <td><?php echo $row->location; ?></td>
			  <td><?php echo $row->city; ?></td>
			  <td><?php echo $row->landmark; ?></td>
			  <td><?php echo $row->pincode; ?></td>
			  <td><?php echo $row->Marketingby; ?></td>
			  <td><?php echo $row->section; ?></td>
			  <!--<td><?php echo $row->AgeofPropeety; ?></td>-->
			  <!--<td><?php echo $row->PossessionDate; ?></td>-->
			  <!--<td><?php echo $row->PropertyType; ?></td>-->
			  <!--<td><?php if($row->Open == 1 ){echo "Yes";} else{echo "No";} ?></td>
			  <td><?php if($row->Covered == 1){echo "Yes";} else{echo "No";} ?></td>
			  <td><?php if($row->Basement == 1){echo "Yes";} else{echo "No";} ?></td>
			  <td><?php if($row->LiftParking == 1){ echo "Yes";} else{echo "No";} ?></td>
			  <td><?php if($row->TwoWheeler == 1){echo "Yes";} else{echo "No";} ?></td>
			  <td><?php echo $row->comment; ?></td>
			  <td><a href="<?php echo base_url(); ?><?php echo $row->pdf_file; ?>">PDF</a></td>
			  <td><img width="100px" height="100px" src="<?php echo base_url(); ?><?php echo $row->image_file; ?>"></td>
			  <td><a href="<?php echo base_url(); ?><?php echo $row->video_file; ?>"><span title="Video" class="label label-info">Video</span></a></td>-->
			  <td>
			        <a onclick="edit_project(<?php echo $row->post_id; ?>, 'edit');" > <span title="Edit" class="label label-default">Edit</span></a>
                    <!--<a  class="btn btn-danger" onclick="return confirm('Do you want to delete this record?');" href="<?php echo base_url();?>backend/delete_location/<?php echo $row->id;?>"> <i class="fa fa-trash"></i></a>-->
                    <?php if($row->ad_flag==0){ ?>
                    <a onclick="add_to_ad(<?php echo $row->post_id;?>, 'project');" href="javascript:void(0);" title="Add To Advertisement"> <span title="Advertisement" class="label label-primary">Ad</span></a>
                    <?php }else{ ?>
                    <a onclick="return confirm('Do you want to remove this post from advertisement?');" href="<?php echo base_url(); ?>backend/remove_from_ad/project/<?php echo $row->post_id;?>" href="javascript:void(0);" title="Remove From Advertisement"> <span title="Remove From Advertisement" class="label label-default">Remove Ad</span></a>
                    <?php } ?>
                    <!--<a   href="creat.php?id=<?php echo $rows11['id']?>"><i class="fa fa-tasks" aria-hidden="true"></i></a>-->
                    <?php if($row->status == 0 || $row->status == 2){?>
                    <a onclick="return confirm('Do You want to change status of this record?');" href="<?php echo base_url();?>property/approve_project/<?php echo $row->post_id;?>"><span title="Approve" class="label label-success">Approve</span></a>
                    <?php }if($row->status == 0 || $row->status == 1){?>
                    <a onclick="return confirm('Do You want to change status of this record?');" href="<?php echo base_url();?>property/reject_project/<?php echo $row->post_id;?>"><span title="Reject" class="label label-warning">Reject</span></a>
                    <?php } ?>
                    <?php if($this->session->userdata('user_type') != 'admin'){ ?>
                    <a onclick="return confirm('Do You want to delete this record?');" href="<?php echo base_url();?>property/delete_project/<?php echo $row->post_id;?>"><span title="Delete" class="label label-danger">Delete</span></a>
                    <?php } ?>
                </td>
            </tr>
			<?php } ?>		
			<?php } ?>		
        
        </tbody>
       
      </table>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- /page content -->
        




<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog  modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header" style="background:linear-gradient(to right,#03709e,#18c3fd 100%);">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title" style="color:white;font-weight:bold;font-size:20px;">Add </h4>
            </div>
            <div class="modal-body">
    		    <form method="POST" action="<?php echo base_url(); ?>backend/save_location" enctype="multipart/form-data">
                    <div class="row">
        			    <div class="col-md-12 col-sm-12 col-xs-12">
        			        <label>Name</label><b style="color:red;">*</b>
        				    <input type="hidden" name="id" id="id" value="0" />
        				    <input type="text" name="name" id="name"  />
        			    </div>
    			    </div>
    			  </form>
            </div>
            <div class="modal-footer">
                <input type="submit" name="save" value="Save"/>
            </div>
        </div>
    </div>
</div>



<!-- Modal -->
<div class="modal fade" id="addNewProjectModal" role="dialog">
    <div class="modal-dialog  modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header" style="background:linear-gradient(to right,#03709e,#18c3fd 100%);">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title" style="color:white;font-weight:bold;font-size:20px;">Add Project</h4>
            </div>
            <form method="POST" action="<?php echo base_url(); ?>property/add_project" enctype="multipart/form-data">
                <div class="modal-body">
    		        <input type="hidden" name="post_id" id="post_id" value="0"   />
                    <div class="row">
                        
        			    <div class="col-md-6 col-sm-6 col-xs-6">
        			        <label>Property Type</label><b style="color:red;">*</b>
        				    <select name="PropertyStatus" id="PropertyStatus"  onchange="change_res_com(this.value);">
        				        <option hidden value="">--Select--</option>
                                <option disabled >Select one </option>
        				        <option value="Residential" selected>Residential</option>
        				        <option value="Commercial">Commercial</option>
        				    </select>
        			    </div>
        			    
        			    <div class="col-md-6 col-sm-6 col-xs-6" id="propertyTypeResDiv">
        			        <label>Residential Type</label><b style="color:red;">*</b>
        				    <select name="propertyTypeRes" id="propertyTypeRes" >
        				        <option hidden value="">--Select--</option>
                                <option disabled >Select one </option>
        				        <option value="Flat">Flat</option>
                                <option value="House">House</option>
                                <option value="PentHouse">Pent House</option>
                                <option value="Duplex">Duplex</option>
                                <option value="Land">Land</option>
                            </select>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-6" id="propertyTypeComDiv" style="display:none;">
                            <label>Commercial Type</label><b style="color:red;">*</b>
                            <select name="propertyTypeCom" id="propertyTypeCom" >
                                <option hidden value="">--Select--</option>
                                <option disabled >Select one </option>
                                <option value="Office">Office</option>
                                <option value="Shop">Shop</option>
                                <option value="WareHouse">Ware House</option>
                                <option value="Land">Land</option>
                                <option value="Factory">Factory</option>
        				    </select>
        			    </div>
        			    
        			    <div class="col-md-6 col-sm-6 col-xs-6">
        			        <label>State</label><b style="color:red;">*</b>
        				    <input type="text" name="state" id="state"  value="" onkeyup="load_states(this.value)" onblur="load_cities()">
        			    </div>
        			    
        			    <div class="col-md-6 col-sm-6 col-xs-6">
        			        <label>City</label><b style="color:red;">*</b>
        				    <input type="text" name="city" id="city"  value="">
        			    </div>
        			    <div class="col-md-6 col-sm-6 col-xs-12">
        			        <label>Locations</label><b style="color:red;">*</b>
        				    <input type="text" name="location" id="location"  value="" onkeyup="load_locations(this.value)">
        			    </div>
        			    
        			    <div class="col-md-6 col-sm-6 col-xs-12">
        			        <label>Landmark</label><b style="color:red;">*</b>
        				    <input type="text" name="landmark" id="landmark" value="">
        			    </div>
        			    
        			    <div class="col-md-6 col-sm-6 col-xs-12">
        			        <label>Pincode</label><b style="color:red;">*</b>
        				    <input type="number" name="pincode"  id="pincode" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==6) return false;" value="">
        			    </div>
        			    
        			    <div class="col-md-6 col-sm-6 col-xs-12">
        			        <label>Marketing by</label><b style="color:red;">*</b>
        				    <input type="text" name="Marketingby" id="Marketingby" value="">
        			    </div>
        			    
        			    <div class="col-md-12 col-sm-12 col-xs-12">
        			        <label>Project Name</label><b style="color:red;">*</b>
        				    <input type="text" name="project_name" id="project_name" value="">
        			    </div>
        			    
        			    <div class="col-md-3 col-sm-3 col-xs-6">
        			        <label>Size Starting From</label><b style="color:red;">*</b>
        				    <select name="sizestartingfrom" id="sizestartingfrom" >
        				        <option hidden value="">--Select--</option>
                                <option disabled >Select one </option>
        				        <option value="400">400</option>
        				        <option value="450">450</option>
        				    </select>
        			    </div>
        			    
        			    <div class="col-md-3 col-sm-3 col-xs-6">
        			        <label>Unit</label><b style="color:red;">*</b>
        				    <select name="sizestartingfromUnit" id="sizestartingfromUnit" >
        				        <option hidden value="">Unit</option>
                                <option disabled >Select one </option>
        				        <option value="Sqft">Sqft</option>
        				        <option value="Sq-m">Sq-m</option>
        				        <option value="Acre">Acre</option>
        				        <option value="Bigha">Bigha</option>
        				        <option value="Hectare">Hectare</option>
        				        <option value="Marla">Marla</option>
        				        <option value="Chatak">Chatak</option>
        				        <option value="Kottah">Kottah</option>
        				    </select>
        			    </div>
        			    
        			    <div class="col-md-3 col-sm-3 col-xs-6">
        			        <label>Size Upto</label><b style="color:red;">*</b>
        				    <select name="sizeupto" id="sizeupto" >
        				        <option hidden value="">--Select--</option>
                                <option disabled >Select one </option>
        				        <option value="400">400</option>
        				        <option value="450">450</option>
        				    </select>
        			    </div>
        			    
        			    <div class="col-md-3 col-sm-3 col-xs-6">
        			        <label>Unit</label><b style="color:red;">*</b>
        				    <select name="sizeuptoUnit" id="sizeuptoUnit" >
        				        <option hidden value="">Unit</option>
                                <option disabled >Select one </option>
        				        <option value="Sqft">Sqft</option>
        				        <option value="Sq-m">Sq-m</option>
        				        <option value="Acre">Acre</option>
        				        <option value="Bigha">Bigha</option>
        				        <option value="Hectare">Hectare</option>
        				        <option value="Marla">Marla</option>
        				        <option value="Chatak">Chatak</option>
        				        <option value="Kottah">Kottah</option>
        				    </select>
        			    </div>
        			    
        			    <div class="col-md-3 col-sm-3 col-xs-6">
        			        <label>From BHK</label><b style="color:red;">*</b>
        				    <input type="number" name="bhk1" id="bhk1">
        			    </div>
        			    
        			    <div class="col-md-3 col-sm-3 col-xs-6">
        			        <label>TO BHK</label><b style="color:red;">*</b>
        				    <input type="number" name="bhk2" id="bhk2">
        			    </div>
        			    
        			    <div class="col-md-3 col-sm-3 col-xs-6">
        			        <label>Price</label><b style="color:red;">*</b>
        				    <input type="number" name="price" id="price">
        			    </div>
        			    
        			    <div class="col-md-3 col-sm-3 col-xs-6">
        			        <label>Onward/Sqft</label><b style="color:red;">*</b>
        				    <select id="priceUnit" name="priceUnit" >
                                <option hidden value="">--Select--</option>
                                <option disabled >Select one </option>
                                <option value="Onward">Onward</option>
                                <option value="Sqft">Sqft</option>
                            </select>
        			    </div>
        			    
        			    <!--------- Add New ---------->
        			    <div class="col-md-6 col-sm-6 col-xs-6">
        			        <label>Price Range start From</label><b style="color:red;">*</b>
        				    <input type="number" name="startPrice" id="startPrice">
        			    </div>
        			    
        			    <!--------- Add New ---------->
        			    <div class="col-md-6 col-sm-6 col-xs-6">
        			        <label>Price Upto</label><b style="color:red;">*</b>
        				    <input type="number" name="uptoPrice" id="uptoPrice">
        			    </div>
        			    
        			    <div class="col-md-12 col-sm-12 col-xs-12 pb-10">
        			        <label style="color:#444;">Possession Info</label><b style="color:red;">*</b>
        			    </div>
        			    
        			    <div class="col-md-12 col-sm-12 col-xs-12" style="padding:0;margin:0;">
        			    <div class="col-md-3 col-sm-3 col-xs-6 radiobtn">
        			        <input type="radio" id="ReadyToMove" value="ReadyToMove" name="section" checked/>
        			        <label for="ReadyToMove" >Ready To Move</label>
        			    </div>
        			    
        			    <div class="col-md-3 col-sm-3 col-xs-6 radiobtn">
        			        <input type="radio" id="PossessionFrom" value="PossessionFrom" name="section" />
        			        <label for="PossessionFrom" >Possession From</label>
        			    </div>
        			    
        			    <div class="col-md-6 col-sm-6 col-xs-12 xs-pt-10" id="PossessionDateDiv">
                            <input type="date" name="PossessionDate" id="PossessionDate"  placeholder="DD/MM/YYYY" />
        			    </div>
        			    </div>
        			    
        			    <div class="col-md-6 col-sm-6 col-xs-12 pt-10">
        			        <label for="AgeofPropeety">Age of Property</label><b style="color:red;">*</b>
                            <select id="AgeofPropeety" name="AgeofPropeety">
                                <option hidden value="">--Select--</option>
                                <option disabled >Select one </option>
                                <?php for($i = 1; $i<=100; $i++){ ?>
                                <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                <?php } ?>
                            </select>
        			    </div>
        			    
        			    <div class="col-md-6 col-sm-6 col-xs-12 pt-10">
        			        <label for="PropertyType">Property Type</label><b style="color:red;">*</b>
                            <select id="PropertyType" name="PropertyType" value="">
                                <option hidden value="">--Select--</option>
                                <option disabled >Select one </option>
                                <option value="Freehold">Freehold</option>
                                <option value="Lease">Lease</option>
                                <option value="Power of attorney">Power of attorney</option>
                                <option value="Unregistered">Unregistered</option>
                            </select>  
        			    </div>
        			    
        			    <div class="col-md-12 col-sm-12 col-xs-12">
        			        <label style="color:#444;">Parking</label><b style="color:red;">*</b>
        			    </div>
        			    
        			    <div class="col-md-2 col-sm-6 col-xs-4">
        			        <input type="checkbox" id="Open" value="Open" name="Open">                                
                            <label for="Open" >Open</label>
                        </div>
                        
                        <div class="col-md-2 col-sm-6 col-xs-4">
                            <input type="checkbox" id="Covered" value="Covered" name="Covered">
                            <label for="Covered" >Covered</label>
                        </div>
                        
                        <div class="col-md-2 col-sm-6 col-xs-4">
                            <input type="checkbox" id="Basement" value="Basement" name="Basement">
                            <label for="Basement" >Basement</label> 
                        </div>
                        
                        <div class="col-md-2 col-sm-6 col-xs-4">
                            <input type="checkbox" id="LiftParking" value="LiftParking" name="LiftParking">
                            <label for="LiftParking" >Lift </label>
                        </div>
                        
                        <div class="col-md-2 col-sm-6 col-xs-6">
                            <input type="checkbox" id="TwoWheeler" value="TwoWheeler" name="TwoWheeler">
                            <label for="TwoWheeler" >Two Wheeler</label> 
                        </div>
                                
        			    <div class="col-md-12 col-sm-12 col-xs-12 pt-20 pb-10">
        			        <label style="color:#444;">Upload Files (Only 10 Images Required)</label><b style="color:red;">*</b>
        			    </div>
        			    
        			    <div class="col-md-12 col-sm-12 col-xs-12" style="padding:0;margin:0;">
        			        
        			    <div class="col-md-6 col-sm-6 col-xs-12">
        			        <div class="file-drop-area">
                                <span class="fake-btn">Choose images</span>
                                <span class="file-msg">or drag and drop images here</span>
                                <input class="file-input" type="file" name="UploadImages[]" accept="image/*" id="fileImage">
                                <input type="hidden" class="gui-file" name="prev_image" id="prev_image" value="">
                            </div>
                            <div class="col-md-3 col-sm-3 col-xs- pt-10 xs-pb-10">
                                <a class="outln-hvr" href="javascript:void(0);" onclick="load_more_project_images()">+ Add More</a>
                            </div>
                            <!-------------
        			        <label>Upload Photo</label>
        			        <input type="file" class="gui-file" name="UploadImages[]" id="UploadImages" accept=".png, .jpeg, .jpg" onChange="document.getElementById('uploader_1').value = this.value;" >
                            <input type="hidden" class="gui-file" name="prev_image" id="prev_image" value="">
                            -------------->
        			    </div>
        			    <div class="col-md-6 col-sm-6 col-xs-12">
    			            <div class="file-drop-area">
                                <span class="fake-btn">Choose files</span>
                                <span class="file-msg">or drag and drop PDF here</span>
                                <input class="file-input" type="file" name="UploadPdf" accept=".pdf" id="filePdf">
                                <input type="hidden" class="gui-file" name="prev_pdf" id="prev_pdf" value="">
                            </div>
                            <!--<div class="col-md-3 col-sm-3 col-xs-4 pt-10 xs-pb-10">
                                <a class="outln-hvr" href="#">+ Add More</a>
                            </div>-->
                            <!------
        			        <label>Upload PDF Files</label>
        			        <input type="file" class="gui-file" name="UploadPdf" id="UploadPdf" accept=".pdf" onChange="document.getElementById('uploader1').value = this.value;">
                            <input type="hidden" class="gui-file" name="prev_pdf" id="prev_pdf" value="">
                            ------>
        			    </div>
        			    
        			    <div class="col-md-12 col-sm-6 col-xs-12" style="padding:0;margin:0;" id="loadProjectImagesDiv">
                            </div>
                            <div class="col-md-12 col-sm-6 col-xs-12" style="padding:0;margin:0;color:red;text-align:center;" id="loadProjectImagesErrorDiv">
                            </div>
        			    </div>
    
        			    <div class="col-md-12 col-sm-12 col-xs-12 pt-20">
                            <label style="color:#444;">Amenities</label><b style="color:red;">*</b>
                        </div>
        			    
        			    <div class="col-md-3 col-sm-6 col-xs-6">
        			        <div class="option-group field">
        			            <input type="checkbox" name="PowerBackup" id="PowerBackup" value="PowerBackup">
                                <label for="PowerBackup" >Power Backup</label>
                                
                                <input type="checkbox" name="ServiveLift" id="ServiveLift" value="ServiveLift">
                                <label for="ServiveLift">Servive Lift</label>   
                                
                                <input type="checkbox" name="BanquetHall" id="BanquetHall" value="BanquetHall">
                                <label for="BanquetHall">Banquet Hall</label>
                                
                                <input type="checkbox" name="GYM" id="GYM" value="GYM">
                                <label for="GYM">GYM</label>
                                
                                <input type="checkbox" name="VisitorParking" id="VisitorParking" value="VisitorParking"> 
                                <label for="VisitorParking">Visitor Parking </label>
                                
                            </div>
        			    </div>
        			    <div class="col-md-3 col-sm-6 col-xs-6">
        			        <input type="checkbox" name="Intercom" id="Intercom" value="Intercom"> 
    			            <label for="Intercom" >
                                Intercom
                            </label>
                            
                            <input type="checkbox" name="CCTV" id="CCTV" value="CCTV"> 
                            <label for="CCTV" >
                                CCTV
                            </label>  
                            
                            <input type="checkbox" name="SwimmingPool" id="SwimmingPool" value="SwimmingPool"> 
                            <label for="SwimmingPool">
                                Swimming Pool                
                            </label>
                            
                            <input type="checkbox" name="CloubHouse" id="CloubHouse" value="CloubHouse" > 
                            <label for="CloubHouse">
                                Club House             
                            </label>
                            
                            <input type="checkbox" name="SarvantRoom" id="SarvantRoom" value="SarvantRoom" > 
                            <label for="SarvantRoom">
                                Servant Room                
                            </label>
                            
        			    </div>  
        			    <div class="col-md-3 col-sm-6 col-xs-6">
                            <input type="checkbox" name="Lift" id="Lift" value="Lift"> 
                            <label for="Lift">Lift </label>
                                
        			        <input type="checkbox" name="WIFI" id="WIFI" value="WIFI"> 
                            <label for="WIFI">WIFI </label>
                            
                            <input type="checkbox" name="CommunityHall" id="CommunityHall" value="CommunityHall"> 
                            <label for="CommunityHall">Community Hall </label>
                            
                            <input type="checkbox" name="IndoorGame" id="IndoorGame" value="IndoorGame"> 
                            <label for="IndoorGame">Indoor Game </label>
        			    </div>
        			    
        			    <div class="col-md-3 col-sm-6 col-xs-6">
                            <input type="checkbox" name="OutDoorGame" id="OutDoorGame" value="OutDoorGame"> 
                            <label for="VisitorParking">Out Door Game </label>
                                
        			        <input type="checkbox" name="GasPipeLine" id="GasPipeLine" value="GasPipeLine"> 
                            <label for="GasPipeLine">Gas Pipe Line </label>
                            
                            <input type="checkbox" name="Park" id="Park" value="Park"> 
                            <label for="Park">Park </label>
                            
                            <input type="checkbox" name="Security" id="Security" value="Security"> 
                            <label for="Security">24Hr. Security </label>
        			    </div>
        			    
        			    <div class="col-md-12 col-sm-12 col-xs-12 pt-20">
        			        <label>Description / Notes / Details</label><b style="color:red;">*</b>
    			            <textarea id="comment" name="comment" placeholder="100 words only"></textarea>
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
<script>
    function edit_project(post_id, mode)
    {
        $.ajax
        ({
            type: "POST",
            url: "<?php echo base_url(); ?>property/edit_project",
            data: {post_id:post_id},
            dataType: 'json',
            success: function(data)
            {
                $("#post_id").val(data['post_id']);
                $("#PropertyStatus").val(data['PropertyStatus']);
                $("#sizestartingfrom").val(data['sizestartingfrom']);
                $("#sizestartingfromUnit").val(data['sizestartingfromUnit']);
                $("#bhk1").val(data['bhk1']);
                $("#bhk2").val(data['bhk2']);
                $("#startPrice").val(data['startPrice']);
                $("#uptoPrice").val(data['uptoPrice']);
                $("#propertyTypeRes").val(data['propertyTypeRes']);
                $("#sizeupto").val(data['sizeupto']);
                $("#price").val(data['price']);
                $("#propertyTypeCom").val(data['propertyTypeCom']);
                $("#sizeuptoUnit").val(data['sizeuptoUnit']);
                $("#priceUnit").val(data['priceUnit']);
                $("#state").val(data['state']);
                $("#location").val(data['location']);
                $("#city").val(data['city']);
                $("#landmark").val(data['landmark']);
                $("#pincode").val(data['pincode']);
                $("#Marketingby").val(data['Marketingby']);
                $("#section").val(data['Marketingby']);
                $("#AgeofPropeety").val(data['AgeofPropeety']);
                $("#PossessionDate").val(data['PossessionDate']);
                $("#PropertyType").val(data['PropertyType']);
                get_cities_by_state(data['state']);
                $("#Open").prop('checked',data['Open'] == 1 ? true:false);
                $("#Covered").prop('checked',data['Covered'] == 1 ? true:false);
                $("#Basement").prop('checked',data['Basement'] == 1 ? true:false);
                $("#LiftParking").prop('checked',data['LiftParking'] == 1 ? true:false);
                $("#TwoWheeler").prop('checked',data['TwoWheeler'] == 1 ? true:false);
                $("#PowerBackup").prop('checked',data['PowerBackup'] == 1 ? true:false);
                $("#ServiveLift").prop('checked',data['ServiveLift'] == 1 ? true:false);
                $("#BanquetHall").prop('checked',data['BanquetHall'] == 1 ? true:false);
                $("#GYM").prop('checked',data['GYM'] == 1 ? true:false);
                $("#VisitorParking").prop('checked',data['VisitorParking'] == 1 ? true:false);
                $("#Intercom").prop('checked',data['Intercom'] == 1 ? true:false);
                $("#CCTV").prop('checked',data['CCTV'] == 1 ? true:false);
                $("#SwimmingPool").prop('checked',data['SwimmingPool'] == 1 ? true:false);
                $("#CloubHouse").prop('checked',data['CloubHouse'] == 1 ? true:false);
                $("#SarvantRoom").prop('checked',data['SarvantRoom'] == 1 ? true:false);
                $("#Lift").prop('checked',data['Lift'] == 1 ? true:false);
                $("#WIFI").prop('checked',data['WIFI'] == 1 ? true:false);
                $("#CommunityHall").prop('checked',data['CommunityHall'] == 1 ? true:false);
                $("#IndoorGame").prop('checked',data['IndoorGame'] == 1 ? true:false);
                $("#OutDoorGame").prop('checked',data['OutDoorGame'] == 1 ? true:false);
                $("#GasPipeLine").prop('checked',data['GasPipeLine'] == 1 ? true:false);
                $("#Park").prop('checked',data['Park'] == 1 ? true:false);
                $("#Security").prop('checked',data['Security'] == 1 ? true:false);
                $("#comment").val(data['comment']);
                $("#prev_image").val(data['image_file']);
                $("#prev_pdf").val(data['pdf_file']);
                if(data['section'] == 'ReadyToMove'){
                    $('#ReadyToMove').prop('checked', 'checked');
                    $('#PossessionFrom').prop('checked', '');
                    $('#PossessionDateDiv').css('display', 'none');
                }else{
                    $('#PossessionFrom').prop('checked', 'checked');
                    $('#ReadyToMove').prop('checked', '');
                     $('#PossessionDateDiv').css('display', 'block');
                }
                if(mode == 'view'){
                    $("#submit-btn").css('display','none');
                }else{
                    $("#submit-btn").css('display','block');
                }
                $("#addNewProjectModal").modal();
            }

        });
    }
</script>

<script>

function get_cities_by_state(state_name)
    {
        $.ajax
        ({
            type: "POST",
            url: "<?php echo base_url(); ?>property/get_cities_by_state",
            data: {state_name:state_name},
            dataType: 'html',
            success: function(data)
            {
                $("#city").html(data);
            }

        });	
    }

  function change_res_com(section){
        if(section == 'Residential'){
            $('#propertyTypeResDiv').css('display','block');
            $('#propertyTypeComDiv').css('display','none');
        }else{
            $('#propertyTypeComDiv').css('display','block');
            $('#propertyTypeResDiv').css('display','none');
        }
    }
    
    $('input[name=section]').change(function(){
        var value = this.value;
        if(value == 'PossessionFrom'){
            $('#PossessionDateDiv').css('display','block');
            $('#PossessionDateNextDiv').css('display','none');
        }else{
            $('#PossessionDateDiv').css('display','none');
            $('#PossessionDateNextDiv').css('display','block');
        }
    });

</script>
 