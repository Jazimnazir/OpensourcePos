       <div class="modal-update modal fade" id="modal-lg">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header bg-secondary">
              <h4 class="modal-title">Update Supplier</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true" style="color:white;">&times;</span>
              </button>
            </div>
            <div class="modal-body">
      <form id="updateform"enctype="multipart/form-data">
	   <input type="hidden" class="form-control" id="supplierid" name="supplierid"> 
			<div class="row">
			 
			<input type="hidden" value="saving" name="insert" id="insert">
			<div class="col-sm-6">
               
				<div class="form-group">
                    <label  >Supplier name*</label>
						<input type="text" class="form-control" id="edit-name" name="edit-name"  > 
                  </div>
				  <div class="form-group">
                  <label>Contact Number*</label>
                   <input type="text" class="form-control" id="edit-number" name="edit-number"   > 
                </div>
				<div class="form-group">
                  <label>Address*</label>
                   <input type="text" class="form-control" id="edit-address" name="edit-address"   > 
                </div>
				   <div class="form-group">
                    <label for="exampleInputEmail1">Gender</label>
                      <select class="custom-select" id="edit-gender" name="edit-gender"> 
					      <option>Optional</option>
					      <option>MALE</option>
					      <option>FEMALE</option>
                       
						  
                        </select>
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