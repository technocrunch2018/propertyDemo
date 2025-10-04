<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3><i class="fa fa-ioxhost"></i> Manage Coupons</h3>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Coupons List</h2>
                        <button type="button" class="effect effect-5 red pull-right" data-toggle="modal"
                            data-target="#myModal">ADD NEW</button>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <table id="datatable-buttons" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Sno.</th>
                                    <th>Name</th>
                                    <th>Discount</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(!empty($active_sub)){ ?>
                                <?php foreach($active_sub as $i=>$row){ ?>
                                <tr>
                                    <td><?php echo $i+1;?></td>
                                    <td><?php echo $row->coupon;?></td>
                                    <td><?php echo $row->discount;?> %</td>
                                    <td>
                                        <a class="action-btn delete"
                                            onclick="return confirm('Do you want to delete this record?');"
                                            href="<?php echo base_url();?>backend/delete_coupon/<?php echo $row->id;?>">
                                            <i class="fa fa-trash"></i></a>
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
</div>
<!-- /page content -->

<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog  modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header" style="background:linear-gradient(to right,#03709e,#18c3fd 100%);">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title" style="color:white;font-weight:bold;font-size:20px;">Add SubElement</h4>
            </div>
            <form method="POST" action="<?php echo base_url(); ?>backend/save_coupon"
                enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12 col-sm-6 col-xs-12">
                            <label>Name</label><b style="color:red;">*</b>
                            <input type="text" name="name" id="name" required/>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-sm-6 col-xs-12">
                            <label>Discount</label><b style="color:red;">*</b>
                            <input type="text" name="discount" id="name" required/>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="submit" name="save" value="Save" />
                </div>
            </form>
        </div>
    </div>
</div>