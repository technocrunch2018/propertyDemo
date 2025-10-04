<div class="right_col" role="main">
    <div class="page-title">
        <div class="title_left">
            <h3><i class="fa fa-ioxhost"></i> Add Subscriptions</h3>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <form method="post" enctype="multipart/form-data"
                    action="<?php echo base_url('backend/save_subscription');?>">
                    <div class="x_content">
                        <div class="tab">
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <label>Name</label><b style="color:red;">*</b>
                                <input type="text" name="name" />
                            </div>

                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <label>User Type</label><b style="color:red;">*</b>

                                <select name="user_type">
                                    <option hidden>Select User Type</option>
                                    <option value="Owner">Owner</option>
                                    <option value="Agent">Agent</option>
                                    <option value="Builder">Builder</option>
                                </select>
                            </div>

                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <label>Purpose</label><b style="color:red;">*</b>

                                <select name="purpose">
                                    <option hidden>Select Purpose</option>
                                    <option value="1">Sale</option>
                                    <option value="2">Rent</option>
                                    <option value="3">Both</option>
                                </select>
                            </div>

                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <label>Validity (In Days)</label><b style="color:red;">*</b>
                                <input type="text" name="validity" onblur="checkValue(this)" />
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <label>Number Of listings</label><b style="color:red;">*</b>
                                <input type="text" name="listings" onblur="checkValue(this)" />
                            </div>
                            <div class="col-md-3 col-sm-3 col-xs-6">
                                <label>OLD Price</label>
                                <input type="text" name="oldprice" onblur="checkValue(this)" />
                            </div>
                            <div class="col-md-3 col-sm-3 col-xs-6">
                                <label>NEW Price</label><b style="color:red;">*</b>
                                <input type="text" name="price" onblur="checkValue(this)" />
                            </div>

                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <?php if(!empty($active_sub)){ ?>
                                <?php foreach($active_sub as $i=>$row){ ?>
                                <input type="checkbox" id="sub-<?php echo $row->id;?>" name="subElements[]" value="<?php echo $row->id;?>">
                                <label for="sub-<?php echo $row->id;?>"> <?php echo $row->name;?></label>
                                <?php } ?>
                                <?php } ?><br>
                            </div>

                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <label>Details</label>
                                <textarea name="details" onblur="checkValue(this)" /></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-sm-12 col-xs-12" style="margin:20px 0 10px 0;">
                        <button type="submit" class="effect red effect-5">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>