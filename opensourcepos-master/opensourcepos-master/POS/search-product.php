<?php

include('../database.php');
$barcode=$_POST['barcode'];
$output=''; 
$sql=mysqli_query($conn,"SELECT * FROM tblinventory WHERE productcode LIKE '%".$barcode."%' OR productname LIKE '%".$barcode."%'GROUP BY productcode LIMIT 0,3");
if(isset($_POST['barcode']))
{
	if(mysqli_num_rows($sql)>0)
{
	
$output='<ul class="list-unstyled" id="product_filter">';
 
 
	while($row=mysqli_fetch_array($sql))
	{
		$output.='<li data-id="'.$row['productcode'].'">'.$row['productcode'].'-'.$row['productname'].'</li>';
		
	}
 $output.='</ul>';
}else
{
	$output='<ul class="list-unstyled"><li>No record(s) found</li></ul>';
}
}
 
echo $output;
?>