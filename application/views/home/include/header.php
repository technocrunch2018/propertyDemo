<!DOCTYPE html>
<html lang="en-US">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="format-detection" content="telephone=no">
    <link rel="shortcut icon" href="<?php echo base_url();?>assets/front/img/fav.webp">
    <title>Property Fellows - Property Search Engine</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    
    <!-- Autocomplete -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/front/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/front/css/bootstrap-theme.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/front/css/bootstrap-slider.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/front/css/chosen.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/front/css/fonts/flaticon.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/front/css/flexslider.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/front/css/style.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/front/css/smart-forms.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/front/css/wp-rem-plugin.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/front/css/responsive.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/front/css/daterangepicker.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/front/css/color.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/front/css/iconmoon.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/front/css/prettyPhoto.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/front/css/swiper.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/front/css/croppic.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/front/css/style-animate.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/front/css/widget.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/front/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/front/css/owl.theme.default.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    
    
    
    
    
    
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/front/css/step-form.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,500;0,600;0,700;0,800;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
    
    <meta name="google-site-verification" content="PMhC7ezPwQYjqrbD0sqhy8RcC3Z6tTu7qxHG0_OVjQ8" />
</head>
<style>
        .header {
            text-align: center;
            margin-bottom: 30px;
        }
        .header h1 {
            font-size: 36px;
            color: #333;
        }
        .header .highlight {
            background-color: #ed6950;
            color: white;
            padding: 5px;
            border-radius: 5px;
            display: inline-block;
            font-weight: bold;
            margin-bottom: 10px;
        }
        .row {
            display: flex;
            justify-content: flex-end;
            flex-wrap: wrap;
        }

        .subscription-card {
            background-color: white;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            border-radius: 10px;
            margin: 10px;
            padding: 20px;
            flex: 0 0 30%;
            box-sizing: border-box;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }
        .subscription-card h5 {
            text-align: center;
            font-size: 1.5rem;
            margin-bottom: 20px;
        }
        .subscription-card .price {
            text-align: center;
            font-size: 2rem;
            margin: 10px 0;
            color: #28a745;
        }
        .subscription-card .price .original-price {
            text-decoration: line-through;
            color: #666;
        }
        .subscription-card p {
            text-align: center;
            color: #666;
            font-size: 0.9rem;
        }
        .features {
            list-style: none;
            padding: 0;
            margin-bottom: 20px;
        }
        .features li {
            margin-bottom: 10px;
            display: flex;
            align-items: center;
        }
        .features li i {
            margin-right: 10px;
            color: #ed6950;
        }
        .btn-subscribe {
            background-color: #ed6950;
            border: none;
            color: white;
            padding: 10px 20px;
            text-transform: uppercase;
            font-weight: bold;
            border-radius: 5px;
            transition: background-color 0.3s ease;
            width: 100%;
            text-align: center;
            cursor: pointer;
        }
        .btn-subscribe:hover {
            background-color: #d97b29;
        }
        .support {
            font-size: 0.9rem;
            color: #666;
            margin-top: 20px;
            text-align: center;
        }
        .support a {
            color: #ed6950;
            text-decoration: none;
        }
        .support a:hover {
            text-decoration: underline;
        }
        @media (max-width: 768px) {
            .subscription-card {
                flex: 0 0 100%;
            }
        }
        @media (max-width: 1200px) {
            .card {
                max-width: 48%;
            }
        }

        @media (max-width: 768px) {
            .card {
                max-width: 100%;
            }
        }

        @media (max-width: 480px) {
            .header h1 {
                font-size: 28px;
            }

            .price {
                font-size: 1.5rem;
            }

            .features li {
                font-size: 0.9rem;
            }

            .btn-subscribe {
                font-size: 0.9rem;
                padding: 8px 16px;
            }
        }
        @media (max-width: 400px) {
            .container {
                padding: 10px;
            }

            .header h1 {
                font-size: 24px;
                margin-bottom: 15px;
            }

            .card {
                padding: 15px;
                margin: 5px 0;
            }

            .card h5 {
                font-size: 1.2rem;
                margin-bottom: 15px;
            }

            .price {
                font-size: 1.2rem;
                margin: 5px 0;
            }

            .features li {
                font-size: 0.8rem;
            }

            .btn-subscribe {
                font-size: 0.8rem;
                padding: 6px 10px;
            }

            .support {
                font-size: 0.8rem;
            }
        }
    </style>
<body class="home wp-rem">
    <!-- Pre Loader -->
    <div id="dvLoading" style="display:none;">
        <div id="white-box">
            <img src="<?php echo base_url('assets/front/img/loader.svg'); ?>">
        </div>
    </div>
    
    <div class="modal fade" id="processing_gif" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="login-form">
                <div class="modal-content">
                    <div id=""><img src="<?php echo base_url(); ?>assets/front/img/processing.gif"></div>
                    <!--<h4 style="text-align: center;margin: 20px 0 15px;border-bottom: 1px solid #0089d0;padding: 20px 0 12px;font-weight: bold !important;">LogIn</h4>-->
                    <!--<div class="tab-content">-->
                    <!--    <ul class="nav nav-tabs">-->
                    <!--        <li class="active">-->
                    <!--            <a data-toggle="tab" href="#user-login-tab-9895611" id="myModalLabel11" class="user-tab-login" aria-expanded="false">User</a>-->
                    <!--        </li>-->
                    <!--        <li>-->
                    <!--            <a data-toggle="tab" href="#user-register-9895611" class="user-tab-register" aria-expanded="true">Lead Partner</a>-->
                    <!--        </li>-->
                    <!--    </ul>-->
                    <!--    <div id="user-login-tab-9895611" class="tab-pane fade active in">-->
                    <!--        <div class="modal-header">-->
                    <!--            <button type="button" class="close" data-dismiss="modal" aria-label="Close">-->
                    <!--                <span aria-hidden="true"><i class="icon- icon-close2"></i></span>-->
                    <!--            </button>-->
                    <!--        </div>-->
                    <!--        <div class="modal-body">-->
                                
                                <!------ Forgot Area For User ----------------->
                    <!--             <div class="content-style-form cs-forgot-pbox-98956 content-style-form-2" id="forgot-popup-user" style="display: none;">-->
                                    
                    <!--                <div class="row">-->
                    <!--                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">-->
                    <!--                        <span class="wp-rem-dev-login-forget-txt">Forgot Password</span>-->
                    <!--                        <span class="wp-rem-dev-login-box-t-txt">Login To Your Account</span>-->
                    <!--                        <div class="login-form-id-58968687">-->
                                                
                    <!--                            <div class="intro-form">-->
                    <!--                                <form method="post" action="<?php echo base_url(); ?>home/send_user_forgot_password_mail" id="user-forgot-password-form" name="user-forgot-password-form">-->

                    <!--                                    <div class="form-group">-->
                    <!--                                        <input type="text" name="user_forgot_email" id="user_forgot_email" value="" placeholder="Email" required>-->
                    <!--                                    </div>-->

                    <!--                                    <div style="width:100%" class="form-group">-->
                    <!--                                        <button type="submit" class="intro-btn-red">Send Email</button>-->
                    <!--                                    </div>-->

                    <!--                                    <div class="forget-password">-->
                    <!--                                        <i class="icon-help"></i><a href="javascript:void(0)" id="forgot-close-user" class="cs-forgot-switch">Go back</a>-->
                    <!--                                    </div>-->

                    <!--                                </form>-->
                    <!--                            </div>-->
                                                
                    <!--                        </div>-->
                    <!--                    </div>-->
                    <!--                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">-->
                    <!--                        <div class="login-detail">-->
                    <!--                            <h2>Need more Help?</h2>-->
                    <!--                            <p>You Can Create Password using your Register <a href="#forgot-phone-number" class="user-tab-login" style="font-size:11px;">Phone Number</a></p>-->
                    <!--                        </div>-->
                    <!--                    </div>-->
                    <!--                </div>-->
                    <!--            </div> -->
                    <!--            <div class="cs-login-pbox-98956 login-form-id-98956" id="login-return">-->
                                    
                    <!--                <div class="intro-form">-->
                    <!--                    <form method="post" action="<?php echo base_url(); ?>home/check_user_login" id="user-login-form">-->

                    <!--                        <div class="form-group">-->
                    <!--                            <input type="text" name="email" id="email" value="" placeholder="Email" required>-->
                    <!--                        </div>-->

                    <!--                        <div class="form-group">-->
                    <!--                            <input type="password" name="password" id="password" value="" placeholder="Password" required>-->
                    <!--                        </div>-->

                    <!--                        <div class="smart-forms">                         -->
                    <!--                            <div class="section">-->
                    <!--                                <label class="field option block" style="margin-top: -15px;margin-bottom: 15px;">-->
                    <!--                                    <input type="checkbox" name="terms">-->
                    <!--                                    <span class="checkbox"></span> Remember me                 -->
                    <!--                                </label>-->
                    <!--                            </div><!-- end section -->-->
                    <!--                        </div><!-- end .smart-forms section -->-->

                    <!--                        <div style="width:100%" class="form-group">-->
                    <!--                            <button type="submit" class="intro-btn-red">LogIn Now</button>-->
                    <!--                        </div>-->

                    <!--                        <div class="forget-password">-->
                    <!--                            <i class="icon-help"></i><a href="javascript:void(0)" id="forgot-open-user" class="cs-forgot-switch">Forgot Password?</a>-->
                    <!--                        </div>-->

                    <!--                    </form>-->
                    <!--                </div>                                   -->
                                    
                    <!--            </div>-->
                    <!--        </div>-->
                    <!--    </div>-->
                    <!--    <div id="user-register-9895611" class="tab-pane fade">-->
                    <!--        <div class="modal-header">-->
                    <!--            <button type="button" class="close" data-dismiss="modal" aria-label="Close">-->
                    <!--                <span aria-hidden="true"><i class="icon- icon-close2"></i></span>-->
                    <!--            </button>-->
                    <!--        </div>-->
                    <!--        <div class="modal-body">-->
                                <!------ Forgot Area For Lead Prtner ----------------->
                    <!--            <div class="content-style-form cs-forgot-pbox-98957 content-style-form-2"  id="forgot-popup-lead" style="display: none;">-->
                                    
                    <!--                <div class="row">-->
                    <!--                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">-->
                    <!--                        <span class="wp-rem-dev-login-forget-txt">Forgot Password</span>-->
                    <!--                        <span class="wp-rem-dev-login-box-t-txt">Login To Your Account</span>-->
                    <!--                        <div class="login-form-id-58968687">-->
                                                
                    <!--                            <div class="intro-form">-->
                    <!--                                <form method="post" action="<?php echo base_url(); ?>home/send_lead_partner_forgot_password_mail" id="lead-partner-forgot-password-form" name="lead-partner-forgot-password-form">-->

                    <!--                                    <div class="form-group">-->
                    <!--                                        <input type="text" name="lead_email" id="lead_email" value="" placeholder="Email" required>-->
                    <!--                                    </div>-->

                    <!--                                    <div style="width:100%" class="form-group">-->
                    <!--                                        <button type="submit" class="intro-btn-red">Send Email</button>-->
                    <!--                                    </div>-->

                    <!--                                    <div class="forget-password">-->
                    <!--                                        <i class="icon-help"></i><a href="javascript:void(0)" id="forgot-close-lead" class="cs-forgot-switch">Go back</a>-->
                    <!--                                    </div>-->

                    <!--                                </form>-->
                    <!--                            </div>-->
                                                
                    <!--                        </div>-->
                    <!--                    </div>-->
                    <!--                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">-->
                    <!--                        <div class="login-detail">-->
                    <!--                            <h2>Need more Help?</h2>-->
                    <!--                            <p>You Can Create Password using your Register <a href="#forgot-phone-number" class="user-tab-login" style="font-size:11px;">Phone Number</a></p>-->
                    <!--                        </div>-->
                    <!--                    </div>-->
                    <!--                </div>-->
                    <!--            </div> -->
                                
                                
                    <!--            <div  id="lead-return" role="tabpanel" class="tab-pane active">-->
                                    
                    <!--                <div class="intro-form">-->
                    <!--                    <form method="post" action="<?php echo base_url(); ?>home/check_lead_partner_login" id="lead-partner-login-form">-->

                    <!--                        <div class="form-group">                                           -->
                    <!--                            <input type="text" name="email" id="email" value="" placeholder="Email" required>-->
                    <!--                        </div>-->

                    <!--                        <div class="form-group">-->
                    <!--                            <input type="password" name="password" id="password" value="" placeholder="Password" required>-->
                    <!--                        </div>-->

                    <!--                        <div class="smart-forms">                         -->
                    <!--                            <div class="section">-->
                    <!--                                <label class="field option block" style="margin-top: -15px;margin-bottom: 15px;">-->
                    <!--                                    <input type="checkbox" name="terms">-->
                    <!--                                    <span class="checkbox"></span> Remember me </a>-->
                    <!--                                </label>-->
                    <!--                            </div><!-- end section -->-->
                    <!--                        </div><!-- end .smart-forms section -->-->

                    <!--                        <div style="width:100%" class="form-group">-->
                    <!--                            <button type="submit" class="intro-btn-red">LogIn Now</button>-->
                    <!--                        </div>-->

                    <!--                        <div class="forget-password">-->
                    <!--                            <i class="icon-help"></i><a href="javascript:void(0)" id="forgot-open-lead" class="cs-forgot-switch">Forgot Password?</a>-->
                    <!--                        </div>-->

                    <!--                    </form>-->
                    <!--                </div>-->
                                    
                    <!--            </div>-->
                                <!-- <span class="loader"></span> -->
                    <!--        </div>-->
                    <!--    </div>-->
                    <!--</div>-->
                </div>
            </div>
        </div>
    </div>
    
    <div class="wrapper wrapper-full_width">
        <div id="overlay"></div>
        <header id="header" class="header1 has-mega-menu">
            <div class="main-header">
                <div class="top-header">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                <div class="logo">
                                    <figure>
                                        <a href="<?php echo base_url();?>">
                                            <img src="<?php echo base_url();?>assets/front/img/main-logo.webp" alt="#">
                                        </a>
                                    </figure>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 hidden-xs">
                                <div class="contact-holder header-contact-holder">

                                    <i class="flaticon-phone-call contact-icon"></i>
                                    <span class="contact-info">
                                        <small>Call for Enquiry</small>
                                        <a href="#"><?php echo $frontpagedata->mobile1;?></a>
                                    </span>       
                                    <i class="flaticon-paper-plane contact-icon"></i>                      
                                    <span class="contact-info">
                                        <small>Mail for Enquiry</small>
                                        <a href="#"><?php echo $frontpagedata->email1;?></a>
                                    </span>  

                                </div>
                            </div>
                            
                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                <?php if(empty($this->session->userdata('user'))){ ?>
                                

<!------
<div class="drop-down">
    <div id="dropDown" class="drop-down__button">
      <span class="drop-down__name">Login/Register</span>
      <i class="drop-down__icon icon-user"></i>
    </div>

    <div id="dropDown-menu" class="drop-down__menu-box" style="z-index:999999;">
      <ul class="drop-down__menu">
        <li data-target="#sign-up" data-toggle="modal" class="drop-down__item">Login <i class="drop-down__item-icon fa fa-sign-in"></i></li>
        <li data-target="#user-register" data-toggle="modal" class="drop-down__item">Register <i class="drop-down__item-icon fa fa-user-plus"></i></li>
      </ul>
    </div>
</div>
---------->

<div class="drop-down">
<div class="dropdown">
    <button class="btn btn-primary dropdown-toggle drop-down__button" type="button" data-toggle="dropdown">
    <span class="drop-down__name">Login / Register</span>
    <i class="drop-down__icon icon-user"></i>
    </button>
    <ul class="dropdown-menu drop-down__menu">
        <li data-target="#sign-up" data-toggle="modal" class="drop-down__item">Login <i class="drop-down__item-icon fa fa-sign-in"></i></li>
        <li data-target="#user-register" data-toggle="modal" class="drop-down__item">Register <i class="drop-down__item-icon fa fa-user-plus"></i></li>
    </ul>
</div>
</div>
  
                                <!--------------
                                <div class="login-area">
                                    <i onclick="myFunction()" class="fa fa-user-o dropbtn"></i><i class="fa fa-caret-down dropbtn2"></i>
                                    <div id="myDropdown" class="dropdown-content received-enquiries-viewings-holder" style="z-index:99999999999;">
                                        <a data-target="#sign-up" data-toggle="modal" href="#sign-up"><i class="fa fa-sign-in"></i>&nbsp;&nbsp;Log In </a>
                                        <a data-target="#user-register" data-toggle="modal" href="#user-register"><i class="fa fa-user-plus"></i>&nbsp;&nbsp;Register</a>
                                    </div>
                                </div>
                                ---------------->
                                <?php } ?>
                                
                                <!-------------
                                <script type="text/javascript">
                                    function myFunction() {
                                        document.getElementById("myDropdown").classList.toggle("show");
                                    }
                                    window.onclick = function(event) {
                                        if (!event.target.matches('.dropbtn')) {
                                            var dropdowns = document.getElementsByClassName("dropdown-content");
                                            var i;
                                            for (i = 0; i < dropdowns.length; i++) {
                                                var openDropdown = dropdowns[i];
                                                if (openDropdown.classList.contains('show')) {
                                                    openDropdown.classList.remove('show');
                                                }
                                            }
                                        }
                                    }
                                </script>
                                -------------->
                            </div>

</div>
</div>
</div>

<div class="top-header top-header2">
    <div class="container hidden-lg hidden-md">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
             <div class="main-nav" style="float: right;">
                <nav id="site-navigation" class="main-navigation">
                    <ul id="menu-main-menu" class="primary-menu black-menu">
                        <li class="demos menu-item menu-item-has-children mega-menu">
                            <a href="<?php echo base_url();?>" style="color: black !important;">HOME</a>
                            
                        </li>
                        <li class="menu-item menu-item-has-children">
                            <a href="<?php echo base_url('home/about_us');?>" style="color: black !important;">ABOUT US</a>
                            
                        </li>
                 
                        
                        <!--<li class="menu-item  menu-item-has-children">-->
                        <!--    <?php if(!empty($this->session->userdata('user'))){ ?>-->
                        <!--    <a href="<?php echo base_url('home/subscription');?>" style="color: black !important;">Subscription</a>-->
                        <!--    <?php }else{ ?>-->
                        <!--    <a data-target="#sign-up" data-toggle="modal" href="#sign-up" style="color: black !important;">Subscription</a>-->
                        <!--    <?php } ?>-->
                        <!--</li>-->
                        
                         <li class="menu-item menu-item-has-children">
                            <?php if(!empty($this->session->userdata('user'))){ ?>
                            <a href="<?php echo base_url('home/post_property');?>" style="color: black !important;">Post Property</a>
                            <?php }else{ ?>
                            <a data-target="#sign-up" data-toggle="modal" href="#sign-up" style="color: black !important;">Post Property</a>
                            <?php } ?>
                        </li>
                        
                        <li class="menu-item menu-item-has-children">
                            <a href="<?php echo base_url('home/subscription');?>" style="color: black !important;">Subscription</a>
                        </li>

                        <li class="menu-item menu-item-has-children">
                            <a href="<?php echo base_url('home/contact_us');?>" style="color: black !important;">CONTACT US</a>
                        </li>
                        
                    
                        
                    </ul>
                </nav>
                <!-- .main-navigation -->
            </div>
        </div>
    </div>
</div>
</div>


<div class="nav-area sticky-header1">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 custom-xs1" style="float: right;">
                <div class="main-nav" style="float: right;">
                    <nav id="site-navigation" class="main-navigation xs-none">
                        <ul id="menu-main-menu" class="primary-menu">
                            
                            
                            <li class="demos menu-item menu-item-has-children mega-menu">
                            <a href="<?php echo base_url();?>">HOME</a>
                            
                        </li>
                        <li class="menu-item menu-item-has-children">
                            <a href="<?php echo base_url('home/about_us');?>">ABOUT US</a>
                            
                        </li>
                 
                        
                        <!--<li class="menu-item  menu-item-has-children">-->
                        <!--    <?php if(!empty($this->session->userdata('user'))){ ?>-->
                        <!--    <a href="<?php echo base_url('home/subscription');?>" >Subscription</a>-->
                        <!--    <?php }else{ ?>-->
                        <!--    <a data-target="#sign-up" data-toggle="modal" href="#sign-up" >Subscription</a>-->
                        <!--    <?php } ?>-->
                        <!--</li>-->
                         <li class="menu-item menu-item-has-children">
                            <?php if(!empty($this->session->userdata('user'))){ ?>
                            <a href="<?php echo base_url('home/post_property');?>">Post Property</a>
                            <?php }else{ ?>
                            <a data-target="#sign-up" data-toggle="modal" href="#sign-up">Post Property</a>
                            <?php } ?>
                        </li>
                        
                        <li class="menu-item menu-item-has-children">
                            <a href="<?php echo base_url('home/subscription');?>">Subscription</a>
                        </li>

                        <li class="menu-item menu-item-has-children">
                            <a href="<?php echo base_url('home/contact_us');?>">CONTACT US</a>
                        </li>
                        
                       
                            
                            <?php if(!empty($this->session->userdata('user'))){ ?>
                                <div class="login-option">
                                    <div class="user-dashboard-menu">
                                        <ul style="background: transparent !important;">
                                            <li class="user-dashboard-menu-children">
                                                <a href="javascript:void(0);" class="" id="user-12">
                                                    <div class="img-holder"><figure class="profile-image"><img src="<?php echo base_url();?>assets/front/img/fav.webp" alt="Profile Image"></figure></div>                                    
                                                    <span class="user-full-name" style="color: white;"><?php echo $this->session->userdata('user')['name']; ?></span>
                                                    <i class="icon-caret-down"></i>
                                                </a>
                                                <ul id="user-toggle">
                                                    <li class="user_dashboard_ajax active" id="wp_rem_member_suggested" data-queryvar="dashboard=suggested"><a href="<?php echo base_url(); ?>home/dashboard"><i class="icon-dashboard"></i>Dashboard</a></li>
                                                    <!--<li class="user_dashboard_ajax" id="wp_rem_member_properties" data-queryvar="dashboard=properties"><a href="<?php echo base_url('home/dashboard#my-favourite');?>"><i class="fa fa-heart"></i>My favourite</a></li>-->
                                                    <li><a class="logout-btn" href="<?php echo base_url(); ?>home/logout"><i class="icon-log-out"></i>Logout</a></li>
                                                </ul> 
                                            </li>

                                        </ul> 
                                    </div>
                                </div>
                            <?php }?>
            

                            </ul>
                        </nav>
                        <!-- .main-navigation -->
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</div>
</header>
