<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3><i class="fa fa-ioxhost"></i> Manage State</h3>
      </div>
     
    </div>

    <div class="clearfix"></div>

    <div class="row">
	  <div class="col-md-12 col-sm-12 col-xs-12">
	  
        <div class="x_panel">
          <div class="x_title">
            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-6">
                    <h2>State List</h2>
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
		  <th>Status</th>
          <th>Action</th>
        </tr>
        </thead>
        <tbody>	
		    <?php if(!empty($list_state)){ ?>
		    <?php foreach($list_state as $i=>$row){ ?>
			<tr>
			  <td><?php echo $i+1;?></td>
			  <td><?php echo $row->name;?></td>
			  <td><?php if($row->status == 1){?><a href = "<?php echo base_url('backend/state_status/0/' . $row->id);?>"> Active </a><?php }else{?> <a href = "<?php echo base_url('backend/state_status/1/' . $row->id);?>"> Deactive </a> <?php }?></td>
			  <td>
                    <a class="action-btn edit" onclick="edit_state(<?php echo $row->id;?>,'<?php echo $row->name;?>')" href="javascript:void(0);"><i class="fa fa-pencil"></i></a>
                    <a class="action-btn delete" onclick="return confirm('Do you want to delete this record?');" href="<?php echo base_url();?>backend/delete_state/<?php echo $row->id;?>"> <i class="fa fa-trash"></i></a>
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
          <h4 class="modal-title" style="color:white;font-weight:bold;font-size:20px;">Add State </h4>
        </div>
        <form method="POST" action="<?php echo base_url(); ?>backend/save_state" enctype="multipart/form-data">
            <div class="modal-body">
                <div class="row">
    			  <div class="col-md-6 col-sm-6 col-xs-6">
    			  <label>State Name</label><b style="color:red;">*</b>
    			  <input type="hidden" name="id" id="id" value="0"/>
    				<input type="text" name="name" id="name" />
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
    function edit_state(id, name)
    {
        $('#id').val(id);
        $('#name').val(name);
        $('#myModal').modal();
    }
</script>
