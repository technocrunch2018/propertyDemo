        
<!-- breadcrumbs Start -->
<section class="hero-wrap">
    <div class="container">
        <div class="row no-gutters slider-text align-items-end justify-content-center">
            <div class="col-md-9 ftco-animate pb-5 text-center">
                <h class="mb-3 bread">Verify Your Mobile Number.</h>
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
                    <div id="member598181" role="tabpanel" class="tab-pane active">
                        <div class="smart-wrap">
                            <div class="smart-forms smart-container">                         
                                <div class="spacer-b30">
                                    <div class="tagline"><span>Verify Mobile OTP</span></div>
                                </div>
                                <form class="frm-row" method="post" action="<?php echo base_url(); ?>home/verify_sms_otp" id="lead_partner_registration_form" name="lead_partner_registration_form">
                                    <div class="colm colm12">
                                        <div class="section">
                                            <label class="field prepend-icon">
                                                <input type = "hidden" value = "<?php echo $user_data->user_id;?>" name = "userid">
                                                <input type="text" name="otp" class="gui-input" placeholder="Please enter mobile OTP here ...">
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
                </div>
            </div>
        </div>
    </div>
</div>

<!-- register form close -->