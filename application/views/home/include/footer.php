<footer id="footer" class="classic">
    <div class="footer-widget">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="row">
                        <div class="col-lg-5 col-md-5 col-sm-6 col-xs-12">
                            <div class="widget widget_nav_menu">
                                <div class="logowidget"><img class="logowidget-img" src="<?php echo base_url();?>assets/front/img/main-logo.webp" alt="img"></div>
                                <div class="menu-footer-widget-menu-container">
                                    <p>We are one of the leading home rental service provider in Tier2 cities like( Hubli, Dharwad, Belagavi, Davanageri, Mysore and Maharashtra )the vision of our company is to provide the best Rental Service for our Clients. <a style="color: #50aeed !important;" href="<?php echo base_url('home/about_us');?>">Read More</a></a></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-2 col-sm-6 col-xs-12">
                            <div class="widget widget_nav_menu">
                                <div class="widget-title"><h5>Useful Links</h5></div>
                                <div class="menu-footer-widget-menu-container footer-menu">
                                    <li><i class="fa fa-long-arrow-right"></i><a href="<?php echo base_url('home/term_condition');?>"> Terms & Conditions</a></li>
                                    <li><i class="fa fa-long-arrow-right"></i><a href="<?php echo base_url('home/privacy_policy');?>"> Privacy Policy</a></li>
                                    <li><i class="fa fa-long-arrow-right"></i><a href="<?php echo base_url('home/faq');?>"> FAQ's </a></li>
                                    <li><i class="fa fa-long-arrow-right"></i><a href="<?php echo base_url('home/disclaimer');?>"> Disclaimer</a></li>
                                    <li><i class="fa fa-long-arrow-right"></i><a href="<?php echo base_url('home/contact_us');?>"> Contact Us</a></li>
                                    <li><i class="fa fa-long-arrow-right"></i><a href="<?php echo base_url('home/refund');?>"> Refund & Cancellation</a></li>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5 col-md-5 col-sm-6 col-xs-12">
                            <div class="widget widget-text">
                                <div class="widget-title"><h5>Get in touch</h5></div>
                                <ul class="btndesign footer-menu">
                                    <li><i class="fa fa-map-o"></i><a><?php echo $frontpagedata->address1;?></a></li>
                                    <li><i class="fa fa-whatsapp"></i><a target="_blank" href="https://wa.me/<?php echo $frontpagedata->mobile1;?>"><?php echo $frontpagedata->mobile1;?></a></li>
                                    <li><i class="fa fa-envelope-o "></i><a target="_blank" href="mailto:<?php echo $frontpagedata->email1;?>"><?php echo $frontpagedata->email1;?></a></li>
                                </ul>
                            </div>
                            
                            <div class="footer_social_widget">
                                <style>
                                    .list-inline-item{
                                        display: inline-block;
                                    }
                                    .mt30 {
                                            margin-top: 30px;
                                    }
                                    .list-inline-item:not(:last-child) {
                                            margin-right: 0.5rem; 
                                    }
                                    
                                    .footer_social_widget li {
                                        padding-right: 10px;
                                    }
                                </style>
                                <ul class="mt30">
                                    <li class="list-inline-item"><a href="https://www.facebook.com/teamwhybroker?mibextid=LQQJ4d" target="_blank"><i class="fa fa-facebook-f fa-lg" style = "color: #3b5998; font-size: 30px;"></i></a></li>
                                    <li class="list-inline-item"><a href="https://youtube.com/@whybroker484?si=j0xIIWqVFhoeVIjM" target="_blank"><i class="fa fa-youtube fa-lg"  style = "color: #FF0000; font-size: 30px;"></i></a></li>
                                    <li class="list-inline-item"><a href="https://www.instagram.com/teampropertyfellows?igsh=OTJqeHoxcnU3YnI4" target="_blank"><i class="fa fa-instagram fa-lg"  style = "color: #c900be; font-size: 30px;"></i></a></li>
                                </ul>
                
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="copyright-sec">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 left-side">
                    <div class="copy-right">
                        <p>Copyright &copy;<script>document.write(new Date().getFullYear());</script> propertyfellows. All Rights Reserved.</p>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 right-side">
                    <div class="copy-right">
                        <p>Designed & Developed By:- <a style = "color:#df6950" href = "https://www.teamtechnocrunch.com" target = "_blank">Team Technocrunch Technologies, MH India</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

<div class="modal fade" id="sign-up" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="login-form">
            <div class="modal-content">
                <h4 style="text-align: center;margin: 20px 0 15px;border-bottom: 1px solid #50aeed;padding: 20px 0 12px;font-weight: bold !important;">User Login</h4>
                <div class="tab-content">
                    <div id="user-login-tab-9895611" class="tab-pane fade active in">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span><i class="icon- icon-close2"></i></span>
                            </button>
                        </div>
                        <div class="modal-body" style="padding-top:0px;">
                            <div class="cs-login-pbox-98956 login-form-id-98956" id="login-return">
                                <div class="intro-form">
                                    <form method="post" action="<?php echo base_url(); ?>home/check_user_login" id="user-login-form">
                                        <input type="hidden" name="redirect_url"  value="<?php echo current_url();?>" placeholder="Email" required>
                                        <div class="form-group">
                                            <input type="text" name="name" id="name" placeholder="Enter Full Name" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="number" name="email" id="email" placeholder="Enter WhatsApp Mobile Number" required>
                                        </div>
                                        <input type="hidden" name="PostID" id = "PostID">
                                        <input type="hidden" name="RentSale" id = "RentSale">
                                        <div style="width:100%" class="form-group">
                                            <button type="submit" class="intro-btn-red">Generate OTP</button>
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
    
<div class="modal fade" id="subscription-home" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="login-form">
            <div class="modal-content">
                <div class="tab-content">
                    <div id="user-login-tab-9895611" class="tab-pane fade active in">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span><i class="icon- icon-close2"></i></span>
                            </button>
                        </div>
                        <div class="modal-body" style="padding-top:0px;">
                            <div class="cs-login-pbox-98956 login-form-id-98956" id="login-return">
                                <div class="intro-form">
                                    <div class="header">
                                        <h1>Choose a Plan and <span class="highlight">SAVE THOUSANDS</span> on Brokerage</h1>
                                    </div>
                                    <div class="row" style = "justify-content: flex-start;">   
                                        <?php $x = 1; foreach ($list_subscriptions as $mainList) {?>
                                            <div class="subscription-card">
                                                <h5><?php echo $mainList->name; ?></h5>
                                                <p class="price"><span class="original-price"><?php if ($mainList->oldPrice != 0) {?>₹<?php echo number_format($mainList->oldPrice, 2);}?></span> ₹<label><?php echo number_format($mainList->price, 2)?></label> + 18% GST</p>
                                                <p>Get genuine house owner contacts matching your requirements</p>
                                                <ul class="features">
                                                    <?php $array = explode(',', $mainList->subElements);
                                                    foreach($array as $list){
                                                        $details = $this->common_model->getdatabyid(array('id' => $list),'tblSubElements');?>
                                                        <li><i class="material-icons">check_circle</i><?php echo $details->name;?></li>
                                                    <?php }?>
                                                </ul>
                                                <p style = "text-align: left; cursor: pointer;" onclick="onButtonClick(<?php echo $x; ?>)">Do you have coupon?</p>
                                                <p class = "hide" id = "showCoupon<?php echo $x; ?>"><input type="text" oninput="myFunction(<?php echo $x; ?>)" id = "couponEnter<?php echo $x; ?>" placeholder = "Enter your coupon"/></p>
                                                <input type = "hidden" id = "amount<?php echo $x; ?>" value = "<?php echo $mainList->price; ?>">
                                                <input type = "hidden" id = "id<?php echo $x; ?>" value = "<?php echo $mainList->id; ?>">
                                                <input type = "hidden" id = "subscriptionUserID" value = "<?php echo @$this->session->userdata('user')['user_id']; ?>">
                                                <input type = "hidden" id = "subscriptionPropertyId">

                                                <div id="subscriptionMobile<?php echo $x; ?>" style="display:none">
                                                    <input type='text' id='subscriptionMobileEnter<?php echo $x; ?>' placeholder = "Enter Valid Mobile" maxlength="10" required name='subscriptionMobileEnter'>
                                                </div>

                                                <div id="subscriptionVerifyOTP<?php echo $x; ?>" style="display:none">
                                                    <input type='text' id='subscriptionMobileOTP<?php echo $x; ?>' maxlength="4" placeholder = "Enter Valid OTP" required name='subscriptionMobileOTP'>
                                                </div>

                                                <h6 style = "color: green !important;" id = "SuccessMessage<?php echo $x; ?>"></h6>
                                                <button class="btn-subscribe" onclick = "GetSubscriptionDetails(<?php echo $mainList->id; ?>)">See Details</button>
                                            </div>
                                        <?php $x++; }?>
                                    </div>
                                    <div class="support">
                                        For assistance call us at: <a href="tel:+91<?php echo $frontpagedata->mobile1;?>">+91-<?php echo $frontpagedata->mobile1;?></a>
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
    
<div class="modal fade" id="user-register" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="login-form">
            <div class="modal-content">
                <h4 style="text-align: center;margin: 20px 0 15px;border-bottom: 1px solid #50aeed;padding: 20px 0 12px;font-weight: bold !important;">User Register</h4>
                <div class="tab-content">
                    <!----------
                    <ul class="nav nav-tabs">
                        <li class="active">
                            <a data-toggle="tab" href="#user-login-tab-9895611" id="myModalLabel11" class="user-tab-login" aria-expanded="false">Register</a>
                        </li>
                    </ul>
                    ----------->
                    <div id="user-login-tab-9895611" class="tab-pane fade active in">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span><i class="icon- icon-close2"></i></span>
                            </button>
                        </div>
                        <div class="modal-body" style="padding-top:0px;">
                            
                            <div class="smart-wrap">
                                        
                                        <form class="smart-forms style2 smart-container" method="post" action="<?php echo base_url();?>home/user_registration" id="user_registration_form" name="user_registration_form">                         
                                            <input type="hidden" name="redirect_url"  value="<?php echo current_url();?>" placeholder="Email" required>
                                            <div class="frm-row" style="margin-top:20px;">
                                            
                                                <div class="colm colm12" style="padding:0;">
                                                    <div class="section">
                                                        <label class="field select">
                                                            <select id="usertype" name="usertype" value="">
                                                                <option value="Owner">Owner</option>
                                                                <option value="Builder">Builder</option>
                                                                <option value="Agent">Tenant</option>
                                                            </select>
                                                            <i class="arrow"></i>
                                                        </label> 
                                                    </div>
                                                    <div class="section">
                                                        <label class="field prepend-icon">
                                                            <input type="text" name="name" id="name" class="gui-input" placeholder="Please enter your full name">
                                                            <span class="field-icon">
                                                                <i class="fa fa-user"></i>
                                                            </span>  
                                                        </label>
                                                    </div><!-- end section -->

                                                    <div class="section">
                                                        <label class="field prepend-icon">
                                                            <input type="number" name="phone" id="phone" class="gui-input" placeholder="Please enter whatsapp number">
                                                            <span class="field-icon"><i class="fa fa-phone-square"></i></span>  
                                                        </label>
                                                    </div><!-- end section -->
                                                    <div class="section">
                                                        <label class="field prepend-icon">
                                                            <input type="email" name="email" id="email" class="gui-input" placeholder="Please enter email address">
                                                            <span class="field-icon"><i class="fa fa-envelope"></i></span>  
                                                        </label>
                                                    </div><!-- end section -->
                                                    
                                                    <div class="section">
                                                
                                                        <label class="field option block">
                                                        <input type="checkbox" name="terms" required>
                                                        <span class="checkbox"></span> I have read and agree to the <a style="color:#50aeed;" href="<?php echo base_url('home/term_condition');?>">terms and conditions </a>               
                                                        </label>
                                                    </div><!-- end section -->
                                                    
                                                    <div class="input-filed">
                                                        <div class="input-button-loader">
                                                            <input type="submit" class="cs-bgcolor" name="user-submit" value="Register Now">
                                                        </div>
                                                    </div>
                                                    
                                                </div><!-- end .colm12 section -->
                                            
                                            </div><!-- end .frm-row section -->                                      
                                        </form><!-- end .smart-forms section -->
                                    </div><!-- end .smart-wrap section -->
                            
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="lead-partner-sign-in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="login-form">
            <div class="modal-content">
                <h4 style="text-align: center;margin: 20px 0 15px;border-bottom: 1px solid #50aeed;padding: 20px 0 12px;font-weight: bold !important;">Lead Partner</h4>
                <div class="tab-content">
                    <ul class="nav nav-tabs">
                        <li class="active">
                            <a data-toggle="tab" href="#user-login-tab" id="myModalLabel11" class="user-tab-login" aria-expanded="false">LogIn</a>
                        </li>
                        <li>
                            <a data-toggle="tab" href="#lead-partner-register" class="user-tab-register" aria-expanded="true">Register</a>
                        </li>
                    </ul>
                    
                    <div id="user-login-tab" class="tab-pane fade active in">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span><i class="icon- icon-close2"></i></span>
                            </button>
                        </div>
                        <div class="modal-body" style="padding-top:15px;">
                            
                            <!------ Forgot Area For User ----------------->
                                <div class="content-style-form cs-forgot-pbox-98956 content-style-form-2" id="forgot-popup-lead" style="display: none;">
                                
                                <div class="row">
                                    <div class="col-lg-12 col-xs-12">
                                        <span class="wp-rem-dev-login-forget-txt">Forgot Password</span>
                                        <span class="wp-rem-dev-login-box-t-txt">Login To Your Account</span>
                                        <div class="login-form-id-58968687">
                                            
                                            <div class="intro-form">
                                                <form method="post" action="<?php echo base_url(); ?>home/send_lead_partner_forgot_password_mail" id="lead-partner-forgot-password-form" name="lead-partner-forgot-password-form">

                                                    <div class="form-group">
                                                        <input type="text" name="user_forgot_email" id="user_forgot_email" value="" placeholder="Enter Your Register Email" required>
                                                    </div>

                                                    <div style="width:100%" class="form-group">
                                                        <button type="submit" class="intro-btn-red">Send OTP</button>
                                                    </div>

                                                    <div class="forget-password">
                                                        <i class="icon-help"></i><a href="javascript:void(0)" id="forgot-close-lead" class="cs-forgot-switch">Back to SignIn</a>
                                                    </div>

                                                </form>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div> 
                            <div class="cs-login-pbox-98956 login-form-id-98956" id="lead-return">
                                
                                <div class="intro-form">
                                    <form method="post" action="<?php echo base_url(); ?>home/check_lead_partner_login" id="lead-partner-login-form">

                                        <div class="form-group">
                                            <input type="text" name="email" id="email" value="" placeholder="Email" required>
                                        </div>

                                        <div class="form-group">
                                            <input type="password" name="password" id="password" value="" placeholder="Password" required>
                                            <i class="toggle-password fa fa-fw fa-eye-slash"></i>
                                        </div>

                                        <div class="smart-forms">                         
                                            <div class="section">
                                                <label class="field option block" style="margin-top: -15px;margin-bottom: 15px;">
                                                    <input type="checkbox" name="terms">
                                                    <span class="checkbox"></span> Remember me                 
                                                </label>
                                            </div><!-- end section -->
                                        </div><!-- end .smart-forms section -->

                                        <div style="width:100%" class="form-group">
                                            <button type="submit" class="intro-btn-red">LogIn Now</button>
                                        </div>

                                        <div class="forget-password">
                                            <i class="icon-help"></i><a href="javascript:void(0)" id="forgot-open-lead" class="cs-forgot-switch">Forgot Password?</a>
                                        </div>

                                    </form>
                                </div>                                   
                                
                            </div>
                        </div>
                    </div>
                    
                    <!--- Lead Partner Registeration Form ---------->
                    
                    <div id="lead-partner-register" class="tab-pane fade">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span><i class="icon- icon-close2"></i></span>
                            </button>
                        </div>
                        <div class="modal-body" style="padding-top:0px;">
                            
                            <div id="member598181" role="tabpanel" class="tab-pane active">
                                <div class="smart-wrap">
                                    <div class="smart-forms style2 smart-container">                         
                                    
                                    <form class="frm-row" method="post" action="<?php echo base_url(); ?>home/lead_partner_registration" id="lead_partner_registration_form" name="lead_partner_registration_form" style="margin-top: 40px;">
                                    
                                        <div class="colm colm12" style="padding:0;">
                                            <div class="section">
                                                <label class="field prepend-icon">
                                                    <input type="text" name="name" id="name" class="gui-input" placeholder="Full Name">
                                                    <span class="field-icon"><i class="fa fa-user"></i></span>  
                                                </label>
                                            </div><!-- end section -->
                                            <div class="section">
                                                <label class="field prepend-icon">
                                                    <input type="text" name="email" id="lead_email" class="gui-input" placeholder="Email ID">
                                                    <span class="field-icon"><i class="fa fa-envelope"></i></span>  
                                                </label>
                                            </div><!-- end section -->
                                            <div class="section">
                                                <label class="field prepend-icon">
                                                    <input type="text" name="confirm_email" id="confirm_email" class="gui-input" placeholder="Comfirm Email ID">
                                                    <span class="field-icon"><i class="fa fa-envelope"></i></span>  
                                                </label>
                                            </div><!-- end section -->
                                            <div class="section">
                                                <label class="field prepend-icon">
                                                    <input type="number" name="phone" id="phone" class="gui-input" placeholder="Mobile No">
                                                    <span class="field-icon"><i class="fa fa-phone-square"></i></span>  
                                                </label>
                                            </div><!-- end section -->
                                            <div class="section">
                                                <label class="field prepend-icon">
                                                    <input type="password" name="password" id="lead_password" class="gui-input" placeholder="Password">
                                                    <span class="field-icon"><i class="fa fa-unlock-alt"></i></span>  
                                                </label>
                                            </div><!-- end section -->
                                            <div class="section">
                                                <label class="field prepend-icon">
                                                    <input type="password" name="ConfirmPassword" id="ConfirmPassword" class="gui-input" placeholder="Confirm Password">
                                                    <span class="field-icon"><i class="fa fa-unlock-alt"></i></span>  
                                                </label>
                                                <label class="field option block">
                        <input type="checkbox" name="terms" required>
                        <span class="checkbox"></span> I have read and agree to the <a style="color:#50aeed;" href="<?php echo base_url('home/term_condition');?>">terms and conditions </a>              
                    </label>
                                            </div><!-- end section -->
                                            
                                            <div class="input-filed">
                                                
                                            <div class="input-button-loader">
                                                <input type="submit" class="cs-bgcolor" name="user-submit" value="Register Now">
                                            </div>
                                        </div>
                                            
                                        </div><!-- end .colm12 section -->
                                    
                                    </form><!-- end .frm-row section -->                                      
                        </div><!-- end .smart-forms section -->
                    </div><!-- end .smart-wrap section -->
                            </div>
                            <!-- <span class="loader"></span> -->
                            
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="global-modal" role="dialog">
    <div class="modal-dialog modal-md" >
        <div class="modal-content">
            <div class="modal-header">
                <form method="post" action="<?php echo base_url(); ?>home/add_new_project_image" name="add_new_project_image" id="add_new_project_image" enctype="multipart/form-data">
                    <input type="hidden" value="" name="project_post_id" id="project-image-id"/>
                    <input type="file" name="userfile[]" multiple="multiple" />
                    <input type="submit" value="Submit" class="btn btn-success"/>
                </form>
            </div>
            <div class="modal-body" id="project-images"></div>
        </div>
    </div>
</div>

<div class="modal fade" id="project-gallery-global-modal" role="dialog">
    <div class="modal-dialog modal-md" >
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span><i class="icon- icon-close2"></i></span>
                </button>
            </div>
            <div class="modal-body" id="project-gallery-images"></div>
        </div>
    </div>
</div>

<div class="modal fade" id="property-image-modal" role="dialog">
    <div class="modal-dialog modal-md" >
        <div class="modal-content">
            <div class="modal-header">
                <form method="post" action="<?php echo base_url(); ?>home/add_new_property_image" name="add_new_property_image" id="add_new_property_image" enctype="multipart/form-data">
                    <input type="hidden" value="" name="property_post_id" id="property_post_id"/>
                    <input type="file" name="userfile[]" multiple="multiple" />
                    <input type="submit" value="Submit" class="btn btn-success"/>
                </form>
            </div>
            <div class="modal-body" id="property-images"></div>
        </div>
    </div>
</div>

<div class="modal fade" id="property-gallery-image-modal" role="dialog">
    <div class="modal-dialog modal-md" >
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span><i class="icon- icon-close2"></i></span>
                </button>
            </div>
            <div class="modal-body" id="property-gallery-images"> </div>
        </div>
    </div>
</div>

<script src="<?php echo base_url();?>assets/front/js/jquery.min-3.5.1.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/front/js/modernizr.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/additional-methods.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/front/js/multi_step_form.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/front/js/jquery.prettyPhoto.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/front/js/lightbox.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/front/js/swiper.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/front/js/flexslider.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/front/js/chosen.select.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/front/js/bootstrap-slider.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/front/js/moment.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/front/js/daterangepicker.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/front/js/croppic.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/front/js/responsive-calendar.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/front/js/donut-pie-chart.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/front/js/fitvids.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/front/js/responsive.menu.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/front/js/functions.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/front/js/notice.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/front/js/intro-popup.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/front/js/owl.carousel.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/front/js/responsiveslides.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/front/js/bootstrap.min.js"></script>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>

<script>
    $(document).ready(function(){
        $( "#wp_rem_property_category" ).change(function() {
            var value = $(this).val();
            $("#property_type_fields_4090").hide(500);
            if(value==0)
                $("#property_type_fields_4090").hide(500);
            else
                $("#property_type_fields_4090").show(500);
        });
    });
</script>
    

<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/6119ebaad6e7610a49b05877/1fd6k153u';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->
    
    <script>
        $(document).ready(function(){

            $( "#forgot-open-user" ).click(function() {
                $("#forgot-popup-user").css("display","block");
                $("#login-return").css("display","none");

            });
            $( "#forgot-close-user" ).click(function() {
                $("#forgot-popup-user").css("display","none")
                $("#login-return").css("display","block");
            });

            $( "#forgot-open-lead" ).click(function() {
                $("#forgot-popup-lead").css("display","block");
                $("#lead-return").css("display","none");

            });
            $( "#forgot-close-lead" ).click(function() {
                $("#forgot-popup-lead").css("display","none")
                $("#lead-return").css("display","block");
            });

        });
    </script>
    
    <script>
        $(document).ready(function(){
          $("#user-12").click(function(){
            $("#user-toggle").toggle();
          });
        });
    </script>

    <script type="text/javascript">
        function wp_rem_advanced_search_field(counter, tab, element) {
            "use strict";
            if (tab == 'simple') {
                jQuery('#property_type_fields_' + counter).slideUp();
                jQuery('#nav-tabs-' + counter + ' li').removeClass('active');
                jQuery(element).parent().addClass('active');
            } else if (tab == 'advance') {
                jQuery('#property_type_fields_' + counter).slideDown();
                jQuery('#nav-tabs-' + counter + ' li').removeClass('active');
                jQuery(element).parent().addClass('active');
            } else {
                jQuery('#property_type_fields_' + counter).slideToggle();
            }
        }

        //Subscription

        function openLoginModal(PostId, RentSale) {
            document.getElementById('PostID').value = PostId;
            document.getElementById('RentSale').value = RentSale;
            $('#sign-up').modal('show');
        }

        function onButtonClick(x){
            document.getElementById('showCoupon'+x).className="show";
        }

        function ApplyCouponForSubscription() {
            let Coupon = document.getElementById("couponEnter").value;
            let amount = document.getElementById("SubAmount").value;
            $.ajax({
                data:{couponEnter:Coupon, amount:amount},
                url:'<?php echo base_url(); ?>home/getEnteredCouponVerified',
                type:'post',
                success:function(data){
                    let json = $.parseJSON(data);
                    if (json.id)
                    {
                        let discount = json.discount
                        let discountedAmount =  amount - (amount * (discount / 100));
                        $('#SuccessMessage').prepend("Coupon applied sucessfull!");
                        $('#couponEnter').attr('disabled','disabled');
                        $('#ApplyCouponButton').attr('disabled','disabled');
                        $('#SubAmount').val(discountedAmount);
                    }
                    else 
                    {
                        $('#ErrorMessage').prepend("Please Enter Valid Coupon!");
                    }
                }
            });
        }

        function GetSubscriptionDetails(SubID, subscriptionPropertyId)
        {
            window.location.href = SITEURL + 'home/subscriptionDetails/' + SubID + '/' + subscriptionPropertyId;
        }

        //End Subscription
    </script>
    
    <script type="text/javascript">
        $(document).on('mouseenter', '.rating', function(){
            var index = $(this).data('index');
            remove_background(index); 
            add_background(index);  
        });
        
        function add_background(index){
            for(var count = 1; count <= index; count++)
            {
               $('#star'+'-'+count).css('color', '#ffcc00!importatnt');
            }
        }
        
        
        function remove_background(index)
        {
            for(var count = index; count <= 5; count++)
            {
                $('#star'+'-'+count).css('color', '#1b2839');
            }
        }
        
        
        $(document).on('mouseleave', '.rating', function(){
            var rate = $('#portfolio_rate').val();
            var index = $(this).data('index');    
            remove_background(0);
            add_background(rate);      
        });
        
        
        $(document).on('click', '.rating', function(){
            var index = $(this).data('index');        
            $('#review_rate').val(index);
        });
        
        $(document).on('click', 'input[name=review_filters]', function(){
            var type = this.value;
            var post_type = '<?php echo @$type; ?>';
            var post_id = '<?php echo @$post_id; ?>';
            $.ajax({
               data:{type:type, post_type:post_type, post_id:post_id},
               url:'<?php echo base_url(); ?>home/get_filtered_reviews',
               type:'post',
               success:function(data){
                   $('#post_reviews').html(data);
               }
            });
        });
    </script>

        <script>
        $(document).ready(function(){
            
            
    $('.owl-carousel1').owlCarousel({
    loop:true,
    margin:10,
    nav:true,
    dots:false,
    autoplay:true,
    autoplayTimeout:3000,
    autoplayHoverPause:true,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:3
        },
        1000:{
            items:4
        }
    }
});




    $( ".custom-ul li a" ).click(function() {
        // var id = $(this).attr("id");
        $($(this) > "ul").show();
    });



            
            
        });
    </script>
    <script>
  $(function() {
    $(".rslides").responsiveSlides({

        auto: true,
        speed: 500, 
        timeout: 4000,
        nav: false,
        prevText: "Previous",
        nextText: "Next",


    });
  });
</script>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/front/js/validation.js"></script>


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
    <?php if($this->session->flashdata('error') == 'Please Login first!'){ ?>
    <script>$('#sign-up').modal('show');</script>
    <?php } ?>
    <?php $this->session->set_flashdata('error', ''); ?>
<?php } ?>
<script>



    $(document).ready(function(){

        $("#drop1").click(function(){
            $( "#drop2" ).slideToggle( "slow" );
        });

        $("#drop3").click(function(){
            $( "#drop4" ).slideToggle( "slow" );
        });
        $("#drop5").click(function(){
            $( "#drop6" ).slideToggle( "slow" );
        });

        $(".delete-favourite").click(function(){
            $( "#id_confrmdiv" ).css( "display","block" );
        });
        $("#id_falsebtn, #id_truebtn").click(function(){
            $( "#id_confrmdiv" ).css( "display","none" );
        });

    });
    
    function view_project_images(post_id){
        $("#project-image-id").val(post_id);
            $.ajax({
                url: "<?php echo base_url();?>home/get_project_images/",
                type:'post',
                data:{'post_id':post_id},
                success: function(result){
                    $("#project-images").html(result);
                     $('#global-modal').modal('show');
                }
            });
        }
        
        
        function view_project_gallery_images(post_id){
        $("#project-image-id").val(post_id);
            $.ajax({
                url: "<?php echo base_url();?>home/get_project_images/",
                type:'post',
                data:{'post_id':post_id},
                success: function(result){
                    $("#project-gallery-images").html(result);
                    $('#project-gallery-global-modal').modal('show');
                }
            });
        }
        
        function view_property_images(property_id){
            $("#property_post_id").val(property_id);
            $.ajax({
                url: "<?php echo base_url();?>home/get_property_images/",
                type:'post',
                data:{'property_id':property_id},
                success: function(result){
                    $("#property-images").html(result);
                    $('#property-image-modal').modal('show');
                }
            });
            
        }
        
        function view_property_gallery_images(property_id){
            $.ajax({
                url: "<?php echo base_url();?>home/get_property_images/",
                type:'post',
                data:{'property_id':property_id},
                success: function(result){
                    $("#property-gallery-images").html(result);
                    $('#property-gallery-image-modal').modal('show');
                }
            });
        }
</script>


<!--<script src="https://code.jquery.com/jquery-1.12.4.js"></script>-->

<script>
  $( function() {
    /*var availableTags = [
      "ActionScript",
      "AppleScript",
      "Asp",
      "BASIC",
      "C",
      "C++",
      "Clojure",
      "COBOL",
      "ColdFusion",
      "Erlang",
      "Fortran",
      "Groovy",
      "Haskell",
      "Java",
      "JavaScript",
      "Lisp",
      "Perl",
      "PHP",
      "Python",
      "Ruby",
      "Scala",
      "Scheme"
    ];*/
    var availableTags = [];
    $.ajax({
       url:'<?php echo base_url(); ?>home/get_location',
       success:function(data){
           set_locations(data);
       }
    });
    
   
    
    
    
  } );
  
   function load_states(state){
        $.ajax({
           url:'<?php echo base_url(); ?>home/get_states',
           type:'post',
           data:{'state':state},
           success:function(data){
               set_states(data);
           }
        });
    }
    
     function load_my_cities(state){
        $.ajax({
           url:'<?php echo base_url(); ?>home/get_cities_by_state',
               data:{'state':state},
           type:'post',
           success:function(data){
               
           }
        });
    }
    
    function load_cities(state){
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
    $search_city = document.getElementById('search_city');
    $.ajax({
       url:'<?php echo base_url(); ?>home/get_search_location',
       type:'post',
       data:{location:location, search_city:search_city.value},
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
    function set_states(data){
         availableTags = JSON.parse(data); 
             $( "#state" ).autocomplete({
          source: availableTags
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
$('.owl-carousel2').owlCarousel({
  items: 2,
  loop:true,
  margin:10,
  nav:true,
  dots:false,
  autoplay:true,
  autoplayTimeout:3000,
  autoplayHoverPause:true,
  responsive:{
      0:{
          items:1
      },
      600:{
          items:1
      },
      1000:{
          items:2
      }
  }
});
</script>

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
    $('input[type=radio][name=residential_commercial]').change(function() {
        if(this.value == 'residential'){
            $('#residential_property_type').css('display', 'block');
            $('#commercial_property_type').css('display', 'none');
        }else{
            $('#residential_property_type').css('display', 'none');
            $('#commercial_property_type').css('display', 'block');
        }
    });
    
    /*$( document ).ready(function() {
        $('#commercial_property_type_chosen').css('display', 'none');
    });*/
</script>


    <script>
        $("#res_com").on('change', function(){    
        var res_com = this.value;
        if(res_com == 'Residential'){
            $('#residential_types').fadeIn('slow');
            $('#commercial_types').css({'display':'none'});
            $('#residential-amenities').css({'display':'block'});
            $('#commercial-amenities').css({'display':'none'});
            $('input[name=residential]').removeAttr('checked');
            $('#Flat').attr('checked','checked');
        }else if(res_com == 'Commercial'){
            $('#commercial_types').fadeIn('slow');
            $('#residential_types').css({'display':'none'});
            $('#commercial-amenities').css({'display':'block'});
            $('#residential-amenities').css({'display':'none'});
            $('input[name=residential]').removeAttr('checked');
            $('#Office').attr('checked','checked');
        }
    });
    
    </script>
    

<script>
    var SITEURL = "<?php echo base_url() ?>";
    $('body').on('click', '.buy_now', function(e)
    {
        var totalAmount = $(this).attr("data-amount");
        var product_id =  $(this).attr("data-id");
        var options =
        {
            "key": "rzp_live_ECb3suWjQZnBcV",
            "amount": (totalAmount*100), // 2000 paise = INR 20
            "name": "whybroker.com",
            "description": "Subscription Purchase",
            "image": SITEURL + "assets/front/img/main-logo.webp",
            "handler": function (response)
            {
                $.ajax({
                url: SITEURL + 'Razorpay/razorPaySuccess',
                type: 'post',
                dataType: 'json',
                data: 
                {
                    razorpay_payment_id: response.razorpay_payment_id , totalAmount : totalAmount ,product_id : product_id,
                },
                success: function (msg)
                {
                    window.location.href = SITEURL + 'Razorpay/RazorThankYou';
                }
                });
            },
            "theme": {"color": "#528FF0"}
        };
        var rzp1 = new Razorpay(options);
        rzp1.open();
        e.preventDefault(); 
    });

</script>
</body>
</html>
