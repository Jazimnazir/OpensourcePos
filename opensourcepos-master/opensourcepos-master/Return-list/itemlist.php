  <?php
  include('../database.php');
  $invoice=$_POST['invoiceid'];
				  $sql=mysqli_query($conn,"SELECT * FROM tbladjustment WHERE adjust_invoice='".$invoice."' AND status='adjusted'");
				  if(mysqli_num_rows($sql)>0){
					  $qty=0;
					  while($row=mysqli_fetch_array($sql)){
						  $qty++;
					 
				  
				  ?>
				  <tr>
            <td style="display:none;"><?php echo $row['inventoryId'];?></td>
				    <td><?php echo $qty;?></td> 
				    <td><?php echo $row['productcode'];?></td> 
				    <td><?php echo $row['productname'];?></td>
				    <td><?php echo $row['category'];?></td> 
				    <td><?php echo $row['unit'];?></td> 
				    <td><?php echo $row['expirydate'];?></td> 
				    <td><?php echo $row['supplier'];?></td> 
				    <td><?php echo $row['adjustment_type'];?></td> 
				    <td><?php echo $row['qty'];?></td>  
				    <td><?php echo $row['totalcost'];?></td>  
					 
                  </tr>
				  <?php
				  	  
					  }
				  } 
				  
				  ?>