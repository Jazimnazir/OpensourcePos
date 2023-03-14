<?php
session_start();
if(isset($_POST['change_qty']))
{
	include('../database.php');
	$cashierid=$_SESSION['userid'];
	$inventoryid=$_POST['inventoryid'];
	$qty=$_POST['qty'];
	$totalqty=0;
	$cost=$_POST['cost'];
	$totalcost=$qty*$cost;
	$adjustment_type=$_POST['adjustment_type'];
	$addtotal=0;
	$removetotal=0;
	$data['addtotal']=0;
	$data['removetotal']=0;
	$data['status']=0;
	$data['stock']=0;
	$sql=mysqli_query($conn,"SELECT * FROM tblinventory WHERE inventoryId='".$inventoryid."'");
	if(mysqli_num_rows($sql)>0)
	{
		while($row=mysqli_fetch_array($sql))
		{
			$totalqty=$row['remainingqty'];
		}
	}
	if($adjustment_type=='Subtraction' && $qty>$totalqty)
	{
		$data['stock']='excess';
	}else
	{
		
	$sql=mysqli_query($conn,"UPDATE tbladjustment SET qty='".$qty."',totalcost='".$totalcost."' WHERE inventoryId='".$inventoryid."'");
	} 
	
	$sql=mysqli_query($conn,"SELECT * FROM tbladjustment WHERE userId='".$cashierid."' AND adjustment_type='Addition'");
	if(mysqli_num_rows($sql)>0)
	{
		$data['status']=1;
		while($row=mysqli_fetch_array($sql))
		{
			$addtotal+=$row['totalcost'];
		}
		
	}
	
	
	$data['addtotal']=$addtotal;
	$sql=mysqli_query($conn,"SELECT * FROM tbladjustment WHERE userId='".$cashierid."' AND adjustment_type='Subtraction'");
	if(mysqli_num_rows($sql)>0)
	{
		$data['status']=1;
		while($row=mysqli_fetch_array($sql))
		{
			$removetotal+=$row['totalcost'];
		}
	}
	$data['removetotal']=$removetotal;

echo json_encode($data);
}

?>