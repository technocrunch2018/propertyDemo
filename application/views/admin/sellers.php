<script>
    function isNumberKey(evt){
        var charCode = (evt.which) ? evt.which : evt.keyCode;
        if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;
        return true;
    }
</script>

<div class="right_col" role="main">
    <div class="page-title">
        <div class="title_left">
            <h3><i class="fa fa-ioxhost"></i> Manage User Properties</h3>
        </div>
    </div>

    <div class="clearfix"></div>

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">

            <div class="x_panel">
                
                <div class="x_title">
                    <h2>Property List</h2>
                    <!--<button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#myModal">+ADD Flat</button>-->

                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <table id="datatable" class="table table-bordered table-striped">
                        <thead> 

                            <tr>
                                <td>Sr No</td>
                                <td>Date</td>
                                <td>Prop ID</td>
                                <td>Name</td>
                                <td>State</td>
                                <td>City</td>
                                <td>Location</td>
                                <td>Comm/Resi</td>
                                <td>Rent/Sell</td>
                                <td>Prop Type</td>
                                <td>Contact Details</td>
                                <td>Status</td>
                                <td>Detail</td>
                                <td>Action</td>
                            
                            </tr>

                        </thead>
                        <tbody>
                            <?php if(!empty($sellers)){ ?>
                            <?php foreach($sellers as $i=>$row){ 
                            if(!empty($row->post_id)){?>
                            <tr>
                                <td><?php echo $i+1;?></td>
                                <td><?php echo $row->created;?></td>
                                <td><?php if($row->status == 1){ echo $row->lead_id;}?></td>
                                <td><?php echo $row->name;?></td>
                                <td><?php echo $row->state;?></td>
                                <td><?php echo $row->city;?></td>
                                <td><?php echo $row->location;?></td>
                                <td><?php echo $row->res_com;?></td>
                                <td><?php if($row->residential == "DuplexFlat"){ echo "PG/Co-Living";} else{echo $row->residential;}?></td>
                                <td><?php echo $row->rent_sell;?></td>
                                <td>
                                    <div class="container">
                                        <!--<button type="button" style="background-color:#212121" class="btn btn-info btn-lg" data-toggle="modal" data-target="#contact_<?php echo $i; ?>"><i class="fa fa-eye" aria-hidden="true"></i>
                                        </button>-->
                                        <a data-toggle="modal" data-target="#contact_<?php echo $i; ?>"><span title="Contact" class="label label-info">Contact Details</span></a>
    
                                        <div class="modal fade" id="contact_<?php echo $i; ?>" role="dialog">
                                            <div class="modal-dialog">
    
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        <h4 class="modal-title">Contact Details</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>
                                                            <table>
                                                                <tr>
                                                                    <th>Name</th>
                                                                    <th>Mobile</th>
                                                                    <th>Email</th>
                                                                    <th>Address</th>
                                                                    <th>Pincode</th>
                                                                </tr>
                                                                <tr>
                                                                    <td><?php echo $row->name;?></td>
                                                                    <td><?php echo $row->mobile;?></td>
                                                                    <td><?php echo $row->email;?></td>
                                                                    <td><?php echo $row->address;?></td>
                                                                    <td><?php echo $row->pincode;?></td>
                                                                </tr>
                                                            </table>
    
                                                        </p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="effect effect-5 red" data-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
    
                                            </div>
                                        </div>
    
                                    </div>
                                </td>
                                <td><?php if($row->status == 0){echo "Pending";} elseif($row->status == 1){echo "Active";} elseif($row->status == 2){echo "Reject";}?></td>
                                <td><a href="<?=base_url();?>/home/see_details/property/<?=$row->post_id;?>" target="_BLANK"><span title="View Details" class="label label-info">View Details</span></a></td>
                               
                                
                                <td>
                                    <?php if($row->status == 0){?>
                                    <a onclick="return confirm('Do You want to change status of this record?');" href="<?php echo base_url();?>property/approve_property/<?php echo $row->post_id;?>"> <span title="Approve" class="label label-success">Approve</span></a>
                                    <?php } ?>
                                    <?php if($row->status == 1){ ?>
                                    <a onclick="return confirm('Do You want to change status of this record?');" href="<?php echo base_url();?>property/reject_property/<?php echo $row->post_id;?>"> <span title="Reject" class="label label-warning">Reject</span></a>
                                    
                                    
                                    
                                    <?php if($row->is_show == 0){?>
                                    <a onclick="return confirm('Verify This Property');" href="<?php echo base_url();?>property/verify/<?php echo $row->post_id;?>"> <span title="Verify" class="label label-success">Verify</span></a>
                                    <?php } else{echo "Verified";}?>
                                    
                                    <?php } ?>
                                </td>
                                
                            </tr>
                            <?php } ?>
                            <?php } }?>

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
                    <h4 class="modal-title" style="color:white;font-weight:bold;font-size:20px;">Add Flat</h4>
                </div>
                <div class="modal-body">
                    <form method="POST" enctype="multipart/form-data" action="<?php echo base_url(); ?>property/save_seller">
                        <div class="row">
                            <input type="hidden" name="added_by" value="Super Admin" id="added_by" style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  />
                            <input type="hidden" name="post_id" value="0" id="post_id" style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  />
                            <input type="hidden" name="residential" value="Flat" id="residential" style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  />
                            <input type="hidden" name="res_com" value="Residential" id="res_com" style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  />
                            <input type="hidden" name="rent_sell" value="" id="rent_sell" style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  />
                            <div class="col-md-6 col-sm-6 col-xs-6">
                                <label>Name</label><b style="color:red;">*</b>
                                <input type="text" name="name" id="name"style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  />
                            </div>
                            
                            <div class="col-md-3 col-sm-6 col-xs-6">
                                <label>Mobile</label><b style="color:red;">*</b>
                                <input type=text   size=20 maxlength=10 name="mobile" id="mobile" style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;"    />
                            </div>

                            <div class="col-md-3 col-sm-6 col-xs-6">
                                <label>Mobile</label><b style="color:red;">*</b>
                                <input type="text" size=20 maxlength=15 name="mobile1" id="mobile1"style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  />
                            </div>


                            <div class="col-md-6 col-sm-6 col-xs-6">
                                <label>Phone</label><b style="color:red;">*</b>
                                <input type="text" class="input--style-5" size=20 maxlength=15 name="phone" id="phone" min="15"      style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)">

                            </div>


                            <div class="col-md-6 col-sm-6 col-xs-6">
                                <label>E-mail</label><b style="color:red;">*</b>
                                <input type="text" name="email" id="email" style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  />
                            </div>


                            <div class="col-md-3 col-sm-6 col-xs-6">
                                <label>State</label><b style="color:red;">*</b>

                                <select id="state" name="state" style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;">
                                    <option value="">---Select---</option>
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
                                <select id="city" name="city" style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;">
                                    <option value="">---Select---</option>
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


                            <div class="col-md-6 col-sm-6 col-xs-6">
                                <label>Location</label><b style="color:red;">*</b>
                                <select id="location" name="location" style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;">

                                    <option value="">---Select---</option>

                                </select>
                            </div>
                            
                            <div class="col-md-6 col-sm-6 col-xs-6">
                                <label>Complex / Society Building Name</label><b style="color:red;">*</b>
                                <input type="text" name="complex_society_building" id="complex_society_building" style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  />
                            </div>

                            <div class="col-md-6 col-sm-6 col-xs-6">
                                <label>Land Mark</label><b style="color:red;">*</b>
                                <input type="text" name="landmark" id="landmark"style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  />
                            </div>
                            
                            <div class="col-md-6 col-sm-6 col-xs-6">
                                <label>Address</label><b style="color:red;">*</b>
                                <input type="text" name="address" id="address"style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  />
                            </div>

                            <div class="col-md-2 col-sm-6 col-xs-6">
                                <label>Pincode</label><b style="color:red;">*</b>
                                <input type="text" name="pincode" id="pincode" style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  />
                            </div>
                            
                            <div class="col-md-2 col-sm-6 col-xs-6">
                                <label>Block No</label><b style="color:red;">*</b>
                                <input type="text" name="blockno" id="blockno"style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  />
                            </div>
                            
                            <div class="col-md-2 col-sm-6 col-xs-6">
                                <label>Flat No</label><b style="color:red;">*</b>
                                <input type="number" min=0 name="flatno" id="flatno"style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  />
                            </div>


                           <!-- <div class="col-md-6 col-sm-6 col-xs-6">
                                <label>Property For</label><b style="color:red;">*</b>
                                <select name="rent_sell" id="rent_sell" style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;"  >
                                    <option>---Select---</option>
                                    <option value="rent">Rent</option>
                                    <option value="Sell" selected>Sell</option>
                                </select>		  
                            </div>-->

                            <div class="col-md-3 col-sm-6 col-xs-6">
                                <label>Furnished Status</label><b style="color:red;">*</b>
                                <select name="FurnishedStatus" id="FurnishedStatus"style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;">
                                    <option>---Select---</option>
                                    <option value="Furnished">Furnished</option>
                                    <option value="Unfurnished">Unfurnished</option>
                                    <option value="Semi Furnished">Semi Furnished</option>
                                </select>		  
                            </div>
                            <?php //if($rent_sell == 'Rent'){ ?>
                            <div class="col-md-3 col-sm-6 col-xs-6 rent_div">
                                <label>Security Deposite</label><b style="color:red;">*</b>
                                <input type="number" name="security_deposite" id="security_deposite" multiple style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  />
                            </div>
                            
                            <div class="col-md-3 col-sm-6 col-xs-6 rent_div">
                                <label>Rent/Month</label><b style="color:red;">*</b>
                                <input type="number" name="rentPerMonth" id="rentPerMonth" multiple style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  />
                            </div>
                            <?php //} ?>
                            <?php //if($rent_sell == 'Sell'){ ?>
                            <div class="col-md-3 col-sm-6 col-xs-6 sell_div">
                                <label>Net Amount</label><b style="color:red;">*</b>
                                <input type="number" name="net_amount" id="net_amount" multiple style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  />
                            </div>
                            
                            <div class="col-md-3 col-sm-6 col-xs-6 sell_div">
                                <label>Amount</label><b style="color:red;">*</b>
                                <input type="number" name="amount" id="amount" multiple style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  />
                            </div>
                            
                            <div class="col-md-3 col-sm-6 col-xs-6 sell_div">
                                <label>Per Unit</label><b style="color:red;">*</b>
                                <input type="text" name="per_unit" id="per_unit" multiple style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  />
                            </div>
                            <?php //} ?>
                            

                            <!--<div class="col-md-6 col-sm-6 col-xs-6">
                                <label>Super Buit Up Area</label><b style="color:red;">*</b>
                                <input type="number" min=0 name="super_built_up_area" id="room"style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  />
                            </div>

                            <div class="col-md-6 col-sm-6 col-xs-6">
                                <label>Unit</label><b style="color:red;">*</b>
                                <select name="super_built_up_area" id="room"style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)" >
                                    <option>---Select---</option>
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

                            <div class="col-md-6 col-sm-6 col-xs-6">
                                <label>Buit Up Area</label><b style="color:red;">*</b>
                                <input type="number" min=0 name="built_up_area" id="room"style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  />
                            </div>

                            <div class="col-md-6 col-sm-6 col-xs-6">
                                <label>Unit</label><b style="color:red;">*</b>
                                <select name="built_up_area_unit" id="room"style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)" >
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
                            </div>-->


                            <!--<div class="col-md-6 col-sm-6 col-xs-6">
                                <label>Carpet Area</label><b style="color:red;">*</b>
                                <input type="number" min=0 name="carpet_area" id="room"style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  />
                            </div>

                            <div class="col-md-6 col-sm-6 col-xs-6">
                                <label>Unit</label><b style="color:red;">*</b>
                                <select name="carpet_area_nit" id="room"style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)" >
                                    <option>---Select---</option>
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
                            </div>-->



                            <!--<div class="col-md-6 col-sm-6 col-xs-6">
                                <label>Block Number</label><b style="color:red;">*</b>
                                <input type="text" name="block_number" id="room"style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  />
                            </div>


                            

                            <div class="col-md-6 col-sm-6 col-xs-6">
                                <label>Lower Floor No</label><b style="color:red;">*</b>
                                <input type="number" min=0 name="lower_floor" id="room"style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  />
                            </div>

                            <div class="col-md-6 col-sm-6 col-xs-6">
                                <label>Uper Floor No</label><b style="color:red;">*</b>
                                <input type="number" min=0 name="uper_floor" id="room"style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  />
                            </div>


                            <div class="col-md-6 col-sm-6 col-xs-6">
                                <label>Total Floor</label><b style="color:red;">*</b>
                                <select  name="total_floor" id="room"style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)" >
                                    <option>---select---</option>
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

                            <div class="col-md-6 col-sm-6 col-xs-6">
                                <label>Roof</label><b style="color:red;">*</b>
                                <select name="roof" id="room"style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)" >
                                    <option>---Select---</option>
                                    <option value="RCC">RCC</option>
                                    <option value="SHEDED">SHEDED</option>
                                    <option value="Open">Open</option>
                                </select>		  
                            </div>-->

                            <!--<div class="col-md-6 col-sm-6 col-xs-6">
                                <label>Room</label><b style="color:red;">*</b>
                                <input type="number" min=0 name="room" id="room"style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  />
                            </div>


                            <div class="col-md-6 col-sm-6 col-xs-6">
                                <label>Bathroom</label><b style="color:red;">*</b>
                                <input type="number" min=0 name="bathroom" id="room"style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  />
                            </div>


                            <div class="col-md-6 col-sm-6 col-xs-6">
                                <label>Balcony</label><b style="color:red;">*</b>
                                <input type="number" min=0 name="balcony" id="room"style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  />
                            </div>


                            <div class="col-md-6 col-sm-6 col-xs-6">
                                <label>Kitchen</label><b style="color:red;">*</b>
                                <input type="number" min=0 name="kitchen" id="room"style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  />
                            </div>-->


                            <div class="col-md-3 col-sm-6 col-xs-6">
                                <label>Possession</label><b style="color:red;">*</b>
                                <select name="section" id="section"style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;"  >
                                    <option value="">---Select---</option>
                                    <option value="Ready To Move">Ready To Move</option>
                                    <option value="Possession From">Possession From</option>
                                </select>		  
                            </div>

                            <div class="col-md-3 col-sm-6 col-xs-6">
                                <label>Possession Date</label><b style="color:red;">*</b>
                                <input type="date" placeholder="DD/MM/YYYY" name="PossessionDate" id="PossessionDate"  style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" />
                            </div>
                            
                            <div class="col-md-6 col-sm-6 col-xs-6">
                                <label>Property Type</label><b style="color:red;">*</b>

                                <select id="PropertyType" name="PropertyType" style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;">
                                    <option>---Select---</option>
                                   <option value="Freehold" <?php if(!empty($project)){ if($project->PropertyType == 'Freehold'){ echo 'selected'; } } ?>>Freehold</option>
                                    <option value="Lease" <?php if(!empty($project)){ if($project->PropertyType == 'Lease'){ echo 'selected'; } } ?> >Lease</option>
                                    <option value="Power of attorney" <?php if(!empty($project)){ if($project->PropertyType == 'Power of attorney'){ echo 'selected'; } } ?> >Power of attorney</option>
                                    <option value="Unregistered" <?php if(!empty($project)){ if($project->PropertyType == 'Unregistered'){ echo 'selected'; } } ?>>Unregistered</option>

                                </select>

                            </div>
                            
                            <div class="col-md-12">
                                <div class="col-md-2 col-sm-6 col-xs-6">
                                    <label>Open Parking</label><b style="color:red;">*</b>
                                    <input type="number" min=0   name="OpenParking" placeholder=" " id="OpenParking"style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" />
                                </div>
    
                                <div class="col-md-2 col-sm-6 col-xs-6">
                                    <label>Covered Parking</label><b style="color:red;">*</b>
                                    <input type="number" min=0 placeholder=" "   name="CoveredParking" id="CoveredParking"style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" />
                                </div>
    
                                <div class="col-md-2 col-sm-6 col-xs-6">
                                    <label>Basement</label><b style="color:red;">*</b>
                                    <input type="number" min=0 name="Basement" placeholder="Basement" id="Basement"style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;"/>
                                </div>
    
                                <div class="col-md-2 col-sm-6 col-xs-6">
                                    <label>Lift Parking</label><b style="color:red;">*</b>
                                    <input type="number" min=0 placeholder=" "name="LiftParking" id="LiftParking"style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" />
                                </div>
                                
                                <div class="col-md-2 col-sm-6 col-xs-6">
                                    <label>Two Wheeler</label><b style="color:red;">*</b>
                                    <input type="number" min=0 placeholder=" "name="TwoWheeler" id="TwoWheeler"style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" />
                                </div>
                                
                                <div class="col-md-2 col-sm-6 col-xs-6">
                                <label>Age Of Properties</label><b style="color:red;">*</b>
                                <select name="AgeofPropeety" id="AgeofPropeety"style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;">
                                    <option value="">---Select---</option>
                                    <option value="1 Year Old">1 Year Old</option>
                                    <option value="2Year Old">2Year Old</option>
                                    <option value="3Year Old">3Year Old</option>
                                    <option value="4Year Old">4Year Old</option>
                                    <option value="5Year Old">5Year Old</option>
                                    <option value="6Year Old">6Year Old</option>
                                    <option value="7Year Old">7Year Old</option>
                                    <option value="8Year Old">8Year Old</option>
                                    <option value="9Year Old">9Year Old</option>
                                    <option value="10Year Old">10Year Old</option>
                                    <option value="11Year Old">11Year Old</option>
                                    <option value="12Year Old">12Year Old</option>
                                    <option value="13Year Old">13Year Old</option>
                                    <option value="14Year Old">14Year Old</option>
                                    <option value="15Year Old">15Year Old</option>
                                    <option value="16Year Old">16Year Old</option>
                                    <option value="17Year Old">17Year Old</option>
                                    <option value="18Year Old">18Year Old</option>
                                    <option value="19Year Old">19Year Old</option>
                                    <option value="20Year Old">20Year Old</option>
                                    <option value="21Year Old">21Year Old</option>
                                    <option value="More Than 21Year Old">More Than 21Year Old</option>
                                </select>
                            </div>

                            </div>
                            
                            

                            
                            <div class="col-md-2 col-sm-6 col-xs-6">
                                <label>Rooms</label><b style="color:red;">*</b>
                                <select id="flat_Room" name="flat_Room" class="form-control" value="">
                                    <option hidden >Room</option>
                                    <option disabled >Select one </option>
                                    <?php for($i = 1; $i<=100; $i++){ ?>
                                    <option value="<?php echo $i; ?>" ><?php echo $i; ?></option>
                                    <?php } ?>
                                </select>		  
                            </div>
                            
                            <div class="col-md-2 col-sm-6 col-xs-6">
                                <label>Balcony</label><b style="color:red;">*</b>
                                <select id="flat_Balcony" name="flat_Balcony" class="form-control"  value="">
                                    <option hidden >Balcony</option>
                                    <option disabled >Select one </option>
                                    <?php for($i = 1; $i<=100; $i++){ ?>
                                    <option value="<?php echo $i; ?>" ><?php echo $i; ?></option>
                                    <?php } ?>
                                </select>		  
                            </div>
                            
                            <div class="col-md-2 col-sm-6 col-xs-6">
                                <label>Super-Builtup Area</label><b style="color:red;">*</b>
                                <input class="form-control" type="number" name="flat_SuperBuildupArea" id="flat_SuperBuildupArea" class="gui-input" placeholder="Super Build up Area" value=""  >	  
                            </div>
                            
                            
                            
                            <div class="col-md-2 col-sm-6 col-xs-6">
                                <label>Super-Builtup Unit</label><b style="color:red;">*</b>
                                <select id="flat_SuperBuildupAreaUnit" name="flat_SuperBuildupAreaUnit" class="form-control">
                                    <option hidden >Unit</option>
                                    <option disabled >Select one </option>
                                    <option value="Sqft" <?php if(!empty($flat_details)){ if($flat_details->flat_SuperBuildupAreaUnit == 'Sqft'){ echo 'selected'; } } ?> >Sqft</option>
                                    <option value="Sq-m" <?php if(!empty($flat_details)){ if($flat_details->flat_SuperBuildupAreaUnit == 'Sq-m'){ echo 'selected'; } } ?> >Sq-m</option>
                                    <option value="Acre" <?php if(!empty($flat_details)){ if($flat_details->flat_SuperBuildupAreaUnit == 'Acre'){ echo 'selected'; } } ?> >Acre</option>
                                    <option value="Bigha" <?php if(!empty($flat_details)){ if($flat_details->flat_SuperBuildupAreaUnit == 'Bigha'){ echo 'selected'; } } ?> >Bigha</option>
                                    <option value="Hectare" <?php if(!empty($flat_details)){ if($flat_details->flat_SuperBuildupAreaUnit == 'Hectare'){ echo 'selected'; } } ?> >Hectare</option>
                                    <option value="Marla" <?php if(!empty($flat_details)){ if($flat_details->flat_SuperBuildupAreaUnit == 'Marla'){ echo 'selected'; } } ?> >Marla</option>
                                    <option value="Chatak" <?php if(!empty($flat_details)){ if($flat_details->flat_SuperBuildupAreaUnit == 'Chatak'){ echo 'selected'; } } ?> >Chatak</option>
                                    <option value="Kottah" <?php if(!empty($flat_details)){ if($flat_details->flat_SuperBuildupAreaUnit == 'Kottah'){ echo 'selected'; } } ?> >Kottah</option>
                                </select>
                            </div>
                            
                            <div class="col-md-2 col-sm-6 col-xs-6">
                                <label>Carpet Area</label><b style="color:red;">*</b>
                                <input class="form-control" type="number" name="flat_CarpetArea" id="flat_CarpetArea" class="gui-input" placeholder="Carpet Area" value=""  >
                            </div>
                            
                            <div class="col-md-2 col-sm-6 col-xs-6">
                                <label>Carpet Area Unit</label><b style="color:red;">*</b>
                                <select id="flat_Carpet_Unit" name="flat_Carpet_Unit" class="form-control">
                                    <option hidden >Unit</option>
                                    <option disabled >Select one </option>
                                    <option value="Sqft" <?php if(!empty($flat_details)){ if($flat_details->flat_Carpet_Unit == 'Sqft'){ echo 'selected'; } } ?> >Sqft</option>
                                    <option value="Sq-m" <?php if(!empty($flat_details)){ if($flat_details->flat_Carpet_Unit == 'Sq-m'){ echo 'selected'; } } ?> >Sq-m</option>
                                    <option value="Acre" <?php if(!empty($flat_details)){ if($flat_details->flat_Carpet_Unit == 'Acre'){ echo 'selected'; } } ?> >Acre</option>
                                    <option value="Bigha" <?php if(!empty($flat_details)){ if($flat_details->flat_Carpet_Unit == 'Bigha'){ echo 'selected'; } } ?> >Bigha</option>
                                    <option value="Hectare" <?php if(!empty($flat_details)){ if($flat_details->flat_Carpet_Unit == 'Hectare'){ echo 'selected'; } } ?> >Hectare</option>
                                    <option value="Marla" <?php if(!empty($flat_details)){ if($flat_details->flat_Carpet_Unit == 'Marla'){ echo 'selected'; } } ?> >Marla</option>
                                    <option value="Chatak" <?php if(!empty($flat_details)){ if($flat_details->flat_Carpet_Unit == 'Chatak'){ echo 'selected'; } } ?> >Chatak</option>
                                    <option value="Kottah" <?php if(!empty($flat_details)){ if($flat_details->flat_Carpet_Unit == 'Kottah'){ echo 'selected'; } } ?> >Kottah</option>
                                </select>
                            </div>
                            
                            <div class="col-md-2 col-sm-6 col-xs-6">
                                <label>Total Floor</label><b style="color:red;">*</b>
                                <select id="flat_TotalFloor" name="flat_TotalFloor" class="form-control">
                                    <option hidden >Total Floor</option>
                                    <option disabled >Select one </option>
                                    <option value="G" <?php if(!empty($flat_details)){ if($flat_details->flat_TotalFloor == 'G'){ echo 'selected'; } } ?> >G</option>
                                    <?php for($i = 1; $i<=100; $i++){ ?>
                                    <option value="<?php echo $i; ?>" <?php if(!empty($flat_details)){ if($flat_details->flat_TotalFloor == $i){ echo 'selected'; } } ?>><?php echo $i; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            
                            <div class="col-md-2 col-sm-6 col-xs-6">
                                <label>Bathroom</label><b style="color:red;">*</b>
                                <select id="flat_Bathroom" name="flat_Bathroom" class="form-control" value="">
                                    <option hidden >Bathroom</option>
                                    <option disabled >Select one </option>
                                    <?php for($i = 1; $i<=100; $i++){ ?>
                                    <option value="<?php echo $i; ?>" <?php if(!empty($flat_details)){ if($flat_details->flat_Bathroom == $i){ echo 'selected'; } } ?>><?php echo $i; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            
                            <div class="col-md-2 col-sm-6 col-xs-6">
                                <label>Kitchen</label><b style="color:red;">*</b>
                                <select id="flat_Kitchen" name="flat_Kitchen" class="form-control" value="">
                                    <option hidden >Kitchen</option>
                                    <option disabled >Select one </option>
                                    <?php for($i = 1; $i<=100; $i++){ ?>
                                    <option value="<?php echo $i; ?>" <?php if(!empty($flat_details)){ if($flat_details->flat_Kitchen == $i){ echo 'selected'; } } ?>><?php echo $i; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            
                            <div class="col-md-2 col-sm-6 col-xs-6">
                                <label>Built-Up Area</label><b style="color:red;">*</b>
                                <input class="form-control" type="number" name="flat_BuildupArea" id="flat_BuildupArea" class="gui-input" placeholder="Build up Area" value="<?php if(!empty($flat_details)){ echo $flat_details->flat_BuildupArea; } ?>" >
                            </div>
                            
                            
                            <div class="col-md-2 col-sm-6 col-xs-6">
                                <label>Built-Up Area Unit</label><b style="color:red;">*</b>
                                <select id="flat_BuildupArea_Unit" name="flat_BuildupArea_Unit" class="form-control" >
                                    <option hidden >Unit</option>
                                    <option disabled >Select one </option>
                                    <option value="Sqft" <?php if(!empty($flat_details)){ if($flat_details->flat_BuildupArea_Unit == 'Sqft'){ echo 'selected'; } } ?> >Sqft</option>
                                    <option value="Sq-m" <?php if(!empty($flat_details)){ if($flat_details->flat_BuildupArea_Unit == 'Sq-m'){ echo 'selected'; } } ?> >Sq-m</option>
                                    <option value="Acre" <?php if(!empty($flat_details)){ if($flat_details->flat_BuildupArea_Unit == 'Acre'){ echo 'selected'; } } ?> >Acre</option>
                                    <option value="Bigha" <?php if(!empty($flat_details)){ if($flat_details->flat_BuildupArea_Unit == 'Bigha'){ echo 'selected'; } } ?> >Bigha</option>
                                    <option value="Hectare" <?php if(!empty($flat_details)){ if($flat_details->flat_BuildupArea_Unit == 'Hectare'){ echo 'selected'; } } ?> >Hectare</option>
                                    <option value="Marla" <?php if(!empty($flat_details)){ if($flat_details->flat_BuildupArea_Unit == 'Marla'){ echo 'selected'; } } ?> >Marla</option>
                                    <option value="Chatak" <?php if(!empty($flat_details)){ if($flat_details->flat_BuildupArea_Unit == 'Chatak'){ echo 'selected'; } } ?> >Chatak</option>
                                    <option value="Kottah" <?php if(!empty($flat_details)){ if($flat_details->flat_BuildupArea_Unit == 'Kottah'){ echo 'selected'; } } ?> >Kottah</option>
                                </select>
                            </div>
                            
                            <div class="col-md-2 col-sm-3 col-xs-6">
                                <label>Flat Floor</label><b style="color:red;">*</b>
                                <select id="flat_Floor" name="flat_Floor" class="form-control">
                                    <option hidden >Floor</option>
                                    <option disabled >Select one </option>
                                    <option value="LowerBasement" <?php if(!empty($flat_details)){ if($flat_details->flat_Floor == 'LowerBasement'){ echo 'selected'; } } ?> >Lower Basement </option>
                                    <option value="Basement" <?php if(!empty($flat_details)){ if($flat_details->flat_Floor == 'Basement'){ echo 'selected'; } } ?> >Basement </option>
                                    <option value="G" <?php if(!empty($flat_details)){ if($flat_details->flat_Floor == 'G'){ echo 'selected'; } } ?> >G</option>
                                    <?php for($i = 1; $i<=100; $i++){ ?>
                                    <option value="<?php echo $i; ?>" <?php if(!empty($flat_details)){ if($flat_details->flat_Floor == $i){ echo 'selected'; } } ?>><?php echo $i; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            
                            
                            <div class="col-md-2 col-sm-3 col-xs-6">
                                <label>Heavy Parking</label><b style="color:red;">*</b>
                                <select id="flat_HeavyVehicleParkingUpto" name="flat_HeavyVehicleParkingUpto" class="form-control">
                                    <option hidden >Roof</option>
                                    <option disabled >Select one </option>
                                    <option value="3Wheeler"  <?php if(!empty($factory_details)){ if($factory_details->factory_HeavyVehicleParkingUpto == '3Wheeler'){ echo 'selected'; } } ?> >3 Wheeler</option>
                                                            <option value="4Wheeler"  <?php if(!empty($factory_details)){ if($factory_details->factory_HeavyVehicleParkingUpto == '4Wheeler'){ echo 'selected'; } } ?> >4 Wheeler</option>
                                </select>
                            </div>

                            <div class="col-md-2 col-sm-6 col-xs-6">
                                <label>Amenities</label><b style="color:red;">*</b>
                                <br><input type="checkbox" value="1" name="PowerBackup" id="PowerBackup"style="padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"/> Power Backup
                                <br><input type="checkbox" value="1" name="Intercom" id="Intercom"style="padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  /> Intercom
                                <br><input type="checkbox" value="1" name="Lift" id="Lift"style="padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  />  Lift
                                <br><input type="checkbox" value="1" name="GasPipeLine" id="GasPipeLine"style="padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  /> Gas Pipe Line
                            </div>
                            <div class="col-md-2 col-sm-6 col-xs-6">
                                <br><input type="checkbox" value="1" name="ServiveLift" id="ServiveLift"style="padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  />Service  Lift
                                <br><input type="checkbox" value="1" name="CCTV" id="CCTV"style="padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  /> CCTV
                                <br><input type="checkbox" value="1" name="WIFI" id="WIFI"style="padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  /> WIFI
                                <br><input type="checkbox" value="1" name="Security" id="Security"style="padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  /> 24 Hr.Security
                            </div>
                            <div class="col-md-2 col-sm-6 col-xs-6">
                                <br><input type="checkbox" value="1" name="BanquetHall" id="BanquetHall"style="padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  /> Banquet Hall
                                <br><input type="checkbox" value="1" name="SwimmingPool" id="SwimmingPool"style="padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  /> Swimming Pool
                                <br><input type="checkbox" value="1" name="CommunityHall" id="CommunityHall"style="padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  /> Community Hall
                                <br><input type="checkbox" value="1" name="SarvantRoom" id="SarvantRoom"style="padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  /> Sarvant Room
                            </div>
                            <div class="col-md-2 col-sm-6 col-xs-6">
                                <br><input type="checkbox" value="1" name="GYM" id="GYM"style="padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  /> Gym
                                <br><input type="checkbox" value="1" name="CloubHouse" id="CloubHouse"style="padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  /> Club House
                                <br><input type="checkbox" value="1" name="IndoorGame" id="IndoorGame"style="padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  /> Indoor Game
                            </div>
                            <div class="col-md-2 col-sm-6 col-xs-6">
                                <br><input type="checkbox" value="1" name="OutDoorGame" id="OutDoorGame"style="padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  /> Outdoor Game
                                <br><input type="checkbox" value="1" name="Park" id="Park"style="padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  /> Park
                                <br><input type="checkbox" value="1" name="VisitorParking" id="VisitorParking"style="padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  /> Visitor Parking
                            </div>
                            
                            <div class="col-md-12">
                                <div class="col-md-6 col-sm-6 col-xs-6">
                                    <label>Image</label><b style="color:red;">*</b>
                                    <input type="file" name="UploadImages[]" id="UploadImages" value="" multiple style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  />
                                    <input type="hidden" class="gui-file" name="prevUploadImages" id="prevUploadImages" value="<?php if(!empty($post_property)){ echo $post_property->image_name; }else{ echo ''; }?>">
                                </div>
    
                                <div class="col-md-6 col-sm-6 col-xs-6">
                                    <label>Video</label><b style="color:red;">*</b>
                                    <input type="file" name="UploadVideos" id="UploadVideos" style="width: 100%;height:32px;padding:3px;border: 1px solid #dddd;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"  />
                                    <input type="hidden" class="gui-file" name="prevUploadVideos" id="prevUploadVideos" value="<?php if(!empty($post_property)){ echo $post_property->video_name; }else{ echo ''; }?>">
                                </div>
                            </div>
                            
                            <div class="col-md-12 col-sm-12 col-xs-12	">
                                <label>Description</label><b style="color:red;">*</b>
                                <textarea   maxlength="100" placeholder="100 words only" name="comment1" id="comment1"style="padding:3px;border: 1px solid #dddd;width:100%;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"></textarea>
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
</div>
            
        
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
    function edit_seller(post_id)
    {
        $.ajax
        ({
            type: "POST",
            url: "<?php echo base_url(); ?>property/get_property_details_by_id",
            data: {post_id:post_id, property_type:'Flat'},
            dataType: 'json',
            success: function(data)
            {
                $("#post_id").val(data['post_id']);
                $("#name").val(data['name']);
                $("#mobile").val(data['mobile']);
                $("#mobile1").val(data['mobile1']);
                $("#phone").val(data['phone']);
                $("#email").val(data['email']);
                $("#city").val(data['city']);
                $("#state").val(data['state']);
                $("#location").val(data['location']);
                $("#complex_society_building").val(data['complex_society_building']);
                $("#address").val(data['address']);
                $("#blockno").val(data['blockno']);
                $("#landmark").val(data['landmark']);
                $("#flatno").val(data['flatno']);
                $("#pincode").val(data['pincode']);
                $("#section").val(data['section']);
                $("#AgeofPropeety").val(data['AgeofPropeety']);
                $("#PossessionDate").val(data['PossessionDate']);
                $("#PropertyType").val(data['PropertyType']);
                $("#OpenParking").val(data['OpenParking']);
                $("#CoveredParking").val(data['CoveredParking']);
                $("#Basement").val(data['Basement']);
                $("#LiftParking").val(data['LiftParking']);
                $("#TwoWheeler").val(data['TwoWheeler']);
                $("#rent_sell").val(data['rent_sell']);
                
                $("#res_com").val(data['res_com']);
                $("#res_com").val(data['res_com']);
                $("#FurnishedStatus").val(data['FurnishedStatus']);
                $("#security_deposite").val(data['security_deposite']);
                $("#rentPerMonth").val(data['rentPerMonth']);
                $("#net_amount").val(data['net_amount']);
                $("#amount").val(data['amount']);
                $("#per_unit").val(data['per_unit']);
                $("#flat_Room").val(data['flat_Room']);
                $("#flat_Balcony").val(data['flat_Balcony']);
                $("#flat_SuperBuildupArea").val(data['flat_SuperBuildupArea']);
                $("#flat_CarpetArea").val(data['flat_CarpetArea']);
                $("#flat_SuperBuildupAreaUnit").val(data['flat_SuperBuildupAreaUnit']);
                $("#flat_Carpet_Unit").val(data['flat_Carpet_Unit']);
                $("#flat_TotalFloor").val(data['flat_TotalFloor']);
                $("#flat_Bathroom").val(data['flat_Bathroom']);
                $("#flat_Kitchen").val(data['flat_Kitchen']);
                $("#flat_BuildupArea").val(data['flat_BuildupArea']);
                $("#flat_BuildupArea_Unit").val(data['flat_BuildupArea_Unit']);
                $("#flat_Floor").val(data['flat_Floor']);
                $("#flat_HeavyVehicleParkingUpto").val(data['flat_HeavyVehicleParkingUpto']);
                $("#PowerBackup").attr('checked',data['PowerBackup'] == 1 ? true:false);
                $("#ServiveLift").attr('checked',data['ServiveLift'] == 1 ? true:false);
                $("#BanquetHall").attr('checked',data['BanquetHall'] == 1 ? true:false);
                $("#GYM").attr('checked',data['GYM'] == 1 ? true:false);
                $("#VisitorParking").attr('checked',data['VisitorParking'] == 1 ? true:false);
                $("#Intercom").attr('checked',data['Intercom'] == 1 ? true:false);
                $("#CCTV").attr('checked',data['CCTV'] == 1 ? true:false);
                $("#SwimmingPool").attr('checked',data['SwimmingPool'] == 1 ? true:false);
                $("#CloubHouse").attr('checked',data['CloubHouse'] == 1 ? true:false);
                $("#SarvantRoom").attr('checked',data['SarvantRoom'] == 1 ? true:false);
                $("#Lift").attr('checked',data['Lift'] == 1 ? true:false);
                $("#WIFI").attr('checked',data['WIFI'] == 1 ? true:false);
                $("#CommunityHall").attr('checked',data['CommunityHall'] == 1 ? true:false);
                $("#IndoorGame").attr('checked',data['IndoorGame'] == 1 ? true:false);
                $("#OutDoorGame").attr('checked',data['OutDoorGame'] == 1 ? true:false);
                $("#GasPipeLine").attr('checked',data['GasPipeLine'] == 1 ? true:false);
                $("#Park").attr('checked',data['Park'] == 1 ? true:false);
                $("#Security").attr('checked',data['Security'] == 1 ? true:false);
                $("#comment1").val(data['comment1']);
                if(data['rent_sell'] == 'Rent'){
                    $('.rent_div').css('display', 'block');
                    $('.sell_div').css('display', 'none');
                }else{
                    $('.rent_div').css('display', 'none');
                    $('.sell_div').css('display', 'block');
                }
                $("#myModal").modal();
            }

        });	
    }
    
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









