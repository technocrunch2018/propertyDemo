<div class="main-section ">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="cs-rich-editor">
                <div class="page-section-index" id="sale_property_div">
                    <div class="container ">
                        <div class="row">
                            <div class="section-fullwidth col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
                                        <div class="wp-rem-property-content">
                                            <div class="dev-map-class-changer">
                                                <div id="Property-content-78155">
                                                    <div class="row">
                                                        <aside class="filters-sidebar col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                                            <div class="accordion">
                                                                <div class="accordion-item" >
                                                                    <a class="drop-btn">Advance Search Engine</a>
                                                                    <div class="content">
                                                                        <form action = '<?php echo base_url('home/find_property');?>' method = 'post'>
                                                                            <div class="wp-rem-filters style2">
                                                                                <div class="filters-options">
                                                                                    <div class="select-categories">
                                                                                        <h6 class="tag-bg2"> <span class="rm-side-icons"><i class="icon-star-full"></i></span>
                                                                                        Sort By <span style="float: right;">(Relebance)</span></h6>
                                                                                        <input type="hidden" name="search_box" value="<?php echo @$post['search_box']; ?>" />
                                                                                        <input type="hidden" name="city" value="<?php echo @$post['city']; ?>" />
                                                                                        <select class="chosen-select-no-single mt-15" name="sort_by" id="sort_by">
                                                                                            <option value="Date: Newest" <?php if(@$post['sort_by'] == 'Date: Newest'){ echo "selected";}?>>Date: Newest</option>
                                                                                            <option value="Price: Low-High" <?php if(@$post['sort_by'] == 'Price: Low-High'){ echo "selected";}?>>Price: Low-High</option>
                                                                                            <option value="Price: High-Low" <?php if(@$post['sort_by'] == 'Price: High-Low'){ echo "selected";}?>>Price: High-Low</label></option>
                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="wp-rem-min-max-price">
                                                                                        <h6 class="tag-bg">Filter <a href="#">Clear All</a></h6>
                                                                                        <div class="select-categories style2">
                                                                                            <ul class="cs-checkbox-list" style="display:flex;">
                                                                                                <li>
                                                                                                    <div class="checkbox">
                                                                                                        <input type="radio" name="search_type" id="rent" value="1" <?php if($post['search_type'] == 1) { echo "checked" ;}?>>
                                                                                                        <label for="rent">Rent</label>
                                                                                                    </div>
                                                                                                </li>
                                                                                                <li style="padding-left:20px;">
                                                                                                    <div class="checkbox">
                                                                                                        <input type="radio" name="search_type" id="sell" value="2" <?php if($post['search_type'] == 2) { echo "checked" ;}?>>
                                                                                                        <label for="sell">Sell</label>
                                                                                                    </div>
                                                                                                </li>
                                                                                            </ul>
                                                                                        </div>
                                                                                        <div class="select-categories style2">
                                                                                            <select class="chosen-select-no-single" name="category" id="category">
                                                                                                <option selected="selected" disabled value="">Category </option>
                                                                                                <option value="HouseorBanglow" <?php if(@$post['category'] == 'HouseorBanglow'){ echo "selected";}?>>House Or Bungalow</option>
                                                                                                <option value="Land" <?php if(@$post['category'] == 'Land'){ echo "selected";}?>>Land</option>
                                                                                                <option value="Flat" <?php if(@$post['category'] == 'Flat'){ echo "selected";}?>>Flats</option>
                                                                                                <option value="PentHouse" <?php if(@$post['category'] == 'PentHouse'){ echo "selected";}?>>Pent Houses</option>
                                                                                            </select>
                                                                                        </div>
                                                                                        <div class="select-categories">
                                                                                            <h6> <span class="rm-side-icons"><i class="icon-star-full"></i></span> Price</h6>
                                                                                            <ul>
                                                                                                <li>
                                                                                                    <input type="number" value = "<?php echo @$post['price_minimum'];?>" name="price_minimum" id="price_minimum" placeholder="Min">
                                                                                                </li>
                                                                                            </ul>
                                                                                        </div>
                                                                                        <div class="select-categories">
                                                                                            <h6>&nbsp;</h6>
                                                                                            <ul>
                                                                                                <li>
                                                                                                    <input type="text" value = "<?php echo @$post['price_maximum'];?>" name="price_maximum" id="price_maximum" placeholder="Max">
                                                                                                </li>
                                                                                            </ul>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="select-categories">
                                                                                        <h6> <span class="rm-side-icons"><i class="icon-star-full"></i></span> Posted By</h6>
                                                                                        <div class="col-md-12">
                                                                                            <ul class="cs-checkbox-list">
                                                                                            <li>
                                                                                                <div class="checkbox">
                                                                                                    <input type="radio" id="Owner" name="posted_by" value="Owner" <?php if(@$post['posted_by'] == 'Owner') { echo "checked" ;}?>>
                                                                                                    <label for="Owner">Owner</label>
                                                                                                </div>
                                                                                            </li>
                                                                                            <li>
                                                                                                <div class="checkbox">
                                                                                                    <input type="radio" id="Builder" name="posted_by" value="Builder" <?php if(@$post['posted_by'] == 'Builder') { echo "checked" ;}?>>
                                                                                                    <label for="Builder">Builder</label>
                                                                                                </div>
                                                                                            </li>
                                                                                            <li>
                                                                                                <div class="checkbox">
                                                                                                    <input type="radio" id="Dealer" name="posted_by" value="Dealer" <?php if(@$post['posted_by'] == 'Dealer') { echo "checked" ;}?>>
                                                                                                    <label for="Dealer">Dealer</label>
                                                                                                </div>
                                                                                            </li>
                                                                                        </ul>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="select-categories style2">
                                                                                        <div class="btn-section-view-more mt-10">
                                                                                            <button type="submit" class="btn-red" style="width: 100%;padding:6px 0px;">Search</button>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </form>
                                                                        
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </aside>
                                                        
                                                        <?php  if($list_property){?>
                                                        <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                                                            <div class="real-estate-property-content real-estate-dev-property-content">
                                                                <div class="slide-loader-holder"></div>
                                                                <div class="real-estate-property">
                                                                    <div class="row">
                                                                        <?php foreach($list_property as $property){?>
                                                                            <div class = "col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                                                            <div class="property-row item">
                                                                                <div class="property-grid classic" style="min-height:399px;">
                                                                                    <div class="img-holder image-loaded">
                                                                                        <figure>
                                                                                            <?php if($property->image_name == ''){ ?><a href="<?php echo base_url(); ?>home/see_details/property/<?php echo $property->post_id; ?>"> <img class="img-grid" src="<?php echo base_url();?>assets/front/extra-images/property-grid-image-2.webp" alt="#"> </a><?php }else{ ?>
                                                                                                <a href="<?php echo base_url(); ?>home/see_details/property/<?php echo $property->post_id; ?>"> <img class="img-grid" src="<?php echo base_url();?><?php echo $property->image_name; ?>" alt="#"> </a>
                                                                                            <?php } ?>
                                                                                            <!--<figcaption> <span class="featured"><?php echo $property->subscription; ?></span>-->
                                                                                            <?php  if($property->is_show == 1){ ?><figcaption> <span class="featured"><?php echo "Verified"; ?></span> <?php } ?>
                                                                                                <div class="caption-inner">
                                                                                                    <ul class="rem-property-options">
                                                                                                        <li class="property-like-opt">
                                                                                                            <div class="option-holder">
                                                                                                                <div class="like-btn">
                                                                                                                    <?php if(!empty($this->session->userdata('user'))){ ?>
                                                                                                                        <a href="<?php echo base_url(); ?>home/add_property_to_favorite/<?php echo $property->post_id;?>" class="favourite wp-rem-open-signin-tab"><i class="icon-heart-o"></i><div class="option-content"><span>Add to Favourite</span></div></a><?php }else{ ?>
                                                                                                                        <a data-target="#sign-up" data-toggle="modal" href="#sign-up" class="favourite wp-rem-open-signin-tab"><i class="icon-heart-o"></i><div class="option-content"><span>Add to Favourite</span></div></a>
                                                                                                                    <?php } ?>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </li>
                                                                                                        <li class="property-video-opt">
                                                                                                            <div class="option-holder">
                                                                                                                <a class="property-video-btn" target="_BLANK" href="<?php echo $property->video_name; ?>">
                                                                                                                    <i class="icon-film3"></i>
                                                                                                                    <div class="option-content">
                                                                                                                        <span>Video</span>
                                                                                                                    </div>
                                                                                                                </a>
                                                                                                            </div>
                                                                                                        </li>
                                                                                                        <li class="property-photo-opt">
                                                                                                            <div class="option-holder">
                                                                                                                <a href="javascript:void(0);" onclick="view_property_gallery_images(<?php echo $property->post_id; ?>);" class="rem-pretty-photos">
                                                                                                                    <i class="icon-camera6"></i><span class="capture-count"><?php echo ($property->image_name != '') ? (($property->images != '') ? (count(explode(';',$property->images))+1) : 1) : (($property->images != '') ? (count(explode(';',$property->images))) : 0); ?></span>
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
                                                                                            <?php if($property->residential == 'HouseorBanglow'){ $propertyResidential= 'House / Banglow';}elseif($property->residential== 'ShopOrShowroom'){  $propertyResidential= 'Shop / Showroom'; }elseif($property->residential== 'DuplexFlat'){  $propertyResidential= 'PG/Co-Living'; }elseif($property->residential== 'PentHouse'){  $propertyResidential= 'Pent House'; }else{  $propertyResidential= $property->residential; }; ?>
                                                                                            <?php
                                                                                            $residential = $property->residential;
                                                                                            if($residential == 'DuplexFlat'){
                                                                                                //Duplex Flat
                                                                                                $property_title = @$property->details->room.' BHK '.@$property->details->buildup_area.' '.@$property->details->buildup_area_Unit.' '.$propertyResidential.' On '.$property->rent_sell.' at '.$property->city;
                                                                                            }elseif($residential == 'PentHouse'){
                                                                                            //Pent House
                                                                                                $property_title = @$property->details->pent_room.' BHK '.@$property->details->pent_buildup_area.' '.@$property->details->pent_buildup_area_Unit.' '.$propertyResidential.' On '.$property->rent_sell.' at '.$property->city;
                                                                                            }elseif($residential == 'Factory'){
                                                                                                //Factory Rent
                                                                                                $property_title = @$property->details->factory_BuildupArea.' '.@$property->details->factory_BuildupAreaUnit.' '.$propertyResidential.' On '.$property->rent_sell.' at '.$property->city;
                                                                                            }elseif($residential == 'Flat'){
                                                                                                //Flat Rent
                                                                                                $property_title = @$property->details->flat_Room.' BHK '.@$property->details->flat_BuildupArea.' '.@$property->details->flat_BuildupArea_Unit.' '.$propertyResidential.' On '.$property->rent_sell.' at '.$property->city;
                                                                                            }elseif($residential == 'HouseorBanglow'){
                                                                                                //House Rent
                                                                                                $property_title = @$property->details->house_Room.' BHK '.@$property->details->house_BuildupArea.' '.@$property->details->house_BuildupAreaUnit.' '.$propertyResidential.' On '.$property->rent_sell.' at '.$property->city;
                                                                                            }elseif($residential == 'Land'){
                                                                                                //Land Rent
                                                                                                $property_title = @$property->details->LandArea.' '.@$property->details->landCoveredArea.' '.@$property->details->landCoveredAreaUnit.' '.$propertyResidential.' On '.$property->rent_sell.' at '.$property->city;
                                                                                            }elseif($residential == 'Office'){
                                                                                                //Office Rent
                                                                                                $property_title = @$property->details->officeBuildupArea.' '.@$property->details->officeBuildupAreaUnit.' '.$propertyResidential.' On '.$property->rent_sell.' at '.$property->city;
                                                                                            }elseif($residential == 'ShopOrShowroom'){
                                                                                                //Shop Rent
                                                                                                $property_title = @$property->details->shopBuildupArea	.' '.@$property->details->shopBuildupAreaUnit.' '.$propertyResidential.' On '.$property->rent_sell.' at '.$property->city;
                                                                                            }elseif($residential == 'Warehouse'){
                                                                                                //Warehouse Rent
                                                                                                $property_title = @$property->details->warehouseBuildupArea.' '.@$property->details->warehouseBuildupAreaUnit.' '.$propertyResidential.' On '.$property->rent_sell.' at '.$property->city;
                                                                                            }
                                                                                            ?>
                                                                                            <?php //$property_name = "$property->flatno BHK $property->res_com $propertyResidential for $property->rent_sell in $property->city"; ?>
                                                                                            <div class="post-title"><h4><a href="<?php echo base_url(); ?>home/see_details/property/<?php echo $property->post_id; ?>"><?php echo substr($property_title, 0, 90); ?></a></h4> </div>
                                                                                            <ul class="property-location">
                                                                                                <li><i class="icon-location-pin2"></i><span><?php echo $property->location; ?></span></li>
                                                                                            </ul>
                                                                                        </div>
                                                                                        <div class="col-md-12">
                                                                                            <span class="property-price">
                                                                                                <span content="250">₹.<?php if($property->rent_sell == 'Rent'){echo number_format($property->rentPerMonth,2); } else { echo number_format($property->net_amount,2); }?></span>
                                                                                                <span class="prop-price-type"> 
                                                                                                <span class="guid-price"></span>
                                                                                                </span>
                                                                                            </span>
                                                                                            <br>
                                                                                            <a href="<?php echo base_url(); ?>home/see_details/property/<?php echo $property->post_id; ?>" class="btn custom-btn btn-details">See Details</a>
                                                                                            <?php if(!empty($this->session->userdata('user'))){ ?>
                                                                                        <a class = "get-it-on-wp-home" href="<?php echo base_url('home/get_details_on_whatsapp/'. $property->post_id);?>">Get details <img src="<?php echo base_url('assets/front/img/WhatsApp.svg.webp');?>"></a>
                                                                                    <?php } else{?>
                                                                                    <a class="get-it-on-wp-home" data-toggle="modal" href="javascript:void(0);" data-target="#sign-up">Get detail <img src="<?php echo base_url('assets/front/img/WhatsApp.svg.webp');?>"></a>
                                                                                    <?php }?>
                                                                                            <div class="post-category-list">
                                                                                                <p><span style="color:#000">Marketed By</span> <?php echo substr($property->dealer_name, 0, 30); ?> </p>
                                                                                            </div>
                                                                                        </div>         
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            </div>
                                                                        <?php } ?>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <?php } else{?>
                                                        <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                                                        <h1>No property found!!</h1>
                                                        </div>
                                                        <?php }?>
                                                        
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
                            <form class="viewing-request-form" name="see_details_request_viewing" id="see_details_request_viewing" method="post" action="<?php echo base_url();?>home/property_request_view">
                                <input type="hidden" value="0" name="request_post_id" id="request_post_id">
                                <input type="hidden" value="0" name="request_post_type" id="request_post_type">
                                <input type="hidden" value="<?php echo current_url(); ?>" name="redirect_url" id="redirect_url">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="field-holder has-icon">
                                            <div class="date-sec">
                                                <i class="icon-calendar5"></i>
                                                <i class="icon-keyboard_arrow_down"> </i>
                                                <input type="text" placeholder="Select Schedule" class="form-control booking-date wp-rem-required-field hasDatepicker" id="request_date" name="request_date">
                                                <div id="datepicker_1468" class="reservaion-calendar hasDatepicker"></div>
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
        
        
        <div class="modal modal-form fade" id="enquiry-modal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                        <h4 class="modal-title" id="enquiry-myModalLabel">Request Enquiry</h4>
                    </div>
                    <div class="modal-body">
                        <form id="see_details_enquiry_form" name="see_details_enquiry_form" method="post" action="<?php echo base_url(); ?>home/find_property_enquiry_now" class="enquiry-request-form">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="field-holder">
                                        <i class="icon-user2"></i>
                                        <input type="text" placeholder=" Your Name *" class="input-field wp-rem-dev-req-field" name="user_name" id="user_name">
                                        <input type="hidden" value="" name="enquiry_post_id" id="enquiry_post_id">
                                        <input type="hidden" value="" name="enquiry_post_type" id="enquiry_post_type">
                                        <input type="hidden" value="<?php echo current_url(); ?>" name="redirect_url" >
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="field-holder">
                                        <i class="icon-phone4"></i>
                                        <input type="text" placeholder=" Your Mobile No *" class="input-field" name="user_phone" id="user_phone"> </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="field-holder">
                                        <i class="icon-mail"></i>
                                        <input type="text" placeholder=" Your Email Address *" class="input-field wp-rem-dev-req-field wp-rem-email-field" name="user_email" id="user_email">
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="field-holder">
                                        <i class="icon-message"></i>
                                        <textarea placeholder=" Message * " class="textarea-field wp-rem-dev-req-field" rows="5" cols="30" name="user_message" id="user_message"></textarea> </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="field-holder">
                                        <div class="check-box-remind">
                                            <input type="checkbox" id="term_policy" name="term_policy" class="input-field">
                                            <label for="term_policy">By clicking you confirm that you accept the <a target="_blank" href="<?php echo base_url('home/term_condition');?>"> Terms &amp; Conditions </a> and <a target="_blank" href="<?php echo base_url('home/privacy_policy');?>"> Privacy Policy </a>
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
        
<script>


    $('#pagination').on('click','a',function(e){
       e.preventDefault(); 
       var pageno = $(this).attr('data-ci-pagination-page');
       search_property(pageno);
     });
     
    function search_property(pageno){
        var per_page = 5;
        var sort_by = $('#sort_by').val();
        var type = $('#type').val();
        var price_minimum = $('#price_minimum').val();
        var price_maximum = $('#price_maximum').val();
        /*var under_construction = $('#under_construction').val();*/
        if ($('#under_construction').is(":checked"))
        {
            var under_construction = true;
        }else{
            var under_construction = false;
        }
        if ($('#ready_to_move').is(":checked"))
        {
            var ready_to_move = true;
        }else{
            var ready_to_move = false;
        }
        var resale = $('#resale').val();
        var new_booking = $('#new_booking').val();
        var state = $('#state').val();
        var city = $('#city').val();
        var location = $('#location').val();
        var availability = $('input[name=availability]:checked').map(function() { return this.value; }).get();
        var res_com = $('input[name=res_com]:checked').val();
        var rent_sell = $('input[name=rent_sell]:checked').map(function() { return this.value; }).get();
        var category = $('#category').val();
        var posted_by = $('input[name=posted_by]:checked').map(function() { return this.value; }).get();
        var age = $('input[name=age]:checked').map(function() { return this.value; }).get();
        var area = $('input[name=area]:checked').val();
        var area_value = $('#area_value').val();
        var area_unit = $('#area_unit').val();
        
        $.ajax({
            url: "<?php echo base_url();?>home/search_property/"+pageno,
            type:'post',
            data:{'per_page':per_page,'pageno':pageno,'type':type,'sort_by':sort_by,'price_minimum':price_minimum,'price_maximum':price_maximum,'under_construction':under_construction,'ready_to_move':ready_to_move,'age':age,
                  'resale':resale,'new_booking':new_booking,'state':state,'city':city,'location':location,'res_com':res_com,'rent_sell':rent_sell,'category':category,'availability':availability,'posted_by':posted_by,'area':area,'area_unit':area_unit,'area_value':area_value},
            success: function(result){
                $("#search-result").html(result);
            }
        });
    }
    
    function enquiry_modal(post_id, post_type){
        $('#enquiry_post_id').val(post_id);
        $('#enquiry_post_type').val(post_type);
        $('#enquiry-modal').modal();
    }
    
    function request_view_popup(post_id, post_type){
        $('#request_post_id').val(post_id);
        $('#request_post_type').val(post_type);
        $('#arrange-modal').modal();
    }
</script>

<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
  $( function() {
        var availableTags = [];
        var location = $('#location').val();
        $.ajax({
            url:'<?php echo base_url(); ?>home/get_location',
            data:{location:location},
            type:'post',
            success:function(data){
                set_locations(data);
            }
        });
    
   });
  
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
    function load_cities(){
        var state = $('#state').val();
        $.ajax({
           url:'<?php echo base_url(); ?>home/get_cities_by_state',
           type:'post',
           data:{'state':state},
           success:function(data){
               set_cities(data);
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