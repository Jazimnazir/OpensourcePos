<?php
include('../database.php');
 
$cashierid=0;
$barcode=$_POST['barcode'];
$invoice=$_POST['invoice'];
$returnqty=$_POST['qty'];
$qty=1;
$productid=0;
$productcode=0;
$productname=0;
$category=0;
$unit=0;
$price=0;
$subtotal=0;
$total=0;
$item=0;
$data['total']=0;
$data['item']=0;
$data['status']=0;


if(isset($_POST['returnitem']))
{
while($returnqty>0)
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
	$check=mysqli_query($conn,"SELECT * FROM tblcartreturn WHERE productId='".$productid."' AND invoiceId='".$invoice."'");
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
		VALUES ('".$cashierid."','".$invoice."','".$productid."','".$productcode."','".$productname."','".$category."','".$unit."','".$price."','".$qty."','".$subtotal."')");
		if(!$insert)
		{
			echo mysqli_error($conn);
		}
	}
	$updatesold=mysqli_query($conn,"UPDATE tblsolditem SET qty=qty-1,subtotal=subtotal-price WHERE invoiceId='".$invoice."' AND productId='".$productid."' AND qty > 0");
	$data['status']=1;
	}else{
		$data['status']="outstock";
	}
	 $returnqty--;
 }
 
 $sql=mysqli_query($conn,"SELECT * FROM tblcartreturn WHERE cashierId='".$cashierid."' AND invoiceId='".$invoice."'");
 while($row=mysqli_fetch_array($sql))
 {
	 $item++;
	 $total+=$row['subtotal'];
 }
 $data['total']=$total;
 $data['item']=$item;
 echo json_encode($data);
}
?>