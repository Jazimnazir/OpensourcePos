<?php
if(!(isset($_SESSION['userid'])))
{
	session_start();
}
include_once('../database.php');
$cashierid=$_SESSION['userid'];
$sql=mysqli_query($conn,"SELECT * FROM tblcart   WHERE cashierId='".$cashierid."' GROUP BY productcode ORDER BY cartId ASC");
if(mysqli_num_rows($sql)>0){
	while($row=mysqli_fetch_array($sql))
	{
		$qty=0;
		$subtotal=0;
		$sqltotal=mysqli_query($conn,"SELECT * FROM tblcart WHERE productcode='".$row['productcode']."' AND cashierId='".$cashierid."'");
		while($row1=mysqli_fetch_array($sqltotal)){
			$qty+=$row1['qty'];
			$subtotal+=$row1['subtotal'];
		}
?>

 <tr class="p-1" id="<?php echo $row['productcode'];?>">
				  <td class="p-1" style="display:none;"><?php echo $row['productcode'];?></td>
				   
				   <td class="p-1"><?php echo $row['productname']?></td> 
				  <td class="p-1"><?php echo $row['unit']?></td>
				  <td class="p-1"><?php echo $row['price']?></td>
				  <td class="p-1"> 
				   <div class="input-group input-group-sm" style="width:120px;" >
						    <div class="input-group-append">
						 
						</div> 
						  <input type="text" id="totalqty" name="totalqty" class="form-control float-right" value="<?php echo $qty;?>" style="padding:1px;height:30px;width:60px;text-align:center;" disabled>
  <div class="input-group-append">
						  
						</div>
						 
				
					  
					  </div>
				  
				  </td>
				  <td class="p-1"><?php echo number_format($subtotal,2,'.',',');?></td>
				   <td class="p-1" style="text-align:center;">
				  <button class="btn btn-default btn-sm" id="removeitem">
				   <i class="fas fa-minus m-0 p-0"  style="color:coral;font-size:15px;"></i>
				  </button>
				  </td>
				  
				 
				  </tr>
				  <?php
				  	}
	
}

				  ?>