<?php
 /*session_start();
if(isset($_SESSION['loggedin']))
{
	include('connection.php');
	$logid=$_SESSION['loggedin'];
	$res=mysqli_query($con,"select * from user where id='$logid'");
	$row=mysqli_fetch_assoc($res);
	
if(isset($_POST['save']))
{
	
$room=$_POST["room"];

$sql="insert into room_types(room_type)values('$room')";

$result=mysqli_query($con,$sql);

if(mysqli_affected_rows($con)==1)
{
		

	header("location:room_type.php");
}
else{
	echo "<script>alert('sorry! unable to insert..');</script>";
}

}*/
?>

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3><i class="fa fa-ioxhost"></i> Contact Us</h3>
              </div>

             
            </div>

            <div class="clearfix"></div>

            <div class="row">
			  <div class="col-md-12 col-sm-12 col-xs-12">
			  
                <div class="x_panel">
                  <!-- <div class="x_title">
                    <h2>Room Type List</h2>
					<button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#myModal">+ADD ROOM TYPE</button>
                    
                    <div class="clearfix"></div>
                  </div> -->
                  <div class="x_content">
                      <table id="datatable-buttons" class="table table-bordered table-striped">
                <thead> 
                <tr>
				  <th>Sno.</th>
				  <th>Name</th>
				  <th>Mobile</th>
				  <th>Email</th>
				  <th>Subject</th>
				  <th>Message</th>
				  <th>Send At</th>
                </tr>
                </thead>
                <tbody>

				<?php if(!empty($contact_us)){$i = 1;?>
				<?php foreach($contact_us as $list){?>
					<tr>
					  <td><?php echo $i; ++$i;?></td>
					  <td><?php echo $list->contact_name;?></td>
					  <td><?php echo $list->contact_number;?></td>
					  <td><?php echo $list->contact_email;?></td>
					  <td><?php echo $list->contact_subject;?></td>
					  <td><?php echo $list->contact_msg;?></td>
					  <td><?php echo date('d M, Y', strtotime($list->created));?></td>
	            <?php }?>
	            <?php }?>
	</tr>
                
                </tbody>
               
              </table>
  <div class="container">
  <!-- Trigger the modal with a button -->
  

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog  modal-lg">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style="background:linear-gradient(to right,#03709e,#18c3fd 100%);">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title" style="color:white;font-weight:bold;font-size:20px;">Add Room Type</h4>
        </div>
        <div class="modal-body">
		<form method="POST">
          <div class="row">
		  
		  
		           
			   <div class="col-md-6 col-sm-6 col-xs-6">
			  <label>Room Type</label><b style="color:red;">*</b>
				<input type="text" name="room" id="room" onblur="checkValue(this)"  />
			  </div>
			  
			  </div>
			  <form>
        </div>
        <div class="modal-footer">
          <input type="submit" name="save" value="Save"/>
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
        <!-- /page content -->

        
		<script>
					function deleteRecord(id)
					{
						var x=confirm("do you want to Delete?")
						if(x==true)
						{
							window.location="user_delete.php?did="+id;
						}
						
					}
	</script>
	<script>
function getamount(val)
		{
			$.ajax
		  ({
		   type: "POST",
		   url: "room_floor.php",
		   data: 'timing='+val,
		   success: function(data)
		   {
			   $("#amount_list").html(data);
		   }
		  
		   });	
		}
		</script>
		