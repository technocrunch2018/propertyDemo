<!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3><i class="fa fa-ioxhost"></i> Manage Builders</h3>
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
	                  
	                  <!--<td><?php if($list->status == 0 || $list->status == 2){?><a onclick="return doconfirm();" href = "<?php echo base_url('backend/change_status_user/1/' . $list->user_id);?>">Click To Active</a> -->
            	      <!-- <?php } else{?><a onclick="return doconfirm();" href = "<?php echo base_url('backend/change_status_user/2/' . $list->user_id);?>" >Click to Deactive</a><?php }?></td>-->
					  
					  <td>
                    	  <a class="action-btn edit" href="<?php echo base_url('backend/edit_user/'.$list->user_id); ?>"><i class="fa fa-pencil"></i></a>
                    	  <?php if($this->session->userdata('user_type') != 'admin'){ ?>
                    	  <a  class="action-btn delete" onclick="deleteRecord(<?php echo $list->user_id;?>)" href="javascript:void(0)"> <i class="fa fa-trash"></i></a>
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
          <h4 class="modal-title" style="color:white;font-weight:bold;font-size:20px;">Builder</h4>
        </div>
        <div class="modal-body">
		<form method="POST">
          <div class="row">
		   
			   <div class="col-md-6 col-sm-6 col-xs-6">
			  <label>Builder Id</label><b style="color:red;">*</b>
				<input readonly type="text" name="user_id" value="FL<?php echo rand(100000000,0000000000);?>" id="room" onblur="checkValue(this)"  />
			  </div>
			 
			  <div class="col-md-6 col-sm-6 col-xs-6">
			  <label>Company Name</label><b style="color:red;">*</b>
				<input type="text" name="name" id="room" onblur="checkValue(this)"  />
			  </div>
			  
			  <div class="col-md-6 col-sm-6 col-xs-6">
			  <label>Owner Name</label><b style="color:red;">*</b>
				<input type="text" name="name" id="room" onblur="checkValue(this)"  />
			  </div>

			   <div class="col-md-6 col-sm-6 col-xs-6">
			  <label>Contact Person</label><b style="color:red;">*</b>
				<input type="text" name="mobile" id="room" onblur="checkValue(this)"  />
			  </div>

			   <div class="col-md-6 col-sm-6 col-xs-6">
			  <label>Mobile</label><b style="color:red;">*</b>
				<input type="text" name="mobile_sec" id="room" onblur="checkValue(this)"  />
			  </div>


			   <div class="col-md-6 col-sm-6 col-xs-6">
			  <label>Mobile</label><b style="color:red;">*</b>
			  <fieldset>
				<input class="input--style-5" id="transactionid" onBlur="checkAvailability()" type="text" name="phone"   required   onblur="checkValue(this)">
				<span id="user-availability-status"></span>
  <p><img src="gi.gif" id="loaderIcon" style="display:none;height:90px;width:150px;" /></p>
			  </div>


			   <div class="col-md-6 col-sm-6 col-xs-6">
			  <label>Official Phone</label><b style="color:red;">*</b>
				<input type="text" name="email" id="room" onblur="checkValue(this)"  />
			  </div>
           
             <div class="col-md-6 col-sm-6 col-xs-6">
			  <label>Email</label><b style="color:red;">*</b>
				<input type="text" name="name" id="room" onblur="checkValue(this)"  />
			  </div>
  
			   <div class="col-md-6 col-sm-6 col-xs-6">
			  <label>State</label><b style="color:red;">*</b>
				<input type="text" name="name" id="room" onblur="checkValue(this)"  />
			  </div>

 

			  <div class="col-md-6 col-sm-6 col-xs-6">
			  <label>City</label><b style="color:red;">*</b>
				<input type="text" name="name" id="room" onblur="checkValue(this)"  />
			  </div>

			  <div class="col-md-6 col-sm-6 col-xs-6">
			  <label>Address</label><b style="color:red;">*</b>
				<input type="text" name="name" id="room" onblur="checkValue(this)"  />
			  </div>

			  <div class="col-md-6 col-sm-6 col-xs-6">
			  <label>GST NO.</label><b style="color:red;">*</b>
				<input type="text" name="name" id="room" onblur="checkValue(this)"  />
			  </div>
 
			 
			</div>
 			  <div class="col-md-6 col-sm-6 col-xs-6">
			  <label>HIRA</label><b style="color:red;">*</b>
				<input type="text" name="security_deposite" id="room" onblur="checkValue(this)"  />
			  </div>

			   
 

			  <div class="col-md-6 col-sm-6 col-xs-6">
			  <label>PAN</label><b style="color:red;">*</b>
				<input type="text" placeholder="6 number" name="s_b_u_a" id="room" onblur="checkValue(this)"  />
			  </div>
			   
			   <div class="col-md-6 col-sm-6 col-xs-6">
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
		