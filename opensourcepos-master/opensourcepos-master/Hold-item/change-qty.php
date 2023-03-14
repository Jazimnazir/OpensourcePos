<?php 
include_once('../database.php'); 
if(isset($_POST['changeqty']))
{ 
$data['status']=0;
$data['total']=0;
$data['item']=0;
$data['adding']=0;
$cashierid=0;
$barcode=$_POST['barcode'];
$holdname=$_POST['holdid'];
$qty=$_POST['qty'];
$cart_qty=0;
$totalqty=0;
$sub_or_add=0;
$total=0;
$item=0;
$available=0;
$i=0;
$sqlgetotal=mysqli_query($conn,"SELECT * FROM tblholditem WHERE productcode='".$barcode."' AND holdname='".$holdname."' AND cashierId='".$cashierid."'");
while($row=mysqli_fetch_array($sqlgetotal))
{
	$cart_qty+=$row['qty'];
}

$sub_or_add=$cart_qty-$qty;
if($sub_or_add>0)
{
	
$totalqty=$cart_qty-$qty;
 while($totalqty>0)
 {
	 $productid=0;
	 $data['status']+=1;
	$sql_cart=mysqli_query($conn,"SELECT * FROM tblholditem WHERE qty > 0 AND productcode='".$barcode."' AND holdname='".$holdname."' AND cashierId='".$cashierid."'");
	while($row=mysqli_fetch_array($sql_cart))
	{
	$productid=$row['productId'];
		
	}
		$update=mysqli_query($conn,"UPDATE tblholditem SET qty=qty-1,subtotal=subtotal-price WHERE productId='".$productid."'");
		$update_inven=mysqli_query($conn,"UPDATE tblinventory SET remainingqty=remainingqty+1 WHERE inventoryId='".$productid."'");
		
	 $totalqty--;
 }
}else if($sub_or_add<0)
{
	
		
$totalqty=$qty-$cart_qty;
 while($totalqty>0)
 {
 //INSIDE ADDING MORE QUANTITY
	$data['status']=0;
	$data['total']=0;
	$data['item']=0;
	$cashierid=0;
	//$barcode=$_POST['barcode']; 
	$price=0;
	$qty=1;
	$subtotal=0;
	$total=0;
	$item=0;
	$sql=mysqli_query($conn,"SELECT * FROM tblholditem WHERE productcode='".$barcode."' AND holdname='".$holdname."' AND cashierId='".$cashierid."'");
	
	if(mysqli_num_rows($sql)>0)
	{
 
		while($row=mysqli_fetch_array($sql))
		{
			$productid=$row['productId'];
			$qty+=$row['qty'];
			$price=$row['price'];
		}
		$subtotal=$qty*$price;
		$item_inventory=mysqli_query($conn,"SELECT * FROM tblinventory WHERE productcode='".$barcode."' AND remainingqty > '0' ORDER BY inventoryId DESC");
			if(mysqli_num_rows($item_inventory)>0){
				$remaining=0;
				$totalremaining=0;
				$inventoryid=0;
				$productname;
				$unit;
				$price;
				$qty=1;
				while($row1=mysqli_fetch_array($item_inventory))
				{
					$productname=$row1['productname'];
					$inventoryid=$row1['inventoryId'];
					$remaining=$row1['remainingqty'];
					$unit=$row1['unit'];
					$price=$row1['price'];
					
				}
				$totalremaining=$remaining-1;
				$fetchcartId=mysqli_query($conn,"SELECT * FROM tblcart WHERE productId='".$inventoryid."'");
						if(mysqli_num_rows($fetchcartId)>0)
						{
									while($row=mysqli_fetch_array($fetchcartId))
									{
										$qty+=$row['qty'];
										$price=$row['price'];
										
									}
									$subtotal=$qty*$price;
									$updatecart=mysqli_query($conn,"UPDATE tblholditem SET qty='".$qty."',subtotal='".$subtotal."' WHERE productId='".$inventoryid."' AND holdname='".$holdname."' AND cashierId='".$cashierid."'");
									if($updatecart){ $data['status']=1; }else{ $data['status']=0;}
						}else{
							
								$subtotal=$qty*$price;
								$insertcart=mysqli_query($conn,"INSERT INTO tblholditem (holdname,cashierId,productId,productcode,productname,unit,price,qty,subtotal)
								 VALUES ('".$holdname."','".$cashierid."','".$inventoryid."','".$barcode."','".$productname."','".$unit."','".$price."','".$qty."','".$subtotal."')");
								 if($insertcart)
								{ 
									$data['status']=1;
								}else{
									$data['status']=0;
								}
																		
							
							
						}
				$updateinventory=mysqli_query($conn,"UPDATE tblinventory SET remainingqty='".$totalremaining."' WHERE inventoryId='".$inventoryid."'");
				if($updateinventory)
				{ 
					$data['status']=1;
				}else{
					$data['status']=0;
				}
			
			}else{
				$data['status']="nostock";
			}
		
		
		
 
	}else{
		//START OF ELSE
		$item_inventory=mysqli_query($conn,"SELECT * FROM tblinventory WHERE productcode='".$barcode."' AND remainingqty > '0' ORDER BY inventoryId DESC");
			if(mysqli_num_rows($item_inventory)>0){
				$remaining=0;
				$totalremaining=0;
				$inventoryid=0; 
				$productname=0;
				$unit=0;
				while($row=mysqli_fetch_array($item_inventory))
				{ 
					$productname=$row['productname'];
					$unit=$row['unit'];
					$price=$row['price']; 
					$inventoryid=$row['inventoryId'];
					$remaining=$row['remainingqty'];
					
					
				}
				$subtotal=$qty*$price;
				$insertcart=mysqli_query($conn,"INSERT INTO tblholditem (holdname,cashierId,productId,productcode,productname,unit,price,qty,subtotal)
				 VALUES ('".$holdname."','".$cashierid."','".$inventoryid."','".$barcode."','".$productname."','".$unit."','".$price."','".$qty."','".$subtotal."')");
				 if($insertcart)
				{ 
					$data['status']=1;
				}else{
					$data['status']=0;
				}
				$totalremaining=$remaining-1;
				$updateinventory=mysqli_query($conn,"UPDATE tblinventory SET remainingqty='".$totalremaining."' WHERE inventoryId='".$inventoryid."'");
				if($updateinventory)
				{ 
					$data['status']=1;
				}else{
					$data['status']=0;
				}
						$gettotal=mysqli_query($conn,"SELECT * FROM tblholditem WHERE holdname='".$holdname."' AND cashierId='".$cashierid."'");
						while($row=mysqli_fetch_array($gettotal))
							{
							$total+=$row['subtotal'];
							$item++;
							}
		
				//END OF ELSE
					
			}else{
				$data['status']="nostock";
			}//GET ITEM FROM INVENT...
		}//END OF ELSE NO DATA FROM CART
 
 
 $totalqty--;
 }
 
}

 $delete_zeroqty=mysqli_query($conn,"DELETE FROM tblholditem WHERE qty <= 0");
 $get_subtotal=mysqli_query($conn,"SELECT * FROM tblholditem WHERE holdname='".$holdname."' AND cashierid='".$cashierid."'");
 if(mysqli_num_rows($get_subtotal)>0)
 {
	 while($row=mysqli_fetch_array($get_subtotal))
	 {
		 $total+=$row['subtotal'];
	 }
 }  
  $get_item=mysqli_query($conn,"SELECT * FROM tblholditem WHERE holdname='".$holdname."' AND cashierid='".$cashierid."' GROUP BY productcode");
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