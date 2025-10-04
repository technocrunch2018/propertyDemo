
<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3><i class="fa fa-ioxhost"></i> PG Amanities</h3>
      </div>
     
    </div>

    <div class="clearfix"></div>

    <div class="row">
	  <div class="col-md-12 col-sm-12 col-xs-12">
	  
        <div class="x_panel">
          <div class="x_title">
             <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <h2>Amanities List</h2>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <button class="effect red effect-5 pull-right" data-toggle="modal" data-target="#addNewProjectModal" style="width:150px;">Add Amanities</button>
                </div>
            </div>
            <div class="clearfix"></div>
          </div> 
          <div class="x_content">
              <table id="datatable" class="table table-bordered table-striped">
        <thead> 
        <tr>
		  <th>Sno.</th>
		  <th>Name</th>
		  <th>Action</th>
        </tr>
        </thead>
        <tbody>	
		    <?php if(!empty($aminities)){ ?>
		    <?php foreach($aminities as $i=>$row){ ?>
			<tr>
			  <td><?php echo $i+1;?></td>
			  <td><?php echo $row->name; ?></td>
			  
			  <td>
			        <a onclick="edit_project(<?php echo $row->id; ?>, 'edit');" > <span title="Edit" class="label label-default">Edit</span></a>
                    <!--<a  class="btn btn-danger" onclick="return confirm('Do you want to delete this record?');" href="<?php echo base_url();?>backend/delete_location/<?php echo $row->id;?>"> <i class="fa fa-trash"></i></a>-->
                    <!--<a   href="creat.php?id=<?php echo $rows11['id']?>"><i class="fa fa-tasks" aria-hidden="true"></i></a>-->
                    <?php if($row->status == 1){?>
                    <a onclick="return confirm('Do You want to change status of this record?');" href="<?php echo base_url();?>backend/approve_aminities/0/<?php echo $row->id;?>"><span title="Approve" class="label label-success">Active</span></a>
                    <?php }if($row->status == 0){?>
                    <a onclick="return confirm('Do You want to change status of this record?');" href="<?php echo base_url();?>backend/approve_aminities/1/<?php echo $row->id;?>"><span title="Reject" class="label label-warning">Deactive</span></a>
                    <?php } ?>
                    <?php if($this->session->userdata('user_type') != 'admin'){ ?>
                    <a onclick="return confirm('Do You want to delete this record?');" href="<?php echo base_url();?>backend/delete_aminities/<?php echo $row->id;?>"><span title="Delete" class="label label-danger">Delete</span></a>
                    <?php } ?>
                </td>
            </tr>
			<?php } ?>		
			<?php } ?>		
        
        </tbody>
       
      </table>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>



<!-- Modal -->
<div class="modal fade" id="addNewProjectModal" role="dialog">
    <div class="modal-dialog  modal-lg">
        <div class="modal-content">
            <div class="modal-header" style="background:linear-gradient(to right,#03709e,#18c3fd 100%);">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title" style="color:white;font-weight:bold;font-size:20px;">Add Amanities</h4>
            </div>
            <form method="POST" action="<?php echo base_url(); ?>backend/save_amanities">
                <div class="modal-body">
    		        <input type="hidden" name="id" id="post_id" value="0"   />
                    <div class="row">
        			    <div class="col-md-6 col-sm-6 col-xs-6">
        			        <label>Amanity Name</label><b style="color:red;">*</b>
        				    <input type="text" name="name" id="name">
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
    function edit_project(post_id, mode)
    {
        $.ajax
        ({
            type: "POST",
            url: "<?php echo base_url(); ?>backend/edit_aminities",
            data: {post_id:post_id},
            dataType: 'json',
            success: function(data)
            {
                $("#post_id").val(data['id']);
                $("#name").val(data['name']);
                $("#addNewProjectModal").modal();
            }

        });
    }
</script>
 