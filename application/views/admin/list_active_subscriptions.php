<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left"><h3><i class="fa fa-ioxhost"></i> Manage All Active Subscriptions</h3></div>
        </div>
        <div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                      	<div class="x_title">
                <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-10">
                    <h2>Manage All Active Subscriptions</h2>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-2">
                    <a href = "<?php echo base_url('backend/add_subscriptions');?>"><button type="button" class="effect red effect-5 pull-right" style="width:90px;">ADD</button></a> 
                     <a href = "<?php echo base_url('backend/inactive_subscriptions');?>"><button type="button" class="effect red effect-5 pull-right" style="width:90px;">Inactive</button></a> 
                </div>
                </div>
					                
                	<div class="clearfix"></div>
              	</div>
                    <div class="x_content">
                        <table id="datatable-buttons" class="table table-bordered table-striped">
                            <thead> 
                                <tr>
                				    <th>Sno.</th>
                				    <th>Package Name</th>
                				    <th>Purpose</th>
                				    <th>User Type</th>
                				    <th>Validity</th>
                				    <th>Listings</th>
                				    <th>Price</th>
        
                		            <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; foreach($active_sub as $list){?>
            					<tr>
            					    <td><?php echo $i; ++$i;?></td>
            					    <td><?php echo $list->name;?></td>
            					    <td><?php if($list->purpose == 1){echo "Sale";}elseif($list->purpose == 2){echo "Buy";}else{echo "Both";}?></td>
            					    <td><?php echo $list->user_type;?></td>
            				        <td><?php echo $list->validity;?> Days</td>
            				        <td><?php echo $list->listings;?></td>
            				        <td><?php echo $list->price;?></td>
                				
                					<td>
                                        <a class="action-btn edit" href="<?php echo base_url('backend/edit_subscription/'.$list->id); ?>"><i class="fa fa-pencil"></i></a>
                                    	<a class="action-btn delete" onclick="deleteRecord(<?php echo $list->id;?>)" href="javascript:void(0)"> <i class="fa fa-trash"></i></a>
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
</div>
<script>
    function deleteRecord(id)
    {
        var x=confirm("do you want to Delete?")
		if(x==true)
		{window.location="<?php echo base_url('backend/delete_subscription/');?>"+id;}
    }
</script>