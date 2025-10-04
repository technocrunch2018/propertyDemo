<div class="right_col" role="main">
    <div class="page-title"><div class="title_left"><h3><i class="fa fa-ioxhost"></i> Update FAQ</h3></div></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">  
            <div class="x_panel">
                <form method="post" enctype="multipart/form-data" action="<?php echo base_url('backend/update_faq');?>">
                <div class="x_content">
                    <div class="tab"> 
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <label>Question</label><b style="color:red;">*</b>
                            <input type="text" value = "<?php echo $faq[0]->question;?>" name="question"/>
                        </div>
      
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <label>Answers</label><b style="color:red;">*</b>
                            <textarea  name="ans"><?php echo $faq[0]->ans;?></textarea>
                        </div>
                        <input type = "hidden" value = "<?php echo $faq[0]->id;?>" name = "id">
                    </div>
                 </div>
                 <button type ="submit" class = "effect effect-5 red">Update</button>
                 </form>
            </div>
        </div>
    </div>
</div>

                
             
        <!-- /page content -->
<style>
    table {
      font-family: arial, sans-serif;
      border-collapse: collapse;
      width: 100%;
    }

    td, th {
      border: 1px solid #dddddd;
      text-align: left;
      padding: 8px;
    }

    tr:nth-child(even) {
      background-color: #dddddd;
    }
</style>
