<?php 
include('../database.php');
if(isset($_POST['search'])){
 $search = mysqli_real_escape_string($conn,$_POST['search']);

 $query = "SELECT * FROM tblsupplier WHERE supname like'%".$search."%'";
 $result = mysqli_query($conn,$query);

 $response = array();
 while($row = mysqli_fetch_array($result) ){
   $response[] = array("value"=>$row['supname'],"label"=>$row['supId'].'-'.$row['supname']);
 }

 echo json_encode($response);
}

exit;


?>