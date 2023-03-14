<?php 
if(isset($_GET['save'])){

include_once('../database.php');
$data['status']=0;
$name=$_POST['name'];
$code=$_POST['code'];
$sql=mysqli_query($conn,"INSERT INTO tblcategory (category,code) VALUES ('".$name."','".$code."')");
if(!$sql)
{
	$data['status']="ERROR DATABASE";
}
 
 
echo json_encode($data);
}

//Update control 
if(isset($_GET['update'])){

include_once('../database.php');
 include_once('../database.php');
$data['status']=0;
$categoryid=$_POST['categoryid'];
$name=$_POST['edit-name'];
$code=$_POST['edit-code'];
  $sql=mysqli_query($conn,"UPDATE tblcategory SET category='".$name."',code='".$code."' WHERE categoryId='".$categoryid."'");
  if(!$sql)
  {
	  $data['status']='ERROR DATABASE PLEASE DO CHECK';
  }
echo json_encode($data);
}


if(isset($_POST['delete'])){
    include_once('../database.php');
    $deleteid=$_POST['id'];
    $sql="DELETE FROM tblcategory WHERE categoryId='".$deleteid."'";
     
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
	$update_status="UPDATE tblcustomer SET status='".$newstatus."' WHERE customerId='".$id."'";
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


 