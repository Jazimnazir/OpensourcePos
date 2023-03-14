				  <?php
				  include('../database.php');
				  $subtotal=0;
				  $price;
				  $batchnumber=0;
				  $sql=mysqli_query($conn,"SELECT * FROM tblinventory WHERE productcode LIKE '%".$_POST['search']."%' OR productname LIKE '%".$_POST['search']."%' GROUP BY productcode,price,expirydate ORDER BY expirydate DESC");
				  if(mysqli_num_rows($sql)>0){
					  $qty=0;
					  $price=0;
					  $remainingqty=0;
					  while($row=mysqli_fetch_array($sql)){
						  $qty++;
						 $price=$row['price'];
						 $batchnumber=$row['batchnumber'];
						 $expiry=$row['expirydate'];
						 $price=$row['price'];
				  
				  ?>
				  <tr>
            <td style="display:none;" class="p-0"><?php echo $row['invoiceId'];?></td>
            <td class="p-1"><?php echo $qty;?></td>
            <td class="p-1"><?php echo $row['productcode'];?></td>
            <td class="p-1"><?php echo $row['productname'];?></td> 
            <td class="p-1"><?php echo $row['category'];?></td> 
            <td class="p-1"><?php echo $row['unit'];?></td> 
			
            <td class="p-1"><?php echo $row['expirydate'];?></td> 
            <td class="p-1"><?php echo $row['cost'];?></td> 
            <td class="p-1"><?php echo $row['price'];?></td> 
			<?php
			$totalqty=0; 
				$sql1=mysqli_query($conn,"SELECT * FROM tblinventory WHERE productcode='".$row['productcode']."' AND category='".$row['category']."' AND expirydate='".$row['expirydate']."' AND price='".$row['price']."'");
				while($row1=mysqli_fetch_array($sql1))
				{
					$totalqty+=$row1['totalqty'];
				} 
				echo " <td class='p-1'>".number_format($totalqty,2,'.',',')."</td>";
			?>
						<?php
			$sold=0;
			$subtotal_sold=0;
				$sql1=mysqli_query($conn,"SELECT * FROM tblinventory WHERE productcode='".$row['productcode']."' AND category='".$row['category']."' AND expirydate='".$row['expirydate']."' AND price='".$row['price']."'");
				while($row1=mysqli_fetch_array($sql1))
				{
					$sold+=$row1['soldqty'];
				}
				$subtotal_sold=$sold*$price;
				echo " <td class='p-1'>".number_format($sold,2,'.',',')."</td>";
			?>
			
			<?php
			$remainingqty=0;
			$subtotal_remain=0;
				$sql1=mysqli_query($conn,"SELECT * FROM tblinventory WHERE productcode='".$row['productcode']."' AND category='".$row['category']."' AND expirydate='".$row['expirydate']."' AND price='".$row['price']."'");
				while($row1=mysqli_fetch_array($sql1))
				{
					$remainingqty+=$row1['remainingqty'];
				}
				$subtotal_remain=$remainingqty*$price;
				echo " <td class='p-1'>".number_format($remainingqty,2,'.',',')."</td>";
			?>
			
 
			 
				  <td class="p-1" width="100">
					<button  id="click-edit"data-toggle="modal-update" data-target="#modal-lg" class="btn btn-default btn-sm m-0" style="color:#ffff;background-color:#007bff;opacity: 0.8;font-size:0.7rem;">
                    <i class="fas fa-pen"></i>
                    </button>
					
				    </td>
                  </tr>
				  <?php
				  	  
					  }
				  }
				  
				  ?>