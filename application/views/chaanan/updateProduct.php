<div class="main-content">
        <section class="section">
          <div class="section-body">
            <div class="row">
              <div class="col-md-12">
                <div class="card">
                  <div class="card-header">
                   <h4><a href="<?php echo base_url();?>index.php/apanel/product_entry/"><?php echo $smallTitle;?></a></h4>
                  </div>
                  <div class="card-body">
                     	<form method="post"	action="<?php echo base_url()?>apanelForms/updateproduct" enctype="multipart/Form-data" >
							<div class="card-body">
								<div class="row" id="regForm">
									<div class="col-md-12 col-lg-12 col-xs-12">
										<div class="row">
										    <?php if($this->uri->segment(3)){
										    $this->db->where("id",$this->uri->segment(3));
										    $pro=$this->db->get("stock_products");
										      ?>
										      <?php $i=1; foreach($pro->result() as $row1):?>
										    <input type="hidden" value="<?php echo $row1->id;?>" name="id">
                                           <div class="col-xs-6 col-md-6 col-lg-6">
                                            <div class="form-group row">
                                             <div class="col-md-5"><label>Product Name</label></div>
                                                <div class="col-md-7">
                                                    <div class="form-group">
                                                       <input type="text" class="form-control" name="name" value="<?php echo $row1->name;?>" readonly>
                                                    </div>
                                                   </div>
                                                </div>
                                             </div>
                                              <div class="col-xs-6 col-md-6 col-lg-6">
                                                <div class="form-group row">
                                                  <div class="col-md-5"><label>Company Name</label></div>
                                                  <div class="col-md-7">
                                                      <div class="form-group">
                                                           <input type="text" class="form-control" name="company_name" value="<?php echo $row1->company;?>" readonly>
                                                    </div>
                                                   </div>
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
                								<div class="col-md-5"><label>Selling Price</label></div>
                									<div class="col-md-7">
                								        <div class="form-group">
                                                    <input type="text" class="form-control" name="selling_price">
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
										    <?php $i++; endforeach; }?>
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
                           <!-- <th>Edit</th>-->
                            <th>Update</th>
                          </tr>
                            </thead>
                              <tbody>
                           <?php $i=1; foreach($sub->result() as $row):?>
                         <tr>
                             <td><?php echo $i;?></td>
                             <td><?php echo $row->name;?></td>
                             <td><?php echo $row->company;?></td>
                             <td> <?php if($row->image) { ?><img src="<?php echo base_url();?>assets/images/client_gallery/<?php echo $row->image;?>" height="50px;" width="80px;"><?php } ?></td>
                             <td><?php $this->db->where('id',$row->sub_category);
                                $category=$this->db->get('sub_category');
                                echo $category->row()->name;?></td>
                             <td><?php echo $row->hsn;?></td>
                             <td><?php echo $row->product_price;?></td>
                             <td></td>
                             <td><?php echo $row->selling_price;?></td>
                            <td></td>
                             <td><?php echo $row->weight;?></td>
                             <td><?php echo $row->quantity;?>
                           
                             </td>
                            <td><button type="button" class="btn btn-info " class="fa fa-pencil-square-o" id="update">
                             <a href="<?php echo base_url();?>adminController/updateProduct/<?php echo $row->id;?>">   <i class="fa fa-edit" style="color:white"></i> 
                            </button></td>
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
    </section>
</div>