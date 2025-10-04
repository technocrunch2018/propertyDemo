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
                    <h2>In Process List</h2>
                 <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                       <table id="datatable" class="table table-bordered table-striped">
                <thead> 
                
                  <tr>
                    <th>Sr.No</th>
                    <th>Date</th>
                    <th>Deal ID</th>
                    <th>Type</th>
                    <th>Client ID</th>
                    <th>Name</th>
                    <th>Property ID</th>
                    <th>Owner Name</th>
                    <th>Lead By</th>
                    <th>Name</th>
                    <th>Admin1</th>
                    <th>Admin2</th>
                    <?php if($type == 'Rent'){ ?>
                    <th>S. Deposite</th>
                    <th>Rent</th>
                    <?php }else{ ?>
                    <th>Price</th>
                    <?php } ?>
                    <th>Commission</th>
                    <th>Details</th>
                    <?php if($type == 'Rent'){ ?>
                    <th>Renewal Date</th>
                    <?php } ?>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                    <?php if(!empty($list_interested)){ ?>
                    <?php foreach($list_interested as $i=>$row){ ?>
                    <tr>
                        <td><?php echo $i+1; ?></td>
                        <td><?php echo $row['created']; ?></td>
                        <td><?php echo $row['deal_id']; ?></td>
                        <td><?php echo $row['type']; ?></td>
                        <td><?php echo $row['client_id']; ?></td>
                        <td><?php echo $row['client_name']; ?></td>
                        <td><?php echo $row['property_id']; ?></td>
                        <td><?php echo $row['owner_name']; ?></td>
                        <td><?php echo $row['lead_by']; ?></td>
                        <td><?php echo $row['lead_by_name']; ?></td>
                        <td><?php echo $row['admin1']; ?></td>
                        <td><?php echo $row['admin2']; ?></td>
                        <?php if($type == 'Rent'){ ?>
                        <td><?php echo $row['deposite']; ?></td>
                        <td><?php echo $row['rent']; ?></td>
                        <?php }else{ ?>
                        <td><?php echo $row['amount']; ?></td>
                        <?php } ?>
                        <td><?php echo $row['commission']; ?></td>
                        <td><?php echo $row['extra_services']; ?></td>
                        <?php if($type == 'Rent'){ ?>
                        <td><?php echo $row['expiry_date']; ?></td>
                        <?php } ?>
                        <td>
                            <!--<a href="javascript:void(0);" onclick="change_status(<?php echo $row['id']; ?>);"><span title="Change Status" class="label label-info">Change Status</span></a>-->
                            <?php //if($row['in_process_flag'] == 0){ ?>
                            <!--<a href="javascript:void(0);" onclick="interested_popup(<?php echo $row['id']; ?>,<?php echo $row['post_id']; ?>,'<?php echo $row['rent_sell']; ?>')"><span title="Interested" class="label label-primary">In Process</span></a>-->
                            <?php //} ?>
                            <a href="javascript:void(0);" onclick="edit_inprocess(<?php echo $row['id']; ?>, '<?php echo $type; ?>');"><span title="Edit" class="label label-info">Edit</span></a>
                            <!--<a href="javascript:void(0);" onclick="change_status(<?php echo $row['id']; ?>);"><span title="Change Status" class="label label-primary">Cancel</span></a>-->
                            <a href="<?php echo base_url(); ?>property/cancel_in_process_deal/<?php echo $type; ?>/<?php echo $row['id']; ?>" onclick="return confirm('Do you want to cancel this deal?');"><span title="Cancel Deal" class="label label-danger">Cancel</span></a>
                            <a href="javascript:void(0);" onclick="close_deal(<?php echo $row['id']; ?>, '<?php echo $row['type']; ?>','<?php echo $row['commission']; ?>','<?php echo $row['client_id']; ?>','<?php echo $row['property_id']; ?>');"><span title="Close" class="label label-success">Close</span></a>
                        </td>
                    </tr>
                <?php } ?>
                <?php } ?>
                </tbody>
               
              </table>
  <div class="container">
  <!-- Trigger the modal with a button -->
 

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog  modal-lg">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style="background:linear-gradient(to right,#03709e,#18c3fd 100%);">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title" style="color:white;font-weight:bold;font-size:20px;">On Process</h4>
        </div>
        <div class="modal-body">
<!--        <form method="POST">-->
<!--          <div class="row">-->
           
<!--               <div class="col-md-6 col-sm-6 col-xs-6">-->
<!--              <label>Caller Id</label><b style="color:red;">*</b>-->
<!--                <input readonly type="text" name="user_id" value="FL<?php echo rand(100000000,0000000000);?>" id="room"style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  />-->
<!--              </div>-->
             
<!--              <div class="col-md-6 col-sm-6 col-xs-6">-->
<!--              <label>Executive</label><b style="color:red;">*</b>-->
<!--                <input type="text" name="name" id="room"style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  />-->
<!--              </div>-->
              
<!--              <div class="col-md-6 col-sm-6 col-xs-6">-->
<!--              <label>Sourse Type</label><b style="color:red;">*</b>-->
<!--                <input type="text" name="name" id="room"style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  />-->
<!--              </div>-->
              
<!--              <div class="col-md-6 col-sm-6 col-xs-6">-->
<!--              <label>Sourse Type</label><b style="color:red;">*</b>-->
<!--                <input type="text" name="name" id="room"style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  />-->
<!--              </div>-->

<!--               <div class="col-md-6 col-sm-6 col-xs-6">-->
<!--              <label>Source Id</label><b style="color:red;">*</b>-->
<!--                <input type="text" name="mobile" id="room"style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  />-->
<!--              </div>-->
              
<!--              <div class="col-md-6 col-sm-6 col-xs-6">-->
<!--              <label>Source Id</label><b style="color:red;">*</b>-->
<!--                <input type="text" name="mobile" id="room"style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  />-->
<!--              </div>-->

<!--               <div class="col-md-6 col-sm-6 col-xs-6">-->
<!--              <label>Mobile</label><b style="color:red;">*</b>-->
<!--                <input type="text" name="mobile_sec" id="room"style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  />-->
<!--              </div>-->
              
<!--              <div class="col-md-6 col-sm-6 col-xs-6">-->
<!--              <label>Stock Id</label><b style="color:red;">*</b>-->
<!--                <input type="text" name="mobile_sec" id="room"style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  />-->
<!--              </div>-->

<!-- <div class="col-md-6 col-sm-6 col-xs-6">-->
<!--              <label>Stock Id</label><b style="color:red;">*</b>-->
<!--                <input type="text" name="mobile_sec" id="room"style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  />-->
<!--              </div>-->

<!--              <div class="col-md-6 col-sm-6 col-xs-6">-->
<!--              <label>Name </label><b style="color:red;">*</b>-->
<!--                <input type="text" name="mobile_sec" id="room"style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  />-->
<!--              </div>-->
              
<!--              <div class="col-md-6 col-sm-6 col-xs-6">-->
<!--              <label>Name </label><b style="color:red;">*</b>-->
<!--                <input type="text" name="mobile_sec" id="room"style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  />-->
<!--              </div>-->
              
<!--              <div class="col-md-6 col-sm-6 col-xs-6">-->
<!--              <label>Mobile </label><b style="color:red;">*</b>-->
<!--                <input type="text" name="mobile_sec" id="room"style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  />-->
<!--              </div>-->
              
<!--              <div class="col-md-6 col-sm-6 col-xs-6">-->
<!--              <label>Mobile </label><b style="color:red;">*</b>-->
<!--                <input type="text" name="mobile_sec" id="room"style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  />-->
<!--              </div>-->
              
<!--              <div class="col-md-6 col-sm-6 col-xs-6">-->
<!--              <label>Mobile </label><b style="color:red;">*</b>-->
<!--                <input type="text" name="mobile_sec" id="room"style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  />-->
<!--              </div>-->
              
<!--              <div class="col-md-6 col-sm-6 col-xs-6">-->
<!--              <label>Mobile </label><b style="color:red;">*</b>-->
<!--                <input type="text" name="mobile_sec" id="room"style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  />-->
<!--              </div>-->
              
<!--              <div class="col-md-6 col-sm-6 col-xs-6">-->
<!--              <label>Phone </label><b style="color:red;">*</b>-->
<!--                <input type="text" name="mobile_sec" id="room"style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  />-->
<!--              </div>-->

<!--<div class="col-md-6 col-sm-6 col-xs-6">-->
<!--              <label>Phone </label><b style="color:red;">*</b>-->
<!--                <input type="text" name="mobile_sec" id="room"style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  />-->
<!--              </div>-->

<!--                  <div class="col-md-6 col-sm-6 col-xs-6">-->
<!--              <label>Email </label><b style="color:red;">*</b>-->
<!--                <input type="text" name="mobile_sec" id="room"style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  />-->
<!--              </div>-->
              
<!--              <div class="col-md-6 col-sm-6 col-xs-6">-->
<!--              <label>Email </label><b style="color:red;">*</b>-->
<!--                <input type="text" name="mobile_sec" id="room"style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  />-->
<!--              </div>-->
              
<!--              <div class="col-md-6 col-sm-6 col-xs-6">-->
<!--              <label>Final Amount </label><b style="color:red;">*</b>-->
<!--                <input type="text" name="mobile_sec" id="room"style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  />-->
<!--              </div>-->
              
<!--              <div class="col-md-6 col-sm-6 col-xs-6">-->
<!--              <label>Net Amount </label><b style="color:red;">*</b>-->
<!--                <input type="text" name="mobile_sec" id="room"style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  />-->
<!--              </div>-->
              
<!--              <div class="col-md-6 col-sm-6 col-xs-6">-->
<!--              <label>Brokeage</label><b style="color:red;">*</b>-->
<!--                <input type="text" name="mobile_sec" id="room"style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  />-->
<!--              </div>-->
              
<!--              <div class="col-md-6 col-sm-6 col-xs-6">-->
<!--              <label>Brokeage</label><b style="color:red;">*</b>-->
<!--                <input type="text" name="mobile_sec" id="room"style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  />-->
<!--              </div>-->
              
              
<!--              <div class="col-md-6 col-sm-6 col-xs-6">-->
<!--              <label>Rent Renewal Date</label><b style="color:red;">*</b>-->
<!--                <input type="date" name="mobile_sec" id="room"style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  />-->
<!--              </div>-->
              
<!--              <div class="col-md-6 col-sm-6 col-xs-6">-->
<!--              <label>Rent Renewal Date</label><b style="color:red;">*</b>-->
<!--                <input type="date" name="mobile_sec" id="room"style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  />-->
<!--              </div>-->

<!--             <div class="modal-footer">-->
<!--                  <input type="submit" name="save" value="Save" class="btn btn-primary"/>-->
<!--                </div>-->
                
<!--              </form>-->
              </div>

                
              </div>
      
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
        
        
        
        
        <div class="modal fade" id="close_deal_popup" role="dialog">
            <div class="modal-dialog  modal-lg">
    
                <div class="modal-content">
                    <div class="modal-header" style="background:linear-gradient(to right,#03709e,#18c3fd 100%);">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title" style="color:white;font-weight:bold;font-size:20px;">Close Deal</h4>
                    </div>
                    <div class="modal-body">
                        <form name="interested_popup_form" id="interested_popup_form" method="POST" enctype="multipart/form-data" action="<?php echo base_url(); ?>property/save_deal_pending_details">
                            <div class="row">
                                <input type="hidden" name="deal_details_id" value="0" id="deal_details_id" style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" />
                                <input type="hidden" name="deal_type" value="0" id="deal_type" style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;"  />
                                <input type="hidden" name="party_id" value="0" id="party_id" style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;"  />
                                <input type="hidden" name="redirect_url" value="<?php echo current_url(); ?>" id="redirect_url" style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" />
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="col-md-4 col-sm-6 col-xs-6">
                                        <label>Commission</label><b style="color:red;">*</b>
                                        <input type="text" name="deal_commission" id="deal_commission" class="form-control" placeholder="Commission" readonly>
                                    </div>
                                    
                                    <div class="col-md-4 col-sm-6 col-xs-6">
                                        <label>GST<?php echo $other_settings->gst; ?>%</label><b style="color:red;">*</b>
                                        <input type="text" name="deal_gst" id="deal_gst" class="form-control" placeholder="GST" readonly>
                                    </div>
                                    
                                    <div class="col-md-4 col-sm-6 col-xs-6">
                                        <label>SGST</label><b style="color:red;">*</b>
                                        <input type="text" name="deal_sgst" id="deal_sgst" class="form-control" placeholder="SGST" readonly>
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="col-md-4 col-sm-6 col-xs-6">
                                        <label>CGST</label><b style="color:red;">*</b>
                                        <input type="text" name="deal_cgst" id="deal_cgst" class="form-control" placeholder="CGST" readonly>
                                    </div>
                                    
                                    <div class="col-md-4 col-sm-6 col-xs-6">
                                        <label>TDS</label><b style="color:red;">*</b>
                                        <input type="text" name="deal_tds" id="deal_tds" class="form-control" placeholder="TDS" onkeyup="change_deal_received_amount()">
                                    </div>
                                    
                                    <div class="col-md-4 col-sm-6 col-xs-6">
                                        <label>Total</label><b style="color:red;">*</b>
                                        <input type="text" name="deal_total" id="deal_total" class="form-control" placeholder="Total" readonly>
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="col-md-4 col-sm-6 col-xs-6">
                                        <label>Received</label><b style="color:red;">*</b>
                                        <input type="text" name="deal_received" id="deal_received" class="form-control" placeholder="Received" onkeyup="change_deal_received_amount()" required>
                                    </div>
                                    
                                    <div class="col-md-4 col-sm-6 col-xs-6">
                                        <label>Pending Amount</label><b style="color:red;">*</b>
                                        <input type="number" name="deal_pending" id="deal_pending" class="form-control" placeholder="Pending">
                                    </div>
                                    
                                    <div class="col-md-4 col-sm-6 col-xs-6">
                                        <label>Date</label><b style="color:red;">*</b>
                                        <input type="date" name="deal_date" id="deal_date" class="form-control" placeholder="Date" required>
                                    </div>
                                </div>
                                </div>
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="col-md-4 col-sm-6 col-xs-6">
                                        <label>Mode</label><b style="color:red;">*</b>
                                        <select name="deal_mode" id="deal_mode" class="form-control" required >
                                            <option value="Cash">Cash</option>
                                            <option value="Cheque">Cheque</option>
                                            <option value="Net Banking">Net Banking</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4 col-sm-6 col-xs-6">
                                        <label>T.ID/Ch.No</label><b style="color:red;">*</b>
                                        <input type="text" name="deal_payment_ref" id="deal_payment_ref" class="form-control" placeholder="Ref No" required>
                                    </div> 
                                    <div class="col-md-4 col-sm-6 col-xs-6">
                                        <label>Bank</label><b style="color:red;">*</b>
                                        <input type="text" name="deal_payment_bank" id="deal_payment_bank" class="form-control" placeholder="Bank" required>
                                    </div>
                                    <input type="hidden" name="deal_reason" id="deal_reason" value=""/>
                                    <input type="hidden" name="deal_close_type" id="deal_close_type" value="Pending"/>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <input type="submit" name="save" value="Pending" id="deal-pending-btn" class="btn btn-warning"/>
                                <input type="button" name="save" value="Close" id="deal-close-btn" onclick="close_deal_reason_popup()" class="btn btn-primary"/>
                            </div>
                        </form>
                    </div>
                </div>
    
            </div>
        </div>
        
        
        <div class="modal fade" id="ask_deal_close_reason_popup" role="dialog">
            <div class="modal-dialog  modal-lg">
    
                <div class="modal-content">
                    <div class="modal-header" style="background:linear-gradient(to right,#03709e,#18c3fd 100%);">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title" style="color:white;font-weight:bold;font-size:20px;">Do you want to close this deal?</h4>
                    </div>
                    <div class="modal-body">
                        <!--<form name="interested_popup_form" id="interested_popup_form" method="POST" enctype="multipart/form-data" action="<?php echo base_url(); ?>property/save_deal_close_details">-->
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="col-md-4 col-sm-6 col-xs-6">
                                        <label>Reason</label><b style="color:red;">*</b>
                                        <input type="text" name="close_deal_reason" id="close_deal_reason" class="form-control" placeholder="Reason" required>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <input type="button" name="save" value="Close" onclick="set_deal_close_reason()" class="btn btn-warning"/>
                                <input type="button" name="save" value="Cancel" data-dismiss="modal" class="btn btn-primary"/>
                            </div>
                        <!--</form>-->
                    </div>
                </div>
    
            </div>
        </div>
        
        
        
        <div class="modal fade" id="edit_rent" role="dialog">
            <div class="modal-dialog  modal-lg">
    
                <div class="modal-content">
                    <div class="modal-header" style="background:linear-gradient(to right,#03709e,#18c3fd 100%);">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title" style="color:white;font-weight:bold;font-size:20px;">Edit Details</h4>
                    </div>
                    <div class="modal-body">
                       <form name="save_in_process_rent_details" id="save_in_process_rent_details" method="POST" enctype="multipart/form-data" action="<?php echo base_url(); ?>property/save_in_process_rent_details">
                        <input type="hidden" name="rent_interested_id" id="rent_interested_id" value=""/>
                        <input type="hidden" name="rent_property_id" id="rent_property_id" value=""/>
                        <input type="hidden" name="rent_client_id" id="rent_client_id" value=""/>
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="col-md-3 col-sm-6 col-xs-6">
                                        <label>Security Deposite</label><b style="color:red;">*</b>
                                        <input type="text" name="rent_security_deposite" id="rent_security_deposite" class="form-control" placeholder="Deposite" required>
                                    </div>
                                    
                                    <div class="col-md-3 col-sm-6 col-xs-6">
                                        <label>Rent</label><b style="color:red;">*</b>
                                        <input type="text" name="rent" id="rent" class="form-control" placeholder="Rent" required>
                                    </div>
                                    
                                    <div class="col-md-3 col-sm-6 col-xs-6">
                                        <label>Commission(Owner)</label><b style="color:red;">*</b>
                                        <input type="text" name="rent_owner_commission" id="rent_owner_commission" class="form-control" placeholder="Commission(Owner)" required>
                                    </div>
                                    <div class="col-md-3 col-sm-6 col-xs-6">
                                        <label>Commission(Buyer)</label><b style="color:red;">*</b>
                                        <input type="text" name="rent_client_commission" id="rent_client_commission" class="form-control" placeholder="Commission(Buyer)" required>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="col-md-6 col-sm-6 col-xs-6">
                                        <label>Rent Start From</label><b style="color:red;">*</b>
                                        <input type="date" name="rent_start_from" id="rent_start_from" class="form-control" placeholder="Rent Start From" required>
                                    </div>
                                    
                                    <div class="col-md-6 col-sm-6 col-xs-6">
                                        <label>Rent Upto</label><b style="color:red;">*</b>
                                        <input type="date" name="rent_upto" id="rent_upto" class="form-control" placeholder="Rent" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="col-md-6 col-sm-6 col-xs-6">
                                        <label>Details(Owner)</label><b style="color:red;">*</b>
                                        <input type="text" name="rent_owner_details" id="rent_owner_details" class="form-control" placeholder="Details(Owner)" >
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-6">
                                        <label>Details(Client)</label><b style="color:red;">*</b>
                                        <input type="text" name="rent_client_details" id="rent_client_details" class="form-control" placeholder="Details(Client)" >
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="modal-footer">
                                <input type="submit" name="save" value="Save" class="btn btn-warning"/>
                                <input type="button" name="save" value="Cancel" data-dismiss="modal" class="btn btn-primary"/>
                            </div>
                        </form>
                    </div>
                </div>
    
            </div>
        </div>
        
        
        <div class="modal fade" id="edit_sale" role="dialog">
            <div class="modal-dialog  modal-lg">
    
                <div class="modal-content">
                    <div class="modal-header" style="background:linear-gradient(to right,#03709e,#18c3fd 100%);">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title" style="color:white;font-weight:bold;font-size:20px;">Edit Details</h4>
                    </div>
                    <div class="modal-body">
                        <form name="sale_inprocess_popup" id="sale_inprocess_popup" method="POST" enctype="multipart/form-data" action="<?php echo base_url(); ?>property/save_in_process_sale_details">
                            <input type="hidden" name="sale_interested_id" id="sale_interested_id" value=""/>
                            <input type="hidden" name="sale_property_id" id="sale_property_id" value=""/>
                            <input type="hidden" name="sale_client_id" id="sale_client_id" value=""/>
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="col-md-4 col-sm-6 col-xs-6">
                                        <label>Price</label><b style="color:red;">*</b>
                                        <input type="text" name="sale_price" id="sale_price" class="form-control" placeholder="Price" required>
                                    </div>
                                    
                                    <div class="col-md-4 col-sm-6 col-xs-6">
                                        <label>Commission(Owner)</label><b style="color:red;">*</b>
                                        <input type="text" name="sale_owner_commission" id="sale_owner_commission" class="form-control" placeholder="Commission(Owner)" required>
                                    </div>
                                    <div class="col-md-4 col-sm-6 col-xs-6">
                                        <label>Commission(Buyer)</label><b style="color:red;">*</b>
                                        <input type="text" name="sale_client_commission" id="sale_client_commission" class="form-control" placeholder="Commission(Buyer)" required>
                                    </div>
                                </div>
                            </div>
                            
                        
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="col-md-6 col-sm-6 col-xs-6">
                                        <label>Details(Owner)</label><b style="color:red;">*</b>
                                        <input type="text" name="sale_owner_details" id="sale_owner_details" class="form-control" placeholder="Details(Owner)" >
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-6">
                                        <label>Details(Client)</label><b style="color:red;">*</b>
                                        <input type="text" name="sale_client_details" id="sale_client_details" class="form-control" placeholder="Details(Client)" >
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="modal-footer">
                                <input type="submit" name="save" value="Save"  class="btn btn-warning"/>
                                <input type="button" name="save" value="Cancel" data-dismiss="modal" class="btn btn-primary"/>
                            </div>
                        </form>
                    </div>
                </div>
    
            </div>
        </div>
        
        
        <script>
            function close_deal(deal_id, type, commission, client_id, property_id){
                  $('#deal_details_id').val(deal_id);
                  $('#deal_type').val(type);
                  $('#deal_commission').val(commission);
                  if(type == 'Owner'){
                        $('#party_id').val(property_id);
                  }else{
                        $('#party_id').val(client_id);
                  }
                  var commission = parseInt(commission);
                  var gst = '<?php echo $other_settings->gst; ?>';
                  var cgst = '<?php echo $other_settings->cgst; ?>';
                  var sgst = '<?php echo $other_settings->sgst; ?>';
                  var tds = '<?php echo $other_settings->tds; ?>';
                  var deal_gst = parseFloat(commission)*parseFloat(gst)/100;
                  var deal_cgst = parseFloat(deal_gst)*parseFloat(cgst)/100;
                  var deal_sgst = parseFloat(deal_gst)*parseFloat(sgst)/100;
                  var deal_tds = parseFloat(tds);
                  var deal_tds = 0;
                  var total_amount = parseInt(parseInt(commission+deal_gst)-deal_tds);
                  $('#deal_gst').val(deal_gst);
                  $('#deal_cgst').val(deal_cgst);
                  $('#deal_sgst').val(deal_sgst);
                  /*$('#deal_tds').val(deal_tds);*/
                  $('#deal_total').val(total_amount);
                  $('#close_deal_popup').modal();
              }
              
              function change_deal_received_amount(){
                  var commission = parseFloat($('#deal_commission').val());
                  /*var total = parseFloat($('#deal_total').val());*/
                  var received = parseFloat($('#deal_received').val());
                  var tds = parseFloat($('#deal_tds').val());
                  var gst = parseFloat($('#deal_gst').val());
                  var total =  parseFloat(parseFloat(commission+gst)-tds);
                  $('#deal_total').val(total);
                  var pending = parseInt(total-received);
                  $('#deal_pending').val(pending);
                  if(pending>0){
                        $('#deal-pending-btn').css('display', 'block');
                  }else{
                      $('#deal-pending-btn').css('display', 'none');
                  }
              }
              
              function close_deal_reason_popup(){
                  /*var deal_details_id = $('#deal_details_id').val();
                  var close_deal_details_type = $('#deal_type').val();
                  $('#close_deal_details_id').val(deal_details_id);
                  $('#close_deal_details_type').val(close_deal_details_type);*/
                  var pending = parseInt($('#deal_pending').val());
                  if(pending > 0){
                      $('#ask_deal_close_reason_popup').modal();
                  }else{
                      $('#deal_close_type').val("Close");
                      $('#interested_popup_form').submit();
                  }
                  /*$('#deal_close_details_popup').modal();*/
              }
              
              
              function set_deal_close_reason(){
                  var reason = $('#close_deal_reason').val();
                  $('#deal_reason').val(reason);
                  $('#deal_close_type').val("Close");
                  $('#ask_deal_close_reason_popup').modal('hide');
                  $('#interested_popup_form').submit();
              }
              
              
              function edit_inprocess(id, rent_sell){
                $.ajax({
                    url:'<?php echo base_url(); ?>property/get_interested_details_by_id',
                    data:{'id':id},
                    type:'post',
                    dataType:'json',
                    success:function(data){
                        if(rent_sell == 'Rent'){
                            $('#rent_interested_id').val(data['id']);
                            $('#rent_property_id').val(data['post_id']);
                            $('#rent_client_id').val(data['buyer']);
                            $('#rent_security_deposite').val(data['deposite']);
                            $('#rent').val(data['rent']);
                            $('#rent_owner_commission').val(data['commission']);
                            $('#rent_client_commission').val(data['commission1']);
                            $('#rent_start_from').val(data['rent_start_from']);
                            $('#rent_upto').val(data['rent_upto']);
                            $('#rent_owner_details').val(data['extra_services']);
                            $('#rent_client_details').val(data['extra_services1']);
                            $('#edit_rent').modal();
                        }else{
                            $('#sale_interested_id').val(data['id']);
                            $('#sale_property_id').val(data['post_id']);
                            $('#sale_client_id').val(data['buyer']);
                            $('#sale_price').val(data['amount']);
                            $('#sale_owner_commission').val(data['commission']);
                            $('#sale_client_commission').val(data['commission1']);
                            $('#sale_owner_details').val(data['extra_services']);
                            $('#sale_client_details').val(data['extra_services1']);
                            $('#edit_sale').modal();
                        }
                    }
                });
              }
        </script>

        