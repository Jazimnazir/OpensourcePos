<?php
	
	if(isset($_POST['generate']))
	{
		include('../database.php');
		$code=rand(1,999);
		$sum=0;
		$data['generate']='';
		$sql=mysqli_query($conn,"SELECT * FROM tblproduct ORDER BY productId DESC limit 0,1");
		while($row=mysqli_fetch_array($sql))
		
		{
			$sum=$row['productId']+1;
		}
		$data['generate']=$code.$sum;
		echo json_encode($data);
	}

?>