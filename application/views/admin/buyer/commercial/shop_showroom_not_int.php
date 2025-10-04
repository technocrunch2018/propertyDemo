<div class="right_col" role="main">
    <div class="page-title">
        <div class="title_left">
            <h3><i class="fa fa-ioxhost"></i> Manage Shop/Showroom</h3>
        </div>
    </div>

    <div class="clearfix"></div>

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">

            <div class="x_panel">
                <div class="x_title">
                    <div class="col-md-3 col-sm-6 col-xs-12 xs-pb-10">
                         <h2>Shop/Showroom List</h2>
                    </div>
                    <?php if($rent_sell == 'Sell'){ ?>
                    <a href = "<?php echo base_url('property/buyer_commercial_sale_shop_showroom');?>"><button type="button" class="effect effect-5 blue pull-right">Intrested</button></a>
                    <?php }else{ ?>
                    <a href = "<?php echo base_url('property/buyer_commercial_rent_shop_showroom');?>"><button type="button" class="effect effect-5 blue pull-right">Intrested</button></a>
                    <?php } ?>
                    <!-- <button type="button" class="effect effect-5 red  pull-right" onclick="add()">ADD NEW</button>
                    <button type="button" class="effect effect-5 blue pull-right" onclick="send_link_popup('post_property')">Send Link</button> -->
                    
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
                                    <a href="javascript:void(0);" onclick="edit_buyer(<?php echo $row->post_id; ?>);" title="Edit"><span class="label label-primary">Edit</span></a>
                                    <!--<a onclick="return confirm('Do You want to delete this record?');" href="<?php echo base_url();?>property/delete_buyer/<?php echo $row->post_id; ?>" title="Delete"><span class="label label-danger">Delete</span></a>-->
                                    <a onclick="delete_buyer(<?php echo $row->post_id; ?>)" href="javascript:void(0);" title="Delete"><span class="label label-danger">Delete</span></a>
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
                    <h4 class="modal-title" style="color:white;font-weight:bold;font-size:20px;">Add Shop/Showroom Requirement</h4>
                </div>
                <div class="modal-body">
                    <form method="POST" enctype="multipart/form-data" action="<?php echo base_url(); ?>property/save_buyer">
                        <div class="row">
                            <input type="hidden" name="added_by" value="Super Admin" id="added_by" onblur="checkValue(this)"  />
                            <input type="hidden" name="post_id" value="0" id="post_id" onblur="checkValue(this)"  />
                            <input type="hidden" name="residential" value="ShopOrShowroom" id="residential" onblur="checkValue(this)"  />
                            <input type="hidden" name="residential_commercial" value="Commercial" id="residential_commercial" onblur="checkValue(this)"  />
                            <input type="hidden" name="rent_sell" value="<?php echo $rent_sell; ?>" id="rent_sell" onblur="checkValue(this)"  />
                            <input type="hidden" name="redirect_url" value="<?php echo current_url(); ?>" />
                            
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <label>Name</label><b style="color:red;">*</b>
                                <input type="text" name="name" id="name" onblur="checkValue(this)" style="text-transform: uppercase;" />
                            </div>
                            
                            <div class="col-md-3 col-sm-3 col-xs-6">
                                <label>Mobile</label><b style="color:red;">*</b>
                                <input type="number" name="mobile" id="mobile"   pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==10) return false;" required />
                            </div>

                            <div class="col-md-3 col-sm-3 col-xs-6">
                                <label>Alt. Mobile</label><b style="color:red;">*</b>
                                <input type="number" name="mobile2" id="mobile2" onblur="checkValue(this)"  pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==10) return false;" />
                            </div>

                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <label>Phone</label><b style="color:red;">*</b>
                                <input type="number" class="input--style-5"  name="phone" id="phone"  pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==15) return false;" onblur="checkValue(this)">
                            </div>

                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <label>E-mail</label><b style="color:red;">*</b>
                                <input type="text" name="email" id="email" onblur="checkValue(this)"  style="text-transform: lowercase;"  />
                            </div>

                            <div class="col-md-3 col-sm-3 col-xs-6">
                                <label>State</label><b style="color:red;">*</b>
                                <select id="state" name="state">
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
                                <select id="city" name="city">
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


                            <div class="col-md-6 col-sm-6 col-xs-12" style="padding:0;margin:0;">
                                <div class="col-md-7 col-sm-7 col-xs-12">
                                    <label>Locations (Select 5 Locations Only)</label><b style="color:red;">*</b>
                                    <select id="location" name="location[]" class="locations">
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
                                <label>Nature of Business</label><b style="color:red;">*</b>
                                <input type="text" name="ShopNatureofBusiness" id="ShopNatureofBusiness" >
                            </div>
                            
                            <div class="col-md-3 col-sm-3 col-xs-6">
                                <label>Frontage</label><b style="color:red;">*</b>
                                <input type="number" name="Frontage" id="Frontage" >
                            </div>
                            
                            <div class="col-md-3 col-sm-3 col-xs-6">
                                <label>Unit</label><b style="color:red;">*</b>
                                <select id="FrontageUnit" name="FrontageUnit"  >
                                    <option hidden value="">Unit</option>
                                    <option disabled >Select one </option>
                                    <option value="Sqft">FT</option>
                                    <option value="Sq-m">MT</option>
                                </select>
                            </div>
                            
                            <div class="col-md-3 col-sm-3 col-xs-6">
                                <label>Min Area Required</label><b style="color:red;">*</b>
                                <input type="number" name="ShopMinimumAreaRequired" id="ShopMinimumAreaRequired" >
                            </div>

                           <div class="col-md-3 col-sm-3 col-xs-6">
                                <label>Unit</label><b style="color:red;">*</b>
                                <select id="MinimumAreaRequiredUnit" name="MinimumAreaRequiredUnit" >
                                    <option hidden value="">Unit</option>
                                    <option disabled >Select one </option>
                                    <option value="Sqft">Sqft</option>
                                    <option value="Sq-m">Sq-m</option>
                                    <option value="Acre">Acre</option>
                                    <option value="Bigha">Bigha</option>
                                    <option value="Hectare">Hectare</option>
                                    <option value="Marla">Marla</option>
                                    <option value="Chatak">Chatak</option>
                                    <option value="Kottah">Kottah</option>
                                </select>
                            </div>
                            
                            <div class="col-md-3 col-sm-3 col-xs-6">
                                <label>Max Area Required</label><b style="color:red;">*</b>
                                <input type="text" name="ShopMaximumAreaRequired" id="ShopMaximumAreaRequired">
                            </div>

                           <div class="col-md-3 col-sm-3 col-xs-6">
                                <label>Unit</label><b style="color:red;">*</b>
                                <select id="ShopMaximumAreaRequiredUnit" name="ShopMaximumAreaRequiredUnit"  >
                                    <option hidden value="">Unit</option>
                                    <option disabled >Select one </option>
                                    <option value="Sqft">Sqft</option>
                                    <option value="Sq-m">Sq-m</option>
                                    <option value="Acre">Acre</option>
                                    <option value="Bigha">Bigha</option>
                                    <option value="Hectare">Hectare</option>
                                    <option value="Marla">Marla</option>
                                    <option value="Chatak">Chatak</option>
                                    <option value="Kottah">Kottah</option>
                                </select>
                            </div>
                            
                            <div class="col-md-12 col-sm-12 col-xs-12 pt-10 pb-10">
                                <label style="color:#444;">Additional Info</label>
                            </div>
                            
                            <div class="col-md-3 col-sm-3 col-xs-6">
                                <label>Super Buildup Area</label><b style="color:red;">*</b>
                                <input type="text" name="SuperBuildupArea" id="SuperBuildupArea">
                            </div>

                           <div class="col-md-3 col-sm-3 col-xs-6">
                                <label>Unit</label><b style="color:red;">*</b>
                                <select id="SuperBuildupAreaUnit" name="SuperBuildupAreaUnit"  >
                                    <option hidden value="">Unit</option>
                                    <option disabled >Select one </option>
                                    <option value="Sqft">Sqft</option>
                                    <option value="Sq-m">Sq-m</option>
                                    <option value="Acre">Acre</option>
                                    <option value="Bigha">Bigha</option>
                                    <option value="Hectare">Hectare</option>
                                    <option value="Marla">Marla</option>
                                    <option value="Chatak">Chatak</option>
                                    <option value="Kottah">Kottah</option>
                                </select>
                            </div>
                            
                            <div class="col-md-3 col-sm-3 col-xs-6">
                                <label>Covered Area</label><b style="color:red;">*</b>
                                <input type="text" name="CoveredArea" id="CoveredArea">
                            </div>

                           <div class="col-md-3 col-sm-3 col-xs-6">
                                <label>Unit</label><b style="color:red;">*</b>
                                <select id="CoveredAreaUnit" name="CoveredAreaUnit"  >
                                    <option hidden value="">Unit</option>
                                    <option disabled >Select one </option>
                                    <option value="Sqft">Sqft</option>
                                    <option value="Sq-m">Sq-m</option>
                                    <option value="Acre">Acre</option>
                                    <option value="Bigha">Bigha</option>
                                    <option value="Hectare">Hectare</option>
                                    <option value="Marla">Marla</option>
                                    <option value="Chatak">Chatak</option>
                                    <option value="Kottah">Kottah</option>
                                </select>
                            </div>
                            
                            <div class="col-md-3 col-sm-3 col-xs-6">
                                <label>Buildup Area</label><b style="color:red;">*</b>
                                <input type="text" name="BuildupArea" id="BuildupArea">
                            </div>

                           <div class="col-md-3 col-sm-3 col-xs-6">
                                <label>Unit</label><b style="color:red;">*</b>
                                <select id="BuildupAreaUnit" name="BuildupAreaUnit"  >
                                    <option hidden value="">Unit</option>
                                    <option disabled >Select one </option>
                                    <option value="Sqft">Sqft</option>
                                    <option value="Sq-m">Sq-m</option>
                                    <option value="Acre">Acre</option>
                                    <option value="Bigha">Bigha</option>
                                    <option value="Hectare">Hectare</option>
                                    <option value="Marla">Marla</option>
                                    <option value="Chatak">Chatak</option>
                                    <option value="Kottah">Kottah</option>
                                </select>
                            </div>
                            
                            <div class="col-md-3 col-sm-3 col-xs-6">
                                <label>Open Area</label><b style="color:red;">*</b>
                                <input type="text" name="OpenArea" id="OpenArea">
                            </div>

                            <div class="col-md-3 col-sm-3 col-xs-6">
                                <label>Unit</label><b style="color:red;">*</b>
                                <select id="OpenAreaUnit" name="OpenAreaUnit"  >
                                    <option hidden value="">Unit</option>
                                    <option disabled >Select one </option>
                                    <option value="Sqft">Sqft</option>
                                    <option value="Sq-m">Sq-m</option>
                                    <option value="Acre">Acre</option>
                                    <option value="Bigha">Bigha</option>
                                    <option value="Hectare">Hectare</option>
                                    <option value="Marla">Marla</option>
                                    <option value="Chatak">Chatak</option>
                                    <option value="Kottah">Kottah</option>
                                </select>
                            </div>
                            
                            <div class="col-md-3 col-sm-3 col-xs-12">
                                <label>Roof</label><b style="color:red;">*</b>
                                <select id="roof" name="roof">
                                    <option hidden value="">--Select--</option>
                                    <option disabled >Select one </option>
                                    <option value="RCC">RCC</option>
                                    <option value="Shaded">Shaded</option>
                                    <option value="Shaded">Any</option>
                                </select>
                            </div>
                            
                            <div class="col-md-3 col-sm-3 col-xs-12">
                                <label>Floor</label><b style="color:red;">*</b>
                                <select id="Floor" name="Floor">
                                    <option hidden value="">--Select--</option>
                                    <option disabled >Select one </option>
                                    <?php for($i = 1; $i<=100; $i++){ ?>
                                    <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            
                            <div class="col-md-3 col-sm-3 col-xs-12">
                                <label>Bathroom</label><b style="color:red;">*</b>
                                <select id="Bathroom" name="Bathroom">
                                    <option hidden value="">--Select--</option>
                                    <option disabled >Select one </option>
                                    <?php for($i = 1; $i<=100; $i++){ ?>
                                    <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            
                            <div class="col-md-3 col-sm-3 col-xs-12">
                                <label>Pentry</label><b style="color:red;">*</b>
                                <input type="number" name="Pentry" id="Pentry" class="gui-input">
                            </div>
                            
                            <div class="col-md-3 col-sm-3 col-xs-6">
                                <label>RoadWide</label><b style="color:red;">*</b>
                                <input type="number" name="RoadWide" id="RoadWide" class="gui-input">
                            </div>
                            
                            <div class="col-md-3 col-sm-3 col-xs-6">
                                <label>Unit</label><b style="color:red;">*</b>
                                <select id="RoadWideUnit" name="RoadWideUnit">
                                    <option hidden value="">Unit</option>
                                    <option disabled >Select one </option>
                                    <option value="Sqft">Sqft</option>
                                    <option value="Sq-m">MT</option>
                                </select>
                            </div>
                            
                            <div class="col-md-3 col-sm-3 col-xs-6">
                                <label>ElectricPower</label><b style="color:red;">*</b>
                                <input type="number" name="ElectricPower" id="ElectricPower" class="gui-input">
                            </div>
                            
                            <div class="col-md-3 col-sm-3 col-xs-6">
                                <label>Unit</label><b style="color:red;">*</b>
                                <select id="ElectricPowerUnit" name="ElectricPowerUnit">
                                    <option hidden value="">Unit</option>
                                    <option disabled >Select one </option>
                                    <option value="Sqft">KG</option>
                                    <option value="Sq-m">HR Power</option>
                                </select>
                            </div>
                            
                            <div class="col-md-3 col-sm-3 col-xs-6">
                                <label>Available For Bar</label><b style="color:red;">*</b>
                                <select id="AvailableForBar" name="AvailableForBar">
                                    <option hidden >Available For Bar</option>
                                    <option value="Yes" >Yes</option>
                                    <option value="No" >No</option>
                                </select>
                            </div>
                            <div class="col-md-3 col-sm-3 col-xs-6">
                                <label>For Resturant</label><b style="color:red;">*</b>
                                <select id="ForResturant" name="ForResturant">
                                    <option hidden >Available For Resturant</option>
                                    <option value="Yes" >Yes</option>
                                    <option value="No" >No</option>
                                </select>
                            </div>
                            
                            <div class="col-md-3 col-sm-3 col-xs-12">
                                <label>Heavy Vehicle</label><b style="color:red;">*</b>
                                <select id="HeavyVehicleParkingUpto" name="HeavyVehicleParkingUpto">
                                    <option hidden value="">--Select--</option>
                                    <option disabled >Select one </option>
                                    <option value="3Wheeler">3 Wheeler</option>
                                    <option value="4Wheeler">4 Wheeler</option>
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
        			        <input type="radio" id="ReadyToMove" value="ReadyToMove" name="section" checked/>
        			        <label for="ReadyToMove" >Ready To Move</label>
        			    </div>
        			    
        			    <div class="col-md-3 col-sm-3 col-xs-12 radiobtn">
        			        <input type="radio" id="PossessionFrom" value="PossessionFrom" name="section" />
        			        <label for="PossessionFrom" >Possession From</label>
        			    </div>
        			    
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
        $("#rent_sell").val('');
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
        
        $("#SuperBuildupArea").val('');
        $("#SuperBuildupAreaUnit").val('');
        $("#CoveredArea").val('');
        $("#CoveredAreaUnit").val('');
        $("#Frontage").val('');
        $("#FrontageUnit").val('');
        $("#BuildupArea").val('');
        $("#BuildupAreaUnit").val('');
        $("#OpenArea").val('');
        $("#OpenAreaUnit").val('');
        $("#ShopNatureofBusiness").val('');
        $("#ShopMinimumAreaRequired").val('');
        $("#MinimumAreaRequiredUnit").val('');
        $("#ShopMaximumAreaRequired").val('');
        $("#ShopMaximumAreaRequiredUnit").val('');
        $("#roof").val('');
        $("#Floor").val('');
        $("#Bathroom").val('');
        $("#Pentry").val('');
        $("#RoadWide").val('');
        $("#RoadWideUnit").val('');
        $("#ElectricPower").val('');
        $("#ElectricPowerUnit").val('');
        $("#AvailableForBar").val('');
        $("#ForResturant").val('');
        $("#HeavyVehicleParkingUpto").val('');
        
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
                $("#email").val(data['email']);
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
                
                $("#SuperBuildupArea").val(data['SuperBuildupArea']);
                $("#SuperBuildupAreaUnit").val(data['SuperBuildupAreaUnit']);
                $("#CoveredArea").val(data['CoveredArea']);
                $("#CoveredAreaUnit").val(data['CoveredAreaUnit']);
                $("#Frontage").val(data['Frontage']);
                $("#FrontageUnit").val(data['FrontageUnit']);
                $("#BuildupArea").val(data['BuildupArea']);
                $("#BuildupAreaUnit").val(data['BuildupAreaUnit']);
                $("#OpenArea").val(data['OpenArea']);
                $("#OpenAreaUnit").val(data['OpenAreaUnit']);
                
                $("#PossessionDate").val(data['PossessionDate']);
                $("#OpenParking").val(data['OpenParking']);
                $("#CoveredParking").val(data['CoveredParking']);
                $("#Basement").val(data['Basement']);
                $("#LiftParking").val(data['LiftParking']);
                $("#TwoWheeler").val(data['TwoWheeler']);
                
                $("#ShopNatureofBusiness").val(data['ShopNatureofBusiness']);
                $("#ShopMinimumAreaRequired").val(data['ShopMinimumAreaRequired']);
                $("#MinimumAreaRequiredUnit").val(data['MinimumAreaRequiredUnit']);
                $("#ShopMaximumAreaRequired").val(data['ShopMaximumAreaRequired']);
                $("#ShopMaximumAreaRequiredUnit").val(data['ShopMaximumAreaRequiredUnit']);
                $("#roof").val(data['roof']);
                $("#Floor").val(data['Floor']);
                $("#Bathroom").val(data['Bathroom']);
                $("#Pentry").val(data['Pentry']);
                $("#RoadWide").val(data['RoadWide']);
                $("#RoadWideUnit").val(data['RoadWideUnit']);
                $("#ElectricPower").val(data['ElectricPower']);
                $("#ElectricPowerUnit").val(data['ElectricPowerUnit']);
                $("#AvailableForBar").val(data['AvailableForBar']);
                $("#ForResturant").val(data['ForResturant']);
                $("#HeavyVehicleParkingUpto").val(data['HeavyVehicleParkingUpto']);
                
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









