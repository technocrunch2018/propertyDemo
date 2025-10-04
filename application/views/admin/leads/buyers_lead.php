<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3><i class="fa fa-ioxhost"></i> Manage Buyer's Lead</h3>
            </div>
        </div>

    <div class="clearfix"></div>

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
        
        <div class="x_panel">
                <?php if($this->session->userdata('user_type') != 'admin'){ ?>
                <div class="x_panel">
                    <div class="x_content">
                        
                        <form method = "POST" action = "<?php echo base_url('Excel_uploads/buyers_leads');?>" enctype = "multipart/form-data">
                            <div class="row">  
                            <div class="col-md-12 col-sm-12 col-xs-12" style="padding:0px">  
                            
                            <div class="col-md-3 col-sm-3 col-xs-6 radiobtn">
                                <input type="radio" id="res-search" name="res_com" checked value="Residential">
                                <label for="res-search">Residential</label>
                            </div>
                            <div class="col-md-3 col-sm-3 col-xs-6 radiobtn">
                                <input type="radio" id="com-search" name="res_com" required value="Commercial">
                                <label for="com-search">Commercial</label>
                            </div>
                            <div class="col-md-3 col-sm-3 col-xs-6 radiobtn">
                                <input type="radio" id="buy-search" name="buy_rent" checked value="buy">
                                <label for="buy-search">Buy</label>
                            </div>
                            <div class="col-md-3 col-sm-3 col-xs-6 radiobtn">
                                <input type="radio" id="rent-search" name="buy_rent" required value="rent">
                                <label for="rent-search">Rent</label>
                            </div>
                            
                            <div class="col-md-6 col-sm-6 col-xs-12 pt-20">
                                <select name="residential" id="residential" required>
                                    <option hidden value="">--Select--</option>
                                    <option disabled value="">Select Property Type</option>
                                    <option value = "DuplexFlat" class="residential" <?php if(!empty($res_com) && $res_com == 'Commercial' ){ echo 'style="display:none;"'; } ?> <?php if(!empty($residential) && $residential == 'DuplexFlat' ){ echo 'selected'; } ?> >Duplex Flat</option>
                                    <option value = "PentHouse" class="residential" <?php if(!empty($res_com) && $res_com == 'Commercial' ){ echo 'style="display:none;"'; } ?> <?php if(!empty($residential) && $residential == 'PentHouse' ){ echo 'selected'; } ?>>Pent House</option>
                                    <option value = "Flat" class="residential" <?php if(!empty($res_com) && $res_com == 'Commercial' ){ echo 'style="display:none;"'; } ?> <?php if(!empty($residential) && $residential == 'Flat' ){ echo 'selected'; } ?>>Flat</option>
                                    <option value = "HouseorBanglow" class="residential" <?php if(!empty($res_com) && $res_com == 'Commercial' ){ echo 'style="display:none;"'; } ?> <?php if(!empty($residential) && $residential == 'HouseorBanglow' ){ echo 'selected'; } ?>>House/Banglow</option>
                                    <option value = "Land" class="residential commercial" <?php if(!empty($residential) && $residential == 'Land' ){ echo 'selected'; } ?>>Land</option>
                                    <option value = "Factory" class="commercial" <?php if(!empty($res_com) && $res_com == 'Commercial' ){ echo 'style="display:block;"'; }else{  echo 'style="display:none;"'; } ?> <?php if(!empty($residential) && $residential == 'Factory' ){ echo 'selected'; } ?>>Factory</option>
                                    <option value = "Office" class="commercial" <?php if(!empty($res_com) && $res_com == 'Commercial' ){ echo 'style="display:block;"'; }else{  echo 'style="display:none;"'; } ?> <?php if(!empty($residential) && $residential == 'Office' ){ echo 'selected'; } ?>>Office</option>
                                    <option value = "ShopOrShowroom" class="commercial" <?php if(!empty($res_com) && $res_com == 'Commercial' ){ echo 'style="display:block;"'; }else{  echo 'style="display:none;"'; } ?> <?php if(!empty($residential) && $residential == 'ShopOrShowroom' ){ echo 'selected'; } ?>>Shop/Showroom</option>
                                    <option value = "Warehouse" class="commercial" <?php if(!empty($res_com) && $res_com == 'Commercial' ){ echo 'style="display:block;"'; }else{  echo 'style="display:none;"'; } ?> <?php if(!empty($residential) && $residential == 'Warehouse' ){ echo 'selected'; } ?>>Warehouse</option>
                                </select>
                            </div>
                            
                            <div class="tab"> 
                                <div class="col-md-4 col-sm-4 col-xs-12 pt-10">
                                    <div class="file-drop-area">
                                      <span class="fake-btn">Choose files</span>
                                      <span class="file-msg">or drag and drop files here</span>
                                      <input class="file-input" type="file" required name="lead_partner">
                                    </div>
                                </div>
                                <div class="col-md-2 col-sm-2 col-xs-12">
                                     <button type ="submit" class = "effect red effect-5" style="width:140px;margin-top:25px;">Upload</button>
                                </div>
                            </div>
                            
                            <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
                            
<div class="dropdown">
  <button class="effect-2 effect-4 blue dropdown-toggle" type="button" data-toggle="dropdown" style="width:260px;">Download Files<i style="float:right;margin-right:10px;font-weight:600;" class="flaticon-download"></i></button>
  <ul class="dropdown-menu style2">
      <li><a id = "res_rent_flat" href = "<?php echo base_url('Uploads/excels/lead/res_rent_flat.xlsx');?>">Residential Rent Flat</a></li>
      <li><a id = "res_rent_house" href = "<?php echo base_url('Uploads/excels/lead/res_rent_house.xlsx');?>">Residential Rent House</a></li>
      <li><a id = "res_rent_pent_house" href = "<?php echo base_url('Uploads/excels/lead/res_rent_pent_house.xlsx');?>">Residential Rent Pent House</a></li>
      <li><a id = "res_rent_duplex_flat" href = "<?php echo base_url('Uploads/excels/lead/res_rent_duplex_flat.xlsx');?>">Residential Rent Duplexflat</a></li>
      <li><a id = "res_rent_land" href = "<?php echo base_url('Uploads/excels/lead/res_rent_land.xlsx');?>">Residential Rent Land</a></li>
                    
      <li><a id = "res_buy_flat" href = "<?php echo base_url('Uploads/excels/lead/res_buy_flat.xlsx');?>">Residential Buy Flat</a></li>
      <li><a id = "res_buy_house" href = "<?php echo base_url('Uploads/excels/lead/res_buy_house.xlsx');?>">Residential Buy House</a></li>
      <li><a id = "res_buy_pent_house" href = "<?php echo base_url('Uploads/excels/lead/res_buy_pent_house.xlsx');?>">Residential Buy Pent House</a></li>
      <li><a id = "res_buy_duplex_flat" href = "<?php echo base_url('Uploads/excels/lead/res_buy_duplex_flat.xlsx');?>">Residential Buy Duplex Flat</a></li>
      <li><a id = "res_buy_land" href = "<?php echo base_url('Uploads/excels/lead/res_buy_land.xlsx');?>">Residential Buy Land</a></li>
                    
      <li><a id = "com_rent_office" href = "<?php echo base_url('Uploads/excels/lead/com_rent_office.xlsx');?>">Cummericial Rent Office</a></li>
      <li><a id = "com_rent_shop" href = "<?php echo base_url('Uploads/excels/lead/com_rent_shop.xlsx');?>">Cummericial Rent Shop</a></li>
      <li><a id = "com_rent_warehoouse" href = "<?php echo base_url('Uploads/excels/lead/com_rent_warehoouse.xlsx');?>">Cummericial Rent Warehouse</a></li>
      <li><a id = "com_rent_factory" href = "<?php echo base_url('Uploads/excels/lead/com_rent_factory.xlsx');?>">Cummericial Rent Factory</a></li>
      <li><a id = "com_rent_land" href = "<?php echo base_url('Uploads/excels/lead/com_rent_land.xlsx');?>">Cummericial Rent Land</a></li>
                    
      <li><a id = "com_buy_office" href = "<?php echo base_url('Uploads/excels/lead/com_buy_office.xlsx');?>">Cummericial Buy Office</a></li>
      <li><a id = "com_buy_shop" href = "<?php echo base_url('Uploads/excels/lead/com_buy_shop.xlsx');?>">Cummericial Buy Shop</a></li>
      <li><a id = "com_buy_warehoouse" href = "<?php echo base_url('Uploads/excels/lead/com_buy_warehoouse.xlsx');?>">Cummericial Buy Warehouse</a></li>
      <li><a id = "com_buy_factory" href = "<?php echo base_url('Uploads/excels/lead/com_buy_factory.xlsx');?>">Cummericial Buy Factory</a></li>
      <li><a id = "com_buy_land" href = "<?php echo base_url('Uploads/excels/lead/com_buy_land.xlsx');?>">Cummericial Buy Land</a></li>
  </ul>
</div>

                        </div>
                            
                            </div>
                            </div>
                            
                        </form>
                        
                    </div>
                </div>
                <?php } ?>
            
          <div class="x_title">
            <h2>Buyer's Lead List</h2>
                  
            <div class="clearfix"></div>
          </div> 
            <div class="x_content">
                <table id="datatable-buttons" class="table table-bordered table-striped">
                    <thead> 
                        <tr>
                            <th>Sno.</th>
                            <th>Date</th>
                            <th>Partner ID</th>
                            <th>Client Id</th>
                            <th>Name</th>
                            <th>State</th>
                            <th>City</th>
                            <th>Location</th>
                            <th>Comm/Resi</th>
                            <th>Purpose</th>
                            <th>Property Type</th>
                            <th>Status</th>
                            <th>D. Status</th>
                            <th>Details</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>   
                            <?php if(!empty($list_buyers_lead)){ ?>
                            <?php foreach($list_buyers_lead as $i=>$row){ ?>
                              <tr>
                                <td><?php echo $i+1;?></td>.
                                <td><?php echo date('d M, Y', strtotime($row->created)); ?></td>
                                <td><?php echo $row->user_id; ?></td>
                                <td><?php echo $row->lead_id;?></td>
                                <td><?php echo $row->name; ?></td>
                                <td><?php echo $row->state;?></td>
                                <td><?php echo $row->city;?></td>
                                <td><?php echo $row->location;?></td>
                                <td><?php echo $row->residential_commercial; ?></td>
                                <td><?php echo $row->rent_sell; ?></td>
                                <td><?php echo $row->residential; ?></td>
                                <td><?php if(strtotime("$row->created +3 months") < time()){ echo '<span title="Expired" class="label label-primary">Expired</span>'; }elseif($row->status){ echo '<span title="Active" class="label label-success">Active</span>'; }else{ echo '<span title="Rejected" class="label label-danger">Rejected</span>'; } ?></td>
                                <td><?php //if($row->email_verify == 1){ echo '<span title="Verified" class="label label-success">Verified</span>'; }else{ echo '<span title="Unverified" class="label label-warning">Unverified</span>'; } ?>
                                <a href="javascript:void(0);" onclick="edit_buyer(<?php echo $row->post_id; ?>, 'view');"><?php echo $row->lead_id;?></a>
                                </td>
                                <td><?php if($row->subscription == 0){ echo '<span title="Free" class="label label-danger">Free</span>'; }else{ echo '<span title="Paid" class="label label-primary">Paid</span>'; } ?></td>
                                
                                
                                <!--<td><?php echo $row->mobile; ?></td>
                                <td><?php echo $row->mobile2; ?></td>
                                <td><?php echo $row->phone; ?></td>
                                <td><?php echo $row->email; ?></td>
                                <td><?php echo $row->created; ?></td>
                                <td></td>
                                <td>
                                    <a href="javascript:void(0);" onclick="edit_buyer(<?php echo $row->post_id; ?>);" title="Edit"><span class="label label-primary">Edit</span></a>
                                    <?php if($this->session->userdata('user_type') != 'admin'){ ?>
                                    <a onclick="delete_buyer(<?php echo $row->post_id; ?>)" href="javascript:void(0);" title="Delete"><span class="label label-danger">Delete</span></a>
                                    <?php } ?>
                                    <?php if($row->status == 1){ ?>
                                    <span class="label label-warning" onclick="buyer_not_interested(<?php echo $row->post_id; ?>)" title="Not Interested">Not Interested</span>
                                    <?php } ?>
                                    <a href="javascript:void(0);" onclick="interested_popup(<?php echo $row->post_id; ?>)"><span title="Interested" class="label label-primary">Interested</span></a>
                                    <?php if($row->in_process_flag==1 && $this->session->userdata('admin_id') == 1){ ?>
                                    <a onclick="cancel_deal(<?php echo $row->post_id;?>);" href="javascript:void(0);" title="Cancel all deals"><span title="Cancel all deals" class="label label-primary">Cancel Deals</span></a>
                                    <?php } ?>
                                </td>-->
                        </tr>
                              <?php } ?>        
                              <?php } ?>        
                    
                    </tbody>
       
                </table>
      
      
                </div>
                </div>
            </div>
      
        </div>
    </div>
</div>
<!-- /page content -->
        




<!-- Modal -->
<!--<div class="modal fade" id="myModal" role="dialog">-->
<!--    <div class="modal-dialog  modal-lg">-->
    
        <!-- Modal content-->
<!--        <div class="modal-content">-->
<!--            <div class="modal-header" style="background:linear-gradient(to right,#03709e,#18c3fd 100%);">-->
<!--          <button type="button" class="close" data-dismiss="modal">&times;</button>-->
<!--          <h4 class="modal-title" style="color:white;font-weight:bold;font-size:20px;">Add </h4>-->
<!--        </div>-->
<!--            <div class="modal-body">-->
<!--                   <form method="POST" action="<?php echo base_url(); ?>backend/save_city" enctype="multipart/form-data">-->
<!--                    <div class="row">-->
<!--                              <div class="col-md-6 col-sm-6 col-xs-6">-->
<!--                                  <label>State</label><b style="color:red;">*</b>-->
<!--                                    <input type="hidden" name="id" id="id" value="0" style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;"  />-->
<!--                                    <select type="text" name="state" id="state"style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;">-->
<!--                                        <?php if(!empty($list_state)){ ?>-->
<!--                                        <?php foreach($list_state as $row){ ?>-->
<!--                                        <option value="<?php echo $row->id; ?>"><?php echo $row->name; ?></option>-->
<!--                                        <?php } ?> -->
<!--                                        <?php } ?> -->
<!--                                    </select>-->
<!--                              </div>-->
                    
<!--                            <div class="col-md-6 col-sm-6 col-xs-6">-->
<!--                              <label>Name</label><b style="color:red;">*</b>-->
<!--                                <input type="text" name="name" id="name" style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" />-->
<!--                            </div>-->
                    
<!--                        </div>-->
<!--                     </form>-->
<!--            </div>-->
<!--            <div class="modal-footer">-->
<!--                <input type="submit" name="save" value="Save" class="btn btn-primary"/>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->

<!-- Delete Buyer Lead Modal-->
<div class="modal fade" id="deleteBuyer" role="dialog">
    <div class="modal-dialog  modal-sm">
        <div class="modal-content">
            <div class="modal-header" style="background:linear-gradient(to right,#03709e,#18c3fd 100%);">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title" style="color:white;font-weight:bold;font-size:20px;">Do you want to delete this record? </h4>
            </div>
            <form method="POST" action="<?php echo base_url(); ?>property/delete_buyer" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="row">
                        <input type="hidden" name="delete_buyer_post_id" id="delete_buyer_post_id" style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" />
                        <input type="hidden" name="redirect_url" value="<?php echo current_url(); ?>" style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" />
                              <input type="submit" name="Yes" value="Yes" class="btn btn-warning"/>
                        <input type="button" name="No" value="No" data-dismiss="modal" class="btn btn-primary"/>
                        </div>
                </div>
            </form>
        </div>
    </div>
</div>


<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog  modal-lg">

        <div class="modal-content">
            <div class="modal-header" style="background:linear-gradient(to right,#03709e,#18c3fd 100%);">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title" style="color:white;font-weight:bold;font-size:20px;">Add Flat Requirement</h4>
            </div>
            <div class="modal-body">
                <form method="POST" enctype="multipart/form-data" action="<?php echo base_url(); ?>property/save_buyer">
                    <div class="row">
                        <input type="hidden" name="added_by" value="Super Admin" id="added_by"  onblur="checkValue(this)"  />
                        <input type="hidden" name="post_id" value="0" id="post_id"  onblur="checkValue(this)"  />
                        <input type="hidden" name="residential" value="Flat" id="residential"  onblur="checkValue(this)"  />
                        <input type="hidden" name="residential_commercial" value="Residential" id="residential_commercial"  onblur="checkValue(this)"  />
                        <input type="hidden" name="rent_sell" value="<?php echo $rent_sell; ?>" id="rent_sell"  onblur="checkValue(this)"  />
                        <input type="hidden" name="redirect_url" value="<?php echo current_url(); ?>" />
                        
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <label>Name</label><b style="color:red;">*</b>
                            <input type="name" name="name" id="name" onblur="checkValue(this)" style="text-transform: uppercase;" required/>
                        </div>
                        
                        <div class="col-md-3 col-sm-6 col-xs-6">
                            <label>Mobile</label><b style="color:red;">*</b>
                            <input type=number size=20 maxlength=10 name="mobile" id="mobile" pattern="/^-?\d+\.?\d*$/" required onKeyPress="if(this.value.length==10) return false;"/>
                        </div>

                        <div class="col-md-3 col-sm-6 col-xs-6">
                            <label>Alt. Mobile</label><b style="color:red;">*</b>
                            <input type="number" name="mobile2" id="mobile2"  onKeyPress="if(this.value.length==10) return false;" />
                        </div>

                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <label>Phone</label><b style="color:red;">*</b>
                            <input type="number" class="input--style-5" size=20 maxlength=15 name="phone" id="phone" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==15) return false;" onblur="checkValue(this)">
                        </div>

                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <label>E-mail</label><b style="color:red;">*</b>
                            <input type="email" name="email" id="flat_email"  onblur="checkValue(this)" style="text-transform: lowercase;" />
                        </div>

                        <div class="col-md-3 col-sm-6 col-xs-6">
                            <label>State</label><b style="color:red;">*</b>
                            <select id="state" name="state" >
                                <option hidden value="">--Select--</option>
                                <option disabled >Select one </option>
                                <option value="Andaman and Nicobar">Andaman and Nicobar</option>
                                <option value="Andhra Pradesh">Andhra Pradesh</option>
                                <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                                <option value="Assam">Assam</option>
                                <option value="Bihar">Bihar</option>
                                <option value="Chandigarh">Chandigarh</option>
                                <option value="Chhattisgarh">Chhattisgarh</option>
                                <option value="Dadra and Nagar Haveli">Dadra and Nagar Haveli</option>
                                <option value="Daman and Diu">Daman and Diu</option>
                                <option value="Delhi">Delhi</option>
                                <option value="Goa">Goa</option>
                                <option value="Gujarat">Gujarat</option>
                                <option value="Haryana">Haryana</option>
                                <option value="Himachal Pradesh">Himachal Pradesh</option>
                                <option value="Jammu and Kashmir">Jammu and Kashmir</option>
                                <option value="Jharkhand">Jharkhand</option>
                                <option value="Karnataka">Karnataka</option>
                                <option value="Kerala">Kerala</option>
                                <option value="Lakshadweep">Lakshadweep</option>
                                <option value="Madhya Pradesh">Madhya Pradesh</option>
                                <option value="Maharashtra">Maharashtra</option>
                                <option value="Manipur">Manipur</option>
                                <option value="Meghalaya">Meghalaya</option>
                                <option value="Mizoram">Mizoram</option>
                                <option value="Nagaland">Nagaland</option>
                                <option value="Odisha">Odisha</option>
                                <option value="Puducherry">Puducherry</option>
                                <option value="Punjab">Punjab</option>
                                <option value="Rajasthan">Rajasthan</option>
                                <option value="Sikkim">Sikkim</option>
                                <option value="Tamil Nadu">Tamil Nadu</option>
                                <option value="Telangana">Telangana</option>
                                <option value="Tripura">Tripura</option>
                                <option value="Uttar Pradesh">Uttar Pradesh</option>
                                <option value="Uttarakhand">Uttarakhand</option>
                                <option value="West Bengal">West Bengal</option>
                            </select>
                        </div>

                        <div class="col-md-3 col-sm-6 col-xs-6">
                            <label>City</label><b style="color:red;">*</b>
                            <select id="city" name="city" >
                                <option hidden value="">--Select--</option>
                                <option disabled >Select one </option>
                                <option value="Port Blair">Port Blair</option>
                                <option value="Adoni">Adoni</option>
                                <option value="Amadalavalasa">Amadalavalasa</option>
                                <option value="Anakapalle">Anakapalle</option>
                                <option value="Anantapur">Anantapur</option>
                                <option value="Banganapalle">Banganapalle</option>
                                <option value="Bapatla">Bapatla</option>
                                <option value="Bethamcherla">Bethamcherla</option>
                                <option value="Bheemunipatnam">Bheemunipatnam</option>
                                <option value="Bhimavaram">Bhimavaram</option>
                                <option value="Chapirevula">Chapirevula</option>
                                <option value="Chilakaluripet">Chilakaluripet</option>
                                <option value="Chirala">Chirala</option>
                                <option value="Chittoor">Chittoor</option>
                                <option value="Cuddapah">Cuddapah</option>
                                <option value="Dharmavaram">Dharmavaram</option>
                                <option value="Eluru">Eluru</option>
                                <option value="Gooty">Gooty</option>
                                <option value="Gudivada">Gudivada</option>
                                <option value="Gudur">Gudur</option>
                                <option value="Guntur">Guntur</option>
                                <option value="Hanuman Junction">Hanuman Junction</option>
                                <option value="Hindupur">Hindupur</option>
                                <option value="Ichchapuram">Ichchapuram</option>
                                <option value="Jaggaiahpet">Jaggaiahpet</option>
                                <option value="Jammalamadugu">Jammalamadugu</option>
                                <option value="Kadapa">Kadapa</option>
                                <option value="Kadiri">Kadiri</option>
                                <option value="Kakinada">Kakinada</option>
                                <option value="Kalyandurg">Kalyandurg</option>
                                <option value="Kandukur">Kandukur</option>
                                <option value="Kurnool">Kurnool</option>
                                <option value="Macherla">Macherla</option>
                                <option value="Machilipatnam">Machilipatnam</option>
                                <option value="Mandapeta">Mandapeta</option>
                                <option value="Mangalagiri">Mangalagiri</option>
                                <option value="Narasapur">Narasapur</option>
                                <option value="Narasaraopet">Narasaraopet</option>
                                <option value="Narsipatnam">Narsipatnam</option>
                                <option value="Nellore">Nellore</option>
                                <option value="Nidadavole">Nidadavole</option>
                                <option value="Nuzvid">Nuzvid</option>
                                <option value="Palasa Kasibugga">Palasa Kasibugga</option>
                                <option value="Parvathipuram">Parvathipuram</option>
                                <option value="Peddapuram">Peddapuram</option>
                                <option value="Pithapuram">Pithapuram</option>
                                <option value="Rajahmundry">Rajahmundry</option>
                                <option value="Rayachoti">Rayachoti</option>
                                <option value="Tirupati">Tirupati</option>
                                <option value="Vijayawada">Vijayawada</option>
                                <option value="Visakhapatnam">Visakhapatnam</option>
                                <option value="Bomdila">Bomdila</option>
                                <option value="Itanagar">Itanagar</option>
                                <option value="Naharlagun">Naharlagun</option>
                                <option value="Pasighat">Pasighat</option>
                                <option value="Barpeta Road">Barpeta Road</option>
                                <option value="Barpeta">Barpeta</option>
                                <option value="Bilasipara">Bilasipara</option>
                                <option value="Bongaigaon">Bongaigaon</option>
                                <option value="Dhekiajuli">Dhekiajuli</option>
                                <option value="Dhubri">Dhubri</option>
                                <option value="Dibrugarh">Dibrugarh</option>
                                <option value="Digboi">Digboi</option>
                                <option value="Diphu">Diphu</option>
                                <option value="Dispur">Dispur</option>
                                <option value="Duliajan Oil Town">Duliajan Oil Town</option>
                                <option value="Gauripur">Gauripur</option>
                                <option value="Goalpara">Goalpara</option>
                                <option value="Golaghat">Golaghat</option>
                                <option value="Guwahati">Guwahati</option>
                                <option value="Haflong">Haflong</option>
                                <option value="Hailakandi">Hailakandi</option>
                                <option value="Hojai">Hojai</option>
                                <option value="Jorhat">Jorhat</option>
                                <option value="Karimganj">Karimganj</option>
                                <option value="Kokrajhar">Kokrajhar</option>
                                <option value="Lanka">Lanka</option>
                                <option value="Lumding">Lumding</option>
                                <option value="Mangaldoi">Mangaldoi</option>
                                <option value="Mankachar">Mankachar</option>
                                <option value="Margherita">Margherita</option>
                                <option value="Mariani">Mariani</option>
                                <option value="Marigaon">Marigaon</option>
                                <option value="Nagaon">Nagaon</option>
                                <option value="Nalbari">Nalbari</option>
                                <option value="North Lakhimpur">North Lakhimpur</option>
                                <option value="Rangia">Rangia</option>
                                <option value="Sibsagar">Sibsagar</option>
                                <option value="Silapathar">Silapathar</option>
                                <option value="Tezpur">Tezpur</option>
                                <option value="Tinsukia">Tinsukia</option>
                                <option value="Arrah">Arrah</option>
                                <option value="Aurangabad">Aurangabad</option>
                                <option value="Bakhtiarpur">Bakhtiarpur</option>
                                <option value="Banka">Banka</option>
                                <option value="Banmankhi Bazar">Banmankhi Bazar</option>
                                <option value="Barh">Barh</option>
                                <option value="Begusarai">Begusarai</option>
                                <option value="Bettiah">Bettiah</option>
                                <option value="Bhabua">Bhabua</option>
                                <option value="Bhagalpur">Bhagalpur</option>
                                <option value="Bihar Sharif">Bihar Sharif</option>
                                <option value="Bikramganj">Bikramganj</option>
                                <option value="Bodh Gaya">Bodh Gaya</option>
                                <option value="Chandan Bara">Chandan Bara</option>
                                <option value="Chhapra">Chhapra</option>
                                <option value="Colgong">Colgong</option>
                                <option value="Darbhanga">Darbhanga</option>
                                <option value="Dhaka">Dhaka</option>
                                <option value="Dumraon">Dumraon</option>
                                <option value="Fatwah">Fatwah</option>
                                <option value="Gaya">Gaya</option>
                                <option value="Gogri Jamalpur">Gogri Jamalpur</option>
                                <option value="Jagdispur">Jagdispur</option>
                                <option value="Jamalpur">Jamalpur</option>
                                <option value="Jamui">Jamui</option>
                                <option value="Jhajha">Jhajha</option>
                                <option value="Jhanjharpur">Jhanjharpur</option>
                                <option value="Jogabani">Jogabani</option>
                                <option value="Kanti">Kanti</option>
                                <option value="Khagaria">Khagaria</option>
                                <option value="Kishanganj">Kishanganj</option>
                                <option value="Lalganj">Lalganj</option>
                                <option value="Madhepura">Madhepura</option>
                                <option value="Maharajganj">Maharajganj</option>
                                <option value="Mahnar Bazar">Mahnar Bazar</option>
                                <option value="Makhdumpur">Makhdumpur</option>
                                <option value="Maner">Maner</option>
                                <option value="Marhaura">Marhaura</option>
                                <option value="Masaurhi">Masaurhi</option>
                                <option value="Mirganj">Mirganj</option>
                                <option value="Mohania">Mohania</option>
                                <option value="Mokameh">Mokameh</option>
                                <option value="Muzaffarpur">Muzaffarpur</option>
                                <option value="Narkatiaganj">Narkatiaganj</option>
                                <option value="Naugachhia">Naugachhia</option>
                                <option value="Nawada">Nawada</option>
                                <option value="Nokha">Nokha</option>
                                <option value="Patna">Patna</option>
                                <option value="Piro">Piro</option>
                                <option value="Purnia">Purnia</option>
                                <option value="chandigarh">chandigarh</option>
                                <option value="Akaltara">Akaltara</option>
                                <option value="Ambikapur">Ambikapur</option>
                                <option value="Bade Bacheli">Bade Bacheli</option>
                                <option value="Balod">Balod</option>
                                <option value="Baloda Bazar">Baloda Bazar</option>
                                <option value="Basna">Basna</option>
                                <option value="Bemetra">Bemetra</option>
                                <option value="Bhatapara">Bhatapara</option>
                                <option value="Bhilai">Bhilai</option>
                                <option value="Bilaspur">Bilaspur</option>
                                <option value="Birgaon">Birgaon</option>
                                <option value="Champa">Champa</option>
                                <option value="Chirmiri">Chirmiri</option>
                                <option value="Dalli-Rajhara">Dalli-Rajhara</option>
                                <option value="Dhamtari">Dhamtari</option>
                                <option value="Dipka">Dipka</option>
                                <option value="Dongargarh">Dongargarh</option>
                                <option value="Durg-Bhilai Nagar">Durg-Bhilai Nagar</option>
                                <option value="Gobranawapara">Gobranawapara</option>
                                <option value="Jagdalpur">Jagdalpur</option>
                                <option value="Jashpurnagar">Jashpurnagar</option>
                                <option value="Kanker">Kanker</option>
                                <option value="Kawardha">Kawardha</option>
                                <option value="Kondagaon">Kondagaon</option>
                                <option value="Korba">Korba</option>
                                <option value="Mahasamund">Mahasamund</option>
                                <option value="Mungeli">Mungeli</option>
                                <option value="Naila Janjgir">Naila Janjgir</option>
                                <option value="Raigarh">Raigarh</option>
                                <option value="Raipur">Raipur</option>
                                <option value="Rajnandgaon">Rajnandgaon</option>
                                <option value="Sakti">Sakti</option>
                                <option value="Tilda Newra">Tilda Newra</option>
                                <option value="Amli">Amli</option>
                                <option value="Silvassa">Silvassa</option>
                                <option value="Daman and Diu">Daman and Diu</option>
                                <option value="Delhi">Delhi</option>
                            </select>
                        </div>
                        
                        <div class="col-md-6 col-sm-6 col-xs-12" style="padding:0;margin:0;" >
                            <div class="col-md-7 col-sm-7 col-xs-12">
                                <label>Locations (Select 5 Locations Only)</label><b style="color:red;">*</b>
                                <select id="location" name="location" class="locations">
                                    <option hidden value="">--Select--</option>
                                    <option disabled >Select one </option>
                                </select>
                            </div>
                            <div class="col-md-5 col-sm-5 col-xs-7 mt-25 xs-mt-0 xs-pb-10">
                                <a class="outln-hvr" href="javascript:void(0);" onclick="load_more_locations()">+ Add More Locations</a>
                            </div>
                        </div>
                        <div class="col-md-12 col-sm-6 col-xs-12" style="padding:0;margin:0;" id="locationDiv">
                        </div>
                        <div class="col-md-12 col-sm-6 col-xs-12" style="padding:0;margin:0;color:red;text-align:center;" id="loadLocationErrorDiv">
                        </div>
                        
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <label>Complex / Society Building Name</label><b style="color:red;">*</b>
                            <input type="text" name="ComplexSoceityBuilding" id="ComplexSoceityBuilding" onblur="checkValue(this)" style="text-transform: uppercase;"/>
                        </div>
                        
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <label>Furnished Status</label><b style="color:red;">*</b>
                            <select name="FurnishedStatus" id="FurnishedStatus">
                                <option hidden value="">--Select--</option>
                                <option disabled >Select one </option>
                                <option value="Furnished">Furnished</option>
                                <option value="Unfurnished">Unfurnished</option>
                                <option value="Semi Furnished">Semi Furnished</option>
                            </select>		  
                        </div>
                        
                        <!--------- Note:  This Area Only For Rent Forms ---------
                        <div class="col-md-3 col-sm-6 col-xs-6">
                            <label>Minimun Rent</label><b style="color:red;">*</b>
                            <input maxlenght=15 type="number" min=0 name="MinimumRent" id="MinimumRent" />
                        </div>

                        <div class="col-md-3 col-sm-6 col-xs-6">
                            <label>Maximum Rent</label><b style="color:red;">*</b>
                            <input maxlenght=15 type="number" min=0 name="MaximumRent" id="MaximumRent" />
                        </div>
                        --------------------------------------------------->
                        
                        <div class="col-md-6 col-sm-6 col-xs-6">
                            <label>Min Budget</label><b style="color:red;">*</b>
                            <input maxlenght=15 type="number" min=0 name="MinimumRent" id="MinimumRent" />
                        </div>

                        <div class="col-md-6 col-sm-6 col-xs-6">
                            <label>Max Budget</label><b style="color:red;">*</b>
                            <input maxlenght=15 type="number" min=0 name="MaximumRent" id="MaximumRent" />
                        </div>
                        
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <label>Room</label><b style="color:red;">*</b>
                            <select id="Room" name="Room">
                                <option hidden value="">--Select--</option>
                                <option disabled >Select one </option>
                                 <?php for($i = 1; $i<=100; $i++){ ?>
                                <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <label>Bathroom</label><b style="color:red;">*</b>
                            <select id="Bathroom" name="Bathroom">
                                <option hidden value="">--Select--</option>
                                <option disabled >Select one </option>
                                 <?php for($i = 1; $i<=100; $i++){ ?>
                                <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                <?php } ?>
                            </select>
                        </div>

                        <div class="col-md-3 col-sm-6 col-xs-6">
                            <label>Min Area</label><b style="color:red;">*</b>
                            <input type="number" min=0 name="FlatMinimumAreaRequired" id="FlatMinimumAreaRequired" onblur="checkValue(this)"  />
                        </div>

                        <div class="col-md-3 col-sm-6 col-xs-6">
                            <label>Unit</label><b style="color:red;">*</b>
                            <select name="SuperBuildupAreaUnit" id="SuperBuildupAreaUnit" onblur="checkValue(this)" >
                                <option hidden value="">Unit</option>
                                <option disabled >Select one </option>
                                <option value="Sq-ft">Sq-ft</option>
                                <option value="Sq-yrd">Sq-yrd</option>
                                <option value="Sq-m">Sq-m</option>
                                <option value="Acre">Acre</option>
                                <option value="Bigha">Bigha</option>
                                <option value="Hectare">Hectare</option>
                                <option value="Marla">Marla</option>
                                <option value="Chatak">Chatak</option>
                                <option value="kottah">kottah</option>
                            </select>
                        </div>

                        <div class="col-md-3 col-sm-6 col-xs-6">
                            <label>Max Area</label><b style="color:red;">*</b>
                            <input type="number" min=0 name="FlatMaximumAreaRequired" id="FlatMaximumAreaRequired"  onblur="checkValue(this)"  />
                        </div>

                        <div class="col-md-3 col-sm-6 col-xs-6">
                            <label>Unit</label><b style="color:red;">*</b>
                            <select name="BuildupAreaUnit" id="BuildupAreaUnit"  onblur="checkValue(this)" >
                                <option hidden value="">Unit</option>
                                <option disabled >Select one </option>
                                <option value="Sq-ft">Sq-ft</option>
                                <option value="Sq-yrd">Sq-yrd</option>
                                <option value="Sq-m">Sq-m</option>
                                <option value="Acre">Acre</option>
                                <option value="Bigha">Bigha</option>
                                <option value="Hectare">Hectare</option>
                                <option value="Marla">Marla</option>
                                <option value="Chatak">Chatak</option>
                                <option value="kottah">kottah</option>
                            </select>
                        </div>

                        <div class="col-md-3 col-sm-3 col-xs-6">
                            <label>Min Floor Height</label><b style="color:red;">*</b>
                            <select  name="MinimumFloorHeight" id="MinimumFloorHeight" onblur="checkValue(this)" >
                                <option hidden value="">--Select--</option>
                                <option disabled >Select one </option>
                                <option value="G">G</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                                <option value="13">13</option>
                                <option value="14">14</option>
                                <option value="15">15</option>
                                <option value="16">16</option>
                                <option value="17">17</option>
                                <option value="18">18</option>
                                <option value="19">19</option>
                                <option value="20">20</option>
                                <option value="21">21</option>
                                <option value="22">22</option>
                                <option value="23">23</option>
                                <option value="24">24</option>
                                <option value="25">25</option>
                                <option value="26">26</option>
                                <option value="27">27</option>
                                <option value="28">28</option>
                                <option value="29">29</option>
                                <option value="30">30</option>
                                <option value="31">31</option>
                                <option value="32">32</option>
                                <option value="33">33</option>
                                <option value="34">34</option>
                                <option value="35">35</option>
                                <option value="36">36</option>
                                <option value="37">37</option>
                                <option value="38">38</option>
                                <option value="39">39</option>
                                <option value="40">40</option>
                                <option value="41">41</option>
                                <option value="42">42</option>
                                <option value="43">43</option>
                                <option value="44">44</option>
                                <option value="45">45</option>
                                <option value="46">46</option>
                                <option value="47">47</option>
                                <option value="48">48</option>
                                <option value="49">49</option>
                                <option value="50">50</option>
                                <option value="51">51</option>
                                <option value="52">52</option>
                                <option value="53">53</option>
                                <option value="54">54</option>
                                <option value="55">55</option>
                                <option value="56">56</option>
                                <option value="57">57</option>
                                <option value="58">58</option>
                                <option value="59">59</option>
                                <option value="60">60</option>
                                <option value="61">61</option>
                                <option value="62">62</option>
                                <option value="63">63</option>
                                <option value="64">64</option>
                                <option value="65">65</option>
                                <option value="66">66</option>
                                <option value="67">67</option>
                                <option value="68">68</option>
                                <option value="69">69</option>
                                <option value="70">70</option>
                                <option value="71">71</option>
                                <option value="72">72</option>
                                <option value="73">73</option>
                                <option value="74">74</option>
                                <option value="75">75</option>
                                <option value="76">76</option>
                                <option value="77">77</option>
                                <option value="78">78</option>
                                <option value="79">79</option>
                                <option value="80">80</option>
                                <option value="81">81</option>
                                <option value="82">82</option>
                                <option value="83">83</option>
                                <option value="84">84</option>
                                <option value="85">85</option>
                                <option value="86">86</option>
                                <option value="87">87</option>
                                <option value="88">88</option>
                                <option value="89">89</option>
                                <option value="90">90</option>
                                <option value="91">91</option>
                                <option value="92">92</option>
                                <option value="93">93</option>
                                <option value="94">94</option>
                                <option value="95">95</option>
                                <option value="96">96</option>
                                <option value="97">97</option>
                                <option value="98">98</option>
                                <option value="99">99</option>
                                <option value="100">100</option>
                            </select>
                        </div>

                        <div class="col-md-3 col-sm-3 col-xs-6">
                            <label>Max Floor Height</label><b style="color:red;">*</b>
                            <select  name="MaximumFloorHeight" id="MaximumFloorHeight" onblur="checkValue(this)" >
                                <option hidden value="">--Select--</option>
                                <option disabled >Select one </option>
                                <option value="G">G</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                                <option value="13">13</option>
                                <option value="14">14</option>
                                <option value="15">15</option>
                                <option value="16">16</option>
                                <option value="17">17</option>
                                <option value="18">18</option>
                                <option value="19">19</option>
                                <option value="20">20</option>
                                <option value="21">21</option>
                                <option value="22">22</option>
                                <option value="23">23</option>
                                <option value="24">24</option>
                                <option value="25">25</option>
                                <option value="26">26</option>
                                <option value="27">27</option>
                                <option value="28">28</option>
                                <option value="29">29</option>
                                <option value="30">30</option>
                                <option value="31">31</option>
                                <option value="32">32</option>
                                <option value="33">33</option>
                                <option value="34">34</option>
                                <option value="35">35</option>
                                <option value="36">36</option>
                                <option value="37">37</option>
                                <option value="38">38</option>
                                <option value="39">39</option>
                                <option value="40">40</option>
                                <option value="41">41</option>
                                <option value="42">42</option>
                                <option value="43">43</option>
                                <option value="44">44</option>
                                <option value="45">45</option>
                                <option value="46">46</option>
                                <option value="47">47</option>
                                <option value="48">48</option>
                                <option value="49">49</option>
                                <option value="50">50</option>
                                <option value="51">51</option>
                                <option value="52">52</option>
                                <option value="53">53</option>
                                <option value="54">54</option>
                                <option value="55">55</option>
                                <option value="56">56</option>
                                <option value="57">57</option>
                                <option value="58">58</option>
                                <option value="59">59</option>
                                <option value="60">60</option>
                                <option value="61">61</option>
                                <option value="62">62</option>
                                <option value="63">63</option>
                                <option value="64">64</option>
                                <option value="65">65</option>
                                <option value="66">66</option>
                                <option value="67">67</option>
                                <option value="68">68</option>
                                <option value="69">69</option>
                                <option value="70">70</option>
                                <option value="71">71</option>
                                <option value="72">72</option>
                                <option value="73">73</option>
                                <option value="74">74</option>
                                <option value="75">75</option>
                                <option value="76">76</option>
                                <option value="77">77</option>
                                <option value="78">78</option>
                                <option value="79">79</option>
                                <option value="80">80</option>
                                <option value="81">81</option>
                                <option value="82">82</option>
                                <option value="83">83</option>
                                <option value="84">84</option>
                                <option value="85">85</option>
                                <option value="86">86</option>
                                <option value="87">87</option>
                                <option value="88">88</option>
                                <option value="89">89</option>
                                <option value="90">90</option>
                                <option value="91">91</option>
                                <option value="92">92</option>
                                <option value="93">93</option>
                                <option value="94">94</option>
                                <option value="95">95</option>
                                <option value="96">96</option>
                                <option value="97">97</option>
                                <option value="98">98</option>
                                <option value="99">99</option>
                                <option value="100">100</option>
                            </select>
                        </div>
                        
                        <div class="col-md-12 col-sm-12 col-xs-12 pt-10 pb-10">
                            <label style="color:#444;">Additinal Info</label><b style="color:red;">*</b>
                        </div>
                        
                        <div class="col-md-3 col-sm-6 col-xs-6">
                            <label>Superbuiltup Area</label><b style="color:red;">*</b>
                            <input type="number" min=0 name="SuperBuildupArea" id="SuperBuildupArea"  onblur="checkValue(this)"  />
                        </div>

                        <div class="col-md-3 col-sm-6 col-xs-6">
                            <label>Unit</label><b style="color:red;">*</b>
                            <select name="SuperBuildupUnit" id="SuperBuildupUnit"  onblur="checkValue(this)" >
                                <option hidden value="">Unit</option>
                                <option disabled >Select one </option>
                                <option value="Sq-ft">Sq-ft</option>
                                <option value="Sq-yrd">Sq-yrd</option>
                                <option value="Sq-m">Sq-m</option>
                                <option value="Acre">Acre</option>
                                <option value="Bigha">Bigha</option>
                                <option value="Hectare">Hectare</option>
                                <option value="Marla">Marla</option>
                                <option value="Chatak">Chatak</option>
                                <option value="kottah">kottah</option>
                            </select>
                        </div>
                        
                        
                        <div class="col-md-3 col-sm-6 col-xs-6">
                            <label>Buildup Area</label><b style="color:red;">*</b>
                            <input type="number" min=0 name="BuildupArea" id="BuildupArea"  onblur="checkValue(this)"  />
                        </div>

                        <div class="col-md-3 col-sm-6 col-xs-6">
                            <label>Unit</label><b style="color:red;">*</b>
                            <select name="BuildupUnit" id="BuildupUnit"  onblur="checkValue(this)" >
                                <option hidden value="">Unit</option>
                                <option disabled >Select one </option>
                                <option value="Sq-ft">Sq-ft</option>
                                <option value="Sq-yrd">Sq-yrd</option>
                                <option value="Sq-m">Sq-m</option>
                                <option value="Acre">Acre</option>
                                <option value="Bigha">Bigha</option>
                                <option value="Hectare">Hectare</option>
                                <option value="Marla">Marla</option>
                                <option value="Chatak">Chatak</option>
                                <option value="kottah">kottah</option>
                            </select>
                        </div>
                        
                        
                        <div class="col-md-3 col-sm-6 col-xs-6">
                            <label>Carpet Area</label><b style="color:red;">*</b>
                            <input type="number" min=0 name="CarpetArea" id="CarpetArea"  onblur="checkValue(this)"  />
                        </div>

                        <div class="col-md-3 col-sm-6 col-xs-6">
                            <label>Unit</label><b style="color:red;">*</b>
                            <select name="CarpetAreaUnit" id="CarpetAreaUnit"  onblur="checkValue(this)" >
                                <option hidden value="">Unit</option>
                                <option disabled >Select one </option>
                                <option value="Sq-ft">Sq-ft</option>
                                <option value="Sq-yrd">Sq-yrd</option>
                                <option value="Sq-m">Sq-m</option>
                                <option value="Acre">Acre</option>
                                <option value="Bigha">Bigha</option>
                                <option value="Hectare">Hectare</option>
                                <option value="Marla">Marla</option>
                                <option value="Chatak">Chatak</option>
                                <option value="kottah">kottah</option>
                            </select>
                        </div>
                        
                        
                        <div class="col-md-2 col-sm-6 col-xs-12">
                            <label>Balcony</label><b style="color:red;">*</b>
                            <select name="balcony" id="balcony"  onblur="checkValue(this)" value="">
                                <option hidden value="" >Select one </option>
                                <?php for($i = 1; $i<=100; $i++){ ?>
                                <option value="<?php echo $i; ?>" ><?php echo $i; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        
                        <div class="col-md-2 col-sm-6 col-xs-12">
                            <label>Kitchen</label><b style="color:red;">*</b>
                            <select name="kitchen" id="kitchen"  onblur="checkValue(this)" >
                                <option hidden value="" >Select one </option>
                                <?php for($i = 1; $i<=100; $i++){ ?>
                                <option value="<?php echo $i; ?>" ><?php echo $i; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        
                        <div class="col-md-2 col-sm-6 col-xs-12">
                            <label>Total Floor</label><b style="color:red;">*</b>
                            <select name="totalfloor" id="totalfloor"  onblur="checkValue(this)" >
                                <option hidden value="" >Select one </option>
                                <?php for($i = 1; $i<=100; $i++){ ?>
                                <option value="<?php echo $i; ?>" ><?php echo $i; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        
                        
                        <div class="col-md-12 col-sm-12 col-xs-12 pt-10 pb-10">
                            <label style="color:#444;">Parking Info</label><b style="color:red;">*</b>
                        </div>
                        
                        <div class="col-md-3 col-sm-3 col-xs-6">
                            <label>Open Parking</label>
                            <select id="OpenParking" name="OpenParking">
                                <option hidden value="">--Select--</option>
                                <option disabled >Select one </option>
                                <?php for($i = 1; $i<=100; $i++){ ?>
                                <option value="<?php echo $i; ?>" ><?php echo $i; ?></option>
                                <?php } ?>
                            </select>
                            <!----- Replace to select input -------
                            <input type="number" min=0 name="OpenParking" id="OpenParking" />
                            -------------------------------------->
                        </div>

                        <div class="col-md-3 col-sm-3 col-xs-6">
                            <label>Covered Parking</label>
                            <select id="CoveredParking" name="CoveredParking">
                                <option hidden value="">--Select--</option>
                                <option disabled >Select one </option>
                                <?php for($i = 1; $i<=100; $i++){ ?>
                                <option value="<?php echo $i; ?>" ><?php echo $i; ?></option>
                                <?php } ?>
                            </select>
                            <!----- Replace to select input -------
                            <input type="number" min=0 name="CoveredParking" id="CoveredParking" />
                            -------------------------------------->
                        </div>

                        <div class="col-md-3 col-sm-3 col-xs-6">
                            <label>Basement Parking</label>
                            <select id="Basement" name="Basement">
                                <option hidden value="">--Select--</option>
                                <option disabled >Select one </option>
                                <?php for($i = 1; $i<=100; $i++){ ?>
                                <option value="<?php echo $i; ?>" ><?php echo $i; ?></option>
                                <?php } ?>
                            </select>
                                
                            <!----- Replace to select input -------
                            <input type="number" min=0 name="Basement"  id="Basement"/>
                            -------------------------------------->
                        </div>

                        <div class="col-md-3 col-sm-3 col-xs-6">
                            <label>Lift Parking</label>
                            <select id="LiftParking" name="LiftParking">
                                <option hidden value="">--Select--</option>
                                <option disabled >Select one </option>
                                <?php for($i = 1; $i<=100; $i++){ ?>
                                <option value="<?php echo $i; ?>" ><?php echo $i; ?></option>
                                <?php } ?>
                            </select>
                            
                            <!----- Replace to select input -------
                            <input type="number" min=0 name="LiftParking" id="LiftParking" />
                            -------------------------------------->
                        </div>
                            
                        <div class="col-md-3 col-sm-3 col-xs-12">
                            <label>Two Wheeler</label>
                            <select id="TwoWheeler" name="TwoWheeler">
                                <option hidden value="">--Select--</option>
                                <option disabled >Select one </option>
                                <?php for($i = 1; $i<=100; $i++){ ?>
                                <option value="<?php echo $i; ?>" ><?php echo $i; ?></option>
                                <?php } ?>
                            </select>
                            
                            <!----- Replace to select input -------
                            <input type="number" min=0 name="TwoWheeler" id="TwoWheeler" />
                            -------------------------------------->
                        </div>    
                        
                    <div class="col-md-12 col-sm-12 col-xs-12 pt-10">
    			        <label style="color:#444;">Possession Info</label><b style="color:red;">*</b>
    			    </div>    
                        
                    <div class="col-md-12 col-sm-12 col-xs-12" style="padding:0;margin:0;">
    			    <div class="col-md-3 col-sm-3 col-xs-12 radiobtn">
    			        <input type="radio" id="ReadyToMove" value="ReadyToMove" name="section" checked />
    			        <label for="ReadyToMove" >Ready To Move</label>
    			    </div>
    			    
    			    <div class="col-md-3 col-sm-3 col-xs-12 radiobtn">
    			        <input type="radio" id="PossessionFrom" value="PossessionFrom" name="section" />
    			        <label for="PossessionFrom" >Possession From</label>
    			    </div>
    			    
    			    <!----- Show this area when user select Possession from radio button --->
    			    <div class="col-md-6 col-sm-6 col-xs-12 xs-pt-10" id="PossessionDateDiv">
                        <input type="date" name="PossessionDate" id="PossessionDate"  placeholder="DD/MM/YYYY" style="text-transform:uppercase;" />
    			    </div>
    			    </div>
                        
                        
                        <div class="col-md-12 col-sm-12 col-xs-12 pt-20">
                            <label style="color:#444;">Amenities</label><b style="color:red;">*</b>
                        </div>
                       
                       <div class="col-md-12 col-sm-12 col-xs-12 pb-20">
                            <div class="col-md-2 col-sm-6 col-xs-6">
                                <input type="checkbox" value="1" name="PowerBackup" id="PowerBackup" onblur="checkValue(this)"> 
                                <label for="PowerBackup">Power Backup</label>
                                
                                <input type="checkbox" value="1" name="Intercom" id="Intercom" onblur="checkValue(this)">
                                <label for="Intercom">Intercom</label>
                                
                                <input type="checkbox" value="1" name="Lift" id="Lift" onblur="checkValue(this)"  />
                                <label for="Lift">Lift</label>
                                
                                <input type="checkbox" value="1" name="GasPipeLine" id="GasPipeLine" onblur="checkValue(this)"  />
                                <label for="GasPipeLine">Gas Pipe Line</label>
                            </div>
                            <div class="col-md-2 col-sm-6 col-xs-6">
                                <input type="checkbox" value="1" name="ServiveLift" id="ServiveLift" onblur="checkValue(this)"  />
                                <label for="ServiveLift">Service Lift</label>
                                
                                <input type="checkbox" value="1" name="CCTV" id="CCTV" onblur="checkValue(this)"  />
                                <label for="CCTV">CCTV</label>
                                
                                <input type="checkbox" value="1" name="WIFI" id="WIFI" onblur="checkValue(this)"  />
                                <label for="WIFI">WIFI</label>
                                
                                <input type="checkbox" value="1" name="Security" id="Security" onblur="checkValue(this)"  />
                                <label for="Security">24 Hr.Security</label>
                            </div>
                            <div class="col-md-2 col-sm-6 col-xs-6">
                                <input type="checkbox" value="1" name="BanquetHall" id="BanquetHall" onblur="checkValue(this)"  />
                                <label for="BanquetHall">Banquet Hall</label>
                                
                                <input type="checkbox" value="1" name="SwimmingPool" id="SwimmingPool" onblur="checkValue(this)"  />
                                <label for="SwimmingPool">Swimming Pool</label>
                                
                                <input type="checkbox" value="1" name="CommunityHall" id="CommunityHall" onblur="checkValue(this)"  />
                                <label for="CommunityHall">Community Hall</label>
                                
                                <input type="checkbox" value="1" name="SarvantRoom" id="SarvantRoom" onblur="checkValue(this)"  />
                                <label for="SarvantRoom">Sarvant Room</label>
                            </div>
                            <div class="col-md-2 col-sm-6 col-xs-6">
                                <input type="checkbox" value="1" name="GYM" id="GYM" onblur="checkValue(this)"  />
                                <label for="GYM">Gym</label>
                                
                                <input type="checkbox" value="1" name="CloubHouse" id="CloubHouse" onblur="checkValue(this)"  />
                                <label for="CloubHouse">Club House</label>
                                
                                <input type="checkbox" value="1" name="IndoorGame" id="IndoorGame" onblur="checkValue(this)"  />
                                <label for="IndoorGame">Indoor Game</label>
                                
                                <input type="checkbox" value="1" name="OutDoorGame" id="OutDoorGame" onblur="checkValue(this)"  />
                                <label for="OutDoorGame">Outdoor Game</label>
                            </div>
                            <div class="col-md-2 col-sm-6 col-xs-6">
                                <input type="checkbox" value="1" name="Park" id="Park" onblur="checkValue(this)"  />
                                <label for="Park">Park</label>
                                
                                <input type="checkbox" value="1" name="VisitorParking" id="VisitorParking" onblur="checkValue(this)"  />
                                <label for="VisitorParking">Visitor Parking</label>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <input type="submit" name="save" value="Save" id="buyer-submit-btn"/>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>

<div class="modal fade" id="interested_popup" role="dialog">
        <div class="modal-dialog  modal-lg">

            <div class="modal-content">
                <div class="modal-header" style="background:linear-gradient(to right,#03709e,#18c3fd 100%);">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title" style="color:white;font-weight:bold;font-size:20px;">Add Interested Details</h4>
                </div>
                <div class="modal-body">
                    <form name="interested_popup_form" id="interested_popup_form" method="POST" enctype="multipart/form-data" action="<?php echo base_url(); ?>property/save_requirement_interested_details">
                        <div class="row">
                            <input type="hidden" name="interested_post_id" value="0" id="interested_post_id" style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" />
                            <input type="hidden" name="interested_rent_sell" value="<?php //echo $rent_sell; ?>" id="interested_rent_sell" style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" />
                            <input type="hidden" name="redirect_url" value="<?php echo current_url(); ?>" id="redirect_url" style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;"  />
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="col-md-4 col-sm-6 col-xs-6">
                                    <label>Status</label><b style="color:red;">*</b>
                                    <select name="interested_status" id="interested_status" class="form-control" onchange="change_post_status(this.value)" required>
                                        <option value="">Select One</option>
                                        <option value="Interested">Interested</option>
                                        <option value="In Process">In Process</option>
                                    </select>
                                </div>
                                <div class="col-md-4 col-sm-6 col-xs-6">
                                    <label>Buyer</label><b style="color:red;">*</b>
                                    <select name="interested_seller" id="interested_seller" class="form-control" value="" required>
                                        <option value="">Select One</option>
                                        <?php if(!empty($seller_list)){ ?>
                                        <?php foreach($seller_list as $row){ ?>
                                        <option value="<?php echo $row->post_id; ?>"><?php echo $row->lead_id; ?></option>
                                        <?php } ?>
                                        <?php } ?>
                                    </select>
                                </div>
                                <?php //($rent_sell == 'Sell'){ ?>
                                <div class="col-md-4 col-sm-6 col-xs-6 sell_div">
                                    <label>Amount</label><b style="color:red;">*</b>
                                    <input type="number" name="interested_amount" id="interested_amount" required style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;"    />
                                </div>
                                <?php //}else{ ?>
                                <div class="col-md-4 col-sm-6 col-xs-6 rent_div">
                                    <label>Security Deposite</label><b style="color:red;">*</b>
                                    <input type="number" name="interested_deposite" id="interested_deposite" required style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;"    />
                                </div>
                                
                                <div class="col-md-4 col-sm-6 col-xs-6 rent_div">
                                    <label>Rent/Month</label><b style="color:red;">*</b>
                                    <input type="number" name="interested_rent" id="interested_rent" required style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;"    />
                                </div>
                                
                                <div class="col-md-4 col-sm-6 col-xs-6 rent_div">
                                    <label>Expiry Date</label><b style="color:red;">*</b>
                                    <input type="date" name="interested_expiry_date" id="interested_expiry_date" required style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;"    />
                                </div>
                                <?php //} ?>
                                
                                
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="col-md-4 col-sm-6 col-xs-6">
                                    <label>Commission</label><b style="color:red;">*</b>
                                    <input type="number" name="interested_commission" id="interested_commission" required style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;"    />
                                </div>
                                
                                <div class="col-md-4 col-sm-6 col-xs-6">
                                    <label>Admin 1</label><b style="color:red;">*</b>
                                    <select name="interested_telecaller" id="interested_telecaller" required class="form-control">
                                        <option value="">Select One</option>
                                        <?php if(!empty($telecaller_list)){ ?>
                                        <?php foreach($telecaller_list as $row){ ?>
                                        <option value="<?php echo $row->user_id; ?>"><?php echo $row->name; ?></option>
                                        <?php } ?>
                                        <?php } ?>
                                    </select>
                                </div>
                                
                                <div class="col-md-4 col-sm-6 col-xs-6">
                                    <label>Admin 2</label><b style="color:red;">*</b>
                                    <select name="interested_executive" id="interested_executive" class="form-control" required>
                                        <option value="">Select One</option>
                                        <?php if(!empty($executive_list)){ ?>
                                        <?php foreach($executive_list as $row){ ?>
                                        <option value="<?php echo $row->user_id; ?>"><?php echo $row->name; ?></option>
                                        <?php } ?>
                                        <?php } ?>
                                    </select>
                                </div>
                                
                            </div>

                        </div>
                        <div class="modal-footer">
                            <input type="submit" name="save" value="Save" id="submit-btn" class="btn btn-primary"/>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
    
    
<div class="modal fade" id="buyerNotInterestedPopup" role="dialog">
    <div class="modal-dialog  modal-lg">

        <div class="modal-content">
            <div class="modal-header" style="background:linear-gradient(to right,#03709e,#18c3fd 100%);">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title" style="color:white;font-weight:bold;font-size:20px;">Not Intesrested Buyer</h4>
            </div>
            <div class="modal-body">
                <form method="POST" enctype="multipart/form-data" action="<?php echo base_url(); ?>property/save_buyer_not_interested">
                    <div class="row">
                        <input type="hidden" name="buyer_not_interested_post_id" value="0" id="buyer_not_interested_post_id" style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  />
                        <input type="hidden" name="redirect_url" value="<?php echo current_url(); ?>" id="redirect_url" style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  />
                         <div class="col-md-12 col-sm-6 col-xs-6">
                            <label>Reason</label><b style="color:red;">*</b>
                            <textarea name="reason" id="reason"style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="submit" name="save" value="Save" class="btn btn-primary"/>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>
    
    
<div class="modal fade" id="cancelDealPopup" role="dialog">
    <div class="modal-dialog  modal-lg">

        <div class="modal-content">
            <div class="modal-header" style="background:linear-gradient(to right,#03709e,#18c3fd 100%);">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title" style="color:white;font-weight:bold;font-size:20px;">Do you want to cancel all deals of this requirement?</h4>
            </div>
            <div class="modal-body">
                <form method="POST" enctype="multipart/form-data" action="<?php echo base_url(); ?>property/cancel_requirement_deals">
                    <div class="row">
                        <input type="hidden" name="cancel_deal_post_id" value="0" id="cancel_deal_post_id" style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" />
                        <input type="hidden" name="redirect_url" value="<?php echo current_url(); ?>" id="redirect_url" style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  />
                    </div>
                    <div class="modal-footer">
                        <input type="submit" name="save" value="Save" class="btn btn-primary"/>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>



<script>
    function edit_buyer(post_id, mode)
    {
        
        $.ajax
        ({
            type: "POST",
            url: "<?php echo base_url(); ?>property/get_requirement_details_by_id",
            data: {post_id:post_id},
            dataType: 'json',
            success: function(data)
            {
                $("#post_id").val(data['post_id']);
                $("#lead_id").val(data['lead_id']);
                $("#name").val(data['name']);
                $("#mobile").val(data['mobile']);
                $("#mobile2").val(data['mobile2']);
                $("#phone").val(data['phone']);
                $("#flat_email").val(data['email']);
                $("#city").val(data['city']);
                $("#state").val(data['state']);
                $("#location").val(data['location']);
                $("#rent_sell").val(data['rent_sell']);
                $("#MinimumRent").val(data['MinimumRent']);
                $("#MaximumRent").val(data['MaximumRent']);
                $("#FurnishedStatus").val(data['FurnishedStatus']);
                $("#ComplexSoceityBuilding").val(data['ComplexSoceityBuilding']);
                $("#section").val(data['section']);
                $("#ReadyToMove").prop('checked', (data['section']== 'ReadyToMove' ? true : false));
                $("#PossessionFrom").prop('checked', (data['section']== 'PossessionFrom' ? true : false));
                $("#PossessionDate").val(data['PossessionDate']);
                $("#balcony").val(data['balcony']);
                $("#kitchen").val(data['kitchen']);
                $("#totalfloor").val(data['totalfloor']);
                $("#OpenParking").val(data['OpenParking']);
                $("#CoveredParking").val(data['CoveredParking']);
                $("#Basement").val(data['Basement']);
                $("#LiftParking").val(data['LiftParking']);
                $("#TwoWheeler").val(data['TwoWheeler']);
                $("#Room").val(data['Room']);
                $("#Bathroom").val(data['Bathroom']);
                $("#FlatMinimumAreaRequired").val(data['FlatMinimumAreaRequired']);
                $("#SuperBuildupAreaUnit").val(data['SuperBuildupAreaUnit']);
                $("#MinimumFloorHeight").val(data['MinimumFloorHeight']);
                $("#FlatMaximumAreaRequired").val(data['FlatMaximumAreaRequired']);
                $("#BuildupAreaUnit").val(data['BuildupAreaUnit']);
                $("#SuperBuildupArea").val(data['SuperBuildupArea']);
                $("#SuperBuildupUnit").val(data['SuperBuildupUnit']);
                $("#BuildupArea").val(data['BuildupArea']);
                $("#BuildupUnit").val(data['BuildupUnit']);
                $("#CarpetArea").val(data['CarpetArea']);
                $("#CarpetAreaUnit").val(data['CarpetAreaUnit']);
                $("#MaximumFloorHeight").val(data['MaximumFloorHeight']);
                
                $("#PowerBackup").prop('checked',data['PowerBackup'] == 1 ? true:false);
                $("#ServiveLift").prop('checked',data['ServiveLift'] == 1 ? true:false);
                $("#BanquetHall").prop('checked',data['BanquetHall'] == 1 ? true:false);
                $("#GYM").prop('checked',data['GYM'] == 1 ? true:false);
                $("#VisitorParking").prop('checked',data['VisitorParking'] == 1 ? true:false);
                $("#Intercom").prop('checked',data['Intercom'] == 1 ? true:false);
                $("#CCTV").prop('checked',data['CCTV'] == 1 ? true:false);
                $("#SwimmingPool").prop('checked',data['SwimmingPool'] == 1 ? true:false);
                $("#CloubHouse").prop('checked',data['CloubHouse'] == 1 ? true:false);
                $("#SarvantRoom").prop('checked',data['SarvantRoom'] == 1 ? true:false);
                $("#Lift").prop('checked',data['Lift'] == 1 ? true:false);
                $("#WIFI").prop('checked',data['WIFI'] == 1 ? true:false);
                $("#CommunityHall").prop('checked',data['CommunityHall'] == 1 ? true:false);
                $("#IndoorGame").prop('checked',data['IndoorGame'] == 1 ? true:false);
                $("#OutDoorGame").prop('checked',data['OutDoorGame'] == 1 ? true:false);
                $("#GasPipeLine").prop('checked',data['GasPipeLine'] == 1 ? true:false);
                $("#Park").prop('checked',data['Park'] == 1 ? true:false);
                $("#Security").prop('checked',data['Security'] == 1 ? true:false);
                
                if(mode == 'view'){
                    $("#buyer-submit-btn").css('display','none');
                }else{
                    $("#buyer-submit-btn").css('display','block');
                }
                $("#myModal").modal();
            }

        });	
    }
    
    function delete_buyer(post_id){
        $('#delete_buyer_post_id').val(post_id);
        $('#deleteBuyer').modal();
    }
    
    function buyer_not_interested(post_id)
    {
        $("#buyer_not_interested_post_id").val(post_id);
        $("#buyerNotInterestedPopup").modal();
    }
    
    function cancel_deal(post_id)
    {
        $('#cancel_deal_post_id').val(post_id);
        $('#cancelDealPopup').modal();
    }
    
    function interested_popup(post_id){
      $('#interested_post_id').val(post_id);
      $('#interested_popup').modal();
    }
    
    function change_post_status(value){
      if(value == 'In Process'){
          /*$('#interested_seller').attr('required', 'required');*/
          $('#interested_amount').attr('required', 'required');
          $('#interested_deposite').attr('required', 'required');
          $('#interested_rent').attr('required', 'required');
          $('#interested_expiry_date').attr('required', 'required');
          $('#interested_commission').attr('required', 'required');
          $('#interested_telecaller').attr('required', 'required');
          $('#interested_executive').attr('required', 'required');
      }else{
          /*$('#interested_seller').removeAttr('required');*/
          $('#interested_amount').removeAttr('required');
          $('#interested_deposite').removeAttr('required');
          $('#interested_rent').removeAttr('required');
          $('#interested_expiry_date').removeAttr('required');
          $('#interested_commission').removeAttr('required');
          $('#interested_telecaller').removeAttr('required');
          $('#interested_executive').removeAttr('required');
      }
  }
  
  $(document).ready(function() {
    $('#interested_seller').select2();
});

$('input[type=radio][name=res_com]').change(function() {
        if(this.value == 'Residential'){
            $('.commercial').css('display', 'none');
            $('.residential').css('display', 'block');
        }else{
            $('.residential').css('display', 'none');
            $('.commercial').css('display', 'block');
        }
    });
    
</script>

<!--<script>
    $('#residential').change(function()
    {
 /*       var res_com = $("input:radio[name=res_com]:checked").val();
        var buy_rent = $("input:radio[name=buy_rent]:checked").val();
        var type = this.value;
        if(res_com == "Residential")
        {
            if(buy_rent == "buy")
            {
                if(type == "DuplexFlat"){$('#res_buy_duplex_flat').css('display', 'contents');}
                else if(type == "PentHouse"){$('#res_buy_pent_house').css('display', 'contents');}   
                else if(type == "Flat"){$('#res_buy_flat').css('display', 'contents');}   
                else if(type == "HouseorBanglow"){$('#res_buy_house').css('display', 'contents');}   
                else if(type == "Land"){ $('#res_buy_land').css('display', 'contents'); }
            }
            else
            {
                if(type == "DuplexFlat"){$('#res_rent_duplex_flat').css('display', 'contents');}
                else if(type == "PentHouse"){$('#res_rent_pent_house').css('display', 'contents');}   
                else if(type == "Flat"){$('#res_rent_flat').css('display', 'contents');}   
                else if(type == "HouseorBanglow"){$('#res_rent_house').css('display', 'contents');}   
                else if(type == "Land"){$('#res_rent_land').css('display', 'contents');}
            }
        }
        else
        {
            if(buy_rent == "buy")
            {
                if(type == "Factory"){$('#com_buy_factory').css('display', 'contents');}
                else if(type == "Office"){$('#com_buy_office').css('display', 'contents');}   
                else if(type == "ShopOrShowroom"){$('#com_buy_shop').css('display', 'contents');}   
                else if(type == "Warehouse"){$('#com_buy_warehoouse').css('display', 'contents');}   
                else if(type == "Land"){ $('#com_buy_land').css('display', 'contents'); }
            }
            else
            {
                if(type == "Factory"){$('#com_rent_factory').css('display', 'contents');}
                else if(type == "Office"){$('#com_rent_office').css('display', 'contents');}   
                else if(type == "ShopOrShowroom"){$('#com_rent_shop').css('display', 'contents');}   
                else if(type == "Warehouse"){$('#com_rent_warehoouse').css('display', 'contents');}   
                else if(type == "Land"){$('#com_rent_land').css('display', 'contents');}
            }
        }*/
        /*if(this.value == 'Residential'){
            $('.commercial').css('display', 'none');
            $('.residential').css('display', 'block');
        }else{
            $('.residential').css('display', 'none');
            $('.commercial').css('display', 'block');
        }
    });*/
</script>-->


</div>