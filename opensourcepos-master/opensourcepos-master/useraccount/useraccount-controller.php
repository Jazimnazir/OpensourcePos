<?php 
if(isset($_GET['save'])){

include_once('../database.php');
$response = array( 
    'status' => 0, 
    'message' => 'Form submission failed, please try again.' 
); 
date_default_timezone_set('Asia');
$date = date("d-m-Y");
$name=$_POST['name'];
$position=$_POST['position'];
$contact_number=$_POST['number'];
$address=$_POST['address'];
$gender=$_POST['gender'];
$username=$_POST['username'];
$password=$_POST['password'];
$status="Active";   
 $insert=mysqli_query($conn,"INSERT INTO tbluser (image,fullname,contact_number,gender,address,username,password,position,userstatus,date) VALUES 
 ('default-image.png','".$name."','".$contact_number."','".$gender."','".$address."','".$username."','".$password."','".$position."','".$status."','".$date."')");
 if($insert){ 
     $response['status'] = 1; 
     $response['message'] = 'Form data submitted successfully!';            
 }else{
      $response['status'] = 0; 
      $response['message'] = 'did not save to database'; 
 } 
echo json_encode($response);
}

//Update control 
if(isset($_GET['update'])){

include_once('../database.php');
$response = array( 
    'status' => 0, 
    'message' => 'Form submission failed, please try again.' 
); 
date_default_timezone_set('Asia');
$date = date("d-m-Y");
$id=$_POST['userid'];
$name=$_POST['edit-name'];
$position=$_POST['edit-position'];
$contact_number=$_POST['edit-number'];
$address=$_POST['edit-address'];
$gender=$_POST['edit-gender'];
$username=$_POST['edit-username'];
$password=$_POST['edit-password']; 
$sql="UPDATE tbluser SET fullname='".$name."',contact_number='".$contact_number."',gender='".$gender."',address='".$address."',username='".$username."',password='".$password."',position='".$position."',date='".$date."' WHERE userId='".$id."'";
 if(mysqli_query($conn,$sql)){
         $response['status'] = 1; 
     $response['message'] = 'Form data successfully updated!';  

}else{
		  $response['status'] = 0; 
          $response['message'] = "Error: ". mysqli_error($db);
}
 
  
echo json_encode($response);
}


if(isset($_POST['delete'])){
    include_once('../database.php');
    $deleteid=$_POST['id'];
    $sql="DELETE FROM tbluser WHERE userId='".$deleteid."'";
     
    if(mysqli_query($conn,$sql)){
        echo "Successfully Deleted".$deleteid;
    }else{
        echo "Error: ". mysqli_error($db);
    }
    
}
if(isset($_POST['change_status'])){
    include_once('../database.php');
    $id=$_POST['id'];
    $status=$_POST['status'];
	$newstatus;
	if($status=="Active")
	{
		$newstatus="Pending";
	}else{
		$newstatus="Active";
	}
	$update_status="UPDATE tbluser SET userstatus='".$newstatus."' WHERE userId='".$id."'";
    if(mysqli_query($conn,$update_status)){
        echo "Successfully updated";
    }else{
        echo "Error: ". mysqli_error($db);
    }
    
} 
if(isset($_POST['searching'])){
    include_once('dbconnect.php');
    $course=$_POST['course'];
    $position=$_POST['position'];
 
                  $sql=mysqli_query($conn,"SELECT * FROM tblstudent WHERE (course='".$course."') AND (position='".$position."')");
                  if(mysqli_num_rows($sql)>0){
                      $qty=0;
                      while($row=mysqli_fetch_array($sql)){
                          $qty++;
                     
                  
                  ?>
                  <tr>
            <td style="display:none;"><?php echo $row['studentId'];?></td>
                    <td><?php echo $qty;?></td>
                    <td><?php echo $row['idnumber'];?></td>
                    <td><?php echo $row['fullname'];?></td>
                    <td><?php echo $row['gender'];?></td>
                    <td><?php echo $row['birthdate'];?></td>
                    <td><?php echo $row['contactnumber'];?></td>
                    <td><?php echo $row['course'];?></td>
                    <td><?php echo $row['year'];?></td>
                    <td><?php echo $row['position'];?></td>
                    <td><?php echo $row['party'];?></td>
       
                    <td>
                    <button  id="click-edit"data-toggle="modal-update" data-target="#modal-lg" class="btn btn-default btn-sm" style="color:blue;">
                    <i class="fas fa-pen"></i>
                    </button>
                    </td>
                    <td>
                    <button  id="click-delete"  class="btn btn-default btn-sm" style="color:coral;">
                    <i class="fas fa-times"></i>
                    </button>
                  
                  </td>
                  </tr>
                  <?php
                      
                      }
                  }
                  }
                  
                  ?>


 