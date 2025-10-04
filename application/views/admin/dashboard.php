
<!-- page content -->
<div class="right_col" role="main">  

    <div class="container">
        <div class="page-title">
            <div class="title_left">
                <h3><i class="fa fa-ioxhost"></i>Search user by Email Id/Contact No.</h3>
            </div>
            <form name="search_user_details" id="search_user_details_by_email_contact" action="<?php echo base_url(); ?>backend" method="post">
                <div class="row">
                    <div class="col-md-8 col-sm-8 col-xs-8">
                        <input type="text" name="search_value" id="search_value" placeholder="Email Id / Contact No" style="background-color:#FFF;" value="<?php if(!empty($search_value)){echo $search_value;} ?>" />
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-2">
                        <button class="effect effect-5 red" type="submit" style="width:100px;">Search</button>
                    </div>
                </div> 
            </form>
        </div>
        <div class="clearfix"></div>
        <div class="x_content">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="table-wrapper">
                        <?php if(!empty($result['result'])){ ?>
                        <table class="table table-bordered table-striped table" >
                            <thead>
                                <tr>
                                    <th>User</th>
                                    <th>Name</th>
                                    <th>Contact1</th>
                                    <th>Contact2</th>
                                    <th>Email</th>
                                    <th>Status</th>
                                    <!--<th>Joined Date</th>-->
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($result['result'] as $row){ ?>
                                <tr>
                                    <td><?php echo $row['user_type']; ?></td>
                                    <td><?php echo $row['name']; ?></td>
                                    <td><?php echo $row['contact1']; ?></td>
                                    <td><?php echo $row['contact2']; ?></td>
                                    <td><?php echo $row['email']; ?></td>
                                    <td><?php echo $row['status']; ?></td>
                                    <!--<td><?php echo $row['user_type']; ?></td>-->
                                </tr>
                                <?php } ?>
                                
                            </tbody>
                        </table>
                        <?php }elseif($search_value != ''){ ?>
                        <h2>No Result Found!</h2>
                        <?php } ?>
                        
                        <?php //pre($result['project_list']); ?>
                        
                        <?php if(!empty($result['project_list'])){ ?>
                        <table  id="datatable"  class="table table-bordered table-striped table" >
                            <thead> 
                            <caption>Project List</caption>
                                <tr>
                        		  <th>Sno.</th>
                        		  <th>Prop ID</th>
                        		  <th>Status</th>
                        		  <th>Property Status</th>
                        		  <th>Starting</th>
                        		  <th>BHK</th>
                        		  <th>Property Type</th>
                        		  <th>Size Upto</th>
                        		  <th>Price</th>
                        		  <th>State</th>
                        		  <th>Location</th>
                        		  <th>City</th>
                        		  <th>Landmark</th>
                        		  <th>Pincode</th>
                        		  <th>Marketing By</th>
                        		  <th>Section</th>
                        		  <th>Age</th>
                        		  <th>Possession Date</th>
                        		  <th>Property Type</th>
                        		  <th>Open</th>
                        		  <th>Covered</th>
                        		  <th>Basement</th>
                        		  <th>LiftParking</th>
                        		  <th>TwoWheeler</th>
                        		  <th>Comment</th>
                        		  <th>PDF</th>
                        		  <th>Image</th>
                        		  <th>Video</th>
                                </tr>
                            </thead>
                            <tbody>   
                                <?php foreach($result['project_list'] as $i=>$row){ ?>
                                <tr>
                    			  <td><?php echo $i+1;?></td>
                    			  <td><?php echo $row->lead_id; ?></td>
                    			  <td>
                    			      <?php if($row->ad_flag == 1){echo '| <span title="Advertisement" style="color:green;"> Ad</span>'; } ?>
                    			      <?php if($row->status == 0){echo '<span title="Pending" class="label label-warning">Pending</span>'; }elseif($row->status == 1){echo '<span title="Active" class="label label-success">Active</span>'; }elseif($row->status == 2){ echo '<span title="Rejected" class="label label-danger">Rejected</span>'; }else{ echo '<span title="Expired" class="label label-info">Expired</span>'; } ?>
                                      <?php if($row->ad_flag==1){ echo '<span title="Advertisement" class="label label-success"> Ad</span>'; } ?>
                    			  </td>
                    			  <td><?php echo $row->PropertyStatus; ?></td>
                    			  <td><?php echo $row->sizestartingfrom.' '.$row->sizestartingfromUnit; ?></td>
                    			  <td><?php echo $row->bhk1.' - '.$row->bhk2; ?></td>
                    			  <td><?php if($row->PropertyStatus == 'Residential'){ echo $row->propertyTypeRes; }else{ echo $row->propertyTypeCom; } ?></td>
                    			  <td><?php echo $row->sizeupto.' '.$row->sizeuptoUnit; ?></td>
                    			  <td><?php echo $row->price.' '.$row->priceUnit; ?></td>
                    			  <td><?php echo $row->state; ?></td>
                    			  <td><?php echo $row->location; ?></td>
                    			  <td><?php echo $row->city; ?></td>
                    			  <td><?php echo $row->landmark; ?></td>
                    			  <td><?php echo $row->pincode; ?></td>
                    			  <td><?php echo $row->Marketingby; ?></td>
                    			  <td><?php echo $row->section; ?></td>
                    			  <td><?php echo $row->AgeofPropeety; ?></td>
                    			  <td><?php echo $row->PossessionDate; ?></td>
                    			  <td><?php echo $row->PropertyType; ?></td>
                    			  <td><?php echo $row->Open; ?></td>
                    			  <td><?php echo $row->Covered; ?></td>
                    			  <td><?php echo $row->Basement; ?></td>
                    			  <td><?php echo $row->LiftParking; ?></td>
                    			  <td><?php echo $row->TwoWheeler; ?></td>
                    			  <td><?php echo $row->comment; ?></td>
                    			  <td><a href="<?php echo base_url(); ?><?php echo $row->pdf_file; ?>">PDF</a></td>
                    			  <td><img width="100px" height="100px" src="<?php echo base_url(); ?><?php echo $row->image_file; ?>"></td>
                    			  <td><a href="<?php echo base_url(); ?><?php echo $row->video_file; ?>"><span title="Video" class="label label-info">Video</span></a></td>
                    			</tr>
                                <?php } ?>
                            </tbody>
                        </table>
                        <?php } ?>
                        
                        
                        <?php if(!empty($result['property_list'])){ ?>
                        <table class="table table-bordered table-striped table" id="example">
                            <thead> 
                            <caption>Property List</caption>
                                <tr>
                        		  <th>Sno.</th>
                        		  <th>Prop ID</th>
                        		  <th>Status</th>
                        		  <th>Name</th>
                        		  <th>Mobile</th>
                        		  <th>Email</th>
                        		  <th>State</th>
                        		  <th>City</th>
                        		  <th>Location</th>
                        		  <th>Complex/Society/Building</th>
                        		  <th>Rent/Sell</th>
                        		  <th>Residential/Commercial</th>
                        		  <th>Furnished Status</th>
                        		  <th>Property Type</th>
                                </tr>
                            </thead>
                            <tbody>   
                                <?php foreach($result['property_list'] as $i=>$row){ ?>
                                <tr>
                                    <td><?php echo $i+1;?></td>
                                    <td><?php echo $row->lead_id; ?></td>
                                    <td>
                                        <?php if($row->status == 0){echo '<span title="Pending" class="label label-warning">Pending</span>'; }elseif($row->status == 1){echo '<span title="Active" class="label label-success">Active</span>'; }elseif($row->status == 2){ echo '<span title="Rejected" class="label label-danger">Rejected</span>'; }else{ echo '<span title="Expired" class="label label-info">Expired</span>'; } ?>
                                    </td>
                                    <td><?php echo $row->name; ?></td>
                                    <td><?php echo $row->mobile; ?></td>
                                    <td><?php echo $row->email; ?></td>
                                    <td><?php echo $row->state; ?></td>
                                    <td><?php echo $row->city; ?></td>
                                    <td><?php echo $row->location; ?></td>
                                    <td><?php echo $row->complex_society_building; ?></td>
                                    <td><?php echo $row->rent_sell; ?></td>
                                    <td><?php echo $row->res_com; ?></td>
                                    <td><?php echo $row->FurnishedStatus; ?></td>
                                    <td>
                                        <?php if($row->residential == 'ShopOrShowroom'){ echo 'Shop/Showroom'; }elseif($row->residential == 'PentHouse'){ echo 'Pent House'; }elseif($row->residential == 'DuplexFlat'){ echo 'Duplex Flat'; }else{ echo $row->residential; } ?>
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                        <?php } ?>
                    
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="page-title"><div class="title_left"><h3><i class="fa fa-ioxhost"></i> New Updates</h3></div></div>

    <div class="clearfix"></div>

    <!-- Start Dashbord -->
    <div class="our-dashbord dashbord">
        
        <div class="row">
			<div class="col-lg-2 col-md-3 col-sm-3 col-xs-6">
				<div class="ff_one">
					<div class="detais">
						<div class="timer"><?php echo $dashboard['new_owner']; ?></div>
						<div class="icon"><span class="flaticon-avatar"></span></div>
					</div>
					<a class="outln-hvr style2" href="<?php echo base_url('backend/owner/new'); ?>">Owner</a>
				</div>
			</div>
			<div class="col-lg-2 col-md-3 col-sm-3 col-xs-6">
				<div class="ff_one style2">
					<div class="detais">
						<div class="timer"><?php echo $dashboard['new_agent']; ?></div>
						<div class="icon"><span class="flaticon-stick-man"></span></div>
					</div>
					<a class="outln-hvr style2" href="<?php echo base_url('backend/agent/new'); ?>">Agent</a>
				</div>
			</div>
			<div class="col-lg-2 col-md-3 col-sm-3 col-xs-6">
				<div class="ff_one style3">
					<div class="detais">
						<div class="timer"><?php echo $dashboard['new_builder']; ?></div>
						<div class="icon"><span class="flaticon-builder"></span></div>
					</div>
					<a class="outln-hvr style2" href="<?php echo base_url('backend/builder/new'); ?>">Builder</a>
				</div>
			</div>
			<div class="col-lg-2 col-md-3 col-sm-3 col-xs-6">
				<div class="ff_one style4">
					<div class="detais">
						<div class="timer"><?php echo $dashboard['new_lead_partner']; ?></div>
						<div class="icon"><span class="flaticon-funnel"></span></div>
					</div>
					<a class="outln-hvr style2" href="<?php echo base_url('backend/lead_partners/new'); ?>">Lead Partner</a>
				</div>
			</div>
			<div class="col-lg-2 col-md-3 col-sm-3 col-xs-6">
				<div class="ff_one style5">
					<div class="detais">
						<div class="timer"><?php echo $dashboard['new_buyer_lead']; ?></div>
						<div class="icon"><span class="flaticon-shopping-cart"></span></div>
					</div>
					<a class="outln-hvr style2" href="<?php echo base_url('property/buyers_lead/new'); ?>">Buyer's Lead</a>
				</div>
			</div>
			<div class="col-lg-2 col-md-3 col-sm-3 col-xs-6">
				<div class="ff_one style6">
					<div class="detais">
						<div class="timer"><?php echo $dashboard['new_seller_lead']; ?></div>
						<div class="icon"><span class="flaticon-tag"></span></div>
					</div>
					<a class="outln-hvr style2" href="<?php echo base_url('property/sellers_lead/new'); ?>">Seller's Lead</a>
				</div>
			</div>
			<div class="col-lg-2 col-md-3 col-sm-3 col-xs-6">
				<div class="ff_one">
					<div class="detais">
						<div class="timer"><?php echo $dashboard['new_home_loan_lead']; ?></div>
						<div class="icon"><span class="flaticon-money"></span></div>
					</div>
					<a class="outln-hvr style2" href="<?php echo base_url('property/home_lead/new'); ?>">Home Loan lead</a>
				</div>
			</div>
			<div class="col-lg-2 col-md-3 col-sm-3 col-xs-6">
				<div class="ff_one style2">
					<div class="detais">
						<div class="timer"><?php echo $dashboard['new_buyer']; ?></div>
						<div class="icon"><span class="flaticon-shopping-cart"></span></div>
					</div>
					<a class="outln-hvr style2" href="<?php echo base_url('property/new_buyer/users'); ?>">Buyer</a>
				</div>
			</div>
			<div class="col-lg-2 col-md-3 col-sm-3 col-xs-6">
				<div class="ff_one style3">
					<div class="detais">
						<div class="timer"><?php echo $dashboard['new_seller']; ?></div>
						<div class="icon"><span class="flaticon-seller"></span></div>
					</div>
					<a class="outln-hvr style2" href="<?php echo base_url('property/new_seller/users'); ?>">Seller</a>
				</div>
			</div>
			<div class="col-lg-2 col-md-3 col-sm-3 col-xs-6">
				<div class="ff_one style4">
					<div class="detais">
						<div class="timer"><?php echo $dashboard['new_society']; ?></div>
						<div class="icon"><span class="flaticon-hotel"></span></div>
					</div>
					<a class="outln-hvr style2" href="<?php echo base_url('backend/list_society/new'); ?>">Society/complex</a>
				</div>
			</div>
			<div class="col-lg-2 col-md-3 col-sm-3 col-xs-6">
				<div class="ff_one style5">
					<div class="detais">
						<div class="timer"><?php echo $dashboard['new_location']; ?></div>
						<div class="icon"><span class="flaticon-placeholder-1"></span></div>
					</div>
					<a class="outln-hvr style2" href="<?php echo base_url('backend/list_location/new'); ?>">Location</a>
				</div>
			</div>
			<div class="col-lg-2 col-md-3 col-sm-3 col-xs-6">
				<div class="ff_one style6">
					<div class="detais">
						<div class="timer"><?php echo $dashboard['new_in_process']; ?></div>
						<div class="icon"><span class="flaticon-process"></span></div>
					</div>
					<a class="outln-hvr style2" href="<?php echo base_url('property/deal_in_process'); ?>">In Process</a>
				</div>
			</div>
			<div class="col-lg-2 col-md-3 col-sm-3 col-xs-6">
				<div class="ff_one">
					<div class="detais">
						<div class="timer"><?php echo $dashboard['new_pending_payment']; ?></div>
						<div class="icon"><span class="flaticon-shuffle"></span></div>
					</div>
					<a class="outln-hvr style2" href="<?php echo base_url('property/deal_payment_pending'); ?>">Pending Payment</a>
				</div>
			</div>
			<div class="col-lg-2 col-md-3 col-sm-3 col-xs-6">
				<div class="ff_one style2">
					<div class="detais">
						<div class="timer"><?php echo $dashboard['rental_refresh_count']; ?></div>
						<div class="icon"><span class="flaticon-reload"></span></div>
					</div>
					<a class="outln-hvr style2" href="<?php echo base_url('property/rental_refresh'); ?>">Rental Refresh</a>
				</div>
			</div>
			<div class="col-lg-2 col-md-3 col-sm-3 col-xs-6">
				<div class="ff_one style3">
					<div class="detais">
						<div class="timer"><?php echo $dashboard['new_builder_project']; ?></div>
						<div class="icon"><span class="flaticon-builder"></span></div>
					</div>
					<a class="outln-hvr style2" href="<?php echo base_url('property/projects/new-builder-projects'); ?>">Builder Projects</a>
				</div>
			</div>
			
			<div class="col-lg-2 col-md-3 col-sm-3 col-xs-6">
				<div class="ff_one style4">
					<div class="detais">
						<div class="timer"><?php echo $dashboard['new_owner_property']; ?></div>
						<div class="icon"><span class="flaticon-avatar"></span></div>
					</div>
					<a class="outln-hvr style2" href="<?php echo base_url('property/new_seller/owner'); ?>">Owner Property</a>
				</div>
			</div>
			<div class="col-lg-2 col-md-3 col-sm-3 col-xs-6">
				<div class="ff_one style5">
					<div class="detais">
						<div class="timer"><?php echo $dashboard['new_agent_property']; ?></div>
						<div class="icon"><span class="flaticon-seller"></span></div>
					</div>
					<a class="outln-hvr style2" href="<?php echo base_url('property/new_seller/agent'); ?>">Agent Property</a>
				</div>
			</div>
			<div class="col-lg-2 col-md-3 col-sm-3 col-xs-6">
				<div class="ff_one style6">
					<div class="detais">
						<div class="timer"><?php echo $dashboard['new_pending_requirement']; ?></div>
						<div class="icon"><span class="flaticon-megaphone"></span></div>
					</div>
					<a class="outln-hvr style2" href="<?php echo base_url('property/new_buyer/pending'); ?>">Requirements</a>
				</div>
			</div>
			
    	</div>
    </div>
	
    <div class="container">
        <div class="page-title">
            <div class="title_left">
                <h3><i class="fa fa-ioxhost"></i> Total Stocks</h3>
            </div>
        </div>
        
        <div class="clearfix"></div>
        
        <div class="table-wrapper">
            <table class="fl-table">
                <thead>
                    <tr>
                        <th>Live viewers</th>
                        <th>Users</th>
                        <th>Agent</th>
                        <th>Builder</th>
                        <th>Owner</th>
                        <th>Lead Partner</th>
                        <th>Buyer Lead</th>
                        <th>Seller Lead</th>
                        <th>Home Loan Lead</th>
                        <th>Buyer</th>
                        <th>Seller</th>
                        <th>Sold out</th>
                        <th>Rent out</th>
                        <th>In process</th>
                        <th>Closed</th>
                        <th>Requirements</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?php echo $dashboard['total_live_viewers']; ?></td>
                        <td><?php echo $dashboard['total_users']; ?></td>
                        <td><?php echo $dashboard['total_agent']; ?></td>
                        <td><?php echo $dashboard['total_builder']; ?></td>
                        <td><?php echo $dashboard['total_owner']; ?></td>
                        <td><?php echo $dashboard['total_lead_partners']; ?></td>
                        <td><?php echo $dashboard['total_buyer_lead']; ?></td>
                        <td><?php echo $dashboard['total_seller_lead']; ?></td>
                        <td><?php echo $dashboard['total_home_loan_lead']; ?></td>
                        <td><?php echo $dashboard['total_buyer']; ?></td>
                        <td><?php echo $dashboard['total_seller']; ?></td>
                        <td><?php echo $dashboard['total_sold_out']; ?></td>
                        <td><?php echo $dashboard['total_rent_out']; ?></td>
                        <td><?php echo $dashboard['total_in_process']; ?></td>
                        <td><?php echo $dashboard['total_closed']; ?></td>
                        <td><?php echo $dashboard['total_pending_requirement']; ?></td>
                    </tr>
                <tbody>
            </table>
        </div>
    </div>
    

    <div class="modal fade" id="attendace-modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <div class="col-md-12">
                            <label class="control-label" for="description">Description</label>
                            <textarea class="form-control"  id="description" name="description" readonly disabled></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer" style="border-top: 1px solid #FFF;">
                    <button type="button" class="effect effect-2 red" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>



<script>
    $(document).ready(function() {
        $('#example').DataTable( {
            scrollY:        200,
            scrollCollapse: true,
            scroller:       true,
        } );
    } );
</script>
<script>
$(function(){
    var currentDate; // Holds the day clicked when adding a new event
    var currentEvent; // Holds the event object when editing an event
    var todayDate = new Date();
    var year = todayDate.getFullYear();
    var month = todayDate.getMonth();
    /*var date0 = new Date(year, 0, 1);
    var date1 = new Date(year, 1, 1);
    var date2 = new Date(year, 2, 1);
    var date3 = new Date(year, 3, 1);
    var date4 = new Date(year, 4, 1);
    var date5 = new Date(year, 5, 1);
    var date6 = new Date(year, 6, 1);
    var date7 = new Date(year, 7, 1);
    var date8 = new Date(year, 8, 1);
    var date9 = new Date(year, 9, 1);
    var date10 = new Date(year,10,1);
    var date11 = new Date(year,11,1);*/
    var date0 = new Date(year, month, 2);
    var date1 = new Date(year, month+1, 2);
    var date2 = new Date(year, month+2, 2);
    /*alert(todayDate);
    alert(month);
    alert(date1.getMonth());*/
    var base_url='<?php echo base_url(); ?>'; 
    $('#my-calendar-0').fullCalendar({
        header: {
            left:'',
            center: 'title',
            right:  ''
        },
        defaultDate: date0, 
        contentHeight: 340,
        eventLimit: true,
        eventSources: [
            {
              url: base_url+'backend/getAdminHolidayDetailsByMonth',
              method: 'POST',
              data: {
                month:month+1
              },
              failure: function() {
                alert('there was an error while fetching events!');
              },
            }
         ],
        selectable: true,
        selectHelper: true,
        editable: false,      
        showNonCurrentDates: false, 
        eventClick: function(calEvent, jsEvent, view) {
            currentEvent = calEvent;
            modal({
                title: 'View Event ',
                event: calEvent
            });
        }
    });
    $('#my-calendar-1').fullCalendar({
        header: {
            left:'',
            center: 'title',
            right:  ''
        },
        defaultDate: date1, 
        contentHeight: 340,
        eventLimit: true, // allow "more" link when too many events
        eventSources: [
            {
              url: base_url+'backend/getAdminHolidayDetailsByMonth',
              method: 'POST',
              data: {
                month:month+2
              },
              failure: function() {
                alert('there was an error while fetching events!');
              },
            }
         ],
        selectable: true,
        selectHelper: true,
        editable: true,      
        showNonCurrentDates: false, 
        eventClick: function(calEvent, jsEvent, view) {
            currentEvent = calEvent;
            modal({
                title: 'View Event ',
                event: calEvent
            });
        }
       
    });
    $('#my-calendar-2').fullCalendar({
        header: {
            left:'',
            center: 'title',
            right:  ''
        },
        defaultDate: date2,
        contentHeight: 340,
        eventLimit: true, // allow "more" link when too many events
        eventSources: [
            {
              url: base_url+'backend/getAdminHolidayDetailsByMonth',
              method: 'POST',
              data: {
                month:month+3
              },
              failure: function() {
                alert('there was an error while fetching events!');
              },
            }
         ],
        selectable: true,
        selectHelper: true,
        editable: false,      
        showNonCurrentDates: false, 
        eventClick: function(calEvent, jsEvent, view) {
            currentEvent = calEvent;
            modal({
                title: 'View Event ',
                event: calEvent
            });
        }
    });
    /*$('#my-calendar-3').fullCalendar({
        header: {
            left:'',
            center: 'title',
            right:  ''
        },
        defaultDate: date3,
        contentHeight: 340,
        eventLimit: true, 
        eventSources: [
            {
              url: base_url+'backend/getAdminHolidayDetailsByMonth',
              method: 'POST',
              data: {
                month:4
              },
              failure: function() {
                alert('there was an error while fetching events!');
              },
            }
         ],
        selectable: true,
        selectHelper: true,
        editable: false,      
        showNonCurrentDates: false, 
        eventClick: function(calEvent, jsEvent, view) {
            currentEvent = calEvent;
            modal({
                title: 'View Event ',
                event: calEvent
            });
        }
    });
    $('#my-calendar-4').fullCalendar({
        header: {
            left:'',
            center: 'title',
            right:  ''
        },
        defaultDate: date4,
        contentHeight: 340,
        eventLimit: true,
        eventSources: [
            {
              url: base_url+'backend/getAdminHolidayDetailsByMonth',
              method: 'POST',
              data: {
                month:5
              },
              failure: function() {
                alert('there was an error while fetching events!');
              },
            }
         ],
        selectable: true,
        selectHelper: true,
        editable: false,      
        showNonCurrentDates: false, 
        eventClick: function(calEvent, jsEvent, view) {
            currentEvent = calEvent;
            modal({
                title: 'View Event ',
                event: calEvent
            });
        }
    });
    $('#my-calendar-5').fullCalendar({
        header: {
            left:'',
            center: 'title',
            right:  ''
        },
        contentHeight: 340,
        defaultDate: date5,
        eventLimit: true, 
        eventSources: [
            {
              url: base_url+'backend/getAdminHolidayDetailsByMonth',
              method: 'POST',
              data: {
                month:7
              },
              failure: function() {
                alert('there was an error while fetching events!');
              },
            }
         ],
        selectable: true,
        selectHelper: true,
        editable: false,      
        showNonCurrentDates: false, 
        eventClick: function(calEvent, jsEvent, view) {
            currentEvent = calEvent;
            modal({
                title: 'View Event ',
                event: calEvent
            });
        }
    });
    $('#my-calendar-6').fullCalendar({
        header: {
            left:'',
            center: 'title',
            right:  ''
        },
        defaultDate: date6,
        contentHeight: 340,
        eventLimit: true, 
        eventSources: [
            {
              url: base_url+'backend/getAdminHolidayDetailsByMonth',
              method: 'POST',
              data: {
                month:8
              },
              failure: function() {
                alert('there was an error while fetching events!');
              },
            }
         ],
        selectable: true,
        selectHelper: true,
        editable: false,      
        showNonCurrentDates: false, 
        eventClick: function(calEvent, jsEvent, view) {
            currentEvent = calEvent;
            modal({
                title: 'View Event ',
                event: calEvent
            });
        }
    });
    $('#my-calendar-7').fullCalendar({
        header: {
            left:'',
            center: 'title',
            right:  ''
        },
        defaultDate: date7,
        contentHeight: 340,
        eventLimit: true, 
        eventSources: [
            {
              url: base_url+'backend/getAdminHolidayDetailsByMonth',
              method: 'POST',
              data: {
                month:9
              },
              failure: function() {
                alert('there was an error while fetching events!');
              },
            }
         ],
        selectable: true,
        selectHelper: true,
        editable: false,      
        showNonCurrentDates: false, 
        eventClick: function(calEvent, jsEvent, view) {
            currentEvent = calEvent;
            modal({
                title: 'View Event ',
                event: calEvent
            });
        }
    });
    $('#my-calendar-8').fullCalendar({
        header: {
            left:'',
            center: 'title',
            right:  ''
        },
        defaultDate: date8,
        contentHeight: 340,
        eventLimit: true, 
        eventSources: [
            {
              url: base_url+'backend/getAdminHolidayDetailsByMonth',
              method: 'POST',
              data: {
                month:9
              },
              failure: function() {
                alert('there was an error while fetching events!');
              },
            }
         ],
        selectable: true,
        selectHelper: true,
        editable: false,      
        showNonCurrentDates: false, 
        eventClick: function(calEvent, jsEvent, view) {
            currentEvent = calEvent;
            modal({
                title: 'View Event ',
                event: calEvent
            });
        }
    });
    $('#my-calendar-9').fullCalendar({
        header: {
            left:'',
            center: 'title',
            right:  ''
        },
        contentHeight: 340,
        defaultDate: date9,
        eventLimit: true,
        eventSources: [
            {
              url: base_url+'backend/getAdminHolidayDetailsByMonth',
              method: 'POST',
              data: {
                month:10
              },
              failure: function() {
                alert('there was an error while fetching events!');
              },
            }
         ],
        selectable: true,
        selectHelper: true,
        editable: false,      
        showNonCurrentDates: false, 
        eventClick: function(calEvent, jsEvent, view) {
            currentEvent = calEvent;
            modal({
                title: 'View Event ',
                event: calEvent
            });
        }
    });
    $('#my-calendar-10').fullCalendar({
        header: {
            left:'',
            center: 'title',
            right:  ''
        },
        contentHeight: 340,
        defaultDate: date10,
        eventLimit: true, 
        eventSources: [
            {
              url: base_url+'backend/getAdminHolidayDetailsByMonth',
              method: 'POST',
              data: {
                month:11
              },
              failure: function() {
                alert('there was an error while fetching events!');
              },
            }
         ],
        selectable: true,
        selectHelper: true,
        editable: false,      
        showNonCurrentDates: false, 
        eventClick: function(calEvent, jsEvent, view) {
            currentEvent = calEvent;
            modal({
                title: 'View Event ',
                event: calEvent
            });
        }
    });
    $('#my-calendar-11').fullCalendar({
        header: {
            left:'',
            center: 'title',
            right:  ''
        },
        defaultDate: date11,
        contentHeight: 340,
        eventLimit: true, 
        eventSources: [
            {
              url: base_url+'backend/getAdminHolidayDetailsByMonth',
              method: 'POST',
              data: {
                month:12
              },
              failure: function() {
                alert('there was an error while fetching events!');
              },
            }
         ],
        selectable: true,
        selectHelper: true,
        editable: false,      
        showNonCurrentDates: false, 
        eventClick: function(calEvent, jsEvent, view) {
            currentEvent = calEvent;
            modal({
                title: 'View Event ',
                event: calEvent
            });
        }
    });*/
    
  

    function modal(data) {
        $('#description').val('');
        $('.modal-title').html(data.title);
        $('.modal-footer button:not(".btn-default")').remove();
        if(data.event)
        {
            $('#description').val(data.event ? data.event.description : '');
        }
        $.each(data.buttons, function(index, button){
            $('.modal-footer').prepend('<button type="button" id="' + button.id  + '" class="btn ' + button.css + '">' + button.label + '</button>')
        })
        $('#attendace-modal').modal();
    }

});
</script>

<!-- /page content -->
