<?php
session_start();
if(isset($_POST['delete']))
{
	include('../database.php');
	$cashierid=$_SESSION['userid'];
	$inventoryid=$_POST['id'];
	$addtotal=0;
	$removetotal=0;
	$data['addtotal']=0;
	$data['removetotal']=0;
	$data['status']=0;
	$sql=mysqli_query($conn,"DELETE FROM tbladjustment WHERE inventoryId='".$inventoryid."' AND status='adjusting'");
	
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
