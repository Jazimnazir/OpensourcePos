   <table   class="table table-bordered table-hover" id="tblactivity">
                  <thead style="background-color:orange;color:white;font-size:0.9rem;font-weight:700;">
                 <tr>
                    <th style="display: none;">hidden(adjustmentid)</th>
                    <th style="border:none;">#</th>
                    <th style="border:none;">Date</th>
                    <th style="border:none;">Due</th>
                    <th style="border:none;">Transaction no.</th>
                    <th style="border:none;">Customer</th> 
                    <th style="border:none;">Total item</th> 
                    <th style="border:none;">Grand total</th> 
                    <th  style="border:none;">Discount</th> 
                    <th  style="border:none;">Sub total</th>       	   
                    <th  style="border:none;">Paid</th>     	   
                    <th  style="border:none;">Balance</th>     	   
                  </tr>
                  </thead>
                  <tbody id="tblcandidate" class="p-0 m-0" style="font-weight:400;">
				  <?php
				  $qty=0;
				  $customer;
				  $sql=mysqli_query($conn,"SELECT * FROM tblsolditem_merge WHERE balance > 0");
				  if(mysqli_num_rows($sql)>0)
				  {
					  while($row=mysqli_fetch_array($sql))
					  { 
						  $qty++;
					 
				  
				  ?>
				  <tr>
            <td style="display:none;" class="p-0"><?php echo $row['invoiceId'];?></td>
				    <td class="p-1"><?php echo $qty;?></td>
				    <td class="p-1"><?php echo $row['solddate'];?></td>
				    <td class="p-1"><?php echo $row['duedate'];?></td>
				    <td class="p-1"><?php echo $row['invoiceId'];?></td> 
					<?php
					$sql1=mysqli_query($conn,"SELECT * FROM tblcustomer WHERE customerId='".$row['customerId']."'");
					if(mysqli_num_rows($sql1)>0)
					{
						$customer='';
						while($row1=mysqli_fetch_array($sql1))
						{
							$customer=$row1['fullname'];
						}
					}
					?>
				    <td class="p-1"><?php echo $customer;?></td>
				    <td class="p-1" id="item"><?php echo $row['totalitem'];?></td>
				    <td class="p-1"><?php echo $row['totalprice'];?></td>
				    <td class="p-1"><?php echo $row['discount'];?></td>
				    <td class="p-1"><?php echo $row['amountdue'];?></td> 
				    <td class="p-1" id="paid"><?php echo $row['paid'];?></td> 
				    <td class="p-1"><?php echo $row['balance'];?></td> 
 				     
					 
				 
	                 
                  </tr>
				  <?php
				  	   
					}
				  }
				  
				  ?>
                  </tbody>
                  
                </table>