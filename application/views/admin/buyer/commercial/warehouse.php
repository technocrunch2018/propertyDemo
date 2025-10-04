<div class="right_col" role="main">
    <div class="page-title">
        <div class="title_left">
            <h3><i class="fa fa-ioxhost"></i> Manage Warehouse</h3>
        </div>
    </div>

    <div class="clearfix"></div>

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">

            <div class="x_panel">
                
                <?php if($this->session->userdata('user_type') != 'admin'){ ?>
                 <div class="x_panel">
                    <div class="x_content">
                        <?php if($rent_sell == 'Rent'){ ?>
                        <form method = "POST" action = "<?php echo base_url('Excel_uploads/buyer_com_rent_warehouse');?>" enctype = "multipart/form-data">
                            <?php }else{?>
                            <form method = "POST" action = "<?php echo base_url('Excel_uploads/buyer_com_sell_warehouse');?>" enctype = "multipart/form-data">
                                <?php }?>
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
                        <?php if($rent_sell == 'Rent'){ ?>
                        <a class="outln-hvr" href = "<?php echo base_url('Uploads/excels/buyer/Flat/buyer_com_rent_warehouse.xlsx');?>">Download Demo File</a>
                        <?php }else{?>
                        <a class="outln-hvr" href = "<?php echo base_url('Uploads/excels/buyer/Flat/buyer_com_sell_warehouse.xlsx');?>">Download Demo File</a>
                        <?php }?>
                    </div>
                </div>
                <?php } ?>
                
                <div class="x_title">
                    <div class="col-md-3 col-sm-6 col-xs-12 xs-pb-10">
                         <h2>Warehouse List</h2>
                    </div>
                    <?php if($rent_sell == 'Sell'){ ?>
                    <a href = "<?php echo base_url('property/buyer_commercial_sale_warehouse_not_interested');?>"><button type="button" class="effect effect-5 blue pull-right">Not Intrested</button></a>
                    <?php }else{ ?>
                    <a href = "<?php echo base_url('property/buyer_commercial_rent_warehouse_not_interested');?>"><button type="button" class="effect effect-5 blue pull-right">Not Intrested</button></a>
                    <?php } ?>
                    <button type="button" class="effect effect-5 red  pull-right" data-toggle="modal" data-target="#myModal">ADD NEW</button>
                    <button type="button" class="effect effect-5 blue pull-right" onclick="send_link_popup('post_requirement')">Send Link</button>
                    
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <table id="datatable" class="table table-bordered table-striped table">
                        <thead> 

                            <tr>
                                <th>Sr.No.</th>
                                <th>Prop ID</th>
                                <th>Status</th>
                                <th>Name</th>
                                <th>Mobile<br/>Mobile1</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>State</th>
                                <th>City</th>
                                <th>Location</th>
                                <th>Complex Name</th>
                                <th>Section</th>
                                <th>PossessionDate</th>
                                <th>FurnishedStatus</th>
                                <th>MinimumRent</th>
                                <th>MaximumRent</th>
                                <th>OpenParking</th>
                                <th>CoveredParking</th>
                                <th>Basement</th>
                                <th>LiftParking</th>
                                <th>TwoWheeler</th>
                                <th>created</th>
                                <th>Action</th>
                            </tr>

                        </thead>
                        <tbody>
                            <?php if(!empty($list)){ ?>
                            <?php foreach($list as $i=>$row){ ?>
                            <tr>
                                <td><?php echo $i+1;?></td>
                                <td><a href="javascript:void(0);" onclick="edit_buyer(<?php echo $row->post_id; ?>, 'view');"><?php echo $row->lead_id;?></a></td>
                                <td>
                                    <?php if($row->status == 1){ ?>
                                    <span class="label label-success" title="Active">Active</span>
                                    <?php }else{ ?>
                                    <span class="label label-danger" title="Not Interested">Not Interested</span>
                                    <?php } ?>
                                </td>
                                <td><?php echo $row->name;?></td>
                                <td><?php echo $row->mobile.'<br/>'.$row->mobile2;?></td>
                                <td><?php echo $row->phone;?></td>
                                <td><?php echo $row->email;?></td>
                                <td><?php echo $row->state;?></td>
                                <td><?php echo $row->city;?></td>
                                <td><?php echo $row->location;?></td>
                                <td><?php echo $row->ComplexSoceityBuilding;?></td>
                                <td><?php echo $row->rent_sell;?></td>
                                <td><?php echo $row->PossessionDate;?></td>
                                <td><?php echo $row->FurnishedStatus;?></td>
                                <td><?php echo $row->MinimumRent;?></td>
                                <td><?php echo $row->MaximumRent;?></td>
                                <td><?php echo $row->OpenParking;?></td>
                                <td><?php echo $row->CoveredParking;?></td>
                                <td><?php echo $row->Basement;?></td>
                                <td><?php echo $row->LiftParking;?></td>
                                <td><?php echo $row->TwoWheeler;?></td>
                                <td><?php echo $row->created;?></td>
                                <td>
                                    <a href="javascript:void(0);" onclick="edit_buyer(<?php echo $row->post_id; ?>, 'edit');" title="Edit"><span class="label label-primary">Edit</span></a>
                                    <!--<a onclick="return confirm('Do You want to delete this record?');" href="<?php echo base_url();?>property/delete_buyer/<?php echo $row->post_id; ?>" title="Delete"><span class="label label-danger">Delete</span></a>-->
                                   <?php if($this->session->userdata('user_type') != 'admin'){ ?>
                                    <a onclick="delete_buyer(<?php echo $row->post_id; ?>)" href="javascript:void(0);" title="Delete"><span class="label label-danger">Delete</span></a>
                                    <?php } ?>
                                    <?php if($row->status == 1){ ?>
                                    <span class="label label-warning" onclick="buyer_not_interested(<?php echo $row->post_id; ?>)" title="Not Interested">Not Interested</span>
                                    <?php } ?>
                                </td>
                        
                               
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





<div class="container">
    <!-- Trigger the modal with a button -->
    <!-- Modal -->
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog  modal-lg">

            <div class="modal-content">
                <div class="modal-header" style="background:linear-gradient(to right,#03709e,#18c3fd 100%);">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title" style="color:white;font-weight:bold;font-size:20px;">Add Warehouse Requirement</h4>
                </div>
                <div class="modal-body">
                    <form method="POST" enctype="multipart/form-data" action="<?php echo base_url(); ?>property/save_buyer">
                        <div class="row">
                            <input type="hidden" name="added_by" value="Super Admin" id="added_by" onblur="checkValue(this)"  />
                            <input type="hidden" name="post_id" value="0" id="post_id" onblur="checkValue(this)"  />
                            <input type="hidden" name="residential" value="Warehouse" id="residential" onblur="checkValue(this)"  />
                            <input type="hidden" name="residential_commercial" value="Commercial" id="residential_commercial" onblur="checkValue(this)"  />
                            <input type="hidden" name="rent_sell" value="<?php echo $rent_sell; ?>" id="rent_sell" onblur="checkValue(this)"  />
                            <input type="hidden" name="redirect_url" value="<?php echo current_url(); ?>" />
                            
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <label>Name</label><b style="color:red;">*</b>
                                <input type="text" name="name" id="name" onblur="checkValue(this)" style="text-transform: uppercase;" required  />
                            </div>
                            
                            <div class="col-md-3 col-sm-3 col-xs-6">
                                <label>Mobile</label><b style="color:red;">*</b>
                                <input type="number" name="mobile" id="mobile" onkeypress="return event.charCode >= 48" min="0"  required  />
                            </div>

                            <div class="col-md-3 col-sm-3 col-xs-6">
                                <label>Alt. Mobile</label>
                                <input type="number" name="mobile2" id="mobile2" onkeypress="return event.charCode >= 48" min="0" onblur="checkValue(this)" />
                            </div>

                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <label>Phone</label>
                                <input type="number" class="input--style-5" name="phone" onkeypress="return event.charCode >= 48" min="0" id="phone"  >
                            </div>

                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <label>E-mail</label>
                                <input type="email" name="email" id="warehouse_email" onblur="checkValue(this)" style="text-transform: lowercase;"  />
                            </div>

                            <div class="col-md-3 col-sm-3 col-xs-6">
                                <label>State</label><b style="color:red;">*</b>
                                <select id="state" name="state" required onchange="get_city_list_by_state_name(this.value)">
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

                            <div class="col-md-3 col-sm-3 col-xs-6">
                                <label>City</label><b style="color:red;">*</b>
                                <select id="city" name="city" required onchange="get_location_list_by_city_name(this.value)">
                                    <option hidden value="">--Select--</option>
                                    <option disabled >Select one </option>
                                </select>
                            </div>


                            <div class="col-md-6 col-sm-6 col-xs-12" style="padding:0;margin:0;">
                                <div class="col-md-7 col-sm-7 col-xs-12">
                                    <label>Locations (Select 5 Locations Only)</label><b style="color:red;">*</b>
                                    <select id="location" name="location[]"  class="locations">
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
                                <label>Complex / Society Building Name</label>
                                <input type="text" name="ComplexSoceityBuilding" id="ComplexSoceityBuilding" onblur="checkValue(this)" style="text-transform: uppercase;"/>
                            </div>
                            
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <label>Furnished Status</label>
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
                                <input maxlenght=15 type="number" min=0 name="MinimumRent" id="MinimumRent" onkeypress="return event.charCode >= 48" required />
                            </div>

                            <div class="col-md-6 col-sm-6 col-xs-6">
                                <label>Max Budget</label><b style="color:red;">*</b>
                                <input maxlenght=15 type="number" min=0 name="MaximumRent" id="MaximumRent" onkeypress="return event.charCode >= 48" required />
                            </div>
                            
                            <div class="col-md-3 col-sm-6 col-xs-6">
                                <label>Super Builtup Area</label>
                                <input type="number" min=0 name="SuperBuildupArea" id="SuperBuildupArea" onblur="checkValue(this)" onkeypress="return event.charCode >= 48" />
                            </div>

                            <div class="col-md-3 col-sm-6 col-xs-6">
                                <label>Unit</label>
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
                                <label>Builtup Area</label>
                                <input type="number" min=0 name="BuildupArea" id="BuildupArea" onblur="checkValue(this)" onkeypress="return event.charCode >= 48" />
                            </div>

                            <div class="col-md-3 col-sm-6 col-xs-6">
                                <label>Unit</label>
                                <select name="BuildupAreaUnit" id="BuildupAreaUnit" onblur="checkValue(this)" >
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
                                <label>Min CoveredArea</label>
                                <input type="number" min=0 name="WarehouseMinimumCoveredArea" id="WarehouseMinimumCoveredArea" onblur="checkValue(this)" onkeypress="return event.charCode >= 48" />
                            </div>

                            <div class="col-md-3 col-sm-6 col-xs-6">
                                <label>Unit</label>
                                <select name="WarehouseMinimumCoveredAreaUnit" id="WarehouseMinimumCoveredAreaUnit" onblur="checkValue(this)" >
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
                                <label>Max CoveredArea</label>
                                <input type="number" min=0 name="WarehouseMaximumCoveredArea" id="WarehouseMaximumCoveredArea" onblur="checkValue(this)" onkeypress="return event.charCode >= 48" />
                            </div>

                            <div class="col-md-3 col-sm-6 col-xs-6">
                                <label>Unit</label>
                                <select name="WarehouseMaximumCoveredAreaUnit" id="WarehouseMaximumCoveredAreaUnit" onblur="checkValue(this)" >
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
                                <label>Min Open Area</label><b style="color:red;">*</b>
                                <input type="number" min=0 name="WarehouseMinimumOpenArea" id="WarehouseMinimumOpenArea"  onblur="checkValue(this)" onkeypress="return event.charCode >= 48" required  />
                            </div>

                            <div class="col-md-3 col-sm-6 col-xs-6">
                                <label>Unit</label><b style="color:red;">*</b>
                                <select name="WarehouseMinimumOpenAreaUnit" id="WarehouseMinimumOpenAreaUnit"  onblur="checkValue(this)" required >
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
                                <label>Max Open Area</label><b style="color:red;">*</b>
                                <input type="number" min=0 name="WarehouseMaximumOpenArea" id="WarehouseMaximumOpenArea"  onblur="checkValue(this)" onkeypress="return event.charCode >= 48" required  />
                            </div>

                            <div class="col-md-3 col-sm-6 col-xs-6">
                                <label>Unit</label><b style="color:red;">*</b>
                                <select name="WarehouseMaximumOpenAreaUnit" id="WarehouseMaximumOpenAreaUnit"  onblur="checkValue(this)" required >
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
                            
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <label>Vehicle Parking Upto</label>
                                <select id="warehouseHeavyVehicleParkingUpto" name="warehouseHeavyVehicleParkingUpto">
                                    <option hidden value="">--Select--</option>
                                    <option disabled >Select one </option>
                                    <option value="3Wheeler">3 Wheeler</option>
                                    <option value="4Wheeler">4 Wheeler</option>
                                    <option value="6Wheeler">6 Wheeler</option>
                                    <option value="8Wheeler">8 Wheeler</option>
                                    <option value="10Wheeler">10 Wheeler</option>
                                    <option value="12Wheeler">12 Wheeler</option>
                                    <option value="14Wheeler">14 Wheeler</option>
                                    <option value="16Wheeler">16 Wheeler</option>
                                    <option value="18Wheeler">18 Wheeler</option>
                                    <option value="20Wheeler">20 Wheeler</option>
                                
                                </select>
                            </div>

                            <div class="col-md-3 col-sm-3 col-xs-6">
                                <label>Min Floor</label>
                                <select  name="MinimumFloor" id="MinimumFloor" onblur="checkValue(this)" >
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
                                <label>Max Floor </label>
                                <select  name="MaximumFloor" id="MaximumFloor" onblur="checkValue(this)" >
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
                            
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <label>Roof</label>
                                <select id="WarehouseRoof" name="WarehouseRoof"  >
                                    <option hidden value="">--Select--</option>
                                    <option disabled >Select one </option>
                                    <option value="RCC">RCC</option>
                                    <option value="Shaded">Shaded</option>
                                </select>
                            </div>
                            
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <label>Heavy Vehicle Parking</label>
                                <select id="WarehouseHeavyVehicleParkingUpto" name="WarehouseHeavyVehicleParkingUpto"  >
                                    <option hidden value="">--Select--</option>
                                    <option disabled >Select one </option>
                                    <option value="3Wheeler">3 Wheeler</option>
                                    <option value="4Wheeler">4 Wheeler</option>
                                </select>
                            </div>
                            
                            <div class="col-md-3 col-sm-3 col-xs-6">
                                <label>Road Wide</label>
                                 <input type="number" name="WarehouseRoadWide" id="WarehouseRoadWide">
                            </div>
                            
                            <div class="col-md-3 col-sm-3 col-xs-6">
                                <label>Unit</label>
                                <select id="WarehouseRoadWideUnit" name="WarehouseRoadWideUnit"  >
                                    <option hidden value="">Unit</option>
                                    <option disabled >Select one </option>
                                    <option value="Sqft">FT</option>
                                    <option value="Sq-m">MT</option>
                                </select>
                            </div>
                            
                            <div class="col-md-3 col-sm-3 col-xs-6">
                                <label>Number of Cabin</label>
                                <select id="NumberofCabin" name="NumberofCabin">
                                    <option hidden value="">--Select--</option>
                                    <option disabled >Select one </option>
                                    <?php for($i = 1; $i<=100; $i++){ ?>
                                    <option value="<?php echo $i; ?>" ><?php echo $i; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="col-md-3 col-sm-3 col-xs-6">
                                <label>No.of Work Station</label>
                                <select id="NumberofWorkStation" name="NumberofWorkStation">
                                    <option hidden value="">--Select--</option>
                                    <option disabled >Select one </option>
                                    <?php for($i = 1; $i<=100; $i++){ ?>
                                    <option value="<?php echo $i; ?>" ><?php echo $i; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            
                            <div class="col-md-3 col-sm-3 col-xs-6">
                                <label>Pentry</label>
                                <input type="number" name="Pentry" id="Pentry" class="gui-input">
                            </div>
                            
                            
                            <div class="col-md-3 col-sm-3 col-xs-6">
                                <label>Used For</label>
                                <select id="PentryUsedFor" name="PentryUsedFor">
                                    <option hidden value="">--Select--</option>
                                    <option disabled >Select one </option>
                                    <option value="Personal">Personal</option>
                                    <option value="Common">Common</option>
                                </select>
                            </div>
                            
                            <div class="col-md-3 col-sm-3 col-xs-12">
                                <label>Bathroom</label>
                                <input type="number" name="Bathroom" id="Bathroom" class="gui-input">
                            </div>
                            
                            <div class="col-md-3 col-sm-3 col-xs-6">
                                <label>Used For</label>
                                <select id="BathroomsUsedFor" name="BathroomUsedFor">
                                    <option hidden value="">--Select--</option>
                                    <option disabled >Select one </option>
                                    <option value="Personal">Personal</option>
                                    <option value="Common">Common</option>
                                </select>
                            </div>
                            
                            <div class="col-md-12 col-sm-12 col-xs-12 pt-10 pb-10">
                            <label style="color:#444;">Parking Info</label>
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
        			        <label style="color:#444;">Possession Info</label>
        			    </div>    
                            
                        <div class="col-md-12 col-sm-12 col-xs-12" style="padding:0;margin:0;">
        			    <div class="col-md-3 col-sm-3 col-xs-12 radiobtn">
        			        <input type="radio" id="ReadyToMove" value="ReadyToMove" name="section" checked/>
        			        <label for="ReadyToMove" >Ready To Move</label>
        			    </div>
        			    
        			    <div class="col-md-3 col-sm-3 col-xs-12 radiobtn">
        			        <input type="radio" id="PossessionFrom" value="PossessionFrom" name="section" />
        			        <label for="PossessionFrom" >Possession From</label>
        			    </div>
        			    
        			    <div class="col-md-6 col-sm-6 col-xs-12 xs-pt-10" id="PossessionDateDiv" style="display:none;">
                            <input type="date" name="PossessionDate" id="PossessionDate"  placeholder="DD/MM/YYYY" style="text-transform:uppercase;" />
        			    </div>
        			    </div>
                            
                            
                            <div class="col-md-12 col-sm-12 col-xs-12 pt-20">
                                <label style="color:#444;">Amenities</label>
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
                            <input type="submit" name="save" value="Save" id="buyer-submit-btn" />
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
                            <input type="hidden" name="buyer_not_interested_post_id" value="0" id="buyer_not_interested_post_id" onblur="checkValue(this)"  />
                            <input type="hidden" name="redirect_url" value="<?php echo current_url(); ?>" id="redirect_url" onblur="checkValue(this)"  />
                             <div class="col-md-12 col-sm-6 col-xs-6">
                                <label>Reason</label><b style="color:red;">*</b>
                                <textarea name="reason" id="reason"></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <input type="submit" name="save" value="Save"/>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
    
    
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
                            <input type="hidden" name="delete_buyer_post_id" id="delete_buyer_post_id" />
                            <input type="hidden" name="redirect_url" value="<?php echo current_url(); ?>" />
                			<input type="submit" name="Yes" value="Yes" class="btn btn-warning"/>
                            <input type="button" name="No" value="No" data-dismiss="modal"/>
            			</div>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>


<script>
	function add()
	{
		$("#buyer-submit-btn").css('display','block');
		$("#post_id").val(0);
		$("#lead_id").val('');
        $("#name").val('');
        $("#mobile").val('');
        $("#mobile2").val('');
        $("#phone").val('');
        $("#flat_email").val('');
        $("#city").val('');
        $("#state").val('');
        $("#location").val('');
        $("#MinimumRent").val('');
        $("#MaximumRent").val('');
        $("#FurnishedStatus").val('');
        $("#ComplexSoceityBuilding").val('');
        $("#section").val('');
        $("#ReadyToMove").prop('checked', true);
        $("#PossessionFrom").prop('checked', false);
        $("#PossessionDate").val('');
        $("#balcony").val('');
        $("#kitchen").val('');
        $("#totalfloor").val('');
        $("#OpenParking").val('');
        $("#CoveredParking").val('');
        $("#Basement").val('');
        $("#LiftParking").val('');
        $("#TwoWheeler").val('');
        
        $("#WarehouseMinimumCoveredArea").val('');
        $("#WarehouseMinimumOpenArea").val('');
        $("#WarehouseMinimumCoveredAreaUnit").val('');
        $("#WarehouseMinimumOpenAreaUnit").val('');
        $("#WarehouseMaximumOpenArea").val('');
        $("#WarehouseMaximumCoveredAreaUnit").val('');
        $("#WarehouseMaximumOpenAreaUnit").val('');
        $("#WarehouseMaximumCoveredArea").val('');
        $("#WarehouseHeavyVehicleParkingUpto").val('');
        $("#WarehouseRoof").val('');
        $("#WarehouseRoadWide").val('');
        $("#WarehouseRoadWideUnit").val('');
        $("#MinimumFloor").val('');
        $("#MaximumFloor").val('');
        
        $("#SuperBuildupArea").val('');
        $("#SuperBuildupAreaUnit").val('');
        /*$("#CoveredArea").val(data['CoveredArea']);*/
        /*$("#CoveredAreaUnit").val(data['CoveredAreaUnit']);*/
        $("#BuildupArea").val('';
        $("#BuildupAreaUnit").val('');
        /*$("#OpenArea").val(data['OpenArea']);*/
        /*$("#OpenAreaUnit").val(data['OpenAreaUnit']);*/
        $("#NumberofCabin").val('');
        $("#NumberofWorkStation").val('');
        $("#Pentry").val('');
        $("#PentryUsedFor").val('');
        $("#Bathroom").val('');
        
        $("#PowerBackup").attr('checked',false);
        $("#ServiveLift").attr('checked',false);
        $("#Intercom").attr('checked',false);
        $("#BanquetHall").attr('checked',false);
        $("#GYM").attr('checked',false);
        $("#VisitorParking").attr('checked',false);
        $("#Intercom").attr('checked',false);
        $("#CCTV").attr('checked',false);
        $("#SwimmingPool").attr('checked',false);
        $("#CloubHouse").attr('checked',false);
        $("#SarvantRoom").attr('checked',false);
        $("#Lift").attr('checked',false);
        $("#WIFI").attr('checked',false);
        $("#CommunityHall").attr('checked',false);
        $("#IndoorGame").attr('checked',false);
        $("#OutDoorGame").attr('checked',false);
        $("#GasPipeLine").attr('checked',false);
        $("#Park").attr('checked',false);
        $("#Security").attr('checked',false);
        
		$("#myModal").modal();
	}
</script> 
            
   
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
                $("#name").val(data['name']);
                $("#mobile").val(data['mobile']);
                $("#mobile2").val(data['mobile2']);
                $("#phone").val(data['phone']);
                $("#warehouse_email").val(data['email']);
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
                $("#OpenParking").val(data['OpenParking']);
                $("#CoveredParking").val(data['CoveredParking']);
                $("#Basement").val(data['Basement']);
                $("#LiftParking").val(data['LiftParking']);
                $("#TwoWheeler").val(data['TwoWheeler']);
                
                $("#WarehouseMinimumCoveredArea").val(data['WarehouseMinimumCoveredArea']);
                $("#WarehouseMinimumOpenArea").val(data['WarehouseMinimumOpenArea']);
                $("#WarehouseMinimumCoveredAreaUnit").val(data['WarehouseMinimumCoveredAreaUnit']);
                $("#WarehouseMinimumOpenAreaUnit").val(data['WarehouseMinimumOpenAreaUnit']);
                $("#WarehouseMaximumOpenArea").val(data['WarehouseMaximumOpenArea']);
                $("#WarehouseMaximumCoveredAreaUnit").val(data['WarehouseMaximumCoveredAreaUnit']);
                $("#WarehouseMaximumOpenAreaUnit").val(data['WarehouseMaximumOpenAreaUnit']);
                $("#WarehouseMaximumCoveredArea").val(data['WarehouseMaximumCoveredArea']);
                $("#WarehouseHeavyVehicleParkingUpto").val(data['WarehouseHeavyVehicleParkingUpto']);
                $("#WarehouseRoof").val(data['WarehouseRoof']);
                $("#WarehouseRoadWide").val(data['WarehouseRoadWide']);
                $("#WarehouseRoadWideUnit").val(data['WarehouseRoadWideUnit']);
                $("#MinimumFloor").val(data['MinimumFloor']);
                $("#MaximumFloor").val(data['MaximumFloor']);
                
                $("#SuperBuildupArea").val(data['SuperBuildupArea']);
                $("#SuperBuildupAreaUnit").val(data['SuperBuildupAreaUnit']);
                /*$("#CoveredArea").val(data['CoveredArea']);*/
                /*$("#CoveredAreaUnit").val(data['CoveredAreaUnit']);*/
                $("#BuildupArea").val(data['BuildupArea']);
                $("#BuildupAreaUnit").val(data['BuildupAreaUnit']);
                /*$("#OpenArea").val(data['OpenArea']);*/
                /*$("#OpenAreaUnit").val(data['OpenAreaUnit']);*/
                
                $("#NumberofCabin").val(data['NumberofCabin']);
                $("#NumberofWorkStation").val(data['NumberofWorkStation']);
                $("#Pentry").val(data['Pentry']);
                $("#PentryUsedFor").val(data['PentryUsedFor']);
                $("#Bathroom").val(data['Bathroom']);
                
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
</script>









