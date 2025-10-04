  <section class="hero-wrap">
         <div class="container">
            <div class="row no-gutters slider-text align-items-end justify-content-center">
               <div class="col-md-9 ftco-animate text-center pb-10">
                  <h class="mb-3 bread">Get in touch with us!</h>
                  <p class="breadcrumbs"><span class="mr-2"><a href="<?php echo base_url();?>">Home <i class="fa fa-chevron-right"></i></a></span> <span>Contact us <i class="fa fa-chevron-right"></i></span></p>
               </div>
            </div>
         </div>
      </section>
      <!-- breadcrumbs End -->


        <div class="main-section pt-60 pb-90">
            <div class="cs-rich-editor">
            <!-- Page Section -->
                <div class="container ">
                <!-- Container Start -->
                    <p class="text-center pb-40">We’re very approachable and would love to speak to you. Feel free to call, send us an<br> email or simply complete tn enquiry form.</p>
                    <div class="row">
                        
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 ">
                            <div class="contact-property">
                                <div class="element-title align-left ">
                                    <h2>Contact Info</h2>
                                </div>
                                <ul class="contact-info">
                                                        <li> <i style="color:#FFF !important" class="icon-map5"></i>
                                                            <div class="address-text"><span class="label-title">Address</span><span class="info-desc"><?php echo $frontpagedata->address1;?></span></div>
                                                        </li>
                                                        
                                                        <li> <i style="color:#FFF !important" class="fa fa-whatsapp"></i>
                                                            <div class="address-text"><span class="label-title">WhatsApp Us </span><span class="info-desc"><a target="_blank" href="https://wa.me/<?php echo $frontpagedata->mobile1;?>"><?php echo $frontpagedata->mobile1;?></a></span></div>
                                                        </li>
                                                        <li> <i style="color:#FFF !important" class="icon-envelope3"></i>
                                                            <div class="address-text"><span class="label-title">Email Address</span><span class="info-desc"><a target="_blank" href="mailto:<?php echo $frontpagedata->email1;?>"><?php echo $frontpagedata->email1;?></a></span></div>
                                                        </li>
                                                        <li> <i style="color:#FFF !important" class="icon-envelope3"></i>
                                                            <div class="address-text"><span class="label-title">Webiste</span><span class="info-desc">www.propertyfellows.in</span></div>
                                                        </li>
                                </ul>
                             </div>
                        </div>
                        
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 ">
                            <div class="element-title align-left">
                                    <h2>Quick Enquiry</h2>
                                </div>
                                                <div class="contact-form">
                                                    <div class="form-holder row" id="ul_frm2713">
                                                        <form action="<?php echo base_url(); ?>home/add_quick_enquiry" method="post" id="quick_enquiry_form" name="quick_enquiry_form">
                                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                <div class="field-holder"><strong>Name *</strong>
                                                                    <div class="has-icon"><i class="icon-user4"></i>
                                                                        <input class="field-input" name="contact_name" id="contact_name" type="text" placeholder="Enter Full Name">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                <div class="field-holder"><strong>Email *</strong>
                                                                    <div class="has-icon"><i class="icon-envelope3"></i>
                                                                        <input class="field-input" name="contact_email" id="contact_email" type="text" placeholder="Enter Email">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                <div class="field-holder"><strong>Phone Number </strong>
                                                                    <div class="has-icon"><i class="icon-phone4"></i>
                                                                        <input class="field-input" name="contact_number" id="contact_number" type="text" placeholder="Enter Phone">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                <div class="field-holder"><strong>Subject </strong>
                                                                    <div class="has-icon"><i class="icon-align-left2"></i>
                                                                        <input class="field-input" name="contact_subject" id="contact_subject" type="text" placeholder="Enter Subject">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                <div class="field-holder"><strong>Message </strong>
                                                                    <div class="has-icon has-textarea"><i class="icon-new-message"></i>
                                                                        <textarea name="contact_msg" id="contact_msg" placeholder="Text your message here..."></textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                <div class="field-holder contact-btn-holder">
                                                                    <input class="btn-holder bgcolor" type="submit" value="Send A message">
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
        
        
         <div class="cs-map-section">
                                                    <div class="maps">
                                                        <div class="cs-map">
                                                            <div class="cs-map-content">
                                                                <div class="mapouter">
                                                                    <div class="gmap_canvas" style="width:100%; height:350px;">
                                                                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3686.2679739927084!2d88.27245111495816!3d22.49412688522323!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3a027bc61f277b47%3A0x52d2225fd575ba36!2sGreenfield%20City!5e0!3m2!1sen!2sin!4v1615047518897!5m2!1sen!2sin" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                                                                        
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>