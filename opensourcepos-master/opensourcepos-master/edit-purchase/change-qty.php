<?php
if(isset($_POST['update_qty'])){
	include('../database.php');
	 $id=$_POST['id']; 
	 $invoice=$_POST['invoice'];
	 $qty=$_POST['totalqty']; 
	 $totalcost=$_POST['total'];
	 $total_totalcost=0;
	$update="UPDATE tblinventory SET totalqty='".$qty."',remainingqty='".$qty."',totalcost='".$totalcost."' WHERE inventoryId='".$id."' AND invoiceId='".$invoice."'";
	if(mysqli_query($conn,$update)){
				 $data['status']=1;
        
    }else{
     $data['status']= mysqli_error($conn);
    }
			 $sqlsum=mysqli_query($conn,"SELECT * FROM tblinventory WHERE invoiceId='".$invoice."'");
			 while($row=mysqli_fetch_array($sqlsum))
			 {
				 $total_totalcost+=$row['totalcost'];
			 }
				$data['total']=$total_totalcost;			 
	 
 
	 echo json_encode($data);
}
?>
