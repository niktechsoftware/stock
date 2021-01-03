<div class="main-content">
        <section class="section">
          <div class="section-body">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4><a href="<?php echo base_url();?>index.php/apanel/product_entry/"><?php echo $smallTitle;?></a></h4>
                  </div>
                  <?php $categoryDe=$this->db->get("product_category");?>
                  <div class="card-body">
                     	<form method="post"	action="<?php echo base_url()?>apanelForms/addproduct1" enctype="multipart/Form-data" >
							<div class="card-body">
								<div class="row" id="regForm">
									<div class="col-md-12 col-lg-12 col-xs-12">
										<div class="row">
										    <?php if($this->uri->segment(3)){
										    $this->db->where("id",$this->uri->segment(3));
										    $pro=$this->db->get("stock_products");
										      ?>
										      <?php $i=1; foreach($pro->result() as $row1):
										      $this->db->where("id",$row1->sub_category);
										      $sub=$this->db->get("sub_category");
										      ?>
										     
										      <input type="hidden" name="pid" value="<?php echo $row1->id;?>" id="pid">
										     <div class="col-xs-6 col-md-6 col-lg-6">
                                                 <div class="form-group row">
                         	                      <div class="col-md-5"><label>Select Category </label></div>
		                                            <div class="col-md-7">
		                                              <select required="required" name ="mainCategory"  id ="mainCategory" class="form-control">
		                                                   <?php 
		                                                   $this->db->where("id",$row1->cat_id);
		                                                   $pcat=$this->db->get('product_category');
                                                           foreach($pcat->result() as $cd):?>
		                                                    <option value = "<?php echo $cd->id;if($cd->id==$row1->cat_id){echo 'selected="selected"';}?>"><?php echo $cd->category;?></option>
		                                                  <?php endforeach;?>
		                                              </select>
		                                            </div>
		                                        </div>
		                                   </div>
                                       
                                    	<div class="col-xs-6 col-md-6 col-lg-6">
                                        <div class="form-group row">
                                         <input type ="hidden" name="cateid" value = "0"/>
		                                            	<div class="col-md-5"><label>Select Sub Category</label></div>
		                                            <div class="col-md-7">
		                                                <select  name ="subCategory"  id ="subCategory" class="form-control">
		                                               <?Php  foreach($sub->result() as $sb):?>
		                                                    <option value = "<?php echo $sb->id;if($sb->id==$row1->sub_category){echo 'selected="selected"';}?>"><?php echo $sb->name;?></option>
		                                                  <?php endforeach;?>
		                                              </select>
		                                            </div>
		                                        </div>
                                         </div>  
                        	        </div>
					        	</div>
                   <div class="col-md-12 col-lg-12 col-xs-12">
			    	<div class="row">
                        <div class="col-xs-6 col-md-6 col-lg-6">
                        <div class="form-group row">
                          <div class="col-md-5"><label>Product Name</label></div>
                          <div class="col-md-7">
                              <div class="form-group">
                                   <input type="text" class="form-control" name="name" value="<?php echo $row1->name;?>">
                            </div>
                           </div>
                        </div>
                      </div>
                      <div class="col-xs-6 col-md-6 col-lg-6">
                        <div class="form-group row">
                          <div class="col-md-5"><label>Company Name</label></div>
                          <div class="col-md-7">
                              <div class="form-group">
                                   <input type="text" class="form-control" name="company_name" value="<?php echo $row1->company;?>">
                            </div>
                           </div>
                        </div>
                      </div>
                    </div> 
                </div>
                <div class="col-md-12 col-lg-12 col-xs-12">
			    	<div class="row">
                    <div class="col-xs-6 col-md-6 col-lg-6">
                        <div class="form-group row">
                          <div class="col-md-5"><label>HSN</label></div>
                          <div class="col-md-7">
                              <div class="form-group">
                                   <input type="text" class="form-control"  value="<?php echo $row1->hsn;?>"name="hsn">
                            </div>
                           </div>
                        </div>
                      </div>
                        <div class="col-xs-6 col-md-6 col-lg-6">
                        <div class="form-group row">
                          <div class="col-md-5"><label>Product Price</label></div>
                          <div class="col-md-7">
                              <div class="form-group">
                                   <input type="text" class="form-control" name="price" value="<?php echo $row1->product_price;?>">
                            </div>
                           </div>
                        </div>
                      </div>
                     </div>
                 </div>
                 <div class="col-md-12 col-lg-12 col-xs-12">
			    	<div class="row">
                       <div class="col-xs-6 col-md-6 col-lg-6">
                        <div class="form-group row">
                          <div class="col-md-5"><label>Product weight</label></div>
                          <div class="col-md-7">
                              <div class="form-group">
                                   <input type="text" class="form-control" name="weight" value="<?php echo $row1->weight;?>">
                            </div>
                           </div>
                        </div>
                      </div>
                       <div class="col-xs-6 col-md-6 col-lg-6">
                        <div class="form-group row">
                          <div class="col-md-5"><label>Product Quantity</label></div>
                          <div class="col-md-7">
                              <div class="form-group">
                                   <input type="text" class="form-control" name="quantity" value="<?php echo $row1->quantity;?>">
                            </div>
                           </div>
                        </div>
                      </div>
                     </div>
                    </div>
                    <div class="col-md-12 col-lg-12 col-xs-12">
			    	        <div class="row">
			    	    	<div class="col-xs-6 col-md-6 col-lg-6">
								<div class="form-group row">
								<div class="col-md-5"><label>Upload Image1</label></div>
									<div class="col-md-7">
									     <img src="<?php echo base_url();?>assets/images/client_gallery/<?php echo $row1->image;?>" alt="member" width="90" height="100">
									<div class="form-group">
                                <input type="file" class="form-control" name="selectedStu">
								</div>
							 </div>
						</div>
                       </div>
                       	<div class="col-xs-6 col-md-6 col-lg-6">
							<div class="form-group row">
								<div class="col-md-5"><label>Selling Price</label></div>
									<div class="col-md-7">
								        <div class="form-group">
                                    <input type="text" class="form-control" name="selling_price" value="<?php echo $row1->selling_price;?>">
									</div>
							     </div>
						    </div>
                       </div>
                     </div>
                    </div>
                </div> 
                     <!-- <div class="col-md-12 col-lg-12 col-xs-12">
			    	        <div class="row">
			    	           	<div class="col-xs-6 col-md-6 col-lg-6">
								<div class="form-group row">
								<div class="col-md-5"><label>Upload Image3</label></div>
									<div class="col-md-7">
									<div class="form-group">
                                <input type="file" class="form-control" name="selectedStu3">
								</div>
							 </div>
						</div>
                       </div>
                       	<div class="col-xs-6 col-md-6 col-lg-6">
							<div class="form-group row">
								<div class="col-md-5"><label>Upload Image4</label></div>
									<div class="col-md-7">
								        <div class="form-group">
                                    <input type="file" class="form-control" name="selectedStu4">
									</div>
							     </div>
						    </div>
                       </div>
                      </div> -->   
			    	       <div class="col-xs-6 col-md-6 col-lg-6">
												<div class="form-group row">
													<div class="col-md-5"></div>
													<div class="col-md-7">
														<div class="form-group">
															<button type="submit" class="btn btn-primary">
																<i class="far fa-edit">&nbsp;Submit</i>
															</button>
														</div>
													</div>
												</div>
											</div>  
										    <?php $i++; endforeach; } else{?>
										   
											 <div class="col-xs-6 col-md-6 col-lg-6">
                                                 <div class="form-group row">
                         	                      <div class="col-md-5"><label>Select Category </label></div>
		                                            <div class="col-md-7">
		                                              <select required="required" name ="mainCategory"  id ="mainCategory" class="form-control">
		                                                  <option value="">Select Category</option>
		                                                  <?php foreach($categoryDe->result() as $cd):?>
		                                                    <option value = "<?php echo $cd->id;?>"><?php echo $cd->category;?></option>
		                                                  <?php endforeach;?>
		                                              </select>
		                                            </div>
		                                        </div>
		                                   </div>
                                       
                                    	<div class="col-xs-6 col-md-6 col-lg-6">
                                        <div class="form-group row">
                                         <input type ="hidden" name="cateid" value = "0"/>
		                                            	<div class="col-md-5"><label>Select Sub Category</label></div>
		                                            <div class="col-md-7">
		                                                <select required name ="subCategory"  id ="subCategory" class="form-control">
		                                               
		                                              </select>
		                                            </div>
		                                        </div>
                                         </div>  
                        	        </div>
					        	</div>
                   <div class="col-md-12 col-lg-12 col-xs-12">
			    	<div class="row">
                        <div class="col-xs-6 col-md-6 col-lg-6">
                        <div class="form-group row">
                          <div class="col-md-5"><label>Product Name</label></div>
                          <div class="col-md-7">
                              <div class="form-group">
                                   <input type="text" class="form-control" name="name">
                            </div>
                           </div>
                        </div>
                      </div>
                      <div class="col-xs-6 col-md-6 col-lg-6">
                        <div class="form-group row">
                          <div class="col-md-5"><label>Company Name</label></div>
                          <div class="col-md-7">
                              <div class="form-group">
                                   <input type="text" class="form-control" name="company_name">
                            </div>
                           </div>
                        </div>
                      </div>
                    </div> 
                </div>
                <div class="col-md-12 col-lg-12 col-xs-12">
			    	<div class="row">
                    <div class="col-xs-6 col-md-6 col-lg-6">
                        <div class="form-group row">
                          <div class="col-md-5"><label>HSN</label></div>
                          <div class="col-md-7">
                              <div class="form-group">
                                   <input type="text" class="form-control" name="hsn">
                            </div>
                           </div>
                        </div>
                      </div>
                        <div class="col-xs-6 col-md-6 col-lg-6">
                        <div class="form-group row">
                          <div class="col-md-5"><label>Product Price</label></div>
                          <div class="col-md-7">
                              <div class="form-group">
                                   <input type="text" class="form-control" name="price">
                            </div>
                           </div>
                        </div>
                      </div>
                     </div>
                 </div>
                 <div class="col-md-12 col-lg-12 col-xs-12">
			    	<div class="row">
                       <div class="col-xs-6 col-md-6 col-lg-6">
                        <div class="form-group row">
                          <div class="col-md-5"><label>Product weight</label></div>
                          <div class="col-md-7">
                              <div class="form-group">
                                   <input type="text" class="form-control" name="weight">
                            </div>
                           </div>
                        </div>
                      </div>
                       <div class="col-xs-6 col-md-6 col-lg-6">
                        <div class="form-group row">
                          <div class="col-md-5"><label>Product Quantity</label></div>
                          <div class="col-md-7">
                              <div class="form-group">
                                   <input type="text" class="form-control" name="quantity">
                            </div>
                           </div>
                        </div>
                      </div>
                     </div>
                    </div>
                    <div class="col-md-12 col-lg-12 col-xs-12">
			    	        <div class="row">
			    	    	<div class="col-xs-6 col-md-6 col-lg-6">
								<div class="form-group row">
								<div class="col-md-5"><label>Upload Image1</label></div>
									<div class="col-md-7">
									<div class="form-group">
                                <input type="file" class="form-control" name="selectedStu">
								</div>
							 </div>
						</div>
                       </div>
                       <div class="col-xs-6 col-md-6 col-lg-6">
							<div class="form-group row">
								<div class="col-md-5"><label>Selling Price</label></div>
									<div class="col-md-7">
								        <div class="form-group">
                                    <input type="text" class="form-control" name="selling_price" >
									</div>
							     </div>
						    </div>
                       </div>
                     </div>
                    </div>
                </div> 
                    <!--  <div class="col-md-12 col-lg-12 col-xs-12">
			    	        <div class="row">
			    	           	<div class="col-xs-6 col-md-6 col-lg-6">
								<div class="form-group row">
								<div class="col-md-5"><label>Upload Image3</label></div>
									<div class="col-md-7">
									<div class="form-group">
                                <input type="file" class="form-control" name="selectedStu3">
								</div>
							 </div>
						</div>
                       </div>
                       	<div class="col-xs-6 col-md-6 col-lg-6">
							<div class="form-group row">
								<div class="col-md-5"><label>Upload Image4</label></div>
									<div class="col-md-7">
								        <div class="form-group">
                                    <input type="file" class="form-control" name="selectedStu4">
									</div>
							     </div>
						    </div>
                       </div>
                      </div> -->   
			    	       <div class="col-xs-6 col-md-6 col-lg-6">
												<div class="form-group row">
													<div class="col-md-5"></div>
													<div class="col-md-7">
														<div class="form-group">
															<button type="submit" class="btn btn-primary">
																<i class="far fa-edit">&nbsp;Submit</i>
															</button>
														</div>
													</div>
												</div>
											</div>
											<?php } ?>
                                    	</div>
								</div>
					</form>
                      <div id="setValue"></div>
                      
                    <div class="table-responsive">
                      <table class="table table-striped" id="table-1">
                     <?php $sub=$this->db->get("stock_products");?>

                        <thead>
                          <tr>
                            <th class="text-center">
                              #
                            </th>
                            <th> Company Name</th>
                            <th> Product Name</th>
                            <th>Product Image</th>
                            <th>Sub Category</th>
                            <th>HSN</th>
                            <th>product Price<th>
                            <th>Selling Price<th>
                            <th>Weight</th>
                            <th>Quantity</th>
                            <th>Edit</th>
                            <th>Delete</th>
                          </tr>
                            </thead>
                              <tbody>
                           <?php $i=1; foreach($sub->result() as $row):?>
                         <tr>
                             <td><?php echo $i;?></td>
                             <td><?php echo $row->name;?></td>
                             <td><?php echo $row->company;?></td>
                             <td><img src="<?php echo base_url();?>assets/images/client_gallery/<?php echo $row->image;?>" height="50px;" width="80px;"></td>
                             <td><?php $this->db->where('id',$row->sub_category);
                                $category=$this->db->get('sub_category');
                                echo $category->row()->name;?></td>
                             <td><?php echo $row->hsn;?></td>
                             <td><?php echo $row->product_price;?></td>
                             <td></td>
                             <td><?php echo $row->selling_price;?></td>
                            <td></td>
                             <td><?php echo $row->weight;?></td>
                             <td><?php echo $row->quantity;?></td>
                            <td><button type="button" class="btn btn-info">
                            <a href="<?php echo base_url();?>apanel/product_entry/<?php echo $row->id;?>">
                            <i class="fa fa-edit" style="color:white"></i>
                            </a></button></td>
                             <td><button type="button" class="btn btn-danger">
                            <a href="<?php echo base_url();?>apanelForms/deleteproduct/<?php echo $row->id;?>">
                            <i class="fa fa-trash" style="color:white"></i>
                            </a></button></td>
                             </tr>
                             <?php $i++; endforeach;?>
                       </tbody>
                        
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        </div>
    </div>
</div>
<script>
    $("#mainCategory").change(function(){
                    //alert("rah");
					var section = $("#mainCategory").val();
					//alert(section);
					$.post("<?php echo site_url('ajax/getsucategory') ?>",{section : section},function(data){
						$("#subCategory").html(data);
					});
				});
				 $("#mainCategory1").change(function(){
                    //alert("rah");
					var section = $("#mainCategory1").val();
				    var sbid = $("#subcateold").val();
					$.post("<?php echo site_url('ajax/getsucategory1') ?>",{section : section , sbid : sbid},function(data){
						$("#subCategory1").html(data);
					});
				});
                </script>