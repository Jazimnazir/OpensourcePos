					<?php
					include('../database.php');
					$invoiceid=$_GET['invoice'];
					
					$sql=mysqli_query($conn,"SELECT * FROM tblsolditem WHERE invoiceId='".$invoiceid."' AND qty > 0  GROUP BY productcode");
					while($row=mysqli_fetch_array($sql))
					{
						
					
					
					?>
					<tr>
					<td style="display:none;"><?php echo $row['productcode'];?></td>
					<td><?php echo $row['productname'];?></td>
					<td><?php echo $row['unit'];?></td>
					<td><?php echo $row['price'];?></td>
					 
					<?php
					$qty=0;
					$subtotal=0;
					$sql1=mysqli_query($conn,"SELECT * FROM tblsolditem WHERE invoiceId='".$_GET['invoice']."' AND productcode='".$row['productcode']."'");
					while($row1=mysqli_fetch_array($sql1))
					{
						$qty+=$row1['qty'];
						$subtotal+=$row1['subtotal'];
					}
					
					?> 
					
					<td><?php echo $qty?></td>
					<td><?php echo $subtotal?></td>
					</tr>
					<?php }?>
					 