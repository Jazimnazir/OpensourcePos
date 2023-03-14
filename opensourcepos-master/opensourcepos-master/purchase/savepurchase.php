<?php
session_start();
if(isset($_POST['savepurchase'])){
	include('../database.php');
	$cashierid=$_SESSION['userid'];
	$reference=$_POST['reference'];
	$purchasedate=$_POST['purchasedate']; 
	$supplier=$_POST['supplier'];
	$supplierid=$_POST['supplierid'];
	$status=$_POST['status'];
	$details=$_POST['details'];
	$totalcost=$_POST['totalcost'];
	$discount=$_POST['discount'];
	$grandtotal=$_POST['grandtotal'];
	$amountpaid=$_POST['amountpaid'];
	$balance=$_POST['balance'];
	$totalitem=0;
	$totalqty=0; 
	$purchaseby=$cashierid;
	$category=0;
	$lastitem=1;
	$invoice='No invoice#';
	$paid=0;
	if($balance<=0)
	{
		$paid=$grandtotal-$amountpaid;
	}else if($balance>0)
	{
		$paid=$amountpaid;
	}
	
	$sql=mysqli_query($conn,"SELECT * FROM tblinventory ORDER BY inventoryId DESC LIMIT 0,1");
	if(mysqli_num_rows($sql)>0)
	{
		while($row=mysqli_fetch_array($sql))
		{
			$lastitem+=$row['inventoryId'];
		}
	
	}
	$invoice='22'.$cashierid.rand(1,999).$lastitem;
	
	$getitem=mysqli_query($conn,"SELECT * FROM tblpurchase WHERE status='Adding' AND purchaseBy='".$cashierid."'");
	while($row=mysqli_fetch_array($getitem))
	{
		$totalitem++;
		$totalqty+=$row['totalqty'];
	$insertitem=mysqli_query($conn,"INSERT INTO tblinventory (invoiceId,reference,batchnumber,productcode,productname,category,unit,cost,price,totalqty,soldqty,remainingqty,totalcost,expirydate,status) 
	VALUES ('".$invoice."','".$reference."','".$row['batchnumber']."','".$row['productcode']."','".$row['productname']."','".$row['category']."','".$row['unit']."','".$row['cost']."','".$row['price']."','".$row['totalqty']."','".$row['soldqty']."','".$row['totalqty']."','".$row['totalcost']."','".$row['expirydate']."','stockin')");
		if($insertitem){ 
        
    }else{
    	echo mysqli_error($conn);
    } 
	}
	$sql=mysqli_query($conn,"INSERT INTO tblinventory_merge (invoiceId,reference,purchasedate,description,supId,supname,totalitem,totalqty,totalcost,discount,grandtotal,amountpaid,paid,balance,status,purchaseBy) VALUES 
	('".$invoice."','".$reference."','".$purchasedate."','".$details."','".$supplierid."','".$supplier."','".$totalitem."','".$totalqty."','".$totalcost."','".$discount."','".$grandtotal."','".$amountpaid."','".$paid."','".$balance."','".$status."','".$purchaseby."')");
	if($sql){
  $data['status']=1;
        
    }else{
    	echo mysqli_error($conn);
    }
	$sql=mysqli_query($conn,"DELETE FROM tblpurchase WHERE purchaseBy='".$cashierid."'");
		 		 
	 
  
}
?>
