<div id="invoiceholder" style="width:100%;">

    <div id="headerimage"></div>
    <div id="invoice" class="effect2">
  
      <div id="invoice-top">
        <div class="info">
          <img src="<?php echo base_url(); ?>/assets/front/img/main-logo.webp" alt="Company Logo">
        </div>
      </div>
      <!--End InvoiceTop-->
  
      <div id="invoice-mid" style="width:100%;">
        <div id="project">  
          <div class="row" style="display: inline-flex; width:100%;">
            <div class="col-lg-6" style="width:50%;margin-right:10px;">
              <h2 class="txt-md">Invoice No:&nbsp;&nbsp;<span style="font-weight:400;color:#444;"><?php echo str_replace('DEAL','INV', $deal->deal_id); ?></span></h2>
            </div>
            <div class="col-lg-6" style="width:50%;margin-left:10px;text-align:right;">
              <h2 class="txt-md">Date:&nbsp;&nbsp;<span style="font-weight:400;color:#444;"><?php echo date('d, m Y'); ?></span></h2>
            </div>
          </div>
          <div class="row" style="display:inline-flex; width:100%;">
              <div class="col-lg-6" style="width:50%;margin-right:10px;text-align:left;">
                <h2 class="txt-md">Name:&nbsp;&nbsp;<span style="font-weight:400;color:#444;"><?php if(!empty($party)){ echo $party->name; }?></span></h2>
              </div>
              <div class="col-lg-6" style="width:50%;margin-left:10px;text-align:right;">
                <h2 class="txt-md">Deal Id:&nbsp;&nbsp;<span style="font-weight:400;color:#444;"><?php echo $deal->deal_id; ?></span></h2>
              </div>
          </div>
          <div class="col-lg-12" style="width:50%;margin-right:10px;text-align:left;margin:0 0 20px 0;">
            <h2 class="txt-md">Address:&nbsp;&nbsp;<span style="font-weight:400;color:#444;"><?php if(!empty($party)){ if($deal_type == 'Client'){ echo $party->city.', '.$party->state; }else{ echo $party->address;} } ?></h2>
          </div>   

          <div class="row" style="display:inline-flex; width:100%;">
            <div class="col-lg-6" style="width:50%;margin-right:10px;">
              <h2 class="txt-md">State:&nbsp;&nbsp;<span style="font-weight:400;color:#444;"><?php if(!empty($party)){ echo $party->state; }?></span></h2>
            </div>
            <div class="col-lg-6" style="width:50%;margin-left:10px;text-align:right;">
              <h2 class="txt-md">City:&nbsp;&nbsp;<span style="font-weight:400;color:#444;"><?php if(!empty($party)){ echo $party->city; }?></span></h2>
            </div>
          </div>
          <div class="row" style="display:inline-flex; width:100%;">
            <div class="col-lg-6" style="width:50%;margin-right:10px;">
              <h2 class="txt-md">Location:&nbsp;&nbsp;<span style="font-weight:400;color:#444;"><?php if(!empty($party)){ echo $party->location; }?></span></h2>
            </div>
            <div class="col-lg-6" style="width:50%;margin-left:10px;text-align:right;">
              <h2 class="txt-md">ZIP Code:&nbsp;&nbsp;<span style="font-weight:400;color:#444;"><?php if(!empty($party)){ if($deal_type != 'Client'){ echo $party->pincode; } }?></span></h2>
            </div>
          </div>

          <div class="row" style="display:inline-flex; width:100%;">
          <div class="col-lg-6" style="width:50%;margin-right:10px;text-align:left;">
            <h2 class="txt-md">User:&nbsp;&nbsp;<span style="font-weight:400;color:#444;"><?php if(!empty($party)){ echo $party->user_type; }?></span></h2>
          </div>
          <div class="col-lg-6" style="width:50%;margin-left:10px;text-align:right;">
            <h2 class="txt-md">Property/Client Id:&nbsp;&nbsp;<span style="font-weight:400;color:#444;"><?php if(!empty($party)){ echo $party->lead_id; }?></span></h2>
          </div>
          </div>

          <div class="col-lg-6" style="width:50%;margin-right:10px;text-align:left;">
            <h2 class="txt-md">Mobile:&nbsp;&nbsp;<span style="font-weight:400;color:#444;">+<?php if(!empty($party)){ echo $party->mobile; }?></span></h2>
          </div>
          <div class="col-lg-6" style="width:50%;margin-right:10px;text-align:left;">
            <h2 class="txt-md">Email:&nbsp;&nbsp;<span style="font-weight:400;color:#444;"><?php if(!empty($party)){ echo $party->email; }?></span></h2>
          </div>
          <div class="col-lg-6" style="width:50%;margin-right:10px;text-align:left;">
            <h2 class="txt-md">User Id:&nbsp;&nbsp;<span style="font-weight:400;color:#444;"></span></h2>
          </div>
          <div class="row" style="display:inline-flex; width:100%;">
            <div class="col-lg-6" style="width:50%;margin-right:10px;">
              <h2 class="txt-md">PAN:&nbsp;&nbsp;<span style="font-weight:400;color:#444;">DEWPA4978Z</span></h2>
            </div>
            <div class="col-lg-6" style="width:50%;margin-left:10px;text-align:right;">
              <h2 class="txt-md">TAN:&nbsp;&nbsp;<span style="font-weight:400;color:#444;">NA</span></h2>
            </div>
          </div>
          <div class="col-lg-6" style="width:100%;">
            <h2 class="txt-md">GST NO:&nbsp;&nbsp;<span style="font-weight:400;color:#444;">DEWPA4978Z</span></h2>
          </div>
        </div>
      </div>
      <!--End Invoice Mid-->
  
      <div id="invoice-bot">

        <div id="table">
          <div class="row" style="display: inline-flex; width:100%;">

            <table style="width:100%;">
              <thead>    
                <tr>
                  <th>Services</th>
                  <th>State</th>
                  <th>City</th>
                  <th>Location</th>
                  <th>Price</th>
                  <th>Brokerage</th>
                </tr>
              </thead>
              <?php $totalPrice = 0; ?>
              <?php $totalBrokerage = 0; ?>
              <?php if(!empty($property)){ ?>
                <tr>
                  <td><?php echo $property->res_com." ".$property->residential." (".($property->rent_sell == 'Sell' ? 'Sale)' : 'Rent)' ) ?></td>
                  <td><?php echo $property->state; ?></td>
                  <td><?php echo $property->city; ?></td>
                  <td><?php echo $property->location; ?></td>
                  <td><?php if($deal->rent_sell == 'Sell'){ echo $price = $deal->amount;}else{ echo $price = $deal->rent; }; ?></td>
                  <td><?php if($deal_type == 'Client'){ echo $brokerage = $deal->commission1;}else{ echo $brokerage = $deal->commission; }; ?></td>
                </tr>
                <?php $totalPrice += $price; ?>
                <?php $totalBrokerage += $brokerage; ?>
              <?php } ?>
                <tr>
                  <td><strong>Total</strong></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td><?php echo $totalPrice; ?></td>
                  <td><?php echo $totalBrokerage; ?></td>
                </tr>
            </table>

          </div>
        </div>
        <!--End Table-->

        <table style="width:100%;margin-bottom:10px;">
          <tr>
            <th style="border-right:1px solid #FFF;border-top:1px solid #FFF;">TDS</th>
            <td style="border-top:1px solid #FFF;"><?php echo number_format($payment_details->deal_tds,2); ?></td>
          </tr>
          <tr>
            <th style="border-right:1px solid #FFF;border-top:1px solid #FFF;">GST %</th>
            <td style="border-top:1px solid #FFF;"><?php echo number_format($payment_details->deal_gst,2); ?></td>
          </tr>
          <tr>
            <th style="border-right:1px solid #FFF;border-top:1px solid #FFF;">SGST %</th>
            <td style="border-top:1px solid #FFF;"><?php echo number_format($payment_details->deal_sgst,2); ?></td>
          </tr>
          <tr>
            <th style="border-right:1px solid #FFF;border-top:1px solid #FFF;">CGST %</th>
            <td style="border-top:1px solid #FFF;"><?php echo number_format($payment_details->deal_cgst,2); ?></td>
          </tr>
        </table>
        <?php $net_amount = (($totalBrokerage+$payment_details->deal_gst)-$payment_details->deal_tds); ?>
        <h2 class="txt-md" style="color:#000;margin-bottom:7px;">Net Amount:&nbsp;&nbsp;<span style="font-weight:400;color:#444;"><?php echo number_format($net_amount,2); ?>/-</span></h2>
        <h2 class="txt-md" style="color:#000;">In Word:&nbsp;&nbsp;<span style="font-weight:400;color:#444;"><?php echo number2word($net_amount); ?></span></h2>

        <div id="invoice-mid" style="padding:0;margin-top:20px;">
          <div class="row" style="display: inline-flex;width:85%;margin-bottom:7px;">
            <div class="col-lg-6" style="width:50%;margin-right:10px;text-align:left;">
              <h2 class="txt-md">Payment Date:&nbsp;&nbsp;<span style="font-weight:400;color:#444;"><?php if(!empty($deal_payment_details)){ echo date('d M Y', strtotime($deal_payment_details->date)); } ?></span></h2>
            </div>
            <div class="col-lg-6" style="width:50%;margin-left:10px;text-align:left;">
              <h2 class="txt-md">Mode of Payment:&nbsp;&nbsp;<span style="font-weight:400;color:#444;"><?php if(!empty($deal_payment_details)){ echo $deal_payment_details->mode; }?></span></h2>
            </div>
          </div>
          <div class="row" style="display: inline-flex; width:85%;">
            <div class="col-lg-6" style="width:50%;margin-right:10px;text-align:left;">
              <h2 class="txt-md">Bank:&nbsp;&nbsp;<span style="font-weight:400;color:#444;"><?php if(!empty($deal_payment_details)){ echo $deal_payment_details->mode; }?></span></h2>
            </div>
            <div class="col-lg-6" style="width:50%;margin-left:10px;text-align:left;">
              <h2 class="txt-md">Transaction Id/Cheque No:&nbsp;&nbsp;<span style="font-weight:400;color:#444;"><?php if(!empty($deal_payment_details)){ echo $deal_payment_details->payment_ref; }?></span></h2>
            </div>
          </div>
        </div>

        <footer>
          <div id="legalcopy" style="padding:10px 0px">
            <div class="row" style="display: inline-flex; width:85%;">
                <div class="col-lg-6" style="width:50%;margin-right:10px;text-align:left;">
                    <p style="font-weight:400;color:#ed6950;font-size:14px;margin-bottom:7px;">Floormantra.com</p>
                </div>
                <div class="col-lg-6" style="width:50%;margin-left:10px;text-align:left;">
                    <h2 class="txt-md" style="color:#0089d0;">HIRA/RERA NO:&nbsp;&nbsp;<span style="font-weight:400;color:#444;">xxxxxxxxxx</span></h2>
                </div>
            </div>
            <p style="font-weight:400;color:#ed6950;font-size:14px;margin:10px 0;"><?php echo $floormantra->address1; ?></p>
            <div class="row" style="display: inline-flex; width:85%;">
              <div class="col-lg-6" style="width:50%;margin-right:10px;text-align:left;">
                <h2 class="txt-md" style="color:#0089d0;">PAN:&nbsp;&nbsp;<span style="font-weight:400;color:#444;">xxxxxxxxxx</span></h2>
              </div>
              <div class="col-lg-6" style="width:50%;margin-left:10px;text-align:left;">
                <h2 class="txt-md" style="color:#0089d0;">TAN:&nbsp;&nbsp;<span style="font-weight:400;color:#444;">xxxxxxxxxx</span></h2>
              </div>
            </div>
            <div class="row" style="display: inline-flex; width:85%;">
              <div class="col-lg-6" style="width:50%;margin-right:10px;text-align:left;">
                <h2 class="txt-md" style="color:#0089d0;">GST NO:&nbsp;&nbsp;<span style="font-weight:400;color:#444;">xxxxxxxxxx</span></h2>
              </div>
              <div class="col-lg-6" style="width:50%;margin-left:10px;text-align:left;">
                <h2 class="txt-md" style="color:#0089d0;">Website:&nbsp;&nbsp;<span style="font-weight:400;color:#444;">www.floormnatra.com</span></h2>
              </div>
            </div>

            <div class="row" style="display: inline-flex; width:85%;">
              <div class="col-lg-6" style="width:50%;margin-right:10px;text-align:left;">
                <h2 class="txt-md" style="color:#0089d0;">Contact:&nbsp;&nbsp;<span style="font-weight:400;color:#444;">+<?php echo $floormantra->mobile1; ?></span></h2>
              </div>
              <div class="col-lg-6" style="width:50%;margin-left:10px;text-align:left;">
                <h2 class="txt-md" style="color:#0089d0;">Email:&nbsp;&nbsp;<span style="font-weight:400;color:#444;"><?php echo $floormantra->email1; ?></span></h2>
              </div>
            </div>
          </div>
        </footer>

        
  
      </div>
      <!--End InvoiceBot-->

    </div>
    <!--End Invoice-->
  </div><!-- End Invoice Holder-->
<style type="text/css">
   * {
  margin: 0;
  box-sizing: border-box;
}
body {
  background: #EFEFEF;
  font-family: "Roboto", sans-serif;
}
::selection {
  background: #ed6950;
  color: #fff;
}
::moz-selection {
  background: #ed6950;
  color: #fff;
}

.txt-lg {
    font-size: 28px;
    color: #ed6950;
}

.txt-md {
    font-size: 14px;
    line-height: 22px;
}

#invoiceholder {
  width: 100%;
  height: 100%;
  padding-top: 50px;
}
#headerimage {
  z-index: -1;
  position: relative;
  top: -50px;
  height: 350px;
  background-color: #dddddd;
  overflow: hidden;
  background-attachment: fixed;
  background-size: 1920px 80%;
  background-position: 50% -90%;
}
#invoice {
  position: relative;
  top: -290px;
  margin: 0 auto;
  width: 60%;
  background: #fff;
}

[id*="invoice-"] {
  /* Targets all id with 'col-' */
  border-bottom: 1px solid #eee;
  padding: 30px;
}

#invoice-top {
  min-height: 120px;
}
.info {
  display: block;
  text-align: center;
}
#invoice-top .info img {
  position: relative;
  width: 125px;
  margin-left: auto;
  margin-right: auto;
}
#invoice-mid {
  min-height: 120px;
}
#invoice-bot {
  min-height: 250px;
}
.service {
  border: 1px solid #eee;
}
.item {
  width: 50%;
}
.itemtext {
  font-size: 0.9em;
}

form {
  float: right;
  margin-top: 0px;
  text-align: right;
}

.effect2 {
  position: relative;
}
.effect2:before,
.effect2:after {
  z-index: -1;
  position: absolute;
  content: "";
  bottom: 15px;
  left: 10px;
  width: 50%;
  top: 80%;
  max-width: 300px;
  background: #777;
  -webkit-box-shadow: 0 15px 10px #777;
  -moz-box-shadow: 0 15px 10px #777;
  box-shadow: 0 15px 10px #777;
  -webkit-transform: rotate(-3deg);
  -moz-transform: rotate(-3deg);
  -o-transform: rotate(-3deg);
  -ms-transform: rotate(-3deg);
  transform: rotate(-3deg);
}
.effect2:after {
  -webkit-transform: rotate(3deg);
  -moz-transform: rotate(3deg);
  -o-transform: rotate(3deg);
  -ms-transform: rotate(3deg);
  transform: rotate(3deg);
  right: 10px;
  left: auto;
}

table, th, td {
  border: 1px solid #EFEFEF;
  border-collapse: collapse;
}
th, td {
  padding: 5px 15px 5px 15px;
  text-align: left;
  font-size: 14px;
}

th {
  width: 35%;
  color: #444;
}
td {
  width: 65%;
  color: #555;
}

.col-left {
    float: left;
}
.col-right {
    float: right;
}

/*----
@media only screen and (min-width: 768px) {
  #invoice {
     width: 90%;
  }
  footer {text-align: center;}
}
------*/

</style>

<?php 

function number2word($inputNo){
    //return $inputNo;
    $number = $inputNo;
    $num = $number;
    $no = round($number);
    $point = round($number - $no, 2) * 100;
    $point = ($point < 0) ? (100 + $point) : $point;
    $hundred = null;
    $digits_1 = strlen($no);
    $i = 0;
    $str = array();
    $words = array('0' => '', '1' => 'One', '2' => 'Two',
      '3' => 'Three', '4' => 'Four', '5' => 'Five', '6' => 'Six',
      '7' => 'Seven', '8' => 'Eight', '9' => 'Nine',
      '10' => 'Ten', '11' => 'Eleven', '12' => 'Twelve',
      '13' => 'Thirteen', '14' => 'Fourteen',
      '15' => 'Fifteen', '16' => 'Sixteen', '17' => 'Seventeen',
      '18' => 'Eighteen', '19' =>'Nineteen', '20' => 'Twenty',
      '30' => 'Thirty', '40' => 'Forty', '50' => 'Fifty',
      '60' => 'Sixty', '70' => 'Seventy',
      '80' => 'Eighty', '90' => 'Ninety');
    $digits = array('', 'Hundred', 'Thousand', 'Lakh', 'Crore');
    while ($i < $digits_1) {
      $divider = ($i == 2) ? 10 : 100;
      $number = floor($num % $divider);
      $num = floor($num / $divider);
      $i += ($divider == 10) ? 1 : 2;
      if ($number) {
        $plural = (($counter = count($str)) && $number > 9) ? 's' : null;
        $hundred = ($counter == 1 && $str[0]) ? ' and ' : null;
        $str [] = ($number < 21) ? $words[$number] .
        " " . $digits[$counter] . $plural . " " . $hundred
        :
        $words[floor($number / 10) * 10]
        . " " . $words[$number % 10] . " "
        . $digits[$counter] . $plural . " " . $hundred;
      } else $str[] = null;
    }
    $str = array_reverse($str);
    $result = implode('', $str);
    $points = ($point) ?
    " " . $words[floor($point / 10)*10] . " " . 
    $words[$point = $point % 10] : '';
    return $result . "Rupees ONLY";
  }

?>
