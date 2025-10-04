<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3><i class="fa fa-ioxhost"></i> Manage Pincode</h3>
      </div>
     
    </div>

    <div class="clearfix"></div>

    <div class="row">
	  <div class="col-md-12 col-sm-12 col-xs-12">
	  
        <div class="x_panel">
          <div class="x_title">
            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-6">
                    <h2>Pincode List</h2>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-6">
                    <button type="button" class="effect red effect-5 pull-right" data-toggle="modal" data-target="#myModal">ADD New</button>
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
          <th>Action</th>
        </tr>
        </thead>
        <tbody>	
		    <?php if(!empty($list_pincode)){ ?>
		    <?php foreach($list_pincode as $i=>$row){ ?>
			<tr>
			  <td><?php echo $i+1;?></td>
			  <td><?php echo $row->state_name;?></td>
			  <td><?php echo $row->city_name;?></td>
			  <td><?php echo $row->pincode;?></td>
			  
			  <td>
                    <a onclick="edit_pincode(<?php echo $row->id;?>,'<?php echo $row->pincode;?>','<?php echo $row->state_id;?>','<?php echo $row->city_id;?>')" href="javascript:void(0);"><span class="action-btn edit" title="Edit"><i class="fa fa-pencil"></i></span></a>
                    <a onclick="return confirm('Do you want to delete this record?');" href="<?php echo base_url();?>backend/delete_pincode/<?php echo $row->id;?>"><span class="action-btn delete" title="Delete"><i class="fa fa-trash"></i></span></a>
                    <!--<?php if($row->status == 0 || $row->status == 2){ ?>
                    <a onclick="return confirm('Do you want to active this record?');" href="<?php echo base_url();?>backend/active_pincode/<?php echo $row->id;?>"><span class="label label-primary">Active</span></a>
                    <?php }else{ ?>
                    <a onclick="return confirm('Do you want to inactive this record?');" href="<?php echo base_url();?>backend/deactive_pincode/<?php echo $row->id;?>"><span class="label label-warning">Deactive</span></a>
                    <?php } ?>-->
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
          <h4 class="modal-title" style="color:white;font-weight:bold;font-size:20px;">Save Pincode</h4>
        </div>
        <form method="POST" action="<?php echo base_url(); ?>backend/save_pincode" enctype="multipart/form-data">
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
			    <select name="city" id="city" class="from-control" required>
			        <option value="">Select City</option>
			    </select>
			  </div>
			  <div class="col-md-4 col-sm-6 col-xs-6">
			    <label>Pincode</label><b style="color:red;">*</b>
			    <input type="hidden" name="id" id="id" value="0"/>
				<input type="text" name="pincode" id="pincode"/>
			  </div>
			  
			  
			  <!--<div class="col-md-6 col-sm-6 col-xs-6">
			  <label>City</label><b style="color:red;">*</b>
			  	<input type="text" name="city" id="city" onkeyup="load_cities()" class="form-control" />
			  </div>-->
			  
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
    function edit_pincode(id, pincode, state, city)
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
        $('#id').val(id);
        $('#pincode').val(pincode);
        $('#state').val(state);
        
        $('#myModal').modal();
    }
    
    
    /*function load_cities(){
        var city = $('#city').val();
        $.ajax({
           url:'<?php echo base_url(); ?>backend/get_cities',
           type:'post',
           data:{'city':city},
           success:function(data){
               set_cities(data);
           }
        });
    }
    
    function set_cities(data){
         availableTags = JSON.parse(data); 
             $( "#city" ).autocomplete({
          source: availableTags
        });
    }*/
</script>
