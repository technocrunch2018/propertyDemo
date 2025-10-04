<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3><i class="fa fa-ioxhost"></i> Manage Testimonials</h3>
      </div>
     
    </div>

    <div class="clearfix"></div>

    <div class="row">
	  <div class="col-md-12 col-sm-12 col-xs-12">
	  
        <div class="x_panel">
          <div class="x_title">
            <h2>Testimonials List</h2>
			<button type="button" class="effect effect-5 red pull-right" data-toggle="modal" data-target="#myModal">ADD NEW</button>
            
            <div class="clearfix"></div>
          </div> 
          <div class="x_content">
              <table id="datatable-buttons" class="table table-bordered table-striped">
        <thead> 
        <tr>
		  <th>Sno.</th>
		  <th>By</th>
		  <th>Type</th>
		  <th>Image</th>
		  <th>Description</th>
          <th>Action</th>
        </tr>
        </thead>
        <tbody>	
		    <?php if(!empty($list_testimonials)){ ?>
		    <?php foreach($list_testimonials as $i=>$row){ ?>
			<tr>
			  <td><?php echo $i+1;?></td>
			  <td><?php echo $row->by;?></td>
			  <td><?php echo $row->type;?></td>
			  <td><?php if(!empty($row->img)){?><img style="height:100px" src="<?php echo base_url();?><?php echo $row->img;?>"> <?php }?></td>
		      <td><?php echo $row->desc;?></td>
              
			  <td>
                    <a class="action-btn edit" onclick="edit_testimonials(<?php echo $row->id;?>)" href="javascript:void(0);"><i class="fa fa-pencil"></i></a>
                    <a  class="action-btn delete" onclick="return confirm('Do you want to delete this record?');" href="<?php echo base_url();?>backend/delete_testimonial/<?php echo $row->id;?>"> <i class="fa fa-trash"></i></a>
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
          <h4 class="modal-title" style="color:white;font-weight:bold;font-size:20px;">Add Testimonial</h4>
        </div>
        <form method="POST" action="<?php echo base_url(); ?>backend/save_testimonial" enctype="multipart/form-data">
        <div class="modal-body">
		    
            <div class="row">
			    <div class="col-md-6 col-sm-6 col-xs-12">
			        <label>Type</label><b style="color:red;">*</b>
				    <input type="hidden" name="id" id="id" value="0"   />
				    <input type="text" name="type" id="type"   />
			    </div>
			  
			  <div class="col-md-6 col-sm-6 col-xs-12">
			  <label>Name</label><b style="color:red;">*</b>
				<input type="text" name="by" id="by"  />
			  </div>
			  
			  </div>
			  <div class="row">
			    <div class="col-md-12 col-sm-6 col-xs-12">
			        <label>Description</label><b style="color:red;">*</b>
				    <textarea type="text" name="desc" id="desc"  ></textarea>
			    </div>
			  
			  </div>
			  <div class="row">
			    <div class="col-md-12 col-sm-6 col-xs-12">
			        <label>Image</label><b style="color:red;">*</b>
                    <div class="file-drop-area">
                        <span class="fake-btn">Choose files</span>
                        <span class="file-msg">or drag and drop files here</span>
                        <input class="file-input" type="file" name="image" id="fileImage image" accept="image/*">
                        <input class="file-input" type="hidden" name="prev_image" id="prev_image" >
                    </div>
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
    function deleteRecord(id)
    {
        var x=confirm("do you want to Delete?")
        if(x==true)
        {
        window.location="user_delete.php?did="+id;
        }
    
    }
    function edit_testimonials(id)
    {
        $('#id').val(id);
        $.ajax
        ({
            type: "POST",
            url: "<?php echo base_url(); ?>backend/get_testimonial",
            data: {'id':id},
            success: function(info)
            {
                var data = JSON.parse(info);
                $('#by').val(data['by']);
                $('#type').val(data['type']);
                $('#desc').val(data['desc']);
                $('#prev_image').val(data['img']);
                $('#myModal').modal();
            }
        
        });	
       
    
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
		