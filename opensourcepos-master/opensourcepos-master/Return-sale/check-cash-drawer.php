<?php
include_once('../database.php');
$sql=mysqli_query($conn,"SELECT * FROM tblcashregister WHERE cashierId='".$_SESSION['userid']."' AND status='cashin'");
if(!(mysqli_num_rows($sql)>0))
{
		  echo("<script language='JavaScript'>
        window.location.href='../Cash-drawer/index.php';
        </script>");

}
?>