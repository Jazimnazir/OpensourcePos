<?php
session_start();
include("../database.php");
if(isset($_POST['add-payment']))
{
	
$cashierid=$_SESSION['userid'];
$reference=$_POST['reference'];
$invoice=$_POST['invoice'];
$cash_tender=$_POST['payment'];
$total=$_POST['balance'];
$change=$_POST['change'];
$paid=0;
$paymenttype='Purchase';
$date=date("m-d-Y");
$data['status']=0;
if($change>=0)
{
	$paid=$cash_tender-$total;
	$remainingbal=0;
}else if($change<0)
{
	$paid=$cash_tender;
	$remainingbal=$total-$cash_tender;
}
$update=mysqli_query($conn,"UPDATE tblinventory_merge SET paid=paid+'".$paid."',balance=balance-'".$paid."' WHERE invoiceId='".$invoice."'");
if(!$update)
{
	$data['status']='Update failed!';
}else
{
	$data['status']=1;
}
$insert=mysqli_query($conn,"INSERT INTO tblpayment_history (paidby,payment_type,reference,date,total,cashtend,paid,balance) VALUES 
('".$cashierid."','".$paymenttype."','".$reference."','".$date."','".$total."','".$cash_tender."','".$paid."','".$remainingbal."')");
if(!$insert)
{
	$data['status']+='Inserting failed!';
}else{
	$data['status']+=1;
}
echo json_encode($data);
	
}

?>