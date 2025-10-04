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

<div class="right_col" role="main">
	<div class="page-title">
		<div class="title_left">
			<h3><i class="fa fa-ioxhost"></i> Manage Shop</h3>
		</div>
	</div>

	<div class="clearfix"></div>

	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">

			<div class="x_panel">
				<div class="x_title">
					<h2>Shop Buyer List</h2>
					<button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#myModal">+ADD Shop</button>

					<div class="clearfix"></div>
				</div>
				<div class="x_content">
					<table id="datatable-buttons" class="table table-bordered table-striped">
						<thead style="background:#337ab7;color:white;"> 
							<tr>
								<th>Sno.</th>
								<th>Name</th>
								<th>Mobile</th>
								<th>Mobile(Official)</th>
								<th>Email</th>
								<th>Email (Official)</th>
								<th>Address</th>
								<th>Address(C)</th>
								<th>Password</th>
								<th>Gender</th>
								<th>Image</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>

							<tr>
								<td><?php echo $i;?></td>
								<td><?php echo $rows11['name'];?></td>
								<td><?php echo $rows11['mobile'];?></td>
								<td><?php echo $rows11['mobile_official'];?></td>
								<td><?php echo $rows11['email'];?></td>
								<td><?php echo $rows11['email_official'];?></td>
								<td><?php echo $rows11['address'];?></td>
								<td><?php echo $rows11['current_address'];?></td>
								<td><?php echo $rows11['password'];?></td>
								<td><?php echo $rows11['gender'];?></td>
								<td><img style="height:100px" src="images/user_images/<?php echo $rows11['image'];?>"></td>



								<td>
									<a class="btn btn-primary" href="user_update.php?bid=<?php echo $rows11['id']?>"><i class="fa fa-pencil"></i></a>
									<a  class="btn btn-danger"onclick="deleteRecord(<?php echo $rows11['id'];?>)" href="javascript:void(0)"> <i class="fa fa-trash"></i></a></td>
								</tr>


							</tbody>

						</table>
					</div>
			</div>
		</div>
	</div>
</div>



<div class="container">


	<!-- Modal -->
	<div class="modal fade" id="myModal" role="dialog">
		<div class="modal-dialog  modal-lg">

			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header" style="background:linear-gradient(to right,#03709e,#18c3fd 100%);">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title" style="color:white;font-weight:bold;font-size:20px;">Add Shop</h4>
				</div>
				<div class="modal-body">
					<form method="POST">
						<div class="row">

							<div class="col-md-6 col-sm-6 col-xs-6">
								<label>User Id</label><b style="color:red;">*</b>
								<input type="text" name="user_id" id="room"style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  />
							</div>

							<div class="col-md-6 col-sm-6 col-xs-6">
								<label>Name</label><b style="color:red;">*</b>
								<input type="text" name="name" id="room"style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  />
							</div>

							<div class="col-md-6 col-sm-6 col-xs-6">
								<label>Mobile</label><b style="color:red;">*</b>
								<input type="text" name="mobile" id="room"style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  />
							</div>

							<div class="col-md-6 col-sm-6 col-xs-6">
								<label>Mobile</label><b style="color:red;">*</b>
								<input type="text" name="mobile_sec" id="room"style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  />
							</div>


							<div class="col-md-6 col-sm-6 col-xs-6">
								<label>Phone</label><b style="color:red;">*</b>
									<input class="input--style-5" id="transactionid" onBlur="checkAvailability()" type="text" name="phone"   required  style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)">
									<span id="user-availability-status"></span>
									<p><img src="gi.gif" id="loaderIcon" style="display:none;height:90px;width:150px;" /></p>
							</div>


							<div class="col-md-6 col-sm-6 col-xs-6">
								<label>E-mail</label><b style="color:red;">*</b>
								<input type="text" name="email" id="room"style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  />
							</div>


							<div class="col-md-6 col-sm-6 col-xs-6">
								<label>Country</label><b style="color:red;">*</b>
								<input type="text" name="country" id="room"style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  />
							</div>


							<div class="col-md-6 col-sm-6 col-xs-6">
								<label>State</label><b style="color:red;">*</b>
								<input type="text" name="name" id="room"style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  />
							</div>


							<div class="col-md-6 col-sm-6 col-xs-6">
								<label>City</label><b style="color:red;">*</b>
								<input type="text" name="name" id="room"style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  />
							</div>


							<div class="col-md-6 col-sm-6 col-xs-6">
								<label>Location</label><b style="color:red;">*</b>
								<input type="text" name="name" id="room"style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  />
							</div>


							<div class="col-md-6 col-sm-6 col-xs-6">
								<label>Land Mark</label><b style="color:red;">*</b>
								<input type="text" name="name" id="room"style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  />
							</div>

							<div class="col-md-6 col-sm-6 col-xs-6">
								<label>Pin Code</label><b style="color:red;">*</b>
								<input type="text" name="name" id="room"style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  />
							</div>

							<div class="col-md-6 col-sm-6 col-xs-6">
								<label>Address</label><b style="color:red;">*</b>
								<input type="text" name="name" id="room"style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  />
							</div>


							<div class="col-md-6 col-sm-6 col-xs-6">
								<label>Select One</label><b style="color:red;">*</b>
								<select name="Buyer_rent" id="room"style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)" >
									<option>---Select---</option>
									<option value="rent">Rent</option>
									<option value="Buyer">Buyer</option>
								</select>		  
							</div>

							<div class="col-md-6 col-sm-6 col-xs-6">
								<label>Select One</label><b style="color:red;">*</b>
								<select name="Buyer_rent" id="com_res"style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)" >
									<option>---Select---</option>
									<option value="Commercial">Commercial</option>
									<option value="Residential">Residential</option>
								</select>		  
							</div>

							<div class="col-md-6 col-sm-6 col-xs-6">
								<label>Select One</label><b style="color:red;">*</b>
								<select name="h_p_l" id="com_res"style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)" >
									<option>---Select---</option>
									<option value="House/Banglow">House/Banglow</option>
									<option value="Pent House">Pent House</option>
									<option value="Land">Land</option>
								</select>		  
							</div>

							<div class="col-md-6 col-sm-6 col-xs-6">
								<label>Select One</label><b style="color:red;">*</b>
								<select name="s_w_f_l" id="com_res"style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)" >
									<option>---Select---</option>
									<option value="Shop">Shop</option>
									<option value="Shop or Showroom">Shop or Showroom</option>
									<option value="Ware House">Ware House</option>
									<option value="Shop">Shop</option>
									<option value="Land">Land</option>
								</select>	

							</div>
							<div class="col-md-6 col-sm-6 col-xs-6">
								<label>Minimum Price</label><b style="color:red;">*</b>
								<input type="number" name="min_price" id="room"style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  />
							</div>

							<div class="col-md-6 col-sm-6 col-xs-6">
								<label>Maximum Price</label><b style="color:red;">*</b>
								<input type="number" name="max_price" id="room"style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  />
							</div>


							<div class="col-md-6 col-sm-6 col-xs-6">
								<label>Complex / Society Building Name</label><b style="color:red;">*</b>
								<input type="text" name="furnished_status" id="room"style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  />
							</div>

							<div class="col-md-3 col-sm-3 col-xs-3">
								<label>Mini Frontage</label><b style="color:red;">*</b>
								<input type="number" name="frontage" id="room"style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  />
							</div>
							<div class="col-md-3 col-sm-3 col-xs-3">
								<label>Unit</label><b style="color:red;">*</b>
								<input type="text" placeholder="Ft/Mt" name="s_unit" id="room"style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  />
							</div>

							<div class="col-md-3 col-sm-3 col-xs-3">
								<label>Minimum Area Required</label><b style="color:red;">*</b>
								<input type="number" name="min_a_r" id="room"style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  />
							</div>

							<div class="col-md-3 col-sm-3 col-xs-3">
								<label>Maximum Area Required</label><b style="color:red;">*</b>
								<input type="number" name="max_a_r" id="room"style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  />
							</div>
							<div class="col-md-3 col-sm-3 col-xs-3">
								<label>Unit</label><b style="color:red;">*</b>
								<input type="text" placeholder="sqft v" name="b_unit" id="room"style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  />
							</div>

							<div class="col-md-3 col-sm-3 col-xs-3">
								<label>Bathroom</label><b style="color:red;">*</b>
								<input type="number" name="bathroom" id="room"style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  />
							</div>

							<div class="col-md-6 col-sm-6 col-xs-6">
								<label>Use For</label><b style="color:red;">*</b>
								<select name="user_for_s" id="room"style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)" >
									<option>---Select---</option>
									<option value="Personal">Personal</option>
									<option value="Common">Common</option>
								</select>		  
							</div>




							<div class="col-md-6 col-sm-6 col-xs-6">
								<label>Available For Bar</label><b style="color:red;">*</b>
								<select name="available_for_bar" id="room"style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)" >
									<option>---Select---</option>
									<option value="Yes">Yes</option>
									<option value="No">No</option>
								</select>		  
							</div>


							<div class="col-md-6 col-sm-6 col-xs-6">
								<label>Restaurant</label><b style="color:red;">*</b>
								<select name="restaurant" id="room"style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)" >
									<option>---Select---</option>
									<option value="Yes">Yes</option>
									<option value="No">No</option>
								</select>		  
							</div>


							<div class="col-md-3 col-sm-3 col-xs-3">
								<label>Nature Of Business</label><b style="color:red;">*</b>
								<input type="text" placeholder="3 Wheeler /4 Wheeler" name="nature_of_business" id="room"style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  />
							</div>

							<div class="col-md-6 col-sm-6 col-xs-6">
								<label>Home Loan Required</label><b style="color:red;">*</b>
								<select name="home_loan" id="room"style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)" >
									<option>---Select---</option>
									<option value="yes"> Yes</option>
									<option value="no">No</option>
								</select>		  
							</div>

							<div class="col-md-6 col-sm-6 col-xs-6">
								<label>Bank</label><b style="color:red;">*</b>
								<select name="bank" id="room"style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)" >
									<option>---Select---</option>
									<option value="yes"> HDFC</option>
									<option value="no">KOTAK</option>
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
								<input type="text" placeholder="DD/MM/YYYY"   name="possession_date"  style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  />
							</div>

							<div class="col-md-3 col-sm-3 col-xs-3">
								<label>Number And Type Of Parking</label><b style="color:red;">*</b>
								<input type="number"   name="open" placeholder="open" id="room"style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  />
							</div>
							<div class="col-md-3 col-sm-3 col-xs-3">
								<label>Type In Number</label><b style="color:red;">*</b>
								<input type="number" placeholder="covered"   name="covered" id="room"style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  />
							</div>

							<div class="col-md-3 col-sm-3 col-xs-3">
								<label>Type In Number</label><b style="color:red;">*</b>
								<input type="number" name="basement" placeholder="Basement" id="room"style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  />
							</div>

							<div class="col-md-3 col-sm-3 col-xs-3">
								<label>Type In Number</label><b style="color:red;">*</b>
								<input type="number" placeholder="Lift Parking"name="lift_parking" id="room"style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  />
							</div>

							<div class="col-md-3 col-sm-3 col-xs-3">
								<label>Age Of Properties</label><b style="color:red;">*</b>
								<input type="number" name="age_of_properties" id="room"style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  />
							</div>

							<div class="col-md-3 col-sm-3 col-xs-3">
								<label>Property Type</label><b style="color:red;">*</b>
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
								<br><input type="checkbox" name="power_backup" id="room"style="padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  /> Power Backup

								<br><input type="checkbox" name="lit" id="room"style="padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  /> Lift

								<br><input type="checkbox" name="service" id="room"style="padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  /> Service Lift

								<br><input type="checkbox" name="security" id="room"style="padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  /> Security

								<br><input type="checkbox" name="cctv" id="room"style="padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  /> CCTV

								<br><input type="checkbox" name="visitor_parking" id="room"style="padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  /> Visitor Parking


								<br><input type="checkbox" name="confrence_room" id="room"style="padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  /> Confrence Room
								<br><input type="checkbox" name="reception" id="room"style="padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  /> Reception

								<br><input type="checkbox" name="wifi" id="room"style="padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  /> WIFI

								<br><input type="checkbox" name="intercom" id="room"style="padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  /> Intercom


								<br><input type="checkbox" name="two_wheeler_parking" id="room"style="padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  /> Two Wheeler Parking

								<br><input type="checkbox" name="water" id="room"style="padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  /> Water
							</div>

							<div class="col-md-12 col-sm-12 col-xs-12	">
								<label>Description</label><b style="color:red;">*</b>
								<textarea   maxlength="10" placeholder="100 words only" name="decription" id="room"style="padding:3px;border: 1px solid #dddd;width:100%;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"></textarea>
							</div>

							<div class="col-md-3 col-sm-3 col-xs-3">
								<label>Image</label><b style="color:red;">*</b>
								<input type="file" name="image" id="room"style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  />
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
		