<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left"><h3><i class="fa fa-ioxhost"></i> Pending Payments</h3></div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
			    <div class="x_panel">
                    <div class="x_content">
                        <table id="datatable" class="table table-bordered table-striped">
                            <thead> 
                                <tr>
                				    <th>Sno.</th>
                				    <th>Date</th>
                				    <th>PaySlip No</th>
                				    <th>For</th>
                				    <th>Deal Id / D.O. No</th>
                				    <th>Lead by</th>
                				    <th>Name</th>
                				    <th>Client/User ID</th>
                				    <th>Name</th>
                		            <th>Mobile</th>
                		            <th>Email</th>
                		            <th>Commission Received</th>
                		            <th>Partners Commission</th>
                		            <th>TDS</th>
                		            <th>Pending Amount</th>
                		            <th>See Details</th>
                		            <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(!empty($pending_list)){ ?>
                                <?php foreach($pending_list as $i=>$row){ ?>
                                    <tr>
                                        <td><?php echo $i+1; ?></td>
                                        <td><?php echo $row['date']; ?></td>
                                        <td><?php echo $row['pay_slip_no']; ?></td>
                                        <td><?php echo $row['for']; ?></td>
                                        <td><?php echo $row['lead_by']; ?></td>
                                        <td><?php echo $row['lead_by_name']; ?></td>
                                        <td><?php echo $row['do_no']; ?></td>
                                        <td><?php echo $row['user_id']; ?></td>
                                        <td><?php echo $row['name']; ?></td>
                                        <td><?php echo $row['mobile']; ?></td>
                                        <td><?php echo $row['email']; ?></td>
                                        <td><?php echo $row['received_amount']; ?></td>
                                        <td><?php echo $row['commission']; ?></td>
                                        <td><?php echo $row['tds']; ?></td>
                                        <td><?php echo $row['transaction_id']; ?></td>
                                        <td><?php echo $row['bank']; ?></td>
                                        <td>
                                            <a href="javascript:void(0);" onclick="commission_pay_now(<?php echo $row['deal_id']; ?>);"><span title="Close" class="label label-success">Pay Now</span></a>
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