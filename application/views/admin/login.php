<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="shortcut icon" href="<?php echo base_url();?>assets/front/img/fav.webp">
        <title>Admin Login</title>
        
        <link href="<?php echo base_url(); ?>assets/admin/css/bootstrap.min.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/admin/css/font-awesome.min.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/admin/css/style.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    </head>

<body class="login-body">
        
        
<div class="login-wrapper">
  <div class="login-container">
    <div class="col-left">
      <div class="login-text">
        <img src="<?php echo base_url(); ?>assets/front/img/main-logo.webp">
      </div>
    </div>
    <div class="col-right">
      <div class="login-form">
        <h2>Admin Panel</h2>
        <form method="POST" action="<?php echo base_url('admin/grant_login_admin'); ?>">
          <div class="form-group">
            <input type="text" name="email" placeholder="Username" id="mob" required>
          </div>
          <div class="form-group">
            <input id="password" type="password" name="password" placeholder="Password" required>
            <i class="toggle-password fa fa-fw fa-eye-slash"></i>
          </div>
          <div class="form-group pt-10">
            <button type="submit" name="signin" class="slide"><span>&nbsp;</span></button>
          </div>
          <div class="form-group">
            <a class="forgot-btn" href="#">Forget password?</a>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

    
<script>
$(".toggle-password").click(function () {
  $(this).toggleClass("fa-eye fa-eye-slash");
  input = $(this).parent().find("input");
  if (input.attr("type") == "password") {
    input.attr("type", "text");
  } else {
    input.attr("type", "password");
  }
});
</script>
        
</body>
    

</html>
