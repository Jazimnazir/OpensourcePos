<?php
include('../database.php');
				  $sql=mysqli_query($conn,"SELECT * FROM tblinventory_merge WHERE reference LIKE '%".$_POST['search']."%' OR supname LIKE '%".$_POST['search']."%'");
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
				    <td class="p-1"><?php echo $row['totalcost'];?></td>
				    <td class="p-1"><?php echo $row['discount'];?></td>
				    <td class="p-1"><?php echo $row['grandtotal'];?></td>
				    <td class="p-1"><?php echo $row['paid'];?></td>
				    <td class="p-1"><?php echo $row['balance'];?></td>
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
                  