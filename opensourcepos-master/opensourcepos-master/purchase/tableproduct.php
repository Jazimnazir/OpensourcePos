   <table   class="table table-bordered table-hover" id="tblactivity">
                  <thead style="background-color: #007bff;color:white;font-size:0.9rem;font-weight:700;">
                 <tr>
                    <th style="display: none;">hidden(productid)</th>
                    <th style="border:none;">#</th>
                    <th style="border:none;">Reference</th>
                    <th style="border:none;">Supplier</th>
                    <th  style="border:none;">Purchase Date</th> 
                    <th  style="border:none;">Item(s)</th> 
                    <th  style="border:none;">Quantity</th> 
                    <th style="border:none;">Total Cost</th>	
                    <th style="border:none;">Discount</th>	
                    <th style="border:none;">Grand Total</th>	
                    <th style="border:none;">Paid</th>	
                    <th style="border:none;">Balance</th>	  
                    <th style="border:none;">Status</th>	  
                    <th style="border:none;">Pay</th>	  
                    <th style="border:none;">  <i class="far fa-edit"></i></th>
                  </tr>
                  </thead>
                  <tbody id="tblcandidate" class="p-0 m-0" style="font-weight:400;">
				  <?php
				  $sql=mysqli_query($conn,"SELECT * FROM tblinventory_merge");
				  if(mysqli_num_rows($sql)>0){
					  $qty=0;
					  while($row=mysqli_fetch_array($sql)){
						  $qty++;
					 
				  
				  ?>
				  <tr>
            <td style="display:none;" class="p-0"><?php echo $row['invoiceId'];?></td>
				    <td class="p-1"><?php echo $qty;?></td> 
				    <td class="p-1"><?php echo $row['reference'];?></td> 
				    <td class="p-1"><?php echo $row['supname'];?></td>
				    <td class="p-1"><?php echo $row['purchasedate'];?></td>
				    <td class="p-1"><?php echo $row['totalitem'];?></td>
				    <td class="p-1"><?php echo $row['totalqty'];?></td>
				    <td class="p-1"><?php echo number_format($row['totalcost'],2,'.',',');?></td>
				    <td class="p-1"><?php echo number_format($row['discount'],2,'.',',');?></td>
				    <td class="p-1"><?php echo number_format($row['grandtotal'],2,'.',',');?></td>
				    <td class="p-1"><?php echo number_format($row['paid'],2,'.',',');?></td>
				    <td class="p-1"><?php echo number_format($row['balance'],2,'.',',');?></td>
					<td class="p-1">
					<?php 
					if($row['status']=="Order")
					{
						echo "<span class='badge bg-warning' id='status'>".$row['status']."</span>";
					}else if($row['status']=='Pending')
					{
						echo "<span class='badge bg-danger' id='status'>".$row['status']."</span>";
					}
					else{
						echo "<span class='badge bg-success' id='status'>".$row['status']."</span>";
					}
					
					?>
					
					</td>
					<td class="p-1" width="20">
					<button  id="btn-payment"  class="btn btn-default btn-sm m-0" style="color:#ffff;background-color:#007bff;opacity: 0.8;font-size:0.7rem;">
                    Pay
                    </button>
					
				    </td>
				 
	                 <td class="p-1" width="20">
					<button  id="click-edit"data-toggle="modal-update" data-target="#modal-lg" class="btn btn-default btn-sm m-0" style="color:#ffff;background-color:#007bff;opacity: 0.8;font-size:0.7rem;">
                    <i class="fas fa-pen"></i>
                    </button>
					
				    </td>
				 
                  </tr>
				  <?php
				  	  
					  }
				  }
				  
				  ?>
                  </tbody>
                  
                </table>