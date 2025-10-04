<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3><i class="fa fa-ioxhost"></i> Rental Refresh</h3>
            </div>
        </div>

        <div class="clearfix"></div>

        <div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
			  
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Rental Refresh List (<?php echo date('Y-m-01').' - '.date('Y-m-t'); ?>)</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <table id="datatable-buttons" class="table table-bordered table-striped">
                            <thead> 
                				<tr>
                				    <th>Sr.No</th>
                                    <th>Seller ID</th>
                                    <th>Buyer ID</th>
                                    <th>Admin1</th>
                                    <th>Admin2</th>
                                    <th>Commission</th>
                                    <th>Floormantra Commision</th>
                                    <th>deposite</th>
                                    <th>rent</th>
                                    <th>expiry_date</th>
                                    <th>extra_services</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(!empty($rental_refresh)){ ?>
                                <?php foreach($rental_refresh as $i=>$row){ ?>
                                <tr>
                				    <td><?php echo $i+1; ?></td>
                                    <td>
                                        <?php $seller = $this->Common_model->getdatabyid(array('post_id'=>$row->post_id), 'post_property');  ?>
                                        <?php if(!empty($seller)){ echo $seller->lead_id; } ?>
                                    </td>
                                    <td>
                                        <?php $buyer = $this->Common_model->getdatabyid(array('post_id'=>$row->buyer), 'post_requirement');  ?>
                                        <?php if(!empty($buyer)){ echo $buyer->lead_id; } ?>    
                                    </td>
                                    <td>
                                        <?php $admin1 = $this->Common_model->getdatabyid(array('user_id'=>$row->caller), 'admin_users');  ?>
                                        <?php if(!empty($admin1)){ echo $admin1->name; } ?>
                                    </td>
                                    <td>
                                        <?php $admin2 = $this->Common_model->getdatabyid(array('user_id'=>$row->executive), 'admin_users');  ?>
                                        <?php if(!empty($admin2)){ echo $admin2->name; } ?>
                                    </td>
                                    <td><?php echo $row->commission; ?></td>
                                    <td><?php echo $row->floormantra_commision; ?></td>
                                    <td><?php echo $row->deposite; ?></td>
                                    <td><?php echo $row->rent; ?></td>
                                    <td><?php echo $row->expiry_date; ?></td>
                                    <td><?php echo $row->extra_services; ?></td>
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

		
