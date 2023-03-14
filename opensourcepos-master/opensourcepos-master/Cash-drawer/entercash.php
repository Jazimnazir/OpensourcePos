<?php
session_start();
if(isset($_POST['cashonhand']))
{
include('../database.php');
$cashonhand=$_POST['cashonhand'];
$userid=$_SESSION['userid'];
$date=date("m/d/Y");
$status='cashin';
$data['status']=0;
$sql=mysqli_query($conn,"INSERT INTO tblcashregister (cashierId,cash_drawer,start_date,status) VALUES ('".$userid."','".$cashonhand."','".$date."','".$status."')");
if(!$sql)
{
	$data['status']='error';
}
echo json_encode($data);
}

?>