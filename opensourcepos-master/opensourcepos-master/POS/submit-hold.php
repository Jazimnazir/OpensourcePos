<?php
session_start();
include('../database.php');
if(isset($_POST['hold']))
{
	$holdname=$_POST['holdname'];
	$cashierid=$_SESSION['userid'];
	date_default_timezone_set("Asia/Bangkok");
	$time=date("F j, Y, g:i a");
	$sql=mysqli_query($conn,"SELECT * FROM tblcart WHERE cashierId='".$cashierid."' ORDER BY cartId ASC");
	if(mysqli_num_rows($sql)>0)
	{
		while($row=mysqli_fetch_array($sql))
		{
			$insert=mysqli_query($conn,"INSERT INTO tblholditem (date,holdname,cashierId,productId,productcode,productname,category,unit,cost,price,qty,subtotal,expirydate,onhold) 
			VALUES ('".$time."','".$holdname."','".$cashierid."','".$row['productId']."','".$row['productcode']."','".$row['productname']."','".$row['category']."','".$row['unit']."','".$row['cost']."','".$row['price']."','".$row['qty']."','".$row['subtotal']."','".$row['expirydate']."','0')");
			if(!$insert)
			{
				echo mysqli_error($conn);
			}
		}
		$delete=mysqli_query($conn,"DELETE FROM tblcart WHERE cashierId='".$cashierid."'");
	}
}

?>