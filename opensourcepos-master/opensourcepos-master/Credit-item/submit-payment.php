<?php
include_once('../database.php');
$cashierid=0;
$customerid=$_POST['customerid'];
$totalprice=$_POST['totalprice'];
$discount=$_POST['discount'];
$amountdue=$_POST['amountdue'];
$paid=$_POST['amountpaid'];
$balance=$_POST['balance'];
$change=$_POST['change'];
$item=0;
$total_qty=0;
$generate=rand(1,999);
$invoice='22'.$cashierid.$generate;
$date=date("d-m-Y");
$sql=mysqli_query($conn,"SELECT * FROM tblcart WHERE cashierId='".$cashierid."'");
while($row=mysqli_fetch_array($sql))
{
	$item++;
	$total_qty+=$row['qty'];
	$sql2=mysqli_query($conn,"INSERT INTO tblsolditem (invoiceId,productId,productcode,productname,category,unit,price,qty,subtotal) 
	VALUES ('".$invoice."','".$row['productId']."','".$row['productcode']."','".$row['productname']."','0','".$row['unit']."','".$row['price']."','".$row['qty']."','".$row['subtotal']."')");
} 
$insert=mysqli_query($conn,"INSERT INTO tblsolditem_merge (customerId,invoiceId,solddate,cashierId,totalitem,totalqty,totalprice,discount,amountdue,amountpaid,balance,soldchange,status) 
VALUES ('".$customerid."','".$invoice."','".$date."','".$cashierid."','".$item."','".$total_qty."','".$totalprice."','".$discount."','".$amountdue."','".$paid."','".$balance."','".$change."','Active')");
if($insert)
{
	$data['status']=1;
}else{
	$data['status']=0;
	echo mysqli_error($conn);
}
$delete=mysqli_query($conn,"DELETE FROM tblcart WHERE cashierId='".$cashierid."'");
echo json_encode($data);
?>