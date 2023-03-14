    <!--MODAL PAGE-->
       <div class="modal fade" id="modal-lg">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header bg-secondary">
              <h4 class="modal-title"> Add User account</h4> 
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true" style="color:white;">&times;</span>
              </button>
            </div>
            <div class="modal-body">
			<form id="userform"enctype="multipart/form-data">
			<div class="row">
			 
			<input type="hidden" value="saving" name="insert" id="insert">
			<div class="col-sm-6">
               
				<div class="form-group">
                    <label  >Full name*</label>
						<input type="text" class="form-control" id="name" name="name"  > 
                  </div>
				  <div class="form-group">
                  <label>Contact Number*</label>
                   <input type="text" class="form-control" id="number" name="number"   > 
                </div>
				<div class="form-group">
                  <label>Address*</label>
                   <input type="text" class="form-control" id="address" name="address"   > 
                </div>
				    <div class="form-group">
                    <label for="exampleInputEmail1">Position</label>
                      <select class="custom-select" id="position" name="position"> 
					      <option>Admin</option>
					      <option>Cashier</option>
					      <option>Stock man</option>
                       
						  
                        </select>
             </div>
			 	 
				 </div>
					<div class="col-sm-6">
					 <div class="form-group">
                    <label for="exampleInputEmail1">Gender</label>
                      <select class="custom-select" id="gender" name="gender">  
					      <option>Male</option>
					      <option>Female</option>
                       
						  
                        </select>
             </div>
			 <div class="form-group">
                    <label  >Username*</label>
						<input type="text" class="form-control" id="username" name="username"  > 
                  </div>
				  	<div class="form-group">
                    <label  >Password*</label>
						<input type="password" class="form-control" id="password" name="password"  > 
                  </div>
				 </div>
		 
				</div>
				 <div class="modal-footer">
               
               <input type="submit" name="submit"   class="col-md-4 btn btn-primary btn-save" value="Save"> 
			  
			  <button type="button" class="btn btn-warning" data-dismiss="modal">Cancel</button>
            </div>
					 </form>
            </div>
			
		 
            
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
	  <!--END OF MODAL SAVE-->