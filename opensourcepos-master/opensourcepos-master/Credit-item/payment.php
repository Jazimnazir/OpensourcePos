	<div class="modal modal-payment fade" id="tbl-payment" tabindex="-1" role="dialog" >
  <div class="modal-dialog" role="document" style="margin-left:22%;">
    <div class="modal-content" style="width:700px;">
      <div class="modal-header">
        <h6 class="modal-title" id="exampleModalLabel">Finalize payment (Credit list)</h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="background:#faf0f085;padding-right:0;margin-right:3px;">
	  <div class="row">
		<div class="col-md-12">
					<div class="col-md-7 float-left">
					<div class="form-group" >
					                     <p class="m-0">Amount due:</p>
						<input type="text" id="f_total" name="f_total" class="form-control float-right" style="height:40px;font-size:20px;font-weight:700;" value="<?php echo $balance;?>" disabled>
                     <p class="m-0">Amount Paid:</p>
					 <div class="input-group input-group-md m-0 p-0" >
						    
						  <input type="text" id="amountpaid" name="amountpaid" class="form-control float-right" placeholder="0.00">
					 

						<div class="input-group-append">
						  <button type="submit" class="btn btn-success" id="btn-supplier">
							<i>&#8369;</i>
						  </button>
						</div>
				
					  
					  </div>
					  					  	 
                  </div>
				  					<div class="form-group" >
                     <p class="m-0 p-0" id="change_balance">Change:</p>
					 <div class="input-group input-group-sm m-0 p-0" >
						    
						  <input type="text" id="change" name="change" class="form-control float-right" placeholder="0.00" style="height:40px;font-size:20px;font-weight:700;" disabled>
					 

				 
				
					  
					  </div> 
                  </div>
			 
		</div>
 
		</div>
		<div class="col-md-12">
      <div class="modal-footer m-0 p-0"  >
        <button type="button" class="btn btn-primary col-md-7 float-left m-0" id="submitpayment" data-dismiss="modal" >Submit payment</button>
        <button type="button" class="btn btn-warning col-md-4 float-left" id="cancel"  data-dismiss="modal">Cancel</button>
      </div>
      </div>
    </div>
    </div>
  </div>
</div>
</div>