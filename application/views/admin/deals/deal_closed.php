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
                    <h2>Deal Closed List</h2>
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
                                <?php if(!empty($list_closed_payment)){ ?>
                                    <?php foreach($list_closed_payment as $i=>$row){ ?>
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
                                                <a target="_blank" href="<?php echo base_url(); ?>property/print_invoice/<?php echo $row->id; ?>/<?php echo $row->deal_type; ?>"><button onclick="">Print</button></a>
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
                <input type="button" name="save" value="Close" data-dismiss="modal" class="btn btn-primary"/>
            </div>
        </div>

    </div>
</div>


<script type="text/javascript">
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
</script>
