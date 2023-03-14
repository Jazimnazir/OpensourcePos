<?php
$balance=0; 
$get_discount=0;
$sql=mysqli_query($conn,"SELECT * FROM tblreturnitem_merge WHERE invoicesold='".$_GET['invoice']."'");
if(mysqli_num_rows($sql)>0)
{
	$get_discount=0;
 
}else
{
	 $sql1=mysqli_query($conn,"SELECT * FROM tblsolditem_merge WHERE invoiceId='".$_GET['invoice']."'");
 while($row=mysqli_fetch_array($sql1))
 {
	 $get_discount=$row['discount'];
 }
	
}



$sql=mysqli_query($conn,"SELECT * FROM tblsolditem_merge WHERE invoiceId='".$_GET['invoice']."'");
while($row=mysqli_fetch_array($sql))
{
	$balance=$row['balance'];
}

?>
	<div class="modal modal-payment fade" id="tbl-payment" tabindex="-1" role="dialog" >
  <div class="modal-dialog" role="document" style="margin-left:22%;">
    <div class="modal-content" style="width:700px;">
      <div class="modal-header">
        <h6 class="modal-title" id="exampleModalLabel">Finalize Refund </h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="background:#faf0f085;padding-right:0;margin-right:3px;">
	  <div class="row">
		<div class="col-md-12">
					<div class="col-md-7 float-left"  >
					<div class="form-group" >
					<p class="m-0">Total:</p>
					<input type="text" id="f_total" name="f_total" class="form-control float-right" disabled> 
					<p class="m-0">Previous Balance:</p>
					<input type="text" id="prev_balance" name="prev_balance" value="<?php echo $balance;?>"class="form-control float-right" disabled>
						<p class="m-0">Previous Discount:</p>
					<input type="text" id="prev_discount" name="prev_discount" value="<?php echo $get_discount;?>"class="form-control float-right" disabled>
				
					<p class="m-0">Refund Amount:</p>
					<input type="text" id="refund" name="refund" class="form-control float-right" disabled>
                     <p class="m-0">Reason:</p>
					 <div class="input-group input-group-md m-0 p-0" >
						    
						  <input type="text" id="reason" name="reason" class="form-control float-right" placeholder="">
					 

						<div class="input-group-append">
						  <button type="submit" class="btn btn-success" id="btn-supplier">
							<i>&#8369;</i>
						  </button>
						</div>
				
					  
					  </div>
					  <input type="checkbox" id="mark" name="mark" class="form-control float-left" style="width:15px;height:15px;margin:3px;margin-top:10px;"> <p class="float-left" style="margin-top:5px;">Keep item(s) restock to inventory</p>					  	 
                  </div> 
				  			 
		</div>
 
 
		</div>
		<div class="col-md-12">
      <div class="modal-footer m-0 p-0"  >
        <button type="button" class="btn btn-primary col-md-7 float-left m-0" id="submitreturn" data-dismiss="modal" >Submit Return</button>
        <button type="button" class="btn btn-warning col-md-4 float-left" id="cancel"  data-dismiss="modal">Cancel</button>
      </div>
      </div>
    </div>
    </div>
  </div>
</div>
</div>