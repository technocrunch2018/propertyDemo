<div class="user-packages-list">
    <div class="all-pckgs-sec">
        <div class="wp-rem-pkg-holder">
            <div class="wp-rem-pkg-header" style="border-bottom: 0;">
                <div class="pkg-title-price pull-left">
                <?php //print_r($property); ?>
                    <span class="pkg-price"><strong>Properties Id</strong> <span> : <?php echo $property->lead_id; ?> |</span> </span>
                    <span class="pkg-expiry"><strong><?php if($property_type == 'property'){ echo $property->complex_society_building; }else{ echo $property->Marketingby; } ?></strong>
                        <span>Posted : <?php echo date('M d, y',strtotime($property->created)); ?> </span></span>
    
                </div>
    
            </div>
            <div class="property-info-sec" style="padding: 0;border-top: 0;padding-bottom: 20px;">
                <div class="row  resc1">
                    <?php if($response_type == 'request_view'){ ?>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="col-md-12 responsive-1">
                            <div class="col-md-4">
                                <p>Requestor Name<br/>Date<br/>Time</p>
                            </div>
                            <div class="col-md-8">
                                <p>Message</p>
                            </div>
                        </div>
                        <div class="col-md-12">
                            
                            <?php if(!empty($responses)){ ?>
                            <?php foreach($responses as $row){ ?>
                            <ul class="property-pkg-points11">
                                <li>
                                    <div class="col-md-4">
                                        <p><?php echo $row->requestor_name;?></p><br>
                                        <p><?php echo $row->request_date;?></p>
                                        <p><?php echo $row->request_time;?></p>
                                    </div>
                                    <div class="col-md-8">
                                        <a href="#"><?php echo $row->request_message; ?></a>
                                    </div>
                                </li>
                            </ul>
                            <?php } ?>
                            <?php } ?>
                           
                            
                            
                        </div>
                    </div>
                    <?php } ?>
                    
                    
                    <?php if($response_type == 'enquiry'){ ?>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="col-md-12 responsive-1">
                            <div class="col-md-3">
                                <p>Response Received Form</p>
                            </div>
                            <div class="col-md-6">
                                <p>Contact Details</p>
                            </div>
                            <div class="col-md-3">
                                <p>Received On</p>
                            </div>
                        </div>
                        <div class="col-md-12">
                            
                            <?php if(!empty($responses)){ ?>
                            <?php foreach($responses as $row){ ?>
                            <ul class="property-pkg-points11">
                                <li>
                                    <div class="col-md-3">
                                        <p><?php echo $row->user_name;?></p>
                                    </div>
                                    <div class="col-md-6">
                                        <p><?php echo $row->user_phone;?></p>
                                        <p><?php echo $row->user_email;?></p>
                                        <a href="#"><?php echo $row->user_message;?></a>
                                    </div>
                                    <div class="col-md-3">
                                        <p><?php echo date('M d, y',strtotime($row->created));?></p>
                                    </div>
            
            
                                </li>
                            </ul>
                            <?php } ?>
                            <?php } ?>
                           
                            
                            
                        </div>
                    </div>
                    <?php } ?>
                    
                </div>
            </div>
        </div>
        
        
        
        
        
        
    </div>
    </div> 
    
    
    
    
    
    
    
    <?php if($response_type == 'enquiry'){ ?>
    <?php if(!empty($responses)){ ?>
    <ul class="property-pkg-points11">
        <li>
            <div class="col-md-3">
                <p>Antarang Gupta (1)</p>
                <p>Individual</p>
                <a href="#">Read Message</a>
            </div>
            <div class="col-md-6">
                <p>01122334455</p>
                <p>antarang@gmail.com</p>
                <a href="#">Call atarang Gupta. Save requirments on Smart Diary</a>
            </div>
            <div class="col-md-3">
                <p>Aug 12, '19</p>
                <a href="#">Block the Sender</a>
            </div>
        </li>
       
    </ul>
    <?php } ?>
    <?php } ?>
                            
                            
    
    <!--<li>
                                    <div class="col-md-3">
                                        <p>Antarang Gupta (1)</p>
                                        <p>Individual</p>
                                        <a href="#">Read Message</a>
                                    </div>
                                    <div class="col-md-6">
                                        <p>01122334455</p>
                                        <p>antarang@gmail.com</p>
                                        <a href="#">Call atarang Gupta. Save requirments on Smart Diary</a>
                                    </div>
                                    <div class="col-md-3">
                                        <p>Aug 12, '19</p>
                                    </div>
            
            
                                </li>-->
                                <!--<li>
                                    <div class="col-md-3">
                                        <p>Antarang Gupta (1)</p>
                                        <p>Individual</p>
                                        <a href="#">Read Message</a>
                                    </div>
                                    <div class="col-md-6">
                                        <p>01122334455</p>
                                        <p>antarang@gmail.com</p>
                                        <a href="#">Call atarang Gupta. Save requirments on Smart Diary</a>
                                    </div>
                                    <div class="col-md-3">
                                        <p>Aug 12, '19</p>
                                    </div>
            
            
                                </li>-->