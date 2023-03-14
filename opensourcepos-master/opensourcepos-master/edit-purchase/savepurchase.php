<?php
if(isset($_POST['savepurchase'])){
	include('../database.php');
	$cashierid=0;
	$invoice=$_POST['invoice'];
	$reference=$_POST['reference'];
	$purchasedate=$_POST['purchasedate'];
	$details=$_POST['details'];
	$status=$_POST['status'];
	$supplier=$_POST['supplier'];
	$supplierid=$_POST['supplierid'];
	$totalcost=$_POST['totalcost'];
	$discount=$_POST['discount'];
	$grandtotal=$_POST['grandtotal'];
	$amountpaid=$_POST['amountpaid'];
	$balance=$_POST['balance'];
	$paid=0;
	if($balance<=0)
	{
		$paid=$grandtotal-$amountpaid;
	}else if($balance>0)
	{
		$paid=$amountpaid;
	}
	$sql=mysqli_query($conn,"SELECT * FROM tblinventory WHERE invoiceId='".$invoice."'");
	if(mysqli_num_rows($sql)>0)
	{
		while($row=mysqli_fetch_array($sql))
		{
			$totalqty+=$row['totalqty'];
			$totalitem+=$row['totalitem'];
			
		}
	}
	$sql=mysqli_query($conn,"UPDATE tblinventory_merge SET reference='".$reference."',purchasedate='".$purchasedate."',description='".$details."',supId='".$supplierid."',supname='".$supplier."',totalitem='".$totalitem."',totalqty='".$totalqty."',totalcost='".$totalcost."',discount='".$discount."',grandtotal='".$grandtotal."',amountpaid='".$amountpaid."',paid='".$paid."',balance='".$balance."',status='".$status."' WHERE invoiceId='".$invoice."'");
  	if(!$sql)
	{
		echo mysqli_error($conn);
		$data['status']='Error ';
	}else
	{
		$data['status']=1;
	}
	$sql=mysqli_query($conn,"UPDATE tblinventory SET status='Stockin' WHERE invoiceId='".$invoice."'");
	  	if(!$sql)
	{
		echo mysqli_error($conn);
		$data['status']='Error';
	 
	}else
	{
			$data['status']=1;
	}
		 		 
	
	echo json_encode($data);
  
}
?>
