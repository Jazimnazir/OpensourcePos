   <table   class="table table-bordered table-hover" id="tblactivity">
                  <thead style="background-color: #007bff;color:white;font-size:0.9rem;font-weight:700;">
                 <tr>
                    <th style="display: none;">hidden(adjustmentid)</th>
                    <th style="border:none;">#</th>
                    <th style="border:none;">Created by</th>
                    <th style="border:none;">Date adjustment</th> 
                    <th style="border:none;">Reference</th> 
                    <th  style="border:none;">Details</th> 
                    <th  style="border:none;">Item(s)</th> 
                    <th  style="border:none;">Quantity</th> 
                    <th style="border:none;">Total</th>	   	  
                    <th style="border:none;">  <i class="far fa-edit"></i></th>
                  </tr>
                  </thead>
                  <tbody id="tblcandidate" class="p-0 m-0" style="font-weight:400;">
				  <?php
				  $sql=mysqli_query($conn,"SELECT * FROM tbladjustment_merge ORDER BY adjustmentdate DESC");
				  if(mysqli_num_rows($sql)>0){
					  $qty=0;
					  while($row=mysqli_fetch_array($sql)){
						  $qty++;
					 
				  
				  ?>
				  <tr>
            <td style="display:none;" class="p-0"><?php echo $row['invoiceId'];?></td>
				    <td class="p-1"><?php echo $qty;?></td>
<?php
$user='Unknown';
$sql1=mysqli_query($conn,"SELECT * FROM tbluser WHERE userId='".$row['adjustby']."'");
if(mysqli_num_rows($sql1)>0)
{
	while($row1=mysqli_fetch_array($sql1))
	{
		$user=$row1['fullname'];
	}
}
echo "<td class='p-1'>".$user."</td>";

?>					
				    <td class="p-1"><?php echo $row['adjustmentdate'];?></td> 
				    <td class="p-1"><?php echo $row['reference'];?></td> 
				    <td class="p-1"><?php echo $row['details'];?></td>
				    <td class="p-1"><?php echo $row['totalitem'];?></td>
				    <td class="p-1"><?php echo $row['totalqty'];?></td>
				    <td class="p-1"><?php echo $row['totalcost'];?></td>
					 
				 
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
                  </tbody>
                  
                </table>