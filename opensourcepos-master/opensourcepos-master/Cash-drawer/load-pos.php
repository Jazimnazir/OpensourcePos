<?php
session_start();
if(isset($_POST['load']))
{
	include('../database.php');
	$cashierid=$_SESSION['userid'];
	$data['item']=0;
	$sql=mysqli_query($conn,"SELECT * FROM tblcart WHERE cashierId='".$cashierid."'");
	if(mysqli_num_rows($sql)>0)
	{
		$data['item']=1;
	}
echo json_encode($data);	
}
?>