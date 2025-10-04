<?php
 /*session_start();
if(isset($_SESSION['loggedin']))
{
include('connection.php');
$logid=$_SESSION['loggedin'];
$res=mysqli_query($con,"select * from admin where id='$logid'");
$row=mysqli_fetch_assoc($res);
 
  if(isset($_POST['save']))
  {
 
 $property_id=$_POST['property_id'];
 $added_by=$_POST['added_by'];
 $name=$_POST['name'];
 $mobile=$_POST['mobile'];
 $phone=$_POST['phone'];
 $email=$_POST['email'];
 $country=$_POST['country'];
 $state=$_POST['state'];
 $city=$_POST['city'];
 $location=$_POST['location'];
 $landmark=$_POST['landmark'];
 $pincode=$_POST['pincode'];
 $address=$_POST['address'];
 $rent_sell=$_POST['rent_sell'];
 $res_com=$_POST['res_com'];
 $properties_type=$_POST['properties_type'];
 $property_category=$_POST['property_category'];
 $security_deposit=$_POST['security_deposit'];
 $rent_month=$_POST['rent_month'];
 $furnish_status=$_POST['furnish_status'];
 $complex_society_building_name=$_POST['complex_society_building_name'];
 $super_built_up_area=$_POST['super_built_up_area'];
 $super_built_up_area_unit=$_POST['super_built_up_area_unit'];
 $built_up_area=$_POST['built_up_area'];
 $built_up_area_unit=$_POST['built_up_area_unit'];
 $covered_area=$_POST['covered_area'];
 $covered_area_unit=$_POST['covered_area_unit'];
 $covered_built_up_area=$_POST['covered_built_up_area'];
 $covered_built_up_area_unit=$_POST['covered_built_up_area_unit'];
 $factory_number=$_POST['factory_number'];
 $floor=$_POST['floor'];
 $total_floor=$_POST['total_floor'];
 $number_of_cabin=$_POST['number_of_cabin'];
 $number_of_work_station=$_POST['number_of_work_station'];
 $pentry=$_POST['pentry'];
 $pentry_user_for=$_POST['pentry_user_for'];
 $roof=$_POST['roof'];
 $bathroom=$_POST['bathroom'];
 $bathroom_use_for=$_POST['bathroom_use_for'];
 $road_wide=$_POST['road_wide'];
 $road_wide_unit=$_POST['road_wide_unit'];
 $heavy_vehicle_parking=$_POST['heavy_vehicle_parking'];
 $electric_power=$_POST['electric_power'];
 $electric_power_unit=$_POST['electric_power_unit'];
 $manufacturing_type=$_POST['manufacturing_type'];
 $possession=$_POST['possession'];
 $possession_date=$_POST['possession_date'];
 $open=$_POST['open'];
 $covered=$_POST['covered'];
 $basement=$_POST['basement'];
 $lift_parking=$_POST['lift_parking'];
 $age_of_properties=$_POST['age_of_properties'];
 $properties_type_end=$_POST['properties_type_end'];
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
  $video=$_POST['video'];
  $mobile_official=$_POST['mobile_official'];
  $c=$_POST['c'];
  $d=$_POST['d'];
  $i=$_POST['i'];
  $a=$_POST['a'];
 $imgname = $_FILES['file']['name'];
 
     $sql="insert into stock_rent_commercial(property_id,added_by,name,mobile,phone,email,country,state,city,location,landmark,pincode,address,rent_sell,res_com,properties_type,property_category,security_deposit,rent_month,furnish_status,complex_society_building_name,super_built_up_area,super_built_up_area_unit,built_up_area,built_up_area_unit,covered_area,covered_area_unit,covered_built_up_area,covered_built_up_area_unit,factory_number,floor,total_floor,number_of_cabin,number_of_work_station,pentry,pentry_user_for,roof,bathroom,bathroom_use_for,road_wide,road_wide_unit,heavy_vehicle_parking,electric_power,electric_power_unit,manufacturing_type,possession,possession_date,open,covered,basement,lift_parking,age_of_properties,properties_type_end,power_backup,lift,service_lift,security,cctv,visitor_parking,conference_room,reception,wifi,intercom,two_wheeler_parking,water,description,video,mobile_official,c,d,i,a,image)
 value ('$property_id','$added_by','$name','$mobile','$phone','$email','$country','$state','$city','$location','$landmark','$pincode','$address','$rent_sell','$res_com','$properties_type','$property_category','$security_deposit','$rent_month','$furnish_status','$complex_society_building_name','$super_built_up_area','$super_built_up_area_unit','$built_up_area','$built_up_area_unit','$covered_area','$covered_area_unit','$covered_built_up_area','$covered_built_up_area_unit','$factory_number','$floor','$total_floor','$number_of_cabin','$number_of_work_station','$pentry','$pentry_user_for','$roof','$bathroom','$bathroom_use_for','$road_wide','$road_wide_unit','$heavy_vehicle_parking','$electric_power','$electric_power_unit','$manufacturing_type','$possession','$possession_date','$open','$covered','$basement','$lift_parking','$age_of_properties','$properties_type_end','$power_backup','$lift','$service_lift','$security','$cctv','$visitor_parking','$conference_room','$reception','$wifi','$intercom','$two_wheeler_parking','$water','$description','$video','$mobile_official','$c','$d','$i','$a','$imgname')";
         $result=mysqli_query($con,$sql);   
  $imageName =  ''.$_FILES['file']['name'];
         if(move_uploaded_file( $_FILES['file']['tmp_name'], 'images/stock_images/'.$imageName))

     if (mysqli_affected_rows($con)>0)
 
{
   echo '<script>window.location.href="factory_rent.php";</script>';
}
else
{
echo "<script>alert('Allready Existed');</script>";
}
    }*/
                                       
  ?>  
<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3><i class="fa fa-ioxhost"></i> Manage Factory</h3>
            </div>             
        </div>

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">  
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Factory Rent List</h2>
                        <button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#myModal">+ADD FACTORY</button>                    
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
                                <th>Roof</th>
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
                
                 
                            <!-- <tr>
                                <td><?php echo $i;?></td>
                                <td><?php echo $rows11['property_id'];?></td>
                                <td><?php echo $rows11['state'];?></td>
                                <td><?php echo $rows11['city'];?></td>
                                <td><?php echo $rows11['location'];?></td>
                                <td><?php echo $rows11['landmark'];?></td>
                                <td><?php echo $rows11['complex_society_building_name'];?></td>
                                <td><?php echo $rows11['rent_sell'];?></td>
                                <td><?php echo $rows11['block'];?></td>
                                <td><?php echo $rows11['bathroom'];?></td>
                                <td><?php echo $rows11['pentry'];?></td>
                                <td><?php echo $rows11['super_built_up_area'];?><?php echo $rows11['super_built_up_area_unit'];?></td>
                                <td><?php echo $rows11['built_up_area'];?><?php echo $rows11['built_up_area_unit'];?></td>
                                <td><?php echo $rows11['covered_area'];?><?php echo $rows11['covered_area'];?>_unit</td>
                                <td><?php echo $rows11['floor'];?></td>
                                <td><?php echo $rows11['total_floor'];?></td>
                                <td><?php echo $rows11['possession'];?></td>
                                <td><?php echo $rows11['roof'];?></td>
                                <td><?php echo $rows11['possession_date'];?></td>
                                <td><?php echo $rows11['rent_month'];?></td>
                                <td><?php echo $rows11['security_deposit'];?></td>
                                
                                <td>
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
                                                            <?php echo $rows11['lift'];?>
                                                            </div>
                                                            <div class="col-sm-3">
                                                            <?php echo $rows11['service_lift'];?>
                                                            </div>
                                                            <div class="col-sm-3">
                                                            <?php echo $rows11['security'];?>
                                                            </div>
                                                            <div class="col-sm-3">
                                                            <?php echo $rows11['visitor_parking'];?>
                                                            </div>
                                                            <div class="col-sm-3">
                                                            <?php echo $rows11['conference_room'];?>
                                                            </div>
                                                            <div class="col-sm-3">
                                                            <?php echo $rows11['reception'];?>
                                                            </div>
                                                            <div class="col-sm-3">
                                                            <?php echo $rows11['wifi'];?>
                                                            </div>
                                                            <div class="col-sm-3">
                                                            <?php echo $rows11['intercom'];?>
                                                            </div>
                                                            <div class="col-sm-3">
                                                            <?php echo $rows11['two_wheeler_parking'];?>
                                                            </div>
                                                            <div class="col-sm-3">
                                                            <?php echo $rows11['water'];?>
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
                                    </div>
                                </td>
                                <td>
                                    <div class="container">
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
                                                                    <td><?php echo $rows11['pincode'];?></td>
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
                                <td><?php echo $rows11['added_by'];?></td>
                                <td><?php echo $rows11['route_id'];?></td>
                                <td><?php echo $rows11['added_by'];?>  </td>
                                <td><?php echo $rows11['source_id'];?></td>
                                <td>
                                    <div class="container">
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
                                        
                                    </div>
                                </td>   
                                <a target="blank" href="images/stock_images/<?php echo $rows11['image'];?>"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                <td>
                                    <a target="blank" href="<?php echo $rows11['video']?>"><i style="color:red" class="fa fa-youtube-play" aria-hidden="true"></i></a>
                                </td>
                                <td>
                                    <a   href="factory_rent_update.php?bid=<?php echo $rows11['id']?>"><i class="fa fa-pencil"></i></a>
                                    <a   onclick="deleteRecord(<?php echo $rows11['id'];?>)" href="javascript:void(0)"> <i class="fa fa-trash"></i></a>
                                    <a   href="creat.php?id=<?php echo $rows11['id']?>"><i class="fa fa-tasks" aria-hidden="true"></i></a>
                                </td>  
                            </tr> -->
                
                            <div style=" padding:15px; margin-top:10px;">
                                <h4 style="text-align:center;color:red;"><b>Sorry ! No result found..!</b></h4>
                            </div>               
                
                        </tbody>    
                    </table>
                
  <div class="container">
  <!-- Trigger the modal with a button -->
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

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog  modal-lg">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style="background:linear-gradient(to right,#03709e,#18c3fd 100%);">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title" style="color:white;font-weight:bold;font-size:20px;">Add Factory</h4>
        </div>
        <div class="modal-body">
             
 <!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
<style>
    /* Mark input boxes that gets an error on validation: */
    input.invalid {
      background-color: #ffdddd;
    }

    /* Hide all steps by default: */
    .tab {
      display: none;
    }

    button {
      background-color: #4CAF50;
      color: #ffffff;
      border: none;
      padding: 10px 20px;
      font-size: 17px;
      font-family: Raleway;
      cursor: pointer;
    }

    button:hover {
      opacity: 0.8;
    }

    #prevBtn {
      background-color: #bbbbbb;
    }

    /* Make circles that indicate the steps of the form: */
    .step {
      height: 15px;
      width: 15px;
      margin: 0 2px;
      background-color: #bbbbbb;
      border: none;  
      border-radius: 50%;
      display: inline-block;
      opacity: 0.5;
    }

    .step.active {
      opacity: 1;
    }

    /* Mark the steps that are finished and valid: */
    .step.finish {
      background-color: #4CAF50;
    }
</style>
<body>

    <form method="post" enctype="multipart/form-data">
    <input type="hidden" name="added_by" value="Super Admin" id="room"style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  />
    <input type="hidden" name="property_id" value="<?php echo rand(100000,9000000)?>" id="room"style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  />
    <input type="hidden" name="c" value="<?php echo rand(10000,999999)?>">
    <input type="hidden" name="d" value="<?php echo rand(10000,999999)?>">
    <input type="hidden" name="i" value="<?php echo rand(10000,999999)?>">
    <input type="hidden" name="a" value="<?php echo rand(10000,999999)?>">
   <!-- One "tab" for each step in the form: -->
  <div class="tab"> 
 <div class="col-md-4 col-sm-4 col-xs-4">
  <label>Name</label><b style="color:red;">*</b>
<input type="text" name="name" id="room"style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;"    />
  </div>
    <script>
    function isNumberKey(evt){
        var charCode = (evt.which) ? evt.which : evt.keyCode;
        if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;
        return true;
    }
    </script>
   <div class="col-md-4 col-sm-4 col-xs-4">
  <label>Mobile</label><b style="color:red;">*</b>
   <input type=text   size=20 maxlength=10 onkeypress='return isNumberKey(event)'  name="mobile"style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;"    />
  </div>

   <div class="col-md-4 col-sm-4 col-xs-4">
  <label>Mobile</label><b style="color:red;">*</b>
<input type="text" size=20 maxlength=10 onkeypress='return isNumberKey(event)' name="mobile_official" id="room"style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  />
  </div>


   <div class="col-md-4 col-sm-4 col-xs-4">
  <label>Phone</label><b style="color:red;">*</b>
  <fieldset>
<input type="text" class="input--style-5" size=20 maxlength=15 onkeypress='return isNumberKey(event)'  name="phone" min="15"      style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)">
<!--<span id="user-availability-status"></span> id="transactionid"-->
  <!--<p><img src="gi.gif" id="loaderIcon" style="display:none;height:90px;width:150px;" /></p>-->
  </div>


   <div class="col-md-4 col-sm-4 col-xs-4">
  <label>E-mail</label><b style="color:red;">*</b>
<input type="text" name="email" id="room"style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  />
  </div>
  
  <div class="col-md-4 col-sm-4 col-xs-4">
  <label>State</label><b style="color:red;">*</b>
<html>
<head>
 <link rel="stylesheet" href="select2.min.css" />
<style>
.select2-dropdown {top: 22px !important; left: 8px !important;}
</style>
</head>
<body>
 <select id="country" name="state" style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;">
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

<br /><br />
 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="select2.min.js"></script>
<script>
$("#country").select2( {
placeholder: "Select Country",
allowClear: true
} );
</script>
</body>
</html>
</div>
<!--   <div class="col-md-4 col-sm-4 col-xs-4">-->
<!--  <label>State</label><b style="color:red;">*</b>-->
<!--<input type="text" name="state" id="room"style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  />-->
<!--  </div>-->


   <div class="col-md-4 col-sm-4 col-xs-4">
  <label>City</label><b style="color:red;">*</b>
<html>
<head>
 <link rel="stylesheet" href="select2.min.css" />
<style>
.select2-dropdown {top: 22px !important; left: 8px !important;}
</style>
</head>
<body>
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

<br /><br />
 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="select2.min.js"></script>
<script>
$("#city").select2( {
placeholder: "Select city",
allowClear: true
} );
</script>
</body>
</html>
</div>


    <div class="col-md-4 col-sm-4 col-xs-4">
  <label>City</label><b style="color:red;">*</b>
<html>
<head>
 <link rel="stylesheet" href="select2.min.css" />
<style>
.select2-dropdown {top: 22px !important; left: 8px !important;}
</style>
</head>
<body>
 <select id="location" name="location" style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;">
 
 <option>---Select---</option>
 <?php
                include('connection.php');
                $sql="select * from location";
                $result11=mysqli_query($con,$sql);
                
                if(mysqli_num_rows($result11))
                {
                
                $i=1;
                while($rows11=mysqli_fetch_assoc($result11))
                {
                
                ?>
                <option value="<?php echo $rows11['name'];?>"><?php echo $rows11['name'];?></option>
                <?php
                $i++;
                
                }
                ?>
                
                <?php
                
                }
                else
                {
                ?>
                <div style="padding:15px; margin-top:10px;">
                
                <h4 style="text-align:center;color:red;"><b>Sorry ! No result found..!</b></h4>
                </div>
                <?php
                }
                ?>
 </select>

<br /><br />
 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="select2.min.js"></script>
<script>
$("#location").select2( {
placeholder: "Select location",
allowClear: true
} );
</script>
</body>
</html>
</div>


  <div class="col-md-4 col-sm-4 col-xs-4">
  <label>Land Mark</label><b style="color:red;">*</b>
  <input type="text" name="landmark" id="room"style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  />
  </div>

   
  
  <div class="col-md-6 col-sm-6 col-xs-6">
  <label>Pincode</label><b style="color:red;">*</b>
<input type="text" onkeypress='return isNumberKey(event)' name="pincode" id="room"style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  />
  </div>
   

  <div class="col-md-6 col-sm-6 col-xs-6">
  <label>Address</label><b style="color:red;">*</b>
<input type="text" name="address" id="room"style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  />
  </div>
  </div>
   
   
  <div class="tab">
       <div class="col-md-6 col-sm-6 col-xs-6">
  <label>Security Deposite</label><b style="color:red;">*</b>
<input type="text" size=20 maxlength=15 onkeypress='return isNumberKey(event)' name="security_deposit" id="room"style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  />
  </div>

   <div class="col-md-6 col-sm-6 col-xs-6">
  <label>Rent / Month</label><b style="color:red;">*</b>
<input type="text" size=20 maxlength=15 onkeypress='return isNumberKey(event)' name="rent_month" id="room"style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  />
  </div>
 <div class="col-md-6 col-sm-6 col-xs-6">
  <label>Property For</label><b style="color:red;">*</b>
<select name="rent_sell" id="room"style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)" >
<option>---Select---</option>
<option value="rent">Rent</option>
<option value="sell">Sell</option>
</select>  
</div>

  <div class="col-md-6 col-sm-6 col-xs-6">
  <label>Furnished Status</label><b style="color:red;">*</b>
<select name="furnish_status" id="room"style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  />
 <option>---Select---</option>
 <option value="Furnished">Furnished</option>
 <option value="Un Furnished">Unfurnished</option>
 <option value="Semi Furnished">Semi Furnished</option>
  </select>
  </div>

  <div class="col-md-6 col-sm-6 col-xs-6">
  <label>Complex / Society Building Name</label><b style="color:red;">*</b>
<input type="text" name="complex_society_building_name" id="room"style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  />
  </div>

  <div class="col-md-6 col-sm-6 col-xs-6">
  <label>Super Buit Up Area</label><b style="color:red;">*</b>
<input type="number" min="0"  name="super_built_up_area" id="room"style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  />
  </div>
  <div class="col-md-6 col-sm-6 col-xs-6">
  <label>Unit</label><b style="color:red;">*</b>
<select name="super_built_up_area_unit" id="room"style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  />
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
  <label> Buit Up Area</label><b style="color:red;">*</b>
<input type="number" min="0"  name="built_up_area" id="room"style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  />
  </div>
  <div class="col-md-6 col-sm-6 col-xs-6">
  <label>Unit</label><b style="color:red;">*</b>
<select name="built_up_area_unit" id="room"style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  />
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
  <label>Convered Area</label><b style="color:red;">*</b>
<input type="number" min="0"  name="covered_area" id="room"style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  />
  </div>
  <div class="col-md-6 col-sm-6 col-xs-6">
  <label>Unit</label><b style="color:red;">*</b>
<select name="covered_area_unit" id="room"style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  />
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
  <label>Factory Number</label><b style="color:red;">*</b>
<input type="text" name="factory_number" id="room"style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  />
  </div>

  <div class="col-md-6 col-sm-6 col-xs-6">
  <label>Floor</label><b style="color:red;">*</b>
<select name="floor" id="room"style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  />
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
  <label>Total Floor</label><b style="color:red;">*</b>
<select  name="total_floor" id="room"style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  />
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
<input type="number"  min="0" name="number_of_cabin" id="room"style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  />
  
  </div>

  <div class="col-md-6 col-sm-6 col-xs-6">
  <label>Number Of Work Station</label><b style="color:red;">*</b>
<input type="number" min="0"  name="number_of_work_station" id="room"style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  />
  </div>

  <div class="col-md-6 col-sm-6 col-xs-6">
  <label>Pentry</label><b style="color:red;">*</b>
<input type="number" min="0"  name="pentry" id="room"style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  />
  </div>

   <div class="col-md-6 col-sm-6 col-xs-6">
  <label>Use For</label><b style="color:red;">*</b>
<select name="pentry_user_for" id="room"style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)" >
<option>---Select---</option>
<option value="Personal">Personal</option>
<option value="Common">Common</option>
</select>  
</div>


<div class="col-md-6 col-sm-6 col-xs-6">
  <label>Roof</label><b style="color:red;">*</b>
<select name="roof" id="room"style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)" >
<option>---Select---</option>
<option value="RCC">RCC</option>
<option value="Sheded">Sheded</option>
</select>  
</div>

  <div class="col-md-6 col-sm-6 col-xs-6">
  <label>Bathroom</label><b style="color:red;">*</b>
<input type="number" min="0"  name="bathroom" id="room"style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  />
  </div>

   <div class="col-md-6 col-sm-6 col-xs-6">
  <label>Use For</label><b style="color:red;">*</b>
<select name="bathroom_use_for" id="room"style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)" >
<option>---Select---</option>
<option value="Personal">Personal</option>
<option value="Common">Common</option>
</select>  
</div>

<div class="col-md-6 col-sm-6 col-xs-6">
  <label>Road Wide</label><b style="color:red;">*</b>
<input type="number" min="0"  name="road_wide" id="room"style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  />
  </div>


  <div class="col-md-6 col-sm-6 col-xs-6">
  <label>Unit</label><b style="color:red;">*</b>
 <select placeholder="sqft/MT" name="road_wide_unit" id="room"style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  />
  <option>---Select---</option>
  <option value="Feet">Feet</option>
  <option value="Meter">Meter</option>
  </select>
  </div>

  <div class="col-md-6 col-sm-6 col-xs-6">
  <label>Heavy Vechile Parking Upto</label><b style="color:red;">*</b>
  <select  name="heavy_vehicle_parking" id="room"style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  />
   <option>---Select---</option>
<option value="2">2 Wheeler</option>
<option value="3">3Wheeler</option>
 <option value="3">3Wheeler</option>
<option value="4">4Wheeler</option>
 <option value="6">6Wheeler</option>
 <option value="8">8Wheeler</option>
 <option value="10">10Wheeler</option>
 <option value="12">12Wheeler</option>
 <option value="14">14Wheeler</option>
 <option value="16">16Wheeler</option>
 <option value="18">18Wheeler</option>
 <option value="20">20Wheeler</option>
 <option value="22">22Wheeler</option>
 <option value="24">24Wheeler</option>
 <option value="26">26Wheeler</option>
 <option value="28">28Wheeler</option>
 <option value="30">30Wheeler</option>
  </select>
  </div>


    <div class="col-md-6 col-sm-6 col-xs-6">
  <label>Electric Power</label><b style="color:red;">*</b>
<input type="number" min="0"    name="electric_power" id="room"style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  />
  </div>
  <div class="col-md-6 col-sm-6 col-xs-6">
  <label>Unit</label><b style="color:red;">*</b>
<select name="electric_power_unit" id="room"style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  />
  <option>---Select---</option>
  <option value="Kg">Kg</option>
  <option value="Hours Power">Hours Power</option>
  </select>
  </div>

  <div class="col-md-6 col-sm-6 col-xs-6">
  <label>Manufacturing Type</label><b style="color:red;">*</b>
<input type="text"   name="manufacturing_type" id="room"style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  />
  </div>
<div class="col-md-6 col-sm-6 col-xs-6">
  <label>Possession</label><b style="color:red;">*</b>
<select name="possession" id="room"style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)" >
<option>---Select---</option>
<option value="Ready To Move">Ready To Move</option>
<option value="Possession From">Possession From</option>
</select>  
</div>
    
    <div class="col-md-6 col-sm-6 col-xs-6">
  <label>Possession Date</label><b style="color:red;">*</b>
<input type="date" placeholder="DD/MM/YYYY"   name="possession_date"  style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  />
  </div>

  <div class="col-md-6 col-sm-6 col-xs-6">
  <label>Open Parking</label><b style="color:red;">*</b>
<input type="number" min="0"   name="open"   id="room"style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  />
  </div>
  <div class="col-md-6 col-sm-6 col-xs-6">
  <label>Covered Parking</label><b style="color:red;">*</b>
 <input type="number" min="0"     name="covered" id="room"style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  />
  </div>

  <div class="col-md-6 col-sm-6 col-xs-6">
  <label>Basement Parking</label><b style="color:red;">*</b>
  <input type="number" min="0"  name="basement" placeholder=" " id="room"style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  />
  </div>

  <div class="col-md-6 col-sm-6 col-xs-6">
   <label>Lift Parking Parking</label><b style="color:red;">*</b>
   <input type="number" min="0"  placeholder=""name="lift_parking" id="room"style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  />
  </div>
  
  <div class="col-md-6 col-sm-6 col-xs-6">
  <label>Age Of Properties</label><b style="color:red;">*</b>
 <select name="age_of_properties" id="room"style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  />
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
<select name="properties_type_end" id="room"style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)" >
<option>---Select---</option>
<option value="Freehold">Freehold</option>
<option value="Lease">Lease</option>
<option value="Power Of Attoney">Power Of Attoney</option>
<option value="Unregister">Unregister</option>
</select>  
</div>  
  </div>
  
  <div class="tab">
      <div class="col-md-12 col-sm-12 col-xs-12">
  <label>Amenities</label><b style="color:red;">*</b>
 <br><input type="checkbox" value="Power Backup"  name="power_backup" id="room"style="padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  /> Power Backup

 <br><input type="checkbox" value="Lift" name="lift" id="room"style="padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  /> Lift

 <br><input type="checkbox" value="Services" name="service_lift" id="room"style="padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  /> Service Lift

 <br><input type="checkbox" value="Security" name="security" id="room"style="padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  /> Security

 <br><input type="checkbox" value="CCTV" name="cctv" id="room"style="padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  /> CCTV
    <br><input type="checkbox" value="Visitor Parking" name="visitor_parking" id="room"style="padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  /> Visitor Parking
     <br><input type="checkbox" value="Conference Room" name="conference_room" id="room"style="padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  /> Conference Room
<br><input type="checkbox" value="Reception" name="reception" id="room"style="padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  /> Reception
<br><input type="checkbox" value="Wifi" name="wifi" id="room"style="padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  /> WIFI
<br><input type="checkbox" value="Intercom" name="intercom" id="room"style="padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  /> Intercom
  <br><input type="checkbox" value="Two Wheeler Parking" name="two_wheeler_parking" id="room"style="padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  /> Two Wheeler Parking
<br><input type="checkbox" value="Water" name="water" id="room"style="padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  /> Water
  </div> 
 <div class="col-md-12 col-sm-12 col-xs-12">
  <label>Description</label><b style="color:red;">*</b>
 <textarea   maxlength="100" placeholder="100 words only" name="description" id="room"style="padding:3px;border: 1px solid #dddd;width:100%;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"></textarea>
  </div>

   <div class="col-md-6 col-sm-6 col-xs-6">
  <label>Image</label><b style="color:red;">*</b>
 <input type="file" name="file" id="room"style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  />
  </div>
           
 <div class="col-md-6 col-sm-6 col-xs-6">
  <label>Youtube Link</label><b style="color:red;">*</b>
 <input type="text" name="video" id="room"style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  />
   </div>
   
  <div class="col-md-12 col-sm-12 col-xs-12">
   <br><button type="submit" name="save">Save All Data</button> 
  </div>
  </div>

  </div>
     
  <div style="overflow:auto;">
    <div style="float:right;">
      <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
      <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
    </div>
  </div>
  <!-- Circles which indicates the steps of the form: -->
  <div style="text-align:center;margin-top:40px;">
    <span class="step"></span>
    <span class="step"></span>
    <span class="step"></span>
    <span class="step"></span>
  </div>
</form>

<script>
    var currentTab = 0; // Current tab is set to be the first tab (0)
    showTab(currentTab); // Display the current tab

    function showTab(n) {
      // This function will display the specified tab of the form...
      var x = document.getElementsByClassName("tab");
      x[n].style.display = "block";
      //... and fix the Previous/Next buttons:
      if (n == 0) {
        document.getElementById("prevBtn").style.display = "none";
      } else {
        document.getElementById("prevBtn").style.display = "inline";
      }
      if (n == (x.length - 1)) {
        document.getElementById("nextBtn").innerHTML = "";
      } else {
        document.getElementById("nextBtn").innerHTML = "Next";
      }
      //... and run a function that will display the correct step indicator:
      fixStepIndicator(n)
    }

    function nextPrev(n) {
      // This function will figure out which tab to display
      var x = document.getElementsByClassName("tab");
      // Exit the function if any field in the current tab is invalid:
      if (n == 1 && !validateForm()) return false;
      // Hide the current tab:
      x[currentTab].style.display = "none";
      // Increase or decrease the current tab by 1:
      currentTab = currentTab + n;
      // if you have reached the end of the form...
      if (currentTab >= x.length) {
        // ... the form gets submitted:
        document.getElementById("regForm").submit();
        return false;
      }
      // Otherwise, display the correct tab:
      showTab(currentTab);
    }

    function validateForm() {
      // This function deals with validation of the form fields
      var x, y, i, valid = true;
      x = document.getElementsByClassName("tab");
      y = x[currentTab].getElementsByTagName("input");
      // A loop that checks every input field in the current tab:
      for (i = 0; i < y.length; i++) {
        // If a field is empty...
        if (y[i].value == "") {
          // add an "invalid" class to the field:
          y[i].className += " invalid";
          // and set the current valid status to false
          valid = false;
        }
      }
      // If the valid status is true, mark the step as finished and valid:
      if (valid) {
        document.getElementsByClassName("step")[currentTab].className += " finish";
      }
      return valid; // return the valid status
    }

    function fixStepIndicator(n) {
      // This function removes the "active" class of all steps...
      var i, x = document.getElementsByClassName("step");
      for (i = 0; i < x.length; i++) {
        x[i].className = x[i].className.replace(" active", "");
      }
      //... and adds the "active" class on the current step:
      x[n].className += " active";
    }
</script>

</body>
</html>

 

    </div>
  </div>
  
    </div>
                  </div>
                </div>
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
<script>
    function deleteRecord(id)
    {
    var x=confirm("do you want to Delete?")
    if(x==true)
    {
    window.location="user_delete.php?did="+id;
    }

    }
</script>
<script>
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
