
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
                        <h2>Payment Pending List</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <table id="datatable" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Sr.No</th>
                                    <th>Type</th>
                                    <th>Client Type</th>
                                    <th>ID</th>
                                    <th>Deal ID</th>
                                    <th>Commision</th>
                                    <th>GST</th>
                                    <th>TDS</th>
                                    <th>Net Amount</th>
                                    <th>Received</th>
                                    <th>Pending</th>
                                    <th>Payment Details</th>
                                    <th>Remarks</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(!empty($list_pending_payment)){ ?>
                                    <?php foreach($list_pending_payment as $i=>$row){ ?>
                                        <tr>
                                            <td><?php echo $i+1; ?></td>
                                            <td><?php echo $row->rent_sell; ?></td>
                                            <td><?php echo $row->deal_type; ?></td>
                                            <td><?php echo $row->party_id; ?></td>
                                            <td><?php echo $row->deal_id; ?></td>
                                            <td><?php echo $row->deal_commission; ?></td>
                                            <td><?php echo $row->deal_gst; ?></td>
                                            <td><?php echo $row->deal_tds; ?></td>
                                            <td><?php echo $row->deal_total; ?></td>
                                            <td><?php echo $row->deal_received; ?></td>
                                            <td><?php echo $row->deal_pending; ?></td>
                                            <td>
                                                <a href="javascript:void(0);" onclick="view_payment_details(<?php echo $row->payment_pending_details; ?>);"><span title="Payment Details" class="label label-success">Payment Details</span></a>
                                            </td>
                                            <td><?php echo $row->deal_close_reason; ?></td>
                                            <td>
                                                <a href="javascript:void(0);" onclick="close_deal_reason_popup(<?php echo $row->payment_pending_details; ?>, <?php echo $row->deal_pending; ?>, '<?php echo $row->deal_type; ?>',<?php echo $row->deal_id; ?>);"><span title="Close" class="label label-info">Close</span></a>
                                                <a href="javascript:void(0);" onclick="receive_payment(<?php echo $row->payment_pending_details; ?>,<?php echo $row->id; ?>);"><span title="Receive" class="label label-success">Receive</span></a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                <?php } ?>
                            </tbody>

                        </table>





                        <!-- <div class="container">
                            <div class="modal fade" id="myModal" role="dialog">
                                <div class="modal-dialog  modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header" style="background:linear-gradient(to right,#03709e,#18c3fd 100%);">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title" style="color:white;font-weight:bold;font-size:20px;">On Process</h4>
                                        </div>
                                        <div class="modal-body">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> -->


                        <div class="modal fade" id="ask_deal_close_reason_popup" role="dialog">
                            <div class="modal-dialog  modal-lg">
                    
                                <div class="modal-content">
                                    <div class="modal-header" style="background:linear-gradient(to right,#03709e,#18c3fd 100%);">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title" style="color:white;font-weight:bold;font-size:20px;">Do you want to close this deal?</h4>
                                    </div>
                                    <div class="modal-body">
                                        <form name="close_payment_pending_deal" id="close_payment_pending_deal" method="POST" enctype="multipart/form-data" action="<?php echo base_url(); ?>property/close_payment_pending_deal">
                                            <input type="hidden" name="payment_pending_details" id="payment_pending_details" class="form-control" >
                                            <input type="hidden" name="deal_id" id="deal_id" class="form-control" >
                                            <input type="hidden" name="deal_type" id="deal_type" class="form-control" >
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12 col-xs-12">
                                                    <div class="col-md-12 col-sm-6 col-xs-6">
                                                        <label>Reason</label><b style="color:red;">*</b>
                                                        <input type="text" name="close_deal_reason" id="close_deal_reason" class="form-control" placeholder="Reason" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <input type="submit" name="save" value="Close" onclick="set_deal_close_reason()" class="btn btn-warning"/>
                                                <input type="button" name="save" value="Cancel" data-dismiss="modal" class="btn btn-primary"/>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                    
                            </div>
                        </div>



                        <div class="modal fade" id="deal_payment_details_popup" role="dialog">
                            <div class="modal-dialog  modal-lg">
                    
                                <div class="modal-content">
                                    <div class="modal-header" style="background:linear-gradient(to right,#03709e,#18c3fd 100%);">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title" style="color:white;font-weight:bold;font-size:20px;">Deal Payment Details</h4>
                                    </div>
                                    <div class="modal-body" id="deal_payment_details_popup_body">
                                        
                                    </div>
                                    <div class="modal-footer">
                                        <input type="button" name="save" value="Cancel" data-dismiss="modal" class="btn btn-primary"/>
                                    </div>
                                </div>
                    
                            </div>
                        </div>



                        <div class="modal fade" id="receive_deal_payment_popup" role="dialog">
                            <div class="modal-dialog  modal-lg">                    
                                <div class="modal-content">
                                    <div class="modal-header" style="background:linear-gradient(to right,#03709e,#18c3fd 100%);">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title" style="color:white;font-weight:bold;font-size:20px;">Receive Deal Payment Details</h4>
                                    </div>
                                    <form name="add_deal_payment_details" id="add_deal_payment_details" method="POST" enctype="multipart/form-data" action="<?php echo base_url(); ?>property/add_deal_payment_details">
                                        <input type="hidden" name="property_interested_details_id" id="property_interested_details_id" class="form-control" placeholder="Date" >
                                        <input type="hidden" name="payment_pending_details_id" id="payment_pending_details_id" class="form-control" placeholder="Date" >
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-md-4 col-sm-6 col-xs-6">
                                                    <label>Date</label><b style="color:red;">*</b>
                                                    <input type="date" name="payment_date" id="payment_date" class="form-control" placeholder="Date" required>
                                                </div>
                                                <div class="col-md-4 col-sm-6 col-xs-6">
                                                    <label>Amount</label><b style="color:red;">*</b>
                                                    <input type="number" name="payment_amount" id="payment_amount" class="form-control" placeholder="Date" required>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4 col-sm-6 col-xs-6">
                                                    <label>Mode</label><b style="color:red;">*</b>
                                                    <select name="payment_mode" id="payment_mode" class="form-control" required >
                                                        <option value="Cash">Cash</option>
                                                        <option value="Cheque">Cheque</option>
                                                        <option value="Net Banking">Net Banking</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-4 col-sm-6 col-xs-6">
                                                    <label>T.ID/Ch.No</label><b style="color:red;">*</b>
                                                    <input type="text" name="payment_ref" id="payment_ref" class="form-control" placeholder="Ref No" required>
                                                </div> 
                                                <div class="col-md-4 col-sm-6 col-xs-6">
                                                    <label>Bank</label><b style="color:red;">*</b>
                                                    <input type="text" name="payment_bank" id="payment_bank" class="form-control" placeholder="Bank" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <input type="submit" name="save" value="Save" class="btn btn-primary"/>
                                            <input type="button" name="save" value="Cancel" data-dismiss="modal" class="btn btn-primary"/>
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
<!-- /page content-->
<script type="text/javascript">    
    function close_deal_reason_popup(payment_pending_details, deal_pending, deal_type, deal_id){
        if(deal_pending > 0){
            $('#deal_id').val(deal_id);
            $('#deal_type').val(deal_type);
            $('#payment_pending_details').val(payment_pending_details);
            $('#ask_deal_close_reason_popup').modal();
        }
    }

    function view_payment_details(payment_pending_details){
        $.ajax({
            url:'<?php echo base_url(); ?>property/view_deal_payment_details',
            data:{'payment_pending_details':payment_pending_details},
            type:'post',
            /*dataType:'json',*/
            success:function(data){
                $('#deal_payment_details_popup_body').html(data);
                $('#deal_payment_details_popup').modal();
            }
        });
    }

    function receive_payment(payment_pending_details, id){
        $('#property_interested_details_id').val(id); 
        $('#payment_pending_details_id').val(payment_pending_details); 
        $('#receive_deal_payment_popup').modal();               
    }
</script>