      <!--MODAL PAGE-->
       <div class="modal modal-editproduuct fade" id="modal-lg">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header bg-secondary">
              <h5 class="modal-title">Edit Information</h5> 
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true" style="color:white;">&times;</span>
              </button>
            </div>
            <div class="modal-body">
			<form id="productform"enctype="multipart/form-data">
			<div class="row">
			 
			<input type="hidden" name="id" id="id"> 
		 
                    <input type="hidden" class="form-control" id="stock" name="stock" > 
			<div class="col-sm-6 float-left">  
                 
                <div class="form-group">
                    <p class="m-0">Item Code</p>
                    <input type="text" class="form-control" id="edit-productcode" name="edit-productcode" disabled> 
                  </div>
	 
				<div class="form-group">
                    <p class="m-0">Product name</p>
						<input type="text" class="form-control" id="edit-productname" name="edit-productname" disabled> 
                  </div>
				 
				 	<div class="form-group">
                    <p class="m-0">Cost*</p>
                    <input type="text" class="form-control" id="edit-cost" name="edit-cost">
                  </div>
 
				<div class="form-group">
							  <p class="m-0">Expiry Date (Mm-dd-yyyy) <b style="color:coral;">*</b></p>
								<div class="input-group input-group m-0 p-0 date" id="datepicker1">
									<input type="text" class="form-control" id="edit-expirydate" name="edit-expirydate">
									<span class="input-group-append">
										<span class="input-group-text bg-white">
										<i class="fa fa-calendar"></i>
										</span>
									</span>
								</div>
							 </div> 
				 
				 </div>
				 			<div class="col-sm-6 float-left">  
 
				  				<div class="form-group">
                    <p class="m-0"  >Category</p>
						<input type="text" class="form-control" id="edit-category" name="edit-category" disabled> 
                  </div>  
				  				<div class="form-group">
                    <p class="m-0"  >Unit</p>
						<input type="text" class="form-control" id="edit-unit" name="edit-unit" disabled> 
                  </div>  				  
				 			 	<div class="form-group">
                    <p class="m-0">Price*</p>
                    <input type="text" class="form-control" id="edit-price" name="edit-price" disabled>
                  </div>
				 </div>
				</div>
				 <div class="modal-footer">
               
              
			  <button type="button" class="btn btn-success" id="update-product"  data-dismiss="modal">Save changes</button>
			  <button type="button" class="btn btn-warning" data-dismiss="modal" id="cancel">Cancel</button>
            </div>
					 </form>
            </div>
			
		 
            
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
	  	  <script type="text/javascript">
	  $(function(){
		 $('#datepicker1').datepicker(); 
	  });
	  </script>		