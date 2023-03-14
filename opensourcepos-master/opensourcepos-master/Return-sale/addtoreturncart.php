<?php

include('../database.php');
$sql=mysqli_query($conn,"SELECT * FROM tblsolditem WHERE solditemId='".$soldid."'");
if(mysqli_num_rows($sql)>0)
{
	while($row=mysqli_fetch_array($sql))
	{
		$
	}
}


?>