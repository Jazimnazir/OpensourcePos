<?php
session_start();
include('../database.php');
if(isset($_POST['submit']))
{
	
$cashierid=$_SESSION['userid'];
$adjustment_date=$_POST['adjustment_date'];
$reference=$_POST['reference'];
$details=$_POST['details'];
$invoice=0;
$subtotal=0;
$item=0;
$totalqty=0;
$totalcost=0;
$adjust_invoice='22'.$cashierid.rand(1,9999);

$sql=mysqli_query($conn,"SELECT * FROM tbladjustment WHERE userId='".$cashierid."' AND status='adjusting'");
if(mysqli_num_rows($sql)>0)
{
	while($row=mysqli_fetch_array($sql))
	{
		$item++;
		$totalqty+=$row['qty'];
		$totalcost+=$row['totalcost'];
		$invoice=$row['invoiceId'];
		if($row['adjustment_type']=='Addition')
		{
			$adjust_inventory=mysqli_query($conn,"UPDATE tblinventory SET totalqty=totalqty+'".$row['qty']."',remainingqty=remainingqty+'".$row['qty']."',totalcost=totalcost+'".$row['totalcost']."' WHERE inventoryId='".$row['inventoryId']."'");
			$adjust_bill=mysqli_query($conn,"UPDATE tblinventory_merge SET balance=balance+'".$row['totalcost']."' WHERE invoiceId='".$row['invoiceId']."'");
			
			
		}else
		{
			$adjust_inventory=mysqli_query($conn,"UPDATE tblinventory SET totalqty=totalqty-'".$row['qty']."', remainingqty=remainingqty-'".$row['qty']."',totalcost=totalcost-'".$row['totalcost']."' WHERE inventoryId='".$row['inventoryId']."'");
			$adjust_bill=mysqli_query($conn,"UPDATE tblinventory_merge SET balance=balance-'".$row['totalcost']."' WHERE invoiceId='".$row['invoiceId']."'");
			
		}
		 }
	$update=mysqli_query($conn,"UPDATE tbladjustment SET adjust_invoice='".$adjust_invoice."', status='adjusted' WHERE userId='".$cashierid."' AND status='adjusting'");
	$insert=mysqli_query($conn,"INSERT INTO tbladjustment_merge (adjustby,invoiceId,adjustmentdate,reference,details,totalitem,totalqty,totalcost) VALUES 
	('".$cashierid."',
	'".$adjust_invoice."',
	'".$adjustment_date."',
	'".$reference."',
	'".$details."',
	'".$item."',
	'".$totalqty."',
	'".$totalcost."')");
	
}else
{
	$data['status']='norecord';
}

}

?>