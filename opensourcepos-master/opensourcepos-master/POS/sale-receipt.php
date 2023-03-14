<?php session_start();?>
<?php include('../headerlink-child.php');?>
<?php
	$invoice='';
	$date_sold='';
	$customer='';
	$total=0;
	$grandtotal=0;
	$amountpaid=0;
	$change=0;
	
	include('../database.php');
	$sql=mysqli_query($conn,"SELECT * FROM tblsolditem_merge WHERE status='Active' and cashierId='".$_SESSION['userid']."'");
	if(mysqli_num_rows($sql)>0)
	{
		while($row=mysqli_fetch_array($sql))
		{
			$invoice=$row['invoiceId'];
			$date_sold=$row['solddate'];
			$total=$row['totalprice'];
			$grandtotal=$row['amountdue'];
			$amountpaid=$row['cashtender'];
			$change=$row['soldchange'];
			$sql1=mysqli_query($conn,"SELECT fullname FROM tblcustomer WHERE customerId='".$row['customerId']."'");
			while($row1=mysqli_fetch_array($sql1))
			{
				$customer=$row1['fullname'];
			}
			
		}
	}


?>
  <link rel="stylesheet" href="../plugins/receipt/receipt.css">
 <script>
 $(document).keydown(function(e){
	if(e.ctrlKey && e.keyCode == 13)
	{
		window.location.href="index.php";
		
	}
		 
});
 $(document).ready(function(){
	$('#print').trigger('click');
		
 });
 
 </script>
<table class="body-wrap">
    <tbody><tr>
        <td></td>
        <td class="container" width="600" style="max-width:700;">
            <div class="content">
                <table class="main" width="100%" cellpadding="0" cellspacing="0">
                    <tbody><tr>
                        <td class="content-wrap aligncenter">
                            <table width="100%" cellpadding="0" cellspacing="0">
                                <tbody> 
                                <tr>
                                    <td class="content-block">
                                        <table class="invoice">
                                            <tbody><tr>
                                                <td>
												Date:<?php echo $date_sold;?><br>
												Cashier:<?php echo $_SESSION['fullname'];?><br>
												Customer:<?php echo $customer;?><br>
												Referrence #:<?php echo 'SALE'.$invoice;?><br>
												 
												</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <table class="invoice-items" cellpadding="0" cellspacing="0">
                                                        <tbody style="min-width:100px;max-width:200px;">
														<?php 
															$sql_item=mysqli_query($conn,"SELECT * FROM tblsolditem WHERE invoiceId='".$invoice."'");
															if(mysqli_num_rows($sql_item)>0)
															{
																while($row=mysqli_fetch_array($sql_item))
																{
																	
																 
														?>
														<tr>
                                                            <td><?php echo $row['productname'];?><br><?php echo $row['qty']?> x <?php echo number_format($row['price'],2,'.',',')?></td>
                                                            <td class="alignright"><br><?php echo number_format($row['subtotal'],2,'.',',')?></td>
                                                        </tr>
																<?php }?>
														<?php }?>
                                                         
                                                        <tr class="total">
                                                            <td class="alignright" width="80%">Total</td>
                                                            <td class="alignright"><?php echo number_format($total,2,'.',',')?></td>
                                                        </tr>
														 <tr>
                                                            <td class="" width="80%">
															Grand total:<?php echo number_format($grandtotal,2,'.',',')?> 
															Amount paid:<?php echo number_format($amountpaid,2,'.',',')?>
															Change:<?php echo number_format($change,2,'.',',')?>
															</td>
                                                            <td class=""></td>
                                                        </tr>
														<tr>
														<td>	<a href="index.php" class="btn-primary hidden-print" id="pos">BACK TO POS</a><button class="btn-primary hidden-print" id="print" style="margin-left:3px;">PRINT</button>
														</td>
														 
														</tr>
                                                    </tbody></table>
                                                </td>
                                            </tr>
                                        </tbody></table>
                                    </td>
                                </tr>
                               
                               
                            </tbody></table>
                        </td>
                    </tr>
                </tbody></table>
                <div class="footer"> 
			 
                </div></div>
        </td>
        <td></td>
    </tr>
</tbody></table>
<script> 
const $btnPrint = document.querySelector("#print");
$btnPrint.addEventListener("click", () => {
    window.print();
});
</script>