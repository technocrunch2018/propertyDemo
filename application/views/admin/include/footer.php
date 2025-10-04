<div class="container">
<!-- Modal -->
    <div class="modal fade" id="buyer_interested_popup" role="dialog">
        <div class="modal-dialog  modal-lg">

            <div class="modal-content">
                <div class="modal-header" style="background:linear-gradient(to right,#03709e,#18c3fd 100%);">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title" style="color:white;font-weight:bold;font-size:20px;">Add Interested Details</h4>
                </div>
                <div class="modal-body">
                    <!--<form name="interested_popup_form" id="interested_popup_form" method="POST" enctype="multipart/form-data" action="<?php echo base_url(); ?>property/save_property_interested_details">-->
                    <form name="interested_popup_form" id="interested_popup_form" method="POST" enctype="multipart/form-data" action="<?php echo base_url(); ?>property/save_requirement_interested_details">
                        <div class="row">
                            <input type="hidden" name="buyer_interested_post_id" value="0" id="buyer_interested_post_id" onblur="checkValue(this)"  />
                            <input type="hidden" name="interested_rent_sell" value="<?php echo $rent_sell; ?>" id="interested_rent_sell" onblur="checkValue(this)"  />
                            <input type="hidden" name="redirect_url" value="<?php echo current_url(); ?>" id="redirect_url" onblur="checkValue(this)"  />
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <label>Owner</label><b style="color:red;">*</b><br>
                                    <select style="width:100%;" name="interested_seller" id="interested_seller" class="form-control" value="" required>
                                        <option value="">Select One</option>
                                        <?php if(!empty($seller_list)){ ?>
                                        <?php foreach($seller_list as $row){ ?>
                                        <option value="<?php echo $row->post_id; ?>"><?php echo $row->lead_id; ?></option>
                                        <?php } ?>
                                        <?php } ?>
                                    </select>
                                    <!--<input type="text" name="interested_buyer" id="interested_buyer" class="form-control" value=""  required />-->
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <label>Status</label><b style="color:red;">*</b>
                                    <select name="interested_status" id="interested_status" class="form-control" onchange="change_buyer_post_status(this.value)" required>
                                        <!--<option value="">Select One</option>-->
                                        <option value="Interested" >Interested</option>
                                        <option value="In Process" selected>In Process</option>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="col-md-12 col-sm-12 col-xs-12" id="rent_in_process_details" <?php if(!empty($rent_sell)){ if($rent_sell == 'Sell'){ echo 'style="display:none;"'; } } ?>>
                                    <div class="col-md-4 col-sm-6 col-xs-12" >
                                        <label>Security Deposite</label><b style="color:red;">*</b>
                                        <input type="number" name="interested_deposite" id="interested_deposite" required    />
                                    </div>
                                    
                                    <div class="col-md-4 col-sm-6 col-xs-12">
                                        <label>Rent/Month</label><b style="color:red;">*</b>
                                        <input type="number" name="interested_rent" id="interested_rent" required    />
                                    </div>
                                    
                                    <div class="col-md-4 col-sm-6 col-xs-12">
                                        <label>Expiry Date</label><b style="color:red;">*</b>
                                        <input type="date" name="interested_expiry_date" id="interested_expiry_date" required    />
                                    </div>
                                </div>
                                
                                
                                <div class="col-md-12 col-sm-12 col-xs-12"   >    
                                   <div class="col-md-6 col-sm-6 col-xs-12" id="sell_in_process_details" <?php if(!empty($rent_sell)){ if($rent_sell == 'Rent'){ echo 'style="display:none;"'; } } ?>>
                                        <label>Deal Amount</label><b style="color:red;">*</b>
                                        <input type="number" name="interested_amount" id="interested_amount" required    />
                                    </div>
                                    <div id="buyer_interested_commission_details">
                                        <div class="<?php if(!empty($rent_sell)){ if($rent_sell == 'Sell'){ echo 'col-md-3'; }else{echo 'col-md-6';} } ?> col-sm-6 col-xs-12" id="buyer_interested_commission_details_div">
                                            <label>Commission1(Client)</label><b style="color:red;">*</b>
                                            <input type="number" name="interested_commission" id="interested_commission" required    />
                                        </div>
                                        <div class="<?php if(!empty($rent_sell)){ if($rent_sell == 'Sell'){ echo 'col-md-3'; }else{echo 'col-md-6';} } ?> col-sm-6 col-xs-12"  id="buyer_interested_commission1_details_div">
                                            <label>Commission2(Owner)</label><b style="color:red;">*</b>
                                            <input type="number" name="interested_commission1" id="interested_commission1" required    />
                                        </div>
                                    </div>
                                </div>
                               
                                
                                
                            
                            
                            <div class="col-md-12 col-sm-12 col-xs-12">    
                                <div class="col-md-6 col-sm-6 col-xs-12">
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
                                
                                <div class="col-md-6 col-sm-6 col-xs-12">
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

                               <!-- <div class="col-md-6 col-sm-6 col-xs-12">
                                    <label>Extra Services(Add multiple services seperated by comma)</label>
                                    <textarea name="extra_services" id="extra_services" class="formn-control"></textarea>
                                </div>-->
                            </div>
                        </div>
                        <div class="modal-footer">
                            <input type="submit" name="save" value="Save" id="submit-btn"/>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
    
    
    
    <div class="modal fade" id="seller_interested_popup" role="dialog">
        <div class="modal-dialog  modal-lg">

            <div class="modal-content">
                <div class="modal-header" style="background:linear-gradient(to right,#03709e,#18c3fd 100%);">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title" style="color:white;font-weight:bold;font-size:20px;">Add Stock Interested Details</h4>
                </div>
                <div class="modal-body">
                    <form name="interested_popup_form" id="interested_popup_form" method="POST" enctype="multipart/form-data" action="<?php echo base_url(); ?>property/save_property_interested_details">
                    <!--<form name="seller_interested_popup_form" id="seller_interested_popup_form" method="POST" enctype="multipart/form-data" action="<?php echo base_url(); ?>property/save_requirement_interested_details">-->
                        <div class="row">
                            <input type="hidden" name="seller_interested_post_id" value="0" id="seller_interested_post_id" onblur="checkValue(this)"  />
                            <input type="hidden" name="seller_interested_rent_sell" value="<?php echo $rent_sell; ?>" id="seller_interested_rent_sell" />
                            <input type="hidden" name="redirect_url" value="<?php echo current_url(); ?>" />
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <label>Client</label><b style="color:red;">*</b><br>
                                    <select style="width:100%;" name="interested_buyer" id="interested_buyer" class="form-control" value="" required>
                                        <option value="">Select One</option>
                                        <?php if(!empty($buyer_list)){ ?>
                                        <?php foreach($buyer_list as $row){ ?>
                                        <option value="<?php echo $row->post_id; ?>"><?php echo $row->lead_id; ?></option>
                                        <?php } ?>
                                        <?php } ?>
                                    </select>
                                    <!--<input type="text" name="interested_buyer" id="interested_buyer" class="form-control" value=""  required />-->
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <label>Status</label><b style="color:red;">*</b>
                                    <select name="interested_status" id="seller_interested_status" class="form-control" onchange="change_seller_post_status(this.value)" required>
                                        <!--<option value="">Select One</option>-->
                                        <option value="Interested" >Interested</option>
                                        <option value="In Process" selected>In Process</option>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="col-md-12 col-sm-12 col-xs-12" id="seller_rent_in_process_details" <?php if(!empty($rent_sell)){ if($rent_sell == 'Sell'){ echo 'style="display:none;"'; } } ?>>
                                    <div class="col-md-4 col-sm-6 col-xs-12">
                                        <label>Security Deposite</label><b style="color:red;">*</b>
                                        <input type="number" name="interested_deposite" id="seller_interested_deposite"   <?php if(!empty($rent_sell)){ if($rent_sell == 'Rent'){ echo 'required'; } } ?>  />
                                    </div>
                                    
                                    <div class="col-md-4 col-sm-6 col-xs-12">
                                        <label>Rent/Month</label><b style="color:red;">*</b>
                                        <input type="number" name="interested_rent" id="seller_interested_rent"  <?php if(!empty($rent_sell)){ if($rent_sell == 'Rent'){ echo 'required'; } } ?>   />
                                    </div>
                                    
                                    <div class="col-md-4 col-sm-6 col-xs-12">
                                        <label>Expiry Date</label><b style="color:red;">*</b>
                                        <input type="date" name="interested_expiry_date" id="seller_interested_expiry_date"   <?php if(!empty($rent_sell)){ if($rent_sell == 'Rent'){ echo 'required'; } } ?>  />
                                    </div>
                                </div>
                                
                                
                                <div class="col-md-12 col-sm-12 col-xs-12" >    
                                   <div class="col-md-6 col-sm-6 col-xs-12" id="seller_sell_in_process_details" <?php if(!empty($rent_sell)){ if($rent_sell == 'Rent'){ echo 'style="display:none;"'; } } ?>>
                                        <label>Deal Amount</label><b style="color:red;">*</b>
                                        <input type="number" name="interested_amount" id="seller_interested_amount"   <?php if(!empty($rent_sell)){ if($rent_sell == 'Sell'){ echo 'required'; } } ?>  />
                                    </div>
                                    <div id="seller_interested_commission_details">
                                        <div class="<?php if(!empty($rent_sell)){ if($rent_sell == 'Sell'){ echo 'col-md-3'; }else{echo 'col-md-6';} } ?> col-sm-6 col-xs-12" id="seller_interested_commission_details_div">
                                            <label>Commission1(Owner)</label><b style="color:red;">*</b>
                                            <input type="number" name="interested_commission" id="seller_interested_commission" required    />
                                        </div>
                                        <div class="<?php if(!empty($rent_sell)){ if($rent_sell == 'Sell'){ echo 'col-md-3'; }else{echo 'col-md-6';} } ?> col-sm-6 col-xs-12"  id="seller_interested_commission1_details_div">
                                            <label>Commission2(Client)</label><b style="color:red;">*</b>
                                            <input type="number" name="interested_commission1" id="seller_interested_commission1"  required   />
                                        </div>
                                    </div>
                                </div>
                               
                                
                                
                            
                            
                            <div class="col-md-12 col-sm-12 col-xs-12">    
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <label>Admin 1</label><b style="color:red;">*</b>
                                    <select name="interested_telecaller" id="seller_interested_telecaller" required class="form-control">
                                        <option value="">Select One</option>
                                        <?php if(!empty($telecaller_list)){ ?>
                                        <?php foreach($telecaller_list as $row){ ?>
                                        <option value="<?php echo $row->user_id; ?>"><?php echo $row->name; ?></option>
                                        <?php } ?>
                                        <?php } ?>
                                    </select>
                                </div>
                                
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <label>Admin 2</label><b style="color:red;">*</b>
                                    <select name="interested_executive" id="seller_interested_executive" class="form-control" required>
                                        <option value="">Select One</option>
                                        <?php if(!empty($executive_list)){ ?>
                                        <?php foreach($executive_list as $row){ ?>
                                        <option value="<?php echo $row->user_id; ?>"><?php echo $row->name; ?></option>
                                        <?php } ?>
                                        <?php } ?>
                                    </select>
                                </div>

                               <!-- <div class="col-md-6 col-sm-6 col-xs-12">
                                    <label>Extra Services(Add multiple services seperated by comma)</label>
                                    <textarea name="extra_services" id="extra_services" class="formn-control"></textarea>
                                </div>-->
                            </div>
                        </div>
                        <div class="modal-footer">
                            <input type="submit" name="save" value="Save" id="submit-btn"/>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
    
    
    
    <div class="modal fade" id="sellerNotInterestedPopup" role="dialog">
        <div class="modal-dialog  modal-lg">

            <div class="modal-content">
                <div class="modal-header" style="background:linear-gradient(to right,#03709e,#18c3fd 100%);">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title" style="color:white;font-weight:bold;font-size:20px;">Not Interested Seller</h4>
                </div>
                <div class="modal-body">
                    <form method="POST" enctype="multipart/form-data" action="<?php echo base_url(); ?>property/save_seller_not_interested">
                        <div class="row">
                            <input type="hidden" name="seller_not_interested_post_id" value="0" id="seller_not_interested_post_id" onblur="checkValue(this)"  />
                            <input type="hidden" name="redirect_url" value="<?php echo current_url(); ?>" id="redirect_url" onblur="checkValue(this)"  />
                             <div class="col-md-12 col-sm-6 col-xs-12">
                                <label>Reason</label><b style="color:red;">*</b>
                                <textarea name="reason" id="reason"></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <input type="submit" name="save" value="Save"/>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
    
    
    <div class="modal fade" id="cancelDealPopup" role="dialog">
        <div class="modal-dialog  modal-lg">
            <div class="modal-content">
                <div class="modal-header" style="background:linear-gradient(to right,#03709e,#18c3fd 100%);">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title" style="color:white;font-weight:bold;font-size:20px;">Do you want to cancel all deals of this property?</h4>
                </div>
                <div class="modal-body">
                    <form method="POST" enctype="multipart/form-data" action="<?php echo base_url(); ?>property/cancel_property_deals">
                        <div class="row">
                            <input type="hidden" name="cancel_deal_post_id" value="0" id="cancel_deal_post_id" />
                            <input type="hidden" name="redirect_url" value="<?php echo current_url(); ?>" id="redirect_url" onblur="checkValue(this)"  />
                        </div>
                        <div class="modal-footer">
                            <input type="submit" name="save" value="Save"/>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    
    
    <div class="modal fade" id="deleteSellerPopup" role="dialog">
        <div class="modal-dialog  modal-lg">
            <div class="modal-content">
                <div class="modal-header" style="background:linear-gradient(to right,#03709e,#18c3fd 100%);">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title" style="color:white;font-weight:bold;font-size:20px;">Do you want to cancel all deals of this property?</h4>
                </div>
                <div class="modal-body">
                    <form method="POST" enctype="multipart/form-data" action="<?php echo base_url(); ?>property/delete_property">
                        <div class="row">
                            <input type="hidden" name="delete_seller_post_id" value="0" id="delete_seller_post_id" />
                            <input type="hidden" name="redirect_url" value="<?php echo current_url(); ?>" id="redirect_url" onblur="checkValue(this)"  />
                        </div>
                        <div class="modal-footer">
                            <input type="submit" name="Delete" value="Delete"/>
                            <input type="button" name="Cancel" value="Cancel" data-dismiss="modal" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
</div>

    

    <!-- /footer content -->
    </div>
    </div>
    
    <!-- Autocomplete -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

    <!-- jQuery -->
    <script src="<?php echo base_url(); ?>assets/admin/css/vendors/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap -->
    <script src="<?php echo base_url(); ?>assets/admin/css/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="<?php echo base_url(); ?>assets/admin/css/vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="<?php echo base_url(); ?>assets/admin/css/vendors/nprogress/nprogress.js"></script>
    <!-- Chart.js -->
    <script src="<?php echo base_url(); ?>assets/admin/css/vendors/Chart.js/dist/Chart.min.js"></script>
    <!-- gauge.js -->
    <script src="<?php echo base_url(); ?>assets/admin/css/vendors/gauge.js/dist/gauge.min.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="<?php echo base_url(); ?>assets/admin/css/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="<?php echo base_url(); ?>assets/admin/css/vendors/iCheck/icheck.min.js"></script>
    <!-- Skycons -->
    <script src="<?php echo base_url(); ?>assets/admin/css/vendors/skycons/skycons.js"></script>
    <!-- Flot -->
    <script src="<?php echo base_url(); ?>assets/admin/css/vendors/Flot/jquery.flot.js"></script>
    <script src="<?php echo base_url(); ?>assets/admin/css/vendors/Flot/jquery.flot.pie.js"></script>
    <script src="<?php echo base_url(); ?>assets/admin/css/vendors/Flot/jquery.flot.time.js"></script>
    <script src="<?php echo base_url(); ?>assets/admin/css/vendors/Flot/jquery.flot.stack.js"></script>
    <script src="<?php echo base_url(); ?>assets/admin/css/vendors/Flot/jquery.flot.resize.js"></script>
    <!-- Flot plugins -->
    <script src="<?php echo base_url(); ?>assets/admin/css/vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
    <script src="<?php echo base_url(); ?>assets/admin/css/vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/admin/css/vendors/flot.curvedlines/curvedLines.js"></script>
    <!-- DateJS -->
    <script src="<?php echo base_url(); ?>assets/admin/css/vendors/DateJS/build/date.js"></script>
    <!-- JQVMap -->
    <script src="<?php echo base_url(); ?>assets/admin/css/vendors/jqvmap/dist/jquery.vmap.js"></script>
    <script src="<?php echo base_url(); ?>assets/admin/css/vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
    <script src="<?php echo base_url(); ?>assets/admin/css/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="<?php echo base_url(); ?>assets/admin/css/vendors/moment/min/moment.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/admin/css/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>

    
    
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/additional-methods.min.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="<?php echo base_url(); ?>assets/admin/css/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/admin/css/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/admin/css/vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/admin/css/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/admin/css/vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/admin/css/vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/admin/css/vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/admin/css/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/admin/css/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/admin/css/vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/admin/css/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="<?php echo base_url(); ?>assets/admin/css/vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/admin/css/vendors/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/admin/css/build/js/custom.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/admin/css/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
    <script src="<?php echo base_url(); ?>assets/admin/css/vendors/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/admin/js/validation.js"></script>
    <!------ Start Full Screen ------>
    <script src="<?php echo base_url(); ?>assets/admin/js/fullscreen/fullscreen.js"></script>
    <script src="<?php echo base_url(); ?>assets/admin/js/fullscreen/template.js"></script>
    <script src="<?php echo base_url(); ?>assets/admin/js/fullscreen/vendors.min.js"></script>
    <!------ End Full Screen -------->
    <script src="<?php echo base_url(); ?>assets/admin/js/fullcalendar.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/admin/js/file-input.js"></script>
    <script src="<?php echo base_url(); ?>assets/admin/js/popup.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
    
    
    
    <!--<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>-->
    <!--<script src="jquery.aircomplete.js"></script>-->
    <link href="<?php echo base_url(); ?>assets/admin/js/EasyAutocomplete-1.3.5/easy-autocomplete.min.css" rel="stylesheet">
    <script src="<?php echo base_url(); ?>assets/admin/js/EasyAutocomplete-1.3.5/jquery.easy-autocomplete.min.js"></script>


<script>
$(".toggle-password").click(function () {
  $(this).toggleClass("fa-eye fa-eye-slash");
  input = $(this).parent().find("input");
  if (input.attr("type") == "password") {
    input.attr("type", "text");
  } else {
    input.attr("type", "password");
  }
});
</script>

<script>
    function load_city_by_name(city){
        $.ajax({
           url:'<?php echo base_url(); ?>backend/get_cities',
           type:'post',
           data:{'city':city},
           success:function(data){
               set_cities(data);
           }
        });
    }
    
    function set_cities(data){
         availableTags = JSON.parse(data); 
             $( "#city" ).autocomplete({
          source: availableTags
        });
    }
</script>


<script>
      function add_to_ad(post_id, type){
          $('#ad_post_id').val(post_id);
          $('#ad_post_type').val(type);
          $('#addToAdvertisement').modal();
      }
  </script>
  
  <?php if(!empty($this->session->flashdata('success')) && $this->session->flashdata('success') != ''){ ?>
    <script>
        toastr.success('<?php echo $this->session->flashdata('success'); ?>', {timeOut: 8000});
    </script>
    <?php $this->session->set_flashdata('success', ''); ?>
<?php } ?>

<?php if(!empty($this->session->flashdata('error')) && $this->session->flashdata('error') != ''){ ?>
    <script>
        toastr.error('<?php echo $this->session->flashdata('error'); ?>', {timeOut: 8000});
    </script>
    <?php $this->session->set_flashdata('error', ''); ?>
<?php } ?>
  
  <script>
    $(document).ready(function() {
  $('.summernote').summernote();
});

	
	$('.blockspecial').bind('keypress', function(e)
	{
        if($('.blockspecial').val().length == 0)
        {
            var k = e.which;
            var ok = k >= 65 && k <= 90 || // A-Z
            k >= 97 && k <= 122 || // a-z
            k >= 48 && k <= 57; // 0-9
        if (!ok){
            e.preventDefault();
        }
    }
});

function doconfirm()
        {
            var x = confirm("Are you sure you want to make this action??");
                if (x == true)
                    {
                        return true;
                    }
                else
                    {
                        return false;
                    }
        }
</script>

<script>

    function send_link_popup(link_type)
    {
        $('#send_link_type').val(link_type);
        $('#sendLinkPopup').modal();
    }
    
    function send_function(){
       if($('#whatsapp').prop('checked') == true || $('#all').prop('checked') == true){
           var mobileno = $('#mobile_whatsapp').val();
           var link = '<?php echo base_url()."home/post_property/".$this->session->userdata("admin_id"); ?>';
           var msg = 'Dear customer, Please click '+link+' here to add your property';
           window.open('https://api.whatsapp.com/send?phone=+91'+mobileno+'&text='+msg, '_blank'); 
       } 
       /*$('#send_link_form').submit();*/
    }
    
    function delete_seller(post_id)
    {
        $('#delete_seller_post_id').val(post_id);
        $('#deleteSellerPopup').modal();
    }
    
    function cancel_deal(post_id)
    {
        $('#cancel_deal_post_id').val(post_id);
        $('#cancelDealPopup').modal();
    }
    
  function buyer_interested_popup(post_id, rent_sell){
      $('#buyer_interested_post_id').val(post_id);
      $('#buyer_interested_popup').modal();
  }
  
  function seller_interested_popup(post_id){
      $('#seller_interested_post_id').val(post_id);
      $('#seller_interested_popup').modal();
  }
  
  function seller_not_interested(post_id)
    {
        $("#seller_not_interested_post_id").val(post_id);
        $("#sellerNotInterestedPopup").modal();
    }
    
    
    function buyer_not_interested(post_id)
    {
        $("#buyer_not_interested_post_id").val(post_id);
        $("#buyerNotInterestedPopup").modal();
    }
  
  /*function change_buyer_post_status(value){
      if(value == 'In Process'){
          var rentSell = $('#interested_rent_sell').val();
          if(rentSell == 'Rent'){
              $('#rent_interested_commision_details').css('display', 'block');
              $('#rent_interested_commision_details1').css('display', 'block');
              $('#rent_in_process_details').css('display', 'block');
              $('#sell_in_process_details').css('display', 'none');
              $('#interested_deposite').attr('required', 'required');
              $('#interested_rent').attr('required', 'required');
              $('#interested_commission').attr('required', 'required');
              $('#interested_commission1').attr('required', 'required');
              $('#interested_amount').removeAttr('required');
          }else{
              $('#rent_interested_commision_details').css('display', 'none');
              $('#rent_interested_commision_details1').css('display', 'none');
              $('#rent_in_process_details').css('display', 'none');
              $('#sell_in_process_details').css('display', 'block');
              $('#interested_deposite').removeAttr('required');
              $('#interested_rent').removeAttr('required');
              $('#interested_commission').removeAttr('required');
              $('#interested_commission1').removeAttr('required');
              $('#interested_amount').attr('required', 'required');
          }
          /*$('#interested_buyer').attr('required', 'required');*/
          /*$('#interested_amount').attr('required', 'required');
          $('#interested_deposite').attr('required', 'required');
          $('#interested_rent').attr('required', 'required');*/
          /*$('#interested_expiry_date').attr('required', 'required');*/
          /*$('#interested_commission').attr('required', 'required');
          $('#interested_commission1').attr('required', 'required');
          $('#interested_telecaller').attr('required', 'required');
          $('#interested_executive').attr('required', 'required');*/
     // }else{
          /*$('#interested_buyer').removeAttr('required');*/
          /*$('#interested_amount').removeAttr('required');
          $('#interested_deposite').removeAttr('required');
          $('#interested_rent').removeAttr('required');
          $('#interested_expiry_date').removeAttr('required');
          $('#interested_commission').removeAttr('required');
          $('#interested_commission1').removeAttr('required');
          $('#interested_telecaller').removeAttr('required');
          $('#interested_executive').removeAttr('required');*/
          
          /*if(rentSell == 'Rent'){
              $('#rent_interested_commision_details').css('display', 'none');
              $('#rent_interested_commision_details1').css('display', 'none');
              $('#rent_in_process_details').css('display', 'none');
              $('#sell_in_process_details').css('display', 'none');
              $('#interested_deposite').removeAttr('required');
              $('#interested_rent').removeAttr('required');
              $('#interested_commission').removeAttr('required');
              $('#interested_commission1').removeAttr('required');
              $('#interested_amount').removeAttr('required');
          }else{
              $('#rent_interested_commision_details').css('display', 'none');
              $('#rent_interested_commision_details1').css('display', 'none');
              $('#rent_in_process_details').css('display', 'none');
              $('#sell_in_process_details').css('display', 'none');
              $('#interested_deposite').removeAttr('required');
              $('#interested_rent').removeAttr('required');
              $('#interested_commission').removeAttr('required');
              $('#interested_commission1').removeAttr('required');
              $('#interested_amount').removeAttr('required');
          }
      }
  }*/
  
  
    function change_buyer_post_status(value){
        var rentSell = $('#interested_rent_sell').val();
        if(value == 'In Process'){
            if(rentSell == 'Rent'){
                $('#rent_in_process_details').css('display', 'block');
                $('#buyer_interested_commission_details').css('display', 'block');
                $('#sell_in_process_details').css('display', 'none');
                $('#interested_commission').attr('required', 'required');
                $('#interested_commission1').attr('required', 'required');
                $('#interested_deposite').attr('required', 'required');
                $('#interested_rent').attr('required', 'required');
                $('#interested_expiry_date').attr('required', 'required');
                $('#interested_amount').removeAttr('required');
                $('#buyer_interested_commission_details_div').attr('class', 'col-md-6 col-sm-6 col-xs-12');
                $('#buyer_interested_commission1_details_div').attr('class', 'col-md-6 col-sm-6 col-xs-12');
            }else{
                $('#sell_in_process_details').css('display', 'block');
                $('#buyer_interested_commission_details').css('display', 'block');
                $('#interested_amount').attr('required', 'required');
                $('#rent_in_process_details').css('display', 'none');
                $('#interested_commission').attr('required', 'required');
                $('#interested_commission1').attr('required', 'required');
                $('#interested_deposite').removeAttr('required');
                $('#interested_rent').removeAttr('required');
                $('#interested_expiry_date').removeAttr('required');
                $('#buyer_interested_commission_details_div').attr('class', 'col-md-3 col-sm-6 col-xs-12');
                $('#buyer_interested_commission1_details_div').attr('class', 'col-md-3 col-sm-6 col-xs-12');
            }
        }else{
            //if(rentSell == 'Rent'){
                $('#rent_in_process_details').css('display', 'none');
                $('#buyer_interested_commission_details').css('display', 'none');
                $('#sell_in_process_details').css('display', 'none');
                $('#interested_commission').removeAttr('required');
                $('#interested_commission1').removeAttr('required');
                $('#interested_deposite').removeAttr('required');
                $('#interested_rent').removeAttr('required');
                $('#interested_expiry_date').removeAttr('required');
                $('#interested_amount').removeAttr('required');
            /*}else{
                $('#sell_in_process_details').css('display', 'block');
                $('#buyer_interested_commission_details').css('display', 'block');
                $('#interested_amount').attr('required', 'required');
                $('#rent_in_process_details').css('display', 'none');
                $('#interested_commission').attr('required', 'required');
                $('#interested_commission1').attr('required', 'required');
                $('#interested_deposite').removeAttr('required');
                $('#interested_rent').removeAttr('required');
                $('#interested_expiry_date').removeAttr('required');
            }*/
        }
    }
    
    
    function change_seller_post_status(value){
        var rentSell = $('#seller_interested_rent_sell').val();
        /*alert(value);
        alert(rentSell);*/
        if(value == 'In Process'){
            
            if(rentSell == 'Rent'){
                $('#seller_rent_in_process_details').css('display', 'block');
                $('#seller_interested_commission_details').css('display', 'block');
                $('#seller_sell_in_process_details').css('display', 'none');
                $('#seller_interested_commission').attr('required', 'required');
                $('#seller_interested_commission1').attr('required', 'required');
                $('#seller_interested_deposite').attr('required', 'required');
                $('#seller_interested_rent').attr('required', 'required');
                $('#seller_interested_expiry_date').attr('required', 'required');
                $('#seller_interested_amount').removeAttr('required');
                $('#seller_interested_commission_details_div').attr('class', 'col-md-6 col-sm-6 col-xs-12');
                $('#seller_interested_commission1_details_div').attr('class', 'col-md-6 col-sm-6 col-xs-12');
            }else{
                $('#seller_sell_in_process_details').css('display', 'block');
                $('#seller_interested_commission_details').css('display', 'block');
                $('#seller_interested_amount').attr('required', 'required');
                $('#seller_rent_in_process_details').css('display', 'none');
                $('#seller_interested_commission').attr('required', 'required');
                $('#seller_interested_commission1').attr('required', 'required');
                $('#seller_interested_deposite').removeAttr('required');
                $('#seller_interested_rent').removeAttr('required');
                $('#seller_interested_expiry_date').removeAttr('required');
                $('#seller_interested_commission_details_div').attr('class', 'col-md-3 col-sm-6 col-xs-12');
                $('#seller_interested_commission1_details_div').attr('class', 'col-md-3 col-sm-6 col-xs-12');
            }
        }else{
                $('#seller_rent_in_process_details').css('display', 'none');
                $('#seller_interested_commission_details').css('display', 'none');
                $('#seller_sell_in_process_details').css('display', 'none');
                $('#seller_interested_commission').removeAttr('required');
                $('#seller_interested_commission1').removeAttr('required');
                $('#seller_interested_deposite').removeAttr('required');
                $('#seller_interested_rent').removeAttr('required');
                $('#seller_interested_expiry_date').removeAttr('required');
                $('#seller_interested_amount').removeAttr('required');
        }
    }
  
  function delete_buyer(post_id){
        $('#delete_buyer_post_id').val(post_id);
        $('#deleteBuyer').modal();
    }


  
  $(document).ready(function() {
    $('#interested_buyer').select2();
});

  $(document).ready(function() {
    $('#interested_seller').select2();
});


function get_cities_by_state(state_name)
{
    $.ajax
    ({
        type: "POST",
        url: "<?php echo base_url(); ?>property/get_cities_by_state",
        data: {state_name:state_name},
        dataType: 'html',
        success: function(data)
        {
            $("#city").html(data);
        }

    });	
}

function get_city_list_by_state(state){
    $.ajax({
       url:'<?php echo base_url(); ?>backend/get_city_list_by_state',
       type:'post',
       data:{'state':state},
       success:function(data){
           $('#city').html(data);
       }
    });
}

function get_city_list_by_state_name(state){
    $.ajax({
       url:'<?php echo base_url(); ?>backend/get_city_list_by_state_name',
       type:'post',
       data:{'state':state},
       success:function(data){
           $('#city').html(data);
       }
    });
}

function get_pincode_list_by_city(city){
    $.ajax({
       url:'<?php echo base_url(); ?>backend/get_pincode_list_by_city',
       type:'post',
       data:{'city':city},
       success:function(data){
           $('#pincode').html(data);
       }
    });
}

function get_pincode_list_by_city_name(city){
    $.ajax({
       url:'<?php echo base_url(); ?>backend/get_pincode_list_by_city_name',
       type:'post',
       data:{'city':city},
       success:function(data){
           $('#pincode').html(data);
       }
    });
}

function get_location_list_by_pincode(pincode){
    $.ajax({
       url:'<?php echo base_url(); ?>backend/get_location_list_by_pincode',
       type:'post',
       data:{'pincode':pincode},
       success:function(data){
           $('#location').html(data);
       }
    });
}

function get_location_list_by_pincode_code(pincode){
    $.ajax({
       url:'<?php echo base_url(); ?>backend/get_location_list_by_pincode_code',
       type:'post',
       data:{'pincode':pincode},
       success:function(data){
           $('#location').html(data);
       }
    });
}

function get_location_list_by_city_name(city){
    $.ajax({
       url:'<?php echo base_url(); ?>backend/get_location_list_by_city_name',
       type:'post',
       data:{'city':city},
       success:function(data){
           $('#location').html(data);
       }
    });
}


function load_states(state){
    $.ajax({
       url:'<?php echo base_url(); ?>home/get_states',
       type:'post',
       data:{'state':state},
       dataType: "json",
       success:function(data){
           /*set_states(data);*/
           if(state.length ==1){
           setEasyAutocomplete(data);
           console.log("HI");
           }
       }
    });
}

/*function set_states(data){
     availableTags = JSON.parse(data); 
         $( "#state" ).autocomplete({
      source: availableTags
    });
}*/

function load_cities(){
    var state = $('#state').val();
    $.ajax({
       url:'<?php echo base_url(); ?>home/get_cities_by_state',
       data:{'state':state},
       type:'post',
       success:function(data){
           set_cities(data);
       }
    });
}

function load_locations(location){
    $.ajax({
       url:'<?php echo base_url(); ?>home/get_location',
       type:'post',
       data:{location:location},
       success:function(data){
           set_locations(data);
       }
    });
}
function set_locations(data){
         availableTags = JSON.parse(data); 
         $( "#location" ).autocomplete({
      source: availableTags
    });
}  

function load_complex(complex){
    $.ajax({
       url:'<?php echo base_url(); ?>home/get_complex',
       type:'post',
       data:{complex:complex},
       success:function(data){
           set_complex(data);
       }
    });
}
function set_complex(data){
         availableTags = JSON.parse(data); 
         $( "#complex_society_building" ).autocomplete({
      source: availableTags
    });
} 

function load_more_photos(){
    var cnt = parseInt($('input[name="UploadImages[]"]').length);
    cnt++;
    if(cnt<=10){
        $.ajax({
           url:'<?php echo base_url(); ?>property/load_more_property_photos',
           type:'post',
           data:{cnt:cnt},
           success:function(data){
               $('#fileUploadDiv').append(data);
           }
        });
    }else{
        $('#fileUploadDivError').html("You can upload maximum 10 photos");
    }
}

function load_more_project_images(){
    var cnt = parseInt($('input[name="UploadImages[]"]').length);
    cnt++;
    if(cnt<9){
        $.ajax({
           url:'<?php echo base_url(); ?>property/load_more_project_images',
           type:'post',
           data:{cnt:cnt},
           success:function(data){
               $('#loadProjectImagesDiv').append(data);
           }
        });
    }else{
        $('#loadProjectImagesErrorDiv').html("You can upload maximum 10 photos");
    }
}

function load_more_locations(){
    var cnt = parseInt($('.locations').length);
    var city = $('#city').val();
    cnt++;
    if(cnt<=5){
        $.ajax({
           url:'<?php echo base_url(); ?>property/load_more_locations',
           type:'post',
           data:{cnt:cnt, city:city},
           success:function(data){
               $('#locationDiv').append(data);
           }
        });
    }else{
        $('#loadLocationErrorDiv').html("You can add maximum 5 locations");
    }
}


 /*$.validator.addMethod('greaterThan', function(value, element, param) {
        if (this.optional(element)) return true;
        var i = parseInt(value);
        var j = parseInt($(param).val());
        return i > j;
    }, "The value {0} must be less than {1}");
    
    $('#residential_duplex_flat_form').validate({
        rules: {
             name: {
                 required : true,
             } 
             buildup_area: {
                 greaterThan : "#super_buildup_area",
             }
        }
    });*/
    
    
   /* $("#state").aircomplete({
          data: [
            "Mercury", "Vulcan",
            "Venus",   "Earth",
            "Mars",    "Counter-Earth",
            "Ceres",   "Jupiter",
            "Saturn",  "Uranus",
            "Neptune", "Planet X",
            "Pluto",   "Nibiru"
          ],
          onSelect:function(data){
            return data;
          },
          minSearchStringLength : 1// show results after a single character is entered
    });
*/



function setEasyAutocomplete(states){
    var options = {
    	data: states
    };
    console.log(options);
    $("#state").easyAutocomplete(options);
}


//States,City,Pincode, Location, Complex
$( document ).ready(function() {
    $.ajax({
       url:'<?php echo base_url(); ?>backend/get_all_states',
       type:'post',
       dataType: "json",
       success:function(data){
            var options = {data: data,list: {	maxNumberOfElements: 10,match: {enabled: true}}};
            $("#state").easyAutocomplete(options);
        }
    });
});

function get_all_cities_by_state(state){
    $.ajax({
       url:'<?php echo base_url(); ?>backend/get_all_cities_by_state',
       type:'post',
       dataType: "json",
       data:{state, state},
       success:function(data){
            var options = {data: data,list: {	maxNumberOfElements: 10,match: {enabled: true}}};
            $("#city").easyAutocomplete(options);
        }
    });
}

function get_all_pincode_list_by_city_name(city){
    $.ajax({
       url:'<?php echo base_url(); ?>backend/get_all_pincode_list_by_city_name',
       type:'post',
       dataType: "json",
       data:{'city':city},
       success:function(data){
           /*$('#pincode').html(data);*/
           var options = {data: data,list: {	maxNumberOfElements: 10,match: {enabled: true}}};
            $("#pincode").easyAutocomplete(options);
       }
    });
}
function get_all_location_list_by_pincode_code(pincode){
    $.ajax({
       url:'<?php echo base_url(); ?>backend/get_all_location_list_by_pincode_code',
       type:'post',
       dataType: "json",
       data:{'pincode':pincode},
       success:function(data){
           /*$('#pincode').html(data);*/
           var options = {data: data,list: {	maxNumberOfElements: 10,match: {enabled: true}}};
            $("#location").easyAutocomplete(options);
       }
    });
}

function get_all_society_list_by_location(location){
    $.ajax({
       url:'<?php echo base_url(); ?>backend/get_all_society_list_by_location',
       type:'post',
       dataType: "json",
       data:{'location':location},
       success:function(data){
           var options = {data: data,list: {	maxNumberOfElements: 10,match: {enabled: true}}};
            $("#society").easyAutocomplete(options);
       }
    });
}
$('input[name=section]').change(function(){
    var a = $('input[name=section]:checked').val();
    if(a == 'PossessionFrom'){
        $('#PossessionDateDiv').css('display', 'block'); 
    }else{
        $('#PossessionDateDiv').css('display', 'none');  
    }
});
</script>

  
  </body>
</html>
