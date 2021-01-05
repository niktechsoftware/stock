<script src="http://code.jquery.com/ui/1.10.2/jquery-ui.js" ></script>
<div class="main-content">
        <section class="section">
          <div class="section-body">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4><?php echo $smallTitle;?></h4>
                  </div>
                  <?php $categoryDe=$this->db->get("product_category");?>
                  <div class="card-body">
                     	<form method="post"	action="<?php echo base_url()?>apanelForms/enterBill" enctype="multipart/Form-data" >
							<div class="card-body">
								<div class="row" id="regForm">
									<div class="col-md-12 col-lg-12 col-xs-12">
										<div class="row">
										    <?php if($this->uri->segment(3)=="success"){?>
										        <div class="alert alert-success col-md-12 col-lg-12 col-xs-12">Bill Entry is done successfully entered!</div>
										    <?php }else{
										    if($this->uri->segment(3)){?>
										     <div class="alert alert-warning col-md-12 col-lg-12 col-xs-12"> Please Try Again !</div>
										    
										   <?php  }}?>
											 <div class="col-xs-6 col-md-6 col-lg-6">
                         <div class="form-group row">
                          <div class="col-md-5"><label>Company Name or Dealer Name</label></div>
                          <div class="col-md-7">
                              <div class="form-group">
                                      <input type="text" class="form-control" name="companyName" required="required">
                            </div>
                          </div>
                        </div>
                      </div>  
                    	<div class="col-xs-6 col-md-6 col-lg-6">
                        <div class="form-group row">
                          <div class="col-md-5"><label>Company Address Or Dealer Address</label></div>
                          <div class="col-md-7">
                              <div class="form-group">
                               <input type="text" class="form-control" name="daddress" required="required">
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
                          <div class="col-md-5"><label>Dealer Mobile 1</label></div>
                          <div class="col-md-7">
                              <div class="form-group">
                                   <input type="text" class="form-control" name="mobile" required="required">
                            </div>
                           </div>
                        </div>
                      </div>
                       <div class="col-xs-6 col-md-6 col-lg-6">
                        <div class="form-group row">
                          <div class="col-md-5"><label>Dealer Mobile 2</label></div>
                          <div class="col-md-7">
                              <div class="form-group">
                                   <input type="text-center" class="form-control" name="mobile2">
                            </div>
                           </div>
                        </div>
                      </div>
                      <div class="col-md-12 col-lg-12 col-xs-12">
                    <div class="row">
                      <div class="col-xs-6 col-md-6 col-lg-6">
                        <div class="form-group row">
                          <div class="col-md-5"><label>Bill Date (yyyy-mm-dd)</label></div>
                          <div class="col-md-7">
                              <div class="form-group">
                                   <input type="date" class="form-control" name="billDate" required="required">
                            </div>
                           </div>
                        </div>
                      </div>
                       
                    <div class="col-xs-6 col-md-6 col-lg-6">
                        <div class="form-group row">
                          <div class="col-md-5"><label>Bill Number</label></div>
                          <div class="col-md-7">
                              <div class="form-group">
                                   <input type="text" class="form-control" id="billNumber" name="billNumber" required="required">
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
                          <div class="col-md-5"><label>GST NO.</label></div>
                          <div class="col-md-7">
                              <div class="form-group">
                                   <input type="text" class="form-control" name="gst">
                            </div>
                           </div>
                        </div>
                      </div>
                       <div class="col-xs-6 col-md-6 col-lg-6">
                        <div class="form-group row">
                          <div class="col-md-5"><label>Pin code:</label></div>
                          <div class="col-md-7">
                              <div class="form-group">
                                   <input type="text" class="form-control" name="stcode">
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
                          <div class="col-md-5"><label>Email ID:</label></div>
                          <div class="col-md-7">
                              <div class="form-group">
                                   <input type="text" class="form-control" name="emailid">
                            </div>
                           </div>
                        </div>
                      </div>
                   <div class="col-xs-6 col-md-6 col-lg-6">
                        <div class="form-group row">
                          <div class="col-md-5"><label>Total Product Quantity</label></div>
                          <div class="col-md-7">
                              <div class="form-group">
                                   <input type="text" class="form-control" id="product_quantity" name="product_quantity" required="required">
                            </div>
                           </div>
                        </div>
                      </div>
                  <div class="form-group" id ="printT"><div class="form-group">
              <div class="col-sm-10 ">
               <script>
                $("#product_quantity").keyup(function(){
              var w = $("#product_quantity").val();
              var r = $("#billNumber").val();
             // alert(r);
              $.post("<?php echo site_url("home/printTable") ?>",{w : w ,r:r}, function(data){
               $("#printT").html(data);
               //alert(data);
                });
                });
              </script>
               </div>
              </div>
              </div>  
                    </div>
                  </div>
                  <div class="col-md-12 col-lg-12 col-xs-12">
                    <div class="row">
                  <div class="col-xs-6 col-md-6 col-lg-6">
                        <div class="form-group row">
                          <div class="col-md-5"><label>Enter CGST (%)</label></div>
                          <div class="col-md-7">
                              <div class="form-group">
                                   <input type="text" class="form-control" name="vatper">
                            </div>
                           </div>
                        </div>
                      </div>
                    <div class="col-xs-6 col-md-6 col-lg-6">
												<div class="form-group row">
													<div class="col-md-5"><label>Enter SGST/UTGST(%)</label></div>
													<div class="col-md-7">
													    <div class="form-group">
                                <input type="text" class="form-control" name="satper">
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
                          <div class="col-md-5"><label>Round off</label></div>
                          <div class="col-md-7">
                              <div class="form-group">
                                <input type="text" class="form-control" name="roff">
                            </div>
                           </div>
                        </div>
                       </div>

                      <div class="col-xs-6 col-md-6 col-lg-6">
                        <div class="form-group row">
                          <div class="col-md-5"><label>Freight</label></div>
                          <div class="col-md-7">
                              <div class="form-group">
                                <input type="text" class="form-control" name="freight">
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
                          <div class="col-md-5"><label>Discount</label></div>
                          <div class="col-md-7">
                              <div class="form-group">
                                <input type="text" class="form-control" name="discount" id="discount">
                            </div>
                           </div>
                        </div>
                       </div>

                      <div class="col-xs-6 col-md-6 col-lg-6">
                        <div class="form-group row">
                          <div class="col-md-5"><label>Total Bill Amount</label></div>
                          <div class="col-md-7">
                              <div class="form-group">
                                <input type="text" class="form-control" id="total_prize" name="total_prize" readonly>
                                <input type="hidden" value=" " id="total_prize1" name="total_prize1">
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
                          <div class="col-md-5"><label>Paid Amount</label></div>
                          <div class="col-md-7">
                              <div class="form-group">
                                <input type="text" class="form-control" name="amount_paid" id="paid" required="required">
                            </div>
                           </div>
                        </div>
                       </div>

                       <div class="col-xs-6 col-md-6 col-lg-6">
                        <div class="form-group row">
                          <div class="col-md-5"><label>Balance</label></div>
                          <div class="col-md-7">
                              <div class="form-group">
                                <input type="text" class="form-control" name="balance" id="balance">
                            </div>
                           </div>
                        </div>
                       </div>
                      </div>
                    </div>
                    <script>
                    	jQuery(document).ready(function(){
                        	$('input#paid').keyup(function(){
    						var name = $('#paid').val();
    						var name1 = $('#total_prize').val();
    						
    						var a = name1-name ;				
    						document.getElementById('balance').value=a;
					});
						$('input#discount').keyup(function(){
						var dis = $('#discount').val();
						var tot1 = $('#total_prize1').val();
						var a = tot1 - dis;				
						document.getElementById('total_prize').value=a;
						
					});
                    	});
                    	</script>
                    <div class="col-md-12 col-lg-12 col-xs-12">
                    <div class="row">
                        <div class="col-xs-6 col-md-6 col-lg-6">
                        <div class="form-group row">
                          <div class="col-md-5"><label>Pay Mode</label></div>
                          <div class="col-sm-7">
                            <select class="form-control" id="payMode" name="payMode"  required="required">
                              <option value="cash">Cash</option>
                              <option value="OBC">Chaque</option>
                            </select>
                          </div>
                        </div>
                       </div>
                        <div class="col-xs-6 col-md-6 col-lg-6">
                        <div class="form-group row">
                          <div class="col-md-5"><label>Discription</label></div>
                          <div class="col-md-7">
                              <div class="form-group">
                                <input type="text" class="form-control" name="discription">
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
                          <div class="col-md-5"><label>Dealer Or Company Email</label></div>
                          <div class="col-md-7">
                              <div class="form-group">
                                <input type="text" class="form-control" name="company_email">
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
