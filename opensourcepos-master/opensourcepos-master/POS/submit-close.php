<?php 
session_start();

if(isset($_POST['close']))
{
include('../database.php');
$userid=$_SESSION['userid'];
$cash_payment=floatval(preg_replace('/[^\d.]/','',$_POST['cash_payment']));
$subtotal=floatval(preg_replace('/[^\d.]/','',$_POST['subtotal_sale']));
$discount=floatval(preg_replace('/[^\d.]/','',$_POST['sale_discount']));
$credit=floatval(preg_replace('/[^\d.]/','',$_POST['sale_credit']));
$total_sale=floatval(preg_replace('/[^\d.]/','',$_POST['total_sale']));
$expense=floatval(preg_replace('/[^\d.]/','',$_POST['sale_expense']));
$return=floatval(preg_replace('/[^\d.]/','',$_POST['sale_return']));
$total_cash=floatval(preg_replace('/[^\d.]/','',$_POST['sale_totalcash']));
$cash_drawer=floatval(preg_replace('/[^\d.]/','',$_POST['total_cash_drawer']));
$variance=$cash_drawer-$total_cash;
$date=date('m/d/Y');

$update=mysqli_query($conn,"UPDATE tblcashregister SET cash_sales='".$cash_payment."',subtotal_sale='".$subtotal."',discount_sales='".$discount."',credit_sale='".$credit."',total_sale='".$total_sale."',
total_expense='".$expense."',return_sale='".$return."',total_cash='".$total_cash."',actual_cash='".$cash_drawer."',variance='".$variance."',sales_note='Sales note!',end_date='".$date."',status='cashout' WHERE cashierId='".$userid."' AND status='cashin'");
$update_sale=mysqli_query($conn,"UPDATE tblsolditem_merge SET Active='0' WHERE cashierId='".$userid."'");
$update_sale_item=mysqli_query($conn,"UPDATE tblsolditem SET Active='0' WHERE cashierId='".$userid."'");
if(!$update)
{
	echo mysqli_error($conn);
}else
{
	$_SESSION['label']='CLOSE';
}
}
?>