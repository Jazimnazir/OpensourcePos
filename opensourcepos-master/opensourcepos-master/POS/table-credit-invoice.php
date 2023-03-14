<?php
include_once('../database.php');
$cashierid=0;
$sql=mysqli_query($conn,"SELECT * FROM tblsolditem_merge WHERE customerId='".$_GET['customer']."'");
if(mysqli_num_rows($sql)>0){
	while($row=mysqli_fetch_array($sql))
	{
 
?>

 <tr class="p-1">
				  <td class="p-1" style="display:none;"><?php echo $row['time'];?></td>
				  <td class="p-1"><?php echo $row['invoiceId']?></td>
				  <td class="p-1"><?php echo $row['totalitem']?></td>
				  <td class="p-1"><?php echo $row['totalprice']?></td>
				  <td class="p-1"><?php echo $row['discount']?></td>
				  <td class="p-1"><?php echo $row['amountdue']?></td>
				  <td class="p-1"><?php echo $row['paid']?></td>
				  <td class="p-1"><?php echo $row['balance']?></td>
				 
				 
				  </tr>
				  <?php
				  	}
	
}

				  ?>