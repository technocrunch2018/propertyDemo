<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left"><h3><i class="fa fa-ioxhost"></i> Package Payments</h3></div>
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
                				    <th>Payslip No</th>
                				    <th>For</th>
                				    <th>Lead By</th>
                				    <th>Name</th>
                				    <th>D.O. No</th>
                				    <th>Client</th>
                				    <th>Name</th>
                				    <th>Mobile</th>
                				    <th>Email</th>
                				    <th>Amount Received</th>
                				    <th>Commission</th>
                				    <th>TDS</th>
                				    <th>Status</th>
                				    <th>Transection ID</th>
                				    <th>Bank</th>
                		            <th>Action(See Details | Pay)</th>
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