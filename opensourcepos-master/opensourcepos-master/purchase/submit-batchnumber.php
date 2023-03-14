<?php
session_start();
include('../database.php');
if(isset($_POST['submit']))
{
$id=$_POST['id'];
$cashier=$_SESSION['userid'];
$batchnumber=$_POST['batchnumber'];
$update=mysqli_query($conn,"UPDATE tblpurchase SET batchnumber='".$batchnumber."' WHERE purchaseId='".$id."' AND purchaseBy='".$cashier."'");
if(!$update)
{
	echo mysqli_error($conn);
}
}
?>