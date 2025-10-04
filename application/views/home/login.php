<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Classify a Classifieds Ads Category Responsive Web Template - Login </title>
    <link rel="stylesheet" href="<?php echo base_url();?>assets/front/css/style.css">
</head>

<body class="no-scroll">
    <!-- Forms23 block -->
    <section class="w3l-forms-23">
        <div class="forms23-block">
            <div class="wrapper">
                <h1>
                    <a href="<?php echo base_url();?>" class="logo-2"><span class="fa fa-bullhorn"
                            aria-hidden="true"></span>Classify</a>
                </h1>
                <div class="d-grid forms23-grids">
                    <div class="form23">
                        <h6>Login to your account</h6>
                        <form action="<?php echo base_url('home/check_user_login');?>" method="post">
                            <input type="email" name="email" class="input-form" placeholder="Your Email"
                                required="required" />
                            <input type="password" name="password" class="input-form" placeholder="Your Password"
                                required="required" />
                            <select class="" name="usertype" id="usertype">
                                <option hidden >Select User Type</option>
                                <option value="Owner">Owner</option>
                                <option value="Builder">Builder</option>
                                <option value="Agent">Agent</option>
                            </select>
                            <button type="submit" class="btn button-eff">Login</button>
                        </form>
                        <p>Not a member yet? <a href="signup.html">Join Now!</a></p>
                    </div>
                    <div class="form23-text">
                        <h3>Buy, Sell, Rent & Exchange in one Click</h3>
                        <p>Classified ads best theme relies on fast and intuitive way of promoting your ads login now
                        </p>
                        <a href="index.html" class="btn button-eff button-eff-2"><span class="fa fa-hand-o-left"
                                aria-hidden="true"></span>
                            Back to Home</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Forms23 block -->
</body>

</html>