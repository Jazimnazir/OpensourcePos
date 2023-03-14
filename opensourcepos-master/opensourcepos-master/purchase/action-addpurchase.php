    <!--MODAL PAGE-->
       <div class="modal fade" id="modal-lg">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header bg-secondary">
              <h4 class="modal-title"> Add Product</h4> 
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true" style="color:white;">&times;</span>
              </button>
            </div>
            <div class="modal-body">
			<form id="productform"enctype="multipart/form-data">
			<div class="row">
			 
			<input type="hidden" value="saving" name="insert" id="insert">
			<div class="col-sm-6">
                <div class="form-group">
                    <label >Product code*</label>
                    <input type="text" class="form-control" id="productcode" name="productcode" placeholder="Required"> 
                  </div>
	 
				<div class="form-group">
                    <label  >Product name*</label>
						<input type="text" class="form-control" id="productname" name="productname"  placeholder="Required" > 
                  </div>
				  <div class="form-group">
                  <label>Second name</label>
                   <input type="text" class="form-control" id="secondname" name="secondname"   > 
                </div>
				   <div class="form-group">
                    <label for="exampleInputEmail1">Unit*</label>
                      <select class="custom-select" id="unit" name="unit">
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
                    <input type="text" class="form-control" id="cost" name="cost" placeholder="Required"  >
                  </div>
			 	<div class="form-group">
                    <label for="exampleInputEmail1">Product Price*</label>
                    <input type="text" class="form-control" id="price" name="price" placeholder="Required" >
                  </div>
			 
				 	<div class="form-group">
                    <label for="exampleInputEmail1">Alert Quantity</label>
                    <input type="text" class="form-control" id="alertqty" name="alertqty" placeholder="Required">
                  </div>
		  	<div class="form-group">
                    <label for="exampleInputEmail1">Supplier*</label>
                    <input type="text" class="form-control" id="supplier" name="supplier" placeholder="Required">
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