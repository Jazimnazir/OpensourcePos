<?php 
				 include_once('../database.php');
				 
				 $sql=mysqli_query($conn,"SELECT * FROM tblcustomer WHERE fullname LIKE '%".$_POST['search']."%'");
				 if(mysqli_num_rows($sql)>0)
				 {
					 while($row=mysqli_fetch_array($sql))
					 { 
				 ?>
				 <tr>
				 <td class="p-1" style="display:none;"><?php echo $row['customerId']?></td>
				 <td class="p-1" ><?php echo $row['fullname'];?></td>
				 <td class="p-1" ><?php echo $row['gender'];?></td>
				 <td class="p-1" ><?php echo $row['number'];?></td>
				 <td class="p-1" ><?php echo $row['address'];?></td> 
				 </tr>
				 <?php 		 
					 }
				 }
				 ?>
                 