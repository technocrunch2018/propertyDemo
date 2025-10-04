<style>
/* Toggle Switch Styling */
.toggle-container {
    display: flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 20px;
}

.switch-label {
    font-size: 1.2rem;
    margin-right: 10px;
    margin-left: 10px;
    color: #333;
}

.switch {
    position: relative;
    display: inline-block;
    width: 60px;
    height: 30px;
}

.switch input {
    opacity: 0;
    width: 0;
    height: 0;
}

.slider {
    position: absolute;
    cursor: pointer;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: #ccc;
    transition: 0.4s;
    border-radius: 30px;
    height: 30px !important;
}

.slider:before {
    position: absolute;
    content: "";
    height: 24px;
    width: 24px;
    left: 3px;
    bottom: 3px;
    background-color: white;
    transition: 0.4s;
    border-radius: 50%;
}

input:checked+.slider {
    background-color: #f18931;
}

input:checked+.slider:before {
    transform: translateX(28px);
}
</style>
<div class="page-section ptb-90">
    <div class="container">
        <div class="header">
            <h1>Choose a Plan and <span class="highlight">SAVE THOUSANDS</span> on Brokerage</h1>
        </div>
        <!-- Toggle Switch for Rent/Sale Packages -->
        <?php if (empty($this->session->userdata('RentSale'))){?>
        <div class="toggle-container">
            <span class="switch-label">Rent Packages</span>
            <label class="switch">
                <input type="checkbox" id="packageToggle" onclick="togglePackages()">
                <span class="slider"></span>
            </label>
            <span class="switch-label">Sale Packages</span>
        </div>
        <?php }?>

        <div class="row" id="rentPackages">
            <?php $x = 1; foreach ($list_subscriptions as $mainList) { ?>
                <?php if ($mainList->purpose == 2 || $mainList->purpose == 3) {?>
                    <div class="subscription-card">
                        <h5><?php echo $mainList->name; ?></h5>
                        <p class="price"><span
                                class="original-price"><?php if ($mainList->oldPrice != 0) {?>₹<?php echo number_format($mainList->oldPrice, 2);}?></span>
                            ₹<label><?php echo number_format($mainList->price, 2)?></label></p>
                        <p>Get genuine house owner contacts matching your requirements</p>
                        <ul class="features">
                            <?php $array = explode(',', $mainList->subElements);
                                                                    foreach($array as $list){
                                                                        $details = $this->common_model->getdatabyid(array('id' => $list),'tblSubElements');?>
                            <li><i class="material-icons">check_circle</i><?php echo $details->name;?></li>
                            <?php }?>
                        </ul>
                        <p class="hide" id="showCoupon<?php echo $x; ?>"><input type="text"
                                oninput="myFunction(<?php echo $x; ?>)" id="couponEnter<?php echo $x; ?>"
                                placeholder="Enter your coupon" /></p>
                        <input type="hidden" id="amount<?php echo $x; ?>" value="<?php echo $mainList->price; ?>">
                        <input type="hidden" id="id<?php echo $x; ?>" value="<?php echo $mainList->id; ?>">
                        <input type="hidden" id="subscriptionUserID"
                            value="<?php echo @$this->session->userdata('user')['user_id']; ?>">
                        <input type="hidden" id="subscriptionPropertyId">

                        <div id="subscriptionMobile<?php echo $x; ?>" style="display:none">
                            <input type='text' id='subscriptionMobileEnter<?php echo $x; ?>' placeholder="Enter Valid Mobile"
                                maxlength="10" required name='subscriptionMobileEnter'>
                        </div>

                        <div id="subscriptionVerifyOTP<?php echo $x; ?>" style="display:none">
                            <input type='text' id='subscriptionMobileOTP<?php echo $x; ?>' maxlength="4"
                                placeholder="Enter Valid OTP" required name='subscriptionMobileOTP'>
                        </div>

                        <h6 style="color: green !important;" id="SuccessMessage<?php echo $x; ?>"></h6>
                        <button class="btn-subscribe"
                            onclick="GetSubscriptionDetails(<?php echo $mainList->id; ?>, <?php echo $this->session->userdata('PostID') ?>)">See
                            Details</button>
                    </div>
                <?php }?>
            <?php $x++; }?>
        </div>


        <div class="row" id="salePackages" <?php if ($this->session->userdata('RentSale') == "Rent"){?> style="display: none;" <?php }else if (empty($this->session->userdata('RentSale'))) {?> style="display: none;" <?php }?>>
            <?php $x = 1; foreach ($list_subscriptions as $mainList) { ?>
                <?php if ($mainList->purpose == 1 || $mainList->purpose == 3) {?>
                    <div class="subscription-card">
                        <h5><?php echo $mainList->name; ?></h5>
                        <p class="price"><span
                                class="original-price"><?php if ($mainList->oldPrice != 0) {?>₹<?php echo number_format($mainList->oldPrice, 2);}?></span>
                            ₹<label><?php echo number_format($mainList->price, 2)?></label></p>
                        <p>Get genuine house owner contacts matching your requirements</p>
                        <ul class="features">
                            <?php $array = explode(',', $mainList->subElements);
                                                                    foreach($array as $list){
                                                                        $details = $this->common_model->getdatabyid(array('id' => $list),'tblSubElements');?>
                            <li><i class="material-icons">check_circle</i><?php echo $details->name;?></li>
                            <?php }?>
                        </ul>
                        <p class="hide" id="showCoupon<?php echo $x; ?>"><input type="text"
                                oninput="myFunction(<?php echo $x; ?>)" id="couponEnter<?php echo $x; ?>"
                                placeholder="Enter your coupon" /></p>
                        <input type="hidden" id="amount<?php echo $x; ?>" value="<?php echo $mainList->price; ?>">
                        <input type="hidden" id="id<?php echo $x; ?>" value="<?php echo $mainList->id; ?>">
                        <input type="hidden" id="subscriptionUserID"
                            value="<?php echo @$this->session->userdata('user')['user_id']; ?>">
                        <input type="hidden" id="subscriptionPropertyId">

                        <div id="subscriptionMobile<?php echo $x; ?>" style="display:none">
                            <input type='text' id='subscriptionMobileEnter<?php echo $x; ?>' placeholder="Enter Valid Mobile"
                                maxlength="10" required name='subscriptionMobileEnter'>
                        </div>

                        <div id="subscriptionVerifyOTP<?php echo $x; ?>" style="display:none">
                            <input type='text' id='subscriptionMobileOTP<?php echo $x; ?>' maxlength="4"
                                placeholder="Enter Valid OTP" required name='subscriptionMobileOTP'>
                        </div>

                        <h6 style="color: green !important;" id="SuccessMessage<?php echo $x; ?>"></h6>
                        <button class="btn-subscribe"
                            onclick="GetSubscriptionDetails(<?php echo $mainList->id; ?>, <?php echo $this->session->userdata('PostID') ?>)">See
                            Details</button>
                    </div>
                <?php }?>
            <?php $x++; }?>
        </div>


        <div class="support">
            For assistance call us at: <a
                href="tel:+91<?php echo $frontpagedata->mobile1;?>">+91-<?php echo $frontpagedata->mobile1;?></a>
            <br>
            <!-- Plan Validity: MoneyBack & Relax (45 Days), Freedom & Basic (90 Days). <a href="#">T&C apply.</a> -->
        </div>
    </div>
</div>

<script>
function togglePackages() {
    const isChecked = document.getElementById('packageToggle').checked;
    document.getElementById('salePackages').style.display = isChecked ? 'flex' : 'none';
    document.getElementById('rentPackages').style.display = isChecked ? 'none' : 'flex';
}
</script>