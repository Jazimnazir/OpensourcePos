	<div class="modal modal-solditem fade" id="tbl-payment" tabindex="-1" role="dialog" >
  <div class="modal-dialog" role="document" style="margin-left:22%;">
    <div class="modal-content" style="width:750px;">
      <div class="modal-header">
        <h6 class="modal-title" id="exampleModalLabel">Sales list (Select invoice number to return item)</h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="background:#faf0f085;padding-right:0;margin-right:3px;">
	   <div class="card-tools float-left" style="margin-left:1.0rem;">
					  <div class="input-group input-group-sm" style="width:100%;padding-top:0.5rem;">
						   
						  <input type="search" id ="search_invoice" name="search_invoice" class="form-control float-right" placeholder="Search product code, name here" style="width:400px;">

						<div class="input-group-append">
						  <button type="submit" class="btn btn-default">
							<i class="fas fa-search"></i>
						  </button>
						</div>
				
					  
					  </div>
					</div>
					
			                   <table class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
                 <thead style="background:black;color:white;font-size:10px;">
    <tr>
	<th class="th-md" style="display:none;">ID# HIDDEN
      </th>
	<th class="th-md">Invoice#
      </th>
	<th class="th-md">customer
      </th>
 
	  <th class="th-md">item(s)
      </th>
	  	  <th class="th-md">Paid
      </th>
	  	  <th class="th-md">Balance
      </th>
	  	  <th class="th-md">Date
      </th> 
    </tr>
  </thead>
                  <tbody id="tblsoldcustomer">
				 <?php 
				 include_once('../database.php');
				$customername;
				 $sql=mysqli_query($conn,"SELECT * FROM tblsolditem_merge ORDER BY solditem_merge DESC");
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
                  </tbody>
                   
                </table>

					
      </div>

 
    </div>
  </div>
</div>