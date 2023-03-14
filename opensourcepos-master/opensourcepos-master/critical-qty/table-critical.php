   <table   class="table table-bordered table-hover" id="tblactivity">
                  <thead style="background-color:orange;color:white;font-size:0.9rem;font-weight:700;">
                 <tr>
                    <th style="display: none;">hidden(adjustmentid)</th>
                    <th style="border:none;">#</th>
                    <th style="border:none;">Item code</th>
                    <th style="border:none;">Product name</th> 
                    <th style="border:none;">Category</th> 
                    <th  style="border:none;">Unit</th> 
                    <th  style="border:none;">Expiry date</th> 
                    <th  style="border:none;">Price</th> 
                    <th  style="border:none;">Alert qty</th> 
                    <th style="border:none;">Qty</th>	   	   
                  </tr>
                  </thead>
                  <tbody id="tblcandidate" class="p-0 m-0" style="font-weight:400;">
				  <?php
				  $remainingqty=0;
				  $sql=mysqli_query($conn,"SELECT * FROM tblinventory WHERE status='stockin' GROUP BY productcode ");
				  if(mysqli_num_rows($sql)>0)
				  {
					  while($row=mysqli_fetch_array($sql))
					  {
						  $count=mysqli_query($conn,"SELECT SUM(remainingqty) FROM tblinventory WHERE productcode='".$row['productcode']."'");
						   $row_qty=mysqli_fetch_row($count);
						   $remainingqty=$row_qty[0];
				  $sql1=mysqli_query($conn,"SELECT * FROM tblproduct WHERE productcode='".$row['productcode']."' AND alertqty >= '".$remainingqty."'");
				  
				  if(mysqli_num_rows($sql1)>0){
					  $qty=0;
					  while($row1=mysqli_fetch_array($sql1)){
						  $qty++;
					 
				  
				  ?>
				  <tr>
            <td style="display:none;" class="p-0"><?php echo $row1['productId'];?></td>
				    <td class="p-1"><?php echo $qty;?></td>
				    <td class="p-1"><?php echo $row1['productcode'];?></td>
				    <td class="p-1"><?php echo $row1['proname'];?></td>
				    <td class="p-1"><?php echo $row1['category'];?></td>
				    <td class="p-1"><?php echo $row1['prounit'];?></td>
				    <td class="p-1"><?php echo $row1['expiredate'];?></td>
				    <td class="p-1"><?php echo $row['price'];?></td>
				    <td class="p-1"><?php echo $row1['alertqty'];?></td>
				    <td class="p-1"><?php echo $remainingqty;?></td>
 				     
					 
				 
	                 
                  </tr>
				  <?php
				  	  
						}
					  }
					}
				  }
				  
				  ?>
                  </tbody>
                  
                </table>