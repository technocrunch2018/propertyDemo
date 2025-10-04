<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3><i class="fa fa-ioxhost"></i> Manage Society</h3>
      </div>
     
    </div>

    <div class="clearfix"></div>

    <div class="row">
	  <div class="col-md-12 col-sm-12 col-xs-12">
	  
        <div class="x_panel">
          <div class="x_title">
            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-9">
                    <h2>Complex Society List</h2>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-3">
                    <button type="button" class="effect red effect-5 pull-right" data-toggle="modal" data-target="#myModal" style="width:110px;">ADD New</button>
                </div>
            </div>
            
            <div class="clearfix"></div>
          </div> 
          <div class="x_content">
              <table id="datatable-buttons" class="table table-bordered table-striped">
        <thead> 
        <tr>
		  <th>Sno.</th>
		  <th>State</th>
		  <th>City</th>
		  <th>Pincode</th>
		  <th>Location</th>
		  <th>Society Name</th>
          <th>Action</th>
        </tr>
        </thead>
        <tbody>	
		    <?php if(!empty($list_society)){ ?>
		    <?php foreach($list_society as $i=>$row){ ?>
			<tr>
			  <td><?php echo $i+1;?></td>
			  <td><?php echo $row->state_name;?></td>
			  <td><?php echo $row->city_name;?></td>
			  <td><?php echo $row->pincode;?></td>
			  <td><?php echo $row->location_name;?></td>
			  <td><?php echo $row->name;?></td>
			  <td>
                    <a onclick="edit_society(<?php echo $row->id;?>,'<?php echo $row->name;?>','<?php echo $row->state_id;?>','<?php echo $row->city_id;?>','<?php echo $row->pincode_id;?>','<?php echo $row->location_id;?>')" href="javascript:void(0);"><span class="action-btn edit" title="Edit"><i class="fa fa-pencil"></i></span></a>
                    <a onclick="return confirm('Do you want to delete this record?');" href="<?php echo base_url();?>backend/delete_society/<?php echo $row->id;?>"><span class="action-btn delete" title="Delete"><i class="fa fa-trash"></i></span></a>
                    <?php if($row->status == 0 ||$row->status == 2){ ?>
                    <a onclick="return confirm('Do you want to active this record?');" href="<?php echo base_url();?>backend/active_society/<?php echo $row->id;?>"><span class="action-btn actives">Active</span></a>
                    <?php }else{ ?>
                    <a onclick="return confirm('Do you want to inactive this record?');" href="<?php echo base_url();?>backend/deactive_society/<?php echo $row->id;?>"><span class="action-btn process">Deactive</span></a>
                    <?php } ?>
                </td>
            </tr>
			<?php } ?>		
			<?php } ?>		
        
        </tbody>
       
      </table>
<div class="container">
<!-- Trigger the modal with a button -->




</div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- /page content -->
        




<!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog  modal-lg">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style="background:linear-gradient(to right,#03709e,#18c3fd 100%);">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title" style="color:white;font-weight:bold;font-size:20px;">Add Complex / Society / Building</h4>
        </div>
        <form method="POST" action="<?php echo base_url(); ?>backend/save_society" enctype="multipart/form-data">
        <div class="modal-body">
		    
            <div class="row">
			   <div class="col-md-4 col-sm-6 col-xs-6">
        			    <label>State</label><b style="color:red;">*</b>
        			    <select name="state" id="state" class="from-control" onchange="get_city_list_by_state(this.value)" required>
        			        <option value="">Select State</option>
        			        <?php if(!empty($list_state)){ ?>
        			        <?php foreach($list_state as $state){ ?>
        			        <option value="<?=$state->id;?>"><?=$state->name;?></option>
        			        <?php } ?>
        			        <?php } ?>
        			    </select>
        			  </div>
    			    <div class="col-md-4 col-sm-6 col-xs-6">
    			        <label>City</label><b style="color:red;">*</b>
    				    <select name="city" id="city" class="from-control" onchange="get_pincode_list_by_city(this.value)" required>
        			        <option value="">Select City</option>
        			    </select>
    			    </div>
    			    <div class="col-md-4 col-sm-6 col-xs-6">
    			        <label>Pincode</label><b style="color:red;">*</b>
    				    <select name="pincode" id="pincode" class="from-control" onchange="get_location_list_by_pincode(this.value)" required>
    				        <option value="">Select Pincode</option>
    				    </select>
    			    </div>
    			    
    			    
    			  <div class="col-md-6 col-sm-6 col-xs-12">
    			    <label>Location</label><b style="color:red;">*</b>
    			    <select name="location" id="location" class="from-control" required>
				        <option value="">Select Location</option>
				    </select>
    			  </div>
    			  
    			  <div class="col-md-6 col-sm-6 col-xs-12">
    			    <label>Society Name</label><b style="color:red;">*</b>
    			    <input type="hidden" name="id" id="id" value="0"/>
    				<input type="text" name="name" id="name"/>
    			  </div>
			  
			  </div>
			  
			 
        </div>
        <div class="modal-footer">
          <input type="submit" name="save" value="Save"/>
        </div>
        </form>
      </div>
</div>
</div>

        
<script>
    function edit_society(id, name, state, city, pincode, location)
    {
        $.ajax({
           url:'<?php echo base_url(); ?>backend/get_city_list_by_state',
           type:'post',
           data:{'state':state},
           success:function(data){
               $('#city').html(data);
               $('#city').val(city);
           }
        });
        $.ajax({
           url:'<?php echo base_url(); ?>backend/get_pincode_list_by_city',
           type:'post',
           data:{'city':city},
           success:function(data){
               $('#pincode').html(data);
               $('#pincode').val(pincode);
           }
        });
        $.ajax({
           url:'<?php echo base_url(); ?>backend/get_location_list_by_pincode',
           type:'post',
           data:{'pincode':pincode},
           success:function(data){
               $('#location').html(data);
               $('#location').val(location);
           }
        });
        $('#id').val(id);
        $('#name').val(name);
        $('#state').val(state);
        $('#myModal').modal();
    }
</script>
