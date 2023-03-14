<?php 
include('../database.php');
if(isset($_POST['search'])){
 $search = mysqli_real_escape_string($conn,$_POST['search']);

$query = "SELECT * FROM tblinventory WHERE (productcode like'%".$search."%' || productname like'%".$search."%') AND remainingqty > 0 GROUP BY  productcode LIMIT 0,5";
 $result = mysqli_query($conn,$query);

 $response = array();
 while($row = mysqli_fetch_array($result) ){
   $response[] = array("value"=>$row['productcode'],"label"=>$row['productname'].' - '.$row['productcode']);
 }

 echo json_encode($response);
}

exit;


?>