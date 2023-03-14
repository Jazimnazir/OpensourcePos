  <div class="modal modal-sale fade" id="tbl-payment" tabindex="-1" role="dialog" >
  <div class="modal-dialog" role="document" style="margin-left:32%;">
    <div class="modal-content" style="width:450px;">
      <div class="modal-header">
	  <?php 
	  	$start_date=date("m/d/Y");
	  	$end_date=date("m/d/Y");
		$sql=mysqli_query($conn,"SELECT * FROM tblcashregister WHERE cashierId='".$_SESSION['userid']."' AND status='Open'");
		if(mysqli_num_rows($sql)>0)
		{
			while($row=mysqli_fetch_array($sql))
			{
				$start_date=$row['start_date'];
			}
		 
		}
	  
	  ?>
        <h6 class="modal-title" id="exampleModalLabel">SALES (<?php echo $start_date; ?>)-(<?php echo $end_date;?>) </h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="background:#faf0f085;padding-right:0;margin-right:3px;">
	  <div class="row">
		<div class="col-md-12">
		 <?php
		 $cash_sales=0;
		 $credit_sales=0;
		 $discount=0;
		 $deduct_sales=0;
		 $subtotal=0;
		 $starting_money=0;
		 $total_sales=0;
		 //EXPENSE
		 $refund=0;
		 $expense=0;
		 $total_exp=0;
		 //TOTAL
		 $total_cash=0;
		 $sql=mysqli_query($conn,"SELECT * FROM tblsolditem_merge WHERE cashierId='".$_SESSION['userid']."' AND solddate='".$start_date."'");
		 if(mysqli_num_rows($sql)>0)
		 {
			 $cash_sales=0;
			while($row=mysqli_fetch_array($sql))
			{
				$cash_sales+=$row['totalprice'];
			}
		 }
		 
		 $subtotal=$cash_sales-$starting_money;
		 
		  $discount=0;
		 $sql=mysqli_query($conn,"SELECT * FROM tblsolditem_merge WHERE cashierId='".$_SESSION['userid']."'  AND solddate='".$start_date."'");
		 if(mysqli_num_rows($sql)>0)
		 {
			 
			while($row=mysqli_fetch_array($sql))
			{
				$discount+=$row['discount'];
			}
		 }
		  $credit_sales=0;
		 $sql=mysqli_query($conn,"SELECT * FROM tblsolditem_merge WHERE cashierId='".$_SESSION['userid']."' AND solddate='".$start_date."'");
		 if(mysqli_num_rows($sql)>0)
		 {
			 
			while($row=mysqli_fetch_array($sql))
			{
				$credit_sales+=$row['balance'];
			}
		 }
		 $deduct_sales=$discount+$credit_sales;
		 $total_sales=$subtotal-$deduct_sales;
		 
		 $sql=mysqli_query($conn,"SELECT * FROM tblreturnitem_merge WHERE cashierId='".$_SESSION['userid']."'  AND returndate='".$start_date."'");
		 if(mysqli_num_rows($sql)>0)
		 {
			 while($row=mysqli_fetch_array($sql))
			 {
				 $refund+=$row['amountrefund'];
			 }
		 }
		 
		 $sql=mysqli_query($conn,"SELECT * FROM tblexpense WHERE userId='".$_SESSION['userid']."' AND dateofexp='".$start_date."'");
		 if(mysqli_num_rows($sql)>0)
		 {
			 while($row=mysqli_fetch_array($sql))
			 {
				 $expense+=$row['amount'];
			 }
		 }
		 $total_exp=$refund+$expense;
		 $total_cash=$total_sales-$total_exp;
		 ?>
			<table>
				<thead>
				<th ></th>
				<th width="200"></th>
				<th></th>
				</thead>
				<tbody>
				<tr>
				<td>Cash in hand</td>
				<td></td>
				<td>0.00</td>
				</tr>
				<tr>
				<td>Cash Payment</td>
				<td></td>
				<td><?php echo number_format($cash_sales,2,'.',',');?></td>
				</tr>
				 
					 <tr style="font-weight:700;"> 
				<td  >Subtotal Sales</td>
				<td></td>
				<td><?php echo $subtotal;?></td>
				</tr>
				
				<tr>
				<td>Discount</td>
				<td></td>
				<td><?php echo $discount;?></td>
				</tr>
					<tr>
				<td>Credit Sales</td>
				<td></td>
				<td><?php echo $credit_sales;?></td>
				</tr>
				 <tr style="font-weight:700;"> 
				<td>Total Sales</td>
				<td></td>
				<td><?php echo $total_sales;?></td>
				</tr>
				 
				<tr>
				<td>-</td>
				<td>-</td>
				<td>-</td>
				</tr>
				<tr>
				<td>Expenses</td>
				<td></td>
				<td><?php echo $expense;?></td>
				</tr> 
				<tr>
				<td>Return</td>
				<td></td>
				<td><?php echo $refund;?></td>
				</tr> 
				<tr style="font-weight:700;">
				<td>Total Cash</td>
				<td></td>
				<td><?php echo $total_cash;?></td>
				</tr>
				</tbody>
			</table>				
		</div> 
    </div>
    </div>
  </div>
</div>
</div>