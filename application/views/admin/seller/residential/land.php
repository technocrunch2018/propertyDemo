
<script>
    function checkAvailability() {
        $("#loaderIcon").show();
        jQuery.ajax({
            url: "category_ajax.php",
            data:'couponcode='+$("#transactionid").val(),
            type: "POST",
            success:function(data){
                $("#user-availability-status").html(data);
                $("#loaderIcon").hide();
            },
            error:function (){}
        });
    }
</script>

<script>
    function isNumberKey(evt){
        var charCode = (evt.which) ? evt.which : evt.keyCode;
        if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;
        return true;
    }
</script>


<?php 
    if($rent_sell == 'Rent'){
        $current_page = 'seller_residential_rent_land';
    }else{
        $current_page = 'seller_residential_sale_land';
    }
?>

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
                        <form method = "POST" action = "<?php echo base_url('Excel_uploads/saller_res_rent_land');?>" enctype = "multipart/form-data">
                            <?php }else{?>
                            <form method = "POST" action = "<?php echo base_url('Excel_uploads/saller_res_sale_land');?>" enctype = "multipart/form-data">
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
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-6">
                        <?php if($rent_sell == 'Rent'){ ?>
                        <a class="outln-hvr" href = "<?php echo base_url('Uploads/excels/Flat/Saller_res_rent_land.xlsx');?>">Download Demo File</a>
                        <?php }else{?>
                        <a class="outln-hvr" href = "<?php echo base_url('Uploads/excels/Flat/Saller_res_sale_land.xlsx');?>">Download Demo File</a>
                        <?php }?>
                        
                    </div>
                </div>
                <?php } ?>
                
                
                
                <div class="x_title">
                    <div class="col-md-3 col-sm-6 col-xs-12 xs-pb-10"><h2><h2>Land List</h2></h2></div>
                    <?php if($rent_sell == 'Sell'){ ?>
                    <a href = "<?php echo base_url('property/seller_residential_sale_land_not_int');?>"><button type="button" class="effect effect-5 blue pull-right">Not Intrested</button></a>
                    <?php }else{ ?>
                    <a href = "<?php echo base_url('property/seller_residential_rent_land_not_int');?>"><button type="button" class="effect effect-5 blue pull-right">Not Intrested</button></a>
                    <?php } ?>
                    <button type="button" class="effect effect-5 red pull-right" onclick="add()">ADD NEW</button>
                    <button type="button" class="effect effect-5 blue pull-right" onclick="send_link_popup('post_property')">Send Link</button>

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
                                <td>Location</td>
                                <td>Complex/Building Name</td>
                                <td>Land Size</td>
                                <th>Amenities</th>
                                <th>Description</th>
                                <th>Contact Details</th>
                                <th>Image</th>
                                <th>Video</th>
                                <th>status</th>
                                <th>Action</th>
                            </tr>

                        </thead>
                        <tbody>
                            <?php if(!empty($land_list)){ ?>
                            <?php foreach($land_list as $i=>$row){ ?>
                            <tr>
                                <td><?php echo $i+1;?></td>
                                <td><?php echo $row->created;?></td>
                                <td><a href="javascript:void(0);" onclick="edit_seller(<?php echo $row->post_id; ?>, 'view');"><?php echo $row->lead_id;?></a></td>
                                <td><?php echo $row->user_type;?></td>
                                <td><?php echo $row->state;?></td>
                                <td><?php echo $row->city;?></td>
                                <td><?php echo $row->location;?></td>
                                <td><?php echo $row->complex_society_building;?></td>
                                <td><?php echo $row->LandArea.' '.$row->land_SuperBuildupArea_Unit;?></td>
                                <td>
                                    <div class="container">
                                        <!--<button type="button" style="background-color:#212121" class="btn btn-info btn-lg" data-toggle="modal" data-target="#amenities_<?php echo $i; ?>"><i class="fa fa-eye" aria-hidden="true"></i>
                                        </button>-->
                                        <a data-toggle="modal" data-target="#amenities_<?php echo $i; ?>"><span title="Amenities" class="label label-info">Amenities</span></a>

                                        <div class="modal fade" id="amenities_<?php echo $i;?>" role="dialog">
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
                                                                    <?php if(@$row->amenities->PowerBackup == 1){ ?>
                                                                    <div class="col-sm-3">
                                                                        Power Backup
                                                                    </div>
                                                                    <?php } ?>
                                                                    <?php if(@$row->amenities->Intercom == 1){ ?>
                                                                    <div class="col-sm-3">
                                                                        Intercom
                                                                    </div>
                                                                    <?php } ?>
                                                                    <?php if(@$row->amenities->Security == 1){ ?>
                                                                    <div class="col-sm-3">
                                                                        Security
                                                                    </div>
                                                                    <?php } ?>
                                                                    <?php if(@$row->amenities->SwimmingPool == 1){ ?>
                                                                    <div class="col-sm-3">
                                                                        Swimming Pool
                                                                    </div>
                                                                    <?php } ?>
                                                                    <?php if(@$row->amenities->CommunityHall == 1){ ?>
                                                                    <div class="col-sm-3">
                                                                        Community Hall
                                                                    </div>
                                                                    <?php } ?>
                                                                    <?php if(@$row->amenities->GYM == 1){ ?>
                                                                    <div class="col-sm-3">
                                                                        GYM
                                                                    </div>
                                                                    <?php } ?>
                                                                    <?php if(@$row->amenities->CloubHouse == 1){ ?>
                                                                    <div class="col-sm-3">
                                                                        Club House
                                                                    </div>
                                                                    <?php } ?>
                                                                    <?php if(@$row->amenities->IndoorGame == 1){ ?>
                                                                    <div class="col-sm-3">
                                                                        Indoor Game
                                                                    </div>
                                                                    <?php } ?>
                                                                    <?php if(@$row->amenities->OutDoorGame == 1){ ?>
                                                                    <div class="col-sm-3">
                                                                        Outdoor Game
                                                                    </div>
                                                                    <?php } ?>
                                                                    <?php if(@$row->amenities->Park == 1){ ?>
                                                                    <div class="col-sm-3">
                                                                        Park
                                                                    </div>
                                                                    <?php } ?>
                                                                    <?php if(@$row->amenities->VisitorParking == 1){ ?>
                                                                    <div class="col-sm-3">
                                                                        Visitor Parking
                                                                    </div>
                                                                    <?php } ?>
                                                                    <?php if(@$row->amenities->GasPipeLine == 1){ ?>
                                                                    <div class="col-sm-3">
                                                                        Gas Pipeline
                                                                    </div>
                                                                    <?php } ?>
                                                                    <?php if(@$row->amenities->SarvantRoom == 1){ ?>
                                                                    <div class="col-sm-3">
                                                                        Servant Room
                                                                    </div>
                                                                    <?php } ?>
                                                                </div>
                                                            </div>
                                                        </p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="effect effect-5 red" data-dismiss="modal">Close</button>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                    </div>
                                </td>
                                <td><div class="container">
                                    <!--<button type="button" style="background-color:#212121" class="btn btn-info btn-lg" data-toggle="modal" data-target="#details_<?php echo $i;?>"><i class="fa fa-eye" aria-hidden="true"></i>
                                    </button>-->
                                    <a data-toggle="modal" data-target="#details_<?php echo $i; ?>"><span title="Description" class="label label-info">Description</span></a>

                                    <div class="modal fade" id="details_<?php echo $i;?>" role="dialog">
                                        <div class="modal-dialog">

                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    <h4 class="modal-title">Details</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <p><?php if($row->res_com == 'Residential'){ echo $row->amenities->comment1; }else{ echo $row->amenities->comment; }?></p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="effect effect-5 red" data-dismiss="modal">Close</button>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                </div></td>
                                <td><div class="container">
                                    <!--<button type="button" style="background-color:#212121" class="btn btn-info btn-lg" data-toggle="modal" data-target="#contact_<?php echo $i; ?>"><i class="fa fa-eye" aria-hidden="true"></i>
                                    </button>-->
                                    <a data-toggle="modal" data-target="#contact_<?php echo $i; ?>"><span title="Contact" class="label label-info">Contact Details</span></a>

                                    <div class="modal fade" id="contact_<?php echo $i; ?>" role="dialog">
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
                                                                <td><?php echo $row->name;?></td>
                                                                <td><?php echo $row->mobile;?></td>
                                                                <td><?php echo $row->email;?></td>
                                                                <td><?php echo $row->address;?></td>
                                                                <td><?php echo $row->pincode;?></td>
                                                            </tr>
                                                        </table>

                                                    </p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="effect effect-5 red" data-dismiss="modal">Close</button>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                </div></td>
                                <td><div class="container">
                                    <!--<button type="button" style="background-color:#212121" class="btn btn-info btn-lg" data-toggle="modal" data-target="#image_<?php echo $i;?>"><i class="fa fa-eye" aria-hidden="true"></i>
                                    </button>-->
                                    <a data-toggle="modal" data-target="#image_<?php echo $i; ?>"><span title="Image" class="label label-info">Image</span></a>

                                    <div class="modal fade" id="image_<?php echo $i;?>" role="dialog">
                                        <div class="modal-dialog">

                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    <h4 class="modal-title">Image</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <p><img style="width:200px;height:200px" src="<?php echo base_url(); ?><?php echo $row->image_name;?>"></p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="effect effect-5 red" data-dismiss="modal">Close</button>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                </div></td>   
                                <td><a target="blank" href="<?php echo base_url(); ?><?php echo $row->video_name;?>"><i style="color:red" class="fa fa-youtube-play" aria-hidden="true"></i></a></td>
                                <td><?php if($row->status == 0){echo '<span title="Pending" class="label label-warning">Pending</span>'; }elseif($row->status == 1){echo '<span title="Active" class="label label-success">Active</span>'; }elseif($row->status == 2){ echo '<span title="Rejected" class="label label-danger">Rejected</span>'; }else{ echo '<span title="Expired" class="label label-info">Expired</span>'; } ?></td>
                                <td>
                                    <a href="javascript:void(0);" onclick="edit_seller(<?php echo $row->post_id; ?>, 'edit');"><span title="Edit" class="label label-info">Edit</span></a>
                                    <?php if($this->session->userdata('user_type') != 'admin'){ ?>
                                    <a onclick="delete_seller(<?php echo $row->post_id;?>)" href="javascript:void(0);"><span title="Delete" class="label label-danger">Delete</span></a>
                                    <?php } ?>
                                     <?php if($row->status == 0 || $row->status == 2){?>
                                    <?php if(in_array($row->state,$inactive_state_list) || in_array($row->city,$inactive_city_list) || in_array($row->location,$inactive_location_list) || in_array($row->pincode,$inactive_pincode_list)){ ?>
                                    <a href="javascript:void(0);" data-toggle="modal" data-target="#new_property_modal_<?php echo $i; ?>"> <span title="New" class="label label-success">New</span></a>
                                    <?php }else{ ?>
                                    <a onclick="return confirm('Do You want to change status of this record?');" href="<?php echo base_url();?>property/approve_property/seller_residential_sale_flat/<?php echo $row->post_id;?>"> <span title="Approve" class="label label-success">Approve</span></a>
                                    <?php } ?>
                                    <?php }if($row->status == 0 || $row->status == 1){ ?>
                                    <a onclick="return confirm('Do You want to change status of this record?');" href="<?php echo base_url();?>property/reject_property/seller_residential_sale_flat/<?php echo $row->post_id;?>"> <span title="Reject" class="label label-warning">Reject</span></a>
                                    <?php } ?>
                                    <?php if($row->interested_flag == 1){ ?>
                                    <!-- <?php if($rent_sell == 'Rent'){ ?>
                                    <a href="javascript:void(0);" onclick="seller_interested_popup(<?php echo $row->post_id; ?>)"><span title="Interested" class="label label-primary">Interested</span></a>
                                    <?php }else{ ?>
                                    <a href="javascript:void(0);" onclick="seller_interested_popup(<?php echo $row->post_id; ?>)"><span title="Interested" class="label label-primary">Interested</span></a>
                                    <?php } ?> -->
                                    <a onclick="seller_not_interested(<?php echo $row->post_id; ?>);"> <span title="Not Interested" class="label label-default">Not Interested</span></a>
                                    <?php } ?>
                                    <?php if($row->in_process_flag==1 && $this->session->userdata('admin_id') == 1){ ?>
                                    <a onclick="cancel_deal(<?php echo $row->post_id;?>);" href="javascript:void(0);" title="Cancel all deals"><span title="Cancel all deals" class="label label-primary">Cancel Deals</span></a>
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





<div class="container">
    <!-- Trigger the modal with a button -->


    <!-- Modal -->
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog  modal-lg">

            <div class="modal-content">
                <div class="modal-header" style="background:linear-gradient(to right,#03709e,#18c3fd 100%);">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title" style="color:white;font-weight:bold;font-size:20px;">Add Land For Sale</h4>
                </div>
                <div class="modal-body">
                    <form name="residential_land_form" id="residential_land_form" method="POST" enctype="multipart/form-data" action="<?php echo base_url(); ?>property/save_seller">
                        <div class="row">
                            <input type="hidden" name="added_by" value="<?php echo $this->session->userdata('user_type'); ?>" id="added_by"  onblur="checkValue(this)"  />
                            <input type="hidden" name="post_id" value="0" id="post_id"  onblur="checkValue(this)"  />
                            <input type="hidden" name="residential" value="Land" id="residential"  onblur="checkValue(this)"  />
                            <input type="hidden" name="rent_sell" value="<?php echo $rent_sell; ?>" id="rent_sell"  onblur="checkValue(this)"  />
                            <input type="hidden" name="res_com" value="Residential" id="res_com"  onblur="checkValue(this)"  />
                            
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <label>Name</label><b style="color:red;">*</b>
                                <input type="text" name="name" id="name" onblur="checkValue(this)" style="text-transform: uppercase;" required />
                            </div>
                            
                            <div class="col-md-3 col-sm-3 col-xs-6">
                                <label>Mobile</label><b style="color:red;">*</b>
                                <input type="number" size=20 maxlength=10 name="mobile" id="mobile" onkeypress="return event.charCode >= 48" min="0" onKeyPress="if(this.value.length==10) return false;"   />
                            </div>

                            <div class="col-md-3 col-sm-3 col-xs-6">
                                <label>Alt. Mobile</label>
                                <input type="number" size=20 maxlength=15 name="mobile1" id="mobile1" onkeypress="return event.charCode >= 48" min="0" onKeyPress="if(this.value.length==15) return false;"/>
                            </div>


                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <label>Phone</label>
                                <input type="number" size=20 maxlength=15 name="phone" id="phone" onkeypress="return event.charCode >= 48" min="0" onKeyPress="if(this.value.length==15) return false;">
                            </div>


                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <label>E-mail</label>
                                <input type="text" name="email" id="land_email"  onblur="checkValue(this)" style="text-transform: lowercase;" />
                            </div>


                            <div class="col-md-3 col-sm-3 col-xs-6">
                                <label>State</label><b style="color:red;">*</b>
                                <select id="state" name="state" onchange="get_city_list_by_state_name(this.value);" >
                                    <option hidden value="">--Select--</option>
                                    <option disabled >Select one </option>
                                    <?php if(!empty($state_list)){ ?>
                                    <?php foreach($state_list as $state){ ?>
                                    <option value="<?php echo $state->name;?>"><?php echo $state->name;?></option>
                                    <?php } ?>
                                    <?php } ?>
                                </select>
                            </div>

                            <div class="col-md-3 col-sm-3 col-xs-6">
                                <label>City</label><b style="color:red;">*</b>
                                <select id="city" name="city" onchange="get_pincode_list_by_city_name(this.value)">
                                    <option hidden value="">--Select--</option>
                                    <option disabled >Select one </option>
                                    
                                </select>
                            </div>
                            
                            <div class="col-md-3 col-sm-3 col-xs-12">
                                <label>Pincode</label><b style="color:red;">*</b>
                                <select name="pincode" id="pincode" onchange="get_location_list_by_pincode_code(this.value)">
                                    <option value="" hidden>Pincode</option>
                                </select>
                            </div>

                            <div class="col-md-3 col-sm-3 col-xs-12">
                                <label>Location</label><b style="color:red;">*</b>
                                <select id="location" name="location" >
                                    <option hidden value="">--Select--</option>
                                    <option disabled >Select one </option>
                                    <?php if(!empty($location_list)){ ?>
                                    <?php foreach($location_list as $location){ ?>
                                    <option value="<?php echo $location->name;?>"><?php echo $location->name;?></option>
                                    <?php } ?>
                                    <?php } ?>
                                </select>
                            </div>
                            
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <label>Complex / Society Building Name</label><b style="color:red;">*</b>
                                <input type="text" name="complex_society_building" id="complex_society_building" onblur="checkValue(this)" style="text-transform: uppercase;" />
                            </div>
                            
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <label>Property Address</label>
                                <input type="text" name="address" id="address" onblur="checkValue(this)" style="text-transform: uppercase;" />
                            </div>

                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <label>Land Mark</label>
                                <input type="text" name="landmark" id="landmark" onblur="checkValue(this)" style="text-transform: uppercase;" />
                            </div>

                            
                            <div class="col-md-3 col-sm-3 col-xs-6">
                                <label>Block No</label><b style="color:red;">*</b>
                                <input type="text" name="blockno" id="blockno" onblur="checkValue(this)" style="text-transform: uppercase;"  />
                            </div>
                            
                            <div class="col-md-3 col-sm-3 col-xs-6">
                                <label>Plot No</label><b style="color:red;">*</b>
                                <input type="text" name="flatno" id="flatno" onblur="checkValue(this)" style="text-transform: uppercase;"  />
                            </div>
                            
                            <!--------
                             <div class="col-md-6 col-sm-6 col-xs-12">
                                <label>Furnished Status</label><b style="color:red;">*</b>
                                <select name="FurnishedStatus" id="FurnishedStatus">
                                    <option hidden value="">--Select--</option>
                                    <option disabled >Select one </option>
                                    <option value="Furnished">Furnished</option>
                                    <option value="Unfurnished">Unfurnished</option>
                                    <option value="Semi Furnished">Semi Furnished</option>
                                </select>		  
                            </div>
                            --------->
                            
                            <?php if($rent_sell == 'Rent'){ ?>
                                <div class="col-md-3 col-sm-3 col-xs-6">
                                    <label>Security Deposite</label>
                                    <input type="number" name="security_deposite" id="security_deposite" multiple  onblur="checkValue(this)" onkeypress="return event.charCode >= 48" min="0"  />
                                </div>
                                
                                <div class="col-md-3 col-sm-3 col-xs-6">
                                    <label>Rent Per Month</label><b style="color:red;">*</b>
                                    <input type="number" name="rentPerMonth" id="rentPerMonth" multiple  onblur="checkValue(this)" onkeypress="return event.charCode >= 48" min="0"  />
                                </div>
                            <?php }elseif($rent_sell == 'Sell'){ ?>
                                <div class="col-md-3 col-sm-3 col-xs-6">
                                    <label>Net Sale Amount</label><b style="color:red;">*</b>
                                    <input type="number" name="net_amount" id="net_amount" multiple  onblur="checkValue(this)" onkeypress="return event.charCode >= 48" min="0"  />
                                </div>
                                
                                <div class="col-md-3 col-sm-3 col-xs-6">
                                    <label>Booking Amount</label>
                                    <input type="number" name="amount" id="amount" multiple  onblur="checkValue(this)" onkeypress="return event.charCode >= 48" min="0"  />
                                </div>
                                
                                <!---------
                                <div class="col-md-2 col-sm-6 col-xs-6">
                                    <label>Per Unit</label><b style="color:red;">*</b>
                                    <input type="text" name="per_unit" id="per_unit" multiple  onblur="checkValue(this)"  />
                                </div>
                                ---------->
                            <?php } ?>
                            
                            <div class="col-md-3 col-sm-3 col-xs-6">
                                <label>Land Area</label>
                                <input  type="number" name="LandArea" id="LandArea" class="gui-input" value="" onkeypress="return event.charCode >= 48" min="0"  >	  
                            </div>
                            <div class="col-md-3 col-sm-3 col-xs-6">
                                <label>Unit</label>
                                <select id="land_SuperBuildupArea_Unit" name="land_SuperBuildupArea_Unit" >
                                    <option hidden value="" >Unit</option>
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
                            
                            <div class="col-md-3 col-sm-3 col-xs-6">
                                <label>Covered Area</label>
                                <input  type="number" name="landCoveredArea" id="landCoveredArea" class="gui-input" value="" onkeypress="return event.charCode >= 48" min="0" >
                            </div>
                                
                                
                            <div class="col-md-3 col-sm-3 col-xs-6">
                                <label>Unit</label>
                                <select id="landCoveredAreaUnit" name="landCoveredAreaUnit" >
                                    <option hidden value="" >Unit</option>
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
                            
                            <div class="col-md-3 col-sm-3 col-xs-6">
                                <label>Road Wide Area</label>
                                <input  type="number" name="LandRoadWide" id="LandRoadWide" class="gui-input" value="" onkeypress="return event.charCode >= 48" min="0" >
                            </div>
                            
                            
                            <div class="col-md-3 col-sm-3 col-xs-6">
                                <label>Unit</label>
                                <select id="LandRoadWideUnit" name="LandRoadWideUnit" >
                                    <option hidden value="" >Unit</option>
                                    <option disabled >Select one </option>
                                    <option value="FT" >FT</option>
                                    <option value="Mt" >MT</option>
                                    <!--------
                                    <option value="Sqft" <?php if(!empty($flat_details)){ if($flat_details->flat_Carpet_Unit == 'Sqft'){ echo 'selected'; } } ?> >Sqft</option>
                                    <option value="Sq-m" <?php if(!empty($flat_details)){ if($flat_details->flat_Carpet_Unit == 'Sq-m'){ echo 'selected'; } } ?> >Sq-m</option>
                                    <option value="Acre" <?php if(!empty($flat_details)){ if($flat_details->flat_Carpet_Unit == 'Acre'){ echo 'selected'; } } ?> >Acre</option>
                                    <option value="Bigha" <?php if(!empty($flat_details)){ if($flat_details->flat_Carpet_Unit == 'Bigha'){ echo 'selected'; } } ?> >Bigha</option>
                                    <option value="Hectare" <?php if(!empty($flat_details)){ if($flat_details->flat_Carpet_Unit == 'Hectare'){ echo 'selected'; } } ?> >Hectare</option>
                                    <option value="Marla" <?php if(!empty($flat_details)){ if($flat_details->flat_Carpet_Unit == 'Marla'){ echo 'selected'; } } ?> >Marla</option>
                                    <option value="Chatak" <?php if(!empty($flat_details)){ if($flat_details->flat_Carpet_Unit == 'Chatak'){ echo 'selected'; } } ?> >Chatak</option>
                                    <option value="Kottah" <?php if(!empty($flat_details)){ if($flat_details->flat_Carpet_Unit == 'Kottah'){ echo 'selected'; } } ?> >Kottah</option>
                                    --------->
                                </select>
                            </div>
                            
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <label>Land Status</label>
                                <select id="LandStatus" name="LandStatus" >
                                    <option hidden value="">--Select--</option>
                                    <option disabled >Select one </option>
                                    <option hidden >Land Status</option>
                                    <option value="Vacant" <?php if(!empty($land_details)){ if($land_details->LandStatus == 'Vacant'){ echo 'selected'; } } ?>>Vacant</option>
                                    <option value="Occupied" <?php if(!empty($land_details)){ if($land_details->LandStatus == 'Occupied'){ echo 'selected'; } } ?> >Occupied</option>
                                </select>
                            </div>
                            
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <label>Existing Owner</label>
                                    <select id="IstheExistingOwner" name="IstheExistingOwner" >
                                    <option hidden value="">--Select--</option>
                                    <option disabled >Select one </option>
                                    <option hidden >Is the Existing Owner</option>
                                    <option value="Alive" <?php if(!empty($land_details)){ if($land_details->IstheExistingOwner == 'Alive'){ echo 'selected'; } } ?> >Alive</option>
                                    <option value="Deceased" <?php if(!empty($land_details)){ if($land_details->IstheExistingOwner == 'Deceased'){ echo 'selected'; } } ?> >Deceased</option>
                                </select>
                            </div>
                            
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <label>Land Nature</label>
                                <select id="NatureofLand" name="NatureofLand" >
                                    <option hidden value="">--Select--</option>
                                    <option disabled >Select one </option>
                                    <option hidden >Nature Of Land</option>
                                    <option value="Normal" <?php if(!empty($land_details)){ if($land_details->NatureofLand == 'Normal'){ echo 'selected'; } } ?> >Normal</option>
                                    <option value="Agriculture" <?php if(!empty($land_details)){ if($land_details->NatureofLand == 'Agriculture'){ echo 'selected'; } } ?> >Agriculture</option>
                                    <option value="Industrial" <?php if(!empty($land_details)){ if($land_details->NatureofLand == 'Industrial'){ echo 'selected'; } } ?> >Industrial</option>
                                </select>
                            </div>
                            
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <label>No of Owner</label>
                                 <select id="NoOfOwner" name="NoOfOwner" >
                                    <option hidden value="">--Select--</option>
                                    <option disabled >Select one </option>
                                    <option hidden >No Of Owner</option>
                                    <?php for($i = 1; $i<=100; $i++){ ?>
                                    <option value="<?php echo $i; ?>" <?php if(!empty($land_details)){ if($land_details->NoOfOwner == $i){ echo 'selected'; } } ?>><?php echo $i; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <label>Property Tax</label>
                                <select id="PropertyTax" name="PropertyTax" >
                                    <option hidden value="">--Select--</option>
                                    <option disabled >Select one </option>
                                    <option hidden >Property Tax</option>
                                    <option value="Paid"  <?php if(!empty($land_details)){ if($land_details->PropertyTax == 'Paid'){ echo 'selected'; } } ?>  >Paid</option>
                                    <option value="Due"  <?php if(!empty($land_details)){ if($land_details->PropertyTax == 'Due'){ echo 'selected'; } } ?>  >Due</option>
                                </select>
                            </div>
                            
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <label>Mutation</label>
                                 <select id="Mutation" name="Mutation"  >
                                    <option hidden value="">--Select--</option>
                                    <option disabled >Select one </option>
                                    <option hidden >Mutation</option>
                                    <option value="Done" <?php if(!empty($land_details)){ if($land_details->Mutation == 'Done'){ echo 'selected'; } } ?> >Done</option>
                                    <option value="NotDone" <?php if(!empty($land_details)){ if($land_details->Mutation == 'NotDone'){ echo 'selected'; } } ?> >Not Done</option>
                                </select>
                            </div>
                            
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <label>Land Facing</label>
                                <select id="LandFacing" name="LandFacing" >
                                    <option hidden value="">--Select--</option>
                                    <option disabled >Select one </option>
                                    <option hidden >Land Facing</option>
                                    <option value="Normal" <?php if(!empty($land_details)){ if($land_details->PropertyTax == 'Normal'){ echo 'selected'; } } ?> >South</option>
                                    <option value="Agriculture" <?php if(!empty($land_details)){ if($land_details->PropertyTax == 'Agriculture'){ echo 'selected'; } } ?> >North</option>
                                    <option value="Industrial" <?php if(!empty($land_details)){ if($land_details->PropertyTax == 'Industrial'){ echo 'selected'; } } ?> >West</option>
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
                            
                            <div class="col-md-3 col-sm-3 col-xs-6">
                                <label>Age Of Properties</label>
                                <select name="AgeofPropeety" id="AgeofPropeety">
                                    <option hidden value="">--Select--</option>
                                    <option disabled >Select one </option>
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
                            
                            <div class="col-md-6 col-sm-6 col-xs-6">
                                <label>Status of Property </label>
                                <select id="PropertyType" name="PropertyType" >
                                    <option hidden value="">--Select--</option>
                                    <option disabled >Select one </option>
                                    <option value="Freehold" <?php if(!empty($project)){ if($project->PropertyType == 'Freehold'){ echo 'selected'; } } ?>>Freehold</option>
                                    <option value="Lease" <?php if(!empty($project)){ if($project->PropertyType == 'Lease'){ echo 'selected'; } } ?> >Lease</option>
                                    <option value="Power of attorney" <?php if(!empty($project)){ if($project->PropertyType == 'Power of attorney'){ echo 'selected'; } } ?> >Power of attorney</option>
                                    <option value="Unregistered" <?php if(!empty($project)){ if($project->PropertyType == 'Unregistered'){ echo 'selected'; } } ?>>Unregistered</option>
                                </select>
                            </div>
                            
                        <div class="col-md-12 col-sm-12 col-xs-12 pt-10">
        			        <label style="color:#444;">Possession Info</label><b style="color:red;">*</b>
        			    </div>    
                            
                        <div class="col-md-12 col-sm-12 col-xs-12" style="padding:0;margin:0;">
        			    <div class="col-md-3 col-sm-3 col-xs-12 radiobtn">
        			        <input type="radio" id="ReadyToMove" value="ReadyToMove" name="section" checked/>
        			        <label for="ReadyToMove" >Ready To Move</label>
        			    </div>
        			    
        			    <div class="col-md-3 col-sm-3 col-xs-12 radiobtn">
        			        <input type="radio" id="PossessionFrom" value="PossessionFrom" name="section" />
        			        <label for="PossessionFrom" >Possession From</label>
        			    </div>
        			    
        			    <div class="col-md-6 col-sm-6 col-xs-12 xs-pt-10" id="PossessionDateDiv"  style="display:none;">
                            <input type="date" name="PossessionDate" id="PossessionDate"  placeholder="DD/MM/YYYY" style="text-transform:uppercase;" />
        			    </div>
        			    </div>
                            
                            <!---------- If User Select Possessions from radio button then show to date user ----------
                            <div class="col-md-6 col-sm-6 col-xs-6">
                                <select name="section" id="section"  >
                                    <option hidden value="">--Select--</option>
                                    <option disabled >Select one </option>
                                    <option value="Ready To Move">Ready To Move</option>
                                    <option value="Possession From">Possession From</option>
                                </select>		  
                            </div>

                            <div class="col-md-6 col-sm-6 col-xs-6">
                                <input type="date" placeholder="DD/MM/YYYY" name="PossessionDate" id="PossessionDate" style="text-transform:uppercase;"  />
                            </div>
                            --------------------------------------------------->
                            
                            <!--<div class="col-md-2 col-sm-6 col-xs-6">
                                <label>Floor</label><b style="color:red;">*</b>
                                <select id="pent_floor" name="pent_floor" >
                                    <option hidden >Total Floor</option>
                                    <option disabled >Select one </option>
                                    <option value="G" <?php if(!empty($flat_details)){ if($flat_details->flat_TotalFloor == 'G'){ echo 'selected'; } } ?> >G</option>
                                    <?php for($i = 1; $i<=100; $i++){ ?>
                                    <option value="<?php echo $i; ?>" <?php if(!empty($flat_details)){ if($flat_details->flat_TotalFloor == $i){ echo 'selected'; } } ?>><?php echo $i; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            
                            <div class="col-md-2 col-sm-6 col-xs-6">
                                <label>Bathroom</label><b style="color:red;">*</b>
                                <select id="pent_bathroom" name="pent_bathroom" >
                                    <option hidden >Bathroom</option>
                                    <option disabled >Select one </option>
                                    <?php for($i = 1; $i<=100; $i++){ ?>
                                    <option value="<?php echo $i; ?>" <?php if(!empty($flat_details)){ if($flat_details->flat_Bathroom == $i){ echo 'selected'; } } ?>><?php echo $i; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            
                            <div class="col-md-2 col-sm-6 col-xs-6">
                                <label>Kitchen</label><b style="color:red;">*</b>
                                <select id="pent_kitchen" name="pent_kitchen" >
                                    <option hidden >Kitchen</option>
                                    <option disabled >Select one </option>
                                    <?php for($i = 1; $i<=100; $i++){ ?>
                                    <option value="<?php echo $i; ?>" <?php if(!empty($flat_details)){ if($flat_details->flat_Kitchen == $i){ echo 'selected'; } } ?>><?php echo $i; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            
                            <div class="col-md-2 col-sm-6 col-xs-6">
                                <label>Built-Up Area</label><b style="color:red;">*</b>
                                <input  type="number" name="pent_buildup_area" id="pent_buildup_area" class="gui-input" placeholder="Build up Area" value="<?php if(!empty($flat_details)){ echo $flat_details->flat_BuildupArea; } ?>" >
                            </div>
                            
                            
                            <div class="col-md-2 col-sm-6 col-xs-6">
                                <label>Built-Up Area Unit</label><b style="color:red;">*</b>
                                <select id="pent_buildup_area_Unit" name="pent_buildup_area_Unit"  >
                                    <option hidden >Unit</option>
                                    <option disabled >Select one </option>
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
                            
                            <div class="col-md-2 col-sm-6 col-xs-6">
                                <label>Open Terrace</label><b style="color:red;">*</b>
                                <input  type="number" name="open_terrace" id="open_terrace" class="gui-input" placeholder="Build up Area" value="<?php if(!empty($flat_details)){ echo $flat_details->flat_BuildupArea; } ?>" >
                            </div>
                            
                            
                            <div class="col-md-2 col-sm-6 col-xs-6">
                                <label>Terrace Unit</label><b style="color:red;">*</b>
                                <select id="pent_open_terrace_unit" name="pent_open_terrace_unit"  >
                                    <option hidden >Unit</option>
                                    <option disabled >Select one </option>
                                    <option value="Sqft" <?php if(!empty($flat_details)){ if($flat_details->flat_BuildupArea_Unit == 'Sqft'){ echo 'selected'; } } ?> >Sqft</option>
                                    <option value="Sq-m" <?php if(!empty($flat_details)){ if($flat_details->flat_BuildupArea_Unit == 'Sq-m'){ echo 'selected'; } } ?> >Sq-m</option>
                                    <option value="Acre" <?php if(!empty($flat_details)){ if($flat_details->flat_BuildupArea_Unit == 'Acre'){ echo 'selected'; } } ?> >Acre</option>
                                    <option value="Bigha" <?php if(!empty($flat_details)){ if($flat_details->flat_BuildupArea_Unit == 'Bigha'){ echo 'selected'; } } ?> >Bigha</option>
                                    <option value="Hectare" <?php if(!empty($flat_details)){ if($flat_details->flat_BuildupArea_Unit == 'Hectare'){ echo 'selected'; } } ?> >Hectare</option>
                                    <option value="Marla" <?php if(!empty($flat_details)){ if($flat_details->flat_BuildupArea_Unit == 'Marla'){ echo 'selected'; } } ?> >Marla</option>
                                    <option value="Chatak" <?php if(!empty($flat_details)){ if($flat_details->flat_BuildupArea_Unit == 'Chatak'){ echo 'selected'; } } ?> >Chatak</option>
                                    <option value="Kottah" <?php if(!empty($flat_details)){ if($flat_details->flat_BuildupArea_Unit == 'Kottah'){ echo 'selected'; } } ?> >Kottah</option>
                                </select>
                            </div>-->
                            
                            <!--<div class="col-md-3 col-sm-6 col-xs-6">
                                <label>Built-Up Area</label><b style="color:red;">*</b>
                                <input  type="number" name="house_TotalUncoveredLandArea" id="house_TotalUncoveredLandArea" class="gui-input" placeholder="Build up Area" value="<?php if(!empty($flat_details)){ echo $flat_details->flat_BuildupArea; } ?>" >
                            </div>
                            
                            
                            <div class="col-md-3 col-sm-6 col-xs-6">
                                <label>Built-Up Area Unit</label><b style="color:red;">*</b>
                                <select id="house_TotalUncoveredLandArea_Unit" name="house_TotalUncoveredLandArea_Unit"  >
                                    <option hidden >Unit</option>
                                    <option disabled >Select one </option>
                                    <option value="Sqft" <?php if(!empty($flat_details)){ if($flat_details->flat_BuildupArea_Unit == 'Sqft'){ echo 'selected'; } } ?> >Sqft</option>
                                    <option value="Sq-m" <?php if(!empty($flat_details)){ if($flat_details->flat_BuildupArea_Unit == 'Sq-m'){ echo 'selected'; } } ?> >Sq-m</option>
                                    <option value="Acre" <?php if(!empty($flat_details)){ if($flat_details->flat_BuildupArea_Unit == 'Acre'){ echo 'selected'; } } ?> >Acre</option>
                                    <option value="Bigha" <?php if(!empty($flat_details)){ if($flat_details->flat_BuildupArea_Unit == 'Bigha'){ echo 'selected'; } } ?> >Bigha</option>
                                    <option value="Hectare" <?php if(!empty($flat_details)){ if($flat_details->flat_BuildupArea_Unit == 'Hectare'){ echo 'selected'; } } ?> >Hectare</option>
                                    <option value="Marla" <?php if(!empty($flat_details)){ if($flat_details->flat_BuildupArea_Unit == 'Marla'){ echo 'selected'; } } ?> >Marla</option>
                                    <option value="Chatak" <?php if(!empty($flat_details)){ if($flat_details->flat_BuildupArea_Unit == 'Chatak'){ echo 'selected'; } } ?> >Chatak</option>
                                    <option value="Kottah" <?php if(!empty($flat_details)){ if($flat_details->flat_BuildupArea_Unit == 'Kottah'){ echo 'selected'; } } ?> >Kottah</option>
                                </select>
                            </div>-->
                            
                            <!--<div class="col-md-2 col-sm-3 col-xs-6">
                                <label>Total Floor</label><b style="color:red;">*</b>
                                <select id="total_floor" name="total_floor" >
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
                            -->
                            
                            <!--<div class="col-md-3 col-sm-3 col-xs-6">
                                <label>Roof</label><b style="color:red;">*</b>
                                <select id="flat_HeavyVehicleParkingUpto" name="flat_HeavyVehicleParkingUpto" >
                                    <option hidden >Roof</option>
                                    <option disabled >Select one </option>
                                    <option value="RCC" <?php if(!empty($flat_details)){ if($flat_details->flat_HeavyVehicleParkingUpto == 'RCC'){ echo 'selected'; } } ?> >RCC</option>
                                    <option value="Shaded" <?php if(!empty($flat_details)){ if($flat_details->flat_HeavyVehicleParkingUpto == 'Shaded'){ echo 'selected'; } } ?> >Shaded</option>
                                </select>
                            </div>-->
                            
                            <div class="col-md-12 col-sm-12 col-xs-12 pt-20 pb-20">
                                <label style="color:#444;">Upload Files (Only 10 Images Required)</label>
                            </div>
                            
                            <div class="col-md-6 col-sm-6 col-xs-12" id="fileUploadDiv" style="margin:0;padding:0;">
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <div class="file-drop-area">
                                        <span class="fake-btn">Choose files</span>
                                        <span class="file-msg">or drag and drop files here</span>
                                        <input class="file-input" type="file" name="UploadImages[]" id="fileImage" accept="image/*" >
                                        <input class="file-input" type="hidden" name="prevUploadImages" id="prevUploadImages" value=""  >
                                    </div>
                                </div>
                                
                                <div class="col-md-3 col-sm-3 col-xs-12 pt-20">
                                    <a style="float:right;" class="outln-hvr" href="javascript:void(0);" onclick="load_more_photos();">+Add More</a>
                                </div>
                            </div>
                            
                            <div class="col-md-6 col-sm-6 col-xs-12 xs-pt-10">
                                <label style="color:#73879c;">Video</label>
                                <input type="text" class="gui-file" name="video_name" id="video_name" placeholder="YouTube video link">
                            </div>
                            
                            <!---- Remove this input after backend ----
                            <div class="col-md-12 col-sm-6 col-xs-6">
                                <div class="col-md-6 col-sm-6 col-xs-6">
                                    <label>Image</label><b style="color:red;">*</b>
                                    <input type="file" name="UploadImages[]" id="UploadImages" value="" multiple  onblur="checkValue(this)"  />
                                    <input type="hidden" class="gui-file" name="prevUploadImages" id="prevUploadImages" value="<?php if(!empty($post_property)){ echo $post_property->image_name; }else{ echo ''; }?>">
                                </div>
    
                                <div class="col-md-6 col-sm-6 col-xs-6">
                                    <label>Video</label><b style="color:red;">*</b>
                                    <input type="file" name="UploadVideos" id="UploadVideos"  onblur="checkValue(this)"  />
                                    <input type="hidden" class="gui-file" name="prevUploadVideos" id="prevUploadVideos" value="<?php if(!empty($post_property)){ echo $post_property->video_name; }else{ echo ''; }?>">
                                </div>
                            </div>
                            ------------------------------------------>
                            
                            <div class="col-md-12 col-sm-12 col-xs-12 pt-20 pb-20">
                                <label style="color:#73879c;">Description / Notes / Details</label>
                                <textarea maxlength="100" placeholder="100 words only" name="comment1" id="comment1" onblur="checkValue(this)"></textarea>
                            </div>

                        </div>
                        
                        <div class="modal-footer">
                            <input type="submit" name="save" value="Save" id="submit-btn"/>
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
        $("#land_email").val('');
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
        $("#FurnishedStatus").val('');
        $("#security_deposite").val('');
        $("#rentPerMonth").val('');
        $("#net_amount").val('');
        $("#amount").val('');
        $("#per_unit").val('');
        
        $("#LandArea").val('');
        $("#land_SuperBuildupArea_Unit").val('');
        $("#LandStatus").val('');
        $("#NatureofLand").val('');
        $("#PropertyTax").val('');
        $("#LandFacing").val('');
        $("#landCoveredArea").val('');
        $("#landCoveredAreaUnit").val('');
        $("#IstheExistingOwner").val('');
        $("#NoOfOwner").val('');
        $("#Mutation").val('');
        $("#LandRoadWide").val('');
        $("#LandRoadWideUnit").val('');
        $("#prevUploadImages").val('');
        $("#video_name").val('');
        
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
            data: {post_id:post_id, property_type:'Land'},
            dataType: 'json',
            success: function(data)
            {
                $("#post_id").val(data['post_id']);
                $("#name").val(data['name']);
                $("#mobile").val(data['mobile']);
                $("#mobile1").val(data['mobile1']);
                $("#phone").val(data['phone']);
                $("#land_email").val(data['email']);
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
                $("#ReadyToMove").prop('checked', (data['section']== 'ReadyToMove' ? true : false));
                $("#PossessionFrom").prop('checked', (data['section']== 'PossessionFrom' ? true : false));
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
                $("#FurnishedStatus").val(data['FurnishedStatus']);
                $("#security_deposite").val(data['security_deposite']);
                $("#rentPerMonth").val(data['rentPerMonth']);
                $("#net_amount").val(data['net_amount']);
                $("#amount").val(data['amount']);
                $("#per_unit").val(data['per_unit']);
                
                
                $("#LandArea").val(data['LandArea']);
                $("#land_SuperBuildupArea_Unit").val(data['land_SuperBuildupArea_Unit']);
                $("#LandStatus").val(data['LandStatus']);
                $("#NatureofLand").val(data['NatureofLand']);
                $("#PropertyTax").val(data['PropertyTax']);
                $("#LandFacing").val(data['LandFacing']);
                $("#landCoveredArea").val(data['landCoveredArea']);
                $("#landCoveredAreaUnit").val(data['landCoveredAreaUnit']);
                $("#IstheExistingOwner").val(data['IstheExistingOwner']);
                $("#NoOfOwner").val(data['NoOfOwner']);
                $("#Mutation").val(data['Mutation']);
                $("#LandRoadWide").val(data['LandRoadWide']);
                $("#LandRoadWideUnit").val(data['LandRoadWideUnit']);
               
                $("#PowerBackup").attr('checked',data['PowerBackup'] == 1 ? true:false);
                $("#ServiveLift").attr('checked',data['ServiveLift'] == 1 ? true:false);
                $("#BanquetHall").attr('checked',data['BanquetHall'] == 1 ? true:false);
                $("#GYM").attr('checked',data['GYM'] == 1 ? true:false);
                $("#VisitorParking").attr('checked',data['VisitorParking'] == 1 ? true:false);
                $("#Intercom").attr('checked',data['Intercom'] == 1 ? true:false);
                $("#CCTV").attr('checked',data['CCTV'] == 1 ? true:false);
                $("#SwimmingPool").attr('checked',data['SwimmingPool'] == 1 ? true:false);
                $("#CloubHouse").attr('checked',data['CloubHouse'] == 1 ? true:false);
                $("#SarvantRoom").attr('checked',data['SarvantRoom'] == 1 ? true:false);
                $("#Lift").attr('checked',data['Lift'] == 1 ? true:false);
                $("#WIFI").attr('checked',data['WIFI'] == 1 ? true:false);
                $("#CommunityHall").attr('checked',data['CommunityHall'] == 1 ? true:false);
                $("#IndoorGame").attr('checked',data['IndoorGame'] == 1 ? true:false);
                $("#OutDoorGame").attr('checked',data['OutDoorGame'] == 1 ? true:false);
                $("#GasPipeLine").attr('checked',data['GasPipeLine'] == 1 ? true:false);
                $("#Park").attr('checked',data['Park'] == 1 ? true:false);
                $("#Security").attr('checked',data['Security'] == 1 ? true:false);
                $("#comment1").val(data['comment1']);
                $("#video_name").val(data['video_name']);
                $("#prevUploadImages").val(data['image_name']);
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
    
    /*function check_area(){
        if(parseInt($('#house_BuildupArea').val()) < parseInt($('#house_SuperBuildupArea').val())){
            $('#house_BuildupArea_error').html('Should be less than superbuiltup area');
        }else{
            $('#house_BuildupArea_error').html('');
        }
        if(parseInt($('#house_CarpetArea').val()) > parseInt($('#house_CarpetArea').val())){
            
            $('#house_CarpetArea_error').html('Should be less than builtup area');
        }else{
            $('#house_CarpetArea-_error').html('');
        }
    }*/
</script>









