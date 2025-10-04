<option value="">Select One</option>
<?php if(!empty($city_list)){ ?>
<?php foreach($city_list as $city){ ?>
<option value="<?php echo $city->name;?>"><?php echo $city->name;?></option>
<?php } ?>
<?php } ?>