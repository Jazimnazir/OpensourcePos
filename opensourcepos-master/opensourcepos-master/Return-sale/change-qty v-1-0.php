<?php 
include_once('../database.php'); 
if(isset($_GET['changeqty']))
{ 
$data['status']=0;
$data['total']=0;
$data['item']=0;
$data['adding']=0;
$data['countin']=0;
$cashierid=0;
$barcode=$_GET['barcode'];
$qty=$_GET['qty'];
$cart_qty=0;
$totalqty=0;
$sub_or_add=0;
$total=0;
$item=0;
$available=0;
$i=0;
$temp_qty=0;
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
	$sql=mysqli_query($conn,"SELECT *  FROM tblcart WHERE productcode='".$barcode."' AND qty > 0 AND '".$totalqty."' > 0 ORDER BY expirydate ASC");
	if(mysqli_num_rows($sql)>0)
	{
		$subtotal=0;
		while($row_remove=mysqli_fetch_array($sql))
		{
			
			 $temp_qty=$totalqty-$row_remove['qty'];
			 $totalqty=$totalqty-$temp_qty;
			 $subtotal=$row_remove['price']*$totalqty;
			 
			 $update=mysqli_query($conn,"UPDATE tblcart SET qty=qty-'".$totalqty."',subtotal=subtotal-'".$subtotal."' WHERE productId='".$row_remove['productId']."'");
			 $update_invent=mysqli_query($conn,"UPDATE tblinventory SET remainingqty=remainingqty+'".$totalqty."',soldqty=soldqty-'".$totalqty."' WHERE inventoryId='".$row_remove['productId']."'");
			 
		}
	}




}else if($sub_or_add<0)//add more to cart
{
	
		
$totalqty=$qty-$cart_qty;//QTY TO ADD
$sql=mysqli_query($conn,"SELECT SUM(remainingqty) FROM tblinventory WHERE productcode='".$barcode."'");
$row=mysqli_fetch_row($sql);
$getmore=$row[0]-$totalqty; //available minus add more
 
if(!($getmore<=-1))//INITIALIZE IF QTY FROM INVENTORY IS AVAILABLE
{ 
 
		$sql=mysqli_query($conn,"SELECT * FROM tblinventory WHERE productcode='".$barcode."' AND remainingqty > 0 ORDER BY expirydate ASC");
		while($row1=mysqli_fetch_array($sql))
		{
			 
		 
		 if(!($totalqty<1))
		 {
			 
			 if($totalqty>$row1['remainingqty'])
			 {
			$temp_qty=$totalqty-$row1['remainingqty'];
			 $totalqty=$totalqty-$temp_qty; 
			 
			 } 
			 echo $totalqty."-";
			$update_get=mysqli_query($conn,"UPDATE tblinventory SET remainingqty=remainingqty-'".$totalqty."',soldqty=soldqty-'".$totalqty."' WHERE inventoryId='".$row1['inventoryId']."'");
			 
			 $sql1=mysqli_query($conn,"SELECT * FROM tblcart WHERE productId='".$row1['inventoryId']."' AND cashierId='".$cashierid."'");
			  
		
			if(mysqli_num_rows($sql1)>0)
			{
			
				$subtotal=$row1['price']*$totalqty;
				
				
				$update=mysqli_query($conn,"UPDATE tblcart SET qty=qty+'".$totalqty."', subtotal=subtotal+'".$subtotal."' WHERE productId='".$row1['inventoryId']."'");
				 
			}else
			{
				$subtotal=$row1['price']*$totalqty;
			
				$insert=mysqli_query($conn,"INSERT INTO tblcart (cashierId,productId,productcode,productname,category,unit,price,qty,subtotal,expirydate) VALUES 
				('".$cashierid."','".$row1['inventoryId']."','".$row1['productcode']."','".$row1['productname']."','".$row1['category']."','".$row1['unit']."','".$row1['price']."','".$totalqty."','".$subtotal."','".$row1['expirydate']."')");
			
			}
			
			
		 }
		 $totalqty-=$row1['remainingqty'];
			 
			 
		
		
		} 


}else//NO STOCK
{
	$data['status']="Nostock";
	
}

 
}

 //$delete_zeroqty=mysqli_query($conn,"DELETE FROM tblcart WHERE qty <= 0");
 
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
 	//echo json_encode($data);
 
}
?>