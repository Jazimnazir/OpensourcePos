<?php 
include('../database.php');
 if(isset($_POST['searchitem']))
 {
	 
$invoice=$_POST['invoice'];
$sql=mysqli_query($conn,"SELECT * FROM tblinventory_merge WHERE invoiceId='".$invoice."'");
$data['status']=0;
if(mysqli_num_rows($sql)>0)
{
		$data['status']=1;
		$data['invoice']=$invoice;
		$data['purchasedate']='';
		$data['reference']='';
		$data['supplier']='';
		$data['grandtotal']='';
		$data['amountpaid']='';
		$data['balance']='';
		$data['purchaseby']='';
	while($row=mysqli_fetch_array($sql))
	{
		$data['purchasedate']=$row['purchasedate'];
		$data['reference']=$row['reference'];
		$data['supplier']=$row['supname'];
		$data['grandtotal']=$row['grandtotal'];
		$data['amountpaid']=$row['amountpaid'];
		$data['balance']=$row['balance'];
		$data['purchaseby']=$row['purchaseBy'];
	}
}
echo json_encode($data);
	 
 }

?>