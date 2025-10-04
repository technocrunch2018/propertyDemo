<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left"><h3><i class="fa fa-ioxhost"></i> Manage All Subscriber</h3></div>
        </div>
        <div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                      	<div class="x_title">
                <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-10">
                    <h2>Manage All Subscriber</h2>
                </div>
                </div>
					                
                	<div class="clearfix"></div>
              	</div>
                    <div class="x_content">
                        <table id="datatable-buttons" class="table table-bordered">
                            <thead> 
                                <tr>
                				    <th>Sno.</th>
                				    <th>Name</th>
                				    <th>Mobile</th>
                				    <th>Email</th>
                				    <th>User Type</th>
                				    <th>Balance Listing</th>
                				    <th>Package Name</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $sr = 1; foreach($sub as $list){?>
                                <tr>
                				    <th><?php echo $sr; ++$sr;?></th>
                				    <th><?php echo $list['username'];?></th>
                				    <th><?php echo $list['userphone'];?></th>
                				    <th><?php echo $list['email'];?></th>
                				    <th><?php echo $list['usertype'];?></th>
                				    <th><?php echo $list['leads_pending'];?></th>
                				    <th><?php echo $list['subname'];?></th>
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