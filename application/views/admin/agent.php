        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3><i class="fa fa-ioxhost"></i> Manage All Agent</h3>
              </div>
             
            </div>

            <div class="clearfix"></div>

            <div class="row">
			  <div class="col-md-12 col-sm-12 col-xs-12">
			  
                <div class="x_panel">
                  <div class="x_content">
                      <table id="datatable-buttons" class="table table-bordered table-striped">
                <thead> 
                <tr>
				  <th>Sno.</th>
				  <th>Name</th>
				  <th>Email</th>
				  <th>Mobile</th>
				  <th>City</th>
				  <th>State</th>
				  <th>Area</th>
				  <th>Company Name</th>
				  <th>Image</th>
		          <th>Action</th>
                </tr>
                </thead>
                <tbody>
                    <?php $i = 1; foreach($users as $list){?>
					<tr>
					  <td><?php echo $i; ++$i;?></td>
					  <td><?php echo $list->name;?></td>
					  <td><?php echo $list->email;?></td>
					  <td><?php echo $list->phone;?></td>
				      <td><?php echo $list->city;?></td>
				      <td><?php echo $list->state;?></td>
				      <td><?php echo $list->area;?></td>
				      <td><?php echo $list->company_name;?></td>
	                  <td><?php if(!empty($list->profile)){?><img style="height:100px" src="<?php echo base_url($list->profile);?>"><?php }?></td>
	                  
	                  <!--<td><?php if($list->status == 0){?><a onclick="return doconfirm();" href = "<?php echo base_url('backend/change_status_user/1/' . $list->user_id);?>">Click To Active</a> -->
            	      <!-- <?php } else{?><a onclick="return doconfirm();" href = "<?php echo base_url('backend/change_status_user/0/' . $list->user_id);?>" >Click to Deactive</a><?php }?></td>-->
					  <td>
                    	  <a class="action-btn edit" href="<?php echo base_url('backend/edit_user/'.$list->user_id); ?>"><i class="fa fa-pencil"></i></a>
                    	  <?php if($this->session->userdata('user_type') != 'admin'){ ?>
                    	  <a class="action-btn delete"onclick="deleteRecord(<?php echo $list->user_id;?>)" href="javascript:void(0)"> <i class="fa fa-trash"></i></a>
                            <?php } ?>
                      </td>
	                </tr>
	                <?php }?>
                
                </tbody>
               
              </table>
  <div class="container">
  <!-- Trigger the modal with a button -->
 

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog  modal-lg">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style="background:linear-gradient(to right,#03709e,#18c3fd 100%);">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title" style="color:white;font-weight:bold;font-size:20px;">Agent</h4>
        </div>
        <div class="modal-body">
		<form method="POST">
          <div class="row">
		   
			   <div class="col-md-6 col-sm-6 col-xs-12">
			  <label>User Id</label><b style="color:red;">*</b>
				<input readonly type="text" name="user_id" value="FL<?php echo rand(100000000,0000000000);?>" id="room" onblur="checkValue(this)"  />
			  </div>
			 
			  <div class="col-md-6 col-sm-6 col-xs-12">
			  <label>Company Name</label><b style="color:red;">*</b>
				<input type="text" name="name" id="room" onblur="checkValue(this)"  />
			  </div>
			  
			  <div class="col-md-6 col-sm-6 col-xs-12">
			  <label>Name</label><b style="color:red;">*</b>
				<input type="text" name="name" id="room" onblur="checkValue(this)"  />
			  </div>

			   <div class="col-md-6 col-sm-6 col-xs-12">
			  <label>Mobile</label><b style="color:red;">*</b>
				<input type="number" name="mobile" id="room" onblur="checkValue(this)"  />
			  </div>

			   <div class="col-md-6 col-sm-6 col-xs-12">
			  <label>Mobile</label><b style="color:red;">*</b>
				<input type="number" name="mobile_sec" id="room" onblur="checkValue(this)"  />
			  </div>


			   <div class="col-md-6 col-sm-6 col-xs-12">
			  <label>Phone</label><b style="color:red;">*</b>
			  <fieldset>
				<input class="input--style-5" id="transactionid" onBlur="checkAvailability()" type="number" name="phone"   required   onblur="checkValue(this)">
				<span id="user-availability-status"></span><p><img src="gi.gif" id="loaderIcon" style="display:none;height:90px;width:150px;" /></p>
			  </div>


			   <div class="col-md-6 col-sm-6 col-xs-12">
			  <label>E-mail</label><b style="color:red;">*</b>
				<input type="email" name="email" id="room" onblur="checkValue(this)"  />
			  </div>


			   <div class="col-md-6 col-sm-6 col-xs-12">
			  <label>Select One</label><b style="color:red;">*</b>
                <select id="room" >
                <option value="Rent">Rent</option>
                <option value="Sell">Sell</option>
                <option value="Any">Any</option>
                </select>
                </div>
                
                 <div class="col-md-6 col-sm-6 col-xs-12">
			    <label>Select One</label><b style="color:red;">*</b>
                <select id="room" >
                <option value="Residential">Residential</option>
                <option value="Commercial">Commercial</option>
                <option value="Any">Any</option>
                </select>
                </div>


			  <div class="col-md-12 col-sm-12 col-xs-12">
			  <label>Work For</label><b style="color:red;">*</b>
 			  </div>
             
             <div class="col-md-2 col-sm-2 col-xs-2">
 				 				<label>Flat</label><b style="color:red;">*</b>
 				<input type="checkbox" name="name" id="room" onblur="checkValue(this)"  />
			  </div>
			  
			               <div class="col-md-2 col-sm-2 col-xs-2">
 				 				<label>Office</label><b style="color:red;">*</b>
 				<input type="checkbox" name="name" id="room" onblur="checkValue(this)"  />
			  </div>
			               <div class="col-md-2 col-sm-2 col-xs-2">
 				 				<label>House/Bangalow</label><b style="color:red;">*</b>
 				<input type="checkbox" name="name" id="room" onblur="checkValue(this)"  />
			  </div>
			              
			               <div class="col-md-2 col-sm-2 col-xs-2">
 				 				<label>Shop/Showroom</label><b style="color:red;">*</b>
 				<input type="checkbox" name="name" id="room" onblur="checkValue(this)"  />
			  </div>           
			  
			  <div class="col-md-2 col-sm-2 col-xs-2">
 				<label>Pent House</label><b style="color:red;">*</b>
 				<input type="checkbox" name="name" id="room" onblur="checkValue(this)"  />
			  </div>
			             
			               <div class="col-md-2 col-sm-2 col-xs-2">
 				   				<label>Warehouse</label><b style="color:red;">*</b>
 				<input type="checkbox" name="name" id="room" onblur="checkValue(this)"  />
			  </div>
			  <div class="col-md-2 col-sm-2 col-xs-2">
 				 <label>Duplex</label><b style="color:red;">*</b>
 				<input type="checkbox" name="name" id="room" onblur="checkValue(this)"  />
			  </div>

<div class="col-md-2 col-sm-2 col-xs-2">
 				<label>Factory</label><b style="color:red;">*</b>
 				<input type="checkbox" name="name" id="room" onblur="checkValue(this)"  />
			  </div>

<div class="col-md-2 col-sm-2 col-xs-2">
 							  <label>Land</label><b style="color:red;">*</b>
 				<input type="checkbox" name="name" id="room" onblur="checkValue(this)"  />
			  </div>

<div class="col-md-2 col-sm-2 col-xs-2">
 							  <label>Land</label><b style="color:red;">*</b>

 				<input type="checkbox" name="name" id="room" onblur="checkValue(this)"  />
			  </div>


 
			   <div class="col-md-12 col-sm-12 col-xs-12">
			  <label><h2>Working Location</h2></label><b style="color:red;">*</b>
 			  </div>
			  
			   <div class="col-md-6 col-sm-6 col-xs-12">
			  <label>Country</label><b style="color:red;">*</b>
				<input type="text" name="name" id="room" onblur="checkValue(this)"  />
			  </div>


			   <div class="col-md-6 col-sm-6 col-xs-12">
			  <label>State</label><b style="color:red;">*</b>
				<input type="text" name="name" id="room" onblur="checkValue(this)"  />
			  </div>


			  <div class="col-md-6 col-sm-6 col-xs-12">
			  <label>City</label><b style="color:red;">*</b>
				<input type="text" name="name" id="room" onblur="checkValue(this)"  />
			  </div>

			  <div class="col-md-6 col-sm-6 col-xs-12">
			  <label>Location</label><b style="color:red;">*</b>
				<input type="text" name="name" id="room" onblur="checkValue(this)"  />
			  </div>

			  <div class="col-md-6 col-sm-6 col-xs-12">
			  <label>Website</label><b style="color:red;">*</b>
				<input type="text" name="name" id="room" onblur="checkValue(this)"  />
			  </div>
 
			 
			</div>
 			  <div class="col-md-6 col-sm-6 col-xs-12">
			  <label>Address</label><b style="color:red;">*</b>
				<input type="text" name="security_deposite" id="room" onblur="checkValue(this)"  />
			  </div>

			   <div class="col-md-6 col-sm-6 col-xs-12">
			  <label>Description/notes/Details</label><b style="color:red;">*</b>
				<input type="text" name="rent_month" id="room" onblur="checkValue(this)"  />
			  </div>

			  <div class="col-md-6 col-sm-6 col-xs-12">
			  <label>GST number</label><b style="color:red;">*</b>
				<input type="text" name="furnished_status" id="room" onblur="checkValue(this)"  />
			  </div>

			  <div class="col-md-6 col-sm-6 col-xs-12">
			  <label>HIRA</label><b style="color:red;">*</b>
				<input type="text" name="furnished_status" id="room" onblur="checkValue(this)"  />
			  </div>

			  <div class="col-md-6 col-sm-6 col-xs-12">
			  <label>PAN</label><b style="color:red;">*</b>
				<input type="text" placeholder="6 number" name="s_b_u_a" id="room" onblur="checkValue(this)"  />
			  </div>
			   
			   <div class="col-md-6 col-sm-6 col-xs-12">
			  <label>TAN</label><b style="color:red;">*</b>
				<input type="text" name="b_u_a" placeholder="6 number" id="room" onblur="checkValue(this)"  />
			  </div>
			    
 
			  <form>
              </div>

                <div class="modal-footer">
                  <input type="submit" name="save" value="Save"/>
                </div>
              </div>
      
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
							window.location="<?php echo base_url('backend/delete_users/');?>"+id;
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
		