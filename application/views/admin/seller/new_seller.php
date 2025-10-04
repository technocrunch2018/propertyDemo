<div class="right_col" role="main">
    <div class="page-title">
        <div class="title_left">
            <h3><i class="fa fa-ioxhost"></i>New Seller</h3>
        </div>
    </div>

    <div class="clearfix"></div>

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">

            <div class="x_panel">
                <div class="x_title">
                    <h2>New Seller List</h2>
                    
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <table id="datatable" class="table table-bordered table-striped table">
                        <thead> 

                            <tr>
                                <td>Sr No</td>
                                <td>Date</td>
                                <td>Prop ID</td>
                                <td>Posted By</td>
                                <td>State</td>
                                <td>City</td>
                                <td>Location<br/>Pincode</td>
                                <td>Complex/Building Name</td>
                                <td>Status</td>
                                <th>Action</th>
                            </tr>

                        </thead>
                        <tbody>
                            
                            <?php if(!empty($flat_list)){ ?>
                            <?php foreach($flat_list as $i=>$row){ ?>
                            <tr>
                                <td><?php echo $i+1;?></td>
                                <td><?php echo $row->created;?></td>
                                <td><a href="javascript:void(0);" onclick="edit_seller(<?php echo $row->post_id; ?>, 'view');"><?php echo $row->lead_id;?></a></td>
                                <td><?php echo $row->user_type;?></td>
                                <td><?php echo $row->state;?></td>
                                <td><?php echo $row->city;?></td>
                                <td><?php echo $row->location;?><br/><?php echo $row->pincode;?></td>
                                <td><?php echo $row->complex_society_building;?></td>
                                <td>
                                    <?php if($row->status == 0){echo '<span title="Pending" class="label label-warning">Pending</span>'; }elseif($row->status == 1){echo '<span title="Active" class="label label-success">Active</span>'; }elseif($row->status == 2){ echo '<span title="Rejected" class="label label-danger">Rejected</span>'; }else{ echo '<span title="Expired" class="label label-info">Expired</span>'; } ?>
                                </td>
                                <td>
                                    <a href="javascript:void(0);" onclick="edit_seller(<?php echo $row->post_id; ?>, 'edit');"><span title="Edit" class="label label-info">Edit</span></a>
                                    
                                    <a onclick="return confirm('Do You want to delete this record?');" href="<?php echo base_url();?>property/delete_property/<?php echo $row->post_id;?>"><span title="Delete" class="label label-danger">Delete</span></a>
                                    <?php if($row->status == 0 || $row->status == 2){?>
                                    <?php if(in_array($row->state,@$inactive_state_list) || in_array($row->city,@$inactive_city_list) || in_array($row->location,@$inactive_location_list) || in_array($row->pincode,@$inactive_pincode_list)){ ?>
                                    <a href="javascript:void(0);" data-toggle="modal" data-target="#new_property_modal_<?php echo $i; ?>"> <span title="New" class="label label-pink">New</span></a>
                                    <?php }else{ ?>
                                    <a onclick="return confirm('Do You want to change status of this record?');" href="<?php echo base_url();?>property/approve_property/seller_residential_sale_flat/<?php echo $row->post_id;?>"> <span title="Approve" class="label label-success">Approve</span></a>
                                    <?php } ?>
                                    <?php }if($row->status == 0 || $row->status == 1){ ?>
                                    <a onclick="return confirm('Do You want to change status of this record?');" href="<?php echo base_url();?>property/reject_property/seller_residential_sale_flat/<?php echo $row->post_id;?>"> <span title="Reject" class="label label-warning">Reject</span></a>
                                    <?php } ?>
                                    <!--<?php if($row->interested_flag == 1){ ?>
                                    <?php if($rent_sell == 'Rent'){ ?>
                                    <a href="javascript:void(0);" onclick="interested_popup(<?php echo $row->post_id; ?>)"><span title="Interested" class="label label-primary">Interested</span></a>
                                    <?php }else{ ?>
                                    <a href="javascript:void(0);" onclick="interested_popup(<?php echo $row->post_id; ?>)"><span title="Interested" class="label label-primary">Interested</span></a>
                                    <?php } ?>
                                    <a onclick="seller_not_interested(<?php echo $row->post_id; ?>);"> <span title="Not Interested" class="label label-default">Not Interested</span></a>
                                    <?php } ?>
                                    <?php if($row->in_process_flag==1 && $this->session->userdata('admin_id') == 1){ ?>
                                    <a onclick="cancel_deal(<?php echo $row->post_id;?>);" href="javascript:void(0);" title="Cancel all deals"><span title="Cancel all deals" class="label label-primary">Cancel Deals</span></a>
                                    <?php } ?>-->
                                    
                                    <div class="container">
                                       <div class="modal fade" id="new_property_modal_<?php echo $i;?>" role="dialog">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        <h4 class="modal-title">New State/Location/City/Pincode</h4>
                                                    </div>
                                                    
                                                    
                                                        
                                                        <div class="modal-body">
                                                            <form name="activate_new_state_city_location_pincode" id="activate_new_state_city_location_pincode" method="post" action="<?php echo base_url('property/activate_new_state_city_location_pincode'); ?>">
                                                            <input type="hidden" value="<?php echo current_url(); ?>" name="redirect_url" />
                                                            <div class="row">
                                                                <?php if(in_array($row->state,@$inactive_state_list)){ ?>
                                                                <div class="col-md-6">
                                                                    <input type="hidden" value="<?php echo $row->state; ?>" name="new_state_name" />
                                                                    <?php echo $row->state; ?>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <button type="submit" class="btn btn-default" name="activate_state" value="activate_state">Activate State</button>
                                                                </div>
                                                                <?php } ?>
                                                            </div>
                                                            <div class="row">
                                                            <?php if(in_array($row->city,@$inactive_city_list)){ ?>
                                                                <div class="col-md-6">
                                                                    <input type="hidden" value="<?php echo $row->city; ?>" name="new_city_name" />
                                                                    <?php echo $row->city; ?>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <button type="submit" class="btn btn-default" name="activate_city" value="activate_city">Activate City</button>
                                                                </div>
                                                                <?php } ?>
                                                            </div>
                                                            <div class="row">
                                                                <?php if(in_array($row->location,@$inactive_location_list)){ ?>
                                                                <div class="col-md-6">
                                                                    <input type="hidden" value="<?php echo $row->location; ?>" name="new_location_name" />
                                                                    <?php echo $row->location; ?>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <button type="submit" class="btn btn-default" name="activate_location" value="activate_location">Activate Location</button>
                                                                </div>
                                                                <?php } ?>
                                                            </div>
                                                            <div class="row">
                                                                <?php if(in_array($row->pincode,@$inactive_pincode_list)){ ?>
                                                                <div class="col-md-6">
                                                                    <input type="hidden" value="<?php echo $row->pincode; ?>" name="new_pincode_name" />
                                                                    <?php echo $row->pincode; ?>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <button type="submit" class="btn btn-default" name="activate_pincode" value="activate_pincode">Activate Pincode</button>
                                                                </div>
                                                                <?php } ?>
                                                            </div>
                                                            </form>
                                                        </div>
                                                        
                                                        <div class="modal-footer">
                                                            <button type="button" class="effect effect-2 red" data-dismiss="modal">Close</button>
                                                        </div>
                                                    
                                                    
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    
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





<div class="container">
    <!-- Trigger the modal with a button -->


    <!-- Modal -->
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog  modal-lg">

            <div class="modal-content">
                <div class="modal-header" style="background:linear-gradient(to right,#03709e,#18c3fd 100%);">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title" style="color:white;font-weight:bold;font-size:20px;">Add/View Details</h4>
                </div>
                <div class="modal-body">
                    <form name="residential_flat_form" id="residential_flat_form" method="POST" enctype="multipart/form-data" action="<?php echo base_url(); ?>property/save_seller">
                        <div class="row">
                            <input type="hidden" name="added_by" value="Super Admin" id="added_by"  onblur="checkValue(this)"  />
                            <input type="hidden" name="post_id" value="0" id="post_id"  onblur="checkValue(this)"  />
                            <input type="hidden" name="residential" value="Flat" id="residential"  onblur="checkValue(this)"  />
                            <input type="hidden" name="res_com" value="Residential" id="res_com"  onblur="checkValue(this)"  />
                            <input type="hidden" name="rent_sell" value="<?php echo $rent_sell; ?>" id="rent_sell"  onblur="checkValue(this)"  />
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="col-md-3 col-sm-6 col-xs-12">
                                    <!--<label>Property ID</label><b style="color:red;">*</b>-->
                                    <input type="hidden" name="property_id" id="property_id"   readonly  />
                                </div>
                                <div class="col-md-3 col-sm-6 col-xs-12">
                                    <!--<label>Posted By</label><b style="color:red;">*</b>-->
                                    <input type="hidden" name="posted_by" id="posted_by"   readonly  />
                                </div>
                                <div class="col-md-3 col-sm-6 col-xs-12">
                                    <!--<label>Posted By(Email)</label><b style="color:red;">*</b>-->
                                    <input type="hidden" name="posted_by_email" id="posted_by_email"   readonly  />
                                </div>
                                <div class="col-md-3 col-sm-6 col-xs-12">
                                    <!--<label>Posted By(Phone)</label><b style="color:red;">*</b>-->
                                    <input type="hidden" name="posted_by_mobile" id="posted_by_mobile"   readonly  />
                                </div>
                            </div>
                            
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <label>Name</label><b style="color:red;">*</b>
                                <input type="text" name="name" id="name" onblur="checkValue(this)"  />
                            </div>
                            
                            <div class="col-md-3 col-sm-6 col-xs-12">
                                <label>Mobile</label><b style="color:red;">*</b>
                                <input type=text   size=20 maxlength=10 name="mobile" id="mobile"     />
                            </div>

                            <div class="col-md-3 col-sm-6 col-xs-12">
                                <label>Mobile</label><b style="color:red;">*</b>
                                <input type="text" size=20 maxlength=15 name="mobile1" id="mobile1" onblur="checkValue(this)"  />
                            </div>


                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <label>Phone</label><b style="color:red;">*</b>
                                <input type="text" class="input--style-5" size=20 maxlength=15 name="phone" id="phone" min="15"       onblur="checkValue(this)">

                            </div>


                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <label>E-mail</label><b style="color:red;">*</b>
                                <input type="text" name="email" id="email"  onblur="checkValue(this)"  />
                            </div>


                            <div class="col-md-3 col-sm-6 col-xs-12">
                                <label>State</label><b style="color:red;">*</b>

                                <select id="state" name="state"  onchange="get_cities_by_state(this.value)">
                                    <option value="">---Select---</option>
                                    <?php if(!empty($state_list)){ ?>
                                    <?php foreach($state_list as $state){ ?>
                                    <option value="<?php echo $state->name;?>"><?php echo $state->name;?></option>
                                    <?php } ?>
                                    <?php } ?>
                                </select>

                            </div>

                            <div class="col-md-3 col-sm-6 col-xs-12">
                                <label>City</label><b style="color:red;">*</b>
                                <select id="city" name="city" >
                                    <option value="">---Select---</option>
                                    <!--<?php if(!empty($city_list)){ ?>
                                    <?php foreach($city_list as $state){ ?>
                                    <option value="<?php echo $state->name;?>"><?php echo $state->name;?></option>
                                    <?php } ?>
                                    <?php } ?>-->
                                </select>
                            </div>


                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <label>Location</label><b style="color:red;">*</b>
                                <select id="location" name="location" >

                                    <option value="">---Select---</option>
                                    <?php if(!empty($location_list)){ ?>
                                    <?php foreach($location_list as $location){ ?>
                                    <option value="<?php echo $location->name;?>"><?php echo $location->name;?></option>
                                    <?php } ?>
                                    <?php } ?>

                                </select>
                            </div>
                            
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <label>Complex / Society Building Name</label><b style="color:red;">*</b>
                                <input type="text" name="complex_society_building" id="complex_society_building"  onblur="checkValue(this)"  />
                            </div>

                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <label>Land Mark</label><b style="color:red;">*</b>
                                <input type="text" name="landmark" id="landmark" onblur="checkValue(this)"  />
                            </div>
                            
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <label>Address</label><b style="color:red;">*</b>
                                <input type="text" name="address" id="address" onblur="checkValue(this)"  />
                            </div>

                            <div class="col-md-2 col-sm-6 col-xs-12">
                                <label>Pincode</label><b style="color:red;">*</b>
                                <input type="text" name="pincode" id="pincode"  onblur="checkValue(this)"  />
                            </div>
                            
                            <div class="col-md-2 col-sm-6 col-xs-12">
                                <label>Block No</label><b style="color:red;">*</b>
                                <input type="text" name="blockno" id="blockno" onblur="checkValue(this)"  />
                            </div>
                            
                            <div class="col-md-2 col-sm-6 col-xs-12">
                                <label>Flat No</label><b style="color:red;">*</b>
                                <input type="number" min=0 name="flatno" id="flatno" onblur="checkValue(this)"  />
                            </div>


                           <!-- <div class="col-md-6 col-sm-6 col-xs-12">
                                <label>Property For</label><b style="color:red;">*</b>
                                <select name="rent_sell" id="rent_sell"   >
                                    <option>---Select---</option>
                                    <option value="rent">Rent</option>
                                    <option value="Sell" selected>Sell</option>
                                </select>		  
                            </div>-->

                            <div class="col-md-3 col-sm-6 col-xs-12">
                                <label>Furnished Status</label><b style="color:red;">*</b>
                                <select name="FurnishedStatus" id="FurnishedStatus">
                                    <option>---Select---</option>
                                    <option value="Furnished">Furnished</option>
                                    <option value="Unfurnished">Unfurnished</option>
                                    <option value="Semi Furnished">Semi Furnished</option>
                                </select>		  
                            </div>
                            <?php if($rent_sell == 'Rent'){ ?>
                            <div class="col-md-3 col-sm-6 col-xs-12">
                                <label>Security Deposite</label><b style="color:red;">*</b>
                                <input type="number" name="security_deposite" id="security_deposite"   onblur="checkValue(this)"  />
                            </div>
                            
                            <div class="col-md-3 col-sm-6 col-xs-12">
                                <label>Rent/Month</label><b style="color:red;">*</b>
                                <input type="number" name="rentPerMonth" id="rentPerMonth"  onblur="checkValue(this)"  />
                            </div>
                            <?php } ?>
                            <?php if($rent_sell == 'Sell'){ ?>
                            <div class="col-md-3 col-sm-6 col-xs-12">
                                <label>Net Amount</label><b style="color:red;">*</b>
                                <input type="number" name="net_amount" id="net_amount"  onblur="checkValue(this)"  />
                            </div>
                            
                            <div class="col-md-3 col-sm-6 col-xs-12">
                                <label>Amount</label><b style="color:red;">*</b>
                                <input type="number" name="amount" id="amount"  onblur="checkValue(this)"  />
                            </div>
                            
                            <div class="col-md-3 col-sm-6 col-xs-12">
                                <label>Per Unit</label><b style="color:red;">*</b>
                                <input type="text" name="per_unit" id="per_unit"  onblur="checkValue(this)"  />
                            </div>
                            <?php } ?>


                            <div class="col-md-3 col-sm-6 col-xs-12">
                                <label>Possession</label><b style="color:red;">*</b>
                                <select name="section" id="section"  >
                                    <option value="">---Select---</option>
                                    <option value="Ready To Move">Ready To Move</option>
                                    <option value="Possession From">Possession From</option>
                                </select>		  
                            </div>

                            <div class="col-md-3 col-sm-6 col-xs-12">
                                <label>Possession Date</label><b style="color:red;">*</b>
                                <input type="date" placeholder="DD/MM/YYYY" name="PossessionDate" id="PossessionDate"   />
                            </div>
                            
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <label>Property Type</label><b style="color:red;">*</b>

                                <select id="PropertyType" name="PropertyType" >
                                    <option>---Select---</option>
                                   <option value="Freehold" <?php if(!empty($project)){ if($project->PropertyType == 'Freehold'){ echo 'selected'; } } ?>>Freehold</option>
                                    <option value="Lease" <?php if(!empty($project)){ if($project->PropertyType == 'Lease'){ echo 'selected'; } } ?> >Lease</option>
                                    <option value="Power of attorney" <?php if(!empty($project)){ if($project->PropertyType == 'Power of attorney'){ echo 'selected'; } } ?> >Power of attorney</option>
                                    <option value="Unregistered" <?php if(!empty($project)){ if($project->PropertyType == 'Unregistered'){ echo 'selected'; } } ?>>Unregistered</option>

                                </select>

                            </div>
                            
                            <div class="col-md-12">
                                <div class="col-md-2 col-sm-6 col-xs-12">
                                    <label>Open Parking</label><b style="color:red;">*</b>
                                    <input type="number" min=0   name="OpenParking" placeholder=" " id="OpenParking" />
                                </div>
    
                                <div class="col-md-2 col-sm-6 col-xs-12">
                                    <label>Covered Parking</label><b style="color:red;">*</b>
                                    <input type="number" min=0 placeholder=" "   name="CoveredParking" id="CoveredParking" />
                                </div>
    
                                <div class="col-md-2 col-sm-6 col-xs-12">
                                    <label>Basement</label><b style="color:red;">*</b>
                                    <input type="number" min=0 name="Basement" placeholder="Basement" id="Basement"/>
                                </div>
    
                                <div class="col-md-2 col-sm-6 col-xs-12">
                                    <label>Lift Parking</label><b style="color:red;">*</b>
                                    <input type="number" min=0 placeholder=" "name="LiftParking" id="LiftParking" />
                                </div>
                                
                                <div class="col-md-2 col-sm-6 col-xs-12">
                                    <label>Two Wheeler</label><b style="color:red;">*</b>
                                    <input type="number" min=0 placeholder=" "name="TwoWheeler" id="TwoWheeler" />
                                </div>
                                
                                <div class="col-md-2 col-sm-6 col-xs-12">
                                <label>Age Of Properties</label><b style="color:red;">*</b>
                                <select name="AgeofPropeety" id="AgeofPropeety">
                                    <option value="">---Select---</option>
                                    <option value="1 Year Old">1 Year Old</option>
                                    <option value="2Year Old">2Year Old</option>
                                    <option value="3Year Old">3Year Old</option>
                                    <option value="4Year Old">4Year Old</option>
                                    <option value="5Year Old">5Year Old</option>
                                    <option value="6Year Old">6Year Old</option>
                                    <option value="7Year Old">7Year Old</option>
                                    <option value="8Year Old">8Year Old</option>
                                    <option value="9Year Old">9Year Old</option>
                                    <option value="10Year Old">10Year Old</option>
                                    <option value="11Year Old">11Year Old</option>
                                    <option value="12Year Old">12Year Old</option>
                                    <option value="13Year Old">13Year Old</option>
                                    <option value="14Year Old">14Year Old</option>
                                    <option value="15Year Old">15Year Old</option>
                                    <option value="16Year Old">16Year Old</option>
                                    <option value="17Year Old">17Year Old</option>
                                    <option value="18Year Old">18Year Old</option>
                                    <option value="19Year Old">19Year Old</option>
                                    <option value="20Year Old">20Year Old</option>
                                    <option value="21Year Old">21Year Old</option>
                                    <option value="More Than 21Year Old">More Than 21Year Old</option>
                                </select>
                            </div>

                            </div>
                            
                            

                            
                            <div class="col-md-2 col-sm-6 col-xs-12">
                                <label>Rooms</label><b style="color:red;">*</b>
                                <select id="flat_Room" name="flat_Room" class="form-control" value="">
                                    <option hidden >Room</option>
                                    <option disabled >Select one </option>
                                    <?php for($i = 1; $i<=100; $i++){ ?>
                                    <option value="<?php echo $i; ?>" ><?php echo $i; ?></option>
                                    <?php } ?>
                                </select>		  
                            </div>
                            
                            <div class="col-md-2 col-sm-6 col-xs-12">
                                <label>Balcony</label><b style="color:red;">*</b>
                                <select id="flat_Balcony" name="flat_Balcony" class="form-control"  value="">
                                    <option hidden >Balcony</option>
                                    <option disabled >Select one </option>
                                    <?php for($i = 1; $i<=100; $i++){ ?>
                                    <option value="<?php echo $i; ?>" ><?php echo $i; ?></option>
                                    <?php } ?>
                                </select>		  
                            </div>
                            
                            <div class="col-md-2 col-sm-6 col-xs-12">
                                <label>Super-Builtup Area</label><b style="color:red;">*</b>
                                <input class="form-control" type="number" name="flat_SuperBuildupArea" id="flat_SuperBuildupArea" class="gui-input" placeholder="Super Build up Area" value=""  >	  
                            </div>
                            
                            
                            
                            <div class="col-md-2 col-sm-6 col-xs-12">
                                <label>Super-Builtup Unit</label><b style="color:red;">*</b>
                                <select id="flat_SuperBuildupAreaUnit" name="flat_SuperBuildupAreaUnit" class="form-control">
                                    <option hidden >Unit</option>
                                    <option disabled >Select one </option>
                                    <option value="Sqft" <?php if(!empty($flat_details)){ if($flat_details->flat_SuperBuildupAreaUnit == 'Sqft'){ echo 'selected'; } } ?> >Sqft</option>
                                    <option value="Sq-m" <?php if(!empty($flat_details)){ if($flat_details->flat_SuperBuildupAreaUnit == 'Sq-m'){ echo 'selected'; } } ?> >Sq-m</option>
                                    <option value="Acre" <?php if(!empty($flat_details)){ if($flat_details->flat_SuperBuildupAreaUnit == 'Acre'){ echo 'selected'; } } ?> >Acre</option>
                                    <option value="Bigha" <?php if(!empty($flat_details)){ if($flat_details->flat_SuperBuildupAreaUnit == 'Bigha'){ echo 'selected'; } } ?> >Bigha</option>
                                    <option value="Hectare" <?php if(!empty($flat_details)){ if($flat_details->flat_SuperBuildupAreaUnit == 'Hectare'){ echo 'selected'; } } ?> >Hectare</option>
                                    <option value="Marla" <?php if(!empty($flat_details)){ if($flat_details->flat_SuperBuildupAreaUnit == 'Marla'){ echo 'selected'; } } ?> >Marla</option>
                                    <option value="Chatak" <?php if(!empty($flat_details)){ if($flat_details->flat_SuperBuildupAreaUnit == 'Chatak'){ echo 'selected'; } } ?> >Chatak</option>
                                    <option value="Kottah" <?php if(!empty($flat_details)){ if($flat_details->flat_SuperBuildupAreaUnit == 'Kottah'){ echo 'selected'; } } ?> >Kottah</option>
                                </select>
                            </div>
                            
                            <div class="col-md-2 col-sm-6 col-xs-12">
                                <label>Carpet Area</label><b style="color:red;">*</b>
                                <input class="form-control" type="number" name="flat_CarpetArea" id="flat_CarpetArea" class="gui-input" placeholder="Carpet Area" value=""  >
                            </div>
                            
                            <div class="col-md-2 col-sm-6 col-xs-12">
                                <label>Carpet Area Unit</label><b style="color:red;">*</b>
                                <select id="flat_Carpet_Unit" name="flat_Carpet_Unit" class="form-control">
                                    <option hidden >Unit</option>
                                    <option disabled >Select one </option>
                                    <option value="Sqft" <?php if(!empty($flat_details)){ if($flat_details->flat_Carpet_Unit == 'Sqft'){ echo 'selected'; } } ?> >Sqft</option>
                                    <option value="Sq-m" <?php if(!empty($flat_details)){ if($flat_details->flat_Carpet_Unit == 'Sq-m'){ echo 'selected'; } } ?> >Sq-m</option>
                                    <option value="Acre" <?php if(!empty($flat_details)){ if($flat_details->flat_Carpet_Unit == 'Acre'){ echo 'selected'; } } ?> >Acre</option>
                                    <option value="Bigha" <?php if(!empty($flat_details)){ if($flat_details->flat_Carpet_Unit == 'Bigha'){ echo 'selected'; } } ?> >Bigha</option>
                                    <option value="Hectare" <?php if(!empty($flat_details)){ if($flat_details->flat_Carpet_Unit == 'Hectare'){ echo 'selected'; } } ?> >Hectare</option>
                                    <option value="Marla" <?php if(!empty($flat_details)){ if($flat_details->flat_Carpet_Unit == 'Marla'){ echo 'selected'; } } ?> >Marla</option>
                                    <option value="Chatak" <?php if(!empty($flat_details)){ if($flat_details->flat_Carpet_Unit == 'Chatak'){ echo 'selected'; } } ?> >Chatak</option>
                                    <option value="Kottah" <?php if(!empty($flat_details)){ if($flat_details->flat_Carpet_Unit == 'Kottah'){ echo 'selected'; } } ?> >Kottah</option>
                                </select>
                            </div>
                            
                            <div class="col-md-2 col-sm-6 col-xs-12">
                                <label>Total Floor</label><b style="color:red;">*</b>
                                <select id="flat_TotalFloor" name="flat_TotalFloor" class="form-control">
                                    <option hidden >Total Floor</option>
                                    <option disabled >Select one </option>
                                    <option value="G" <?php if(!empty($flat_details)){ if($flat_details->flat_TotalFloor == 'G'){ echo 'selected'; } } ?> >G</option>
                                    <?php for($i = 1; $i<=100; $i++){ ?>
                                    <option value="<?php echo $i; ?>" <?php if(!empty($flat_details)){ if($flat_details->flat_TotalFloor == $i){ echo 'selected'; } } ?>><?php echo $i; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            
                            <div class="col-md-2 col-sm-6 col-xs-12">
                                <label>Bathroom</label><b style="color:red;">*</b>
                                <select id="flat_Bathroom" name="flat_Bathroom" class="form-control" value="">
                                    <option hidden >Bathroom</option>
                                    <option disabled >Select one </option>
                                    <?php for($i = 1; $i<=100; $i++){ ?>
                                    <option value="<?php echo $i; ?>" <?php if(!empty($flat_details)){ if($flat_details->flat_Bathroom == $i){ echo 'selected'; } } ?>><?php echo $i; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            
                            <div class="col-md-2 col-sm-6 col-xs-12">
                                <label>Kitchen</label><b style="color:red;">*</b>
                                <select id="flat_Kitchen" name="flat_Kitchen" class="form-control" value="">
                                    <option hidden value="">Kitchen</option>
                                    <?php for($i = 1; $i<=100; $i++){ ?>
                                    <option value="<?php echo $i; ?>" <?php if(!empty($flat_details)){ if($flat_details->flat_Kitchen == $i){ echo 'selected'; } } ?>><?php echo $i; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            
                            <div class="col-md-2 col-sm-6 col-xs-12">
                                <label>Built-Up Area</label><b style="color:red;">*</b>
                                <input class="form-control" type="number" name="flat_BuildupArea" id="flat_BuildupArea" class="gui-input" placeholder="Build up Area" value="<?php if(!empty($flat_details)){ echo $flat_details->flat_BuildupArea; } ?>" >
                            </div>
                            
                            
                            <div class="col-md-2 col-sm-6 col-xs-12">
                                <label>Built-Up Area Unit</label><b style="color:red;">*</b>
                                <select id="flat_BuildupArea_Unit" name="flat_BuildupArea_Unit" value="" class="form-control" >
                                    <option hidden value="" >Unit</option>
                                    <option value="Sqft" <?php if(!empty($flat_details)){ if($flat_details->flat_BuildupArea_Unit == 'Sqft'){ echo 'selected'; } } ?> >Sqft</option>
                                    <option value="Sq-m" <?php if(!empty($flat_details)){ if($flat_details->flat_BuildupArea_Unit == 'Sq-m'){ echo 'selected'; } } ?> >Sq-m</option>
                                    <option value="Acre" <?php if(!empty($flat_details)){ if($flat_details->flat_BuildupArea_Unit == 'Acre'){ echo 'selected'; } } ?> >Acre</option>
                                    <option value="Bigha" <?php if(!empty($flat_details)){ if($flat_details->flat_BuildupArea_Unit == 'Bigha'){ echo 'selected'; } } ?> >Bigha</option>
                                    <option value="Hectare" <?php if(!empty($flat_details)){ if($flat_details->flat_BuildupArea_Unit == 'Hectare'){ echo 'selected'; } } ?> >Hectare</option>
                                    <option value="Marla" <?php if(!empty($flat_details)){ if($flat_details->flat_BuildupArea_Unit == 'Marla'){ echo 'selected'; } } ?> >Marla</option>
                                    <option value="Chatak" <?php if(!empty($flat_details)){ if($flat_details->flat_BuildupArea_Unit == 'Chatak'){ echo 'selected'; } } ?> >Chatak</option>
                                    <option value="Kottah" <?php if(!empty($flat_details)){ if($flat_details->flat_BuildupArea_Unit == 'Kottah'){ echo 'selected'; } } ?> >Kottah</option>
                                </select>
                            </div>
                            
                            <div class="col-md-2 col-sm-3 col-xs-12">
                                <label>Flat Floor</label><b style="color:red;">*</b>
                                <select id="flat_Floor" name="flat_Floor" class="form-control">
                                    <option hidden >Floor</option>
                                    <option disabled >Select one </option>
                                    <option value="LowerBasement" <?php if(!empty($flat_details)){ if($flat_details->flat_Floor == 'LowerBasement'){ echo 'selected'; } } ?> >Lower Basement </option>
                                    <option value="Basement" <?php if(!empty($flat_details)){ if($flat_details->flat_Floor == 'Basement'){ echo 'selected'; } } ?> >Basement </option>
                                    <option value="G" <?php if(!empty($flat_details)){ if($flat_details->flat_Floor == 'G'){ echo 'selected'; } } ?> >G</option>
                                    <?php for($i = 1; $i<=100; $i++){ ?>
                                    <option value="<?php echo $i; ?>" <?php if(!empty($flat_details)){ if($flat_details->flat_Floor == $i){ echo 'selected'; } } ?>><?php echo $i; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            
                            
                            <div class="col-md-2 col-sm-3 col-xs-12">
                                <label>Heavy Parking</label><b style="color:red;">*</b>
                                <select id="flat_HeavyVehicleParkingUpto" name="flat_HeavyVehicleParkingUpto" class="form-control">
                                    <option hidden value="">Parking</option>
                                    <option value="3Wheeler"  <?php if(!empty($factory_details)){ if($factory_details->factory_HeavyVehicleParkingUpto == '3Wheeler'){ echo 'selected'; } } ?> >3 Wheeler</option>
                                    <option value="4Wheeler"  <?php if(!empty($factory_details)){ if($factory_details->factory_HeavyVehicleParkingUpto == '4Wheeler'){ echo 'selected'; } } ?> >4 Wheeler</option>
                                </select>
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="col-md-2 col-sm-6 col-xs-12">
                                    <label>Amenities</label><b style="color:red;">*</b>
                                    <br><input type="checkbox" value="1" name="PowerBackup" id="PowerBackup"style="padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"/> Power Backup
                                    <br><input type="checkbox" value="1" name="Intercom" id="Intercom"style="padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  /> Intercom
                                    <br><input type="checkbox" value="1" name="Lift" id="Lift"style="padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  />  Lift
                                    <br><input type="checkbox" value="1" name="GasPipeLine" id="GasPipeLine"style="padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  /> Gas Pipe Line
                                </div>
                                <div class="col-md-2 col-sm-6 col-xs-12">
                                    <br><input type="checkbox" value="1" name="ServiveLift" id="ServiveLift"style="padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  />Service  Lift
                                    <br><input type="checkbox" value="1" name="CCTV" id="CCTV"style="padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  /> CCTV
                                    <br><input type="checkbox" value="1" name="WIFI" id="WIFI"style="padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  /> WIFI
                                    <br><input type="checkbox" value="1" name="Security" id="Security"style="padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  /> 24 Hr.Security
                                </div>
                                <div class="col-md-2 col-sm-6 col-xs-12">
                                    <br><input type="checkbox" value="1" name="BanquetHall" id="BanquetHall"style="padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  /> Banquet Hall
                                    <br><input type="checkbox" value="1" name="SwimmingPool" id="SwimmingPool"style="padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  /> Swimming Pool
                                    <br><input type="checkbox" value="1" name="CommunityHall" id="CommunityHall"style="padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  /> Community Hall
                                    <br><input type="checkbox" value="1" name="SarvantRoom" id="SarvantRoom"style="padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  /> Sarvant Room
                                </div>
                                <div class="col-md-2 col-sm-6 col-xs-12">
                                    <br><input type="checkbox" value="1" name="GYM" id="GYM"style="padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  /> Gym
                                    <br><input type="checkbox" value="1" name="CloubHouse" id="CloubHouse"style="padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  /> Club House
                                    <br><input type="checkbox" value="1" name="IndoorGame" id="IndoorGame"style="padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  /> Indoor Game
                                </div>
                                <div class="col-md-2 col-sm-6 col-xs-12">
                                    <br><input type="checkbox" value="1" name="OutDoorGame" id="OutDoorGame"style="padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  /> Outdoor Game
                                    <br><input type="checkbox" value="1" name="Park" id="Park"style="padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  /> Park
                                    <br><input type="checkbox" value="1" name="VisitorParking" id="VisitorParking"style="padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  /> Visitor Parking
                                </div>
                            </div>
                            
                            <div class="col-md-12">
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <label>Image</label><b style="color:red;">*</b>
                                    <input type="file" name="UploadImages[]" id="UploadImages" value="" multiple  onblur="checkValue(this)"  />
                                    <input type="hidden" class="gui-file" name="prevUploadImages" id="prevUploadImages" value="<?php if(!empty($post_property)){ echo $post_property->image_name; }else{ echo ''; }?>">
                                </div>
    
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <label>Video</label><b style="color:red;">*</b>
                                    <input type="file" name="UploadVideos" id="UploadVideos"  onblur="checkValue(this)"  />
                                    <input type="hidden" class="gui-file" name="prevUploadVideos" id="prevUploadVideos" value="<?php if(!empty($post_property)){ echo $post_property->video_name; }else{ echo ''; }?>">
                                </div>
                            </div>
                            
                            <div class="col-md-12 col-sm-12 col-xs-12	">
                                <label>Description</label><b style="color:red;">*</b>
                                <textarea   maxlength="100" placeholder="100 words only" name="comment1" id="comment1"style="padding:3px;border: 1px solid #dddd;width:100%;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"></textarea>
                            </div>

                            

                        </div>
                        <div class="modal-footer">
                            <input type="submit" name="save" value="Save" id="submit-btn" class="btn btn-primary"/>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
    
    
    
    <!-- Modal -->
    <div class="modal fade" id="interested_popup" role="dialog">
        <div class="modal-dialog  modal-lg">

            <div class="modal-content">
                <div class="modal-header" style="background:linear-gradient(to right,#03709e,#18c3fd 100%);">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title" style="color:white;font-weight:bold;font-size:20px;">Add Interested Details</h4>
                </div>
                <div class="modal-body">
                    <form name="interested_popup_form" id="interested_popup_form" method="POST" enctype="multipart/form-data" action="<?php echo base_url(); ?>property/save_property_interested_details">
                        <div class="row">
                            <input type="hidden" name="interested_post_id" value="0" id="interested_post_id"  onblur="checkValue(this)"  />
                            <input type="hidden" name="interested_rent_sell" value="<?php echo $rent_sell; ?>" id="interested_rent_sell"  onblur="checkValue(this)"  />
                            <input type="hidden" name="redirect_url" value="<?php echo current_url(); ?>" id="redirect_url"  onblur="checkValue(this)"  />
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="col-md-2 col-sm-6 col-xs-12">
                                    <label>Buyer</label><b style="color:red;">*</b><br>
                                    <select name="interested_buyer" id="interested_buyer" class="form-control" value="" required>
                                        <option value="">Select One</option>
                                        <?php if(!empty($buyer_list)){ ?>
                                        <?php foreach($buyer_list as $row){ ?>
                                        <option value="<?php echo $row->post_id; ?>"><?php echo $row->lead_id; ?></option>
                                        <?php } ?>
                                        <?php } ?>
                                    </select>
                                    <!--<input type="text" name="interested_buyer" id="interested_buyer" class="form-control" value=""  required />-->
                                </div>
                                <div class="col-md-2 col-sm-6 col-xs-12">
                                    <label>Status</label><b style="color:red;">*</b>
                                    <select name="interested_status" id="interested_status" class="form-control" onchange="change_post_status(this.value)" required>
                                        <option value="">Select One</option>
                                        <option value="Interested">Interested</option>
                                        <option value="In Process">In Process</option>
                                        <!--<option value="Payment Pending">Payment Pending</option>
                                        <option value="Closed">Closed</option>
                                        <option value="Sold Out">Sold Out</option>
                                        <option value="Rent Out">Rent Out</option>-->
                                        <!--<option value="No Interested Seller">No Interested Seller</option>
                                        <option value="No Interested Buyer">No Interested Buyer</option>-->
                                    </select>
                                </div>
                                
                                <?php if($rent_sell == 'Sell'){ ?>
                                <div class="col-md-2 col-sm-6 col-xs-12">
                                    <label>Amount</label><b style="color:red;">*</b>
                                    <input type="number" name="interested_amount" id="interested_amount" required     />
                                </div>
                                <?php }else{ ?>
                                <div class="col-md-2 col-sm-6 col-xs-12">
                                    <label>Security Deposite</label><b style="color:red;">*</b>
                                    <input type="number" name="interested_deposite" id="interested_deposite" required     />
                                </div>
                                
                                <div class="col-md-2 col-sm-6 col-xs-12">
                                    <label>Rent/Month</label><b style="color:red;">*</b>
                                    <input type="number" name="interested_rent" id="interested_rent" required     />
                                </div>
                                
                                <div class="col-md-2 col-sm-6 col-xs-12">
                                    <label>Expiry Date</label><b style="color:red;">*</b>
                                    <input type="date" name="interested_expiry_date" id="interested_expiry_date" required     />
                                </div>
                                <?php } ?>
                                
                                
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="col-md-2 col-sm-6 col-xs-12">
                                    <label>Commission1</label><b style="color:red;">*</b>
                                    <input type="number" name="interested_commission" id="interested_commission" required     />
                                </div>
                                <div class="col-md-2 col-sm-6 col-xs-12">
                                    <label>Commission2</label><b style="color:red;">*</b>
                                    <input type="number" name="interested_commission1" id="interested_commission1" required     />
                                </div>
                                
                                <div class="col-md-2 col-sm-6 col-xs-12">
                                    <label>Admin 1</label><b style="color:red;">*</b>
                                    <select name="interested_telecaller" id="interested_telecaller" required class="form-control">
                                        <option value="">Select One</option>
                                        <?php if(!empty($telecaller_list)){ ?>
                                        <?php foreach($telecaller_list as $row){ ?>
                                        <option value="<?php echo $row->user_id; ?>"><?php echo $row->name; ?></option>
                                        <?php } ?>
                                        <?php } ?>
                                    </select>
                                </div>
                                
                                <div class="col-md-2 col-sm-6 col-xs-12">
                                    <label>Admin 2</label><b style="color:red;">*</b>
                                    <select name="interested_executive" id="interested_executive" class="form-control" required>
                                        <option value="">Select One</option>
                                        <?php if(!empty($executive_list)){ ?>
                                        <?php foreach($executive_list as $row){ ?>
                                        <option value="<?php echo $row->user_id; ?>"><?php echo $row->name; ?></option>
                                        <?php } ?>
                                        <?php } ?>
                                    </select>
                                </div>
                                
                                
                                
                               <!-- <div class="col-md-6 col-sm-6 col-xs-12">
                                    <label>Extra Services(Add multiple services seperated by comma)</label>
                                    <textarea name="extra_services" id="extra_services" class="formn-control"></textarea>
                                </div>-->
                            </div>

                        </div>
                        <div class="modal-footer">
                            <input type="submit" name="save" value="Save" id="submit-btn" class="btn btn-primary"/>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
    
    
    
    <div class="modal fade" id="sellerNotInterestedPopup" role="dialog">
        <div class="modal-dialog  modal-lg">

            <div class="modal-content">
                <div class="modal-header" style="background:linear-gradient(to right,#03709e,#18c3fd 100%);">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title" style="color:white;font-weight:bold;font-size:20px;">Not Interested Seller</h4>
                </div>
                <div class="modal-body">
                    <form method="POST" enctype="multipart/form-data" action="<?php echo base_url(); ?>property/save_seller_not_interested">
                        <div class="row">
                            <input type="hidden" name="seller_not_interested_post_id" value="0" id="seller_not_interested_post_id"  onblur="checkValue(this)"  />
                            <input type="hidden" name="redirect_url" value="<?php echo current_url(); ?>" id="redirect_url"  onblur="checkValue(this)"  />
                             <div class="col-md-12 col-sm-6 col-xs-12">
                                <label>Reason</label><b style="color:red;">*</b>
                                <textarea name="reason" id="reason"></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <input type="submit" name="save" value="Save" class="btn btn-primary"/>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
    
    
    <div class="modal fade" id="cancelDealPopup" role="dialog">
        <div class="modal-dialog  modal-lg">

            <div class="modal-content">
                <div class="modal-header" style="background:linear-gradient(to right,#03709e,#18c3fd 100%);">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title" style="color:white;font-weight:bold;font-size:20px;">Do you want to cancel all deals of this property?</h4>
                </div>
                <div class="modal-body">
                    <form method="POST" enctype="multipart/form-data" action="<?php echo base_url(); ?>property/cancel_property_deals">
                        <div class="row">
                            <input type="hidden" name="cancel_deal_post_id" value="0" id="cancel_deal_post_id"  />
                            <input type="hidden" name="redirect_url" value="<?php echo current_url(); ?>" id="redirect_url"  onblur="checkValue(this)"  />
                        </div>
                        <div class="modal-footer">
                            <input type="submit" name="save" value="Save" class="btn btn-primary"/>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
    
</div>
            
        
<script>
	function add()
	{
		$("#submit-btn").css('display','block');
		$("#post_id").val(0);
		$("#property_id").val('');
        $("#posted_by").val('');
        $("#posted_by_email").val('');
        $("#posted_by_mobile").val('');
        $("#name").val('');
        $("#mobile").val('');
        $("#mobile1").val('');
        $("#phone").val('');
        $("#email").val('');
        $("#city").val('');
        $("#state").val('');
        $("#location").val('');
        $("#complex_society_building").val('');
        $("#address").val('');
        $("#blockno").val('');
        $("#landmark").val('');
        $("#flatno").val('');
        $("#pincode").val('');
        $("#section").val('');
        $("#AgeofPropeety").val('');
        $("#PossessionDate").val('');
        $("#PropertyType").val('');
        $("#OpenParking").val('');
        $("#CoveredParking").val('');
        $("#Basement").val('');
        $("#LiftParking").val('');
        $("#TwoWheeler").val('');
        $("#rent_sell").val('');
        $("#res_com").val('');
        $("#FurnishedStatus").val('');
        $("#security_deposite").val('');
        $("#rentPerMonth").val('');
        $("#net_amount").val('');
        $("#amount").val('');
        $("#per_unit").val('');
        
        $("#flat_Room").val('');
        $("#flat_Balcony").val('');
        $("#flat_SuperBuildupArea").val('');
        $("#flat_CarpetArea").val('');
        $("#flat_SuperBuildupAreaUnit").val('');
        $("#flat_Carpet_Unit").val('');
        $("#flat_TotalFloor").val('');
        $("#flat_Bathroom").val('');
        $("#flat_Kitchen").val('');
        $("#flat_BuildupArea").val('');
        $("#flat_BuildupArea_Unit").val('');
        $("#flat_Floor").val('');
        $("#flat_HeavyVehicleParkingUpto").val('');
        
        $("#PowerBackup").attr('checked',false);
        $("#ServiveLift").attr('checked',false);
        $("#Intercom").attr('checked',false);
        $("#BanquetHall").attr('checked',false);
        $("#GYM").attr('checked',false);
        $("#VisitorParking").attr('checked',false);
        $("#Intercom").attr('checked',false);
        $("#CCTV").attr('checked',false);
        $("#SwimmingPool").attr('checked',false);
        $("#CloubHouse").attr('checked',false);
        $("#SarvantRoom").attr('checked',false);
        $("#Lift").attr('checked',false);
        $("#WIFI").attr('checked',false);
        $("#CommunityHall").attr('checked',false);
        $("#IndoorGame").attr('checked',false);
        $("#OutDoorGame").attr('checked',false);
        $("#GasPipeLine").attr('checked',false);
        $("#Park").attr('checked',false);
        $("#Security").attr('checked',false);
        $("#comment1").val('');
        
		$("#myModal").modal();
	}
</script>
<script>
    function edit_seller(post_id, mode)
    {
        $.ajax
        ({
            type: "POST",
            url: "<?php echo base_url(); ?>property/get_property_details_by_id",
            data: {post_id:post_id, property_type:'Flat'},
            dataType: 'json',
            success: function(data)
            {
                $("#post_id").val(data['post_id']);
                $("#property_id").val(data['lead_id']);
                $("#posted_by").val(data['posted_by']);
                $("#posted_by_email").val(data['posted_by_email']);
                $("#posted_by_mobile").val(data['posted_by_mobile']);
                $("#name").val(data['name']);
                $("#mobile").val(data['mobile']);
                $("#mobile1").val(data['mobile1']);
                $("#phone").val(data['phone']);
                $("#email").val(data['email']);
                $("#city").val(data['city']);
                $("#state").val(data['state']);
                $("#location").val(data['location']);
                $("#complex_society_building").val(data['complex_society_building']);
                $("#address").val(data['address']);
                $("#blockno").val(data['blockno']);
                $("#landmark").val(data['landmark']);
                $("#flatno").val(data['flatno']);
                $("#pincode").val(data['pincode']);
                $("#section").val(data['section']);
                $("#AgeofPropeety").val(data['AgeofPropeety']);
                $("#PossessionDate").val(data['PossessionDate']);
                $("#PropertyType").val(data['PropertyType']);
                $("#OpenParking").val(data['OpenParking']);
                $("#CoveredParking").val(data['CoveredParking']);
                $("#Basement").val(data['Basement']);
                $("#LiftParking").val(data['LiftParking']);
                $("#TwoWheeler").val(data['TwoWheeler']);
                $("#rent_sell").val(data['rent_sell']);
                $("#res_com").val(data['res_com']);
                $("#res_com").val(data['res_com']);
                $("#FurnishedStatus").val(data['FurnishedStatus']);
                $("#security_deposite").val(data['security_deposite']);
                $("#rentPerMonth").val(data['rentPerMonth']);
                $("#net_amount").val(data['net_amount']);
                $("#amount").val(data['amount']);
                $("#per_unit").val(data['per_unit']);
                $("#flat_Room").val(data['flat_Room']);
                $("#flat_Balcony").val(data['flat_Balcony']);
                $("#flat_SuperBuildupArea").val(data['flat_SuperBuildupArea']);
                $("#flat_CarpetArea").val(data['flat_CarpetArea']);
                $("#flat_SuperBuildupAreaUnit").val(data['flat_SuperBuildupAreaUnit']);
                $("#flat_Carpet_Unit").val(data['flat_Carpet_Unit']);
                $("#flat_TotalFloor").val(data['flat_TotalFloor']);
                $("#flat_Bathroom").val(data['flat_Bathroom']);
                $("#flat_Kitchen").val(data['flat_Kitchen']);
                $("#flat_BuildupArea").val(data['flat_BuildupArea']);
                $("#flat_BuildupArea_Unit").val(data['flat_BuildupArea_Unit']);
                $("#flat_Floor").val(data['flat_Floor']);
                $("#flat_HeavyVehicleParkingUpto").val(data['flat_HeavyVehicleParkingUpto']);
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
                $("#comment1").val(data['comment1']);
                if(mode == 'view'){
                    $("#submit-btn").css('display','none');
                }else{
                    $("#submit-btn").css('display','block');
                }
                $("#myModal").modal();
            }

        });	
    }
    
    
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
    
    function send_link_popup(link_type)
    {
        $('#send_link_type').val(link_type);
        $('#sendLinkPopup').modal();
    }
    
    function cancel_deal(post_id)
    {
        $('#cancel_deal_post_id').val(post_id);
        $('#cancelDealPopup').modal();
    }
</script>


<script>
  function interested_popup(post_id){
      $('#interested_post_id').val(post_id);
      $('#interested_popup').modal();
  }
  
  function seller_not_interested(post_id)
{
    $("#seller_not_interested_post_id").val(post_id);
    $("#sellerNotInterestedPopup").modal();
}
  
  function change_post_status(value){
      if(value == 'In Process'){
          /*$('#interested_buyer').attr('required', 'required');*/
          $('#interested_amount').attr('required', 'required');
          $('#interested_deposite').attr('required', 'required');
          $('#interested_rent').attr('required', 'required');
          $('#interested_expiry_date').attr('required', 'required');
          $('#interested_commission').attr('required', 'required');
          $('#interested_commission1').attr('required', 'required');
          $('#interested_telecaller').attr('required', 'required');
          $('#interested_executive').attr('required', 'required');
      }else{
          /*$('#interested_buyer').removeAttr('required');*/
          $('#interested_amount').removeAttr('required');
          $('#interested_deposite').removeAttr('required');
          $('#interested_rent').removeAttr('required');
          $('#interested_expiry_date').removeAttr('required');
          $('#interested_commission').removeAttr('required');
          $('#interested_commission1').removeAttr('required');
          $('#interested_telecaller').removeAttr('required');
          $('#interested_executive').removeAttr('required');
      }
  }
  
  /*function load_buyers(buyer){
    $.ajax({
       url:'<?php echo base_url(); ?>property/get_buyer',
       type:'post',
       data:{buyer:buyer},
       success:function(data){
           set_buyers(data);
       }
    });
}
function set_buyers(data){
         availableTags = JSON.parse(data); 
         /*alert(availableTags);*/
         /*$( "#interested_buyer" ).autocomplete({
      source: availableTags*/
    //});
//}*/

/*$( function() {
    var availableTags = [
      "ActionScript",
      "AppleScript",
      "Asp",
      "BASIC",
      "C",
      "C++",
      "Clojure",
      "COBOL",
      "ColdFusion",
      "Erlang",
      "Fortran",
      "Groovy",
      "Haskell",
      "Java",
      "JavaScript",
      "Lisp",
      "Perl",
      "PHP",
      "Python",
      "Ruby",
      "Scala",
      "Scheme"
    ];
    $( "#interested_buyer" ).autocomplete({
      source: availableTags
    });
  } );*/
  
  $(document).ready(function() {
    $('#interested_buyer').select2();
});
</script>









9