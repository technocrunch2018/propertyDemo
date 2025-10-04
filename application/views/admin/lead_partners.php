<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left"><h3><i class="fa fa-ioxhost"></i> Manage All Lead Partners</h3></div>
        </div>
        <div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
			    
			    <?php if($this->session->userdata('user_type') != 'admin'){ ?>
                <div class="x_panel">
                    <div class="x_panel">
                        <div class="x_content">
                            <form method = "POST" action = "<?php echo base_url('Excel_uploads/import_leads_partners');?>" enctype = "multipart/form-data">
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
                            <a class="outln-hvr" href = "<?php echo base_url('Uploads/excels/lead_partners/lead_partner.xlsx');?>">Download Demo File</a>
                        </div>
                    </div>
                </div>
                <?php } ?>
                
                
                
                <div class="x_title"><h2 class="xs-pb-10">Land Rent List</h2>
				    <a href = "<?php echo base_url('backend/add_lead_partner');?>"><button type="button" class="effect red effect-5 pull-right" style="width:185px;">Add Lead Partner</button></a>
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
            				    <th>Email</th>
            				    <th>Mobile</th>
            				    <th>Address</th>
            				    <th>Aadhar</th>
            				    <th>Pan</th>
            				    <th>Bank Name</th>
            				    <th>Branch</th>
            				    <th>Account No</th>
            				    <th>IFSC</th>
            				    <th>Image</th>
            				    <th>Status</th>
            		            <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; foreach($lead_partners as $list){?>
        					<tr>
        					    <td><?php echo $i; ++$i;?></td>
        					    <td><?php echo date('d-m-y h:i A', strtotime($list->created));?></td>
        					    <td><?php echo $list->user_id;?></td>
        					    <td><?php echo $list->name;?></td>
        					    <td><?php echo $list->email;?></td>
        					    <td><?php echo $list->phone;?></td>
        				        <td><?php echo $list->address;?></td>
        				        <td><?php echo $list->aadhar;?></td>
        				        <td><?php echo $list->pan;?></td>
        				        <td><?php echo $list->bank_name;?></td>
        				        <td><?php echo $list->bank_branch;?></td>
        				        <td><?php echo $list->account_no;?></td>
        				        <td><?php echo $list->ifsc;?></td>
        	                    <td><?php if(!empty($list->profile)){?><img style="height:100px" src="<?php echo base_url($list->profile);?>"><?php }?></td>
        	                    <td><?php if($list->status == 0 || $list->status == 2){?><a onclick="return doconfirm();" href = "<?php echo base_url('backend/change_status/1/' . $list->user_id);?>">Click To Active</a> 
        	                    <?php } else{?><a onclick="return doconfirm();" href = "<?php echo base_url('backend/change_status/2/' . $list->user_id);?>" >Click to Deactive</a><?php }?></td>
            					<td>
                                    <a class="action-btn edit" href="<?php echo base_url('backend/edit_lead_partners/'.$list->user_id); ?>"><i class="fa fa-pencil"></i></a>
                                	<?php if($this->session->userdata('user_type') != 'admin'){ ?>
                                	<a  class="action-btn delete"onclick="deleteRecord(<?php echo $list->user_id;?>)" href="javascript:void(0)"> <i class="fa fa-trash"></i></a>
                                    <?php } ?>
                                </td>
            	            </tr>
                            <?php }?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div> 
    </div>
</div>

<script>
    function deleteRecord(id)
    {
        var x=confirm("do you want to Delete?")
		if(x==true)
		{window.location="<?php echo base_url('backend/delete_lead_partners/');?>"+id;}
    }
</script>