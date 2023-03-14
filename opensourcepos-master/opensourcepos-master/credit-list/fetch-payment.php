  <?php
  include('../database.php');
  $invoice=$_POST['invoiceid'];
				  $sql=mysqli_query($conn,"SELECT * FROM tblcredititem_merge WHERE invoicesold='".$invoice."' ");
				  if(mysqli_num_rows($sql)>0){
 
					  while($row=mysqli_fetch_array($sql)){
					 
					 
				  
				  ?>
				  <tr>
            <td style="display:none;"><?php echo $row['credititem_mergeId'];?></td> 
				    <td><?php echo $row['cashierId'];?></td> 
				    <td><?php echo $row['date'];?></td>
				    <td><?php echo $row['paying_balance'];?></td>
				    <td><?php echo $row['amountpaid'];?></td>
				    <td><?php echo $row['balance'];?></td>      
					 
                  </tr>
				  <?php
				  	  
					  }
				  } 
				  
				  ?>