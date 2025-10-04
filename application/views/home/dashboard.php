<script>
    $(document).ready(function(){
    $( "#wp_rem_property_category" ).change(function() {

        var value = $(this).val();
        $("#property_type_fields_4090").hide(500);
        if(value==0)
            $("#property_type_fields_4090").hide(500);
        else
            $("#property_type_fields_4090").show(500);
    });
    });    
</script>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script> 

<div class="wrapper wrapper-full_width">
    <div id="overlay"></div>

    <?php if($this->session->userdata('user')['usertype'] != 'lead_partner'){ ?>
        <div class="main-section">
            <div class="page-section account-header">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 dashboard-sidebar-panel">
                            <div class="dashboard-nav-panel">
                                <!--<button class="dashboard-nav-btn navbar-toggle"><i class="icon-dashboard"></i></button>-->
                                <div class="user-account-holder">
                                    <div class="user-info user-info-sidebar">
                                        <div class="img-holder">
                                            <figure>
                                                <?php if($user_details->profile == ''){ ?>
                                                 <img src="<?php echo base_url(); ?>assets/front/img/default-img.jpg" alt="#"> 
                                                <?php }else{ ?>
                                                <img src="<?php echo base_url(); ?><?php echo $user_details->profile; ?>">
                                                <?php } ?>
                                            </figure>
                                        </div>
                                        <div class="text-holder">
                                            <h3 class="user-full-name">My <span>Account</span></h3>
                                            <!--- <a class="btn-change-password" href="#">Change Password</a> ---->
                                        </div>
                                    </div>
                                </div>
                                <div class="user-account-nav user-account-sidebar">
                                    <div class="user-account-holder navbar-collapse">
                                        <ul class="dashboard-nav nav nav-tabs">
                                            <li class="active"><a data-toggle="tab" href="#my-profile"><i class="fa fa-user-circle-o"></i> My Profile</a></li>
                                            <li><a data-toggle="tab" href="#update-profile"><i class="fa fa-pencil-square-o"></i> Update Profile<?php //echo $this->session->userdata('user')['usertype']; ?></a></li>
                                            <li><a data-toggle="tab" href="#change-password"><i class="fa fa-key"></i> Change Password</a></li>

                                            <li class="drop1">
                                                <a href="javascript:(void)"  id="drop1"><i class="fa fa-building-o"></i> My Properties<i class="fa fa-angle-down" style="float: right;margin-top: 9px;"></i></a>
                                                <ul class="drop2" id="drop2">
                                                    <li><a data-toggle="tab" href="#my-properties"><i class="fa fa-long-arrow-right" aria-hidden="true"></i> Manage Properties</a></li>
                                                    <li><a  href="<?php echo base_url(); ?>/home/post_property"><i class="fa fa-long-arrow-right" aria-hidden="true"></i> Post Properties</a></li>
                                                </ul>
                                            </li>
                                            <?php //if($this->session->userdata('user')['usertype'] != 'Owner'){ ?>
                                            <?php if($user_details->usertype != 'Owner'){ ?>
                                            <li class="drop2">
                                                <a href="javascript:(void)" id="drop3"><i class="fa fa-address-card-o"></i> My Projects <?php //echo $this->session->userdata('user')['usertype']; ?><i class="fa fa-angle-down" style="float: right;margin-top: 9px;"></i></a>
                                                <ul class="drop2" id="drop4">
                                                    <li><a data-toggle="tab" href="#my-projects"><i class="fa fa-long-arrow-right" aria-hidden="true"></i> Manage Projects</a></li>
                                                    <li><a href="<?php echo base_url(); ?>/home/post_project"><i class="fa fa-long-arrow-right" aria-hidden="true"></i> Post Projects</a></li>
                                                </ul>
                                            </li>
                                            <?php } ?>
                             
                                            <li><a data-toggle="tab" href="#my-favourite"><i class="fa fa-heart-o"></i> My Favourite</a><b class="label count-enquiries"><?php echo (count($list_my_favourite_property) + count($list_my_favourite_project)); ?></b></li>
                                            <li><a data-toggle="tab" href="#subscription"><i class="fa fa-bell-o"></i> subscription</a></li>
                                            <li><a href="<?php echo base_url(); ?>home/logout"><i class="icon-log-out"></i>Logout</a></li>

                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                            <div class="user-account-holder loader-holder">
                                <div class="user-holder">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="tab-content">
                                            <div id="my-profile" class="user-profile tab-pane fade in active">
                                                <div class="element-title has-border">
                                                    <h4>PROFILE DETAILS</h4>
                                                    <p>Welcome back <strong>"<?php echo $user_details->name; ?>"</strong> <br
                                                        >Below are the most current versions of your personal details. Please edit if you need to make any changes. Thankyou</p>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12">
                                                            <div class="row">
                                                                <table class="user-profile-dashboard-table">
                                                                    <tbody>
                                                                        <tr>
                                                                            <th><i class="fa fa-user-circle"></i> Name:</th>
                                                                            <td><?php echo $user_details->name; ?></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th><i class="fa fa-info-circle"></i> User Details:</th>
                                                                            <td><?php echo $user_details->usertype; ?></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th><i class="fa fa-envelope-open"></i> Email Id:</th>
                                                                            <td><?php echo $user_details->email; ?></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th><i class="fa fa-globe"></i> Website:</th>
                                                                            <td><?php echo $user_details->website; ?></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th><i class="fa fa-briefcase"></i> Compay Name:</th>
                                                                            <td><?php echo $user_details->company_name; ?></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th><i class="fa fa-address-book"></i> Full Address:</th>
                                                                            <td><?php echo $user_details->address; ?></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th><i class="fa fa-map-pin"></i> Pincode:</th>
                                                                            <td><?php echo $user_details->pincode; ?></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th><i class="fa fa-map-marker"></i> Area:</th>
                                                                            <td><?php echo $user_details->area; ?></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th><i class="fa fa-thumb-tack"></i> Landmark:</th>
                                                                            <td><?php echo $user_details->landmark; ?></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th><i class="fa fa-map-marker"></i> Country:</th>
                                                                            <td><?php echo $user_details->country; ?></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th><i class="fa fa-map-marker"></i> State:</th>
                                                                            <td><?php echo $user_details->state; ?></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th><i class="fa fa-map-marker"></i> City:</th>
                                                                            <td><?php echo $user_details->city; ?></td>
                                                                        </tr>

                                                                    </tbody>
                                                                </table>

                                                            </div>
                                                        </div>
                                                        <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                                                            <div class="user-profile-images">
                                                                <div class="current-img">
                                                                    <div class="avatar-upload">
                                                                        <!--- <div class="avatar-edit">
                                                                        <input type='file' id="imageUpload" accept=".png, .jpg, .jpeg" />
                                                                        <label for="imageUpload"></label>
                                                                    </div> -->
                                                                    <div class="avatar-preview">
                                                                        <div id="imagePreview">
                                                                            <?php if($user_details->profile == ''){ ?>
                                                                             <img src="<?php echo base_url(); ?>assets/front/img/default-img.jpg"> 
                                                                            <?php }else{ ?>
                                                                            <img src="<?php echo base_url(); ?><?php echo $user_details->profile; ?>">
                                                                            <?php } ?>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <table class="user-profile-dashboard-table about mt-20">
                                                                    <tbody>
                                                                        <tr>
                                                                            <th><i class="fa fa-user"></i> Member Since:</th>
                                                                            <td><?php echo date('d M, Y', strtotime($user_details->created)); ?></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th><i class="fa fa-mobile"></i> Contact No:</th>
                                                                            <td>+91 <?php echo $user_details->phone; ?></td>
                                                                        </tr>
                                                                        <!--<tr>-->
                                                                        <!--    <th><i class="fa fa-phone"></i> Landline No:</th>-->
                                                                        <!--    <td><?php echo $user_details->landline; ?></td>-->
                                                                        <!--</tr>-->
                                                                    </tbody>
                                                            </table>
                                                            <div class="active-area mb-15">
                                                                <b class="text-area" style="color: #000000;font-weight: 600;margin-right: 20px;">Status: <span>Active <i class="fa fa-dot-circle-o" aria-hidden="true"></i></span></b>
                                                            </div>
                                                            <p class="mt-20"><?php echo $user_details->about_us; ?></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="update-profile" class="user-profile tab-pane fade">
                                                <div class="element-title has-border">
                                                    <h4>UPDATE PROFILE</h4>
                                                    <p>Welcome back <strong>"<?php echo $user_details->name; ?>"</strong> <br
                                                        >Below are the most current versions of your personal details. Please edit if you need to make any changes. Thankyou</p>
                                                </div>
                                                <div class="row">
                                                    <form method="post" enctype="multipart/form-data" accept-charset="utf-8" action="<?php echo base_url(); ?>home/update_user_profile">
                                                        <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12">
                                                            <div class="row">
                                                                <table class="user-profile-dashboard-table">
                                                                    <tbody>
                                                                        <tr>
                                                                            <th><i class="fa fa-user-circle"></i> Name:</th>
                                                                            <td><input type="text" name="name" id="name" placeholder="" <?php if ($user_details->name != "" ) { echo "readonly"; }?> value="<?php echo $user_details->name; ?>"></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th><i class="fa fa-info-circle"></i> User Details:</th>
                                                                            <td>
                                                                                <div class="smart-wrap">
                                                                                    <div class="smart-forms smart-container">                         
                                                                                        <div class="section">
                                                                                            <div class="option-group field">
                                                                                                <div class="smart-option-group">                        
                                                                                                    <label for="Agent" class="option">
                                                                                                        <input type="radio" id="Agent" value="Agent" name="usertype" <?php if($user_details->usertype == 'Agent'){ echo 'checked'; }?>  >
                                                                                                        <span class="smart-option smart-radio">
                                                                                                            <span class="smart-option-ui"> <i class="iconc"></i>  Tenant</span> 
                                                                                                        </span>                                      
                                                                                                    </label>
                                                                                                    <label for="Builder" class="option">
                                                                                                        <input type="radio" id="Builder" value="Builder" name="usertype" <?php if($user_details->usertype == 'Builder'){ echo 'checked'; }?> >
                                                                                                        <span class="smart-option smart-radio">
                                                                                                            <span class="smart-option-ui"> <i class="iconc"></i>  Builder</span>                   
                                                                                                        </span>                                      
                                                                                                    </label>
                                                                                                    <label for="Owner" class="option">
                                                                                                        <input type="radio" id="Owner" value="Owner" name="usertype" <?php if($user_details->usertype == 'Owner'){ echo 'checked'; }?> >
                                                                                                        <span class="smart-option smart-radio">
                                                                                                            <span class="smart-option-ui"> <i class="iconc"></i>  Owner</span>                  
                                                                                                        </span>                                      
                                                                                                    </label>       
                                                                                                </div>                        
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th><i class="fa fa-envelope-open"></i> Email Id:</th>
                                                                            <td><input type="text" name="email" id="email" placeholder="" <?php if ($user_details->email != "" ) { echo "readonly"; }?> value="<?php echo $user_details->email; ?>"></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th><i class="fa fa-globe"></i> Website:</th>
                                                                            <td><input type="text" name="website" id="website" placeholder="" value="<?php echo $user_details->website; ?>"></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th><i class="fa fa-briefcase"></i> Company Name:</th>
                                                                            <td><input type="text" name="company_name" id="company_name" placeholder="" value="<?php echo $user_details->company_name; ?>"></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th><i class="fa fa-address-book"></i> Full Address:</th>
                                                                            <td><input type="text" name="address" id="address" placeholder="" value="<?php echo $user_details->address; ?>"></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th><i class="fa fa-map-pin"></i> Pincode:</th>
                                                                            <td><input type="number" name="pincode" id="pincode" pattern="" placeholder="" value="<?php echo $user_details->pincode; ?>"></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th><i class="fa fa-map-marker"></i> Area:</th>
                                                                            <td><input type="text" name="area" id="area" placeholder="" value="<?php echo $user_details->area; ?>"></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th><i class="fa fa-thumb-tack"></i> Landmark:</th>
                                                                            <td><input type="text" name="landmark" id="landmark" placeholder="" value="<?php echo $user_details->landmark; ?>"></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th><i class="fa fa-map-marker"></i> Country:</th>
                                                                            <td><input type="text" name="country" id="country" placeholder="" value="<?php echo $user_details->country; ?>"></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th><i class="fa fa-map-marker"></i> State:</th>
                                                                            <td><input type="text" name="state" id="state" placeholder="" value="<?php echo $user_details->state; ?>"></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th><i class="fa fa-map-marker"></i> City:</th>
                                                                            <td><input type="text" name="city" id="city" placeholder="" value="<?php echo $user_details->city; ?>"></td>
                                                                        </tr>

                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                                                            <div class="user-profile-images">
                                                                <div class="current-img">
                                                                    <div class="avatar-upload">
                                                                        <div class="avatar-edit">
                                                                            <input type='file' id="imageUpload" name="profile" accept=".png, .jpg, .jpeg" />
                                                                            <input type='hidden' id="prev_profile" name="prev_profile" value="<?php echo $user_details->profile; ?>" />
                                                                            <label for="imageUpload"></label>
                                                                        </div> 
                                                                        <div class="avatar-preview">
                                                                            <div id="imagePreview">
                                                                                <?php if($user_details->profile == ''){ ?>
                                                                                 <img src="<?php echo base_url(); ?>assets/front/img/default-img.jpg"> 
                                                                                <?php }else{ ?>
                                                                                <img src="<?php echo base_url(); ?><?php echo $user_details->profile; ?>">
                                                                                <?php } ?>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <table class="user-profile-dashboard-table about mt-30">
                                                                    <tbody>
                                                                        <tr>
                                                                            <th><i class="fa fa-mobile"></i> Contact No:</th>
                                                                            <td><input type="number" name="phone" id="phone" pattern="[1-10]{1}[0-10]{10}" readonly placeholder="" value="<?php echo $user_details->phone; ?>"></td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                                <p class="mt-30">
                                                                    <i class="fa fa-info-circle"></i><strong style="float:start;color:black;"> About Us:</strong>
                                                                    <textarea class="gui-textarea" id="about_us" name="about_us" placeholder="">
                                                                        <?php echo $user_details->about_us; ?>
                                                                    </textarea>
                                                                </p>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                            <div class="field-holder" style="text-align: center;">
                                                                <div class="btn-section-view-more pt-40">
                                                                    <button href="javascript:void(0);" type="submit" class="btn-blue">Save Profile</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>

                                            <div id="change-password" class="user-profile tab-pane fade">
                                                <div class="element-title has-border">
                                                    <h4>CHANGE PASSWORD</h4>
                                                    <p>Welcome back <strong>"<?php echo $user_details->name; ?>"</strong> <br
                                                    >Below are the most current versions of your personal details. Please edit if you need to make any changes. Thankyou</p>
                                                </div>
                                                <form name="change_user_password_form" id="change_user_password_form" method="post" enctype="multipart/form-data" accept-charset="utf-8" action="<?php echo base_url(); ?>home/change_user_password">
                                                    <div class="row">
                                                        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                                            <div class="intro-form">
                                                        <div class="form-group">
                                                            <input id="password" type="password" name="old_password" id="old_password" placeholder="Old Password" value="">
                                                            <i class="toggle-password fa fa-fw fa-eye-slash"></i>
                                                        </div>
                                                        <div class="form-group">
                                                            <input id="password" type="password" name="new_password" id="new_password" placeholder="New Password" value="">
                                                            <i class="toggle-password fa fa-fw fa-eye-slash"></i>
                                                        </div>
                                                        <div class="form-group">
                                                            <input id="password" type="password" name="confirm_password" id="confirm_password" placeholder="Confirm Password" value="">
                                                            <i class="toggle-password fa fa-fw fa-eye-slash"></i>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="field-holder" style="text-align: center;">
                                                            <div class="btn-section-view-more pt-40">
                                                                <button href="javascript:void(0);" type="submit" class="btn-blue">Change Password</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>

                                            <!-- my properties section -->                                              
                                            <div id="my-properties" class="user-profile tab-pane fade">
                                                <div class="user-account-holder loader-holder">
                                                    <div class="user-holder" style="padding: 0;border: 0;">
                                                        <div class="row">
                                                            <div class="col-md-12 col-xs-12">
                                                                <div class="smart-wrap pb-20">
                                                                    <div class="smart-forms smart-container">                         
                                                                        <div class="section">
                                                                            <div class="smart-widget sm-right smr-50">
                                                                                <label class="field">
                                                                                    <input type="text" name="sub" id="sub" class="gui-input" placeholder="Search by id" style="border-radius:0px;">
                                                                                </label>
                                                                                <button type="submit" class="button"> <i class="fa fa-search"></i> </button>
                                                                            </div><!-- end .smart-widget section --> 
                                                                        </div><!-- end section -->                                     
                                                                    </div><!-- end .smart-forms section -->
                                                                </div><!-- end .smart-wrap section -->
                                                            </div>
                                                            <div class="col-md-12 col-xs-12"> 
                                                                <div class="btn-section-view-more pb-20" style="float: right !important;">
                                                                    <a href="<?php echo base_url('home/post_property'); ?>" class="outline-btn-blue">Post New</a>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                <div class="user-property">
                                                                    <div class="element-title right-filters-row" style="margin-bottom: 0 !important;">
                                                                            <?php $activeCount = 0; ?>
                                                                            <?php $expiredCount = 0; ?>
                                                                            <?php $pendingCount = 0; ?>
                                                                            <?php $rejectedCount = 0; ?>
                                                                            <?php foreach($list_post_property as $r){ ?>
                                                                            <?php if($r->status==1) $activeCount++;
                                                                                  if($r->status==3) $expiredCount++;
                                                                                  if($r->status==0) $pendingCount++;
                                                                                  if($r->status==2) $rejectedCount++;
                                                                            ?>
                                                                            <?php } ?>
                                                                        <div class="right-filters row pull-right" style="max-width: 100%;">
                                                                            <div class="col-md-12" style="padding: 0;">
                                                                                <ul class="nav nav-tabs property-tab-pills" style="margin-left: -4px;">
                                                                                    <li class="active"><a data-toggle="tab" href="#active">Active(<?php echo $activeCount; ?>)</a></li>
                                                                                    <li><a data-toggle="tab" href="#expired">Expired(<?php echo $expiredCount; ?>)</a></li>
                                                                                    <li><a data-toggle="tab" href="#pending">Pending(<?php echo $pendingCount; ?>)</a></li>
                                                                                    <li><a data-toggle="tab" href="#rejected">Rejected(<?php echo $rejectedCount; ?>)</a></li>
                                                                                </ul>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="tab-content" style="margin-right: -4px;">
                                                                        <div id="active" class="col-lg-12 col-md-12 col-sm-12 col-xs-12 property tab-pane fade in active" >
                                                                            <div class="user-list">
                                                                                <?php if(!empty($list_post_property)){ ?>
                                                                                <div class="row" style="padding-bottom: 20px;">
                                                                                    <div class="col-md-8">
                                                                                        <h4 style="margin:5px 0px 0px;">Property Lead</h4>
                                                                                    </div>
                                                                                </div>

                                                                                <ul class="panel-group">
                                                                                    <?php foreach($list_post_property as $post){ ?>
                                                                                    <?php if($post->status== 1){ ?>
                                                                                    <li>
                                                                                        <div class="panel panel-default">
                                                                                            <div class="panel-heading">
                                                                                                <div class="img-holder holder11">
                                                                                                    <div class="col-md-3">
                                                                                                        <figure>
                                                                                                            <img src="<?php echo base_url(); ?><?php echo $post->image_name; ?> " alt="#"> 
                                                                                                        </figure>
                                                                                                    </div>
                                                                                                    <div class="col-md-4">
                                                                                                        <div class="property-label-caption">
                                                                                                            <h6><a>Lead Id : </a><?php echo $post->lead_id; ?> </h6>
                                                                                                            <table class="user-profile-dashboard-table2">
                                                                                                                <tbody>
                                                                                                                    <tr>
                                                                                                                        <th>
                                                                                                                            <?php if($post == 'DuplexFlat'){ ?>
                                                                                                                            PG/Co-Living
                                                                                                                            <?php } elseif($post == 'Factory'){ ?>
                                                                                                                            Factory
                                                                                                                            <?php } elseif($post == 'Flat'){ ?>
                                                                                                                            Flat
                                                                                                                            <?php } elseif($post == 'HouseorBanglow'){ ?>
                                                                                                                            House Or Banglow
                                                                                                                            <?php } elseif($post == 'Land'){ ?>
                                                                                                                            Land
                                                                                                                            <?php } elseif($post == 'Office'){ ?>
                                                                                                                            Office
                                                                                                                            <?php } elseif($post == 'PentHouse'){ ?>
                                                                                                                            Pent House
                                                                                                                            <?php } elseif($post == 'ShopOrShowroom'){ ?>
                                                                                                                            Shop Or Showroom
                                                                                                                            <?php } elseif($post == 'Warehouse'){ ?>
                                                                                                                            Warehouse
                                                                                                                            <?php }  ?>
                                                                                                                        </th>
                                                                                                                    </tr>
                                                                                                                    <tr>
                                                                                                                        <th>
                                                                                                                            <?php if($post == 'DuplexFlat'){ ?>
                                                                                                                            <?php echo $post->list_duplex_flat['0']->buildup_area.' '.$post->list_duplex_flat['0']->buildup_area_Unit; ?>
                                                                                                                            <?php } elseif($post == 'Factory'){ ?>
                                                                                                                            <?php echo $post->list_factory['0']->factory_BuildupArea.' '.$post->list_factory['0']->factory_BuildupAreaUnit; ?>
                                                                                                                            <?php } elseif($post == 'Flat'){ ?>
                                                                                                                            <?php echo $post->list_flat['0']->flat_BuildupArea.' '.$post->list_flat['0']->flat_BuildupArea_Unit; ?> 
                                                                                                                            <?php } elseif($post == 'HouseorBanglow'){ ?>
                                                                                                                            <?php echo $post->list_house['0']->house_BuildupArea.' '.$post->list_house['0']->house_BuildupAreaUnit; ?> 
                                                                                                                            <?php } elseif($post == 'Land'){ ?>
                                                                                                                            <?php echo $post->list_land['0']->LandArea.' '.$post->list_land['0']->land_SuperBuildupArea_Unit; ?>
                                                                                                                            <?php } elseif($post == 'Office'){ ?>
                                                                                                                            <?php echo $post->list_office['0']->officeBuildupArea.' '.$post->list_office['0']->officeBuildupAreaUnit; ?>
                                                                                                                            <?php } elseif($post == 'PentHouse'){ ?>
                                                                                                                            <?php echo $post->list_pent['0']->pent_buildup_area.' '.$post->list_pent['0']->pent_buildup_area_Unit; ?> 
                                                                                                                            <?php } elseif($post == 'ShopOrShowroom'){ ?>
                                                                                                                            <?php echo $post->list_shop['0']->shopBuildupArea.' '.$post->list_shop['0']->shopBuildupAreaUnit; ?>
                                                                                                                            <?php } elseif($post == 'Warehouse'){ ?>
                                                                                                                            <?php echo $post->list_warehouse['0']->warehouseBuildupArea.' '.$post->list_warehouse['0']->warehouseBuildupAreaUnit; ?> 
                                                                                                                            <?php }  ?>
                                                                                                                        </th>
                                                                                                                    </tr>
                                                                                                                    <tr>
                                                                                                                        <th>Furnished Status :  <?php echo $post->property_type['0']->FurnishedStatus; ?> </th>
                                                                                                                    </tr>
                                                                                                                    <tr>
                                                                                                                        <th>Rent : ₹. <?php echo $post->property_type['0']->rentPerMonth; ?>  </th>
                                                                                                                    </tr>
                                                                                                                    <tr>
                                                                                                                        <th><?php echo $post->city.', '.$post->state; ?> </th>
                                                                                                                    </tr>
                                                                                                                </tbody>
                                                                                                            </table>

                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="col-md-4">
                                                                                                        <div class="property-label-caption">
                                                                                                            <table class="user-profile-dashboard-table2">
                                                                                                                <tbody>
                                                                                                                    <tr>
                                                                                                                        <th>Posted : </th>
                                                                                                                        <td><?php echo date('d M Y', strtotime($post->created)); ?></td>
                                                                                                                    </tr>
                                                                                                                    <tr>
                                                                                                                        <th>Expire Date : </th>
                                                                                                                        <td><?php echo date('M d, Y', strtotime('+30 days',strtotime($post->created))) . PHP_EOL; ?></td>
                                                                                                                    </tr>
                                                                                                                </tbody>
                                                                                                            </table>

                                                                                                            <div class="received-enquiries-viewings-holder">
                                                                                                                <ul class="enquiries-viewings-links">
                                                                                                                    <li>
                                                                                                                        <a href="#">Detail Views</a>
                                                                                                                        <b class="count-received-enquiries">0</b>
                                                                                                                    </li>
                                                                                                                    <li>
                                                                                                                        <a href="#">Responses</a>
                                                                                                                        <b class="count-received-viewings">0</b>
                                                                                                                    </li>
                                                                                                                </ul>
                                                                                                            </div>
                                                                                                            <div class="received-enquiries-viewings-holder pt-10">
                                                                                                                <i class="fa fa-camera"></i>&nbsp; <?php echo count(explode(';', $post->images)); ?> Images upload out of 10
                                                                                                            </div>
                                                                                                            <span class="expire-date"> </span>
                                                                                                            <div class="sold-property-box">
                                                                                                                <span class="prop-sold"> </span>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="col-md-12 pt-5">
                                                                                                        <a href="<?php echo base_url(); ?>home/edit_property/<?php echo $post->post_id; ?>"><button type="button" class="btn btn-default"><i class="fa fa-pencil btn-icon"></i> Edit</button></a>
                                                                                                        <a href="<?php echo base_url(); ?>home/refresh_property/<?php echo $post->post_id; ?>"><button type="button" class="btn btn-default"><i class="fa fa-refresh btn-icon"></i> Refresh</button></a>
                                                                                                        <a href="<?php echo base_url(); ?>home/delete_property/<?php echo $post->post_id; ?>" onclick="return confirm('Do You want to delete this record?');"><button type="button" class="btn btn-default"><i class="fa fa-trash btn-icon"></i> Delete</button></a>
                                                                                                        <button type="button" class="btn outline-btn-default" onclick="view_property_images(<?php echo $post->post_id; ?> )"><i class="fa fa-picture-o btn-icon"></i> Add Modify Images</button>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            
                                                                                        </div>
                                                                                    </li>
                                                                                    <?php } ?>
                                                                                    <?php } ?>
                                                                                </ul>
                                                                                <?php } ?>
                                                                            </div>
                                                                        </div>

                                                                        <div id="expired" class="col-lg-12 col-md-12 col-sm-12 col-xs-12 property tab-pane fade" >
                                                                            <div class="user-list">
                                                                                <?php if(!empty($list_post_property)){ ?>
                                                                                <div class="row" style="padding-bottom: 20px;">
                                                                                    <div class="col-md-8">
                                                                                        <h4 style="margin:5px 0px 0px;">Property Lead</h4>
                                                                                    </div>
                                                                                </div>

                                                                                    <ul class="panel-group">
                                                                                        <?php foreach($list_post_property as $post){ ?>
                                                                                        <?php if($post->status== 3){ ?>
                                                                                        <li>
                                                                                            <div class="panel panel-default">
                                                                                                <div class="panel-heading">
                                                                                                    <div class="img-holder holder11">
                                                                                                        <div class="col-md-4">
                                                                                                            <figure>
                                                                                                                <img src="<?php echo base_url(); ?><?php echo $post->image_name; ?> " alt="#"> 
                                                                                                            </figure>
                                                                                                        </div>
                                                                                                        <div class="col-md-4">
                                                                                                            <div class="property-label-caption">
                                                                                                                <h6><a>Lead Id : </a><?php echo $post->lead_id; ?> </h6>
                                                                                                                <table class="user-profile-dashboard-table2">
                                                                                                                    <tbody>
                                                                                                                        <tr>
                                                                                                                            <th>
                                                                                                                                <?php if($post == 'DuplexFlat'){ ?>
                                                                                                                               PG/Co-Living
                                                                                                                                <?php } elseif($post == 'Factory'){ ?>
                                                                                                                                Factory
                                                                                                                                <?php } elseif($post == 'Flat'){ ?>
                                                                                                                                Flat
                                                                                                                                <?php } elseif($post == 'HouseorBanglow'){ ?>
                                                                                                                                House Or Banglow
                                                                                                                                <?php } elseif($post == 'Land'){ ?>
                                                                                                                                Land
                                                                                                                                <?php } elseif($post == 'Office'){ ?>
                                                                                                                                Office
                                                                                                                                <?php } elseif($post == 'PentHouse'){ ?>
                                                                                                                                Pent House
                                                                                                                                <?php } elseif($post == 'ShopOrShowroom'){ ?>
                                                                                                                                Shop Or Showroom
                                                                                                                                <?php } elseif($post == 'Warehouse'){ ?>
                                                                                                                                Warehouse
                                                                                                                                <?php }  ?>
                                                                                                                            </th>
                                                                                                                        </tr>
                                                                                                                        <tr>
                                                                                                                            <th>
                                                                                                                                <?php if($post == 'DuplexFlat'){ ?>
                                                                                                                                <?php echo $post->list_duplex_flat['0']->buildup_area.' '.$post->list_duplex_flat['0']->buildup_area_Unit; ?>
                                                                                                                                <?php } elseif($post == 'Factory'){ ?>
                                                                                                                                <?php echo $post->list_factory['0']->factory_BuildupArea.' '.$post->list_factory['0']->factory_BuildupAreaUnit; ?>
                                                                                                                                <?php } elseif($post == 'Flat'){ ?>
                                                                                                                                <?php echo $post->list_flat['0']->flat_BuildupArea.' '.$post->list_flat['0']->flat_BuildupArea_Unit; ?> 
                                                                                                                                <?php } elseif($post == 'HouseorBanglow'){ ?>
                                                                                                                                <?php echo $post->list_house['0']->house_BuildupArea.' '.$post->list_house['0']->house_BuildupAreaUnit; ?> 
                                                                                                                                <?php } elseif($post == 'Land'){ ?>
                                                                                                                                <?php echo $post->list_land['0']->LandArea.' '.$post->list_land['0']->land_SuperBuildupArea_Unit; ?>
                                                                                                                                <?php } elseif($post == 'Office'){ ?>
                                                                                                                                <?php echo $post->list_office['0']->officeBuildupArea.' '.$post->list_office['0']->officeBuildupAreaUnit; ?>
                                                                                                                                <?php } elseif($post == 'PentHouse'){ ?>
                                                                                                                                <?php echo $post->list_pent['0']->pent_buildup_area.' '.$post->list_pent['0']->pent_buildup_area_Unit; ?> 
                                                                                                                                <?php } elseif($post == 'ShopOrShowroom'){ ?>
                                                                                                                                <?php echo $post->list_shop['0']->shopBuildupArea.' '.$post->list_shop['0']->shopBuildupAreaUnit; ?>
                                                                                                                                <?php } elseif($post == 'Warehouse'){ ?>
                                                                                                                                <?php echo $post->list_warehouse['0']->warehouseBuildupArea.' '.$post->list_warehouse['0']->warehouseBuildupAreaUnit; ?> 
                                                                                                                                <?php }  ?>
                                                                                                                            </th>
                                                                                                                        </tr>
                                                                                                                        <tr>
                                                                                                                            <th>Furnished Status :  <?php echo $post->property_type['0']->FurnishedStatus; ?> </th>
                                                                                                                        </tr>
                                                                                                                        <tr>
                                                                                                                            <th>Rent : ₹. <?php echo $post->property_type['0']->rentPerMonth; ?>  </th>
                                                                                                                        </tr>
                                                                                                                        <tr>
                                                                                                                            <th><?php echo $post->city.', '.$post->state; ?> </th>
                                                                                                                        </tr>
                                                                                                                    </tbody>
                                                                                                                </table>
                                                                        
                                                                                                            </div>
                                                                                                        </div>
                                                                        
                                                                                                        <div class="col-md-4">
                                                                                                            <div class="property-label-caption">
                                                                        
                                                                                                                <table class="user-profile-dashboard-table2">
                                                                                                                    <tbody>
                                                                                                                        <tr>
                                                                                                                            <th>Posted : </th>
                                                                                                                            <td><?php echo date('d M Y', strtotime($post->created)); ?></td>
                                                                                                                        </tr>
                                                                                                                        <tr>
                                                                                                                            <th>Expire Date : </th>
                                                                                                                            <td><?php echo date('M d, Y', strtotime('+30 days',strtotime($post->created))) . PHP_EOL; ?></td>
                                                                                                                        </tr>
                                                                                                                    </tbody>
                                                                                                                </table>
                                                                        
                                                                                                                <div class="received-enquiries-viewings-holder">
                                                                                                                    <ul class="enquiries-viewings-links">
                                                                                                                        <li>
                                                                                                                            <a href="#">Detail Views</a>
                                                                                                                            <b class="count-received-enquiries">0</b>
                                                                                                                        </li>
                                                                                                                        <li>
                                                                                                                            <a href="#">Responses</a>
                                                                                                                            <b class="count-received-viewings">0</b>
                                                                                                                        </li>
                                                                                                                    </ul>
                                                                                                                </div>
                                                                                                                <div class="received-enquiries-viewings-holder pt-10">
                                                                                                                    <i class="fa fa-camera"></i>&nbsp; <?php echo count(explode(';', $post->images)); ?> Images upload out of 10
                                                                                                                </div>
                                                                                                                <span class="expire-date"> </span>
                                                                                                                <div class="sold-property-box">
                                                                                                                    <span class="prop-sold"> </span>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                        
                                                                                                        <div class="col-md-12 pt-5">
                                                                                                            <a href="<?php echo base_url(); ?>home/edit_property/<?php echo $post->post_id; ?>"><button type="button" class="btn btn-default"><i class="fa fa-pencil btn-icon"></i> Edit</button></a>
                                                                                                            <a href="<?php echo base_url(); ?>home/refresh_property/<?php echo $post->post_id; ?>"><button type="button" class="btn btn-default"><i class="fa fa-refresh btn-icon"></i> Refresh</button></a>
                                                                                                            <a href="<?php echo base_url(); ?>home/delete_property/<?php echo $post->post_id; ?>" onclick="return confirm('Do You want to delete this record?');"><button type="button" class="btn btn-default"><i class="fa fa-trash btn-icon"></i> Delete</button></a>
                                                                                                            <button type="button" class="btn outline-btn-default" onclick="view_property_images(<?php echo $post->post_id; ?> )"><i class="fa fa-picture-o btn-icon"></i> Add Modify Images</button>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </li>
                                                                                        <?php } ?>
                                                                                        <?php } ?>
                                                                                    </ul>
                                                                                <?php } ?>
                                                                            </div>
                                                                        </div>

                                                                        <div id="pending" class="col-lg-12 col-md-12 col-sm-12 col-xs-12 property tab-pane fade" >
                                                                            <div class="user-list">
                                                                                <?php if(!empty($list_post_property)){ ?>
                                                                                <div class="row" style="padding-bottom: 20px;">
                                                                                    <div class="col-md-8">
                                                                                        <h4 style="margin:5px 0px 0px;">Property Lead</h4>
                                                                                    </div>
                                                                                </div>

                                                                                <ul class="panel-group">
                                                                                    <?php foreach($list_post_property as $post){ ?>
                                                                                    <?php if($post->status== 0){ ?>
                                                                                    <li>
                                                                                        <div class="panel panel-default">
                                                                                            <!-- <a href="#" class="close-member wp-rem-dev-property-delete"><i class="icon-close"></i></a> -->
                                                                                            
                                                                                            <!-- duplex flat -->
                                                                                            <div class="panel-heading">
                                                                                                <div class="img-holder holder11">
                                                                                                    <!--<div class="col-md-1">
                                                                                                        <input type="checkbox" name="">
                                                                                                    </div>-->
                                                                                                    <div class="col-md-4">
                                                                                                        <figure>
                                                                                                            <img src="<?php echo base_url(); ?><?php echo $post->image_name; ?> " alt="#"> 
                                                                                                        </figure>
                                                                                                    </div>
                                                                                                    <div class="col-md-4">
                                                                                                        <div class="property-label-caption">
                                                                                                            <h6><a>Lead Id : </a><?php echo $post->lead_id; ?> </h6>
                                                                                                            <table class="user-profile-dashboard-table2">
                                                                                                                <tbody>
                                                                                                                    <tr>
                                                                                                                        <th>
                                                                                                                            <?php if($post == 'DuplexFlat'){ ?>
                                                                                                                           PG/Co-Living
                                                                                                                            <?php } elseif($post == 'Factory'){ ?>
                                                                                                                            Factory
                                                                                                                            <?php } elseif($post == 'Flat'){ ?>
                                                                                                                            Flat
                                                                                                                            <?php } elseif($post == 'HouseorBanglow'){ ?>
                                                                                                                            House Or Banglow
                                                                                                                            <?php } elseif($post == 'Land'){ ?>
                                                                                                                            Land
                                                                                                                            <?php } elseif($post == 'Office'){ ?>
                                                                                                                            Office
                                                                                                                            <?php } elseif($post == 'PentHouse'){ ?>
                                                                                                                            Pent House
                                                                                                                            <?php } elseif($post == 'ShopOrShowroom'){ ?>
                                                                                                                            Shop Or Showroom
                                                                                                                            <?php } elseif($post == 'Warehouse'){ ?>
                                                                                                                            Warehouse
                                                                                                                            <?php }  ?>
                                                                                                                        </th>
                                                                                                                    </tr>
                                                                                                                    <tr>
                                                                                                                        <th>
                                                                                                                            <?php if($post == 'DuplexFlat'){ ?>
                                                                                                                            <?php echo $post->list_duplex_flat['0']->buildup_area.' '.$post->list_duplex_flat['0']->buildup_area_Unit; ?>
                                                                                                                            <?php } elseif($post == 'Factory'){ ?>
                                                                                                                            <?php echo $post->list_factory['0']->factory_BuildupArea.' '.$post->list_factory['0']->factory_BuildupAreaUnit; ?>
                                                                                                                            <?php } elseif($post == 'Flat'){ ?>
                                                                                                                            <?php echo $post->list_flat['0']->flat_BuildupArea.' '.$post->list_flat['0']->flat_BuildupArea_Unit; ?> 
                                                                                                                            <?php } elseif($post == 'HouseorBanglow'){ ?>
                                                                                                                            <?php echo $post->list_house['0']->house_BuildupArea.' '.$post->list_house['0']->house_BuildupAreaUnit; ?> 
                                                                                                                            <?php } elseif($post == 'Land'){ ?>
                                                                                                                            <?php echo $post->list_land['0']->LandArea.' '.$post->list_land['0']->land_SuperBuildupArea_Unit; ?>
                                                                                                                            <?php } elseif($post == 'Office'){ ?>
                                                                                                                            <?php echo $post->list_office['0']->officeBuildupArea.' '.$post->list_office['0']->officeBuildupAreaUnit; ?>
                                                                                                                            <?php } elseif($post == 'PentHouse'){ ?>
                                                                                                                            <?php echo $post->list_pent['0']->pent_buildup_area.' '.$post->list_pent['0']->pent_buildup_area_Unit; ?> 
                                                                                                                            <?php } elseif($post == 'ShopOrShowroom'){ ?>
                                                                                                                            <?php echo $post->list_shop['0']->shopBuildupArea.' '.$post->list_shop['0']->shopBuildupAreaUnit; ?>
                                                                                                                            <?php } elseif($post == 'Warehouse'){ ?>
                                                                                                                            <?php echo $post->list_warehouse['0']->warehouseBuildupArea.' '.$post->list_warehouse['0']->warehouseBuildupAreaUnit; ?> 
                                                                                                                            <?php }  ?>
                                                                                                                        </th>
                                                                                                                    </tr>
                                                                                                                    <tr>
                                                                                                                        <th>Furnished Status :  <?php echo @$post->property_type['0']->FurnishedStatus; ?> </th>
                                                                                                                    </tr>
                                                                                                                    <tr>
                                                                                                                        <th>Rent : ₹. <?php echo @$post->property_type['0']->rentPerMonth; ?>  </th>
                                                                                                                    </tr>
                                                                                                                    <tr>
                                                                                                                        <th><?php echo @$post->city.', '.@$post->state; ?> </th>
                                                                                                                    </tr>
                                                                                                                </tbody>
                                                                                                            </table>
                                                                    
                                                                                                        </div>
                                                                                                    </div>
                                                                    
                                                                                                    <div class="col-md-4">
                                                                                                        <div class="property-label-caption">
                                                                    
                                                                                                            <table class="user-profile-dashboard-table2">
                                                                                                                <tbody>
                                                                                                                    <tr>
                                                                                                                        <th>Posted : </th>
                                                                                                                        <td><?php echo date('d M Y', strtotime($post->created)); ?></td>
                                                                                                                    </tr>
                                                                                                                    <tr>
                                                                                                                        <th>Expire Date : </th>
                                                                                                                        <td><?php echo date('M d, Y', strtotime('+30 days',strtotime($post->created))) . PHP_EOL; ?></td>
                                                                                                                    </tr>
                                                                                                                </tbody>
                                                                                                            </table>
                                                                    
                                                                                                            <div class="received-enquiries-viewings-holder">
                                                                                                                <ul class="enquiries-viewings-links">
                                                                                                                    <li>
                                                                                                                        <a href="#">Detail Views</a>
                                                                                                                        <b class="count-received-enquiries">0</b>
                                                                                                                    </li>
                                                                                                                    <li>
                                                                                                                        <a href="#">Responses</a>
                                                                                                                        <b class="count-received-viewings">0</b>
                                                                                                                    </li>
                                                                                                                </ul>
                                                                                                            </div>
                                                                                                            <div class="received-enquiries-viewings-holder pt-10">
                                                                                                                <i class="fa fa-camera"></i>&nbsp; <?php echo count(explode(';', $post->images)); ?> Images upload out of 10
                                                                                                            </div>
                                                                                                            <span class="expire-date"> </span>
                                                                                                            <div class="sold-property-box">
                                                                                                                <span class="prop-sold"> </span>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                    
                                                                                                    <div class="col-md-12 pt-5">
                                                                                                        <a href="<?php echo base_url(); ?>home/edit_property/<?php echo $post->post_id; ?>"><button type="button" class="btn btn-default"><i class="fa fa-pencil btn-icon"></i> Edit</button></a>
                                                                                                        <a href="<?php echo base_url(); ?>home/refresh_property/<?php echo $post->post_id; ?>"><button type="button" class="btn btn-default"><i class="fa fa-refresh btn-icon"></i> Refresh</button></a>
                                                                                                        <a href="<?php echo base_url(); ?>home/delete_property/<?php echo $post->post_id; ?>" onclick="return confirm('Do You want to delete this record?');"><button type="button" class="btn btn-default"><i class="fa fa-trash btn-icon"></i> Delete</button></a>
                                                                                                        <button type="button" class="btn outline-btn-default" onclick="view_property_images(<?php echo $post->post_id; ?> )"><i class="fa fa-picture-o btn-icon"></i> Add Modify Images</button>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <!-- <div class="property-visibility"><a class="property-visibility-update" data-toggle="tooltip" data-placement="top" id="property-visibility-5973" data-id="5973" href="#" data-original-title="Invisible"><i class="icon-eye"></i></a></div> -->
                                                                                            </div>
                                                                                            
                                                                                        </div>
                                                                                    </li>
                                                                                    <?php } ?>
                                                                                    <?php } ?>
                                                                                </ul>
                                                                                <?php } ?>
                                                                            </div>
                                                                        </div>

                                                                        <div id="rejected" class="col-lg-12 col-md-12 col-sm-12 col-xs-12 property tab-pane fade" >
                                                                            <div class="user-list">
                                                                                <?php if(!empty($list_post_property)){ ?>
                                                                                <div class="row" style="padding-bottom: 20px;">
                                                                                    <div class="col-md-8">
                                                                                        <h4 style="margin:5px 0px 0px;">Property Lead</h4>
                                                                                    </div>
                                                                                </div>

                                                                                <ul class="panel-group">
                                                                                    <?php foreach($list_post_property as $post){ ?>
                                                                                    <?php if($post->status== 2){ ?>
                                                                                    <li>
                                                                                        <div class="panel panel-default">
                                                                                            <div class="panel-heading">
                                                                                                <div class="img-holder holder11">
                                                                                                    <div class="col-md-4">
                                                                                                        <figure>
                                                                                                            <img src="<?php echo base_url(); ?><?php echo $post->image_name; ?> " alt="#"> 
                                                                                                        </figure>
                                                                                                    </div>
                                                                                                    <div class="col-md-4">
                                                                                                        <div class="property-label-caption">
                                                                                                            <h6><a>Lead Id : </a><?php echo $post->lead_id; ?> </h6>
                                                                                                            <table class="user-profile-dashboard-table2">
                                                                                                                <tbody>
                                                                                                                    <tr>
                                                                                                                        <th>
                                                                                                                            <?php if($post == 'DuplexFlat'){ ?>
                                                                                                                            PG/Co-Living
                                                                                                                            <?php } elseif($post == 'Factory'){ ?>
                                                                                                                            Factory
                                                                                                                            <?php } elseif($post == 'Flat'){ ?>
                                                                                                                            Flat
                                                                                                                            <?php } elseif($post == 'HouseorBanglow'){ ?>
                                                                                                                            House Or Banglow
                                                                                                                            <?php } elseif($post == 'Land'){ ?>
                                                                                                                            Land
                                                                                                                            <?php } elseif($post == 'Office'){ ?>
                                                                                                                            Office
                                                                                                                            <?php } elseif($post == 'PentHouse'){ ?>
                                                                                                                            Pent House
                                                                                                                            <?php } elseif($post == 'ShopOrShowroom'){ ?>
                                                                                                                            Shop Or Showroom
                                                                                                                            <?php } elseif($post == 'Warehouse'){ ?>
                                                                                                                            Warehouse
                                                                                                                            <?php }  ?>
                                                                                                                        </th>
                                                                                                                    </tr>
                                                                                                                    <tr>
                                                                                                                        <th>
                                                                                                                            <?php if($post == 'DuplexFlat'){ ?>
                                                                                                                            <?php echo $post->list_duplex_flat['0']->buildup_area.' '.$post->list_duplex_flat['0']->buildup_area_Unit; ?>
                                                                                                                            <?php } elseif($post == 'Factory'){ ?>
                                                                                                                            <?php echo $post->list_factory['0']->factory_BuildupArea.' '.$post->list_factory['0']->factory_BuildupAreaUnit; ?>
                                                                                                                            <?php } elseif($post == 'Flat'){ ?>
                                                                                                                            <?php echo $post->list_flat['0']->flat_BuildupArea.' '.$post->list_flat['0']->flat_BuildupArea_Unit; ?> 
                                                                                                                            <?php } elseif($post == 'HouseorBanglow'){ ?>
                                                                                                                            <?php echo $post->list_house['0']->house_BuildupArea.' '.$post->list_house['0']->house_BuildupAreaUnit; ?> 
                                                                                                                            <?php } elseif($post == 'Land'){ ?>
                                                                                                                            <?php echo $post->list_land['0']->LandArea.' '.$post->list_land['0']->land_SuperBuildupArea_Unit; ?>
                                                                                                                            <?php } elseif($post == 'Office'){ ?>
                                                                                                                            <?php echo $post->list_office['0']->officeBuildupArea.' '.$post->list_office['0']->officeBuildupAreaUnit; ?>
                                                                                                                            <?php } elseif($post == 'PentHouse'){ ?>
                                                                                                                            <?php echo $post->list_pent['0']->pent_buildup_area.' '.$post->list_pent['0']->pent_buildup_area_Unit; ?> 
                                                                                                                            <?php } elseif($post == 'ShopOrShowroom'){ ?>
                                                                                                                            <?php echo $post->list_shop['0']->shopBuildupArea.' '.$post->list_shop['0']->shopBuildupAreaUnit; ?>
                                                                                                                            <?php } elseif($post == 'Warehouse'){ ?>
                                                                                                                            <?php echo $post->list_warehouse['0']->warehouseBuildupArea.' '.$post->list_warehouse['0']->warehouseBuildupAreaUnit; ?> 
                                                                                                                            <?php }  ?>
                                                                                                                        </th>
                                                                                                                    </tr>
                                                                                                                    <tr>
                                                                                                                        <th>Furnished Status :  <?php echo $post->property_type['0']->FurnishedStatus; ?> </th>
                                                                                                                    </tr>
                                                                                                                    <tr>
                                                                                                                        <th>Rent : ₹. <?php echo $post->property_type['0']->rentPerMonth; ?>  </th>
                                                                                                                    </tr>
                                                                                                                    <tr>
                                                                                                                        <th><?php echo $post->city.', '.$post->state; ?> </th>
                                                                                                                    </tr>
                                                                                                                </tbody>
                                                                                                            </table>
                                                                    
                                                                                                        </div>
                                                                                                    </div>
                                                                    
                                                                                                    <div class="col-md-4">
                                                                                                        <div class="property-label-caption">
                                                                    
                                                                                                            <table class="user-profile-dashboard-table2">
                                                                                                                <tbody>
                                                                                                                    <tr>
                                                                                                                        <th>Posted : </th>
                                                                                                                        <td><?php echo date('d M Y', strtotime($post->created)); ?></td>
                                                                                                                    </tr>
                                                                                                                    <tr>
                                                                                                                        <th>Expire Date : </th>
                                                                                                                        <td><?php echo date('m d, Y', strtotime('+30 days',strtotime($post->created))) . PHP_EOL; ?> </td>
                                                                                                                    </tr>
                                                                                                                </tbody>
                                                                                                            </table>
                                                                    
                                                                                                            <div class="received-enquiries-viewings-holder">
                                                                                                                <ul class="enquiries-viewings-links">
                                                                                                                    <li>
                                                                                                                        <a href="#">Detail Views</a>
                                                                                                                        <b class="count-received-enquiries">0</b>
                                                                                                                    </li>
                                                                                                                    <li>
                                                                                                                        <a href="#">Responses</a>
                                                                                                                        <b class="count-received-viewings">0</b>
                                                                                                                    </li>
                                                                                                                </ul>
                                                                                                            </div>
                                                                                                            <div class="received-enquiries-viewings-holder pt-10">
                                                                                                                <i class="fa fa-camera"></i>&nbsp; <?php echo count(explode(';', $post->images)); ?> Images upload out of 10
                                                                                                            </div>
                                                                                                            <span class="expire-date"> </span>
                                                                                                            <div class="sold-property-box">
                                                                                                                <span class="prop-sold"> </span>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                    
                                                                                                    <div class="col-md-12 pt-5">
                                                                                                        <a href="<?php echo base_url(); ?>home/edit_property/<?php echo $post->post_id; ?>"><button type="button" class="btn btn-default"><i class="fa fa-pencil btn-icon"></i> Edit</button></a>
                                                                                                        <a href="<?php echo base_url(); ?>home/refresh_property/<?php echo $post->post_id; ?>"><button type="button" class="btn btn-default"><i class="fa fa-refresh btn-icon"></i> Refresh</button></a>
                                                                                                        <a href="<?php echo base_url(); ?>home/delete_property/<?php echo $post->post_id; ?>" onclick="return confirm('Do You want to delete this record?');"><button type="button" class="btn btn-default"><i class="fa fa-trash btn-icon"></i> Delete</button></a>
                                                                                                        <button type="button" class="btn outline-btn-default" onclick="view_property_images(<?php echo $post->post_id; ?> )"><i class="fa fa-picture-o btn-icon"></i> Add Modify Images</button>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>  
                                                                                        </div>
                                                                                    </li>
                                                                                    <?php } ?>
                                                                                    <?php } ?>
                                                                                </ul>
                                                                                <?php } ?>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div id="my-projects" class="user-profile tab-pane fade">

                                                <div class="user-account-holder loader-holder">
                                                    <div class="user-holder" style="padding: 0;border: 0;">
                                                        <div class="row">
                                                            <div class="col-md-12 col-xs-12">
                                                                <div class="smart-wrap pb-20">
                                                                    <div class="smart-forms smart-container">                         
                                                                        <div class="section">
                                                                            <div class="smart-widget sm-right smr-50">
                                                                                <label class="field">
                                                                                    <input type="text" name="sub" id="sub" class="gui-input" placeholder="Search by id">
                                                                                </label>
                                                                                <button type="submit" class="button"> <i class="fa fa-search"></i> </button>
                                                                            </div><!-- end .smart-widget section --> 
                                                                        </div><!-- end section -->                                     
                                                                    </div><!-- end .smart-forms section -->
                                                                </div><!-- end .smart-wrap section -->
                                                            </div>

                                                            <div class="col-md-12 col-xs-12"> 
                                                                <div class="btn-section-view-more pb-20" style="float: right !important;">
                                                                    <a href="<?php echo base_url('home/post_project'); ?>" class="outline-btn-blue">Post New</a>
                                                                </div>
                                                            </div>

                                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                <div class="user-property">
                                                                    <div class="element-title right-filters-row" style="margin-bottom: 0 !important;">

                                                                        <div class="right-filters row pull-right" style="max-width: 100%;">
                                                                            <?php $activeCount = 0; ?>
                                                                            <?php $expiredCount = 0; ?>
                                                                            <?php $pendingCount = 0; ?>
                                                                            <?php $rejectedCount = 0; ?>
                                                                            <?php foreach($list_post_project as $r){ ?>
                                                                            <?php if($r->status==1) $activeCount++;
                                                                                  if($r->status==3) $expiredCount++;
                                                                                  if($r->status==0) $pendingCount++;
                                                                                  if($r->status==2) $rejectedCount++;
                                                                            ?>
                                                                            <?php } ?>
                                                                            <div class="col-md-12" style="padding: 0;">
                                                                                <ul class="nav nav-tabs property-tab-pills" style="margin-left: -4px;">
                                                                                    <li class="active"><a data-toggle="tab" href="#active2">Active(<?php echo $activeCount; ?>)</a></li>
                                                                                    <li><a data-toggle="tab" href="#expired2">Expired(<?php echo $expiredCount; ?>)</a></li>
                                                                                    <li><a data-toggle="tab" href="#pending2">Pending(<?php echo $pendingCount; ?>)</a></li>
                                                                                    <li><a data-toggle="tab" href="#rejected2">Rejected(<?php echo $rejectedCount; ?>)</a></li>
                                                                                </ul>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="tab-content" style="margin-right: -4px;">
                                                                        <div id="active2" class="col-lg-12 col-md-12 col-sm-12 col-xs-12 property tab-pane fade in active" >
                                                                            <div class="user-list">
                                                                                <?php if(!empty($list_post_project)){ ?>
                                                                                <div class="row" style="padding-bottom: 20px;">
                                                                                    <div class="col-md-8">
                                                                                        <h4 style="margin:5px 0px 0px;">Projects</h4>
                                                                                    </div>
                                                                                    <!--<div class="col-md-4">
                                                                                        <button type="button" class="btn btn-success">Check All</button>
                                                                                        <button type="button" class="btn btn-primary">Refresh</button>
                                                                                    </div>-->
                                                                                </div>

                                                                                <ul class="panel-group">
                                                                                    
                                                                                    <?php foreach($list_post_project as $project){ ?>
                                                                                    <?php if($project->status == 1){ ?>
                                                                                    <li>
                                                                                        <div class="panel panel-default">
                                                                                            <!-- <a href="#" class="close-member wp-rem-dev-property-delete"><i class="icon-close"></i></a> -->
                                                                                            <div class="panel-heading">
                                                                                                <div class="img-holder holder11">
                                                                                                    <!--<div class="col-md-1">
                                                                                                        <input type="checkbox" name="">
                                                                                                    </div>-->
                                                                                                    <div class="col-md-3">
                                                                                                        <figure>
                                                                                                            <img src="<?php echo base_url(); ?><?php echo $project->image_file; ?>" alt="#"> 
                                                                                                        </figure>
                                                                                                        </div>
                                                                                                        <div class="col-md-8">
                                                                                                            <div class="property-label-caption">
                                                                                                                <h6><a>Property Id : </a><?php echo $project->lead_id; ?></h6>
                                                                                                                <span class="expire-date">Posted <?php echo date('M d, Y', strtotime($project->created)); ?></span>
                                                                                                                <div class="sold-property-box">
                                                                                                                    <span class="prop-sold">Expire Date <?php echo date('d M Y', strtotime('+30 days',strtotime($project->created))) . PHP_EOL; ?></span>
                                                                                                                </div>
                                                                                                                <div class="received-enquiries-viewings-holder">
                                                                                                                    <ul class="enquiries-viewings-links">
                                                                                                                        <li>
                                                                                                                            <a href="javascript:void(0);" onclick="load_property_responses('request_view', 'project', <?php echo $project->post_id; ?>);">Detail Views</a>
                                                                                                                            <b class="count-received-enquiries"><?php echo $project->request_views->count; ?></b>
                                                                                                                        </li>
                                                                                                                        <li>
                                                                                                                            <a href="javascript:void(0);" onclick="load_property_responses('enquiry', 'project', <?php echo $project->post_id; ?>);">Responses</a>
                                                                                                                            <b class="count-received-viewings"><?php echo $project->enquiries->count; ?></b>
                                                                                                                        </li>
                                                                                                                    </ul>
                                                                                                                </div>
                                                                                                                <div class="received-enquiries-viewings-holder">
                                                                                                                    <i class="fa fa-camera"></i>&nbsp; <?php echo count(explode(';', $project->images)); ?> Images upload out of 10
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>

                                                                                                        <div class="col-md-12 pt-5">
                                                                                                            <a href="<?php echo base_url(); ?>home/edit_project/<?php echo $project->post_id;  ?>"><button type="button" class="btn btn-default"><i class="fa fa-pencil btn-icon"></i> Edit</button></a>
                                                                                                            <a href="<?php echo base_url(); ?>home/refresh_project/<?php echo $project->post_id; ?>"><button type="button" class="btn btn-default"><i class="fa fa-refresh btn-icon"></i> Refresh</button></a>
                                                                                                            <a href="<?php echo base_url(); ?>home/delete_project/<?php echo $project->post_id;  ?>"><button type="button" class="btn btn-default"><i class="fa fa-trash btn-icon"></i> Delete</button></a>
                                                                                                            <button type="button" class="btn outline-btn-default" onclick="view_project_images(<?php echo $project->post_id; ?>);"><i class="fa fa-picture-o btn-icon"></i> Add Modify Images</button>
                                                                                                            <!--<button type="button" class="btn outline-btn-default" ><i class="fa fa-plus btn-icon"></i> Add Modify / Catalogue</button>-->
                                                                                                        </div>

                                                                                                    </div>

                                                                                                    <!-- <div class="property-visibility"><a class="property-visibility-update" data-toggle="tooltip" data-placement="top" id="property-visibility-5973" data-id="5973" href="#" data-original-title="Invisible"><i class="icon-eye"></i></a></div> -->

                                                                                                </div>
                                                                                            </div>
                                                                                        </li>
                                                                                    <?php } ?>
                                                                                    <?php } ?>
                                                                                    
                                                                                </ul>
                                                                                <?php } ?>   
                                                                            </div>
                                                                        </div>



                                                                        <div id="expired2" class="col-lg-12 col-md-12 col-sm-12 col-xs-12 property tab-pane fade" >
                                                                            <div class="user-list">
                                                                                <?php if(!empty($list_post_project)){ ?>
                                                                                <div class="row" style="padding-bottom: 20px;">
                                                                                    <div class="col-md-8">
                                                                                        <h4 style="margin:5px 0px 0px;">Project Detail</h4>
                                                                                    </div>
                                                                                    <!--<div class="col-md-4">
                                                                                        <button type="button" class="btn btn-success">Check All</button>
                                                                                        <button type="button" class="btn btn-primary">Refresh</button>
                                                                                    </div>-->
                                                                                </div>

                                                                                <ul class="panel-group">
                                                                                    <?php foreach($list_post_project as $project){ ?>
                                                                                    <?php if($project->status == 3){ ?>
                                                                                    <li>
                                                                                        <div class="panel panel-default">
                                                                                            <!-- <a href="#" class="close-member wp-rem-dev-property-delete"><i class="icon-close"></i></a> -->
                                                                                            <div class="panel-heading">
                                                                                                <div class="img-holder holder11">
                                                                                                    <!--<div class="col-md-1">
                                                                                                        <input type="checkbox" name="">
                                                                                                    </div>-->
                                                                                                    <div class="col-md-3">
                                                                                                        <figure>
                                                                                                            <img src="<?php echo base_url(); ?><?php echo $project->image_file; ?>" alt="#"> 
                                                                                                        </figure>
                                                                                                        </div>
                                                                                                        <div class="col-md-8">
                                                                                                            <div class="property-label-caption">
                                                                                                                <h6><a>Property Id : </a><?php echo $project->lead_id; ?></h6>
                                                                                                                <span class="expire-date">Posted <?php echo date('M d, Y', strtotime($project->created)); ?></span>
                                                                                                                <div class="sold-property-box">
                                                                                                                    <span class="prop-sold">Expire Date <?php echo date('d M Y', strtotime('+30 days',strtotime($project->created))) . PHP_EOL; ?></span>
                                                                                                                </div>
                                                                                                                <div class="received-enquiries-viewings-holder">
                                                                                                                    <ul class="enquiries-viewings-links">
                                                                                                                        <li>
                                                                                                                            <a href="javascript:void(0);" onclick="load_property_responses('request_view', 'project', <?php echo $project->post_id; ?>);">Detail Views</a>
                                                                                                                            <b class="count-received-enquiries"><?php echo $project->request_views->count; ?></b>
                                                                                                                        </li>
                                                                                                                        <li>
                                                                                                                            <a href="javascript:void(0);" onclick="load_property_responses('enquiry', 'project', <?php echo $project->post_id; ?>);">Responses</a>
                                                                                                                            <b class="count-received-viewings"><?php echo $project->enquiries->count; ?></b>
                                                                                                                        </li>
                                                                                                                    </ul>
                                                                                                                </div>
                                                                                                                <div class="received-enquiries-viewings-holder">
                                                                                                                    <i class="fa fa-camera"></i>&nbsp; <?php echo count(explode(';', $project->images)); ?> Images upload out of 10
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>

                                                                                                        <div class="col-md-12 pt-5">
                                                                                                            <a href="<?php echo base_url(); ?>home/edit_project/<?php echo $project->post_id;  ?>"><button type="button" class="btn btn-default"><i class="fa fa-pencil btn-icon"></i> Edit</button></a>
                                                                                                            <a href="<?php echo base_url(); ?>home/refresh_project/<?php echo $project->post_id; ?>"><button type="button" class="btn btn-default"><i class="fa fa-refresh btn-icon"></i> Refresh</button></a>
                                                                                                            <a href="<?php echo base_url(); ?>home/delete_project/<?php echo $project->post_id;  ?>"><button type="button" class="btn btn-default"><i class="fa fa-trash btn-icon"></i> Delete</button></a>
                                                                                                            <button type="button" class="btn outline-btn-default" onclick="view_project_images(<?php echo $project->post_id; ?>);"><i class="fa fa-picture-o btn-icon"></i> Add Modify Images</button>
                                                                                                            <!--<button type="button" class="btn outline-btn-default" ><i class="fa fa-plus btn-icon"></i> Add Modify / Catalogue</button>-->
                                                                                                        </div>

                                                                                                    </div>

                                                                                                    <!-- <div class="property-visibility"><a class="property-visibility-update" data-toggle="tooltip" data-placement="top" id="property-visibility-5973" data-id="5973" href="#" data-original-title="Invisible"><i class="icon-eye"></i></a></div> -->

                                                                                                </div>
                                                                                            </div>
                                                                                        </li>
                                                                                    <?php } ?>
                                                                                    <?php } ?>
                                                                                </ul>
                                                                                <?php } ?>   
                                                                            </div>
                                                                        </div>




                                                                        <div id="pending2" class="col-lg-12 col-md-12 col-sm-12 col-xs-12 property tab-pane fade" >
                                                                            <div class="user-list">
                                                                                <?php if(!empty($list_post_project)){ ?>
                                                                                <div class="row" style="padding-bottom: 20px;">
                                                                                    <div class="col-md-8">
                                                                                        <h4 style="margin:5px 0px 0px;">Project Detail</h4>
                                                                                    </div>
                                                                                    <!--<div class="col-md-4">
                                                                                        <button type="button" class="btn btn-success">Check All</button>
                                                                                        <button type="button" class="btn btn-primary">Refresh</button>
                                                                                    </div>-->
                                                                                </div>

                                                                                <ul class="panel-group">
                                                                                    <?php foreach($list_post_project as $project){ ?>
                                                                                    <?php if($project->status == 0){ ?>
                                                                                    <li>
                                                                                        <div class="panel panel-default">
                                                                                            <!-- <a href="#" class="close-member wp-rem-dev-property-delete"><i class="icon-close"></i></a> -->
                                                                                            <div class="panel-heading">
                                                                                                <div class="img-holder holder11">
                                                                                                    <!--<div class="col-md-1">
                                                                                                        <input type="checkbox" name="">
                                                                                                    </div>-->
                                                                                                    <div class="col-md-3">
                                                                                                        <figure>
                                                                                                            <img src="<?php echo base_url(); ?><?php echo $project->image_file; ?>" alt="#"> 
                                                                                                        </figure>
                                                                                                        </div>
                                                                                                        <div class="col-md-8">
                                                                                                            <div class="property-label-caption">
                                                                                                                <h6><a>Property Id : </a><?php echo $project->lead_id; ?></h6>
                                                                                                                <span class="expire-date">Posted <?php echo date('M d, Y', strtotime($project->created)); ?></span>
                                                                                                                <div class="sold-property-box">
                                                                                                                    <span class="prop-sold">Expire Date <?php echo date('d M Y', strtotime('+30 days',strtotime($project->created))) . PHP_EOL; ?></span>
                                                                                                                </div>
                                                                                                                <div class="received-enquiries-viewings-holder">
                                                                                                                    <ul class="enquiries-viewings-links">
                                                                                                                        <li>
                                                                                                                            <a href="javascript:void(0);" onclick="load_property_responses('request_view', 'project', <?php echo $project->post_id; ?>);">Detail Views</a>
                                                                                                                            <b class="count-received-enquiries"><?php echo $project->request_views->count; ?></b>
                                                                                                                        </li>
                                                                                                                        <li>
                                                                                                                            <a href="javascript:void(0);" onclick="load_property_responses('enquiry', 'project', <?php echo $project->post_id; ?>);">Responses</a>
                                                                                                                            <b class="count-received-viewings"><?php echo $project->enquiries->count; ?></b>
                                                                                                                        </li>
                                                                                                                    </ul>
                                                                                                                </div>
                                                                                                                <div class="received-enquiries-viewings-holder">
                                                                                                                    <i class="fa fa-camera"></i>&nbsp; <?php echo count(explode(';', $project->images)); ?> Images upload out of 10
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>

                                                                                                        <div class="col-md-12 pt-5">
                                                                                                            <a href="<?php echo base_url(); ?>home/edit_project/<?php echo $project->post_id;  ?>"><button type="button" class="btn btn-default"><i class="fa fa-pencil btn-icon"></i> Edit</button></a>
                                                                                                            <a href="<?php echo base_url(); ?>home/refresh_project/<?php echo $project->post_id; ?>"><button type="button" class="btn btn-default"><i class="fa fa-refresh btn-icon"></i> Refresh</button></a>
                                                                                                            <a href="<?php echo base_url(); ?>home/delete_project/<?php echo $project->post_id;  ?>"><button type="button" class="btn btn-default"><i class="fa fa-trash btn-icon"></i> Delete</button></a>
                                                                                                            <button type="button" class="btn outline-btn-default" onclick="view_project_images(<?php echo $project->post_id; ?>);"><i class="fa fa-picture-o btn-icon"></i> Add Modify Images</button>
                                                                                                            <!--<button type="button" class="btn outline-btn-default" ><i class="fa fa-plus btn-icon"></i> Add Modify / Catalogue</button>-->
                                                                                                        </div>

                                                                                                    </div>

                                                                                                    <!-- <div class="property-visibility"><a class="property-visibility-update" data-toggle="tooltip" data-placement="top" id="property-visibility-5973" data-id="5973" href="#" data-original-title="Invisible"><i class="icon-eye"></i></a></div> -->

                                                                                                </div>
                                                                                            </div>
                                                                                        </li>
                                                                                    <?php } ?>
                                                                                    <?php } ?>
                                                                                </ul>
                                                                                <?php } ?> 
                                                                            </div>
                                                                        </div>






                                                                        <div id="rejected2" class="col-lg-12 col-md-12 col-sm-12 col-xs-12 property tab-pane fade" >
                                                                            <div class="user-list">
                                                                                <?php if(!empty($list_post_project)){ ?>
                                                                                <div class="row" style="padding-bottom: 20px;">
                                                                                    <div class="col-md-8">
                                                                                        <h4 style="margin:5px 0px 0px;">Project Detail</h4>
                                                                                    </div>
                                                                                    <!--<div class="col-md-4">
                                                                                        <button type="button" class="btn btn-success">Check All</button>
                                                                                        <button type="button" class="btn btn-primary">Refresh</button>
                                                                                    </div>-->
                                                                                </div>

                                                                                <ul class="panel-group">
                                                                                    <?php foreach($list_post_project as $project){ ?>
                                                                                    <?php if($project->status == 3){ ?>
                                                                                    <li>
                                                                                        <div class="panel panel-default">
                                                                                            <!-- <a href="#" class="close-member wp-rem-dev-property-delete"><i class="icon-close"></i></a> -->
                                                                                            <div class="panel-heading">
                                                                                                <div class="img-holder holder11">
                                                                                                    <!--<div class="col-md-1">
                                                                                                        <input type="checkbox" name="">
                                                                                                    </div>-->
                                                                                                    <div class="col-md-3">
                                                                                                        <figure>
                                                                                                            <img src="<?php echo base_url(); ?><?php echo $project->image_file; ?>" alt="#"> 
                                                                                                        </figure>
                                                                                                        </div>
                                                                                                        <div class="col-md-8">
                                                                                                            <div class="property-label-caption">
                                                                                                                <h6><a>Property Id : </a><?php echo $project->lead_id; ?></h6>
                                                                                                                <span class="expire-date">Posted <?php echo date('M d, Y', strtotime($project->created)); ?></span>
                                                                                                                <div class="sold-property-box">
                                                                                                                    <span class="prop-sold">Expire Date <?php echo date('d M Y', strtotime('+30 days',strtotime($project->created))) . PHP_EOL; ?></span>
                                                                                                                </div>
                                                                                                                <div class="received-enquiries-viewings-holder">
                                                                                                                    <ul class="enquiries-viewings-links">
                                                                                                                        <li>
                                                                                                                            <a href="javascript:void(0);" onclick="load_property_responses('request_view', 'project', <?php echo $project->post_id; ?>);">Detail Views</a>
                                                                                                                            <b class="count-received-enquiries"><?php echo $project->request_views->count; ?></b>
                                                                                                                        </li>
                                                                                                                        <li>
                                                                                                                            <a href="javascript:void(0);" onclick="load_property_responses('enquiry', 'project', <?php echo $project->post_id; ?>);">Responses</a>
                                                                                                                            <b class="count-received-viewings"><?php echo $project->enquiries->count; ?></b>
                                                                                                                        </li>
                                                                                                                    </ul>
                                                                                                                </div>
                                                                                                                <div class="received-enquiries-viewings-holder">
                                                                                                                    <i class="fa fa-camera"></i>&nbsp; <?php echo count(explode(';', $project->images)); ?> Images upload out of 10
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>

                                                                                                        <div class="col-md-12 pt-5">
                                                                                                            <a href="<?php echo base_url(); ?>home/edit_project/<?php echo $project->post_id;  ?>"><button type="button" class="btn btn-default"><i class="fa fa-pencil btn-icon"></i> Edit</button></a>
                                                                                                            <a href="<?php echo base_url(); ?>home/refresh_project/<?php echo $project->post_id; ?>"><button type="button" class="btn btn-default"><i class="fa fa-refresh btn-icon"></i> Refresh</button></a>
                                                                                                            <a href="<?php echo base_url(); ?>home/delete_project/<?php echo $project->post_id;  ?>"><button type="button" class="btn btn-default"><i class="fa fa-trash btn-icon"></i> Delete</button></a>
                                                                                                            <button type="button" class="btn outline-btn-default" onclick="view_project_images(<?php echo $project->post_id; ?>);"><i class="fa fa-picture-o btn-icon"></i> Add Modify Images</button>
                                                                                                            <!--<button type="button" class="btn outline-btn-default" ><i class="fa fa-plus btn-icon"></i> Add Modify / Catalogue</button>-->
                                                                                                        </div>

                                                                                                    </div>

                                                                                                    <!-- <div class="property-visibility"><a class="property-visibility-update" data-toggle="tooltip" data-placement="top" id="property-visibility-5973" data-id="5973" href="#" data-original-title="Invisible"><i class="icon-eye"></i></a></div> -->

                                                                                                </div>
                                                                                            </div>
                                                                                        </li>
                                                                                    <?php } ?>
                                                                                    <?php } ?>
                                                                                </ul>
                                                                                <?php } ?>   
                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- My Response -->
                                            <div id="my-response" class="user-profile tab-pane fade">
                                                <div class="user-account-holder loader-holder">
                                                    <div class="user-holder" style="padding: 0;border: 0;">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <form class="serach-form">
                                                                    <div class="col-md-8">

                                                                        <h4>My Response (Last 3 Months)</h4>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <select class="form-control">
                                                                            <option>My Response</option>
                                                                        </select>
                                                                    </div><br><br>
                                                                </form>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <div class="col-md-6 second-r-section1 pb-10">
                                                                    <a data-target="#download-response" data-toggle="modal" href="#download-response-tab-80396" class="ouline-blue-btn">Download Response</a>
                                                                </div>
                                                                <div class="col-md-6 second-r-section2 pb-10">
                                                                    <a data-target="#switch1" data-toggle="modal" class="ouline-blue-btn" href="javascript:void(0)">Switch to Property-wise display</a>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                <div class="user-property">
                                                                    <div class="element-title right-filters-row" style="margin-bottom: 0 !important;">
                                                                        <div class="right-filters row pull-right" style="max-width: 100%;">
                                                                            <div class="col-md-12" style="padding: 0;">
                                                                                <ul class="nav nav-tabs property-tab-pills" style="margin-left: -4px;">
                                                                                    <?php 
                                                                                    $pids = array();
                                                                                    foreach ($list_my_project_responses as $h) { 
                                                                                        $pids[] = date('M',strtotime($h->created));
                                                                                    }
                                                                                    $pids = array_unique($pids);
                                                                                    
                                                                                    ?>
                                                                                    <?php foreach($pids as $r=>$res){ ?>
                                                                                    <!--<li class="<?php if($r == 0){ echo 'active'; } ?>"><a data-toggle="tab" href="#expired1"><?php echo $res;?></a></li>-->
                                                                                    <?php } ?>
                                                                                    <li class="active"><a data-toggle="tab" href="#active1">Aug(103)</a></li>
                                                                                    <!--<li><a data-toggle="tab" href="#expired1">Jul(226)</a></li>
                                                                                    <li><a data-toggle="tab" href="#pending1">Jun(185)</a></li>
                                                                                    <li><a data-toggle="tab" href="#rejected1">May(147)</a></li>-->
                                                                                </ul>
                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                    <div class="tab-content" style="margin-right: -4px;">
                                                                        <div id="active1" class="col-lg-12 col-md-12 col-sm-12 col-xs-12 property tab-pane fade in active" >
                                                                            <div class="user-list">

                                                                                <div class="row pb-20">
                                                                                    <div class="col-md-8">
                                                                                        <input type="text" name="q" placeholder="Enter email id or contact number of your lead" class="form-control">
                                                                                    </div>
                                                                                    <div class="col-md-4">
                                                                                        <select class="form-control">
                                                                                            <option>Filter by lead status</option>
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                    
                                                                                <div class="user-account-holder loader-holder">
                                                                                    <div class="user-holder" style="padding: 0;border: 0;">
                                                                                        <?php if(!empty($list_my_property_responses)){ ?>
                                                                                        <?php foreach($list_my_property_responses as $row){ ?>
                                                                                        <div class="user-packages-list">
                                                                                            <div class="all-pckgs-sec">
                                                                                                <div class="wp-rem-pkg-holder">
                                                                                                    <div class="wp-rem-pkg-header">
                                                                                                        <div class="pkg-title-price pull-left">
                                                                                                            <label class="pkg-title"><?php echo $row->user_name; ?>(Individual)</label>
                                                                                                            <span class="pkg-expiry"><strong><?php echo $row->user_phone; ?></strong></span>
                                                                                                            <span class="pkg-properties"><strong><?php echo $row->user_email; ?></strong> </span>
                                                                                                        </div>
                                                                                                        <div class="pkg-detail-btn pull-right custom-check">
                                                                                                            <a href="#"><i class="fa fa-check"></i>&nbsp;Verified</a>
                                                                                                        </div>
                                                                                                        <div class="col-md-12 rent-tag">
                                                                                                            <div class="col-md-2">
                                                                                                                <a href="#" class="tag"><?php echo $row->rent_sell; ?></a>
                                                                                                            </div>
                                                                                                            <div class="col-md-7">
                                                                                                                <!--<p>2 BHK Apartment for Rs. <strong>10,000</strong> in <strong>Hiland Greens, Maheshtla, Kolkata</strong></p>-->
                                                                                                                <p><?php echo $row->user_message; ?></p>
                                                                                                            </div>
                                                                                                            <div class="col-md-3">
                                                                                                                Received on <br><strong><?php echo date('d M y', strtotime($row->created)); ?> </strong>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <?php } ?>
                                                                                        <?php } ?>
                                                                                        
                                                                                        <?php if(!empty($list_my_project_responses)){ ?>
                                                                                        <?php foreach($list_my_project_responses as $row){ ?>
                                                                                        <div class="user-packages-list">
                                                                                            <div class="all-pckgs-sec">
                                                                                                <div class="wp-rem-pkg-holder">
                                                                                                    <div class="wp-rem-pkg-header">
                                                                                                        <div class="pkg-title-price pull-left">
                                                                                                            <label class="pkg-title"><?php echo $row->user_name; ?>(Individual)</label>
                                                                                                            <span class="pkg-expiry"><strong><?php echo $row->user_phone; ?></strong></span>
                                                                                                            <span class="pkg-properties"><strong><?php echo $row->user_email; ?></strong> </span>
                                                                                                        </div>
                                                                                                        <div class="pkg-detail-btn pull-right custom-check">
                                                                                                            <a href="#"><i class="fa fa-check"></i>&nbsp;Verified</a>
                                                                                                        </div>
                                                                                                        <div class="col-md-12 rent-tag">
                                                                                                            <div class="col-md-2">
                                                                                                                <a href="#" class="tag"><?php echo $row->rent_sell; ?></a>
                                                                                                            </div>
                                                                                                            <div class="col-md-7">
                                                                                                                <!--<p>2 BHK Apartment for Rs. <strong>10,000</strong> in <strong>Hiland Greens, Maheshtla, Kolkata</strong></p>-->
                                                                                                                <p><?php echo $row->user_message; ?></p>
                                                                                                            </div>
                                                                                                            <div class="col-md-3">
                                                                                                                Received on <br><strong><?php echo date('d M y', strtotime($row->created)); ?> </strong>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <?php } ?>
                                                                                        <?php } ?>
                                                                                    </div>
                                                                                    <div class="wp_rem_loader" style="display: none;">
                                                                                        <div class="loader-img"><i class="icon-spinner8"></i></div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div id="expired1" class="col-lg-12 col-md-12 col-sm-12 col-xs-12 property tab-pane fade" >

                                                                            <div class="user-holder">
                                                                                <div class="user-packages-list">
                                                                                    <div class="all-pckgs-sec">
                                                                                        <div class="wp-rem-pkg-holder">
                                                                                            <div class="wp-rem-pkg-header">
                                                                                                <div class="pkg-title-price pull-left">
                                                                                                    <label class="pkg-title">Anatrang Gupta(Individual)</label>

                                                                                    <span class="pkg-expiry"><strong>09007938136</strong></span>
                                                                                    <span class="pkg-properties"><strong>anatarang@gmail.com</strong> </span>
                                                                                </div>
                                                                                <div class="pkg-detail-btn pull-right">
                                                                                    <a href="#">Verified</a>
                                                                                </div>
                                                                                </div>

                                                                                </div>
                                                                                </div>
                                                                                </div>

                                                                                <div class="user-packages-list">
                                                                                    <div class="all-pckgs-sec">
                                                                                        <div class="wp-rem-pkg-holder">
                                                                                            <div class="wp-rem-pkg-header">
                                                                                                <div class="pkg-title-price pull-left">
                                                                                                    <label class="pkg-title">Anatrang Gupta(Individual)</label>
                                                                                <!-- 
                                                                                    <span class="pkg-price"><strong>Price</strong> <span> : $0</span> </span> -->

                                                                                    <span class="pkg-expiry"><strong>09007938136</strong></span>
                                                                                    <span class="pkg-properties"><strong>anatarang@gmail.com</strong> </span>
                                                                                </div>
                                                                                <div class="pkg-detail-btn pull-right">
                                                                                    <a href="#">Verified</a>
                                                                                </div>
                                                                                </div>

                                                                                </div>
                                                                                </div>
                                                                                </div>

                                                                                <div class="user-packages-list">
                                                                                    <div class="all-pckgs-sec">
                                                                                        <div class="wp-rem-pkg-holder">
                                                                                            <div class="wp-rem-pkg-header">
                                                                                                <div class="pkg-title-price pull-left">

                                                                                                    <span class="pkg-price"><strong>Properties Id</strong> <span> : 38139347 |</span> </span>
                                                                                                    <span class="pkg-expiry"><strong>2 BHK Multistorey Apartment For Rent In Maheshtala </strong>
                                                                                                        <span>Posted : Aug 11,'19 | Posted by: Prakash </span></span>

                                                                                                    </div>
                                                                                <!--  <div class="pkg-detail-btn pull-right">
                                                                                <a class="wp-rem-dev-dash-detail-pkg" href="#">Detail</a>
                                                                                </div> -->
                                                                                </div>
                                                                                <div class="property-info-sec">
                                                                                    <div class="row">
                                                                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                                            <ul class="property-pkg-points">
                                                                                                <li><label>Expiry Date</label><span>September 17, 2020 </span></li>
                                                                                                <li><label>Properties</label><span>0/1</span></li>
                                                                                                <li><label>Properties Duration</label><span>15 Days</span></li>
                                                                                                <li><label>Featured Properties</label><span>0</span></li>
                                                                                                <li><label>Top Category Properties</label><span>0</span></li>
                                                                                                <li><label>Number of Pictures</label><span>3 </span></li>
                                                                                                <li><label>Number of Documents</label><span>3 </span></li>
                                                                                                <li><label>Number of Tags</label><span>3 </span></li>
                                                                                                <li><label>Phone Number</label><span><i class="icon-check"></i></span></li>
                                                                                                <li><label>Website Link</label><span>off </span></li>
                                                                                                <li><label>Social Impressions Reach</label><span>off </span></li>
                                                                                            </ul>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                </div>
                                                                                </div>
                                                                                </div>
                                                                                </div>
                                                                        </div>

                                                                        <div id="pending1" class="col-lg-12 col-md-12 col-sm-12 col-xs-12 property tab-pane fade" >
                                                                                <div class="user-holder">

                                                                                    <div class="user-packages-list">
                                                                                        <div class="all-pckgs-sec">
                                                                                            <div class="wp-rem-pkg-holder">
                                                                                                <div class="wp-rem-pkg-header">
                                                                                                    <div class="pkg-title-price pull-left">
                                                                                                        <label class="pkg-title">Anatrang Gupta(Individual)</label>
                                                                            <!-- 
                                                                                <span class="pkg-price"><strong>Price</strong> <span> : $0</span> </span> -->

                                                                                <span class="pkg-expiry"><strong>09007938136</strong></span>
                                                                                <span class="pkg-properties"><strong>anatarang@gmail.com</strong> </span>
                                                                            </div>
                                                                            <div class="pkg-detail-btn pull-right">
                                                                                <a href="#">Verified</a>
                                                                            </div>
                                                                            </div>

                                                                            </div>
                                                                            </div>
                                                                            </div>

                                                                            <div class="user-packages-list">
                                                                                <div class="all-pckgs-sec">
                                                                                    <div class="wp-rem-pkg-holder">
                                                                                        <div class="wp-rem-pkg-header">
                                                                                            <div class="pkg-title-price pull-left">
                                                                                                <label class="pkg-title">Anatrang Gupta(Individual)</label>
                                                                            <!-- 
                                                                                <span class="pkg-price"><strong>Price</strong> <span> : $0</span> </span> -->

                                                                                <span class="pkg-expiry"><strong>09007938136</strong></span>
                                                                                <span class="pkg-properties"><strong>anatarang@gmail.com</strong> </span>
                                                                            </div>
                                                                            <div class="pkg-detail-btn pull-right">
                                                                                <a href="#">Verified</a>
                                                                            </div>
                                                                            </div>

                                                                            </div>
                                                                            </div>
                                                                            </div>

                                                                            <div class="user-packages-list">
                                                                                <div class="all-pckgs-sec">
                                                                                    <div class="wp-rem-pkg-holder">
                                                                                        <div class="wp-rem-pkg-header">
                                                                                            <div class="pkg-title-price pull-left">

                                                                                                <span class="pkg-price"><strong>Properties Id</strong> <span> : 38139347 |</span> </span>
                                                                                                <span class="pkg-expiry"><strong>2 BHK Multistorey Apartment For Rent In Maheshtala </strong>
                                                                                                    <span>Posted : Aug 11,'19 | Posted by: Prakash </span></span>

                                                                                                </div>
                                                                            <!--  <div class="pkg-detail-btn pull-right">
                                                                            <a class="wp-rem-dev-dash-detail-pkg" href="#">Detail</a>
                                                                            </div> -->
                                                                            </div>
                                                                            <div class="property-info-sec">
                                                                                <div class="row">
                                                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                                        <ul class="property-pkg-points">
                                                                                            <li><label>Expiry Date</label><span>September 17, 2020 </span></li>
                                                                                            <li><label>Properties</label><span>0/1</span></li>
                                                                                            <li><label>Properties Duration</label><span>15 Days</span></li>
                                                                                            <li><label>Featured Properties</label><span>0</span></li>
                                                                                            <li><label>Top Category Properties</label><span>0</span></li>
                                                                                            <li><label>Number of Pictures</label><span>3 </span></li>
                                                                                            <li><label>Number of Documents</label><span>3 </span></li>
                                                                                            <li><label>Number of Tags</label><span>3 </span></li>
                                                                                            <li><label>Phone Number</label><span><i class="icon-check"></i></span></li>
                                                                                            <li><label>Website Link</label><span>off </span></li>
                                                                                            <li><label>Social Impressions Reach</label><span>off </span></li>
                                                                                        </ul>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            </div>
                                                                            </div>
                                                                            </div>
                                                                            </div>
                                                                        </div>

                                                                        <div id="rejected1" class="col-lg-12 col-md-12 col-sm-12 col-xs-12 property tab-pane fade" >
                                                                                <div class="user-holder">

                                                                                    <div class="user-packages-list">
                                                                                        <div class="all-pckgs-sec">
                                                                                            <div class="wp-rem-pkg-holder">
                                                                                                <div class="wp-rem-pkg-header">
                                                                                                    <div class="pkg-title-price pull-left">
                                                                                                        <label class="pkg-title">Anatrang Gupta(Individual)</label>
                                                                            <!-- 
                                                                                <span class="pkg-price"><strong>Price</strong> <span> : $0</span> </span> -->

                                                                                <span class="pkg-expiry"><strong>09007938136</strong></span>
                                                                                <span class="pkg-properties"><strong>anatarang@gmail.com</strong> </span>
                                                                            </div>
                                                                            <div class="pkg-detail-btn pull-right">
                                                                                <a href="#">Verified</a>
                                                                            </div>
                                                                            </div>

                                                                            </div>
                                                                            </div>
                                                                            </div>

                                                                            <div class="user-packages-list">
                                                                                <div class="all-pckgs-sec">
                                                                                    <div class="wp-rem-pkg-holder">
                                                                                        <div class="wp-rem-pkg-header">
                                                                                            <div class="pkg-title-price pull-left">
                                                                                                <label class="pkg-title">Anatrang Gupta(Individual)</label>
                                                                            <!-- 
                                                                                <span class="pkg-price"><strong>Price</strong> <span> : $0</span> </span> -->

                                                                                <span class="pkg-expiry"><strong>09007938136</strong></span>
                                                                                <span class="pkg-properties"><strong>anatarang@gmail.com</strong> </span>
                                                                            </div>
                                                                            <div class="pkg-detail-btn pull-right">
                                                                                <a href="#">Verified</a>
                                                                            </div>
                                                                            </div>

                                                                            </div>
                                                                            </div>
                                                                            </div>

                                                                            <div class="user-packages-list">
                                                                                <div class="all-pckgs-sec">
                                                                                    <div class="wp-rem-pkg-holder">
                                                                                        <div class="wp-rem-pkg-header">
                                                                                            <div class="pkg-title-price pull-left">
                                                                                                <span class="pkg-price"><strong>Properties Id</strong> <span> : 38139347 |</span> </span>
                                                                                                <span class="pkg-expiry"><strong>2 BHK Multistorey Apartment For Rent In Maheshtala </strong>
                                                                                                    <span>Posted : Aug 11,'19 | Posted by: Prakash </span></span>
                                                                                                </div>
                                                                            </div>
                                                                            <div class="property-info-sec">
                                                                                <div class="row">
                                                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                                        <ul class="property-pkg-points">
                                                                                            <li><label>Expiry Date</label><span>September 17, 2020 </span></li>
                                                                                            <li><label>Properties</label><span>0/1</span></li>
                                                                                            <li><label>Properties Duration</label><span>15 Days</span></li>
                                                                                            <li><label>Featured Properties</label><span>0</span></li>
                                                                                            <li><label>Top Category Properties</label><span>0</span></li>
                                                                                            <li><label>Number of Pictures</label><span>3 </span></li>
                                                                                            <li><label>Number of Documents</label><span>3 </span></li>
                                                                                            <li><label>Number of Tags</label><span>3 </span></li>
                                                                                            <li><label>Phone Number</label><span><i class="icon-check"></i></span></li>
                                                                                            <li><label>Website Link</label><span>off </span></li>
                                                                                            <li><label>Social Impressions Reach</label><span>off </span></li>
                                                                                        </ul>
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
                                            </div>
                                            <!-- my Response -->



                                            <!-- my favourite-->
                                            <div id="my-favourite" class="user-profile tab-pane fade">
                                                <div class="user-account-holder loader-holder">
                                                    <div class="user-holder">
                                                        <div class="user-favorite-list">
                                                            <div class="element-title"><h4>Favourite Properties</h4></div>
                                                            <ul class="favourites-list">
                                                                <?php if(!empty($list_my_favourite_project)){ ?>
                                                                <?php foreach($list_my_favourite_project as $favourite){ ?>
                                                                <li>
                                                                    <div class="suggest-list-holder">
                                                                        <div class="img-holder">
                                                                            <figure><img src="<?php echo base_url(); ?><?php echo $favourite->image_file; ?>" alt=""></figure>
                                                                        </div>
                                                                        <div class="text-holder">
                                                                            <h6><a href="<?php echo base_url(); ?>home/see_details/project/<?php echo $favourite->post_id; ?>"><?php echo $favourite->Marketingby; ?></a></h6>
                                                                            <span class="rent-label"><a href="<?php echo base_url(); ?>home/see_details/project/<?php echo $favourite->post_id; ?>"><?php echo $favourite->propertyTypeCom; ?></a></span>
                                                                            <!--<a href="<?php echo base_url(); ?>home/delete_my_favourite_project/<?php echo $favourite->post_id; ?>" class="short-icon delete-favourite" data-id="5965"><i class="icon-close"></i></a>-->
                                                                            <a href="<?php echo base_url(); ?>home/delete_my_favourite_project/<?php echo $favourite->post_id; ?>" class="short-icon " onclick="return confirm('Do you want to remove this from favorite?');" data-id="5965"><i class="icon-close"></i></a>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <?php } ?>
                                                                <?php } ?>
                                                                
                                                                <?php if(!empty($list_my_favourite_property)){ ?>
                                                                <?php foreach($list_my_favourite_property as $favourite){ ?>
                                                                <li>
                                                                    <div class="suggest-list-holder">
                                                                        <div class="img-holder">
                                                                            <figure><img src="<?php echo base_url(); ?><?php echo $favourite->image_name; ?>" alt=""></figure>
                                                                        </div>
                                                                        <div class="text-holder">
                                                                            <h6><a href="<?php echo base_url(); ?>home/see_details/property/<?php echo $favourite->post_id; ?>"><?php echo $favourite->name; ?></a></h6>
                                                                            <span class="rent-label"><a href="<?php echo base_url(); ?>home/see_details/property/<?php echo $favourite->post_id; ?>"><?php echo $favourite->residential; ?></a></span>
                                                                            <!--<a href="<?php echo base_url(); ?>home/delete_my_favourite_property/<?php echo $favourite->post_id; ?>" class="short-icon delete-favourite" data-id="5965"><i class="icon-close"></i></a>-->
                                                                            <a href="<?php echo base_url(); ?>home/delete_my_favourite_property/<?php echo $favourite->post_id; ?>" onclick="return confirm('Do you want to remove this from favorite?');" class="short-icon" data-id="5965"><i class="icon-close"></i></a>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <?php } ?>
                                                                <?php } ?>    
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="wp_rem_loader" style="display: none;"><div class="loader-img"><i class="icon-spinner8"></i></div></div>
                                                </div>
                                            </div>
                                            <!-- my favourite close-->

                                            <!-- subscription -->
                                            <div id="subscription" class="user-profile tab-pane fade">
                                                <div class="user-account-holder loader-holder">
                                                    <div class="user-holder" style="padding: 0;border: 0;">
                                                        <div class="row">
                                                            <ul id="property-membership-info-main" class="membership-info-main" style="    margin: 0;">
                                                                <li>
                                                                    <div class="row">
                                                                        <div class="packages-main-holder">
                                                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                                <div class="dir-new-packages">
                                                                                    <div class="all-pckgs-sec table-responsive">
                                                                                        <section class="pricing-section">
                                                                                            <div class="container">
                                                                                                <div class="outer-box">

                                                                                                    <?php if($user_details->subscription == 1 && !empty($user_details->sub_id))
                                                                                                    {
                                                                                                        $row = $this->common_model->getdata(array('id' => $user_details->sub_id),'subscriptions'); ?>
                                                                                                    <h2>Active Package</h2>
                                                                                                        <div class="row" style = "justify-content: normal;">
                                                                                                            <div class="pricing-block col-lg-4 col-md-6 col-sm-12 wow fadeInUp">
                                                                                                                <div class="inner-box">       
                                                                                                                    <div class="price-box">
                                                                                                                        <div class="title"> <?php echo $row[0]->name; ?></div>
                                                                                                                        <h4 class="price">Rs. <?php echo $row[0]->price; ?></h4>
                                                                                                                    </div>
                                                                                                                    <ul class="features">
                                                                                                                        <li>Available Listing:- <b><?php echo $user_details->leads_pending; ?></b></li>
                                                                                                                   
                                                                                                                    <?php $array = explode(',', $row[0]->subElements);
                                                                                                                    foreach($array as $list){
                                                                                                                        $details = $this->common_model->getdatabyid(array('id' => $list),'tblSubElements');?>
                                                                                                                        <li><i class="material-icons">check_circle</i><?php echo $details->name;?></li>
                                                                                                                    <?php }?>
                                                                                                                    </ul>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div><br><br>
                                                                                                    <?php }?>
                                                                                                    <div class="header">
                                                                                                        <h1>Choose a Plan and <span class="highlight">SAVE THOUSANDS</span> on Brokerage</h1>
                                                                                                    </div>
                                                                                                    <div class="row" style = "justify-content: flex-start;">   
                                                                                                        <?php foreach ($list_subscriptions as $mainList) {?>
                                                                                                            <div class="subscription-card">
                                                                                                                <h5><?php echo $mainList->name; ?></h5>
                                                                                                                <p class="price"><span class="original-price"><?php if ($mainList->oldPrice != 0) {?>₹<?php echo number_format($mainList->oldPrice, 2);}?></span> ₹<?php echo number_format($mainList->price, 2)?> + 18% GST</p>
                                                                                                                <p>Get genuine house owner contacts matching your requirements</p>
                                                                                                                <ul class="features">
                                                                                                                    <?php $array = explode(',', $mainList->subElements);
                                                                                                                    foreach($array as $list){
                                                                                                                        $details = $this->common_model->getdatabyid(array('id' => $list),'tblSubElements');?>
                                                                                                                        <li><i class="material-icons">check_circle</i><?php echo $details->name;?></li>
                                                                                                                    <?php }?>
                                                                                                                </ul>


                                                                                                                <button class="btn-subscribe" onclick="GetSubscriptionDetails(<?php echo $mainList->id; ?>)" data-amount="<?php echo $mainList->price; ?>" data-id="">See Details</button>
                                                                                                            </div>
                                                                                                        <?php }?>
                                                                                                    </div>

                                                                                                </div>
                                                                                            </div>
                                                                                        </section>

                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Subscription End -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
</div>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/front/js/jquery.prettyPhoto.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/front/js/lightbox.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/front/js/swiper.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/front/js/chosen.select.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/front/js/bootstrap-slider.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/front/js/moment.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/front/js/daterangepicker.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/front/js/croppic.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/front/js/responsive-calendar.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/front/js/flexslider.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/front/js/donut-pie-chart.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/front/js/fitvids.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/front/js/responsive.menu.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/front/js/functions.js"></script>



<!-- switch popup -->


<div class="modal fade" id="switch1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="login-form">
            <div class="modal-content">
                <h4 style="text-align: center;margin: 15px 15px;border-bottom: 1px solid #50aeed;padding-bottom: 12px;font-weight: bold !important;padding-top: 12px;">Switch to Property-wise display</h4>
                <div class="tab-content">

                    <div id="user-login-tab-98956111" class="tab-pane fade active in">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true"><i class="icon- icon-close2"></i></span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="user-packages-list">
                                <div class="all-pckgs-sec">
                                    <div class="wp-rem-pkg-holder">
                                        <div class="wp-rem-pkg-header" style="    border-bottom: 0;">
                                            <div class="pkg-title-price pull-left">

                                                <span class="pkg-price"><strong>Properties Id</strong> <span> : 38139347 |</span> </span>
                                                <span class="pkg-expiry"><strong>2 BHK Multistorey Apartment For Rent In Maheshtala </strong>
                                                    <span>Posted : Aug 11,'19 | Posted by: Prakash </span></span>

                                            </div>

                                        </div>
                                        <div class="property-info-sec" style="padding: 0;border-top: 0;padding-bottom: 20px;">
                                            <div class="row  resc1">
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                    <div class="col-md-12 responsive-1">
                                                        <div class="col-md-3">
                                                            <p>Response Received Form</p>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <p>Contact Details</p>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <p>Received On</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <ul class="property-pkg-points11">
                                                            <li>
                                                                <div class="col-md-3">
                                                                    <p>Antarang Gupta (1)</p>
                                                                    <p>Individual</p>
                                                                    <a href="#">Read Message</a>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <p>01122334455</p>
                                                                    <p>antarang@gmail.com</p>
                                                                    <a href="#">Call atarang Gupta. Save requirments on Smart Diary</a>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <p>Aug 12, '19</p>
                                                                    <a href="#">Block the Sender</a>
                                                                </div>
                                        
                                        
                                                            </li>
                                                            <li>
                                                                <div class="col-md-3">
                                                                    <p>Antarang Gupta (1)</p>
                                                                    <p>Individual</p>
                                                                    <a href="#">Read Message</a>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <p>01122334455</p>
                                                                    <p>antarang@gmail.com</p>
                                                                    <a href="#">Call atarang Gupta. Save requirments on Smart Diary</a>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <p>Aug 12, '19</p>
                                                                    <!-- <a href="#">Block the Sender</a> -->
                                                                </div>
                                        
                                        
                                                            </li>
                                                            <li>
                                                                <div class="col-md-3">
                                                                    <p>Antarang Gupta (1)</p>
                                                                    <p>Individual</p>
                                                                    <a href="#">Read Message</a>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <p>01122334455</p>
                                                                    <p>antarang@gmail.com</p>
                                                                    <a href="#">Call atarang Gupta. Save requirments on Smart Diary</a>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <p>Aug 12, '19</p>
                                                                    <!-- <a href="#">Block the Sender</a> -->
                                                                </div>
                                        
                                        
                                                            </li>
                                                        </ul>
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


<div class="modal fade" id="property_responses" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="login-form">
            <div class="modal-content">
                <h4 style="text-align: center;margin: 15px 15px;border-bottom: 1px solid #50aeed;padding-bottom: 12px;font-weight: bold !important;padding-top: 12px;">Property Responses</h4>
                <div class="tab-content">

                    <div id="user-login-tab-98956111" class="tab-pane fade active in">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true"><i class="icon- icon-close2"></i></span>
                            </button>
                        </div>
                        <div class="modal-body" id="property_responses_div">
                            <div class="user-packages-list">
                                <div class="all-pckgs-sec">
                                    <div class="wp-rem-pkg-holder">
                                        <div class="wp-rem-pkg-header" style="    border-bottom: 0;">
                                            <div class="pkg-title-price pull-left">

                                                <span class="pkg-price"><strong>Properties Id</strong> <span> : 38139347 |</span> </span>
                                                <span class="pkg-expiry"><strong>2 BHK Multistorey Apartment For Rent In Maheshtala </strong>
                                                    <span>Posted : Aug 11,'19 | Posted by: Prakash </span></span>

                                            </div>

                                        </div>
                                        <div class="property-info-sec" style="padding: 0;border-top: 0;padding-bottom: 20px;">
                                            <div class="row  resc1">
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                    <div class="col-md-12 responsive-1">
                                                        <div class="col-md-3">
                                                            <p>Response Received Form</p>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <p>Contact Details</p>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <p>Received On</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <ul class="property-pkg-points11">
                                                            <li>
                                                                <div class="col-md-3">
                                                                    <p>Antarang Gupta (1)</p>
                                                                    <p>Individual</p>
                                                                    <a href="#">Read Message</a>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <p>01122334455</p>
                                                                    <p>antarang@gmail.com</p>
                                                                    <a href="#">Call atarang Gupta. Save requirments on Smart Diary</a>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <p>Aug 12, '19</p>
                                                                    <a href="#">Block the Sender</a>
                                                                </div>
                                        
                                        
                                                            </li>
                                                            <li>
                                                                <div class="col-md-3">
                                                                    <p>Antarang Gupta (1)</p>
                                                                    <p>Individual</p>
                                                                    <a href="#">Read Message</a>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <p>01122334455</p>
                                                                    <p>antarang@gmail.com</p>
                                                                    <a href="#">Call atarang Gupta. Save requirments on Smart Diary</a>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <p>Aug 12, '19</p>
                                                                    <!-- <a href="#">Block the Sender</a> -->
                                                                </div>
                                        
                                        
                                                            </li>
                                                            <li>
                                                                <div class="col-md-3">
                                                                    <p>Antarang Gupta (1)</p>
                                                                    <p>Individual</p>
                                                                    <a href="#">Read Message</a>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <p>01122334455</p>
                                                                    <p>antarang@gmail.com</p>
                                                                    <a href="#">Call atarang Gupta. Save requirments on Smart Diary</a>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <p>Aug 12, '19</p>
                                                                    <!-- <a href="#">Block the Sender</a> -->
                                                                </div>
                                        
                                        
                                                            </li>
                                                        </ul>
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




<!-- switch popup end -->






<!-- download response -->

<div class="modal fade" id="download-response" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="login-form">
            <div class="modal-content">
                <h4 style="text-align: center;margin: 15px 15px;border-bottom: 1px solid #50aeed;padding-bottom: 12px;font-weight: bold !important;padding-top: 12px;">Download Response Now</h4>
                <div class="tab-content">

                    <div id="user-login-tab-98956111" class="tab-pane fade active in">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true"><i class="icon- icon-close2"></i></span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="user-packages-list">
                                <div class="all-pckgs-sec">
                                    <div class="wp-rem-pkg-holder">
                                        <div class="wp-rem-pkg-header" style="border-bottom: 0;">
                                            <div class="pkg-title-price">

                                                <form method="post">
                                                    <div class="row">
                                                        <div class="col-md-2">
                                                            <p>Filter By: </p>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <select class="form-control">
                                                                <option>My Responses</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <button type="submit" class="btn btn-primary">Go</button>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <p>Start Date*:</p>
                                                        <input type="date" name="s_date" />
                                                        <p>End Date*:</p>
                                                        <input type="date" name="e_date" />
                                                    </div>
                                                    <div class="row"><br>
                                                        <div class="col-sm-12">
                                                            <button class="btn btn-danger">Download</button>
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
            </div>
        </div>
    </div>
</div>

<div class="page-section">
    <div class="container">
        <div class="row">
            <div id="id_confrmdiv">
                <div class="cs-confirm-container">
                    <i class="icon-sad"></i>
                    <div class="message">You Want To Delete?</div>
                    <a href="javascript:void(0);" id="id_truebtn">Yes, Delete</a>
                    <a href="javascript:void(0);" id="id_falsebtn">No, Cancel</a>
                </div>
            </div>
        </div>
    </div>
</div>



  
  
  
</div>


<script>
    function load_property_responses(response_type, property_type, post_id){
        $.ajax({
            type:'post',
            url:'<?php echo base_url(); ?>home/get_property_responses',
            data:{response_type:response_type, property_type:property_type, post_id:post_id},
            success:function(data){
                $('#property_responses_div').html(data);
                $('#property_responses').modal();
            }
        })
    }
    
    function load_bank(bank){
        $.ajax({
           url:'<?php echo base_url(); ?>home/get_bank',
           type:'post',
           data:{'bank':bank},
           success:function(data){
               set_bank(data);
           }
        });
    }
    
    function set_bank(data){
         availableTags = JSON.parse(data); 
             $( "#bank_name" ).autocomplete({
          source: availableTags
        });
    }
</script>

