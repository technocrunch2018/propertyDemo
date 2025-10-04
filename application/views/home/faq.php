<section class="hero-wrap">
    <div class="container">
        <div class="row no-gutters slider-text align-items-end justify-content-center">
            <div class="col-md-9 ftco-animate text-center pb-10">
                <h class="mb-3 bread">Who we are?</h>
                <p class="breadcrumbs"><span class="mr-2"><a href="<?php echo base_url();?>">Home <i class="fa fa-chevron-right"></i></a></span> <span>About us <i class="fa fa-chevron-right"></i></span></p>
            </div>
        </div>
    </div>
</section>
<div class="page-section ptb-90">
    <div class="container ">
        <div class="main-section ">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="cs-rich-editor">
                        <div class="page-section parallex-bg" style="padding-top: 60px; padding-bottom: 30px; background: #ffffff;">
                            <div class="container">
                                <div class="row">
                                    <div class="section-fullwidth col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
                                                <div class="faqs">
                                                    <div class="element-title align-left ">
                                                        <div class="faq panel-group " id="faq_960489">
                                                            
                                                            <?php $sr = 1; foreach($faq as $list){?>
                                                            <div class="panel">
                                                                <div class="panel-heading"> <strong class="panel-title"><a data-toggle="collapse" data-parent="#faq_960489" href="#collapse87895<?php echo $sr;?>"><?php echo $list->question;?></a>   </strong> </div>
                                                                <div id="collapse87895<?php echo $sr;?>" class="panel-collapse collapse <?php if($sr == 1){echo "in";}?>">
                                                                    <div class="panel-body"><?php echo $list->ans;?></div>
                                                                </div>
                                                            </div>
                                                            <?php ++$sr;}?>
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>