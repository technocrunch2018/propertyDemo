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


<table width="100%">
  <tr>
    <td width="100%">
      <center>
      <h2 class="txt-lg" style="color: #ed6950;">Salary Slip</h2>
      <p style="padding:5px 0 0 0;"> <?php echo $month; ?> / <?php echo $year; ?> </p>
      </center>
    </td>
  </tr>  
</table>

<table width="100%">
  <tr>
    <td width="100%">
      <b>Email:</b>&nbsp;&nbsp;<span style="font-weight:400;color:#444;"><?php if(!empty($floormantra)){ echo $floormantra->email1; }?></span>
    </td>
  </tr>
  <tr>
    <td width="100%">
       <b>Contact No:</b>&nbsp;&nbsp;<span style="font-weight:400;color:#444;">+91 <?php if(!empty($floormantra)){ echo $floormantra->mobile1; }?></span>
    </td>
  </tr>

  <tr>
    <td width="100%">
      <b> Address:</b>&nbsp;&nbsp;<span style="font-weight:400;color:#444;"><?php if(!empty($floormantra)){ echo $floormantra->address1; }?>
    </td>
  </tr>  
</table>

<hr>



<table width="100%" cellpadding="5" style="text-align:left;border:1px solid #908e8e;border-bottom:0px solid #908e8e;border-collapse: collapse;">
  <tr style="text-align:left;">
    <th width="20%" style="text-align:left;border-bottom:1px solid #908e8e;border-right:1px solid #908e8e;">Name:</th>
    <td width="30%" style="text-align:left;border-bottom:1px solid #908e8e;border-right:1px solid #908e8e;"><?php if(!empty($admin)){ echo $admin->name; }?>  </td>

    <th width="20%" style="text-align:left;border-bottom:1px solid #908e8e;border-right:1px solid #908e8e;">PAN:</th>
    <td width="30%" style="text-align:left;border-bottom:1px solid #908e8e;border-right:1px solid #908e8e;"><?php if(!empty($admin)){ echo $admin->pan; }?></td>

  </tr>
   <tr>
      <th style="text-align:left;border-bottom:1px solid #908e8e;border-right:1px solid #908e8e;">Address:</th>
      <td style="text-align:left;border-bottom:1px solid #908e8e;border-right:1px solid #908e8e;"><?php if(!empty($admin)){ echo $admin->address; }?></td>

      <th style="text-align:left;border-bottom:1px solid #908e8e;border-right:1px solid #908e8e;">Aadhar:</th>
      <td style="text-align:left;border-bottom:1px solid #908e8e;border-right:1px solid #908e8e;"><?php if(!empty($admin)){ echo $admin->adhar_no; }?></td>
    </tr>
    
    <tr>
      <th style="text-align:left;border-bottom:1px solid #908e8e;border-right:1px solid #908e8e;">Designation:</th>
      <td style="text-align:left;border-bottom:1px solid #908e8e;border-right:1px solid #908e8e;"><?php if(!empty($admin)){ echo $admin->desognation; }?></td>

      <th style="text-align:left;border-bottom:1px solid #908e8e;border-right:1px solid #908e8e;">Department:</th>
      <td style="text-align:left;border-bottom:1px solid #908e8e;border-right:1px solid #908e8e;"><?php if(!empty($admin)){ echo $admin->department; }?></td>
    </tr>

   
</table>



<!-- <br> -->
<hr/>




<table width="100%" cellpadding="5" style="text-align:left;border:1px solid #908e8e;border-bottom:0px solid #908e8e;border-collapse: collapse;">
  <tr style="text-align:left;">
    <th width="20%" style="text-align:left;border-bottom:1px solid #908e8e;border-right:1px solid #908e8e;">Total Days:</th>
    <td width="30%" style="text-align:left;border-bottom:1px solid #908e8e;border-right:1px solid #908e8e;"><?php echo $total_days; ?></td>

    <th width="20%" style="text-align:left;border-bottom:1px solid #908e8e;border-right:1px solid #908e8e;">Holidays:</th>
    <td width="30%" style="text-align:left;border-bottom:1px solid #908e8e;border-right:1px solid #908e8e;"><?php echo $holiday; ?></td>

  </tr>
   <tr>
      <th style="text-align:left;border-bottom:1px solid #908e8e;border-right:1px solid #908e8e;">Leaves:</th>
      <td style="text-align:left;border-bottom:1px solid #908e8e;border-right:1px solid #908e8e;"><?php echo $leaves; ?></td>

      <th style="text-align:left;border-bottom:1px solid #908e8e;border-right:1px solid #908e8e;">Over Days:</th>
      <td style="text-align:left;border-bottom:1px solid #908e8e;border-right:1px solid #908e8e;"><?php echo $over_days; ?></td>
    </tr>
       
</table>


<!-- <br/> -->
<hr/>


<table width="100%" cellpadding="5" style="text-align:left;border:1px solid #908e8e;border-bottom:0px solid #908e8e;border-collapse: collapse;">
  <tr style="text-align:left;">
    <th width="20%" style="text-align:left;border-bottom:1px solid #908e8e;border-right:1px solid #908e8e;">Basic Pay:</th>
    <td width="30%" style="text-align:left;border-bottom:1px solid #908e8e;border-right:1px solid #908e8e;"><?php if(!empty($admin)){ echo $admin->sallery; }?></td>

    <th width="20%" style="text-align:left;border-bottom:1px solid #908e8e;border-right:1px solid #908e8e;">ESI:</th>
    <td width="30%" style="text-align:left;border-bottom:1px solid #908e8e;border-right:1px solid #908e8e;"><?php if(!empty($admin)){ echo $admin->esi; }?></td>

  </tr>
   <tr>
      <!--<th style="text-align:left;border-bottom:1px solid #908e8e;border-right:1px solid #908e8e;">Add Any:</th>
      <td style="text-align:left;border-bottom:1px solid #908e8e;border-right:1px solid #908e8e;"><?php echo $add_any; ?></td>-->
      <th style="text-align:left;border-bottom:1px solid #908e8e;border-right:1px solid #908e8e;">PT:</th>
      <td style="text-align:left;border-bottom:1px solid #908e8e;border-right:1px solid #908e8e;"><?php if(!empty($admin)){ echo $admin->p_tax; }?></td>

      <th style="text-align:left;border-bottom:1px solid #908e8e;border-right:1px solid #908e8e;">PF:</th>
      <td style="text-align:left;border-bottom:1px solid #908e8e;border-right:1px solid #908e8e;"><?php if(!empty($admin)){ echo $admin->pf; }?></td>
    </tr>


     <tr>
      <!--<th style="text-align:left;border-bottom:1px solid #908e8e;border-right:1px solid #908e8e;">Less Any:</th>
      <td style="text-align:left;border-bottom:1px solid #908e8e;border-right:1px solid #908e8e;"><?php echo $less_any; ?></td>-->
      
      <th style="text-align:left;border-bottom:1px solid #908e8e;border-right:1px solid #908e8e;">Income Tax:</th>
      <td style="text-align:left;border-bottom:1px solid #908e8e;border-right:1px solid #908e8e;"><?php echo $income_tax; ?></td>

      <th style="text-align:left;border-bottom:1px solid #908e8e;border-right:1px solid #908e8e;">Incentive:</th>
      <td style="text-align:left;border-bottom:1px solid #908e8e;border-right:1px solid #908e8e;"><?php echo $incentive; ?></td>
    </tr>

    <tr>
      <th style="text-align:left;border-bottom:1px solid #908e8e;border-right:1px solid #908e8e;">Bonus:</th>
      <td style="text-align:left;border-bottom:1px solid #908e8e;border-right:1px solid #908e8e;"><?php echo $bonus; ?></td>

      <th style="text-align:left;border-bottom:1px solid #908e8e;border-right:1px solid #908e8e;"></th>
      <td style="text-align:left;border-bottom:1px solid #908e8e;border-right:1px solid #908e8e;"></td>
    </tr>
       
</table>


<!-- <br/> -->
<hr/>

<table style="width:100%;">
    <tr>
      <th style="width:20%;background-color:#EFEFEF;color:#0089d0;">Advance:</th>
      <td style="width:13%;background-color:#efefef3b;"><?php echo number_format($admin->advance_amount); ?>/-</td>

      <th style="width:20%;background-color:#EFEFEF;color:#0089d0;">Repay Advance:</th>
      <td style="width:13%;background-color:#efefef3b;"><?php echo number_format($cutting_amount,2); ?>/-</td>


      <th style="width:20%;background-color:#EFEFEF;color:#0089d0;">Balance:</th>
      <td style="width:13%;background-color:#efefef3b;"><?php echo number_format($admin->balance_advance,2); ?>/-</td>


    </tr>
  </table>

  <!-- <table style="width:33%;margin:0 5px 0 5px;">
    <tr>
      
    </tr>
  </table>

  <table style="width:33%;">
    <tr>
      
    </tr>
  </table> -->


<hr/>



<table width="100%" cellpadding="5" style="text-align:left;border:0px solid #908e8e;border-bottom:0px solid #908e8e;border-collapse: collapse;">
  <tr style="text-align:left;">
    <th style="text-align:left;">Net Pay:</th>
    <td style="text-align:left;"><?php echo number_format($final_amount, 2)?></td>

    <th style="text-align:left;">Date:</th>
    <td style="text-align:left;"><?php echo $transaction_date; ?></td>

  </tr>
   <tr>
      <th style="text-align:left;">Account Holder:</th>
      <td style="text-align:left;"><?php if(!empty($admin)){ echo $admin->name; }?></td>

      <th style="text-align:left;">A/C No:</th>
      <td style="text-align:left;"><?php if(!empty($admin)){ echo $admin->account_no; }?></td>
    </tr>


     <tr>
      <th style="text-align:left;">Bank:</th>
      <td style="text-align:left;"><?php if(!empty($admin)){ echo $admin->bank_name; }?></td>

      <th style="text-align:left;">T.ID:</th>
      <td style="text-align:left;"><?php echo $transaction_id; ?></td>
    </tr>
</table>

