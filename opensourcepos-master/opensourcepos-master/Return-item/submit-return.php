<?php
session_start();
include('../database.php');
$invoice=$_POST['invoice'];
$subtotal=0;
$paid=0;
$balance=0;
$total=0;
$cashierid=$_SESSION['userid'];
$returninvoice='22'.$cashierid.'-'.rand(1,99).rand(99,1);
$stockin='Returning';
$customerid=0;
$date=date("m/d/Y");
$totalitem=0;
$totalqty=0;
$amountrefund=0;
$withbalance=0;
$reason=$_POST['reason'];
$data['status']=0;
 if(isset($_POST['submitreturn']))
 {
	  $sql=mysqli_query($conn,"SELECT * FROM tblcartreturn WHERE invoiceId='".$invoice."'");
 while($row=mysqli_fetch_array($sql))
 {
	 $totalitem++;
	 $totalqty+=$row['qty'];
	 $subtotal+=$row['subtotal'];
	 $insert=mysqli_query($conn,"INSERT INTO tblreturnitem (cashierId,invoiceId,invoicesold,inventoryId,productcode,productname,category,unit,expirydate,price,qty,subtotal,date,stockstatus) VALUES 
	 ('".$cashierid."','".$returninvoice."','".$invoice."','".$row['productId']."','".$row['productcode']."','".$row['productname']."','".$row['category']."','".$row['unit']."','".$row['expirydate']."','".$row['price']."','".$row['qty']."','".$row['subtotal']."','".$date."','".$stockin."')");
 }
 
$sql=mysqli_query($conn,"SELECT * FROM tblsolditem_merge WHERE invoiceId='".$invoice."'");
while($row=mysqli_fetch_array($sql))
{
	$paid=$row['paid'];
	$balance=$row['balance'];
	$customerid=$row['customerId'];
}

	$total=$subtotal-$balance;
	if($total>=0)//refund
	{
	$amountrefund=$subtotal;
	$withbalance=0;
		$update=mysqli_query($conn,"UPDATE tblsolditem_merge SET paid=paid-'".$subtotal."' WHERE invoiceId='".$invoice."'");

	}else if($total<0)//pay previous balance
	{ 
	$amountrefund=0;
	$withbalance=$subtotal;
		 $update=mysqli_query($conn,"UPDATE tblsolditem_merge SET balance=balance-'".$subtotal."' WHERE invoiceId='".$invoice."'");
		 
	} 

	$sql=mysqli_query($conn,"INSERT INTO tblreturnitem_merge (invoiceId,invoicesold,customerId,cashierId,returndate,totalitem,totalqty,totalrefund,previousbalance,amountrefund,balance,reason,status) 
	VALUES ('".$returninvoice."','".$invoice."','".$customerid."','".$cashierid."','".$date."','".$totalitem."','".$totalqty."','".$subtotal."','".$balance."','".$amountrefund."','".$withbalance."','".$reason."','Active')");
	$sql=mysqli_query($conn,"DELETE FROM tblcartreturn WHERE invoiceId='".$invoice."'");
	$data['status']=1;
 }
 echo json_encode($data);
?>