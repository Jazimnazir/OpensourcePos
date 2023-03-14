<?php
if(isset($_POST['barcode']))
{
include('../database.php');
$barcode = $_POST['barcode'];
$data['status']=0;
$sql=mysqli_query($conn,"SELECT * FROM tblproduct WHERE productcode='".$barcode."'");
if(mysqli_num_rows($sql)>0)
{
	$data['status']=1;
}
echo json_encode($data);
}


?>