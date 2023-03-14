<?php

$conn = mysqli_connect('127.0.0.1','root','','pointofsaledb');
if(!$conn){
	die('failed connection to database'. mysqli_error($conn));
	
}
?>