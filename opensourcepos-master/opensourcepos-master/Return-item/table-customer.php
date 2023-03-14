	<div class="modal modal-customer fade" id="tbl-payment" tabindex="-1" role="dialog" >
  <div class="modal-dialog" role="document" style="margin-left:22%;">
    <div class="modal-content" style="width:650px;">
      <div class="modal-header">
        <h6 class="modal-title" id="exampleModalLabel">Select Customer</h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="background:#faf0f085;padding-right:0;margin-right:3px;">
			                   <table id="tblcourse" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
                 <thead style="background:black;color:white;font-size:10px;">
    <tr>
	<th class="th-md" style="display:none;">ID# HIDDEN
      </th>
	<th class="th-md">Fullname
      </th>
	<th class="th-md">Gender
      </th>
 
	  <th class="th-md">Contact #
      </th>
	  	  <th class="th-md">Address
      </th> 
    </tr>
  </thead>
                  <tbody id="tblcustomer">
				 <?php 
				 include_once('../database.php');
				 
				 $sql=mysqli_query($conn,"SELECT * FROM tblcustomer WHERE remainingbalance > 0");
				 if(mysqli_num_rows($sql)>0)
				 {
					 while($row=mysqli_fetch_array($sql))
					 { 
				 ?>
				 <tr>
				 <td style="display:none;"><?php echo $row['customerId']?></td>
				 <td><?php echo $row['fullname'];?></td>
				 <td><?php echo $row['gender'];?></td>
				 <td><?php echo $row['number'];?></td>
				 <td><?php echo $row['address'];?></td> 
				 </tr>
				 <?php 		 
					 }
				 }
				 ?>
                  </tbody>
                   
                </table>

					
      </div>

 
    </div>
  </div>
</div>