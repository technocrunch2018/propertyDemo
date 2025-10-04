<!-- breadcrumbs Start -->
<section class="hero-wrap">
    <div class="container">
        <div class="row no-gutters slider-text align-items-end justify-content-center">
            <div class="col-md-9 ftco-animate pb-5 text-center">
                <h class="mb-3 bread">Register with us.</h>
                <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home <i class="fa fa-chevron-right"></i></a></span> <span>Register <i class="fa fa-chevron-right"></i></span></p>
            </div>
        </div>
    </div>
</section>
<!-- breadcrumbs End -->




<!-- register form -->
<div class="modal-dialog pt-50" role="document">
    <div class="login-form">
        <div class="modal-content">
           
                
                <div class="modal-body">
                        <div class="cs-login-pbox-98956 login-form-id-98956">
                                <div class="smart-wrap">
                                    <form action="<?php echo base_url('home/check_user_otp');?>" method="post">
                            
                                        <div class="spacer-b30">
                                            <div class="tagline">
                                                <span>Verify OTP</span>
                                            </div><!-- .tagline -->
                                        </div>
                                
                                        <div class="frm-row">
                                        
                                            <div class="colm colm12">
                                                <div class="section">
                                                    <input type="email" name="email" id="email" class="input-form" placeholder="Your Email"
                                                    required="required" value="<?php echo $email; ?>" />
                                                </div>
                                            </div>
                                            
                                            <div class="colm colm12">
                                                <div class="section">
                                                    <label class="field prepend-icon">
                                                        <input type="text" name="otp" id="otp" class="input-form" placeholder="Your Password"
                                                        required="required" />
                                                    </label>
                                                </div><!-- end section -->
                                            </div>
                                            <div class="colm colm12">    
                                                <div class="input-filed">
                                                    <div class="input-button-loader">
                                                        <input type="submit" class="cs-bgcolor" name="user-submit" value="Verify">
                                                    </div>
                                                </div>
                                            </div><!-- end .colm12 section -->
                                            <div class="colm colm12">
                                                <div class="login-detail">
                                                    <h4>Did'nt get OTP?</h4>
                                                    <a href="<?php echo base_url('home/resend_otp/lead_partner/'.$email); ?>">Resend OTP</a>
                                                </div>
                                            </div>
                                        
                                        </div><!-- end .frm-row section -->                                      
                                    </form><!-- end .smart-forms section -->
                                </div><!-- end .smart-wrap section -->
                        </div>
                </div>
                
        </div>
    </div>
</div>

<!-- register form close -->