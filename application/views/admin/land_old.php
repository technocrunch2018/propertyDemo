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
<?php
/* session_start();
if(isset($_SESSION['loggedin']))
{
	include('connection.php');
	$logid=$_SESSION['loggedin'];
	$res=mysqli_query($con,"select * from admin where id='$logid'");
	$row=mysqli_fetch_assoc($res);
	
 ?>
 
 <?php
include('db.php');
$sql="select id,name from country";
$stmt=$con->prepare($sql);
$stmt->execute();
$arrCountry=$stmt->fetchAll(PDO::FETCH_ASSOC);*/
?>

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
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
                        <tr>
                            <td><?php echo $i;?></td>
                            <td><?php echo $rows11['property_id'];?></td>
                            <td><?php echo $rows11['state'];?></td>
                            <td><?php echo $rows11['city'];?></td>
                            <td><?php echo $rows11['location'];?></td>
                            <td><?php echo $rows11['landmark'];?></td>
                            <td><?php echo $rows11['rent_sell'];?></td>
                            <td><?php echo $rows11['com_res'];?></td>
                            <td><?php echo $rows11['block'];?></td>
                             <td><?php echo $rows11['land_status'];?></td>
                            <td><?php echo $rows11['existing_owner'];?></td>
                            <td><?php echo $rows11['nature_of_land'];?></td>
                            <td><?php echo $rows11['number_of_owner'];?></td>
                            <td><?php echo $rows11['property_taxt'];?></td>
                            <td><?php echo $rows11['mutation'];?></td>
                            <td><?php echo $rows11['land_facing'];?></td>
                            <td><?php echo $rows11['land_road_wide'];?><?php echo $rows11['land_road_wide_unit'];?></td>
                            <td><?php echo $rows11['land_area'];?><?php echo $rows11['land_area_unit'];?></td>
                            <td><?php echo $rows11['covered_are'];?><?php echo $rows11['covered_are_unit'];?></td>
                            <td><?php echo $rows11['possession'];?></td>
                            <td><?php echo $rows11['possession_date'];?></td>
                            <td><?php echo $rows11['rent_month'];?></td>
                            <td><?php echo $rows11['security_deposite'];?></td>
                            
                            <td>
                                <div class="container">
                                    <!-- Trigger the modal with a button -->
                                    <button type="button" style="background-color:#212121" class="btn btn-info btn-lg" data-toggle="modal" data-target="#<?php echo $rows11['a'];?>"><i class="fa fa-eye" aria-hidden="true"></i>
                                    </button>
                                
                                    <!-- Modal -->
                                    <div class="modal fade" id="<?php echo $rows11['a'];?>" role="dialog">
                                        <div class="modal-dialog">
                                        
                                            <!-- Modal content-->
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
                                                                <   ?php echo $rows11['atm'];?>
                                                                </div>
                                                                <div class="col-sm-3">
                                                                    <?php echo $rows11['bank'];?>
                                                                </div>
                                                                <div class="col-sm-3">
                                                                    <?php echo $rows11['hospital'];?>
                                                                </div>
                                                                <div class="col-sm-3">
                                                                    <?php echo $rows11['railway_station'];?>
                                                                </div>
                                                                <div class="col-sm-3">
                                                                    <?php echo $rows11['metro_station'];?>
                                                                </div>
                                                                <div class="col-sm-3">
                                                                    <?php echo $rows11['main_road'];?>
                                                                </div>
                                                                <div class="col-sm-3">
                                                                    <?php echo $rows11['market'];?>
                                                                </div>
                                                                <div class="col-sm-3">
                                                                    <?php echo $rows11['school'];?>
                                                                </div>
                                                                <div class="col-sm-3">
                                                                    <?php echo $rows11['bus'];?>
                                                                </div>
                                                                <div class="col-sm-3">
                                                                    <?php echo $rows11['water_supply'];?>
                                                                </div>
                                                                <div class="col-sm-3">
                                                                    <?php echo $rows11['auto'];?>
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
                                    <!-- Trigger the modal with a button -->
                                    <button type="button" style="background-color:#212121" class="btn btn-info btn-lg" data-toggle="modal" data-target="#<?php echo $rows11['d'];?>"><i class="fa fa-eye" aria-hidden="true"></i>
                                    </button>
                                
                                    <!-- Modal -->
                                    <div class="modal fade" id="<?php echo $rows11['d'];?>" role="dialog">
                                        <div class="modal-dialog">
                                        
                                            <!-- Modal content-->
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
                                    <!-- Trigger the modal with a button -->
                                    <button type="button" style="background-color:#212121" class="btn btn-info btn-lg" data-toggle="modal" data-target="#<?php echo $rows11['c'];?>"><i class="fa fa-eye" aria-hidden="true"></i>
                                    </button>
                            
                                    <!-- Modal -->
                                    <div class="modal fade" id="<?php echo $rows11['c'];?>" role="dialog">
                                        <div class="modal-dialog">
                                        
                                            <!-- Modal content-->
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
                            
                                </div>
                            </td>

                            <td><?php echo $rows11['added_by'];?></td>
                            <td><?php echo $rows11['route_id'];?></td>
                            <td><?php echo $rows11['added_by'];?>  </td>
                            <td><?php echo $rows11['source_id'];?></td>
                            <td>
                                <div class="container">
                                    <!-- Trigger the modal with a button -->
                                    <button type="button" style="background-color:#212121" class="btn btn-info btn-lg" data-toggle="modal" data-target="#<?php echo $rows11['i'];?>"><i class="fa fa-eye" aria-hidden="true"></i>
                                    </button>
                                
                                    <!-- Modal -->
                                    <div class="modal fade" id="<?php echo $rows11['i'];?>" role="dialog">
                                        <div class="modal-dialog">
                                        
                                            <!-- Modal content-->
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
                            <!--<a target="blank" href="images/stock_images/<?php echo $rows11['image'];?>"><i class="fa fa-eye" aria-hidden="true"></i></a>-->
                            <td>
                                <a target="blank" href="<?php echo $rows11['video']?>"><i style="color:red" class="fa fa-youtube-play" aria-hidden="true"></i></a>
                            </td>
                            <td>
                                <a   href="factory_rent_update.php?bid=<?php echo $rows11['id']?>"><i class="fa fa-pencil"></i></a>
                                <a   onclick="deleteRecord(<?php echo $rows11['id'];?>)" href="javascript:void(0)"> <i class="fa fa-trash"></i></a>
                                <a   href="creat.php?id=<?php echo $rows11['id']?>"><i class="fa fa-tasks" aria-hidden="true"></i></a>
                            </td>				  
                        </tr>
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

<!--Php Insert Code Start--->
 <?php 
  if(isset($_POST['save']))
  {     
        $property_id=$_POST['property_id'];
        $name=$_POST['name'];
        $mobile=$_POST['mobile'];
        $mobile_official=$_POST['mobile_official'];
        $phone=$_POST['phone'];
        $email=$_POST['email'];
        $country=$_POST['country'];
        $state=$_POST['state'];
        $city=$_POST['city'];
        $location=$_POST['location'];
        $landmark=$_POST['landmark'];
        $pin_code=$_POST['pin_code'];
        $address=$_POST['address'];
        $rent_sell=$_POST['rent_sell'];
        $com_res=$_POST['com_res'];
        $type=$_POST['type'];
        $category=$_POST['category'];
        $security_deposite=$_POST['security_deposite'];
        $rent_month=$_POST['rent_month'];
        $land_area=$_POST['land_area'];
        $land_area_unit=$_POST['land_area_unit'];
        $covered_are=$_POST['covered_are'];
        $covered_are_unit=$_POST['covered_are_unit'];
        $room=$_POST['room'];
        $bathroom=$_POST['bathroom'];
        $land_status=$_POST['land_status'];
        $existing_owner=$_POST['existing_owner'];
        $nature_of_land=$_POST['nature_of_land'];
        $number_of_owner=$_POST['number_of_owner'];
        $property_taxt=$_POST['property_taxt'];
        $mutation=$_POST['mutation'];
        $land_facing=$_POST['land_facing'];
        $land_road_wide=$_POST['land_road_wide'];
        $land_road_wide_unit=$_POST['land_road_wide_unit'];
        $possession=$_POST['possession'];
        $possession_date=$_POST['possession_date'];
        $age_of_properties=$_POST['age_of_properties'];
        $property_type=$_POST['property_type'];
        $electricity=$_POST['electricity'];
        $atm=$_POST['atm'];
        $bank=$_POST['bank'];
        $hospital=$_POST['hospital'];
        $railway_station=$_POST['railway_station'];
        $metro_station=$_POST['metro_station'];
        $main_road=$_POST['main_road'];
        $reception=$_POST['reception'];
        $market=$_POST['market'];
        $school=$_POST['school'];
        $bus=$_POST['bus'];
        $water_supply=$_POST['water_supply'];
        $auto=$_POST['auto'];
        $description=$_POST['description'];
        $added_by=$_POST['added_by'];
        $video=$_POST['video'];
        $c=$_POST['c'];
        $d=$_POST['d'];
        $i=$_POST['i'];
        $a=$_POST['a'];
        $imgname = $_FILES['file']['name'];
 
         $sql="insert into land_rent_commercial(property_id,name,mobile,mobile_official,phone,email,country,state,city,location,landmark,pin_code,address,rent_sell,com_res,type,category,security_deposite,rent_month,land_area,land_area_unit,covered_are,covered_are_unit,room,bathroom,land_status,existing_owner,nature_of_land,number_of_owner,property_taxt,mutation,land_facing,land_road_wide,land_road_wide_unit,possession,possession_date,age_of_properties,property_type,electricity,atm,bank,hospital,railway_station,metro_station,main_road,reception,market,school,bus,water_supply,auto,description,image,added_by,video,c,i,d,a)
         value ('$property_id','$name','$mobile','$mobile_official','$phone','$email','$country','$state','$city','$location','$landmark','$pin_code','$address','$rent_sell','$com_res','$type','$category','$security_deposite','$rent_month','$land_area','$land_area_unit','$covered_are','$covered_are_unit','$room','$bathroom','$land_status','$existing_owner','$nature_of_land','$number_of_owner','$property_taxt','$mutation','$land_facing','$land_road_wide','$land_road_wide_unit','$possession','$possession_date','$age_of_properties','$property_type','$electricity','$atm','$bank','$hospital','$railway_station','$metro_station','$main_road','$reception','$market','$school','$bus','$water_supply','$auto','$description','$imgname','$added_by','$video','$c','$i','$d','$a')";
         $result=mysqli_query($con,$sql);
	 	 $imageName =  ''.$_FILES['file']['name'];
         if(move_uploaded_file( $_FILES['file']['tmp_name'], 'images/stock_images/'.$imageName))

	     if (mysqli_affected_rows($con)>0)
	 
	{
   echo '<script>window.location.href="land_rent.php";</script>';
	}
	else
	{
	echo "<script>alert('Allready Existed');</script>";
	}
    }
                                       
  ?> 
<!--Php Insert Code End--->
 
   <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog  modal-lg">
    
       <div class="modal-content">
        <div class="modal-header" style="background:linear-gradient(to right,#03709e,#18c3fd 100%);">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title" style="color:white;font-weight:bold;font-size:20px;">Add Land</h4>
        </div>
        <div class="modal-body">
		<form method="POST" enctype="multipart/form-data">
          <div class="row">
		   
  				<input type="hidden" name="added_by" value="Super Admin" id="room"style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  />
 			   	<input type="hidden" name="property_id" value="<?php echo rand(100000,9000000)?>" id="room"style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  />
                <input type="hidden" name="c" value="<?php echo rand(10000,999999)?>">
                <input type="hidden" name="d" value="<?php echo rand(10000,999999)?>">
                <input type="hidden" name="i" value="<?php echo rand(10000,999999)?>">
                <input type="hidden" name="a" value="<?php echo rand(10000,999999)?>">

			  <div class="col-md-6 col-sm-6 col-xs-6">
			  <label>Name</label><b style="color:red;">*</b>
				<input type="text" name="name" id="room"style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  />
			  </div>

			    <script>
    function isNumberKey(evt){
        var charCode = (evt.which) ? evt.which : evt.keyCode;
        if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;
        return true;
    }
    </script>
   <div class="col-md-6 col-sm-6 col-xs-6">
  <label>Mobile</label><b style="color:red;">*</b>
   <input type=text   size=20 maxlength=10 onkeypress='return isNumberKey(event)'  name="mobile"style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;"    />
  </div>

   <div class="col-md-6 col-sm-6 col-xs-6">
  <label>Mobile</label><b style="color:red;">*</b>
<input type="text" size=20 maxlength=10 onkeypress='return isNumberKey(event)' name="mobile_official" id="room"style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  />
  </div>


   <div class="col-md-6 col-sm-6 col-xs-6">
  <label>Phone</label><b style="color:red;">*</b>
  <fieldset>
<input type="text" class="input--style-5" size=20 maxlength=15 onkeypress='return isNumberKey(event)'  name="phone" min="15"      style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)">
<!--<span id="user-availability-status"></span> id="transactionid"-->
  <!--<p><img src="gi.gif" id="loaderIcon" style="display:none;height:90px;width:150px;" /></p>-->
  </div>


			   <div class="col-md-6 col-sm-6 col-xs-6">
			  <label>E-mail</label><b style="color:red;">*</b>
				<input type="text" name="email" id="room"style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  />
			  </div>

<div class="col-md-6 col-sm-6 col-xs-6">
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
<!--   <div class="col-md-6 col-sm-6 col-xs-6">-->
<!--  <label>State</label><b style="color:red;">*</b>-->
<!--<input type="text" name="state" id="room"style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  />-->
<!--  </div>-->


   <div class="col-md-6 col-sm-6 col-xs-6">
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


    <div class="col-md-6 col-sm-6 col-xs-6">
  <label>Location</label><b style="color:red;">*</b>
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
                <div style=" padding:15px; margin-top:10px;">
                
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

			   

			  <div class="col-md-6 col-sm-6 col-xs-6">
			  <label>Land Mark</label><b style="color:red;">*</b>
				<input type="text" name="landmark" id="room"style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  />
			  </div>

			  <div class="col-md-6 col-sm-6 col-xs-6">
			  <label>Pincode</label><b style="color:red;">*</b>
				<input type="text"  onkeypress='return isNumberKey(event)' size=20 name="pin_code" id="room"style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  />
			  </div>

			  <div class="col-md-6 col-sm-6 col-xs-6">
			  <label>Address</label><b style="color:red;">*</b>
				<input type="text" name="address" id="room"style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  />
			  </div>


			  <div class="col-md-6 col-sm-6 col-xs-6">
			  <label>Property for</label><b style="color:red;">*</b>
				<select name="rent_sell" id="room"style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)" >
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

		 
			<!--<div class="col-md-6 col-sm-6 col-xs-6">-->
			<!--  <label>Select One</label><b style="color:red;">*</b>-->
			<!--	<input type="text" value="Land" readonly name="category" id="com_res"style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)" >-->
				 

			<!--</div>-->
 			  <div class="col-md-6 col-sm-6 col-xs-6">
			  <label>Security Deposite</label><b style="color:red;">*</b>
				<input type="text" maxlength=15 name="security_deposite" onkeypress='return isNumberKey(event)' id="room"style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  />
			  </div>

			   <div class="col-md-6 col-sm-6 col-xs-6">
			  <label>Rent / Month</label><b style="color:red;">*</b>
				<input  type="text" maxlength=15 name="rent_month" onkeypress='return isNumberKey(event)' id="room"style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  />
			  </div>
 
			  <div class="col-md-6 col-sm-6 col-xs-6">
			  <label>Land Area</label><b style="color:red;">*</b>
				<input type="number" min="0"  name="land_area" id="room"style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  />
			  </div>
			  <div class="col-md-6 col-sm-6 col-xs-6">
			  <label>Unit</label><b style="color:red;">*</b>
				<select type="text" placeholder="sqft v" name="land_area_unit" id="room"style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  />
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
				<input type="number" min="0"  name="covered_are" id="room"style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  />
			  </div>
			  <div class="col-md-6 col-sm-6 col-xs-6">
			  <label>Unit</label><b style="color:red;">*</b>
				<select type="text" placeholder="sqft v" name="covered_are_unit" id="room"style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  />
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
 
			 <!-- <div class="col-md-6 col-sm-6 col-xs-6">-->
			 <!-- <label>Room</label><b style="color:red;">*</b>-->
				<!--<input type="text" name="room" id="room"style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  />-->
			 <!-- </div>-->

			 <!-- <div class="col-md-6 col-sm-6 col-xs-6">-->
			 <!-- <label>Bathroom</label><b style="color:red;">*</b>-->
				<!--<input type="number" min="0"  name="bathroom" id="room"style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  />-->
			 <!-- </div>-->

			   <div class="col-md-6 col-sm-6 col-xs-6">
			  <label>Land Status</label><b style="color:red;">*</b>
				<select name="land_status" id="room"style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)" >
					<option>---Select---</option>
					<option value="Vacant">Vacant</option>
					<option value="Occupied">Occupied</option>
				</select>		  
			</div>

			<div class="col-md-6 col-sm-6 col-xs-6">
			  <label>Is The Existing Owner</label><b style="color:red;">*</b>
				<select name="existing_owner" id="room"style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)" >
					<option>---Select---</option>
					<option value="Alive">Alive</option>
					<option value="Decrease">Decrease</option>
				</select>		  
			</div>



			  <div class="col-md-6 col-sm-6 col-xs-6">
			  <label>Nature Of Land</label><b style="color:red;">*</b>
				<input type="number" min="0"  name="nature_of_land" id="room"style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  />
			  </div>

			  <div class="col-md-6 col-sm-6 col-xs-6">
			 <label>Number Of Owner</label><b style="color:red;">*</b>
            <select name="number_of_owner" id="room"style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)" >
					<option>---Select---</option>
					<option value="Normal">Normal</option>
					<option value="Agriculture">Agriculture</option>
					<option value="Industrial">Industrial</option>
				</select>
			  </div>


			  <div class="col-md-6 col-sm-6 col-xs-6">
			 <label>Property Tax</label><b style="color:red;">*</b>
            <select name="property_taxt" id="room"style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)" >
					<option>---Select---</option>
					<option value="Dues">Dues</option>
					<option value="Paid">Paid</option>
 				</select>
			  </div>


			  <div class="col-md-6 col-sm-6 col-xs-6">
			 <label>Mutation</label><b style="color:red;">*</b>
            <select name="mutation" id="room"style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)" >
					<option>---Select---</option>
					<option value="Done">Done</option>
					<option value="Not Done">Not Done</option>
 				</select>
			  </div>


			  <div class="col-md-6 col-sm-6 col-xs-6">
			 <label>Land Facing</label><b style="color:red;">*</b>
            <select name="land_facing" id="room"style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)" >
					<option>---Select---</option>
					<option value="South">South</option>
					<option value="North">North</option>
					<option value="East">East</option>
					<option value="West">West</option>
 				</select>
			  </div>
 

			<div class="col-md-6 col-sm-6 col-xs-6">
			  <label>Land Road Wide</label><b style="color:red;">*</b>
				<input type="number" min="0"  name="land_road_wide" id="room"style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  />
			  </div>


            <div class="col-md-6 col-sm-6 col-xs-6">
			  <label>Unit</label><b style="color:red;">*</b>
				<select type="number" min="0"  placeholder="sqft/MT" name="land_road_wide_unit" id="room"style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  />
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
				<select name="possession" id="room"style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)" >
					<option>---Select---</option>
					<option value="Ready To Move">Ready To Move</option>
					<option value="Possession From">Possession From</option>
				</select>		  
			</div>
			    
			    <div class="col-md-6 col-sm-6 col-xs-6">
			  <label>Possession Date</label><b style="color:red;">*</b>
				<input type="date"   name="possession_date"  style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  />
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
				<select name="property_type" id="room"style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)" >
					<option>---Select---</option>
					<option value="Freehold">Freehold</option>
					<option value="Lease">Lease</option>
					<option value="Power Of Attoney">Power Of Attoney</option>
					<option value="Unregister">Unregister</option>
				</select>		  
			</div>

			 <div class="col-md-12 col-sm-12 col-xs-12">
			  <label>Amenities</label><b style="color:red;">*</b>
 				<br><input type="checkbox" value="Electricity" name="electricity" id="room"style="padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  />Electricity

 				<br><input type="checkbox"   value="ATM" name="atm" id="room"style="padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  /> ATM

 				<br><input type="checkbox"   value="Bank" name="bank" id="room"style="padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  /> Bank

 				<br><input type="checkbox"   value="Hospital" name="hospital" id="room"style="padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  /> Hospital

 				<br><input type="checkbox" value="Railway Station" name="railway_station" id="room"style="padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  /> Railway Station
			  
			  <br><input type="checkbox" value="Metro Station" name="metro_station" id="room"style="padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  /> Metro Station
			  
			<br><input type="checkbox" value="Main Road" name="main_road" id="room"style="padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  /> Main Road
            <br><input type="checkbox" value="Market" name="market" id="room"style="padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  /> Market
            
            <br><input type="checkbox" value="School" name="school" id="room"style="padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  /> School
            			  
            <br><input type="checkbox" value="Bus" name="bus" id="room"style="padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  /> Bus
            
            <br><input type="checkbox" value="Water" name="water" id="room"style="padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  /> Water Supply
            			  
			  <br><input type="checkbox" value="Auto" name="auto" id="room"style="padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  /> Auto
			  </div>
			  </div>

             <div class="col-md-12 col-sm-12 col-xs-12	">
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
			  
          </div>

        <div class="modal-footer">
          <input type="submit" name="save" value="Save" class="btn btn-primary"/>
        </div>
      </div>
      </form>
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

<script>
	function deleteRecord(id)
	{
		var x=confirm("do you want to Delete?")
		if(x==true)
		{
			window.location="land_rent_delete.php?did="+id;
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
