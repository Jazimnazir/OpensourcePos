<?php
session_start();
include('../database.php');
 if(isset($_POST['submit_credit']))
 {
	 
$customerid=$_POST['customerid'];
$cashierid=$_SESSION['userid'];
$lastin=0;
$amountdue=$_POST['amountdue'];
$balance=$_POST['balance'];
$discount=$_POST['discount'];
$totalqty=0;
$subtotal=0;
$totalitem=0;
$cash=0;
$paid=0;
$amountdue=0;
$change=0;
date_default_timezone_set("Asia/Bangkok");
$date=date("d-m-Y");
$time=date("F j, Y, g:i a");
$data['status']=0;
$getlast=mysqli_query($conn,"SELECT * FROM tblsolditem_merge ORDER BY solditem_merge DESC LIMIT 0,1");
if(mysqli_num_rows($getlast)>0)
{
	while($row=mysqli_fetch_array($getlast))
	{
		$lastin=$row['solditem_merge'];
	}
}
$lastin+=1;
$invoice=$cashierid.$customerid.rand(1,999).$lastin;

$cart=mysqli_query($conn,"SELECT * FROM tblcart WHERE cashierId='".$cashierid."'");
if(mysqli_num_rows($cart)>0)
{
	while($row=mysqli_fetch_array($cart))
	{
		$totalitem++;
		$totalqty+=$row['qty'];
		$subtotal=$row['subtotal'];
		$sql=mysqli_query($conn,"INSERT INTO tblsolditem (invoiceId,productId,productcode,productname,category,unit,price,qty,subtotal) VALUES
		('".$invoice."','".$row['productId']."','".$row['productcode']."','".$row['productname']."','".$row['category']."','".$row['unit']."','".$row['price']."','".$row['qty']."','".$row['subtotal']."')");
	}
$amountdue=$subtotal-$discount;
	$soldmerge=mysqli_query($conn,"INSERT INTO tblsolditem_merge (customerId,invoiceId,solddate,cashierId,totalitem,totalqty,totalprice,discount,amountdue,cashtender,balance,soldchange,paid,status,time) VALUES 
	('".$customerid."','".$invoice."','".$date."','".$cashierid."','".$totalitem."','".$totalqty."','".$subtotal."','".$discount."','".$amountdue."','".$cash."','".$balance."','".$change."','".$paid."','Credit','".$time."')");
}
	
$delete=mysqli_query($conn,"DELETE FROM tblcart WHERE cashierId='".$cashierid."'");
$data['status']=1;	
echo json_encode($data);
 }

?>