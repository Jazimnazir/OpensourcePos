<?php
include('../database.php');
if(isset($_POST['updating']))
{
$invoice=$_POST['purchaseid'];
$sql=mysqli_query($conn,"UPDATE tblinventory SET status='editing' WHERE invoiceId='".$invoice."'");
$sql=mysqli_query($conn,"UPDATE tblinventory_merge SET status='Pending' WHERE invoiceId='".$invoice."'");
}

?>