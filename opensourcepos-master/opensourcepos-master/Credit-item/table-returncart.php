<?php
include_once('../database.php');
$cashierid=0;
$customerid=$_GET['customer'];
$invoice=$_GET['invoice'];
$sql=mysqli_query($conn,"SELECT * FROM tblsolditem WHERE invoiceId='".$invoice."' GROUP BY productcode");
if(mysqli_num_rows($sql)>0){
	while($row=mysqli_fetch_array($sql))
	{
		$qty=0;
		$subtotal=0;
		$sql1=mysqli_query($conn,"SELECT * FROM tblsolditem WHERE invoiceId='".$invoice."' AND productcode='".$row['productcode']."'");
		while($row1=mysqli_fetch_array($sql1))
		{
			$qty+=$row1['qty'];
			$subtotal+=$row1['subtotal'];
		}
	 
?>

 <tr class="p-1" style="background-color:rgb(255,247,214);color:rgb(38, 35, 29);border:1px solid white;">
				  <td class="p-1" style="display:none;"><?php echo $row['productcode'];?></td>
				  <td class="p-1" style="border:1px solid white;"><?php echo $row['productname']?></td>
				  <td class="p-1"  style="border:1px solid white;"><?php echo $row['unit']?></td>
				  <td class="p-1"  style="border:1px solid white;"><?php echo $row['price']?></td>
				  <td class="p-1" align="center"  style="border:1px solid white;"><?php echo $qty;?></td>
				  <td class="p-1"  style="border:1px solid white;"><?php echo number_format($subtotal,2,'.',',');?></td> 
				 
				  </tr>
				  <?php
				  	}
	
}

				  ?>