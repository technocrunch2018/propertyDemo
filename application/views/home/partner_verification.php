        
<!-- breadcrumbs Start -->
<section class="hero-wrap">
    <div class="container">
        <div class="row no-gutters slider-text align-items-end justify-content-center">
            <div class="col-md-9 ftco-animate pb-5 text-center">
                <h class="mb-3 bread">Verify Your Mobile And Email.</h>
                <p class="breadcrumbs"><span class="mr-2"><a href="<?php echo base_url();?>">Home <i class="fa fa-chevron-right"></i></a></span> <span>Verification <i class="fa fa-chevron-right"></i></span></p>
            </div>
        </div>
    </div>
</section>
<!-- breadcrumbs End -->


<!-- register form -->
<div class="modal-dialog pt-50" role="document">
    <div class="login-form">
        <div class="modal-content">
            <div class="tab-content">
                <div class="modal-body">
                    <?php if($user_data->mobile_verify != 1){?>
                    <div id="member598181" role="tabpanel" class="tab-pane active">
                        <div class="smart-wrap">
                            <div class="smart-forms smart-container">                         
                                <div class="spacer-b30">
                                    <div class="tagline"><span>Verify Mobile OTP</span></div>
                                </div>
                                <form class="frm-row" method="post" action="<?php echo base_url(); ?>home/verify_partner_sms_otp" id="lead_partner_registration_form" name="lead_partner_registration_form">
                                    <div class="colm colm12">
                                        <div class="section">
                                            <label class="field prepend-icon">
                                                <input type = "hidden" value = "<?php echo $user_data->user_id;?>" name = "userid">
                                                <input type="text" name="otp" class="gui-input" placeholder="Enter Mobile OTP">
                                                <span class="field-icon"><i class="fa fa-user"></i></span>  
                                            </label>
                                        </div>
                                        <div class="input-filed">
                                            <div class="input-button-loader">
                                                <input type="submit" class="cs-bgcolor" name="user-submit" value="Verify Mobile OTP">
                                            </div>
                                        </div>
                                    </div>
                                </form>                              
                            </div>
                        </div>
                    </div>
                    <?php }?>
                    <?php if($user_data->email_verify != 1){?>
                    <div id="member598181" role="tabpanel" class="tab-pane active">
                        <div class="smart-wrap">
                            <div class="smart-forms smart-container">                         
                                <div class="spacer-b30">
                                    <div class="tagline"><span>Verify Email OTP</span></div>
                                </div>
                                <form class="frm-row" method="post" action="<?php echo base_url(); ?>home/verify_partner_email_otp" id="lead_partner_registration_form" name="lead_partner_registration_form">
                                    <div class="colm colm12">
                                        <div class="section">
                                            <label class="field prepend-icon">
                                                <input type = "hidden" value = "<?php echo $user_data->user_id;?>" name = "userid">
                                                <input type="text" name="otp" class="gui-input" placeholder="Enter Email OTP">
                                                <span class="field-icon"><i class="fa fa-user"></i></span>  
                                            </label>
                                        </div>
                                        <div class="input-filed">
                                            <div class="input-button-loader">
                                                <input type="submit" class="cs-bgcolor" name="user-submit" value="Verify Email OTP">
                                            </div>
                                        </div>
                                    </div>
                                </form>                              
                            </div>
                        </div>
                    </div>
                    <?php }?>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- register form close -->