<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left"><h3><i class="fa fa-ioxhost"></i> Pending Collections</h3></div>
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
                				    <th>Invoice No</th>
                				    <th>For</th>
                				    <th>Deal Id / D.O. No</th>
                				    <th>Lead by</th>
                				    <th>Client ID</th>
                				    <th>Name</th>
                				    <th>Mobile</th>
                				    <th>Email</th>
                		            <th>Purpose</th>
                		            <th>Amount</th>
                		            <th>GST</th>
                		            <th>SGST</th>
                		            <th>CGST</th>
                		            <th>TDS</th>
                		            <th>Due</th>
                		            <th>Bank</th>
                		            <th>Cheque/Transection Id</th>
                		            <!--<th>View</th>-->
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(!empty($collection_list)){ ?>
                                <?php foreach($collection_list  as $k=>$row){ ?>
                                <tr>
                                    <td><?php echo $k+1; ?></td>
                                    <td><?php echo $row['date']; ?></td>
                                    <td><?php echo $row['inv_no']; ?></td>
                                    <td><?php echo $row['for']; ?></td>
                                    <td><?php echo $row['deal_id']; ?></td>
                                    <td><?php echo $row['lead_by']; ?></td>
                                    <td><?php echo $row['client_id']; ?></td>
                                    <td><?php echo $row['name']; ?></td>
                                    <td><?php echo $row['mobile']; ?></td>
                                    <td><?php echo $row['email']; ?></td>
                                    <td><?php echo $row['purpose']; ?></td>
                                    <td><?php echo $row['amount']; ?></td>
                                    <td><?php echo $row['gst']; ?></td>
                                    <td><?php echo $row['sgst']; ?></td>
                                    <td><?php echo $row['cgst']; ?></td>
                                    <td><?php echo $row['tds']; ?></td>
                                    <td><?php echo $row['due']; ?></td>
                                    <td><?php echo $row['bank']; ?></td>
                                    <td><?php echo $row['transaction_id']; ?></td>
                                    <!-- <td><?php echo $row['inv_no']; ?></td> -->
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