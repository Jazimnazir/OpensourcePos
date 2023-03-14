<?php
if(isset($_POST['updating'])){
	include('../database.php');
	 $id=$_POST['id'];
	 $code=$_POST['code'];
	 $name = $_POST['name'];
	 $cost=$_POST['cost'];
	 $price=$_POST['price'];
	 $expirydate=$_POST['expirydate'];
	 $data['status']=0;
	 $data['total']=0;
	 $total_totalcost=0; 
     $qty=$_POST['qty'];
	 $totalcost=$qty * $cost;
	$updatepro=mysqli_query($conn,"UPDATE tblproduct SET expiredate='".$expirydate."', cost='".$cost."' WHERE productcode='".$code."'");
	$update="UPDATE tblpurchase SET productcode='".$code."',productname='".$name."',cost='".$cost."',price='".$price."',expirydate='".$expirydate."',totalcost='".$totalcost."' WHERE purchaseId='".$id."'";
	if(mysqli_query($conn,$update)){
				 $data['status']=1;
        
    }else{
     $data['status']= mysqli_error($conn);
    }
			 $sqlsum=mysqli_query($conn,"SELECT * FROM tblpurchase");
			 while($row=mysqli_fetch_array($sqlsum))
			 {
				 $total_totalcost+=$row['totalcost'];
			 }
				$data['total']=$total_totalcost;			 
	 
 
	 echo json_encode($data);
}
?>
