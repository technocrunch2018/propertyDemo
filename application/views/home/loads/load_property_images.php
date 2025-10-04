
        
<div id="myCarousel" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
      <?php if(!empty($property_images)){ ?>
      <?php foreach($property_images as $i=>$image){ ?>
      <?php if($image != ''){ ?>
    <li data-target="#myCarousel" data-slide-to="<?php echo $i;?>" class="<?php if($i==0){ ?> active <?php } ?>"></li>
    <?php } ?>
    <?php } ?>
    <?php } ?>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner">
        <div class="item active">
            <img src="<?php echo base_url(); ?><?php echo $image_name; ?>" alt="">
        </div>
            
      <?php if(!empty($property_images)){ ?>
      <?php foreach($property_images as $i=>$image){ ?>
      <?php if($image != ''){ ?>
            <div class="item <?php /*if($i==0){ ?> active <?php }*/ ?>">
                <a href="<?php echo base_url(); ?>home/delete_property_image/<?php echo $property_id; ?>/<?php echo $i; ?>"></a>
              <img src="<?php echo base_url(); ?><?php echo $image; ?>" alt="">
            </div>
            
        <?php } ?>
    <?php } ?>
    <?php }elseif($image_name==''){ ?>
    <div class="item active">
      <img src="<?php echo base_url(); ?>assets/front/extra-images/property-grid-image-2.webp" alt="">
    </div>
    <?php } ?>


    </div>
  <!-- Left and right controls -->
  <a class="left carousel-control" href="#myCarousel" data-slide="prev">
    <span class="glyphicon icon-chevron-left"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" data-slide="next">
    <span class="glyphicon icon-chevron-right"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
       