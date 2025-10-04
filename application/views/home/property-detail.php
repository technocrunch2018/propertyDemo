        <div class="wrapper wrapper-full_width">
            <!-- Side Menu Start -->
            <div id="overlay"></div>

            <!-- Main Content Section -->
            <div class="main-section">
                <div class="page-section property-detail-view1-section" style="margin: 72px 0 41px 0;">
                    <div class="property-detail">
                        <div class="container">
                            <div class="row">
                                <div class="page-content col-lg-8 col-md-8 col-sm-12 col-xs-12">
                                    <div class="list-detail-options">
                                        <div class="title-area">
                                            <div class="price-holder">
                                                <span class="property-price">
                                                    <span class="new-price text-color">Rs. <?php if(!empty($type)){ echo $type->rentPerMonth; } ?>
                                                        <span class="prop-price-type">
                                                            <span class="price-type">Onword</span>
                                                        </span>
                                                    </span>
                                                </span>
                                            </div>
                                            <div class="claims-holder">
                                                <div class="claim-property">
                                                    <div class="modal fade modal-form" id="user-claim-property" tabindex="-1" role="dialog">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-body">
                                                                    <form id="wp_rem_claim_property">
                                                                        <div class="row">
                                                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                                <div class="field-holder">
                                                                                    <i class="icon-user2"></i>
                                                                                    <input type="text" placeholder="Name *" class="form-control wp-rem-dev-req-field">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                                <div class="field-holder">
                                                                                    <i class="icon-mail"></i>
                                                                                    <input type="text" placeholder="Email Address *" class="form-control wp-rem-dev-req-field wp-rem-email-field" name="user-email">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                                <div class="field-holder">
                                                                                    <i class="icon-message"></i>
                                                                                    <textarea placeholder="Reason *" class="wp-rem-dev-req-field" rows="5" cols="30"></textarea> </div>
                                                                            </div>
                                                                            <div class="col-md-12 recaptcha-reload">
                                                                                <div class="g-recaptcha" style="width:304px; height:78px;">
                                                                                    <iframe style=" border: 0; height: 100%; width: 100%; margin: 0;" src="https://www.google.com/recaptcha/api2/anchor?ar=1&amp;k=6LfzSxIUAAAAADmaB7gQqIXZ34ZdBgw5DthD79nx&amp;co=aHR0cDovL2hvbWV2aWxsYXMuY2hpbXBncm91cC5jb206ODA.&amp;hl=en&amp;v=IU7gZ7o6RDdDE6U4Y1YJJWnN&amp;theme=light&amp;size=normal&amp;cb=3h5jo33egtl6"></iframe>
                                                                                </div>
                                                                                <a class="recaptcha-reload-a" href="#"><i class="icon-refresh2"></i> Reload</a>
                                                                            </div>
                                                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                                <div class="field-holder claim_term_policy">
                                                                                    <div class="check-box-remind">
                                                                                        <input type="checkbox" id="claim_term_policy_5910" name="term_policy" class="input-field">
                                                                                        <label for="claim_term_policy_5910">By clicking you confirm that you accept the <a href="#"> Terms &amp; Conditions </a> and
                                                                                            <a href="#"> Privacy Policy </a></label>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                                <div class="field-holder claim-request-holder input-button-loader">
                                                                                    <input type="submit" class="bgcolor" name="submit" value="Send">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="flag-property">
                                                    <div class="modal fade modal-form" id="user-flag-property" tabindex="-1" role="dialog">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span> </button>
                                                                    <h3 class="modal-title" id="flagModalLabel">Flag Property</h3>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form>
                                                                        <div class="row">
                                                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                                <div class="field-holder">
                                                                                    <i class="icon-user2"></i>
                                                                                    <input type="text" placeholder="Name *" class="form-control wp-rem-dev-req-field" name="wp_rem_flag_property_user_name">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                                <div class="field-holder">
                                                                                    <i class="icon-mail"></i>
                                                                                    <input type="text" placeholder="Email Address *" class="form-control wp-rem-dev-req-field wp-rem-email-field" name="wp_rem_flag_property_user_email">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                                <div class="field-holder">
                                                                                    <i class="icon-message"></i>
                                                                                    <textarea placeholder="Reason *" class="wp-rem-dev-req-field" rows="5" cols="30" name="wp_rem_flag_property_reason">
                                                                                    </textarea>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-12 recaptcha-reload" id="recaptcha_flag_div">
                                                                                <div class="g-recaptcha" id="recaptcha_flag">
                                                                                    <div class="g-recaptcha" style="width:304px; height:78px;">
                                                                                        <iframe style=" border: 0; height: 100%; width: 100%; margin: 0;" src="https://www.google.com/recaptcha/api2/anchor?ar=1&amp;k=6LfzSxIUAAAAADmaB7gQqIXZ34ZdBgw5DthD79nx&amp;co=aHR0cDovL2hvbWV2aWxsYXMuY2hpbXBncm91cC5jb206ODA.&amp;hl=en&amp;v=IU7gZ7o6RDdDE6U4Y1YJJWnN&amp;theme=light&amp;size=normal&amp;cb=3h5jo33egtl6"></iframe>
                                                                                    </div>
                                                                                </div> <a class="recaptcha-reload-a" href="#"><i class="icon-refresh2"></i> Reload</a>
                                                                            </div>
                                                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                                <div class="field-holder flag_term_policy">
                                                                                    <div class="check-box-remind">
                                                                                        <input type="checkbox" id="flag_term_policy_5910" name="term_policy" class="input-field">
                                                                                        <label for="flag_term_policy_5910">By clicking you confirm that you accept the <a href="#"> Terms &amp; Conditions </a> and <a href="#"> Privacy Policy </a></label>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                                <div class="field-holder flag-request-holder input-button-loader">
                                                                                    <input type="submit" class="bgcolor" name="submit" value="Send">
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
                                            <h2><?php if(!empty($property)){ echo $property->complex_society_building; } ?></h2>
                                            <address>
                                                <span><i class="icon-location-pin2"></i><?php if(!empty($property)){ echo $property->address; } ?>, <?php if(!empty($property)){ echo $property->city; } ?> - <?php if(!empty($property)){ echo $property->pincode; } ?></span>
                                                <span><i class="icon-globe3"></i><a href="#">www.teamtechnocrunch.com</a></span> <span><i class="icon-phone4"></i>
                                                    <a href="#">+919049454815</a></span>
                                            </address>
                                            <div class="property-data">
                                                <ul>
                                                    <li class="featured-property">
                                                        <span class="bgcolor">Featured</span>
                                                    </li>
                                                    <li class="prop-type"><i class="icon-home3"></i><a href="#">For <?php if(!empty($type)){ echo $type->rent_sell; } ?></a> in </li>
                                                    <li class="prop-category"><a href="#"><?php if(!empty($type)){ echo $type->residential; } ?></a></li>
                                                    <li class="prop-category">(<a href="#"><?php if(!empty($type)){ echo $type->res_com; } ?></a>)</li>
                                                    <li class="prop-favourite mr-10">
                                                        <div class="like-btn">
                                                            <a href="#" class="favourite wp-rem-open-signin-tab">
                                                                <i class="icon-heart5"></i>Favourite </a>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="enquire-holder">
                                            <a class="enquire-btn wp-rem-open-signin-tab" href="#"><i class="icon- icon-comment"></i>Enquiry now</a>
                                            <a class="bgcolor enquire-btn wp-rem-open-signin-tab" href="#"><i class="icon- icon-calendar-check-o"></i>Request Viewing</a>
                                        </div>
                                        <!-- Modal -->
                                        <div class="modal modal-form fade" id="enquiry-modal" tabindex="-1" role="dialog">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                                        <h4 class="modal-title" id="enquiry-myModalLabel">Request Enquiry</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form id="frm_property45531" class="enquiry-request-form">
                                                            <div class="row">
                                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                    <div class="field-holder">
                                                                        <i class="icon-user2"></i>
                                                                        <input type="text" placeholder=" Your Name *" class="input-field wp-rem-dev-req-field" name="user_name">
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                    <div class="field-holder">
                                                                        <i class="icon-phone4"></i>
                                                                        <input type="text" class="input-field" name="user_phone"> </div>
                                                                </div>
                                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                    <div class="field-holder">
                                                                        <i class="icon-mail"></i>
                                                                        <input type="text" placeholder=" Your Email Address *" class="input-field wp-rem-dev-req-field wp-rem-email-field" name="user_email">
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                    <div class="field-holder">
                                                                        <i class="icon-message"></i>
                                                                        <textarea placeholder=" Message * *" class="textarea-field wp-rem-dev-req-field" rows="5" cols="30" name="user_message"></textarea> </div>
                                                                </div>
                                                                <div class="col-md-12 recaptcha-reload">
                                                                    <div class="g-recaptcha" id="recaptcha_enquery">
                                                                        <div style="width:304px; height:78px;">
                                                                            <iframe style=" border: 0; height: 100%; width: 100%; margin: 0;" src="https://www.google.com/recaptcha/api2/anchor?ar=1&amp;k=6LfzSxIUAAAAADmaB7gQqIXZ34ZdBgw5DthD79nx&amp;co=aHR0cDovL2hvbWV2aWxsYXMuY2hpbXBncm91cC5jb206ODA.&amp;hl=en&amp;v=IU7gZ7o6RDdDE6U4Y1YJJWnN&amp;theme=light&amp;size=normal&amp;cb=3h5jo33egtl6"></iframe>
                                                                        </div>
                                                                    </div> 
                                                                    <a class="recaptcha-reload-a" href="#"><i class="icon-refresh2"></i> Reload</a>
                                                                </div>
                                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                    <div class="field-holder">
                                                                        <div class="check-box-remind">
                                                                            <input type="checkbox" id="term_policy" name="term_policy" class="input-field">
                                                                            <label for="term_policy">By clicking you confirm that you accept the <a href="#"> Terms &amp; Conditions </a> and <a href="#"> Privacy Policy </a>
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                    <div class="field-holder enquiry-request-holder input-button-loader">
                                                                        <input type="submit" class="bgcolor" name="message_submit" value="Send message"> </div>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal modal-form fade" id="arrange-modal" tabindex="-1" role="dialog" aria-labelledby="arrange-myModalLabel">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                                        <h4 class="modal-title" id="arrange-myModalLabel">Request Viewing</h4>
                                                        <p>Physical Arrange viewings is always been attractive to property clients. Just fill out the form to arrange visualizations around our properties.</p>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="booking-info-sec">
                                                            <form class="viewing-request-form" name="form_arrange_view">
                                                                <div class="row">
                                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                        <div class="field-holder has-icon">
                                                                            <div class="date-sec">
                                                                                <i class="icon-calendar5"></i>
                                                                                <i class="icon-keyboard_arrow_down"> </i>
                                                                                <input type="text" placeholder="Select Schedule" class="form-control booking-date wp-rem-required-field hasDatepicker" id="date-of-booking" name="arrange_view_date">
                                                                                <div id="datepicker_1468" class="reservaion-calendar hasDatepicker"></div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                        <div class="field-holder has-icon">
                                                                            <i class="icon-clock2"></i>
                                                                            <select class="chosen-select-no-single">
                                                                                <option value="09:30 pm">09:30 PM</option>
                                                                                <option value="09:45 pm">09:45 PM</option>
                                                                                <option value="10:00 pm">10:00 PM</option>
                                                                                <option value="10:15 pm">10:15 PM</option>
                                                                                <option value="10:30 pm">10:30 PM</option>
                                                                                <option value="10:45 pm">10:45 PM</option>
                                                                                <option value="11:00 pm">11:00 PM</option>
                                                                                <option value="11:15 pm">11:15 PM</option>
                                                                                <option value="11:30 pm">11:30 PM</option>
                                                                                <option value="11:45 pm">11:45 PM</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                        <div class="field-holder">
                                                                            <i class="icon-user2"></i>
                                                                            <input type="text" placeholder=" Your Name *" class="input-field wp-rem-dev-req-field" name="arrange_user_name">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                        <div class="field-holder">
                                                                            <i class="icon-message"></i>
                                                                            <textarea placeholder=" Message" class="textarea-field wp-rem-dev-req-field" rows="5" cols="30" id="wp_rem_arrange_user_message" name="arrange_user_message"></textarea>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12 recaptcha-reload">
                                                                        <div class="g-recaptcha" style="width:304px; height:78px;">
                                                                            <iframe style=" border: 0; height: 100%; width: 100%; margin: 0;" src="https://www.google.com/recaptcha/api2/anchor?ar=1&amp;k=6LfzSxIUAAAAADmaB7gQqIXZ34ZdBgw5DthD79nx&amp;co=aHR0cDovL2hvbWV2aWxsYXMuY2hpbXBncm91cC5jb206ODA.&amp;hl=en&amp;v=IU7gZ7o6RDdDE6U4Y1YJJWnN&amp;theme=light&amp;size=normal&amp;cb=3h5jo33egtl6"></iframe>
                                                                        </div>
                                                                        <a class="recaptcha-reload-a" href="#"><i class="icon-refresh2"></i> Reload</a>
                                                                    </div>
                                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                        <div class="field-holder">
                                                                            <div class="check-box-remind">
                                                                                <div class="check-box-remind">
                                                                                    <input type="checkbox" id="arrange_viewing_term_policy" name="term_policy" class="input-field">
                                                                                    <label for="arrange_viewing_term_policy">By clicking you confirm that you accept the <a href="#"> Terms &amp; Conditions </a> and <a href="#"> Privacy Policy </a>
                                                                                    </label>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                        <div class="field-holder viewing-request-holder input-button-loader">
                                                                            <input type="submit" class="bgcolor" name="submit_message_arrange" value="Send message">
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
                                    <div class="main-post">
                                        <div id="slider" class="property-flexslider flexslider">
                                            <div class="flex-viewport">
                                                <ul class="slides">
                                                    <li class="flex-active-slide">
                                                        <img src="<?php echo base_url();?>assets/front/extra-images/property-grid-image-2.webp" alt="#">
                                                    </li>
                                                    <li>
                                                        <img src="<?php echo base_url();?>assets/front/extra-images/property-grid-image-2.webp" alt="#">
                                                    </li>
                                                    <li>
                                                        <img src="<?php echo base_url();?>assets/front/extra-images/property-grid-image-2.webp" alt="#">
                                                    </li>
                                                    <li>
                                                        <img src="<?php echo base_url();?>assets/front/extra-images/property-grid-image-2.webp" alt="#">
                                                    </li>
                                                    <li>
                                                        <img src="<?php echo base_url();?>assets/front/extra-images/property-grid-image-2.webp" alt="#">
                                                    </li>
                                                </ul>
                                            </div>
                                            <ul class="flex-direction-nav">
                                                <li class="flex-nav-prev"><a class="flex-prev flex-disabled" href="#" tabindex="-1">Previous</a></li>
                                                <li class="flex-nav-next"><a class="flex-next" href="#">Next</a></li>
                                            </ul>
                                        </div>
                                        <div id="carousel" class="property-carousel-flexslider flexslider">
                                            <div class="flex-viewport">
                                                <ul class="slides">
                                                    <li class="flex-active-slide">
                                                        <img src="<?php echo base_url();?>assets/front/extra-images/property-grid-image-2.webp" alt="#"> </li>
                                                    <li>
                                                        <img src="<?php echo base_url();?>assets/front/extra-images/property-grid-image-2.webp" alt="#"> </li>
                                                    <li>
                                                        <img src="<?php echo base_url();?>assets/front/assets/extra-images/property-grid-image-2.webp" alt="#"> </li>
                                                    <li>
                                                        <img src="<?php echo base_url();?>assets/front/assets/extra-images/property-grid-image-2.webp" alt="#"> </li>
                                                    <li>
                                                        <img src="<?php echo base_url();?>assets/front/assets/extra-images/property-grid-image-2.webp" alt="#"> </li>
                                                    <li>
                                                        <img src="<?php echo base_url();?>assets/front/assets/extra-images/property-grid-image-2.webp" alt="#"> </li>
                                                    <li>
                                                        <img src="<?php echo base_url();?>assets/front/assets/extra-images/property-grid-image-2.webp" alt="#"> </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <ul class="categories-holder">
                                        <li>
                                            <i class="icon-bed2"></i>
                                            <span class="field-label">Rooms</span>: <span class="field-value">
                                                <?php if($type->residential == 'DuplexFlat'){
                                                        echo $duplex_flat_details->upperfloorno;
                                                    }elseif($type->residential == 'PentHouse'){
                                                        echo $pent_house_details->pent_room;
                                                    }elseif($type->residential == 'Factory'){
                                                        echo $factory_details->factory_numberofcabin;
                                                    }elseif($type->residential == 'Flat'){
                                                       echo  $flat_details->flat_Room;
                                                    }elseif($type->residential == 'HouseorBanglow'){
                                                        echo $house_details->house_Room;
                                                    }elseif($type->residential == 'Land'){
                                                        // $land_details->upperfloorno;
                                                    }elseif($type->residential == 'Office'){
                                                        echo $office_details->officeNumberofCabin;
                                                        // echo 0;
                                                    }elseif($type->residential == 'ShopOrShowroom'){
                                                        // $shop_details->upperfloorno;
                                                    }elseif($type->residential == 'Warehouse'){
                                                        echo $warehouse_details->warehouseNumberofCabin;
                                                    }
                                                ?>
                                            </span> </li>
                                        <li>
                                            <i class="fa fa-bath"></i>
                                            <span class="field-label">Bathrooms</span>: <span class="field-value">
                                                <?php if($type->residential == 'DuplexFlat'){
                                                        echo $duplex_flat_details->bathroom;
                                                    }elseif($type->residential == 'PentHouse'){
                                                        echo $pent_house_details->pent_bathroom;
                                                    }elseif($type->residential == 'Factory'){
                                                        echo $factory_details->factory_Bathroom;
                                                    }elseif($type->residential == 'Flat'){
                                                       echo  $flat_details->flat_Bathroom;
                                                    }elseif($type->residential == 'HouseorBanglow'){
                                                        echo $house_details->house_Bathroom;
                                                    }elseif($type->residential == 'Land'){
                                                        // $land_details->upperfloorno;
                                                    }elseif($type->residential == 'Office'){
                                                        echo $office_details->officeBathroom;
                                                        // echo 0;
                                                    }elseif($type->residential == 'ShopOrShowroom'){
                                                        $shop_details->shopBathroom;
                                                    }elseif($type->residential == 'Warehouse'){
                                                        echo $warehouse_details->warehouseBathroom;
                                                    }
                                                ?>
                                            </span> </li>
                                        <li>
                                            <i class="icon-directions_car"></i>
                                            <span class="field-label">Balcony</span>: <span class="field-value">
                                                <?php if($type->residential == 'DuplexFlat'){
                                                        echo $duplex_flat_details->balcony;
                                                    }elseif($type->residential == 'PentHouse'){
                                                        echo $pent_house_details->pent_balcony;
                                                    }elseif($type->residential == 'Factory'){
                                                        // echo $factory_details->factory_Bathroom;
                                                    }elseif($type->residential == 'Flat'){
                                                       echo  $flat_details->flat_Balcony;
                                                    }elseif($type->residential == 'HouseorBanglow'){
                                                        echo $house_details->house_Balcony;
                                                    }elseif($type->residential == 'Land'){
                                                        // $land_details->upperfloorno;
                                                    }elseif($type->residential == 'Office'){
                                                        // echo $office_details->officeBathroom;
                                                    }elseif($type->residential == 'ShopOrShowroom'){
                                                        // $shop_details->shopBathroom;
                                                    }elseif($type->residential == 'Warehouse'){
                                                        // echo $warehouse_details->warehouseBathroom;
                                                    }
                                                ?>
                                            </span> </li>
                                        <li>
                                            <i class="icon-transform"></i>
                                            <span class="field-label">
                                                <?php if($type->residential == 'DuplexFlat'){
                                                        echo $duplex_flat_details->super_buildup_area_unit;
                                                    }elseif($type->residential == 'PentHouse'){
                                                        echo $pent_house_details->pent_super_buildup_area_Unit;
                                                    }elseif($type->residential == 'Factory'){
                                                        echo $factory_details->factory_super_buildup_area_unit;
                                                    }elseif($type->residential == 'Flat'){
                                                       echo  $flat_details->flat_SuperBuildupAreaUnit;
                                                    }elseif($type->residential == 'HouseorBanglow'){
                                                        echo $house_details->house_SuperBuildupArea;
                                                    }elseif($type->residential == 'Land'){
                                                        $land_details->land_SuperBuildupArea_Unit;
                                                    }elseif($type->residential == 'Office'){
                                                        echo $office_details->officeSuperBuildupAreaUnit;
                                                    }elseif($type->residential == 'ShopOrShowroom'){
                                                        $shop_details->shopSuperBuildupAreaUnit;
                                                    }elseif($type->residential == 'Warehouse'){
                                                        echo $warehouse_details->warehouseSuperBuildupAreaUnit;
                                                    }
                                                ?>
                                            </span>: <span class="field-value">
                                            <?php if($type->residential == 'DuplexFlat'){
                                                        echo $duplex_flat_details->super_buildup_area;
                                                    }elseif($type->residential == 'PentHouse'){
                                                        echo $pent_house_details->pent_super_buildup_area;
                                                    }elseif($type->residential == 'Factory'){
                                                        echo $factory_details->factory_super_buildup_area;
                                                    }elseif($type->residential == 'Flat'){
                                                       echo  $flat_details->flat_SuperBuildupArea;
                                                    }elseif($type->residential == 'HouseorBanglow'){
                                                        echo $house_details->house_SuperBuildupArea;
                                                    }elseif($type->residential == 'Land'){
                                                        $land_details->LandArea;
                                                    }elseif($type->residential == 'Office'){
                                                        echo $office_details->officeSuperBuildupArea;
                                                    }elseif($type->residential == 'ShopOrShowroom'){
                                                        $shop_details->shopSuperBuildupArea;
                                                    }elseif($type->residential == 'Warehouse'){
                                                        echo $warehouse_details->warehouseSuperBuildupArea;
                                                    }
                                                ?>
                                            </span> </li>
                                        <li>
                                            <i class="fa fa-cutlery"></i>
                                            <span class="field-label">Kitchen</span>: <span class="field-value">
                                            <?php if($type->residential == 'DuplexFlat'){
                                                        echo $duplex_flat_details->kitchen;
                                                    }elseif($type->residential == 'PentHouse'){
                                                        echo $pent_house_details->pent_kitchen;
                                                    }elseif($type->residential == 'Factory'){
                                                        // echo $factory_details->factory_super_buildup_area;
                                                    }elseif($type->residential == 'Flat'){
                                                       echo  $flat_details->flat_Kitchen;
                                                    }elseif($type->residential == 'HouseorBanglow'){
                                                        echo $house_details->house_Kitchen;
                                                    }elseif($type->residential == 'Land'){
                                                        // $land_details->LandArea;
                                                    }elseif($type->residential == 'Office'){
                                                        // echo $office_details->officeSuperBuildupArea;
                                                    }elseif($type->residential == 'ShopOrShowroom'){
                                                        // $shop_details->shopSuperBuildupArea;
                                                    }elseif($type->residential == 'Warehouse'){
                                                        // echo $warehouse_details->warehouseSuperBuildupArea;
                                                    }
                                                ?>
                                            </span> </li>
                                        </li>
                                    </ul>
                                    <div id="property-detail" class="description-holder">
                                        <div class="property-dsec">
                                            <div class="element-title">
                                                <h3>PROPERTY DESCRIPTION</h3>
                                            </div>
                                            <p>
                                                <?php if(!empty($amenities)){ ?>
                                                <?php if($type->res_com == 'Residential'){
                                                        echo $amenities->comment1;
                                                    }else{
                                                        echo $amenities->comment;
                                                    }
                                                ?>
                                                <?php } ?>
                                            </p>
                                        </div>
                                    </div>
                                    <div id="features" class="category-holder">
                                        <div class="element-title">
                                            <h3>PROPERTY TYPE</h3>
                                        </div>
                                        <style>
                                            .category-list li i {
                                                color: #ed6950;
                                                text-align: center;
                                            }
                                        </style>
                                        <ul class="category-list">
                                            <li class="col-lg-6 col-md-6 col-sm-6 col-xs-12"> <strong><i class="fa fa-dot-circle-o"></i>Type: </strong> <?php if(!empty($type)){ echo $type->res_com; } ?></li>
                                            <li class="col-lg-6 col-md-6 col-sm-6 col-xs-12"> <strong><i class="fa fa-dot-circle-o"></i>Property Type: </strong> <?php if(!empty($type)){ echo $type->residential; } ?></li>
                                            <li class="col-lg-6 col-md-6 col-sm-6 col-xs-12"> <strong><i class="fa fa-dot-circle-o"></i>Size Starting From: </strong>
                                                <?php if($type->residential == 'DuplexFlat'){
                                                        echo $duplex_flat_details->buildup_area.' '.$duplex_flat_details->buildup_area_Unit;
                                                    }elseif($type->residential == 'PentHouse'){
                                                        echo $pent_house_details->pent_buildup_area.' '.$pent_house_details->pent_buildup_area_Unit;
                                                    }elseif($type->residential == 'Factory'){
                                                        echo $factory_details->factory_BuildupArea.' '.$factory_details->factory_BuildupAreaUnit;
                                                    }elseif($type->residential == 'Flat'){
                                                       echo  $flat_details->flat_BuildupArea.' '.$flat_details->flat_BuildupArea_Unit;
                                                    }elseif($type->residential == 'HouseorBanglow'){
                                                        echo $house_details->house_BuildupArea.' '.$house_details->house_BuildupAreaUnit;
                                                    }elseif($type->residential == 'Land'){
                                                       echo $land_details->landCoveredArea.' '.$land_details->landCoveredAreaUnit;
                                                    }elseif($type->residential == 'Office'){
                                                        echo $office_details->officeBuildupArea.' '.$office_details->officeBuildupAreaUnit;
                                                    }elseif($type->residential == 'ShopOrShowroom'){
                                                        echo $shop_details->shopBuildupArea.' '.$shop_details->shopBuildupAreaUnit;
                                                    }elseif($type->residential == 'Warehouse'){
                                                        echo $warehouse_details->warehouseBuildupArea.' '.$warehouse_details->warehouseBuildupAreaUnit;
                                                    }
                                                ?>
                                            </li>
                                            <li class="col-lg-6 col-md-6 col-sm-6 col-xs-12"> <strong><i class="fa fa-dot-circle-o"></i>Size Upto: </strong>
                                            <?php if($type->residential == 'DuplexFlat'){
                                                        echo $duplex_flat_details->super_buildup_area.' '.$duplex_flat_details->super_buildup_area_unit;
                                                    }elseif($type->residential == 'PentHouse'){
                                                        echo $pent_house_details->pent_super_buildup_area.' '.$pent_house_details->pent_super_buildup_area_Unit;
                                                    }elseif($type->residential == 'Factory'){
                                                        echo $factory_details->factory_super_buildup_area.' '.$factory_details->factory_super_buildup_area_unit;
                                                    }elseif($type->residential == 'Flat'){
                                                       echo  $flat_details->flat_SuperBuildupArea.' '.$flat_details->flat_SuperBuildupAreaUnit;
                                                    }elseif($type->residential == 'HouseorBanglow'){
                                                        echo $house_details->house_SuperBuildupArea.' '.$house_details->house_SuperBuildupArea_Unit;
                                                    }elseif($type->residential == 'Land'){
                                                       echo $land_details->LandArea.' '.$land_details->land_SuperBuildupArea_Unit;
                                                    }elseif($type->residential == 'Office'){
                                                        echo $office_details->officeSuperBuildupArea.' '.$office_details->officeSuperBuildupAreaUnit;
                                                    }elseif($type->residential == 'ShopOrShowroom'){
                                                        echo $shop_details->shopSuperBuildupArea.' '.$shop_details->shopSuperBuildupAreaUnit;
                                                    }elseif($type->residential == 'Warehouse'){
                                                        echo $warehouse_details->warehouseSuperBuildupArea.' '.$warehouse_details->warehouseSuperBuildupAreaUnit;
                                                    }
                                                ?>
                                            </li>
                                            <li class="col-lg-2 col-md-2 col-sm-6 col-xs-12"> <strong><i class="fa fa-dot-circle-o"></i>BHK: </strong>01<span></li>
                                            <li class="col-lg-2 col-md-2 col-sm-6 col-xs-12" style="text-align: center; margin: 0;">TO</li>
                                            <li class="col-lg-2 col-md-2 col-sm-6 col-xs-12"> <strong><i class="fa fa-dot-circle-o"></i>BHK: </strong>04<span></li>
                                            <li class="col-lg-12 col-md-12 col-sm-12 col-xs-12"> <strong><i class="fa fa-dot-circle-o"></i>Price: </strong>
                                            Rs. <?php echo $type->rentPerMonth; ?><span>Onward</span></li>
                                        </ul>
                                    </div>
                                    <div id="features" class="category-holder">
                                        <div class="element-title">
                                            <h3>PROPERTY DETAILS</h3>
                                        </div>
                                        <ul class="category-list">
                                            <li class="col-lg-6 col-md-6 col-sm-6 col-xs-12"> <i class="fa fa-dot-circle-o"></i>This Area Only For Post Property</li>
                                        </ul>
                                    </div>
                                    <div id="features" class="category-holder">
                                        <div class="element-title">
                                            <h3>Amenities</h3>
                                        </div>
                                        <ul class="category-list">
                                            <?php if(!empty($amenities)){ if($amenities->PowerBackup == 1){ ?>
                                            <li class="col-lg-4 col-md-4 col-sm-6 col-xs-12"> <i class="fa fa-battery-half"></i>Power Backup</li>
                                            <?php } } ?>
                                            <?php if(!empty($amenities)){ if($amenities->ServiveLift == 1){ ?>
                                            <li class="col-lg-4 col-md-4 col-sm-6 col-xs-12"> <i class="fa fa-sort-numeric-desc"></i>Servive Lift</li>
                                            <?php } } ?>
                                            <?php if(!empty($amenities)){ if($amenities->BanquetHall == 1){ ?>
                                            <li class="col-lg-4 col-md-4 col-sm-6 col-xs-12"> <i class="fa fa-building"></i>Banquet Hall</li>
                                            <?php } } ?>
                                            <?php if(!empty($amenities)){ if($amenities->GYM == 1){ ?>
                                            <li class="col-lg-4 col-md-4 col-sm-6 col-xs-12"> <i class="icon-lock4"></i>GYM</li>
                                            <?php } } ?>
                                            <?php if(!empty($amenities)){ if($amenities->VisitorParking == 1){ ?>
                                            <li class="col-lg-4 col-md-4 col-sm-6 col-xs-12"> <i class="icon-parking"></i>Visitor Parking</li>
                                            <?php } } ?>
                                            <?php if(!empty($amenities)){ if($amenities->Intercom == 1){ ?>
                                            <li class="col-lg-4 col-md-4 col-sm-6 col-xs-12"> <i class="icon-location_city"></i>Intercom</li>
                                            <?php } } ?>
                                            <?php if(!empty($amenities)){ if($amenities->CCTV == 1){ ?>
                                            <li class="col-lg-4 col-md-4 col-sm-6 col-xs-12"> <i class="fa fa-video-camera"></i>CCTV</li>
                                            <?php } } ?>
                                            <?php if(!empty($amenities)){ if($amenities->SwimmingPool == 1){ ?>
                                            <li class="col-lg-4 col-md-4 col-sm-6 col-xs-12"> <i class="fa fa-shower"></i>Swimming Pool</li>
                                            <?php } } ?>
                                            <?php if(!empty($amenities)){ if($amenities->CloubHouse == 1){ ?>
                                            <li class="col-lg-4 col-md-4 col-sm-6 col-xs-12"> <i class="fa fa-home"></i>Cloub House</li>
                                            <?php } } ?>
                                            <?php if(!empty($amenities)){ if($amenities->SarvantRoom == 1){ ?>
                                            <li class="col-lg-4 col-md-4 col-sm-6 col-xs-12"> <i class="icon-directions_railway"></i>Sarvant Room</li>
                                            <?php } } ?>
                                            <?php if(!empty($amenities)){ if($amenities->Lift == 1){ ?>
                                            <li class="col-lg-4 col-md-4 col-sm-6 col-xs-12"> <i class="fa fa-list-ol"></i>Lift</li>
                                            <?php } } ?>
                                            <?php if(!empty($amenities)){ if($amenities->WIFI == 1){ ?>
                                            <li class="col-lg-4 col-md-4 col-sm-6 col-xs-12"> <i class="fa fa-wifi"></i>WIFi</li>
                                            <?php } } ?>
                                            <?php if(!empty($amenities)){ if($amenities->CommunityHall == 1){ ?>
                                            <li class="col-lg-4 col-md-4 col-sm-6 col-xs-12"> <i class="icon-local_laundry_service"></i>Community Hall</li>
                                            <?php } } ?>
                                            <?php if(!empty($amenities)){ if($amenities->IndoorGame == 1){ ?>
                                            <li class="col-lg-4 col-md-4 col-sm-6 col-xs-12"> <i class="fa fa-gamepad"></i>Indoor Game</li>
                                            <?php } } ?>
                                            <?php if(!empty($amenities)){ if($amenities->OutDoorGame == 1){ ?>
                                            <li class="col-lg-4 col-md-4 col-sm-6 col-xs-12"> <i class="fa fa-gamepad"></i>Out Door Game</li>
                                            <?php } } ?>
                                            <?php if(!empty($amenities)){ if($amenities->GasPipeLine == 1){ ?>
                                            <li class="col-lg-4 col-md-4 col-sm-6 col-xs-12"> <i class="fa fa-stumbleupon"></i>Gas Pipe Line</li>
                                            <?php } } ?>
                                            <?php if(!empty($amenities)){ if($amenities->Park == 1){ ?>
                                            <li class="col-lg-4 col-md-4 col-sm-6 col-xs-12"> <i class="icon-tree"></i>Park</li>
                                            <?php } } ?>
                                            <?php if(!empty($amenities)){ if($amenities->Security == 1){ ?>
                                            <li class="col-lg-4 col-md-4 col-sm-6 col-xs-12"> <i class="fa fa-shield"></i>24Hr. Security</li>
                                            <?php } } ?>
                                        </ul>
                                    </div>

                                    <div id="features" class="category-holder">
                                        <div class="element-title">
                                            <h3>OTHER INFO</h3>
                                        </div>
                                        <ul class="category-list">
                                            <li class="col-lg-6 col-md-6 col-sm-6 col-xs-12"> <i class="fa fa-dot-circle-o"></i>
                                            <?php if(!empty($other_details)){
                                            if($other_details->section == 'PossessionFrom'){ ?>
                                            Possessions From
                                            <?php }else{ ?>
                                            Ready To Move 
                                            <?php } } ?>
                                            </li>
                                            <li class="col-lg-6 col-md-6 col-sm-6 col-xs-12"> <i class="fa fa-dot-circle-o"></i>
                                                <div class="field-select-holder" style="margin: 0px;">
                                                    <ul class="">
                                                        <li>
                                                            <a>
                                                                <span><strong>Date :</strong></span>
                                                                <?php if(!empty($other_details)){
                                                                      if($other_details->section == 'PossessionFrom'){ ?>
                                                                 <?php echo date('d M, Y', strtotime($other_details->PossessionDate)); ?>
                                                                <?php } ?>
                                                                <?php } ?>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </li>
                                            <li class="col-lg-6 col-md-6 col-sm-6 col-xs-12"> <strong><i class="fa fa-dot-circle-o"></i>Age of Property: </strong><?php if(!empty($other_details)){ echo $other_details->AgeofPropeety; } ?> <span>Years Old</span></li>
                                            <li class="col-lg-6 col-md-6 col-sm-6 col-xs-12"> <strong><i class="fa fa-dot-circle-o"></i>Property Type: </strong><?php if(!empty($other_details)){ echo $other_details->PropertyType; } ?></li>
                                        </ul>
                                        <div class="property-static-text">
                                            <ul>
                                                <?php if(!empty($other_details)){ if($other_details->OpenParking > 0){ ?>
                                                <li>Open</li>
                                                <?php } } ?>
                                                <?php if(!empty($other_details)){ if($other_details->CoveredParking > 0){ ?>
                                                <li>Covered</li>
                                                <?php } } ?>
                                                <?php if(!empty($other_details)){ if($other_details->Basement > 0){ ?>
                                                <li>Basement</li>
                                                <?php } } ?>
                                                <?php if(!empty($other_details)){ if($other_details->LiftParking > 0){ ?>
                                                <li>Lift Parking</li>
                                                <?php } } ?>
                                                <?php if(!empty($other_details)){ if($other_details->TwoWheeler > 0){ ?>
                                                <li>Two Wheeler</li>
                                                <?php } } ?>
                                            </ul>
                                        </div>
                                    </div>

                                    <div id="email-friend" class="profile-info detail-view-1">
                                        <div class="img-holder">
                                            <figure>
                                                <a href="#">
                                                    <img src="assets/extra-images/member-image-03.webp" alt="">
                                                </a>
                                            </figure>
                                        </div>
                                        <div class="text-holder">
                                            <a href="#">
                                                <h5>Floor Mantra</h5>
                                            </a>
                                            <ul>
                                                <li><i class="icon-location"></i>84 St. Johns Wood High Street, St Johns Wood</li>
                                                <li><i class="icon-phone3"></i><span class="sh-hde-cnt-num sh-hde-cnt-num" data-onum="0234">
                                                    <a class="cntct-num-hold" href="tel:0202946">020 2946 <span class="ch-cntct-num">xxxx</span></a> 
                                                    <a href="#." class="ch-cnt-show-num ch-cnt-show-num"> Show</a></span>
                                                </li>
                                            </ul>
                                            <div class="field-select-holder">
                                                <ul class="">
                                                    <li>
                                                        <a href="#." class="reviews-sortby-active active">
                                                            <i class="icon-clock3"></i>
                                                            <span>Today :</span>
                                                            12:15 am - 12:15 am </a>
                                                        <ul class="delivery-dropdown">
                                                            <li><a href="#"><span class="opend-day">Пон</span> <span class="opend-time"><small>:</small> 12:15 am - 12:15 am</span></a></li>
                                                            <li><a href="#"><span class="opend-day">TUE</span> <span class="opend-time"><small>:</small> 12:15 am - 12:15 am</span></a></li>
                                                            <li><a href="#"><span class="opend-day">WED</span> <span class="opend-time"><small>:</small> 12:15 am - 12:15 am</span></a></li>
                                                            <li><a href="#"><span class="opend-day">THU</span> <span class="opend-time"><small>:</small> 12:15 am - 12:15 am</span></a></li>
                                                            <li><a href="#"><span class="opend-day">FRI</span> <span class="opend-time"><small>:</small> 12:15 am - 12:15 am</span></a></li>
                                                            <li><a href="#"><span class="opend-day">SAT</span> <span class="opend-time"><small>:</small> 12:15 am - 12:15 am</span></a></li>
                                                            <li><a href="#"><span class="opend-day">SUN</span> <span class="close-day"><small>:</small> Closed</span></a></li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </div>
                                            <a href="#" class="submit-btn bgcolor wp-rem-open-signin-tab">Request Details</a>
                                        </div>
                                    </div>
                                    <div class="reviews-holder reviews-rating-main-con">
                                        <div class="add-new-review-holder" style="display: none;">
                                            <div class="row">
                                                <div id="review-rating-form-title" class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                    <div class="elements-title">
                                                        <h3>Rate and Write a Review</h3>
                                                        <a href="#" class="close-post-new-reviews-btn">Close</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="reviwes-property-holder row">
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <div class="element-title">
                                                    <h3>Ratings &amp; Reviews</h3>
                                                    <a href="#" class="post-reviews-btn is-login-modal">Write new review</a>
                                                </div>
                                            </div>
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <div class="rating-sumary-holder">
                                                    <div class="row">
                                                        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 ratings-summary-container">
                                                            <div class="rating-summary">
                                                                <div class="overall-rate-big" >5.0</div>
                                                                <div style="display:none;">3</div>
                                                                <div class="overall-heading-holder">
                                                                    <span class="overall-heading-txt">Overall rating</span>
                                                                    <div class="rating-holder">
                                                                        <div class="rating-star">
                                                                            <span style="width: 100%;" class="rating-box"></span>
                                                                        </div>
                                                                    </div>
                                                                    <span class="rating-based-txt">based on all ratings</span>
                                                                </div>
                                                                <ul class="all-service-list">
                                                                    <li><span>Service</span> <strong>100%</strong></li>
                                                                    <li><span>Quality</span> <strong>100%</strong></li>
                                                                    <li><span>Value</span> <strong>100%</strong></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 overall-ratings-container">
                                                            <div class="overall-rating">
                                                                <ul class="reviews-box">
                                                                    <li>
                                                                        <span class="label">5</span>
                                                                        <span class="item-list">
                                                                            <span style="width: 100%"></span>
                                                                        </span>
                                                                        <span class="label">100%</span>
                                                                    </li>
                                                                    <li>
                                                                        <span class="label">4</span>
                                                                        <span class="item-list">
                                                                            <span style="width: 0%"></span>
                                                                        </span>
                                                                        <span class="label">0%</span>
                                                                    </li>
                                                                    <li>
                                                                        <span class="label">3</span>
                                                                        <span class="item-list">
                                                                            <span style="width: 0%"></span>
                                                                        </span>
                                                                        <span class="label">0%</span>
                                                                    </li>
                                                                    <li>
                                                                        <span class="label">2</span>
                                                                        <span class="item-list">
                                                                            <span style="width: 0%"></span>
                                                                        </span>
                                                                        <span class="label">0%</span>
                                                                    </li>
                                                                    <li>
                                                                        <span class="label">1</span>
                                                                        <span class="item-list">
                                                                            <span style="width: 0%"></span>
                                                                        </span>
                                                                        <span class="label">0%</span>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="review-list">
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                    <div class="elements-title">
                                                        <h5>3 Reviews</h5>
                                                        <div class="sort-by">
                                                            <ul class="reviews-sortby">
                                                                <li>
                                                                    <span>Sort by: <strong class="active-sort">Newest Reviews</strong></span>
                                                                    <div class="reviews-sort-dropdown">
                                                                        <form>
                                                                            <div class="input-reviews">
                                                                                <div class="radio-field">
                                                                                    <input name="review" id="check-1" type="radio" value="newest">
                                                                                    <label for="check-1">Newest Reviews</label>
                                                                                </div>
                                                                                <div class="radio-field">
                                                                                    <input name="review" id="check-2" type="radio" value="highest">
                                                                                    <label for="check-2">Highest Rating</label>
                                                                                </div>
                                                                                <div class="radio-field">
                                                                                    <input name="review" id="check-3" type="radio" value="lowest">
                                                                                    <label for="check-3">Lowest Rating</label>
                                                                                </div>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <ul class="review-property">
                                                    <li class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                        <div class="list-holder ">
                                                            <div class="img-holder">
                                                                <figure><img src="assets/img/fav.webp" alt="#"></figure>
                                                            </div>
                                                            <div class="img-holder-content">
                                                                <div class="review-title">
                                                                    <p>Eco Home</p>
                                                                    <div class="rating-holder">
                                                                        <em>Apr 2017</em>
                                                                        <div class="rating-star" data-toggle="popover_html">
                                                                            <span style="width: 100%;" class="rating-box"></span>
                                                                        </div>
                                                                        <div class="ratings-popover-content" style="display:none;">
                                                                            <ul class="ratings-popover-listing">
                                                                                <li>Service : 5</li>
                                                                                <li>Quality : 5</li>
                                                                                <li>Value : 5</li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="review-helpful-holder">
                                                                    <a href="#" class="mark-review-helpful"><i class="icon-thumbs-o-up"></i> <span class="marked-helpful-txt">Helpful</span>
                                                                        <div class="marked-helpful-counts"><span>15</span></div>
                                                                    </a>
                                                                </div>
                                                                <div class="review-flag-holder">
                                                                    <a href="#" class="mark-review-flag"><i class="icon-flag-o"></i> <span class="marked-flag-txt">Flag</span></a>
                                                                </div>
                                                            </div>
                                                            <div class="review-text">
                                                                <p>
                                                                    Hy I am happy to see that Home Villa real estate Theme comes with an advanced address lookup which let you find location on map instantaneously. Geo-locate the property coordinates with single press of a button and display result on a Google Map. You can add country, city and complete address that will be automatically added to your property listing in that location. </p>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="col-lg-12 col-md-12 col-sm-12 col-xs-12" >
                                                        <div class="list-holder ">
                                                            <div class="img-holder">
                                                                <figure><img src="assets/img/fav.webp" alt="#"></figure>
                                                            </div>
                                                            <div class="img-holder-content">
                                                                <div class="review-title">
                                                                    <p>Home Villas</p>
                                                                    <div class="rating-holder">
                                                                        <em>Apr 2017</em>
                                                                        <div class="rating-star" data-toggle="popover_html">
                                                                            <span style="width: 100%;" class="rating-box"></span>
                                                                        </div>
                                                                        <div class="ratings-popover-content" style="display:none;">
                                                                            <ul class="ratings-popover-listing">
                                                                                <li>Service : 5</li>
                                                                                <li>Quality : 5</li>
                                                                                <li>Value : 5</li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="review-helpful-holder">
                                                                    <a  href="#" class="mark-review-helpful"><i class="icon-thumbs-o-up"></i> <span class="marked-helpful-txt">Helpful</span>
                                                                        <div class="marked-helpful-counts"><span>20</span></div>
                                                                    </a>
                                                                </div>
                                                                <div class="review-flag-holder">
                                                                    <a href="#" class="mark-review-flag"><i class="icon-flag-o"></i> <span class="marked-flag-txt">Flag</span></a>
                                                                </div>
                                                            </div>
                                                            <div class="review-text">
                                                                <p>
                                                                    Amazing... Real Estate theme offer a special feature of social share to help expand the number of one’s business and/or social contacts by making connections through individuals, often through social media sites such as Facebook, Twitter, LinkedIn Tumblr, Dribble, stumble upon and Google+. </p>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                        <div class="list-holder ">
                                                            <div class="img-holder">
                                                                <figure><img src="assets/img/fav.webp" alt="#"></figure>
                                                            </div>
                                                            <div class="img-holder-content">
                                                                <div class="review-title">
                                                                    <p>Creatives Home</p>
                                                                    <div class="rating-holder">
                                                                        <em>Apr 2017</em>
                                                                        <div class="rating-star" data-toggle="popover_html">
                                                                            <span style="width: 100%;" class="rating-box"></span>
                                                                        </div>
                                                                        <div class="ratings-popover-content" style="display:none;">
                                                                            <ul class="ratings-popover-listing">
                                                                                <li>Service : 5</li>
                                                                                <li>Quality : 5</li>
                                                                                <li>Value : 5</li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="review-helpful-holder">
                                                                    <a href="#" class="mark-review-helpful"><i class="icon-thumbs-o-up"></i> 
                                                                        <span class="marked-helpful-txt">Helpful</span>
                                                                        <div class="marked-helpful-counts"><span>19</span></div>
                                                                    </a>
                                                                </div>
                                                                <div class="review-flag-holder">
                                                                    <a href="#" class="mark-review-flag"><i class="icon-flag-o"></i> <span class="marked-flag-txt">Flag</span></a>
                                                                </div>
                                                            </div>
                                                            <div class="review-text">
                                                                <p>Home Villas Real Estate Theme is extremely professional and efficient at what they do! Maintenance is well handled in a timely manner. Prices are great and all processes are executed smoothly. Staff is very responsive and super friendly as well! Great experience every time. </p>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                        <div class="list-holder review_reply">
                                                            <div class="img-holder">
                                                                <figure><img src="assets/img/fav.webp" alt="#"></figure>
                                                            </div>
                                                            <div class="img-holder-content">
                                                                <div class="review-title">
                                                                    <p>Floor Mantra</p>
                                                                    <div class="rating-holder">
                                                                        <em>Apr 2017</em>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="review-text">
                                                                <p>
                                                                    Hi , Creatives-Home thank you very much for your nice words. <br>
                                                                    Glad you enjoyed working with our theme and we are able to help!<br>
                                                                    You are most welcome and i assure you our complete support team <br>
                                                                    is always ready to help you! </p>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="sidebar col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                    <div class="widget widget-map-sec">
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <div class="clear"></div>
                                                <div class="cs-map-section">
                                                    <div class="sidebar-map-places-radius-box">
                                                        <ul class="sidebar-radius-val-dropdown">
                                                            <li>
                                                                <span class="sidebar-radius-val-km sidebar-dev-ch-radius-val" data-val="5">5 km</span>
                                                                <ul>
                                                                    <li><span class="sidebar-radius-val-km" data-val="1">1 km</span></li>
                                                                    <li><span class="sidebar-radius-val-km" data-val="2">2 km</span></li>
                                                                    <li><span class="sidebar-radius-val-km" data-val="3">3 km</span></li>
                                                                    <li><span class="sidebar-radius-val-km" data-val="4">4 km</span></li>
                                                                    <li><span class="sidebar-radius-val-km" data-val="5">5 km</span></li>
                                                                </ul>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="cs-map" style="position: relative; z-index: 1;">
                                                        <div class="cs-map-content">
                                                            <div style="width: 100%; height: 382px;">
                                                                <iframe style="width: 100%; height: 100%; border:0; margin:0;" src="https://maps.google.com/maps?width=100%25&amp;height=600&amp;hl=en&amp;q=1%20Grafton%20Street,%20Dublin,%20Ireland+(My%20Business%20Name)&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="contact-member-form member-detail">
                                        <div class="profile-info detail-view-5">
                                            <div class="img-holder">
                                                <figure>
                                                    <a href="#">
                                                        <img src="assets/img/fav.webp" alt="#">
                                                    </a>
                                                </figure>
                                            </div>
                                            <div class="text-holder">
                                                <a href="#">
                                                    <h5>Floor Matra</h5>
                                                </a>
                                                <ul>
                                                    <li>84 St. Johns Wood High Street, St Johns Wood</li>
                                                    <li>
                                                        <span class="sh-hde-cnt-num sh-hde-cnt-num" data-onum="0245">
                                                        <a class="cntct-num-hold" href="tel:0202946">020 2946 <span class="ch-cntct-num">xxxx</span></a> 
                                                        <a href="#." class="ch-cnt-show-num ch-cnt-show-num">Show</a></span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <form id="contactfrm696962" class="contactform_name" name="contactform_name">
                                            <div class="row">
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                    <div class="field-holder">
                                                        <i class="icon- icon-user4"></i>
                                                        <input type="text"  placeholder=" Your Name *" class="input-field wp-rem-dev-req-field" name="contact_full_name"> 
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                    <div class="field-holder">
                                                        <i class="icon- icon-envelope3"></i>
                                                        <input type="text" placeholder=" Your Email Address *" class="input-field wp-rem-dev-req-field wp-rem-email-field" name="contact_email_add"> 
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                    <div class="field-holder">
                                                        <i class="icon-message"></i>
                                                        <textarea placeholder="Message *" class="wp-rem-dev-req-field" rows="5" cols="30" name="contact_message_field"></textarea> 
                                                    </div>
                                                </div>
                                                <div class="col-md-12 recaptcha-reload">
                                                    <div class="g-recaptcha" style="width:304px; height:78px;">
                                                        <iframe style=" border: 0; height: 100%; width: 100%; margin: 0;" src="https://www.google.com/recaptcha/api2/anchor?ar=1&amp;k=6LfzSxIUAAAAADmaB7gQqIXZ34ZdBgw5DthD79nx&amp;co=aHR0cDovL2hvbWV2aWxsYXMuY2hpbXBncm91cC5jb206ODA.&amp;hl=en&amp;v=IU7gZ7o6RDdDE6U4Y1YJJWnN&amp;theme=light&amp;size=normal&amp;cb=3h5jo33egtl6"></iframe>
                                                    </div> 
                                                    <a class="recaptcha-reload-a" href="#" ><i class="icon-refresh2"></i> Reload</a>
                                                </div>
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                    <div class="field-holder">
                                                        <div class="contact-message-submit input-button-loader">
                                                            <input type="button" class="bgcolor wp-rem-open-signin-tab" name="contact_message_submit" value="Contact Agent">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>

                                    <div id="attachments" class="attachment-holder">
                                        <div class="element-title">
                                            <h3>Files attachments</h3>
                                        </div>
                                        <ul>
                                            <li>
                                                <div class="img-holder">
                                                    <figure>
                                                        
                                                        <a href="#"><img src="<?php echo base_url(); ?>assets/front/img/image-file.jpeg" alt="#"></a>
                                                        
                                                    </figure>
                                                </div>
                                                <div class="text-holder">
                                                    <strong><a href="#">Property Images</a></strong>
                                                    <ul class="attachment-formats">
                                                        <?php if($type == "property" && !empty($property)){ ?>
                                                        <li><a href="<?php echo base_url(); ?><?php echo $property->image_name; ?>">Download</a></li>
                                                        <?php }elseif($type == "project" && !empty($project)){ ?>
                                                        <li><a href="<?php echo base_url(); ?><?php echo $project->image_file; ?>">Download</a></li>
                                                        <?php } ?>
                                                    </ul>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="img-holder">
                                                    <figure><a href="#">
                                                        <img src="<?php echo base_url(); ?>assets/front/img/video-file.jpeg" alt="#"></a>
                                                    </figure>
                                                </div>
                                                <div class="text-holder">
                                                    <strong>
                                                        
                                                        <a href="#">Property Videos</a></strong>
                                                        
                                                    <ul class="attachment-formats">
                                                        <?php if($type == "property" && !empty($property)){ ?>
                                                        <li><a href="<?php echo base_url(); ?><?php echo $property->video_name; ?>">Download</a></li>
                                                        <?php }elseif($type == "project" && !empty($project)){ ?>
                                                        <li><a href="<?php echo base_url(); ?><?php echo $project->video_file; ?>">Download</a></li>
                                                        <?php } ?>
                                                    </ul>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="img-holder">
                                                    <figure><a href="#"><img src="<?php echo base_url(); ?>assets/front/img/pdf.jpeg" alt="#"></a></figure>
                                                </div>
                                                <div class="text-holder">
                                                    <strong><a href="#">Poperty Documents</a></strong>
                                                    <ul class="attachment-formats">
                                                        <?php if($type == "property" && !empty($property)){ ?>
                                                        <li><a href="<?php echo base_url(); ?><?php //echo $property->pdf_name; ?>">Download</a></li>
                                                        <?php }elseif($type == "project" && !empty($project)){ ?>
                                                        <li><a href="<?php echo base_url(); ?><?php echo $project->pdf_file; ?>">Download</a></li>
                                                        <?php } ?>
                                                    </ul>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>

                                    <div id="video" class="video-holder">
                                        <div class="element-title">
                                            <h3>Property Video</h3>
                                        </div>
                                        <div class="video-fit-holder">
                                            <div class="img-holder" style="background-image:url(assets/extra-images/property-image01.webp)">
                                                <span class="play-btn">
                                                    <a id="play-video" data-id="5910" class="video-btn" href="#"><i class="icon-play_arrow"></i></a>
                                                </span>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php if(!empty($list_property)){?>
                    <div class="page-section detail-nearby-properties">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="property-grid-slider real-estate-property">
                            <div class="element-title">
                                <h3>Properties on the Market Nearby</h3>
                            </div>
                            <div class="swiper-container">
                                <div class="swiper-wrapper">
                                    <?php if(!empty($list_property)){ ?>
                                        <?php foreach($list_property as $property){ ?>
                                        <div class="swiper-slide">
                                        
                                        <div class="property-row item">
                                            <div class="property-grid classic" style="min-height:399px;">
                                                <div class="img-holder image-loaded">
                                                    <figure>
                                                 <?php if($property->image_name == ''){ ?>
                                                       <a href="#"> <img class="img-grid" src="<?php echo base_url();?>assets/front/extra-images/property-grid-image-2.webp" alt="#"> </a>
                                                    <?php }else{ ?>
                                                    <a href="#"> <img class="img-grid" src="<?php echo base_url();?><?php echo $property->image_name; ?>" alt="#"> </a>
                                                    <?php } ?>
                                                    <!--<img class="img-grid" src="<?php echo base_url(); ?>assets/front/extra-images/property-grid-image-2.webp" alt="#"> -->
                                                
                                            <figcaption> <span class="featured"><?php echo $property->city; ?></span>
                                                    <div class="caption-inner">
                                                        <ul class="rem-property-options">
                                                            <li class="property-like-opt">
                                                                <div class="option-holder">
                                                                    <div class="like-btn">
                                                                        <?php if(!empty($this->session->userdata('user'))){ ?>
                                                                        <a href="<?php echo base_url(); ?>home/add_property_to_favorite/<?php echo $property->post_id;?>" class="favourite wp-rem-open-signin-tab">
                                                                            <i class="icon-heart-o"></i>
                                                                            <div class="option-content">
                                                                                <span>Save to Favourite</span>
                                                                            </div>
                                                                        </a>
                                                                        <?php }else{ ?>
                                                                        <a data-target="#sign-up" data-toggle="modal" href="#sign-up" class="favourite wp-rem-open-signin-tab">
                                                                            <i class="icon-heart-o"></i>
                                                                            <div class="option-content">
                                                                                <span>Save to Favourite</span>
                                                                            </div>
                                                                        </a>
                                                                        <?php } ?>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            <li class="property-video-opt">
                                                                <div class="option-holder">
                                                                    <a class="property-video-btn" data-rel="prettyPhoto" href="<?php echo base_url(); ?><?php echo $property->video_name; ?>">
                                                                        <i class="icon-film3"></i>
                                                                        <div class="option-content">
                                                                            <span>Video</span>
                                                                        </div>
                                                                    </a>
                                                                </div>
                                                            </li>
                                                            <li class="property-photo-opt">
                                                                <div class="option-holder">
                                                                    <a href="<?php echo base_url(); ?><?php echo $property->image_name; ?>" data-rel="prettyPhoto[gal4]" class="rem-pretty-photos">
                                                                        <i class="icon-camera6"></i><span class="capture-count"><?php echo count(explode(';',$property->images)); ?></span>
                                                                        <div class="option-content">
                                                                            <span>Photos</span>
                                                                        </div>
                                                                    </a>
                                                                </div>
                                                            </li>
                                                        </ul>
                                                    </div>
                                            </figcaption>
                                        </figure>
                                    </div>
                                    <div class="text-holder"> 
                            
                            
                                        <div class="col-md-12">
                                            Company Logo
                                        </div>
                                        <div class="col-md-12">
                                            <div class="post-title">
                                            <h4><a href="#"><?php echo $property->complex_society_building; ?></a></h4> 
                                        </div>
                                        <ul class="property-location">
                                            <li><i class="icon-location-pin2"></i><span><?php echo $property->location; ?><br><?php echo $property->city; ?><br><?php echo $property->flatno; ?> Flats</span></li>
                                        </ul>
                                        </div>
                                        <div class="col-md-12">
                                            <span class="property-price">
                                                <span content="250">Rs <?php echo $property->rentPerMonth; ?></span>
                                                <span class="prop-price-type"> 
                                                    <span class="guid-price"> onwords</span>
                                                </span>
                                            </span>
                                            <a href="<?php echo base_url(); ?>home/property_details/<?php echo $property->post_id; ?>" class="btn btn-danger">See Details</a>
                                        </div>            
                                        <ul class="post-category-list" style="margin-top: 10px;">
                                            <li>Marketed By <?php echo $property->name; ?> </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                                        
                                        </div>
                                    <?php } ?>
                                        <?php } ?>
                                    <!--<div class="swiper-slide">
                                        <div class="property-row item">
                                            <div class="property-grid classic" style="min-height:399px;">
                                                <div class="img-holder image-loaded">
                                                    <figure>
                                            <a href="#"> <img class="img-grid" src="<?php echo base_url(); ?>assets/front/extra-images/property-grid-image-2.webp" alt="#"> </a>
                                            <figcaption> <span class="featured">Delhi</span>
                                                    <div class="caption-inner">
                                                        <ul class="rem-property-options">
                                                            <li class="property-like-opt">
                                                                <div class="option-holder">
                                                                    <div class="like-btn">
                                                                        <a href="#" class="favourite wp-rem-open-signin-tab">
                                                                            <i class="icon-heart-o"></i>
                                                                            <div class="option-content">
                                                                                <span>Save to Favourite</span>
                                                                            </div>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            <li class="property-video-opt">
                                                                <div class="option-holder">
                                                                    <a class="property-video-btn" data-rel="prettyPhoto" href="https://vimeo.com/113282703">
                                                                        <i class="icon-film3"></i>
                                                                        <div class="option-content">
                                                                            <span>Video</span>
                                                                        </div>
                                                                    </a>
                                                                </div>
                                                            </li>
                                                            <li class="property-photo-opt">
                                                                <div class="option-holder">
                                                                    <a href="assets/extra-images/property-image16.webp" data-rel="prettyPhoto[gal4]" class="rem-pretty-photos">
                                                                        <i class="icon-camera6"></i><span class="capture-count">5</span>
                                                                        <div class="option-content">
                                                                            <span>Photos</span>
                                                                        </div>
                                                                    </a>
                                                                </div>
                                                            </li>
                                                        </ul>
                                                    </div>
                                            </figcaption>
                                        </figure>
                                    </div>
                                    <div class="text-holder"> 
                            
                            
                                        <div class="col-md-12">
                                            Company Logo
                                        </div>
                                        <div class="col-md-12">
                                            <div class="post-title">
                                            <h4><a href="#">Su Casa Royal</a></h4> 
                                        </div>
                                        <ul class="property-location">
                                            <li><i class="icon-location-pin2"></i><span>Etha realty<br>Narendrapur<br>2,3 BHK Flats</span></li>
                                        </ul>
                                        </div>
                                        <div class="col-md-12">
                                            <span class="property-price">
                                                <span content="250">Rs4083</span>
                                                <span class="prop-price-type"> 
                                                    <span class="guid-price"> onwords</span>
                                                </span>
                                            </span>
                                            <a href="#" class="btn btn-danger">See Details</a>
                                        </div>            
                                        <ul class="post-category-list" style="margin-top: 10px;">
                                            <li>Marketed By Etha Realty </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="property-row item">
                                            <div class="property-grid classic" style="min-height:399px;">
                                                <div class="img-holder image-loaded">
                                                    <figure>
                                            <a href="#"> <img class="img-grid" src="assets/extra-images/property-grid-image-2.webp" alt="#"> </a>
                                            <figcaption> <span class="featured">Delhi</span>
                                                    <div class="caption-inner">
                                                        <ul class="rem-property-options">
                                                            <li class="property-like-opt">
                                                                <div class="option-holder">
                                                                    <div class="like-btn">
                                                                        <a href="#" class="favourite wp-rem-open-signin-tab">
                                                                            <i class="icon-heart-o"></i>
                                                                            <div class="option-content">
                                                                                <span>Save to Favourite</span>
                                                                            </div>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            <li class="property-video-opt">
                                                                <div class="option-holder">
                                                                    <a class="property-video-btn" data-rel="prettyPhoto" href="https://vimeo.com/113282703">
                                                                        <i class="icon-film3"></i>
                                                                        <div class="option-content">
                                                                            <span>Video</span>
                                                                        </div>
                                                                    </a>
                                                                </div>
                                                            </li>
                                                            <li class="property-photo-opt">
                                                                <div class="option-holder">
                                                                    <a href="assets/extra-images/property-image16.webp" data-rel="prettyPhoto[gal4]" class="rem-pretty-photos">
                                                                        <i class="icon-camera6"></i><span class="capture-count">5</span>
                                                                        <div class="option-content">
                                                                            <span>Photos</span>
                                                                        </div>
                                                                    </a>
                                                                </div>
                                                            </li>
                                                        </ul>
                                                    </div>
                                            </figcaption>
                                        </figure>
                                    </div>
                                    <div class="text-holder"> 
                            
                            
                                        <div class="col-md-12">
                                            Company Logo
                                        </div>
                                        <div class="col-md-12">
                                            <div class="post-title">
                                            <h4><a href="#">Su Casa Royal</a></h4> 
                                        </div>
                                        <ul class="property-location">
                                            <li><i class="icon-location-pin2"></i><span>Etha realty<br>Narendrapur<br>2,3 BHK Flats</span></li>
                                        </ul>
                                        </div>
                                        <div class="col-md-12">
                                            <span class="property-price">
                                                <span content="250">Rs4083</span>
                                                <span class="prop-price-type"> 
                                                    <span class="guid-price"> onwords</span>
                                                </span>
                                            </span>
                                            <a href="#" class="btn btn-danger">See Details</a>
                                        </div>            
                                        <ul class="post-category-list" style="margin-top: 10px;">
                                            <li>Marketed By Etha Realty </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="property-row item">
                                            <div class="property-grid classic" style="min-height:399px;">
                                                <div class="img-holder image-loaded">
                                                    <figure>
                                            <a href="#"> <img class="img-grid" src="assets/extra-images/property-grid-image-2.webp" alt="#"> </a>
                                            <figcaption> <span class="featured">Delhi</span>
                                                    <div class="caption-inner">
                                                        <ul class="rem-property-options">
                                                            <li class="property-like-opt">
                                                                <div class="option-holder">
                                                                    <div class="like-btn">
                                                                        <a href="#" class="favourite wp-rem-open-signin-tab">
                                                                            <i class="icon-heart-o"></i>
                                                                            <div class="option-content">
                                                                                <span>Save to Favourite</span>
                                                                            </div>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            <li class="property-video-opt">
                                                                <div class="option-holder">
                                                                    <a class="property-video-btn" data-rel="prettyPhoto" href="https://vimeo.com/113282703">
                                                                        <i class="icon-film3"></i>
                                                                        <div class="option-content">
                                                                            <span>Video</span>
                                                                        </div>
                                                                    </a>
                                                                </div>
                                                            </li>
                                                            <li class="property-photo-opt">
                                                                <div class="option-holder">
                                                                    <a href="assets/extra-images/property-image16.webp" data-rel="prettyPhoto[gal4]" class="rem-pretty-photos">
                                                                        <i class="icon-camera6"></i><span class="capture-count">5</span>
                                                                        <div class="option-content">
                                                                            <span>Photos</span>
                                                                        </div>
                                                                    </a>
                                                                </div>
                                                            </li>
                                                        </ul>
                                                    </div>
                                            </figcaption>
                                        </figure>
                                    </div>
                                    <div class="text-holder"> 
                            
                            
                                        <div class="col-md-12">
                                            Company Logo
                                        </div>
                                        <div class="col-md-12">
                                            <div class="post-title">
                                            <h4><a href="#">Su Casa Royal</a></h4> 
                                        </div>
                                        <ul class="property-location">
                                            <li><i class="icon-location-pin2"></i><span>Etha realty<br>Narendrapur<br>2,3 BHK Flats</span></li>
                                        </ul>
                                        </div>
                                        <div class="col-md-12">
                                            <span class="property-price">
                                                <span content="250">Rs4083</span>
                                                <span class="prop-price-type"> 
                                                    <span class="guid-price"> onwords</span>
                                                </span>
                                            </span>
                                            <a href="#" class="btn btn-danger">See Details</a>
                                        </div>            
                                        <ul class="post-category-list" style="margin-top: 10px;">
                                            <li>Marketed By Etha Realty </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="property-row item">
                                            <div class="property-grid classic" style="min-height:399px;">
                                                <div class="img-holder image-loaded">
                                                    <figure>
                                            <a href="#"> <img class="img-grid" src="assets/extra-images/property-grid-image-2.webp" alt="#"> </a>
                                            <figcaption> <span class="featured">Delhi</span>
                                                    <div class="caption-inner">
                                                        <ul class="rem-property-options">
                                                            <li class="property-like-opt">
                                                                <div class="option-holder">
                                                                    <div class="like-btn">
                                                                        <a href="#" class="favourite wp-rem-open-signin-tab">
                                                                            <i class="icon-heart-o"></i>
                                                                            <div class="option-content">
                                                                                <span>Save to Favourite</span>
                                                                            </div>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            <li class="property-video-opt">
                                                                <div class="option-holder">
                                                                    <a class="property-video-btn" data-rel="prettyPhoto" href="https://vimeo.com/113282703">
                                                                        <i class="icon-film3"></i>
                                                                        <div class="option-content">
                                                                            <span>Video</span>
                                                                        </div>
                                                                    </a>
                                                                </div>
                                                            </li>
                                                            <li class="property-photo-opt">
                                                                <div class="option-holder">
                                                                    <a href="assets/extra-images/property-image16.webp" data-rel="prettyPhoto[gal4]" class="rem-pretty-photos">
                                                                        <i class="icon-camera6"></i><span class="capture-count">5</span>
                                                                        <div class="option-content">
                                                                            <span>Photos</span>
                                                                        </div>
                                                                    </a>
                                                                </div>
                                                            </li>
                                                        </ul>
                                                    </div>
                                            </figcaption>
                                        </figure>
                                    </div>
                                    <div class="text-holder"> 
                            
                            
                                        <div class="col-md-12">
                                            Company Logo
                                        </div>
                                        <div class="col-md-12">
                                            <div class="post-title">
                                            <h4><a href="#">Su Casa Royal</a></h4> 
                                        </div>
                                        <ul class="property-location">
                                            <li><i class="icon-location-pin2"></i><span>Etha realty<br>Narendrapur<br>2,3 BHK Flats</span></li>
                                        </ul>
                                        </div>
                                        <div class="col-md-12">
                                            <span class="property-price">
                                                <span content="250">Rs4083</span>
                                                <span class="prop-price-type"> 
                                                    <span class="guid-price"> onwords</span>
                                                </span>
                                            </span>
                                            <a href="#" class="btn btn-danger">See Details</a>
                                        </div>            
                                        <ul class="post-category-list" style="margin-top: 10px;">
                                            <li>Marketed By Etha Realty </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="property-row item">
                                            <div class="property-grid classic" style="min-height:399px;">
                                                <div class="img-holder image-loaded">
                                                    <figure>
                                            <a href="#"> <img class="img-grid" src="assets/extra-images/property-grid-image-2.webp" alt="#"> </a>
                                            <figcaption> <span class="featured">Delhi</span>
                                                    <div class="caption-inner">
                                                        <ul class="rem-property-options">
                                                            <li class="property-like-opt">
                                                                <div class="option-holder">
                                                                    <div class="like-btn">
                                                                        <a href="#" class="favourite wp-rem-open-signin-tab">
                                                                            <i class="icon-heart-o"></i>
                                                                            <div class="option-content">
                                                                                <span>Save to Favourite</span>
                                                                            </div>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            <li class="property-video-opt">
                                                                <div class="option-holder">
                                                                    <a class="property-video-btn" data-rel="prettyPhoto" href="https://vimeo.com/113282703">
                                                                        <i class="icon-film3"></i>
                                                                        <div class="option-content">
                                                                            <span>Video</span>
                                                                        </div>
                                                                    </a>
                                                                </div>
                                                            </li>
                                                            <li class="property-photo-opt">
                                                                <div class="option-holder">
                                                                    <a href="assets/extra-images/property-image16.webp" data-rel="prettyPhoto[gal4]" class="rem-pretty-photos">
                                                                        <i class="icon-camera6"></i><span class="capture-count">5</span>
                                                                        <div class="option-content">
                                                                            <span>Photos</span>
                                                                        </div>
                                                                    </a>
                                                                </div>
                                                            </li>
                                                        </ul>
                                                    </div>
                                            </figcaption>
                                        </figure>
                                    </div>
                                    <div class="text-holder"> 
                            
                            
                                        <div class="col-md-12">
                                            Company Logo
                                        </div>
                                        <div class="col-md-12">
                                            <div class="post-title">
                                            <h4><a href="#">Su Casa Royal</a></h4> 
                                        </div>
                                        <ul class="property-location">
                                            <li><i class="icon-location-pin2"></i><span>Etha realty<br>Narendrapur<br>2,3 BHK Flats</span></li>
                                        </ul>
                                        </div>
                                        <div class="col-md-12">
                                            <span class="property-price">
                                                <span content="250">Rs4083</span>
                                                <span class="prop-price-type"> 
                                                    <span class="guid-price"> onwords</span>
                                                </span>
                                            </span>
                                            <a href="#" class="btn btn-danger">See Details</a>
                                        </div>            
                                        <ul class="post-category-list" style="margin-top: 10px;">
                                            <li>Marketed By Etha Realty </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                                    </div>

                                    <div class="swiper-slide">
                                        <div class="property-row item">
                                            <div class="property-grid classic" style="min-height:399px;">
                                                <div class="img-holder image-loaded">
                                                    <figure>
                                            <a href="#"> <img class="img-grid" src="assets/extra-images/property-grid-image-2.webp" alt="#"> </a>
                                            <figcaption> <span class="featured">Delhi</span>
                                                    <div class="caption-inner">
                                                        <ul class="rem-property-options">
                                                            <li class="property-like-opt">
                                                                <div class="option-holder">
                                                                    <div class="like-btn">
                                                                        <a href="#" class="favourite wp-rem-open-signin-tab">
                                                                            <i class="icon-heart-o"></i>
                                                                            <div class="option-content">
                                                                                <span>Save to Favourite</span>
                                                                            </div>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            <li class="property-video-opt">
                                                                <div class="option-holder">
                                                                    <a class="property-video-btn" data-rel="prettyPhoto" href="https://vimeo.com/113282703">
                                                                        <i class="icon-film3"></i>
                                                                        <div class="option-content">
                                                                            <span>Video</span>
                                                                        </div>
                                                                    </a>
                                                                </div>
                                                            </li>
                                                            <li class="property-photo-opt">
                                                                <div class="option-holder">
                                                                    <a href="assets/extra-images/property-image16.webp" data-rel="prettyPhoto[gal4]" class="rem-pretty-photos">
                                                                        <i class="icon-camera6"></i><span class="capture-count">5</span>
                                                                        <div class="option-content">
                                                                            <span>Photos</span>
                                                                        </div>
                                                                    </a>
                                                                </div>
                                                            </li>
                                                        </ul>
                                                    </div>
                                            </figcaption>
                                        </figure>
                                    </div>
                                    <div class="text-holder"> 
                            
                            
                                        <div class="col-md-12">
                                            Company Logo
                                        </div>
                                        <div class="col-md-12">
                                            <div class="post-title">
                                            <h4><a href="#">Su Casa Royal</a></h4> 
                                        </div>
                                        <ul class="property-location">
                                            <li><i class="icon-location-pin2"></i><span>Etha realty<br>Narendrapur<br>2,3 BHK Flats</span></li>
                                        </ul>
                                        </div>
                                        <div class="col-md-12">
                                            <span class="property-price">
                                                <span content="250">Rs4083</span>
                                                <span class="prop-price-type"> 
                                                    <span class="guid-price"> onwords</span>
                                                </span>
                                            </span>
                                            <a href="#" class="btn btn-danger">See Details</a>
                                        </div>            
                                        <ul class="post-category-list" style="margin-top: 10px;">
                                            <li>Marketed By Etha Realty </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                                    </div>-->

                                </div>
                            </div>
                            <div class="swiper-button-prev"> <i class="icon-chevron-thin-left"></i></div>
                            <div class="swiper-button-next"><i class="icon-chevron-thin-right"></i></div>
                        </div>
                    </div>
                </div>
                <?php }?>
                <!-- End Main Content Section -->
            </div>

            
        </div>
    <!-- /.wrapper -->
  <!--  <script type="text/javascript" src="assets/js/jquery.prettyPhoto.js"></script>
    <script type="text/javascript" src="assets/js/lightbox.js"></script>
    <script type="text/javascript" src="assets/js/swiper.min.js"></script>
    <script type="text/javascript" src="assets/js/chosen.select.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap-slider.js"></script>
    <script type="text/javascript" src="assets/js/moment.js"></script>
    <script type="text/javascript" src="assets/js/daterangepicker.js"></script>
    <script type="text/javascript" src="assets/js/croppic.js"></script>
    <script type="text/javascript" src="assets/js/responsive-calendar.min.js"></script>
    <script type="text/javascript" src="assets/js/flexslider.js"></script>
    <script type="text/javascript" src="assets/js/donut-pie-chart.min.js"></script>
    <script type="text/javascript" src="assets/js/fitvids.js"></script>
    <script type="text/javascript" src="assets/js/responsive.menu.js"></script>
    <script type="text/javascript" src="assets/js/functions.js"></script>
    <script type="text/javascript" src="assets/js/royal_preloader.min.js"></script>
    <script type="text/javascript" src="assets/js/intro-popup.js"></script>


    </body>

</html>-->
