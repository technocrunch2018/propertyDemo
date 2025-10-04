<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <!-- Meta, title, CSS, favicons, etc. -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Floor Mantra</title>

        <!-- Bootstrap -->
        <link href="<?php echo base_url(); ?>assets/admin/css/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
        <!-- Font Awesome -->
        <link href="<?php echo base_url(); ?>assets/admin/css/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
        <!-- NProgress -->
        <link href="<?php echo base_url(); ?>assets/admin/css/vendors/nprogress/nprogress.css" rel="stylesheet">
        <!-- iCheck -->
        <link href="<?php echo base_url(); ?>assets/admin/css/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
        
        <!-- bootstrap-progressbar -->
        <link href="<?php echo base_url(); ?>assets/admin/css/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
        <!-- JQVMap -->
        <link href="<?php echo base_url(); ?>assets/admin/css/vendors/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.min.css" rel="stylesheet"/>
        <!-- bootstrap-daterangepicker -->
        <link href="<?php echo base_url(); ?>assets/admin/css/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

        <!-- Custom Theme Style -->
        <link href="<?php echo base_url(); ?>assets/admin/css/build/css/custom.min.css" rel="stylesheet">
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
    </head>

    <body class="nav-md ">
        <div class="container body">
            <div class="main_container">
                <div class="col-md-3 left_col menu_fixed"  >
                    <div class="left_col scroll-view">
                        <div class="navbar nav_title" style="border: 0;">
                          <a href="<?php echo base_url('backend');?>" class="site_title"> <span style="color:#ff0000;font-weight:bold;">
                              <img src="<?php echo base_url();?>assets/front/img/main-logo.webp" alt="#" width = "100%"></span></a>
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

                        <br />
                    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

                <!-- sidebar menu -->
                <div id="sidebar-menu" class="main_menu_side hidden-print main_menu" >
                <div class="menu_section" >
                    <ul class="nav side-menu">
                        <li><a href="<?php echo base_url('backend');?>"><i class="fa fa-home"></i> Dashboard </a></li>

                  
                        <li>
                            <a><i class="fa fa-lock" aria-hidden="true"></i>Admin<span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu">
                               <li><a href="<?php echo base_url(); ?>backend/manage_admin">Manage Admin</a></li>
                               <li><a href="<?php echo base_url(); ?>backend/manage_admin_perfomance">Admin Perfomance</a></li>
                               <li><a href="<?php echo base_url(); ?>backend/manage_admin_salary">Admin Salary</a></li>
                           </ul>
                        </li>
          
              
                        <li>
                           <a><i class="fa fa-handshake-o" aria-hidden="true"></i>Lead Partner<span class="fa fa-chevron-down"></span></a>
                           <ul class="nav child_menu">
                           <li><a href="#">Manage Lead Partner</a></li>
                           <li><a href="#">Leads</a></li>
                           <li><a href="#">Commissiion </a></li>
                           </ul>
                        </li>
          
                        <li>
                            <a><i class="fa fa-users" aria-hidden="true"></i>Users <span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu">
                                <li><a href="<?php echo base_url(); ?>backend/owner">Owner</a></li>
                                <li><a href="<?php echo base_url(); ?>backend/agent">Agent </a></li>
                                <li><a href="<?php echo base_url(); ?>backend/builder">Builder</a></li>
                                <li><a href="<?php echo base_url(); ?>backend/all_users">All</a></li>
                            </ul>
                        </li>
          
          
                        <li> 
                            <a><i class="fa fa-credit-card-alt" aria-hidden="true"></i>Commercial seller<span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu">
                                <li><a href="<?php echo base_url(); ?>backend/factory">Factory </a></li>
                                <li><a href="<?php echo base_url(); ?>backend/land"> Land </a></li>
                                <li><a href="<?php echo base_url(); ?>backend/office">Office  </a></li>
                                <li><a href="<?php echo base_url(); ?>backend/shop">Shop  </a></li>
                                <li><a href="<?php echo base_url(); ?>backend/warehouse">Warehouse  </a></li>
                                <!--<li><a href="factory_sell.php">Factory for Sell</a></li>-->
                                <!--<li><a href="land_sell.php">Land for Sell</a></li>-->
                                <!--<li><a href="office_sell.php">Office for Sell </a></li>-->
                                <!--<li><a href="shop_sell.php">Shop for Sell </a></li>-->
                                <!--<li><a href="warehouse_sell.php">Warehouse for Sell </a></li>-->
                            </ul>             
                        </li>
 
                        <li>
                            <a><i class="fa fa-home" aria-hidden="true"></i>Residencial Seller<span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu">
                                <li><a href="<?php echo base_url(); ?>backend/duplex_flat">Duplex Flat </a></li>
                                <li><a href="<?php echo base_url(); ?>backend/pent_house">Pent House </a></li>
                                <li><a href="<?php echo base_url(); ?>backend/flat">Flat  </a></li>
                                <li><a href="<?php echo base_url(); ?>backend/house">House  </a></li>
                                <!--<li><a href="land_rent_residential.php">Land  </a></li>-->
                                <!--<li><a href="duplex_flat_sell.php">Duplex Flat for Sell</a></li>-->
                                <!--<li><a href="pent_house_sell.php">Pent House for Sell</a></li>-->
                                <!--<li><a href="flat_sell.php">Flat for Sell </a></li>-->
                                <!--<li><a href="house_sell.php">House for Sell </a></li>-->
                                <!--<li><a href="land_sell_residential.php">Land for Sell </a></li>-->
                            </ul>
                        </li>

                      <!-- <li>-->
                      <!--  <a><i class="fa fa-ioxhost"></i> Stock Sell(Residential)<span class="fa fa-chevron-down"></span></a>-->
                      <!--  <ul class="nav child_menu">-->
                      <!--      <li><a href="duplex_flat_sell.php">Duplex Flat Sell</a></li>-->
                      <!--      <li><a href="pent_house_sell.php">Pent House Sell</a></li>-->
                      <!--      <li><a href="flat_sell.php">Flat Sell </a></li>-->
                      <!--      <li><a href="house_rent.php">House Sell </a></li>-->
                      <!--      <li><a href="land_sell_residential.php">Land Sell </a></li>-->
                      <!--  </ul>-->
                      <!--</li>-->

                        <li>
                            <a><i class="fa fa-shopping-cart" aria-hidden="true"></i>Commercial Buyer<span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu">
                                <li><a href="<?php echo base_url(); ?>backend/stock_factory_buyer">Factory for Buyer</a></li>
                                <li><a href="<?php echo base_url(); ?>backend/stock_land_buyer">Land for Buyer</a></li>
                                <li><a href="<?php echo base_url(); ?>backend/stock_office_buyer">Office for Buyer </a></li>
                                <li><a href="<?php echo base_url(); ?>backend/stock_shop_buyer">Shop for Buyer </a></li>
                                <li><a href="<?php echo base_url(); ?>backend/stock_warehouse_buyer">Warehouse for buyer </a></li>
                                <li><a href="<?php echo base_url(); ?>backend/stock_factory_rent">Factory </a></li>
                                <li><a href="<?php echo base_url(); ?>backend/stock_land_rent">Land </a></li>
                                <li><a href="<?php echo base_url(); ?>backend/stock_office_rent">Office </a></li>
                                <li><a href="<?php echo base_url(); ?>backend/stock_shop_rent">Shop </a></li>
                                <li><a href="<?php echo base_url(); ?>backend/stock_warehouse_rent">Warehouse </a></li>
                            </ul>
                        </li>


                          <!-- <li>-->
                          <!--  <a><i class="fa fa-ioxhost"></i> Client Rent(Commercial)<span class="fa fa-chevron-down"></span></a>-->
                          <!--  <ul class="nav child_menu">-->
                          <!--      <li><a href="stock_factory_rent.php">Stock Factory Rent</a></li>-->
                          <!--      <li><a href="stock_land_rent.php">Stock Land Rent</a></li>-->
                          <!--      <li><a href="stock_office_rent.php">Stok Office Rent</a></li>-->
                          <!--      <li><a href="stock_shop_rent.php">Stock Shop Rent</a></li>-->
                          <!--      <li><a href="stock_warehouse_rent.php">Stock Warehouse Rent</a></li>-->
                          <!--  </ul>-->
                          <!--</li>-->
          
                        <li>
                            <a><i class="fa fa-h-square" aria-hidden="true"></i>Residencial Buyer<span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu">
                                <li><a href="<?php echo base_url(); ?>backend/duplex_flat_buyer">Duplex Flat for Buyer</a></li>
                                <li><a href="<?php echo base_url(); ?>backend/pent_house_buyer">Pent House for Buyer</a></li>
                                <li><a href="<?php echo base_url(); ?>backend/stock_flat_buyer">  Flat for Buyer </a></li>
                                <li><a href="<?php echo base_url(); ?>backend/stock_house_buyer">  House for Buyer </a></li>
                                <li><a href="<?php echo base_url(); ?>backend/stock_land_buyer_residential">  Land for buyer</a></li>
                                <li><a href="<?php echo base_url(); ?>backend/duplex_flat_rent_residential">Duplex  Flat for Buyer</a></li>
                                <li><a href="<?php echo base_url(); ?>backend/pent_house_rent_residential">Pent House for Buyer</a></li>
                                <li><a href="<?php echo base_url(); ?>backend/stock_flat_rent_residential">  Flat for Buyer</a></li>
                                <li><a href="<?php echo base_url(); ?>backend/stock_house_rent_residential">  House for Buyer</a></li>
                                <li><a href="<?php echo base_url(); ?>backend/stock_land_rent_residential">  Land for buyer</a></li>
                            </ul>
                        </li>

                        <!--  <li>-->
                        <!--    <a><i class="fa fa-ioxhost"></i> Client Rent(Residential)<span class="fa fa-chevron-down"></span></a>-->
                        <!--    <ul class="nav child_menu">-->
                        <!--<li><a href="duplex_flat_rent_residential.php">Duplex Flat Buyer</a></li>-->
                        <!--<li><a href="pent_house_rent_residential.php">Pent House Buyer</a></li>-->
                        <!--<li><a href="stock_flat_rent_residential.php">Stok Flat Buyer </a></li>-->
                        <!--<li><a href="stock_house_rent_residential.php">Stock House Buyer </a></li>-->
                        <!--<li><a href="stock_land_rent_residential.php">Stock Land buyer </a></li>-->
                        <!--    </ul>-->
                        <!--  </li>-->
          
                        <li>
                            <a><i class="fa fa-handshake-o" aria-hidden="true"></i>Deals <span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu">
                                <li><a href="#">Interested</a></li>
                                <li><a href="<?php echo base_url(); ?>backend/onprocess">In Process </a></li>
                                <li><a href="#">Pement Pending </a></li>
                                <li><a href="#">Closed </a></li>
                                <li><a href="#">Sold out </a></li>
                                <li><a href="#">Rent out </a></li>
                                <li><a href="#">Rejected seller </a></li>
                                <li><a href="#">Not Intrested Buyer</a></li>
                            </ul>
                        </li>
            
            
                        <!--<li>
                            <a><i class="fa fa-tasks" aria-hidden="true"></i>Task <span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu">
                                <li><a href="#">Creat </a></li>
                                <li><a href="#">Active </a></li>
                                <li><a href="#">Expire</a></li>
                                <li><a href="#">Untouch</a></li>
                                <li><a href="#">Closed </a></li>
                                <li><a href="#">Rejected</a></li>
                            </ul>
                        </li>-->
             
                        <li>
                            <a><i class="fa fa-money" aria-hidden="true"></i>Account<span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu">
                                <li><a href="#">Total Collection</a></li>
                                <li><a href="#">Pending Collection</a></li>
                                <li><a href="#">Pending Payments</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>backend/list_testimonials"><i class="fa fa-money" aria-hidden="true"></i>Testimonials<span class="fa fa-chevron-down"></span></a>
                            
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>backend/list_contact_us"><i class="fa fa-money" aria-hidden="true"></i>Contact Us<span class="fa fa-chevron-down"></span></a>
                            
                        </li>
            
                        <li>
                        <a><i class="fa fa-cog" aria-hidden="true"></i>Setting<span class="fa fa-chevron-down"></span></a>
                             <ul class="nav child_menu">
                                 <li><a href="<?php echo base_url(); ?>backend/change_password"><i class="fa fa-key"></i> Change password</a></li>
                                 <li><a href="<?php echo base_url(); ?>backend/list_state"><i class="fa fa-map"></i>Add State</a></li>
                                 <li><a href="<?php echo base_url(); ?>backend/list_city"><i class="fa fa-map"></i>Add City</a></li>
                                 <li><a href="#"><i class="fa fa-map-marker"></i>Add Society</a></li>
                                 <li><a href="<?php echo base_url('admin/logout'); ?>"><i class="fa fa-sign-out"></i> Log Out</a></li>
                             </ul>
                        </li>
              </div>
              

            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>

<div class="top_nav">
    <div class="nav_menu">
        <nav>
            <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
            </div>

            <ul class="nav navbar-nav navbar-right">
                <li class="">
                    <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                        <span style="font-size:20px;color:white;"><?php echo $admindata[0]->name;?></span>               
                    </a>             
                </li>
            </ul>
        </nav>
    </div>
</div>