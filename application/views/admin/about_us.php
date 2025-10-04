<div class="right_col" role="main">
    <div class="page-title"><div class="title_left"><h3><i class="fa fa-ioxhost"></i> Update About Us</h3></div></div>

    
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">  
            <div class="x_panel">
                <form method="post" enctype="multipart/form-data" action="<?php echo base_url('backend/save_about_us');?>">
                <div class="x_content">
                    <div class="tab"> 
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <label>About Us</label><b style="color:red;">*</b>
                            <textarea class="summernote" name="about_us"><?php echo $tab[0]->about_us;?></textarea>
                        </div>
                        
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <label>About us File</label><b style="color:red;">*</b>
                            <div class="file-drop-area">
                                <span class="fake-btn">Choose files</span>
                                <span class="file-msg">or drag and drop files here</span>
                                <input class="file-input" type="file" name="about_img" accept="image/*" id="fileImage" onchange="validateFileType()">
                            </div>
                        </div>
                        
                    </div>
                 </div>
                 <div class="col-md-12 col-sm-12 col-xs-12">
                     <button type ="submit" class="effect effect-5 red" style="margin:20px 0 0 0;">Save</button>
                 </div>
                 </form>
            </div>
        </div>
    </div>
   
    
</div>
