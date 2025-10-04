
    <style>
        h1 {
            text-align: center;
            font-size: 28px;
            color: #333;
            margin-bottom: 20px;
        }
        .package-details {
            border: 1px solid #ddd;
            padding: 20px;
            border-radius: 8px;
        }
        .package-header {
            text-align: center;
            color: #f18931;
            font-size: 24px;
            margin-bottom: 10px;
        }
        .price {
            text-align: center;
            color: #28a745;
            font-size: 22px;
            margin: 10px 0;
        }
        .price .original-price {
            text-decoration: line-through;
            color: #888;
            font-size: 18px;
        }
        .details {
            color: #555;
            text-align: center;
            margin-bottom: 20px;
            font-size: 16px;
        }
        .features {
            list-style: none;
            padding: 0;
            margin: 20px 0;
            text-align: center;
        }
        .features li {
            font-size: 16px;
            color: #333;
            padding: 8px 0;
        }
        .features li .icon {
            color: #28a745;
            margin-right: 10px;
        }
        .mobile-input {
            text-align: center;
            margin: 20px 0;
        }
        .mobile-input input[type="number"] {
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ddd;
            border-radius: 5px;
            width: 80%;
            max-width: 400px;
            margin-bottom: 20px;
        }
        .mobile-input button {
            margin-top: 10px;
            padding: 10px;
            background-color: #f18931;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .mobile-input button:hover {
            background-color: #d97b29;
        }
        .purchase-btn {
            background-color: #f18931;
            border: none;
            color: white;
            padding: 15px;
            font-size: 16px;
            font-weight: bold;
            border-radius: 5px;
            width: 100%;
            cursor: pointer;
            text-align: center;
            transition: background-color 0.3s ease;
        }
        .purchase-btn:hover {
            background-color: #d97b29;
        }

        <?php if(empty($this->session->userdata('user'))){?>
            .purchase-btn:hover {
            background-color: #c0c0c0;
        }
            <?php }?>
        .coupon-section {
            text-align: center;
            margin-top: 10px;
        }
        .coupon-section a {
            color: #f18931;
            text-decoration: none;
            cursor: pointer;
        }
        .coupon-input {
            display: none;
            margin-top: 20px;
            text-align: center;
        }
        .coupon-input input[type="text"] {
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ddd;
            border-radius: 5px;
            width: 80%;
            max-width: 400px;
        }
        .coupon-input button {
            margin-top: 10px;
            padding: 10px;
            background-color: #f18931;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .coupon-input button:hover {
            background-color: #d97b29;
        }
  
        /* OTP Popup */
        .otp-popup {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.6);
            justify-content: center;
            align-items: center;
            z-index: 9999;
        }
        .otp-popup-content {
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            width: 300px;
            text-align: center;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .otp-popup-content h2 {
            margin: 0 0 15px;
            font-size: 20px;
            color: #333;
        }
        .otp-popup-content input[type="text"] {
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ddd;
            border-radius: 5px;
            width: 100%;
            margin-bottom: 20px;
        }
        .otp-popup-content button {
            background-color: #f18931;
            color: white;
            border: none;
            padding: 10px;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            width: 100%;
        }
        .otp-popup-content button:hover {
            background-color: #d97b29;
        }
        .otp-popup-content .close {
            background-color: transparent;
            color: #333;
            border: none;
            font-size: 20px;
            cursor: pointer;
            position: absolute;
            top: 10px;
            right: 10px;
        }

        /* loading  */

    </style>
<div class="page-section ptb-90">
    <div class="container">
        <h1>Choose Your Plan</h1>
        <div class="package-details">
            <div class="package-header"><?php echo $subscriptionsDetails[0]->name; ?></div>
            <div class="price">
                <span class="original-price"> <?php if ($subscriptionsDetails[0]->oldPrice != 0) {?>₹<?php echo number_format($subscriptionsDetails[0]->oldPrice, 2); }?> ₹</span> <label><?php echo number_format($subscriptionsDetails[0]->price, 2)?></label>
            </div>
            <div class="details">
                Enjoy premium benefits, including access to verified house owners and personalized assistance.
            </div>
            <ul class="features">
                <?php $array = explode(',', $subscriptionsDetails[0]->subElements);
                foreach($array as $list){
                    $details = $this->common_model->getdatabyid(array('id' => $list),'tblSubElements');?>
                    <li><i class="material-icons">check_circle</i><?php echo $details->name;?></li>
                <?php }?>
            </ul>

            <?php if(empty($this->session->userdata('user'))){?>
            <div class="mobile-input">
                <input type="number" id = "SubMobile" placeholder="Enter your whatsapp mobile number" maxlength="10" required name='subscriptionMobileEnter'>
                <button id = "DisplyBlock" id = "DisplyBlock"  onclick = "OTPGenerator()">Generate OTP</button>
            </div>
            <?php }?>

            <?php if(!empty($this->session->userdata('user'))){?>
            <div class="coupon-section">
                <a onclick="showCouponInput()">Do you have a coupon?</a>
            </div>
            <?php }?>

            <div class="coupon-input" id="couponInput">
                <input type="text" id = "couponEnter" placeholder="Enter your coupon code">
                <input type = "hidden" id = "SubAmount" value = "<?php echo $subscriptionsDetails[0]->price; ?>">
                <input type = "hidden" id = "subscriptionPropertyId" value = "<?php echo $subscriptionPropertyId; ?>">
                <button id = "ApplyCouponButton" onclick = "ApplyCouponForSubscription()">Apply Coupon</button>
                <h6 style = "color: green !important;" id = "SuccessMessage"></h6>
                <h6 style = "color: red !important;" id = "ErrorMessage"></h6>
            </div>

            <h6 style = "color: red !important;" id = "ErrorMessageOTP"></h6>
            <h6 style = "color: green !important;" id = "SucessMessageOTPverify"></h6>
            <button class="purchase-btn" id = "FinalPurchaseButton" <?php if(empty($this->session->userdata('user'))){ echo "disabled";}?> onclick = "PaymentMakerSubDetails(<?php echo $subscriptionsDetails[0]->id; ?>)">Purchase Now</button>
        </div>
    </div>
    </div>

        <!-- OTP Popup -->
    <div class="otp-popup" id="otpPopup">
        <div class="otp-popup-content">
            <button class="close" onclick="closeOtpPopup()">×</button>
            <h6 style = "color: green !important;" id = "SuccessMessageOTP"></h6>
            <h2>Enter OTP</h2>
            <input type="text" maxlength="4" id = "SubMobileOTP" placeholder="Enter 4-digit OTP">
            <button onclick = "VerifyOTP()">Verify OTP</button>
        </div>
    </div>

    <script>
        var SITEURL = "<?php echo base_url() ?>";
        function showCouponInput() {
            var couponDiv = document.getElementById('couponInput');
            if (couponDiv.style.display === "none" || couponDiv.style.display === "") {
                couponDiv.style.display = "block";
            } else {
                couponDiv.style.display = "none";
            }
        }

        function openOtpPopup() {
            document.getElementById('otpPopup').style.display = "flex";
        }

        function closeOtpPopup() {
            document.getElementById('otpPopup').style.display = "none";
        }

        function OTPGenerator()
        {
            let SubMobile = document.getElementById("SubMobile").value;
            $.ajax({
                data:{SubMobile:SubMobile},
                url:'<?php echo base_url(); ?>home/subscriptionGenerateOTP',
                type:'post',
                success:function(data){
                    let json = $.parseJSON(data);
                    if (json != "mobile numbers not valid")
                    {
                        $('#SuccessMessageOTP').prepend("OTP Send sucessfull!");
                        openOtpPopup();
                    }
                    else 
                    {
                        $('#ErrorMessageOTP').prepend("Please Check Mobile Number");
                    }
                }
            });
        }

        function VerifyOTP()
        {
            let SubMobileOTP = document.getElementById("SubMobileOTP").value;
            $.ajax({
                data:{SubMobileOTP : SubMobileOTP},
                url:'<?php echo base_url(); ?>home/VerifyOTP',
                type:'post',
                success:function(data){
                    let json = $.parseJSON(data);
                    if (json == "OTP Verified!")
                    {
                        $('#SucessMessageOTPverify').prepend(json);
                        closeOtpPopup();
                        window.setTimeout( function() {
                            window.location.reload();
                        }, 1000);
                    }
                    else 
                    {
                        $('#ErrorMessageOTP').prepend(json);
                    }
                }
            });
        }
        function PaymentMakerSubDetails(product_id)
        {
            var SITEURL = "<?php echo base_url() ?>";
            let amount = document.getElementById("SubAmount").value;
            let subscriptionPropertyId = document.getElementById("subscriptionPropertyId").value;
            var options =
            {
                "key": "rzp_live_ECb3suWjQZnBcV",
                // "key" : "rzp_test_VDDJ9krsWKYFPH",
                "amount": (amount*100), // 2000 paise = INR 20
                "name": "Propertyfellows.in",
                "description": "Subscription Purchase",
                "image": SITEURL + "assets/front/img/main-logo.webp",
                "handler": function (response)
                {
                    $.ajax({
                    url: SITEURL + 'Razorpay/razorPaySuccess',
                    type: 'post',
                    dataType: 'json',
                    data: 
                    {
                        razorpay_payment_id: response.razorpay_payment_id, totalAmount : amount, product_id : product_id,
                    },
                    success: function (msg)
                    {
                        if (subscriptionPropertyId != "" && subscriptionPropertyId !== "undefined") {
                            window.location.href = SITEURL + 'home/get_details_on_whatsapp/' + subscriptionPropertyId;
                        }
                        else {
                            window.location.href = SITEURL + 'home/dashboard';

                        }
                    }
                    });
                },
                "theme": {"color": "#528FF0"}
            };
            var rzp1 = new Razorpay(options);
            rzp1.open();
            e.preventDefault(); 
        }
    </script>
