<?php

 include('../database.php');
 $data = array();
 if(!empty($_GET['name']))
 {
	 $name = strtolower(trim($_GET['name']));
	 $sql=mysqli_query($conn,"SELECT supname FROM tblsupplier WHERE LOWER(supname) LIKE '%".$name."%'");
	 while($row=mysqli_fetch_assoc($sql))
	 {
		 array_push($data, $row['supname']);
	 }
 }
 echo json_encode($data);exit;
?>