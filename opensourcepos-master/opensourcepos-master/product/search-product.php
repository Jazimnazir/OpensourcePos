 <?php
 include('../database.php');
				  $sql=mysqli_query($conn,"SELECT * FROM tblproduct WHERE productcode LIKE '%".$_POST['search']."%' OR proname LIKE '%".$_POST['search']."%' ORDER BY productId DESC");
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
								$available=+$row1['remainingqty'];
							}
							echo number_format($available,2,'.',',');
						?>
					
					</td>
				    <td class="p-1"><?php echo $row['alertqty'];?></td>
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
                 