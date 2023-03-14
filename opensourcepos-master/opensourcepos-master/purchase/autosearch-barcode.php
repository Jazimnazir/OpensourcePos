<?php 
include('../database.php');
if(isset($_POST['search'])){
 $search = mysqli_real_escape_string($conn,$_POST['search']);

 $query = "SELECT * FROM tblproduct WHERE productcode like'%".$search."%' or proname like '%".$search."%'";
 $result = mysqli_query($conn,$query);

 $response = array();
 while($row = mysqli_fetch_array($result) ){
   $response[] = array("value"=>$row['productcode'],"label"=>$row['proname'].' - '.$row['productcode']);
 }

 echo json_encode($response);
}

exit;


?>