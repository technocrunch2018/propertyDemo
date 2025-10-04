<?php
 /*session_start();
if(isset($_SESSION['loggedin']))
{
	include('connection.php');
	$logid=$_SESSION['loggedin'];

	$res=mysqli_query($con,"select * from admin where id=$logid");
	$row=mysqli_fetch_assoc($res);
	
if(isset($_POST['Update']))
	{
		$pwd=$_POST['pwd'];
		$npwd=$_POST['npwd'];
		$cpwd=$_POST['cpwd'];
		if($pwd==$row['password'])
		{
		    mysqli_query($con,"update admin set password='$npwd' where id=$logid");
				if(mysqli_affected_rows($con)>0)
				{
					header("location:change_password.php?status=true");
				}
			
		}
		else
		{
			echo "<script>alert('password not matched to DB');</script>";
		}
	  
	}*/
?>
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3><i class="fa fa-key "></i> Change Password</h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  
                </div>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-4 col-sm-4 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Change Password</h2>
                    
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <?php 
						if(isset($_REQUEST['status']))
						{
							?>
							<div style="color:green;"><b>Password Changed Successfully</b></div>
							<?php
						}
						?> 
            
            <form role="form" method="POST">
              <div class="box-body">
    				<div class="form-group">
                      	<label>Old Password</label><b style="color:red;">*</b><br>
		<input type="password" name="pwd" id="pwd" onblur="checkValue(this)"/>
		<span id="pwd_error"></span><br>
	
                    </div>
					<div class="form-group">
                      
		<label>New Password</label><b style="color:red;">*</b><br>
		<input type="password" name="npwd" id="npwd" onblur="checkValue(this)"/>
		<span id="npwd_error"></span>
                    </div>
                    <div class="form-group">
                      <label>Confirm Password</label><b style="color:red;">*</b><br>
		<input type="password" name="cpwd" id="cpwd" onblur="checkValue(this)"/>
		<i class="toggle-password style2 fa fa-fw fa-eye-slash"></i>
		<span id="cpwd_error"></span><br>
                    </div>
					
              </div>
              <div class="box-footer">
                	<input type="submit" value="Update" name="Update" style="margin-top:10px;" onclick="return validate();">
              </div>
            </form>
          
                  </div>
                </div>
              </div>
			  
            </div>
          </div>
        </div>
        <!-- /page content -->

		<script>
	function validate()
	{
		    var pwd=document.getElementById("pwd").value;
			var npwd=document.getElementById("npwd").value;
			var cpwd=document.getElementById("cpwd").value;
			if(pwd=="")
				{
					var elem=document.getElementById("pwd_error");
					elem.innerHTML="Enter Password...!";
					elem.style.color="red";
					elem.style.fontSize="15";
					return false;
						
				}
			if(npwd=="")
				{
					var elem=document.getElementById("npwd_error");
					elem.innerHTML="Enter New Password...!";
					elem.style.color="red";
					elem.style.fontSize="15";
					return false;
						
				}
			if(cpwd=="")
				{
					var elem=document.getElementById("cpwd_error");
					elem.innerHTML="Enter Confirm Password...!";
					elem.style.color="red";
					elem.style.fontSize="15";
					return false;
						
				}
			if(npwd!=cpwd)
			{
				var elem=document.getElementById("cpwd_error");
				elem.innerHTML="Password Not Matched...!";
				elem.style.color="red";
				elem.style.fontSize="15";
				return false;
			}
	}
	function checkValue(t)
			{
				if(t.value!="")
				{
					var elem=document.getElementById(t.id+"_error");
					elem.innerHTML="";
				}
				
			}
</script>