<?php if(!empty($list_reviews)){ ?>
<?php foreach($list_reviews as $i=>$row){ ?>
    <li class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="list-holder ">
            <div class="img-holder">
                <?php if(@$row->profile != ''){ ?>
                <figure><img src="<?php echo base_url(); ?>assets/front/img/user-profile.png" alt="#"></figure>
                <?php }else{ ?>
                <figure><img src="<?php echo base_url(); ?>assets/front/img/user-profile.png" alt="#"></figure>
                <?php } ?>
            </div>
            <div class="img-holder-content">
                <div class="review-title">
                    <p><?php echo $row->name;?></p>
                    <div class="rating-holder">
                        <em><?php echo date('M Y', strtotime($row->created));?></em>
                        <div class="rating-star" data-toggle="popover_html">
                            <span style="width: <?php echo (($row->rate*100)/5)?>%;" class="rating-box"></span>
                        </div>
                        <div class="ratings-popover-content" style="display:none;">
                            <ul class="ratings-popover-listing">
                                <li>Service : 5</li>
                                <li>Quality : 5</li>
                                <li>Value : 5</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!--<div class="review-helpful-holder">
                    <a href="#" class="mark-review-helpful"><i class="icon-thumbs-o-up"></i> <span class="marked-helpful-txt">Helpful</span>
                        <div class="marked-helpful-counts"><span>15</span></div>
                    </a>
                </div>
                <div class="review-flag-holder">
                    <a href="#" class="mark-review-flag"><i class="icon-flag-o"></i> <span class="marked-flag-txt">Flag</span></a>
                </div>-->
            </div>
            <div class="review-text">
                <p><?php echo $row->review_msg; ?></p>
            </div>
        </div>
    </li>
    <?php } ?>
    <?php } ?>