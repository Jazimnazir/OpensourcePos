<?php
	session_start();
if(isset($_POST['login'])){
 
	include('database.php');
	$data['status']=0;
	$username=$_POST['username'];
	$password=$_POST['password'];
	 
	$sql=mysqli_query($conn,"SELECT * FROM tbluser WHERE username='".$username."' AND password='".$password."'");
	if(mysqli_num_rows($sql)>0){
		$data['status']=1;
		while($row=mysqli_fetch_array($sql)){
			$_SESSION['userid']=$row['userId'];
			$_SESSION['usertype']=$row['position']; 
			$_SESSION['fullname']=$row['fullname'];
			$_SESSION['label']=6;
			
		}
	}
	echo json_encode($data);
}
?>