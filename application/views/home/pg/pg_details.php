<div class="wrapper wrapper-full_width">
    <!-- Side Menu Start -->
    <div id="overlay"></div>
        <!-- Main Content Section -->
        <div class="main-section">
            <div class="page-section property-detail-view1-section">
                <div class="property-detail">
                    <div class="container">
                        <div class="row">
                            <div class="page-content col-lg-8 col-md-8 col-sm-12 col-xs-12">
                                <div class="list-detail-options">
                                    <div class="title-area">
                                        <div class="price-holder">
                                            <span class="property-price">
                                                <span class="new-price text-color">
                                                    Price Rs. <?php if(!empty($pg_details->triple_sharing_room)){ echo $pg_details->triple_sharing_room;} elseif(!empty($pg_details->double_sharing_room)){echo $pg_details->double_sharing_room;}
                                                    elseif(!empty($pg_details->private_room_price)){echo $pg_details->private_room_price;}?>
                                                    
                                                    
                                                    <span class="prop-price-type">
                                                        <span class="price-type">Onwords</span>
                                                    </span>
                                                </span>
                                            </span>
                                        </div>
                                        <h2><?php echo $pg_details->pg_name;?></h2>
                                        <address>
                                            <span><i class="icon-location-pin2"></i><?php if(!empty($pg_details)){ echo $pg_details->location.','.$pg_details->city.','.$pg_details->state.' - '.$pg_details->pincode; } ?></span>
                                        </address>
                                    </div>
                                     
                                    <div class="enquire-holder" style = "display: inline-block; float: right; width:100px; margin-right: -5px;">
                                        <a class="bgcolor enquire-btn wp-rem-open-signin-tab" data-toggle="modal" href="javascript:void(0);" data-target="#arrange-modal"><i class="icon- icon-calendar-check-o"></i>Site visit Request</a>
                                    </div>
                                    <div class="modal modal-form fade" id="arrange-modal" tabindex="-1" role="dialog" aria-labelledby="arrange-myModalLabel">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                                    <h4 class="modal-title" id="arrange-myModalLabel">Site visit Request</h4>
                                                    <p>Physical Arrange viewings is always been attractive to property clients. Just fill out the form to arrange visualizations around our properties.</p>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="booking-info-sec">
                                                        <form class="viewing-request-form" name="see_details_request_viewing" id="see_details_request_viewing" method="post" action="<?php echo base_url();?>home/PG_request_view">
                                                            <input type="hidden" value="<?php echo $pg_details->id; ?>" name="request_post_id" id="request_post_id">
                                                            <input type="hidden" value="<?php echo current_url(); ?>" name="redirect_url" id="redirect_url">
                                                            <div class="row">
                                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                    <div class="field-holder has-icon">
                                                                        <div class="date-sec">
                                                    
                                                                            <input type="date" placeholder="Select Schedule" class="form-control booking-date wp-rem-required-field" id="request_date" name="request_date">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                    <div class="field-holder has-icon">
                                                                        <i class="icon-clock2"></i>
                                                                        <select class="chosen-select-no-single" name="request_time" id="request_time">
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
                                                                        <input type="text" placeholder=" Your Name *" class="input-field wp-rem-dev-req-field" name="requestor_name" id="requestor_name">
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                    <div class="field-holder">
                                                                        <i class="icon-message"></i>
                                                                        <textarea placeholder=" Message" class="textarea-field wp-rem-dev-req-field" rows="5" cols="30" id="wp_rem_arrange_user_message" name="request_message"></textarea>
                                                                    </div>
                                                                </div>
                                                                <!--<div class="col-md-12 recaptcha-reload">
                                                                    <div class="g-recaptcha" style="width:304px; height:78px;">
                                                                        <iframe style=" border: 0; height: 100%; width: 100%; margin: 0;" src="https://www.google.com/recaptcha/api2/anchor?ar=1&amp;k=6LfzSxIUAAAAADmaB7gQqIXZ34ZdBgw5DthD79nx&amp;co=aHR0cDovL2hvbWV2aWxsYXMuY2hpbXBncm91cC5jb206ODA.&amp;hl=en&amp;v=IU7gZ7o6RDdDE6U4Y1YJJWnN&amp;theme=light&amp;size=normal&amp;cb=3h5jo33egtl6"></iframe>
                                                                    </div>
                                                                    <a class="recaptcha-reload-a" href="#"><i class="icon-refresh2"></i> Reload</a>
                                                                </div>-->
                                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                    <div class="field-holder">
                                                                        <div class="check-box-remind">
                                                                            <div class="check-box-remind">
                                                                                <input type="checkbox" id="arrange_viewing_term_policy" name="term_policy" class="input-field">
                                                                                <label for="arrange_viewing_term_policy">By clicking you confirm that you accept the <a target="_blank" href="<?php echo base_url('home/term_condition');?>"> Terms &amp; Conditions </a> and <a target="_blank" href="<?php echo base_url('home/privacy_policy');?>"> Privacy Policy </a>
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
                                    <?php if($pg_details->girls != NULL || $pg_details->boys != NULL || $pg_details->both != NULL){ ?>
                                    <div class="property-data mt-10">
                                        <ul>
                                            <li class="featured-property">
                                                <span class="bgcolor"><?php if($pg_details->girls != NULL){ echo "Girls ";} if($pg_details->boys != NULL){echo " Boys ";} if($pg_details->both != NULL){echo "Both";}?></span>
                                            </li>
                                        </ul>
                                    </div>
                                    <?php }?>
                                </div> 
                                    
                                    <!----- Property Images Slider Start here ---------------->
                                    

                                <?php if(!empty($pg_images && !empty($pg_images[0]))){ ?>
                            
                                <div class="slider" id="slider2">
                                    
                                    <?php foreach($pg_images as $image){  ?>
                                    <div class="slide-img">
                                        <img src="<?php echo base_url();?><?php echo $image->file;?>">
                                    </div>
                                    <?php } ?>
                            
                                    <i class="left" class="arrows" style="z-index:2; position:absolute;">
                                        <svg viewBox="0 0 100 100">
                                            <path d="M 10,50 L 60,100 L 70,90 L 30,50  L 70,10 L 60,0 Z"></path>
                                        </svg>
                                    </i>
                                    <i class="right" class="arrows" style="z-index:2; position:absolute;">
                                        <svg viewBox="0 0 100 100">
                                            <path d="M 10,50 L 60,100 L 70,90 L 30,50  L 70,10 L 60,0 Z" transform="translate(100, 100) rotate(180) "></path>
                                        </svg>
                                    </i>
                                </div>
                                <?php } ?>
                                
                                <ul class="categories-holder">
                                        
                                        <li>
                                            <i class="icon-bed2"></i>
                                            <span class="field-label">Managed By</span>: <span class="field-value">
                                               <?php echo $pg_details->managedby;?>
                                            </span> 
                                        </li>
                                        
                                    </ul>
                                    
                                <div id="features" class="category-holder">
                                    <div class="element-title">
                                        <h3>NEAR LOCATIONS</h3>
                                    </div>
                                    <ul class="category-list">
                                        <?php if (!empty($pg_details->near_location1)) {?><li class="col-lg-6 col-md-6 col-sm-6 col-xs-12"> <strong><i class="fa fa-dot-circle-o"></i><?php echo $pg_details->near_location1;?></strong></li><?php }?>
                                        <?php if (!empty($pg_details->near_location2)) {?><li class="col-lg-6 col-md-6 col-sm-6 col-xs-12"> <strong><i class="fa fa-dot-circle-o"></i><?php echo $pg_details->near_location2;?></strong></li><?php }?>
                                        <?php if (!empty($pg_details->near_location3)) {?><li class="col-lg-6 col-md-6 col-sm-6 col-xs-12"> <strong><i class="fa fa-dot-circle-o"></i><?php echo $pg_details->near_location3;?></strong></li><?php }?>
                                        
                                    </ul>
                                </div>
                                <div id="features" class="category-holder">
                                    <div class="element-title">
                                        <h3>PRICE DETAILS</h3>
                                    </div>
                                    <ul class="category-list">
                                        <style>
                                            .rupess-icon {
                                                background-color: rgb(247, 247, 247);
                                                padding: 5px 15px;
                                                border-radius: 5px;
                                            }
                                            .rupess-icon .rupee-fa {
                                                color: #50aeed;
                                            }
                                        </style>
                                        <?php if(!empty($pg_details->private_room_price)){?><li class="col-lg-6 col-md-6 col-sm-6 col-xs-12"> <strong><i class="fa fa-dot-circle-o"></i>Private Romm: </strong><span class="rupess-icon" style="color:#50aeed;font-weight:700;font-size:16px;"><i class="fa fa-rupee mr-0 rupee-fa"></i><?php echo $pg_details->private_room_price;?></span></li><?php }?>
                                        <?php if(!empty($pg_details->double_sharing_room)){?><li class="col-lg-6 col-md-6 col-sm-6 col-xs-12"> <strong><i class="fa fa-dot-circle-o"></i>Double Sharing: </strong><span class="rupess-icon" style="color:#50aeed;font-weight:700;font-size:16px;"><i class="fa fa-rupee mr-0 rupee-fa"></i><?php echo $pg_details->double_sharing_room;?></span></li><?php }?>
                                        <?php if(!empty($pg_details->triple_sharing_room)){?><li class="col-lg-6 col-md-6 col-sm-6 col-xs-12"> <strong><i class="fa fa-dot-circle-o"></i>Triple Sharing: </strong><span class="rupess-icon" style="color:#50aeed;font-weight:700;font-size:16px;"><i class="fa fa-rupee mr-0 rupee-fa"></i><?php echo $pg_details->triple_sharing_room;?></span></li><?php }?>
                                    </ul>
                                </div>
                                    
                                <div id="features" class="category-holder">
                                    <div class="element-title">
                                        <h3>PARKING</h3>
                                    </div>
                                    <div class="iba_container mt-20 mb-20">
                                        <?php if(!empty($pg_details->bike)){?>
                                        <div class="icon_box_area">
                                            <div class="score"><span>1</span></div>
                                            <div class="details">
                                                <p>Bike</p>
                                            </div>
                                        </div>
                                        <?php }?>
                                        <?php if(!empty($pg_details->car)){?>
                                        <div class="icon_box_area">
                                            <div class="score"><span>1</span></div>
                                            <div class="details">
                                                <p>Car</p>
                                            </div>
                                        </div>
                                        <?php }?>
                                    </div>
                                </div>
          

                                <div id="features" class="category-holder">
                                    <div class="element-title">
                                        <h3>Amenities</h3>
                                        <ul class="category-list">
                                            <?php if(!empty($ami_booked))
                            			    {foreach($ami_booked as $list){$data[] = $list->amenities_id;}  $ami_main = implode(",",$data);}else{$data = [];} ?>
                                            
                                            <?php foreach($ami as $list){?>
                                            <?php if(in_array($list->id, $data)){?>
                                                <li class="col-lg-4 col-md-4 col-sm-6 col-xs-12"> <i class="fa fa-dot-circle-o"></i><?php echo $list->name;?>p</li>
                                            <?php } } ?>
                                        </ul>
                                    </div>
                                </div>
                                    
                                <div id="property-detail" class="description-holder">
                                    <div class="property-dsec">
                                        <div class="element-title">
                                            <h3>PROPERTY DESCRIPTION</h3>
                                        </div>
                                        <p><?php echo $pg_details->details;?></p>
                                    </div>
                                </div>


                                <div class="reviews-holder reviews-rating-main-con">
                                    <!------- Start Write Reviews Area-->
                                    <div id="write-review-area" class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="display:none">
                                        <div class="element-title">
                                            <h3>Write a Reviews</h3>
                                        </div>
                                        <div class="contact-member-form member-detail">
                                            <form class="contactform_name" method="post" name="property_review_rating_form" id="property_review_rating_form" action="<?php echo base_url();?>home/add_ratings" style="background-color:transparent;padding:15px;border:none;">
                                                <div class="row">
                                                    <input type="hidden" name="property_type" value="<?php echo $type; ?>" />
                                                    <input type="hidden" name="post_id" value="<?php echo $pg_details->id; ?>" />
                                                    <input type="hidden" name="rate" id="review_rate" value="0" />
                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                        <div class="form-group ">
                                                            <p>Your Rating & Review</p>
                                                            <div class="stars">
                                                                  <input class="rating star star-5" data-index="5" id="star-5" type="radio" name="star"/>
                                                                  <label class="rating star star-5" data-index="5" for="star-5" title="5"></label>
                                                                  <input class="rating star star-4"  data-index="4" id="star-4" type="radio" name="star"/>
                                                                  <label class="rating star star-4" data-index="4" for="star-4" title="4"></label>
                                                                  <input class="rating star star-3" data-index="3" id="star-3" type="radio" name="star"/>
                                                                  <label class="rating star star-3" data-index="3" for="star-3" title="3"></label>
                                                                  <input class="rating star star-2" data-index="2" id="star-2" type="radio" name="star"/>
                                                                  <label class="rating star star-2" data-index="2" for="star-2" title="2"></label>
                                                                  <input class="rating star star-1" data-index="1" id="star-1" type="radio" name="star"/>
                                                                  <label class="rating star star-1" data-index="1" for="star-1" title="1"></label>
                                                            </div>
                                                         </div>
                                                    </div>
                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                        <div class="field-holder">
                                                            <input type="text"  placeholder=" Review Title" class="input-field wp-rem-dev-req-field" name="review_title" id="review_title"> 
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                        <div class="field-holder">
                                                            <textarea placeholder=" Your Review" class="wp-rem-dev-req-field" rows="5" cols="30" name="review_msg" id="review_msg"></textarea> 
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                        <div class="field-holder">
                                                            <div class="contact-message-submit input-button-loader">
                                                                <input type="submit" class="bgcolor wp-rem-open-signin-tab" name="review_message_submit" value="Submit Review">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                              
                                <div class="sidebar col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                    <div id="contactfrm696962" class="contact-member-form member-detail">
                                        <form class="contactform_name" name="contactform_name" name="see_details_contact_form" id="see_details_contact_form" method="post" action="<?php echo base_url(); ?>home/pg_contact_form">
                                            <div class="row">
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                    <div class="field-holder">
                                                        <i class="icon- icon-user4"></i>
                                                        <input type="text"  placeholder=" Your Name *" class="input-field wp-rem-dev-req-field" name="full_name" id="full_name"> 
                                                        <input type="hidden"  name="post_id" id="post_id" value="<?php echo $pg_details->id ?>"> 
                                                        <input type="hidden" value="<?php echo current_url(); ?>" name="redirect_url" id="redirect_url">
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                    <div class="field-holder">
                                                        <i class="icon- icon-envelope3"></i>
                                                        <input type="text" placeholder=" Your Email Address *" class="input-field wp-rem-dev-req-field wp-rem-email-field" name="email" id="email"> 
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                    <div class="field-holder">
                                                        <i class="icon- icon-envelope3"></i>
                                                        <input type="number" placeholder=" Your Contact Number *" class="input-field wp-rem-dev-req-field wp-rem-email-field" name="contact" id="contact_no"> 
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                    <div class="field-holder">
                                                        <i class="icon-message"></i>
                                                        <textarea placeholder="Message *" class="wp-rem-dev-req-field" rows="5" cols="30" name="message" id="message"></textarea> 
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                    <div class="field-holder">
                                                        <div class="contact-message-submit input-button-loader">
                                                            <input type="submit" class="bgcolor wp-rem-open-signin-tab" name="contact_message_submit" value="Send Message">
                                                        </div>
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