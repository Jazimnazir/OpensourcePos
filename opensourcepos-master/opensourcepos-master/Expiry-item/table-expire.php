   <table   class="table table-bordered table-hover" id="tblactivity">
                  <thead style="background-color:orange;color:white;font-size:0.9rem;font-weight:700;">
                 <tr>
                    <th style="display: none;">hidden(adjustmentid)</th>
                    <th style="border:none;">#</th>
                    <th style="border:none;">Supplier</th>
                    <th style="border:none;">Item code</th>
                    <th style="border:none;">Product name</th> 
                    <th style="border:none;">Category</th> 
                    <th  style="border:none;">Unit</th> 
                    <th  style="border:none;">Expiry date</th> 
                    <th  style="border:none;">Cost</th>   
                    <th  style="border:none;">Price</th>   
                    <th style="border:none;">Qty</th>	   	   
                  </tr>
                  </thead>
                  <tbody id="tblcandidate" class="p-0 m-0" style="font-weight:400;">
				  <?php
				  $remainingqty=0;
				  $qty=0;
				  $sql=mysqli_query($conn,"SELECT * FROM tblinventory WHERE expirydate <= '".date('m/d/Y')."' GROUP BY supplierId");
				  if(mysqli_num_rows($sql)>0)
				  {
					  while($row=mysqli_fetch_array($sql))
					  {
						  $count=mysqli_query($conn,"SELECT SUM(remainingqty) FROM tblinventory WHERE productcode='".$row['productcode']."' AND expirydate='".$row['expirydate']."'");
						   $row_qty=mysqli_fetch_row($count);
						   $remainingqty=$row_qty[0]; 
						  $qty++;
					 
				  
				  ?>
				  <tr>
            <td style="display:none;" class="p-0"><?php echo $row1['inventoryId'];?></td>
				    <td class="p-1"><?php echo $qty;?></td>
				    <td class="p-1"><?php echo $row['supplier'];?></td>
				    <td class="p-1"><?php echo $row['productcode'];?></td>
				    <td class="p-1"><?php echo $row['productname'];?></td>
				    <td class="p-1"><?php echo $row['category'];?></td>
				    <td class="p-1"><?php echo $row['unit'];?></td>
				    <td class="p-1"><?php echo $row['expirydate'];?></td>
				    <td class="p-1"><?php echo $row['cost'];?></td>
				    <td class="p-1"><?php echo $row['price'];?></td>
				    <td class="p-1"><?php echo $remainingqty;?></td>
 				     
					 
				 
	                 
                  </tr>
				  <?php
				  	   
					}
				  }
				  
				  ?>
                  </tbody>
                  
                </table>