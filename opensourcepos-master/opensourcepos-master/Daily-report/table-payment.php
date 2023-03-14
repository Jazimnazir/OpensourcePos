   <table   class="table table-bordered table-hover" id="tblactivity">
                  <thead style="background-color:orange;color:white;font-size:0.9rem;font-weight:700;">
                 <tr>
                    <th style="display: none;">hidden(adjustmentid)</th>
                    <th style="border:none;">Day</th>
                    <th style="border:none;">Revenue</th>
                    <th style="border:none;">Total Cost</th> 
                    <th style="border:none;">Margin</th> 
                    <th style="border:none;">Expenses</th> 
                    <th  style="border:none;">Profit</th>      
                  </tr>
                  </thead>
                  <tbody id="tblcandidate" class="p-0 m-0" style="font-weight:400;">
				  <?php
				  
				  $sql1=mysqli_query($conn,"SELECT * FROM tblpayment_history");
				  
				  if(mysqli_num_rows($sql1)>0){
					  $qty=0;
					  while($row1=mysqli_fetch_array($sql1)){
						  $qty++;
					 
				  
				  ?>
				  <tr>
            <td style="display:none;" class="p-0"><?php echo $row1['paymentId'];?></td>
				    <td class="p-1"><?php echo $qty;?></td>
				    <td class="p-1"><?php echo $row1['paidby'];?></td>
				    <td class="p-1"><?php echo $row1['date'];?></td>
				    <td class="p-1"><?php echo $row1['payment_type'];?></td>
				    <td class="p-1"><?php echo $row1['reference'];?></td>
				    <td class="p-1"><?php echo $row1['total'];?></td>
				    <td class="p-1"><?php echo $row1['cashtend'];?></td>
				    <td class="p-1"><?php echo $row1['paid'];?></td>
				    <td class="p-1"><?php echo $row1['balance'];?></td> 
 				     
					 
				 
	                 
                  </tr>
				  <?php
				  	  
						}
					  }
				 
				  
				  ?>	
                  </tbody>
                  
                </table>