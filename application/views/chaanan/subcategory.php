<div class="main-content">
        <section class="section">
          <div class="section-body">
            <div class="row">
              <div class="col-md-12">
                <div class="card">
                  <div class="card-header">
                    <h4><?php echo $smallTitle;?></h4>
                  </div>
                  <?php $categoryDe=$this->db->get("product_category");?>
                  <div class="card-body">
                     	<form method="post"	action="<?php echo base_url()?>apanelForms/subCategory" enctype="multipart/Form-data" >
							<div class="card-body">
								<div class="row" id="regForm">
									<div class="col-md-12 col-lg-12 col-xs-12">
										<div class="row">
										    <?php if($this->uri->segment(3)=="success"){?>
										        <div class="alert alert-success col-md-12 col-lg-12 col-xs-12">Product is done successfully entered!</div>
										    <?php }else{
										    if($this->uri->segment(3)){?>
										     <div class="alert alert-warning col-md-12 col-lg-12 col-xs-12"> Please Try Again !</div>
										    
										   <?php  }}?>
											
												
											<div class="col-xs-6 col-md-6 col-lg-6">
                                <div class="form-group row">
                                  <div class="col-md-5"><label>Category</label></div>
                                  <div class="col-md-7">
                                      <div class="form-group">
                                      <select required="required" name ="mainCategory"  id ="country" class="form-control">
                                                      <option value="">Select Category</option>
                                                          <?php foreach($categoryDe->result() as $cd):?>
                                                        <option value = "<?php echo $cd->id;?>" ><?php echo $cd->category;?></option>
                                                      <?php endforeach;?>  
                                       </select>
                            </div>
                           </div>
                        </div>
                                            </div>  
                                            <div class="col-xs-6 col-md-6 col-lg-6">
												<div class="form-group row">
													<div class="col-md-5"><label>Sub Category Name</label></div>
													<div class="col-md-7">
													    <div class="form-group">
                                   <input type="text" class="form-control" name="name">
														</div>
								                    </div>
												</div>
                      </div>
                        
										</div>
									</div>
                   <div class="col-md-12 col-lg-12 col-xs-12">
										<div class="row">
											<!--<div class="col-xs-6 col-md-6 col-lg-6">
												<div class="form-group row">
													<div class="col-md-5"><label>Upload Image</label></div>
													<div class="col-md-7">
													    <div class="form-group">
                                                            <input type="file" class="form-control" name="selectedStu">
														</div>
								                    </div>
												</div>
                                            </div>-->
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
                                            
										</div>
								</div>
				
					</form>

                      <div id="setValue"></div>
                      
                    <div class="table-responsive">
                      <table class="table table-striped" id="table-1">
                     <?php $sub=$this->db->get("sub_category");?>

                        <thead>
                          <tr>
                            <th class="text-center">
                              #
                            </th>
                            <th> Name</th>
                           <!-- <th>subcategory Image</th>-->
                            <th>Category</th>
                            <th>Delete</th>
                      
                          </tr>
                           </thead>
                     <tbody>
                           <?php $i=1; foreach($sub->result() as $row):?>
                         <tr>
                             <td><?php echo $i;?></td>
                             <td><?php echo $row->name;?></td>
                           <!-- <td><img src="<?php //echo base_url();?>assets/images/client_gallery/<?php //echo $row->image;?>" height="50px;" width="80px;"></td>-->
                             <td><?php $this->db->where('id',$row->cat_id);
                             $category=$this->db->get('product_category');
                             echo $category->row()->category;?>
                            <td><button type="button" class="btn btn-danger">
                            <a href="<?php echo base_url();?>apanelForms/deletesubcategory/<?php echo $row->id;?>">
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
