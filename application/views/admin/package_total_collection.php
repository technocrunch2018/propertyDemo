<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left"><h3><i class="fa fa-ioxhost"></i> Package Total Collections</h3></div>
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
                				    <th>Invoice No</th>
                				    <th>Collect From</th>
                				    <th>D.O. No</th>
                				    <th>Lead By</th>
                				    <th>Client Id</th>
                				    <th>Name</th>
                				    <th>Mobile</th>
                				    <th>Email</th>
                				    <th>Purpose</th>
                				    <th>Amount</th>
                				    <th>GST</th>
                				    <th>SGST</th>
                				    <th>CGST</th>
                				    <th>Net Amount</th>
                				    <th>Bank</th>
                				    <th>Transection Id</th>
                				    <th>Date</th>
                		            <th>Action(See Details)</th>
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