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
    function deleteRecord(id)
    {
        var x=confirm("do you want to Delete?")
        if(x==true)
        {
            window.location="land_rent_delete.php?did="+id;
        }
        
    }
    function getamount(val)
    {
    $.ajax
        ({
            type: "POST",
            url: "room_floor.php",
            data: 'timing='+val,
            success: function(data)
            {
            $("#amount_list").html(data);
            }

        }); 
    }
</script>


      
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
                    <div class="x_title">
                        <h2>Land Rent List</h2>
					    <button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#myModal">+ADD LAND</button>                    
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                      
                        <table id="datatable" class="table table-bordered table-striped table">
                            <thead style="background:#337ab7;color:white;"> 
                    
                                <tr>
                                    <th>Sr.No.</th>
                                    <!-- <th>Prop ID</th> -->
                                    <th>State</th>
                                    <th>City</th>
                                    <th>Location</th>
                                    <th>Landmark</th>
                                    <th>For</th>
                                    <th>Property Type</th>
                                    <th>Block</th>
                                    <th>Land Status</th>
                                    <th>Present Owner</th>
                                    <th>Nature Of Land</th>
                                    <th>Number Of Owner</th>
                                    <th>Property Tax</th>
                                    <th>Mutation</th>
                                    <th>Land Facing</th>
                                    <th>Land Road Wide</th>                              
                                    <th>Land Area</th>
                                    <th>Covered Area</th>
                                    <th>Possession</th>
                                    <th>Age Of Property</th>
                                    <th>Rent/Price</th>
                                    <th>S.Deposite / Booking Amount</th>
                                    <th>Amenities</th>
                                    <th>Details</th>
                                    <th>Contact Detail</th>
                                    <th>Route  </th>
                                    <th>Route ID</th>
                                    <th>Source  </th>
                                    <th>Source ID</th>
                                    <th>Image</th>
                                    <th>Video</th>
                                    <th>Action</th>
                                </tr>
                    
                            </thead>
                        <tbody>
                            <?php if(!empty($list_land)){ ?>
                            <?php foreach($list_land as $i=>$row){ ?>
                            <tr>
                                <td><?php echo $i+1;?></td>
                                <!-- <td><?php echo $row->property_id;?></td> -->
                                <td><?php echo $row->state;?></td>
                                <td><?php echo $row->city;?></td>
                                <td><?php echo $row->location;?></td>
                                <td><?php echo $row->landmark;?></td>
                                <td><?php echo $row->rent_sell;?></td>
                                <td><?php echo $row->com_res;?></td>
                                <td><?php //echo $row->block;?></td>
                                <td><?php echo $row->land_status;?></td>
                                <td><?php echo $row->existing_owner;?></td>
                                <td><?php echo $row->nature_of_land;?></td>
                                <td><?php echo $row->number_of_owner;?></td>
                                <td><?php echo $row->property_taxt;?></td>
                                <td><?php echo $row->mutation;?></td>
                                <td><?php echo $row->land_facing;?></td>
                                <td><?php echo $row->land_road_wide;?><?php echo $row->land_road_wide_unit;?></td>
                                <td><?php echo $row->land_area;?><?php echo $row->land_area_unit;?></td>
                                <td><?php echo $row->covered_area;?><?php echo $row->covered_area_unit;?></td>
                                <td><?php echo $row->possesion;?></td>
                                <td><?php echo $row->possession_date;?></td>
                                <td><?php echo $row->rent_month;?></td>
                                <td><?php echo $row->security_deposite;?></td>
                            
                                <td>
                                    <div class="container">
                                        <a href="javascript:void(0);" data-toggle="modal" data-target="#amenities_<?php echo $i;?>">
                                            <i class="fa fa-eye" aria-hidden="true"></i>
                                        </a>
                                    
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
                                                                    <div class="col-sm-3">
                                                                        <?php //echo $row->power_backup;?>
                                                                    </div>
                                                                    <div class="col-sm-3">
                                                                    <?php echo $row->atm;?>
                                                                    </div>
                                                                    <div class="col-sm-3">
                                                                        <?php echo $row->bank;?>
                                                                    </div>
                                                                    <div class="col-sm-3">
                                                                        <?php echo $row->hospital;?>
                                                                    </div>
                                                                    <div class="col-sm-3">
                                                                        <?php echo $row->railway_station;?>
                                                                    </div>
                                                                    <div class="col-sm-3">
                                                                        <?php echo $row->metro_station;?>
                                                                    </div>
                                                                    <div class="col-sm-3">
                                                                        <?php echo $row->main_road;?>
                                                                    </div>
                                                                    <div class="col-sm-3">
                                                                        <?php echo $row->market;?>
                                                                    </div>
                                                                    <div class="col-sm-3">
                                                                        <?php echo $row->school;?>
                                                                    </div>
                                                                    <div class="col-sm-3">
                                                                        <?php echo $row->bus;?>
                                                                    </div>
                                                                    <div class="col-sm-3">
                                                                        <?php echo $row->water_supply;?>
                                                                    </div>
                                                                    <div class="col-sm-3">
                                                                        <?php echo $row->auto;?>
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
                                <td>
                                    <div class="container">
                                        <a href="javascript:void(0);" data-toggle="modal" data-target="#details_<?php echo $i;?>"><i class="fa fa-eye" aria-hidden="true"></i>
                                        </a>
                                    
                                        <div class="modal fade" id="details_<?php echo $i;?>" role="dialog">
                                            <div class="modal-dialog">
                                            
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        <h4 class="modal-title">Details</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p><?php echo $row->description;?></p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                    </div>
                                                </div>                                
                                            </div>
                                        </div>                        
                                    </div>
                                </td>
                                    <td>
                                        <div class="container">
                                            <a href="javascript:void(0);" data-toggle="modal" data-target="#contact_details_<?php echo $i;?>"><i class="fa fa-eye" aria-hidden="true"></i>
                                            </a>
                                    
                                            <div class="modal fade" id="contact_details_<?php echo $i;?>" role="dialog">
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
                                                                        <td><?php echo $row->pin_code;?></td>
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
                                    
                                        </div>
                                    </td>

                                    <td><?php echo $row->added_by;?></td>
                                    <td><?php //echo $row->route_id;?></td>
                                    <td><?php echo $row->added_by;?>  </td>
                                    <td><?php //echo $row->source_id;?></td>
                                    <td>
                                        <div class="container">
                                            <a href="javascript:void(0);" data-toggle="modal" data-target="#image_<?php echo $i; ?>"><i class="fa fa-eye" aria-hidden="true"></i>
                                            </a>
                                        
                                            <div class="modal fade" id="image_<?php echo $i; ?>" role="dialog">
                                                <div class="modal-dialog">
                                                
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        <h4 class="modal-title">Image</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p><img style="width:200px;height:200px" src="<?php echo base_url(); ?><?php echo $row->image;?>"></p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>
                                                
                                                </div>
                                            </div>
                                        
                                        </div>
                                    </td>	
                                    <td>
                                        <a target="blank" href="<?php echo $row->video; ?>"><i style="color:red" class="fa fa-youtube-play" aria-hidden="true"></i></a>
                                    </td>
                                    <td>
                                        <a href="javascript:void(0);" onclick="edit_land(<?php echo $row->land_id; ?>);"><i class="fa fa-pencil"></i></a> 
                                        |
                                        <a href="<?php echo base_url(); ?>backend/delete_land/<?php echo $row->land_id; ?>" onclick="return confirm('Do you want to delete this record?');" href="javascript:void(0);"> <i class="fa fa-trash"></i></a>
                                        <!-- <a   href="creat.php?id=<?php echo $row->land_id; ?>"><i class="fa fa-tasks" aria-hidden="true"></i></a> -->
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

<script>
    function isNumberKey(evt){
        var charCode = (evt.which) ? evt.which : evt.keyCode;
        if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;
        return true;
    }
</script>


<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog  modal-lg">
    
        <div class="modal-content">
            <div class="modal-header" style="background:linear-gradient(to right,#03709e,#18c3fd 100%);">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title" style="color:white;font-weight:bold;font-size:20px;">Add Land</h4>
            </div>
            <form action="<?php echo base_url(); ?>backend/save_land" enctype="multipart/form-data" method="post" accept-charset="utf-8">               
                <div class="modal-body">
                    <div class="row">
               
                        <input type="hidden" name="added_by" value="Super Admin" id="added_by"style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  />
                        <input type="hidden" name="land_id" value="0" id="land_id"style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  />
                        <input type="hidden" name="c" value="<?php echo rand(10000,999999)?>">
                        <input type="hidden" name="d" value="<?php echo rand(10000,999999)?>">
                        <input type="hidden" name="i" value="<?php echo rand(10000,999999)?>">
                        <input type="hidden" name="a" value="<?php echo rand(10000,999999)?>">

                        <div class="col-md-6 col-sm-6 col-xs-6">
                            <label>Name</label><b style="color:red;">*</b>
                            <input type="text" name="name" id="name" style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  />
                         </div>

                        
                        
                        <div class="col-md-6 col-sm-6 col-xs-6">
                            <label>Mobile</label><b style="color:red;">*</b>
                            <input type="text" size="20" maxlength="10" onkeypress='return isNumberKey(event)' name="mobile" id="mobile" style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;"    />
                        </div>

                        <div class="col-md-6 col-sm-6 col-xs-6">
                            <label>Mobile</label><b style="color:red;">*</b>
                            <input type="text" size="20" maxlength="10" onkeypress='return isNumberKey(event)' name="mobile_official" id="mobile_official"style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  />
                        </div>


                        <div class="col-md-6 col-sm-6 col-xs-6">
                            <label>Phone</label><b style="color:red;">*</b>    
                            <input type="text" class="input--style-5" size=20 maxlength=15 onkeypress='return isNumberKey(event)' name="phone" id="phone" min="15"      style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)">    
                        </div>


                        <div class="col-md-6 col-sm-6 col-xs-6">
                            <label>E-mail</label><b style="color:red;">*</b>
                            <input type="text" name="email" id="email"style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  />
                        </div>

                        <div class="col-md-6 col-sm-6 col-xs-6">
                            <label>State</label><b style="color:red;">*</b>
                            <select id="state" name="state" style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;">
                                <option>---Select---</option>
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


                        <div class="col-md-6 col-sm-6 col-xs-6">
                            <label>City</label><b style="color:red;">*</b>
                            <select id="city" name="city" style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;">
                                <option>---Select---</option>
                                <option value="Port Blair">Port Blair</option>
                                <option value="Adoni">Adoni</option>
                                <option value="Amadalavalasa">Amadalavalasa</option>
                                <option value="Anakapalle">Anakapalle</option>
                                <option value="Anantapur">Anantapur</option>
                                <option value="Banganapalle">Banganapalle</option>
                                <option value="Bapatla">Bapatla</option>
                                <option value="Bethamcherla">Bethamcherla</option>
                                <option value="Bheemunipatnam">Bheemunipatnam</option>
                                <option value="Bhimavaram">Bhimavaram</option>
                                <option value="Chapirevula">Chapirevula</option>
                                <option value="Chilakaluripet">Chilakaluripet</option>
                                <option value="Chirala">Chirala</option>
                                <option value="Chittoor">Chittoor</option>
                                <option value="Cuddapah">Cuddapah</option>
                                <option value="Dharmavaram">Dharmavaram</option>
                                <option value="Eluru">Eluru</option>
                                <option value="Gooty">Gooty</option>
                                <option value="Gudivada">Gudivada</option>
                                <option value="Gudur">Gudur</option>
                                <option value="Guntur">Guntur</option>
                                <option value="Hanuman Junction">Hanuman Junction</option>
                                <option value="Hindupur">Hindupur</option>
                                <option value="Ichchapuram">Ichchapuram</option>
                                <option value="Jaggaiahpet">Jaggaiahpet</option>
                                <option value="Jammalamadugu">Jammalamadugu</option>
                                <option value="Kadapa">Kadapa</option>
                                <option value="Kadiri">Kadiri</option>
                                <option value="Kakinada">Kakinada</option>
                                <option value="Kalyandurg">Kalyandurg</option>
                                <option value="Kandukur">Kandukur</option>
                                <option value="Kurnool">Kurnool</option>
                                <option value="Macherla">Macherla</option>
                                <option value="Machilipatnam">Machilipatnam</option>
                                <option value="Mandapeta">Mandapeta</option>
                                <option value="Mangalagiri">Mangalagiri</option>
                                <option value="Narasapur">Narasapur</option>
                                <option value="Narasaraopet">Narasaraopet</option>
                                <option value="Narsipatnam">Narsipatnam</option>
                                <option value="Nellore">Nellore</option>
                                <option value="Nidadavole">Nidadavole</option>
                                <option value="Nuzvid">Nuzvid</option>
                                <option value="Palasa Kasibugga">Palasa Kasibugga</option>
                                <option value="Parvathipuram">Parvathipuram</option>
                                <option value="Peddapuram">Peddapuram</option>
                                <option value="Pithapuram">Pithapuram</option>
                                <option value="Rajahmundry">Rajahmundry</option>
                                <option value="Rayachoti">Rayachoti</option>
                                <option value="Tirupati">Tirupati</option>
                                <option value="Vijayawada">Vijayawada</option>
                                <option value="Visakhapatnam">Visakhapatnam</option>
                                <option value="Bomdila">Bomdila</option>
                                <option value="Itanagar">Itanagar</option>
                                <option value="Naharlagun">Naharlagun</option>
                                <option value="Pasighat">Pasighat</option>
                                <option value="Barpeta Road">Barpeta Road</option>
                                <option value="Barpeta">Barpeta</option>
                                <option value="Bilasipara">Bilasipara</option>
                                <option value="Bongaigaon">Bongaigaon</option>
                                <option value="Dhekiajuli">Dhekiajuli</option>
                                <option value="Dhubri">Dhubri</option>
                                <option value="Dibrugarh">Dibrugarh</option>
                                <option value="Digboi">Digboi</option>
                                <option value="Diphu">Diphu</option>
                                <option value="Dispur">Dispur</option>
                                <option value="Duliajan Oil Town">Duliajan Oil Town</option>
                                <option value="Gauripur">Gauripur</option>
                                <option value="Goalpara">Goalpara</option>
                                <option value="Golaghat">Golaghat</option>
                                <option value="Guwahati">Guwahati</option>
                                <option value="Haflong">Haflong</option>
                                <option value="Hailakandi">Hailakandi</option>
                                <option value="Hojai">Hojai</option>
                                <option value="Jorhat">Jorhat</option>
                                <option value="Karimganj">Karimganj</option>
                                <option value="Kokrajhar">Kokrajhar</option>
                                <option value="Lanka">Lanka</option>
                                <option value="Lumding">Lumding</option>
                                <option value="Mangaldoi">Mangaldoi</option>
                                <option value="Mankachar">Mankachar</option>
                                <option value="Margherita">Margherita</option>
                                <option value="Mariani">Mariani</option>
                                <option value="Marigaon">Marigaon</option>
                                <option value="Nagaon">Nagaon</option>
                                <option value="Nalbari">Nalbari</option>
                                <option value="North Lakhimpur">North Lakhimpur</option>
                                <option value="Rangia">Rangia</option>
                                <option value="Sibsagar">Sibsagar</option>
                                <option value="Silapathar">Silapathar</option>
                                <option value="Tezpur">Tezpur</option>
                                <option value="Tinsukia">Tinsukia</option>
                                <option value="Arrah">Arrah</option>
                                <option value="Aurangabad">Aurangabad</option>
                                <option value="Bakhtiarpur">Bakhtiarpur</option>
                                <option value="Banka">Banka</option>
                                <option value="Banmankhi Bazar">Banmankhi Bazar</option>
                                <option value="Barh">Barh</option>
                                <option value="Begusarai">Begusarai</option>
                                <option value="Bettiah">Bettiah</option>
                                <option value="Bhabua">Bhabua</option>
                                <option value="Bhagalpur">Bhagalpur</option>
                                <option value="Bihar Sharif">Bihar Sharif</option>
                                <option value="Bikramganj">Bikramganj</option>
                                <option value="Bodh Gaya">Bodh Gaya</option>
                                <option value="Chandan Bara">Chandan Bara</option>
                                <option value="Chhapra">Chhapra</option>
                                <option value="Colgong">Colgong</option>
                                <option value="Darbhanga">Darbhanga</option>
                                <option value="Dhaka">Dhaka</option>
                                <option value="Dumraon">Dumraon</option>
                                <option value="Fatwah">Fatwah</option>
                                <option value="Gaya">Gaya</option>
                                <option value="Gogri Jamalpur">Gogri Jamalpur</option>
                                <option value="Jagdispur">Jagdispur</option>
                                <option value="Jamalpur">Jamalpur</option>
                                <option value="Jamui">Jamui</option>
                                <option value="Jhajha">Jhajha</option>
                                <option value="Jhanjharpur">Jhanjharpur</option>
                                <option value="Jogabani">Jogabani</option>
                                <option value="Kanti">Kanti</option>
                                <option value="Khagaria">Khagaria</option>
                                <option value="Kishanganj">Kishanganj</option>
                                <option value="Lalganj">Lalganj</option>
                                <option value="Madhepura">Madhepura</option>
                                <option value="Maharajganj">Maharajganj</option>
                                <option value="Mahnar Bazar">Mahnar Bazar</option>
                                <option value="Makhdumpur">Makhdumpur</option>
                                <option value="Maner">Maner</option>
                                <option value="Marhaura">Marhaura</option>
                                <option value="Masaurhi">Masaurhi</option>
                                <option value="Mirganj">Mirganj</option>
                                <option value="Mohania">Mohania</option>
                                <option value="Mokameh">Mokameh</option>
                                <option value="Muzaffarpur">Muzaffarpur</option>
                                <option value="Narkatiaganj">Narkatiaganj</option>
                                <option value="Naugachhia">Naugachhia</option>
                                <option value="Nawada">Nawada</option>
                                <option value="Nokha">Nokha</option>
                                <option value="Patna">Patna</option>
                                <option value="Piro">Piro</option>
                                <option value="Purnia">Purnia</option>
                                <option value="chandigarh">chandigarh</option>
                                <option value="Akaltara">Akaltara</option>
                                <option value="Ambikapur">Ambikapur</option>
                                <option value="Bade Bacheli">Bade Bacheli</option>
                                <option value="Balod">Balod</option>
                                <option value="Baloda Bazar">Baloda Bazar</option>
                                <option value="Basna">Basna</option>
                                <option value="Bemetra">Bemetra</option>
                                <option value="Bhatapara">Bhatapara</option>
                                <option value="Bhilai">Bhilai</option>
                                <option value="Bilaspur">Bilaspur</option>
                                <option value="Birgaon">Birgaon</option>
                                <option value="Champa">Champa</option>
                                <option value="Chirmiri">Chirmiri</option>
                                <option value="Dalli-Rajhara">Dalli-Rajhara</option>
                                <option value="Dhamtari">Dhamtari</option>
                                <option value="Dipka">Dipka</option>
                                <option value="Dongargarh">Dongargarh</option>
                                <option value="Durg-Bhilai Nagar">Durg-Bhilai Nagar</option>
                                <option value="Gobranawapara">Gobranawapara</option>
                                <option value="Jagdalpur">Jagdalpur</option>
                                <option value="Jashpurnagar">Jashpurnagar</option>
                                <option value="Kanker">Kanker</option>
                                <option value="Kawardha">Kawardha</option>
                                <option value="Kondagaon">Kondagaon</option>
                                <option value="Korba">Korba</option>
                                <option value="Mahasamund">Mahasamund</option>
                                <option value="Mungeli">Mungeli</option>
                                <option value="Naila Janjgir">Naila Janjgir</option>
                                <option value="Raigarh">Raigarh</option>
                                <option value="Raipur">Raipur</option>
                                <option value="Rajnandgaon">Rajnandgaon</option>
                                <option value="Sakti">Sakti</option>
                                <option value="Tilda Newra">Tilda Newra</option>
                                <option value="Amli">Amli</option>
                                <option value="Silvassa">Silvassa</option>
                                <option value="Daman and Diu">Daman and Diu</option>
                                <option value="Delhi">Delhi</option>
                            </select>
                        </div>


                        <div class="col-md-6 col-sm-6 col-xs-6">
                            <label>Location</label><b style="color:red;">*</b>
                            <select id="location" name="location" style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;">
                                <option>---Select---</option>
                            </select>
                        </div>



                        <div class="col-md-6 col-sm-6 col-xs-6">
                            <label>Land Mark</label><b style="color:red;">*</b>
                            <input type="text" name="landmark" id="landmark"style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  />
                        </div>

                        <div class="col-md-6 col-sm-6 col-xs-6">
                            <label>Pincode</label><b style="color:red;">*</b>
                            <input type="text"  onkeypress='return isNumberKey(event)' size=20 name="pin_code" id="pin_code"style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  />
                        </div>

                        <div class="col-md-6 col-sm-6 col-xs-6">
                            <label>Address</label><b style="color:red;">*</b>
                            <input type="text" name="address" id="address"style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  />
                        </div>


                        <div class="col-md-6 col-sm-6 col-xs-6">
                            <label>Property for</label><b style="color:red;">*</b>
                            <select name="rent_sell" id="rent_sell"style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)" >
                                <option>---Select---</option>
                                <option value="Rent">Rent</option>
                                <option value="Sell">Sell</option>
                            </select>
                        </div>

                        <div class="col-md-6 col-sm-6 col-xs-6">
                            <label>Property Type</label><b style="color:red;">*</b>
                            <select name="com_res" id="com_res"style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)" >
                                <option>---Select---</option>
                                <option value="Commercial">Commercial</option>
                                <option value="Residential">Residential</option>
                            </select>
                        </div>

                        <div class="col-md-6 col-sm-6 col-xs-6">
                            <label>Security Deposite</label><b style="color:red;">*</b>
                            <input type="text" maxlength=15 name="security_deposite" onkeypress='return isNumberKey(event)' id="security_deposite"style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  />
                        </div>

                        <div class="col-md-6 col-sm-6 col-xs-6">
                            <label>Rent / Month</label><b style="color:red;">*</b>
                            <input  type="text" maxlength=15 name="rent_month" onkeypress='return isNumberKey(event)' id="rent_month"style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  />
                        </div>

                        <div class="col-md-6 col-sm-6 col-xs-6">
                            <label>Land Area</label><b style="color:red;">*</b>
                            <input type="number" min="0"  name="land_area" id="land_area"style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  />
                        </div>

                        <div class="col-md-6 col-sm-6 col-xs-6">
                            <label>Unit</label><b style="color:red;">*</b>
                            <select type="text" placeholder="sqft v" name="land_area_unit" id="land_area_unit"style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  >
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

                        <div class="col-md-6 col-sm-6 col-xs-6">
                            <label> Coverd Area</label><b style="color:red;">*</b>
                            <input type="number" min="0"  name="covered_area" id="covered_area"style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  />
                        </div>

                        <div class="col-md-6 col-sm-6 col-xs-6">
                            <label>Unit</label><b style="color:red;">*</b>
                            <select type="text" placeholder="sqft v" name="covered_area_unit" id="covered_area_unit"style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)" >
                                <option>---Select---</option>
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

                        

                        <div class="col-md-6 col-sm-6 col-xs-6">
                            <label>Land Status</label><b style="color:red;">*</b>
                            <select name="land_status" id="land_status"style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)" >
                                <option>---Select---</option>
                                <option value="Vacant">Vacant</option>
                                <option value="Occupied">Occupied</option>
                            </select>         
                        </div>

                        <div class="col-md-6 col-sm-6 col-xs-6">
                            <label>Is The Existing Owner</label><b style="color:red;">*</b>
                            <select name="existing_owner" id="existing_owner"style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)" >
                                <option>---Select---</option>
                                <option value="Alive">Alive</option>
                                <option value="Decrease">Decrease</option>
                            </select>         
                        </div>



                        <div class="col-md-6 col-sm-6 col-xs-6">
                            <label>Nature Of Land</label><b style="color:red;">*</b>
                            <input type="number" min="0"  name="nature_of_land" id="nature_of_land"style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  />
                        </div>

                        <div class="col-md-6 col-sm-6 col-xs-6">
                            <label>Number Of Owner</label><b style="color:red;">*</b>
                            <select name="number_of_owner" id="number_of_owner"style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)" >
                                <option>---Select---</option>
                                <option value="Normal">Normal</option>
                                <option value="Agriculture">Agriculture</option>
                                <option value="Industrial">Industrial</option>
                            </select>
                        </div>


                        <div class="col-md-6 col-sm-6 col-xs-6">
                            <label>Property Tax</label><b style="color:red;">*</b>
                            <select name="property_taxt" id="property_taxt"style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)" >
                                <option>---Select---</option>
                                <option value="Dues">Dues</option>
                                <option value="Paid">Paid</option>
                            </select>
                        </div>


                        <div class="col-md-6 col-sm-6 col-xs-6">
                            <label>Mutation</label><b style="color:red;">*</b>
                            <select name="mutation" id="mutation"style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)" >
                                <option>---Select---</option>
                                <option value="Done">Done</option>
                                <option value="Not Done">Not Done</option>
                            </select>
                        </div>


                        <div class="col-md-6 col-sm-6 col-xs-6">
                            <label>Land Facing</label><b style="color:red;">*</b>
                            <select name="land_facing" id="land_facing"style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)" >
                                <option>---Select---</option>
                                <option value="South">South</option>
                                <option value="North">North</option>
                                <option value="East">East</option>
                                <option value="West">West</option>
                            </select>
                        </div>


                        <div class="col-md-6 col-sm-6 col-xs-6">
                            <label>Land Road Wide</label><b style="color:red;">*</b>
                            <input type="number" min="0"  name="land_road_wide" id="land_road_wide"style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  />
                        </div>


                        <div class="col-md-6 col-sm-6 col-xs-6">
                            <label>Unit</label><b style="color:red;">*</b>
                            <select type="number" min="0"  placeholder="sqft/MT" name="land_road_wide_unit" id="land_road_wide_unit"style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)" >
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

                        <div class="col-md-6 col-sm-6 col-xs-6">
                            <label>Possession</label><b style="color:red;">*</b>
                            <select name="possession" id="possession"style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)" >
                                <option>---Select---</option>
                                <option value="Ready To Move">Ready To Move</option>
                                <option value="Possession From">Possession From</option>
                            </select>         
                        </div>

                        <div class="col-md-6 col-sm-6 col-xs-6">
                            <label>Possession Date</label><b style="color:red;">*</b>
                            <input type="date" name="possession_date" id="possession_date"  style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  />
                        </div>

                        <div class="col-md-6 col-sm-6 col-xs-6">
                            <label>Age Of Properties</label><b style="color:red;">*</b>
                            <select name="age_of_properties" id="age_of_properties"style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)" >
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
                            <label>Ownership Type</label><b style="color:red;">*</b>
                            <select name="property_type" id="property_type"style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)" >
                                <option>---Select---</option>
                                <option value="Freehold">Freehold</option>
                                <option value="Lease">Lease</option>
                                <option value="Power Of Attoney">Power Of Attoney</option>
                                <option value="Unregister">Unregister</option>
                            </select>         
                        </div>

                        
                    </div>

                    <div class="col-md-12 col-sm-12 col-xs-12   ">
                        <label>Description</label><b style="color:red;">*</b>
                        <textarea   maxlength="100" placeholder="100 words only" name="description" id="description"style="padding:3px;border: 1px solid #dddd;width:100%;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"></textarea>
                    </div>

                    <div class="col-md-6 col-sm-6 col-xs-6">
                        <label>Image</label><b style="color:red;">*</b>
                        <input type="file" name="image" id="image"style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  />
                        <input type="hidden" name="prev_image" id="prev_image" value="" />
                    </div>

                    <div class="col-md-6 col-sm-6 col-xs-6">
                        <label>Youtube Link</label><b style="color:red;">*</b>
                        <input type="text" name="video" id="video"style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  />
                    </div>

                    <div class="modal-footer">
                        <input type="submit" name="save" value="Save" class="btn btn-primary"/>
                    </div>

                </div>

            </form>
        </div>
    </div>
</div>
<script type="text/javascript">
    function edit_land(land_id){
        $.ajax({
            url: "<?php echo base_url(); ?>backend/get_land_details_by_id",
            data:{'land_id':land_id},
            type: "POST",
            success:function(info){
                var data = JSON.parse(info);
                $("#land_id").val(data['land_id']);
                $("#name").val(data['name']);
                $("#mobile").val(data['mobile']);
                $("#mobile_official").val(data['mobile_official']);
                $("#phone").val(data['phone']);
                $("#email").val(data['email']);
                $("#state").val(data['state']);
                $("#city").val(data['city']);
                $("#location").val(data['location']);
                $("#landmark").val(data['landmark']);
                $("#pin_code").val(data['pin_code']);
                $("#address").val(data['address']);
                $("#rent_sell").val(data['rent_sell']);
                $("#com_res").val(data['com_res']);
                $("#security_deposite").val(data['security_deposite']);
                $("#rent_month").val(data['rent_month']);
                $("#land_area").val(data['land_area']);
                $("#land_area_unit").val(data['land_area_unit']);
                $("#covered_area").val(data['covered_area']);
                $("#covered_area_unit").val(data['covered_area_unit']);
                $("#land_status").val(data['land_status']);
                $("#existing_owner").val(data['existing_owner']);
                $("#nature_of_land").val(data['nature_of_land']);
                $("#number_of_owner").val(data['number_of_owner']);
                $("#property_taxt").val(data['property_taxt']);
                $("#mutation").val(data['mutation']);
                $("#land_facing").val(data['land_facing']);
                $("#land_road_wide").val(data['land_road_wide']);
                $("#land_road_wide_unit").val(data['land_road_wide_unit']);
                $("#possession").val(data['possesion']);
                $("#possession_date").val(data['possession_date']);
                $("#age_of_properties").val(data['age_of_properties']);
                $("#property_type").val(data['property_type']);
                $("#description").val(data['description']);
                $("#prev_image").html(data['image']);
                $("#video").val(data['video']);
                $('#myModal').modal();
            },
            error:function (){}
        });
    }
</script>