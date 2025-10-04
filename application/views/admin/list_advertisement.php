<script>
    function checkAvailability() {
        $("#loaderIcon").show();
        jQuery.ajax({
            url: "category_ajax.php",
            data:'couponcode='+$("#transactionid").val(),
            type: "POST",
            success:function(data){
                $("#user-availability-status").html(data);
                $("#loaderIcon").hide();
            },
            error:function (){}
        });
    }
</script>

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
            <h3><i class="fa fa-ioxhost"></i> Manage Addvertisement</h3>
        </div>
    </div>

    <div class="clearfix"></div>

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">

            <div class="x_panel">
                <div class="x_title">
                    <div class="col-md-6 col-sm-6 col-xs-12"><h2>Flat List</h2></div>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <button type="button" class="effect effect-5 red pull-right" data-toggle="modal" data-target="#myModal" style="width:170px;">ADD Addvertisement</button>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <table id="datatable" class="table table-bordered table-striped table">
                        <thead> 

                            <tr>
                                <td>Sr No</td>
                                <td>Type</td>
                                <td>Title</td>
                                <td>Image</td>
                                <td>City</td>
                                <td>Location</td>
                                <td>Price</td>
                                <td>Description</td>
                                <td>Created</td>
                                <th>Action</th>
                            </tr>

                        </thead>
                        <tbody>
                            <?php if(!empty($list)){ ?>
                            <?php foreach($list as $i=>$row){ ?>
                            <tr>
                                <td><?php echo $i+1;?></td>
                                <td><?php echo $row->type;?></td>
                                <td><?php echo $row->title;?></td>
                                <td><img src="<?php echo base_url().$row->image;?>" width="100px" height="100px" /></td>
                                <td><?php echo $row->city;?></td>
                                <td><?php echo $row->location;?></td>
                                <td><?php echo $row->price;?></td>
                                <td><?php echo $row->description;?></td>
                                <td><?php echo $row->created;?></td><td>
                                    <a class="action-btn edit" href="javascript:void(0);" onclick="edit_seller(<?php echo $row->id; ?>);"><i class="fa fa-pencil"></i></a>
                                    <a class="action-btn delete" onclick="confirm('Do You want to delete this record?');" href="<?php echo base_url();?>property/delete_property/<?php echo $row->id;?>"> <i class="fa fa-trash"></i></a>
                                    
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
                    <h4 class="modal-title" style="color:white;font-weight:bold;font-size:20px;">Add Addvertisement</h4>
                </div>
                <div class="modal-body">
                    <form method="POST" enctype="multipart/form-data" action="<?php echo base_url(); ?>backend/save_advertisement">
                        <div class="row">
                            <input type="hidden" name="added_by" value="Super Admin" id="added_by"  onblur="checkValue(this)"  />
                            <input type="hidden" name="id" value="0" id="id"  onblur="checkValue(this)"  />
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <label>Title</label><b style="color:red;">*</b>
                                <input type="text" name="title" id="title" onblur="checkValue(this)"  />
                            </div>
                            
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <label>City</label><b style="color:red;">*</b>
                                <input type=text name="city" id="city"     />
                            </div>

                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <label>Location</label><b style="color:red;">*</b>
                                <input type="text"  name="location" id="location"  onblur="checkValue(this)"  />
                            </div>


                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <label>Price</label><b style="color:red;">*</b>
                                <input type="number" class="input--style-5" name="price" id="price"  onblur="checkValue(this)">
                            </div>

                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <label>Type</label><b style="color:red;">*</b>
                                
                                <select name="type" id="type" class="form-control">
                                    <option value="Paid">Paid</option>
                                    <option value="Unpaid">Unpaid</option>
                                </select>
                            </div>

                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <label>By</label><b style="color:red;">*</b>
                                <input type="number" class="input--style-5" name="add_by" id="add_by"  onblur="checkValue(this)">

                            </div>
                            <!--<div class="col-md-6 col-sm-6 col-xs-12">
                                <label>City</label><b style="color:red;">*</b>
                                <select id="city" name="city" >
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
                            </div>-->
                            
                            
                            <!--<div class="col-md-12">-->
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <label>Image</label><b style="color:red;">*</b>
                                    <input type="file" name="UploadImages" id="UploadImages" value="" multiple  onblur="checkValue(this)"  />
                                    <input type="hidden" class="gui-file" name="prevUploadImages" id="prevUploadImages" value="<?php if(!empty($post_property)){ echo $post_property->image_name; }else{ echo ''; }?>">
                                </div>
    
                                <!--<div class="col-md-6 col-sm-6 col-xs-12">
                                    <label>Video</label><b style="color:red;">*</b>
                                    <input type="file" name="UploadVideos" id="UploadVideos"  onblur="checkValue(this)"  />
                                    <input type="hidden" class="gui-file" name="prevUploadVideos" id="prevUploadVideos" value="<?php if(!empty($post_property)){ echo $post_property->video_name; }else{ echo ''; }?>">
                                </div>-->
                            <!--</div>-->
                            
                            <div class="col-md-12 col-sm-12 col-xs-12	">
                                <label>Description</label><b style="color:red;">*</b>
                                <textarea   maxlength="100" placeholder="100 words only" name="description" id="description"style="padding:3px;border: 1px solid #dddd;width:100%;border-radius: 4px;box-sizing: border-box;margin-top: 3px;margin-bottom:3px;resize: vertical;" onblur="checkValue(this)"></textarea>
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
                $("#myModal").modal();
            }

        });	
    }
</script>









