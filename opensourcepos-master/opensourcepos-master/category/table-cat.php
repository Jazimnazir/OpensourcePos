   <table   class="table table-bordered table-hover" id="tblactivity" >
                  <thead style="background-color: #007bff;color:white;font-size:0.9rem;font-weight:700;">
                 <tr>
                    <th style="display: none;">hidden(productid)</th>
                    <th style="border:none;">#</th> 
                    <th style="border:none;" >Category name</th>
                    <th  style="border:none;">Code</th>   
                    <th style="border:none;" width="20">  <i class="far fa-edit"></i></th>
                    <th style="border:none;" width="20" <i class="far fa-trash-alt"></i></th>
                  </tr>
                  </thead>
                  <tbody id="tblcandidate">
				  <?php
				  $sql=mysqli_query($conn,"SELECT * FROM tblcategory ORDER BY categoryId DESC ");
				  if(mysqli_num_rows($sql)>0){
					  $qty=0;
					  while($row=mysqli_fetch_array($sql)){
						  $qty++;
					 
				  
				  ?>
				  <tr>
            <td style="display:none;" class="p-1"><?php echo $row['categoryId'];?></td>
				    <td class="p-1"><?php echo $qty;?></td> 
				    <td class="p-1"><?php echo $row['category'];?></td> 
				    <td class="p-1"><?php echo $row['code'];?></td> 
			 

					<td class="p-1">
					<button  id="click-edit"data-toggle="modal-update" data-target="#modal-lg" class="btn btn-default btn-sm" style="color:#ffff;background-color:#007bff;opacity: 0.8;font-size:0.7rem;">
                    <i class="fas fa-pen"></i>
                    </button>
				    </td>
					<td class="p-1">
					<button  id="click-delete"  class="btn btn-default btn-sm" style="color:coral;font-size:0.7rem;">
                    <i class="fas fa-times"></i>
                    </button>
				  
				  </td>
                  </tr>
				  <?php
				  	  
					  }
				  }
				  
				  ?>
                  </tbody>
                  
                </table>