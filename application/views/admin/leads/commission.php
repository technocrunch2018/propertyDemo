<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3><i class="fa fa-ioxhost"></i> Partners Commissions</h3>
            </div>
        </div>

        <div class="clearfix"></div>

        <div class="row">
	        <div class="col-md-12 col-sm-12 col-xs-12">
	  
                <div class="x_panel">
                    <div class="x_title">
                        <h2> Partners Commissions List</h2>
                        <div class="clearfix"></div>
                    </div> 
                    <div class="x_content">
                        <table id="datatable-buttons" class="table table-bordered table-striped">
                            <thead> 
                                <tr>
                        		    <th>Sno.</th>
                        		    <th>Partners ID</th>
                        		    <th>Name</th>
                        		    <th>Property Id / Client Id</th>
                        		    <th>Name</th>
                        		    <th>Deal Id</th>
                        		    <th>Commission Received</th>
                        		    <th>Partners Commission</th>
                        		    <th>TDS</th>
                        		    <th>Amount</th>
                        		    <th>Status</th>
                        		    <th>Date</th>
                        		    <th>Bank</th>
                        		    <th>Transaction Id</th>
                        		    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>	
                    		    <?php if(!empty($commission_list)){ ?>
                    		    <?php foreach($commission_list as $i=>$row){ ?>
                    			<tr>
                    			    <td><?php echo $i+1;?></td>
                    			    <td><?php echo $row->partner_lead_id; ?></td>
                    			    <td><?php echo $row->partner_name; ?></td>
                    			    <td><?php echo $row->lead_id; ?></td>
                    			    <td><?php echo $row->deal_type; ?></td>
                    			    <td><?php echo $row->commission; ?></td>
                    			    <td><?php echo $row->partners_commission; ?></td>
                    			    <td><?php echo $row->partners_commission; ?></td>
                    			    <td><?php echo $row->partners_commission; ?></td>
                    			    <td><?php echo $row->partners_commission; ?></td>
                    			    <td><?php echo $row->partners_commission; ?></td>
                    			    <td><?php echo $row->partners_commission; ?></td>
                    			    <td><?php echo $row->partners_commission; ?></td>
                    			    <td><?php echo $row->partners_commission; ?></td>
                    			    <td><?php echo $row->partners_commission; ?></td>
                    			    <!--Action 1. Pay|View|Print -->
                    			    
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
<!-- /page content -->
 