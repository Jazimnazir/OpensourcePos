<?php
include('../database.php');
$invoice=$_POST['invoice'];
$cashierid=0;
$barcode=$_POST['barcode'];
$qty=$_POST['qty'];
$cartqty=0;
$totalqty=0;
$total=0;
$item=0;
$data['status']=0;
$data['total']=0;
$data['item']=0;

$sql=mysqli_query($conn,"SELECT * FROM tblcartreturn WHERE  productcode='".$barcode."' AND invoiceId='".$invoice."'");
if(mysqli_num_rows($sql)>0)
{
	while($row=mysqli_fetch_array($sql))
	{
	$cartqty+=$row['qty'];
	}

}
if($qty<$cartqty)
{
		$totalqty=$cartqty-$qty;
		while($totalqty>0)
	{
	$sql=mysqli_query($conn,"SELECT * FROM tblcartreturn WHERE qty > 0 AND productcode='".$barcode."' AND invoiceId='".$invoice."'");
		if(mysqli_num_rows($sql)>0)
		{
			while($row=mysqli_fetch_array($sql))
			{
				$productid=$row['productId'];
				$productcode=$row['productcode'];
				$productname=$row['productname'];
				$category=$row['category'];
				$unit=$row['unit'];
				$price=$row['price']; 
			} 
			$check=mysqli_query($conn,"SELECT * FROM tblcartreturn WHERE productId='".$productid."' AND invoiceId='".$invoice."'");
			if(mysqli_num_rows($check)>0)
			{
				$update=mysqli_query($conn,"UPDATE tblcartreturn SET qty=qty-1,subtotal=subtotal-price WHERE productId='".$productid."'");
				if(!$update)
				{
					echo mysqli_error($conn);
				}
			}
			$updatesold=mysqli_query($conn,"UPDATE tblsolditem SET qty=qty+1,subtotal=subtotal+price WHERE invoiceId='".$invoice."' AND productId='".$productid."'");
		$totalqty--;
		}else{
			$totalqty=0;
		}
	
 
	}
	
}else if($qty>$cartqty){
	$totalqty=$qty-$cartqty;
	while($totalqty>0)
	{
	$sql=mysqli_query($conn,"SELECT * FROM tblsolditem WHERE invoiceId='".$invoice."' AND productcode='".$barcode."' AND qty > 0");
	if(mysqli_num_rows($sql)>0)
	{
			while($row=mysqli_fetch_array($sql))
	{
		$productid=$row['productId'];
		$productcode=$row['productcode'];
		$productname=$row['productname'];
		$category=$row['category'];
		$unit=$row['unit'];
		$price=$row['price']; 
	} 
	$check=mysqli_query($conn,"SELECT * FROM tblcartreturn WHERE productId='".$productid."'");
	if(mysqli_num_rows($check)>0)
	{
		$update=mysqli_query($conn,"UPDATE tblcartreturn SET qty=qty+1,subtotal=subtotal+price WHERE productId='".$productid."' AND invoiceId='".$invoice."'");
		if(!$update)
		{
			echo mysqli_error($conn);
		}
	}else{
		$subtotal=$qty*$price;
		$insert=mysqli_query($conn,"INSERT INTO tblcartreturn (cashierId,invoiceId,productId,productcode,productname,category,unit,price,qty,subtotal) 
		VALUES ('".$cashierid."','".$invoice."','".$productid."','".$productcode."','".$productname."','".$category."','".$unit."','".$price."','".$returnqty."','".$subtotal."')");
		if(!$insert)
		{
			echo mysqli_error($conn);
		}
	}
	$updatesold=mysqli_query($conn,"UPDATE tblsolditem SET qty=qty-1,subtotal=subtotal-price WHERE invoiceId='".$invoice."' AND productId='".$productid."'");

			$totalqty--;
	}else{
		$totalqty=0;
		$data['status']="outstock";
	}
 

 	}
	
 
 }
 $sql=mysqli_query($conn,"SELECT * FROM tblcartreturn WHERE cashierId='".$cashierid."' AND invoiceId='".$invoice."'");
 if(mysqli_num_rows($sql)>0)
 {
	 while($row=mysqli_fetch_array($sql))
	 {
		 $item++;
		 $total+=$row['subtotal'];
	 }
	$data['total']=$total;
	$data['item']=$item;
 }
 echo json_encode($data);

?>