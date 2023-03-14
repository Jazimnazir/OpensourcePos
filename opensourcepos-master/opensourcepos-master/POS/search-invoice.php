 <?php 
				 include_once('../database.php');
				$customername;
				 $sql=mysqli_query($conn,"SELECT * FROM tblsolditem_merge INNER JOIN tblcustomer ON tblsolditem_merge.customerId=tblcustomer.customerId WHERE  tblsolditem_merge.invoiceId LIKE '%".$_POST['search']."%' OR tblcustomer.fullname LIKE '%".$_POST['search']."%' ORDER BY solditem_merge DESC");
				 if(mysqli_num_rows($sql)>0)
				 {
					 while($row=mysqli_fetch_array($sql))
					 {
				$customername='Walk-in';						 
				 $sql1=mysqli_query($conn,"SELECT * FROM tblcustomer WHERE customerId='".$row['customerId']."'");
				 while($row1=mysqli_fetch_array($sql1)){
					 $customername=$row1['fullname'];
				 }
				 
				 ?>
				 <tr>
				 <td class="p-1" style="display:none;"><?php echo $row['solditem_merge']?></td>
				 <td class="p-1"><?php echo $row['invoiceId'];?></td>
				 <td class="p-1"><?php echo $customername;?></td>
				 <td class="p-1"><?php echo $row['totalitem'];?></td>
				 <td class="p-1"><?php echo $row['amountdue'];?></td> 
				 <td class="p-1"><?php echo $row['balance'];?></td> 
				 <td class="p-1"><?php echo $row['solddate'];?></td> 
				 </tr>
				 <?php 		 
					 }
				 }	
				 ?>
                