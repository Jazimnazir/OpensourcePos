<?php

include('../database.php');
$barcode=$_POST['barcode'];
$output=''; 
$sql=mysqli_query($conn,"SELECT * FROM tblinventory WHERE productcode='".$barcode."' GROUP BY productcode");
if(mysqli_num_rows($sql)>0)
{
	
$output='<ul class="list-unstyled">';
 
 
	while($row=mysqli_fetch_array($sql))
	{
		$output.='<li>'.$row['productcode'].'-'.$row['productname'].'</li>';
		
	}
 $output.='</ul>';
}else
{
	$output='<ul class="list-unstyled"><li>No record(s) found</li></ul>';
}
 
echo $output;
?>