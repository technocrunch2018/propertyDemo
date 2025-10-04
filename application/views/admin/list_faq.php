        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3><i class="fa fa-ioxhost"></i> Manage FAQ</h3>
              </div>

             
            </div>

            <div class="clearfix"></div>

            <div class="row">
			  <div class="col-md-12 col-sm-12 col-xs-12">
			  
                <div class="x_panel">
                   <div class="x_title">
                    <h2>Manage FAQ</h2>
					<button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#myModal">+ADD FAQ</button>
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                      <table id="datatable-buttons" class="table table-bordered table-striped">
                <thead> 
                <tr>
				  <th>Sno.</th>
				  <th>Question</th>
		          <th>Action</th>
                </tr>
                </thead>
                <tbody>
                    <?php $i = 1; foreach($faq as $list){?>
					<tr>
					  <td><?php echo $i; ++$i;?></td>
					  <td><?php echo $list->question;?></td>
					  <td>
                    	  <a class="action-btn edit" href="<?php echo base_url('backend/edit_faq/' . $list->id);?>"><i class="fa fa-pencil"></i></a>
                    	  <a class="action-btn delete" onclick="delete_buyer(<?php echo $list->id; ?>)" href="javascript:void(0)"> <i class="fa fa-trash"></i></a>
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
		    <form method="POST" action="<?php echo base_url(); ?>backend/save_faq">
            <div class="row">
			  <div class="col-md-12 col-sm-12 col-xs-12">
			  <label>Question</label><b style="color:red;">*</b>
				<input type="text" name="question" id="question" onblur="checkValue(this)"  />
			  </div>
			  
			  </div>
			  <div class="row">
			    <div class="col-md-12 col-sm-6 col-xs-6">
			        <label>Answers</label><b style="color:red;">*</b>
				    <textarea type="text" name="ans" id="ans"></textarea>
			    </div>
			  
			  </div>
			 
        </div>
        <div class="modal-footer">
          <input type="submit" name="save" value="Save"/>
        </div>
      </div>
      </form>
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
<div class="modal fade" id="deleteBuyer" role="dialog">
    <div class="modal-dialog  modal-sm">
        <div class="modal-content">
            <div class="modal-header" style="background:linear-gradient(to right,#03709e,#18c3fd 100%);">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title" style="color:white;font-weight:bold;font-size:20px;">Do you want to delete this record? </h4>
            </div>
            <form method="POST" action="<?php echo base_url(); ?>backend/delete_faq" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="row">
                        <input type="hidden" name="id" id="delete_buyer_post_id" style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" />
                        <input type="hidden" name="redirect_url" value="<?php echo current_url(); ?>" style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" />
                              <input type="submit" name="Yes" value="Yes" class="btn btn-warning"/>
                        <input type="button" name="No" value="No" data-dismiss="modal" class="btn btn-primary"/>
                        </div>
                </div>
            </form>
        </div>
    </div>
</div>
        
		<script>
					function delete_buyer(post_id){
        $('#delete_buyer_post_id').val(post_id);
        $('#deleteBuyer').modal();
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
		