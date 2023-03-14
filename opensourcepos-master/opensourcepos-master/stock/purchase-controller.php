<?php 
if(isset($_GET['save'])){

include_once('../database.php');
$response = array( 
    'status' => 0, 
    'message' => 'Form submission failed, please try again.' 
); 
//date_default_timezone_set('Asia').
$date = date("Y-m-d");

$code = $_POST['productcode'];
$productname = $_POST['productname'];
$secondname = $_POST['secondname'];
$unit = $_POST['unit'];
$cost = $_POST['cost'];
$price = $_POST['price'];
$qty = 0;
$alertqty = $_POST['alertqty'];
$image = 'blankpicture.png';
$supplierid = "####";
$supplier = $_POST['supplier'];
$status = 'Added';
$insert = mysqli_query($conn,"INSERT INTO tblproduct (supId,supname,productcode,proname,secondname,prounit,cost,price,quantity,alertqty,expiredate,proimage,productstatus)
VALUES ('".$supplierid."','".$supplier."','".$code."','".$productname."','".$secondname."','".$unit."','".$cost."','".$price."','".$qty."','".$alertqty."','0','".$image."','".$status."')");

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
//date_default_timezone_set('Asia').
$date = date("Y-m-d");
$productid=$_POST['productid'];
$code = $_POST['edit-productcode'];
$productname = $_POST['edit-productname'];
$secondname = $_POST['edit-secondname'];
$unit = $_POST['edit-unit'];
$cost = $_POST['edit-cost'];
$price = $_POST['edit-price'];
$alertqty = $_POST['edit-alertqty'];
$supplierid = "####";
$supplier = $_POST['edit-supplier'];
$status = 'Updated';
 $sql="UPDATE tblproduct SET supId='".$supplierid."',supname='".$supplier."',productcode='".$code."',proname='".$productname."',secondname='".$secondname."',prounit='".$unit."',cost='".$cost."',price='".$price."',alertqty='".$alertqty."',productstatus='".$status."' WHERE productId='".$productid."'";
 
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
    $sql="DELETE FROM tblproduct WHERE productId='".$deleteid."'";
     
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


 