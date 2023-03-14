<?php
session_start();
 include_once('../database.php'); 
if(isset($_POST['changeqty']))
{ 
$data['status']=0;
$data['total']=0;
$data['item']=0;
$data['adding']=0;
$data['countin']=0;
$data['totalqty']=0;
$data['totalqty_high']=0;
$cashierid=$_SESSION['userid'];
$barcode=$_POST['barcode'];
$qty=$_POST['qty'];
$cart_qty=0;
$totalqty=0;
$sub_or_add=0;
$total=0;
$item=0;
$available=0;
$getmore=0;
$i=0;
$temp_qty=0;
$totalqty_high=0;
$totalitem=0;
$subtotal=0;
$cart=0;
$addtocart=0;
$remainiventory=0; 
$sqlgetotal=mysqli_query($conn,"SELECT * FROM tblcart WHERE productcode='".$barcode."' AND cashierId='".$cashierid."'");
while($row=mysqli_fetch_array($sqlgetotal))
{
	$cart_qty+=$row['qty'];
}

$sub_or_add=$cart_qty-$qty;
if($sub_or_add>0)//removing from cart qty
{

	$totalqty=$cart_qty-$qty;//QTY TO REMOVE
	$data['totalqty']=$totalqty;
	$sql=mysqli_query($conn,"SELECT *  FROM tblcart WHERE productcode='".$barcode."' AND qty > 0 AND '".$totalqty."' > 0 ORDER BY expirydate DESC");
	if(mysqli_num_rows($sql)>0)
	{
		$subtotal=0;
		while($row_remove=mysqli_fetch_array($sql))
		{
		if(!($totalqty<1))
		{
				
			 if($totalqty>$row_remove['qty'])
			 {
			$temp_qty=$totalqty-$row_remove['qty'];
			 $totalqty_high=$totalqty-$temp_qty; 
			 }else{
				 $totalqty_high=$totalqty;
			 } 
			 $data['totalqty_high']=$totalqty_high;
			 $subtotal=$row_remove['price']*$totalqty;
			 $update=mysqli_query($conn,"UPDATE tblcart SET qty=qty-'".$totalqty_high."',subtotal=subtotal-'".$subtotal."' WHERE productId='".$row_remove['productId']."'");
			 $update_invent=mysqli_query($conn,"UPDATE tblinventory SET remainingqty=remainingqty+'".$totalqty_high."',soldqty=soldqty-'".$totalqty_high."',status='stockin' WHERE inventoryId='".$row_remove['productId']."'");
			 
		}
			 
			 $totalqty-=$row_remove['qty'];
		}
		$data['status']=1;
	}else{
		$data['status']='stockout';
	}




}else if($sub_or_add<0)//add more to cart
{
	
		
$totalqty=$qty-$cart_qty;//QTY TO ADD
$sql=mysqli_query($conn,"SELECT SUM(remainingqty) FROM tblinventory WHERE productcode='".$barcode."' AND status='stockin'");
$row=mysqli_fetch_row($sql);
$available=$row[0];
$getmore=$available-$totalqty;//available minus add more
  
if(!($getmore<=-1))//INITIALIZE IF QTY FROM INVENTORY IS AVAILABLE
{ 
 
		$sql=mysqli_query($conn,"SELECT * FROM tblinventory WHERE productcode='".$barcode."' AND remainingqty > 0 AND status='stockin' ORDER BY expirydate ASC");
		while($row1=mysqli_fetch_array($sql))
		{
			 
		 
		 
			 if(!($totalqty<1))
			 {
			  if($totalqty>$row1['remainingqty'])
			 {
			$temp_qty=$totalqty-$row1['remainingqty'];
			 $totalqty_high=$totalqty-$temp_qty; 
			 }else{
				 $totalqty_high=$totalqty;
			 } 
			
			$update_get=mysqli_query($conn,"UPDATE tblinventory SET remainingqty=remainingqty-'".$totalqty_high."',soldqty=soldqty-'".$totalqty_high."' WHERE inventoryId='".$row1['inventoryId']."'");
			 
			 $sql1=mysqli_query($conn,"SELECT * FROM tblcart WHERE productId='".$row1['inventoryId']."' AND cashierId='".$cashierid."'");
			  
		
			if(mysqli_num_rows($sql1)>0)
			{
			
				$subtotal=$row1['price']*$totalqty_high;
				
				
				$update=mysqli_query($conn,"UPDATE tblcart SET qty=qty+'".$totalqty_high."', subtotal=subtotal+'".$subtotal."' WHERE productId='".$row1['inventoryId']."'");
				 
			}else
			{
				$subtotal=$row1['price']*$totalqty_high;
			
				$insert=mysqli_query($conn,"INSERT INTO tblcart (cashierId,productId,productcode,productname,category,unit,price,qty,subtotal,expirydate) VALUES 
				('".$cashierid."','".$row1['inventoryId']."','".$row1['productcode']."','".$row1['productname']."','".$row1['category']."','".$row1['unit']."','".$row1['price']."','".$totalqty_high."','".$subtotal."','".$row1['expirydate']."')");
			
			}
		 
			$totalqty-=$row1['remainingqty'];
			 }
			 
			 
			
			 
		
		$data['status']=1;
		} 


} 

 
}else
{
	$data['status']=="Noitem";
}

 $delete_zeroqty=mysqli_query($conn,"DELETE FROM tblcart WHERE qty <= 0");
 
 $get_subtotal=mysqli_query($conn,"SELECT * FROM tblcart WHERE cashierid='".$cashierid."'");
 if(mysqli_num_rows($get_subtotal)>0)
 {
	 while($row=mysqli_fetch_array($get_subtotal))
	 {
		 $total+=$row['subtotal'];
	 }
 }  
  $get_item=mysqli_query($conn,"SELECT * FROM tblcart WHERE cashierid='".$cashierid."' GROUP BY productcode");
 if(mysqli_num_rows($get_item)>0)
 {
	 while($row=mysqli_fetch_array($get_item))
	 {
		 $item++;
	 }
 }
 $data['total']=$total;
 $data['item']=$item;
 	echo json_encode($data);
 
}
?>