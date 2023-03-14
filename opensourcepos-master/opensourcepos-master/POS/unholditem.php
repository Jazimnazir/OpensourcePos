<?php
session_start();
include_once('../database.php');
if(isset($_POST['unholditem']))
{

$cashierid=$_SESSION['userid'];
 $sql=mysqli_query($conn,"SELECT * FROM tblholditem WHERE cashierId='".$cashierid."' and holdname='".$_POST['holdname']."'");
 if(mysqli_num_rows($sql)>0)
 {
 	 while($row=mysqli_fetch_array($sql))
 	 {
 	 	 $insert=mysqli_query($conn,"INSERT INTO tblcart (cashierId,productId,productcode,productname,category,unit,cost,price,qty,subtotal,expirydate) VALUES ('".$cashierid."','".$row['productId']."','".$row['productcode']."','".$row['productname']."','".$row['category']."','".$row['unit']."','".$row['cost']."','".$row['price']."','".$row['qty']."','".$row['subtotal']."','".$row['expirydate']."')");
 	 	 $update=mysqli_query($conn,"UPDATE tblholditem SET onhold='1' WHERE cashierId='".$cashierid."' AND holdname='".$_POST['holdname']."'");



 	 }
 }
}


?>