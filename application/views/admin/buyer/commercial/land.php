<div class="right_col" role="main">
    <div class="page-title">
        <div class="title_left">
            <h3><i class="fa fa-ioxhost"></i> Manage Land</h3>
        </div>
    </div>

    <div class="clearfix"></div>

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">

            <div class="x_panel">
                
                
                <?php if($this->session->userdata('user_type') != 'admin'){ ?>
                <div class="x_panel">
                    <div class="x_content">
                        <?php if($rent_sell == 'Rent'){ ?>
                        <form method = "POST" action = "<?php echo base_url('Excel_uploads/buyer_com_rent_land');?>" enctype = "multipart/form-data">
                            <?php }else{?>
                            <form method = "POST" action = "<?php echo base_url('Excel_uploads/buyer_com_sell_land');?>" enctype = "multipart/form-data">
                                <?php }?>
                            <div class="tab"> 
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="file-drop-area">
                                      <span class="fake-btn">Choose files</span>
                                      <span class="file-msg">or drag and drop files here</span>
                                      <input class="file-input" type="file" required name="lead_partner">
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                     <button type ="submit" class = "effect red effect-5" style="margin:15px 0 10px 0;">Upload</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-6">
                        <?php if($rent_sell == 'Rent'){ ?>
                        <a class="outln-hvr" href = "<?php echo base_url('Uploads/excels/buyer/Flat/buyer_com_rent_land.xlsx');?>">Download Demo File</a>
                        <?php }else{?>
                        <a class="outln-hvr" href = "<?php echo base_url('Uploads/excels/buyer/Flat/buyer_com_sell_land.xlsx');?>">Download Demo File</a>
                        <?php }?>
                    </div>
                </div>
                <?php } ?>
                
                
                
                
                <div class="x_title">
                    <div class="col-md-3 col-sm-6 col-xs-12 xs-pb-10">
                         <h2>Land List</h2>
                    </div>
                    <?php if($rent_sell == 'Sell'){ ?>
                    <a href = "<?php echo base_url('property/buyer_commercial_sale_land_not_interested');?>"><button type="button" class="effect effect-5 blue pull-right">Not Intrested</button></a>
                    <?php }else{ ?>
                    <a href = "<?php echo base_url('property/buyer_commercial_rent_land_not_interested');?>"><button type="button" class="effect effect-5 blue pull-right">Not Intrested</button></a>
                    <?php } ?>
                    <button type="button" class="effect effect-5 red  pull-right"  onclick="add()">ADD NEW</button>
                    <button type="button" class="effect effect-5 blue pull-right" onclick="send_link_popup('post_requirement')">Send Link</button>
                    
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <table id="datatable" class="table table-bordered table-striped table">
                        <thead> 

                            <tr>
                                <th>Sr.No.</th>
                                <th>Prop ID</th>
                                <th>Status</th>
                                <th>Name</th>
                                <th>Mobile<br/>Mobile1</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>State</th>
                                <th>City</th>
                                <th>Location</th>
                                <th>Complex Name</th>
                                <th>Section</th>
                                <th>PossessionDate</th>
                                <th>FurnishedStatus</th>
                                <th>MinimumRent</th>
                                <th>MaximumRent</th>
                                <th>OpenParking</th>
                                <th>CoveredParking</th>
                                <th>Basement</th>
                                <th>LiftParking</th>
                                <th>TwoWheeler</th>
                                <th>created</th>
                                <th>Action</th>
                            </tr>

                        </thead>
                        <tbody>
                            <?php if(!empty($list)){ ?>
                            <?php foreach($list as $i=>$row){ ?>
                            <tr>
                                <td><?php echo $i+1;?></td>
                                <td><a href="javascript:void(0);" onclick="edit_buyer(<?php echo $row->post_id; ?>, 'view');"><?php echo $row->lead_id;?></a></td>
                                <td>
                                    <?php if($row->status == 1){ ?>
                                    <span class="label label-success" title="Active">Active</span>
                                    <?php }else{ ?>
                                    <span class="label label-danger" title="Not Interested">Not Interested</span>
                                    <?php } ?>
                                </td>
                                <td><?php echo $row->name;?></td>
                                <td><?php echo $row->mobile.'<br/>'.$row->mobile2;?></td>
                                <td><?php echo $row->phone;?></td>
                                <td><?php echo $row->email;?></td>
                                <td><?php echo $row->state;?></td>
                                <td><?php echo $row->city;?></td>
                                <td><?php echo $row->location;?></td>
                                <td><?php echo $row->ComplexSoceityBuilding;?></td>
                                <td><?php echo $row->rent_sell;?></td>
                                <td><?php echo $row->PossessionDate;?></td>
                                <td><?php echo $row->FurnishedStatus;?></td>
                                <td><?php echo $row->MinimumRent;?></td>
                                <td><?php echo $row->MaximumRent;?></td>
                                <td><?php echo $row->OpenParking;?></td>
                                <td><?php echo $row->CoveredParking;?></td>
                                <td><?php echo $row->Basement;?></td>
                                <td><?php echo $row->LiftParking;?></td>
                                <td><?php echo $row->TwoWheeler;?></td>
                                <td><?php echo $row->created;?></td>
                                <td>
                                    <a href="javascript:void(0);" onclick="edit_buyer(<?php echo $row->post_id; ?>, 'edit');" title="Edit"><span class="label label-primary">Edit</span></a>
                                    <!--<a onclick="return confirm('Do You want to delete this record?');" href="<?php echo base_url();?>property/delete_buyer/<?php echo $row->post_id; ?>" title="Delete"><span class="label label-danger">Delete</span></a>-->
                                    <?php if($this->session->userdata('user_type') != 'admin'){ ?>
                                    <a onclick="delete_buyer(<?php echo $row->post_id; ?>)" href="javascript:void(0);" title="Delete"><span class="label label-danger">Delete</span></a>
                                    <?php } ?>
                                    <?php if($row->status == 1){ ?>
                                    <span class="label label-warning" onclick="buyer_not_interested(<?php echo $row->post_id; ?>)" title="Not Interested">Not Interested</span>
                                    <?php } ?>
                                </td>
                        
                               <!-- <td>
                                    <div class="container">
                                        <button type="button" style="background-color:#212121" class="btn btn-info btn-lg" data-toggle="modal" data-target="#<?php echo $rows11['a'];?>"><i class="fa fa-eye" aria-hidden="true"></i>
                                        </button>

                                        <div class="modal fade" id="<?php echo $rows11['a'];?>" role="dialog">
                                            <div class="modal-dialog">

                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        <h4 class="modal-title">Amenities</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p> 
                                                            <div class="container">
                                                                <div class="row">
                                                                    <div class="col-sm-3">
                                                                        <?php echo $rows11['power_backup'];?>
                                                                    </div>
                                                                    <div class="col-sm-3">
                                                                        <?php echo $rows11['intercom'];?>
                                                                    </div>
                                                                    <div class="col-sm-3">
                                                                        <?php echo $rows11['security'];?>
                                                                    </div>
                                                                    <div class="col-sm-3">
                                                                        <?php echo $rows11['swimming'];?>
                                                                    </div>
                                                                    <div class="col-sm-3">
                                                                        <?php echo $rows11['community_hall'];?>
                                                                    </div>
                                                                    <div class="col-sm-3">
                                                                        <?php echo $rows11['gym'];?>
                                                                    </div>
                                                                    <div class="col-sm-3">
                                                                        <?php echo $rows11['club_house'];?>
                                                                    </div>
                                                                    <div class="col-sm-3">
                                                                        <?php echo $rows11['indoor_game'];?>
                                                                    </div>
                                                                    <div class="col-sm-3">
                                                                        <?php echo $rows11['outdoor_game'];?>
                                                                    </div>
                                                                    <div class="col-sm-3">
                                                                        <?php echo $rows11['park'];?>
                                                                    </div>
                                                                    <div class="col-sm-3">
                                                                        <?php echo $rows11['vigitor_parking'];?>
                                                                    </div>
                                                                    <div class="col-sm-3">
                                                                        <?php echo $rows11['gas_pipe_line'];?>
                                                                    </div>
                                                                    <div class="col-sm-3">
                                                                        <?php echo $rows11['sarvant_room'];?>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                    </div>
                                </td>
                                <td><div class="container">
                                    <button type="button" style="background-color:#212121" class="btn btn-info btn-lg" data-toggle="modal" data-target="#<?php echo $rows11['d'];?>"><i class="fa fa-eye" aria-hidden="true"></i>
                                    </button>

                                    <div class="modal fade" id="<?php echo $rows11['d'];?>" role="dialog">
                                        <div class="modal-dialog">

                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    <h4 class="modal-title">Details</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <p><?php echo $rows11['description'];?></p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                </div></td>
                                <td><div class="container">
                                    <button type="button" style="background-color:#212121" class="btn btn-info btn-lg" data-toggle="modal" data-target="#<?php echo $rows11['c'];?>"><i class="fa fa-eye" aria-hidden="true"></i>
                                    </button>

                                    <div class="modal fade" id="<?php echo $rows11['c'];?>" role="dialog">
                                        <div class="modal-dialog">

                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    <h4 class="modal-title">Contact Details</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <p>
                                                        <table>
                                                            <tr>
                                                                <th>Name</th>
                                                                <th>Mobile</th>
                                                                <th>Email</th>
                                                                <th>Address</th>
                                                                <th>Pincode</th>
                                                            </tr>
                                                            <tr>
                                                                <td><?php echo $rows11['name'];?></td>
                                                                <td><?php echo $rows11['mobile'];?></td>
                                                                <td><?php echo $rows11['email'];?></td>
                                                                <td><?php echo $rows11['address'];?></td>
                                                                <td><?php echo $rows11['pin_code'];?></td>
                                                            </tr>
                                                        </table>

                                                    </p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                </div></td>
                                <td><?php echo $rows11['added_by'];?></td>
                                <td><?php echo $rows11['route_id'];?></td>
                                <td><?php echo $rows11['added_by'];?>  </td>
                                <td><?php echo $rows11['source_id'];?></td>
                                <td><div class="container">
                                    <button type="button" style="background-color:#212121" class="btn btn-info btn-lg" data-toggle="modal" data-target="#<?php echo $rows11['i'];?>"><i class="fa fa-eye" aria-hidden="true"></i>
                                    </button>

                                    <div class="modal fade" id="<?php echo $rows11['i'];?>" role="dialog">
                                        <div class="modal-dialog">

                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    <h4 class="modal-title">Image</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <p><img style="width:200px;height:200px" src="images/stock_images/<?php echo $rows11['image'];?>"></p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                </div></td>   
                                <a target="blank" href="images/stock_images/<?php echo $rows11['image'];?>"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                <td><a target="blank" href="<?php echo $rows11['video']?>"><i style="color:red" class="fa fa-youtube-play" aria-hidden="true"></i></a></td>
                                <td>
                                    <a   href="factory_rent_update.php?bid=<?php echo $rows11['id']?>"><i class="fa fa-pencil"></i></a>
                                    <a   onclick="deleteRecord(<?php echo $rows11['id'];?>)" href="javascript:void(0)"> <i class="fa fa-trash"></i></a>
                                    <a   href="creat.php?id=<?php echo $rows11['id']?>"><i class="fa fa-tasks" aria-hidden="true"></i></a>
                                </td>  -->
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
                    <h4 class="modal-title" style="color:white;font-weight:bold;font-size:20px;">Add Land Requirement</h4>
                </div>
                <div class="modal-body">
                    <form method="POST" enctype="multipart/form-data" action="<?php echo base_url(); ?>property/save_buyer">
                        <div class="row">
                            <input type="hidden" name="added_by" value="Super Admin" id="added_by" onblur="checkValue(this)"  />
                            <input type="hidden" name="post_id" value="0" id="post_id" onblur="checkValue(this)"  />
                            <input type="hidden" name="residential" value="Land2" id="residential" onblur="checkValue(this)"  />
                            <input type="hidden" name="residential_commercial" value="Commercial" id="residential_commercial" onblur="checkValue(this)"  />
                            <input type="hidden" name="rent_sell" value="<?php echo $rent_sell; ?>" id="rent_sell" onblur="checkValue(this)"  />
                            <input type="hidden" name="redirect_url" value="<?php echo current_url(); ?>" id="redirect_url" onblur="checkValue(this)"  />
                            
                             <div class="col-md-6 col-sm-6 col-xs-12">
                                <label>Name</label><b style="color:red;">*</b>
                                <input type="text" name="name" id="name" onblur="checkValue(this)" style="text-transform: uppercase;" required />
                            </div>
                            
                            <div class="col-md-3 col-sm-3 col-xs-6">
                                <label>Mobile</label><b style="color:red;">*</b>
                                <input type="text" size=20 maxlength=10 name="mobile" id="mobile" onkeypress="return event.charCode >= 48" min="0"  required />
                            </div>

                            <div class="col-md-3 col-sm-3 col-xs-6">
                                <label>Alt. Mobile</label>
                                <input type="text" name="mobile2" id="mobile2" onkeypress="return event.charCode >= 48" min="0" />
                            </div>

                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <label>Phone</label>
                                <input type="text" class="input--style-5" name="phone" id="phone" onblur="checkValue(this)" pattern="/^-?\d+\.?\d*$/" onkeypress="return event.charCode >= 48" min="0" onKeyPress="if(this.value.length==15) return false;">
                            </div>

                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <label>E-mail</label>
                                <input type="text" name="email" id="land_email" onblur="checkValue(this)" style="text-transform: lowercase;"/>
                            </div>

                            <div class="col-md-3 col-sm-3 col-xs-6">
                                <label>State</label><b style="color:red;">*</b>
                                <select id="state" name="state" required onchange="get_city_list_by_state_name(this.value)">
                                    <option hidden value="">--Select--</option>
                                    <option disabled >Select one </option>
                                    <option value="Andaman and Nicobar">Andaman and Nicobar</option>
                                    <option value="Andhra Pradesh">Andhra Pradesh</option>
                                    <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                                    <option value="Assam">Assam</option>
                                    <option value="Bihar">Bihar</option>
                                    <option value="Chandigarh">Chandigarh</option>
                                    <option value="Chhattisgarh">Chhattisgarh</option>
                                    <option value="Dadra and Nagar Haveli">Dadra and Nagar Haveli</option>
                                    <option value="Daman and Diu">Daman and Diu</option>
                                    <option value="Delhi">Delhi</option>
                                    <option value="Goa">Goa</option>
                                    <option value="Gujarat">Gujarat</option>
                                    <option value="Haryana">Haryana</option>
                                    <option value="Himachal Pradesh">Himachal Pradesh</option>
                                    <option value="Jammu and Kashmir">Jammu and Kashmir</option>
                                    <option value="Jharkhand">Jharkhand</option>
                                    <option value="Karnataka">Karnataka</option>
                                    <option value="Kerala">Kerala</option>
                                    <option value="Lakshadweep">Lakshadweep</option>
                                    <option value="Madhya Pradesh">Madhya Pradesh</option>
                                    <option value="Maharashtra">Maharashtra</option>
                                    <option value="Manipur">Manipur</option>
                                    <option value="Meghalaya">Meghalaya</option>
                                    <option value="Mizoram">Mizoram</option>
                                    <option value="Nagaland">Nagaland</option>
                                    <option value="Odisha">Odisha</option>
                                    <option value="Puducherry">Puducherry</option>
                                    <option value="Punjab">Punjab</option>
                                    <option value="Rajasthan">Rajasthan</option>
                                    <option value="Sikkim">Sikkim</option>
                                    <option value="Tamil Nadu">Tamil Nadu</option>
                                    <option value="Telangana">Telangana</option>
                                    <option value="Tripura">Tripura</option>
                                    <option value="Uttar Pradesh">Uttar Pradesh</option>
                                    <option value="Uttarakhand">Uttarakhand</option>
                                    <option value="West Bengal">West Bengal</option>
                                </select>
                            </div>

                            <div class="col-md-3 col-sm-3 col-xs-6">
                                <label>City</label><b style="color:red;">*</b>
                                <select id="city" name="city" required onchange="get_location_list_by_city_name(this.value)">
                                    <option hidden value="">--Select--</option>
                                </select>
                            </div>

                            <div class="col-md-6 col-sm-6 col-xs-12" style="padding:0;margin:0;">
                                <div class="col-md-7 col-sm-7 col-xs-12">
                                    <label>Locations (Select 5 Locations Only)</label><b style="color:red;">*</b>
                                    <select id="location" name="location[]" class="locations">
                                        <option hidden value="">--Select--</option>
                                        <option disabled >Select one </option>
                                    </select>
                                </div>
                                <div class="col-md-5 col-sm-5 col-xs-7 mt-25 xs-mt-0 xs-pb-10">
                                    <a class="outln-hvr" href="javascript:void(0);" onclick="load_more_locations()">+ Add More Locations</a>
                                </div>
                            </div>
                            
                            <div class="col-md-12 col-sm-6 col-xs-12" style="padding:0;margin:0;" id="locationDiv">
                            </div>
                            <div class="col-md-12 col-sm-6 col-xs-12" style="padding:0;margin:0;color:red;text-align:center;" id="loadLocationErrorDiv">
                            </div>
                            
                            <!--------- Note:  This Area Only For Rent Forms ---------
                            <div class="col-md-3 col-sm-6 col-xs-6">
                                <label>Minimun Rent</label><b style="color:red;">*</b>
                                <input maxlenght=15 type="number" min=0 name="MinimumRent" id="MinimumRent" />
                            </div>

                            <div class="col-md-3 col-sm-6 col-xs-6">
                                <label>Maximum Rent</label><b style="color:red;">*</b>
                                <input maxlenght=15 type="number" min=0 name="MaximumRent" id="MaximumRent" />
                            </div>
                            --------------------------------------------------->
                            
                            <div class="col-md-6 col-sm-6 col-xs-6">
                                <label>Min Budget</label><b style="color:red;">*</b>
                                <input maxlenght=15 type="number" min=0 name="MinimumRent" id="MinimumRent" onkeypress="return event.charCode >= 48" min="0" required />
                            </div>

                            <div class="col-md-6 col-sm-6 col-xs-6">
                                <label>Max Budget</label><b style="color:red;">*</b>
                                <input maxlenght=15 type="number" min=0 name="MaximumRent" id="MaximumRent" onkeypress="return event.charCode >= 48" min="0" required />
                            </div>

                            <div class="col-md-3 col-sm-3 col-xs-6">
                                <label>Min Area</label><b style="color:red;">*</b>
                                <input type="number" min=0 name="LandMinimumAreaRequired" id="LandMinimumAreaRequired"  onblur="checkValue(this)" onkeypress="return event.charCode >= 48" min="0" required  />
                            </div>

                            <div class="col-md-3 col-sm-3 col-xs-6">
                                <label>Unit</label><b style="color:red;">*</b>
                                <select name="LandSuperBuildupAreaUnit" id="LandSuperBuildupAreaUnit"  onblur="checkValue(this)" required >
                                    <option hidden value="">Unit</option>
                                    <option disabled >Select one </option>
                                    <option value="Sq-ft">Sq-ft</option>
                                    <option value="Sq-yrd">Sq-yrd</option>
                                    <option value="Sq-m">Sq-m</option>
                                    <option value="Acre">Acre</option>
                                    <option value="Bigha">Bigha</option>
                                    <option value="Hectare">Hectare</option>
                                    <option value="Marla">Marla</option>
                                    <option value="Chatak">Chatak</option>
                                    <option value="kottah">kottah</option>
                                </select>
                            </div>

                            <div class="col-md-3 col-sm-3 col-xs-6">
                                <label>Max Area</label><b style="color:red;">*</b>
                                <input type="number" min=0 name="LandMaximumAreaRequired" id="LandMaximumAreaRequired"  onblur="checkValue(this)" onkeypress="return event.charCode >= 48" min="0" required />
                            </div>

                            <div class="col-md-3 col-sm-3 col-xs-6">
                                <label>Unit</label><b style="color:red;">*</b>
                                <select name="MaximumAreaRequiredUnit" id="MaximumAreaRequiredUnit"  onblur="checkValue(this)" required >
                                    <option hidden value="">Unit</option>
                                    <option disabled >Select one </option>
                                    <option value="Sq-yrd">Sq-yrd</option>
                                    <option value="Sq-m">Sq-m</option>
                                    <option value="Acre">Acre</option>
                                    <option value="Bigha">Bigha</option>
                                    <option value="Hectare">Hectare</option>
                                    <option value="Marla">Marla</option>
                                    <option value="Chatak">Chatak</option>
                                    <option value="kottah">kottah</option>
                                </select>
                            </div>
                            
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <label>Land Facing</label>
                                <select id="LandFacing" name="LandFacing"  value="">
                                    <option hidden value="">--Select--</option>
                                    <option disabled >Select one </option>
                                    <option value="Normal">South</option>
                                    <option value="Agriculture">North</option>
                                    <option value="Industrial">East</option>
                                    <option value="Industrial">West</option>
                                </select>
                            </div>
                            
                            <div class="col-md-3 col-sm-3 col-xs-6">
                                <label>Land Road Wide</label>
                                <input type="text" name="LandRoadWide" id="LandRoadWide" onkeypress="return event.charCode >= 48" min="0" >
                            </div>
                            
                            <div class="col-md-3 col-sm-3 col-xs-6">
                                <label>Unit</label>
                                <select id="LandRoadWideUnit" name="LandRoadWideUnit" >
                                    <option hidden value="">Unit</option>
                                    <option disabled >Select one </option>
                                    <option value="Sqft">FT</option>
                                    <option value="Sq-m">MT</option>
                                </select>
                            </div>
                            
                            <div class="col-md-3 col-sm-6 col-xs-6">
                                <label>Super Buildup Area</label>
                                <input type="number" min=0 name="SuperBuildupArea" id="SuperBuildupArea" onblur="checkValue(this)" onkeypress="return event.charCode >= 48" min="0" />
                            </div>

                            <div class="col-md-3 col-sm-6 col-xs-6">
                                <label>Unit</label>
                                <select name="SuperBuildupAreaUnit" id="SuperBuildupAreaUnit" onblur="checkValue(this)" >
                                    <option hidden value="">Unit</option>
                                    <option disabled >Select one </option>
                                    <option value="Sq-ft">Sq-ft</option>
                                    <option value="Sq-yrd">Sq-yrd</option>
                                    <option value="Sq-m">Sq-m</option>
                                    <option value="Acre">Acre</option>
                                    <option value="Bigha">Bigha</option>
                                    <option value="Hectare">Hectare</option>
                                    <option value="Marla">Marla</option>
                                    <option value="Chatak">Chatak</option>
                                    <option value="kottah">kottah</option>
                                </select>
                            </div>
                            
                            <div class="col-md-3 col-sm-6 col-xs-6">
                                <label>Covered Area</label>
                                <input type="number" min=0 name="CoveredArea" id="CoveredArea" onblur="checkValue(this)" onkeypress="return event.charCode >= 48" min="0" />
                            </div>

                            <div class="col-md-3 col-sm-6 col-xs-6">
                                <label>Unit</label>
                                <select name="CoveredAreaUnit" id="CoveredAreaUnit" onblur="checkValue(this)" >
                                    <option hidden value="">Unit</option>
                                    <option disabled >Select one </option>
                                    <option value="Sq-ft">Sq-ft</option>
                                    <option value="Sq-yrd">Sq-yrd</option>
                                    <option value="Sq-m">Sq-m</option>
                                    <option value="Acre">Acre</option>
                                    <option value="Bigha">Bigha</option>
                                    <option value="Hectare">Hectare</option>
                                    <option value="Marla">Marla</option>
                                    <option value="Chatak">Chatak</option>
                                    <option value="kottah">kottah</option>
                                </select>
                            </div>
                            
                            
                            <div class="col-md-3 col-sm-3 col-xs-12">
                                <label>Land Status</label>
                                <select id="LandStatus" name="LandStatus">
                                    <option hidden value="">--Select--</option>
                                    <option disabled >Select one </option>
                                    <option value="Vacant">Vacant</option>
                                    <option value="Occupied">Occupied</option>
                                </select>
                            </div>
                            
                            <div class="col-md-3 col-sm-3 col-xs-12">
                                <label>Nature Of Land</label>
                                <select id="NatureofLand" name="NatureofLand">
                                    <option hidden value="">--Select--</option>
                                    <option disabled >Select one </option>
                                    <option value="Normal"  >Normal</option>
                                    <option value="Agriculture" >Agriculture</option>
                                    <option value="Industrial" >Industrial</option>
                                </select>
                            </div>
                            
                            <div class="col-md-3 col-sm-3 col-xs-12">
                                <label>Property Tax</label>
                                <select id="PropertyTax" name="PropertyTax">
                                    <option hidden value="">--Select--</option>
                                    <option disabled >Select one </option>
                                    <option value="Paid" >Paid</option>
                                    <option value="Due" >Due</option>
                                </select>
                            </div>
                            
                            <div class="col-md-3 col-sm-3 col-xs-12">
                                <label>Mutation</label>
                                <select id="Mutation" name="Mutation">
                                    <option hidden value="">--Select--</option>
                                    <option disabled >Select one </option>
                                    <option value="Done" >Done</option>
                                    <option value="NotDone" >Not Done</option>
                                </select>
                            </div>
                            
                            
                            <div class="col-md-12 col-sm-12 col-xs-12 pt-10 pb-10">
                                <label style="color:#444;">Parking Info</label>
                            </div>
                            
                            <div class="col-md-3 col-sm-3 col-xs-6">
                                <label>Open Parking</label>
                                <select id="OpenParking" name="OpenParking">
                                    <option hidden value="">--Select--</option>
                                    <option disabled >Select one </option>
                                    <?php for($i = 1; $i<=100; $i++){ ?>
                                    <option value="<?php echo $i; ?>" ><?php echo $i; ?></option>
                                    <?php } ?>
                                </select>
                                <!----- Replace to select input -------
                                <input type="number" min=0 name="OpenParking" id="OpenParking" />
                                -------------------------------------->
                            </div>
    
                            <div class="col-md-3 col-sm-3 col-xs-6">
                                <label>Covered Parking</label>
                                <select id="CoveredParking" name="CoveredParking">
                                    <option hidden value="">--Select--</option>
                                    <option disabled >Select one </option>
                                    <?php for($i = 1; $i<=100; $i++){ ?>
                                    <option value="<?php echo $i; ?>" ><?php echo $i; ?></option>
                                    <?php } ?>
                                </select>
                                <!----- Replace to select input -------
                                <input type="number" min=0 name="CoveredParking" id="CoveredParking" />
                                -------------------------------------->
                            </div>
    
                            <div class="col-md-3 col-sm-3 col-xs-6">
                                <label>Basement Parking</label>
                                <select id="Basement" name="Basement">
                                    <option hidden value="">--Select--</option>
                                    <option disabled >Select one </option>
                                    <?php for($i = 1; $i<=100; $i++){ ?>
                                    <option value="<?php echo $i; ?>" ><?php echo $i; ?></option>
                                    <?php } ?>
                                </select>
                                    
                                <!----- Replace to select input -------
                                <input type="number" min=0 name="Basement"  id="Basement"/>
                                -------------------------------------->
                            </div>
    
                            <div class="col-md-3 col-sm-3 col-xs-6">
                                <label>Lift Parking</label>
                                <select id="LiftParking" name="LiftParking">
                                    <option hidden value="">--Select--</option>
                                    <option disabled >Select one </option>
                                    <?php for($i = 1; $i<=100; $i++){ ?>
                                    <option value="<?php echo $i; ?>" ><?php echo $i; ?></option>
                                    <?php } ?>
                                </select>
                                
                                <!----- Replace to select input -------
                                <input type="number" min=0 name="LiftParking" id="LiftParking" />
                                -------------------------------------->
                            </div>
                                
                            <div class="col-md-3 col-sm-3 col-xs-12">
                                <label>Two Wheeler</label>
                                <select id="TwoWheeler" name="TwoWheeler">
                                    <option hidden value="">--Select--</option>
                                    <option disabled >Select one </option>
                                    <?php for($i = 1; $i<=100; $i++){ ?>
                                    <option value="<?php echo $i; ?>" ><?php echo $i; ?></option>
                                    <?php } ?>
                                </select>
                                
                                <!----- Replace to select input -------
                                <input type="number" min=0 name="TwoWheeler" id="TwoWheeler" />
                                -------------------------------------->
                            </div>

                        </div>
                        <div class="modal-footer">
                            <input type="submit" name="save" value="Save" id="buyer-submit-btn" />
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
    
    
    <div class="modal fade" id="buyerNotInterestedPopup" role="dialog">
        <div class="modal-dialog  modal-lg">

            <div class="modal-content">
                <div class="modal-header" style="background:linear-gradient(to right,#03709e,#18c3fd 100%);">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title" style="color:white;font-weight:bold;font-size:20px;">Not Intesrested Buyer</h4>
                </div>
                <div class="modal-body">
                    <form method="POST" enctype="multipart/form-data" action="<?php echo base_url(); ?>property/save_buyer_not_interested">
                        <div class="row">
                            <input type="hidden" name="buyer_not_interested_post_id" value="0" id="buyer_not_interested_post_id" onblur="checkValue(this)"  />
                            <input type="hidden" name="redirect_url" value="<?php echo current_url(); ?>" id="redirect_url" onblur="checkValue(this)"  />
                             <div class="col-md-12 col-sm-6 col-xs-6">
                                <label>Reason</label><b style="color:red;">*</b>
                                <textarea name="reason" id="reason"></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <input type="submit" name="save" value="Save" />
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>


    <!-- Delete Buyer Lead Modal-->
    <div class="modal fade" id="deleteBuyer" role="dialog">
        <div class="modal-dialog  modal-sm">
            <div class="modal-content">
                <div class="modal-header" style="background:linear-gradient(to right,#03709e,#18c3fd 100%);">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title" style="color:white;font-weight:bold;font-size:20px;">Do you want to delete this record? </h4>
                </div>
                <form method="POST" action="<?php echo base_url(); ?>property/delete_buyer" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="row">
                            <input type="hidden" name="delete_buyer_post_id" id="delete_buyer_post_id" />
                            <input type="hidden" name="redirect_url" value="<?php echo current_url(); ?>" />
                			<input type="submit" name="Yes" value="Yes" class="btn btn-warning"/>
                            <input type="button" name="No" value="No" data-dismiss="modal" />
            			</div>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>

<script>
	function add()
	{
		$("#buyer-submit-btn").css('display','block');
		$("#post_id").val(0);
		$("#lead_id").val('');
        $("#name").val('');
        $("#mobile").val('');
        $("#mobile2").val('');
        $("#phone").val('');
        $("#flat_email").val('');
        $("#city").val('');
        $("#state").val('');
        $("#location").val('');
        $("#MinimumRent").val('');
        $("#MaximumRent").val('');
        $("#FurnishedStatus").val('');
        $("#ComplexSoceityBuilding").val('');
        $("#section").val('');
        $("#ReadyToMove").prop('checked', true);
        $("#PossessionFrom").prop('checked', false);
        $("#PossessionDate").val('');
        $("#balcony").val('');
        $("#kitchen").val('');
        $("#totalfloor").val('');
        $("#OpenParking").val('');
        $("#CoveredParking").val('');
        $("#Basement").val('');
        $("#LiftParking").val('');
        $("#TwoWheeler").val('');
        
        $("#LandMinimumAreaRequired").val('');
        $("#LandSuperBuildupAreaUnit").val('');
        $("#LandMaximumAreaRequired").val('');
        $("#MaximumAreaRequiredUnit").val('');
        $("#SuperBuildupArea").val('');
        $("#SuperBuildupAreaUnit").val('');
        $("#CoveredArea").val('');
        $("#CoveredAreaUnit").val('');
        $("#LandFacing").val('');
        $("#LandRoadWide").val('');
        $("#LandRoadWideUnit").val('');
        $("#LandStatus").val('');
        $("#NatureofLand").val('');
        $("#PropertyTax").val('');
        $("#Mutation").val('');
        
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
        
		$("#myModal").modal();
	}
</script>  
            

<script>
    function edit_buyer(post_id, mode)
    {
        $.ajax
        ({
            type: "POST",
            url: "<?php echo base_url(); ?>property/get_requirement_details_by_id",
            data: {post_id:post_id},
            dataType: 'json',
            success: function(data)
            {
                $("#post_id").val(data['post_id']);
                $("#name").val(data['name']);
                $("#mobile").val(data['mobile']);
                $("#mobile2").val(data['mobile2']);
                $("#phone").val(data['phone']);
                $("#land_email").val(data['email']);
                $("#city").val(data['city']);
                $("#state").val(data['state']);
                $("#location").val(data['location']);
                $("#rent_sell").val(data['rent_sell']);
                $("#MinimumRent").val(data['MinimumRent']);
                $("#MaximumRent").val(data['MaximumRent']);
                $("#FurnishedStatus").val(data['FurnishedStatus']);
                $("#ComplexSoceityBuilding").val(data['ComplexSoceityBuilding']);
                $("#section").val(data['section']);
                $("#PossessionDate").val(data['PossessionDate']);
                $("#OpenParking").val(data['OpenParking']);
                $("#CoveredParking").val(data['CoveredParking']);
                $("#Basement").val(data['Basement']);
                $("#LiftParking").val(data['LiftParking']);
                $("#TwoWheeler").val(data['TwoWheeler']);
                
                $("#LandMinimumAreaRequired").val(data['LandMinimumAreaRequired']);
                $("#LandSuperBuildupAreaUnit").val(data['LandSuperBuildupAreaUnit']);
                $("#LandMaximumAreaRequired").val(data['LandMaximumAreaRequired']);
                $("#MaximumAreaRequiredUnit").val(data['MaximumAreaRequiredUnit']);
                $("#SuperBuildupArea").val(data['SuperBuildupArea']);
                $("#SuperBuildupAreaUnit").val(data['SuperBuildupAreaUnit']);
                $("#CoveredArea").val(data['CoveredArea']);
                $("#CoveredAreaUnit").val(data['CoveredAreaUnit']);
                $("#LandFacing").val(data['LandFacing']);
                $("#LandRoadWide").val(data['LandRoadWide']);
                $("#LandRoadWideUnit").val(data['LandRoadWideUnit']);
                $("#LandStatus").val(data['LandStatus']);
                $("#NatureofLand").val(data['NatureofLand']);
                $("#PropertyTax").val(data['PropertyTax']);
                $("#Mutation").val(data['Mutation']);
                
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
                if(mode == 'view'){
                    $("#buyer-submit-btn").css('display','none');
                }else{
                    $("#buyer-submit-btn").css('display','block');
                }
                
                $("#myModal").modal();
            }

        });	
    }
    
    function delete_buyer(post_id){
        $('#delete_buyer_post_id').val(post_id);
        $('#deleteBuyer').modal();
    }
    
    function buyer_not_interested(post_id)
    {
        $("#buyer_not_interested_post_id").val(post_id);
        $("#buyerNotInterestedPopup").modal();
    }
</script>









