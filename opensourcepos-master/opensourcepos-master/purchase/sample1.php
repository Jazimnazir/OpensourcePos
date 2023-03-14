<?php include_once('../database.php');?>
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
				  ?>
				 <tr>
					<td style="display:none;"><?php echo $row['purchaseId'];?></td>
					<td><?php echo $qty;?></td>
					<td> 
						 <div class="input-group input-group-sm m-0 p-0" >
						    
						  <input type="search" id="productname" name="productname" class="form-control" value="<?php echo $row['productcode']."-".$row['productname'];?>" style="font-size:1rem;"disabled>

						<div class="input-group-append"  >
						  <button type="submit" id="btn-edit"class="btn btn-default text-primary" style="font-size:0.6rem;">
							<i class="fas fa-pen"></i>
						  </button>
						</div>
				
					  
					  </div>
					</td>
					<td><input type="text" class="form-control"value="<?php echo $row['unit']?>" disabled></td>
					<td><input type="text" class="form-control"value="<?php echo $row['cost']?>" disabled></td>
					<td><input type="number" id="totalqty" class="form-control"value="<?php echo $row['totalqty'];?>"></td>  
					<td><input type="text" id="totalperitem" class="form-control" value="<?php echo $grandtotal;?>"disabled></td> 
					<td style="display:none;" > <?php echo $grandtotal;?> </td> 
					<td>
					<button  id="click-delete"  class="btn btn-default btn-sm" style="color:coral;font-size:0.7rem;">
                    <i class="fas fa-times"></i>
                    </button>
					</td>
				 </tr>
				  
				  <?php
				  	  
					  }
				  }
				  
				  ?>	
   <tr class="bg-green p-0 m-0"> 
				    <td style="padding:1px;display:none;"></td> 
				    <td style="padding:1px;"></td> 
				    <td style="padding:1px;"></td> 
				    <td style="padding:1px;"></td> 
				    <td style="padding:1px;"></td> 
				    <td style="padding:1px;"></td>  		
				    <td style="padding:1px;"></td> 	
					
					<td style="display:none;">0.00</td>
				    <td style="padding:1px;"></td> 
				    
                  </tr>
				  <tr style="border:none;"> 
				    <td style="display:none;"> </td>
				    <td> </td>
				    <td> </td>    
				    <td> </td>    
				    <td></td>   
				    <td align="right" border="none">Total:</td>   
				    <td id="total_cell">
					 <div class="input-group input-group-sm m-0 p-0" >
						    
						  <input type="number" id="total" name="total" class="form-control" value="<?php echo $total_allitem;?>" style="font-size:1rem;"disabled>

					 
				
					  
					  </div>
					</td>

					<td style="display:none;" >0.00</td>					
					<td>--</td>
                  </tr>
				     <tr> 
				    <td style="display:none;"> </td>
				    <td> </td>
				    <td> </td>    
				    <td> </td>   
				    <td> </td>     
				    <td align="right">Discount:</td>   
				    <td id="discount_cell">
					  <div class="input-group input-group-sm m-0 p-0" >
						    
						  <input type="number" id="discount" name="discount" class="form-control" value="0" style="font-size:1rem;"disabled>

						<div class="input-group-append"  >
						  <button type="submit" id="btn-discount"class="btn btn-default text-primary" style="font-size:0.6rem;">
							<i class="fas fa-pen"></i>
						  </button>
						</div>
				
					  
					  </div>
					
					
					</td>   
					
					<td style="display:none;" >0.00</td>
					<td>--</td>
                  </tr>
				  	     <tr> 
				    <td style="display:none;"> </td>
				    <td> </td>
				    <td> </td>    
				    <td> </td>      
				    <td></td>   
				    <td align="right">Grand total:</td>   
				    <td id="grandtotal_cell"> 
					 <div class="input-group input-group-sm m-0 p-0" >
						    
						  <input type="number" id="grandtotal" name="grandtotal" class="form-control" value="<?php echo $grandtotal_allitem;?>" style="font-size:1rem;"disabled>
	<div class="input-group-append"  >
						  <button type="submit" id="btn-amountpaid"class="btn btn-default text-primary" style="font-size:0.6rem;">
							<i class="fas fa-"></i>
						  </button>
						</div>
				 
				
					  
					  </div>
					</td> 

					<td style="display:none;">0.00</td>					
					<td>--</td>
                  </tr>
				        <tr>     
				    <td style="display:none;" > </td>   
				    <td> </td>   
				    <td> </td>   
				    <td> </td>   
				    <td></td>   
				    <td align="right">Paid:</td>   
				    <td id="amountpaid_cell" style="font-weight:700;">
					  <div class="input-group input-group-sm m-0 p-0" >
						    
						  <input type="number" id="cashamountpaid" name="cashamountpaid" class="form-control" value="0" style="font-size:1rem;"disabled>

						<div class="input-group-append"  >
						  <button type="submit" id="btn-amountpaid"class="btn btn-default text-primary" style="font-size:0.6rem;">
							<i class="fas fa-pen"></i>
						  </button>
						</div>
				
					  
					  </div>
					</td>  

					<td  style="display:none;">0.00</td>					
					<td>--</td>
                  </tr>
				   <tr> 
				    <td style="display:none;"></td>
				    <td></td>
				    <td> </td>    
				    <td> </td>      
				    <td></td>   
				    <td align="right">Balance:</td>   
				    <td id="balance_cell">
					  <div class="input-group input-group-sm m-0 p-0" >
						    
						  <input type="number" id="balance" name="balance" class="form-control" value="0" style="font-size:1rem;"disabled>

					 
				
					  
					  </div>
					</td>   
					<td style="display:none;" >0.00</td>
					<td>--</td>
                  </tr>