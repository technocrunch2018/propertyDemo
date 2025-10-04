<!-- page content -->
<div class="right_col" role="main">    
    <div class="page-title">
      	<div class="title_left">
        	<h3><i class="fa fa-ioxhost"></i> Manage Ex-Admin</h3>
      	</div>             
    </div>

    <div class="clearfix"></div>

    <div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
		  
            <div class="x_panel">
              	<div class="x_title">
                	<h2>Ex-Admin List</h2>
                	<div class="clearfix"></div>
              	</div>
              	<div class="x_content">
                	<table id="datatable-buttons" class="table table-bordered table-striped">
            			<thead> 
            				<tr>
								<th>Sno.</th>
								<th>Name</th>
								<th>Mobile</th>
								<th>Official mobile</th>
								<th>Email</th>
								<th>Official E-mail</th>
								<th>Designation</th>
								<th>Join Date</th>
								<th>Resignation Date</th>
								<th>Status</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
						    <?php $sr = 1; foreach($admin as $list){?>
    							<tr>
    								<td><?php echo $sr; ++$sr;?></td>
    								<td><a title = "View Record" href = "<?php echo base_url('backend/view_admin/' . $list->user_id);?>"><?php echo $list->name;?></a></td>
    								<td><?php echo $list->mobile;?></td>
    								<td><?php echo $list->official_mobile;?></td>
    								<td><?php echo $list->email;?></td>
    								<td><?php echo $list->official_email;?></td>
    								<td><?php echo $list->desognation;?></td>
    								<td><?php echo date('d M, Y', strtotime($list->join_date));?></td>	
    								<td><?php echo date('d M, Y', strtotime($list->resignation_date));?></td>
    								<td><?php if($list->status ==1){echo "Active";}else{echo "Inactive";}?></td>
    					  			<td>
    								  	<a title = "Edit Record" href="<?php echo base_url('backend/edit_admins/' . $list->user_id);?>"><i class="fa fa-pencil"></i></a>
    								  	<a title = "Delete Record" onclick="deleteRecord(<?php echo $list->user_id;?>)" href="javascript:void(0)"> <i class="fa fa-trash"></i></a>
    								</td>
    							</tr>
							<?php }?>
                		</tbody>               
          			</table>
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
			window.location="<?php echo base_url('backend/delete_admin/');?>"+id;
		}
		
	}
</script>