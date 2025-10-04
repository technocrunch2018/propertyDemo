<div class="row">
	<div class="col-md-3 col-sm-6 col-xs-6">
		<label>Commission</label>
		<input type="text" name="commission" readonly="readonly" placeholder="Commission" value="<?php if(!empty($payment_pending_details)){ echo $payment_pending_details->deal_commission;}?>">
	</div>
	<div class="col-md-3 col-sm-6 col-xs-6">
		<label>GST</label>
		<input type="text" name="gst" readonly="readonly" placeholder="GST" value="<?php if(!empty($payment_pending_details)){ echo $payment_pending_details->deal_gst;}?>">
	</div>
	<div class="col-md-3 col-sm-6 col-xs-6">
		<label>TDS</label>
		<input type="text" name="tds" readonly="readonly" placeholder="TDS" value="<?php if(!empty($payment_pending_details)){ echo $payment_pending_details->deal_tds;}?>">
	</div>
	<div class="col-md-3 col-sm-6 col-xs-6">
		<label>Total</label>
		<input type="text" name="total" readonly="readonly" placeholder="Total" value="<?php if(!empty($payment_pending_details)){ echo $payment_pending_details->deal_total;}?>">
	</div>
</div>

<?php if(!empty($payment_pending_details)){ $dueAmount = $payment_pending_details->deal_total;}else{$dueAmount = 0;} ?>
<div class="row">
	<div class="col-md-12">
		<table>
			<thead>
				<tr>
					<th>SR No</th>
					<th>Mode</th>
					<th>Date</th>
					<th>T.ID/C.No.</th>
					<th>Bank Name</th>
					<th>Amount</th>
					<th>Due</th>
				</tr>
			</thead>
			<tbody>
				<?php if(!empty($deal_payment_details)){ ?>
				<?php foreach($deal_payment_details as $i=>$row){ ?>
					<tr>
						<td><?php echo $i+1; ?></td>
						<td><?php echo $row->mode; ?></td>
						<td><?php echo $row->date; ?></td>
						<td><?php echo $row->payment_ref; ?></td>
						<td><?php echo $row->payment_bank; ?></td>
						<td><?php echo $row->received; ?></td>
						<td><?php echo $dueAmount = ($dueAmount-$row->received); ?></td>
					</tr>
				<?php } ?>
				<?php } ?>
			</tbody>
		</table>
	</div>
</div>