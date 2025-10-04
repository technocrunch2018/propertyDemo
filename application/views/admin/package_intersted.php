<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left"><h3><i class="fa fa-ioxhost"></i> Package Intersted</h3></div>
        </div>
        <div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                      	<div class="x_title">

					                
                	<div class="clearfix"></div>
              	</div>
                    <div class="x_content">
                        <table id="datatable-buttons" class="table table-bordered table-striped">
                            <thead> 
                                <tr>
                				    <th>Sno.</th>
                				    <th>Date</th>
                				    <th>User ID</th>
                				    <th>Name</th>
                				    <th>Mobile</th>
                				    <th>Email</th>
                				    <th>User Type</th>
                				    <th>Package Name</th>
                				    <th>Purpose</th>
                				    <th>Validity</th>
                				    <th>Listing</th>
                				    <th>Price</th>
                				    <th>Lead By</th>
                		            <th>Action(Sell Now | Delete)</th>
                                </tr>
                            </thead>
                            <tbody>

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