<?php
session_start();
include_once('../database.php'); 
 
if(isset($_POST['searchitem']))
{
	$data['status']=0;
	$data['total']=0;
	$data['item']=0;
	$cashierid=$_SESSION['userid'];
	$barcode=$_POST['barcode']; 
	$price=0;
	$qty=1;
	$subtotal=0;
	$total=0;
	$item=0;
	$expirydate=0;
	$sql=mysqli_query($conn,"SELECT * FROM tblcart WHERE productcode='".$barcode."' AND cashierId='".$cashierid."'");
	
	if(mysqli_num_rows($sql)>0)
	{
 
		while($row=mysqli_fetch_array($sql))
		{
			$productid=$row['productId'];
			$qty+=$row['qty'];
			$price=$row['price'];
		}
		$subtotal=$qty*$price;
		$item_inventory=mysqli_query($conn,"SELECT * FROM tblinventory WHERE productcode='".$barcode."' AND remainingqty > '0' ORDER BY expirydate ASC");
			if(mysqli_num_rows($item_inventory)>0){
				$remaining=0;
				$totalremaining=0;
				$inventoryid=0;
				$productcode;
				$productname;
				$category;
				$unit;
				$cost;
				$price;
				$qty=1;
				while($row1=mysqli_fetch_array($item_inventory))
				{
					$productcode=$row1['productcode'];
					$productname=$row1['productname'];
					$category=$row1['category'];
					$inventoryid=$row1['inventoryId'];
					$remaining=$row1['remainingqty'];
					$unit=$row1['unit'];
					$price=$row1['price'];
					$cost=$row1['cost'];
					$expirydate=$row1['expirydate'];
					
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
									$updatecart=mysqli_query($conn,"UPDATE tblcart SET qty='".$qty."',subtotal='".$subtotal."' WHERE productId='".$inventoryid."' AND cashierId='".$cashierid."'");
									if($updatecart){ $data['status']=1; }else{ $data['status']=0;}
						}else{
							
								$subtotal=$qty*$price;
								$insertcart=mysqli_query($conn,"INSERT INTO tblcart (cashierId,productId,productcode,productname,category,unit,cost,price,qty,subtotal,expirydate)
								 VALUES ('".$cashierid."','".$inventoryid."','".$productcode."','".$productname."','".$category."','".$unit."','".$cost."','".$price."','".$qty."','".$subtotal."','".$expirydate."')");
								 if($insertcart)
								{ 
									$data['status']=1;
								}else{
									$data['status']=0;
								}
																		
							
							
						}
				$updateinventory=mysqli_query($conn,"UPDATE tblinventory SET soldqty=soldqty+1, remainingqty='".$totalremaining."' WHERE inventoryId='".$inventoryid."'");
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
		$item_inventory=mysqli_query($conn,"SELECT * FROM tblinventory WHERE productcode='".$barcode."' AND remainingqty > '0' ORDER BY expirydate ASC");
			if(mysqli_num_rows($item_inventory)>0){
				$remaining=0;
				$totalremaining=0;
				$inventoryid=0; 
				$productname=0;
				$category;
				$unit=0;
				$cost;
				while($row=mysqli_fetch_array($item_inventory))
				{ 
					$productcode=$row['productcode'];
					$productname=$row['productname'];
					$category=$row['category'];
					$unit=$row['unit'];
					$cost=$row['cost'];
					$price=$row['price']; 
					$inventoryid=$row['inventoryId'];
					$remaining=$row['remainingqty'];
					$expirydate=$row['expirydate'];
					
					
				}
				$subtotal=$qty*$price;
				$insertcart=mysqli_query($conn,"INSERT INTO tblcart (cashierId,productId,productcode,productname,category,unit,cost,price,qty,subtotal,expirydate)
				 VALUES ('".$cashierid."','".$inventoryid."','".$productcode."','".$productname."','".$category."','".$unit."','".$cost."','".$price."','".$qty."','".$subtotal."','".$expirydate."')");
				 if($insertcart)
				{ 
					$data['status']=1;
				}else{
					$data['status']=0;
				}
				$totalremaining=$remaining-1;
				$updateinventory=mysqli_query($conn,"UPDATE tblinventory SET soldqty=soldqty+1, remainingqty='".$totalremaining."' WHERE inventoryId='".$inventoryid."'");
				if($updateinventory)
				{ 
					$data['status']=1;
				}else{
					$data['status']=0;
				}
 
		
				//END OF ELSE
					
			}else{
				$data['status']="nostock";
			}//GET ITEM FROM INVENT...
		}//END OF ELSE NO DATA FROM CART
							$gettotal=mysqli_query($conn,"SELECT * FROM tblcart WHERE cashierId='".$cashierid."'");
						while($row=mysqli_fetch_array($gettotal))
							{
							$total+=$row['subtotal'];
							$item++;
							}
	$data['total']=$total;
	$data['item']=$item;
	echo json_encode($data);
	}//END OF ISSET
?>