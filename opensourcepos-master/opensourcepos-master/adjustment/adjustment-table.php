  
<?php  
if(!(isset($_SESSION['userid'])))
{
session_start();	
}
include_once('../database.php');?>
  <?php
				  $cashierid=$_SESSION['userid'];
		 
				  $total_allitem=0;
				  $grandtotal_allitem=0;
				  $addtotal=0;
				  $removetotal=0;
				  $sql=mysqli_query($conn,"SELECT * FROM tbladjustment WHERE userId='".$cashierid."' AND adjustment_type='Addition' AND status='adjusting'");
					if(mysqli_num_rows($sql)>0)
					{
						while($row=mysqli_fetch_array($sql))
						{
							$addtotal+=$row['totalcost'];
						}
					} 
					
					$sql=mysqli_query($conn,"SELECT * FROM tbladjustment WHERE userId='".$cashierid."' AND adjustment_type='Subtraction' AND status='adjusting'");
					if(mysqli_num_rows($sql)>0)
					{
						while($row=mysqli_fetch_array($sql))
						{
							$removetotal+=$row['totalcost'];
						}
					}
				  $sql=mysqli_query($conn,"SELECT * FROM tbladjustment WHERE userId='".$cashierid."' AND status='adjusting'");
				  if(mysqli_num_rows($sql)>0){
					  $qty=0;
					  while($row=mysqli_fetch_array($sql)){
						  $qty++;  
						  $grandtotal=$row['totalcost'];    
				  ?>
				 <tr>
					<td class="p-1" style="display:none;"><?php echo $row['inventoryId'];?></td>
					<td class="p-1" ><?php echo $qty;?></td>
					<td class="p-1" > <?php echo $row['productcode']."-".$row['productname'];?></td> 
					<td class="p-1" ><?php echo $row['unit']?></td>
					<td class="p-1" ><?php echo $row['category']?></td>
					<td class="p-1" ><?php echo $row['cost']?></td>
					<td class="p-1" ><?php echo $row['supplier']?></td>
					<td class="p-1" ><?php echo $row['expirydate']?></td>
				 
					<td class="p-1" >
					<select class="form-control p-0" id="adjustment_type">
						<?php
						echo "<option>".$row['adjustment_type']."</option>";
						if($row['adjustment_type']=='Addition')
						{
							echo "<option>Subtraction</option>";
						}else
						{
							echo "<option>Addition</option>";
						}
						
						?>
					</select>
					</td>  
					<td class="p-1" ><input type="text" id="qty" class="form-control p-0"value="<?php echo $row['qty'];?>"></td>  
					<td class="p-2" ><?php echo $row['cost'];?></td>  
					<td class="p-1" ><input type="text" id="totalperitem" class="form-control p-0" value="<?php echo $grandtotal;?>"disabled></td> 
					<td class="p-1"  style="display:none;" > <?php echo $grandtotal;?> </td> 
					<td class="p-1" >
					<button  id="btn-delete"  class="btn btn-default btn-sm p-0" style="color:coral;font-size:0.7rem;">
                    <i class="fas fa-times"></i>
                    </button>
					</td>
				 </tr>
				  
				  <?php
				  	  
					  }
				  }
				  
				  ?>	
 