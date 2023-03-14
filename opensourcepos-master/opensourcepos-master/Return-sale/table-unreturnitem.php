<?php
if(!(isset($_SESSION['userid'])))
{
session_start();
}
include_once('../database.php');
$cashierid=$_SESSION['userid'];
$invoiceid=$_GET['invoiceid'];

$sql=mysqli_query($conn,"SELECT * FROM tblsolditem WHERE invoiceId='".$invoiceid."'");
if(mysqli_num_rows($sql)>0)
{
	$qty=1;

	while($row=mysqli_fetch_array($sql))
	{
?>

		 <tr class="p-1">
				  <td class="p-1" style="display:none;" ><?php echo $row['solditemId'];?></td>
				  <td class="p-1"><?php echo $qty++;?></td> 

				   <td class="p-1"><?php echo $row['productcode']?></td> 
				   <td class="p-1"><?php echo $row['productname']?></td> 
				  <td class="p-1"><?php echo $row['unit']?></td>
				  <td class="p-1"><?php echo number_format($row['price'],2,'.',',');?></td>
				  <td class="p-1"><?php echo number_format($row['qty'],2,'.',',');?></td>
				  <td class="p-1"><?php echo number_format($row['subtotal'],2,'.',',');?></td>
				   
				  
				 
				  </tr>






<?php
	}
}
?>