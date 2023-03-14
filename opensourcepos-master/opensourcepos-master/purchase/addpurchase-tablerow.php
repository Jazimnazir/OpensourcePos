<?php
				  $total_allitem=0;
				  $grandtotal_allitem = 0;
				  $sql=mysqli_query($conn,"SELECT * FROM tblpurchase ORDER BY purchaseid DESC");
				  if(mysqli_num_rows($sql)>0){
					  $qty=0;
					  while($row=mysqli_fetch_array($sql)){
						  $qty++;  
						  $grandtotal=$row['grandtotal'];   
						  $total_allitem+=$grandtotal;
						  $grandtotal_allitem = $total_allitem-0;
 
				$result = '.<tr>
					<td style="display:none;">'.$row['purchaseId'].';</td>
					<td>'.$qty.'</td>
					<td> 
						 <div class="input-group input-group-sm m-0 p-0" >
						    
						  <input type="search" id="productname" name="productname" class="form-control" value="'.$row['productcode'].'-'.$row['productname'].'" style="font-size:1rem;"disabled>

						<div class="input-group-append"  >
						  <button type="submit" id="btn-edit"class="btn btn-default text-primary" style="font-size:0.6rem;">
							<i class="fas fa-pen"></i>
						  </button>
						</div>
				
					  
					  </div>
					</td>
					<td><input type="text" class="form-control"value="'.$row['unit'].'" disabled></td>
					<td><input type="text" class="form-control"value="'.$row['cost'].'" disabled></td>
					<td><input type="number" id="totalqty" class="form-control" value="'.$row['totalqty'].'"></td>  
					<td><input type="text" id="totalperitem" class="form-control" value="'.$grandtotal.'"disabled></td> 
					<td style="display:none;" >'.$grandtotal.' </td> 
					<td>
					<button  id="click-delete"  class="btn btn-default btn-sm" style="color:coral;font-size:0.7rem;">
                    <i class="fas fa-times"></i>
                    </button>
					</td>
				 </tr>';
					echo $result;    
				 
					  }
				  }
			 
				  ?>