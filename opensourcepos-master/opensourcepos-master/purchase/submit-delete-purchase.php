<?php
if(isset($_POST['delete'])){
	include('../database.php');
	 $invoice=$_POST['invoice']; 
	
	$delete="DELETE FROM tblinventory WHERE invoiceId='".$invoice."'";
	if(mysqli_query($conn,$delete)){
		echo "Deleted succesfuly";
        
    }else{
		echo mysqli_error($conn);
    }
	$delete="DELETE FROM tblinventory_merge WHERE invoiceId='".$invoice."'";
	if(mysqli_query($conn,$delete)){
		echo "Deleted succesfuly";
        
    }else{
		echo mysqli_error($conn);
    }
 
}
?>
