<script>
    function edit_city(id, state, name)
    {
        $('#id').val(id);
        $('#state').val(state);
        $('#name').val(name);
         $('#myModal').modal();
    }
</script>
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
          <div class="x_title">
            <h2> Home Loans List</h2>
			
            <div class="clearfix"></div>
          </div> 
          <div class="x_content">
              <table id="datatable-buttons" class="table table-bordered table-striped">
        <thead> 
        <tr>
		  <th>Sno.</th>
		  <th>name</th>
		  <th>Mobile <br/>Mobile2</th>
		  <th>Email</th>
		  <th>Country</th>
		  <th>State <br> City <br>Pincode</th>
		  <th>Location</th>
		  <th>Address</th>
		  <th>Loan Required Upto</th>
		  <th>Company Name</th>
		  <th>Bank: </th>
		  <th>Employment Type: </th>
		  <th>Annual Income: </th>
		  <th>Comment: </th>
		  <th>Date Time: </th>
          <!--<th>Action</th>-->
        </tr>
        </thead>
        <tbody>	
		    <?php if(!empty($list_home_loans)){ ?>
		    <?php foreach($list_home_loans as $i=>$row){ ?>
			<tr>
			  <td><?php echo $i+1;?></td>
			  <td><?php echo $row->name; ?></td>
			  <td><?php echo $row->mobile.'<br>'.$row->mobile2; ?></td>
			  <td><?php echo $row->email; ?></td>
			  <td><?php echo $row->country; ?></td>
			  <td><?php echo $row->state.'<br>'.$row->city.'<br>'.$row->pincode; ?></td>
			  <td><?php echo $row->location; ?></td>
			  <td><?php echo $row->Address; ?></td>
			  <td><?php echo $row->LoanRequiredUpto; ?></td>
			  <td><?php echo $row->companyname; ?></td>
			  <td><?php echo $row->bank; ?></td>
			  <td><?php echo $row->employmentType; ?></td>
			  <td><?php echo $row->annualIncome; ?></td>
			  <td><?php echo $row->comment; ?></td>
			  <td><?php echo $row->created; ?></td>
			  <!--<td>
                    <a  class="btn btn-danger" onclick="return confirm('Do you want to delete this record?');" href="<?php echo base_url();?>backend/delete_city/<?php echo $row->id;?>"> <i class="fa fa-trash"></i></a>
                </td>-->
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
        




<!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog  modal-lg">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style="background:linear-gradient(to right,#03709e,#18c3fd 100%);">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title" style="color:white;font-weight:bold;font-size:20px;">Add </h4>
        </div>
        <div class="modal-body">
		    <form method="POST" action="<?php echo base_url(); ?>backend/save_city" enctype="multipart/form-data">
            <div class="row">
			    <div class="col-md-6 col-sm-6 col-xs-6">
			        <label>State</label><b style="color:red;">*</b>
				    <input type="hidden" name="id" id="id" value="0"   />
				    <select type="text" name="state" id="state">
				        <?php if(!empty($list_state)){ ?>
				        <?php foreach($list_state as $row){ ?>
				        <option value="<?php echo $row->id; ?>"><?php echo $row->name; ?></option>
				        <?php } ?> 
				        <?php } ?> 
				    </select>
			    </div>
			  
			  <div class="col-md-6 col-sm-6 col-xs-6">
			  <label>Name</label><b style="color:red;">*</b>
				<input type="text" name="name" id="name"  />
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

 