<div class="right_col" role="main">
    <div class="page-title"><div class="title_left"><h3><i class="fa fa-ioxhost"></i>Search Property</h3></div></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">  
            <div class="x_panel">
                <form method="post" enctype="multipart/form-data" action="<?php echo base_url('property/search_property');?>">
                    <div class="x_content">
                        
                        <div class="tab"> 
                            <div class="row">  
                                <div class="col-md-12 col-sm-12 col-xs-12">  
                                    <div class="col-md-3 col-sm-3 col-xs-6 radiobtn">
                                        <input type="radio" id="seller" name="buyer_seller" value="Seller" <?php if(!empty($buyer_seller) && $buyer_seller == 'Seller' ){ echo 'checked'; } ?> />
                                        <label for="seller">Seller</label>
                                    </div>
                                    <div class="col-md-3 col-sm-3 col-xs-6 radiobtn">
                                        <input type="radio" id="buyer" name="buyer_seller" value="Buyer" <?php if(!empty($buyer_seller) && $buyer_seller == 'Buyer' ){ echo 'checked'; }elseif(empty($buyer_seller)){ echo 'checked'; } ?> />
                                        <label for="buyer">Buyer</label>    
                                    </div>
                                    
                            <div class="col-md-3 col-sm-3 col-xs-6 radiobtn">
                                <input type="radio" id="res-search" name="res_com" value="Residential" <?php if(!empty($res_com) && $res_com == 'Residential' ){ echo 'checked'; }elseif(empty($res_com)){ echo 'checked'; } ?> />
                                <label for="res-search">Residential</label>
                            </div>
                            <div class="col-md-3 col-sm-3 col-xs-6 radiobtn">
                                <input type="radio" id="com-search" name="res_com" value="Commercial" <?php if(!empty($res_com) && $res_com == 'Commercial' ){ echo 'checked'; } ?> />
                                <label for="com-search">Commercial</label>
                            </div>
                            
                                </div>
                            </div>
                            
                            <div class="col-md-3 col-sm-3 col-xs-6" style="margin-top:10px;">
                                <label>Email</label>
                                <input type="text" id="email" name="email" value="<?php if(!empty($email)){ echo $email; } ?>"/>
                            </div>
                            <div class="col-md-3 col-sm-3 col-xs-6" style="margin-top:10px;">
                                <label>Contact</label>
                                <input type="text" id="contact" name="contact" value=""<?php if(!empty($contact)){ echo $contact; } ?> />
                            </div>
                            
                            
                            <div class="col-md-6 col-sm-6 col-xs-12" style="margin-top:10px;">
                                <label>Property Type</label>
                                <select name="residential" id="residential" required>
                                    <option hidden value="">--Select--</option>
                                    <option disabled value="">Select Property Type</option>
                                    <option value = "DuplexFlat" class="residential" <?php if(!empty($res_com) && $res_com == 'Commercial' ){ echo 'style="display:none;"'; } ?> <?php if(!empty($residential) && $residential == 'DuplexFlat' ){ echo 'selected'; } ?> >Duplex Flat</option>
                                    <option value = "PentHouse" class="residential" <?php if(!empty($res_com) && $res_com == 'Commercial' ){ echo 'style="display:none;"'; } ?> <?php if(!empty($residential) && $residential == 'PentHouse' ){ echo 'selected'; } ?>>Pent House</option>
                                    <option value = "Flat" class="residential" <?php if(!empty($res_com) && $res_com == 'Commercial' ){ echo 'style="display:none;"'; } ?> <?php if(!empty($residential) && $residential == 'Flat' ){ echo 'selected'; } ?>>Flat</option>
                                    <option value = "HouseorBanglow" class="residential" <?php if(!empty($res_com) && $res_com == 'Commercial' ){ echo 'style="display:none;"'; } ?> <?php if(!empty($residential) && $residential == 'HouseorBanglow' ){ echo 'selected'; } ?>>House/Banglow</option>
                                    <option value = "Land" class="residential commercial" <?php if(!empty($residential) && $residential == 'Land' ){ echo 'selected'; } ?>>Land</option>
                                    <option value = "Factory" class="commercial" <?php if(!empty($res_com) && $res_com == 'Commercial' ){ echo 'style="display:block;"'; }else{  echo 'style="display:none;"'; } ?> <?php if(!empty($residential) && $residential == 'Factory' ){ echo 'selected'; } ?>>Factory</option>
                                    <option value = "Office" class="commercial" <?php if(!empty($res_com) && $res_com == 'Commercial' ){ echo 'style="display:block;"'; }else{  echo 'style="display:none;"'; } ?> <?php if(!empty($residential) && $residential == 'Office' ){ echo 'selected'; } ?>>Office</option>
                                    <option value = "ShopOrShowroom" class="commercial" <?php if(!empty($res_com) && $res_com == 'Commercial' ){ echo 'style="display:block;"'; }else{  echo 'style="display:none;"'; } ?> <?php if(!empty($residential) && $residential == 'ShopOrShowroom' ){ echo 'selected'; } ?>>Shop/Showroom</option>
                                    <option value = "Warehouse" class="commercial" <?php if(!empty($res_com) && $res_com == 'Commercial' ){ echo 'style="display:block;"'; }else{  echo 'style="display:none;"'; } ?> <?php if(!empty($residential) && $residential == 'Warehouse' ){ echo 'selected'; } ?>>Warehouse</option>
                                </select>
                            </div>
                            
                            <div class="col-md-3 col-sm-3 col-xs-12">
                                <label>State</label>
                                <!--<select name = "state" id="state" onchange="get_city_list_by_state_name(this.value)" >
                                    <option   value="">Select state</option>
                                    <?php if(!empty($list_state)){ ?>
                                    <?php foreach($list_state as $row){ ?>
                                    <option value="<?=$row->name;?>" <?php if(!empty($state) && $state == $row->name ){ echo 'selected'; } ?> ><?=$row->name;?></option>
                                    <?php } ?>
                                    <?php } ?>
                                </select>-->
                                <input type="text" name="state" id="state" value="<?php if(!empty($state)){ echo $state; } ?>" onchange="get_all_cities_by_state(this.value);"/>
                            </div>
                            
                            <div class="col-md-3 col-sm-3 col-xs-12">
                                <label>City</label>
                                <input type="text" name="city" id="city" value="<?php if(!empty($city)){ echo $city; } ?>" onchange="get_all_pincode_list_by_city_name(this.value)"/>
                                <!--<select name = "city" id="city" onchange="get_pincode_list_by_city_name(this.value)">
                                    <option   value="" >Select city</option>
                                    <?php if(!empty($list_city)){ ?>
                                    <?php foreach($list_city as $row){ ?>
                                    <option  value="<?=$row->name;?>" <?php if(!empty($city) && $city == $row->name ){ echo 'selected'; } ?> ><?=$row->name;?></option>
                                    <?php } ?>
                                    <?php } ?>
                                </select>-->
                            </div>
                            
                            <div class="col-md-3 col-sm-3 col-xs-12">
                                <label>Pincode</label>
                                <input type="text" name="pincode" id="pincode" value="<?php if(!empty($pincode)){ echo $pincode; } ?>" onchange="get_all_location_list_by_pincode_code(this.value)"/>
                                <!--<select name = "pincode" id="pincode" onchange="get_location_list_by_pincode_code(this.value)">
                                    <option  value="">Select pincode</option>
                                    <?php if(!empty($list_pincode)){ ?>
                                    <?php foreach($list_pincode as $row){ ?>
                                    <option value="<?=$row->pincode;?>" <?php if(!empty($pincode) && $pincode == $row->pincode ){ echo 'selected'; } ?>  ><?=$row->pincode;?></option>
                                    <?php } ?>
                                    <?php } ?>
                                </select>-->
                            </div>
                            
                            <div class="col-md-3 col-sm-3 col-xs-12">
                                <label>Location</label>
                                <input type="text" name="location" id="location" value="<?php if(!empty($location)){ echo $location; } ?>" onchange="get_all_society_list_by_location(this.value)"/>
                                <!--<select name = "location" id="location" >
                                    <option  value="">Select location</option>
                                    <?php if(!empty($list_location)){ ?>
                                    <?php foreach($list_location as $row){ ?>
                                    <option value="<?=$row->name;?>" <?php if(!empty($location) && $location == $row->name ){ echo 'selected'; } ?> ><?=$row->name;?></option>
                                    <?php } ?>
                                    <?php } ?>
                                </select>-->
                            </div>
                            
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <label>Complex/Society</label>
                                <input type="text" name="society" id="society" value="<?php if(!empty($society)){ echo $society; } ?>"/>
                            
                            </div>
                            
                            <div class="col-md-3 col-sm-3 col-xs-6 radiobtn" style="margin-top:20px;">
                                <input type="radio" id="rent" name="rent_sell" value="Rent" <?php if(!empty($rent_sell) && $rent_sell == 'Rent' ){ echo 'checked'; } ?> />
                                <label for="rent">Rent</label>
                            </div>
                            <div class="col-md-3 col-sm-3 col-xs-6 radiobtn" style="margin-top:20px;">
                                <input type="radio" id="buy" name="rent_sell" value="Sell" <?php if(!empty($rent_sell) && $rent_sell == 'Sell' ){ echo 'checked'; }elseif(empty($rent_sell)){ echo 'checked'; } ?> />
                                <label for="buy" id="buy_sell_label_id">Sell</label>    
                            </div>
                            
                        </div>
                        
                        <div class="col-md-12 col-sm-12 col-xs-12" style="padding:0;">
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <label>Rooms/Cabins</label>
                            <select name = "rooms" id="rooms" >
                                <option hidden value="">--Select--</option>
                                <option disabled value="">Select One</option>
                                <?php for($i = 0; $i<=100; $i++){ ?>
                                <option value="<?=$i;?>" <?php if(!empty($rooms) && $rooms == $i ){ echo 'selected'; } ?> ><?=$i;?></option>
                                <?php } ?>
                            </select>
                        </div>
                        </div>
                        
                        <div clas="tab" id="sellerDiv" <?php if(!empty($buyer_seller)){ if($buyer_seller == 'Seller'){ echo 'style="display:block;"'; }else{ echo 'style="display:none;"'; } }else{ echo 'style="display:block;"'; } ?>>
                                    <div class="col-md-3 col-sm-3 col-xs-6">
                                        <label>Block/Building No</label>
                                        <input type="text" name="block_no" id="block_no" class="gui-input" value="<?php if(!empty($block_no)){ echo $block_no; } ?>" >	  
                                    </div>
                                    
                                    <div class="col-md-3 col-sm-3 col-xs-6">
                                        <label>Flat No/Room No</label>
                                        <input type="text" name="flat_no" id="flat_no" class="gui-input" value="<?php if(!empty($flat_no)){ echo $flat_no; } ?>" >	  
                                    </div>
                        </div>
                        
                        <div clas="tab" id="buyerDiv" <?php if(!empty($buyer_seller)){ if($buyer_seller == 'Buyer'){ echo 'style="display:block;"'; }else{ echo 'style="display:none;"'; } }else{ echo 'style="display:none;"'; } ?> >
                            <div class="row">  
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    
                                    <div class="col-md-3 col-sm-3 col-xs-6">
                                        <label>Minimun Size</label>
                                        <input type="number" name="minimum_size" id="minimum_size" class="gui-input" value="<?php if(!empty($minimum_size)){ echo $minimum_size; } ?>" >	  
                                    </div>
                                    
                                    <div class="col-md-3 col-sm-3 col-xs-6">
                                        <label>Unit</label>
                                        <select id="minimum_size_unit" name="minimum_size_unit" >
                                            <option hidden value="" >Unit</option>
                                            <option disabled >Select one </option>
                                            <option value="Sqft" <?php if(!empty($minimum_size_unit)){ if($minimum_size_unit == 'Sqft'){ echo 'selected'; } } ?> >Sqft</option>
                                            <option value="Sq-m" <?php if(!empty($minimum_size_unit)){ if($minimum_size_unit == 'Sq-m'){ echo 'selected'; } } ?> >Sq-m</option>
                                            <option value="Acre" <?php if(!empty($minimum_size_unit)){ if($minimum_size_unit == 'Acre'){ echo 'selected'; } } ?> >Acre</option>
                                            <option value="Bigha" <?php if(!empty($minimum_size_unit)){ if($minimum_size_unit == 'Bigha'){ echo 'selected'; } } ?> >Bigha</option>
                                            <option value="Hectare" <?php if(!empty($minimum_size_unit)){ if($minimum_size_unit == 'Hectare'){ echo 'selected'; } } ?> >Hectare</option>
                                            <option value="Marla" <?php if(!empty($minimum_size_unit)){ if($minimum_size_unit == 'Marla'){ echo 'selected'; } } ?> >Marla</option>
                                            <option value="Chatak" <?php if(!empty($minimum_size_unit)){ if($minimum_size_unit == 'Chatak'){ echo 'selected'; } } ?> >Chatak</option>
                                            <option value="Kottah" <?php if(!empty($minimum_size_unit)){ if($minimum_size_unit == 'Kottah'){ echo 'selected'; } } ?> >Kottah</option>
                                        </select>
                                    </div> 
                                    <div class="col-md-3 col-sm-3 col-xs-6">
                                        <label>Maximum Size</label>
                                        <input type="number" name="maximum_size" id="maximum_size" class="gui-input" value="<?php if(!empty($maximum_size)){ echo $maximum_size; } ?>" >	  
                                    </div>
                                    
                                    <div class="col-md-3 col-sm-3 col-xs-6">
                                        <label>Unit</label>
                                        <select id="maximum_size_unit" name="maximum_size_unit" >
                                            <option hidden value="" >Unit</option>
                                            <option disabled >Select one </option>
                                            <option value="Sqft" <?php if(!empty($maximum_size_unit)){ if($maximum_size_unit == 'Sqft'){ echo 'selected'; } } ?> >Sqft</option>
                                            <option value="Sq-m" <?php if(!empty($maximum_size_unit)){ if($maximum_size_unit == 'Sq-m'){ echo 'selected'; } } ?> >Sq-m</option>
                                            <option value="Acre" <?php if(!empty($maximum_size_unit)){ if($maximum_size_unit == 'Acre'){ echo 'selected'; } } ?> >Acre</option>
                                            <option value="Bigha" <?php if(!empty($maximum_size_unit)){ if($maximum_size_unit == 'Bigha'){ echo 'selected'; } } ?> >Bigha</option>
                                            <option value="Hectare" <?php if(!empty($maximum_size_unit)){ if($maximum_size_unit == 'Hectare'){ echo 'selected'; } } ?> >Hectare</option>
                                            <option value="Marla" <?php if(!empty($maximum_size_unit)){ if($maximum_size_unit == 'Marla'){ echo 'selected'; } } ?> >Marla</option>
                                            <option value="Chatak" <?php if(!empty($maximum_size_unit)){ if($maximum_size_unit == 'Chatak'){ echo 'selected'; } } ?> >Chatak</option>
                                            <option value="Kottah" <?php if(!empty($maximum_size_unit)){ if($maximum_size_unit == 'Kottah'){ echo 'selected'; } } ?> >Kottah</option>
                                        </select>
                                    </div>
                                    
                                    <div class="col-md-6 col-sm-6 col-xs-6">
                                        <label>Minimum Price</label>
                                        <input type="number" name="minimum_price" id="minimum_price" class="gui-input" value="<?php if(!empty($minimum_price)){ echo $minimum_price; } ?>" >	  
                                    </div>
                                    
                                    <div class="col-md-6 col-sm-6 col-xs-6">
                                        <label>Maximum Price</label>
                                        <input type="number" name="maximum_price" id="maximum_price" class="gui-input" value="<?php if(!empty($maximum_price)){ echo $maximum_price; } ?>" >	  
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    <div class="col-md-12 col-sm-12 col-xs-12" style="margin:20px 0 10px 0;">
                         <button type ="submit" class = "effect red effect-5">Search</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php if(!empty($result)){ ?>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">  
            <div class="x_panel">
                <?php if(!empty($buyer_seller)){?>
                <?php if($buyer_seller == 'Seller'){?>
                <table id="datatable" class="table table-bordered table-striped table">
                    <thead> 
                    <tr>
                        <td>SR NO</td>
                        <td>Property Id</td>
                        <td>Name</td>
                        <td>Mobile</td>
                        <td>Email</td>
                        <td>State</td>
                        <td>City</td>
                        <td>Pincode</td>
                        <td>Location</td>
                        <td>Landmark</td>
                        <td>Complex/Society/Building</td>
                        <td>Flat No</td>
                        <td>Block No</td>
                    </tr>
                    </thead>
                    <tbody>
                    <?php if(!empty($result)){ ?>
                    <?php foreach($result as $i=>$row){ ?>
                        <tr>
                            <td><?php echo $i+1; ?></td>
                            <td><?php echo $row->lead_id; ?></td>
                            <td><?php echo $row->name; ?></td>
                            <td><?php echo $row->mobile; ?></td>
                            <td><?php echo $row->email; ?></td>
                            <td><?php echo $row->state; ?></td>
                            <td><?php echo $row->city; ?></td>
                            <td><?php echo $row->pincode; ?></td>
                            <td><?php echo $row->location; ?></td>
                            <td><?php echo $row->landmark; ?></td>
                            <td><?php echo $row->complex_society_building; ?></td>
                            <td><?php echo $row->flatno; ?></td>
                            <td><?php echo $row->blockno; ?></td>
                        </tr>
                    <?php } ?>
                    <?php } ?>
                    </tbody>
                </table>
                <?php }else{ ?>
                <table id="datatable" class="table table-bordered table-striped table">
                    <thead> 
                        <tr>
                            <td>SR NO</td>
                            <td>Property Id</td>
                            <td>Name</td>
                            <td>Mobile</td>
                            <td>Email</td>
                            <td>State</td>
                            <td>City</td>
                            <td>Location</td>
                            <td>Complex/Society/Building</td>
                            <td>Minimum Rent</td>
                            <td>Maximum Rent</td>
                        </tr>
                    </thead>
                    <tbody
                    <?php if(!empty($result)){ ?>
                    <?php foreach($result as $i=>$row){ ?>
                        <tr>
                            <td><?php echo $i+1; ?></td>
                            <td><?php echo $row->lead_id; ?></td>
                            <td><?php echo $row->name; ?></td>
                            <td><?php echo $row->mobile; ?></td>
                            <td><?php echo $row->email; ?></td>
                            <td><?php echo $row->state; ?></td>
                            <td><?php echo $row->city; ?></td>
                            <td><?php echo $row->location; ?></td>
                            <td><?php echo $row->ComplexSoceityBuilding; ?></td>
                            <td><?php echo $row->MinimumRent; ?></td>
                            <td><?php echo $row->MaximumRent; ?></td>
                        </tr>
                    <?php } ?>
                    <?php } ?>
                    </tbody>
                </table>
                <?php } ?>
                <?php } ?>
            </div>
        </div>
    </div>
    <?php }?>
</div>


<script>
    /*$('input[name=res_com]').on('change', function(){
        var res_com = $('input[name=res_com]:checked').val();
        alert(res_com);
    });*/
    
    $('input[name=buyer_seller]').on('change', function(){
        var buyer_seller = $('input[name=buyer_seller]:checked').val();
        if(buyer_seller == 'Buyer'){
            $('#buyerDiv').css('display', 'block');
            $('#sellerDiv').css('display', 'none');
            $('#buy_sell_label_id').html('Buy');
        }else{
            $('#buyerDiv').css('display', 'none');
            $('#sellerDiv').css('display', 'block');
            $('#buy_sell_label_id').html('Sell');
        }
    });
    
    $('input[type=radio][name=res_com]').change(function() {
        if(this.value == 'Residential'){
            $('.commercial').css('display', 'none');
            $('.residential').css('display', 'block');
        }else{
            $('.residential').css('display', 'none');
            $('.commercial').css('display', 'block');
        }
    });
</script>