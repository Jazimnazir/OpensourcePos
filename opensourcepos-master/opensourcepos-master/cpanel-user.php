<?php 
 
if(!(isset($_SESSION['userid']))){
	 print ("<script language='JavaScript'>
                  window.location.href='login.php';
				  </SCRIPT>");
}
?>