   <table   class="table table-bordered table-hover" id="tblactivity">
                  <thead style="background-color: #007bff;color:white;font-size:0.9rem;font-weight:700;">
                 <tr>
                    <th style="display: none;">hidden(productid)</th>
                    <th style="border:none;">#</th> 
                    <th style="border:none;" >Fullname</th>
                    <th  style="border:none;">Contact #</th> 
                    <th style="border:none;">Address</th>	
                    <th style="border:none;">Gender</th>  
                    <th style="border:none;">Status</th>  
                    <th style="border:none;">  <i class="far fa-edit"></i></th>
                    <th style="border:none;"> <i class="far fa-trash-alt"></i></th>
                  </tr>
                  </thead>
                  <tbody id="tblcandidate">
				  <?php
				  $sql=mysqli_query($conn,"SELECT * FROM tblcustomer ORDER BY customerId DESC");
				  if(mysqli_num_rows($sql)>0){
					  $qty=0;
					  while($row=mysqli_fetch_array($sql)){
						  $qty++;
					 
				  
				  ?>
				  <tr>
            <td style="display:none;"><?php echo $row['customerId'];?></td>
				    <td><?php echo $qty;?></td> 
				    <td><?php echo $row['fullname'];?></td> 
				    <td><?php echo $row['number'];?></td>
				    <td><?php echo $row['address'];?></td>
				    <td><?php echo $row['gender'];?></td> 
					<td>
					<?php 
						if($row['status']=="Active"){
					?>
					<span class="badge bg-primary" id="btn-status"><?php echo $row['status'];?></span></td>
						<?php }?>
						<?php 
						if($row['status']=="Pending"){
					?>
					<span class="badge bg-warning" id="btn-status"><?php echo $row['status'];?></span></td>
						<?php }?>

					<td>
					<button  id="click-edit"data-toggle="modal-update" data-target="#modal-lg" class="btn btn-default btn-sm" style="color:#ffff;background-color:#007bff;opacity: 0.8;font-size:0.7rem;">
                    <i class="fas fa-pen"></i>
                    </button>
				    </td>
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
                  </tbody>
                  
                </table>