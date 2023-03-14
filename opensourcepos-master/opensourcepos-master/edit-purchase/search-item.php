<?php
//1.FIRST STEP SEARCH THE PRODUCT ITEM AND GET THE DATA TO PURCHASE
//2.SECOND STEP SEARCH THE ITEM FROM PURCHASE
//3.IF THE ITEM ALREADY IN PURCHASE 
//4.GET THE TOTAL QUANTITY FROM EXISTED RECORD
//5.AND STORE TO TOTAL_QTY AND ADD (1) QUANITY 
//6.DELETE THE EXISTING ITEM FROM PURCHASE 
//7.INSERT NEW ITEM TO THE PURCHASE

if(isset($_POST['search'])){
	include('../database.php');
	$barcode=$_POST['barcode'];
	$invoice=$_POST['invoice'];
	$cashier="samplecashier1";
	$reference=$_POST['reference'];
	$supplier=01;
	$date=$_POST['purchasedate'];
	$details=$_POST['details']; 
	$code;
	$productname;
	$category;
	$unit;
	$cost;
	$price;
	$totalqty=1;
	$soldqty=0;
	$remainingqty=0;
	$totalprice;
	$batchnumber=1;
	$expirydate='01-01-3000';
	$data['status']=0;
	$data['total']=0;
	$data['inserted']=0;
	$sql=mysqli_query($conn,"SELECT * FROM tblproduct WHERE productcode LIKE '%".$barcode."%'");
	 if(mysqli_num_rows($sql)==1){
		 $qty=0;
		 $total=0;
		 while($row=mysqli_fetch_array($sql))
		 {
			 $data['status']=1;
			 $productname=$row['proname'];
			 $category=$row['category'];
			 $unit=$row['prounit'];
			 $cost=$row['cost'];
			 $price=$row['price'];
			 $expirydate=$row['expiredate'];
			 
			
  
		 }
		 $discount=0;
		 $total_totalcost=0;
		 
		$sql_fetch=mysqli_query($conn,"SELECT * FROM tblinventory WHERE productcode='".$barcode."' AND invoiceId='".$invoice."'");
	if(mysqli_num_rows($sql_fetch)>0){//IF THE ITEM ALREADY IN THE PURCHASE RECORD BASE FROM CASHIER ID
		while($row1=mysqli_fetch_array($sql_fetch))
		{
			$totalqty=$row1['remainingqty']+1;
			$remainingqty=$totalqty;
			$cost=$row1['cost'];
			$soldqty=$row1['soldqty'];
			$expirydate=$row1['expirydate'];
		}
		 $totalcost=$totalqty*$cost; 
		
		$delete_match="DELETE FROM tblinventory WHERE productcode='".$barcode."' AND invoiceId='".$invoice."'";
		if(mysqli_query($conn,$delete_match)){
			$data['status']=1;
		}
		
		$update_match="INSERT INTO tblinventory (invoiceId,reference,batchnumber,productcode,productname,category,unit,cost,price,totalqty,soldqty,remainingqty,totalcost,expirydate,status) VALUES 
				('".$invoice."','".$reference."','".$batchnumber."','".$barcode."','".$productname."','".$category."','".$unit."','".$cost."','".$price."','".$totalqty."','".$soldqty."','".$remainingqty."','".$totalcost."','".$expirydate."','Updating')";
		 
			 $data['total']=$total_totalcost;
		     if(mysqli_query($conn,$update_match)){
				 $data['inserted']=1;
			
			 } 
		
	}else{//IF THE ITEM IS NOT IN THE PURCHASE ADD NEW 
		$totalcost=$totalqty*$cost; 
		$insert="INSERT INTO tblinventory (invoiceId,reference,batchnumber,productcode,productname,category,unit,cost,price,totalqty,soldqty,remainingqty,totalcost,expirydate,status) VALUES 
				('".$invoice."','".$reference."','".$batchnumber."','".$barcode."','".$productname."','".$category."','".$unit."','".$cost."','".$price."','".$totalqty."','".$soldqty."','".$remainingqty."','".$totalcost."','".$expirydate."','Adding')";
		 
			 $data['total']=$total_totalcost;
		     if(mysqli_query($conn,$insert)){
				 $data['inserted']=1;
        
    }else{
     $data['status']= mysqli_error($conn);
    }
		
	}
 
    			 
		 $sqlsum=mysqli_query($conn,"SELECT * FROM tblinventory WHERE invoiceId='".$invoice."'");
			 while($row=mysqli_fetch_array($sqlsum))
			 {
				 $total_totalcost+=$row['totalcost'];
			 }
$data['total']=$total_totalcost;			 
	 }
	 echo json_encode($data);
}
?>
