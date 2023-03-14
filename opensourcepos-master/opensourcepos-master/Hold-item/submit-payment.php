<?php
include_once('../database.php');
$cashierid=0;
$holdname=$_POST['holdid'];
$customerid=$_POST['customerid'];
$totalprice=$_POST['totalprice'];
$discount=$_POST['discount'];
$amountdue=$_POST['amountdue'];
$cashtend=$_POST['amountpaid'];
$balance=0;
$change=$_POST['change'];
$paid=$cashtend-$change;
$item=0;
$total_qty=0;
$generate=rand(1,999);
$invoice='22'.$cashierid.$generate;
$date=date("d-m-Y");
if($change>=0)
{
	$change=$change;
	$balance=0;
}else if($change<0){
	$change=0;
	$balance=$amountdue-$cashtend;
}
$sql=mysqli_query($conn,"SELECT * FROM tblholditem WHERE holdname='".$holdname."' AND cashierId='".$cashierid."'");
while($row=mysqli_fetch_array($sql))
{
	$item++;
	$total_qty+=$row['qty'];
	$sql2=mysqli_query($conn,"INSERT INTO tblsolditem (invoiceId,productId,productcode,productname,category,unit,price,qty,subtotal) 
	VALUES ('".$invoice."','".$row['productId']."','".$row['productcode']."','".$row['productname']."','0','".$row['unit']."','".$row['price']."','".$row['qty']."','".$row['subtotal']."')");
} 
$insert=mysqli_query($conn,"INSERT INTO tblsolditem_merge (customerId,invoiceId,solddate,cashierId,totalitem,totalqty,totalprice,discount,amountdue,cashtender,balance,soldchange,paid,status) 
VALUES ('".$customerid."','".$invoice."','".$date."','".$cashierid."','".$item."','".$total_qty."','".$totalprice."','".$discount."','".$amountdue."','".$cashtend."','".$balance."','".$change."','".$paid."','Active')");
if($insert)
{
	$data['status']=1;
}else{
	$data['status']=0;
	echo mysqli_error($conn);
}
$delete=mysqli_query($conn,"DELETE FROM tblholditem WHERE holdname='".$holdname."' AND cashierId='".$cashierid."'");
echo json_encode($data);
?>