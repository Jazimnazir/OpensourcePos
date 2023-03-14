<?php
if(isset($_POST['fetching'])){
	include('../database.php');
	 $id=$_POST['id'];
	$data['status']=0;
	$data['code']=0;
	$data['name']=0;
	$data['expiry']=0;
	$data['cost']=0;
	$data['price']=0;
	$data['category']='';
	$data['unit']='';
	$sql=mysqli_query($conn,"SELECT * FROM tblinventory WHERE inventoryId='".$id."'");
	 if(mysqli_num_rows($sql)>0){ 
		 while($row=mysqli_fetch_array($sql))
		 {
			 $data['status']=1;
			 $data['code']=$row['productcode'];
			 $data['name']=$row['productname'];
			 $data['category']=$row['category'];
			 $data['unit']=$row['unit'];
			 $data['expiry']=$row['expirydate'];
			 $data['cost']=$row['cost'];
			 $data['price']=$row['price'];  
			 
			
  
		 }
		 
  			 
	 }
	 echo json_encode($data);
}
?>
