
 
	<div class="modal modal-payment fade" id="tbl-payment" tabindex="-1" role="dialog" >
  <div class="modal-dialog" role="document" style="margin-left:22%;">
    <div class="modal-content" style="width:700px;">
      <div class="modal-header">
        <h6 class="modal-title" id="exampleModalLabel">Payment form</h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="background:#faf0f085;padding-right:0;margin-right:3px;">
	  <input type="hidden" id="payment_invoice" value="#">
	  <input type="hidden" id="payment_reference" value="#">
	  <div class="row">
		<div class="col-md-12">
					<div class="col-md-7 float-left" style="height:400px;background-color:#eee;">
					<div class="form-group" >
					                     <p class="m-0">Balance:</p>
						<input type="text" id="f_total" name="f_total" class="form-control float-right" style="height:40px;font-size:20px;font-weight:700;" value="" disabled>
                     <p class="m-0">Amount Paid:</p><i style="color:red;float:left;font-size:10px;display:none;" id="amount-legend">Required*</i>
					 <div class="input-group input-group-md m-0 p-0" >
						    
						  <input type="search" id="cash_tender" name="cash_tender" class="form-control float-right" placeholder="0.00">
					 

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
			<div class="col-md-5 float-left" style="font-size:15px;font-weight:700;background-color:#eee;">  	
				 <div class="form-group float-left" style="font-weight:400;"> 
					<p>Details:</p>
					<p>Reference #:</p>
					<p>Supplier:</p>
					<p>Purchase date:</p>
					<p>Total item:</p>
					<p>Quantity:</p>
					<p>Sub total:</p>
					<p>Discount:</p>
					<p>Grand total:</p>
					<p>paid:</p>
					<p>Balance:</p>
					  					  	 
                 </div>  
				 <div class="form-group float-left" style="margin-left:15px;" > 
					<p>*****</p> 
					<p id="txt-reference"></p>
					<p id="txt-supplier"></p>
					<p id="txt-purchasedate"></p>
					<p id="txt-totalitem"></p>
					<p id="txt-qty"></p>
					<p id="txt-subtotal"></p>
					<p id="txt-discount"></p>
					<p id="txt-grandtotal"></p>
					<p id="txt-paid"></p>
					<p id="txt-balance"></p>
					  					  	 
                 </div>  
				  
			</div>
		</div>
		<div class="col-md-12">
      <div class="modal-footer m-0 p-0"  >
        <button type="button" class="btn btn-primary col-md-7 float-left m-0" id="submitpayment">Submit payment</button>
        <button type="button" class="btn btn-warning col-md-4 float-left" id="cancel" data-dismiss="modal" >Cancel</button>
      </div>
      </div>
    </div>
    </div>
  </div>
</div>
</div>