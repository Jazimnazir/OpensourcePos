<?php 
session_start();
if(isset($_POST['search'])){
	include('../database.php');
	$barcode=$_POST['barcode'];
	$cashierid=$_SESSION['userid'];
	$supplierid=0;
	$supplier;
	$supplier=01;
	$qty=1;
	$price;
	$addtotal=0;
	$removetotal=0;
	$totalcost;
	$status='adjusting';
	$adjust_type='Addition';
	$data['status']=0;
	$data['addtotal']=0;
	$data['removetotal']=0;
	$data['inserted']=0; 
	$sql=mysqli_query($conn,"SELECT * FROM tblinventory INNER JOIN tblinventory_merge ON tblinventory.invoiceId=tblinventory_merge.invoiceId WHERE NOT EXISTS (SELECT tbladjustment.inventoryId FROM tbladjustment WHERE tbladjustment.productcode=tblinventory.productcode AND tbladjustment.status='adjusting') AND tblinventory.productcode='".$barcode."' GROUP BY  tblinventory_merge.supname ORDER BY tblinventory.inventoryId DESC");


	if(mysqli_num_rows($sql)>0)
	{ 
		
		$price=0;
		$totalcost=0;
		while($row=mysqli_fetch_array($sql))
		{  
			$sql1=mysqli_query($conn,"SELECT * FROM tblinventory_merge WHERE invoiceId='".$row['invoiceId']."'");
			if(mysqli_num_rows($sql1)>0)
			{
				while($row1=mysqli_fetch_array($sql1))
				{
					$supplierid=$row1['supId'];
					$supplier=$row1['supname'];
				}
			}
			$totalcost=$qty*$row['price'];
			 
			$insert=mysqli_query($conn,"INSERT INTO tbladjustment (userId,invoiceId,supplierId,supplier,inventoryId,productcode,productname,category,unit,cost,price,adjustment_type,qty,totalcost,expirydate,status) VALUES
			('".$cashierid."',
			'".$row['invoiceId']."',
			'".$supplierid."',
			'".$supplier."',
			'".$row['inventoryId']."',
			'".$row['productcode']."',
			'".$row['productname']."',
			'".$row['category']."',
			'".$row['unit']."',
			'".$row['cost']."',
			'".$row['price']."',
			'".$adjust_type."',
			'".$qty."',
			'".$totalcost."',
			'".$row['expirydate']."',
			'".$status."')");
					
				
			 
			
			 
		 
			$data['status']=1;
		}
				 
	}else
	{
		$data['status']='exist';
	}  
	$sql=mysqli_query($conn,"SELECT * FROM tbladjustment WHERE userId='".$cashierid."' AND adjustment_type='Addition' AND status='adjusting'");
	if(mysqli_num_rows($sql)>0)
	{
		while($row=mysqli_fetch_array($sql))
		{
			$addtotal+=$row['totalcost'];
		}
	}
	$data['addtotal']=$addtotal;
	
	$sql=mysqli_query($conn,"SELECT * FROM tbladjustment WHERE userId='".$cashierid."' AND adjustment_type='Subtraction' AND status='adjusting'");
	if(mysqli_num_rows($sql)>0)
	{
		while($row=mysqli_fetch_array($sql))
		{
			$removetotal+=$row['totalcost'];
		}
	}
	$data['removetotal']=$removetotal;
	echo json_encode($data);
}
?>
