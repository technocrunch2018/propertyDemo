<?php if($frontpagedata->accept_terms_status == 0){?>
<div class="cookie-notice">
    <p><?php echo $frontpagedata->accept_terms;?></p>
    <button type="button" class="accept-cookies">I&nbsp;Agree</button>
    <?php }?>
    <style>
    .faq {
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
        border-radius: 10px;
        background: #04b3e0;
    }

    .faq .content {
        padding: 20px;
        background: #04b3e0;
        border-radius: 0 0 10px 10px;
    }


    .css-fvnb3i {
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;
        /*height: 50px;*/
        color: #000;
        background-color: #fff;
    }

    .css-1nt5285 {
        display: inline-block;
        position: relative;
        width: 158px;
        /*padding-left: 15px;*/
        line-height: 50px;
        -webkit-box-flex: 1;
        -webkit-flex-grow: 1;
        -ms-flex-positive: 1;
        flex-grow: 1;
    }

    .css-jas90v {
        position: relative;
        z-index: 2;
        width: 100%;
        /*height: 50px;*/
        width: calc(100% - 158px);
        border-left: 1px solid #e6e6e6;
    }

    .css-2vmwij {
        width: 100%;
        padding: 16px 0 16px 15px;
        border: none;
        font-size: 14px;
        line-height: 16px;
    }

    .css-1nt5285 .search-bar {
        /*padding: 17px 35px 17px 0;*/
        line-height: 16px;
        overflow: hidden;
        white-space: nowrap;
        text-overflow: ellipsis;
    }

    .css-84bdd7 {
        padding: 0 14px;
        border: 1px solid #000000;
        font-size: 14px;
        line-height: 28px;
        color: #fff;
        background-color: #f18931;
        border-radius: 2px;
        cursor: pointer;
        width: 150px;
        border-radius: 0;
    }

    .selector {
        position: relative;
        height: 80px;
        top: 12px;
        display: flex;
        justify-content: space-around;
        align-items: center;
    }

    .selecotr-item {
        position: relative;
        flex-basis: calc(70% / 3);
        height: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .selector-item_radio {
        appearance: none;
        display: none;
    }

    .selector-item_label {
        position: relative;
        height: 80%;
        width: 100%;
        text-align: center;
        border-radius: 9999px;
        line-height: 400%;
        font-weight: 900;
        transition-duration: .5s;
        transition-property: transform, color, box-shadow;
        transform: none;
        color: #000;
    }

    .selector-item_radio:checked+.selector-item_label {
        background-color: #f18931;
        box-shadow: 0 0 4px rgba(0, 0, 0, .5), 0 2px 4px rgba(0, 0, 0, .5);
        transform: translateY(-2px);
        color: #fff;
    }
    </style>
    <div class="cs-no-subheader"></div>
    <!-- Main Content Section -->
    <div class="main-section">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                <div class="cs-rich-editor">

                    <div class="container-fluid" style="position: relative;padding: 0;">
                        <ul class="rslides">
                            <?php foreach($banners as $list){?>

                            <li><img src="<?php echo base_url($list->image);?>" alt="">
                                <div class="overlay overlay-bg"></div>
                            </li>
                            <?php }?>
                        </ul>

                        <div class="search-absolute">
                            <div class="container search-container">
                                <div class="wp-rem-property-content fancy" id="wp-rem-property-content-4090">
                                    <form method="post" action="<?php echo base_url('home/find_property'); ?>">
                                        <section class="faq">
                                            <div class="selector">
                                                <div class="selecotr-item">
                                                    <input type="radio" id="radio1" value=1 name="search_type"
                                                        class="selector-item_radio" checked>
                                                    <label for="radio1" class="selector-item_label"> Rent</label>
                                                </div>
                                                <div class="selecotr-item">
                                                    <input type="radio" id="radio2" value=2 name="search_type"
                                                        class="selector-item_radio">
                                                    <label for="radio2" class="selector-item_label"> Sale</label>
                                                </div>
                                                <!--<div class="selecotr-item">-->
                                                <!--    <input type="radio" id="radio3" value = 3 name="search_type" class="selector-item_radio">-->
                                                <!--    <label for="radio3" class="selector-item_label"> PG's</label>-->
                                                <!--</div>-->
                                            </div>
                                            <section class="content">
                                                <div class="active" id="#panel1">
                                                    <div class="search-box css-fvnb3i">
                                                        <div class=" css-1nt5285">
                                                            <div class="input-container">
                                                                <div>
                                                                    <select
                                                                        class="chosen-select-no-single search-bar css-80eldr"
                                                                        style="height: 54px; margin-bottom: 0px;"
                                                                        name="city" id="search_city" required>
                                                                        <option selected="selected" disabled>City
                                                                        </option>
                                                                        <?php foreach($my_city as $list){?>
                                                                        <option value="<?php echo $list->name;?>">
                                                                            <?php echo $list->name;?></option>
                                                                        <?php }?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div data-q="search" class="css-jas90v">
                                                            <input type="text" style="height: 54px"
                                                                onkeyup="load_locations(this.value)" id="location"
                                                                name="search_box" placeholder="Search for locality..."
                                                                class="css-2vmwij">
                                                        </div>
                                                        <button class="cta  css-84bdd7" type="submit">Search</button>
                                                    </div>
                                                </div>
                                            </section>
                                        </section>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>


                    <?php if(!empty($list_pg)){?>
                    <div class="page-section-index" id="rent_property_div">
                        <div class="container ">
                            <div class="row">
                                <div class="section-fullwidth col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
                                            <div class="wp-rem-property-content">
                                                <div class="dev-map-class-changer">
                                                    <div id="Property-content-78155">
                                                        <script>
                                                        jQuery(document).ready(function() {
                                                            jQuery(
                                                                    "a.property-video-btn[data-rel^='prettyPhoto']")
                                                                .prettyPhoto({
                                                                    animation_speed: "fast",
                                                                    slideshow: 10000,
                                                                    hideflash: true,
                                                                    autoplay: true,
                                                                    autoplay_slideshow: false
                                                                });
                                                            var _this_list_view = 'grid-classic';
                                                            var _element_property_footer = 'no';
                                                        });
                                                        </script>
                                                        <form>
                                                            <div class="row">
                                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                    <div
                                                                        class="real-estate-property-content real-estate-dev-property-content">
                                                                        <div class="row">
                                                                            <div
                                                                                class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                                <div class="element-title align-center">
                                                                                    <h2 class="zigzag">Available PG's
                                                                                    </h2>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="slide-loader-holder"></div>
                                                                        <div class="real-estate-property">
                                                                            <div class="row">
                                                                                <div
                                                                                    class="col-md-12 owl-carousel owl-theme owl-carousel1">
                                                                                    <?php foreach($list_pg as $list){
                                                                        $pg_images = $this->common_model->getdata(array('pg_id'=>$list->id),'pg_images'); 
                                                                        if(!empty($pg_images && !empty($pg_images[0]))){
                                                                            $main_image =  $pg_images[0]->file;
                                                                        }
                                                                    ?>
                                                                                    <div class="property-row item">
                                                                                        <div class="property-grid classic"
                                                                                            style="min-height:399px;">
                                                                                            <div
                                                                                                class="img-holder image-loaded">
                                                                                                <figure>
                                                                                                    <?php if($main_image == ''){ ?>
                                                                                                    <a
                                                                                                        href="<?php echo base_url(); ?>home/pg_details/<?php echo $list->id; ?>">
                                                                                                        <img class="img-grid"
                                                                                                            src="<?php echo base_url();?>assets/front/extra-images/property-grid-image-2.webp"
                                                                                                            alt="#">
                                                                                                    </a>
                                                                                                    <?php }else{ ?>
                                                                                                    <a
                                                                                                        href="<?php echo base_url(); ?>home/pg_details/<?php echo $list->id; ?>">
                                                                                                        <img class="img-grid"
                                                                                                            src="<?php echo base_url();?><?php echo $main_image; ?>"
                                                                                                            alt="#">
                                                                                                    </a>
                                                                                                    <?php } ?>
                                                                                                    <div
                                                                                                        class="caption-inner">
                                                                                                        <ul
                                                                                                            class="rem-property-options">
                                                                                                            <!--<li class="property-photo-opt">-->
                                                                                                            <!--    <div class="option-holder">-->
                                                                                                            <!--        <a href="javascript:void(0);" onclick="view_property_gallery_images(<?php echo $list->id; ?>);"   class="rem-pretty-photos">-->
                                                                                                            <!--            <i class="icon-camera6"></i><span class="capture-count"><?php echo ($property->image_name != '') ? (($property->images != '') ? (count(explode(';',$property->images))+1) : 1) : (($property->images != '') ? (count(explode(';',$property->images))) : 0); ?></span>-->
                                                                                                            <!--            <div class="option-content">-->
                                                                                                            <!--                <span>Photos</span>-->
                                                                                                            <!--            </div>-->
                                                                                                            <!--        </a>-->
                                                                                                            <!--    </div>-->
                                                                                                            <!--</li>-->
                                                                                                        </ul>
                                                                                                    </div>
                                                                                                    </figcaption>
                                                                                                </figure>
                                                                                            </div>
                                                                                            <div class="text-holder">
                                                                                                <div class="col-md-12">
                                                                                                    <div
                                                                                                        class="post-title">
                                                                                                        <h4><a
                                                                                                                href="<?php echo base_url(); ?>home/pg_details/<?php echo $list->id; ?>"><?php echo substr($list->pg_name, 0,90); ?></a>
                                                                                                        </h4>
                                                                                                    </div>
                                                                                                    <ul
                                                                                                        class="property-location">
                                                                                                        <li><i
                                                                                                                class="icon-location-pin2"></i><span><?php echo $list->location; ?>
                                                                                                            </span></li>
                                                                                                    </ul>
                                                                                                </div>
                                                                                                <div class="col-md-12">
                                                                                                    <span
                                                                                                        class="property-price">
                                                                                                        <span
                                                                                                            content="250">₹.<?php echo number_format($list->triple_sharing_room,2); ?></span>
                                                                                                        <span
                                                                                                            class="prop-price-type"
                                                                                                            style="margin-left:0px;">
                                                                                                            <span
                                                                                                                class="guid-price">/Month</span>
                                                                                                        </span>
                                                                                                    </span>
                                                                                                    <br>
                                                                                                    <a href="<?php echo base_url(); ?>home/pg_details/<?php echo $list->id; ?>"
                                                                                                        class="btn custom-btn btn-details">See
                                                                                                        Details</a>
                                                                                                    <div
                                                                                                        class="post-category-list">
                                                                                                        <p><span
                                                                                                                style="color:#000">Marketed
                                                                                                                By</span>
                                                                                                            <?php echo substr($list->managedby, 0, 30); ?>
                                                                                                        </p>
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
                            <!--<div class="btn-section-view-more received-enquiries-viewings-holder" style="float:right;">-->
                            <!--<a href="<?php echo base_url(); ?>home/find_property/pg" class="outline-btn-blue"><i class="fa fa-eye"></i> View More Propeties</a>-->
                            <!--</div>-->
                        </div>
                    </div>
                    <?php } ?>

                    <div class="page-section" style="padding-top:50px;padding-bottom:20px;background: #ffffff;">
                        <!-- Container Start -->
                        <div class="container">
                            <div class="row">
                                <div class="section-fullwidth col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
                                            <div class="cs-icon-boxes-list top-center">
                                                <div class="row">

                                                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                        <div class="icon-boxes fancy top-center">
                                                            <div class="img-holder">
                                                                <?php if(!empty($this->session->userdata('user'))){ ?>
                                                                <a href="<?php echo base_url('home/post_property');?>">
                                                                    <?php } else{?>
                                                                    <a data-toggle="modal" href="javascript:void(0);"
                                                                        data-target="#sign-up">
                                                                        <?php }?>
                                                                        <figure><img
                                                                                src="<?php echo base_url();?>assets/front/extra-images/icon-boxes-modern-img2.png">
                                                                        </figure>
                                                                    </a>
                                                            </div>
                                                            <div class="text-holder">
                                                                <h4>

                                                                    <?php if(!empty($this->session->userdata('user'))){ ?>
                                                                    <a style="color:#000000 !important;text-transform: capitalize !important;"
                                                                        href="<?php echo base_url('home/post_property');?>">
                                                                        Post Your Property Free</a>
                                                                    <?php }else{?>
                                                                    <a style="color:#000000 !important;text-transform: capitalize !important;"
                                                                        data-toggle="modal" href="javascript:void(0);"
                                                                        data-target="#sign-up">Post Your Property
                                                                        Free</a>
                                                                    <?php }?>
                                                                </h4>
                                                                <!--<p>Search estimated values, energy scores and market insights for any property in your area.to ease this process.</p>-->
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                        <div class="icon-boxes fancy top-center">
                                                            <div class="img-holder">

                                                                <?php if(!empty($this->session->userdata('user'))){ ?>
                                                                <a href="<?php echo base_url('home/subscription');?>">
                                                                    <?php } else{?>
                                                                    <a data-toggle="modal" href="javascript:void(0);"
                                                                        data-target="#sign-up">
                                                                        <?php }?>
                                                                        <figure><img
                                                                                src="<?php echo base_url();?>assets/front/extra-images/icon-boxes-modern-img3.png">
                                                                        </figure>
                                                                    </a>
                                                            </div>
                                                            <div class="text-holder">
                                                                <h4>
                                                                    <?php if(!empty($this->session->userdata('user'))){ ?>
                                                                    <a style="color:#000000 !important;text-transform: capitalize !important;"
                                                                        href="<?php echo base_url('home/subscription');?>">
                                                                        Subscription</a>
                                                                    <?php }else{?>
                                                                    <a style="color:#000000 !important;text-transform: capitalize !important;"
                                                                        data-toggle="modal" href="javascript:void(0);"
                                                                        data-target="#sign-up">Subscription</a>
                                                                    <?php }?>
                                                                    <!--<p>Understand your local market, learn how to get the best price for your property and find agents in your area</p>-->
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end section row -->
                                </div>

                            </div>
                        </div>
                        <!-- End Container Start -->
                    </div>


                    <?php if(!empty($list_sale_property)){?>
                    <div class="page-section-index" id="sale_property_div">
                        <div class="container ">
                            <div class="row">
                                <div class="section-fullwidth col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
                                            <div class="wp-rem-property-content">
                                                <div class="dev-map-class-changer">
                                                    <div id="Property-content-78155">
                                                        <script>
                                                        jQuery(document).ready(function() {
                                                            jQuery(
                                                                    "a.property-video-btn[data-rel^='prettyPhoto']")
                                                                .prettyPhoto({
                                                                    animation_speed: "fast",
                                                                    slideshow: 10000,
                                                                    hideflash: true,
                                                                    autoplay: true,
                                                                    autoplay_slideshow: false
                                                                });
                                                            var _this_list_view = 'grid-classic';
                                                            var _element_property_footer = 'no';
                                                        });
                                                        </script>
                                                        <form>
                                                            <div class="row">
                                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                    <div
                                                                        class="real-estate-property-content real-estate-dev-property-content">
                                                                        <div class="row">
                                                                            <div
                                                                                class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                                <div class="element-title align-center">
                                                                                    <h2 class="zigzag">Property For Sale
                                                                                    </h2>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="slide-loader-holder"></div>
                                                                        <div class="real-estate-property">
                                                                            <div class="row">
                                                                                <div
                                                                                    class="col-md-12 owl-carousel owl-theme owl-carousel1">
                                                                                    <?php foreach($list_sale_property as $property){?>
                                                                                    <div class="property-row item">
                                                                                        <div class="property-grid classic"
                                                                                            style="min-height:399px;">
                                                                                            <div
                                                                                                class="img-holder image-loaded">
                                                                                                <figure>
                                                                                                    <?php if($property->image_name == ''){ ?><a
                                                                                                        href="<?php echo base_url(); ?>home/see_details/property/<?php echo $property->post_id; ?>">
                                                                                                        <img class="img-grid"
                                                                                                            src="<?php echo base_url();?>assets/front/extra-images/property-grid-image-2.webp"
                                                                                                            alt="#">
                                                                                                    </a><?php }else{ ?>
                                                                                                    <a
                                                                                                        href="<?php echo base_url(); ?>home/see_details/property/<?php echo $property->post_id; ?>">
                                                                                                        <img class="img-grid"
                                                                                                            src="<?php echo base_url();?><?php echo $property->image_name; ?>"
                                                                                                            alt="#">
                                                                                                    </a>
                                                                                                    <?php } ?>
                                                                                                    <!--<figcaption> <span class="featured"><?php echo $property->subscription; ?></span>-->
                                                                                                    <?php  if($property->is_show == 1){ ?>
                                                                                                    <figcaption> <span
                                                                                                            class="featured"><?php echo "Verified"; ?></span>
                                                                                                        <?php } ?>
                                                                                                        <div
                                                                                                            class="caption-inner">
                                                                                                            <ul
                                                                                                                class="rem-property-options">
                                                                                                                <li
                                                                                                                    class="property-like-opt">
                                                                                                                    <div
                                                                                                                        class="option-holder">
                                                                                                                        <div
                                                                                                                            class="like-btn">
                                                                                                                            <?php if(!empty($this->session->userdata('user'))){ ?>
                                                                                                                            <a href="<?php echo base_url(); ?>home/add_property_to_favorite/<?php echo $property->post_id;?>"
                                                                                                                                class="favourite wp-rem-open-signin-tab"><i
                                                                                                                                    class="icon-heart-o"></i>
                                                                                                                                <div
                                                                                                                                    class="option-content">
                                                                                                                                    <span>Add
                                                                                                                                        to
                                                                                                                                        Favourite</span>
                                                                                                                                </div>
                                                                                                                            </a><?php }else{ ?>
                                                                                                                            <a data-target="#sign-up"
                                                                                                                                data-toggle="modal"
                                                                                                                                href="#sign-up"
                                                                                                                                class="favourite wp-rem-open-signin-tab"><i
                                                                                                                                    class="icon-heart-o"></i>
                                                                                                                                <div
                                                                                                                                    class="option-content">
                                                                                                                                    <span>Add
                                                                                                                                        to
                                                                                                                                        Favourite</span>
                                                                                                                                </div>
                                                                                                                            </a>
                                                                                                                            <?php } ?>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </li>
                                                                                                                <li
                                                                                                                    class="property-video-opt">
                                                                                                                    <div
                                                                                                                        class="option-holder">
                                                                                                                        <a class="property-video-btn"
                                                                                                                            target="_BLANK"
                                                                                                                            href="<?php echo $property->video_name; ?>">
                                                                                                                            <i
                                                                                                                                class="icon-film3"></i>
                                                                                                                            <div
                                                                                                                                class="option-content">
                                                                                                                                <span>Video</span>
                                                                                                                            </div>
                                                                                                                        </a>
                                                                                                                    </div>
                                                                                                                </li>
                                                                                                                <li
                                                                                                                    class="property-photo-opt">
                                                                                                                    <div
                                                                                                                        class="option-holder">
                                                                                                                        <a href="javascript:void(0);"
                                                                                                                            onclick="view_property_gallery_images(<?php echo $property->post_id; ?>);"
                                                                                                                            class="rem-pretty-photos">
                                                                                                                            <i
                                                                                                                                class="icon-camera6"></i><span
                                                                                                                                class="capture-count"><?php echo ($property->image_name != '') ? (($property->images != '') ? (count(explode(';',$property->images))+1) : 1) : (($property->images != '') ? (count(explode(';',$property->images))) : 0); ?></span>
                                                                                                                            <div
                                                                                                                                class="option-content">
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
                                                                                        $property_title = @$property->details->room.' BHK '.@$property->details->buildup_area.' '.$property->details->buildup_area_Unit.' '.$propertyResidential.' On '.$property->rent_sell.' at '.$property->city;
                                                                                    }elseif($residential == 'PentHouse'){
                                                                                    //Pent House
                                                                                        $property_title = @$property->details->pent_room.' BHK '.@$property->details->pent_buildup_area.' '.@$property->details->pent_buildup_area_Unit.' '.$propertyResidential.' On '.$property->rent_sell.' at '.$property->city;
                                                                                    }elseif($residential == 'Factory'){
                                                                                        //Factory Rent
                                                                                        $property_title = @$property->details->factory_BuildupArea.' '.@$property->details->factory_BuildupAreaUnit.' '.$propertyResidential.' On '.$property->rent_sell.' at '.$property->city;
                                                                                    }elseif($residential == 'Flat'){
                                                                                        //Flat Rent
                                                                                        $property_title = @$property->details->flat_Room.' BHK '.@$property->details->flat_BuildupArea.' '.$property->details->flat_BuildupArea_Unit.' '.$propertyResidential.' On '.$property->rent_sell.' at '.$property->city;
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
                                                                                                    <div
                                                                                                        class="post-title">
                                                                                                        <h4><a
                                                                                                                href="<?php echo base_url(); ?>home/see_details/property/<?php echo $property->post_id; ?>"><?php echo substr($property_title, 0, 90); ?></a>
                                                                                                        </h4>
                                                                                                    </div>
                                                                                                    <ul
                                                                                                        class="property-location">
                                                                                                        <li><i
                                                                                                                class="icon-location-pin2"></i><span><?php echo $property->location; ?></span>
                                                                                                        </li>
                                                                                                    </ul>
                                                                                                </div>
                                                                                                <div class="col-md-12">
                                                                                                    <span
                                                                                                        class="property-price">
                                                                                                        <span
                                                                                                            content="250">₹.<?php echo number_format($property->net_amount,2); ?></span>
                                                                                                        <span
                                                                                                            class="prop-price-type">
                                                                                                            <span
                                                                                                                class="guid-price"></span>
                                                                                                        </span>
                                                                                                    </span>
                                                                                                    <br>
                                                                                                    <a href="<?php echo base_url(); ?>home/see_details/property/<?php echo $property->post_id; ?>"
                                                                                                        class="btn custom-btn btn-details">See
                                                                                                        Details</a>
                                                                                                    <?php if(!empty($this->session->userdata('user'))){ ?>
                                                                                                        <a class="get-it-on-wp-home" href="<?php echo base_url('home/get_details_on_whatsapp/'. $property->post_id);?>">Get details on <img src="<?php echo base_url('assets/front/img/WhatsApp.svg.webp');?>"></a>
                                                                                                    <?php } else{?>
                                                                                                        <a class="get-it-on-wp-home" href="javascript:void(0);" onclick="openLoginModal('<?php echo $property->post_id; ?>', '<?php echo $property->rent_sell; ?>')">Get details on <img src="<?php echo base_url('assets/front/img/WhatsApp.svg.webp');?>"></a>
                                                                                                    <?php }?>
                                                                                                    <div
                                                                                                        class="post-category-list">
                                                                                                        <p><span
                                                                                                                style="color:#000">Marketed
                                                                                                                By</span>
                                                                                                            <?php echo substr($property->posted_user_type, 0, 30); ?>
                                                                                                            <?php echo substr($property->posted_user_name, 0, 30); ?>
                                                                                                        </p>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <?php } ?>



                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <!--Wp-rem Element End-->
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end section row -->
                                </div>
                            </div>
                            <div class="btn-section-view-more received-enquiries-viewings-holder" style="float:right;">
                                <a href="<?php echo base_url(); ?>home/find_property/sell" class="outline-btn-blue"><i
                                        class="fa fa-eye"></i> View More Propeties</a>
                            </div>
                        </div>
                        <!-- End Container Start -->
                    </div>
                    <?php } ?>

 

                    <?php if(!empty($list_rent_property)){?>
                    <div class="page-section-index" id="rent_property_div">
                        <!-- Container Start -->
                        <div class="container ">
                            <div class="row">
                                <div class="section-fullwidth col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
                                            <div class="wp-rem-property-content">
                                                <div class="dev-map-class-changer">
                                                    <div id="Property-content-78155">
                                                        <script>
                                                        jQuery(document).ready(function() {
                                                            jQuery(
                                                                    "a.property-video-btn[data-rel^='prettyPhoto']")
                                                                .prettyPhoto({
                                                                    animation_speed: "fast",
                                                                    slideshow: 10000,
                                                                    hideflash: true,
                                                                    autoplay: true,
                                                                    autoplay_slideshow: false
                                                                });
                                                            var _this_list_view = 'grid-classic';
                                                            var _element_property_footer = 'no';
                                                        });
                                                        </script>
                                                        <form>
                                                            <div class="row">
                                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                    <div
                                                                        class="real-estate-property-content real-estate-dev-property-content">
                                                                        <div class="row">
                                                                            <div
                                                                                class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                                <div class="element-title align-center">
                                                                                    <h2 class="zigzag">Property For Rent
                                                                                    </h2>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="slide-loader-holder"></div>
                                                                        <div class="real-estate-property">
                                                                            <div class="row">
                                                                                <div
                                                                                    class="col-md-12 owl-carousel owl-theme owl-carousel1">
                                                                                    <?php foreach($list_rent_property as $property){?>
                                                                                    <div class="property-row item">
                                                                                        <div class="property-grid classic"
                                                                                            style="min-height:399px;">
                                                                                            <div
                                                                                                class="img-holder image-loaded">
                                                                                                <figure>
                                                                                                    <?php if($property->image_name == ''){ ?>
                                                                                                    <a
                                                                                                        href="<?php echo base_url(); ?>home/see_details/property/<?php echo $property->post_id; ?>">
                                                                                                        <img class="img-grid"
                                                                                                            src="<?php echo base_url();?>assets/front/extra-images/property-grid-image-2.webp"
                                                                                                            alt="#">
                                                                                                    </a>
                                                                                                    <?php }else{ ?>
                                                                                                    <a
                                                                                                        href="<?php echo base_url(); ?>home/see_details/property/<?php echo $property->post_id; ?>">
                                                                                                        <img class="img-grid"
                                                                                                            src="<?php echo base_url();?><?php echo $property->image_name; ?>"
                                                                                                            alt="#">
                                                                                                    </a>
                                                                                                    <?php } ?>
                                                                                                    <!--<figcaption> <span class="featured"><?php echo $property->subscription; ?></span>-->
                                                                                                    <?php  if($property->is_show == 1){ ?>
                                                                                                    <figcaption> <span
                                                                                                            class="featured"><?php echo "Verified"; ?></span>
                                                                                                        <?php } ?>
                                                                                                        <div
                                                                                                            class="caption-inner">
                                                                                                            <ul
                                                                                                                class="rem-property-options">
                                                                                                                <li
                                                                                                                    class="property-like-opt">
                                                                                                                    <div
                                                                                                                        class="option-holder">
                                                                                                                        <div
                                                                                                                            class="like-btn">
                                                                                                                            <?php if(!empty($this->session->userdata('user'))){ ?>
                                                                                                                            <a href="<?php echo base_url(); ?>home/add_property_to_favorite/<?php echo $property->post_id;?>"
                                                                                                                                class="favourite wp-rem-open-signin-tab">
                                                                                                                                <i
                                                                                                                                    class="icon-heart-o"></i>
                                                                                                                                <div
                                                                                                                                    class="option-content">
                                                                                                                                    <span>Add
                                                                                                                                        to
                                                                                                                                        Favourite</span>
                                                                                                                                </div>
                                                                                                                            </a>
                                                                                                                            <?php }else{ ?>
                                                                                                                            <a data-target="#sign-up"
                                                                                                                                data-toggle="modal"
                                                                                                                                href="#sign-up"
                                                                                                                                class="favourite wp-rem-open-signin-tab">
                                                                                                                                <i
                                                                                                                                    class="icon-heart-o"></i>
                                                                                                                                <div
                                                                                                                                    class="option-content">
                                                                                                                                    <span>Add
                                                                                                                                        to
                                                                                                                                        Favourite</span>
                                                                                                                                </div>
                                                                                                                            </a>
                                                                                                                            <?php } ?>

                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </li>
                                                                                                                <li
                                                                                                                    class="property-video-opt">
                                                                                                                    <div
                                                                                                                        class="option-holder">
                                                                                                                        <a class="property-video-btn"
                                                                                                                            target="_BLANK"
                                                                                                                            href="<?php echo $property->video_name; ?>">
                                                                                                                            <i
                                                                                                                                class="icon-film3"></i>
                                                                                                                            <div
                                                                                                                                class="option-content">
                                                                                                                                <span>Video</span>
                                                                                                                            </div>
                                                                                                                        </a>
                                                                                                                    </div>
                                                                                                                </li>
                                                                                                                <li
                                                                                                                    class="property-photo-opt">
                                                                                                                    <div
                                                                                                                        class="option-holder">
                                                                                                                        <a href="javascript:void(0);"
                                                                                                                            onclick="view_property_gallery_images(<?php echo $property->post_id; ?>);"
                                                                                                                            class="rem-pretty-photos">
                                                                                                                            <i
                                                                                                                                class="icon-camera6"></i><span
                                                                                                                                class="capture-count"><?php echo ($property->image_name != '') ? (($property->images != '') ? (count(explode(';',$property->images))+1) : 1) : (($property->images != '') ? (count(explode(';',$property->images))) : 0); ?></span>
                                                                                                                            <div
                                                                                                                                class="option-content">
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
                                                                                                    <div
                                                                                                        class="post-title">
                                                                                                        <?php if($property->residential == 'HouseorBanglow'){ $propertyResidential= 'House / Banglow';}elseif($property->residential== 'ShopOrShowroom'){  $propertyResidential= 'Shop / Showroom'; }elseif($property->residential== 'DuplexFlat'){  $propertyResidential= 'PG/Co-Living'; }elseif($property->residential== 'PentHouse'){  $propertyResidential= 'Pent House'; }else{  $propertyResidential= $property->residential; }; ?>
                                                                                                        <?php


if($residential == 'DuplexFlat'){
    //Duplex Flat
    $property_title = @$property->details->room.' BHK '.$property->details->buildup_area.' '.$property->details->buildup_area_Unit.' '.$propertyResidential.' On '.$property->rent_sell.' at '.$property->city;
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
    $property_title = @$property->details->landCoveredArea.' '.@$property->details->landCoveredAreaUnit.' '.$propertyResidential.' On '.$property->rent_sell.' at '.$property->city;
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
                                                                                                        <h4><a
                                                                                                                href="<?php echo base_url(); ?>home/see_details/property/<?php echo $property->post_id; ?>"><?php echo substr($property_title, 0,90); ?></a>
                                                                                                        </h4>
                                                                                                    </div>
                                                                                                    <ul
                                                                                                        class="property-location">
                                                                                                        <li><i
                                                                                                                class="icon-location-pin2"></i><span><span><?php echo $property->location; ?>
                                                                                                                </span>
                                                                                                        </li>
                                                                                                    </ul>
                                                                                                </div>
                                                                                                <div class="col-md-12">
                                                                                                    <span
                                                                                                        class="property-price">
                                                                                                        <span
                                                                                                            content="250">₹.<?php echo number_format($property->rentPerMonth,2); ?></span>
                                                                                                        <span
                                                                                                            class="prop-price-type"
                                                                                                            style="margin-left:0px;">
                                                                                                            <span
                                                                                                                class="guid-price">/Month</span>
                                                                                                        </span>
                                                                                                    </span><br>
                                                                                                    <a href="<?php echo base_url(); ?>home/see_details/property/<?php echo $property->post_id; ?>"
                                                                                                        class="btn custom-btn btn-details">See
                                                                                                        Details</a>
                                                                                                    <?php if(!empty($this->session->userdata('user'))){ ?>
                                                                                                    <a class="get-it-on-wp-home" href="<?php echo base_url('home/get_details_on_whatsapp/'. $property->post_id);?>">Get
                                                                                                        details on <img src="<?php echo base_url('assets/front/img/WhatsApp.svg.webp');?>"></a>
                                                                                                    <?php } else{?>
                                                                                                        <a class="get-it-on-wp-home" href="javascript:void(0);" onclick="openLoginModal('<?php echo $property->post_id; ?>', '<?php echo $property->rent_sell; ?>')">Get detail <img src="<?php echo base_url('assets/front/img/WhatsApp.svg.webp');?>"></a>
                                                                                                    <?php }?>

                                                                                                    <div
                                                                                                        class="post-category-list">
                                                                                                        <p><span
                                                                                                                style="color:#000">Marketed
                                                                                                                By</span>
                                                                                                            <?php echo substr($property->posted_user_type, 0, 30); ?>
                                                                                                            <?php echo substr($property->posted_user_name, 0, 30); ?>
                                                                                                        </p>
                                                                                                    </div>
                                                                                                </div>

                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <?php } ?>





                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <!--Wp-rem Element End-->
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end section row -->
                                </div>
                            </div>
                            <div class="btn-section-view-more received-enquiries-viewings-holder" style="float:right;">
                                <a href="<?php echo base_url(); ?>home/find_property/rent" class="outline-btn-blue"><i
                                        class="fa fa-eye"></i> View More Propeties</a>
                            </div>
                        </div>
                        <!-- End Container Start -->
                    </div>

                    <?php } ?>


                    <div class="gradient-bg ptb-90">
                        <!-- Container Start -->
                        <div class="container ">
                            <div class="row">
                                <div class="section-fullwidth col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 ">

                                            <div class="element-title align-center ">
                                                <h2>Get in Touch</h2>
                                                <p>Feel free to call, send us an email or simply complete tn enquiry
                                                    form.</p>
                                            </div>

                                            <div class="smart-wrap pb-40">
                                                <!--<form class="smart-forms smart-container" method="post" action="<?php echo base_url(); ?>home/get_in_touch">                         -->
                                                <form class="smart-forms smart-container" method="post"
                                                    id="get_in_touch" name="get_in_touch"
                                                    action="<?php echo base_url(); ?>home/get_in_touch">


                                                    <div class="colm colm12">

                                                        <div class="frm-row2">
                                                            <div class="colm1 colm6">
                                                                <div class="section">
                                                                    <label class="field prepend-icon">
                                                                        <input type="number" name="phone" id="phone"
                                                                            class="gui-input" placeholder="Mobile No">
                                                                        <span class="field-icon"><i
                                                                                class="fa fa-phone-square"></i></span>
                                                                    </label>
                                                                </div><!-- end section -->
                                                            </div>
                                                            <div class="colm2 colm6">
                                                                <div class="section">
                                                                    <label class="field prepend-icon">
                                                                        <input type="text" name="email" id="email"
                                                                            class="gui-input" placeholder="Email ID">
                                                                        <span class="field-icon"><i
                                                                                class="fa fa-envelope"></i></span>
                                                                    </label>
                                                                </div><!-- end section -->
                                                            </div>
                                                        </div>
                                                        <div class="section">
                                                            <label class="field prepend-icon">
                                                                <textarea class="gui-textarea" id="message"
                                                                    name="message"
                                                                    placeholder="Enter Your Message here"></textarea>
                                                                <span class="field-icon"><i
                                                                        class="fa fa-comments"></i></span>
                                                            </label>
                                                        </div>
                                                        <!-- end section -->
                                                        <div class="section">
                                                            <div class="btn-section-view-more">
                                                                <input class="btn-red" type="submit"
                                                                    value="Send A message">
                                                            </div>
                                                        </div>
                                                    </div><!-- end .colm12 section -->

                                                </form><!-- end .smart-forms section -->
                                            </div><!-- end .smart-wrap section -->

                                        </div>


                                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                            <div class="testimonial-holder classic">
                                                <div class="text-holder">
                                                    <div class="swiper-container">

                                                        <div class="element-title align-center ">
                                                            <h2>What Client Say</h2>
                                                            <p>WhyBroker has the largest inventory of apartments in the
                                                                India.</p>
                                                        </div>

                                                        <div class="swiper-wrapper">
                                                            <?php if(!empty($list_testimonials)){ ?>
                                                            <?php foreach($list_testimonials as $row){ ?>
                                                            <div class="swiper-slide">
                                                                <p><i
                                                                        class="icon-quotes-left"></i><?php echo $row->desc; ?>
                                                                </p>
                                                                <div class="author-info classic">
                                                                    <div class="img-holder">
                                                                        <figure> <img
                                                                                src="<?php echo base_url();?><?php echo $row->img; ?>"
                                                                                alt="img"> </figure>
                                                                    </div>
                                                                    <div class="text-holder">
                                                                        <h6><?php echo $row->by; ?></h6>
                                                                        <span><?php echo $row->type; ?></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <?php } ?>
                                                            <?php } ?>

                                                            <!------------
                                                    <div class="swiper-slide swiper-slide-active">
                                                        <p><i class="icon-quotes-left"></i>After I dropped out of college at the age of 19, I became a mortgage broker, and when I went back to school I thought about going into real estate law. I probably would have made a lot more money and died of boredom by now. </p>
                                                        <div class="author-info classic">
                                                            <div class="img-holder">
                                                                <figure> <img src="<?php echo base_url();?>assets/front/extra-images/testimonial-thumbnail4.webp" alt="img"> </figure>
                                                            </div>
                                                            <div class="text-holder">
                                                                <h6>Nabil Ansari</h6><span>Blogger</span> </div>
                                                        </div>
                                                    </div>
                                                    <div class="swiper-slide">
                                                        <p><i class="icon-quotes-left"></i>After I dropped out of college at the age of 19, I became a mortgage broker, and when I went back to school I thought about going into real estate law. I probably would have made a lot more money and died of boredom by now. </p>
                                                        <div class="author-info classic">
                                                            <div class="img-holder">
                                                                <figure> <img src="<?php echo base_url();?>assets/front/extra-images/testimonial-thumbnail3.webp" alt="img"> </figure>
                                                            </div>
                                                            <div class="text-holder">
                                                                <h6>Nabil Ansari</h6><span>Blogger</span> </div>
                                                        </div>
                                                    </div>
                                                    --------------->
                                                        </div>
                                                        <!-- end swiper-wrapper-->
                                                    </div>
                                                    <!-- end swiper-containe-->
                                                </div>
                                                <!-- end testimonial-slider-->
                                            </div>
                                            <!-- end testimonial-slider-->
                                        </div>
                                    </div>
                                    <!-- end section row -->
                                </div>
                            </div>
                        </div>
                        <!-- End Container Start -->
                    </div>

                </div>
            </div>
        </div>
    </div>