 <!--MODAL EDIT ITEM(S) -->
        <div class="modal modal-payment fade" id="modal-lg">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header bg-secondary">
              <h6 class="modal-title"><p id="payment-customer"></p></h6>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true" style="color:white;">&times;</span>
              </button>
            </div>
            <div class="modal-body" id="itemlist">
			<input type="hidden" id="purchaseid" value="">
				 
					 
				   <table   class="table table-bordered table-hover" id="tblactivity">
                  <thead style="background-color: #007bff;color:white;font-size:0.9rem;font-weight:0;font-family:verdana;">
                 <tr>
                    <th class="p-1" style="display: none;font-weight:400;">hidden(productid)</th> 
                    <th class="p-1"  style="border:none;font-weight:400;">Cashier</th> 
                    <th class="p-1"  style="border:none;font-weight:400;" >Date</th>
                    <th class="p-1"  style="border:none;font-weight:400;" >Amount due</th>
                    <th class="p-1"  style="border:none;font-weight:400;" >Amount paid</th>
                    <th class="p-1"   style="border:none;font-weight:400;">Actual Balance</th> 
					
                  </tr>
                  </thead>
                  <tbody id="tblpayment"> 
                  </tbody>
                  
                </table>
				
		  
            </div>
      
     
            
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
 <!--END OF EDIT ITEM(S) -->