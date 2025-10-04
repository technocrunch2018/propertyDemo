<table width="100%">
  <tr>
    <td width="100%">
      <center>
      <img src="<?php echo base_url(); ?>/assets/admin/img/LOGO3.png" alt="Company Logo">
      </center>
    </td>
  </tr>  
</table>
<hr>

<table style="font-size: 14px;width: 100%;" cellpadding="2" cellspacing="2" >
  <tbody>
    <tr>
      <td width="15%"><b>Invoice No:&nbsp;&nbsp;</b></td>
      <td width="45%"><span style="font-weight:400;color:#444;"><?php echo str_replace('DEAL','INV', $deal->deal_id); ?></span></td>
      <td width="20%"><b>Date:</b></td>
      <td width="20%"><span style="font-weight:400;color:#444;"><?php echo date('d, m Y'); ?></span></td>
    </tr>
    
    <tr>
      <td><b>Name:</b></td>
      <td><span style="font-weight:400;color:#444;"><?php if(!empty($party)){ echo $party->name; }?></span></td>
      <td><b>Deal Id:</b></td>
      <td><span style="font-weight:400;color:#444;"><?php echo $deal->deal_id; ?></span></td>
    </tr>
    <tr>
      <td><b>Address:</b></td>
      <td><span style="font-weight:400;color:#444;"><?php if(!empty($party)){ if($deal_type == 'Client'){ echo $party->city.', '.$party->state; }else{ echo $party->address;} } ?></span></td>
    </tr>
  </tbody>
</table>

<br>
<br>


<table style="font-size: 14px;width: 100%;" cellpadding="2" cellspacing="2" >
  <tbody>
    <tr>
      <td width="15%"><b>State:&nbsp;&nbsp;</b></td>
      <td width="45%"><span style="font-weight:400;color:#444;"><?php if(!empty($party)){ echo $party->state; }?></span></td>
      <td width="20%"><b>City:</b></td>
      <td width="20%"><span style="font-weight:400;color:#444;"><?php if(!empty($party)){ echo $party->city; }?></span></td>
    </tr>
    
    <tr>
      <td><b>Location:</b></td>
      <td><span style="font-weight:400;color:#444;"><?php if(!empty($party)){ echo $party->location; }?></span></td>
      <td><b>ZIP Code:</b></td>
      <td><span style="font-weight:400;color:#444;"><?php if(!empty($party)){ if($deal_type != 'Client'){ echo $party->pincode; } }?></span></td>
    </tr>
    <tr>
      <td><b>User:</b></td>
      <td><span style="font-weight:400;color:#444;"><?php if(!empty($party)){ echo $party->user_type; }?></span></td>
      <td><b>Property/Client Id:</b></td>
      <td><span style="font-weight:400;color:#444;"><?php if(!empty($party)){ echo $party->lead_id; }?></span></td>
    </tr>

    <tr>
      <td><b>Email:</b></td>
      <td><span style="font-weight:400;color:#444;"><?php if(!empty($party)){ echo $party->email; }?></span></td>
      <td><b>User Id:</b></td>
      <td><?php if(!empty($party)){ echo $party->lead_id; }?></td>
    </tr>


    <tr>
      <td><b>PAN:</b></td>
      <td><span style="font-weight:400;color:#444;">DEWPA4978Z</span></td>
      <td><b>TAN:</b></td>
      <td><span style="font-weight:400;color:#444;">NA</span></td>
    </tr>

    <tr>
      <td><b>GST NO:</b></td>
      <td><span style="font-weight:400;color:#444;">DEWPA4978Z</span></td>
      <td></td>
      <td></td>
    </tr>
  </tbody>
</table>

<hr>

<table cellpadding="5" style="width:100%;border:1px solid #908e8e;border-bottom:0px solid #908e8e;border-collapse: collapse;">
              <thead>    
                 <tr>
      <th style="width:28%;text-align: left;font-size: 14px;border-bottom:1px solid #908e8e;border-right:1px solid #908e8e;">Services</th>
      <th style="width:15%;text-align: left;font-size: 14px;border-bottom:1px solid #908e8e;border-right:1px solid #908e8e;">State</th>
      <th style="width:15%;text-align: left;font-size: 14px;border-bottom:1px solid #908e8e;border-right:1px solid #908e8e;">City</th>
      <th style="width:15%;text-align: left;font-size: 14px;border-bottom:1px solid #908e8e;border-right:1px solid #908e8e;">Location</th>
      <th style="width:12%;text-align: left;font-size: 14px;border-bottom:1px solid #908e8e;border-right:1px solid #908e8e;">Price</th>
      <th style="width:15%;text-align: left;font-size: 14px;border-bottom:1px solid #908e8e;border-right:1px solid #908e8e;">Brokerage</th>
    </tr>
              </thead>
              <?php $totalPrice = 0; ?>
              <?php $totalBrokerage = 0; ?>
              <?php if(!empty($property)){ ?>
                <tr>
                  <td style="border-bottom:1px solid #908e8e;border-right:1px solid #908e8e;"><?php echo $property->res_com." ".$property->residential." (".($property->rent_sell == 'Sell' ? 'Sale)' : 'Rent)' ) ?></td>
                  <td style="border-bottom:1px solid #908e8e;border-right:1px solid #908e8e;"><?php echo $property->state; ?></td>
                  <td style="border-bottom:1px solid #908e8e;border-right:1px solid #908e8e;"><?php echo $property->city; ?></td>
                  <td style="border-bottom:1px solid #908e8e;border-right:1px solid #908e8e;"><?php echo $property->location; ?></td>
                  <td style="border-bottom:1px solid #908e8e;border-right:1px solid #908e8e;"><?php if($deal->rent_sell == 'Sell'){ echo $price = $deal->amount;}else{ echo $price = $deal->rent; }; ?></td>
                  <td style="border-bottom:1px solid #908e8e;border-right:1px solid #908e8e;"><?php if($deal_type == 'Client'){ echo $brokerage = $deal->commission1;}else{ echo $brokerage = $deal->commission; }; ?></td>
                </tr>
                <?php $totalPrice += $price; ?>
                <?php $totalBrokerage += $brokerage; ?>
              <?php } ?>
                <tr>
                  <td style="border-right:1px solid #908e8e;"><strong>Total</strong></td>
                  <td style="border-right:1px solid #908e8e;"></td>
                  <td style="border-right:1px solid #908e8e;"></td>
                  <td style="border-right:1px solid #908e8e;"></td>
                  <td style="border-right:1px solid #908e8e;"><?php echo $totalPrice; ?></td>
                  <td style="border-right:1px solid #908e8e;"><?php echo $totalBrokerage; ?></td>
                </tr>
            </table>


<table style="width:100%;margin-bottom:10px;border:1px solid #908e8e">
          <tr>
            <th style="width:28%;border-right:1px solid #908e8e;border-top:0px solid #908e8e;text-align: left;">TDS</th>
            <td style="border-top:0px solid #908e8e;text-align: left;"><?php echo number_format($payment_details->deal_tds,2); ?></td>
          </tr>
          <tr>
            <th style="width:28%;border-right:1px solid #908e8e;border-top:1px solid #908e8e;text-align: left;">GST %</th>
            <td style="border-top:1px solid #908e8e;text-align: left;"><?php echo number_format($payment_details->deal_gst,2); ?></td>
          </tr>
          <tr>
            <th style="width:28%;border-right:1px solid #908e8e;border-top:1px solid #908e8e;text-align: left;">SGST %</th>
            <td style="border-top:1px solid #908e8e;text-align: left;"><?php echo number_format($payment_details->deal_sgst,2); ?></td>
          </tr>
          <tr>
            <th style="width:28%;border-right:1px solid #908e8e;border-top:1px solid #908e8e;text-align: left;">CGST %</th>
            <td style="border-top:1px solid #908e8e;text-align: left;"><?php echo number_format($payment_details->deal_cgst,2); ?></td>
          </tr>
        </table>





<!-- <table style="font-size: 14px;width: 100%;" cellpadding="2" cellspacing="2" border="0" >
  <thead>
    <tr>
      <th style="width:28%">Services</th>
      <th style="width:15%">State</th>
      <th style="width:15%">City</th>
      <th style="width:15%">Location</th>
      <th style="width:15%">Price</th>
      <th style="width:12%">Brokerage</th>
    </tr>
  </thead>

  <tbody>
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
      <th>Total</th>
      <td></td>
      <td></td>
      <td></td>
      <td style="text-align:right;"><?php echo $totalPrice; ?></td>
      <td style="text-align:right;"><?php echo $totalBrokerage; ?></td>
    </tr>

    <tr>
      <th>TDS</th>
      <td colspan="5" style="text-align:left;"><?php echo number_format($payment_details->deal_tds,2); ?></td>
    </tr>

    <tr>
      <th>GST %</th>
      <td colspan="5" style="text-align:left;"><?php echo number_format($payment_details->deal_gst,2); ?></td>
    </tr>

    <tr>
      <th>SGST %</th>
      <td colspan="5" style="text-align:left;"><?php echo number_format($payment_details->deal_sgst,2); ?></td>
    </tr>

    <tr>
      <th>CGST %  </th>
      <td colspan="5" style="text-align:left;"><?php echo number_format($payment_details->deal_cgst,2); ?></td>
    </tr>


  </tbody>
</table> -->
<hr>




<?php $net_amount = (($totalBrokerage+$payment_details->deal_gst)-$payment_details->deal_tds); ?>

<table  style="font-size: 14px;width: 100%;" cellpadding="2" cellspacing="2" border="0" >
  <tr>
    <td width="100%"><b>Net Amount:&nbsp;&nbsp;<?php echo number_format($net_amount,2); ?>/-</b></td>
  </tr>

  <tr>
    <td width="100%"><b>In Word:&nbsp;&nbsp;</b><?php echo number2word($net_amount); ?></td>
  </tr>
</table>


<table  style="font-size: 14px;width: 100%;" cellpadding="2" cellspacing="2" border="0" >
  
  <tr>
    <td width="50%"><b>Payment Date:&nbsp;&nbsp;</b><?php if(!empty($deal_payment_details)){ echo date('d M Y', strtotime($deal_payment_details->date)); } ?></td>
    <td width="50%"><b>Mode of Payment:&nbsp;&nbsp;</b><?php if(!empty($deal_payment_details)){ echo $deal_payment_details->mode; }?></td>
  </tr>

  <tr>
    <td width="50%"><b>Bank:&nbsp;&nbsp;</b><?php if(!empty($deal_payment_details)){ echo $deal_payment_details->mode; }?></td>
    <td width="50%"><b>Transaction Id/Cheque No:&nbsp;&nbsp;</b><?php if(!empty($deal_payment_details)){ echo $deal_payment_details->payment_ref; }?></td>
  </tr>


  

</table>


<br/>


<table  style="font-size: 14px;width: 100%;" cellpadding="2" cellspacing="2" border="0" >
  <tr>
    <td width="50%"><b style="font-weight:400;color:#ed6950;font-size:14px;">Floormantra.com</b></td>
    <td width="50%"><b style="color:#0089d0;">HIRA/RERA NO:&nbsp;&nbsp;</b>xxxxxxxxxx</td>
  </tr>



  <tr>
    <td colspan="2"><p style="font-weight:400;color:#ed6950;font-size:14px;margin:10px 0;"><?php echo $floormantra->address1; ?></p></td>
  </tr>

  <tr>
    <td width="50%"><b class="txt-md" style="color:#0089d0;">PAN:&nbsp;&nbsp;<span style="font-weight:400;color:#444;">xxxxxxxxxx</span></b></td>
    <td width="50%"><b style="color:#0089d0;">TAN:&nbsp;&nbsp;</b><span style="font-weight:400;color:#444;">xxxxxxxxxx</span></td>
  </tr>

  <tr>
    <td width="50%"><b style="color:#0089d0;">GST NO:&nbsp;&nbsp;</b><span style="font-weight:400;color:#444;">xxxxxxxxxx</span></td>
    <td width="50%"><b style="color:#0089d0;">Website:&nbsp;&nbsp;</b><span style="font-weight:400;color:#444;">www.floormnatra.com</span></td>
  </tr>
  <tr>
    <td width="50%"><b  style="color:#0089d0;">Contact:&nbsp;&nbsp;</b>+<span style="font-weight:400;color:#444;">+<?php echo $floormantra->mobile1; ?></span></td>
    <td width="50%"><b style="color:#0089d0;">Email:&nbsp;&nbsp;</b><span style="font-weight:400;color:#444;"><?php echo $floormantra->email1; ?></span></td>
  </tr>
</table>


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
