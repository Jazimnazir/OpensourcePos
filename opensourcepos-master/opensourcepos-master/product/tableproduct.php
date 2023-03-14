   <table   class="table table-bordered table-hover" id="tblactivity">
                  <thead style="background-color: #007bff;color:white;font-size:0.9rem;font-weight:700;">
                 <tr>
                    <th style="display: none;">hidden(productid)</th>
                    <th style="border:none;">#</th>
                    <th style="border:none;">Image</th> 
                    <th  style="border:none;">Item Code</th> 
                    <th style="border:none;">Product Name</th>	
                    <th style="border:none;">Second name</th>  
                    <th style="border:none;">Category</th>
                    <th style="border:none;">Unit</th>
                    <th style="border:none;">Cost</th>  
                    <th style="border:none;">Price</th>    
                    <th style="border:none;">Qty</th>    
                    <th style="border:none;">Alert Qty</th>   
                    <th style="border:none;">  <i class="far fa-edit"></i></th>
                    <th style="border:none;"> <i class="far fa-trash-alt"></i></th>
                  </tr>
                  </thead>
                  <tbody id="tblproduct">
				  <?php
				  $sql=mysqli_query($conn,"SELECT * FROM tblproduct ORDER BY productId DESC");
				  if(mysqli_num_rows($sql)>0){
					  $qty=0;
					  while($row=mysqli_fetch_array($sql)){
						  $qty++;
					 
				  
				  ?>
				  <tr>
            <td style="display:none;" class="p-1"><?php echo $row['productId'];?></td>
				    <td class="p-1"><?php echo $qty;?></td>
				    <td class="p-1"></td>  
				    <td class="p-1"><?php echo $row['productcode'];?></td>
				    <td class="p-1"><?php echo $row['proname'];?></td>
				    <td class="p-1"><?php echo $row['secondname'];?></td>
				    <td class="p-1"><?php echo $row['category'];?></td>
				    <td class="p-1"><?php echo $row['prounit'];?></td>
				    <td class="p-1"><?php echo $row['cost'];?></td>
				    <td class="p-1"><?php echo $row['price'];?></td>
				    <td class="p-1">
						<?php
							$available=0;
							$sql1=mysqli_query($conn,"SELECT remainingqty FROM tblinventory WHERE productcode='".$row['productcode']."' AND remainingqty > 0");
							while($row1=mysqli_fetch_array($sql1))
							{
								$available+=$row1['remainingqty'];
							}
							echo number_format($available,2,'.',','); 
						?>
					
					</td>
				    <td class="p-1"><?php echo number_format($row['alertqty'],2,'.',',');?></td>
	                 <td class="p-1">
					<button  id="click-edit"data-toggle="modal-update" data-target="#modal-lg" class="btn btn-default btn-sm" style="color:#ffff;background-color:#007bff;opacity: 0.8;font-size:0.7rem;">
                    <i class="fas fa-pen"></i>
                    </button>
				    </td>
					<td class="p-1">
					<button  id="click-delete"  class="btn btn-default btn-sm" style="color:coral;font-size:0.7rem;">
                    <i class="fas fa-times"></i>
                    </button>
				  
				  </td>
                  </tr>
				  <?php
				  	  
					  }
				  }
				  
				  ?>
                  </tbody>
                  
                </table>