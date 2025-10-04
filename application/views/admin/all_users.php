        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3><i class="fa fa-ioxhost"></i> Manage Users</h3>
              </div>

             
            </div>

            <div class="clearfix"></div>

            <div class="row">
			  <div class="col-md-12 col-sm-12 col-xs-12">
			  
                <div class="x_panel">
                  <!-- <div class="x_title">
                    <h2>Room Type List</h2>
					<button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#myModal">+ADD ROOM TYPE</button>
                    
                    <div class="clearfix"></div>
                  </div> -->
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
					  <td>
                    	  <a class="action-btn edit" href="user_update.php?bid=<?php echo $list->user_id; ?>"><i class="fa fa-pencil"></i></a>
                    	  <a class="action-btn delete" onclick="deleteRecord(<?php echo $list->user_id;?>)" href="javascript:void(0)"> <i class="fa fa-trash"></i></a>
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
          <h4 class="modal-title" style="color:white;font-weight:bold;font-size:20px;">Add </h4>
        </div>
        <div class="modal-body">
		    <form method="POST" action="<?php echo base_url(); ?>backend/save_testimonial">
            <div class="row">
			    <div class="col-md-6 col-sm-6 col-xs-6">
			        <label>Type</label><b style="color:red;">*</b>
				    <input type="hidden" name="id" id="id" value="0"  onblur="checkValue(this)"  />
				    <input type="text" name="type" id="type" onblur="checkValue(this)"  />
			    </div>
			  
			  <div class="col-md-6 col-sm-6 col-xs-6">
			  <label>Name</label><b style="color:red;">*</b>
				<input type="text" name="name" id="name" onblur="checkValue(this)"  />
			  </div>
			  
			  </div>
			  <div class="row">
			    <div class="col-md-12 col-sm-6 col-xs-6">
			        <label>Description</label><b style="color:red;">*</b>
				    <textarea type="text" name="desc" id="desc"  ></textarea>
			    </div>
			  
			  </div>
			  <div class="row">
			    <div class="col-md-12 col-sm-6 col-xs-6">
			        <label>Image</label><b style="color:red;">*</b>
				    <input type="file" name="image" id="image" onblur="checkValue(this)"  />
			    </div>
			  
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
		