    <!--<script type="text/javascript" src="<?php echo base_url();?>assets/front/js/jquery.js"></script-->
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
                                                        
                                                        <?php if($type == 'property'){ ?>
                                                        <?php echo $property_type->rent_sell;?> Rs. 
                                                        <?php if(!empty($property_type))
                                                        { 
                                                            if($property_type->rent_sell == 'Rent')
                                                            {
                                                                echo $property_type->rentPerMonth.'/Month';
                                                            }
                                                            else
                                                            {
                                                                if(!empty($property_type))
                                                                {
                                                                    echo $property_type->net_amount;
                                                                }
                                                            }
                                                        }
                                                         ?> 
                                                        <?php }else{ ?>
                                                        Price Rs. <?php if(!empty($project)){ echo $project->price; } ?> /
                                                         <?php if($project->priceUnit == "Sqft"){echo $project->priceUnit;}?>
                                                        <span class="prop-price-type">
                                                            <span class="price-type">Onwords</span>
                                                        </span>
                                                        <?php } ?>
                                                        
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
                                                                            <!--<div class="col-md-12 recaptcha-reload">
                                                                                <div class="g-recaptcha" style="width:304px; height:78px;">
                                                                                    <iframe style=" border: 0; height: 100%; width: 100%; margin: 0;" src="https://www.google.com/recaptcha/api2/anchor?ar=1&amp;k=6LfzSxIUAAAAADmaB7gQqIXZ34ZdBgw5DthD79nx&amp;co=aHR0cDovL2hvbWV2aWxsYXMuY2hpbXBncm91cC5jb206ODA.&amp;hl=en&amp;v=IU7gZ7o6RDdDE6U4Y1YJJWnN&amp;theme=light&amp;size=normal&amp;cb=3h5jo33egtl6"></iframe>
                                                                                </div>
                                                                                <a class="recaptcha-reload-a" href="#"><i class="icon-refresh2"></i> Reload</a>
                                                                            </div>-->
                                                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                                <div class="field-holder claim_term_policy">
                                                                                    <div class="check-box-remind">
                                                                                        <input type="checkbox" id="claim_term_policy_5910" name="term_policy" class="input-field">
                                                                                        <label for="claim_term_policy_5910">By clicking you confirm that you accept the <a target="_blank" href="<?php echo base_url('home/term_condition');?>"> Terms &amp; Conditions </a> and <a target="_blank" href="<?php echo base_url('home/privacy_policy');?>"> Privacy Policy </a>
                                                                                        </label>
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
                                                                     <!--       <div class="col-md-12 recaptcha-reload" id="recaptcha_flag_div">
                                                                                <div class="g-recaptcha" id="recaptcha_flag">
                                                                                    <div class="g-recaptcha" style="width:304px; height:78px;">
                                                                                        <iframe style=" border: 0; height: 100%; width: 100%; margin: 0;" src="https://www.google.com/recaptcha/api2/anchor?ar=1&amp;k=6LfzSxIUAAAAADmaB7gQqIXZ34ZdBgw5DthD79nx&amp;co=aHR0cDovL2hvbWV2aWxsYXMuY2hpbXBncm91cC5jb206ODA.&amp;hl=en&amp;v=IU7gZ7o6RDdDE6U4Y1YJJWnN&amp;theme=light&amp;size=normal&amp;cb=3h5jo33egtl6"></iframe>
                                                                                    </div>
                                                                                </div> <a class="recaptcha-reload-a" href="#"><i class="icon-refresh2"></i> Reload</a>
                                                                            </div>-->
                                                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                                <div class="field-holder flag_term_policy">
                                                                                    <div class="check-box-remind">
                                                                                        <input type="checkbox" id="flag_term_policy_5910" name="term_policy" class="input-field">
                                                                                        <label for="flag_term_policy_5910">By clicking you confirm that you accept the <a target="_blank" href="<?php echo base_url('home/term_condition');?>"> Terms &amp; Conditions </a> and <a target="_blank" href="<?php echo base_url('home/privacy_policy');?>"> Privacy Policy </a></label>
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
                                            <?php if(!empty($project)){?><span class="project-name-title"> <?php echo $project->project_name; ?></span> <?php } ?>
                                            <h2>
                                                <?php $property_title = '';?>
                                                <?php if($type == 'property'){ ?>
                                                <?php //if(!empty($property)){ echo $property->flatno.' BHK '.$property_type->res_com.' '.$property_type_residential.' for '.$property_type->rent_sell.' in '.$property->city; } ?>
                                                <?php if(!empty($property)){ ?>
                                                <?php if($property_type->residential == 'HouseorBanglow'){$property_type_residential = 'House / Banglow';}elseif($property_type->residential == 'ShopOrShowroom'){$property_type_residential = 'Shop / Showroom';}elseif($property_type->residential == 'DuplexFlat'){$property_type_residential = 'PG/Co-Living';}elseif($property_type->residential == 'PentHouse'){$property_type_residential = 'Pent House';}else{$property_type_residential = $property_type->residential;} ?>
                                                <?php
                                                $residential = $property_type->residential;
                                                if($residential == 'DuplexFlat'){
                                                    //Duplex Flat
                                                    $property_title = @$duplex_flat_details->room.' BHK '.$property_type->res_com.' '.$property_type_residential.' on '.$property_type->rent_sell;
                                                }elseif($residential == 'PentHouse'){
                                                //Pent House
                                                    $property_title = @$pent_house_details->pent_room.' BHK '.$property_type->res_com.' '.$property_type_residential.' on '.$property_type->rent_sell;
                                                }elseif($residential == 'Factory'){
                                                    //Factory Rent
                                                    $property_title = @$factory_details->factory_BuildupArea.' '.@$factory_details->factory_BuildupAreaUnit.' '.$property_type->res_com.' '.$property_type_residential.' on '.$property_type->rent_sell;
                                                }elseif($residential == 'Flat'){
                                                    //Flat Rent
                                                    // $property_title = @$flat_details->flat_Room.' BHK '.$property_type->res_com.' '.$property_type_residential.' for '.$property_type->rent_sell.' in '.$property->city;
                                                    $property_title = @$flat_details->flat_Room.' BHK '.$property_type_residential.' '.$flat_details->flat_SuperBuildupArea.' '.$flat_details->flat_SuperBuildupAreaUnit.' '.$property->state.' '.$property->city.' '.$property->location.' On '.$property_type->rent_sell;
                                                }elseif($residential == 'HouseorBanglow'){
                                                    //House Rent
                                                    $property_title = @$house_details->house_Room.' BHK '.$property_type->res_com.' '.$property_type_residential.' on '.$property_type->rent_sell;
                                                }elseif($residential == 'Land'){
                                                    //Land Rent
                                                    // $property_title = @$land_details->LandArea.' '.@$land_details->land_SuperBuildupArea_Unit.' '.$property_type_residential.' for '.$property_type->rent_sell.' in '.$property->city;
                                                    $property_title = @$land_details->LandArea.' '.@$land_details->land_SuperBuildupArea_Unit.' '.$property_type_residential.' '.$property->state.' '.$property->city.' '.$property->location.' On '.$property_type->rent_sell;
                                                }elseif($residential == 'Office'){
                                                    //Office Rent
                                                    // $property_title = @$office_details->officeNumberofCabin.' BHK '.$property_type->res_com.' '.$property_type_residential.' for '.$property_type->rent_sell.' in '.$property->city;
                                                    $property_title = @$office_details->officeSuperBuildupArea.' '.$office_details->officeSuperBuildupAreaUnit.' '.$property_type_residential.' '.$property->state.' '.$property->city.' '.$property->location.' On '.$property_type->rent_sell;
                                                    
                                                }elseif($residential == 'ShopOrShowroom'){
                                                    //Shop Rent
                                                    $property_title = @$shop_details->shopSuperBuildupArea	.' '.@$shop_details->shopSuperBuildupAreaUnit.' '.$property_type_residential.' on '.$property_type->rent_sell;
                                                }elseif($residential == 'Warehouse'){
                                                    //Warehouse Rent
                                                    $property_title = @$warehouse_details->warehouseNumberofCabin.' '.$property_type->res_com.' '.$property_type_residential.' on '.$property_type->rent_sell;
                                                }
                                                ?>
                                                <?php echo $property_title; } ?>
                                                <?php }else{ ?>
                                                <?php if(!empty($project)){ echo $project->Marketingby; } ?> 
                                                <?php } ?>
                                            </h2>
                                            <address>
                                                <span><i class="icon-location-pin2"></i>
                                                        <?php if($type == 'property'){ ?>
                                                        <?php if(!empty($property)){ echo $property->address.','.$property->city.','.$property->state.' - '.$property->pincode; } ?>
                                                        <?php }else{ ?>
                                                        <?php if(!empty($project)){ echo $project->location.','.$project->city.','.$project->state.' - '.$project->pincode; } ?>
                                                        <?php } ?>
                                                </span>
                                                <!----------
                                                <span>
                                                    <i class="icon-globe3"></i>
                                                    <a href="#">
                                                    <?php if($type == 'property'){ ?>
                                                    <?php if(!empty($property)){ echo $property->email; } ?>
                                                    <?php } ?>
                                                    </a>
                                                </span> 
                                                <span><i class="icon-phone4"></i>
                                                    <a href="#">
                                                        <?php if($type == 'property'){ ?>
                                                        <?php if(!empty($property)){ echo $property->mobile; } ?>
                                                        <?php } ?>
                                                    </a>
                                                </span>
                                                ----------------->
                                            </address>
                                            
                                        </div>
                                        
                                        <div class="enquire-holder">
                                        <?php if (!empty($this->session->userdata('user'))) { ?>
                                            <a class="enquire-btn-wp" href="<?php echo base_url('home/get_details_on_whatsapp/'. $post_id);?>">Get detail on <img src="<?php echo base_url('assets/front/img/WhatsApp.svg.webp');?>"></a>
                                        <?php } else {?>
                                        <a class="enquire-btn-wp" href="javascript:void(0);" onclick="openLoginModal('<?php echo $post_id; ?>', '<?php echo $property_type->rent_sell; ?>')">Get detail on <img src="<?php echo base_url('assets/front/img/WhatsApp.svg.webp');?>"></a>
                                        <?php }?>
                                            <a class="bgcolor enquire-btn wp-rem-open-signin-tab" data-toggle="modal" href="javascript:void(0);" data-target="#arrange-modal"><i class="icon- icon-calendar-check-o"></i>Site visit Request</a>
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
                                                        <form id="see_details_enquiry_form" name="see_details_enquiry_form" method="post" action="<?php echo base_url(); ?>home/property_enquiry_now" class="enquiry-request-form">
                                                            <div class="row">
                                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                    <div class="field-holder">
                                                                        <i class="icon-user2"></i>
                                                                        <input type="text" placeholder=" Your Name *" class="input-field wp-rem-dev-req-field" name="user_name" id="user_name">
                                                                        <input type="hidden" value="<?php echo $post_id; ?>" name="enquiry_post_id" id="enquiry_post_id">
                                                                        <input type="hidden" value="<?php echo $type; ?>" name="enquiry_post_type" id="enquiry_post_type">
                                                                        <input type="hidden" value="<?php echo current_url(); ?>" name="redirect_url" >
                                                                        <?php if($type == 'property'){ ?>
                                                                        <?php //if(!empty($property)){ echo $property->flatno.' BHK '.$property_type->res_com.' '.$property_type->residential.' for '.$property_type->rent_sell.' in '.$property->city; } ?>
                                                                        <?php
                                                                        if($residential == 'DuplexFlat'){
                                                                            //Duplex Flat
                                                                            $property_title = @$property->details->room.' BHK '.$property_type->res_com.' '.$property_type->residential.' for '.$property_type->rent_sell.' in '.$property->city;;
                                                                        }elseif($residential == 'PentHouse'){
                                                                        //Pent House
                                                                            $property_title = @$property->details->pent_room.' BHK '.$property_type->res_com.' '.$property_type->residential.' for '.$property_type->rent_sell.' in '.$property->city;;
                                                                        }elseif($residential == 'Factory'){
                                                                            //Factory Rent
                                                                            $property_title = @$property->details->factory_numberofcabin.' BHK '.$property_type->res_com.' '.$property_type->residential.' for '.$property_type->rent_sell.' in '.$property->city;;
                                                                        }elseif($residential == 'Flat'){
                                                                            //Flat Rent
                                                                            $property_title = @$property->details->flat_Room.' BHK '.$property_type->res_com.' '.$property_type->residential.' for '.$property_type->rent_sell.' in '.$property->city;;
                                                                        }elseif($residential == 'HouseorBanglow'){
                                                                            //House Rent
                                                                            $property_title = @$property->details->house_Room.' BHK '.$property_type->res_com.' '.$property_type->residential.' for '.$property_type->rent_sell.' in '.$property->city;;
                                                                        }elseif($residential == 'Land'){
                                                                            //Land Rent
                                                                            $property_title = @$property->details->room.' BHK '.$property_type->res_com.' '.$property_type->residential.' for '.$property_type->rent_sell.' in '.$property->city;;
                                                                        }elseif($residential == 'Office'){
                                                                            //Office Rent
                                                                            $property_title = @$property->details->officeNumberofCabin.' BHK '.$property_type->res_com.' '.$property_type->residential.' for '.$property_type->rent_sell.' in '.$property->city;;
                                                                        }elseif($residential == 'ShopOrShowroom'){
                                                                            //Shop Rent
                                                                            $property_title = @$property->details->room.' BHK '.$property_type->res_com.' '.$property_type->residential.' for '.$property_type->rent_sell.' in '.$property->city;;
                                                                        }elseif($residential == 'Warehouse'){
                                                                            //Warehouse Rent
                                                                            $property_title = @$property->details->warehouseNumberofCabin.' BHK '.$property_type->res_com.' '.$property_type->residential.' for '.$property_type->rent_sell.' in '.$property->city;;
                                                                        }
                                                                        ?>
                                                                        <input type="hidden" name="property_name" value="<?php echo $property_title; ?>"/>
                                                                        <?php }else{ ?>
                                                                        
                                                                        <?php if(!empty($project)){ ?>
                                                                        <?php $propertyType = ($project->PropertyStatus == 'Commercial') ? @$project->propertyTypeCom : @$project->propertyTypeRes; ?>
                                                                        <?php if($project->PropertyStatus == 'Commercial'){
                                                                                $propertyType = ($project->propertyTypeCom == 'WareHouse') ? 'Warehouse' : $project->propertyTypeCom;
                                                                            }else{
                                                                                $propertyType = ($project->propertyTypeCom == 'PentHouse') ? 'Penthouse' : $project->propertyTypeRes;
                                                                            }
                                                                         ?>
                                                                        <input type="hidden" name="property_name" value="<?php echo $project->bhk1.' - '.$project->bhk2.' BHK '.$project->PropertyStatus.' '.$propertyType.' for sale in '.$project->city; ?>"/>
                                                                        <?php }} ?>
                                                                        <input type="hidden" name="property_post_user_name" value="<?php if(!empty($post_user)){ echo $post_user->name; } ?>"/>
                                                                        <!--<input type="hidden" name="property_post_user_mobile" value="<?php if(!empty($post_user)){ echo $post_user->phone; } ?>"/>-->
                                                                        <input type="hidden" name="property_post_user_mobile" value="<?php if(!empty($post_user)){ echo $post_user->phone; } ?>"/>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                    <div class="field-holder">
                                                                        <i class="icon-phone4"></i>
                                                                        <input type="text" placeholder=" Your Phone No *" class="input-field" name="user_phone" id="user_phone"> </div>
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
                                                                        <textarea placeholder=" Message * *" class="textarea-field wp-rem-dev-req-field" rows="5" cols="30" name="user_message" id="user_message"></textarea> </div>
                                                                </div>
                                                    <!--            <div class="col-md-12 recaptcha-reload">
                                                                    <div class="g-recaptcha" id="recaptcha_enquery">
                                                                        <div style="width:304px; height:78px;">
                                                                            <iframe style=" border: 0; height: 100%; width: 100%; margin: 0;" src="https://www.google.com/recaptcha/api2/anchor?ar=1&amp;k=6LfzSxIUAAAAADmaB7gQqIXZ34ZdBgw5DthD79nx&amp;co=aHR0cDovL2hvbWV2aWxsYXMuY2hpbXBncm91cC5jb206ODA.&amp;hl=en&amp;v=IU7gZ7o6RDdDE6U4Y1YJJWnN&amp;theme=light&amp;size=normal&amp;cb=3h5jo33egtl6"></iframe>
                                                                        </div>
                                                                    </div> 
                                                                    <a class="recaptcha-reload-a" href="#"><i class="icon-refresh2"></i> Reload</a>
                                                                </div>-->
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
                                                            <form class="viewing-request-form" name="see_details_request_viewing" id="see_details_request_viewing" method="post" action="<?php echo base_url();?>home/property_request_view">
                                                                <input type="hidden" value="<?php echo $post_id; ?>" name="request_post_id" id="request_post_id">
                                                                <input type="hidden" value="<?php echo $type; ?>" name="request_post_type" id="request_post_type">
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
                                        
                                        <div class="property-data mt-10">
                                                <ul>
                                                    <li class="featured-property">
                                                        <span class="bgcolor">Featured</span>
                                                    </li>
                                                    <li class="prop-type"><i class="icon-home3"></i></li>
                                                    <li class="prop-category"><a>
                                                    <?php if($type == 'property'){ // print_r($property_type);?>
                                                    <?php if($property_type->residential == 'HouseorBanglow'){$propertyResidential = 'House / Banglow';}elseif($property_type->residential == 'ShopOrShowroom'){$propertyResidential = 'Shop / Showroom';}elseif($property_type->residential == 'DuplexFlat'){$propertyResidential = 'PG/Co-Living';}elseif($property_type->residential == 'PentHouse'){$propertyResidential = 'Pent House';}else{$propertyResidential = $property_type->residential;} ?>
                                                    <?php //if($property_type->residential == 'HouseorBanglow'){ $propertyResidential= 'House / Banglow';}elseif($property_type->residential== 'ShopOrShowroom'){  $propertyResidential= 'Shop / Showroom'; }elseif($property_type->residential== 'DuplexFlat'){  $propertyResidential= 'Duplex Flat'; }elseif($property->residential== 'PentHouse'){  $propertyResidential= 'Pent House'; }else{  $propertyResidential= $property->residential; }; ?>
                                                    <?php if(!empty($property_type)){ echo $propertyResidential; } ?>
                                                    <?php }else{ ?>
                                                    <?php if(!empty($project)){ ?>
                                                    <?php if($project->PropertyStatus == 'Commercial'){
                                                            $propertyType = ($project->propertyTypeCom == 'WareHouse') ? 'Warehouse' : $project->propertyTypeCom;
                                                        }else{
                                                            $propertyType = ($project->propertyTypeCom == 'PentHouse') ? 'Penthouse' : $project->propertyTypeRes;
                                                        }
                                                    }    ?>
                                                    <?php if(!empty($project)){  echo $propertyType; } ?>
                                                    <?php } ?>
                                                    </a></li>
                                                    <li class="prop-type"><a>on&nbsp; 
                                                    <?php if($type == 'property'){ ?>
                                                    <?php if(!empty($property_type)){ echo $property_type->rent_sell; } ?>
                                                    <?php }else{ ?>
                                                    <?php if(!empty($project)){ echo $project->PropertyType; } ?>
                                                    <?php } ?>
                                                    </a>  </li>
                                                    
                                                    <li class="prop-category">(<a>
                                                        <?php if($type == 'property'){ ?>
                                                        <?php if(!empty($property_type)){ echo $property_type->res_com; } ?>
                                                        <?php }else{ ?>
                                                        <?php if(!empty($project)){ echo $project->PropertyStatus; } ?>
                                                        <?php } ?>
                                                        </a>)
                                                    </li>
                                                    <li class="prop-favourite ml-30" style="float:right;">
                                                        <div class="like-btn">
                                                            <?php if(!empty($this->session->userdata('user'))){ ?>
                                                            <?php if($type == 'property'){ ?>
                                                            <a href="<?php echo base_url(); ?>home/add_property_to_favorite/<?php echo @$property->post_id;?>" class="favourite wp-rem-open-signin-tab">
                                                                <i class="icon-heart5"></i>Save to Favourite 
                                                            </a>
                                                            <?php }else{ ?>
                                                            <a href="<?php echo base_url(); ?>home/add_project_to_favorite/<?php echo @$project->post_id;?>" class="favourite wp-rem-open-signin-tab">
                                                                <i class="icon-heart5"></i>Save to Favourite 
                                                            </a>
                                                            <?php } ?>
                                                            <?php }else{ ?>
                                                            <a data-target="#sign-up" data-toggle="modal" href="#sign-up" class="favourite wp-rem-open-signin-tab">
                                                                <i class="icon-heart5"></i>Save to Favourite 
                                                            </a>
                                                            <?php } ?>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                    </div> 
                                    
                                    <!----- Property Images Slider Start here ---------------->
                                    
    <?php 
        if($type == 'property'){ 
            $images = array('0'=>$property->image_name); 
            foreach(explode(';', $property->images) as $img){ if($img!= ''){ $images[] =  $img; } };
        }if($type == 'project'){  
            $images = array('0'=>$project->image_file); 
            foreach(explode(';', $project->images) as $img){ if($img!= ''){ $images[] =  $img; } };
    // $images = explode(';', $project->images);
            }
    // pre($images);
    ?>
    <?php if(!empty($images && !empty($images[0]))){ ?>

    <div class="slider" id="slider2">
        
        <?php foreach($images as $image){ ?>
        <div class="slide-img">
            <img src="<?php echo base_url();?><?php echo $image;?>">
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
                                    
                                    <!----- Property Images Slider End here ------------------>
                                    
                                    <ul class="categories-holder">
                                        <?php if(($type == 'property') && in_array($property_type->residential, array('DuplexFlat','PentHouse', 'Factory', 'Flat', 'HouseorBanglow', 'Office', 'Warehouse'))){ ?>
                                        <li>
                                            <i class="icon-bed2"></i>
                                            <span class="field-label">Rooms</span>: <span class="field-value">
                                                <?php if($property_type->residential == 'DuplexFlat'){
                                                        echo $duplex_flat_details->upperfloorno;
                                                    }elseif($property_type->residential == 'PentHouse'){
                                                        echo $pent_house_details->pent_room;
                                                    }elseif($property_type->residential == 'Factory'){
                                                        echo @$factory_details->factory_numberofcabin;
                                                    }elseif($property_type->residential == 'Flat'){
                                                       echo  @$flat_details->flat_Room;
                                                    }elseif($property_type->residential == 'HouseorBanglow'){
                                                        echo $house_details->house_Room;
                                                    }elseif($property_type->residential == 'Office'){
                                                        echo $office_details->officeNumberofCabin;
                                                    }elseif($property_type->residential == 'Warehouse'){
                                                        echo $warehouse_details->warehouseNumberofCabin;
                                                    }
                                                ?>
                                            </span> 
                                        </li>
                                        <?php } ?>
                                        <?php if(($type == 'property') && in_array($property_type->residential, array('DuplexFlat','PentHouse','Factory','Flat','HouseorBanglow','Office','ShopOrShowroom',))){ ?>
                                        <li>
                                            <i class="fa fa-bath"></i>
                                            <span class="field-label">Bathrooms</span>: <span class="field-value">
                                                <?php if($property_type->residential == 'DuplexFlat'){
                                                        echo $duplex_flat_details->bathroom;
                                                    }elseif($property_type->residential == 'PentHouse'){
                                                        echo $pent_house_details->pent_bathroom;
                                                    }elseif($property_type->residential == 'Factory'){
                                                        echo $factory_details->factory_Bathroom;
                                                    }elseif($property_type->residential == 'Flat'){
                                                       echo  @$flat_details->flat_Bathroom;
                                                    }elseif($property_type->residential == 'HouseorBanglow'){
                                                        echo $house_details->house_Bathroom;
                                                    }elseif($property_type->residential == 'Office'){
                                                        echo $office_details->officeBathroom;
                                                    }elseif($property_type->residential == 'ShopOrShowroom'){
                                                        $shop_details->shopBathroom;
                                                    }elseif($property_type->residential == 'Warehouse'){
                                                        echo $warehouse_details->warehouseBathroom;
                                                    }
                                                ?>
                                                </span> 
                                            </li>
                                        <?php } ?>
                                        <?php if(($type == 'property') && in_array($property_type->residential, array('DuplexFlat', 'PentHouse', 'Flat', 'HouseorBanglow'))){ ?>
                                        <li>
                                            <i class="icon-directions_car"></i>
                                            <span class="field-label">Balcony</span>: <span class="field-value">
                                                <?php if($property_type->residential == 'DuplexFlat'){
                                                        echo $duplex_flat_details->balcony;
                                                    }elseif($property_type->residential == 'PentHouse'){
                                                        echo $pent_house_details->pent_balcony;
                                                    }elseif($property_type->residential == 'Flat'){
                                                       echo  $flat_details->flat_Balcony;
                                                    }elseif($property_type->residential == 'HouseorBanglow'){
                                                        echo $house_details->house_Balcony;
                                                    }
                                                ?>
                                            </span> 
                                        </li>
                                        <?php } ?>
                                        
                                        <?php if(($type == 'property') && in_array($property_type->residential, array('DuplexFlat', 'PentHouse', 'Flat', 'HouseorBanglow'))){ ?>
                                        <li>
                                            <i class="fa fa-cutlery"></i>
                                            <span class="field-label">Kitchen</span>: <span class="field-value">
                                                <?php if($type == 'property'){ ?>
                                                    <?php if($property_type->residential == 'DuplexFlat'){
                                                            echo $duplex_flat_details->kitchen;
                                                        }elseif($property_type->residential == 'PentHouse'){
                                                            echo $pent_house_details->pent_kitchen;
                                                        }elseif($property_type->residential == 'Flat'){
                                                           echo  $flat_details->flat_Kitchen;
                                                        }elseif($property_type->residential == 'HouseorBanglow'){
                                                            echo $house_details->house_Kitchen;
                                                        }
                                                    ?>
                                                <?php } ?>
                                            </span> 
                                        </li>
                                        <?php } ?>
                                        
                                        
                                        <?php if(($type == 'property') && in_array($property_type->residential, array('DuplexFlat', 'PentHouse','Factory', 'Flat', 'HouseorBanglow', 'Land', 'Office', 'ShopOrShowroom', 'Warehouse'))){ ?>
                                        <!--<li>
                                            <i class="icon-transform"></i>
                                            <span class="field-label">SqFt</span>: <span class="field-value">
                                                <?php if($property_type->residential == 'DuplexFlat'){
                                                        echo $duplex_flat_details->super_buildup_area_unit;
                                                    }elseif($property_type->residential == 'PentHouse'){
                                                        echo $pent_house_details->pent_super_buildup_area_Unit;
                                                    }elseif($property_type->residential == 'Factory'){
                                                        echo $factory_details->factory_super_buildup_area_unit;
                                                    }elseif($property_type->residential == 'Flat'){
                                                       echo  $flat_details->flat_SuperBuildupAreaUnit;
                                                    }elseif($property_type->residential == 'HouseorBanglow'){
                                                        echo $house_details->house_SuperBuildupArea;
                                                    }elseif($property_type->residential == 'Land'){
                                                        $land_details->land_SuperBuildupArea_Unit;
                                                    }elseif($property_type->residential == 'Office'){
                                                        echo $office_details->officeSuperBuildupAreaUnit;
                                                    }elseif($property_type->residential == 'ShopOrShowroom'){
                                                        $shop_details->shopSuperBuildupAreaUnit;
                                                    }elseif($property_type->residential == 'Warehouse'){
                                                        echo $warehouse_details->warehouseSuperBuildupAreaUnit;
                                                    }
                                                ?>
                                            </span> 
                                        </li>-->
                                        <?php } ?>
                                        
                                    </ul>
                                    
                                    
                                    <?php if($type == 'project'){ ?>
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
                                            <li class="col-lg-6 col-md-6 col-sm-6 col-xs-12"> <strong><i class="fa fa-dot-circle-o"></i>Property Use For: </strong><?php echo $project->PropertyStatus;?></li>
                                            <li class="col-lg-6 col-md-6 col-sm-6 col-xs-12"> <strong><i class="fa fa-dot-circle-o"></i>Property Type: </strong><?php if($project->PropertyStatus == 'Residential'){ echo $project->propertyTypeRes; }else{ echo $project->propertyTypeCom; }?></li>
                                            <li class="col-lg-6 col-md-6 col-sm-6 col-xs-12"> <strong><i class="fa fa-dot-circle-o"></i>Size Start From: </strong><?php echo $project->sizestartingfrom; ?> <?php echo $project->sizestartingfromUnit; ?></li>
                                            <li class="col-lg-6 col-md-6 col-sm-6 col-xs-12"> <strong><i class="fa fa-dot-circle-o"></i>Size Upto: </strong><?php echo $project->sizeupto; ?> <?php echo $project->sizeuptoUnit; ?></li>
                                            <li style="display:inline;" class="col-lg-6 col-md-6 col-sm-12 col-xs-12"> <strong><i class="fa fa-dot-circle-o"></i>BHK: </strong><?php echo $project->bhk1; ?> <span style="margin:0 10px 0 10px;">TO</span> <strong>BHK: </strong><?php echo $project->bhk2; ?></li>
                                            <li style="margin-top:14px;" class="col-lg-6 col-md-6 col-sm-6 col-xs-12"> <strong><i class="fa fa-dot-circle-o"></i>Price: </strong><span class="rupess-icon" style="color:#50aeed;font-weight:700;font-size:16px;"><i class="fa fa-rupee mr-0 rupee-fa"></i><?php echo number_format($project->price,2); ?><span>/</span><span>Onward</span></li>
                                        </ul>
                                    </div>
                                    <?php } ?>
                                    
                                    <?php if($type == 'property'){ ?>
                                    <div id="features" class="category-holder">
                                        <div class="element-title">
                                            <h3>PROPERTY TYPE</h3>
                                        </div>
                                        <ul class="category-list">
                                            <li class="col-lg-6 col-md-6 col-sm-6 col-xs-12"> <strong><i class="fa fa-dot-circle-o"></i>Property Purpose: </strong><?php if(!empty($property_type)){ echo $property_type->rent_sell; }?></li>
                                            <li class="col-lg-6 col-md-6 col-sm-6 col-xs-12"> <strong><i class="fa fa-dot-circle-o"></i>Furnished Status: </strong><?php if(!empty($property_type)){ echo $property_type->FurnishedStatus; }?></li>
                                            <li class="col-lg-6 col-md-6 col-sm-6 col-xs-12"> <strong><i class="fa fa-dot-circle-o"></i>Property Use For: </strong><?php if(!empty($property_type)){ echo $property_type->res_com; }?></li>
                                            <?php if($property_type->residential == 'HouseorBanglow'){ $propertyResidential= 'House / Banglow';}elseif($property_type->residential== 'ShopOrShowroom'){  $propertyResidential= 'Shop / Showroom'; }elseif($property_type->residential== 'DuplexFlat'){  $propertyResidential= 'PG/Co-Living'; }elseif($property_type->residential== 'PentHouse'){  $propertyResidential= 'Pent House'; }else{  $propertyResidential= $property_type->residential; }; ?>
                                            <li class="col-lg-6 col-md-6 col-sm-6 col-xs-12"> <strong><i class="fa fa-dot-circle-o"></i>Property Type: </strong><?php echo $propertyResidential; ?></li>
                                        </ul>
                                    </div>
                                    <?php } ?>
                                    
                                    <?php if($type == 'property'){ ?>
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
                                            <?php if(!empty($property_type)){ ?>
                                            <?php if($property_type->rent_sell == 'Rent'){ ?>
                                            <li class="col-lg-6 col-md-6 col-sm-6 col-xs-12"> <strong><i class="fa fa-dot-circle-o"></i>Security Deposite: </strong><span class="rupess-icon" style="color:#50aeed;font-weight:700;font-size:16px;"><i class="fa fa-rupee mr-0 rupee-fa"></i><?php if(!empty($property_type)){ echo number_format($property_type->security_deposite, 2); }?></span></li>
                                            <li class="col-lg-6 col-md-6 col-sm-6 col-xs-12"> <strong><i class="fa fa-dot-circle-o"></i>Rent Per Month: </strong><span class="rupess-icon" style="color:#50aeed;font-weight:700;font-size:16px;"><i class="fa fa-rupee mr-0 rupee-fa"></i><?php if(!empty($property_type)){ echo number_format($property_type->rentPerMonth, 2); }?></span></li>
                                            <?php }else{ ?>
                                            <li class="col-lg-6 col-md-6 col-sm-6 col-xs-12"> <strong><i class="fa fa-dot-circle-o"></i>Net Amount: </strong><span class="rupess-icon" style="color:#50aeed;font-weight:700;font-size:16px;"><i class="fa fa-rupee mr-0 rupee-fa"></i><?php if(!empty($property_type)){ echo number_format($property_type->net_amount, 2); }?></span></li>
                                            <li class="col-lg-6 col-md-6 col-sm-6 col-xs-12"> <strong><i class="fa fa-dot-circle-o"></i>Booking Amount: </strong><span class="rupess-icon" style="color:#50aeed;font-weight:700;font-size:16px;"><i class="fa fa-rupee mr-0 rupee-fa"></i><?php if(!empty($property_type)){ echo number_format($property_type->amount, 2); }?></span></li>
                                            <?php } ?>
                                            <?php } ?>
                                        </ul>
                                    </div>
                                    <?php } ?>
                                    
                                    <div id="features" class="category-holder">
                                        <div class="element-title">
                                            <h3>PROPERTY DETAILS </h3>
                                        </div>
                                        <ul class="category-list">
                                            <!---------------
                                            <?php if(!empty($property_type) && in_array($property_type->residential, array('DuplexFlat', 'PentHouse', 'Factory', 'Flat', 'HouseorBanglow', 'Office', 'Warehouse'))){ ?>
                                            <li class="col-lg-6 col-md-6 col-sm-6 col-xs-12"> <strong><i class="fa fa-dot-circle-o"></i>Room : </strong>
                                                <?php 
                                                    if($property_type->residential == 'DuplexFlat'){
                                                        echo $duplex_flat_details->upperfloorno;
                                                    }elseif($property_type->residential == 'PentHouse'){
                                                        echo $pent_house_details->pent_room;
                                                    }elseif($property_type->residential == 'Factory'){
                                                        echo $factory_details->factory_numberofcabin;
                                                    }elseif($property_type->residential == 'Flat'){
                                                       echo  $flat_details->flat_Room;
                                                    }elseif($property_type->residential == 'HouseorBanglow'){
                                                        echo $house_details->house_Room;
                                                    }elseif($property_type->residential == 'Office'){
                                                        echo $office_details->officeNumberofCabin;
                                                    }elseif($property_type->residential == 'Warehouse'){
                                                        echo $warehouse_details->warehouseNumberofCabin;
                                                    } ?>
                                            </li>
                                            <?php } ?>
                                            ----------------->
                                            <!---------------
                                            <?php if(!empty($property_type) && in_array($property_type->residential, array('DuplexFlat', 'PentHouse', 'Factory', 'Flat', 'HouseorBanglow', 'Office', 'ShopOrShowroom','Warehouse'))){ ?>
                                            <li class="col-lg-6 col-md-6 col-sm-6 col-xs-12"> <strong><i class="fa fa-dot-circle-o"></i>Bathroom : </strong>
                                                <?php if($property_type->residential == 'DuplexFlat'){
                                                    echo $duplex_flat_details->bathroom;
                                                }elseif($property_type->residential == 'PentHouse'){
                                                    echo $pent_house_details->pent_bathroom;
                                                }elseif($property_type->residential == 'Factory'){
                                                    echo $factory_details->factory_Bathroom;
                                                }elseif($property_type->residential == 'Flat'){
                                                   echo  $flat_details->flat_Bathroom;
                                                }elseif($property_type->residential == 'HouseorBanglow'){
                                                    echo $house_details->house_Bathroom;
                                                }elseif($property_type->residential == 'Office'){
                                                    echo $office_details->officeBathroom;
                                                }elseif($property_type->residential == 'ShopOrShowroom'){
                                                    echo $shop_details->shopBathroom;
                                                }elseif($property_type->residential == 'Warehouse'){
                                                    echo $warehouse_details->warehouseBathroom;
                                                }
                                            ?>
                                            </li>
                                            <?php } ?>
                                            ---------------->
                                            <!---------------
                                            <?php if(!empty($property_type) && in_array($property_type->residential, array('DuplexFlat', 'PentHouse', 'Factory', 'Flat', 'HouseorBanglow'))){ ?>
                                            <li class="col-lg-6 col-md-6 col-sm-6 col-xs-12"> <strong><i class="fa fa-dot-circle-o"></i>Balcony : </strong>
                                                <?php if($property_type->residential == 'DuplexFlat'){
                                                    echo $duplex_flat_details->balcony;
                                                }elseif($property_type->residential == 'PentHouse'){
                                                    echo $pent_house_details->pent_balcony;
                                                }elseif($property_type->residential == 'Flat'){
                                                   echo  $flat_details->flat_Balcony;
                                                }elseif($property_type->residential == 'HouseorBanglow'){
                                                    echo $house_details->house_Balcony;
                                                }
                                            ?>
                                            </li>
                                            <?php } ?>
                                            ---------------->
                                            <!---------------
                                            <?php if(!empty($property_type) && in_array($property_type->residential, array('DuplexFlat', 'PentHouse', 'Flat', 'HouseorBanglow'))){ ?>
                                            <li class="col-lg-6 col-md-6 col-sm-6 col-xs-12"> <strong><i class="fa fa-dot-circle-o"></i>Kitchen : </strong>
                                            <?php if($property_type->residential == 'DuplexFlat'){
                                                    echo $duplex_flat_details->kitchen;
                                                }elseif($property_type->residential == 'PentHouse'){
                                                    echo $pent_house_details->pent_kitchen;
                                                }elseif($property_type->residential == 'Flat'){
                                                   echo  $flat_details->flat_Kitchen;
                                                }elseif($property_type->residential == 'HouseorBanglow'){
                                                    echo $house_details->house_Kitchen;
                                                }
                                            ?>
                                            </li>
                                            <?php } ?>
                                            --------------->
                                            <?php if(!empty($property_type) && in_array($property_type->residential, array('Office'))){ ?>
                                                <li class="col-lg-6 col-md-6 col-sm-6 col-xs-12"> <strong><i class="fa fa-dot-circle-o"></i>Number of Cabin : </strong>
                                                <?php if($property_type->residential == 'Office'){
                                                        echo $office_details->officeNumberofCabin;
                                                    }
                                                ?>
                                                </li>
                                            <?php } ?>
                                            <?php if(!empty($property_type) && in_array($property_type->residential, array('Office', 'Factory', 'Office'))){ ?>
                                                <li class="col-lg-6 col-md-6 col-sm-6 col-xs-12"> <strong><i class="fa fa-dot-circle-o"></i>Number of work station : </strong>
                                                <?php if($property_type->residential == 'Factory'){
                                                        echo $factory_details->factory_NumberofWorkStation;
                                                    }elseif($property_type->residential == 'Office'){
                                                        echo $office_details->officeNumberofWorkStation;
                                                    }
                                                ?>
                                                </li>
                                            <?php } ?>
                                            <?php if(!empty($property_type) && in_array($property_type->residential, array('DuplexFlat','PentHouse','Flat','HouseorBanglow','Office', 'Factory','Office','Land','ShopOrShowroom','Warehouse'))){ ?>
                                                <li class="col-lg-6 col-md-6 col-sm-6 col-xs-12"> <strong><i class="fa fa-dot-circle-o"></i>Super Build up Area : </strong>
                                                <?php if($property_type->residential == 'DuplexFlat'){
                                                        echo $duplex_flat_details->super_buildup_area.' '.$duplex_flat_details->super_buildup_area_unit;
                                                    }elseif($property_type->residential == 'PentHouse'){
                                                        echo $pent_house_details->pent_super_buildup_area.' '.$pent_house_details->pent_super_buildup_area_Unit;
                                                    }elseif($property_type->residential == 'Factory'){
                                                        echo $factory_details->factory_super_buildup_area.' '.$factory_details->factory_super_buildup_area_unit;
                                                    }elseif($property_type->residential == 'Flat'){
                                                       echo  $flat_details->flat_SuperBuildupArea.' '.$flat_details->flat_SuperBuildupAreaUnit;
                                                    }elseif($property_type->residential == 'HouseorBanglow'){
                                                        echo $house_details->house_SuperBuildupArea.' '.$house_details->house_SuperBuildupArea_Unit;
                                                    }elseif($property_type->residential == 'Land'){
                                                        echo $land_details->LandArea.' '.$land_details->land_SuperBuildupArea_Unit;
                                                    }elseif($property_type->residential == 'Office'){
                                                        echo $office_details->officeSuperBuildupArea.' '.$office_details->officeSuperBuildupAreaUnit;
                                                    }elseif($property_type->residential == 'ShopOrShowroom'){
                                                        echo $shop_details->shopSuperBuildupArea.' '.$shop_details->shopSuperBuildupAreaUnit;
                                                    }elseif($property_type->residential == 'Warehouse'){
                                                        echo $warehouse_details->warehouseSuperBuildupArea;
                                                    }
                                                ?>
                                                </li>
                                            <?php } ?>
                                            <?php if(!empty($property_type) && in_array($property_type->residential, array('DuplexFlat','PentHouse','Flat','HouseorBanglow','Office', 'Factory','Office','Land','ShopOrShowroom','Warehouse'))){ ?>
                                                <li class="col-lg-6 col-md-6 col-sm-6 col-xs-12"> <strong><i class="fa fa-dot-circle-o"></i>Buld up Area : </strong>
                                                    <?php if($property_type->residential == 'DuplexFlat'){
                                                            echo $duplex_flat_details->buildup_area.' '.$duplex_flat_details->buildup_area_Unit;
                                                        }elseif($property_type->residential == 'PentHouse'){
                                                            echo $pent_house_details->pent_buildup_area.' '.$pent_house_details->pent_buildup_area_Unit;
                                                        }elseif($property_type->residential == 'Factory'){
                                                            echo $factory_details->factory_BuildupArea.' '.$factory_details->factory_BuildupAreaUnit;
                                                        }elseif($property_type->residential == 'Flat'){
                                                           echo  $flat_details->flat_BuildupArea.' '.$flat_details->flat_BuildupArea_Unit;
                                                        }elseif($property_type->residential == 'HouseorBanglow'){
                                                            echo $house_details->house_BuildupArea.' '.$house_details->house_BuildupAreaUnit;
                                                        }elseif($property_type->residential == 'Land'){
                                                            echo $land_details->LandArea.' '.$land_details->land_SuperBuildupArea_Unit;
                                                        }elseif($property_type->residential == 'Office'){
                                                            echo $office_details->officeBuildupArea.' '.$office_details->officeBuildupAreaUnit;
                                                        }elseif($property_type->residential == 'ShopOrShowroom'){
                                                            echo $shop_details->shopBuildupArea.' '.$shop_details->shopBuildupAreaUnit;
                                                        }elseif($property_type->residential == 'Warehouse'){
                                                            echo $warehouse_details->warehouseSuperBuildupArea.' '.$warehouse_details->warehouseBuildupAreaUnit;
                                                        }
                                                    ?>
                                                </li>
                                            <?php } ?>
                                            <?php if(!empty($property_type) && in_array($property_type->residential, array('DuplexFlat','PentHouse','Flat','HouseorBanglow','Office', 'Factory','Office','Land','ShopOrShowroom','Warehouse'))){ ?>
                                                <li class="col-lg-6 col-md-6 col-sm-6 col-xs-12"> <strong><i class="fa fa-dot-circle-o"></i>Covered Area : </strong>
                                                <?php if($property_type->residential == 'DuplexFlat'){
                                                        echo $duplex_flat_details->carpet_area.' '.$duplex_flat_details->carpet_unit;
                                                    }elseif($property_type->residential == 'PentHouse'){
                                                        echo $pent_house_details->pent_carpet_area.' '.$pent_house_details->pent_carpet_unit;
                                                    }elseif($property_type->residential == 'Factory'){
                                                        echo $factory_details->factory_carpet_area.' '.$factory_details->factory_carpet_unit;
                                                    }elseif($property_type->residential == 'Flat'){
                                                       echo  $flat_details->flat_CarpetArea.' '.$flat_details->flat_Carpet_Unit;
                                                    }elseif($property_type->residential == 'HouseorBanglow'){
                                                        echo $house_details->house_CarpetArea.' '.$house_details->house_Carpet_Unit;
                                                    }elseif($property_type->residential == 'Land'){
                                                        echo $land_details->landCoveredArea.' '.$land_details->landCoveredAreaUnit;
                                                    }elseif($property_type->residential == 'Office'){
                                                        echo $office_details->officeCarpetArea.' '.$office_details->officeCarpetUnit;
                                                    }elseif($property_type->residential == 'ShopOrShowroom'){
                                                        echo $shop_details->shopCoveredArea.' '.$shop_details->shopCoveredAreaUnit;
                                                    }elseif($property_type->residential == 'Warehouse'){
                                                        echo $warehouse_details->warehouseOpenArea.' '.$warehouse_details->warehouseCoveredAreaUnit;
                                                    }
                                                ?>
                                                </li>
                                                <?php } ?>
                                            <?php if(!empty($property_type) && in_array($property_type->residential, array('PentHouse', 'Factory','ShopOrShowroom','Warehouse'))){ ?>
                                                <li class="col-lg-6 col-md-6 col-sm-6 col-xs-12"> <strong><i class="fa fa-dot-circle-o"></i>Open Area/Terrace : </strong>
                                                    <?php if($property_type->residential == 'PentHouse'){
                                                            echo $pent_house_details->open_terrace.' '.$pent_house_details->pent_open_terrace_unit;
                                                        }elseif($property_type->residential == 'Factory'){
                                                            echo $factory_details->factory_OpenArea.' '.$factory_details->factory_OpenAreaUnit;
                                                        }elseif($property_type->residential == 'ShopOrShowroom'){
                                                            echo $shop_details->shopOpenArea.' '.$shop_details->shopOpenAreaUnit;
                                                        }elseif($property_type->residential == 'Warehouse'){
                                                            echo $warehouse_details->warehouseOpenArea.' '.$warehouse_details->warehouseOpenAreaUnit;
                                                        }
                                                    ?>
                                                </li>
                                            <?php } ?>
                                            <?php if(!empty($property_type) && in_array($property_type->residential, array('HouseorBanglow'))){ ?>
                                            <li class="col-lg-6 col-md-6 col-sm-6 col-xs-12"> <strong><i class="fa fa-dot-circle-o"></i>Total Land Area : </strong>
                                                 <?php if($property_type->residential == 'HouseorBanglow'){
                                                        echo $house_details->house_TotalLandArea.' '.$house_details->house_TotalLandArea_Unit;
                                                    }
                                                ?>
                                            </li>
                                            <?php } ?>
                                            <?php if(!empty($property_type) && in_array($property_type->residential, array('HouseorBanglow'))){ ?>
                                            <li class="col-lg-6 col-md-6 col-sm-6 col-xs-12"> <strong><i class="fa fa-dot-circle-o"></i>Total Covered Land Area : </strong>
                                                <?php if($property_type->residential == 'HouseorBanglow'){
                                                        echo $house_details->house_TotalCoveredLandArea.' '.$house_details->house_TotalCoveredLandArea_unit;
                                                    }
                                                ?>
                                            </li>
                                            <?php } ?>
                                            <?php if(!empty($property_type) && in_array($property_type->residential, array('HouseorBanglow'))){ ?>
                                            <li class="col-lg-6 col-md-6 col-sm-6 col-xs-12"> <strong><i class="fa fa-dot-circle-o"></i>Total Uncovered Land Area : </strong>
                                                <?php if($property_type->residential == 'HouseorBanglow'){
                                                        echo $house_details->house_TotalUncoveredLandArea.' '.$house_details->house_TotalUncoveredLandArea_Unit;
                                                    }
                                                ?>
                                            </span></li>
                                            <?php } ?>
                                            <?php if(!empty($property_type) && in_array($property_type->residential, array('DuplexFlat','HouseorBanglow'))){ ?>
                                            <li class="col-lg-6 col-md-6 col-sm-6 col-xs-12"> <strong><i class="fa fa-dot-circle-o"></i>Lower Floor : </strong>
                                                <?php if($property_type->residential == 'DuplexFlat'){
                                                        echo $duplex_flat_details->lower_floor_no;
                                                    }elseif($property_type->residential == 'HouseorBanglow'){
                                                        echo $house_details->house_TotalUncoveredLandArea.' '.$house_details->house_TotalUncoveredLandArea_Unit;
                                                    }
                                                ?>
                                            </li>
                                            <?php } ?>
                                            <?php if(!empty($property_type) && in_array($property_type->residential, array('DuplexFlat','HouseorBanglow'))){ ?>
                                            <li class="col-lg-6 col-md-6 col-sm-6 col-xs-12"> <strong><i class="fa fa-dot-circle-o"></i>Upper Floor : </strong>
                                                <?php if($property_type->residential == 'DuplexFlat'){
                                                        echo $duplex_flat_details->upperfloorno;
                                                    }elseif($property_type->residential == 'HouseorBanglow'){
                                                        echo $house_details->house_TotalUncoveredLandArea.' '.$house_details->house_TotalUncoveredLandArea_Unit;
                                                    }
                                                ?>
                                            </li>
                                            <?php } ?>
                                            <?php if(!empty($property_type) && in_array($property_type->residential, array('PentHouse','Factory','Flat','Office','ShopOrShowroom','Warehouse'))){ ?>
                                                <li class="col-lg-6 col-md-6 col-sm-6 col-xs-12"> <strong><i class="fa fa-dot-circle-o"></i>Floor : </strong>
                                                    <?php if($property_type->residential == 'PentHouse'){
                                                            echo $pent_house_details->pent_floor;
                                                        }elseif($property_type->residential == 'Factory'){
                                                            echo $factory_details->factory_floor;
                                                        }elseif($property_type->residential == 'Flat'){
                                                          echo  $flat_details->flat_Floor;
                                                        }elseif($property_type->residential == 'Office'){
                                                            echo $office_details->Flooroffice;
                                                        }elseif($property_type->residential == 'ShopOrShowroom'){
                                                            echo $shop_details->shopFloor;
                                                        }elseif($property_type->residential == 'Warehouse'){
                                                            echo $warehouse_details->warehouseFloor;
                                                        }
                                                    ?>
                                                </li>
                                            <?php } ?>
                                            <?php if(!empty($property_type) && in_array($property_type->residential, array('DuplexFlat','PentHouse','Factory','Flat','HouseorBanglow','Office','ShopOrShowroom','Warehouse'))){ ?>
                                            <li class="col-lg-6 col-md-6 col-sm-6 col-xs-12"> <strong><i class="fa fa-dot-circle-o"></i>Total Floor : </strong>
                                                <?php if($property_type->residential == 'DuplexFlat'){
                                                        echo $duplex_flat_details->totalfloor;
                                                    }elseif($property_type->residential == 'PentHouse'){
                                                        echo $pent_house_details->total_floor;
                                                    }elseif($property_type->residential == 'Factory'){
                                                        echo $factory_details->factory_TotalFloor;
                                                    }elseif($property_type->residential == 'Flat'){
                                                      echo  $flat_details->flat_TotalFloor;
                                                    }elseif($property_type->residential == 'HouseorBanglow'){
                                                        echo $house_details->house_TotalFloor;
                                                    }elseif($property_type->residential == 'Office'){
                                                        echo $office_details->officeTotalFloor;
                                                    }elseif($property_type->residential == 'ShopOrShowroom'){
                                                        echo $shop_details->shopTotalFloor;
                                                    }elseif($property_type->residential == 'Warehouse'){
                                                        echo $warehouse_details->warehouseTotalFloor;
                                                    }
                                                ?>
                                            </li>
                                            <?php } ?>
                                            <?php if(!empty($property_type) && in_array($property_type->residential, array('Warehouse'))){ ?>
                                            <li class="col-lg-6 col-md-6 col-sm-6 col-xs-12"> <strong><i class="fa fa-dot-circle-o"></i>Roof : </strong>
                                                <?php if($property_type->residential == 'Warehouse'){
                                                        echo $warehouse_details->warehouseroof;
                                                    }
                                                ?>
                                            </li>
                                            <?php } ?>
                                            <?php if(!empty($property_type) && in_array($property_type->residential, array('Land'))){ ?>
                                                <li class="col-lg-6 col-md-6 col-sm-6 col-xs-12"> <strong><i class="fa fa-dot-circle-o"></i>Land Status : </strong>
                                                    <?php if($property_type->residential == 'Land'){
                                                            echo $land_details->LandStatus;
                                                        }
                                                    ?>
                                                </li>
                                            <?php } ?>
                                            <?php if(!empty($property_type) && in_array($property_type->residential, array('Land'))){ ?>
                                            <li class="col-lg-6 col-md-6 col-sm-6 col-xs-12"> <strong><i class="fa fa-dot-circle-o"></i>Is it existing owner : </strong>
                                                <?php if($property_type->residential == 'Land'){
                                                        echo $land_details->IstheExistingOwner;
                                                    }
                                                ?>
                                            </li>
                                            <?php } ?>
                                            <?php if(!empty($property_type) && in_array($property_type->residential, array('Land'))){ ?>
                                            <li class="col-lg-6 col-md-6 col-sm-6 col-xs-12"> <strong><i class="fa fa-dot-circle-o"></i>Nature of land : </strong>
                                                <?php if($property_type->residential == 'Land'){
                                                        echo $land_details->NatureofLand;
                                                    }
                                                ?>
                                            </li>
                                            <?php } ?>
                                            <?php if(!empty($property_type) && in_array($property_type->residential, array('Land'))){ ?>
                                            <li class="col-lg-6 col-md-6 col-sm-6 col-xs-12"> <strong><i class="fa fa-dot-circle-o"></i>No of Owner : </strong>
                                                <?php if($property_type->residential == 'Land'){
                                                        echo $land_details->NoOfOwner;
                                                    }
                                                ?>
                                            </li>
                                            <?php } ?>
                                            <?php if(!empty($property_type) && in_array($property_type->residential, array('Land'))){ ?>
                                            <li class="col-lg-6 col-md-6 col-sm-6 col-xs-12"> <strong><i class="fa fa-dot-circle-o"></i>Property Tax : </strong>
                                                <?php if($property_type->residential == 'Land'){
                                                        echo $land_details->PropertyTax;
                                                    }
                                                ?>
                                            </li>
                                            <?php } ?>
                                            <?php if(!empty($property_type) && in_array($property_type->residential, array('Land'))){ ?>
                                            <li class="col-lg-6 col-md-6 col-sm-6 col-xs-12"> <strong><i class="fa fa-dot-circle-o"></i>Mutation : </strong>
                                                <?php if($property_type->residential == 'Land'){
                                                        echo $land_details->Mutation;
                                                    }
                                                ?>
                                            </li>
                                            <?php } ?>
                                            <?php if(!empty($property_type) && in_array($property_type->residential, array('Land'))){ ?>
                                            <li class="col-lg-6 col-md-6 col-sm-6 col-xs-12"> <strong><i class="fa fa-dot-circle-o"></i>Land Facing : </strong>
                                                <?php if($property_type->residential == 'Land'){
                                                        echo $land_details->LandFacing;
                                                    }
                                                ?>
                                            </li>
                                            <?php } ?>
                                            <?php if(!empty($property_type) && in_array($property_type->residential, array('Office', 'Factory', 'ShopOrShowroom'))){ ?>
                                                <li class="col-lg-6 col-md-6 col-sm-6 col-xs-12"> <strong><i class="fa fa-dot-circle-o"></i>Pentry  : </strong>
                                                    <?php if($property_type->residential == 'Factory'){
                                                            echo $factory_details->factory_pentry.' '.$factory_details->factory_pentry_usedFor;
                                                        }elseif($property_type->residential == 'Office'){
                                                            echo $office_details->Pentryoffice.' '.$office_details->PentryofficeUsedFor;
                                                        }elseif($property_type->residential == 'ShopOrShowroom'){
                                                            echo $shop_details->shopPentry.' '.$shop_details->shopPentryUsedFor;
                                                        }
                                                    ?>
                                                </li>
                                            <?php } ?>
                                            <?php if(!empty($property_type) && in_array($property_type->residential, array('Office', 'Factory', 'ShopOrShowroom', 'Warehouse'))){ ?>
                                            <li class="col-lg-6 col-md-6 col-sm-6 col-xs-12"> <strong><i class="fa fa-dot-circle-o"></i>Road Wide : </strong>
                                                <?php if($property_type->residential == 'Factory'){
                                                        echo $factory_details->factory_roadWide.' '.$factory_details->factory_roadWide_unit;
                                                    }elseif($property_type->residential == 'Office'){
                                                        echo $office_details->Pentryoffice.' '.$office_details->PentryofficeUsedFor;
                                                    }elseif($property_type->residential == 'ShopOrShowroom'){
                                                        echo $shop_details->shopRoadWide.' '.$shop_details->shopRoadWideUnit;
                                                    }elseif($property_type->residential == 'Warehouse'){
                                                        echo $warehouse_details->warehouseRoadWide.' '.$warehouse_details->warehouseRoadWideUnit;
                                                    }
                                                ?>
                                            </li>
                                            <?php } ?>
                                            <?php /*if(!empty($property_type) && in_array($property_type->residential, array('Office', 'Factory', 'ShopOrShowroom', 'Warehouse', 'HouseorBanglow', 'Flat', 'PentHouse', 'DuplexFlat'))){ ?>
                                            <li class="col-lg-6 col-md-6 col-sm-6 col-xs-12"> <strong><i class="fa fa-dot-circle-o"></i>Bathroom  : </strong>
                                                <?php if($property_type->residential == 'DuplexFlat'){
                                                        echo $duplex_flat_details->bathroom;
                                                    }elseif($property_type->residential == 'PentHouse'){
                                                        echo $pent_house_details->pent_bathroom;
                                                    }elseif($property_type->residential == 'Factory'){
                                                        echo $factory_details->factory_Bathroom.' '.$factory_details->factory_Bathroom_UsedFor;
                                                    }elseif($property_type->residential == 'Flat'){
                                                      echo  $flat_details->flat_Bathroom;
                                                    }elseif($property_type->residential == 'HouseorBanglow'){
                                                        echo $house_details->house_Bathroom;
                                                    }elseif($property_type->residential == 'Office'){
                                                        echo $office_details->officeBathroom.' '.$office_details->BathroomofficeUsedFor;
                                                    }elseif($property_type->residential == 'ShopOrShowroom'){
                                                        echo $shop_details->shopBathroom.' '.$shop_details->shopBathroomUnit;
                                                    }elseif($property_type->residential == 'Warehouse'){
                                                        echo $warehouse_details->warehouseBathroom.' '.$warehouse_details->warehouseBathroomUsedFor;
                                                    }
                                                ?>
                                            </li>
                                            <?php }*/ ?>
                                            <?php if(!empty($property_type) && in_array($property_type->residential, array('Factory', 'ShopOrShowroom'))){ ?>
                                            <li class="col-lg-6 col-md-6 col-sm-6 col-xs-12"> <strong><i class="fa fa-dot-circle-o"></i>Electric Power : </strong>
                                                <?php if($property_type->residential == 'Factory'){
                                                        echo $factory_details->factory_ElectricPower;
                                                    }elseif($property_type->residential == 'ShopOrShowroom'){
                                                        echo $shop_details->shopElectricPower.' '.$shop_details->shopElectricPowerUnit;
                                                    }
                                                ?>
                                            </li>
                                            <?php } ?>
                                            <?php if(!empty($property_type) && in_array($property_type->residential, array('ShopOrShowroom'))){ ?>
                                            <li class="col-lg-6 col-md-6 col-sm-6 col-xs-12"> <strong><i class="fa fa-dot-circle-o"></i>Available For Bar : </strong>
                                                <?php if($property_type->residential == 'ShopOrShowroom'){
                                                        echo $shop_details->shopAvailableForBar;
                                                    }
                                                ?>
                                            </li>
                                            <?php } ?>
                                            <?php if(!empty($property_type) && in_array($property_type->residential, array('ShopOrShowroom'))){ ?>
                                            <li class="col-lg-6 col-md-6 col-sm-6 col-xs-12"> <strong><i class="fa fa-dot-circle-o"></i>For Resturant : </strong>
                                                <?php if($property_type->residential == 'ShopOrShowroom'){
                                                        echo $shop_details->shopForResturant;
                                                    }
                                                ?>
                                            </li>
                                            <?php } ?>
                                            <?php if(!empty($property_type) && in_array($property_type->residential, array('ShopOrShowroom','Factory', 'Flat', 'Warehouse'))){ ?>
                                                <li class="col-lg-6 col-md-6 col-sm-6 col-xs-12"> <strong><i class="fa fa-dot-circle-o"></i>Heavy Vehicle Parking Upto : </strong>
                                                    <?php if($property_type->residential == 'Factory'){
                                                            echo $factory_details->factory_HeavyVehicleParkingUpto;
                                                        }elseif($property_type->residential == 'Flat'){
                                                          echo  $flat_details->flat_HeavyVehicleParkingUpto;
                                                        }elseif($property_type->residential == 'ShopOrShowroom'){
                                                            echo $shop_details->shopHeavyVehicleParkingUpto;
                                                        }elseif($property_type->residential == 'Warehouse'){
                                                            echo $warehouse_details->warehouseHeavyVehicleParkingUpto;
                                                        }
                                                    ?>
                                                </li>
                                            <?php } ?>
                                            <?php if(!empty($property_type) && in_array($property_type->residential, array('Factory'))){ ?>
                                            <li class="col-lg-6 col-md-6 col-sm-6 col-xs-12"> <strong><i class="fa fa-dot-circle-o"></i>Manufacturing Type : </strong>
                                                <?php if($property_type->residential == 'Factory'){
                                                        echo $factory_details->factory_ManufacturingType;
                                                    }
                                                ?>
                                            </li>
                                            <?php } ?>
                                        </ul>
                                    </div>

                                    <?php if($type == 'property'){ ?>
                                    <div id="features" class="category-holder">
                                        <div class="element-title">
                                            <h3>OTHER INFO</h3>
                                        </div>
                                        <ul class="category-list">
                                            <li class="col-lg-6 col-md-6 col-sm-6 col-xs-12"> <i class="fa fa-dot-circle-o"></i><?php if(!empty($other_details)){ echo $other_details->section; } ?></li>
                                            <?php if($other_details->section == "PossessionFrom"){?>
                                            <li class="col-lg-6 col-md-6 col-sm-6 col-xs-12"> <i class="fa fa-dot-circle-o"></i>
                                                <div class="field-select-holder" style="margin: 0px;">
                                                    <ul class="">
                                                        <li>
                                                            <a>
                                                                <span><strong style="color:#50aeed ;">Date :</strong></span>
                                                                <?php if(!empty($property)){ echo date('d M, Y', strtotime($other_details->PossessionDate)); } ?>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </li>
                                            <?php }?>
                                            <li class="col-lg-6 col-md-6 col-sm-6 col-xs-12"> <strong><i class="fa fa-dot-circle-o"></i>Age of Property: </strong> <?php if(!empty($other_details)){ echo $other_details->AgeofPropeety; } ?> <span>Years Old</span></li>
                                            <li class="col-lg-6 col-md-6 col-sm-6 col-xs-12"> <strong><i class="fa fa-dot-circle-o"></i>Status of Property: </strong><?php if(!empty($other_details)){ echo $other_details->PropertyType; } ?></li>
                                        </ul>

                                        <h3>Parking</h3>
                                        <div class="iba_container mt-20 mb-20">
                                            
                                            <div class="icon_box_area">
                                                <div class="score"><span><?php if(!empty($other_details)){ echo $other_details->OpenParking; } ?></span></div>
                                                <div class="details">
                                                    <p>Open</p>
                                                </div>
                                            </div>
                                            <div class="icon_box_area">
                                                <div class="score"><span><?php if(!empty($other_details)){ echo $other_details->CoveredParking; } ?></span></div>
                                                <div class="details">
                                                    <p>Covered</p>
                                                </div>
                                            </div>
                                            <div class="icon_box_area">
                                                <div class="score"><span><?php if(!empty($other_details)){ echo $other_details->Basement; } ?></span></div>
                                                <div class="details">
                                                    <p>Basement</p>
                                                </div>
                                            </div>
                                            <div class="icon_box_area">
                                                <div class="score"><span><?php if(!empty($other_details)){ echo $other_details->LiftParking; } ?></span></div>
                                                <div class="details">
                                                    <p>Lift Parking</p>
                                                </div>
                                            </div>
                                            <div class="icon_box_area">
                                                <div class="score"><span><?php if(!empty($other_details)){ echo $other_details->TwoWheeler; } ?></span></div>
                                                <div class="details">
                                                    <p>Two Wheeler</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php }elseif($type == 'project'){ ?>
                                    
                                    <div id="features" class="category-holder">
                                            <div class="element-title">
                                                <h3>OTHER INFO</h3>
                                            </div>
                                            <ul class="category-list">
                                                <li class="col-lg-6 col-md-6 col-sm-6 col-xs-12"> <i class="fa fa-dot-circle-o"></i><?php if(!empty($project)){ echo $project->section; } ?></li>
                                                <?php if($project->section == "PossessionFrom"){?>
                                                <li class="col-lg-6 col-md-6 col-sm-6 col-xs-12"> <i class="fa fa-dot-circle-o"></i>
                                                    <div class="field-select-holder" style="margin: 0px;">
                                                        <ul class="">
                                                            <li>
                                                                <a>
                                                                    <span><strong style="color:#50aeed ;">Date :</strong></span>
                                                                    <?php if(!empty($project)){ echo date('d M, Y', strtotime($project->PossessionDate)); } ?>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </li>
                                                <?php }?>
                                                <li class="col-lg-6 col-md-6 col-sm-6 col-xs-12"> <strong><i class="fa fa-dot-circle-o"></i>Age of Property: </strong> <?php if(!empty($project)){ echo $project->AgeofPropeety; } ?> <span>Years Old</span></li>
                                                <?php if(!empty($project)){ ?>
                                                <?php if($project->PropertyStatus == 'Commercial'){
                                                        $propertyType = ($project->propertyTypeCom == 'WareHouse') ? 'Warehouse' : $project->propertyTypeCom;
                                                    }else{
                                                        $propertyType = ($project->propertyTypeCom == 'PentHouse') ? 'Penthouse' : $project->propertyTypeRes;
                                                    }
                                                }
                                                ?>
                                                <li class="col-lg-6 col-md-6 col-sm-6 col-xs-12"> <strong><i class="fa fa-dot-circle-o"></i>Status of Property: </strong><?php if(!empty($project)){ echo $project->PropertyType; } ?></li>
                                            </ul>
    
                                            <div class="iba_container mt-20 mb-20">
                                                <?php if(!empty($project)){ if($project->Open == 1){?>
                                                <div class="icon_box_area">
                                                    <div class="score-style2">Open</div>
                                                </div>
                                                <?php }}?>
                                                
                                                <?php if(!empty($project)){ if($project->Covered == 1){?>
                                                <div class="icon_box_area">
                                                    <div class="score-style2">Covered</div>
                                                </div>
                                                <?php }}?>
                                                <?php if(!empty($project)){ if($project->Basement == 1){?>
                                                <div class="icon_box_area">
                                                    <div class="score-style2">Basement</div>
                                                </div>
                                                <?php }}?>
                                                <?php if(!empty($project)){ if($project->LiftParking == 1){?>
                                                <div class="icon_box_area">
                                                    <div class="score-style2">Lift Parking</div>
                                                </div>
                                                <?php }}?>
                                                <?php if(!empty($project)){ if($project->TwoWheeler == 1){?>
                                                <div class="icon_box_area">
                                                    <div class="score-style2">Two Wheeler</div>
                                                </div>
                                                <?php }}?>
                                            </div>
                                        </div>
                                    <?php } ?>

                                    <?php if($type == 'project'){ ?>
                                    <!--<div id="features" class="category-holder">
                                        <div class="element-title">
                                            <h3>OTHER INFO (Only Post Project)</h3>
                                        </div>
                                        <ul class="category-list">
                                            <li class="col-lg-6 col-md-6 col-sm-6 col-xs-12"> <i class="fa fa-dot-circle-o"></i><?php if(!empty($project)){ echo $project->PropertyType; } ?></li>
                                            <li class="col-lg-6 col-md-6 col-sm-6 col-xs-12"> <i class="fa fa-dot-circle-o"></i>
                                                <div class="field-select-holder" style="margin: 0px;">
                                                    <ul class="">
                                                        <li>
                                                            <a>
                                                                <span><strong style="color:#50aeed ;">Date :</strong></span>
                                                               <?php if(!empty($project)){ echo date('d M, Y', strtotime($project->PossessionDate)); } ?>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </li>
                                            <li class="col-lg-6 col-md-6 col-sm-6 col-xs-12"> <strong><i class="fa fa-dot-circle-o"></i>Age of Property: </strong><?php if(!empty($project)){ echo $project->AgeofPropeety; } ?> <span>Years Old</span></li>
                                            <li class="col-lg-6 col-md-6 col-sm-6 col-xs-12"> <strong><i class="fa fa-dot-circle-o"></i>Property Type: </strong><?php if(!empty($project)){ echo $project->PropertyType; } ?></li>
                                        </ul>
                                        <div class="property-static-text">
                                            <ul>
                                                <li>Open</li>
                                                <li>Covered</li>
                                                <li>Basement</li>
                                                <li>Lift Parking</li>
                                                <li>Two Wheeler</li>
                                            </ul>
                                        </div>
                                    </div>-->
                                    <?php } ?>

                                    <div id="features" class="category-holder">
                                        <div class="element-title">
                                            <h3>Amenities</h3>
                                        </div><?php if($type == 'project'){ ?>
                                        <ul class="category-list">
                                            <?php if(!empty($project)){ if($project->PowerBackup == 1){ ?>
                                            <li class="col-lg-4 col-md-4 col-sm-6 col-xs-12"> <i class="fa fa-battery-half"></i>Power Backup</li>
                                            <?php } } ?>
                                            <?php if(!empty($project)){ if($project->ServiveLift == 1){ ?>
                                            <li class="col-lg-4 col-md-4 col-sm-6 col-xs-12"> <i class="fa fa-sort-numeric-desc"></i>Servive Lift</li>
                                            <?php } } ?>
                                            <?php if(!empty($project)){ if($project->BanquetHall == 1){ ?>
                                            <li class="col-lg-4 col-md-4 col-sm-6 col-xs-12"> <i class="fa fa-building"></i>Banquet Hall</li>
                                            <?php } } ?>
                                            <?php if(!empty($project)){ if($project->GYM == 1){ ?>
                                            <li class="col-lg-4 col-md-4 col-sm-6 col-xs-12"> <i class="icon-lock4"></i>GYM</li>
                                            <?php } } ?>
                                            <?php if(!empty($project)){ if($project->VisitorParking == 1){ ?>
                                            <li class="col-lg-4 col-md-4 col-sm-6 col-xs-12"> <i class="icon-parking"></i>Visitor Parking</li>
                                            <?php } } ?>
                                            <?php if(!empty($project)){ if($project->Intercom == 1){ ?>
                                            <li class="col-lg-4 col-md-4 col-sm-6 col-xs-12"> <i class="icon-location_city"></i>Intercom</li>
                                            <?php } } ?>
                                            <?php if(!empty($project)){ if($project->CCTV == 1){ ?>
                                            <li class="col-lg-4 col-md-4 col-sm-6 col-xs-12"> <i class="fa fa-video-camera"></i>CCTV</li>
                                            <?php } } ?>
                                            <?php if(!empty($project)){ if($project->SwimmingPool == 1){ ?>
                                            <li class="col-lg-4 col-md-4 col-sm-6 col-xs-12"> <i class="fa fa-shower"></i>Swimming Pool</li>
                                            <?php } } ?>
                                            <?php if(!empty($project)){ if($project->CloubHouse == 1){ ?>
                                            <li class="col-lg-4 col-md-4 col-sm-6 col-xs-12"> <i class="fa fa-home"></i>Cloub House</li>
                                            <?php } } ?>
                                            <?php if(!empty($project)){ if($project->SarvantRoom == 1){ ?>
                                            <li class="col-lg-4 col-md-4 col-sm-6 col-xs-12"> <i class="icon-directions_railway"></i>Sarvant Room</li>
                                            <?php } } ?>
                                            <?php if(!empty($project)){ if($project->Lift == 1){ ?>
                                            <li class="col-lg-4 col-md-4 col-sm-6 col-xs-12"> <i class="fa fa-list-ol"></i>Lift</li>
                                            <?php } } ?>
                                            <?php if(!empty($project)){ if($project->WIFI == 1){ ?>
                                            <li class="col-lg-4 col-md-4 col-sm-6 col-xs-12"> <i class="fa fa-wifi"></i>WIFi</li>
                                            <?php } } ?>
                                            <?php if(!empty($project)){ if($project->CommunityHall == 1){ ?>
                                            <li class="col-lg-4 col-md-4 col-sm-6 col-xs-12"> <i class="icon-local_laundry_service"></i>Community Hall</li>
                                            <?php } } ?>
                                            <?php if(!empty($project)){ if($project->IndoorGame == 1){ ?>
                                            <li class="col-lg-4 col-md-4 col-sm-6 col-xs-12"> <i class="fa fa-gamepad"></i>Indoor Game</li>
                                            <?php } } ?>
                                            <?php if(!empty($project)){ if($project->OutDoorGame == 1){ ?>
                                            <li class="col-lg-4 col-md-4 col-sm-6 col-xs-12"> <i class="fa fa-gamepad"></i>Out Door Game</li>
                                            <?php } } ?>
                                            <?php if(!empty($project)){ if($project->GasPipeLine == 1){ ?>
                                            <li class="col-lg-4 col-md-4 col-sm-6 col-xs-12"> <i class="fa fa-stumbleupon"></i>Gas Pipe Line</li>
                                            <?php } } ?>
                                            <?php if(!empty($project)){ if($project->Park == 1){ ?>
                                            <li class="col-lg-4 col-md-4 col-sm-6 col-xs-12"> <i class="icon-tree"></i>Park</li>
                                            <?php } } ?>
                                            <?php if(!empty($project)){ if($project->Security == 1){ ?>
                                            <li class="col-lg-4 col-md-4 col-sm-6 col-xs-12"> <i class="fa fa-shield"></i>24Hr. Security</li>
                                            <?php } } ?>
                                        </ul>
                                        <?php } ?>
                                        <?php if($type == 'property'){ ?>
                                        <ul class="category-list">
                                            <?php if(!empty($amenities)){ if($amenities->PowerBackup == 1){ ?>
                                            <li class="col-lg-4 col-md-4 col-sm-6 col-xs-12"> <i class="fa fa-battery-half"></i>Power Backup</li>
                                            <?php } } ?>
                                            <?php if(!empty($amenities)){ if($amenities->ServiveLift == 1){ ?>
                                            <li class="col-lg-4 col-md-4 col-sm-6 col-xs-12"> <i class="fa fa-sort-numeric-desc"></i>Servive Lift</li>
                                            <?php } } ?>
                                            <?php if(!empty($amenities) && $property_type->res_com == 'Residential'){ if($amenities->BanquetHall == 1){ ?>
                                            <li class="col-lg-4 col-md-4 col-sm-6 col-xs-12"> <i class="fa fa-building"></i>Banquet Hall</li>
                                            <?php } } ?>
                                            <?php if(!empty($amenities) && $property_type->res_com == 'Residential'){ if($amenities->GYM == 1){ ?>
                                            <li class="col-lg-4 col-md-4 col-sm-6 col-xs-12"> <i class="icon-lock4"></i>GYM</li>
                                            <?php } } ?>
                                            <?php if(!empty($amenities)){ if($amenities->VisitorParking == 1){ ?>
                                            <li class="col-lg-4 col-md-4 col-sm-6 col-xs-12"> <i class="icon-parking"></i>Visitor Parking</li>
                                            <?php } } ?>
                                            <?php if(!empty($amenities) && $property_type->res_com == 'Residential'){ if($amenities->Intercom == 1){ ?>
                                            <li class="col-lg-4 col-md-4 col-sm-6 col-xs-12"> <i class="icon-location_city"></i>Intercom</li>
                                            <?php } } ?>
                                            <?php if(!empty($amenities)){ if($amenities->CCTV == 1){ ?>
                                            <li class="col-lg-4 col-md-4 col-sm-6 col-xs-12"> <i class="fa fa-video-camera"></i>CCTV</li>
                                            <?php } } ?>
                                            <?php if(!empty($amenities) && $property_type->res_com == 'Residential'){ if($amenities->SwimmingPool == 1){ ?>
                                            <li class="col-lg-4 col-md-4 col-sm-6 col-xs-12"> <i class="fa fa-shower"></i>Swimming Pool</li>
                                            <?php } } ?>
                                            <?php if(!empty($amenities) && $property_type->res_com == 'Residential'){ if($amenities->CloubHouse == 1){ ?>
                                            <li class="col-lg-4 col-md-4 col-sm-6 col-xs-12"> <i class="fa fa-home"></i>Cloub House</li>
                                            <?php } } ?>
                                            <?php if(!empty($amenities) && $property_type->res_com == 'Residential'){ if($amenities->SarvantRoom == 1){ ?>
                                            <li class="col-lg-4 col-md-4 col-sm-6 col-xs-12"> <i class="icon-directions_railway"></i>Sarvant Room</li>
                                            <?php } } ?>
                                            <?php if(!empty($amenities)){ if($amenities->Lift == 1){ ?>
                                            <li class="col-lg-4 col-md-4 col-sm-6 col-xs-12"> <i class="fa fa-list-ol"></i>Lift</li>
                                            <?php } } ?>
                                            <?php if(!empty($amenities)){ if($amenities->WIFI == 1){ ?>
                                            <li class="col-lg-4 col-md-4 col-sm-6 col-xs-12"> <i class="fa fa-wifi"></i>WIFi</li>
                                            <?php } } ?>
                                            <?php if(!empty($amenities) && $property_type->res_com == 'Residential'){ if($amenities->CommunityHall == 1){ ?>
                                            <li class="col-lg-4 col-md-4 col-sm-6 col-xs-12"> <i class="icon-local_laundry_service"></i>Community Hall</li>
                                            <?php } } ?>
                                            <?php if(!empty($amenities) && $property_type->res_com == 'Residential'){ if($amenities->IndoorGame == 1){ ?>
                                            <li class="col-lg-4 col-md-4 col-sm-6 col-xs-12"> <i class="fa fa-gamepad"></i>Indoor Game</li>
                                            <?php } } ?>
                                            <?php if(!empty($amenities) && $property_type->res_com == 'Residential'){ if($amenities->OutDoorGame == 1){ ?>
                                            <li class="col-lg-4 col-md-4 col-sm-6 col-xs-12"> <i class="fa fa-gamepad"></i>Out Door Game</li>
                                            <?php } } ?>
                                            <?php if(!empty($amenities) && $property_type->res_com == 'Residential'){ if($amenities->GasPipeLine == 1){ ?>
                                            <li class="col-lg-4 col-md-4 col-sm-6 col-xs-12"> <i class="fa fa-stumbleupon"></i>Gas Pipe Line</li>
                                            <?php } } ?>
                                            <?php if(!empty($amenities) && $property_type->res_com == 'Residential'){ if($amenities->Park == 1){ ?>
                                            <li class="col-lg-4 col-md-4 col-sm-6 col-xs-12"> <i class="icon-tree"></i>Park</li>
                                            <?php } } ?>
                                            <?php if(!empty($amenities)){ if($amenities->Security == 1){ ?>
                                            <li class="col-lg-4 col-md-4 col-sm-6 col-xs-12"> <i class="fa fa-shield"></i>24Hr. Security</li>
                                            <?php } } ?>       
                                        </ul>
                                        <?php } ?>
                                    </div>
                                    
                                    <div id="property-detail" class="description-holder">
                                        <div class="property-dsec">
                                            <div class="element-title">
                                                <h3>PROPERTY DESCRIPTION</h3>
                                            </div>
                                            <p>
                                                <?php if($type == 'property'){  ?>
                                                <?php if(!empty($property_type)){ if($property_type->res_com == 'Residential'){ echo @$amenities->comment1; }else{echo @$amenities->comment;} } ?>
                                                <?php }else{ ?>
                                                <?php if(!empty($project)){ echo $project->comment; } ?>
                                                <?php } ?>
                                            </p>
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
                                                    <?php if(!empty($this->session->userdata('user')['user_id'])){ ?>
                                                    <a href="#write-review-area" class="post-reviews-btn is-login-modal">Write new review</a>
                                                    <?php }else{ ?>
                                                    <a href="#sign-up" data-target="#sign-up" data-toggle="modal" class="post-reviews-btn is-login-modal">Write new review</a>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <div class="rating-sumary-holder">
                                                    <div class="row">
                                                        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 ratings-summary-container">
                                                            <div class="rating-summary">
                                                                <div class="overall-rate-big" ><?php echo number_format($avg_rate, 2);?></div>
                                                                <div style="display:none;">3</div>
                                                                <div class="overall-heading-holder">
                                                                    <span class="overall-heading-txt">Overall rating</span>
                                                                    <div class="rating-holder">
                                                                        <div class="rating-star">
                                                                            <span style="width: <?php echo (($avg_rate/5)*100); ?>%;" class="rating-box"></span>
                                                                        </div>
                                                                    </div>
                                                                    <span class="rating-based-txt">based on all ratings</span>
                                                                </div>
                                                                <!--<ul class="all-service-list">
                                                                    <li><span>Service</span> <strong>100%</strong></li>
                                                                    <li><span>Quality</span> <strong>100%</strong></li>
                                                                    <li><span>Value</span> <strong>100%</strong></li>
                                                                </ul>-->
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 overall-ratings-container">
                                                            <div class="overall-rating">
                                                                <ul class="reviews-box">
                                                                    <?php if(!empty($list_reviews)){ ?>
                                                                    <li>
                                                                        <span class="label">5</span>
                                                                        <span class="item-list">
                                                                            <span style="width: <?php echo (($count_rate_5->count/count($list_reviews))*100); ?>%"></span>
                                                                        </span>
                                                                        <span class="label"><?php echo number_format((($count_rate_5->count/count($list_reviews))*100), 2); ?>%</span>
                                                                    </li>
                                                                    <li>
                                                                        <span class="label">4</span>
                                                                        <span class="item-list">
                                                                            <span style="width: <?php echo (($count_rate_4->count/count($list_reviews))*100); ?>%"></span>
                                                                        </span>
                                                                        <span class="label"><?php echo number_format((($count_rate_4->count/count($list_reviews))*100), 2); ?>%</span>
                                                                    </li>
                                                                    <li>
                                                                        <span class="label">3</span>
                                                                        <span class="item-list">
                                                                            <span style="width: <?php echo (($count_rate_3->count/count($list_reviews))*100); ?>%"></span>
                                                                        </span>
                                                                        <span class="label"><?php echo number_format((($count_rate_3->count/count($list_reviews))*100), 2); ?>%</span>
                                                                    </li>
                                                                    <li>
                                                                        <span class="label">2</span>
                                                                        <span class="item-list">
                                                                            <span style="width: <?php echo (($count_rate_2->count/count($list_reviews))*100); ?>%"></span>
                                                                        </span>
                                                                        <span class="label"><?php echo number_format((($count_rate_2->count/count($list_reviews))*100), 2); ?>%</span>
                                                                    </li>
                                                                    <li>
                                                                        <span class="label">1</span>
                                                                        <span class="item-list">
                                                                            <span style="width: <?php echo (($count_rate_1->count/count($list_reviews))*100); ?>%"></span>
                                                                        </span>
                                                                        <span class="label"><?php echo number_format((($count_rate_1->count/count($list_reviews))*100), 2); ?>%</span>
                                                                    </li>
                                                                    <?php } ?>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="review-list">
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                    <div class="elements-title">
                                                        <h5><?php echo count($list_reviews);?> Reviews</h5>
                                                        <div class="sort-by">
                                                            <ul class="reviews-sortby">
                                                                <li>
                                                                    <span>Sort by: <strong class="active-sort">Newest Reviews</strong></span>
                                                                    <div class="reviews-sort-dropdown">
                                                                        <form>
                                                                            <div class="input-reviews">
                                                                                <div class="radio-field">
                                                                                    <input name="review_filters" id="check-1" type="radio" value="newest_reviews">
                                                                                    <label for="check-1">Newest Reviews</label>
                                                                                </div>
                                                                                <div class="radio-field">
                                                                                    <input name="review_filters" id="check-2" type="radio" value="highest_ratings">
                                                                                    <label for="check-2">Highest Rating</label>
                                                                                </div>
                                                                                <div class="radio-field">
                                                                                    <input name="review_filters" id="check-3" type="radio" value="lowest_ratings">
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
                                                <ul class="review-property" id="post_reviews">
                                                <?php if(!empty($list_reviews)){ ?>
                                                <?php foreach($list_reviews as $i=>$row){ ?>
                                                <?php if($i<5){ ?>
                                                    <li class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                        <div class="list-holder ">
                                                            <div class="img-holder">
                                                                <?php if(@$row->profile != ''){ ?>
                                                                <figure><img src="<?php echo base_url(); ?>assets/front/img/default-img.jpg" alt="#"></figure>
                                                                <?php }else{ ?>
                                                                <figure><img src="<?php echo base_url(); ?>assets/front/img/default-img.jpg" alt="#"></figure>
                                                                <?php } ?>
                                                            </div>
                                                            <div class="img-holder-content">
                                                                <div class="review-title">
                                                                    <p><?php echo @$row->name;?></p>
                                                                    <div class="rating-holder">
                                                                        <em><?php echo date('M Y', strtotime($row->created));?></em>
                                                                        <div class="rating-star" data-toggle="popover_html">
                                                                            <span style="width: <?php echo (($row->rate*100)/5)?>%;" class="rating-box"></span>
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
                                                                <!--<div class="review-helpful-holder">
                                                                    <a href="#" class="mark-review-helpful"><i class="icon-thumbs-o-up"></i> <span class="marked-helpful-txt">Helpful</span>
                                                                        <div class="marked-helpful-counts"><span>15</span></div>
                                                                    </a>
                                                                </div>
                                                                <div class="review-flag-holder">
                                                                    <a href="#" class="mark-review-flag"><i class="icon-flag-o"></i> <span class="marked-flag-txt">Flag</span></a>
                                                                </div>-->
                                                            </div>
                                                            <div class="review-text">
                                                                <p><?php echo $row->review_msg; ?></p>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <?php } ?>
                                                    <?php } ?>
                                                    <?php } ?>
                                                    
                                                    <?php if(count($list_reviews) > 5){ ?>
                                                    <button onclick="view_more_review()">View More..</button>
                                                    <div id="toggle-div" style="display:none;">
                                                    <?php for($i= 5; $i<count($list_reviews); $i++){ ?>
                                                    <li class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                        <div class="list-holder ">
                                                            <div class="img-holder">
                                                                <?php if(@$list_reviews[$i]->profile != ''){ ?>
                                                                <figure><img src="<?php echo base_url(); ?>assets/front/img/default-img.jpg" alt="#"></figure>
                                                                <?php }else{ ?>
                                                                <figure><img src="<?php echo base_url(); ?>assets/front/img/default-img.jpg" alt="#"></figure>
                                                                <?php } ?>
                                                            </div>
                                                            <div class="img-holder-content">
                                                                <div class="review-title">
                                                                    <p>Prakash Agarwal</p>
                                                                    <div class="rating-holder">
                                                                        <em><?php echo date('M Y', strtotime($list_reviews[$i]->created));?></em>
                                                                        <div class="rating-star" data-toggle="popover_html">
                                                                            <span style="width: <?php echo (($list_reviews[$i]->rate*100)/5)?>%;" class="rating-box"></span>
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
                                                                <!--<div class="review-helpful-holder">
                                                                    <a href="#" class="mark-review-helpful"><i class="icon-thumbs-o-up"></i> <span class="marked-helpful-txt">Helpful</span>
                                                                        <div class="marked-helpful-counts"><span>15</span></div>
                                                                    </a>
                                                                </div>
                                                                <div class="review-flag-holder">
                                                                    <a href="#" class="mark-review-flag"><i class="icon-flag-o"></i> <span class="marked-flag-txt">Flag</span></a>
                                                                </div>-->
                                                            </div>
                                                            <div class="review-text">
                                                                <p><?php echo $list_reviews[$i]->review_msg; ?></p>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <?php } ?>
                                                    </div>
                                                    <?php } ?>
                                                </ul>
                                            </div>
                                        </div>

                                        <!------- Start Write Reviews Area-->
                                        <div id="write-review-area" class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="display:<?php if(!empty($this->session->userdata('user')['user_id'])){ echo 'block'; }else{ echo 'none'; } ?>;">
                                            <div class="element-title">
                                                <h3>Write a Reviews</h3>
                                            </div>
                                            <div class="contact-member-form member-detail">
                                                <form class="contactform_name" method="post" name="property_review_rating_form" id="property_review_rating_form" action="<?php echo base_url();?>home/add_ratings" style="background-color:transparent;padding:15px;border:none;">
                                                    <div class="row">
                                                        <input type="hidden" name="property_type" value="<?php echo $type; ?>" />
                                                        <input type="hidden" name="post_id" value="<?php echo $post_id; ?>" />
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
                                </div>
                            

                                <div class="sidebar col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                    <!--<div class="widget widget-map-sec">-->
                                    <!--    <div class="row">-->
                                    <!--        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">-->
                                    <!--            <div class="clear"></div>-->
                                    <!--            <div class="cs-map-section">-->
                                    <!--                <div class="cs-map" style="position: relative; z-index: 1;">-->
                                    <!--                    <div class="cs-map-content">-->
                                    <!--                        <div style="width: 100%; height: 382px;">-->
                                    <!--                            <iframe style="width: 100%; height: 100%; border:0; margin:0;" src="https://maps.google.com/maps?width=100%25&amp;height=600&amp;hl=en&amp;q=1%20Grafton%20Street,%20Dublin,%20Ireland+(My%20Business%20Name)&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe>-->
                                    <!--                        </div>-->
                                    <!--                    </div>-->
                                    <!--                </div>-->
                                    <!--            </div>-->
                                    <!--        </div>-->
                                    <!--    </div>-->
                                    <!--</div>-->
                                    <div id="contactfrm696962" class="contact-member-form member-detail">
                                        <div class="profile-info detail-view-5">
                                            <div class="img-holder">
                                                <figure>
                                                    <a href="#">
                                                        <?php if(!empty($post_user) && @$post_user->profile != ''){ ?>
                                                        <img src="<?php echo base_url().$post_user->profile; ?>" alt="#">
                                                        <?php }else{ ?>
                                                        <img src="<?php echo base_url(); ?>assets/front/img/default-img.jpg" alt="#">
                                                        <?php } ?>
                                                    </a>
                                                </figure>
                                            </div>
                                            <?php if($type == 'project'){ $user_type = $project->user_type;} ?>
                                            <?php if($type == 'property'){ $user_type = $property->user_type;} ?>
                                            <?php if($user_type == 'Super Admin' || $user_type == 'Admin'){ ?>
                                            <div class="text-holder">
                                                <a href="#">
                                                    <h5><?php if(!empty($post_user)){ echo $post_user->name; } ?></h5>
                                                </a>
                                                <ul>
                                                    <li><?php if(!empty($post_user)){ echo $post_user->address1; } ?></li>
                                                    <li>
                                                        <span class="sh-hde-cnt-num sh-hde-cnt-num" data-onum="<?php if(!empty($post_user)){ echo $post_user->mobile1; } ?>">
                                                        <a class="cntct-num-hold" href="tel:<?php if(!empty($post_user)){ echo $post_user->mobile1; } ?>">+<?php if(!empty($post_user)){ echo $post_user->mobile1; } ?></a> 
                                                    </li>
                                                </ul>
                                            </div>
                                            <?php }else{ ?>
                                            <div class="text-holder">
                                                <a>
                                                    <h5 style="margin:0;padding:0;"><!--<?php if(!empty($post_user)){ echo $post_user->name; } ?>--><?php if(!empty($post_user)){ echo substr($post_user->name, 0, 3).str_repeat('*', strlen(@$post_user->name) - 3); } ?></h5>
                                                </a>
                                                <ul>
                                                    <li>
                                                        <span class="sh-hde-cnt-num sh-hde-cnt-num">
                                                        <a class="cntct-num-hold"><?php if(!empty($post_user)){ echo $post_user->address; } ?></a>   
                                                        </span>
                                                    </li>
                                                    <li>
                                                        <span class="sh-hde-cnt-num sh-hde-cnt-num" data-onum="<?php if(!empty($post_user)){ echo substr($post_user->phone, -4); } ?>">
                                                        <a class="cntct-num-hold" href="tel:<?php if(!empty($post_user)){ echo $post_user->phone; } ?>"><?php if(!empty($post_user)){ echo substr($post_user->phone,0,strlen($post_user->phone)-4); } ?>
                                                        <span class="ch-cntct-num">xxxx</span>
                                                        </a> 
                                                    </li>
                                                    <!------
                                                    <li><a class="post-reviews-btn is-login-modal mt-10" data-toggle="modal" href="#enquiry-modal">See Details</a></li>
                                                    -------->
                                                </ul>
                                            </div>
                                            <?php } ?>
                                        </div>
                                        <form class="contactform_name" name="contactform_name" name="see_details_contact_form" id="see_details_contact_form" method="post" action="<?php echo base_url(); ?>home/property_contact_form">
                                            <div class="row">
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                    <div class="field-holder">
                                                        <i class="icon- icon-user4"></i>
                                                        <input type="text"  placeholder=" Your Name *" class="input-field wp-rem-dev-req-field" name="full_name" id="full_name"> 
                                                        <input type="hidden"  placeholder=" Your Name *" class="input-field wp-rem-dev-req-field" name="post_id" id="post_id" value="<?php echo $post_id ?>"> 
                                                        <input type="hidden"  placeholder=" Your Name *" class="input-field wp-rem-dev-req-field" name="type" id="type" value="<?php echo $type ?>">
                                                        <input type="hidden"  placeholder=" Your Name *" class="input-field wp-rem-dev-req-field" name="user_email" value="<?php echo $property->email; ?>">
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

                                    <?php if($type == 'project'){ ?>
                                    <div id="attachments" class="attachment-holder">
                                        <div class="element-title">
                                            <h3>Files attachments</h3>
                                        </div>
                                        <ul>
                                            <li>
                                                <div class="img-holder">
                                                    <figure><a target="_blank" href="<?php echo base_url(); ?><?php echo $project->image_file; ?>">
                                                        <img src="<?php echo base_url(); ?>assets/front/img/image-file.jpeg" alt="#"></a>
                                                    </figure>
                                                </div>
                                                <div class="text-holder">
                                                    <strong><a>Property Images</a></strong>
                                                    <ul class="attachment-formats">
                                                        <?php if($type == "property" && !empty($property)){ ?>
                                                        <li><a target="_blank" href="<?php echo base_url(); ?><?php echo $property->image_name; ?>">Download</a></li>
                                                        <?php }elseif($type == "project" && !empty($project)){ ?>
                                                        <li><a target="_blank" href="<?php echo base_url(); ?><?php echo $project->image_file; ?>">Download</a></li>
                                                        <?php } ?>
                                                    </ul>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="img-holder">
                                                    <figure><a target="_blank" href="<?php echo $project->video_file; ?>">
                                                        <img src="<?php echo base_url(); ?>assets/front/img/video-file.jpeg" alt="#"></a>
                                                    </figure>
                                                </div>
                                                <div class="text-holder">
                                                    <strong><a>Property Videos</a></strong>
                                                    <ul class="attachment-formats">
                                                        <?php if($type == "property" && !empty($property)){ ?>
                                                        <li><a target="_blank" download href="<?php echo $property->video_name; ?>">Download</a></li>
                                                        <?php }elseif($type == "project" && !empty($project)){ ?>
                                                        <li><a target="_blank" download href="<?php echo $project->video_file; ?>">Download</a></li>
                                                        <?php } ?>
                                                    </ul>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="img-holder">
                                                    <figure><a target="_blank" href="<?php echo base_url(); ?><?php echo $project->pdf_file; ?>"><img src="<?php echo base_url(); ?>assets/front/img/pdf.jpeg" alt="#"></a></figure>
                                                </div>
                                                <div class="text-holder">
                                                    <strong><a target="_blank">Poperty Documents</a></strong>
                                                    <ul class="attachment-formats">
                                                        <?php if($type == "property" && !empty($property)){ ?>
                                                        <!--<li><a href="<?php echo base_url(); ?><?php //echo $property->pdf_name; ?>">Download</a></li>-->
                                                        <li><a target="_blank" href="#">Download</a></li>
                                                        <?php }elseif($type == "project" && !empty($project)){ ?>
                                                        <li><a target="_blank" href="<?php echo base_url(); ?><?php echo $project->pdf_file; ?>">Download</a></li>
                                                        <?php } ?>
                                                    </ul>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <?php } ?>

                                    <div id="video" class="video-holder">
                                        <div class="element-title">
                                            <h3>Property Video</h3>
                                        </div>
                                        <div class="video-fit-holder">
                                            <div class="img-holder" style="background-image:url(assets/extra-images/property-image01.webp);background-repeat:no-repeat;background-position:center;background-size:cover;width:100%;height:200px;">
                                                <!--<span class="play-btn">-->
                                                    <!--<a id="play-video" data-id="5910" class="video-btn" href="#"><i class="icon-play_arrow"></i></a>-->
                                                        <?php if($type == "property" && !empty($property)){ ?>
                                                            <!--<video width="320" height="240" controls>
                                                                <source src="<?php echo base_url(); ?><?php echo $property->video_name; ?>" type="video/mp4">
                                                            </video>-->
                                                            <a target="_BLANK" href="<?php echo $property->video_name; ?>">View</a>
                                                        <?php }elseif($type == "project" && !empty($project)){ ?>
                                                            <!--<video width="320" height="240" controls>
                                                                <source src="<?php echo base_url(); ?><?php echo $project->video_file; ?>" type="video/mp4">
                                                            </video>-->
                                                            <a target="_BLANK" href="<?php echo $project->video_file; ?>">View</a>
                                                        <?php } ?>
                                                <!--</span>-->
                                            </div>
                                        </div>
                                    </div>

                                </div><!-- Closed -sidebar col-lg-4 col-md-4 col-sm-12 col-xs-12 -->
                            </div><!-- End row -->
                        </div><!-- container -->
                    </div><!-- property-detail -->
                </div><!-- page-section property-detail-view1-section-->
        <?php if(!empty($nearby_property)){?>
                <div class="page-section detail-nearby-properties">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="property-grid-slider real-estate-property">
                            <div class="element-title">
                                <h3>Properties on the Market Nearby</h3>
                            </div>
                            <div class="swiper-container">
                                <div class="swiper-wrapper">
                                    <?php if(!empty($nearby_property)){ ?>
                                    <?php foreach($nearby_property as $property){ ?>
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
                                            <figcaption> <span class="featured"><?php echo $property->city; ?></span>
                                                    <div class="caption-inner">
                                                        <ul class="rem-property-options">
                                                            <li class="property-like-opt">
                                                                <div class="option-holder">
                                                                    <div class="like-btn">
                                                                        <!--<a href="#" class="favourite wp-rem-open-signin-tab">
                                                                            <i class="icon-heart-o"></i>
                                                                            <div class="option-content">
                                                                                <span>Save to Favourite</span>
                                                                            </div>
                                                                        </a>-->
                                                                         <?php if(!empty($this->session->userdata('user'))){ ?>
                                                                            <?php if($type == 'property'){ ?>
                                                                            <a href="<?php echo base_url(); ?>home/add_property_to_favorite/<?php echo $property->post_id;?>" class="favourite wp-rem-open-signin-tab">
                                                                                <i class="icon-heart-o"></i>
                                                                                <div class="option-content">
                                                                                    <span>Save to Favourite</span>
                                                                                </div>
                                                                            </a>
                                                                            <?php }else{ ?>
                                                                            <a href="<?php echo base_url(); ?>home/add_project_to_favorite/<?php echo $project->post_id;?>" class="favourite wp-rem-open-signin-tab">
                                                                                <i class="icon-heart-o"></i>
                                                                                <div class="option-content">
                                                                                    <span>Save to Favourite</span>
                                                                                </div>
                                                                            </a>
                                                                            <?php } ?>
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
                                                                    <a href="<?php echo base_url().$property->image_name; ?>" data-rel="prettyPhoto[gal4]" class="rem-pretty-photos">
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
                                                <!--<span class="prop-price-type"> 
                                                    <span class="guid-price"> onwords</span>
                                                </span>-->
                                            </span>
                                            <a href="<?php echo base_url(); ?>home/see_details/property/<?php echo $property->post_id; ?>" class="btn btn-danger">See Details</a>
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
        

