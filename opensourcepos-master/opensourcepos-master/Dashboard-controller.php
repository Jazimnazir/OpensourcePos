<?php 
if(isset($_GET['save'])){

$uploadDir = 'candidatefile/'; 
$response = array( 
    'status' => 0, 
    'message' => 'Form submission failed, please try again.' 
); 
 
// If form is submitted 
if(isset($_POST['fullname']) || isset($_POST['file'])){ 
 $fullname=$_POST['fullname'];
 $gender=$_POST['gender'];
 $birthdate=$_POST['birthdate'];
 $contactnumber=$_POST['contactnumber'];
 $course=$_POST['course'];
 $year=$_POST['year'];
 $idnumber=$_POST['idnumber'];
 $position=$_POST['position'];
 $party=$_POST['party']; 
    // Check whether submitted data is not empty 
    if(!empty($fullname) && !empty($position)){
             
            
            $uploadStatus = 1; 
             
            // Upload file 
            $uploadedFile = ''; 
            if(!empty($_FILES["file"]["name"])){ 
                 
                // File path config 
                $fileName = basename($_FILES["file"]["name"]); 
                $targetFilePath = $uploadDir . $fileName; 
                $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION); 
                 
                // Allow certain file formats 
                $allowTypes = array('pdf', 'doc', 'docx', 'jpg', 'png', 'jpeg'); 
                if(in_array($fileType, $allowTypes)){ 
                    // Upload file to the server 
                    if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){ 
                        $uploadedFile = $fileName; 
                    }else{ 
                        $uploadStatus = 0; 
                        $response['message'] = 'Sorry, there was an error uploading your file.'; 
                    } 
                }else{ 
                    $uploadStatus = 0; 
                    $response['message'] = 'Sorry, only PDF, DOC, JPG, JPEG, & PNG files are allowed to upload.'; 
                } 
            } 
             
            if($uploadStatus == 1){ 
                // Include the database config file 
                include_once 'dbconfig.php'; 
                 
                // Insert form data in the database 
                $insert = $db->query("INSERT INTO tblstudent (fullname,course,year,idnumber,gender,birthdate,contactnumber,image,votestatus,position,party,studentstatus) VALUES ('".$fullname."','".$course."','".$year."','".$idnumber."','".$gender."','".$birthdate."','".$contactnumber."','".$uploadedFile."','Voting','".$position."','".$party."','Active')"); 
                 
                if($insert){ 
                    $response['status'] = 1; 
                    $response['message'] = 'Form data submitted successfully!'; 
                } 
            }else{
                 $response['status'] = 0; 
                    $response['message'] = 'did not save to database'; 
            } 
        
    }else{ 
     
    echo "fillup un empty fields";
    
         $response['message'] = 'Please fill all the mandatory fields (name and email).'; 
    } 
} 
 
// Return response 
echo json_encode($response);
}

if(isset($_GET['update'])){
    include_once('dbconfig.php');
 $id=$_POST['edit-studentid'];
 $fullname=$_POST['edit-fullname'];
 $gender=$_POST['edit-gender'];
 $birthdate=$_POST['edit-birthdate'];
 $contactnumber=$_POST['edit-contactnumber'];
 $course=$_POST['edit-course'];
 $year=$_POST['edit-year'];
 $idnumber=$_POST['edit-idnumber'];
 $position=$_POST['edit-position'];
 $party=$_POST['edit-party']; 
 $sql="UPDATE tblstudent SET fullname='".$fullname."', course='".$course."',year='".$year."',idnumber='".$idnumber."',gender='".$gender."',birthdate='".$birthdate."',contactnumber='".$contactnumber."',position='".$position."',party='".$party."' WHERE studentId='".$id."'";

if(mysqli_query($db,$sql)){
    echo "Successfuly updated";

}else{
            echo "Error: ". mysqli_error($db);
}

}

if(isset($_POST['delete'])){
    include_once('dbconfig.php');
    $deleteid=$_POST['id'];
    $sql="DELETE FROM tblstudent WHERE studentId='".$deleteid."'";
     
    if(mysqli_query($db,$sql)){
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


 