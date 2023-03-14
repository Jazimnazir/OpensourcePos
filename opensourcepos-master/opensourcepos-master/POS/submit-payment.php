<?php
session_start();
include_once('../database.php');
$cashierid=$_SESSION['userid'];
$customerid=$_POST['customerid'];
$totalprice=$_POST['totalprice'];
$discount=$_POST['discount'];
$amountdue=$_POST['amountdue'];
$cashtend=$_POST['amountpaid'];
$balance=0;
$change=$_POST['change'];
$payment_type='Cash';
if($change<0)
{
	$payment_type='Credit';
	$change=0;
	$balance=$amountdue-$cashtend;
}
$paid=$cashtend-$change;
$item=0;
$total_qty=0;
$cost=0;
$totalcost=0;
$revenue=0;
$margin=0;
$subtotal=0;
$generate=rand(1,999);
$invoice='22'.$cashierid.$generate;
$date=date("m/d/Y");
if($_POST['customerid']==0)
{
	$customerid=8;
}
$sql=mysqli_query($conn,"SELECT * FROM tblcart WHERE cashierId='".$cashierid."'");
while($row=mysqli_fetch_array($sql))
{
	$item++;
	$total_qty+=$row['qty'];
	
	$fetch_inven=mysqli_query($conn,"SELECT * FROM tblinventory WHERE inventoryId='".$row['productId']."'");
	if(mysqli_num_rows($fetch_inven)>0)
	{
		while($row1=mysqli_fetch_array($fetch_inven))
		{
			$cost=$row1['cost'];
		}
	}
	$subtotal=$row['subtotal'];
	$revenue=$subtotal;
	$totalcost=$row['qty']*$cost;
	$margin=$subtotal-$totalcost;
	$sql2=mysqli_query($conn,"INSERT INTO tblsolditem (cashierId,invoiceId,productId,productcode,productname,category,unit,expirydate,cost,price,qty,subtotal,payment_type,revenue,totalcost,margin,date,Active) 
	VALUES ('".$cashierid."','".$invoice."','".$row['productId']."','".$row['productcode']."','".$row['productname']."','".$row['category']."','".$row['unit']."','".$row['expirydate']."','".$row['cost']."','".$row['price']."','".$row['qty']."','".$row['subtotal']."','".$payment_type."','".$revenue."','".$totalcost."','".$margin."','".$date."','1')");
}
$update_status=mysqli_query($conn,"UPDATE tblsolditem_merge SET status='Sold' WHERE cashierId='".$cashierid."'");
 if($update_status)
{
	$data['status']=1;
}else{
	$data['status']=0;
	echo mysqli_error($conn);
}
$insert=mysqli_query($conn,"INSERT INTO tblsolditem_merge (customerId,invoiceId,solddate,cashierId,totalitem,totalqty,totalprice,discount,amountdue,cashtender,payment_type,balance,soldchange,paid,status,Active) 
VALUES ('".$customerid."','".$invoice."','".$date."','".$cashierid."','".$item."','".$total_qty."','".$totalprice."','".$discount."','".$amountdue."','".$cashtend."','".$payment_type."','".$balance."','".$change."','".$paid."','Active','1')");
if($insert)
{
	$data['status']=1;
	$_SESSION['label']='POS';
}else{
	$data['status']=0;
	echo mysqli_error($conn);
}
$delete=mysqli_query($conn,"DELETE FROM tblcart WHERE cashierId='".$cashierid."'");
echo json_encode($data);
?>