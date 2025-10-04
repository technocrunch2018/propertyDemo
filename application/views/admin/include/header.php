<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <!-- Meta, title, CSS, favicons, etc. -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <link rel="shortcut icon" href="<?php echo base_url();?>assets/front/img/fav.webp">
        <title>Dashboard - StayeeKart</title>

        <!-- Bootstrap -->
        <link href="<?php echo base_url(); ?>assets/admin/css/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
        <!-- Font Awesome -->
        <link href="<?php echo base_url(); ?>assets/admin/css/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
        <!-- NProgress -->
        <link href="<?php echo base_url(); ?>assets/admin/css/vendors/nprogress/nprogress.css" rel="stylesheet">
        <!-- iCheck -->
        <link href="<?php echo base_url(); ?>assets/admin/css/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
        <!-- Autocomplete -->
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <!-- bootstrap-progressbar -->
        <link href="<?php echo base_url(); ?>assets/admin/css/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
        <!-- JQVMap -->
        <link href="<?php echo base_url(); ?>assets/admin/css/vendors/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.min.css" rel="stylesheet"/>
        <!-- bootstrap-daterangepicker -->
        <link href="<?php echo base_url(); ?>assets/admin/css/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
        <!-- Custom Theme Style -->
        <link href="<?php echo base_url(); ?>assets/admin/css/build/css/custom.min.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/admin/css/style.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/admin/fonts/flaticon.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/admin/css/fullcalendar.css" rel="stylesheet">
        
        <link href="<?php echo base_url(); ?>assets/admin/css/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/admin/css/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/admin/css/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/admin/css/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/admin/css/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/admin/css/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">
         <link href="<?php echo base_url(); ?>assets/admin/css/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
         
        <!-- bootstrap-datetimepicker -->
        <link href="<?php echo base_url(); ?>assets/admin/css/vendors/bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.css" rel="stylesheet">
        
        
        <!-- For Substract Fee -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        
        
        
        <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        
    </head>
    
<style>
  table {
      border-collapse: collapse;
      width: 100%;
  }

  td, th {
      border: 1px solid #ebebeb;
      text-align: left;
      padding: 8px;
  }

  tr:nth-child(even) {
      background-color: #f4f5f777;
  }
  .label{
      cursor:pointer;
  }
</style>

    <body class="nav-md ">
        <div class="container body">
            <div class="main_container">
                
                
                  
  <!-- Modal -->
  <div class="modal fade" id="addToAdvertisement" role="dialog">
    <div class="modal-dialog  modal-lg">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style="background:linear-gradient(to right,#03709e,#18c3fd 100%);">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title" style="color:white;font-weight:bold;font-size:20px;">Add to Advertisement</h4>
        </div>
        <form method="POST" action="<?php echo base_url(); ?>backend/add_post_to_advertisement" enctype="multipart/form-data">
            <div class="modal-body">
		    
                <div class="row">
    			    <div class="col-md-12 col-sm-12 col-xs-12">
    				    <input type="hidden" name="ad_post_id" id="ad_post_id" value="" />
    				    <input type="hidden" name="ad_post_type" id="ad_post_type" value="" />
    				    <input type="hidden" name="redirect_url" id="redirect_url" value="<?php echo current_url(); ?>" />
    				    <div class="col-md-4 col-sm-4 col-xs-12 radiobtn">
    				        <input type="radio" name="ad_size" id="size_6" value="size_6" required/>
    				        <label for="size_6">Size - 6</label>
    				    </div>
    				    <div class="col-md-4 col-sm-4 col-xs-12 radiobtn">
    				        <input type="radio" name="ad_size" id="size_3" value="size_3" />
    				        <label for="size_3">Size - 3</label>
    				    </div>
    				    <div class="col-md-4 col-sm-4 col-xs-12">
    				        <input type="date" name="ad_expiry_date" id="ad_expiry_date" value="" />
    				    </div>
    			    </div>
			    </div>
			  
            </div>
            <div class="modal-footer">
              <input type="submit" name="save" value="Add"/>
            </div>
        </form>
      </div>
</div>
</div>
                
                
                
                
   <div class="modal fade" id="sendLinkPopup" role="dialog">
        <div class="modal-dialog  modal-lg">

            <div class="modal-content">
                <div class="modal-header" style="background:linear-gradient(to right,#03709e,#18c3fd 100%);">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title" style="color:white;font-weight:bold;font-size:20px;">Send Link</h4>
                </div>
                <div class="modal-body">
                    <form name="send_link_form" onsubmit="send_function()" id="send_link_form" method="POST" enctype="multipart/form-data" action="<?php echo base_url(); ?>backend/send_link">
                        <div class="row">
                            <input type="hidden" name="send_link_type" id="send_link_type" value="">
                            <input type="hidden" name="redirect_url" id="redirect_url" value="<?php echo current_url(); ?>">
                          
                            <div class="col-md-3 col-sm-3 col-xs-6 radiobtn">
                                <input type="checkbox" name="send_method" id="sms" value="sms"  > 
                                <label for="sms">By SMS</label>
                            </div>
                            
                            <div class="col-md-3 col-sm-3 col-xs-6 radiobtn">
                                <input type="checkbox" name="send_method" id="whatsapp" value="whatsapp" > 
                                <label for="whatsapp">By WhatsApp</label>
                            </div>
    
                            <div class="col-md-3 col-sm-3 col-xs-6 radiobtn">
                                <input type="checkbox" name="send_method" id="email" value="email" > 
                                <label for="email">By Email</label>
                            </div>
                            
                            <div class="col-md-3 col-sm-3 col-xs-6 radiobtn">
                                <input type="checkbox" name="send_method" id="all" value="all" checked > 
                                <label for="all">By All</label>
                            </div>
                            
                        <div class="col-md-12 col-sm-12 col-xs-12" style="margin:20px 0 30px 0; padding:0;">
                            <div class="col-md-4 col-sm-4 col-xs-12" id="mobile_sms_div">
                                <label>Mobile No for SMS</label>
                                <input type="number" name="mobile_sms" id="mobile_sms" placeholder="Enter Mobile No" value="">
                            </div>
                            
                            <div class="col-md-4 col-sm-4 col-xs-12" id="mobile_whatsapp_div">
                                <label>Mobile No for Whatsapp</label>
                                <input type="number" name="mobile_whatsapp" id="mobile_whatsapp" placeholder="Enter WhatsApp No" value="" >
                            </div>
                            
                            <div class="col-md-4 col-sm-4 col-xs-12" id="email_id_div">
                                <label>Email ID</label>
                                <input type="email" name="email_id" id="email_id" placeholder="Enter Email Id" value="" >
                            </div>
                        </div>

                        </div>
                        
                        <div class="modal-footer">
                            <input type="submit"  name="save" id="send-link-submit-button" value="Send"/>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>             
                
                
                
        <div class="col-md-3 left_col menu_fixed"  >
            <div class="left_col scroll-view">
                <div class="navbar nav_title" style="border: 0;">
                  <a href="<?php echo base_url('backend');?>" class="site_title"> <span style="color:#ff0000;font-weight:bold;">
                      <img src="<?php echo base_url();?>assets/front/img/main-logo.webp" alt="Logo" width = "90%"></span></a>
                </div>

                <div class="clearfix"></div>

                <!-- menu profile quick info -->
                <div class="profile clearfix">
                <!--  <div class="profile_pic">
                    <img src="<?php echo base_url(); ?>assets/images/rail_logo.png" alt="..." class="img-circle profile_img">
                  </div>-->
                  <!--<div class="profile_info">-->
                  <!--  <span>Welcome,</span>-->
                  <!--  <h2><?php echo $admindata[0]->name;?></h2>-->
                  <!--</div>-->
                </div>
                <!-- /menu profile quick info -->

            
            
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu" >
            <div class="menu_section" >
            <ul class="nav side-menu">
                <li><a href="<?php echo base_url('backend');?>"><i class="fa flaticon-dashboard-interface"></i>Dashboard </a></li>
                
                <!--<li><a href="<?php echo base_url('property/search_property');?>"><i class="fa flaticon-magnifying-glass"></i>Search</a></li>-->


                <!--<li>-->
                <!--   <a><i class="fa flaticon-stick-man" aria-hidden="true"></i>Lead Partner<span class="fa fa-chevron-down"></span></a>-->
                <!--   <ul class="nav child_menu">-->
                <!--   <li><a href="<?php echo base_url('backend/lead_partners');?>">Manage Lead Partner</a></li>-->
                <!--   <li><a href="<?php echo base_url('property/buyers_lead');?>">Buyer's Lead</a></li>-->
                <!--   <li><a href="<?php echo base_url('property/sellers_lead');?>">Saler's Lead</a></li>-->
                <!--    <li><a href="<?php echo base_url('property/home_lead');?>">Home Loan Lead</a></li>-->
                <!--   <li><a href="<?php echo base_url('property/lead_commissions');?>">Commission </a></li>-->
                <!--   </ul>-->
                <!--</li>-->
  
                <li>
                    <a><i class="fa flaticon-avatar" aria-hidden="true"></i>Users <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="<?php echo base_url(); ?>backend/owner">Owner</a></li>
                        <li><a href="<?php echo base_url(); ?>backend/agent">Agent </a></li>
                        <li><a href="<?php echo base_url(); ?>backend/builder">Builder</a></li>
                        <!-- <li><a href="<?php echo base_url(); ?>backend/buyers">Users Requirements</a></li>-->
                        <!--<li><a href="<?php echo base_url(); ?>backend/sellers">User Property</a></li>-->
                    </ul>
                </li>
                
                <!--<li>-->
                <!--    <a href="<?php echo base_url('property/projects');?>"><i class="fa flaticon-seller" aria-hidden="true"></i>Projects</a>-->
                    <!--<ul class="nav child_menu">
                <!--        <li><a href="<?php echo base_url(); ?>backend/owner">Owner</a></li>-->
                <!--        <li><a href="<?php echo base_url(); ?>backend/agent">Agent </a></li>-->
                <!--        <li><a href="<?php echo base_url(); ?>backend/builder">Builder</a></li>-->
                <!--    </ul>-->
                <!--</li>-->
                
                <li><a href="<?php echo base_url('backend/sellers');?>"><i class="fa flaticon-seller" aria-hidden="true"></i>Stock</a></li>
                <!--<li><a href="<?php echo base_url('backend/buyers');?>"><i class="fa flaticon-seller" aria-hidden="true"></i>Clients</a></li>-->
                <li><a href="<?php echo base_url('backend/pg');?>"><i class="fa flaticon-seller" aria-hidden="true"></i>PG</a></li>
                <!--<li class="hidden-xs hidden-sm"> -->
                <!--    <a><i class="fa flaticon-shopping-cart" aria-hidden="true"></i>Buyer's (Clients)<span class="fa fa-chevron-down"></span></a>-->
                <!--    <ul class="nav child_menu">-->
                <!--        <li>-->
                <!--            <a>Residential<span class="fa fa-chevron-down"></span></a>-->
                <!--            <ul class="nav child_menu">-->
                <!--                <li><a>Buy<span class="fa fa-chevron-down"></span></a>-->
                <!--                    <ul class="nav child_menu">-->
                <!--                        <li><a href="<?php echo base_url(); ?>property/buyer_residential_sale_flat">Flat</a></li>-->
                <!--                        <li><a href="<?php echo base_url(); ?>property/buyer_residential_sale_house_bunglow">House Or Banglow</a></li>-->
                <!--                        <li><a href="<?php echo base_url(); ?>property/buyer_residential_sale_pent_house">Pent House</a></li>-->
                <!--                        <li><a href="<?php echo base_url(); ?>property/buyer_residential_sale_duplex_flat">PG/Co-Living</a></li>-->
                <!--                        <li><a href="<?php echo base_url(); ?>property/buyer_residential_sale_land">Land</a></li>-->
                <!--                    </ul>-->
                <!--                </li>-->
                <!--                <li><a>Rent<span class="fa fa-chevron-down"></span></a>-->
                <!--                    <ul class="nav child_menu">-->
                <!--                        <li><a href="<?php echo base_url(); ?>property/buyer_residential_rent_flat">Flat</a></li>-->
                <!--                        <li><a href="<?php echo base_url(); ?>property/buyer_residential_rent_house_bunglow">House Or Banglow</a></li>-->
                <!--                        <li><a href="<?php echo base_url(); ?>property/buyer_residential_rent_pent_house">Pent House</a></li>-->
                <!--                        <li><a href="<?php echo base_url(); ?>property/buyer_residential_rent_duplex_flat">PG/Co-Living</a></li>-->
                <!--                        <li><a href="<?php echo base_url(); ?>property/buyer_residential_rent_land">Land</a></li>-->
                <!--                    </ul>-->
                <!--                </li>-->
                <!--            </ul>-->
                <!--        </li>-->
                        
                <!--        <li>-->
                <!--            <a>Commercial<span class="fa fa-chevron-down"></span></a>-->
                <!--            <ul class="nav child_menu">-->
                <!--                <li><a>Sale<span class="fa fa-chevron-down"></span></a>-->
                <!--                    <ul class="nav child_menu">-->
                <!--                        <li><a href="<?php echo base_url(); ?>property/buyer_commercial_sale_office">Office</a></li>-->
                <!--                        <li><a href="<?php echo base_url(); ?>property/buyer_commercial_sale_shop_showroom">Shop Or showroom</a></li>-->
                <!--                        <li><a href="<?php echo base_url(); ?>property/buyer_commercial_sale_warehouse">Warehouse</a></li>-->
                <!--                        <li><a href="<?php echo base_url(); ?>property/buyer_commercial_sale_factory">Factory</a></li>-->
                <!--                        <li><a href="<?php echo base_url(); ?>property/buyer_commercial_sale_land">Land</a></li>-->
                <!--                    </ul>-->
                <!--                </li>-->
                <!--                <li><a>Rent<span class="fa fa-chevron-down"></span></a>-->
                <!--                    <ul class="nav child_menu">-->
                <!--                        <li><a href="<?php echo base_url(); ?>property/buyer_commercial_rent_office">Office</a></li>-->
                <!--                        <li><a href="<?php echo base_url(); ?>property/buyer_commercial_rent_shop_showroom">Shop Or showroom</a></li>-->
                <!--                        <li><a href="<?php echo base_url(); ?>property/buyer_commercial_rent_warehouse">Warehouse</a></li>-->
                <!--                        <li><a href="<?php echo base_url(); ?>property/buyer_commercial_rent_factory">Factory</a></li>-->
                <!--                        <li><a href="<?php echo base_url(); ?>property/buyer_commercial_rent_land">Land</a></li>-->
                <!--                    </ul>-->
                <!--                </li>-->
                <!--            </ul>-->
                <!--        </li>-->
                        <!--<li>-->
                        <!--    <a><i class="fa fa-credit-card-alt" aria-hidden="true"></i>Commercial Buyer<span class="fa fa-chevron-down"></span></a>-->
                        <!--    <ul class="nav child_menu">-->
                        <!--        <li><a href="<?php echo base_url(); ?>backend/stock_office_buyer">Office</a></li>-->
                        <!--        <li><a href="<?php echo base_url(); ?>backend/stock_shop_buyer">Shop Or showroom</a></li>-->
                        <!--        <li><a href="<?php echo base_url(); ?>backend/stock_warehouse_buyer">Warehouse</a></li>-->
                        <!--        <li><a href="<?php echo base_url(); ?>backend/stock_factory_buyer">Factory</a></li>-->
                        <!--        <li><a href="<?php echo base_url(); ?>backend/stock_land_rent">Land</a></li>-->
                        <!--    </ul>-->
                        <!--</li>-->
                <!--    </ul>             -->
                <!--</li>-->
                
    <!----- For Mobile Mode Only --------------->           
    <!--<li class="hidden-lg hidden-md"><a data-modal-trigger="sample-modal"><i class="fa flaticon-shopping-cart"></i>Buyer's (Clients) </a></li>-->
                
    <!-- Sample Modal 2 -->
    <!--<div class="modal" data-modal-name="sample-modal" data-modal-dismiss>-->
    <!--    <div class="modal__dialog">-->
    <!--        <div class="modal__content">-->
    <!--            <h5 style="margin:0 0 5px 0;padding:0 0 10px 0;border-bottom:1px solid #ebebeb;font-size:16px;color:#000;">Buyer's (Clients)</h5>-->
    <!--<div id="main-menu" class="list-group">-->
    <!--    <a href="#sub-menu" class="list-group-item active" data-toggle="collapse" data-parent="#main-menu">Residential <span class="caret"></span></a>-->
        
    <!--    <div class="collapse list-group-level1" id="sub-menu">-->
    <!--      <a href="#sub-sub-menu" class="list-group-item" data-toggle="collapse" data-parent="#sub-menu">Buy <span class="caret"></span></a>-->
    <!--      <div class="collapse list-group-level2" id="sub-sub-menu">-->
    <!--        <a href="<?php echo base_url(); ?>property/buyer_residential_sale_flat" class="list-group-item" data-parent="#sub-sub-menu"><i class="fa fa-long-arrow-right"></i>Flat</a>-->
    <!--        <a href="<?php echo base_url(); ?>property/buyer_residential_sale_house_bunglow" class="list-group-item" data-parent="#sub-sub-menu"><i class="fa fa-long-arrow-right"></i>House Or Banglow</a>-->
    <!--        <a href="<?php echo base_url(); ?>property/buyer_residential_sale_pent_house" class="list-group-item" data-parent="#sub-sub-menu"><i class="fa fa-long-arrow-right"></i>Pent House</a>-->
    <!--        <a href="<?php echo base_url(); ?>property/buyer_residential_sale_duplex_flat" class="list-group-item" data-parent="#sub-sub-menu"><i class="fa fa-long-arrow-right"></i>PG/Co-Living</a>-->
    <!--        <a href="<?php echo base_url(); ?>property/buyer_residential_sale_land" class="list-group-item" data-parent="#sub-sub-menu"><i class="fa fa-long-arrow-right"></i>Land</a>-->
    <!--      </div>-->
          
    <!--      <a href="#sub-sub-menu2" class="list-group-item" data-toggle="collapse" data-parent="#sub-menu">Rent <span class="caret"></span></a>-->
    <!--      <div class="collapse list-group-level2" id="sub-sub-menu2">-->
    <!--        <a href="<?php echo base_url(); ?>property/buyer_residential_rent_flat" class="list-group-item" data-parent="#sub-sub-menu"><i class="fa fa-long-arrow-right"></i>Flat</a>-->
    <!--        <a href="<?php echo base_url(); ?>property/buyer_residential_rent_house_bunglow" class="list-group-item" data-parent="#sub-sub-menu"><i class="fa fa-long-arrow-right"></i>House Or Banglow</a>-->
    <!--        <a href="<?php echo base_url(); ?>property/buyer_residential_rent_pent_house" class="list-group-item" data-parent="#sub-sub-menu"><i class="fa fa-long-arrow-right"></i>Pent House</a>-->
    <!--        <a href="<?php echo base_url(); ?>property/buyer_residential_rent_duplex_flat" class="list-group-item" data-parent="#sub-sub-menu"><i class="fa fa-long-arrow-right"></i>PG/Co-Living</a>-->
    <!--        <a href="<?php echo base_url(); ?>property/buyer_residential_rent_land" class="list-group-item" data-parent="#sub-sub-menu"><i class="fa fa-long-arrow-right"></i>Land</a>-->
    <!--      </div>-->
    <!--    </div>-->

    <!--    <a href="#sub-menu2" class="list-group-item active" data-toggle="collapse" data-parent="#main-menu">Commercial <span class="caret"></span></a>-->
        
    <!--    <div class="collapse list-group-level1" id="sub-menu2">-->
    <!--      <a href="#sub-sub-menu3" class="list-group-item" data-toggle="collapse" data-parent="#sub-menu">Buy <span class="caret"></span></a>-->
    <!--      <div class="collapse list-group-level2" id="sub-sub-menu3">-->
    <!--        <a href="<?php echo base_url(); ?>property/buyer_commercial_sale_office" class="list-group-item" data-parent="#sub-sub-menu"><i class="fa fa-long-arrow-right"></i>Office</a>-->
    <!--        <a href="<?php echo base_url(); ?>property/buyer_commercial_sale_shop_showroom" class="list-group-item" data-parent="#sub-sub-menu"><i class="fa fa-long-arrow-right"></i>Shop Or showroom</a>-->
    <!--        <a href="<?php echo base_url(); ?>property/buyer_commercial_sale_warehouse" class="list-group-item" data-parent="#sub-sub-menu"><i class="fa fa-long-arrow-right"></i>Warehouse</a>-->
    <!--        <a href="<?php echo base_url(); ?>property/buyer_commercial_sale_factory" class="list-group-item" data-parent="#sub-sub-menu"><i class="fa fa-long-arrow-right"></i>Factory</a>-->
    <!--        <a href="<?php echo base_url(); ?>property/buyer_commercial_sale_land" class="list-group-item" data-parent="#sub-sub-menu"><i class="fa fa-long-arrow-right"></i>Land</a>-->
    <!--      </div>-->
          
    <!--      <a href="#sub-sub-menu4" class="list-group-item" data-toggle="collapse" data-parent="#sub-menu">Rent <span class="caret"></span></a>-->
    <!--      <div class="collapse list-group-level2" id="sub-sub-menu4">-->
    <!--        <a href="<?php echo base_url(); ?>property/buyer_commercial_rent_office" class="list-group-item" data-parent="#sub-sub-menu"><i class="fa fa-long-arrow-right"></i>Office</a>-->
    <!--        <a href="<?php echo base_url(); ?>property/buyer_commercial_rent_shop_showroom" class="list-group-item" data-parent="#sub-sub-menu"><i class="fa fa-long-arrow-right"></i>Shop Or showroom</a>-->
    <!--        <a href="<?php echo base_url(); ?>property/buyer_commercial_rent_warehouse" class="list-group-item" data-parent="#sub-sub-menu"><i class="fa fa-long-arrow-right"></i>Warehouse</a>-->
    <!--        <a href="<?php echo base_url(); ?>property/buyer_commercial_rent_factory" class="list-group-item" data-parent="#sub-sub-menu"><i class="fa fa-long-arrow-right"></i>Factory</a>-->
    <!--        <a href="<?php echo base_url(); ?>property/buyer_commercial_rent_land" class="list-group-item" data-parent="#sub-sub-menu"><i class="fa fa-long-arrow-right"></i>Land</a>-->
    <!--      </div>-->
    <!--    </div>-->

    <!--</div>-->
      
    <!--        </div>-->
    <!--    </div>-->
    <!--</div>-->
                
                <!--<li class="hidden-xs hidden-sm"> -->
                <!--    <a><i class="fa flaticon-tag" aria-hidden="true"></i>Seller (Stock)<span class="fa fa-chevron-down"></span></a>-->
                <!--    <ul class="nav child_menu">-->
                <!--        <li>-->
                <!--            <a>Residential<span class="fa fa-chevron-down"></span></a>-->
                <!--            <ul class="nav child_menu">-->
                <!--                <li><a>Sale<span class="fa fa-chevron-down"></span></a>-->
                <!--                    <ul class="nav child_menu">-->
                <!--                        <li><a href="<?php echo base_url(); ?>property/seller_residential_sale_flat">Flat</a></li>-->
                <!--                        <li><a href="<?php echo base_url(); ?>property/seller_residential_sale_house_bunglow">House Or Banglow</a></li>-->
                <!--                        <li><a href="<?php echo base_url(); ?>property/seller_residential_sale_pent_house">Pent House</a></li>-->
                <!--                        <li><a href="<?php echo base_url(); ?>property/seller_residential_sale_duplex_flat">PG/Co-Living</a></li>-->
                <!--                        <li><a href="<?php echo base_url(); ?>property/seller_residential_sale_land">Land</a></li>-->
                <!--                    </ul>-->
                <!--                </li>-->
                <!--                <li><a>Rent<span class="fa fa-chevron-down"></span></a>-->
                <!--                    <ul class="nav child_menu">-->
                <!--                        <li><a href="<?php echo base_url(); ?>property/seller_residential_rent_flat">Flat</a></li>-->
                <!--                        <li><a href="<?php echo base_url(); ?>property/seller_residential_rent_house_bunglow">House Or Banglow</a></li>-->
                <!--                        <li><a href="<?php echo base_url(); ?>property/seller_residential_rent_pent_house">Pent House</a></li>-->
                <!--                        <li><a href="<?php echo base_url(); ?>property/seller_residential_rent_duplex_flat">PG/Co-Living</a></li>-->
                <!--                        <li><a href="<?php echo base_url(); ?>property/seller_residential_rent_land">Land</a></li>-->
                <!--                    </ul>-->
                <!--                </li>-->
                <!--            </ul>-->
                <!--        </li>-->
                        
                <!--        <li>-->
                <!--            <a>Commercial<span class="fa fa-chevron-down"></span></a>-->
                <!--            <ul class="nav child_menu">-->
                <!--                <li><a>Sale<span class="fa fa-chevron-down"></span></a>-->
                <!--                    <ul class="nav child_menu">-->
                <!--                        <li><a href="<?php echo base_url(); ?>property/seller_commercial_sale_office">Office</a></li>-->
                <!--                        <li><a href="<?php echo base_url(); ?>property/seller_commercial_sale_shop_showroom">Shop Or showroom</a></li>-->
                <!--                        <li><a href="<?php echo base_url(); ?>property/seller_commercial_sale_warehouse">Warehouse</a></li>-->
                <!--                        <li><a href="<?php echo base_url(); ?>property/seller_commercial_sale_factory">Factory</a></li>-->
                <!--                        <li><a href="<?php echo base_url(); ?>property/seller_commercial_sale_land">Land</a></li>-->
                <!--                    </ul>-->
                <!--                </li>-->
                <!--                <li><a>Rent<span class="fa fa-chevron-down"></span></a>-->
                <!--                    <ul class="nav child_menu">-->
                <!--                        <li><a href="<?php echo base_url(); ?>property/seller_commercial_rent_office">Office</a></li>-->
                <!--                        <li><a href="<?php echo base_url(); ?>property/seller_commercial_rent_shop_showroom">Shop Or showroom</a></li>-->
                <!--                        <li><a href="<?php echo base_url(); ?>property/seller_commercial_rent_warehouse">Warehouse</a></li>-->
                <!--                        <li><a href="<?php echo base_url(); ?>property/seller_commercial_rent_factory">Factory</a></li>-->
                <!--                        <li><a href="<?php echo base_url(); ?>property/seller_commercial_rent_land">Land</a></li>-->
                <!--                    </ul>-->
                <!--                </li>-->
                <!--            </ul>-->
                <!--        </li>-->
                        
                <!--    </ul>       -->
                <!--</li>-->
                
                
    <!----- For Mobile Mode Only --------------->              
    <!--<li class="hidden-lg hidden-md"><a data-modal-trigger="sample-modal2"><i class="fa flaticon-tag"></i>Seller (Stock) </a></li>-->
    
    <!-- Sample Modal 2 -->
    <!--<div class="modal" data-modal-name="sample-modal2" data-modal-dismiss>-->
    <!--    <div class="modal__dialog">-->
    <!--        <div class="modal__content">-->
    <!--            <h5 style="margin:0 0 5px 0;padding:0 0 10px 0;border-bottom:1px solid #ebebeb;font-size:16px;color:#000;">Seller (Stock)</h5>-->
    <!--<div id="main-menu" class="list-group">-->
    <!--    <a href="#sub-menu3" class="list-group-item active" data-toggle="collapse" data-parent="#main-menu">Residential <span class="caret"></span></a>-->
        
    <!--    <div class="collapse list-group-level1" id="sub-menu3">-->
    <!--      <a href="#sub-sub-menu5" class="list-group-item" data-toggle="collapse" data-parent="#sub-menu">Sale <span class="caret"></span></a>-->
    <!--      <div class="collapse list-group-level2" id="sub-sub-menu5">-->
    <!--        <a href="<?php echo base_url(); ?>property/seller_residential_sale_flat" class="list-group-item" data-parent="#sub-sub-menu"><i class="fa fa-long-arrow-right"></i>Flat</a>-->
    <!--        <a href="<?php echo base_url(); ?>property/seller_residential_sale_house_bunglow" class="list-group-item" data-parent="#sub-sub-menu"><i class="fa fa-long-arrow-right"></i>House Or Banglow</a>-->
    <!--        <a href="<?php echo base_url(); ?>property/seller_residential_sale_pent_house" class="list-group-item" data-parent="#sub-sub-menu"><i class="fa fa-long-arrow-right"></i>Pent House</a>-->
    <!--        <a href="<?php echo base_url(); ?>property/seller_residential_sale_duplex_flat" class="list-group-item" data-parent="#sub-sub-menu"><i class="fa fa-long-arrow-right"></i>PG/Co-Living</a>-->
    <!--        <a href="<?php echo base_url(); ?>property/seller_residential_sale_land" class="list-group-item" data-parent="#sub-sub-menu"><i class="fa fa-long-arrow-right"></i>Land</a>-->
    <!--      </div>-->
          
    <!--      <a href="#sub-sub-menu6" class="list-group-item" data-toggle="collapse" data-parent="#sub-menu">Rent <span class="caret"></span></a>-->
    <!--      <div class="collapse list-group-level2" id="sub-sub-menu6">-->
    <!--        <a href="<?php echo base_url(); ?>property/seller_residential_rent_flat" class="list-group-item" data-parent="#sub-sub-menu"><i class="fa fa-long-arrow-right"></i>Flat</a>-->
    <!--        <a href="<?php echo base_url(); ?>property/seller_residential_rent_house_bunglow" class="list-group-item" data-parent="#sub-sub-menu"><i class="fa fa-long-arrow-right"></i>House Or Banglow</a>-->
    <!--        <a href="<?php echo base_url(); ?>property/seller_residential_rent_pent_house" class="list-group-item" data-parent="#sub-sub-menu"><i class="fa fa-long-arrow-right"></i>Pent House</a>-->
    <!--        <a href="<?php echo base_url(); ?>property/seller_residential_rent_duplex_flat" class="list-group-item" data-parent="#sub-sub-menu"><i class="fa fa-long-arrow-right"></i>PG/Co-Living</a>-->
    <!--        <a href="<?php echo base_url(); ?>property/seller_residential_rent_land" class="list-group-item" data-parent="#sub-sub-menu"><i class="fa fa-long-arrow-right"></i>Land</a>-->
    <!--      </div>-->
    <!--    </div>-->

    <!--    <a href="#sub-menu4" class="list-group-item active" data-toggle="collapse" data-parent="#main-menu">Commercial <span class="caret"></span></a>-->
        
    <!--    <div class="collapse list-group-level1" id="sub-menu4">-->
    <!--      <a href="#sub-sub-menu7" class="list-group-item" data-toggle="collapse" data-parent="#sub-menu">Sale <span class="caret"></span></a>-->
    <!--      <div class="collapse list-group-level2" id="sub-sub-menu7">-->
    <!--        <a href="<?php echo base_url(); ?>property/seller_commercial_sale_office" class="list-group-item" data-parent="#sub-sub-menu"><i class="fa fa-long-arrow-right"></i>Office</a>-->
    <!--        <a href="<?php echo base_url(); ?>property/seller_commercial_sale_shop_showroom" class="list-group-item" data-parent="#sub-sub-menu"><i class="fa fa-long-arrow-right"></i>Shop Or showroom</a>-->
    <!--        <a href="<?php echo base_url(); ?>property/seller_commercial_sale_warehouse" class="list-group-item" data-parent="#sub-sub-menu"><i class="fa fa-long-arrow-right"></i>Warehouse</a>-->
    <!--        <a href="<?php echo base_url(); ?>property/seller_commercial_sale_factory" class="list-group-item" data-parent="#sub-sub-menu"><i class="fa fa-long-arrow-right"></i>Factory</a>-->
    <!--        <a href="<?php echo base_url(); ?>property/seller_commercial_sale_land" class="list-group-item" data-parent="#sub-sub-menu"><i class="fa fa-long-arrow-right"></i>Land</a>-->
    <!--      </div>-->
          
    <!--      <a href="#sub-sub-menu8" class="list-group-item" data-toggle="collapse" data-parent="#sub-menu">Rent <span class="caret"></span></a>-->
    <!--      <div class="collapse list-group-level2" id="sub-sub-menu8">-->
    <!--        <a href="<?php echo base_url(); ?>property/seller_commercial_rent_office" class="list-group-item" data-parent="#sub-sub-menu"><i class="fa fa-long-arrow-right"></i>Office</a>-->
    <!--        <a href="<?php echo base_url(); ?>property/seller_commercial_rent_shop_showroom" class="list-group-item" data-parent="#sub-sub-menu"><i class="fa fa-long-arrow-right"></i>Shop Or showroom</a>-->
    <!--        <a href="<?php echo base_url(); ?>property/seller_commercial_rent_warehouse" class="list-group-item" data-parent="#sub-sub-menu"><i class="fa fa-long-arrow-right"></i>Warehouse</a>-->
    <!--        <a href="<?php echo base_url(); ?>property/seller_commercial_rent_factory" class="list-group-item" data-parent="#sub-sub-menu"><i class="fa fa-long-arrow-right"></i>Factory</a>-->
    <!--        <a href="<?php echo base_url(); ?>property/seller_commercial_rent_land" class="list-group-item" data-parent="#sub-sub-menu"><i class="fa fa-long-arrow-right"></i>Land</a>-->
    <!--      </div>-->
    <!--    </div>-->

    <!--</div>-->
      
    <!--        </div>-->
    <!--    </div>-->
    <!--</div>-->
    
    
  
    <!-- <li>
        <a><i class="fa flaticon-deal" aria-hidden="true"></i>Deals <span class="fa fa-chevron-down"></span></a>
        <ul class="nav child_menu">
            <li>
                <a>Interested<span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="<?php echo base_url(); ?>property/deal_interested/Rent">Rent</a></li>
                    <li><a href="<?php echo base_url(); ?>property/deal_interested/Sale">Sale</a></li>
                </ul>
            </li>
            <li>
                <a>In Process<span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="<?php echo base_url(); ?>property/deal_in_process/Rent">Rent</a></li>
                    <li><a href="<?php echo base_url(); ?>property/deal_in_process/Sale">Sale</a></li>
                </ul>
            </li>
            <li><a href="<?php echo base_url(); ?>property/deal_payment_pending">Payment Pending </a></li>
            <li><a href="<?php echo base_url(); ?>property/deal_closed">Closed </a></li>
            <li><a href="<?php echo base_url(); ?>property/deal_sold_out">Sold out </a></li>
            <li><a href="<?php echo base_url(); ?>property/deal_rent_out">Rent out </a></li>
        </ul>
    </li> -->
     
     
    <!--<?php if($this->session->userdata('user_type') != 'admin'){ ?>-->
    <!--<li>-->
    <!--    <a><i class="fa flaticon-money" aria-hidden="true"></i>Account<span class="fa fa-chevron-down"></span></a>-->
    <!--    <ul class="nav child_menu">-->
    <!--        <li><a href="<?php echo base_url('backend/total_collection');?>">Total Collection</a></li>-->
    <!--        <li><a href="<?php echo base_url('backend/pending_collection');?>">Pending Collection</a></li>-->
    <!--        <li><a href="<?php echo base_url('backend/total_payments');?>">Total Payments</a></li>-->
    <!--        <li><a href="<?php echo base_url('backend/pending_payments');?>">Pending Payments</a></li>-->
    <!--    </ul>-->
    <!--</li>-->
    <!--<?php } ?>-->
    
    
    <?php if($this->session->userdata('user_type') != 'admin'){ ?>
    <li>
        <a><i class="fa flaticon-notification" aria-hidden="true"></i>Subscriptions<span class="fa fa-chevron-down"></span></a>
        <ul class="nav child_menu">
            <li><a href="<?php echo base_url('backend/coupons');?>">Coupons</a></li>
            <li><a href="<?php echo base_url('backend/add_subelement');?>">Add Items</a></li>
            <li><a href="<?php echo base_url('backend/package');?>">Subscription</a></li>
            <li><a href="<?php echo base_url('backend/subscriber');?>">All Subscriber</a></li>
        </ul>
    </li>
    <?php } ?>
       
    <?php if($this->session->userdata('user_type') != 'admin'){ ?>          
    <li>
        <a><i class="fa flaticon-speech-bubble" aria-hidden="true"></i>Enquiry Management<span class="fa fa-chevron-down"></span></a>
        <ul class="nav child_menu">
            <li><a href="<?php echo base_url(); ?>backend/list_contact_us">Contact Us</a></li>
            <li><a href="<?php echo base_url(); ?>backend/list_get_in_touch">Get In Touch</a></li>
            <!--<li><a href="<?php echo base_url(); ?>backend/list_post_requirement">Post Requirements</a></li>-->
            <!--<li><a href="<?php echo base_url(); ?>backend/list_home_loans">Home Loans</a></li>-->
        </ul>
    </li>
    <?php } ?>
         
    <?php if($this->session->userdata('user_type') != 'admin'){ ?>       
    <li>
        <a><i class="fa flaticon-settings-1" aria-hidden="true"></i>Setting<span class="fa fa-chevron-down"></span></a>
         <ul class="nav child_menu">
             <li><a href="<?php echo base_url(); ?>backend/list_state">Manage State</a></li>
             <li><a href="<?php echo base_url(); ?>backend/list_city">Manage City</a></li>
             <li><a href="<?php echo base_url(); ?>backend/list_pincode">Pincode</a></li>
             <li><a href="<?php echo base_url(); ?>backend/list_location">Manage Locations</a></li>
             <li><a href="<?php echo base_url(); ?>backend/list_society">Complex Society</a></li>
             <li><a href="<?php echo base_url(); ?>backend/pg_amenities">PG Amenities</a></li>
             <li><a href="<?php echo base_url(); ?>backend/list_bank">Bank Name</a></li>
             <li><a href="<?php echo base_url(); ?>backend/add_holidays">Add Holidays</a></li>
             <li><a href="<?php echo base_url(); ?>backend/other_settings">Other Settings</a></li>
         </ul>
    </li>
    <?php } ?>
                
                <!--------------
                <li>
                <a><i class="fa flaticon-settings" aria-hidden="true"></i>Admin Control<span class="fa fa-chevron-down"></span></a>
                     <ul class="nav child_menu">
                         <li><a href="<?php echo base_url('backend/admin_profile');?>">Profile</a></li>
                         <li><a href="<?php echo base_url(); ?>backend/change_password">Change password</a></li>
                         <li><a href="<?php echo base_url('admin/logout'); ?>">Log Out</a></li>
                     </ul>
                </li>
                --------------->
                <?php if($this->session->userdata('user_type') != 'admin'){ ?>
                <li>
                    <a><i class="fa flaticon-settings-1" aria-hidden="true"></i>Site Management<span class="fa fa-chevron-down"></span></a>
                     <ul class="nav child_menu">
                         <li><a href="<?php echo base_url('backend/list_banners'); ?>">Manage Banners</a></li>
                         <li><a href="<?php echo base_url('backend/list_testimonials');?>">Testimonials</a></li>
                         <li><a href="<?php echo base_url('backend/about_us');?>">About us</a></li>
                         <li><a href="<?php echo base_url('backend/address_contact_details');?>">Address & contact Details</a></li>
                         <li><a href="<?php echo base_url('backend/faq');?>">FAQ</a></li>
                         <li><a href="<?php echo base_url('backend/refund');?>">Refund & Cancellation Policy</a></li>
                         
                     </ul>
                </li>
                <?php } ?>
                    
                <li>
                    <a href="<?php echo base_url('admin/logout'); ?>"><i class="fa flaticon-logout"></i>Log Out</a>
                </li>
                
            </ul>
        </div>
        </div>
  </div>
</div>

<div class="top_nav">
    <div class="nav_menu">
        <nav>
            <div class="nav toggle">
                <a id="menu_toggle"><i class="flaticon-list"></i></a>
            </div>
            
<ul class="nav navbar-nav navbar-right">

<li>
<div class="dropdown">
  <button class="effect-2 effect-4 blue dropdown-toggle" type="button" data-toggle="dropdown">Account&nbsp;&nbsp;<i class="flaticon-user"></i></button>
  <ul class="dropdown-menu style2">
    <li><a href="<?php echo base_url('backend/admin_profile');?>"><i class="flaticon-avatar" style="font-weight:bold;"></i>&nbsp;&nbsp;<?php echo $admindata[0]->name;?></a></li>
    <li><a href="<?php echo base_url(); ?>backend/change_password"><i class="flaticon-padlock" style="font-weight:bold;"></i>&nbsp;&nbsp;Change Password</a></li>
    <li><a href="<?php echo base_url('admin/logout'); ?>"><i class="flaticon-logout" style="font-weight:bold;"></i>&nbsp;&nbsp;Logout</a></li>
  </ul>
</div>
</li>

<li>
    <div id="fullscreen-btn">
        <a href="#" data-provide="fullscreen" class="waves-effect waves-light nav-link full-screen" title="Full Screen">
		    <i class="fa fa-arrows-alt"></i>
		</a>
    </div>
</li>

</ul>
  
        </nav>
    </div>
</div>

<script>
$(".hamburger_btn").click(function () {
  $(this).toggleClass("active");
  $(".menu").toggleClass("active");
});
</script>

<script>
   
    $('input[name=send_method]').change(function() {
        $('#mobile_sms_div').css('display', 'none');
        $('#mobile_whatsapp_div').css('display', 'none');
        $('#email_id_div').css('display', 'none');
        $('#mobile_sms').removeAttr('required');
        $('#mobile_whatsapp').removeAttr('required');
        $('#email_id').removeAttr('required');
        
        $("input[name=send_method]:checked").each(function (index, obj) {
            if(this.value == 'sms' || this.value == 'all'){
                $('#mobile_sms_div').css('display', 'block');
                $('#mobile_sms').attr('required', 'required');
            }
            if(this.value == 'whatsapp' || this.value == 'all'){
                $('#mobile_whatsapp_div').css('display', 'block');
                $('#mobile_whatsapp').attr('required', 'required');
            }
            if(this.value == 'email' || this.value == 'all'){
                $('#email_id_div').css('display', 'block');
                $('#email_id').attr('required', 'required');
            }
        });
    });
</script>