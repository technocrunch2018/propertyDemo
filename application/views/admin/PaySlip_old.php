<!--<style>
  <?php include(base_url().'assets/admin/css/salarySlip.css');?>
</style>-->
<div id="invoiceholder">

    <div id="headerimage"></div>
    <div id="invoice" class="effect2">
  
      <div id="invoice-top">
        <img src="black-logo.webp" alt="Company Logo">
        <div class="info">
          <h2 class="txt-lg">Salary Slip</h2>
          <p style="padding:5px 0 0 0;"> <?php echo $month; ?> / <?php echo $year; ?> </p>
        </div>
      </div>
      <!--End InvoiceTop-->
  
      <div id="invoice-mid">
        <div id="project">        
          <h2 class="txt-md">Email:&nbsp;&nbsp;<span style="font-weight:400;color:#444;"><?php if(!empty($floormantra)){ echo $floormantra->email1; }?></span></h2>
          <h2 class="txt-md">Contact No:&nbsp;&nbsp;<span style="font-weight:400;color:#444;">+91 <?php if(!empty($floormantra)){ echo $floormantra->mobile1; }?></span></h2>
          <h2 class="txt-md">Address:&nbsp;&nbsp;<span style="font-weight:400;color:#444;"><?php if(!empty($floormantra)){ echo $floormantra->address1; }?></h2>
        </div>
      </div>
      <!--End Invoice Mid-->
  
      <div id="invoice-bot">

        <div id="table">
          <div class="row" style="display: inline-flex; width:100%;">

            <table style="width:50%;margin-right:10px;">
              <tr>
                <th>Name:</th>
                <td><?php if(!empty($admin)){ echo $admin->name; }?>  </td>
              </tr>
              <tr>
                <th>Address:</th>
                <td><?php if(!empty($admin)){ echo $admin->address; }?></td>
              </tr>
            </table>

            <table style="width:50%;margin-left:10px;">
              <tr>
                <th>PAN:</th>
                <td><?php if(!empty($admin)){ echo $admin->pan; }?></td>
              </tr>
              <tr>
                <th>Aadhar:</th>
                <td><?php if(!empty($admin)){ echo $admin->adhar_no; }?></td>
              </tr>
              <tr>
                <th>Designation:</th>
                <td><?php if(!empty($admin)){ echo $admin->desognation; }?></td>
              </tr>
              <tr>
                <th>Department:</th>
                <td><?php if(!empty($admin)){ echo $admin->department; }?></td>
              </tr>
            </table>

          </div>
        </div>
        <!--End Table-->


        <hr style="margin:20px 0;opacity: 0.2;">

        <!-- <div id="table">
          <div class="row" style="display: inline-flex; width:100%;">

            <table style="width:50%;margin-right:10px;">
              <tr>
                <th>Total Days:</th>
                <td>Nabil Ansari</td>
              </tr>
              <tr>
                <th>Allowed Leave:</th>
                <td>Pune, Maharshtra</td>
              </tr>
              <tr>
                <th>Working Days:</th>
                <td>Pune, Maharshtra</td>
              </tr>
            </table>

            <table style="width:50%;margin-left:10px;">
              <tr>
                <th>Total Leave:</th>
                <td>Nabil Ansari</td>
              </tr>
              <tr>
                <th>Working Leave:</th>
                <td>Pune, Maharshtra</td>
              </tr>
              <tr>
                <th>Rejected Leave:</th>
                <td>Pune, Maharshtra</td>
              </tr>
            </table>

          </div>
        </div> -->


        <div id="table">
          <div class="row" style="display: inline-flex; width:100%;">

            <table style="width:50%;margin-right:10px;">
              <tr>
                <th>Total Days:</th>
                <td><?php echo $total_days; ?></td>
              </tr>
              <tr>
                <th>Leaves:</th>
                <td><?php echo $leaves; ?></td>
              </tr>
              <tr>
                <th>Holidays:</th>
                <td><?php echo $holiday; ?></td>
              </tr>
            </table>

            <table style="width:50%;margin-left:10px;">
              <tr>
                <th>Over Days:</th>
                <td><?php echo $over_days; ?></td>
              </tr>              
            </table>

          </div>
        </div>
        <!--End Table-->


        <hr style="margin:20px 0;opacity: 0.2;">

        <div id="table">
          <div class="row" style="display: inline-flex; width:100%;">

            <table style="width:50%;margin-right:10px;">
              <tr>
                <th>Basic Pay:</th>
                <td><?php if(!empty($admin)){ echo $admin->sallery; }?></td>
              </tr>
              <tr>
                <th>Add Any:</th>
                <td><?php echo $add_any; ?></td>
              </tr>
              <tr>
                <th>Less Any:</th>
                <td><?php echo $less_any; ?></td>
              </tr>
              <tr>
                <th>ESI:</th>
                <td><?php if(!empty($admin)){ echo $admin->esi; }?></td>
              </tr>
              <tr>
                <th>PF:</th>
                <td><?php if(!empty($admin)){ echo $admin->pf; }?></td>
              </tr>
              <tr>
                <th>Incentive:</th>
                <td><?php echo $incentive; ?></td>
              </tr>
              <tr>
                <th>Bonus:</th>
                <td></td>
              </tr>
              
            </table>

            

          </div>
        </div>

        <!-- <div id="table">
          <div class="row" style="display: inline-flex; width:100%;">

            <table style="width:50%;margin-right:10px;">
              <tr>
                <th>Basic Pay:</th>
                <td><?php if(!empty($admin)){ echo $admin->sallery; }?></td>
              </tr>
              <tr>
                <th>Add Any:</th>
                <td><?php echo $add_any; ?></td>
              </tr>
              <tr>
                <th>Less Any:</th>
                <td><?php echo $less_any; ?></td>
              </tr>
              <tr>
                <th>ESI:</th>
                <td><?php if(!empty($admin)){ echo $admin->esi; }?></td>
              </tr>
              <tr>
                <th>PF:</th>
                <td><?php if(!empty($admin)){ echo $admin->pf; }?></td>
              </tr>
              <tr>
                <th>Incentive:</th>
                <td><?php echo $incentive; ?></td>
              </tr>
              <tr>
                <th>Bonus:</th>
                <td></td>
              </tr>
              <tr>
                <th>Extra Days:</th>
                <td><?php echo $over_days; ?></td>
              </tr>
            </table>

            

          </div>
        </div> -->
        <!--End Table-->

        <hr style="margin:20px 0;opacity: 0.2;">

        <div id="table">
          <div class="row" style="display: inline-flex; width:100%;">

            <table style="width:33%;">
              <tr>
                <th style="width:50%;background-color:#EFEFEF;color:#0089d0;">Advance:</th>
                <td style="width:auto;background-color:#efefef3b;"><?php echo number_format($admin->advance_amount); ?><!-- +<?php echo number_format($advance_amount,2); ?> -->/-</td>
              </tr>
            </table>

            <table style="width:33%;margin:0 5px 0 5px;">
              <tr>
                <th style="width:50%;background-color:#EFEFEF;color:#0089d0;">Repay Advance:</th>
                <td style="width:auto;background-color:#efefef3b;"><?php echo number_format($cutting_amount,2); ?>/-</td>
              </tr>
            </table>

            <table style="width:33%;">
              <tr>
                <th style="width:50%;background-color:#EFEFEF;color:#0089d0;">Balance:</th>
                <td style="width:auto;background-color:#efefef3b;"><?php echo number_format($admin->balance_advance,2); ?>/-</td>
              </tr>
            </table>

          </div>
        </div>
        <!--End Table-->

        <hr style="margin:20px 0;opacity: 0.2;">

        <div id="table">
          <div class="row" style="display: inline-flex; width:100%;">

            <table style="width:50%;margin-right:10px;">
              <tr>
                <th style="border:1px solid transparent;">Net Pay:</th>
                <td style="border:1px solid transparent;"><?php echo number_format($final_amount, 2)?></td>
              </tr>
              <tr>
                <th style="border:1px solid transparent;">Account Holder:</th>
                <td style="border:1px solid transparent;"><?php if(!empty($admin)){ echo $admin->name; }?></td>
              </tr>
              <tr>
                <th style="border:1px solid transparent;">Bank:</th>
                <td style="border:1px solid transparent;"><?php if(!empty($admin)){ echo $admin->bank_name; }?></td>
              </tr>
            </table>

            <table style="width:50%;margin-left:10px;">
              <tr>
                <th style="border:1px solid transparent;">Date:</th>
                <td style="border:1px solid transparent;"><?php echo $transaction_date; ?></td>
              </tr>
              <tr>
                <th style="border:1px solid transparent;">A/C No:</th>
                <td style="border:1px solid transparent;"><?php if(!empty($admin)){ echo $admin->account_no; }?></td>
              </tr>
              <tr>
                <th style="border:1px solid transparent;">T.ID:</th>
                <td style="border:1px solid transparent;"><?php echo $transaction_id; ?></td>
              </tr>
            </table>

          </div>
        </div>
        <!--End Table-->
        
  
      </div>
      <!--End InvoiceBot-->
    </div>
    <!--End Invoice-->
  </div><!-- End Invoice Holder-->

