<?php
include('../database.php');
$cashierid=0;
$invoicesold=$_POST['invoice'];
$amountdue=$_POST['amountdue'];
$cash_tender=$_POST['cash_tender'];
$customerid=$_POST['customer'];
$change=$_POST['change'];
date_default_timezone_set("Asia/Bangkok");
$date=date("m-d-Y");
$invoice=0;
$lastint=0;
$onchange=0;
$balance=0;
$data['status']=0; 
$data['invoice']=$invoicesold; 
$data['bal']=0;
$data['onchange']=0;
if(isset($_POST['submit_credit']))
{
	
	
$sql=mysqli_query($conn,"SELECT * FROM tblsolditem_merge ORDER BY solditem_merge DESC limit 0,1");
while($row=mysqli_fetch_array($sql))
{
	$lastint+=$row['solditem_merge'];
}
if($change>=0)
{
	$paid=$cash_tender-$amountdue;
	$onchange=$change;
	$balance=0;
	$data['onchange']=$onchange;
}else if($change<0){
	$paid=$cash_tender;
	$change=0;
	$balance=$amountdue-$cash_tender;
	$data['bal']=$balance;
}
$invoice='22'.$cashierid.rand(1,999).$lastint;
$sql=mysqli_query($conn,"UPDATE tblsolditem_merge SET balance=balance-'".$paid."',paid=paid+'".$paid."' WHERE invoiceId='".$invoicesold."'");
if(!$sql){
	echo mysqli_error($conn);
}
$sql=mysqli_query($conn,"INSERT INTO tblcredititem_merge (date,invoiceId,invoicesold,customerId,cashierId,paying_balance,cash_tender,amountpaid,balance,onchange,status) 
VALUES ('".$date."','".$invoice."','".$invoicesold."','".$customerid."','".$cashierid."','".$amountdue."','".$cash_tender."','".$paid."','".$balance."','".$onchange."','Active')");

$data['status']=1;	
 
} 
echo json_encode($data);
?>