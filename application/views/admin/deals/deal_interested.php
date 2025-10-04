
        <!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3><i class="fa fa-ioxhost"></i> Manage Deal</h3>
            </div>
        </div>

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Interested List</h2>
                 <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                       <table id="datatable" class="table table-bordered table-striped">
                <thead> 
                
                  <tr>
                    <th>Sr.No</th>
                    <th>Date</th>
                    <th>Client ID</th>
                    <th>Name</th>
                    <th>Property ID</th>
                    <th>Owner Name</th>
                    <th>Lead By</th>
                    <th>Name</th>
                    <th>Admin1</th>
                    <th>Admin2</th>
                    <?php if($rent_sell == 'Rent'){ ?>
                    <th>S. Deposite</th>
                    <th>Rent</th>
                    <?php }else{ ?>
                    <th>Price</th>
                    <?php } ?>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                    <?php if(!empty($list_interested)){ ?>
                    <?php foreach($list_interested as $i=>$row){ ?>
                    <tr>
                        <td><?php echo $i+1; ?></td>
                        <td><?php echo $row->created; ?></td>
                        <td><?php echo $row->buyer_lead; ?></td>
                        <td><?php echo $row->buyer_name; ?></td>
                        <td><?php echo $row->lead_id; ?></td>
                        <td><?php echo $row->owner_name; ?></td>
                        <td><?php echo $row->buyer_user_type; ?></td>
                        <td><?php echo $row->lead_by_name; ?></td>
                        <td><?php echo $row->executive_name; ?></td>
                        <td><?php echo $row->caller_name; ?></td>
                        <?php if($rent_sell == 'Rent'){ ?>
                        <td><?php echo $row->deposite; ?></td>
                        <td><?php echo $row->rent; ?></td>
                        <?php }else{ ?>
                        <td><?php echo $row->amount; ?></td>
                        <?php } ?>
                        <td>
                            <?php if($row->owner_in_process_flag != 1 && $row->client_in_process_flag != 1){ ?>
                            <a href="javascript:void(0);" onclick="in_process_popup(<?php echo $row->id; ?>, '<?php echo $rent_sell; ?>','<?php echo $row->buyer_lead; ?>','<?php echo $row->lead_id; ?>');"><span title="Change Status" class="label label-info">In Process</span></a>
                            <?php } ?>
                            <a href="javascript:void(0);" onclick="edit_deal_popup(<?php echo $row->id; ?>, '<?php echo $rent_sell; ?>');"><span title="Edit Deal" class="label label-primary">Edit</span></a>
                            <a href="<?php echo base_url(); ?>property/cancel_interested_deal/<?php echo $rent_sell; ?>/<?php echo $row->id; ?>" onclick="return confirm('Do you want to cancel this deal?');"><span title="Cancel Deal" class="label label-success">Cancel</span></a>
                            <!--<?php if($row->in_process_flag == 0){ ?>
                            <a href="javascript:void(0);" onclick="interested_popup(<?php echo $row->id; ?>,<?php echo $row->post_id; ?>,'<?php echo $row->rent_sell; ?>')"><span title="Interested" class="label label-primary">In Process</span></a>
                            <?php } ?>
                            <a href="javascript:void(0);" onclick="close_deal(<?php echo $row->id; ?>,<?php echo $row->commission; ?>)"><span title="Close" class="label label-success">Close</span></a>-->
                        </td>
                    </tr>
                <?php } ?>
                <?php } ?>
                </tbody>
               
              </table>
  <div class="container">
  <!-- Trigger the modal with a button -->
 

  <!-- Modal -->
<div class="modal fade" id="changeStatusPopup" role="dialog">
    <div class="modal-dialog  modal-lg">
    
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header" style="background:linear-gradient(to right,#03709e,#18c3fd 100%);">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title" style="color:white;font-weight:bold;font-size:20px;">Change Status</h4>
            </div>
            <form method="POST" id="change_status_form" name="change_status_form" method="post" action="<?php echo base_url('property/change_interested_status'); ?>">
                <div class="modal-body">
                    <div class="row">
                        <input type="hidden" name="change_interested_id" id="change_interested_id" value=""/>
                        <div class="col-md-2">
                            <select name="status" id="status" class="form-control" required>
                                <option value="">Select One</option>
                                <option value="Sold Out">Sold Out</option>
                                <option value="Rent Out">Rent Out</option>
                                <option value="No Interested Seller">No Interested Seller</option>
                                <option value="No Interested Buyer">No Interested Buyer</option>
                            </select>
                        </div>
                        
                        <div class="col-md-10">
                            <textarea name="comment" id="comment" class="form-control" placeholder="Comments" required></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="submit" name="save" value="Save" class="btn btn-primary"/>
                </div>
            </form>
        </div>
    </div>
</div>



<div class="modal fade" id="interestedRentEditPopup" role="dialog">
    <div class="modal-dialog  modal-lg">
    
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header" style="background:linear-gradient(to right,#03709e,#18c3fd 100%);">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title" style="color:white;font-weight:bold;font-size:20px;">Edit Details</h4>
            </div>
            <form method="POST" id="change_status_form" name="change_status_form" method="post" action="<?php echo base_url('property/update_rent_interested_details'); ?>">
                <div class="modal-body">
                    <div class="row">
                        <input type="hidden"  class="form-control" name="interested_id" id="interested_id" value=""/>
                        <div class="col-md-3">
                            <label>Deposite</label>
                            <input type="text"  class="form-control" name="security_deposite" id="security_deposite" placeholder="Deposite" value=""/>
                        </div>
                        
                        <div class="col-md-3">
                            <label>Rent</label>
                            <input type="text"  class="form-control" name="rent" id="rent" placeholder="Rent" value=""/>
                        </div>
                        
                        <div class="col-md-3">
                            <label>Rent Start From</label>
                            <input type="date"  class="form-control" name="rent_start_from" id="rent_start_from" placeholder="Rent Start From" value=""/>
                        </div>
                        
                        <div class="col-md-3">
                            <label>Rent Upto</label>
                            <input type="date"  class="form-control" name="rent_upto" id="rent_upto" placeholder="Rent Upto" value=""/>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <label>Admin1</label>
                            <select class="form-control" name="rent_executive" id="rent_executive" value=""/>
                                <option value="">Select One</option>
                                <?php if(!empty($executive_list)){ ?>
                                <?php foreach($executive_list as $caller){ ?>
                                <option value="<?php echo $caller->user_id; ?>"><?php echo $caller->name; ?></option>
                                <?php } ?>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label>Admin2</label>
                            <select class="form-control" name="rent_caller" id="rent_caller" value="">
                                <option value="">Select One</option>
                                <?php if(!empty($telecaller_list)){ ?>
                                <?php foreach($telecaller_list as $caller){ ?>
                                <option value="<?php echo $caller->user_id; ?>"><?php echo $caller->name; ?></option>
                                <?php } ?>
                                <?php } ?>
                            </select>
                        </div>
                  </div>
                    <div class="row">
                        <div class="col-md-3">
                            <label>Property ID</label>
                            <input type="text"  class="form-control" name="rent_property_lead" id="rent_property_lead" placeholder="Property ID" value="" readonly/>
                            <input type="hidden"  class="form-control" name="rent_property_id" id="rent_property_id" placeholder="Property ID" value="" readonly/>
                            <!--<select class="form-control" name="rent_property_id" id="rent_property_id" >
                                <?php if(!empty($seller_list)){ ?>
                                <?php foreach($seller_list as $seller){ ?>
                                <option value="<?=$seller->post_id ?>"><?=$seller->lead_id?></option>
                                <?php } ?>
                                <?php } ?>
                            </select>-->
                        </div>
                        <div class="col-md-3">
                            <label>Commission(Owner)</label>
                            <input type="text"  class="form-control" name="rent_commission" id="rent_commission" placeholder="Commission(Owner)" value=""/>
                        </div>
                        
                        <div class="col-md-3">
                            <label>Client ID</label>
                            <input type="text"  class="form-control" name="rent_client_lead" id="rent_client_lead" placeholder="Client ID" value="" readonly/>
                            <input type="hidden"  class="form-control" name="rent_client_id" id="rent_client_id" placeholder="Client ID" value="" readonly/>
                            <!--<select class="form-control" name="rent_property_id" id="rent_property_id" >
                                <?php if(!empty($seller_list)){ ?>
                                <?php foreach($seller_list as $seller){ ?>
                                <option value="<?=$seller->post_id ?>"><?=$seller->lead_id?></option>
                                <?php } ?>
                                <?php } ?>
                            </select>-->
                        </div>
                        
                        <div class="col-md-3">
                            <label>Commission(Client)</label>
                            <input type="text"  class="form-control" name="rent_commission1" id="rent_commission1" placeholder="Commission(Client)" value=""/>
                        </div>
                        
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <label>Details(Owner)</label>
                            <textarea class="form-control" name="rent_owner_details" id="rent_owner_details" placeholder="Details"></textarea>
                        </div>
                        <div class="col-md-6">
                            <label>Details(Client)</label>
                            <textarea class="form-control" name="rent_client_details" id="rent_client_details" placeholder="Details"></textarea>
                        </div>
                    </div>
                    
                </div>
                <div class="modal-footer">
                    <input type="submit" name="save" value="Save" class="btn btn-primary"/>
                </div>
            </form>
        </div>
    </div>
</div>



<div class="modal fade" id="interestedSaleEditPopup" role="dialog">
    <div class="modal-dialog  modal-lg">
    
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header" style="background:linear-gradient(to right,#03709e,#18c3fd 100%);">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title" style="color:white;font-weight:bold;font-size:20px;">Edit Details</h4>
            </div>
            <form method="POST" id="change_status_form" name="change_status_form" method="post" action="<?php echo base_url('property/update_sale_interested_details'); ?>">
                <div class="modal-body">
                    <div class="row">
                        <input type="hidden"  class="form-control" name="sale_interested_id" id="sale_interested_id" value=""/>
                        <div class="col-md-4">
                            <label>Price</label>
                            <input type="text"  class="form-control" name="sale_price" id="sale_price" value=""/>
                        </div>
                        <div class="col-md-4">
                            <label>Admin1</label>
                            <select class="form-control" name="sale_executive" id="sale_executive" value=""/>
                                <option value="">Select One</option>
                                <?php if(!empty($executive_list)){ ?>
                                <?php foreach($executive_list as $caller){ ?>
                                <option value="<?php echo $caller->user_id; ?>"><?php echo $caller->name; ?></option>
                                <?php } ?>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label>Admin2</label>
                            <select class="form-control" name="sale_caller" id="sale_caller" value="">
                                <option value="">Select One</option>
                                <?php if(!empty($telecaller_list)){ ?>
                                <?php foreach($telecaller_list as $caller){ ?>
                                <option value="<?php echo $caller->user_id; ?>"><?php echo $caller->name; ?></option>
                                <?php } ?>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <label>Property ID</label>
                            <input type="text"  class="form-control" name="sale_property_id" id="sale_property_id" value="" placeholder="Property ID" readonly/>
                            <input type="hidden" name="sale_post_id" id="sale_post_id"/>
                        </div>
                        
                        <div class="col-md-3">
                            <label>Commission(Owner)</label>
                            <input type="text"  class="form-control" name="sale_property_commission" id="sale_property_commission" value="" placeholder="Commission(Owner)"/>
                        </div>
                        <div class="col-md-3">
                            <label>Client ID</label>
                            <input type="text"  class="form-control" name="sale_client_id" id="sale_client_id" value="" placeholder="Property ID" readonly/>
                        </div>
                        
                        <div class="col-md-3">
                            <label>Commission(Client)</label>
                            <input type="text"  class="form-control" name="sale_client_commission" id="sale_client_commission" value="" placeholder="Commission(Client)"/>
                            <input type="hidden" name="sale_buyer_id" id="sale_buyer_id"/>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <label>Details(Owner)</label>
                            <textarea class="form-control" name="sale_details_owner" id="sale_details_owner" placeholder="Details(Owner)"></textarea>
                        </div>
                        <div class="col-md-6">
                            <label>Details(Client)</label>
                            <textarea class="form-control" name="sale_details_client" id="sale_details_client" placeholder="Details(Client)"></textarea>
                        </div>
                    </div>
                    
                </div>
                <div class="modal-footer">
                    <input type="submit" name="save" value="Save" class="btn btn-primary"/>
                </div>
            </form>
        </div>
    </div>
</div>



<div class="modal fade" id="inprocessRentPopup" role="dialog">
    <div class="modal-dialog  modal-lg">
    
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header" style="background:linear-gradient(to right,#03709e,#18c3fd 100%);">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title" style="color:white;font-weight:bold;font-size:20px;">Inprocess Details</h4>
            </div>
            <form method="POST" id="change_status_form" name="change_status_form" method="post" action="<?php echo base_url('property/change_rent_interested_status_to_inprocess'); ?>">
                <div class="modal-body">
                    <div class="row">
                        <input type="hidden"  class="form-control" name="rent_inprocess_interested_id" id="rent_inprocess_interested_id" value=""/>
                        <div class="col-md-6">
                            <label>Security Deposite</label>
                            <input type="text"  class="form-control" name="rent_inprocess_deposite" id="rent_inprocess_deposite" value="" placeholder="Security Deposite" required/>
                        </div>
                        
                        
                        <div class="col-md-6">
                            <label>Rent</label>
                            <input type="text"  class="form-control" name="rent_inprocess_rent" id="rent_inprocess_rent" value="" placeholder="Rent" required/>
                        </div>
                        
                       
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <label>Client ID</label>
                            <input type="text"  class="form-control" name="rent_inprocess_client_id" id="rent_inprocess_client_id" value="" placeholder="Client ID" readonly/>
                        </div>
                        
                        <div class="col-md-6">
                            <label>Commission(Client)</label>
                            <input type="number"  class="form-control" name="rent_inprocess_client_commission" id="rent_inprocess_client_commission" placeholder="Commission(Client)" value="" required/>
                        </div>
                    </div>
                    
                    
                    <div class="row">
                        <div class="col-md-6">
                            <label>Owner ID</label>
                            <input type="text"  class="form-control" name="rent_inprocess_owner_id" id="rent_inprocess_owner_id" value="" placeholder="Owner" readonly/>
                        </div>
                        
                        <div class="col-md-6">
                            <label>Commission(Owner)</label>
                            <input type="number"  class="form-control" name="rent_inprocess_owner_commission" id="rent_inprocess_owner_commission" value="" placeholder="Commission(Owner)" required/>
                        </div>
                    </div>
                    
                    
                    <div class="row">
                        <div class="col-md-6">
                            <label>Client Details</label>
                            <textarea class="form-control" name="rent_inprocess_client_details" id="rent_inprocess_client_details" placeholder="Client Details"></textarea>
                        </div>
                    <!--</div>
                    
                    <div class="row">-->
                        <div class="col-md-6">
                            <label>Owner Details</label>
                            <textarea class="form-control" name="rent_inprocess_owner_details" id="rent_inprocess_owner_details" placeholder="Owner Details"></textarea>
                        </div>
                    </div>
                    
                </div>
                <div class="modal-footer">
                    <input type="submit" name="save" value="Save" class="btn btn-primary"/>
                </div>
            </form>
        </div>
    </div>
</div>


<div class="modal fade" id="inprocessSalePopup" role="dialog">
    <div class="modal-dialog  modal-lg">
    
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header" style="background:linear-gradient(to right,#03709e,#18c3fd 100%);">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title" style="color:white;font-weight:bold;font-size:20px;">Inprocess Details</h4>
            </div>
            <form method="POST" id="change_status_form" name="change_status_form" method="post" action="<?php echo base_url('property/change_sale_interested_status_to_inprocess'); ?>">
                <div class="modal-body">
                    <div class="row">
                        <input type="hidden"  class="form-control" name="sale_inprocess_interested_id" id="sale_inprocess_interested_id" value=""/>
                        <div class="col-md-6">
                            <label>Price</label>
                            <input type="text"  class="form-control" name="sale_inprocess_price" id="sale_inprocess_price" value="" placeholder="Price" required/>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <label>Client ID</label>
                            <input type="text"  class="form-control" name="sale_inprocess_client_id" id="sale_inprocess_client_id" value="" readonly/>
                        </div>
                        
                        <div class="col-md-6">
                            <label>Commission(Client)</label>
                            <input type="number"  class="form-control" name="sale_inprocess_client_commission" id="sale_inprocess_client_commission" value="" required placeholder="Commission(Client)"/>
                        </div>
                    </div>
                    
                    
                    <div class="row">
                        <div class="col-md-6">
                            <label>Owner ID</label>
                            <input type="text"  class="form-control" name="sale_inprocess_owner_id" id="sale_inprocess_owner_id" value="" readonly/>
                        </div>
                        
                        <div class="col-md-6">
                            <label>Commission(Owner)</label>
                            <input type="number"  class="form-control" name="sale_inprocess_owner_commission" id="sale_inprocess_owner_commission" value="" placeholder="Commission(Owner)" required/>
                        </div>
                    </div>
                    
                    
                    <div class="row">
                        <div class="col-md-6">
                            <label>Client Details</label>
                            <textarea class="form-control" name="sale_inprocess_client_details" id="sale_inprocess_client_details" placeholder="Client Details"></textarea>
                        </div>
                    <!--</div>
                    
                    <div class="row">-->
                        <div class="col-md-6">
                            <label>Owner Details</label>
                            <textarea class="form-control" name="sale_inprocess_owner_details" id="sale_inprocess_owner_details" placeholder="Owner Details"></textarea>
                        </div>
                    </div>
                    
                </div>
                <div class="modal-footer">
                    <input type="submit" name="save" value="Save" class="btn btn-primary"/>
                </div>
            </form>
        </div>
    </div>
</div>






                </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /page content -->
 
 
 
 
    <!-- Modal -->
    <div class="modal fade" id="interested_popup" role="dialog">
        <div class="modal-dialog  modal-lg">

            <div class="modal-content">
                <div class="modal-header" style="background:linear-gradient(to right,#03709e,#18c3fd 100%);">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title" style="color:white;font-weight:bold;font-size:20px;">Add Interested Details</h4>
                </div>
                <div class="modal-body">
                    <form name="interested_popup_form" id="interested_popup_form" method="POST" enctype="multipart/form-data" action="<?php echo base_url(); ?>property/update_property_interested_details">
                        <div class="row">
                            <input type="hidden" name="interested_details_id" value="0" id="interested_details_id" style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  />
                            <input type="hidden" name="interested_post_id" value="0" id="interested_post_id" style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  />
                            <input type="hidden" name="interested_rent_sell" value="0" id="interested_rent_sell" style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  />
                            <input type="hidden" name="redirect_url" value="<?php echo current_url(); ?>" id="redirect_url" style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  />
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="col-md-4 col-sm-6 col-xs-6">
                                    <label>Status</label><b style="color:red;">*</b>
                                    <select name="interested_status" id="interested_status" class="form-control" required>
                                        <option value="In Process" selected>In Process</option>
                                    </select>
                                </div>
                                <div class="col-md-4 col-sm-6 col-xs-6">
                                    <label>Buyer</label><b style="color:red;">*</b>
                                    <!--<select name="interested_buyer" id="interested_buyer" class="form-control" value="" readonly>
                                        <option value="">Select One</option>
                                        <?php if(!empty($buyer_list)){ ?>
                                        <?php foreach($buyer_list as $row){ ?>
                                        <option value="<?php echo $row->post_id; ?>"><?php echo $row->lead_id; ?></option>
                                        <?php } ?>
                                        <?php } ?>
                                    </select>-->
                                    <input type="number" name="buyer_lead" id="buyer_lead"  style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;"  readonly  />
                                    <input type="hidden" name="interested_buyer" id="interested_buyer" required style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;"  readonly  />
                                </div>
                                
                                
                                
                                <div class="col-md-4 col-sm-6 col-xs-6 sell">
                                    <label>Amount</label><b style="color:red;">*</b>
                                    <input type="number" name="interested_amount" id="interested_amount"  style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;"    />
                                </div>
                                
                                <div class="col-md-4 col-sm-6 col-xs-6">
                                    <label>Commission</label><b style="color:red;">*</b>
                                    <input type="number" name="interested_commission" required id="interested_commission"  style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;"    />
                                </div>
                                
                                <div class="col-md-4 col-sm-6 col-xs-6 rent" >
                                    <label>Security Deposite</label><b style="color:red;">*</b>
                                    <input type="number" name="interested_deposite" id="interested_deposite"  style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;"    />
                                </div>
                                 
                                <div class="col-md-4 col-sm-6 col-xs-6 rent" >
                                    <label>Rent/Month</label><b style="color:red;">*</b>
                                    <input type="number" name="interested_rent" id="interested_rent"  style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;"    />
                                </div>
                                
                                <div class="col-md-4 col-sm-6 col-xs-6 rent">
                                    <label>Expiry Date</label><b style="color:red;">*</b>
                                    <input type="date" name="interested_expiry_date" id="interested_expiry_date"  style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;"    />
                                </div>
                                
                                
                                 
                                <div class="col-md-4 col-sm-6 col-xs-6">
                                    <label>Admin 1</label><b style="color:red;">*</b>
                                    <select name="interested_telecaller" id="interested_telecaller" required class="form-control">
                                        <option value="">Select One</option>
                                        <?php if(!empty($telecaller_list)){ ?>
                                        <?php foreach($telecaller_list as $row){ ?>
                                        <option value="<?php echo $row->user_id; ?>"><?php echo $row->name; ?></option>
                                        <?php } ?>
                                        <?php } ?>
                                    </select>
                                </div>
                                
                                <div class="col-md-4 col-sm-6 col-xs-6">
                                    <label>Admin 2</label><b style="color:red;">*</b>
                                    <select name="interested_executive" id="interested_executive" class="form-control" required>
                                        <option value="">Select One</option>
                                        <?php if(!empty($executive_list)){ ?>
                                        <?php foreach($executive_list as $row){ ?>
                                        <option value="<?php echo $row->user_id; ?>"><?php echo $row->name; ?></option>
                                        <?php } ?>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <!--<div class="col-md-6 col-sm-6 col-xs-6">
                                <label>Extra Services(Add multiple services seperated by comma)</label>
                                <textarea name="extra_services" id="extra_services" class="form-control"></textarea>
                            </div>-->
                        </div>
                        <div class="modal-footer">
                            <input type="submit" name="save" value="Save" id="submit-btn" class="btn btn-primary"/>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
    
    
    
    
    
    
    <div class="modal fade" id="close_deal_popup" role="dialog">
        <div class="modal-dialog  modal-lg">

            <div class="modal-content">
                <div class="modal-header" style="background:linear-gradient(to right,#03709e,#18c3fd 100%);">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title" style="color:white;font-weight:bold;font-size:20px;">Close Deal</h4>
                </div>
                <div class="modal-body">
                    <form name="interested_popup_form" id="interested_popup_form" method="POST" enctype="multipart/form-data" action="<?php echo base_url(); ?>property/close_deal">
                        <div class="row">
                            <input type="hidden" name="deal_details_id" value="0" id="deal_details_id" style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  />
                            <input type="hidden" name="redirect_url" value="<?php echo current_url(); ?>" id="redirect_url" style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  />
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="col-md-4 col-sm-6 col-xs-6">
                                    <label>Commission</label><b style="color:red;">*</b>
                                    <input type="text" name="deal_commission" id="deal_commission" class="form-control" placeholder="Commission" readonly>
                                </div>
                                
                                <div class="col-md-4 col-sm-6 col-xs-6">
                                    <label>Received Amount</label><b style="color:red;">*</b>
                                    <input type="number" name="received_amount" id="received_amount" class="form-control" placeholder="Received">
                                </div>
                                
                            </div>
                        </div>
                        <div class="modal-footer">
                            <input type="submit" name="save" value="Save" id="submit-btn" class="btn btn-primary"/>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
    
    
</div>
<script>
    function change_status(id){
        $('#change_interested_id').val(id);
        $('#changeStatusPopup').modal();
    }
    
    function interested_popup(id,post_id, rent_sell){
          $.ajax({
              url:'<?php echo base_url(); ?>property/get_interested_details_by_id',
              data:{'id':id},
              type:'post',
              dataType:'json',
              success:function(data){
                  $('#interested_details_id').val(data['id']);
                  $('#interested_post_id').val(data['post_id']);
                  $('#interested_rent_sell').val(data['rent_sell']);
                  $('#interested_buyer').val(data['buyer']);
                  $('#buyer_lead').val(data['buyer_lead']);
                  $('#interested_amount').val(data['amount']);
                  $('#interested_commission').val(data['commission']);
                  $('#interested_deposite').val(data['deposite']);
                  $('#interested_rent').val(data['rent']);
                  $('#interested_expiry_date').val(data['expiry_date']);
                  if(data['rent_sell'] == 'Sell'){
                      $('.sell').css('display','block');
                      $('#interested_amount').attr('required','required');
                      $('#interested_expiry_date').removeAttr('required');
                      $('#interested_rent').removeAttr('required');
                      $('#interested_deposite').removeAttr('required');
                      $('.rent').css('display','none');
                  }else{
                      $('.rent').css('display','block');
                      $('.sell').css('display','none');
                      $('#interested_expiry_date').attr('required','required');
                      $('#interested_rent').attr('required','required');
                      $('#interested_deposite').attr('required','required');
                      $('interested_amount').removeAttr('required');
                  }
                  $('#interested_popup').modal();
              }
          });
          
      }
      
    function close_deal(deal_details_id, commission){
      $('#deal_details_id').val(deal_details_id);
      $('#deal_commission').val(commission);
      $('#close_deal_popup').modal();
    }
    
    function in_process_popup(id, rent_sell, buyer_lead_id, client_lead_id){
        $.ajax({
           url:'<?php echo base_url(); ?>property/get_in_process_deal_details_by_id',
           type:'post',
           data:{'id':id, 'rent_sell':rent_sell},
           dataType:'json',
           success:function(data){
               if(rent_sell == 'Rent'){
                    $('#rent_inprocess_interested_id').val(id);
                    $('#rent_inprocess_client_id').val(buyer_lead_id);
                    $('#rent_inprocess_owner_id').val(client_lead_id);
                    $('#rent_inprocess_deposite').val(data['deposite']);
                    $('#rent_inprocess_rent').val(data['rent']);
                    $('#rent_inprocess_client_commission').val(data['commission1']);
                    $('#rent_inprocess_owner_commission').val(data['commission']);
                    $('#rent_inprocess_client_details').val(data['extra_services1']);
                    $('#rent_inprocess_owner_details').val(data['extra_services']);
                    $("#inprocessRentPopup").modal();
                }else{
                    $('#sale_inprocess_interested_id').val(id);
                    $('#sale_inprocess_client_id').val(buyer_lead_id);
                    $('#sale_inprocess_owner_id').val(client_lead_id);
                    $('#sale_inprocess_price').val(data['amount']);
                    $('#sale_inprocess_client_commission').val(data['commission1']);
                    $('#sale_inprocess_owner_commission').val(data['commission']);
                    $('#sale_inprocess_client_details').val(data['extra_services1']);
                    $('#sale_inprocess_owner_details').val(data['extra_services']);
                    $("#inprocessSalePopup").modal();
                }
           }
        });
    }
    
     function edit_deal_popup(id, rent_sell){
        /*if(rent_sell == 'Rent'){
            $("#interestedRentEditPopup").modal();
        }else{
            $("#interestedSaleEditPopup").modal();
        }*/
        $.ajax({
           url:'<?php echo base_url(); ?>property/get_in_process_deal_details_by_id',
           type:'post',
           data:{'id':id, 'rent_sell':rent_sell},
           dataType:'json',
           success:function(data){
               if(rent_sell == 'Rent'){
                    $('#interested_id').val(data['id']);
                    $('#security_deposite').val(data['deposite']);
                    $('#rent').val(data['rent']);
                    $('#rent_start_from').val(data['rent_start_from']);
                    $('#rent_upto').val(data['rent_upto']);
                    $('#rent_executive').val(data['executive']);
                    $('#rent_caller').val(data['caller']);
                    $('#rent_property_id').val(data['post_id']);
                    $('#rent_property_lead').val(data['property_lead']);
                    $('#rent_commission').val(data['commission']);
                    $('#rent_client_id').val(data['buyer']);
                    $('#rent_client_lead').val(data['buyer_lead']);
                    $('#rent_commission1').val(data['commission1']);
                    $('#rent_owner_details').val(data['extra_services']);
                    $('#rent_client_details').val(data['extra_services1']);
                    $("#interestedRentEditPopup").modal();
                }else{
                    $('#sale_interested_id').val(data['id']);
                    $('#sale_post_id').val(data['post_id']);
                    $('#sale_buyer_id').val(data['buyer']);
                    $('#sale_price').val(data['amount']);
                    $('#sale_property_id').val(data['property_lead']);
                    $('#sale_property_commission').val(data['commission']);
                    $('#sale_client_id').val(data['buyer_lead']);
                    $('#sale_client_commission').val(data['commission1']);
                    $('#sale_details_owner').val(data['extra_services']);
                    $('#sale_details_client').val(data['extra_services1']);
                    $('#sale_executive').val(data['executive']);
                    $('#sale_caller').val(data['caller']);
                    $("#interestedSaleEditPopup").modal();
                }
           }
        });
    }
      
</script>

        
