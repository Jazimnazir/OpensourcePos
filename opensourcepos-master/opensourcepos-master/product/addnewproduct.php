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
							  <label>Product code  <b style="color:coral;">*</b> <b style="color:coral;font-weight:300;font-size:0.7rem;display:none;" id="legend">Unavailable</b></label>
								<div class="input-group input-group-md" id="datepicker">
									<input type="text" class="form-control"  id="productcode" name="productcode" required>
									<span class="input-group-append" id="generate_code">
										<span class="input-group-text bg-white">
										<i class="fas fa-barcode"></i>
										</span>
									</span>
								</div>
							 </div> 
               
	 
				<div class="form-group">
                    <label  >Product name<b style="color:coral;">*</b></label>
						<input type="text" class="form-control" id="productname" name="productname"  required> 
                  </div>
				  <div class="form-group">
                  <label>Second name</label>
                   <input type="text" class="form-control" id="secondname" name="secondname"   > 
                </div>
				    <div class="form-group">
                    <label for="exampleInputEmail1">Category<b style="color:coral;">*</b></label>
					 
                      <select class="custom-select" id="category" name="category" required>
					  <option>-Select-</option>
					     <?php
						 $sql=mysqli_query($conn,"SELECT * FROM tblcategory");
						 if(mysqli_num_rows($sql)>0)
						 {
							 while($row=mysqli_fetch_array($sql))
							 {
								 echo "<option>".$row['category']."</option>";
							 }
						 }
						 ?>
                       <option>Other</option>
						  
                        </select>
             </div>
				 </div>
				 <div class="col-sm-6">
				   <div class="form-group">
                    <label for="exampleInputEmail1">Unit<b style="color:coral;">*</b></label>
                      <select class="custom-select" id="unit" name="unit" required>
					      <options>-select-</option>
					      <option>PCS</option>
					      <option>BOX</option>
					      <option>TRAY</option>
					      <option>DOZEN</option>
					      <option>KILO(S)</option>
                       
						  
                        </select>
             </div>
				<div class="form-group">
                    <label for="exampleInputEmail1">Product Cost<b style="color:coral;">*</b></label>
                    <input type="text" class="form-control" id="cost" name="cost" placeholder="0.00"  required>
                  </div>
			 	<div class="form-group">
                    <label for="exampleInputEmail1">Product Price<b style="color:coral;">*</b></label>
                    <input type="text" class="form-control" id="price" name="price" placeholder="0.00" required>
                  </div>
			 
				 	<div class="form-group">
                    <label for="exampleInputEmail1">Alert Quantity</label>
                    <input type="text" class="form-control" id="alertqty" name="alertqty" placeholder="0.00" required>
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