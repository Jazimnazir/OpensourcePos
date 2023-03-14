<?php
session_start();
if(isset($_POST['adjustment']))
{
	include('../database.php');
	$inventoryid=$_POST['inventoryid'];
	$cashierid=$_SESSION['userid'];
	$adjustment=$_POST['select'];
	$qty=$_POST['qty'];
	$addtotal=0;
	$removetotal=0;
	$data['stock']=0;
	$data['addtotal']=0;
	$data['removetotal']=0;
	$data['status']=0; 
	$sql=mysqli_query($conn,"SELECT * FROM tblinventory WHERE inventoryId='".$inventoryid."'");
	if(mysqli_num_rows($sql)>0)
	{
		while($row=mysqli_fetch_array($sql))
		{
			$remaining_item=$row['remainingqty'];
		}
	}
	if($adjustment=='Subtraction' && $qty>$remaining_item)
	{
		$data['stock']='excess';
	}else
	{
	$sql=mysqli_query($conn,"UPDATE tbladjustment SET adjustment_type='".$adjustment."' WHERE inventoryId='".$inventoryid."' AND status='adjusting'");
	if(!$sql)
	{
		$data['status']='Something went error'; 
	}
		
	}
	 
	
	$sql=mysqli_query($conn,"SELECT * FROM tbladjustment WHERE userId='".$cashierid."' AND adjustment_type='Addition' AND status='adjusting'");
	if(mysqli_num_rows($sql)>0)
	{
		$data['status']=1;
		while($row=mysqli_fetch_array($sql))
		{
			$addtotal+=$row['totalcost'];
		}
		
	}
	
	
	$data['addtotal']=$addtotal;
	$sql=mysqli_query($conn,"SELECT * FROM tbladjustment WHERE userId='".$cashierid."' AND adjustment_type='Subtraction' AND status='adjusting'");
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