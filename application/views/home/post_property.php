<!-- Autocomplte -->
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
 <!-- breadcrumbs Start -->
            <section class="hero-wrap">
                <div class="container">
                    <div class="row no-gutters slider-text align-items-end justify-content-center">
                        <div class="col-md-9 ftco-animate text-center pb-10">
                            <h class="mb-3 bread">Post Property</h>
                            <p class="breadcrumbs"><span class="mr-2"><a href="<?php echo base_url();?>">Home <i class="fa fa-chevron-right"></i></a></span> <span>Post Property <i class="fa fa-chevron-right"></i></span></p>
                        </div>
                    </div>
                </div>
            </section>
            <!-- breadcrumbs End -->

            <!-- Multistep Form Start Here -->
            <div class="multistep-form">
                <div class="container">
                    <!-- multistep form -->
                    <form class="regform" name="add_property_form" id="add_property_form" method="post" action="<?php echo base_url(); ?>home/add_poperty" enctype="multipart/form-data">
                        <!-- progressbar -->
                        <input type="hidden" name="post_id" id="post_id" value="<?php echo $post_id; ?>" />
                        <input type="hidden" name="admin_id" id="admin_id" value="<?php if($post_id == 0){ echo $admin_id; }else{ if(!empty($property)){ echo $property->admin_id;}  } ?>" />
                        <ul id="progressbar">
                            <li class="active">Contact Info</li>
                            <li>Address Info</li>
                            <li>Property Type</li>
                            <li>Price Details</li>
                            <li>Property Details</li>
                            <li>Other Info</li>
                            <li>Amenities</li>
                            <li>Upload Files</li>
                            <!--<li>Status</li>-->
                        </ul>
                        <!-- Step 1 area start -->
                        <fieldset id="first">
                            <div class="smart-wrap">
                                <div class="smart-forms smart-container wrap-0">
                                    <div class="form-body">
                                        <div class="spacer-b30">
                                            <div class="tagline"><span>Contact Info</span></div>
                                            <!-- .tagline -->
                                        </div>
                                       <?php //print_r($property); ?>
                                       <?php //print_r($duplex_flat_details); ?>
                                        <?php //print_r($pent_house_details); ?>
                                        <!--<?php print_r($factory_details); ?>
                                        <?php print_r($flat_details); ?>
                                        <?php print_r($house_details); ?>
                                        <?php print_r($land_details); ?>
                                        <?php print_r($office_details); ?>
                                        <?php print_r($shop_details); ?>
                                        <?php print_r($warehouse_details); ?>
                                        <?php print_r($property); ?>
                                        <?php print_r($other_details); ?>
                                        <?php print_r($residential_amenities); ?>
                                        <?php print_r($commercial_amenities); ?>-->
                                        <?php 
                                            $readonly = 1;
                                            $loginUsers = array(
                                                '8626080622',
                                                '8073580400', 
                                                '8861004796',
                                                '8088557910',
                                                '9740832820',
                                                '8310478896',
                                                '9380390313',
                                                '6361554128',
                                                '9880786176',
                                                '8147112570'
                                            );

                                            if (in_array($user_data->phone, $loginUsers)){$readonly = 0;}
                                        ?>
                                        <div class="frm-row">
                                            <div class="colm colm12">
                                                <div class="section">
                                                    <label class="field prepend-icon">
                                                    <input type="text" name="name" id="name" class="gui-input" placeholder="Full Name" style="text-transform:uppercase;" <?php if ($readonly) echo "readonly" ; ?> value="<?php if(!empty($property)){ echo $property->name;}else{echo @$user_data->name;} ?>">
                                                    <span class="field-icon"><i class="fa fa-user"></i></span>  
                                                    </label>
                                                    <span id="name-error" class="error-show"></span>
                                                </div>
                                                <!-- end section -->
                                            </div>
                                            <div class="colm colm6">
                                                <div class="section">
                                                    <label class="field prepend-icon">
                                                    <input type="number" name="mobile" id="mobile" class="gui-input" pattern="[1-9]{1}[0-9]{9}" <?php if ($readonly) echo "readonly" ; ?> placeholder="Mobile" maxlength="10" onkeypress="return event.charCode >= 48" min="0" value="<?php if(!empty($property)){ echo $property->mobile;}else{echo @$user_data->phone;} ?>">
                                                    <span class="field-icon"><i class="fa fa-mobile"></i></span>  
                                                    </label>
                                                    <span id="mobile-error" class="error-show"></span>
                                                </div>
                                                <!-- end section -->   
                                                <div class="section">
                                                    <label class="field prepend-icon">
                                                    <input type="number" name="phone" id="phone" class="gui-input" pattern="[1-9]{1}[0-9]{9}"  placeholder="Phone" maxlength="15" onkeypress="return event.charCode >= 48" min="0" value="<?php if(!empty($property)){ echo $property->phone;} ?>" >
                                                    <span class="field-icon"><i class="fa fa-phone-square"></i></span>  
                                                    </label>
                                                    <!----
                                                    <span id="phone-error" class="error-show"></span>
                                                    ----->
                                                </div>
                                                <!-- end section --> 
                                            </div>
                                            <!-- end .colm6 section -->
                                            <div class="colm colm6">
                                                <div class="section">
                                                    <label class="field prepend-icon">
                                                    <input type="number" name="mobile1" id="mobile1" class="gui-input" pattern="[1-9]{1}[0-9]{9}" maxlength="10" placeholder="Mobile" onkeypress="return event.charCode >= 48" min="0" value="<?php if(!empty($property)){ echo $property->mobile1;} ?>" >
                                                    <span class="field-icon"><i class="fa fa-mobile"></i></span>  
                                                    </label>
                                                    <!----
                                                    <span id="mobile1-error" class="error-show"></span>
                                                    ------>
                                                </div>
                                                <!-- end section -->
                                                <div class="section">
                                                    <label class="field prepend-icon">
                                                    <input type="email" name="email" id="email" class="gui-input" placeholder="Email ID" value="<?php if(!empty($property)){ echo $property->email;}else{echo @$user_data->email;} ?>" >
                                                    <span class="field-icon"><i class="fa fa-envelope"></i></span>  
                                                    </label>
                                                    <span id="email-error" class="error-show"></span>
                                                </div>
                                                <!-- end section -->    
                                            </div>
                                            <!-- end .colm6 section -->  
                                        </div>
                                        <!-- end .frm-row section -->                                      
                                    </div>
                                </div>
                                <!-- end .smart-forms section -->
                            </div>
                            <!-- end .smart-wrap section -->
                            <input type="button" name="next" id="property-contact-form" class="next_btn p-t20" value="Save & Next"/>
                        </fieldset>
                        <!-- Step 2 area start -->
                        <fieldset>
                            <div class="smart-wrap">
                                <div class="smart-forms smart-container wrap-0">
                                    <div class="form-body">
                                        <div class="spacer-b30">
                                            <div class="tagline"><span>Address Info</span></div>
                                            <!-- .tagline -->
                                        </div>
                                        <div class="frm-row">
                                            <div class="colm colm6">
                                                <div class="section">
                                                    <label class="field prepend-icon">
                                                    <input type="text" name="state" id="state" class="gui-input" placeholder="State" value="<?php if(!empty($property)){ echo $property->state;} ?>" onkeyup="load_states(this.value)" onblur="load_cities(this.value)" >
                                                    <span class="field-icon"><i class="fa fa-search"></i></span>  
                                                    </label>
                                                    <span id="state-error" class="error-show"></span>
                                                </div>
                                                <!-- end section --> 
                                                <div class="section">
                                                    <label class="field prepend-icon">
                                                    <input type="text" name="location" id="location" class="gui-input" placeholder="Location" value="<?php if(!empty($property)){ echo $property->location;} ?>" onkeyup="load_locations(this.value)">
                                                    <span class="field-icon"><i class="fa fa-map-marker"></i></span>  
                                                    </label>
                                                    <span id="location-error" class="error-show"></span>
                                                </div>
                                                <!-- end section --> 
                                            </div>
                                            <!-- end .colm6 section -->
                                            <div class="colm colm6">
                                                <div class="section">
                                                    <label class="field prepend-icon">
                                                    <input type="text" name="city" id="city" class="gui-input" placeholder="City" value="<?php if(!empty($property)){ echo $property->city;} ?>" >
                                                    <span class="field-icon"><i class="fa fa-search"></i></span>  
                                                    </label>
                                                    <span id="city-error" class="error-show"></span>
                                                </div>
                                                <!-- end section -->   
                                                <div class="section">
                                                    <label class="field">
                                                    <input type="text" name="complex_society_building" id="complex_society_building"  onkeyup="load_complex(this.value)" class="gui-input" placeholder="Complex / Soceity / Building Name" style="text-transform:uppercase;" value="<?php if(!empty($property)){ echo $property->complex_society_building;} ?>" >
                                                    </label>
                                                    <span id="complex_society_building-error" class="error-show"></span>
                                                </div>
                                                <!-- end section --> 
                                            </div>
                                            <!-- end .colm6 section -->  
                                            <div class="colm colm12">
                                                <div class="section">
                                                    <label class="field prepend-icon">
                                                    <textarea placeholder="Address" class="gui-textarea" id="address" name="address" ><?php if(!empty($property)){ echo $property->address;} ?> </textarea>
                                                    <span class="field-icon"><i class="fa fa-map-marker"></i></span>
                                                    <span id="address-error" class="error-show"></span>
                                                    <span class="input-hint"> 
                                                    <strong>Hint:</strong> Don't be negative or off topic! your full address put here... 
                                                    </span>   
                                                    </label>
                                                    
                                                </div>
                                                <!-- end section -->  
                                            </div>
                                            <div class="colm colm6">
                                                <div class="section">
                                                    <label class="field">
                                                    <input type="text" name="blockno" id="blockno" class="gui-input" placeholder="Block No" style="text-transform:uppercase;" value="<?php if(!empty($property)){ echo $property->blockno;} ?>"  >
                                                    </label>
                                                    <span id="blockno-error" class="error-show"></span>
                                                </div>
                                                <div class="section">
                                                    <label class="field prepend-icon">
                                                    <input type="text" name="landmark" id="landmark" class="gui-input" placeholder="Landmark" value="<?php if(!empty($property)){ echo $property->landmark;} ?>"  >
                                                    <span class="field-icon"><i class="fa fa-thumb-tack"></i></span>  
                                                    </label>
                                                    <!------
                                                    <span id="landmark-error" class="error-show"></span>
                                                    ------->
                                                </div>
                                                <!-- end section --> 
                                            </div>
                                            <div class="colm colm6">
                                                <div class="section">
                                                    <label class="field">
                                                    <input type="text" name="flatno" id="flatno" class="gui-input" placeholder="Flat No" style="text-transform:uppercase;" value="<?php if(!empty($property)){ echo $property->flatno;} ?>"  >
                                                    </label>
                                                    <span id="flatno-error" class="error-show"></span>
                                                </div>
                                                <div class="section">
                                                    <label class="field prepend-icon">
                                                    <input type="number" name="pincode" id="pincode" class="gui-input" pattern="[1-5]{1}[0-5]{5}" maxlength="6" placeholder="Pincode" onkeypress="return event.charCode >= 48" min="0" value="<?php if(!empty($property)){ echo $property->pincode;} ?>"  >
                                                    <span class="field-icon"><i class="fa fa-map-pin"></i></span>  
                                                    </label>
                                                    <!------
                                                    <span id="pincode-error" class="error-show"></span>
                                                    ------->
                                                </div>
                                                <!-- end section --> 
                                            </div>
                                        </div>
                                        <!-- end .frm-row section -->                                      
                                    </div>
                                </div>
                                <!-- end .smart-forms section -->
                            </div>
                            <!-- end .smart-wrap section -->
                            <input type="button" name="previous" class="pre_btn m-t20 m-lr10" value="Back" />
                            <input type="button" name="next" id="property-address-form" class="next_btn m-t20" value="Save & Next"/>
                        </fieldset>
                        <!-- Step 3 area start -->
                        <fieldset id="multi-step-1">
                            <div class="smart-wrap">
                                <div class="smart-forms smart-container wrap-0">
                                    <div class="form-body">
                                        <div class="spacer-b30">
                                            <div class="tagline"><span>Property Type</span></div>
                                            <!-- .tagline -->
                                        </div>
                                        <div class="frm-row">
                                            <div class="colm colm6">
                                                <div class="section">
                                                    <label class="field select">
                                                        <select id="rent_sell" name="rent_sell" onchange="change_property_type(this.value)">
                                                            <option hidden <?php if(!empty($property_type)){ if($property_type->rent_sell == 'Rent / Sell'){ echo 'selected'; } } ?>>Rent / Sell</option>
                                                            <option disabled >Select one </option>
                                                            <option value="Rent" <?php if(!empty($property_type)){ if($property_type->rent_sell == 'Rent'){ echo 'selected'; } } ?>>Rent</option>
                                                            <option value="Sell" <?php if(!empty($property_type)){ if($property_type->rent_sell == 'Sell'){ echo 'selected'; } } ?>>Sell</option>
                                                        </select>
                                                        <i class="arrow"></i>                    
                                                    </label>
                                                    <span id="rent_sell-error" class="error-show"></span>
                                                </div>
                                                <div class="section">
                                                    <label class="field select">
                                                        <select id="res_com" name="res_com">
                                                            <option hidden >Residential / Commercial</option>
                                                            <option disabled >Select one </option>
                                                            <option value="Residential" <?php if(!empty($property_type)){ if($property_type->res_com == 'Residential'){ echo 'selected'; } } ?> >Residential</option>
                                                            <option value="Commercial" <?php if(!empty($property_type)){ if($property_type->res_com == 'Commercial'){ echo 'selected'; } } ?> >Commercial</option>
                                                        </select>
                                                        <i class="arrow"></i>                    
                                                    </label>
                                                    <span id="res_com-error" class="error-show"></span>
                                                </div>
                                            </div>
                                            <!-- end .colm6 section -->
                                            <div class="colm colm6">
                                                <div class="section">
                                                    <div class="section">
                                                        <div class="option-group field">
                                                            <div class="smart-option-group" style="padding-left:0;padding-right:0;">                        
                                                                <label for="Furnished" class="option">
                                                                <input type="radio" id="Furnished" value="Furnished" name="FurnishedStatus" <?php if(!empty($property_type)){ if($property_type->FurnishedStatus == 'Furnished'){ echo 'checked'; } } ?> >
                                                                <span class="smart-option smart-radio">
                                                                <span class="smart-option-ui"> <i class="iconc"></i>  Furnished</span>                                      
                                                                </span>                                      
                                                                </label>
                                                                <label for="Unfurnished" class="option">
                                                                <input type="radio" id="Unfurnished" name="FurnishedStatus"  value="Unfurnished" <?php if(!empty($property_type)){ if($property_type->FurnishedStatus == 'Unfurnished'){ echo 'checked'; } } ?> >
                                                                <span class="smart-option smart-radio">
                                                                <span class="smart-option-ui"> <i class="iconc"></i>  Unfurnished</span>                                      
                                                                </span>                                      
                                                                </label>
                                                                <label for="SemiFurnished" class="option">
                                                                <input type="radio" id="SemiFurnished" name="FurnishedStatus" value="SemiFurnished" <?php if(!empty($property_type)){ if($property_type->FurnishedStatus == 'SemiFurnished'){ echo 'checked'; } } ?> >
                                                                <span class="smart-option smart-radio">
                                                                <span class="smart-option-ui"> <i class="iconc"></i>  Semi Furnished</span>                                      
                                                                </span>                                      
                                                                </label>
                                                                <span id="FurnishedStatus-error" class="error-show"></span>
                                                            </div>
                                                            <!--  smart-option-group -->                           
                                                        </div>
                                                        <!-- end .option-group section -->
                                                    </div>
                                                    <div class="section" id="residential_types" <?php if(!empty($property_type)){ if($property_type->res_com == 'Residential'){ echo 'style="display:block"'; }else{ echo 'style="display:none;"'; } }else{ echo 'style="display:none;"'; } ?> >
                                                        <div class="option-group field">
                                                            <div class="smart-option-group smart-option-list group-vertical"> 
                                                                <label for="Flat" class="option">
                                                                <input type="radio" name="residential" id="Flat" value="Flat" <?php if(!empty($property_type)){ if($property_type->residential == 'Flat'){ echo 'checked'; } } ?> >
                                                                <span class="smart-option smart-radio">
                                                                <span class="smart-option-ui"> 
                                                                <i class="iconc"></i> Flat
                                                                </span>                                  
                                                                </span>
                                                                </label>
                                                                <label for="HouseorBanglow" class="option">
                                                                <input type="radio" name="residential" id="HouseorBanglow" value="HouseorBanglow" <?php if(!empty($property_type)){ if($property_type->residential == 'HouseorBanglow'){ echo 'checked'; } } ?> >
                                                                <span class="smart-option smart-radio">
                                                                <span class="smart-option-ui"> 
                                                                <i class="iconc"></i> House or Banglow
                                                                </span>                                  
                                                                </span>                  
                                                                </label>                            
                                                                <label for="PentHouse" class="option">
                                                                <input type="radio" name="residential" id="PentHouse" value="PentHouse" <?php if(!empty($property_type)){ if($property_type->residential == 'PentHouse'){ echo 'checked'; } } ?> >
                                                                <span class="smart-option smart-radio">
                                                                <span class="smart-option-ui"> 
                                                                <i class="iconc"></i> Pent House
                                                                </span>                                  
                                                                </span>               
                                                                </label>
                                                                <label for="DuplexFlat" class="option">
                                                                <input type="radio" name="residential" id="DuplexFlat" value="DuplexFlat" <?php if(!empty($property_type)){ if($property_type->residential == 'DuplexFlat'){ echo 'checked'; } } ?> >
                                                                <span class="smart-option smart-radio">
                                                                <span class="smart-option-ui"> 
                                                                <i class="iconc"></i> PG/Co-Living
                                                                </span>                                  
                                                                </span>               
                                                                </label>
                                                                <label for="Land" class="option">
                                                                <input type="radio" name="residential" id="Land" value="Land" <?php if(!empty($property_type)){ if($property_type->residential == 'Land'){ echo 'checked'; } } ?> >
                                                                <span class="smart-option smart-radio">
                                                                <span class="smart-option-ui"> 
                                                                <i class="iconc"></i> Land
                                                                </span>                                  
                                                                </span>               
                                                                </label>
                                                            </div>
                                                            <!--  smart-option-group -->   
                                                        </div>
                                                        <!-- end .option-group section --> 
                                                    </div>
                                                    <div class="section" id="commercial_types" <?php if(!empty($property_type)){ if($property_type->res_com == 'Commercial'){ echo 'style="display:block"'; }else{ echo 'style="display:none;"'; } }else{ echo 'style="display:none;"'; } ?>>
                                                        <div class="option-group field">
                                                            <div class="smart-option-group smart-option-list group-vertical"> 
                                                                <label for="Office" class="option">
                                                                <input type="radio" name="residential" id="Office" value="Office" <?php if(!empty($property_type)){ if($property_type->residential == 'Office'){ echo 'checked'; } } ?> >
                                                                <span class="smart-option smart-radio">
                                                                <span class="smart-option-ui"> 
                                                                <i class="iconc"></i> Office
                                                                </span>                                  
                                                                </span>
                                                                </label>
                                                                <label for="ShoporShowroom" class="option">
                                                                <input type="radio" name="residential" id="ShoporShowroom" value="ShopOrShowroom" <?php if(!empty($property_type)){ if($property_type->residential == 'ShopOrShowroom'){ echo 'checked'; } } ?> >
                                                                <span class="smart-option smart-radio">
                                                                <span class="smart-option-ui"> 
                                                                <i class="iconc"></i> Shop or Showroom
                                                                </span>                                  
                                                                </span>                  
                                                                </label>                            
                                                                <label for="Warehouse" class="option">
                                                                <input type="radio" name="residential" id="Warehouse" value="Warehouse" <?php if(!empty($property_type)){ if($property_type->residential == 'Warehouse'){ echo 'checked'; } } ?> >
                                                                <span class="smart-option smart-radio">
                                                                <span class="smart-option-ui"> 
                                                                <i class="iconc"></i> Warehouse
                                                                </span>                                  
                                                                </span>               
                                                                </label>
                                                                <label for="Factory" class="option">
                                                                <input type="radio" name="residential" id="Factory" value="Factory" <?php if(!empty($property_type)){ if($property_type->residential == 'Factory'){ echo 'checked'; } } ?> >
                                                                <span class="smart-option smart-radio">
                                                                <span class="smart-option-ui"> 
                                                                <i class="iconc"></i> Factory
                                                                </span>                                  
                                                                </span>               
                                                                </label>
                                                                <label for="Land2" class="option">
                                                                <input type="radio" name="residential" id="Land2" value="Land2" <?php if(!empty($property_type)){ if($property_type->residential == 'Land2'){ echo 'checked'; } } ?> >
                                                                <span class="smart-option smart-radio">
                                                                <span class="smart-option-ui"> 
                                                                <i class="iconc"></i> Land
                                                                </span>                                  
                                                                </span>               
                                                                </label>
                                                            </div>
                                                            <!--  smart-option-group -->   
                                                        </div>
                                                        <!-- end .option-group section --> 
                                                    </div>
                                                    <span id="residential-error" class="error-show"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end .frm-row section -->                                        
                                    </div>
                                </div>
                                <!-- end .smart-forms section -->
                            </div>
                            <!-- end .smart-wrap section -->
                            <input type="button" name="previous" class="pre_btn m-t20 m-lr10" value="Back" />
                            <input type="button" name="next" id="proprty-type-form" class="next_btn m-t20 m-lr10" value="Save & Next" />
                        </fieldset>
                        <!-- Step 4 area start -->
                        <fieldset>
                            <div class="smart-wrap">
                                <div class="smart-forms smart-container wrap-0">
                                    <div class="form-body">
                                        <div class="spacer-b30">
                                            <div class="tagline"><span>Price Details</span></div>
                                            <!-- .tagline -->
                                        </div>
                                        <div class="frm-row2"  id="price-details-for-rent">
                                            <div class="colm1 colm6">
                                                <div class="section">
                                                    <label class="field prepend-icon">
                                                    <input type="number" name="security_deposite" id="security_deposite" class="gui-input" placeholder="Security Deposite" onkeypress="return event.charCode >= 48" min="0" value="<?php if(!empty($property_type)){ echo $property_type->security_deposite; } ?>"  >
                                                    <span class="field-icon"><i class="fa fa-money"></i></span>  
                                                    </label>
                                                    <span id="security_deposite-error" class="error-show"></span>
                                                </div>
                                            </div>
                                            <div class="colm2 colm6">
                                                <div class="section">
                                                    <label class="field prepend-icon">
                                                    <input type="number" min="0" max="1000000" name="rentPerMonth" id="rentPerMonth" class="gui-input" placeholder="Rent Per Month" onkeypress="return event.charCode >= 48" min="0" value="<?php if(!empty($property_type)){ echo $property_type->rentPerMonth; } ?>">
                                                    <span class="field-icon"><i class="fa fa-money"></i></span>  
                                                    </label>
                                                    <span id="rentPerMonth-error" class="error-show"></span>
                                                </div>
                                                <!-- end section -->
                                            </div>
                                        </div>
                                        
                                        <div class="frm-row" id="price-details-for-sale" style="display:none;">
                                            <div class="colm1 colm12">
                                                <div class="section">
                                                    <label class="field prepend-icon">
                                                    <input type="number" name="net_amount" id="net_amount" class="gui-input" placeholder="Net Amount" onkeypress="return event.charCode >= 48" min="0" value="<?php if(!empty($property_type)){ echo $property_type->net_amount; } ?>"  >
                                                    <span class="field-icon"><i class="fa fa-money"></i></span>  
                                                    </label>
                                                    <span id="net_amount-error" class="error-show"></span>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <!--<div class="frm-row2">-->
                                            
                                        <!--    <div class="colm1 colm6">-->
                                        <!--        <div class="section">-->
                                        <!--            <label class="field prepend-icon">-->
                                        <!--            <input type="number" min="0" max="1000000" name="amount" id="amount" class="gui-input" placeholder="Booking Amount" onkeypress="return event.charCode >= 48" min="0" value="<?php if(!empty($property_type)){ echo $property_type->amount; } ?>">-->
                                        <!--            <span class="field-icon"><i class="fa fa-money"></i></span>  -->
                                        <!--            </label>-->
                                        <!--            <span id="amount-error" class="error-show"></span>-->
                                        <!--        </div>-->
                                                <!-- end section -->
                                        <!--    </div>-->
                                            
                                        <!--    <div class="colm2 colm6">-->
                                        <!--        <div class="section">-->
                                        <!--            <label class="field select">-->
                                        <!--            <select id="per_unit" name="per_unit">-->
                                        <!--                <option hidden >Unit</option>-->
                                        <!--                <option disabled >Select one </option>-->
                                        <!--                <option value="Sqft" <?php if(!empty($property_type)){ if($property_type->per_unit == 'Sqft'){ echo 'selected'; } } ?> >Sqft</option>-->
                                        <!--                <option value="Sq-m" <?php if(!empty($property_type)){ if($property_type->per_unit == 'Sq-m'){ echo 'selected'; } } ?> >Sq-m</option>-->
                                        <!--                <option value="Acre" <?php if(!empty($property_type)){ if($property_type->per_unit == 'Acre'){ echo 'selected'; } } ?> >Acre</option>-->
                                        <!--                <option value="Bigha" <?php if(!empty($property_type)){ if($property_type->per_unit == 'Bigha'){ echo 'selected'; } } ?> >Bigha</option>-->
                                        <!--                <option value="Hectare" <?php if(!empty($property_type)){ if($property_type->per_unit == 'Hectare'){ echo 'selected'; } } ?> >Hectare</option>-->
                                        <!--                <option value="Marla" <?php if(!empty($property_type)){ if($property_type->per_unit == 'Marla'){ echo 'selected'; } } ?> >Marla</option>-->
                                        <!--                <option value="Chatak" <?php if(!empty($property_type)){ if($property_type->per_unit == 'Chatak'){ echo 'selected'; } } ?> >Chatak</option>-->
                                        <!--                <option value="Kottah" <?php if(!empty($property_type)){ if($property_type->per_unit == 'Kottah'){ echo 'selected'; } } ?> >Kottah</option>-->
                                        <!--            </select>-->
                                        <!--            <i class="arrow"></i>   -->
                                        <!--            <span id="per_unit-error" class="error-show"></span>-->
                                        <!--            </label>-->
                                        <!--        </div>-->
                                        <!--    </div>-->
                                            
                                        <!--    </div>-->
                                        <!-- end .frm-row section -->                                      
                                    </div>
                                </div>
                                <!-- end .smart-forms section -->
                            </div>
                            <!-- end .smart-wrap section -->
                            <input type="button" name="previous" class="pre_btn m-t20 m-lr10" value="Back" />
                            <input type="button" name="next" id="property-price-form" class="next_btn m-t20 m-lr10" value="Save & Next" />
                        </fieldset>
<!-------------------------------------------------------------------------
#Step 5 area start (Duplex Flat)
-------------------------------------------------------------------------->
                        <fieldset>
                            <div class="smart-wrap" id="DuplexFlats" style="display:none;">
                                <div class="smart-forms smart-container wrap-0">
                                    <div class="form-body">
                                        <div class="spacer-b30">
                                            <div class="tagline"><span>Property Details (PG/Co-Living)</span></div>
                                            <!-- .tagline -->
                                        </div>
                                        <div class="frm-row">
                                            <div class="colm colm6">
                                                <div class="section">
                                                    <label class="field select">
                                                        <select id="room" name="room">
                                                            <option hidden >Room</option>
                                                            <option disabled >Select one </option>
                                                            <?php for($i = 1; $i<=100; $i++){ ?>
                                                            <option value="<?php echo $i; ?>" <?php if(!empty($duplex_flat_details)){ if($duplex_flat_details->room == $i){ echo 'checked'; } } ?>><?php echo $i; ?></option>
                                                            <?php } ?>
                                                        </select>
                                                        <i class="arrow"></i> 
                                                        <span id="room-error" class="error-show"></span>
                                                    </label>
                                                </div>
                                                <div class="section">
                                                    <label class="field select">
                                                        <select id="balcony" name="balcony">
                                                            <option hidden >Balcony</option>
                                                            <option disabled >Select one </option>
                                                            <?php for($i = 1; $i<=100; $i++){ ?>
                                                            <option value="<?php echo $i; ?>" <?php if(!empty($duplex_flat_details)){ if($duplex_flat_details->balcony == $i){ echo 'checked'; } } ?>><?php echo $i; ?></option>
                                                            <?php } ?>
                                                        </select>
                                                        <i class="arrow"></i> 
                                                        <span id="balcony-error" class="error-show"></span>
                                                    </label>
                                                </div>
                                                <div class="frm-row2">
                                                    <div class="colm1 colm6">
                                                        <div class="section">
                                                            <label class="field prepend-icon">
                                                            <input type="number" name="super_buildup_area" id="super_buildup_area" class="gui-input" placeholder="Super Build up Area" onkeypress="return event.charCode >= 48" min="0" value="<?php if(!empty($duplex_flat_details)){ echo $duplex_flat_details->super_buildup_area; } ?>" >
                                                            <span class="field-icon"><i class="fa fa-object-group"></i></span>  
                                                            </label>
                                                            <span id="super_buildup_area-error" class="error-show"></span>
                                                        </div>
                                                        <div class="section">
                                                            <label class="field prepend-icon">
                                                            <input type="number" name="carpet_area" id="carpet_area" class="gui-input" placeholder="Carpet Area" value="<?php if(!empty($duplex_flat_details)){ echo $duplex_flat_details->carpet_area; } ?>" >
                                                            <span class="field-icon"><i class="fa fa-object-group"></i></span>  
                                                            </label>
                                                            <span id="carpet_area-error" class="error-show"></span>
                                                        </div>
                                                    </div>
                                                    <div class="colm2 colm6">
                                                        <div class="section">
                                                            <label class="field select">
                                                                <select id="super_buildup_area_unit" name="super_buildup_area_unit">
                                                                    <option hidden >Unit</option>
                                                                    <option disabled >Select one </option>
                                                                    <option value="Sqft" <?php if(!empty($duplex_flat_details)){ if($duplex_flat_details->super_buildup_area_unit == 'Sqft'){ echo 'selected'; } } ?> >Sqft</option>
                                                                    <option value="Sq-m" <?php if(!empty($duplex_flat_details)){ if($duplex_flat_details->super_buildup_area_unit == 'Sq-m'){ echo 'selected'; } } ?> >Sq-m</option>
                                                                    <option value="Acre" <?php if(!empty($duplex_flat_details)){ if($duplex_flat_details->super_buildup_area_unit == 'Acre'){ echo 'selected'; } } ?> >Acre</option>
                                                                    <option value="Bigha" <?php if(!empty($duplex_flat_details)){ if($duplex_flat_details->super_buildup_area_unit == 'Bigha'){ echo 'selected'; } } ?> >Bigha</option>
                                                                    <option value="Hectare" <?php if(!empty($duplex_flat_details)){ if($duplex_flat_details->super_buildup_area_unit == 'Hectare'){ echo 'selected'; } } ?> >Hectare</option>
                                                                    <option value="Marla" <?php if(!empty($duplex_flat_details)){ if($duplex_flat_details->super_buildup_area_unit == 'Marla'){ echo 'selected'; } } ?> >Marla</option>
                                                                    <option value="Chatak" <?php if(!empty($duplex_flat_details)){ if($duplex_flat_details->super_buildup_area_unit == 'Chatak'){ echo 'selected'; } } ?> >Chatak</option>
                                                                    <option value="Kottah" <?php if(!empty($duplex_flat_details)){ if($duplex_flat_details->super_buildup_area_unit == 'Kottah'){ echo 'selected'; } } ?> >Kottah</option>
                                                                </select>
                                                                <i class="arrow"></i>   
                                                                <span id="super_buildup_area_unit-error" class="error-show"></span>
                                                            </label>
                                                        </div>
                                                        <div class="section">
                                                            <label class="field select">
                                                                <select id="carpet_unit" name="carpet_unit">
                                                                    <option hidden >Unit</option>
                                                                    <option disabled >Select one </option>
                                                                    <option value="Sqft" <?php if(!empty($duplex_flat_details)){ if($duplex_flat_details->carpet_unit == 'Sqft'){ echo 'selected'; } } ?> >Sqft</option>
                                                                    <option value="Sq-m" <?php if(!empty($duplex_flat_details)){ if($duplex_flat_details->carpet_unit == 'Sq-m'){ echo 'selected'; } } ?> >Sq-m</option>
                                                                    <option value="Acre" <?php if(!empty($duplex_flat_details)){ if($duplex_flat_details->carpet_unit == 'Acre'){ echo 'selected'; } } ?> >Acre</option>
                                                                    <option value="Bigha" <?php if(!empty($duplex_flat_details)){ if($duplex_flat_details->carpet_unit == 'Bigha'){ echo 'selected'; } } ?> >Bigha</option>
                                                                    <option value="Hectare" <?php if(!empty($duplex_flat_details)){ if($duplex_flat_details->carpet_unit == 'Hectare'){ echo 'selected'; } } ?> >Hectare</option>
                                                                    <option value="Marla" <?php if(!empty($duplex_flat_details)){ if($duplex_flat_details->carpet_unit == 'Marla'){ echo 'selected'; } } ?> >Marla</option>
                                                                    <option value="Chatak" <?php if(!empty($duplex_flat_details)){ if($duplex_flat_details->carpet_unit == 'Chatak'){ echo 'selected'; } } ?> >Chatak</option>
                                                                    <option value="Kottah" <?php if(!empty($duplex_flat_details)){ if($duplex_flat_details->carpet_unit == 'Kottah'){ echo 'selected'; } } ?> >Kottah</option>
                                                                </select>
                                                                <i class="arrow"></i>   
                                                                <span id="carpet_unit-error" class="error-show"></span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="section">
                                                    <label class="field select">
                                                        <select id="upperfloorno" name="upperfloorno">
                                                            <option hidden >Upper Floor No</option>
                                                            <option disabled >Select one </option>
                                                            <option value="LowerBasement" >Lower Basement </option>
                                                            <option value="Basement" >Basement </option>
                                                            <?php for($i = 1; $i<=100; $i++){ ?>
                                                            <option value="<?php echo $i; ?>" <?php if(!empty($duplex_flat_details)){ if($duplex_flat_details->upperfloorno == $i){ echo 'checked'; } } ?>><?php echo $i; ?></option>
                                                            <?php } ?>
                                                        </select>
                                                        <i class="arrow"></i>  
                                                        <span id="upperfloorno-error" class="error-show"></span>
                                                    </label>
                                                </div>
                                            </div>
                                            <!-- end .colm6 section -->
                                            <div class="colm colm6">
                                                <div class="section">
                                                    <label class="field select">
                                                        <select id="bathroom" name="bathroom">
                                                            <option hidden >Bathroom</option>
                                                            <option disabled >Select one </option>
                                                            <?php for($i = 1; $i<=100; $i++){ ?>
                                                            <option value="<?php echo $i; ?>" <?php if(!empty($duplex_flat_details)){ if($duplex_flat_details->bathroom == $i){ echo 'checked'; } } ?>><?php echo $i; ?></option>
                                                            <?php } ?>
                                                        </select>
                                                        <i class="arrow"></i>  
                                                        <span id="bathroom-error" class="error-show"></span>
                                                    </label>
                                                </div>
                                                <div class="section">
                                                    <label class="field select">
                                                        <select id="kitchen" name="kitchen">
                                                            <option hidden >Kitchen</option>
                                                            <option disabled >Select one </option>
                                                            <?php for($i = 1; $i<=100; $i++){ ?>
                                                            <option value="<?php echo $i; ?>" <?php if(!empty($duplex_flat_details)){ if($duplex_flat_details->kitchen == $i){ echo 'checked'; } } ?>><?php echo $i; ?></option>
                                                            <?php } ?>
                                                        </select>
                                                        <i class="arrow"></i> 
                                                        <span id="kitchen-error" class="error-show"></span>
                                                    </label>
                                                </div>
                                                <div class="frm-row2">
                                                    <div class="colm1 colm6">
                                                        <div class="section">
                                                            <label class="field prepend-icon">
                                                            <input type="text" name="buildup_area" id="buildup_area" class="gui-input" placeholder="Build up Area" value="<?php if(!empty($duplex_flat_details)){ echo $duplex_flat_details->buildup_area; } ?>"  >
                                                            <span class="field-icon"><i class="fa fa-object-group"></i></span>  
                                                            </label>
                                                            <span id="buildup_area-error" class="error-show"></span>
                                                        </div>
                                                    </div>
                                                    <div class="colm2 colm6">
                                                        <div class="section">
                                                            <label class="field select">
                                                                <select id="buildup_area_Unit" name="buildup_area_Unit">
                                                                    <option hidden >Unit</option>
                                                                    <option disabled >Select one </option>
                                                                    <option value="Sqft" <?php if(!empty($duplex_flat_details)){ if($duplex_flat_details->buildup_area_Unit == 'Sqft'){ echo 'selected'; } } ?> >Sqft</option>
                                                                    <option value="Sq-m" <?php if(!empty($duplex_flat_details)){ if($duplex_flat_details->buildup_area_Unit == 'Sq-m'){ echo 'selected'; } } ?> >Sq-m</option>
                                                                    <option value="Acre" <?php if(!empty($duplex_flat_details)){ if($duplex_flat_details->buildup_area_Unit == 'Acre'){ echo 'selected'; } } ?> >Acre</option>
                                                                    <option value="Bigha" <?php if(!empty($duplex_flat_details)){ if($duplex_flat_details->buildup_area_Unit == 'Bigha'){ echo 'selected'; } } ?> >Bigha</option>
                                                                    <option value="Hectare" <?php if(!empty($duplex_flat_details)){ if($duplex_flat_details->buildup_area_Unit == 'Hectare'){ echo 'selected'; } } ?> >Hectare</option>
                                                                    <option value="Marla" <?php if(!empty($duplex_flat_details)){ if($duplex_flat_details->buildup_area_Unit == 'Marla'){ echo 'selected'; } } ?> >Marla</option>
                                                                    <option value="Chatak" <?php if(!empty($duplex_flat_details)){ if($duplex_flat_details->buildup_area_Unit == 'Chatak'){ echo 'selected'; } } ?> >Chatak</option>
                                                                    <option value="Kottah" <?php if(!empty($duplex_flat_details)){ if($duplex_flat_details->buildup_area_Unit == 'Kottah'){ echo 'selected'; } } ?> >Kottah</option>
                                                                </select>
                                                                <i class="arrow"></i>    
                                                                <span id="buildup_area_Unit-error" class="error-show"></span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="section">
                                                    <label class="field select">
                                                        <select id="lower_floor_no" name="lower_floor_no">
                                                            <option hidden >Lower Floor No</option>
                                                            <option disabled >Select one </option>
                                                            <option value="LowerBasement" <?php if(!empty($duplex_flat_details)){ if($duplex_flat_details->lower_floor_no == 'LowerBasement'){ echo 'checked'; } } ?> >Lower Basement </option>
                                                            <option value="Basement" <?php if(!empty($duplex_flat_details)){ if($duplex_flat_details->lower_floor_no == 'Basement'){ echo 'checked'; } } ?>>Basement </option>
                                                            <?php for($i = 1; $i<=100; $i++){ ?>
                                                            <option value="<?php echo $i; ?>" <?php if(!empty($duplex_flat_details)){ if($duplex_flat_details->lower_floor_no == $i){ echo 'checked'; } } ?>><?php echo $i; ?></option>
                                                            <?php } ?>
                                                        </select>
                                                        <i class="arrow"></i> 
                                                        <span id="lower_floor_no-error" class="error-show"></span>
                                                    </label>
                                                </div>
                                                <div class="section">
                                                    <label class="field select">
                                                        <select id="totalfloor" name="totalfloor">
                                                            <option hidden >Total Floor</option>
                                                            <option disabled >Select one </option>
                                                            <option value="G">G</option>
                                                            <?php for($i = 1; $i<=100; $i++){ ?>
                                                            <option value="<?php echo $i; ?>" <?php if(!empty($duplex_flat_details)){ if($duplex_flat_details->totalfloor == $i){ echo 'checked'; } } ?>><?php echo $i; ?></option>
                                                            <?php } ?>
                                                        </select>
                                                        <i class="arrow"></i>
                                                        <span id="totalfloor-error" class="error-show"></span>
                                                    </label>
                                                </div>
                                            </div>
                                            <!-- end .colm6 section --> 
                                        </div>
                                        <!-- end .frm-row section -->                                      
                                    </div>
                                </div>
                                <!-- end .smart-forms section -->
                            </div>
                            <!-- end .smart-wrap section -->
                            <!--<input type="button" name="previous" class="pre_btn m-t20 m-lr10" value="Back" />
                            <input type="button" name="next" class="next_btn m-t20 m-lr10" value="Save & Next" />
                        </fieldset>-->
<!-------------------------------------------------------------------------
#Step 5 area start (Pent House Rent)
-------------------------------------------------------------------------->
                        <!--<fieldset >-->
                            <div class="smart-wrap" id="PentHouseRent" style="display:none;">
                                <div class="smart-forms smart-container wrap-0">
                                    <div class="form-body">
                                        <div class="spacer-b30">
                                            <div class="tagline"><span>Property Details (Pent House Rent)</span></div>
                                            <!-- .tagline -->
                                        </div>
                                        <div class="frm-row">
                                            <div class="colm colm6">
                                                <div class="section">
                                                    <label class="field select">
                                                        <select id="pent_room" name="pent_room">
                                                            <option hidden >Room</option>
                                                            <option disabled >Select one </option>
                                                            <?php for($i = 1; $i<=100; $i++){ ?>
                                                            <option value="<?php echo $i; ?>" <?php if(!empty($pent_house_details)){ if($pent_house_details->pent_room == $i){ echo 'checked'; } } ?>><?php echo $i; ?></option>
                                                            <?php } ?>
                                                        </select>
                                                        <i class="arrow"></i>                    
                                                        <span id="pent_room-error" class="error-show"></span>                    
                                                    </label>
                                                </div>
                                                <div class="section">
                                                    <label class="field select">
                                                        <select id="pent_balcony" name="pent_balcony">
                                                            <option hidden >Balcony</option>
                                                            <option disabled >Select one </option>
                                                            <?php for($i = 1; $i<=100; $i++){ ?>
                                                            <option value="<?php echo $i; ?>" <?php if(!empty($pent_house_details)){ if($pent_house_details->pent_balcony == $i){ echo 'checked'; } } ?>><?php echo $i; ?></option>
                                                            <?php } ?>
                                                        </select>
                                                        <i class="arrow"></i>
                                                        <span id="pent_balcony-error" class="error-show"></span>
                                                    </label>
                                                </div>
                                                <div class="frm-row2">
                                                    <div class="colm1 colm6">
                                                        <div class="section">
                                                            <label class="field prepend-icon">
                                                            <input type="number" name="pent_super_buildup_area" id="pent_super_buildup_area" class="gui-input" placeholder="Super Build up Area" onkeypress="return event.charCode >= 48" min="0" value="<?php if(!empty($pent_house_details)){ echo $pent_house_details->pent_super_buildup_area; } ?>"  >
                                                            <span class="field-icon"><i class="fa fa-object-group"></i></span>  
                                                            </label>
                                                            <span id="pent_super_buildup_area-error" class="error-show"></span>
                                                        </div>
                                                        <div class="section">
                                                            <label class="field prepend-icon">
                                                            <input type="number" name="pent_carpet_area" id="pent_carpet_area" class="gui-input" placeholder="Carpet Area" onkeypress="return event.charCode >= 48" min="0" value="<?php if(!empty($pent_house_details)){ echo $pent_house_details->pent_carpet_area; } ?>">
                                                            <span class="field-icon"><i class="fa fa-object-group"></i></span>  
                                                            </label>
                                                            <span id="pent_carpet_area-error" class="error-show"></span>
                                                        </div>
                                                    </div>
                                                    <div class="colm2 colm6">
                                                        <div class="section">
                                                            <label class="field select">
                                                                <select id="pent_super_buildup_area_Unit" name="pent_super_buildup_area_Unit" value="<?php if(!empty($pent_house_details)){ echo $pent_house_details->pent_super_buildup_area_Unit; } ?>" >
                                                                    <option hidden >Unit</option>
                                                                    <option disabled >Select one </option>
                                                                    <option value="Sqft" <?php if(!empty($pent_house_details)){ if($pent_house_details->pent_super_buildup_area_Unit == 'Sqft'){ echo 'selected'; } } ?> >Sqft</option>
                                                                    <option value="Sq-m" <?php if(!empty($pent_house_details)){ if($pent_house_details->pent_super_buildup_area_Unit == 'Sq-m'){ echo 'selected'; } } ?> >Sq-m</option>
                                                                    <option value="Acre" <?php if(!empty($pent_house_details)){ if($pent_house_details->pent_super_buildup_area_Unit == 'Acre'){ echo 'selected'; } } ?> >Acre</option>
                                                                    <option value="Bigha" <?php if(!empty($pent_house_details)){ if($pent_house_details->pent_super_buildup_area_Unit == 'Bigha'){ echo 'selected'; } } ?> >Bigha</option>
                                                                    <option value="Hectare" <?php if(!empty($pent_house_details)){ if($pent_house_details->pent_super_buildup_area_Unit == 'Hectare'){ echo 'selected'; } } ?> >Hectare</option>
                                                                    <option value="Marla" <?php if(!empty($pent_house_details)){ if($pent_house_details->pent_super_buildup_area_Unit == 'Marla'){ echo 'selected'; } } ?> >Marla</option>
                                                                    <option value="Chatak" <?php if(!empty($pent_house_details)){ if($pent_house_details->pent_super_buildup_area_Unit == 'Chatak'){ echo 'selected'; } } ?> >Chatak</option>
                                                                    <option value="Kottah" <?php if(!empty($pent_house_details)){ if($pent_house_details->pent_super_buildup_area_Unit == 'Kottah'){ echo 'selected'; } } ?> >Kottah</option>
                                                                </select>
                                                                <i class="arrow"></i> 
                                                                <span id="pent_super_buildup_area_Unit-error" class="error-show"></span>
                                                            </label>
                                                        </div>
                                                        <div class="section">
                                                            <label class="field select">
                                                                <select id="pent_carpet_unit" name="pent_carpet_unit">
                                                                    <option hidden >Unit</option>
                                                                    <option disabled >Select one </option>
                                                                    <option value="Sqft" <?php if(!empty($pent_house_details)){ if($pent_house_details->pent_carpet_unit == 'Sqft'){ echo 'selected'; } } ?> >Sqft</option>
                                                                    <option value="Sq-m" <?php if(!empty($pent_house_details)){ if($pent_house_details->pent_carpet_unit == 'Sq-m'){ echo 'selected'; } } ?> >Sq-m</option>
                                                                    <option value="Acre" <?php if(!empty($pent_house_details)){ if($pent_house_details->pent_carpet_unit == 'Acre'){ echo 'selected'; } } ?> >Acre</option>
                                                                    <option value="Bigha" <?php if(!empty($pent_house_details)){ if($pent_house_details->pent_carpet_unit == 'Bigha'){ echo 'selected'; } } ?> >Bigha</option>
                                                                    <option value="Hectare" <?php if(!empty($pent_house_details)){ if($pent_house_details->pent_carpet_unit == 'Hectare'){ echo 'selected'; } } ?> >Hectare</option>
                                                                    <option value="Marla" <?php if(!empty($pent_house_details)){ if($pent_house_details->pent_carpet_unit == 'Marla'){ echo 'selected'; } } ?> >Marla</option>
                                                                    <option value="Chatak" <?php if(!empty($pent_house_details)){ if($pent_house_details->pent_carpet_unit == 'Chatak'){ echo 'selected'; } } ?> >Chatak</option>
                                                                    <option value="Kottah" <?php if(!empty($pent_house_details)){ if($pent_house_details->pent_carpet_unit == 'Kottah'){ echo 'selected'; } } ?> >Kottah</option>
                                                                </select>
                                                                <i class="arrow"></i>   
                                                                <span id="pent_carpet_unit-error" class="error-show"></span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="section">
                                                    <label class="field select">
                                                        <select id="pent_floor" name="pent_floor">
                                                            <option hidden >Floor</option>
                                                            <option disabled >Select one </option>
                                                            <option value="LowerBasement" <?php if(!empty($pent_house_details)){ if($pent_house_details->pent_carpet_unit == 'LowerBasement'){ echo 'selected'; } } ?>>Lower Basement </option>
                                                            <option value="Basement" <?php if(!empty($pent_house_details)){ if($pent_house_details->pent_carpet_unit == 'Basement'){ echo 'selected'; } } ?>>Basement </option>
                                                            <option value="G" <?php if(!empty($pent_house_details)){ if($pent_house_details->pent_carpet_unit == 'G'){ echo 'selected'; } } ?>>G</option>
                                                            <?php for($i = 1; $i<=100; $i++){ ?>
                                                            <option value="<?php echo $i; ?>" <?php if(!empty($pent_house_details)){ if($pent_house_details->pent_floor == $i){ echo 'selected'; } } ?>><?php echo $i; ?></option>
                                                            <?php } ?>
                                                        </select>
                                                        <i class="arrow"></i>  
                                                        <span id="pent_floor-error" class="error-show"></span>
                                                    </label>
                                                </div>
                                            </div>
                                            <!-- end .colm6 section -->
                                            <div class="colm colm6">
                                                <div class="section">
                                                    <label class="field select">
                                                        <select id="pent_bathroom" name="pent_bathroom">
                                                            <option hidden >Bathroom</option>
                                                            <option disabled >Select one </option>
                                                            <?php for($i = 1; $i<=100; $i++){ ?>
                                                            <option value="<?php echo $i; ?>" <?php if(!empty($pent_house_details)){ if($pent_house_details->pent_bathroom == $i){ echo 'selected'; } } ?>><?php echo $i; ?></option>
                                                            <?php } ?>
                                                        </select>
                                                        <i class="arrow"></i> 
                                                        <span id="pent_bathroom-error" class="error-show"></span>
                                                    </label>
                                                </div>
                                                <div class="section">
                                                    <label class="field select">
                                                        <select id="pent_kitchen" name="pent_kitchen">
                                                            <option hidden >Kitchen</option>
                                                            <option disabled >Select one </option>
                                                            <?php for($i = 1; $i<=100; $i++){ ?>
                                                            <option value="<?php echo $i; ?>" <?php if(!empty($pent_house_details)){ if($pent_house_details->pent_kitchen == $i){ echo 'selected'; } } ?>><?php echo $i; ?></option>
                                                            <?php } ?>
                                                        </select>
                                                        <i class="arrow"></i>  
                                                        <span id="pent_kitchen-error" class="error-show"></span>
                                                    </label>
                                                </div>
                                                <div class="frm-row2">
                                                    <div class="colm1 colm6">
                                                        <div class="section">
                                                            <label class="field prepend-icon">
                                                            <input type="number" name="pent_buildup_area" id="pent_buildup_area" class="gui-input" placeholder="Build up Area" onkeypress="return event.charCode >= 48" min="0" value="<?php if(!empty($pent_house_details)){ echo $pent_house_details->pent_buildup_area; } ?>" >
                                                            <span class="field-icon"><i class="fa fa-object-group"></i></span>  
                                                            </label>
                                                            <span id="pent_buildup_area-error" class="error-show"></span>
                                                        </div>
                                                        <div class="section">
                                                            <label class="field prepend-icon">
                                                            <input type="number" name="open_terrace" id="open_terrace" class="gui-input" placeholder="Open Terrace" onkeypress="return event.charCode >= 48" min="0" value="<?php if(!empty($pent_house_details)){ echo $pent_house_details->open_terrace; } ?>" >
                                                            <span class="field-icon"><i class="fa fa-object-group"></i></span>  
                                                            </label>
                                                            <span id="open_terrace-error" class="error-show"></span>
                                                        </div>
                                                    </div>
                                                    <div class="colm2 colm6">
                                                        <div class="section">
                                                            <label class="field select">
                                                                <select id="pent_buildup_area_Unit" name="pent_buildup_area_Unit">
                                                                    <option hidden >Unit</option>
                                                                    <option disabled >Select one </option>
                                                                    <option value="Sqft" <?php if(!empty($pent_house_details)){ if($pent_house_details->pent_buildup_area_Unit == 'Sqft'){ echo 'selected'; } } ?> >Sqft</option>
                                                                    <option value="Sq-m" <?php if(!empty($pent_house_details)){ if($pent_house_details->pent_buildup_area_Unit == 'Sq-m'){ echo 'selected'; } } ?> >Sq-m</option>
                                                                    <option value="Acre" <?php if(!empty($pent_house_details)){ if($pent_house_details->pent_buildup_area_Unit == 'Acre'){ echo 'selected'; } } ?> >Acre</option>
                                                                    <option value="Bigha" <?php if(!empty($pent_house_details)){ if($pent_house_details->pent_buildup_area_Unit == 'Bigha'){ echo 'selected'; } } ?> >Bigha</option>
                                                                    <option value="Hectare" <?php if(!empty($pent_house_details)){ if($pent_house_details->pent_buildup_area_Unit == 'Hectare'){ echo 'selected'; } } ?> >Hectare</option>
                                                                    <option value="Marla" <?php if(!empty($pent_house_details)){ if($pent_house_details->pent_buildup_area_Unit == 'Marla'){ echo 'selected'; } } ?> >Marla</option>
                                                                    <option value="Chatak" <?php if(!empty($pent_house_details)){ if($pent_house_details->pent_buildup_area_Unit == 'Chatak'){ echo 'selected'; } } ?> >Chatak</option>
                                                                    <option value="Kottah" <?php if(!empty($pent_house_details)){ if($pent_house_details->pent_buildup_area_Unit == 'Kottah'){ echo 'selected'; } } ?> >Kottah</option>
                                                                </select>
                                                                <i class="arrow"></i>     
                                                                <span id="pent_buildup_area_Unit-error" class="error-show"></span>
                                                            </label>
                                                        </div>
                                                        <div class="section">
                                                            <label class="field select">
                                                                <select id="pent_open_terrace_unit" name="pent_open_terrace_unit">
                                                                    <option hidden >Unit</option>
                                                                    <option disabled >Select one </option>
                                                                    <option value="Sqft" <?php if(!empty($pent_house_details)){ if($pent_house_details->pent_open_terrace_unit == 'Sqft'){ echo 'selected'; } } ?> >Sqft</option>
                                                                    <option value="Sq-m" <?php if(!empty($pent_house_details)){ if($pent_house_details->pent_open_terrace_unit == 'Sq-m'){ echo 'selected'; } } ?> >Sq-m</option>
                                                                    <option value="Acre" <?php if(!empty($pent_house_details)){ if($pent_house_details->pent_open_terrace_unit == 'Acre'){ echo 'selected'; } } ?> >Acre</option>
                                                                    <option value="Bigha" <?php if(!empty($pent_house_details)){ if($pent_house_details->pent_open_terrace_unit == 'Bigha'){ echo 'selected'; } } ?> >Bigha</option>
                                                                    <option value="Hectare" <?php if(!empty($pent_house_details)){ if($pent_house_details->pent_open_terrace_unit == 'Hectare'){ echo 'selected'; } } ?> >Hectare</option>
                                                                    <option value="Marla" <?php if(!empty($pent_house_details)){ if($pent_house_details->pent_open_terrace_unit == 'Marla'){ echo 'selected'; } } ?> >Marla</option>
                                                                    <option value="Chatak" <?php if(!empty($pent_house_details)){ if($pent_house_details->pent_open_terrace_unit == 'Chatak'){ echo 'selected'; } } ?> >Chatak</option>
                                                                    <option value="Kottah" <?php if(!empty($pent_house_details)){ if($pent_house_details->pent_open_terrace_unit == 'Kottah'){ echo 'selected'; } } ?> >Kottah</option>
                                                                </select>
                                                                <i class="arrow"></i>
                                                                <span id="pent_open_terrace_unit-error" class="error-show"></span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="section">
                                                    <label class="field select">
                                                        <select id="total_floor" name="total_floor">
                                                            <option hidden >Total Floor</option>
                                                            <option disabled >Select one </option>
                                                            <option value="G" <?php if(!empty($pent_house_details)){ if($pent_house_details->total_floor == 'G'){ echo 'selected'; } } ?> >G</option>
                                                            <?php for($i = 1; $i<=100; $i++){ ?>
                                                            <option value="<?php echo $i; ?>" <?php if(!empty($pent_house_details)){ if($pent_house_details->total_floor == $i){ echo 'selected'; } } ?>><?php echo $i; ?></option>
                                                            <?php } ?>
                                                        </select>
                                                        <i class="arrow"></i> 
                                                        <span id="total_floor-error" class="error-show"></span>
                                                    </label>
                                                </div>
                                            </div>
                                            <!-- end .colm6 section --> 
                                        </div>
                                        <!-- end .frm-row section -->                                      
                                    </div>
                                </div>
                                <!-- end .smart-forms section -->
                            </div>
                            <!-- end .smart-wrap section -->
                            <!--<input type="button" name="previous" class="pre_btn m-t20 m-lr10" value="Back" />
                            <input type="button" name="next" class="next_btn m-t20 m-lr10" value="Save & Next" />
                        </fieldset>-->
<!-------------------------------------------------------------------------
#Step 5 area start (Stock Factory Rent)
-------------------------------------------------------------------------->
                        <!--<fieldset >-->
                            <div class="smart-wrap" id="StockFactoryRent" style="display:none;">
                                <div class="smart-forms smart-container wrap-0">
                                    <div class="form-body">
                                        <div class="spacer-b30">
                                            <div class="tagline"><span>Property Details (Stock Factory Rent)</span></div>
                                            <!-- .tagline -->
                                        </div>
                                        <div class="frm-row">
                                            <div class="colm colm6">
                                                <div class="section">
                                                    <label class="field select">
                                                        <select id="factory_numberofcabin" name="factory_numberofcabin">
                                                            <option hidden >Number of Cabin</option>
                                                            <option disabled >Select one </option>
                                                            <?php for($i = 1; $i<=100; $i++){ ?>
                                                            <option value="<?php echo $i; ?>" <?php if(!empty($factory_details)){ if($factory_details->factory_numberofcabin == $i){ echo 'selected'; } } ?>><?php echo $i; ?></option>
                                                            <?php } ?>
                                                        </select>
                                                        <i class="arrow"></i>   
                                                        <span id="factory_numberofcabin-error" class="error-show"></span>         
                                                    </label>
                                                </div>
                                                <div class="frm-row2">
                                                    <div class="colm1 colm6">
                                                        <div class="section">
                                                            <label class="field prepend-icon">
                                                            <input type="number" name="factory_super_buildup_area" id="factory_super_buildup_area" class="gui-input" placeholder="Super Build up Area" onkeypress="return event.charCode >= 48" min="0" value="<?php if(!empty($factory_details)){ echo $factory_details->factory_super_buildup_area; } ?>"  >
                                                            <span class="field-icon"><i class="fa fa-object-group"></i></span>  
                                                            </label>
                                                            <span id="factory_super_buildup_area-error" class="error-show"></span>         
                                                        </div>
                                                        <div class="section">
                                                            <label class="field prepend-icon">
                                                            <input type="number" name="factory_carpet_area" id="factory_carpet_area" class="gui-input" placeholder="Carpet Area" onkeypress="return event.charCode >= 48" min="0" value="<?php if(!empty($factory_details)){ echo $factory_details->factory_carpet_area; } ?>"  >
                                                            <span class="field-icon"><i class="fa fa-object-group"></i></span>  
                                                            </label>
                                                            <span id="factory_carpet_area-error" class="error-show"></span>         
                                                        </div>
                                                    </div>
                                                    <div class="colm2 colm6">
                                                        <div class="section">
                                                            <label class="field select">
                                                                <select id="factory_super_buildup_area_unit" name="factory_super_buildup_area_unit" value="<?php if(!empty($factory_details)){ echo $factory_details->factory_super_buildup_area_unit; } ?>"  >
                                                                    <option hidden >Unit</option>
                                                                    <option disabled >Select one </option>
                                                                    <option value="Sqft" <?php if(!empty($factory_details)){ if($factory_details->factory_super_buildup_area_unit == 'Sqft'){ echo 'selected'; } } ?> >Sqft</option>
                                                                    <option value="Sq-m" <?php if(!empty($factory_details)){ if($factory_details->factory_super_buildup_area_unit == 'Sq-m'){ echo 'selected'; } } ?> >Sq-m</option>
                                                                    <option value="Acre" <?php if(!empty($factory_details)){ if($factory_details->factory_super_buildup_area_unit == 'Acre'){ echo 'selected'; } } ?> >Acre</option>
                                                                    <option value="Bigha" <?php if(!empty($factory_details)){ if($factory_details->factory_super_buildup_area_unit == 'Bigha'){ echo 'selected'; } } ?> >Bigha</option>
                                                                    <option value="Hectare" <?php if(!empty($factory_details)){ if($factory_details->factory_super_buildup_area_unit == 'Hectare'){ echo 'selected'; } } ?> >Hectare</option>
                                                                    <option value="Marla" <?php if(!empty($factory_details)){ if($factory_details->factory_super_buildup_area_unit == 'Marla'){ echo 'selected'; } } ?> >Marla</option>
                                                                    <option value="Chatak" <?php if(!empty($factory_details)){ if($factory_details->factory_super_buildup_area_unit == 'Chatak'){ echo 'selected'; } } ?> >Chatak</option>
                                                                    <option value="Kottah" <?php if(!empty($factory_details)){ if($factory_details->factory_super_buildup_area_unit == 'Kottah'){ echo 'selected'; } } ?> >Kottah</option>
                                                                </select>
                                                                <i class="arrow"></i>   
                                                                <span id="factory_super_buildup_area_unit-error" class="error-show"></span>         
                                                            </label>
                                                        </div>
                                                        <div class="section">
                                                            <label class="field select">
                                                                <select id="factory_carpet_unit" name="factory_carpet_unit">
                                                                    <option hidden >Unit</option>
                                                                    <option disabled >Select one </option>
                                                                    <option value="Sqft" <?php if(!empty($factory_details)){ if($factory_details->factory_carpet_unit == 'Sqft'){ echo 'selected'; } } ?> >Sqft</option>
                                                                    <option value="Sq-m" <?php if(!empty($factory_details)){ if($factory_details->factory_carpet_unit == 'Sq-m'){ echo 'selected'; } } ?> >Sq-m</option>
                                                                    <option value="Acre" <?php if(!empty($factory_details)){ if($factory_details->factory_carpet_unit == 'Acre'){ echo 'selected'; } } ?> >Acre</option>
                                                                    <option value="Bigha" <?php if(!empty($factory_details)){ if($factory_details->factory_carpet_unit == 'Bigha'){ echo 'selected'; } } ?> >Bigha</option>
                                                                    <option value="Hectare" <?php if(!empty($factory_details)){ if($factory_details->factory_carpet_unit == 'Hectare'){ echo 'selected'; } } ?> >Hectare</option>
                                                                    <option value="Marla" <?php if(!empty($factory_details)){ if($factory_details->factory_carpet_unit == 'Marla'){ echo 'selected'; } } ?> >Marla</option>
                                                                    <option value="Chatak" <?php if(!empty($factory_details)){ if($factory_details->factory_carpet_unit == 'Chatak'){ echo 'selected'; } } ?> >Chatak</option>
                                                                    <option value="Kottah" <?php if(!empty($factory_details)){ if($factory_details->factory_carpet_unit == 'Kottah'){ echo 'selected'; } } ?> >Kottah</option>
                                                                </select>
                                                                <i class="arrow"></i>  
                                                                <span id="factory_carpet_unit-error" class="error-show"></span>         
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="section">
                                                    <label class="field select">
                                                        <select id="factory_floor" name="factory_floor">
                                                            <option hidden >Floor</option>
                                                            <option disabled >Select one </option>
                                                            <option value="G" <?php if(!empty($factory_details)){ if($factory_details->factory_floor == 'G'){ echo 'selected'; } } ?>>G</option>
                                                            <?php for($i = 1; $i<=100; $i++){ ?>
                                                            <option value="<?php echo $i; ?>" <?php if(!empty($factory_details)){ if($factory_details->factory_floor == $i){ echo 'selected'; } } ?>><?php echo $i; ?></option>
                                                            <?php } ?>
                                                        </select>
                                                        <i class="arrow"></i>     
                                                        <span id="factory_floor-error" class="error-show"></span>         
                                                    </label>
                                                </div>
                                                <div class="frm-row2">
                                                    <div class="colm1 colm6">
                                                        <div class="section">
                                                            <label class="field prepend-icon">
                                                            <input type="number" name="factory_pentry" id="factory_pentry" class="gui-input" placeholder="Pentry" onkeypress="return event.charCode >= 48" min="0" value="<?php if(!empty($factory_details)){ echo $factory_details->factory_pentry; } ?>" >
                                                            <span class="field-icon"><i class="fa fa-object-group"></i></span>  
                                                            </label>
                                                            <span id="factory_pentry-error" class="error-show"></span>         
                                                        </div>
                                                        <div class="section">
                                                            <label class="field prepend-icon">
                                                            <input type="number" name="factory_roadWide" id="factory_roadWide" class="gui-input" placeholder="Road Wide" onkeypress="return event.charCode >= 48" min="0" value="<?php if(!empty($factory_details)){ echo $factory_details->factory_roadWide; } ?>">
                                                            <span class="field-icon"><i class="fa fa-road"></i></span>  
                                                            </label>
                                                            <span id="factory_roadWide-error" class="error-show"></span>         
                                                        </div>
                                                    </div>
                                                    <div class="colm2 colm6">
                                                        <div class="section">
                                                            <label class="field select">
                                                                <select id="factory_pentry_usedFor" name="factory_pentry_usedFor">
                                                                    <option hidden >Used For</option>
                                                                    <option value="Personal" <?php if(!empty($factory_details)){ if($factory_details->factory_pentry_usedFor == 'Personal'){ echo 'selected'; } } ?> >Personal</option>
                                                                    <option value="Common" <?php if(!empty($factory_details)){ if($factory_details->factory_pentry_usedFor == 'Common'){ echo 'selected'; } } ?> >Common</option>
                                                                </select>
                                                                <i class="arrow"></i> 
                                                                <span id="factory_pentry_usedFor-error" class="error-show"></span>         
                                                            </label>
                                                        </div>
                                                        <div class="section">
                                                            <label class="field select">
                                                                <select id="factory_roadWide_unit" name="factory_roadWide_unit">
                                                                    <option hidden >Unit</option>
                                                                    <option disabled >Select one </option>
                                                                    <option value="Sqft"  <?php if(!empty($factory_details)){ if($factory_details->factory_roadWide_unit == 'Sqft'){ echo 'selected'; } } ?> >Sqft</option>
                                                                    <option value="Sq-m"  <?php if(!empty($factory_details)){ if($factory_details->factory_roadWide_unit == 'Sq-m'){ echo 'selected'; } } ?> >MT</option>
                                                                </select>
                                                                <i class="arrow"></i> 
                                                                <span id="factory_roadWide_unit-error" class="error-show"></span>         
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="section">
                                                    <label class="field select">
                                                        <select id="factory_roof" name="factory_roof">
                                                            <option hidden >Roof</option>
                                                            <option disabled >Select one </option>
                                                            <option value="RCC"  <?php if(!empty($factory_details)){ if($factory_details->factory_roof == 'RCC'){ echo 'selected'; } } ?>  >RCC</option>
                                                            <option value="Shaded"  <?php if(!empty($factory_details)){ if($factory_details->factory_roof == 'Shaded'){ echo 'selected'; } } ?>  >Shaded</option>
                                                        </select>
                                                        <i class="arrow"></i>   
                                                        <span id="factory_roof-error" class="error-show"></span>         
                                                    </label>
                                                </div>
                                                <div class="section">
                                                    <label class="field prepend-icon">
                                                        <input type="text" name="factory_ManufacturingType" id="factory_ManufacturingType" class="gui-input" placeholder="Manufacturing Type" value="<?php if(!empty($factory_details)){ echo $factory_details->factory_ManufacturingType; } ?>"  >
                                                        <span class="field-icon"><i class="fa fa-industry"></i></span>  
                                                    </label>
                                                    <span id="factory_ManufacturingType-error" class="error-show"></span>         
                                                </div>
                                            </div>
                                            <!-- end .colm6 section -->
                                            <div class="colm colm6">
                                                <div class="section">
                                                    <label class="field select">
                                                        <select id="factory_NumberofWorkStation" name="factory_NumberofWorkStation">
                                                            <option hidden >Number of Work Station</option>
                                                            <option disabled >Select one </option>
                                                            <?php for($i = 1; $i<=100; $i++){ ?>
                                                            <option value="<?php echo $i; ?>" <?php if(!empty($factory_details)){ if($factory_details->factory_NumberofWorkStation == $i){ echo 'selected'; } } ?>><?php echo $i; ?></option>
                                                            <?php } ?>
                                                        </select>
                                                        <i class="arrow"></i>  
                                                        <span id="factory_NumberofWorkStation-error" class="error-show"></span>         
                                                    </label>
                                                </div>
                                                <div class="frm-row2">
                                                    <div class="colm1 colm6">
                                                        <div class="section">
                                                            <label class="field prepend-icon">
                                                            <input type="number" name="factory_BuildupArea" id="factory_BuildupArea" class="gui-input" placeholder="Build up Area" onkeypress="return event.charCode >= 48" min="0" value="<?php if(!empty($factory_details)){ echo $factory_details->factory_BuildupArea; } ?>"  >
                                                            <span class="field-icon"><i class="fa fa-object-group"></i></span>  
                                                            </label>
                                                            <span id="factory_BuildupArea-error" class="error-show"></span>         
                                                        </div>
                                                        <div class="section">
                                                            <label class="field prepend-icon">
                                                            <input type="number" name="factory_OpenArea" id="factory_OpenArea" class="gui-input" placeholder="Open Area" onkeypress="return event.charCode >= 48" min="0" value="<?php if(!empty($factory_details)){ echo $factory_details->factory_OpenArea; } ?>"  >
                                                            <span class="field-icon"><i class="fa fa-object-group"></i></span>  
                                                            </label>
                                                            <span id="factory_OpenArea-error" class="error-show"></span>         
                                                        </div>
                                                    </div>
                                                    <div class="colm2 colm6">
                                                        <div class="section">
                                                            <label class="field select">
                                                                <select id="factory_BuildupAreaUnit" name="factory_BuildupAreaUnit">
                                                                    <option hidden >Unit</option>
                                                                    <option disabled >Select one </option>
                                                                    <option value="Sqft" <?php if(!empty($factory_details)){ if($factory_details->factory_BuildupAreaUnit == 'Sqft'){ echo 'selected'; } } ?> >Sqft</option>
                                                                    <option value="Sq-m" <?php if(!empty($factory_details)){ if($factory_details->factory_BuildupAreaUnit == 'Sq-m'){ echo 'selected'; } } ?> >Sq-m</option>
                                                                    <option value="Acre" <?php if(!empty($factory_details)){ if($factory_details->factory_BuildupAreaUnit == 'Acre'){ echo 'selected'; } } ?> >Acre</option>
                                                                    <option value="Bigha" <?php if(!empty($factory_details)){ if($factory_details->factory_BuildupAreaUnit == 'Bigha'){ echo 'selected'; } } ?> >Bigha</option>
                                                                    <option value="Hectare" <?php if(!empty($factory_details)){ if($factory_details->factory_BuildupAreaUnit == 'Hectare'){ echo 'selected'; } } ?> >Hectare</option>
                                                                    <option value="Marla" <?php if(!empty($factory_details)){ if($factory_details->factory_BuildupAreaUnit == 'Marla'){ echo 'selected'; } } ?> >Marla</option>
                                                                    <option value="Chatak" <?php if(!empty($factory_details)){ if($factory_details->factory_BuildupAreaUnit == 'Chatak'){ echo 'selected'; } } ?> >Chatak</option>
                                                                    <option value="Kottah" <?php if(!empty($factory_details)){ if($factory_details->factory_BuildupAreaUnit == 'Kottah'){ echo 'selected'; } } ?> >Kottah</option>
                                                                </select>
                                                                <i class="arrow"></i>    
                                                                <span id="factory_BuildupAreaUnit-error" class="error-show"></span>         
                                                            </label>
                                                        </div>
                                                        <div class="section">
                                                            <label class="field select">
                                                                <select id="factory_OpenAreaUnit" name="factory_OpenAreaUnit">
                                                                    <option hidden >Unit</option>
                                                                    <option disabled >Select one </option>
                                                                    <option value="Sqft" <?php if(!empty($factory_details)){ if($factory_details->factory_OpenAreaUnit == 'Sqft'){ echo 'selected'; } } ?> >Sqft</option>
                                                                    <option value="Sq-m" <?php if(!empty($factory_details)){ if($factory_details->factory_OpenAreaUnit == 'Sq-m'){ echo 'selected'; } } ?> >Sq-m</option>
                                                                    <option value="Acre" <?php if(!empty($factory_details)){ if($factory_details->factory_OpenAreaUnit == 'Acre'){ echo 'selected'; } } ?> >Acre</option>
                                                                    <option value="Bigha" <?php if(!empty($factory_details)){ if($factory_details->factory_OpenAreaUnit == 'Bigha'){ echo 'selected'; } } ?> >Bigha</option>
                                                                    <option value="Hectare" <?php if(!empty($factory_details)){ if($factory_details->factory_OpenAreaUnit == 'Hectare'){ echo 'selected'; } } ?> >Hectare</option>
                                                                    <option value="Marla" <?php if(!empty($factory_details)){ if($factory_details->factory_OpenAreaUnit == 'Marla'){ echo 'selected'; } } ?> >Marla</option>
                                                                    <option value="Chatak" <?php if(!empty($factory_details)){ if($factory_details->factory_OpenAreaUnit == 'Chatak'){ echo 'selected'; } } ?> >Chatak</option>
                                                                    <option value="Kottah" <?php if(!empty($factory_details)){ if($factory_details->factory_OpenAreaUnit == 'Kottah'){ echo 'selected'; } } ?> >Kottah</option>
                                                                </select>
                                                                <i class="arrow"></i>    
                                                                <span id="factory_OpenAreaUnit-error" class="error-show"></span>         
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="section">
                                                    <label class="field select">
                                                        <select id="factory_TotalFloor" name="factory_TotalFloor">
                                                            <option hidden >Total Floor</option>
                                                            <option disabled >Select one </option>
                                                            <option value="G">G</option>
                                                            <?php for($i = 1; $i<=100; $i++){ ?>
                                                            <option value="<?php echo $i; ?>" <?php if(!empty($factory_details)){ if($factory_details->factory_TotalFloor == $i){ echo 'selected'; } } ?>><?php echo $i; ?></option>
                                                            <?php } ?>
                                                        </select>
                                                        <i class="arrow"></i>
                                                        <span id="factory_TotalFloor-error" class="error-show"></span>         
                                                    </label>
                                                </div>
                                                <div class="frm-row2">
                                                    <div class="colm1 colm6">
                                                        <div class="section">
                                                            <label class="field prepend-icon">
                                                            <input type="number" name="factory_Bathroom" id="factory_Bathroom" class="gui-input" placeholder="Bathroom" onkeypress="return event.charCode >= 48" min="0" value="<?php if(!empty($factory_details)){ echo $factory_details->factory_Bathroom; } ?>"  >
                                                            <span class="field-icon"><i class="fa fa-object-group"></i></span>  
                                                            </label>
                                                            <span id="factory_Bathroom-error" class="error-show"></span>         
                                                        </div>
                                                        <div class="section">
                                                            <label class="field prepend-icon">
                                                            <input type="number" name="factory_ElectricPower" id="factory_ElectricPower" class="gui-input" placeholder="Electric Power" onkeypress="return event.charCode >= 48" min="0" value="<?php if(!empty($factory_details)){ echo $factory_details->factory_ElectricPower; } ?>" >
                                                            <span class="field-icon"><i class="fa fa-plug"></i></span>  
                                                            </label>
                                                            <span id="factory_ElectricPower-error" class="error-show"></span>         
                                                        </div>
                                                    </div>
                                                    <div class="colm2 colm6">
                                                        <div class="section">
                                                            <label class="field select">
                                                                <select id="factory_Bathroom_UsedFor" name="factory_Bathroom_UsedFor">
                                                                    <option hidden >Used For</option>
                                                                    <option value="Personal" <?php if(!empty($factory_details)){ if($factory_details->PropertyStatus == 'Personal'){ echo 'selected'; } } ?> >Personal</option>
                                                                    <option value="Common" <?php if(!empty($factory_details)){ if($factory_details->PropertyStatus == 'Common'){ echo 'selected'; } } ?> >Common</option>
                                                                </select>
                                                                <i class="arrow"></i>  
                                                                <span id="factory_Bathroom_UsedFor-error" class="error-show"></span>         
                                                            </label>
                                                        </div>
                                                        <div class="section">
                                                            <label class="field select">
                                                                <select id="factory_ElectricPower_Unit" name="factory_ElectricPower_Unit">
                                                                    <option hidden >Unit</option>
                                                                    <option disabled >Select one </option>
                                                                    <option value="KG" <?php if(!empty($factory_details)){ if($factory_details->factory_ElectricPower_Unit == 'KG'){ echo 'selected'; } } ?> >KG</option>
                                                                    <option value="HR Power" <?php if(!empty($factory_details)){ if($factory_details->factory_ElectricPower_Unit == 'HR Power'){ echo 'selected'; } } ?>>HR Power</option>
                                                                </select>
                                                                <i class="arrow"></i>   
                                                                <span id="factory_ElectricPower_Unit-error" class="error-show"></span>         
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="section">
                                                    <label class="field select">
                                                        <select id="factory_HeavyVehicleParkingUpto" name="factory_HeavyVehicleParkingUpto">
                                                            <option hidden >Heavy Vehicle Parking Upto</option>
                                                            <option disabled >Select one </option>
                                                            <option value="3Wheeler"  <?php if(!empty($factory_details)){ if($factory_details->factory_HeavyVehicleParkingUpto == '3Wheeler'){ echo 'selected'; } } ?> >3 Wheeler</option>
                                                            <option value="4Wheeler"  <?php if(!empty($factory_details)){ if($factory_details->factory_HeavyVehicleParkingUpto == '4Wheeler'){ echo 'selected'; } } ?> >4 Wheeler</option>
                                                        </select>
                                                        <i class="arrow"></i> 
                                                        <span id="factory_HeavyVehicleParkingUpto-error" class="error-show"></span>                            
                                                    </label>
                                                </div>
                                            </div>
                                            <!-- end .colm6 section --> 
                                        </div>
                                        <!-- end .frm-row section -->                                      
                                    </div>
                                </div>
                                <!-- end .smart-forms section -->
                            </div>
                            <!-- end .smart-wrap section -->
                            <!--<input type="button" name="previous" class="pre_btn m-t20 m-lr10" value="Back" />
                            <input type="button" name="next" class="next_btn m-t20 m-lr10" value="Save & Next" />
                        </fieldset>-->
<!-------------------------------------------------------------------------
#Step 5 area start (Stock Flat Rent)
-------------------------------------------------------------------------->
                        <!--<fieldset >-->
                            <div class="smart-wrap" id="StockFlatRent">
                                <div class="smart-forms smart-container wrap-0">
                                    <div class="form-body">
                                        <div class="spacer-b30">
                                            <div class="tagline"><span>Property Details (Stock Flat Rent)</span></div>
                                            <!-- .tagline -->
                                        </div>
                                        <div class="frm-row">
                                            <div class="colm colm6">
                                                <div class="section">
                                                    <label class="field select">
                                                        <select id="flat_Room" name="flat_Room">
                                                            <option hidden >Room</option>
                                                            <option disabled >Select one </option>
                                                            <?php for($i = 1; $i<=100; $i++){ ?>
                                                            <option value="<?php echo $i; ?>" <?php if(!empty($flat_details)){ if($flat_details->flat_Room == $i){ echo 'selected'; } } ?>><?php echo $i; ?></option>
                                                            <?php } ?>
                                                        </select>
                                                        <i class="arrow"></i> 
                                                        <span id="flat_Room-error" class="error-show"></span>
                                                    </label>
                                                </div>
                                                <div class="section">
                                                    <label class="field select">
                                                        <select id="flat_Balcony" name="flat_Balcony">
                                                            <option hidden >Balcony</option>
                                                            <option disabled >Select one </option>
                                                            <?php for($i = 1; $i<=100; $i++){ ?>
                                                            <option value="<?php echo $i; ?>" <?php if(!empty($flat_details)){ if($flat_details->flat_Balcony == $i){ echo 'selected'; } } ?>><?php echo $i; ?></option>
                                                            <?php } ?>
                                                        </select>
                                                        <i class="arrow"></i> 
                                                        <span id="flat_Balcony-error" class="error-show"></span>
                                                    </label>
                                                </div>
                                                <div class="frm-row2">
                                                    <div class="colm1 colm6">
                                                        <div class="section">
                                                            <label class="field prepend-icon">
                                                            <input type="number" name="flat_SuperBuildupArea" id="flat_SuperBuildupArea" class="gui-input" placeholder="Super Build up Area" onkeypress="return event.charCode >= 48" min="0" value="<?php if(!empty($flat_details)){ echo $flat_details->flat_SuperBuildupArea; } ?>"  >
                                                            <span class="field-icon"><i class="fa fa-object-group"></i></span>  
                                                            </label>
                                                            <span id="flat_SuperBuildupArea-error" class="error-show"></span>
                                                        </div>
                                                        <div class="section">
                                                            <label class="field prepend-icon">
                                                            <input type="number" name="flat_CarpetArea" id="flat_CarpetArea" class="gui-input" placeholder="Carpet Area" onkeypress="return event.charCode >= 48" min="0" value="<?php if(!empty($flat_details)){ echo $flat_details->flat_CarpetArea; } ?>"  >
                                                            <span class="field-icon"><i class="fa fa-object-group"></i></span>  
                                                            </label>
                                                            <span id="flat_CarpetArea-error" class="error-show"></span>
                                                        </div>
                                                    </div>
                                                    <div class="colm2 colm6">
                                                        <div class="section">
                                                            <label class="field select">
                                                                <select id="flat_SuperBuildupAreaUnit" name="flat_SuperBuildupAreaUnit">
                                                                    <option hidden >Unit</option>
                                                                    <option disabled >Select one </option>
                                                                    <option value="Sqft" <?php if(!empty($flat_details)){ if($flat_details->flat_SuperBuildupAreaUnit == 'Sqft'){ echo 'selected'; } } ?> >Sqft</option>
                                                                    <option value="Sq-m" <?php if(!empty($flat_details)){ if($flat_details->flat_SuperBuildupAreaUnit == 'Sq-m'){ echo 'selected'; } } ?> >Sq-m</option>
                                                                    <option value="Acre" <?php if(!empty($flat_details)){ if($flat_details->flat_SuperBuildupAreaUnit == 'Acre'){ echo 'selected'; } } ?> >Acre</option>
                                                                    <option value="Bigha" <?php if(!empty($flat_details)){ if($flat_details->flat_SuperBuildupAreaUnit == 'Bigha'){ echo 'selected'; } } ?> >Bigha</option>
                                                                    <option value="Hectare" <?php if(!empty($flat_details)){ if($flat_details->flat_SuperBuildupAreaUnit == 'Hectare'){ echo 'selected'; } } ?> >Hectare</option>
                                                                    <option value="Marla" <?php if(!empty($flat_details)){ if($flat_details->flat_SuperBuildupAreaUnit == 'Marla'){ echo 'selected'; } } ?> >Marla</option>
                                                                    <option value="Chatak" <?php if(!empty($flat_details)){ if($flat_details->flat_SuperBuildupAreaUnit == 'Chatak'){ echo 'selected'; } } ?> >Chatak</option>
                                                                    <option value="Kottah" <?php if(!empty($flat_details)){ if($flat_details->flat_SuperBuildupAreaUnit == 'Kottah'){ echo 'selected'; } } ?> >Kottah</option>
                                                                </select>
                                                                <i class="arrow"></i>       
                                                                <span id="flat_SuperBuildupAreaUnit-error" class="error-show"></span>
                                                            </label>
                                                        </div>
                                                        <div class="section">
                                                            <label class="field select">
                                                                <select id="flat_Carpet_Unit" name="flat_Carpet_Unit">
                                                                    <option hidden >Unit</option>
                                                                    <option disabled >Select one </option>
                                                                    <option value="Sqft" <?php if(!empty($flat_details)){ if($flat_details->flat_Carpet_Unit == 'Sqft'){ echo 'selected'; } } ?> >Sqft</option>
                                                                    <option value="Sq-m" <?php if(!empty($flat_details)){ if($flat_details->flat_Carpet_Unit == 'Sq-m'){ echo 'selected'; } } ?> >Sq-m</option>
                                                                    <option value="Acre" <?php if(!empty($flat_details)){ if($flat_details->flat_Carpet_Unit == 'Acre'){ echo 'selected'; } } ?> >Acre</option>
                                                                    <option value="Bigha" <?php if(!empty($flat_details)){ if($flat_details->flat_Carpet_Unit == 'Bigha'){ echo 'selected'; } } ?> >Bigha</option>
                                                                    <option value="Hectare" <?php if(!empty($flat_details)){ if($flat_details->flat_Carpet_Unit == 'Hectare'){ echo 'selected'; } } ?> >Hectare</option>
                                                                    <option value="Marla" <?php if(!empty($flat_details)){ if($flat_details->flat_Carpet_Unit == 'Marla'){ echo 'selected'; } } ?> >Marla</option>
                                                                    <option value="Chatak" <?php if(!empty($flat_details)){ if($flat_details->flat_Carpet_Unit == 'Chatak'){ echo 'selected'; } } ?> >Chatak</option>
                                                                    <option value="Kottah" <?php if(!empty($flat_details)){ if($flat_details->flat_Carpet_Unit == 'Kottah'){ echo 'selected'; } } ?> >Kottah</option>
                                                                </select>
                                                                <i class="arrow"></i>  
                                                                <span id="flat_Carpet_Unit-error" class="error-show"></span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="section">
                                                        <label class="field select">
                                                            <select id="flat_TotalFloor" name="flat_TotalFloor">
                                                                <option hidden >Total Floor</option>
                                                                <option disabled >Select one </option>
                                                                <option value="G" <?php if(!empty($flat_details)){ if($flat_details->flat_TotalFloor == 'G'){ echo 'selected'; } } ?> >G</option>
                                                                <?php for($i = 1; $i<=100; $i++){ ?>
                                                                <option value="<?php echo $i; ?>" <?php if(!empty($flat_details)){ if($flat_details->flat_TotalFloor == $i){ echo 'selected'; } } ?>><?php echo $i; ?></option>
                                                                <?php } ?>
                                                            </select>
                                                            <i class="arrow"></i>   
                                                            <span id="flat_TotalFloor-error" class="error-show"></span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- end .colm6 section -->
                                            <div class="colm colm6">
                                                <div class="section">
                                                    <label class="field select">
                                                        <select id="flat_Bathroom" name="flat_Bathroom">
                                                            <option hidden >Bathroom</option>
                                                            <option disabled >Select one </option>
                                                            <?php for($i = 1; $i<=100; $i++){ ?>
                                                            <option value="<?php echo $i; ?>" <?php if(!empty($flat_details)){ if($flat_details->flat_Bathroom == $i){ echo 'selected'; } } ?>><?php echo $i; ?></option>
                                                            <?php } ?>
                                                        </select>
                                                        <i class="arrow"></i> 
                                                        <span id="flat_Bathroom-error" class="error-show"></span>
                                                    </label>
                                                </div>
                                                <div class="section">
                                                    <label class="field select">
                                                        <select id="flat_Kitchen" name="flat_Kitchen">
                                                            <option hidden >Kitchen</option>
                                                            <option disabled >Select one </option>
                                                            <?php for($i = 1; $i<=100; $i++){ ?>
                                                            <option value="<?php echo $i; ?>" <?php if(!empty($flat_details)){ if($flat_details->flat_Kitchen == $i){ echo 'selected'; } } ?>><?php echo $i; ?></option>
                                                            <?php } ?>
                                                        </select>
                                                        <i class="arrow"></i>   
                                                        <span id="flat_Kitchen-error" class="error-show"></span>
                                                    </label>
                                                </div>
                                                <div class="frm-row2">
                                                    <div class="colm1 colm6">
                                                        <div class="section">
                                                            <label class="field prepend-icon">
                                                            <input type="number" name="flat_BuildupArea" id="flat_BuildupArea" class="gui-input" placeholder="Build up Area" onkeypress="return event.charCode >= 48" min="0" value="<?php if(!empty($flat_details)){ echo $flat_details->flat_BuildupArea; } ?>" >
                                                            <span class="field-icon"><i class="fa fa-object-group"></i></span>  
                                                            </label>
                                                            <span id="flat_BuildupArea-error" class="error-show"></span>
                                                        </div>
                                                    </div>
                                                    <div class="colm2 colm6">
                                                        <div class="section">
                                                            <label class="field select">
                                                                <select id="flat_BuildupArea_Unit" name="flat_BuildupArea_Unit">
                                                                    <option hidden >Unit</option>
                                                                    <option disabled >Select one </option>
                                                                    <option value="Sqft" <?php if(!empty($flat_details)){ if($flat_details->flat_BuildupArea_Unit == 'Sqft'){ echo 'selected'; } } ?> >Sqft</option>
                                                                    <option value="Sq-m" <?php if(!empty($flat_details)){ if($flat_details->flat_BuildupArea_Unit == 'Sq-m'){ echo 'selected'; } } ?> >Sq-m</option>
                                                                    <option value="Acre" <?php if(!empty($flat_details)){ if($flat_details->flat_BuildupArea_Unit == 'Acre'){ echo 'selected'; } } ?> >Acre</option>
                                                                    <option value="Bigha" <?php if(!empty($flat_details)){ if($flat_details->flat_BuildupArea_Unit == 'Bigha'){ echo 'selected'; } } ?> >Bigha</option>
                                                                    <option value="Hectare" <?php if(!empty($flat_details)){ if($flat_details->flat_BuildupArea_Unit == 'Hectare'){ echo 'selected'; } } ?> >Hectare</option>
                                                                    <option value="Marla" <?php if(!empty($flat_details)){ if($flat_details->flat_BuildupArea_Unit == 'Marla'){ echo 'selected'; } } ?> >Marla</option>
                                                                    <option value="Chatak" <?php if(!empty($flat_details)){ if($flat_details->flat_BuildupArea_Unit == 'Chatak'){ echo 'selected'; } } ?> >Chatak</option>
                                                                    <option value="Kottah" <?php if(!empty($flat_details)){ if($flat_details->flat_BuildupArea_Unit == 'Kottah'){ echo 'selected'; } } ?> >Kottah</option>
                                                                </select>
                                                                <i class="arrow"></i>
                                                                <span id="flat_BuildupArea_Unit-error" class="error-show"></span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="section">
                                                    <label class="field select">
                                                        <select id="flat_Floor" name="flat_Floor">
                                                            <option hidden >Floor</option>
                                                            <option disabled >Select one </option>
                                                            <option value="LowerBasement" <?php if(!empty($flat_details)){ if($flat_details->flat_Floor == 'LowerBasement'){ echo 'selected'; } } ?> >Lower Basement </option>
                                                            <option value="Basement" <?php if(!empty($flat_details)){ if($flat_details->flat_Floor == 'Basement'){ echo 'selected'; } } ?> >Basement </option>
                                                            <option value="G" <?php if(!empty($flat_details)){ if($flat_details->flat_Floor == 'G'){ echo 'selected'; } } ?> >G</option>
                                                            <?php for($i = 1; $i<=100; $i++){ ?>
                                                            <option value="<?php echo $i; ?>" <?php if(!empty($flat_details)){ if($flat_details->flat_Floor == $i){ echo 'selected'; } } ?>><?php echo $i; ?></option>
                                                            <?php } ?>
                                                        </select>
                                                        <i class="arrow"></i>    
                                                        <span id="flat_Floor-error" class="error-show"></span>
                                                    </label>
                                                </div>
                                                <div class="section">
                                                    <label class="field select">
                                                        <select id="flat_HeavyVehicleParkingUpto" name="flat_HeavyVehicleParkingUpto">
                                                            <option hidden >Heavy Vehicle Parking Upto</option>
                                                            <option disabled >Select one </option>
                                                            <option value="3Wheeler"  <?php if(!empty($flat_details)){ if($flat_details->factory_HeavyVehicleParkingUpto == '3Wheeler'){ echo 'selected'; } } ?> >3 Wheeler</option>
                                                            <option value="4Wheeler"  <?php if(!empty($flat_details)){ if($flat_details->factory_HeavyVehicleParkingUpto == '4Wheeler'){ echo 'selected'; } } ?> >4 Wheeler</option>
                                                        </select>
                                                        <i class="arrow"></i>    
                                                        <span id="flat_HeavyVehicleParkingUpto-error" class="error-show"></span>
                                                    </label>
                                                </div>
                                            </div>
                                            <!-- end .colm6 section --> 
                                        </div>
                                        <!-- end .frm-row section -->                                      
                                    </div>
                                </div>
                                <!-- end .smart-forms section -->
                            </div>
                            <!-- end .smart-wrap section -->
                            <!--<input type="button" name="previous" class="pre_btn m-t20 m-lr10" value="Back" />
                            <input type="button" name="next" class="next_btn m-t20 m-lr10" value="Save & Next" />
                        </fieldset>-->

<!-------------------------------------------------------------------------
#Step 5 area start (Stock House Rent)
-------------------------------------------------------------------------->
                        <!--<fieldset >-->
                            <div class="smart-wrap" id="StockHouseRent" style="display:none;">
                                <div class="smart-forms smart-container wrap-0">
                                    <div class="form-body">
                                        <div class="spacer-b30">
                                            <div class="tagline"><span>Property Details (Stock House Rent)</span></div>
                                            <!-- .tagline -->
                                        </div>
                                        <div class="frm-row">
                                            <div class="colm colm6">
                                                <div class="section">
                                                    <label class="field select">
                                                        <select id="house_Room" name="house_Room">
                                                            <option hidden >Room</option>
                                                            <option disabled >Select one </option>
                                                            <?php for($i = 1; $i<=100; $i++){ ?>
                                                            <option value="<?php echo $i; ?>" <?php if(!empty($house_details)){ if($house_details->house_Room == $i){ echo 'selected'; } } ?>><?php echo $i; ?></option>
                                                            <?php } ?>
                                                        </select>
                                                        <i class="arrow"></i>   
                                                        <span id="house_Room-error" class="error-show"></span>
                                                    </label>
                                                </div>
                                                <div class="section">
                                                    <label class="field select">
                                                        <select id="house_Balcony" name="house_Balcony">
                                                            <option hidden >Balcony</option>
                                                            <option disabled >Select one </option>
                                                            <?php for($i = 1; $i<=100; $i++){ ?>
                                                            <option value="<?php echo $i; ?>" <?php if(!empty($house_details)){ if($house_details->house_Balcony == $i){ echo 'selected'; } } ?>><?php echo $i; ?></option>
                                                            <?php } ?>
                                                        </select>
                                                        <i class="arrow"></i>
                                                        <span id="house_Balcony-error" class="error-show"></span>
                                                    </label>
                                                </div>
                                                <div class="frm-row2">
                                                    <div class="colm1 colm6">
                                                        <div class="section">
                                                            <label class="field prepend-icon">
                                                            <input type="number" name="house_SuperBuildupArea" id="house_SuperBuildupArea" class="gui-input" placeholder="Super Build up Area (Covered)" onkeypress="return event.charCode >= 48" min="0" value="<?php if(!empty($house_details)){ echo $house_details->house_SuperBuildupArea; } ?>"  >
                                                            <span class="field-icon"><i class="fa fa-object-group"></i></span>  
                                                            </label>
                                                            <span id="house_SuperBuildupArea-error" class="error-show"></span>
                                                        </div>
                                                        <div class="section">
                                                            <label class="field prepend-icon">
                                                            <input type="number" name="house_CarpetArea" id="house_CarpetArea" class="gui-input" placeholder="Carpet Area (Covered)" onkeypress="return event.charCode >= 48" min="0" value="<?php if(!empty($house_details)){ echo $house_details->house_CarpetArea; } ?>"  >
                                                            <span class="field-icon"><i class="fa fa-object-group"></i></span>  
                                                            </label>
                                                            <span id="house_CarpetArea-error" class="error-show"></span>
                                                        </div>
                                                        <div class="section">
                                                            <label class="field prepend-icon">
                                                            <input type="number" name="house_TotalCoveredLandArea" id="house_TotalCoveredLandArea" class="gui-input" placeholder="Total Covered Land Area" onkeypress="return event.charCode >= 48" min="0" value="<?php if(!empty($house_details)){ echo $house_details->house_TotalCoveredLandArea; } ?>"  >
                                                            <span class="field-icon"><i class="fa fa-object-group"></i></span>  
                                                            </label>
                                                            <span id="house_TotalCoveredLandArea-error" class="error-show"></span>
                                                        </div>
                                                    </div>
                                                    <div class="colm2 colm6">
                                                        <div class="section">
                                                            <label class="field select">
                                                                <select id="house_SuperBuildupArea_Unit" name="house_SuperBuildupArea_Unit">
                                                                    <option hidden >Unit</option>
                                                                    <option disabled >Select one </option>
                                                                    <option value="Sqft" <?php if(!empty($house_details)){ if($house_details->house_SuperBuildupArea_Unit == 'Sqft'){ echo 'selected'; } } ?> >Sqft</option>
                                                                    <option value="Sq-m" <?php if(!empty($house_details)){ if($house_details->house_SuperBuildupArea_Unit == 'Sq-m'){ echo 'selected'; } } ?> >Sq-m</option>
                                                                    <option value="Acre" <?php if(!empty($house_details)){ if($house_details->house_SuperBuildupArea_Unit == 'Acre'){ echo 'selected'; } } ?> >Acre</option>
                                                                    <option value="Bigha" <?php if(!empty($house_details)){ if($house_details->house_SuperBuildupArea_Unit == 'Bigha'){ echo 'selected'; } } ?> >Bigha</option>
                                                                    <option value="Hectare" <?php if(!empty($house_details)){ if($house_details->house_SuperBuildupArea_Unit == 'Hectare'){ echo 'selected'; } } ?> >Hectare</option>
                                                                    <option value="Marla" <?php if(!empty($house_details)){ if($house_details->house_SuperBuildupArea_Unit == 'Marla'){ echo 'selected'; } } ?> >Marla</option>
                                                                    <option value="Chatak" <?php if(!empty($house_details)){ if($house_details->house_SuperBuildupArea_Unit == 'Chatak'){ echo 'selected'; } } ?> >Chatak</option>
                                                                    <option value="Kottah" <?php if(!empty($house_details)){ if($house_details->house_SuperBuildupArea_Unit == 'Kottah'){ echo 'selected'; } } ?> >Kottah</option>
                                                                </select>
                                                                <i class="arrow"></i>   
                                                                <span id="house_SuperBuildupArea_Unit-error" class="error-show"></span>
                                                            </label>
                                                        </div>
                                                        <div class="section">
                                                            <label class="field select">
                                                                <select id="house_Carpet_Unit" name="house_Carpet_Unit">
                                                                    <option hidden >Unit</option>
                                                                    <option disabled >Select one </option>
                                                                    <option value="Sqft" <?php if(!empty($house_details)){ if($house_details->house_Carpet_Unit == 'Sqft'){ echo 'selected'; } } ?> >Sqft</option>
                                                                    <option value="Sq-m" <?php if(!empty($house_details)){ if($house_details->house_Carpet_Unit == 'Sq-m'){ echo 'selected'; } } ?> >Sq-m</option>
                                                                    <option value="Acre" <?php if(!empty($house_details)){ if($house_details->house_Carpet_Unit == 'Acre'){ echo 'selected'; } } ?> >Acre</option>
                                                                    <option value="Bigha" <?php if(!empty($house_details)){ if($house_details->house_Carpet_Unit == 'Bigha'){ echo 'selected'; } } ?> >Bigha</option>
                                                                    <option value="Hectare" <?php if(!empty($house_details)){ if($house_details->house_Carpet_Unit == 'Hectare'){ echo 'selected'; } } ?> >Hectare</option>
                                                                    <option value="Marla" <?php if(!empty($house_details)){ if($house_details->house_Carpet_Unit == 'Marla'){ echo 'selected'; } } ?> >Marla</option>
                                                                    <option value="Chatak" <?php if(!empty($house_details)){ if($house_details->house_Carpet_Unit == 'Chatak'){ echo 'selected'; } } ?> >Chatak</option>
                                                                    <option value="Kottah" <?php if(!empty($house_details)){ if($house_details->house_Carpet_Unit == 'Kottah'){ echo 'selected'; } } ?> >Kottah</option>
                                                                </select>
                                                                <i class="arrow"></i>   
                                                                <span id="house_Carpet_Unit-error" class="error-show"></span>
                                                            </label>
                                                        </div>
                                                        <div class="section">
                                                            <label class="field select">
                                                                <select id="house_TotalCoveredLandArea_unit" name="house_TotalCoveredLandArea_unit">
                                                                    <option hidden >Unit</option>
                                                                    <option disabled >Select one </option>
                                                                    <option value="Sqft" <?php if(!empty($house_details)){ if($house_details->house_TotalCoveredLandArea_unit == 'Sqft'){ echo 'selected'; } } ?> >Sqft</option>
                                                                    <option value="Sq-m" <?php if(!empty($house_details)){ if($house_details->house_TotalCoveredLandArea_unit == 'Sq-m'){ echo 'selected'; } } ?> >Sq-m</option>
                                                                    <option value="Acre" <?php if(!empty($house_details)){ if($house_details->house_TotalCoveredLandArea_unit == 'Acre'){ echo 'selected'; } } ?> >Acre</option>
                                                                    <option value="Bigha" <?php if(!empty($house_details)){ if($house_details->house_TotalCoveredLandArea_unit == 'Bigha'){ echo 'selected'; } } ?> >Bigha</option>
                                                                    <option value="Hectare" <?php if(!empty($house_details)){ if($house_details->house_TotalCoveredLandArea_unit == 'Hectare'){ echo 'selected'; } } ?> >Hectare</option>
                                                                    <option value="Marla" <?php if(!empty($house_details)){ if($house_details->house_TotalCoveredLandArea_unit == 'Marla'){ echo 'selected'; } } ?> >Marla</option>
                                                                    <option value="Chatak" <?php if(!empty($house_details)){ if($house_details->house_TotalCoveredLandArea_unit == 'Chatak'){ echo 'selected'; } } ?> >Chatak</option>
                                                                    <option value="Kottah" <?php if(!empty($house_details)){ if($house_details->house_TotalCoveredLandArea_unit == 'Kottah'){ echo 'selected'; } } ?> >Kottah</option>
                                                                </select>
                                                                <i class="arrow"></i>  
                                                                <span id="house_TotalCoveredLandArea_unit-error" class="error-show"></span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="section">
                                                    <label class="field select">
                                                        <select id="house_TotalFloor" name="house_TotalFloor">
                                                            <option hidden >Total Floor</option>
                                                            <option disabled >Select one </option>
                                                            <option value="G" <?php if(!empty($house_details)){ if($house_details->house_TotalFloor == 'G'){ echo 'selected'; } } ?>>G</option>
                                                            <?php for($i = 1; $i<=100; $i++){ ?>
                                                            <option value="<?php echo $i; ?>" <?php if(!empty($house_details)){ if($house_details->house_TotalFloor == $i){ echo 'selected'; } } ?>><?php echo $i; ?></option>
                                                            <?php } ?>
                                                        </select>
                                                        <i class="arrow"></i>   
                                                        <span id="house_TotalFloor-error" class="error-show"></span>
                                                    </label>
                                                </div>
                                            </div>
                                            <!-- end .colm6 section -->
                                            <div class="colm colm6">
                                                <div class="section">
                                                    <label class="field select">
                                                        <select id="house_Bathroom" name="house_Bathroom">
                                                            <option hidden >Bathroom</option>
                                                            <option disabled >Select one </option>
                                                            <?php for($i = 1; $i<=100; $i++){ ?>
                                                            <option value="<?php echo $i; ?>" <?php if(!empty($house_details)){ if($house_details->house_Bathroom == $i){ echo 'selected'; } } ?>><?php echo $i; ?></option>
                                                            <?php } ?>
                                                        </select>
                                                        <i class="arrow"></i>  
                                                        <span id="house_Bathroom-error" class="error-show"></span>
                                                    </label>
                                                </div>
                                                <div class="section">
                                                    <label class="field select">
                                                        <select id="house_Kitchen" name="house_Kitchen">
                                                            <option hidden >Kitchen</option>
                                                            <option disabled >Select one </option>
                                                            <?php for($i = 1; $i<=100; $i++){ ?>
                                                            <option value="<?php echo $i; ?>" <?php if(!empty($house_details)){ if($house_details->house_Kitchen == $i){ echo 'selected'; } } ?>><?php echo $i; ?></option>
                                                            <?php } ?>
                                                        </select>
                                                        <i class="arrow"></i>  
                                                        <span id="house_Kitchen-error" class="error-show"></span>
                                                    </label>
                                                </div>
                                                <div class="frm-row2">
                                                    <div class="colm1 colm6">
                                                        <div class="section">
                                                            <label class="field prepend-icon">
                                                            <input type="number" name="house_BuildupArea" id="house_BuildupArea" class="gui-input" placeholder="Build up Area" onkeypress="return event.charCode >= 48" min="0" value="<?php if(!empty($house_details)){ echo $house_details->house_BuildupArea; } ?>">
                                                            <span class="field-icon"><i class="fa fa-object-group"></i></span>  
                                                            </label>
                                                            <span id="house_BuildupArea-error" class="error-show"></span>
                                                        </div>
                                                        <div class="section">
                                                            <label class="field prepend-icon">
                                                            <input type="number" name="house_TotalLandArea" id="house_TotalLandArea" class="gui-input" placeholder="Total Land Area" onkeypress="return event.charCode >= 48" min="0" value="<?php if(!empty($house_details)){ echo $house_details->house_TotalLandArea; } ?>">
                                                            <span class="field-icon"><i class="fa fa-object-group"></i></span>  
                                                            </label>
                                                            <span id="house_TotalLandArea-error" class="error-show"></span>
                                                        </div>
                                                        <div class="section">
                                                            <label class="field prepend-icon">
                                                            <input type="number" name="house_TotalUncoveredLandArea" id="house_TotalUncoveredLandArea" class="gui-input" placeholder="Total Uncovered Land Area" onkeypress="return event.charCode >= 48" min="0" value="<?php if(!empty($house_details)){ echo $house_details->house_TotalUncoveredLandArea; } ?>">
                                                            <span class="field-icon"><i class="fa fa-object-group"></i></span>  
                                                            </label>
                                                            <span id="house_TotalUncoveredLandArea-error" class="error-show"></span>
                                                        </div>
                                                    </div>
                                                    <div class="colm2 colm6">
                                                        <div class="section">
                                                            <label class="field select">
                                                                <select id="house_BuildupAreaUnit" name="house_BuildupAreaUnit">
                                                                    <option hidden >Unit</option>
                                                                    <option disabled >Select one </option>
                                                                    <option value="Sqft" <?php if(!empty($house_details)){ if($house_details->house_BuildupAreaUnit == 'Sqft'){ echo 'selected'; } } ?> >Sqft</option>
                                                                    <option value="Sq-m" <?php if(!empty($house_details)){ if($house_details->house_BuildupAreaUnit == 'Sq-m'){ echo 'selected'; } } ?> >Sq-m</option>
                                                                    <option value="Acre" <?php if(!empty($house_details)){ if($house_details->house_BuildupAreaUnit == 'Acre'){ echo 'selected'; } } ?> >Acre</option>
                                                                    <option value="Bigha" <?php if(!empty($house_details)){ if($house_details->house_BuildupAreaUnit == 'Bigha'){ echo 'selected'; } } ?> >Bigha</option>
                                                                    <option value="Hectare" <?php if(!empty($house_details)){ if($house_details->house_BuildupAreaUnit == 'Hectare'){ echo 'selected'; } } ?> >Hectare</option>
                                                                    <option value="Marla" <?php if(!empty($house_details)){ if($house_details->house_BuildupAreaUnit == 'Marla'){ echo 'selected'; } } ?> >Marla</option>
                                                                    <option value="Chatak" <?php if(!empty($house_details)){ if($house_details->house_BuildupAreaUnit == 'Chatak'){ echo 'selected'; } } ?> >Chatak</option>
                                                                    <option value="Kottah" <?php if(!empty($house_details)){ if($house_details->house_BuildupAreaUnit == 'Kottah'){ echo 'selected'; } } ?> >Kottah</option>
                                                                </select>
                                                                <i class="arrow"></i>   
                                                                <span id="house_BuildupAreaUnit-error" class="error-show"></span>
                                                            </label>
                                                        </div>
                                                        <div class="section">
                                                            <label class="field select">
                                                                <select id="house_TotalLandArea_Unit" name="house_TotalLandArea_Unit">
                                                                    <option hidden >Unit</option>
                                                                    <option disabled >Select one </option>
                                                                    <option value="Sqft" <?php if(!empty($house_details)){ if($house_details->house_TotalLandArea_Unit == 'Sqft'){ echo 'selected'; } } ?> >Sqft</option>
                                                                    <option value="Sq-m" <?php if(!empty($house_details)){ if($house_details->house_TotalLandArea_Unit == 'Sq-m'){ echo 'selected'; } } ?> >Sq-m</option>
                                                                    <option value="Acre" <?php if(!empty($house_details)){ if($house_details->house_TotalLandArea_Unit == 'Acre'){ echo 'selected'; } } ?> >Acre</option>
                                                                    <option value="Bigha" <?php if(!empty($house_details)){ if($house_details->house_TotalLandArea_Unit == 'Bigha'){ echo 'selected'; } } ?> >Bigha</option>
                                                                    <option value="Hectare" <?php if(!empty($house_details)){ if($house_details->house_TotalLandArea_Unit == 'Hectare'){ echo 'selected'; } } ?> >Hectare</option>
                                                                    <option value="Marla" <?php if(!empty($house_details)){ if($house_details->house_TotalLandArea_Unit == 'Marla'){ echo 'selected'; } } ?> >Marla</option>
                                                                    <option value="Chatak" <?php if(!empty($house_details)){ if($house_details->house_TotalLandArea_Unit == 'Chatak'){ echo 'selected'; } } ?> >Chatak</option>
                                                                    <option value="Kottah" <?php if(!empty($house_details)){ if($house_details->house_TotalLandArea_Unit == 'Kottah'){ echo 'selected'; } } ?> >Kottah</option>
                                                                </select>
                                                                <i class="arrow"></i>    
                                                                <span id="house_TotalLandArea_Unit-error" class="error-show"></span>
                                                            </label>
                                                        </div>
                                                        <div class="section">
                                                            <label class="field select">
                                                                <select id="house_TotalUncoveredLandArea_Unit" name="house_TotalUncoveredLandArea_Unit">
                                                                    <option hidden >Unit</option>
                                                                    <option disabled >Select one </option>
                                                                    <option value="Sqft" <?php if(!empty($house_details)){ if($house_details->house_TotalUncoveredLandArea_Unit == 'Sqft'){ echo 'selected'; } } ?> >Sqft</option>
                                                                    <option value="Sq-m" <?php if(!empty($house_details)){ if($house_details->house_TotalUncoveredLandArea_Unit == 'Sq-m'){ echo 'selected'; } } ?> >Sq-m</option>
                                                                    <option value="Acre" <?php if(!empty($house_details)){ if($house_details->house_TotalUncoveredLandArea_Unit == 'Acre'){ echo 'selected'; } } ?> >Acre</option>
                                                                    <option value="Bigha" <?php if(!empty($house_details)){ if($house_details->house_TotalUncoveredLandArea_Unit == 'Bigha'){ echo 'selected'; } } ?> >Bigha</option>
                                                                    <option value="Hectare" <?php if(!empty($house_details)){ if($house_details->house_TotalUncoveredLandArea_Unit == 'Hectare'){ echo 'selected'; } } ?> >Hectare</option>
                                                                    <option value="Marla" <?php if(!empty($house_details)){ if($house_details->house_TotalUncoveredLandArea_Unit == 'Marla'){ echo 'selected'; } } ?> >Marla</option>
                                                                    <option value="Chatak" <?php if(!empty($house_details)){ if($house_details->house_TotalUncoveredLandArea_Unit == 'Chatak'){ echo 'selected'; } } ?> >Chatak</option>
                                                                    <option value="Kottah" <?php if(!empty($house_details)){ if($house_details->house_TotalUncoveredLandArea_Unit == 'Kottah'){ echo 'selected'; } } ?> >Kottah</option>
                                                                </select>
                                                                <i class="arrow"></i>  
                                                                <span id="house_TotalUncoveredLandArea_Unit-error" class="error-show"></span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- end .colm6 section --> 
                                        </div>
                                        <!-- end .frm-row section -->                                      
                                    </div>
                                </div>
                                <!-- end .smart-forms section -->
                            </div>
                            <!-- end .smart-wrap section -->
                            <!--<input type="button" name="previous" class="pre_btn m-t20 m-lr10" value="Back" />
                            <input type="button" name="next" class="next_btn m-t20 m-lr10" value="Save & Next" />
                        </fieldset>-->
<!-------------------------------------------------------------------------
#Step 5 area start (Stock Land Rent)
-------------------------------------------------------------------------->
                        <!--<fieldset >-->
                            <div class="smart-wrap" id="StockLandRent" style="display:none;">
                                <div class="smart-forms smart-container wrap-0">
                                    <div class="form-body">
                                        <div class="spacer-b30">
                                            <div class="tagline"><span>Property Details (Stock Land Rent)</span></div>
                                            <!-- .tagline -->
                                        </div>
                                        <div class="frm-row">
                                            <div class="colm colm6">
                                                <div class="frm-row2">
                                                    <div class="colm1 colm6">
                                                        <div class="section">
                                                            <label class="field prepend-icon">
                                                            <input type="number" name="LandArea" id="LandArea" class="gui-input" placeholder="Land Area" onkeypress="return event.charCode >= 48" min="0" value="<?php if(!empty($land_details)){ echo $land_details->LandArea; } ?>" >
                                                            <span class="field-icon"><i class="fa fa-object-group"></i></span>  
                                                            </label>
                                                            <span id="LandArea-error" class="error-show"></span>
                                                        </div>
                                                    </div>
                                                    <div class="colm2 colm6">
                                                        <div class="section">
                                                            <label class="field select">
                                                                <select id="land_SuperBuildupArea_Unit" name="land_SuperBuildupArea_Unit">
                                                                    <option hidden >Unit</option>
                                                                    <option disabled >Select one </option>
                                                                    <option value="Sqft" <?php if(!empty($land_details)){ if($land_details->land_SuperBuildupArea_Unit == 'Sqft'){ echo 'selected'; } } ?> >Sqft</option>
                                                                    <option value="Sq-m" <?php if(!empty($land_details)){ if($land_details->land_SuperBuildupArea_Unit == 'Sq-m'){ echo 'selected'; } } ?> >Sq-m</option>
                                                                    <option value="Acre" <?php if(!empty($land_details)){ if($land_details->land_SuperBuildupArea_Unit == 'Acre'){ echo 'selected'; } } ?> >Acre</option>
                                                                    <option value="Bigha" <?php if(!empty($land_details)){ if($land_details->land_SuperBuildupArea_Unit == 'Bigha'){ echo 'selected'; } } ?> >Bigha</option>
                                                                    <option value="Hectare" <?php if(!empty($land_details)){ if($land_details->land_SuperBuildupArea_Unit == 'Hectare'){ echo 'selected'; } } ?> >Hectare</option>
                                                                    <option value="Marla" <?php if(!empty($land_details)){ if($land_details->land_SuperBuildupArea_Unit == 'Marla'){ echo 'selected'; } } ?> >Marla</option>
                                                                    <option value="Chatak" <?php if(!empty($land_details)){ if($land_details->land_SuperBuildupArea_Unit == 'Chatak'){ echo 'selected'; } } ?> >Chatak</option>
                                                                    <option value="Kottah" <?php if(!empty($land_details)){ if($land_details->land_SuperBuildupArea_Unit == 'Kottah'){ echo 'selected'; } } ?> >Kottah</option>
                                                                </select>
                                                                <i class="arrow"></i>     
                                                                <span id="land_SuperBuildupArea_Unit-error" class="error-show"></span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="section">
                                                    <label class="field select">
                                                        <select id="LandStatus" name="LandStatus">
                                                            <option hidden >Land Status</option>
                                                            <option value="Vacant" <?php if(!empty($land_details)){ if($land_details->LandStatus == 'Vacant'){ echo 'selected'; } } ?>>Vacant</option>
                                                            <option value="Occupied" <?php if(!empty($land_details)){ if($land_details->LandStatus == 'Occupied'){ echo 'selected'; } } ?> >Occupied</option>
                                                        </select>
                                                        <i class="arrow"></i>  
                                                        <span id="LandStatus-error" class="error-show"></span>
                                                    </label>
                                                </div>
                                                <div class="section">
                                                    <label class="field select">
                                                        <select id="NatureofLand" name="NatureofLand">
                                                            <option hidden >Nature Of Land</option>
                                                            <option value="Normal" <?php if(!empty($land_details)){ if($land_details->NatureofLand == 'Normal'){ echo 'selected'; } } ?> >Normal</option>
                                                            <option value="Agriculture" <?php if(!empty($land_details)){ if($land_details->NatureofLand == 'Agriculture'){ echo 'selected'; } } ?> >Agriculture</option>
                                                            <option value="Industrial" <?php if(!empty($land_details)){ if($land_details->NatureofLand == 'Industrial'){ echo 'selected'; } } ?> >Industrial</option>
                                                        </select>
                                                        <i class="arrow"></i>   
                                                        <span id="NatureofLand-error" class="error-show"></span>
                                                    </label>
                                                </div>
                                                <div class="section">
                                                    <label class="field select">
                                                        <select id="PropertyTax" name="PropertyTax">
                                                            <option hidden >Property Tax</option>
                                                            <option value="Paid"  <?php if(!empty($land_details)){ if($land_details->PropertyTax == 'Paid'){ echo 'selected'; } } ?>  >Paid</option>
                                                            <option value="Due"  <?php if(!empty($land_details)){ if($land_details->PropertyTax == 'Due'){ echo 'selected'; } } ?>  >Due</option>
                                                        </select>
                                                        <i class="arrow"></i>    
                                                        <span id="PropertyTax-error" class="error-show"></span>
                                                    </label>
                                                </div>
                                                <div class="section">
                                                    <label class="field select">
                                                        <select id="LandFacing" name="LandFacing">
                                                            <option hidden >Land Facing</option>
                                                            <option value="Normal" <?php if(!empty($land_details)){ if($land_details->PropertyTax == 'Normal'){ echo 'selected'; } } ?> >South</option>
                                                            <option value="Agriculture" <?php if(!empty($land_details)){ if($land_details->PropertyTax == 'Agriculture'){ echo 'selected'; } } ?> >North</option>
                                                            <option value="Industrial" <?php if(!empty($land_details)){ if($land_details->PropertyTax == 'Industrial'){ echo 'selected'; } } ?> >West</option>
                                                        </select>
                                                        <i class="arrow"></i>  
                                                        <span id="LandFacing-error" class="error-show"></span>
                                                    </label>
                                                </div>
                                            </div>
                                            <!-- end .colm6 section -->
                                            <div class="colm colm6">
                                                <div class="frm-row2">
                                                    <div class="colm1 colm6">
                                                        <div class="section">
                                                            <label class="field prepend-icon">
                                                            <input type="text" name="landCoveredArea" id="landCoveredArea" class="gui-input" placeholder="Covered Area" value="<?php if(!empty($land_details)){ echo $land_details->landCoveredArea; } ?>"  >
                                                            <span class="field-icon"><i class="fa fa-object-group"></i></span>  
                                                            </label>
                                                            <span id="landCoveredArea-error" class="error-show"></span>
                                                        </div>
                                                    </div>
                                                    <div class="colm2 colm6">
                                                        <div class="section">
                                                            <label class="field select">
                                                                <select id="landCoveredAreaUnit" name="landCoveredAreaUnit">
                                                                    <option hidden >Unit</option>
                                                                    <option disabled >Select one </option>
                                                                    <option value="Sqft" <?php if(!empty($land_details)){ if($land_details->landCoveredAreaUnit == 'Sqft'){ echo 'selected'; } } ?> >Sqft</option>
                                                                    <option value="Sq-m" <?php if(!empty($land_details)){ if($land_details->landCoveredAreaUnit == 'Sq-m'){ echo 'selected'; } } ?> >Sq-m</option>
                                                                    <option value="Acre" <?php if(!empty($land_details)){ if($land_details->landCoveredAreaUnit == 'Acre'){ echo 'selected'; } } ?> >Acre</option>
                                                                    <option value="Bigha" <?php if(!empty($land_details)){ if($land_details->landCoveredAreaUnit == 'Bigha'){ echo 'selected'; } } ?> >Bigha</option>
                                                                    <option value="Hectare" <?php if(!empty($land_details)){ if($land_details->landCoveredAreaUnit == 'Hectare'){ echo 'selected'; } } ?> >Hectare</option>
                                                                    <option value="Marla" <?php if(!empty($land_details)){ if($land_details->landCoveredAreaUnit == 'Marla'){ echo 'selected'; } } ?> >Marla</option>
                                                                    <option value="Chatak" <?php if(!empty($land_details)){ if($land_details->landCoveredAreaUnit == 'Chatak'){ echo 'selected'; } } ?> >Chatak</option>
                                                                    <option value="Kottah" <?php if(!empty($land_details)){ if($land_details->landCoveredAreaUnit == 'Kottah'){ echo 'selected'; } } ?> >Kottah</option>
                                                                </select>
                                                                <i class="arrow"></i>
                                                                <span id="landCoveredAreaUnit-error" class="error-show"></span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="section">
                                                    <label class="field select">
                                                        <select id="IstheExistingOwner" name="IstheExistingOwner">
                                                            <option hidden >Is the Existing Owner</option>
                                                            <option value="Alive" <?php if(!empty($land_details)){ if($land_details->IstheExistingOwner == 'Alive'){ echo 'selected'; } } ?> >Alive</option>
                                                            <option value="Deceased" <?php if(!empty($land_details)){ if($land_details->IstheExistingOwner == 'Deceased'){ echo 'selected'; } } ?> >Deceased</option>
                                                        </select>
                                                        <i class="arrow"></i>   
                                                        <span id="IstheExistingOwner-error" class="error-show"></span>
                                                    </label>
                                                </div>
                                                <div class="section">
                                                    <label class="field select">
                                                        <select id="NoOfOwner" name="NoOfOwner">
                                                            <option hidden >No Of Owner</option>
                                                            <?php for($i = 1; $i<=100; $i++){ ?>
                                                            <option value="<?php echo $i; ?>" <?php if(!empty($land_details)){ if($land_details->NoOfOwner == $i){ echo 'selected'; } } ?>><?php echo $i; ?></option>
                                                            <?php } ?>
                                                        </select>
                                                        <i class="arrow"></i>    
                                                        <span id="NoOfOwner-error" class="error-show"></span>
                                                    </label>
                                                </div>
                                                <div class="section">
                                                    <label class="field select">
                                                        <select id="Mutation" name="Mutation">
                                                            <option hidden >Mutation</option>
                                                            <option value="Done" <?php if(!empty($land_details)){ if($land_details->Mutation == 'Done'){ echo 'selected'; } } ?> >Done</option>
                                                            <option value="NotDone" <?php if(!empty($land_details)){ if($land_details->Mutation == 'NotDone'){ echo 'selected'; } } ?> >Not Done</option>
                                                        </select>
                                                        <i class="arrow"></i>  
                                                        <span id="Mutation-error" class="error-show"></span>
                                                    </label>
                                                </div>
                                                <div class="frm-row2">
                                                    <div class="colm1 colm6">
                                                        <div class="section">
                                                            <label class="field prepend-icon">
                                                            <input type="text" name="LandRoadWide" id="LandRoadWide" class="gui-input" placeholder="Land Road Wide" value="<?php if(!empty($land_details)){ echo $land_details->LandRoadWide; } ?>" >
                                                            <span class="field-icon"><i class="fa fa-road"></i></span>  
                                                            </label>
                                                            <span id="LandRoadWide-error" class="error-show"></span>
                                                        </div>
                                                    </div>
                                                    <div class="colm2 colm6">
                                                        <div class="section">
                                                            <label class="field select">
                                                                <select id="LandRoadWideUnit" name="LandRoadWideUnit">
                                                                    <option hidden >Unit</option>
                                                                    <option disabled >Select one </option>
                                                                    <option value="Sqft" <?php if(!empty($land_details)){ if($land_details->LandRoadWideUnit == 'Sqft'){ echo 'selected'; } } ?> >Sqft</option>
                                                                    <option value="Sq-m" <?php if(!empty($land_details)){ if($land_details->LandRoadWideUnit == 'Sq-m'){ echo 'selected'; } } ?>>MT</option>
                                                                </select>
                                                                <i class="arrow"></i>  
                                                                <span id="LandRoadWideUnit-error" class="error-show"></span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- end .colm6 section -->      
                                        </div>
                                        <!-- end .frm-row section -->                                      
                                    </div>
                                </div>
                                <!-- end .smart-forms section -->
                            </div>
                            <!-- end .smart-wrap section -->
                        <!--    <input type="button" name="previous" class="pre_btn m-t20 m-lr10" value="Back" />-->
                        <!--    <input type="button" name="next" class="next_btn m-t20 m-lr10" value="Save & Next" />-->
                        <!--</fieldset>-->
<!-------------------------------------------------------------------------
#Step 5 area start (Stock Office Rent)
-------------------------------------------------------------------------->
                        <!--<fieldset >-->
                            <div class="smart-wrap" id="StockOfficeRent" style="display:none;">
                                <div class="smart-forms smart-container wrap-0">
                                    <div class="form-body">
                                        <div class="spacer-b30">
                                            <div class="tagline"><span>Property Details (Stock Office Rent)</span></div>
                                            <!-- .tagline -->
                                        </div>
                                        <div class="frm-row">
                                            <div class="colm colm6">
                                                <div class="section">
                                                    <label class="field select">
                                                        <select id="officeNumberofCabin" name="officeNumberofCabin">
                                                            <option hidden >Number of Cabin</option>
                                                            <option disabled >Select one </option>
                                                            <?php for($i = 1; $i<=100; $i++){ ?>
                                                            <option value="<?php echo $i; ?>" <?php if(!empty($office_details)){ if($office_details->officeNumberofCabin == $i){ echo 'selected'; } } ?>><?php echo $i; ?></option>
                                                            <?php } ?>
                                                        </select>
                                                        <i class="arrow"></i>   
                                                        <span id="officeNumberofCabin-error" class="error-show"></span>
                                                    </label>
                                                </div>
                                                <div class="frm-row2">
                                                    <div class="colm1 colm6">
                                                        <div class="section">
                                                            <label class="field prepend-icon">
                                                            <input type="number" name="officeSuperBuildupArea" id="officeSuperBuildupArea" class="gui-input" placeholder="Super Build up Area" onkeypress="return event.charCode >= 48" min="0" value="<?php if(!empty($office_details)){ echo $office_details->officeSuperBuildupArea; } ?>"  >
                                                            <span class="field-icon"><i class="fa fa-object-group"></i></span>  
                                                            </label>
                                                            <span id="officeSuperBuildupArea-error" class="error-show"></span>
                                                        </div>
                                                        <div class="section">
                                                            <label class="field prepend-icon">
                                                            <input type="number" name="officeCarpetArea" id="officeCarpetArea" class="gui-input" placeholder="Carpet Area" onkeypress="return event.charCode >= 48" min="0" value="<?php if(!empty($office_details)){ echo $office_details->officeCarpetArea; } ?>"  >
                                                            <span class="field-icon"><i class="fa fa-object-group"></i></span>  
                                                            </label>
                                                            <span id="officeCarpetArea-error" class="error-show"></span>
                                                        </div>
                                                    </div>
                                                    <div class="colm2 colm6">
                                                        <div class="section">
                                                            <label class="field select">
                                                                <select id="officeSuperBuildupAreaUnit" name="officeSuperBuildupAreaUnit">
                                                                    <option hidden >Unit</option>
                                                                    <option disabled >Select one </option>
                                                                    <option value="Sqft" <?php if(!empty($office_details)){ if($office_details->officeSuperBuildupAreaUnit == 'Sqft'){ echo 'selected'; } } ?> >Sqft</option>
                                                                    <option value="Sq-m" <?php if(!empty($office_details)){ if($office_details->officeSuperBuildupAreaUnit == 'Sq-m'){ echo 'selected'; } } ?> >Sq-m</option>
                                                                    <option value="Acre" <?php if(!empty($office_details)){ if($office_details->officeSuperBuildupAreaUnit == 'Acre'){ echo 'selected'; } } ?> >Acre</option>
                                                                    <option value="Bigha" <?php if(!empty($office_details)){ if($office_details->officeSuperBuildupAreaUnit == 'Bigha'){ echo 'selected'; } } ?> >Bigha</option>
                                                                    <option value="Hectare" <?php if(!empty($office_details)){ if($office_details->officeSuperBuildupAreaUnit == 'Hectare'){ echo 'selected'; } } ?> >Hectare</option>
                                                                    <option value="Marla" <?php if(!empty($office_details)){ if($office_details->officeSuperBuildupAreaUnit == 'Marla'){ echo 'selected'; } } ?> >Marla</option>
                                                                    <option value="Chatak" <?php if(!empty($office_details)){ if($office_details->officeSuperBuildupAreaUnit == 'Chatak'){ echo 'selected'; } } ?> >Chatak</option>
                                                                    <option value="Kottah" <?php if(!empty($office_details)){ if($office_details->officeSuperBuildupAreaUnit == 'Kottah'){ echo 'selected'; } } ?> >Kottah</option>
                                                                </select>
                                                                <i class="arrow"></i>  
                                                                <span id="officeSuperBuildupAreaUnit-error" class="error-show"></span>
                                                            </label>
                                                        </div>
                                                        <div class="section">
                                                            <label class="field select">
                                                                <select id="officeCarpetUnit" name="officeCarpetUnit">
                                                                    <option hidden >Unit</option>
                                                                    <option disabled >Select one </option>
                                                                    <option value="Sqft" <?php if(!empty($office_details)){ if($office_details->officeCarpetUnit == 'Sqft'){ echo 'selected'; } } ?> >Sqft</option>
                                                                    <option value="Sq-m" <?php if(!empty($office_details)){ if($office_details->officeCarpetUnit == 'Sq-m'){ echo 'selected'; } } ?> >Sq-m</option>
                                                                    <option value="Acre" <?php if(!empty($office_details)){ if($office_details->officeCarpetUnit == 'Acre'){ echo 'selected'; } } ?> >Acre</option>
                                                                    <option value="Bigha" <?php if(!empty($office_details)){ if($office_details->officeCarpetUnit == 'Bigha'){ echo 'selected'; } } ?> >Bigha</option>
                                                                    <option value="Hectare" <?php if(!empty($office_details)){ if($office_details->officeCarpetUnit == 'Hectare'){ echo 'selected'; } } ?> >Hectare</option>
                                                                    <option value="Marla" <?php if(!empty($office_details)){ if($office_details->officeCarpetUnit == 'Marla'){ echo 'selected'; } } ?> >Marla</option>
                                                                    <option value="Chatak" <?php if(!empty($office_details)){ if($office_details->officeCarpetUnit == 'Chatak'){ echo 'selected'; } } ?> >Chatak</option>
                                                                    <option value="Kottah" <?php if(!empty($office_details)){ if($office_details->officeCarpetUnit == 'Kottah'){ echo 'selected'; } } ?> >Kottah</option>
                                                                </select>
                                                                <i class="arrow"></i> 
                                                                <span id="officeCarpetUnit-error" class="error-show"></span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="section">
                                                    <label class="field select">
                                                        <select id="Flooroffice" name="Flooroffice">
                                                            <option hidden >Floor</option>
                                                            <option disabled >Select one </option>
                                                            <option value="LowerBasement" <?php if(!empty($office_details)){ if($office_details->Flooroffice == 'LowerBasement'){ echo 'selected'; } } ?> >Lower Basement </option>
                                                            <option value="Basement" <?php if(!empty($office_details)){ if($office_details->Flooroffice == 'Basement'){ echo 'selected'; } } ?> >Basement </option>
                                                            <option value="G" <?php if(!empty($office_details)){ if($office_details->Flooroffice =='G' ){ echo 'selected'; } } ?> >G</option>
                                                            <?php for($i = 1; $i<=100; $i++){ ?>
                                                            <option value="<?php echo $i; ?>" <?php if(!empty($office_details)){ if($office_details->Flooroffice == $i){ echo 'selected'; } } ?>><?php echo $i; ?></option>
                                                            <?php } ?>
                                                        </select>
                                                        <i class="arrow"></i> 
                                                        <span id="Flooroffice-error" class="error-show"></span>
                                                    </label>
                                                </div>
                                                <div class="frm-row2">
                                                    <div class="colm1 colm6">
                                                        <div class="section">
                                                            <label class="field prepend-icon">
                                                            <input type="number" name="Pentryoffice" id="Pentryoffice" class="gui-input" placeholder="Pentry" onkeypress="return event.charCode >= 48" min="0" value="<?php if(!empty($office_details)){ echo $office_details->Pentryoffice; } ?>">
                                                            <span class="field-icon"><i class="fa fa-object-group"></i></span>  
                                                            </label>
                                                            <span id="Pentryoffice-error" class="error-show"></span>
                                                        </div>
                                                    </div>
                                                    <div class="colm2 colm6">
                                                        <div class="section">
                                                            <label class="field select">
                                                                <select id="PentryofficeUsedFor" name="PentryofficeUsedFor">
                                                                    <option hidden >Used For</option>
                                                                    <option value="Personal" <?php if(!empty($office_details)){ if($office_details->PentryofficeUsedFor == 'Personal'){ echo 'selected'; } } ?> >Personal</option>
                                                                    <option value="Common" <?php if(!empty($office_details)){ if($office_details->PentryofficeUsedFor == 'Common'){ echo 'selected'; } } ?> >Common</option>
                                                                </select>
                                                                <i class="arrow"></i>                    
                                                            </label>
                                                            <span id="PentryofficeUsedFor-error" class="error-show"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- end .colm6 section -->
                                            <div class="colm colm6">
                                                <div class="section">
                                                    <label class="field select">
                                                        <select id="officeNumberofWorkStation" name="officeNumberofWorkStation">
                                                            <option hidden >Number of Work Station</option>
                                                            <option disabled >Select one </option>
                                                            <?php for($i = 1; $i<=100; $i++){ ?>
                                                            <option value="<?php echo $i; ?>" <?php if(!empty($office_details)){ if($office_details->officeNumberofWorkStation == $i){ echo 'selected'; } } ?>><?php echo $i; ?></option>
                                                            <?php } ?>
                                                        </select>
                                                        <i class="arrow"></i>
                                                        <span id="officeNumberofWorkStation-error" class="error-show"></span>
                                                    </label>
                                                </div>
                                                <div class="frm-row2">
                                                    <div class="colm1 colm6">
                                                        <div class="section">
                                                            <label class="field prepend-icon">
                                                            <input type="number" name="officeBuildupArea" id="officeBuildupArea" class="gui-input" placeholder="Build up Area" onkeypress="return event.charCode >= 48" min="0" value="<?php if(!empty($office_details)){ echo $office_details->officeBuildupArea; } ?>" >
                                                            <span class="field-icon"><i class="fa fa-object-group"></i></span>  
                                                            </label>
                                                            <span id="officeBuildupArea-error" class="error-show"></span>
                                                        </div>
                                                    </div>
                                                    <div class="colm2 colm6">
                                                        <div class="section">
                                                            <label class="field select">
                                                                <select id="officeBuildupAreaUnit" name="officeBuildupAreaUnit">
                                                                    <option hidden >Unit</option>
                                                                    <option disabled >Select one </option>
                                                                    <option value="Sqft" <?php if(!empty($office_details)){ if($office_details->officeBuildupAreaUnit == 'Sqft'){ echo 'selected'; } } ?> >Sqft</option>
                                                                    <option value="Sq-m" <?php if(!empty($office_details)){ if($office_details->officeBuildupAreaUnit == 'Sq-m'){ echo 'selected'; } } ?> >Sq-m</option>
                                                                    <option value="Acre" <?php if(!empty($office_details)){ if($office_details->officeBuildupAreaUnit == 'Acre'){ echo 'selected'; } } ?> >Acre</option>
                                                                    <option value="Bigha" <?php if(!empty($office_details)){ if($office_details->officeBuildupAreaUnit == 'Bigha'){ echo 'selected'; } } ?> >Bigha</option>
                                                                    <option value="Hectare" <?php if(!empty($office_details)){ if($office_details->officeBuildupAreaUnit == 'Hectare'){ echo 'selected'; } } ?> >Hectare</option>
                                                                    <option value="Marla" <?php if(!empty($office_details)){ if($office_details->officeBuildupAreaUnit == 'Marla'){ echo 'selected'; } } ?> >Marla</option>
                                                                    <option value="Chatak" <?php if(!empty($office_details)){ if($office_details->officeBuildupAreaUnit == 'Chatak'){ echo 'selected'; } } ?> >Chatak</option>
                                                                    <option value="Kottah" <?php if(!empty($office_details)){ if($office_details->officeBuildupAreaUnit == 'Kottah'){ echo 'selected'; } } ?> >Kottah</option>
                                                                </select>
                                                                <i class="arrow"></i>  
                                                                <span id="officeBuildupAreaUnit-error" class="error-show"></span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="section">
                                                    <label class="field select">
                                                        <select id="officeAC" name="officeAC">
                                                            <option hidden >AC</option>
                                                            <option value="Yes" <?php if(!empty($office_details)){ if($office_details->officeAC == 'Yes'){ echo 'selected'; } } ?>>Yes</option>
                                                            <option value="No" <?php if(!empty($office_details)){ if($office_details->officeAC == 'No'){ echo 'selected'; } } ?>>No</option>
                                                        </select>
                                                        <i class="arrow"></i> 
                                                        <span id="officeAC-error" class="error-show"></span>
                                                    </label>
                                                </div>
                                                <div class="section">
                                                    <label class="field select">
                                                        <select id="officeTotalFloor" name="officeTotalFloor">
                                                            <option hidden >Total Floor</option>
                                                            <option disabled >Select one </option>
                                                            <option value="G" <?php if(!empty($office_details)){ if($office_details->officeTotalFloor == 'G'){ echo 'selected'; } } ?> >G</option>
                                                            <?php for($i = 1; $i<=100; $i++){ ?>
                                                            <option value="<?php echo $i; ?>" <?php if(!empty($office_details)){ if($office_details->officeTotalFloor == $i){ echo 'selected'; } } ?>><?php echo $i; ?></option>
                                                            <?php } ?>
                                                        </select>
                                                        <i class="arrow"></i>
                                                        <span id="officeTotalFloor-error" class="error-show"></span>
                                                    </label>
                                                </div>
                                                <div class="frm-row2">
                                                    <div class="colm1 colm6">
                                                        <div class="section">
                                                            <label class="field prepend-icon">
                                                            <input type="number" name="officeBathroom" id="officeBathroom" class="gui-input" placeholder="Bathroom" onkeypress="return event.charCode >= 48" min="0" value="<?php if(!empty($office_details)){ echo $office_details->officeBathroom; } ?>"  >
                                                            <span class="field-icon"><i class="fa fa-object-group"></i></span>  
                                                            </label>
                                                            <span id="officeBathroom-error" class="error-show"></span>
                                                        </div>
                                                    </div>
                                                    <div class="colm2 colm6">
                                                        <div class="section">
                                                            <label class="field select">
                                                                <select id="BathroomofficeUsedFor" name="BathroomofficeUsedFor">
                                                                    <option hidden >Used For</option>
                                                                    <option value="Personal" <?php if(!empty($office_details)){ if($office_details->officeTotalFloor == 'BathroomofficeUsedFor'){ echo 'selected'; } } ?> >Personal</option>
                                                                    <option value="Common" <?php if(!empty($office_details)){ if($office_details->officeTotalFloor == 'BathroomofficeUsedFor'){ echo 'selected'; } } ?>>Common</option>
                                                                </select>
                                                                <i class="arrow"></i> 
                                                                <span id="BathroomofficeUsedFor-error" class="error-show"></span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                            <!-- end .colm6 section --> 
                                        </div>
                                        <!-- end .frm-row section -->                                      
                                    </div>
                                </div>
                                <!-- end .smart-forms section -->
                            </div>
                            <!-- end .smart-wrap section -->
                        <!--    <input type="button" name="previous" class="pre_btn m-t20 m-lr10" value="Back" />-->
                        <!--    <input type="button" name="next" class="next_btn m-t20 m-lr10" value="Save & Next" />-->
                        <!--</fieldset>-->
<!-------------------------------------------------------------------------
#Step 5 area start (Stock Shop Rent)
-------------------------------------------------------------------------->
                        <!--<fieldset >-->
                            <div class="smart-wrap" id="StockShopRent" style="display:none;">
                                <div class="smart-forms smart-container wrap-0">
                                    <div class="form-body">
                                        <div class="spacer-b30">
                                            <div class="tagline"><span>Property Details (Stock Shop Rent)</span></div>
                                            <!-- .tagline -->
                                        </div>
                                        <div class="frm-row">
                                            <div class="colm colm6">
                                                <div class="section">
                                                    <label class="field select">
                                                        <select id="shoproof" name="shoproof">
                                                            <option hidden >Roof</option>
                                                            <option disabled >Select one </option>
                                                            <option value="RCC" <?php if(!empty($shop_details)){ if($shop_details->shoproof == 'RCC'){ echo 'selected'; } } ?> >RCC</option>
                                                            <option value="Shaded" <?php if(!empty($shop_details)){ if($shop_details->shoproof == 'Shaded'){ echo 'selected'; } } ?> >Shaded</option>
                                                        </select>
                                                        <i class="arrow"></i> 
                                                        <span id="shoproof-error" class="error-show"></span>
                                                    </label>
                                                </div>
                                                <div class="frm-row2">
                                                    <div class="colm1 colm6">
                                                        <div class="section">
                                                            <label class="field prepend-icon">
                                                            <input type="number" name="shopSuperBuildupArea" id="shopSuperBuildupArea" class="gui-input" placeholder="Super Build up Area" onkeypress="return event.charCode >= 48" min="0" value="<?php if(!empty($shop_details)){ echo $shop_details->shopSuperBuildupArea; } ?>" >
                                                            <span class="field-icon"><i class="fa fa-object-group"></i></span>  
                                                            </label>
                                                            <span id="shopSuperBuildupArea-error" class="error-show"></span>
                                                        </div>
                                                        <div class="section">
                                                            <label class="field prepend-icon">
                                                            <input type="number" name="shopCoveredArea" id="shopCoveredArea" class="gui-input" placeholder="Covered Area" onkeypress="return event.charCode >= 48" min="0" value="<?php if(!empty($shop_details)){ echo $shop_details->shopCoveredArea; } ?>" >
                                                            <span class="field-icon"><i class="fa fa-object-group"></i></span>  
                                                            </label>
                                                            <span id="shopCoveredArea-error" class="error-show"></span>
                                                        </div>
                                                    </div>
                                                    <div class="colm2 colm6">
                                                        <div class="section">
                                                            <label class="field select">
                                                                <select id="shopSuperBuildupAreaUnit" name="shopSuperBuildupAreaUnit">
                                                                    <option hidden >Unit</option>
                                                                    <option disabled >Select one </option>
                                                                    <option value="Sqft" <?php if(!empty($shop_details)){ if($shop_details->shopSuperBuildupAreaUnit == 'Sqft'){ echo 'selected'; } } ?> >Sqft</option>
                                                                    <option value="Sq-m" <?php if(!empty($shop_details)){ if($shop_details->shopSuperBuildupAreaUnit == 'Sq-m'){ echo 'selected'; } } ?> >Sq-m</option>
                                                                    <option value="Acre" <?php if(!empty($shop_details)){ if($shop_details->shopSuperBuildupAreaUnit == 'Acre'){ echo 'selected'; } } ?> >Acre</option>
                                                                    <option value="Bigha" <?php if(!empty($shop_details)){ if($shop_details->shopSuperBuildupAreaUnit == 'Bigha'){ echo 'selected'; } } ?> >Bigha</option>
                                                                    <option value="Hectare" <?php if(!empty($shop_details)){ if($shop_details->shopSuperBuildupAreaUnit == 'Hectare'){ echo 'selected'; } } ?> >Hectare</option>
                                                                    <option value="Marla" <?php if(!empty($shop_details)){ if($shop_details->shopSuperBuildupAreaUnit == 'Marla'){ echo 'selected'; } } ?> >Marla</option>
                                                                    <option value="Chatak" <?php if(!empty($shop_details)){ if($shop_details->shopSuperBuildupAreaUnit == 'Chatak'){ echo 'selected'; } } ?> >Chatak</option>
                                                                    <option value="Kottah" <?php if(!empty($shop_details)){ if($shop_details->shopSuperBuildupAreaUnit == 'Kottah'){ echo 'selected'; } } ?> >Kottah</option>
                                                                </select>
                                                                <i class="arrow"></i>   
                                                                <span id="shopSuperBuildupAreaUnit-error" class="error-show"></span>
                                                            </label>
                                                        </div>
                                                        <div class="section">
                                                            <label class="field select">
                                                                <select id="shopCoveredAreaUnit" name="shopCoveredAreaUnit">
                                                                    <option hidden >Unit</option>
                                                                    <option disabled >Select one </option>
                                                                    <option value="Sqft" <?php if(!empty($shop_details)){ if($shop_details->shopCoveredAreaUnit == 'Sqft'){ echo 'selected'; } } ?> >Sqft</option>
                                                                    <option value="Sq-m" <?php if(!empty($shop_details)){ if($shop_details->shopCoveredAreaUnit == 'Sq-m'){ echo 'selected'; } } ?> >Sq-m</option>
                                                                    <option value="Acre" <?php if(!empty($shop_details)){ if($shop_details->shopCoveredAreaUnit == 'Acre'){ echo 'selected'; } } ?> >Acre</option>
                                                                    <option value="Bigha" <?php if(!empty($shop_details)){ if($shop_details->shopCoveredAreaUnit == 'Bigha'){ echo 'selected'; } } ?> >Bigha</option>
                                                                    <option value="Hectare" <?php if(!empty($shop_details)){ if($shop_details->shopCoveredAreaUnit == 'Hectare'){ echo 'selected'; } } ?> >Hectare</option>
                                                                    <option value="Marla" <?php if(!empty($shop_details)){ if($shop_details->shopCoveredAreaUnit == 'Marla'){ echo 'selected'; } } ?> >Marla</option>
                                                                    <option value="Chatak" <?php if(!empty($shop_details)){ if($shop_details->shopCoveredAreaUnit == 'Chatak'){ echo 'selected'; } } ?> >Chatak</option>
                                                                    <option value="Kottah" <?php if(!empty($shop_details)){ if($shop_details->shopCoveredAreaUnit == 'Kottah'){ echo 'selected'; } } ?> >Kottah</option>
                                                                </select>
                                                                <i class="arrow"></i>  
                                                                <span id="shopCoveredAreaUnit-error" class="error-show"></span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="section">
                                                    <label class="field select">
                                                        <select id="shopFloor" name="shopFloor">
                                                            <option hidden >Floor</option>
                                                            <option disabled >Select one </option>
                                                            <option value="G">G</option>
                                                            <?php for($i = 1; $i<=100; $i++){ ?>
                                                            <option value="<?php echo $i; ?>" <?php if(!empty($shop_details)){ if($shop_details->shopFloor == $i){ echo 'selected'; } } ?>><?php echo $i; ?></option>
                                                            <?php } ?>
                                                        </select>
                                                        <i class="arrow"></i>  
                                                        <span id="shopFloor-error" class="error-show"></span>
                                                    </label>
                                                </div>

                                                <div class="frm-row2">
                                                    <div class="colm1 colm6">
                                                        <div class="section">
                                                            <label class="field prepend-icon">
                                                            <input type="number" name="shopBathroom" id="shopBathroom" class="gui-input" placeholder="Bathroom" onkeypress="return event.charCode >= 48" min="0" value="<?php if(!empty($shop_details)){ echo $shop_details->shopBathroom; } ?>" >
                                                            <span class="field-icon"><i class="fa fa-bathtub"></i></span>  
                                                            </label>
                                                            <span id="shopBathroom-error" class="error-show"></span>
                                                        </div>
                                                        <div class="section">
                                                            <label class="field prepend-icon">
                                                            <input type="number" name="shopRoadWide" id="shopRoadWide" class="gui-input" placeholder="Road Wide" onkeypress="return event.charCode >= 48" min="0" value="<?php if(!empty($shop_details)){ echo $shop_details->shopRoadWide; } ?>" >
                                                            <span class="field-icon"><i class="fa fa-road"></i></span>  
                                                            </label>
                                                            <span id="shopRoadWide-error" class="error-show"></span>
                                                        </div>
                                                        <div class="section">
                                                            <label class="field select">
                                                                <select id="shopAvailableForBar" name="shopAvailableForBar">
                                                                    <option hidden >Available For Bar</option>
                                                                    <option value="Yes" <?php if(!empty($shop_details)){ if($shop_details->shopAvailableForBar == 'Yes'){ echo 'selected'; } } ?> >Yes</option>
                                                                    <option value="No" <?php if(!empty($shop_details)){ if($shop_details->shopAvailableForBar == 'No'){ echo 'selected'; } } ?> >No</option>
                                                                </select>
                                                                <i class="arrow"></i>
                                                                <span id="shopAvailableForBar-error" class="error-show"></span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="colm2 colm6">
                                                        <div class="section">
                                                            <label class="field select">
                                                                <select id="shopBathroomUnit" name="shopBathroomUnit">
                                                                    <option hidden >Used For</option>
                                                                    <option disabled >Select one </option>
                                                                    <option value="Personal" <?php if(!empty($shop_details)){ if($shop_details->shopBathroomUnit == 'Personal'){ echo 'selected'; } } ?> >Personal</option>
                                                                    <option value="Common" <?php if(!empty($shop_details)){ if($shop_details->shopBathroomUnit == 'Common'){ echo 'selected'; } } ?> >Common</option>
                                                                </select>
                                                                <i class="arrow"></i>   
                                                                <span id="shopBathroomUnit-error" class="error-show"></span>
                                                            </label>
                                                        </div>
                                                        <div class="section">
                                                            <label class="field select">
                                                                <select id="shopRoadWideUnit" name="shopRoadWideUnit">
                                                                    <option hidden >Unit</option>
                                                                    <option disabled >Select one </option>
                                                                    <option value="Sqft" <?php if(!empty($shop_details)){ if($shop_details->shopRoadWideUnit == 'Sqft'){ echo 'selected'; } } ?> >Sqft</option>
                                                                    <option value="Sq-m" <?php if(!empty($shop_details)){ if($shop_details->shopRoadWideUnit == 'Sq-m'){ echo 'selected'; } } ?> >MT</option>
                                                                </select>
                                                                <i class="arrow"></i>
                                                                <span id="shopRoadWideUnit-error" class="error-show"></span>
                                                            </label>
                                                        </div>
                                                        <div class="section">
                                                            <label class="field select">
                                                                <select id="shopForResturant" name="shopForResturant">
                                                                    <option hidden >For Resturant</option>
                                                                    <option value="Yes" <?php if(!empty($shop_details)){ if($shop_details->shopForResturant == 'Yes'){ echo 'selected'; } } ?> >Yes</option>
                                                                    <option value="No" <?php if(!empty($shop_details)){ if($shop_details->shopForResturant == 'No'){ echo 'selected'; } } ?> >No</option>
                                                                </select>
                                                                <i class="arrow"></i>
                                                                <span id="shopForResturant-error" class="error-show"></span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- end .colm6 section -->
                                            <div class="colm colm6">
                                                
                                                <div class="frm-row2">
                                                    <div class="colm1 colm6">
                                                        <div class="section">
                                                            <label class="field prepend-icon">
                                                            <input type="number" name="shopFrontage" id="shopFrontage" class="gui-input" placeholder="Frontage" onkeypress="return event.charCode >= 48" min="0" value="<?php if(!empty($shop_details)){ echo $shop_details->shopFrontage; } ?>" >
                                                            <span class="field-icon"><i class="fa fa-object-group"></i></span>  
                                                            </label>
                                                            <span id="shopFrontage-error" class="error-show"></span>
                                                        </div>
                                                        <div class="section">
                                                            <label class="field prepend-icon">
                                                            <input type="number" name="shopBuildupArea" id="shopBuildupArea" class="gui-input" placeholder="Build up Area" onkeypress="return event.charCode >= 48" min="0" value="<?php if(!empty($shop_details)){ echo $shop_details->shopBuildupArea; } ?>"  >
                                                            <span class="field-icon"><i class="fa fa-object-group"></i></span>  
                                                            </label>
                                                            <span id="shopBuildupArea-error" class="error-show"></span>
                                                        </div>
                                                        <div class="section">
                                                            <label class="field prepend-icon">
                                                            <input type="number" name="shopOpenArea" id="shopOpenArea" class="gui-input" placeholder="Open Area" onkeypress="return event.charCode >= 48" min="0" value="<?php if(!empty($shop_details)){ echo $shop_details->shopOpenArea; } ?>"  >
                                                            <span class="field-icon"><i class="fa fa-object-group"></i></span>  
                                                            </label>
                                                            <span id="shopOpenArea-error" class="error-show"></span>
                                                        </div>
                                                    </div>
                                                    <div class="colm2 colm6">
                                                        <div class="section">
                                                            <label class="field select">
                                                                <select id="shopFrontageUnit" name="shopFrontageUnit">
                                                                    <option hidden >Unit</option>
                                                                    <option disabled >Select one </option>
                                                                    <option value="Sqft" <?php if(!empty($project)){ if($project->shopBuildupAreaUnit == 'Sqft'){ echo 'selected'; } } ?> >FT</option>
                                                                    <option value="Sq-m" <?php if(!empty($project)){ if($project->shopBuildupAreaUnit == 'Sq-m'){ echo 'selected'; } } ?> >MT</option>
                                                                </select>
                                                                <i class="arrow"></i>  
                                                                <span id="shopBuildupAreaUnit-error" class="error-show"></span>
                                                            </label>
                                                        </div>
                                                        <div class="section">
                                                            <label class="field select">
                                                                <select id="shopBuildupAreaUnit" name="shopBuildupAreaUnit">
                                                                    <option hidden >Unit</option>
                                                                    <option value="Sqft" <?php if(!empty($shop_details)){ if($shop_details->shopBuildupAreaUnit == 'Sqft'){ echo 'selected'; } } ?> >Sqft</option>
                                                                    <option value="Sq-m" <?php if(!empty($shop_details)){ if($shop_details->shopBuildupAreaUnit == 'Sq-m'){ echo 'selected'; } } ?> >Sq-m</option>
                                                                    <option value="Acre" <?php if(!empty($shop_details)){ if($shop_details->shopBuildupAreaUnit == 'Acre'){ echo 'selected'; } } ?> >Acre</option>
                                                                    <option value="Bigha" <?php if(!empty($shop_details)){ if($shop_details->shopBuildupAreaUnit == 'Bigha'){ echo 'selected'; } } ?> >Bigha</option>
                                                                    <option value="Hectare" <?php if(!empty($shop_details)){ if($shop_details->shopBuildupAreaUnit == 'Hectare'){ echo 'selected'; } } ?> >Hectare</option>
                                                                    <option value="Marla" <?php if(!empty($shop_details)){ if($shop_details->shopBuildupAreaUnit == 'Marla'){ echo 'selected'; } } ?> >Marla</option>
                                                                    <option value="Chatak" <?php if(!empty($shop_details)){ if($shop_details->shopBuildupAreaUnit == 'Chatak'){ echo 'selected'; } } ?> >Chatak</option>
                                                                    <option value="Kottah" <?php if(!empty($shop_details)){ if($shop_details->shopBuildupAreaUnit == 'Kottah'){ echo 'selected'; } } ?> >Kottah</option>
                                                                </select>
                                                                <i class="arrow"></i> 
                                                                <span id="shopBuildupAreaUnit-error" class="error-show"></span>
                                                            </label>
                                                        </div>
                                                        <div class="section">
                                                            <label class="field select">
                                                                <select id="shopOpenAreaUnit" name="shopOpenAreaUnit">
                                                                    <option hidden >Unit</option>
                                                                    <option disabled >Select one </option>
                                                                    <option value="Sqft" <?php if(!empty($shop_details)){ if($shop_details->shopOpenAreaUnit == 'Sqft'){ echo 'selected'; } } ?> >Sqft</option>
                                                                    <option value="Sq-m" <?php if(!empty($shop_details)){ if($shop_details->shopOpenAreaUnit == 'Sq-m'){ echo 'selected'; } } ?> >Sq-m</option>
                                                                    <option value="Acre" <?php if(!empty($shop_details)){ if($shop_details->shopOpenAreaUnit == 'Acre'){ echo 'selected'; } } ?> >Acre</option>
                                                                    <option value="Bigha" <?php if(!empty($shop_details)){ if($shop_details->shopOpenAreaUnit == 'Bigha'){ echo 'selected'; } } ?> >Bigha</option>
                                                                    <option value="Hectare" <?php if(!empty($shop_details)){ if($shop_details->shopOpenAreaUnit == 'Hectare'){ echo 'selected'; } } ?> >Hectare</option>
                                                                    <option value="Marla" <?php if(!empty($shop_details)){ if($shop_details->shopOpenAreaUnit == 'Marla'){ echo 'selected'; } } ?> >Marla</option>
                                                                    <option value="Chatak" <?php if(!empty($shop_details)){ if($shop_details->shopOpenAreaUnit == 'Chatak'){ echo 'selected'; } } ?> >Chatak</option>
                                                                    <option value="Kottah" <?php if(!empty($shop_details)){ if($shop_details->shopOpenAreaUnit == 'Kottah'){ echo 'selected'; } } ?> >Kottah</option>
                                                                </select>
                                                                <i class="arrow"></i>  
                                                                <span id="shopOpenAreaUnit-error" class="error-show"></span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="section">
                                                    <label class="field select">
                                                        <select id="shopTotalFloor" name="shopTotalFloor">
                                                            <option hidden >Total Floor</option>
                                                            <option disabled >Select one </option>
                                                            <option value="LowerBasement" >Lower Basement </option>
                                                            <option value="Basement" >Basement </option>
                                                            <option value="G">G</option>
                                                            <?php for($i = 1; $i<=100; $i++){ ?>
                                                            <option value="<?php echo $i; ?>" <?php if(!empty($shop_details)){ if($shop_details->shopTotalFloor == $i){ echo 'selected'; } } ?>><?php echo $i; ?></option>
                                                            <?php } ?>
                                                        </select>
                                                        <i class="arrow"></i> 
                                                        <span id="shopTotalFloor-error" class="error-show"></span>
                                                    </label>
                                                </div>
                                                <div class="frm-row2">
                                                    <div class="colm1 colm6">
                                                        <div class="section">
                                                            <label class="field prepend-icon">
                                                            <input type="number" name="shopPentry" id="shopPentry" class="gui-input" placeholder="Pentry" onkeypress="return event.charCode >= 48" min="0" value="<?php if(!empty($shop_details)){ echo $shop_details->shopPentry; } ?>"  > 
                                                            <span class="field-icon"><i class="fa fa-object-group"></i></span>  
                                                            </label>
                                                            <span id="shopPentry-error" class="error-show"></span>
                                                        </div>
                                                        <div class="section">
                                                            <label class="field prepend-icon">
                                                            <input type="number" name="shopElectricPower" id="shopElectricPower" class="gui-input" placeholder="Electric Power" onkeypress="return event.charCode >= 48" min="0" value="<?php if(!empty($shop_details)){ echo $shop_details->shopElectricPower; } ?>"  >
                                                            <span class="field-icon"><i class="fa fa-plug"></i></span>  
                                                            </label>
                                                            <span id="shopElectricPower-error" class="error-show"></span>
                                                        </div>
                                                    </div>
                                                    <div class="colm2 colm6">
                                                        <div class="section">
                                                            <label class="field select">
                                                                <select id="shopPentryUsedFor" name="shopPentryUsedFor">
                                                                    <option hidden >Used For</option>
                                                                    <option value="Personal" <?php if(!empty($shop_details)){ if($shop_details->shopPentryUsedFor == 'Personal'){ echo 'selected'; } } ?> >Personal</option>
                                                                    <option value="Common" <?php if(!empty($shop_details)){ if($shop_details->shopPentryUsedFor == 'Common'){ echo 'selected'; } } ?> >Common</option>
                                                                </select>
                                                                <i class="arrow"></i> 
                                                                <span id="shopPentryUsedFor-error" class="error-show"></span>
                                                            </label>
                                                        </div>
                                                        <div class="section">
                                                            <label class="field select">
                                                                <select id="shopElectricPowerUnit" name="shopElectricPowerUnit">
                                                                    <option hidden >Unit</option>
                                                                    <option disabled >Select one </option>
                                                                    <option value="KG" <?php if(!empty($shop_details)){ if($shop_details->shopElectricPowerUnit == 'KG'){ echo 'selected'; } } ?>  >KG</option>
                                                                    <option value="HR Power" <?php if(!empty($shop_details)){ if($shop_details->shopElectricPowerUnit == 'HR Power'){ echo 'selected'; } } ?>  >HR Power</option>
                                                                </select>
                                                                <i class="arrow"></i>  
                                                                <span id="shopElectricPowerUnit-error" class="error-show"></span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="section">
                                                    <label class="field select">
                                                        <select id="shopHeavyVehicleParkingUpto" name="shopHeavyVehicleParkingUpto">
                                                            <option hidden >Heavy Vehicle Parking Upto</option>
                                                            <option disabled >Select one </option>
                                                            <option value="3Wheeler" <?php if(!empty($shop_details)){ if($shop_details->shopHeavyVehicleParkingUpto == '3Wheeler'){ echo 'selected'; } } ?> >3 Wheeler</option>
                                                            <option value="4Wheeler" <?php if(!empty($shop_details)){ if($shop_details->shopHeavyVehicleParkingUpto == '4Wheeler'){ echo 'selected'; } } ?>  >4 Wheeler</option>
                                                        </select>
                                                        <i class="arrow"></i>
                                                        <span id="shopHeavyVehicleParkingUpto-error" class="error-show"></span>
                                                    </label>
                                                </div>
                                            </div>
                                            <!-- end .colm6 section --> 
                                        </div>
                                        <!-- end .frm-row section -->                                      
                                    </div>
                                </div>
                                <!-- end .smart-forms section -->
                            </div>
                            <!-- end .smart-wrap section -->
                        <!--    <input type="button" name="previous" class="pre_btn m-t20 m-lr10" value="Back" />-->
                        <!--    <input type="button" name="next" class="next_btn m-t20 m-lr10" value="Save & Next" />-->
                        <!--</fieldset>-->
<!-------------------------------------------------------------------------
#Step 5 area start (Stock Warehouse Rent)
-------------------------------------------------------------------------->
                        <!--<fieldset >-->
                            <div class="smart-wrap" id="StockWarehouseRent" style="display:none;">
                                <div class="smart-forms smart-container wrap-0">
                                    <div class="form-body">
                                        <div class="spacer-b30">
                                            <div class="tagline"><span>Property Details (Stock Warehouse Rent)</span></div>
                                            <!-- .tagline -->
                                        </div>
                                        <div class="frm-row">
                                            <div class="colm colm6">
                                                <div class="section">
                                                    <label class="field select">
                                                        <select id="warehouseNumberofCabin" name="warehouseNumberofCabin">
                                                            <option hidden >Number of Cabin</option>
                                                            <option disabled >Select one </option>
                                                            <?php for($i = 1; $i<=100; $i++){ ?>
                                                            <option value="<?php echo $i; ?>" <?php if(!empty($warehouse_details)){ if($warehouse_details->warehouseNumberofCabin == $i){ echo 'selected'; } } ?>><?php echo $i; ?></option>
                                                            <?php } ?>
                                                        </select>
                                                        <i class="arrow"></i>
                                                        <span id="warehouseNumberofCabin-error" class="error-show"></span>
                                                    </label>
                                                </div>
                                                <div class="frm-row2">
                                                    <div class="colm1 colm6">
                                                        <div class="section">
                                                            <label class="field prepend-icon">
                                                            <input type="number" name="warehouseSuperBuildupArea" id="warehouseSuperBuildupArea" class="gui-input" placeholder="Super Build up Area" onkeypress="return event.charCode >= 48" min="0" value="<?php if(!empty($warehouse_details)){ echo $warehouse_details->warehouseSuperBuildupArea; } ?>" >
                                                            <span class="field-icon"><i class="fa fa-object-group"></i></span>  
                                                            </label>
                                                            <span id="warehouseSuperBuildupArea-error" class="error-show"></span>
                                                        </div>
                                                        <div class="section">
                                                            <label class="field prepend-icon">
                                                            <input type="number" name="warehouseCoveredArea" id="warehouseCoveredArea" class="gui-input" placeholder="Covered Area" onkeypress="return event.charCode >= 48" min="0" value="<?php if(!empty($warehouse_details)){ echo $warehouse_details->warehouseCoveredArea; } ?>" >
                                                            <span class="field-icon"><i class="fa fa-object-group"></i></span>  
                                                            </label>
                                                            <span id="warehouseCoveredArea-error" class="error-show"></span>
                                                        </div>
                                                    </div>
                                                    <div class="colm2 colm6">
                                                        <div class="section">
                                                            <label class="field select">
                                                                <select id="warehouseSuperBuildupAreaUnit" name="warehouseSuperBuildupAreaUnit">
                                                                    <option hidden >Unit</option>
                                                                    <option disabled >Select one </option>
                                                                    <option value="Sqft" <?php if(!empty($warehouse_details)){ if($warehouse_details->warehouseSuperBuildupAreaUnit == 'Sqft'){ echo 'selected'; } } ?> >Sqft</option>
                                                                    <option value="Sq-m" <?php if(!empty($warehouse_details)){ if($warehouse_details->warehouseSuperBuildupAreaUnit == 'Sq-m'){ echo 'selected'; } } ?> >Sq-m</option>
                                                                    <option value="Acre" <?php if(!empty($warehouse_details)){ if($warehouse_details->warehouseSuperBuildupAreaUnit == 'Acre'){ echo 'selected'; } } ?> >Acre</option>
                                                                    <option value="Bigha" <?php if(!empty($warehouse_details)){ if($warehouse_details->warehouseSuperBuildupAreaUnit == 'Bigha'){ echo 'selected'; } } ?> >Bigha</option>
                                                                    <option value="Hectare" <?php if(!empty($warehouse_details)){ if($warehouse_details->warehouseSuperBuildupAreaUnit == 'Hectare'){ echo 'selected'; } } ?> >Hectare</option>
                                                                    <option value="Marla" <?php if(!empty($warehouse_details)){ if($warehouse_details->warehouseSuperBuildupAreaUnit == 'Marla'){ echo 'selected'; } } ?> >Marla</option>
                                                                    <option value="Chatak" <?php if(!empty($warehouse_details)){ if($warehouse_details->warehouseSuperBuildupAreaUnit == 'Chatak'){ echo 'selected'; } } ?> >Chatak</option>
                                                                    <option value="Kottah" <?php if(!empty($warehouse_details)){ if($warehouse_details->warehouseSuperBuildupAreaUnit == 'Kottah'){ echo 'selected'; } } ?> >Kottah</option>
                                                                </select>
                                                                <i class="arrow"></i>   
                                                                <span id="warehouseSuperBuildupAreaUnit-error" class="error-show"></span>
                                                            </label>
                                                        </div>
                                                        <div class="section">
                                                            <label class="field select">
                                                                <select id="warehouseCoveredAreaUnit" name="warehouseCoveredAreaUnit">
                                                                    <option hidden >Unit</option>
                                                                    <option disabled >Select one </option>
                                                                    <option value="Sqft" <?php if(!empty($warehouse_details)){ if($warehouse_details->warehouseCoveredAreaUnit == 'Sqft'){ echo 'selected'; } } ?> >Sqft</option>
                                                                    <option value="Sq-m" <?php if(!empty($warehouse_details)){ if($warehouse_details->warehouseCoveredAreaUnit == 'Sq-m'){ echo 'selected'; } } ?> >Sq-m</option>
                                                                    <option value="Acre" <?php if(!empty($warehouse_details)){ if($warehouse_details->warehouseCoveredAreaUnit == 'Acre'){ echo 'selected'; } } ?> >Acre</option>
                                                                    <option value="Bigha" <?php if(!empty($warehouse_details)){ if($warehouse_details->warehouseCoveredAreaUnit == 'Bigha'){ echo 'selected'; } } ?> >Bigha</option>
                                                                    <option value="Hectare" <?php if(!empty($warehouse_details)){ if($warehouse_details->warehouseCoveredAreaUnit == 'Hectare'){ echo 'selected'; } } ?> >Hectare</option>
                                                                    <option value="Marla" <?php if(!empty($warehouse_details)){ if($warehouse_details->warehouseCoveredAreaUnit == 'Marla'){ echo 'selected'; } } ?> >Marla</option>
                                                                    <option value="Chatak" <?php if(!empty($warehouse_details)){ if($warehouse_details->warehouseCoveredAreaUnit == 'Chatak'){ echo 'selected'; } } ?> >Chatak</option>
                                                                    <option value="Kottah" <?php if(!empty($warehouse_details)){ if($warehouse_details->warehouseCoveredAreaUnit == 'Kottah'){ echo 'selected'; } } ?> >Kottah</option>
                                                                </select>
                                                                <i class="arrow"></i>
                                                                <span id="warehouseCoveredAreaUnit-error" class="error-show"></span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="section">
                                                    <label class="field select">
                                                        <select id="warehouseFloor" name="warehouseFloor">
                                                            <option hidden >Floor</option>
                                                            <option disabled >Select one </option>
                                                            <option value="G">G</option>
                                                            <?php for($i = 1; $i<=100; $i++){ ?>
                                                            <option value="<?php echo $i; ?>" <?php if(!empty($warehouse_details)){ if($warehouse_details->warehouseFloor == $i){ echo 'selected'; } } ?> ><?php echo $i; ?></option>
                                                            <?php } ?>
                                                        </select>
                                                        <i class="arrow"></i> 
                                                        <span id="warehouseFloor-error" class="error-show"></span>
                                                    </label>
                                                </div>
                                                <div class="section">
                                                    <label class="field select">
                                                        <select id="warehouseroof" name="warehouseroof">
                                                            <option hidden >Roof</option>
                                                            <option disabled >Select one </option>
                                                            <option value="RCC" <?php if(!empty($warehouse_details)){ if($warehouse_details->warehouseroof == 'RCC'){ echo 'selected'; } } ?> >RCC</option>
                                                            <option value="Shaded" <?php if(!empty($warehouse_details)){ if($warehouse_details->warehouseroof == 'Shaded'){ echo 'selected'; } } ?> >Shaded</option>
                                                        </select>
                                                        <i class="arrow"></i>   
                                                        <span id="warehouseroof-error" class="error-show"></span>
                                                    </label>
                                                </div>
                                                <div class="frm-row2">
                                                    <div class="colm1 colm6">
                                                        <div class="section">
                                                            <label class="field prepend-icon">
                                                            <input type="number" name="warehouseRoadWide" id="warehouseRoadWide" class="gui-input" placeholder="Road Wide" onkeypress="return event.charCode >= 48" min="0" value="<?php if(!empty($warehouse_details)){ echo $warehouse_details->warehouseRoadWide; } ?>"  >
                                                            <span class="field-icon"><i class="fa fa-road"></i></span>  
                                                            </label>
                                                            <span id="warehouseRoadWide-error" class="error-show"></span>
                                                        </div>
                                                    </div>
                                                    <div class="colm2 colm6">
                                                        <div class="section">
                                                            <label class="field select">
                                                                <select id="warehouseRoadWideUnit" name="warehouseRoadWideUnit">
                                                                    <option hidden >Unit</option>
                                                                    <option disabled >Select one </option>
                                                                    <option value="Sqft" <?php if(!empty($warehouse_details)){ if($warehouse_details->warehouseRoadWideUnit == 'Sqft'){ echo 'selected'; } } ?> >Sqft</option>
                                                                    <option value="Sq-m" <?php if(!empty($warehouse_details)){ if($warehouse_details->warehouseRoadWideUnit == 'Sq-m'){ echo 'selected'; } } ?> >MT</option>
                                                                </select>
                                                                <i class="arrow"></i> 
                                                                <span id="warehouseRoadWideUnit-error" class="error-show"></span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="section">
                                                        <label class="field select">
                                                            <select id="warehouseHeavyVehicleParkingUpto" name="warehouseHeavyVehicleParkingUpto">
                                                                <option hidden >Heavy Vehicle Parking Upto</option>
                                                                <option disabled >Select one </option>
                                                                <option value="3Wheeler" <?php if(!empty($warehouse_details)){ if($warehouse_details->warehouseHeavyVehicleParkingUpto == '3Wheeler'){ echo 'selected'; } } ?> >3 Wheeler</option>
                                                                <option value="4Wheeler" <?php if(!empty($warehouse_details)){ if($warehouse_details->warehouseHeavyVehicleParkingUpto == '4Wheeler'){ echo 'selected'; } } ?> >4 Wheeler</option>
                                                            </select>
                                                            <i class="arrow"></i>
                                                            <span id="warehouseHeavyVehicleParkingUpto-error" class="error-show"></span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- end .colm6 section -->
                                            <div class="colm colm6">
                                                <div class="section">
                                                    <label class="field select">
                                                        <select id="warehouseNumberofWorkStation" name="warehouseNumberofWorkStation">
                                                            <option hidden >Number of Work Station</option>
                                                            <option disabled >Select one </option>
                                                            <?php for($i = 1; $i<=100; $i++){ ?>
                                                            <option value="<?php echo $i; ?>" <?php if(!empty($warehouse_details)){ if($warehouse_details->warehouseNumberofWorkStation == $i){ echo 'selected'; } } ?>><?php echo $i; ?></option>
                                                            <?php } ?>
                                                        </select>
                                                        <i class="arrow"></i>   
                                                        <span id="warehouseNumberofWorkStation-error" class="error-show"></span>
                                                    </label>
                                                </div>
                                                <div class="frm-row2">
                                                    <div class="colm1 colm6">
                                                        <div class="section">
                                                            <label class="field prepend-icon">
                                                            <input type="number" name="warehouseBuildupArea" id="warehouseBuildupArea" class="gui-input" placeholder="Build up Area" onkeypress="return event.charCode >= 48" min="0" value="<?php if(!empty($warehouse_details)){ echo $warehouse_details->warehouseBuildupArea; } ?>" >
                                                            <span class="field-icon"><i class="fa fa-object-group"></i></span>  
                                                            </label>
                                                            <span id="warehouseBuildupArea-error" class="error-show"></span>
                                                        </div>
                                                        <div class="section">
                                                            <label class="field prepend-icon">
                                                            <input type="number" name="warehouseOpenArea" id="warehouseOpenArea" class="gui-input" placeholder="Open Area" onkeypress="return event.charCode >= 48" min="0" value="<?php if(!empty($warehouse_details)){ echo $warehouse_details->warehouseOpenArea; } ?>" >
                                                            <span class="field-icon"><i class="fa fa-object-group"></i></span>  
                                                            </label>
                                                            <span id="warehouseOpenArea-error" class="error-show"></span>
                                                        </div>
                                                    </div>
                                                    <div class="colm2 colm6">
                                                        <div class="section">
                                                            <label class="field select">
                                                                <select id="warehouseBuildupAreaUnit" name="warehouseBuildupAreaUnit">
                                                                    <option hidden >Unit</option>
                                                                    <option disabled >Select one </option>
                                                                    <option value="Sqft" <?php if(!empty($warehouse_details)){ if($warehouse_details->warehouseBuildupAreaUnit == 'Sqft'){ echo 'selected'; } } ?> >Sqft</option>
                                                                    <option value="Sq-m" <?php if(!empty($warehouse_details)){ if($warehouse_details->warehouseBuildupAreaUnit == 'Sq-m'){ echo 'selected'; } } ?> >Sq-m</option>
                                                                    <option value="Acre" <?php if(!empty($warehouse_details)){ if($warehouse_details->warehouseBuildupAreaUnit == 'Acre'){ echo 'selected'; } } ?> >Acre</option>
                                                                    <option value="Bigha" <?php if(!empty($warehouse_details)){ if($warehouse_details->warehouseBuildupAreaUnit == 'Bigha'){ echo 'selected'; } } ?> >Bigha</option>
                                                                    <option value="Hectare" <?php if(!empty($warehouse_details)){ if($warehouse_details->warehouseBuildupAreaUnit == 'Hectare'){ echo 'selected'; } } ?> >Hectare</option>
                                                                    <option value="Marla" <?php if(!empty($warehouse_details)){ if($warehouse_details->warehouseBuildupAreaUnit == 'Marla'){ echo 'selected'; } } ?> >Marla</option>
                                                                    <option value="Chatak" <?php if(!empty($warehouse_details)){ if($warehouse_details->warehouseBuildupAreaUnit == 'Chatak'){ echo 'selected'; } } ?> >Chatak</option>
                                                                    <option value="Kottah" <?php if(!empty($warehouse_details)){ if($warehouse_details->warehouseBuildupAreaUnit == 'Kottah'){ echo 'selected'; } } ?> >Kottah</option>
                                                                </select>
                                                                <i class="arrow"></i> 
                                                                <span id="warehouseBuildupAreaUnit-error" class="error-show"></span>
                                                            </label>
                                                        </div>
                                                        <div class="section">
                                                            <label class="field select">
                                                                <select id="warehouseOpenAreaUnit" name="warehouseOpenAreaUnit">
                                                                    <option hidden >Unit</option>
                                                                    <option disabled >Select one </option>
                                                                    <option value="Sqft" <?php if(!empty($warehouse_details)){ if($warehouse_details->warehouseOpenAreaUnit == 'Sqft'){ echo 'selected'; } } ?> >Sqft</option>
                                                                    <option value="Sq-m" <?php if(!empty($warehouse_details)){ if($warehouse_details->warehouseOpenAreaUnit == 'Sq-m'){ echo 'selected'; } } ?> >Sq-m</option>
                                                                    <option value="Acre" <?php if(!empty($warehouse_details)){ if($warehouse_details->warehouseOpenAreaUnit == 'Acre'){ echo 'selected'; } } ?> >Acre</option>
                                                                    <option value="Bigha" <?php if(!empty($warehouse_details)){ if($warehouse_details->warehouseOpenAreaUnit == 'Bigha'){ echo 'selected'; } } ?> >Bigha</option>
                                                                    <option value="Hectare" <?php if(!empty($warehouse_details)){ if($warehouse_details->warehouseOpenAreaUnit == 'Hectare'){ echo 'selected'; } } ?> >Hectare</option>
                                                                    <option value="Marla" <?php if(!empty($warehouse_details)){ if($warehouse_details->warehouseOpenAreaUnit == 'Marla'){ echo 'selected'; } } ?> >Marla</option>
                                                                    <option value="Chatak" <?php if(!empty($warehouse_details)){ if($warehouse_details->warehouseOpenAreaUnit == 'Chatak'){ echo 'selected'; } } ?> >Chatak</option>
                                                                    <option value="Kottah" <?php if(!empty($warehouse_details)){ if($warehouse_details->warehouseOpenAreaUnit == 'Kottah'){ echo 'selected'; } } ?> >Kottah</option>
                                                                </select>
                                                                <i class="arrow"></i>  
                                                                <span id="warehouseOpenAreaUnit-error" class="error-show"></span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="section">
                                                    <label class="field select">
                                                        <select id="warehouseTotalFloor" name="warehouseTotalFloor">
                                                            <option hidden >Total Floor</option>
                                                            <option disabled >Select one </option>
                                                            <option value="LowerBasement" <?php if(!empty($warehouse_details)){ if($warehouse_details->warehouseTotalFloor == 'LowerBasement'){ echo 'selected'; } } ?>>Lower Basement </option>
                                                            <option value="Basement" <?php if(!empty($warehouse_details)){ if($warehouse_details->warehouseTotalFloor == 'Basement'){ echo 'selected'; } } ?> >Basement </option>
                                                            <option value="G" <?php if(!empty($warehouse_details)){ if($warehouse_details->warehouseTotalFloor == 'G'){ echo 'selected'; } } ?>>G</option>
                                                            <?php for($i = 1; $i<=100; $i++){ ?>
                                                            <option value="<?php echo $i; ?>" <?php if(!empty($warehouse_details)){ if($warehouse_details->warehouseTotalFloor == $i){ echo 'selected'; } } ?>><?php echo $i; ?></option>
                                                            <?php } ?>
                                                        </select>
                                                        <i class="arrow"></i>   
                                                        <span id="warehouseTotalFloor-error" class="error-show"></span>
                                                    </label>
                                                </div>
                                                <div class="frm-row2">
                                                    <div class="colm1 colm6">
                                                        <div class="section">
                                                            <label class="field prepend-icon">
                                                            <input type="number" name="warehousePentry" id="warehousePentry" class="gui-input" placeholder="Pentry" onkeypress="return event.charCode >= 48" min="0" value="<?php if(!empty($warehouse_details)){ echo $warehouse_details->warehousePentry; } ?>" >
                                                            <span class="field-icon"><i class="fa fa-object-group"></i></span>  
                                                            </label>
                                                            <span id="warehousePentry-error" class="error-show"></span>
                                                        </div> 
                                                        <div class="section">
                                                            <label class="field prepend-icon">
                                                            <input type="number" name="warehouseBathroom" id="warehouseBathroom" class="gui-input" placeholder="Bathroom" onkeypress="return event.charCode >= 48" min="0" value="<?php if(!empty($warehouse_details)){ echo $warehouse_details->warehouseBathroom; } ?>" >
                                                            <span class="field-icon"><i class="fa fa-object-group"></i></span>  
                                                            </label>
                                                            <span id="warehouseBathroom-error" class="error-show"></span>
                                                        </div>
                                                    </div>
                                                    <div class="colm2 colm6">
                                                        <div class="section">
                                                            <label class="field select">
                                                                <select id="warehousePentryUsedFor" name="warehousePentryUsedFor">
                                                                    <option hidden >Used For</option>
                                                                    <option value="Personal" <?php if(!empty($warehouse_details)){ if($warehouse_details->warehousePentryUsedFor == 'Personal'){ echo 'selected'; } } ?>>Personal</option>
                                                                    <option value="Common" <?php if(!empty($warehouse_details)){ if($warehouse_details->warehousePentryUsedFor == 'Common'){ echo 'selected'; } } ?> >Common</option>
                                                                </select>
                                                                <i class="arrow"></i>                    
                                                            </label>
                                                            <span id="warehousePentryUsedFor-error" class="error-show"></span>
                                                        </div>
                                                        <div class="section">
                                                            <label class="field select">
                                                                <select id="warehouseBathroomUsedFor" name="warehouseBathroomUsedFor">
                                                                    <option hidden >Bathroom For</option>
                                                                    <option value="Personal" <?php if(!empty($warehouse_details)){ if($warehouse_details->warehouseBathroomUsedFor == 'Personal'){ echo 'selected'; } } ?> >Personal</option>
                                                                    <option value="Common" <?php if(!empty($warehouse_details)){ if($warehouse_details->warehouseBathroomUsedFor == 'Common'){ echo 'selected'; } } ?> >Common</option>
                                                                </select>
                                                                <i class="arrow"></i>                    
                                                            </label>
                                                            <span id="warehouseBathroomUsedFor-error" class="error-show"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- end .colm6 section --> 
                                        </div>
                                        <!-- end .frm-row section -->                                      
                                    </div>
                                </div>
                                <!-- end .smart-forms section -->
                            </div>
                            <!-- end .smart-wrap section -->
                            <input type="button" name="previous" class="pre_btn m-t20 m-lr10" value="Back" />
                            <input type="button" name="next" id="property-details-form" class="next_btn m-t20 m-lr10" value="Save & Next" />
                        </fieldset>
                        <!-- Step 6 area start -->
                        <fieldset>
                            <div class="smart-wrap">
                                <div class="smart-forms smart-container wrap-0">
                                    <div class="form-body">
                                        <div class="spacer-b30">
                                            <div class="tagline"><span>Other Info</span></div>
                                            <!-- .tagline -->
                                        </div>
                                        <div class="frm-row">
                                            <div class="colm colm6">
                                                <div class="section">
                                                    <div class="option-group field">
                                                        <div class="smart-option-group align-left">
                                                            <label for="ReadyToMove" class="option">
                                                            <input type="radio" id="ReadyToMove" name="section" value="ReadyToMove" <?php if(!empty($other_details)){ if($other_details->section == 'ReadyToMove'){ echo 'checked'; } }else{echo "checked";} ?>>
                                                            <span class="smart-option smart-radio">
                                                            <span class="smart-option-ui"> <i class="iconc"></i>  Ready To Move</span>                                      
                                                            </span>                                      
                                                            </label>
                                                            <label for="PossessionFrom" class="option">
                                                            <input type="radio" id="PossessionFrom" name="section" value="PossessionFrom" <?php if(!empty($other_details)){ if($other_details->section == 'PossessionFrom'){ echo 'checked'; } } ?> >
                                                            <span class="smart-option smart-radio">
                                                            <span class="smart-option-ui"> <i class="iconc"></i>  Possession From</span>                                      
                                                            </span>                                      
                                                            </label>    
                                                            <span id="ReadyToMove-error" class="error-show"></span>
                                                        </div>
                                                        <!--  smart-option-group -->                            
                                                    </div>
                                                    <!-- end .option-group section -->
                                                </div>
                                                <!-- end section -->
                                                <div class="section">
                                                    <label class="field select">
                                                        <select id="AgeofPropeety" name="AgeofPropeety">
                                                            <option hidden >Age of Propeety</option>
                                                            <option disabled >Select one </option>
                                                            <?php for($i = 1; $i<=100; $i++){ ?>
                                                            <option value="<?php echo $i; ?>" <?php if(!empty($other_details)){ if($other_details->AgeofPropeety == $i){ echo 'selected'; } } ?>><?php echo $i; ?> Year Old</option>
                                                            <?php } ?>
                                                        </select>
                                                        <i class="arrow"></i>    
                                                        <span id="AgeofPropeety-error" class="error-show"></span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="colm colm6">
                                                <div class="section" id="possession_date_div"  style="display:none;" >
                                                    <label class="field prepend-icon">
                                                    <input type="date" name="PossessionDate" id="PossessionDate" class="gui-input" placeholder="Possession Date"value="<?php if(!empty($other_details)){ echo $other_details->PossessionDate; } ?>">
                                                    <span class="field-icon"><i class="fa fa-calendar"></i></span>  
                                                    </label>
                                                    <span id="PossessionDate-error" class="error-show"></span>
                                                </div>
                                                <div class="section">
                                                    <label class="field select">
                                                        <select id="PropertyType" name="PropertyType">
                                                            <option hidden >Status of property</option>
                                                            <option disabled >Select one </option>
                                                            <option value="Freehold" <?php if(!empty($other_details)){ if($other_details->PropertyType == 'Freehold'){ echo 'selected'; } } ?>>Freehold</option>
                                                            <option value="Lease" <?php if(!empty($other_details)){ if($other_details->PropertyType == 'Lease'){ echo 'selected'; } } ?> >Lease</option>
                                                            <option value="Power of attorney" <?php if(!empty($other_details)){ if($other_details->PropertyType == 'Power of attorney'){ echo 'selected'; } } ?> >Power of attorney</option>
                                                            <option value="Unregistered" <?php if(!empty($other_details)){ if($other_details->PropertyType == 'Unregistered'){ echo 'selected'; } } ?>>Unregistered</option>
                                                        </select>
                                                        <i class="arrow"></i> 
                                                        <span id="PropertyType-error" class="error-show"></span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="colm colm12">
                                                <div class="colm colm1">
                                                    <p class="minititle">Open Parking</p>
                                                </div>
                                                <div class="colm colm1">
                                                    <label class="field">
                                                    <input type="number" name="OpenParking" id="OpenParking" class="gui-input" placeholder="0" onkeypress="return event.charCode >= 48" min="0"  value="<?php if(!empty($other_details)){ echo $other_details->OpenParking; } ?>">
                                                    </label>
                                                    <span id="OpenParking-error" class="error-show"></span>
                                                </div>
                                                <div class="colm colm1">
                                                    <p class="minititle">Covered Parking</p>
                                                </div>
                                                <div class="colm colm1">
                                                    <label class="field">
                                                    <input type="number" name="CoveredParking" id="CoveredParking" class="gui-input" placeholder="0" onkeypress="return event.charCode >= 48" min="0"  value="<?php if(!empty($other_details)){ echo $other_details->CoveredParking; } ?>" >
                                                    </label>
                                                    <span id="CoveredParking-error" class="error-show"></span>
                                                </div>
                                                <div class="colm colm1">
                                                    <p class="minititle">Basement Parking</p>
                                                </div>
                                                <div class="colm colm1">
                                                    <label class="field">
                                                    <input type="number" name="Basement" id="Basement" class="gui-input" placeholder="0" onkeypress="return event.charCode >= 48" min="0" value="<?php if(!empty($other_details)){ echo $other_details->Basement; } ?>" >
                                                    </label>
                                                    <span id="Basement-error" class="error-show"></span>
                                                </div>
                                                <div class="colm colm2">
                                                    <p class="minititle">Lift Parking</p>
                                                </div>
                                                <div class="colm colm1">
                                                    <label class="field">
                                                    <input type="number" name="LiftParking" id="LiftParking" class="gui-input" placeholder="0" onkeypress="return event.charCode >= 48" min="0" value="<?php if(!empty($other_details)){ echo $other_details->LiftParking; } ?>" >
                                                    </label>
                                                    <span id="LiftParking-error" class="error-show"></span>
                                                </div>
                                                <div class="colm colm2">
                                                    <p class="minititle">Two Wheeler</p>
                                                </div>
                                                <div class="colm colm1">
                                                    <label class="field">
                                                    <input type="number" name="TwoWheeler" id="TwoWheeler" class="gui-input" placeholder="0" onkeypress="return event.charCode >= 48" min="0"  value="<?php if(!empty($other_details)){ echo $other_details->TwoWheeler; } ?>">
                                                    </label>
                                                    <span id="TwoWheeler-error" class="error-show"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end .frm-row section -->                                      
                                    </div>
                                </div>
                                <!-- end .smart-forms section -->
                            </div>
                            <!-- end .smart-wrap section -->
                            <input type="button" name="previous" class="pre_btn m-t20 m-lr10" value="Back" />
                            <input type="button" name="next" id="property-other-info" class="next_btn m-t20 m-lr10" value="Save & Next" />
                        </fieldset>
                        <!-- Step 7 area start -->

<!---- Amenities for commercial only  ----------------->   
                        
                        <fieldset>
                            <div class="smart-wrap" id="commercial-amenities" style="<?php if(!empty($property_type)){ if($property_type->res_com == 'Commercial'){ echo 'display:block'; }else{ echo 'display:none'; } }else{ echo 'display:none'; }?>">
                                <div class="smart-forms smart-container wrap-0">
                                    <div class="form-body">
                                        <div class="spacer-b30">
                                            <div class="tagline"><span>Amenities for commercial only</span></div>
                                            <!-- .tagline -->
                                        </div>
                                        <div class="frm-row">
                                            <div class="section colm colm3 amenities-menus">
                                                <div class="option-group field align-left">
                                                    <label for="PowerBackup1" class="option block">
                                                        <input type="checkbox" name="PowerBackup" id="PowerBackup1" value="1" <?php if(!empty($commercial_amenities)){ if($commercial_amenities->PowerBackup == 1){ echo 'checked'; } } ?> >
                                                        <span class="checkbox"></span> Power Backup
                                                    </label>
                                                    <label for="ServiveLift1" class="option block spacer-t5">
                                                        <input type="checkbox" name="ServiveLift" id="ServiveLift1" value="1" <?php if(!empty($commercial_amenities)){ if($commercial_amenities->ServiveLift == 1){ echo 'checked'; } } ?>>
                                                        <span class="checkbox"></span> Service Lift                  
                                                    </label>
                                                </div>
                                                <!-- end .option-group section -->             
                                            </div>
                                            <!-- end .colm section -->
                                            <div class="section colm colm3 amenities-menus">
                                                <div class="option-group field align-left">
                                                    <label class="option block">
                                                    <input type="checkbox" name="Intercom" id="Intercom" value="1" <?php if(!empty($commercial_amenities)){ if($commercial_amenities->Intercom == 1){ echo 'checked'; } } ?>>
                                                    <span class="checkbox"></span> Intercom
                                                    </label>
                                                    <label class="option block spacer-t5">
                                                    <input type="checkbox" name="CCTV" id="CCTV" value="1" <?php if(!empty($commercial_amenities)){ if($commercial_amenities->CCTV == 1){ echo 'checked'; } } ?> >
                                                    <span class="checkbox"></span> CCTV                  
                                                    </label>     
                                                </div>
                                                <!-- end .option-group section -->             
                                            </div>
                                            <!-- end .colm section -->
                                            <div class="section colm colm3 amenities-menus">
                                                <div class="option-group field align-left">
                                                    <label class="option block">
                                                    <input type="checkbox" name="Lift" id="Lift" value="1" <?php if(!empty($commercial_amenities)){ if($commercial_amenities->Lift == 1){ echo 'checked'; } } ?>>
                                                    <span class="checkbox"></span> Lift
                                                    </label>
                                                    <label class="option block spacer-t5">
                                                    <input type="checkbox" name="WIFI" id="WIFI" value="1" <?php if(!empty($commercial_amenities)){ if($commercial_amenities->WIFI == 1){ echo 'checked'; } } ?> >
                                                    <span class="checkbox"></span> WIFI                  
                                                    </label>    
                                                </div>
                                                <!-- end .option-group section -->             
                                            </div>
                                            <!-- end .colm section -->
                                            <div class="section colm colm3 amenities-menus">
                                                <div class="option-group field align-left">
                                                    <label class="option block spacer-t5">
                                                        <input type="checkbox" name="VisitorParking" id="VisitorParking" value="1" <?php if(!empty($commercial_amenities)){ if($commercial_amenities->VisitorParking == 1){ echo 'checked'; } } ?> >
                                                        <span class="checkbox"></span> Visitor Parking                 
                                                    </label>
                                                    <label  class="option block spacer-t5">
                                                        <input type="checkbox" name="Security" id="Security" value="1" <?php if(!empty($commercial_amenities)){ if($commercial_amenities->Security == 1){ echo 'checked'; } } ?> >
                                                        <span class="checkbox"></span> 24Hr. Security                 
                                                    </label>
                                                </div>
                                                <!-- end .option-group section -->             
                                            </div>
                                            <!-- end .colm section -->
                                            <div class="colm colm12 m-t20">
                                                <div class="section">
                                                    <p style="float: left;">Description / Notes / Details</p>
                                                    <label class="field prepend-icon">
                                                    <textarea class="gui-textarea" id="comment" name="comment" placeholder="100 words only"><?php if(!empty($commercial_amenities)){ echo $commercial_amenities->comment; } ?></textarea>
                                                    <span class="field-icon"><i class="fa fa-paragraph"></i></span>
                                                    <span id="comment-error" class="error-show"></span>
                                                    <span class="input-hint"> 
                                                    <strong>Hint:</strong> Don't be negative or off topic... 
                                                    </span>   
                                                    </label>
                                                    
                                                </div>
                                                <!-- end section -->
                                            </div>
                                        </div>
                                        <!-- end .frm-row section -->                                      
                                    </div>
                                </div>
                                <!-- end .smart-forms section -->
                            </div>
                        
<!---- Amenities for Residential only  -----------------> 
                            <div class="smart-wrap" id="residential-amenities" style="<?php if(!empty($property_type)){ if($property_type->res_com == 'Residential'){ echo 'display:block'; } }?>">
                                <div class="smart-forms smart-container wrap-0">
                                    <div class="form-body">
                                        <div class="spacer-b30">
                                            <div class="tagline"><span>Amenities for Residential only</span></div>
                                            <!-- .tagline -->
                                        </div>
                                        <div class="frm-row">
                                            <div class="section colm colm3 amenities-menus">
                                                <div class="option-group field align-left">
                                                    <label for="PowerBackup" class="option block">
                                                    <input type="checkbox" name="PowerBackup" id="PowerBackup" value="1" <?php if(!empty($residential_amenities)){ if($residential_amenities->PowerBackup == 1){ echo 'checked'; } } ?> >
                                                    <span class="checkbox"></span> Power Backup
                                                    </label>
                                                    <label for="ServiveLift" class="option block spacer-t5">
                                                    <input type="checkbox" name="ServiveLift" id="ServiveLift" value="1" <?php if(!empty($residential_amenities)){ if($residential_amenities->ServiveLift == 1){ echo 'checked'; } } ?> >
                                                    <span class="checkbox"></span> Service Lift                  
                                                    </label>                            
                                                    <label class="option block spacer-t5">
                                                    <input type="checkbox" name="BanquetHall" id="BanquetHall" value="1" <?php if(!empty($residential_amenities)){ if($residential_amenities->BanquetHall == 1){ echo 'checked'; } } ?> >
                                                    <span class="checkbox"></span> Banquet Hall                 
                                                    </label>
                                                    <label class="option block spacer-t5">
                                                    <input type="checkbox" name="GYM" id="GYM" value="1" <?php if(!empty($residential_amenities)){ if($residential_amenities->GYM == 1){ echo 'checked'; } } ?> >
                                                    <span class="checkbox"></span> GYM                 
                                                    </label>
                                                    <label class="option block spacer-t5">
                                                    <input type="checkbox" name="VisitorParking" id="VisitorParking" value="1" <?php if(!empty($residential_amenities)){ if($residential_amenities->VisitorParking == 1){ echo 'checked'; } } ?>>
                                                    <span class="checkbox"></span> Visitor Parking                 
                                                    </label>
                                                </div>
                                                <!-- end .option-group section -->             
                                            </div>
                                            <!-- end .colm section -->
                                            <div class="section colm colm3 amenities-menus">
                                                <div class="option-group field align-left">
                                                    <label class="option block">
                                                    <input type="checkbox" name="Intercom" id="Intercom" value="1" <?php if(!empty($residential_amenities)){ if($residential_amenities->Intercom == 1){ echo 'checked'; } } ?> >
                                                    <span class="checkbox"></span> Intercom
                                                    </label>
                                                    <label class="option block spacer-t5">
                                                    <input type="checkbox" name="CCTV" id="CCTV" value="1" <?php if(!empty($residential_amenities)){ if($residential_amenities->CCTV == 1){ echo 'checked'; } } ?> >
                                                    <span class="checkbox"></span> CCTV                  
                                                    </label>                            
                                                    <label class="option block spacer-t5">
                                                    <input type="checkbox" name="SwimmingPool" id="SwimmingPool" value="1" <?php if(!empty($residential_amenities)){ if($residential_amenities->SwimmingPool == 1){ echo 'checked'; } } ?> >
                                                    <span class="checkbox"></span> Swimming Pool                 
                                                    </label>
                                                    <label class="option block spacer-t5">
                                                    <input type="checkbox" name="CloubHouse" id="CloubHouse" value="1" <?php if(!empty($residential_amenities)){ if($residential_amenities->CloubHouse == 1){ echo 'checked'; } } ?> >
                                                    <span class="checkbox"></span> Club House                 
                                                    </label>
                                                    <label class="option block spacer-t5">
                                                    <input type="checkbox" name="SarvantRoom" id="SarvantRoom" value="1" <?php if(!empty($residential_amenities)){ if($residential_amenities->SarvantRoom == 1){ echo 'checked'; } } ?> >
                                                    <span class="checkbox"></span> Servant Room                 
                                                    </label>
                                                </div>
                                                <!-- end .option-group section -->             
                                            </div>
                                            <!-- end .colm section -->
                                            <div class="section colm colm3 amenities-menus">
                                                <div class="option-group field align-left">
                                                    <label class="option block">
                                                    <input type="checkbox" name="Lift" id="Lift" value="1" <?php if(!empty($residential_amenities)){ if($residential_amenities->Lift == 1){ echo 'checked'; } } ?> >
                                                    <span class="checkbox"></span> Lift
                                                    </label>
                                                    <label class="option block spacer-t5">
                                                    <input type="checkbox" name="WIFI" id="WIFI" value="1" <?php if(!empty($residential_amenities)){ if($residential_amenities->WIFI == 1){ echo 'checked'; } } ?> >
                                                    <span class="checkbox"></span> WIFI                  
                                                    </label>                            
                                                    <label class="option block spacer-t5">
                                                    <input type="checkbox" name="CommunityHall" id="CommunityHall" value="1" <?php if(!empty($residential_amenities)){ if($residential_amenities->CommunityHall == 1){ echo 'checked'; } } ?> >
                                                    <span class="checkbox"></span> Community Hall                 
                                                    </label>
                                                    <label class="option block spacer-t5">
                                                    <input type="checkbox" name="IndoorGame" id="IndoorGame" value="1" <?php if(!empty($residential_amenities)){ if($residential_amenities->IndoorGame == 1){ echo 'checked'; } } ?> >
                                                    <span class="checkbox"></span> Indoor Game                 
                                                    </label>
                                                </div>
                                                <!-- end .option-group section -->             
                                            </div>
                                            <!-- end .colm section -->
                                            <div class="section colm colm3 amenities-menus">
                                                <div class="option-group field align-left">
                                                    <label class="option block spacer-t5">
                                                    <input type="checkbox" name="OutDoorGame" id="OutDoorGame" value="1" <?php if(!empty($residential_amenities)){ if($residential_amenities->OutDoorGame == 1){ echo 'checked'; } } ?> >
                                                    <span class="checkbox"></span> Outdoor Game                 
                                                    </label>
                                                    <label class="option block spacer-t5">
                                                    <input type="checkbox" name="GasPipeLine" id="GasPipeLine" value="1" <?php if(!empty($residential_amenities)){ if($residential_amenities->GasPipeLine == 1){ echo 'checked'; } } ?> >
                                                    <span class="checkbox"></span> Gas Pipe Line                 
                                                    </label>
                                                    <label class="option block spacer-t5">
                                                    <input type="checkbox" name="Park" id="Park" value="1" <?php if(!empty($residential_amenities)){ if($residential_amenities->Park == 1){ echo 'checked'; } } ?> >
                                                    <span class="checkbox"></span> Children Park                 
                                                    </label>
                                                    <label  class="option block spacer-t5">
                                                    <input type="checkbox" name="Security" id="Security" value="1" <?php if(!empty($residential_amenities)){ if($residential_amenities->Security == 1){ echo 'checked'; } } ?> >
                                                    <span class="checkbox"></span> 24Hr. Security                 
                                                    </label>
                                                </div>
                                                <!-- end .option-group section -->             
                                            </div>
                                            <!-- end .colm section -->
                                            <div class="colm colm12 m-t20">
                                                <div class="section">
                                                    <p style="float: left;">Description / Notes / Details</p>
                                                    <label class="field prepend-icon">
                                                    <textarea class="gui-textarea" id="comment1" name="comment1" placeholder="100 words only"><?php if(!empty($residential_amenities)){ echo $residential_amenities->comment1; } ?></textarea>
                                                    <span class="field-icon"><i class="fa fa-paragraph"></i></span>
                                                    <span id="comment1-error" class="error-show"></span>
                                                    <span class="input-hint"> 
                                                    <strong>Hint:</strong> Don't be negative or off topic... 
                                                    </span>   
                                                    </label>
                                                </div>
                                                <!-- end section -->
                                            </div>
                                        </div>
                                        <!-- end .frm-row section -->                                      
                                    </div>
                                </div>
                                <!-- end .smart-forms section -->
                            </div>
                            <input type="button" name="previous" class="pre_btn m-t20 m-lr10" value="Back" />
                            <input type="button" name="next" id="property-amenities-form" class="next_btn m-t20 m-lr10" value="Next" />
                        </fieldset>  
                        
        
                        <!-- Step 8 area start -->
                        <fieldset>
                            <div class="smart-wrap">
                                <div class="smart-forms smart-container wrap-0">
                                    <div class="form-body">
                                        <div class="spacer-b30">
                                            <div class="tagline"><span>Upload Files</span></div>
                                            <!-- .tagline -->
                                        </div>
                                        <div class="frm-row" id="fileUploadDiv">
                                            <div class="colm colm6">
                                                <h2 style="float: left;">Add Photos</h2>
                                                <div class="section">
                                                    <label class="field prepend-icon file">
                                                    <span class="button btn-primary"> Choose File </span>
                                                    <input type="file" class="gui-file" name="UploadImages[]" id="UploadImages" 
                                                        onChange="document.getElementById('uploader1').value = this.value;" accept="image/*">
                                                    <input type="hidden" class="gui-file" name="prevUploadImages" id="prevUploadImages" value="<?php if(!empty($post_property)){ echo $post_property->image_name; }else{ echo ''; }?>">
                                                    <input type="text" class="gui-input" id="uploader1" placeholder="no file selected" readonly>
                                                    <span class="field-icon"><i class="fa fa-upload"></i></span>
                                                    <span id="UploadImages-error" class="error-show"></span>
                                                    </label>
                                                </div>  
                                            </div>
                                            <div class="colm colm6">
                                                <h2 style="float: left;">Add Videos</h2>
                                                <div class="section">
                                                    <input type="text" class="gui-input" name = "UploadVideo" placeholder="no file selected">
                                                    </label>
                                                </div>  
                                            </div>
                                        </div>
                                        <div class="row" id="fileUploadDivError" style="color:red;"></div>
                                        <div class="row">
                                            <div class="colm colm4">
                                                <button type="button" class="btn btn-warning" onclick="load_more_property_photos()">Add More Photos</button>
                                            </div>
                                        </div>
                                        <!-- end .frm-row section -->                                      
                                    </div>
                                </div>
                                <!-- end .smart-forms section -->
                            </div>
                            <!-- end .smart-wrap section -->
                            <input type="button" name="previous" class="pre_btn m-t20 m-lr10" value="Back" />
                            <input type="button" onclick="return validate_form('property-upload-files');" name="next" id="property-upload-files" class="m-t20 m-lr10 next_btn" value="Submit" />
                        </fieldset>
                    </form>
                    <!-- Step 9 area start -->
                    <!--<fieldset>-->
                    <!--    <div class="smart-wrap">-->
                    <!--        <div class="smart-forms smart-container wrap-0">-->
                    <!--            <div class="form-body">-->
                    <!--                <div class="spacer-b30">-->
                    <!--                    <div class="tagline"><span>Status Sucess</span></div>-->
                                        <!-- .tagline -->
                    <!--                </div>-->
                    <!--                <div class="frm-row">-->
                    <!--                    <div class="notification alert-success spacer-t10">-->
                    <!--                        <p>Thanks for your submitting form , we will inform you soon. <a href="#first">go to back</a></p>-->
                    <!--                        <a href="#" class="close-btn">&times;</a>                                  -->
                    <!--                    </div>-->
                                        <!-- end .notification section -->
                    <!--                </div>-->
                                    <!-- end .frm-row section -->                                      
                    <!--            </div>-->
                    <!--        </div>-->
                            <!-- end .smart-forms section -->
                    <!--    </div>-->
                        <!-- end .smart-wrap section -->
                    <!--</fieldset>-->
                    
                </div>
            </div>
        <!-- Multistep Form End Here -->
<script>
$(function(){
$("input[name=residential]").on('change', function(){
    var residential = $("input[name=residential]:checked").val();
    
   if(residential == 'Flat'){
       $('#StockFlatRent').css('display', 'block');
       $('#DuplexFlats').css('display', 'none');
       $('#PentHouseRent').css('display', 'none');
       $('#StockFactoryRent').css('display', 'none');
       $('#StockHouseRent').css('display', 'none');
       $('#StockLandRent').css('display', 'none');
       $('#StockOfficeRent').css('display', 'none');
       $('#StockShopRent').css('display', 'none');
       $('#StockWarehouseRent').css('display', 'none');
   }else if(residential == 'HouseorBanglow'){
       $('#StockHouseRent').css('display', 'block');
       $('#StockFlatRent').css('display', 'none');
       $('#DuplexFlats').css('display', 'none');
       $('#PentHouseRent').css('display', 'none');
       $('#StockFactoryRent').css('display', 'none');
       $('#StockLandRent').css('display', 'none');
       $('#StockOfficeRent').css('display', 'none');
       $('#StockShopRent').css('display', 'none');
       $('#StockWarehouseRent').css('display', 'none');
   }else if(residential == 'PentHouse'){
       $('#StockHouseRent').css('display', 'none');
       $('#StockFlatRent').css('display', 'none');
       $('#DuplexFlats').css('display', 'none');
       $('#PentHouseRent').css('display', 'block');
       $('#StockFactoryRent').css('display', 'none');
       $('#StockLandRent').css('display', 'none');
       $('#StockOfficeRent').css('display', 'none');
       $('#StockShopRent').css('display', 'none');
       $('#StockWarehouseRent').css('display', 'none');
   }else if(residential == 'DuplexFlat'){
       $('#StockHouseRent').css('display', 'none');
       $('#StockFlatRent').css('display', 'none');
       $('#DuplexFlats').css('display', 'block');
       $('#PentHouseRent').css('display', 'none');
       $('#StockFactoryRent').css('display', 'none');
       $('#StockLandRent').css('display', 'none');
       $('#StockOfficeRent').css('display', 'none');
       $('#StockShopRent').css('display', 'none');
       $('#StockWarehouseRent').css('display', 'none');
   }else if(residential == 'Land'){
       $('#StockHouseRent').css('display', 'none');
       $('#StockFlatRent').css('display', 'none');
       $('#DuplexFlats').css('display', 'none');
       $('#PentHouseRent').css('display', 'none');
       $('#StockFactoryRent').css('display', 'none');
       $('#StockLandRent').css('display', 'block');
       $('#StockOfficeRent').css('display', 'none');
       $('#StockShopRent').css('display', 'none');
       $('#StockWarehouseRent').css('display', 'none');
       $('.amenities-menus').css('display', 'none');
   }else if(residential == 'Office'){
       $('#StockHouseRent').css('display', 'none');
       $('#StockFlatRent').css('display', 'none');
       $('#DuplexFlats').css('display', 'none');
       $('#PentHouseRent').css('display', 'none');
       $('#StockFactoryRent').css('display', 'none');
       $('#StockLandRent').css('display', 'none');
       $('#StockOfficeRent').css('display', 'block');
       $('#StockShopRent').css('display', 'none');
       $('#StockWarehouseRent').css('display', 'none');
   }else if(residential == 'ShopOrShowroom'){
       $('#StockHouseRent').css('display', 'none');
       $('#StockFlatRent').css('display', 'none');
       $('#DuplexFlats').css('display', 'none');
       $('#PentHouseRent').css('display', 'none');
       $('#StockFactoryRent').css('display', 'none');
       $('#StockLandRent').css('display', 'none');
       $('#StockOfficeRent').css('display', 'none');
       $('#StockShopRent').css('display', 'block');
       $('#StockWarehouseRent').css('display', 'none');
   }else if(residential == 'Warehouse'){
       $('#StockHouseRent').css('display', 'none');
       $('#StockFlatRent').css('display', 'none');
       $('#DuplexFlats').css('display', 'none');
       $('#PentHouseRent').css('display', 'none');
       $('#StockFactoryRent').css('display', 'none');
       $('#StockLandRent').css('display', 'none');
       $('#StockOfficeRent').css('display', 'none');
       $('#StockShopRent').css('display', 'none');
       $('#StockWarehouseRent').css('display', 'block');
   }else if(residential == 'Factory'){
       $('#StockHouseRent').css('display', 'none');
       $('#StockFlatRent').css('display', 'none');
       $('#DuplexFlats').css('display', 'none');
       $('#PentHouseRent').css('display', 'none');
       $('#StockFactoryRent').css('display', 'block');
       $('#StockLandRent').css('display', 'none');
       $('#StockOfficeRent').css('display', 'none');
       $('#StockShopRent').css('display', 'none');
       $('#StockWarehouseRent').css('display', 'none');
   }else if(residential == 'Land2'){
       $('#StockHouseRent').css('display', 'none');
       $('#StockFlatRent').css('display', 'none');
       $('#DuplexFlats').css('display', 'none');
       $('#PentHouseRent').css('display', 'none');
       $('#StockFactoryRent').css('display', 'none');
       $('#StockLandRent').css('display', 'block');
       $('#StockOfficeRent').css('display', 'none');
       $('#StockShopRent').css('display', 'none');
       $('#StockWarehouseRent').css('display', 'none');
   }
})

});


function change_resi_comm(property_type){
    var residential = property_type;
    $('.amenities-menus').css('display', 'block');
    if(residential == 'Flat'){
       $('#StockFlatRent').css('display', 'block');
       $('#DuplexFlats').css('display', 'none');
       $('#PentHouseRent').css('display', 'none');
       $('#StockFactoryRent').css('display', 'none');
       $('#StockHouseRent').css('display', 'none');
       $('#StockLandRent').css('display', 'none');
       $('#StockOfficeRent').css('display', 'none');
       $('#StockShopRent').css('display', 'none');
       $('#StockWarehouseRent').css('display', 'none');
    }else if(residential == 'HouseorBanglow'){
       $('#StockHouseRent').css('display', 'block');
       $('#StockFlatRent').css('display', 'none');
       $('#DuplexFlats').css('display', 'none');
       $('#PentHouseRent').css('display', 'none');
       $('#StockFactoryRent').css('display', 'none');
       $('#StockLandRent').css('display', 'none');
       $('#StockOfficeRent').css('display', 'none');
       $('#StockShopRent').css('display', 'none');
       $('#StockWarehouseRent').css('display', 'none');
    }else if(residential == 'PentHouse'){
       $('#StockHouseRent').css('display', 'none');
       $('#StockFlatRent').css('display', 'none');
       $('#DuplexFlats').css('display', 'none');
       $('#PentHouseRent').css('display', 'block');
       $('#StockFactoryRent').css('display', 'none');
       $('#StockLandRent').css('display', 'none');
       $('#StockOfficeRent').css('display', 'none');
       $('#StockShopRent').css('display', 'none');
       $('#StockWarehouseRent').css('display', 'none');
    }else if(residential == 'DuplexFlat'){
       $('#StockHouseRent').css('display', 'none');
       $('#StockFlatRent').css('display', 'none');
       $('#DuplexFlats').css('display', 'block');
       $('#PentHouseRent').css('display', 'none');
       $('#StockFactoryRent').css('display', 'none');
       $('#StockLandRent').css('display', 'none');
       $('#StockOfficeRent').css('display', 'none');
       $('#StockShopRent').css('display', 'none');
       $('#StockWarehouseRent').css('display', 'none');
    }else if(residential == 'Land'){
       $('#StockHouseRent').css('display', 'none');
       $('#StockFlatRent').css('display', 'none');
       $('#DuplexFlats').css('display', 'none');
       $('#PentHouseRent').css('display', 'none');
       $('#StockFactoryRent').css('display', 'none');
       $('#StockLandRent').css('display', 'block');
       $('#StockOfficeRent').css('display', 'none');
       $('#StockShopRent').css('display', 'none');
       $('#StockWarehouseRent').css('display', 'none');
       $('.amenities-menus').css('display', 'none');
    }else if(residential == 'Office'){
       $('#StockHouseRent').css('display', 'none');
       $('#StockFlatRent').css('display', 'none');
       $('#DuplexFlats').css('display', 'none');
       $('#PentHouseRent').css('display', 'none');
       $('#StockFactoryRent').css('display', 'none');
       $('#StockLandRent').css('display', 'none');
       $('#StockOfficeRent').css('display', 'block');
       $('#StockShopRent').css('display', 'none');
       $('#StockWarehouseRent').css('display', 'none');
    }else if(residential == 'ShopOrShowroom'){
       $('#StockHouseRent').css('display', 'none');
       $('#StockFlatRent').css('display', 'none');
       $('#DuplexFlats').css('display', 'none');
       $('#PentHouseRent').css('display', 'none');
       $('#StockFactoryRent').css('display', 'none');
       $('#StockLandRent').css('display', 'none');
       $('#StockOfficeRent').css('display', 'none');
       $('#StockShopRent').css('display', 'block');
       $('#StockWarehouseRent').css('display', 'none');
    }else if(residential == 'Warehouse'){
       $('#StockHouseRent').css('display', 'none');
       $('#StockFlatRent').css('display', 'none');
       $('#DuplexFlats').css('display', 'none');
       $('#PentHouseRent').css('display', 'none');
       $('#StockFactoryRent').css('display', 'none');
       $('#StockLandRent').css('display', 'none');
       $('#StockOfficeRent').css('display', 'none');
       $('#StockShopRent').css('display', 'none');
       $('#StockWarehouseRent').css('display', 'block');
    }else if(residential == 'Factory'){
       $('#StockHouseRent').css('display', 'none');
       $('#StockFlatRent').css('display', 'none');
       $('#DuplexFlats').css('display', 'none');
       $('#PentHouseRent').css('display', 'none');
       $('#StockFactoryRent').css('display', 'block');
       $('#StockLandRent').css('display', 'none');
       $('#StockOfficeRent').css('display', 'none');
       $('#StockShopRent').css('display', 'none');
       $('#StockWarehouseRent').css('display', 'none');
    }else if(residential == 'Land2'){
       $('#StockHouseRent').css('display', 'none');
       $('#StockFlatRent').css('display', 'none');
       $('#DuplexFlats').css('display', 'none');
       $('#PentHouseRent').css('display', 'none');
       $('#StockFactoryRent').css('display', 'none');
       $('#StockLandRent').css('display', 'block');
       $('#StockOfficeRent').css('display', 'none');
       $('#StockShopRent').css('display', 'none');
       $('#StockWarehouseRent').css('display', 'none');
       $('.amenities-menus').css('display', 'none');
    }
}


$("input[name=section]").on('change', function(){
    var section = this.value;
    if(section == 'PossessionFrom'){
        $('#possession_date_div').css('display','block');
    }else{
        $('#possession_date_div').css('display','none');
    }
});


$("#res_com").on('change', function(){    
    var res_com = this.value;
    if(res_com == 'Residential'){
        $('#residential_types').fadeIn('slow');
        $('#commercial_types').css({'display':'none'});
        $('#residential-amenities').css({'display':'block'});
        $('#commercial-amenities').css({'display':'none'});
        $('input[name=residential]').removeAttr('checked');
        $('#Flat').prop('checked','checked');
        change_resi_comm('Flat');
    }else if(res_com == 'Commercial'){
        $('#commercial_types').fadeIn('slow');
        $('#residential_types').css({'display':'none'});
        $('#commercial-amenities').css({'display':'block'});
        $('#residential-amenities').css({'display':'none'});
        $('input[name=residential]').removeAttr('checked');
        $('#Office').prop('checked','checked');
        change_resi_comm('Office');
    }
});


function change_property_type(rent_sell){
    if(rent_sell == 'Rent'){
        $('#price-details-for-sale').css({'display':'none'});
        $('#price-details-for-rent').css({'display':'block'});
    }else{
        $('#price-details-for-rent').css({'display':'none'});
        $('#price-details-for-sale').css({'display':'block'});
    }
}

function load_more_property_photos(){
    var cnt = parseInt($('input[name="UploadImages[]"]').length);
    cnt++;
    if(cnt<=10){
        $.ajax({
           url:'<?php echo base_url(); ?>home/load_more_property_photos',
           type:'post',
           data:{cnt:cnt},
           success:function(data){
               $('#fileUploadDiv').append(data);
           }
        });
    }else{
        $('#fileUploadDivError').html("You can upload maximum 10 photos");
    }
}

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

function set_states(data){
     availableTags = JSON.parse(data); 
         $( "#state" ).autocomplete({
      source: availableTags
    });
}

/*function load_cities(){
    var state = $('#state').val();
    alert(state);
    $.ajax({
       url:'<?php echo base_url(); ?>home/get_cities_by_state',
       data:{'state':state},
       type:'post',
       success:function(data){
           set_cities(data);
       }
    });
}*/

function set_cities(data){
     availableTags = JSON.parse(data); 
         $( "#city" ).autocomplete({
      source: availableTags
    });
}

function load_locations(location){
    $.ajax({
       url:'<?php echo base_url(); ?>home/get_location',
       type:'post',
       data:{location:location},
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

function load_complex(complex){
    $.ajax({
       url:'<?php echo base_url(); ?>home/get_complex',
       type:'post',
       data:{complex:complex},
       success:function(data){
           set_complex(data);
       }
    });
}
function set_complex(data){
         availableTags = JSON.parse(data); 
         $( "#complex_society_building" ).autocomplete({
      source: availableTags
    });
}  

</script>