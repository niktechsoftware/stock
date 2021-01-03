<?php $uri1=$this->uri->segment(3);?>
<div class="main-content">
        <section class="section">
          <div class="section-body">
            <div class="row">
              <div class="col-md-12">
                <div class="card">
                  <div class="card-header">
                    <h4><?php echo $smallTitle;?></h4>
                  </div>
                  <?php $categoryDe=$this->db->get("product_category");
                  if($uri1){ 
                   $this->db->where("id",$uri1);
                   $emp=$this->db->get('employee');
            
            
                  ?>
                  <div class="card-body">
                     	<form method="post"	action="<?php echo base_url()?>apanelForms/editEmployee" enctype="multipart/Form-data" >
                     	    <input type="hidden" value="<?php echo $uri1; ?>" name="empid">
							<div class="card-body">
								<div class="row" id="regForm">
									<div class="col-md-12 col-lg-12 col-xs-12">
										<div class="row">
										    <?php if($this->uri->segment(4)=="success"){?>
										        <div class="alert alert-success col-md-12 col-lg-12 col-xs-12">Updation is successfully done!</div>
										    <?php }?>
										   <div class="col-xs-6 col-md-6 col-lg-6">
											   	<div class="form-group row">
													<div class="col-md-3"><label>Employee Name</label></div>
													<div class="col-md-7">
													    <div class="form-group">
                                   <input type="text" class="form-control" name="empname" value="<?php echo $emp->row()->name;?>">
														</div>
								                    </div>
												</div>
                                        </div>
                                    <div class="col-xs-6 col-md-6 col-lg-6">
                                        <div class="form-group row">
                                            <div class="col-md-3"><label>Gender</label></div>
                                                <div class="col-md-7">
                                                    <div class="form-group">
                                                    <select required="required" name ="gender"  id ="gender" class="form-control" >
                                                      <option value="">Select Gender</option>
                                                     
                                                         <option value = "female<?php if($emp->row()->gender=="female"){echo 'selected="selected"';}?>" >FEMALE</option>
                                                         <option value = "male<?php if($emp->row()->gender=="male"){echo 'selected="selected"';}?>" >MALE</option>
                                                        <option value = "other<?php if($emp->row()->gender=="other"){echo 'selected="selected"';}?>" >OTHER</option>
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
													<div class="col-md-3"><label>Address</label></div>
													<div class="col-md-7">
													    <div class="form-group">
                                                        <input type="text" class="form-control" name="address" value="<?php echo $emp->row()->address;?>">
														</div>
								                    </div>
												</div>
                                        </div>
                                    <div class="col-xs-6 col-md-6 col-lg-6">
                                       <div class="form-group row">
                                          <div class="col-md-3"><label>Mobile Number</label></div>
                                            <div class="col-md-7">
                                                <div class="form-group">
                                                     <input type="text" class="form-control" name="mno" value="<?php echo $emp->row()->mobile; ?>">
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
															<button type="submit" class="btn btn-primary" style="margin-left:700px;">
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
                <?php }else{ ?> 
                 <div class="card-body">
                     	<form method="post"	action="<?php echo base_url()?>apanelForms/addEmployee" enctype="multipart/Form-data" >
							<div class="card-body">
								<div class="row" id="regForm">
									<div class="col-md-12 col-lg-12 col-xs-12">
										<div class="row">
										    <?php if($this->uri->segment(3)=="success"){?>
										        <div class="alert alert-success col-md-12 col-lg-12 col-xs-12">Registration is successfully done!</div>
										    <?php }?>
										   <div class="col-xs-6 col-md-6 col-lg-6">
											   	<div class="form-group row">
													<div class="col-md-3"><label>Employee Name</label></div>
													<div class="col-md-7">
													    <div class="form-group">
                                   <input type="text" class="form-control" name="empname">
														</div>
								                    </div>
												</div>
                                        </div>
                                    <div class="col-xs-6 col-md-6 col-lg-6">
                                        <div class="form-group row">
                                            <div class="col-md-3"><label>Gender</label></div>
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
													<div class="col-md-3"><label>Address</label></div>
													<div class="col-md-7">
													    <div class="form-group">
                                                        <input type="text" class="form-control" name="address">
														</div>
								                    </div>
												</div>
                                        </div>
                                    <div class="col-xs-6 col-md-6 col-lg-6">
                                       <div class="form-group row">
                                          <div class="col-md-3"><label>Mobile Number</label></div>
                                            <div class="col-md-7">
                                                <div class="form-group">
                                                     <input type="text" class="form-control" name="mno">
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
															<button type="submit" class="btn btn-primary" style="margin-left:700px;">
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
                <?php }?>
                </div>
            </div>
        </div>
   	</div>
</div>
