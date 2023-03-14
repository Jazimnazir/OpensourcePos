   <table   class="table table-bordered table-hover" id="tblactivity">
                  <thead style="background-color: #007bff;color:white;font-size:0.9rem;font-weight:700;">
                 <tr>
                    <th style="display: none;">hidden(productid)</th>
                    <th style="border:none;">#</th>
                    <th style="border:none;">Date</th>
                    <th style="border:none;">Invoice No.</th>
                    <th  style="border:none;">Customer</th> 
                    <th  style="border:none;">Item(s)</th>  
                    <th style="border:none;">Total</th>	
                    <th style="border:none;">Discount</th>	
                    <th style="border:none;">Grand Total</th>	
                    <th style="border:none;">Paid</th>	
                    <th style="border:none;">Balance</th>	   
                    <th style="border:none;">  <i class="far fa-edit"></i></th>
                  </tr>
                  </thead>
                  <tbody id="tblcandidate" class="p-0 m-0" style="font-weight:400;">
				  <?php
				  $customer='';
				  $customer_temp='';
				  $sql=mysqli_query($conn,"SELECT * FROM tblsolditem_merge");
				  if(mysqli_num_rows($sql)>0){
					  $qty=0;
					  $customer='';

					  while($row=mysqli_fetch_array($sql)){
						  $qty++;
					 
				  
				  ?>
				  <tr>
            <td style="display:none;" class="p-0"><?php echo $row['invoiceId'];?></td>
				    <td class="p-1"><?php echo $qty;?></td> 
				    <td class="p-1"><?php echo $row['solddate'];?></td> 
				    <td class="p-1"><?php echo $row['invoiceId'];?></td>  
				    <?php
				    	$sql1=mysqli_query($conn,"SELECT fullname From tblcustomer WHERE customerId='".$row['customerId']."'");
				    	if(mysqli_num_rows($sql1)>0)
				    	{
				    		while($row1=mysqli_fetch_array($sql1))
				    		{
				    			$customer_temp=$row1['fullname'];
				    		}
				    	}
				    	$customer=$customer_temp;	
				    ?>
				    <td class="p-1"><?php echo  $customer;?></td> 
				    <td class="p-1"><?php echo number_format($row['totalqty'],2,'.',',');?></td>
				    <td class="p-1"><?php echo number_format($row['totalprice'],2,'.',',');?></td>
				   <td class="p-1"><?php echo number_format($row['discount'],2,'.',',');?></td>
				    <td class="p-1"><?php echo number_format($row['amountdue'],2,'.',',');?></td>  
				    <td class="p-1"><?php echo number_format($row['paid'],2,'.',',');?></td>
				    <td class="p-1"><?php echo number_format($row['balance'],2,'.',',');?></td>
				 
					 
				 
	                 <td class="p-1" width="20">
					<button  id="click-return"data-toggle="modal-update" data-target="#modal-lg" class="btn btn-default btn-sm m-0" style="color:#ffff;background-color:#007bff;opacity: 0.8;font-size:0.7rem;">
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