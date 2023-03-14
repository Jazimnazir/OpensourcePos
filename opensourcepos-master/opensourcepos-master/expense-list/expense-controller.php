<?php 
session_start();
include_once('../database.php');
if(isset($_GET['save'])){
 
 $userid=$_SESSION['userid'];
 $user=$_SESSION['fullname']; 
 $details=$_POST['details'];
 $amount=$_POST['amount'];
 $category=$_POST['category'];
 $date=date('m/d/Y');
 $status='added';
 $data['status']=0;
 $sql=mysqli_query($conn,"INSERT INTO tblexpense (userId,createdby,Details,category,amount,dateofexp,expstatus) VALUES 
 ('".$userid."','".$user."','".$details."','".$category."','".$amount."','".$date."','".$status."')");
 if(!$sql)
 {
	 $data['status']='Something went error in sql';
 }
echo json_encode($data);
}

//Update control 
if(isset($_GET['update'])){
 $id=$_POST['expenseid'];
 $userid=$_SESSION['userid'];
 $user=$_SESSION['fullname']; 
 $details=$_POST['edit-details'];
 $amount=$_POST['edit-amount'];
 $category=$_POST['edit-category'];
 $date=date('m/d/Y');
 $status='updated';
 $data['status']=0;
 $sql=mysqli_query($conn,"UPDATE tblexpense SET userId='".$userid."',createdby='".$user."',details='".$details."',amount='".$amount."',category='".$category."',dateofexp='".$date."' WHERE expId='".$id."'");
 if(!$sql)
 {
	 $data['status']='Something went error in sql';
 }
echo json_encode($data);
 
}


if(isset($_POST['delete'])){
    include_once('../database.php');
    $deleteid=$_POST['id'];
    $sql="DELETE FROM tblexpense WHERE expId='".$deleteid."'";
     
    if(mysqli_query($conn,$sql)){
        echo "Successfully Deleted".$deleteid;
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


 