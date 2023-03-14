  <?php
  include('../database.php');
  $invoice=$_POST['invoiceid'];
				  $sql=mysqli_query($conn,"SELECT * FROM tblsolditem WHERE invoiceId='".$invoice."' ");
				  if(mysqli_num_rows($sql)>0){
					  $qty=0;
					  while($row=mysqli_fetch_array($sql)){
						  $qty++;
					 
				  
				  ?>
				  <tr>
            <td style="display:none;"><?php echo $row['solditemId'];?></td>
				    <td><?php echo $qty;?></td> 
				    <td><?php echo $row['productcode'];?></td> 
				    <td><?php echo $row['productname'];?></td>
				    <td><?php echo $row['category'];?></td>
				    <td><?php echo $row['unit'];?></td>
				    <td><?php echo $row['expirydate'];?></td>    
				    <td><?php echo $row['price'];?></td>    
				    <td><?php echo $row['qty'];?></td>  
				    <td><?php echo $row['subtotal'];?></td>  
					 
                  </tr>
				  <?php
				  	  
					  }
				  } 
				  
				  ?>