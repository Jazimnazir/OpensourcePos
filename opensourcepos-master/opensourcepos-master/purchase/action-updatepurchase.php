       <div class="modal-update modal fade" id="modal-lg">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header bg-secondary">
              <h4 class="modal-title">Update Product information</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true" style="color:white;">&times;</span>
              </button>
            </div>
            <div class="modal-body">
      <form id="updateform"enctype="multipart/form-data">
	   <input type="hidden" class="form-control" id="productid" name="productid"> 
			<div class="row">
			 
			<input type="hidden" value="saving" name="insert" id="insert">
			<div class="col-sm-6">
                <div class="form-group">
                    <label >Product code*</label>
                    <input type="text" class="form-control" id="edit-productcode" name="edit-productcode"> 
                  </div>
	 
				<div class="form-group">
                    <label  >Product name*</label>
						<input type="text" class="form-control" id="edit-productname" name="edit-productname"> 
                  </div>
				  <div class="form-group">
                  <label>Second name</label>
                   <input type="text" class="form-control" id="edit-secondname" name="edit-secondname"> 
                </div>
				   <div class="form-group">
                    <label for="exampleInputEmail1">Unit*</label>
                      <select class="custom-select" id="edit-unit" name="edit-unit">
					      <option>-select-</option>
					      <option>PCS</option>
					      <option>BOX</option>
					      <option>TRAY</option>
					      <option>DOZEN</option>
					      <option>KILO(S)</option>
                       
						  
                        </select>
             </div>
				 </div>
				 <div class="col-sm-6">
				 
				<div class="form-group">
                    <label for="exampleInputEmail1">Product Cost*</label>
                    <input type="text" class="form-control" id="edit-cost" name="edit-cost">
                  </div>
			 	<div class="form-group">
                    <label for="exampleInputEmail1">Product Price*</label>
                    <input type="text" class="form-control" id="edit-price" name="edit-price">
                  </div>
			 
				 	<div class="form-group">
                    <label for="exampleInputEmail1">Alert Quantity</label>
                    <input type="text" class="form-control" id="edit-alertqty" name="edit-alertqty">
                  </div>
		  	<div class="form-group">
                    <label for="exampleInputEmail1">Supplier*</label>
                    <input type="text" class="form-control" id="edit-supplier" name="edit-supplier">
                  </div>
		 
			 </div>
		 
				</div>
				 <div class="modal-footer">
               
               <input type="submit" name="submit"   class="col-md-4 btn btn-primary btn-save" value="Save changes"> 
			  
			  <button type="button" class="btn btn-warning" data-dismiss="modal">Cancel</button>
            </div>
					 </form>
            </div>
      
     
            
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>