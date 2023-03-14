	<div class="modal modal-creditlist fade" id="tbl-payment" tabindex="-1" role="dialog" style="max-height:600px;">
  <div class="modal-dialog" role="document" style="margin-left:10%;">
    <div class="modal-content" style="width:950px;">
      <div class="modal-header">
        <h6 class="modal-title" id="exampleModalLabel">Select Invoice #(Credit list)</h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="background:#faf0f085;padding-right:0;margin-right:3px;opacity:0.7;">
			                   <table id="tblcourse" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
                 <thead style="background:black;color:white;font-size:10px;">
    <tr>
	<th class="th-md" style="display:none;">ID# HIDDEN
      </th>
	  	  	  <th class="th-md">Order date
      </th> 
	<th class="th-md">Invoice #
      </th>
	<th class="th-md">Customer name
      </th>
 
	  <th class="th-md">Item(s)
      </th>
	  	  <th class="th-md">Subtotal
      </th> 
	  	  	  <th class="th-md">Discount
      </th> 
	  	  	  <th class="th-md">Amount due
      </th> 
	  	  	  <th class="th-md">Paid
      </th> 
	  	  	  <th class="th-md">balance
      </th> 
    </tr>
  </thead>
                  <tbody id="tblcreditlist">
				 <?php 
				 include_once('../database.php');
				 
				 $sql=mysqli_query($conn,"SELECT * FROM tblsolditem_merge WHERE balance >  0 ORDER BY solditem_merge DESC ");
				 if(mysqli_num_rows($sql)>0)
				 {
					   
					 while($row=mysqli_fetch_array($sql))
					 {
						 $customername='Walk-in';
						  $sql1=mysqli_query($conn,"SELECT * FROM tblcustomer WHERE customerId='".$row['customerId']."'");
						  while($row1=mysqli_fetch_array($sql1))
						  {
							  $customername=$row1['fullname'];
						  }
				 ?>
				 <tr>
				 <td style="display:none;"><?php echo $row['customerId']?></td>
				 <td><?php echo $row['time'];?></td>
				 <td><?php echo $row['invoiceId'];?></td>
				 <td><?php echo $customername;?></td>
				 <td><?php echo $row['totalitem'];?></td>
				 <td><?php echo $row['totalprice'];?></td>
				 <td><?php echo $row['discount'];?></td>
				 <td><?php echo $row['amountdue'];?></td>
				 <td><?php echo $row['paid']?></td>
				 <td><?php echo $row['balance']?></td> 
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