<?php
include('../database.php');
if(isset($_POST['search']))
{
$barcode=$_POST['barcode'];
$sql=mysqli_query($conn,"SELECT * FROM tblproduct WHERE productcode='".$barcode."'");
if(mysqli_num_rows($sql)>0)
{
	$data['status']=1;
}else
{
	$data['status']=0;
}
echo json_encode($data);
}

?>