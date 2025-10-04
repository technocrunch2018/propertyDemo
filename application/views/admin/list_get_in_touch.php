<script>
    function edit_city(id, state, name)
    {
        $('#id').val(id);
        $('#state').val(state);
        $('#name').val(name);
         $('#myModal').modal();
    }
</script>
<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3><i class="fa fa-ioxhost"></i> Get In Touch</h3>
      </div>
     
    </div>

    <div class="clearfix"></div>

    <div class="row">
	  <div class="col-md-12 col-sm-12 col-xs-12">
	  
        <div class="x_panel">
          <div class="x_title">
            <h2>Get In Touch List</h2>
			
            <div class="clearfix"></div>
          </div> 
          <div class="x_content">
              <table id="datatable-buttons" class="table table-bordered table-striped">
        <thead> 
        <tr>
		  <th>Sno.</th>
		  <th>Phone</th>
		  <th>Email</th>
		  <th>Message</th>
		  <th>Date Time</th>
          <!--<th>Action</th>-->
        </tr>
        </thead>
        <tbody>	
		    <?php if(!empty($list_get_in_touch)){ ?>
		    <?php foreach($list_get_in_touch as $i=>$row){ ?>
			<tr>
			  <td><?php echo $i+1;?></td>
			    
			  <td>
			        
			      <?php echo $row->phone; ?>
			      
			  </td>
			  <td><?php echo $row->email; ?></td>
			  <td><?php echo $row->message; ?></td>
			  <td><?php echo $row->created; ?></td>
			  <!--<td>
                    <a  class="btn btn-danger" onclick="return confirm('Do you want to delete this record?');" href="<?php echo base_url();?>backend/delete_city/<?php echo $row->id;?>"> <i class="fa fa-trash"></i></a>
                </td>-->
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
          <h4 class="modal-title" style="color:white;font-weight:bold;font-size:20px;">Add </h4>
        </div>
        <div class="modal-body">
		    <form method="POST" action="<?php echo base_url(); ?>backend/save_city" enctype="multipart/form-data">
            <div class="row">
			    <div class="col-md-6 col-sm-6 col-xs-6">
			        <label>State</label><b style="color:red;">*</b>
				    <input type="hidden" name="id" id="id" value="0" style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;"  />
				    <select type="text" name="state" id="state"style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;">
				        <?php if(!empty($list_state)){ ?>
				        <?php foreach($list_state as $row){ ?>
				        <option value="<?php echo $row->id; ?>"><?php echo $row->name; ?></option>
				        <?php } ?> 
				        <?php } ?> 
				    </select>
			    </div>
			  
			  <div class="col-md-6 col-sm-6 col-xs-6">
			  <label>Name</label><b style="color:red;">*</b>
				<input type="text" name="name" id="name" style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" />
			  </div>
			  
			  </div>
			  
			 <form>
        </div>
        <div class="modal-footer">
          <input type="submit" name="save" value="Save" class="btn btn-primary"/>
        </div>
      </div>
</div>
</div>

 