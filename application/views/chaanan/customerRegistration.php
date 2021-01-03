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
                     	<form method="post"	action="<?php echo base_url()?>apanelForms/addCustomer" enctype="multipart/Form-data" >
							<div class="card-body">
								<div class="row" id="regForm">
									<div class="col-md-12 col-lg-12 col-xs-12">
										<div class="row">
										    <?php if($this->uri->segment(3)=="success"){?>
										        <div class="alert alert-success col-md-12 col-lg-12 col-xs-12">Product is done successfully entered!</div>
										    <?php }?>
										   <div class="col-xs-6 col-md-6 col-lg-6">
											   	<div class="form-group row">
													<div class="col-md-5"><label>Customer Name</label></div>
													<div class="col-md-7">
													    <div class="form-group">
                                   <input type="text" class="form-control" name="name">
														</div>
								                    </div>
												</div>
                                        </div>
                                    <div class="col-xs-6 col-md-6 col-lg-6">
                                        <div class="form-group row">
                                            <div class="col-md-5"><label>Gender</label></div>
                                                <div class="col-md-7">
                                                    <div class="form-group">
                                                    <select required="required" name ="gender"  id ="gender" class="form-control">
                                                      <option value="">Select Gender</option>
                                                         <option value = "female" >FEMALE</option>
                                                         <option value = "male" >MALE</option>
                                                        <option value = "other" >OTHER</option>
                                                    </select>
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
													<div class="col-md-5"><label>Customer Address</label></div>
													<div class="col-md-7">
													    <div class="form-group">
                                                        <input type="text" class="form-control" name="address">
														</div>
								                    </div>
												</div>
                                        </div>
                                    <div class="col-xs-6 col-md-6 col-lg-6">
                                       <div class="form-group row">
                                          <div class="col-md-5"><label>Customer Mobile NO</label></div>
                                            <div class="col-md-7">
                                                <div class="form-group">
                                                     <input type="text" class="form-control" name="mno">
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
													<div class="col-md-5"><label>Customer GST NO</label></div>
													<div class="col-md-7">
													    <div class="form-group">
                                                            <input type="text" class="form-control" name="gst">
														</div>
								                    </div>
												</div>
                                            </div>
                                       	</div>
								    </div>
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
					              </form>
                             </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
   	</div>
</div>
