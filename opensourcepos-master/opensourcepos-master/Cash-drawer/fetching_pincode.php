<?php
if(isset($_POST['search']))
{
	
include('../database.php');
$pincode=$_POST['result'];
$data['status']=0;
$sql=mysqli_query($conn,"SELECT * FROM tblpincode WHERE code='".$pincode."' AND status='Active'");
if(mysqli_num_rows($sql)>0)
{
	$data['status']=1;
}
echo json_encode($data);

}


?>