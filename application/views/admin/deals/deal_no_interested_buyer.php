
        <!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3><i class="fa fa-ioxhost"></i> Manage Deal</h3>
            </div>
        </div>

        <div class="clearfix"></div>

        <div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
			  
                <div class="x_panel">
                  <div class="x_title">
                    <h2>No interested Seller  List</h2>
                 <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                       <table id="datatable-buttons" class="table table-bordered table-striped">
                <thead> 
                 
				  <tr>
				    <th>Sr.No</th>
				    <th>Date</th>
                    <th>Property ID</th>
                    <th>Rent/Sell</th>
                    <th>Owner</th>
                    <th>Buyer</th>
                    <th>Amount</th>
                    <th>Commision</th>
                    <th>Agent Commission</th>
                    <th>Floormantra Commission</th>
                    <th>Executive</th>
                    <th>Executive Commission</th>
                    <th>Telecaller</th>
                    <th>Telecaller Commission</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                    <?php if(!empty($list_interested)){ ?>
                <?php foreach($list_interested as $i=>$row){ ?>
                    <tr>
    				    <td><?php echo $i+1; ?></td>
    				    <td><?php echo $row->created; ?></td>
                        <td><?php echo $row->lead_id; ?></td>
                        <td><?php echo $row->rent_sell; ?></td>
                        <td><?php echo $row->owner_name; ?></td>
                        <td><?php echo $row->buyer_name; ?></td>
                        <td><?php echo $row->amount; ?></td>
                        <td><?php echo $row->commission; ?></td>
                        <td><?php echo $row->agent_commission; ?></td>
                        <td><?php echo $row->floormantra_commision; ?></td>
                        <td><?php echo $row->executive_name; ?></td>
                        <td><?php echo $row->executive_commission; ?></td>
                        <td><?php echo $row->caller_name; ?></td>
                        <td><?php echo $row->caller_commision; ?></td>
                        <td>Action</td>
                    </tr>
                <?php } ?>
                <?php } ?>
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
          <h4 class="modal-title" style="color:white;font-weight:bold;font-size:20px;">On Process</h4>
        </div>
        <div class="modal-body">
<!--		<form method="POST">-->
<!--          <div class="row">-->
		   
<!--			   <div class="col-md-6 col-sm-6 col-xs-6">-->
<!--			  <label>Caller Id</label><b style="color:red;">*</b>-->
<!--				<input readonly type="text" name="user_id" value="FL<?php echo rand(100000000,0000000000);?>" id="room"style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  />-->
<!--			  </div>-->
			 
<!--			  <div class="col-md-6 col-sm-6 col-xs-6">-->
<!--			  <label>Executive</label><b style="color:red;">*</b>-->
<!--				<input type="text" name="name" id="room"style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  />-->
<!--			  </div>-->
			  
<!--			  <div class="col-md-6 col-sm-6 col-xs-6">-->
<!--			  <label>Sourse Type</label><b style="color:red;">*</b>-->
<!--				<input type="text" name="name" id="room"style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  />-->
<!--			  </div>-->
			  
<!--			  <div class="col-md-6 col-sm-6 col-xs-6">-->
<!--			  <label>Sourse Type</label><b style="color:red;">*</b>-->
<!--				<input type="text" name="name" id="room"style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  />-->
<!--			  </div>-->

<!--			   <div class="col-md-6 col-sm-6 col-xs-6">-->
<!--			  <label>Source Id</label><b style="color:red;">*</b>-->
<!--				<input type="text" name="mobile" id="room"style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  />-->
<!--			  </div>-->
			  
<!--			  <div class="col-md-6 col-sm-6 col-xs-6">-->
<!--			  <label>Source Id</label><b style="color:red;">*</b>-->
<!--				<input type="text" name="mobile" id="room"style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  />-->
<!--			  </div>-->

<!--			   <div class="col-md-6 col-sm-6 col-xs-6">-->
<!--			  <label>Mobile</label><b style="color:red;">*</b>-->
<!--				<input type="text" name="mobile_sec" id="room"style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  />-->
<!--			  </div>-->
			  
<!--			  <div class="col-md-6 col-sm-6 col-xs-6">-->
<!--			  <label>Stock Id</label><b style="color:red;">*</b>-->
<!--				<input type="text" name="mobile_sec" id="room"style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  />-->
<!--			  </div>-->

<!-- <div class="col-md-6 col-sm-6 col-xs-6">-->
<!--			  <label>Stock Id</label><b style="color:red;">*</b>-->
<!--				<input type="text" name="mobile_sec" id="room"style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  />-->
<!--			  </div>-->

<!--              <div class="col-md-6 col-sm-6 col-xs-6">-->
<!--			  <label>Name </label><b style="color:red;">*</b>-->
<!--				<input type="text" name="mobile_sec" id="room"style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  />-->
<!--			  </div>-->
			  
<!--			  <div class="col-md-6 col-sm-6 col-xs-6">-->
<!--			  <label>Name </label><b style="color:red;">*</b>-->
<!--				<input type="text" name="mobile_sec" id="room"style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  />-->
<!--			  </div>-->
			  
<!--			  <div class="col-md-6 col-sm-6 col-xs-6">-->
<!--			  <label>Mobile </label><b style="color:red;">*</b>-->
<!--				<input type="text" name="mobile_sec" id="room"style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  />-->
<!--			  </div>-->
			  
<!--			  <div class="col-md-6 col-sm-6 col-xs-6">-->
<!--			  <label>Mobile </label><b style="color:red;">*</b>-->
<!--				<input type="text" name="mobile_sec" id="room"style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  />-->
<!--			  </div>-->
			  
<!--			  <div class="col-md-6 col-sm-6 col-xs-6">-->
<!--			  <label>Mobile </label><b style="color:red;">*</b>-->
<!--				<input type="text" name="mobile_sec" id="room"style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  />-->
<!--			  </div>-->
			  
<!--			  <div class="col-md-6 col-sm-6 col-xs-6">-->
<!--			  <label>Mobile </label><b style="color:red;">*</b>-->
<!--				<input type="text" name="mobile_sec" id="room"style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  />-->
<!--			  </div>-->
			  
<!--			  <div class="col-md-6 col-sm-6 col-xs-6">-->
<!--			  <label>Phone </label><b style="color:red;">*</b>-->
<!--				<input type="text" name="mobile_sec" id="room"style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  />-->
<!--			  </div>-->

<!--<div class="col-md-6 col-sm-6 col-xs-6">-->
<!--			  <label>Phone </label><b style="color:red;">*</b>-->
<!--				<input type="text" name="mobile_sec" id="room"style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  />-->
<!--			  </div>-->

<!--                  <div class="col-md-6 col-sm-6 col-xs-6">-->
<!--			  <label>Email </label><b style="color:red;">*</b>-->
<!--				<input type="text" name="mobile_sec" id="room"style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  />-->
<!--			  </div>-->
			  
<!--			  <div class="col-md-6 col-sm-6 col-xs-6">-->
<!--			  <label>Email </label><b style="color:red;">*</b>-->
<!--				<input type="text" name="mobile_sec" id="room"style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  />-->
<!--			  </div>-->
			  
<!--			  <div class="col-md-6 col-sm-6 col-xs-6">-->
<!--			  <label>Final Amount </label><b style="color:red;">*</b>-->
<!--				<input type="text" name="mobile_sec" id="room"style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  />-->
<!--			  </div>-->
			  
<!--			  <div class="col-md-6 col-sm-6 col-xs-6">-->
<!--			  <label>Net Amount </label><b style="color:red;">*</b>-->
<!--				<input type="text" name="mobile_sec" id="room"style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  />-->
<!--			  </div>-->
			  
<!--			  <div class="col-md-6 col-sm-6 col-xs-6">-->
<!--			  <label>Brokeage</label><b style="color:red;">*</b>-->
<!--				<input type="text" name="mobile_sec" id="room"style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  />-->
<!--			  </div>-->
			  
<!--			  <div class="col-md-6 col-sm-6 col-xs-6">-->
<!--			  <label>Brokeage</label><b style="color:red;">*</b>-->
<!--				<input type="text" name="mobile_sec" id="room"style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  />-->
<!--			  </div>-->
			  
			  
<!--			  <div class="col-md-6 col-sm-6 col-xs-6">-->
<!--			  <label>Rent Renewal Date</label><b style="color:red;">*</b>-->
<!--				<input type="date" name="mobile_sec" id="room"style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  />-->
<!--			  </div>-->
			  
<!--			  <div class="col-md-6 col-sm-6 col-xs-6">-->
<!--			  <label>Rent Renewal Date</label><b style="color:red;">*</b>-->
<!--				<input type="date" name="mobile_sec" id="room"style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  />-->
<!--			  </div>-->

<!--             <div class="modal-footer">-->
<!--                  <input type="submit" name="save" value="Save" class="btn btn-primary"/>-->
<!--                </div>-->
			    
<!--			  </form>-->
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

		
