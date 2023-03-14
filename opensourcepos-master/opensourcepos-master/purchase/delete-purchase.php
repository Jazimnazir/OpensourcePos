<?php
if(isset($_POST['delete_purchase'])){
	include('../database.php');
	 $id=$_POST['id'];  
	 $total_totalcost=0;
	$update="DELETE FROM tblpurchase WHERE purchaseId='".$id."'";
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
