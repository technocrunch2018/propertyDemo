<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3><i class="fa fa-ioxhost"></i> Home Loans</h3>
      </div>
     
    </div>

    <div class="clearfix"></div>

    <div class="row">
	  <div class="col-md-12 col-sm-12 col-xs-12">
	  
        <div class="x_panel">
            
            <?php if($this->session->userdata('user_type') != 'admin'){ ?>
            <div class="x_panel">
                    <div class="x_content">
                            <form method = "POST" action = "<?php echo base_url('Excel_uploads/home_loan_leads');?>" enctype = "multipart/form-data">
                            <div class="tab"> 
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="file-drop-area">
                                      <span class="fake-btn">Choose files</span>
                                      <span class="file-msg">or drag and drop files here</span>
                                      <input class="file-input" type="file" required name="lead_partner">
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                     <button type ="submit" class = "effect red effect-5" style="margin:15px 0 10px 0;">Upload</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-6">
                        <a class="outln-hvr" href = "<?php echo base_url('Uploads/excels/Home loan.xlsx');?>">Download Demo File</a>
                    </div>
                </div>
            <?php } ?>    
                
          <div class="x_title">
            <h2> Home Loans List</h2>
			
            <div class="clearfix"></div>
          </div> 
          
          <div class="x_content">
              <table id="datatable-buttons" class="table table-bordered table-striped">
        <thead> 
        <tr>
		  <th>Sno.</th>
		  <th>Date</th>
		  <th>Partner ID</th>
		  <th>Name</th>
		  <th>name</th>
		  <th>Mobile</th>
		  <th>Mobile</th>
		  <th>Email</th>
		  <th>Purpose</th>
		  <th>Type</th>
		  <th>State</th>
		  <th>City</th>
		  <th>Location</th>
		  
		  <th>Bank</th>
		  <th>Loan Required Upto</th>
		  <th>Verified By</th>
		  <th>Status</th>
          <th>Action</th>
        </tr>
        </thead>
        <tbody>	
		    <?php if(!empty($list_home_loans)){ ?>
		    <?php foreach($list_home_loans as $i=>$row){ ?>
			<tr>
			  <td><?php echo $i+1;?></td>
			  <td><?php echo date('d M, Y', strtotime($row->created)); ?></td>
			  <td><?php echo $row->user_id; ?></td>
			  <td><?php echo $row->lead_name;?></td>
			  <td><?php echo $row->name; ?></td>
			  <td><?php echo $row->mobile;?></td>
			  <td><?php echo $row->mobile2; ?></td>
			  <td><?php echo $row->email; ?></td>
			  <td><?php echo $row->res_com; ?></td>
			  <td><?php echo $row->residential; ?></td>
			  <td><?php echo $row->state;?></td>
			  <td><?php echo $row->city; ?></td>
			  <td><?php echo $row->location; ?></td>
			  <td><?php echo $row->bank; ?></td>
			  <td><?php echo $row->LoanRequiredUpto; ?></td>
			  <td></td>
			  <td></td>
			  <td>
                    <!--<span class="label label-danger" onclick="return confirm('Do you want to delete this record?');" href="<?php echo base_url();?>backend/delete_home_loan/<?php echo $row->id;?>"></span>-->
                    <a onclick="edit_home_loan(<?php echo $row->id; ?>)" href="javascript:void(0);" title="Edit"><span class="action-btn edit"> Edit</span></a>
                    <?php if($this->session->userdata('user_type') != 'admin'){ ?>
                    <a onclick="delete_home_loan(<?php echo $row->id; ?>)" href="javascript:void(0);" title="Delete"><span class="action-btn delete"> Delete</span></a>
                    <?php } ?>
               </td>
            </tr>
			<?php } ?>		
			<?php } ?>		
        
        </tbody>
       
      </table>
<div class="container">

</div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- /page content -->
        



<!-- Delete Buyer Lead Modal-->
<div class="modal fade" id="deleteHomeLoan" role="dialog">
    <div class="modal-dialog  modal-sm">
        <div class="modal-content">
            <div class="modal-header" style="background:linear-gradient(to right,#03709e,#18c3fd 100%);">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title" style="color:white;font-weight:bold;font-size:20px;">Do you want to delete this record? </h4>
            </div>
            <form method="POST" action="<?php echo base_url(); ?>property/delete_home_loan" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="row">
                        <input type="hidden" name="delete_home_loan_id" id="delete_home_loan_id" style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" />
                        <input type="hidden" name="redirect_url" value="<?php echo current_url(); ?>" style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" />
            			<input type="submit" name="Yes" value="Yes" class="btn btn-warning"/>
                        <input type="button" name="No" value="No" data-dismiss="modal" class="btn btn-primary"/>
        			</div>
                </div>
            </form>
        </div>
    </div>
</div>



<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog  modal-lg">
    
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header" style="background:linear-gradient(to right,#03709e,#18c3fd 100%);">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title" style="color:white;font-weight:bold;font-size:20px;">View/Edit Home Loan Details </h4>
            </div>
            <form method="POST" action="<?php echo base_url(); ?>property/save_home_loan" enctype="multipart/form-data">
                <div class="modal-body">
        		       <input type="hidden" name="id" id="id" value="0" style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" />
        		       <input type="hidden" name="redirect_url" value="<?php echo current_url(); ?>" style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" />
                    <div class="row">
        			      <div class="col-md-2 col-sm-6 col-xs-6">
            			        <label>Home Loan ID</label><b style="color:red;">*</b>
            				    <input type="text" name="lead_id" id="lead_id" readonly style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" />
            			  </div>
            			  
            			  <div class="col-md-2 col-sm-6 col-xs-6">
            			        <label>Partner ID</label><b style="color:red;">*</b>
            				    <input type="text" name="lead_id" id="lead_id" readonly style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" />
            			  </div> 
            			  
            			  <div class="col-md-8 col-sm-6 col-xs-6">
            			        <label>Partner Name</label><b style="color:red;">*</b>
            				    <input type="text" name="lead_id" id="lead_id" readonly style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" />
            			  </div>
        			  
            			  <div class="col-md-3 col-sm-6 col-xs-6">
            			        <label>Name</label><b style="color:red;">*</b>
            				    <input type="text" name="name" id="name" style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" />
            			  </div>
            			  
            			  <div class="col-md-3 col-sm-6 col-xs-6">
            			        <label>Mobile</label><b style="color:red;">*</b>
            				    <input type="text" name="mobile" id="mobile" style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" />
            			  </div>
            			  
            			  <div class="col-md-3 col-sm-6 col-xs-6">
            			        <label>Mobile 2</label><b style="color:red;">*</b>
            				    <input type="text" name="mobile2" id="mobile2" style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" />
            			  </div>
            			  
            			  <div class="col-md-3 col-sm-6 col-xs-6">
            			        <label>Email</label><b style="color:red;">*</b>
            				    <input type="text" name="email" id="loan_email" style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" />
            			  </div>
            			  
            			  <div class="col-md-3 col-sm-6 col-xs-6">
            			        <label>Country</label><b style="color:red;">*</b>
            				    <input type="text" name="country" id="country" style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" />
            			  </div>
            			  
            			  <div class="col-md-3 col-sm-6 col-xs-6">
            			        <label>State</label><b style="color:red;">*</b>
            				    <input type="text" name="state" id="state" style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" />
            			  </div>
            			  
            			  <div class="col-md-3 col-sm-6 col-xs-6">
            			        <label>City</label><b style="color:red;">*</b>
            				    <input type="text" name="city" id="city" style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" />
            			  </div>
            			  
            			  <div class="col-md-3 col-sm-6 col-xs-6">
            			        <label>Location</label><b style="color:red;">*</b>
            				    <input type="text" name="location" id="location" style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" />
            			  </div>
            			  
            			  <div class="col-md-9 col-sm-6 col-xs-6">
            			        <label>Address</label><b style="color:red;">*</b>
            				    <input type="text" name="Address" id="Address" style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" />
            			  </div>
            			  <div class="col-md-3 col-sm-6 col-xs-6">
            			        <label>Pincode</label><b style="color:red;">*</b>
            				    <input type="text" name="pincode" id="pincode" style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" />
            			  </div>
            			  
            			  <div class="col-md-3 col-sm-6 col-xs-6">
            			        <label>Employment Type</label><b style="color:red;">*</b>
            				    <select name="employmentType" id="employmentType" style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" >
            				        <option value="Private">Private</option>
            				        <option value="Government">Government</option>
            				    </select>
            			  </div>
            			  
            			  <div class="col-md-8 col-sm-6 col-xs-6">
            			        <label>Company Name</label><b style="color:red;">*</b>
            				    <input type="text" name="companyname" id="companyname" style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" />
            			  </div>
            			  
            			  <div class="col-md-4 col-sm-6 col-xs-6">
            			        <label>Loan Required Upto</label><b style="color:red;">*</b>
            				    <input type="text" name="LoanRequiredUpto" id="LoanRequiredUpto" style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" />
            			  </div>
            			  
            			  
        			      <div class="col-md-4 col-sm-6 col-xs-6">
            			        <label>Bank</label><b style="color:red;">*</b>
            				    <input type="text" name="bank" id="bank" style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" />
            			  </div>
            			  
            			  <div class="col-md-4 col-sm-6 col-xs-6">
            			        <label>Annual Income </label><b style="color:red;">*</b>
            				    <input type="text" name="annualIncome" id="annualIncome" style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" />
            			  </div>
            			  
            			  <div class="col-md-12 col-sm-6 col-xs-6">
            			        <label>Comment </label><b style="color:red;">*</b>
            				    <textarea name="comment" id="comment" style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" ></textarea>
            			  </div>
        			  
        			  </div>
                </div>
                <div class="modal-footer">
                  <input type="submit" name="save" value="Save" class="btn btn-primary"/>
                </div>
            </form>
        </div>
    </div>
</div>


<script>
    function delete_home_loan(id){
        $('#delete_home_loan_id').val(id);
        $('#deleteHomeLoan').modal();
    }
    
    function edit_home_loan(id){
        $.ajax
        ({
            type: "POST",
            url: "<?php echo base_url(); ?>property/get_home_loan_details_by_id",
            data: {id:id},
            dataType: 'json',
            success: function(data)
            {
                $("#id").val(data['id']);
                $("#lead_id").val(data['lead_id']);
                $("#name").val(data['name']);
                $("#mobile").val(data['mobile']);
                $("#mobile2").val(data['mobile2']);
                $("#phone").val(data['phone']);
                $("#loan_email").val(data['email']);
                $("#country").val(data['country']);
                $("#state").val(data['state']);
                $("#city").val(data['city']);
                $("#location").val(data['location']);
                $("#Address").val(data['Address']);
                $("#pincode").val(data['pincode']);
                $("#employmentType").val(data['employmentType']);
                $("#companyname").val(data['companyname']);
                $("#LoanRequiredUpto").val(data['LoanRequiredUpto']);
                $("#bank").val(data['bank']);
                $("#annualIncome").val(data['annualIncome']);
                $("#comment").val(data['comment']);
                
                $("#myModal").modal();
            }
        });
    }
</script>

 