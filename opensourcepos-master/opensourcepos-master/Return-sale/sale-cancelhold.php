<?php
session_start();
include_once('../database.php');
$userid=$_SESSION['userid'];
if(isset($_POST['cancel']))
{
	$sql=mysqli_query($conn,"SELECT * FROM tblholditem WHERE cashierId='".$userid."' AND onhold=1 ");
	if(mysqli_num_rows($sql)>0)
	{
		 
		 while($row=mysqli_fetch_array($sql))
		 {
		 	$delete=mysqli_query($conn,"DELETE FROM tblcart WHERE cashierId='".$userid."' AND productcode='".$row['productcode']."'");
		 }
		 $update=mysqli_query($conn,"UPDATE tblholditem SET onhold=0 WHERE cashierId='".$userid."' AND onhold=1");
		
	}
}

?>