<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left"><h3><i class="fa fa-key "></i> Other Settings</h3></div>
            <div class="title_right"><div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search"></div></div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-4 col-xs-12">
                <div class="x_panel">
                    <div class="x_content">
                    <?php if(!empty($status)){?>
						<div style="color:green;"><b><?php echo $status; ?></b></div>
					<?php } ?> 
                    
                            <form method="post" enctype="multipart/form-data" action="<?php echo base_url('backend/update_other_settings');?>">
                <div class="x_content">
                    <div class="row">
    					
    						<div class="col-md-6 col-sm-6 col-xs-12">
    							<label>GST%</label><b style="color:red;">*</b>
    							<input type="text" value = "<?php echo $details->gst;?>" name="gst"placeholder="GST Rate%"   />
    						</div>
                            
                            <div class="col-md-6 col-sm-6 col-xs-12">
    							<label>SGST%</label><b style="color:red;">*</b>
    							<input type="text" value = "<?php echo $details->sgst;?>" name="sgst" placeholder="SGST Rate%"   />
    						</div>
    						
    						<div class="col-md-6 col-sm-6 col-xs-6">
    							<label>CGST%</label><b style="color:red;">*</b>
    							<input type="number" value = "<?php echo $details->cgst;?>" name="cgst" placeholder="CGST Rate%"   />
    						</div>
    
                            <div class="col-md-6 col-sm-6 col-xs-6">
    							<label>TDS</label><b style="color:red;">*</b>
    							<input type="number" value = "<?php echo $details->tds;?>" name="tds" placeholder="TDS"   />
    						</div>
    	
    					</div>
                    </div>
                    <button type ="submit" class="effect effect-5 red pt-20">Update</button>
                 </div>
                 
                 </form>
          
                  </div>
                </div>
              </div>
			  
            </div>
          </div>
        </div>
        <!-- /page content -->

	