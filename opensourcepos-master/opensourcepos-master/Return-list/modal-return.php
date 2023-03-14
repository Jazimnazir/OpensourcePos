 <!--MODAL EDIT ITEM(S) -->
        <div class="modal modal-itemlist fade" id="modal-lg">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header bg-secondary">
             <h6 class="modal-title"><p id="credit-customer"></p></h6>
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
                    <th class="p-1"  style="border:none;font-weight:400;">#</th> 
                    <th class="p-1"  style="border:none;font-weight:400;">Item code</th> 
                    <th class="p-1"  style="border:none;font-weight:400;" >Product name</th>
                    <th class="p-1"  style="border:none;font-weight:400;" >Category</th>
                    <th class="p-1"  style="border:none;font-weight:400;" >Unit</th>
                    <th class="p-1"   style="border:none;font-weight:400;">Expiry date</th> 
                    <th class="p-1"  style="border:none;font-weight:400;">Price</th>    
                    <th  class="p-1" style="border:none;font-weight:400;">Qty</th>    
                    <th  class="p-1" style="border:none;font-weight:400;">Sub total</th>     
                    <th  class="p-1" style="border:none;font-weight:400;">Status</th>     
                  </tr>
                  </thead>
                  <tbody id="tblitemlist"> 
                  </tbody>
                  
                </table>
				
			 
            </div>
      
     
            
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
 <!--END OF EDIT ITEM(S) -->