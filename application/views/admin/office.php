<?php
/*$name=$_POST['name'];
$mobile=$_POST['mobile'];
$mobile_official=$_POST['mobile_official'];
$phone=$_POST['phone'];
$email=$_POST['email'];
$country=$_POST['country'];
$state=$_POST['state'];
$city=$_POST['city'];
$location=$_POST['location'];
$land_mark=$_POST['land_mark'];
$pin_code=$_POST['pin_code'];
$address=$_POST['address'];
$rent_sell=$_POST['rent_sell'];
$com_res=$_POST['com_res'];
$type=$_POST['type'];
$category=$_POST['category'];
$security_deposite=$_POST['security_deposite'];
$rent_month=$_POST['rent_month'];
$complex_society_building_name=$_POST['complex_society_building_name'];
$frontage=$_POST['frontage'];
$frontage_unit=$_POST['frontage_unit'];
$super_built_up_area=$_POST['super_built_up_area'];
$built_up_area=$_POST['built_up_area'];
$built_up_area_unit=$_POST['built_up_area_unit'];
$covered_area=$_POST['covered_area'];
$open_area=$_POST['open_area'];
$open_area_unit=$_POST['open_area_unit'];
$shop_number=$_POST['shop_number'];
$floor=$_POST['floor'];
$total_floor=$_POST['total_floor'];
$roof=$_POST['roof'];
$bathroom=$_POST['bathroom'];
$bathroom_use_for=$_POST['bathroom_use_for'];
$pentry=$_POST['pentry'];
$pentry_use_for=$_POST['pentry_use_for'];
$road_wide=$_POST['road_wide'];
$available_for_war=$_POST['available_for_war'];
$restaurant=$_POST['restaurant'];
$electric_power=$_POST['electric_power'];
$electric_power_unit=$_POST['electric_power_unit'];
$heavy_vehicle_parking=$_POST['heavy_vehicle_parking'];
$possession=$_POST['possession'];
$possession_date=$_POST['possession_date'];
$open_parking=$_POST['open_parking'];
$covered_parking=$_POST['covered_parking'];
$basment=$_POST['basment'];
$lift_parking=$_POST['lift_parking'];
$age_of_properties=$_POST['age_of_properties'];
$property_type=$_POST['property_type'];
$power_backup=$_POST['power_backup'];
$lift=$_POST['lift'];
$service_lift=$_POST['service_lift'];
$security=$_POST['security'];
$cctv=$_POST['cctv'];
$visitor_parking=$_POST['visitor_parking'];
$conference_room=$_POST['conference_room'];
$reception=$_POST['reception'];
$wifi=$_POST['wifi'];
$intercom=$_POST['intercom'];
$two_wheeler_parking=$_POST['two_wheeler_parking'];
$water=$_POST['water'];
$description=$_POST['description'];
$added_by=$_POST['added_by'];
$shop_id=$_POST['shop_id'];
$video=$_POST['video'];
$c=$_POST['c'];
$d=$_POST['d'];
$i=$_POST['i'];
$a=$_POST['a'];
$imgname = $_FILES['file']['name'];*/ 
?>
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
                                <th>Prop ID</th>
                                <th>State</th>
                                <th>City</th>
                                <th>Location</th>
                                <th>Landmark</th>
                                <th>Complex Name</th>
                                <th>For</th>
                                <th>Block</th>
                                <th>Bathroom</th>
                                <th>Pantry</th>
                                <th>Sub.up</th>
                                <th>Built Area</th>
                                <th>Carpet</th>
                                <th>Floor</th>
                                <th>Total Floor</th>
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
                            <?php if(!empty($list_office)){ ?>
                            <?php foreach($list_office as $i=>$row){ ?>
                            <tr>
                                <td><?php echo $i+1;?></td>
                                <td><?php echo $row->property_id;?></td>
                                <td><?php echo $row->state;?></td>
                                <td><?php echo $row->city;?></td>
                                <td><?php echo $row->location;?></td>
                                <td><?php echo $row->land_mark;?></td>
                                <td><?php echo $row->complex_society_building_name;?></td>
                                <td><?php echo $row->rent_sell;?></td>
                                <td><?php echo $row->block_number;?></td>
                                <td><?php echo $row->bathroom;?></td>
                                <td><?php echo $row->pentry;?></td>
                                <td><?php echo $row->super_built_up_area;?><?php echo $row->super_built_up_area_unit;?></td>
                                <td><?php echo $row->built_up_area;?><?php echo $row->built_up_area_unit;?></td>
                                <td><?php echo $row->covered_parking;?></td>
                                <td><?php echo $row->floor;?></td>
                                <td><?php echo $row->total_floor;?></td>
                                <td><?php echo $row->possession;?></td>
                                 <td><?php echo $row->possession_date;?></td>
                                <td><?php echo $row->rent_month;?></td>
                                <td><?php echo $row->security_deposite;?></td>
                            
                                <td>
                                    <div class="container">
                                        <a href="javascript:void(0);" data-toggle="modal" data-target="#amenities_<?php echo $i;?>"><i class="fa fa-eye" aria-hidden="true"></i>
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
                                                                        <?php echo $row->power_backup;?>
                                                                    </div>
                                                                    <div class="col-sm-3">
                                                                        <?php echo $row->lift;?>
                                                                    </div>
                                                                    <div class="col-sm-3">
                                                                        <?php echo $row->service_lift;?>
                                                                    </div>
                                                                    <div class="col-sm-3">
                                                                        <?php echo $row->security;?>
                                                                    </div>
                                                                    <div class="col-sm-3">
                                                                        <?php echo $row->visitor_parking;?>
                                                                    </div>
                                                                    <div class="col-sm-3">
                                                                        <?php echo $row->conference_room;?>
                                                                    </div>
                                                                    <div class="col-sm-3">
                                                                        <?php echo $row->reception;?>
                                                                    </div>
                                                                    <div class="col-sm-3">
                                                                        <?php echo $row->wifi;?>
                                                                    </div>
                                                                    <div class="col-sm-3">
                                                                        <?php echo $row->intercom;?>
                                                                    </div>
                                                                    <div class="col-sm-3">
                                                                        <?php echo $row->two_wheeler_parking;?>
                                                                    </div>
                                                                    <div class="col-sm-3">
                                                                        <?php echo $row->water;?>
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
                                        <a href="javascript:void(0);" data-toggle="modal" data-target="#Details_<?php echo $i;?>"><i class="fa fa-eye" aria-hidden="true"></i>
                                        </a>
                                    
                                        <div class="modal fade" id="Details_<?php echo $i;?>" role="dialog">
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
                                        <a href="javascript:void(0);"  data-toggle="modal" data-target="#contact_<?php echo $i;?>"><i class="fa fa-eye" aria-hidden="true"></i>
                                        </a>
                                    
                                        <div class="modal fade" id="contact_<?php echo $i;?>" role="dialog">
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
                                        <a href="javascript:void(0);" data-toggle="modal" data-target="#image_<?php echo $i;?>"><i class="fa fa-eye" aria-hidden="true"></i>
                                        </a>
                                    
                                        <div class="modal fade" id="image_<?php echo $i;?>" role="dialog">
                                            <div class="modal-dialog">
                                            
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        <h4 class="modal-title">Image</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p><img style="width:200px;height:200px" src="<?php echo base_url();?><?php echo $row->image;?>"></p>
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
                                    <a href="<?php echo $row->video; ?>"><i style="color:red" class="fa fa-youtube-play" aria-hidden="true"></i></a>
                                </td>
                                <td>
                                    <a href="javascript:void(0);" onclick="edit_office(<?php echo $row->office_id;?>)"><i class="fa fa-pencil"></i></a> |
                                    <a onclick="return confirm('Do you want to delete this record?');" href="<?php echo base_url(); ?>backend/delete_office/<?php echo $row->office_id; ?>"> <i class="fa fa-trash"></i></a>
                                    <!-- <a   href="creat.php?id=<?php echo $row->office_id?>"><i class="fa fa-tasks" aria-hidden="true"></i></a> -->
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
            <form action="<?php echo base_url(); ?>backend/save_office" enctype="multipart/form-data" method="post" accept-charset="utf-8">               
                <div class="modal-body">
                    <div class="row">
               
                        <input type="hidden" name="added_by" value="Super Admin" id="added_by"style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  />
                        <input type="hidden" name="property_id" value="<?php echo rand(100000,9000000)?>" id="property_id"style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  />
                        <input type="hidden" name="office_id" value="0" id="office_id" style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  />

                        <div class="col-md-6 col-sm-6 col-xs-6">
                            <label>Name</label><b style="color:red;">*</b>
                            <input type="text" name="name" id="name"style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  />
                        </div>

                        <div class="col-md-6 col-sm-6 col-xs-6">
                            <label>Mobile</label><b style="color:red;">*</b>
                            <input type=text   size=20 maxlength=10 onkeypress='return isNumberKey(event)' name="mobile" id="mobile" style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;"    />
                        </div>

                        <div class="col-md-6 col-sm-6 col-xs-6">
                            <label>Mobile</label><b style="color:red;">*</b>
                            <input type="text" size=20 maxlength=10 onkeypress='return isNumberKey(event)' name="mobile_official" id="mobile_official"style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  />
                        </div>


                        <div class="col-md-6 col-sm-6 col-xs-6">
                            <label>Phone</label><b style="color:red;">*</b>
                            <input type="text" class="input--style-5" size=20 maxlength=15 onkeypress='return isNumberKey(event)'  name="phone" id="phone" min="15"      style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)">
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
                            <label>Security Deposite</label><b style="color:red;">*</b>
                            <input type="text" maxlength=15 name="security_deposite" onkeypress='return isNumberKey(event)' id="security_deposite"style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  />
                        </div>

                        <div class="col-md-6 col-sm-6 col-xs-6">
                            <label>Rent / Month</label><b style="color:red;">*</b>
                            <input  type="text" maxlength=15 name="rent_month" onkeypress='return isNumberKey(event)' id="rent_month"style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  />
                        </div>

                        <div class="col-md-6 col-sm-6 col-xs-6">
                            <label>Furnished Status</label><b style="color:red;">*</b>
                            <select name="furnished_status" id="furnished_status" style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)">
                                <option>---Select---</option>
                                <option value="Furnished">Furnished</option>
                                <option value="Un Furnished">Unfurnished</option>
                                <option value="Semi Furnished">Semi Furnished</option>
                            </select>
                        </div>

                        <div class="col-md-6 col-sm-6 col-xs-6">
                          <label>Complex / Society Building Name</label><b style="color:red;">*</b>
                            <input type="text" name="complex_society_building_name" id="complex_society_building_name"style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  />
                        </div>

                        <div class="col-md-3 col-sm-6 col-xs-3">
                          <label>Super Buit Up Area</label><b style="color:red;">*</b>
                            <input type="number" min=0 name="super_built_up_area" id="super_built_up_area"style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  />
                        </div>

                        <div class="col-md-3 col-sm-6 col-xs-3">
                            <label>Unit</label><b style="color:red;">*</b>
                                <select type="text" placeholder="sqft v" name="super_built_up_area_unit" id="super_built_up_area_unit"style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  >
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

                        <div class="col-md-3 col-sm-6 col-xs-3">
                            <label> Buit Up Area</label><b style="color:red;">*</b>
                            <input type="number" min=0 name="built_up_area" id="built_up_area"style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  />
                        </div>

                        <div class="col-md-3 col-sm-6 col-xs-3">
                            <label>Unit</label><b style="color:red;">*</b>
                            <select type="text" placeholder="sqft v" name="built_up_area_unit" id="built_up_area_unit"style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)" >
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
                            <label>Carpet Area</label><b style="color:red;">*</b>
                            <input type="number" min=0 name="carpet_area" id="carpet_area"style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  />
                        </div>


               
                        <div class="col-md-3 col-sm-6 col-xs-6">
                            <label>Unit</label><b style="color:red;">*</b>
                            <select type="text" placeholder="sqft v" name="carpet_area_unit" id="carpet_area_unit"style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)">
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
                            <label>Office Number</label><b style="color:red;">*</b>
                            <input type="text" name="office_number" id="office_number"style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  />
                        </div>


                        <div class="col-md-6 col-sm-6 col-xs-6">
                            <label>Floor</label><b style="color:red;">*</b>
                            <select name="floor" id="floor"style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)">
                                <option value="null">---Select---</option>
                                <option value>LB</option>
                                <option value="B">B</option>
                                <option value="G">G</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                                <option value="13">13</option>
                                <option value="14">14</option>
                                <option value="15">15</option>
                                <option value="16">16</option>
                                <option value="17">17</option>
                                <option value="18">18</option>
                                <option value="19">19</option>
                                <option value="20">20</option>
                                <option value="21">21</option>
                                <option value="22">22</option>
                                <option value="23">23</option>
                                <option value="24">24</option>
                                <option value="25">25</option>
                                <option value="26">26</option>
                                <option value="27">27</option>
                                <option value="28">28</option>
                                <option value="29">29</option>
                                <option value="30">30</option>
                                <option value="31">31</option>
                                <option value="32">32</option>
                                <option value="33">33</option>
                                <option value="34">34</option>
                                <option value="35">35</option>
                                <option value="36">36</option>
                                <option value="37">37</option>
                                <option value="38">38</option>
                                <option value="39">39</option>
                                <option value="40">40</option>
                                <option value="41">41</option>
                                <option value="42">42</option>
                                <option value="43">43</option>
                                <option value="44">44</option>
                                <option value="45">45</option>
                                <option value="46">46</option>
                                <option value="47">47</option>
                                <option value="48">48</option>
                                <option value="49">49</option>
                                <option value="50">50</option>
                                <option value="51">51</option>
                                <option value="52">52</option>
                                <option value="53">53</option>
                                <option value="54">54</option>
                                <option value="55">55</option>
                                <option value="56">56</option>
                                <option value="57">57</option>
                                <option value="58">58</option>
                                <option value="59">59</option>
                                <option value="60">60</option>
                                <option value="61">61</option>
                                <option value="62">62</option>
                                <option value="63">63</option>
                                <option value="64">64</option>
                                <option value="65">65</option>
                                <option value="66">66</option>
                                <option value="67">67</option>
                                <option value="68">68</option>
                                <option value="69">69</option>
                                <option value="70">70</option>
                                <option value="71">71</option>
                                <option value="72">72</option>
                                <option value="73">73</option>
                                <option value="74">74</option>
                                <option value="75">75</option>
                                <option value="76">76</option>
                                <option value="77">77</option>
                                <option value="78">78</option>
                                <option value="79">79</option>
                                <option value="80">80</option>
                                <option value="81">81</option>
                                <option value="82">82</option>
                                <option value="83">83</option>
                                <option value="84">84</option>
                                <option value="85">85</option>
                                <option value="86">86</option>
                                <option value="87">87</option>
                                <option value="88">88</option>
                                <option value="89">89</option>
                                <option value="90">90</option>
                                <option value="91">91</option>
                                <option value="92">92</option>
                                <option value="93">93</option>
                                <option value="94">94</option>
                                <option value="95">95</option>
                                <option value="96">96</option>
                                <option value="97">97</option>
                                <option value="98">98</option>
                                <option value="99">99</option>
                                <option value="100">100</option>
                            </select>
                        </div>

                        <div class="col-md-6 col-sm-6 col-xs-6">
                            <label> Block No</label><b style="color:red;">*</b>
                            <input type="number" min=0 name="block_number" id="block_number"style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  />
                        </div>

                        <div class="col-md-6 col-sm-6 col-xs-6">
                            <label>Total Floor</label><b style="color:red;">*</b>
                            <select  name="total_floor" id="total_floor"style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)">
                                <option>---select---</option>
                                <option value="G">G</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                                <option value="13">13</option>
                                <option value="14">14</option>
                                <option value="15">15</option>
                                <option value="16">16</option>
                                <option value="17">17</option>
                                <option value="18">18</option>
                                <option value="19">19</option>
                                <option value="20">20</option>
                                <option value="21">21</option>
                                <option value="22">22</option>
                                <option value="23">23</option>
                                <option value="24">24</option>
                                <option value="25">25</option>
                                <option value="26">26</option>
                                <option value="27">27</option>
                                <option value="28">28</option>
                                <option value="29">29</option>
                                <option value="30">30</option>
                                <option value="31">31</option>
                                <option value="32">32</option>
                                <option value="33">33</option>
                                <option value="34">34</option>
                                <option value="35">35</option>
                                <option value="36">36</option>
                                <option value="37">37</option>
                                <option value="38">38</option>
                                <option value="39">39</option>
                                <option value="40">40</option>
                                <option value="41">41</option>
                                <option value="42">42</option>
                                <option value="43">43</option>
                                <option value="44">44</option>
                                <option value="45">45</option>
                                <option value="46">46</option>
                                <option value="47">47</option>
                                <option value="48">48</option>
                                <option value="49">49</option>
                                <option value="50">50</option>
                                <option value="51">51</option>
                                <option value="52">52</option>
                                <option value="53">53</option>
                                <option value="54">54</option>
                                <option value="55">55</option>
                                <option value="56">56</option>
                                <option value="57">57</option>
                                <option value="58">58</option>
                                <option value="59">59</option>
                                <option value="60">60</option>
                                <option value="61">61</option>
                                <option value="62">62</option>
                                <option value="63">63</option>
                                <option value="64">64</option>
                                <option value="65">65</option>
                                <option value="66">66</option>
                                <option value="67">67</option>
                                <option value="68">68</option>
                                <option value="69">69</option>
                                <option value="70">70</option>
                                <option value="71">71</option>
                                <option value="72">72</option>
                                <option value="73">73</option>
                                <option value="74">74</option>
                                <option value="75">75</option>
                                <option value="76">76</option>
                                <option value="77">77</option>
                                <option value="78">78</option>
                                <option value="79">79</option>
                                <option value="80">80</option>
                                <option value="81">81</option>
                                <option value="82">82</option>
                                <option value="83">83</option>
                                <option value="84">84</option>
                                <option value="85">85</option>
                                <option value="86">86</option>
                                <option value="87">87</option>
                                <option value="88">88</option>
                                <option value="89">89</option>
                                <option value="90">90</option>
                                <option value="91">91</option>
                                <option value="92">92</option>
                                <option value="93">93</option>
                                <option value="94">94</option>
                                <option value="95">95</option>
                                <option value="96">96</option>
                                <option value="97">97</option>
                                <option value="98">98</option>
                                <option value="99">99</option>
                                <option value="100">100</option>
                            </select>
                        </div>

                        <div class="col-md-6 col-sm-6 col-xs-6">
                            <label>Number Of Cabin</label><b style="color:red;">*</b>
                            <input type="number" min=0 name="number_of_cabin" id="number_of_cabin"style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  />
                        </div>

                        <div class="col-md-6 col-sm-6 col-xs-6">
                            <label>Number Of Work Station</label><b style="color:red;">*</b>
                            <input type="number" min=0 name="number_of_work_station" id="number_of_work_station"style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  />
                        </div>

                        <!-- </div> -->

                        <div class="col-md-3 col-sm-3 col-xs-3">
                          <label>Pentry</label><b style="color:red;">*</b>
                            <input type="number" min=0 name="pentry" id="pentry"style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  />
                        </div>

                        <div class="col-md-3 col-sm-3 col-xs-3">
                          <label>Use For</label><b style="color:red;">*</b>
                            <select name="use_for" id="use_for"style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)" >
                                <option>---Select---</option>
                                <option value="Personal">Personal</option>
                                <option value="Common">Common</option>
                            </select>         
                        </div>


                        

                        <div class="col-md-3 col-sm-3 col-xs-3">
                          <label>Bathroom</label><b style="color:red;">*</b>
                            <input type="number" min=0 name="bathroom" id="bathroom"style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  />
                        </div>

                        <div class="col-md-3 col-sm-3 col-xs-3">
                          <label>Use For</label><b style="color:red;">*</b>
                            <select name="bathroom_user_for" id="bathroom_user_for"style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)" >
                                <option>---Select---</option>
                                <option value="Personal">Personal</option>
                                <option value="Common">Common</option>
                            </select>         
                        </div>

                        <div class="col-md-6 col-sm-6 col-xs-6">
                            <label>AC</label><b style="color:red;">*</b>
                            <select name="ac" id="ac"style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)" >
                                <option>---Select---</option>
                                <option value="yes">Yes</option>
                                <option value="no">No</option>
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
                            <label>Open Parking</label><b style="color:red;">*</b>
                            <input type="number" min="0"   name="open"   id="open"style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  />
                        </div>

                        <div class="col-md-6 col-sm-6 col-xs-6">
                            <label>Covered Parking</label><b style="color:red;">*</b>
                            <input type="number" min="0"     name="covered" id="covered"style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  />
                        </div>

                        <div class="col-md-6 col-sm-6 col-xs-6">
                              <label>Basement Parking</label><b style="color:red;">*</b>
                              <input type="number" min="0"  name="basement" placeholder=" " id="basement"style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  />
                        </div>

                        <div class="col-md-6 col-sm-6 col-xs-6">
                           <label>Lift Parking Parking</label><b style="color:red;">*</b>
                           <input type="number" min="0"  placeholder=""name="lift_parking" id="lift_parking"style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  />
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

                        <div class="col-md-12 col-sm-12 col-xs-12">
                          <label>Amenities</label><b style="color:red;">*</b>
                            <br><input type="checkbox" value="Power Backup" name="power_backup" id="power_backup"style="padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  /> Power Backup

                            <br><input type="checkbox" value="Lift" name="lift" id="lift"style="padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  /> Lift

                            <br><input type="checkbox" value="Services Lift" name="service_lift" id="service_lift"style="padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  /> Service Lift

                            <br><input type="checkbox" value="Security" name="security" id="security"style="padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  /> Security

                            <br><input type="checkbox" value="Cctv" name="cctv" id="cctv"style="padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  /> CCTV
                          
                            <br><input type="checkbox" value="Visitor Parking" name="visitor_parking" id="visitor_parking"style="padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  /> Visitor Parking
                          
                            <br><input type="checkbox" value="Conference Room" name="conference_room" id="conference_room"style="padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  /> Confrence Room

                            <br><input type="checkbox" value="Reception" name="reception" id="reception"style="padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  /> Reception

                            <br><input type="checkbox" value="Wifi" name="wifi" id="wifi"style="padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  /> WIFI

                            <br><input type="checkbox" value="Intercom" name="intercom" id="intercom"style="padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  /> Intercom
                          
                            <br><input type="checkbox" value="Two Wheeler Parking" name="two_wheeler_parking" id="two_wheeler_parking"style="padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  /> Two Wheeler Parking

                            <br><input type="checkbox" value="Water" name="water" id="water"style="padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  /> Water
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

                    </div><!--row-->

            </form>
        </div>
    </div>
</div>


<script type="text/javascript">
    function edit_office(office_id){
        $.ajax({
            url: "<?php echo base_url(); ?>backend/get_office_details_by_id",
            data:{'office_id':office_id},
            type: "POST",
            success:function(info){
                var data = JSON.parse(info);
                $("#office_id").val(data['office_id']);
                $("#name").val(data['name']);
                $("#mobile").val(data['mobile']);
                $("#mobile_official").val(data['mobile_official']);
                $("#phone").val(data['phone']);
                $("#email").val(data['email']);
                $("#state").val(data['state']);
                $("#city").val(data['city']);
                $("#location").val(data['location']);
                $("#landmark").val(data['land_mark']);
                $("#pin_code").val(data['pin_code']);
                $("#address").val(data['address']);
                $("#rent_sell").val(data['rent_sell']);
                $("#com_res").val(data['com_res']);
                $("#security_deposite").val(data['security_deposite']);
                $("#rent_month").val(data['rent_month']);
                $("#furnished_status").val(data['furnished_status']);
                $("#complex_society_building_name").val(data['complex_society_building_name']);
                $("#super_built_up_area").val(data['super_built_up_area']);
                $("#super_built_up_area_unit").val(data['super_built_up_area_unit']);
                $("#built_up_area").val(data['built_up_area']);
                $("#built_up_area_unit").val(data['built_up_area_unit']);
                $("#carpet_area").val(data['carpet_area']);
                $("#carpet_area_unit").val(data['carpet_area_unit']);
                $("#office_number").val(data['office_number']);
                $("#floor").val(data['floor']);
                $("#block_number").val(data['block_number']);
                $("#total_floor").val(data['total_floor']);
                $("#number_of_cabin").val(data['number_of_cabin']);
                $("#number_of_work_station").val(data['number_of_work_station']);
                $("#pentry").val(data['pentry']);
                $("#use_for").val(data['use_for']);
                $("#bathroom").val(data['bathroom']);
                $("#bathroom_user_for").val(data['bathroom_user_for']);
                $("#ac").val(data['ac']);
                $("#possession").val(data['possession']);
                $("#possession_date").val(data['possession_date']);
                $("#open").val(data['open_parking']);
                $("#covered").val(data['covered_parking']);
                $("#basement").val(data['basment_parking']);
                $("#lift_parking").val(data['lift_parking']);
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