<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3><i class="fa fa-ioxhost"></i> Manage Banks</h3>
      </div>
     
    </div>

    <div class="clearfix"></div>

    <div class="row">
	  <div class="col-md-12 col-sm-12 col-xs-12">
	  
        <div class="x_panel">
          <div class="x_title">
            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-6">
                    <h2>Bank List</h2>
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
		  <th>Bank Name</th>
          <th>Action</th>
        </tr>
        </thead>
        <tbody>	
		    <?php if(!empty($list_bank)){ ?>
		    <?php foreach($list_bank as $i=>$row){ ?>
			<tr>
			  <td><?php echo $i+1;?></td>
			  <td><?php echo $row->name;?></td>
			  <td>
                    <a onclick="edit_bank(<?php echo $row->id;?>,'<?php echo $row->name;?>')" href="javascript:void(0);"><span class="action-btn edit" title="Edit"><i class="fa fa-pencil"></i></span></a>
                    <a onclick="return confirm('Do you want to delete this record?');" href="<?php echo base_url();?>backend/delete_bank/<?php echo $row->id;?>"><span class="action-btn delete" title="Delete"><i class="fa fa-trash"></i></span></a>
                    <?php if($row->status == 0 || $row->status == 2){ ?>
                    <a onclick="return confirm('Do you want to active this record?');" href="<?php echo base_url();?>backend/active_bank/<?php echo $row->id;?>"><span class="action-btn actives">Active</span></a>
                    <?php }else{ ?>
                    <a onclick="return confirm('Do you want to inactive this record?');" href="<?php echo base_url();?>backend/deactive_bank/<?php echo $row->id;?>"><span class="action-btn process">Deactive</span></a>
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
          <h4 class="modal-title" style="color:white;font-weight:bold;font-size:20px;">Add Bank</h4>
        </div>
        <form method="POST" action="<?php echo base_url(); ?>backend/save_bank" enctype="multipart/form-data">
        <div class="modal-body">
            <div class="row">
			  <div class="col-md-6 col-sm-6 col-xs-12">
			  <label>Bank Name</label><b style="color:red;">*</b>
			  <input type="hidden" name="id" id="id" value="0"/>
				<input type="text" name="name" id="name"/>
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
    function edit_bank(id, name)
    {
        $('#id').val(id);
        $('#name').val(name);
        $('#myModal').modal();
    }
    
</script>
