<!--<div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">-->
    <div class="real-estate-property-content real-estate-dev-property-content">
        <div class="slide-loader-holder">
            <div class="property-sorting-holder">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="all-results">
                            <!-- <h5>10 Property(s) Found</h5> -->

                            <div class="btn-section-view-more pt-40">
                                <a href="#" class="outline-btn-red"><i class="fa fa-home"></i> <?php echo !empty($list_property) ? count($list_property) : 0; ?> Properties</a>
                            </div>
                            <div class="btn-section-view-more pt-40">
                                <a href="#" class="outline-btn-red"><i class="fa fa-building"></i> <?php echo !empty($list_project) ? count($list_project) : 0;?>+ New Projects</a>
                            </div>
                            <div class="btn-section-view-more pt-40 cu-m">
                                <a href="#" class="outline-btn-red"><i class="fa fa-user"></i> 
                                <?php if($type == 'Sell' || $type == 'Rent'){ ?>
                                <?php if(!empty($list_property)){ ?>
                                <?php echo count(array_unique(array_column($list_property, 'user_id'))).'+'; ?>
                                <?php }}else{ ?>
                                <?php if(!empty($list_project)){ ?>
                                <?php echo count(array_unique(array_column($list_project, 'user_id'))).'+'; ?>
                                <?php } ?>
                                <?php } ?>
                                 Dealers</a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        
        
        <?php if($type == 'New_projects'){ ?>
        <?php if(!empty($list_project)){ ?>
        <?php foreach($list_project as $project){ ?>
        <!---------- Start Search Card Area --------------------------------------------------->    
        <div class="real-estate-property">
            <div class="row">
                <div class="property-row col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="property-medium active advance-grid">
                        <div class="img-holder image-loaded">
                            <figure>
                                <?php if($project->image_file == ''){ ?>
                                <a href="<?php echo base_url(); ?>home/see_details/project/<?php echo $project->post_id; ?>"><img class="img-grid" src="<?php echo base_url();?>assets/front/extra-images/property-image16.webp" alt="#"></a>
                                <?php }else{ ?>
                                <a href="<?php echo base_url(); ?>home/see_details/project/<?php echo $project->post_id; ?>"> <img class="img-grid" src="<?php echo base_url();?><?php echo $project->image_file; ?>" alt="#"> </a>
                                <?php } ?>
                                <figcaption>
                                    <!--<span class="featured">Plantinum</span>-->
                                    <div class="caption-inner">
                                        <ul class="rem-property-options">
                                            <li class="property-like-opt">
                                                <div class="option-holder">
                                                    <div class="like-btn">
                                                        <?php if(!empty($this->session->userdata('user'))){ ?>
                                                        <a href="<?php echo base_url(); ?>home/add_project_to_favorite/<?php echo $project->post_id;?>" class="favourite wp-rem-open-signin-tab">
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
                                                    <a class="property-video-btn" target="_BLANK" href="<?php echo $project->video_file; ?>">
                                                        <i class="icon-film3"></i>
                                                        <div class="option-content">
                                                            <span>Video</span>
                                                        </div>
                                                    </a>
                                                </div>
                                            </li>
                                            <li class="property-photo-opt">
                                                <div class="option-holder">
                                                    <a href="javascript:void(0);" onclick="view_project_gallery_images(<?php echo $project->post_id; ?>);" data-rel="prettyPhoto[gal4]" class="rem-pretty-photos">
                                                        <i class="icon-camera6"></i><span class="capture-count"><?php echo count(explode(';', $project->images)); ?></span>
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
                            <div class="post-title">
                                <?php $propertyType = ($project->PropertyStatus == 'Commercial') ? $project->propertyTypeCom : $project->propertyTypeRes; ?>
                                <?php if($project->PropertyStatus == 'Commercial'){
                                        $propertyType = ($project->propertyTypeCom == 'WareHouse') ? 'Warehouse' : $project->propertyTypeCom;
                                    }else{
                                        $propertyType = ($project->propertyTypeCom == 'PentHouse') ? 'Penthouse' : $project->propertyTypeRes;
                                    }
                                ?>
                                <h4><a href="<?php echo base_url(); ?>home/see_details/project/<?php echo $project->post_id; ?>"><?php echo $project->bhk1.' - '.$project->bhk2.' BHK '.$project->PropertyStatus.' '.$propertyType.' for sale in '.$project->city; ?></a></h4> 
                            </div>

                            <ul class="property-location custom-ul1">
                                <li>Built-up Area: <?php echo $project->sizestartingfrom.' '.$project->sizestartingfromUnit; ?> <?php echo $project->sizeupto.' '.$project->sizeuptoUnit; ?>.</li>
                                <!--<li>Society: <strong><?php echo $project->section; ?></strong></li>-->
                                <hr style="margin:7px 0px 7px;">
                                <li> <?php echo $project->section; ?> / <?php echo $project->AgeofPropeety; ?> / <?php echo $project->PropertyType; ?></li>
                                <hr style="margin:7px 0px 7px;">
                                <li><strong>Features: </strong> </li>
                            </ul>
                            <span class="property-price">
                                <span>Rs. <?php echo number_format($project->price, 2); ?>/<?php echo $project->priceUnit; ?></span><span class="prop-price-type"></span>
                            </span>
                            <div class="thumb-img">
                                <figure><a><img src="<?php echo base_url();?>assets/front/extra-images/member-image-03.webp" alt="#"></a></figure>
                            </div>
                        </div>
                        <div class="col-md-12" style="padding: 0;float: right;">
                            <div class="col-md-3 cm-pt" style="padding: 0;">
                                <div class="post-time pt-10">
                                    <span><a href="#"><strong>Dealer :</strong> <?php echo @$project->dealer_name; ?></a></span>
                                </div>
                            </div>
                            <div class="col-md-3 cm-pt" style="padding: 0;">
                                <div class="post-time pt-10">
                                    <span><a><strong>Posted : </strong> <?php echo date('M d, Y', strtotime($project->created)); ?> </a></span>
                                </div>
                            </div>
                            <div class="col-md-6" style="padding: 0;">
                                <!--<div class="btn-section-view-more pt-20" style="display: inherit;">
                                    <a href="#" class="btn btn-default"><i class="fa fa-comments"></i></a>
                                </div>-->
                                <div class="btn-section-view-more pt-20" style="display: inherit;">
                                    <!--<a href="#" class="btn btn-default"><i class="fa fa-eye"></i> Phone No</a>-->
                                    <a class="btn btn-default" href="javascript:void(0);" onclick="enquiry_modal(<?php echo $project->post_id; ?>, 'project');"><i class="icon- icon-comment"></i>Enquiry now</a>
                                </div>
                                <div class="btn-section-view-more pt-20" style="display: inherit;">
                                    <!--<a href="#" data-target="#contact-dealer-free" data-toggle="modal" class="btn-blue">Contact Dealer <span style="vertical-align: top;font-size:8px;color:#f7f30b;">Free</span></a>-->
                                    <a class="btn-blue" href="javascript:void(0);" onclick="request_view_popup(<?php echo $project->post_id; ?>, 'project')"><i class="icon- icon-calendar-check-o"></i>Request Viewing</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!---------- End Search Card Area --------------------------------------------------->
        <?php } ?>
        <?php }else{ ?>
        <h2>No Result Found!</h2>
        <?php } ?>
        <?php } ?>
        
        


        <?php //if($type == 'sell' || $type == 'rent'){ ?>
        <?php if(!empty($list_property)){ ?>
        <?php foreach($list_property as $property){ ?>
        <!---------- Start Search Card Area --------------------------------------------------->                                          
        <div class="real-estate-property">
            <div class="row">
                <div class="property-row col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="property-medium active advance-grid">
                        <div class="img-holder image-loaded">
                            <figure>
                                <?php if($property->image_name == ''){ ?>
                                <a href="<?php echo base_url(); ?>home/see_details/property/<?php echo $property->post_id; ?>"><img class="img-grid" src="<?php echo base_url();?>assets/front/extra-images/property-image16.webp" alt="#"></a>
                                <?php }else{ ?>
                                <a href="<?php echo base_url(); ?>home/see_details/property/<?php echo $property->post_id; ?>"><img class="img-grid" src="<?php echo base_url();?><?php echo $property->image_name; ?>" alt="#"> </a>
                                <?php } ?>
                                <figcaption>
                                    <!--<span class="featured">Plantinum</span>-->
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
                                                    <a href="javascript:void(0);" onclick="view_property_gallery_images(<?php echo $property->post_id; ?>);"  data-rel="prettyPhoto[gal4]" class="rem-pretty-photos">
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
                            <div class="post-title">
                                <?php if($property->residential == 'HouseorBanglow'){ $propertyResidential= 'House / Banglow';}elseif($property->residential== 'ShopOrShowroom'){  $propertyResidential= 'Shop / Showroom'; }elseif($property->residential== 'DuplexFlat'){  $propertyResidential= 'Duplex Flat'; }elseif($property->residential== 'PentHouse'){  $propertyResidential= 'Pent House'; }else{  $propertyResidential= $property->residential; }; ?>
                                <h4><a href="<?php echo base_url('home/see_details/property/').$property->post_id; ?>"><?php echo $property->res_com.' '.$propertyResidential.' for '.$property->rent_sell.' in '.$property->city; ?></a></h4>
                            </div>

                            <ul class="property-location custom-ul1">
                                <li>Built-up Area: <?php echo @$property->builtup_area;?> <?php echo @$property->builtup_unit;?>.</li>
                                <li>Society: <strong><?php echo $property->complex_society_building;?></strong></li>
                                <hr style="margin:7px 0px 7px;">
                                <li><?php if($property->rent_sell == 'Sell'){echo 'Sale';}else{echo $property->rent_sell;}?> /
                                    <?php if($property->section == 'ReadyToMove'){echo 'Ready To Move';}else{echo "Posession From : ".$property->PossessionDate;}?> / <?php echo $property->AgeofPropeety; ?> / <?php echo $property->PropertyType; ?></li>
                                <hr style="margin:7px 0px 7px;">
                                <li><strong>Features: </strong> </li>
                            </ul>
                            <span class="property-price">
                                <span>Rs. <?php if($property->rent_sell == 'Sell'){echo $property->amount.'/'.$property->per_unit;}else{echo $property->rentPerMonth.'/Month';}?> </span><span class="prop-price-type"></span>
                            </span>
                            <div class="thumb-img">
                                <figure><a><img src="<?php echo base_url();?>assets/front/extra-images/member-image-03.webp" alt="#"></a></figure>
                            </div>
                        </div>
                        <div class="col-md-12" style="padding: 0;float: right;">
                            <div class="col-md-3 cm-pt" style="padding: 0;">
                                <div class="post-time pt-10">
                                    <span><a href="#"><strong>Dealer :</strong> <?php echo @$property->dealer_name; ?></a></span>
                                </div>
                            </div>
                            <div class="col-md-3 cm-pt" style="padding: 0;">
                                <div class="post-time pt-10">
                                    <span><a><strong>Posted : </strong> <?php echo date('M d, Y',strtotime($property->created));?></a></span>
                                </div>
                            </div>
                            <div class="col-md-6" style="padding: 0;">
                                <!--<div class="btn-section-view-more pt-20" style="display: inherit;">
                                    <a href="#" class="btn btn-default"><i class="fa fa-comments"></i></a>
                                </div>-->
                                <div class="btn-section-view-more pt-20" style="display: inherit;">
                                    <!--<a href="#" class="btn btn-default"><i class="fa fa-eye"></i> Phone No</a>-->
                                    <a class="btn btn-default" onclick="enquiry_modal(<?php echo $property->post_id; ?>, 'property')" href="javascript:void(0);"><i class="icon- icon-comment"></i> Enquiry now</a>
                                </div>
                                <div class="btn-section-view-more pt-20" style="display: inherit;">
                                    <!--<a href="#" data-target="#contact-dealer-free" data-toggle="modal" class="btn-blue">Contact Dealer <span style="vertical-align: top;font-size:8px;color:#f7f30b;">Free</span></a>-->
                                    <a class="btn-blue" href="javascript:void(0);" onclick="request_view_popup(<?php echo $property->post_id; ?>, 'property');"><i class="icon- icon-calendar-check-o"></i> Request Viewing</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!---------- End Search Card Area --------------------------------------------------->
        <?php } ?>
        <?php }else{ ?>
        <h2>No Result Found!</h2>
        <?php } ?>
        <?php //} ?>
        
        
        
        
    </div>


    <!--<div class="page-nation">
        <ul class="pagination pagination-large">
            <li class="active"><span><a class="page-numbers active">1</a></span></li>
            <li><a href="#">2</a></li>
            <li><a href="#">Next</a></li>
        </ul>
    </div>-->
    <?php if(!empty($list_property) || !empty($list_project)){ ?>
    <div class="page-nation" id="pagination">
        <!--<?php echo $links; ?>-->
    </div>
    <?php } ?>
<!--</div>-->

<script>
    $('#pagination').on('click','a',function(e){
       e.preventDefault(); 
       var pageno = $(this).attr('data-ci-pagination-page');
       search_property(pageno);
     });
</script>