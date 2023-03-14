					<?php
					include('../database.php');
					$customerid=$_GET['customer'];
					
					$sql=mysqli_query($conn,"SELECT * FROM tblsolditem_merge WHERE customerId='".$customerid."'");
					while($row=mysqli_fetch_array($sql))
					{
						$total_balance+=$row['balance'];
						
					
					
					?>
					<tr>
					<td style="display:none;"><?php echo $row['solditem_merge'];?></td>
					<td><?php echo $row['time'];?></td>
					<td><?php echo $row['invoiceId'];?></td>
					<td><?php echo $row['totalitem'];?></td>
					<td><?php echo $row['totalprice'];?></td>
					<td><?php echo $row['discount'];?></td>
					<td><?php echo $row['amountdue'];?></td>
					<td><?php echo $row['paid'];?></td>
					<td><?php echo $row['balance'];?></td>
					  
					
					<?php }?>
					</tr>