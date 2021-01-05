<div class="main-content">
	<div class="section">
		<div class="section-body">
			<div class="row">
				<div class="col-xs-12 col-md-12 col-lg-12 col-sm-12">
					<div class="card">
						<div class="card-header">
					<form method="post"	action="<?php echo base_url();?>index.php/billController/sale_product" id="uploadform" enctype="multipart/Form-data" >
						   	<div class="card-body">
								<div class="row" id="regForm">
									<!------------------------------------------------------------>	
								    	  <div class="col-md-12 col-lg-12 col-xs-12 col-sm-12">
										       <div class="row">
										        	<div class="col-xs-4 col-md-4 col-lg-4 col-sm-12">
                                                        <div class="form-group row">
													        <div class="col-md-4">
														        <label>Select Buyer<span title="Required" style="color: red;">*</span></label>
													        </div>
													    <div class="col-md-8">
														    <div class="form-group">
        														<select class="form-control" id="category" name="category" >
                                    								<option value="01">--Select Buyer--</option>
                                    								<option value="Customer Id">Customer ID</option>
                                    								<option value="02">Other</option>
                                    							</select>
														    </div>
													    </div>
											    	</div>
										    	</div>
										    	<div class="col-xs-4 col-md-4 col-lg-4" id="cust">
                                                        <div class="form-group row">
													        <div class="col-md-4" >
														        <label>Customer Id<span title="Required" style="color: red;">*</span></label>
													        </div>
													    <div class="col-md-8">
														    <div class="form-group">
        													    <input type="text" class="form-control" id="custID" name="custID" style="width: 160px;" placeholder="Text Field">
														    </div>
													    </div>
											    	</div>
										    	</div>
										    <div class="row"   id="nandp">
										    	<div class="col-xs-4 col-md-4 col-lg-4">
                                                        <div class="form-group row">
													        <div class="col-md-4" >
														        <label>Name<span title="Required" style="color: red;">*</span></label>
													        </div>
													    <div class="col-md-8">
														    <div class="form-group">
        													    <input type="text" class="form-control" id="name" name="name" style="width: 160px;" placeholder="Text Field">
														    </div>
													    </div>
											    	</div>
											    	</div>
										    		<div class="col-xs-4 col-md-4 col-lg-4" style="margin-left:70px;">
                                                        <div class="form-group row">
													        <div class="col-md-4" >
														        <label>Phone Number<span title="Required" style="color: red;">*</span></label>
													        </div>
													    <div class="col-md-8">
														    <div class="form-group">
        													    <input type="text" class="form-control" id="number" name="number" style="width: 160px;" placeholder="Text Field">
														    </div>
													    </div>
											    	</div>
											    	</div>
										    	</div>	
										    </div>
									    </div>
							<!------------------------------------------------------------>	
							  <div class="col-md-12 col-lg-12 col-xs-12">
										<div class="row" id="rahul23">
									<table class="table table-hover" class="form-control">
						<thead>
	                        <tr class="text-uppercase">
	                           <th>SNO</th>
	                           <th class="text-center"><label>Item Hsn</label></th>
	                           <th><label>Item Name</label></th>
	                           <th><label>Item Size</label></th>
	                           <th><label>Price/Item</label></th>
	                           <th><label>Remaining Item Quantity</label></th>
	                            <th><label>Purchase Item Quantity</label></th>
	                           <th><label>Discount(%)</label></th>
	                           <th><label>Discount Rs</label></th>
	                           <th><label>Total Price</label></th>
	                           <th><label>Sub Total</label></th>
	                        </tr>
	                    </thead>
	                    <tbody>
                        <?php $i = 1; for($i = 1; $i <= 15; $i++){ ?>
                            <?php if($i%2==0){$rowcss="danger";}else{$rowcss ="warning";}?>
                        <tr class="<?php echo $rowcss;?>" class="form-control">
                             <td width="40" ><strong><?php echo $i; ?></strong></td>
                             <td>
                               <!-- <select id="item_no<?php echo $i; ?>" name="item_no<?php echo $i; ?>" style="width:80px;" class="form-control">
                                    <option value="">-Item Name-</option>
                                     <option value="<?php //echo $no->id; ?>"><?php //echo strtoupper($no->name."[".$no->id."]"); ?></option>
                                    </select>-->
                                    <?php //$item_no = $this->db->query("select * from  stock_products  ORDER BY name"); ?>
                                    <?php //foreach($item_no->result() as $no){?>
                                
						     <input type="hidden" name="count<?php echo $i;?>" id="count<?php echo $i;?>" value = "<?php echo $i;?>">
						     
						     <input type='text' class='form-control' id='item_no<?php echo $i; ?>'   name='item_no<?php echo $i; ?>'  width='100%'>
						            <ul style="list-style: none; padding:0px;" id="namep<?php echo $i;?>"></ul>
						            <?php //} ?>
                            </td>
                            <td><input type='text' class='form-control' id='item_name<?php echo $i; ?>'   name='item_name<?php echo $i; ?>'  width='100%' readonly></td>
                           <td>
                                  <input readonly id="item_size<?php echo $i; ?>" class="text-uppercase form-control" name="item_size<?php echo $i; ?>" style="width:70px;">
                            </td>
                             <td>
                                   <input readonly id="item_price<?php echo $i; ?>"  class="text-uppercase form-control" name="item_price<?php echo $i; ?>" style="width:70px;">
                            </td>
                             <td>
                             <input readonly id="item_quantity1<?php echo $i; ?>" class="text-uppercase form-control" name="item_quantity1<?php echo $i; ?>" style="width:50px;" type="text"/>
                             </td>
                            <td>
                            	
                                <input id="item_quantity<?php echo $i; ?>" class="text-uppercase form-control" name="item_quantity<?php echo $i; ?>" style="width:50px;" type="text"/>
                            </td>
                            <td>
                                <input id="item_discount<?php echo $i; ?>" class="text-uppercase form-control"  name="item_discount<?php echo $i; ?>" style="width:50px;" type="text"/>
                            </td>
                            <td>
                                <input id="discount<?php echo $i; ?>"  class="text-uppercase form-control" name="discount<?php echo $i; ?>" style="width:70px;" type="text"/>
                            </td>
                             <td>
                                  <input readonly id="total_price<?php echo $i; ?>" class="text-uppercase form-control"  name="total_price<?php echo $i; ?>" style="width:70px;" type="text"/>
                            </td>
                            <td>
                                <input  readonly id="sub_total<?php echo $i; ?>" class="text-uppercase form-control" name="sub_total<?php echo $i; ?>" style="width:70px;" type="text"/>
                            </td>
                            </tr>
                            <?php } ?>
                            <tr>
                            	<td colspan="3"><strong>Previous Balance</strong></td>
                                <td colspan="5"><input  readonly id="valid_id" name="p_balance" style="width:180px;" class="form-control" type="text"/></td>
                       </tr>
                     
                       <tr>
                            	<td colspan="3"><strong>Total</strong></td>
                                <td colspan="5"><input id="total" name="tt" style="width:180px;" class="form-control" type="text" required  readonly/></td>
                       </tr>
                        <tr>
                            	<td colspan="3"><strong>Discount</strong></td>
                                <td colspan="5"><input id="dscount" name="dscount" style="width:180px;" class="form-control" value="0" type="text" required /></td>
                       </tr>
                         <tr>
                            	<td colspan="3"><strong>Payable amount</strong></td>
                                <td colspan="5"><input id="dsamount" name="dsamount" style="width:180px;" class="form-control" type="text" value="0"  required  readonly/></td>
                       </tr>
                       <tr>
                            	<td colspan="3"><strong>Paid</strong></td>
                                <td colspan="5"><input id="paid" name="paid" style="width:180px;" class="form-control" type="text" required /></td>
                       </tr>
                       <tr>
                            	<td colspan="3"><strong>Balance</strong></td>
                                <td colspan="5"><input id="balance" name="balance" style="width:180px;" class="form-control" type="text" readonly /></td>
                       </tr>
                      </tbody>
								<!------------------------------------------------------------>	
						
														
							 <script>
                                  // alert('hii');
                                  	jQuery(document).ready(function(){
                                  	    //alert('hii');
                                  	    $("#nandp").hide();
                						 $("#cust").hide();
                						  $("#rahul23").hide();
                                  	   $("#category").change(function(){
                        				var cat = $("#category").val();
                        				if(cat=="Customer Id"){
                        				   	 $("#nandp").hide();
                    						 $("#cust").show();
                    						 $("#rahul23").show();
                        				}
                        				  if(cat==02)
                				      {
                					   	 $("#nandp").show();
                						 $("#cust").hide();
                						 $("#rahul23").show();
                				      }
                                  	   });
                    				$("#custID").keyup(function(){
                    					var cat = $("#custID").val();
                    					//alert(cat);
                    					$.post("<?php echo site_url("billController/checkCustID") ?>",{cat : cat}, function(data){
                    						//alert(data);
                    						var d = jQuery.parseJSON(data);	
                    							$("#validId").html(d.msg);
                    							if(d.indicator == "true")
                    							{		
                    								$("#rahul23").show();
                    							}
                    							$("#valid_id").val(d.balance);
                    						});
                        				

                                  	   
                                  	});
                        <!------------------------------------------------------------------->
                        
                        <!------------------------------------------------------------------->
                	<?php $i = 1; for($i = 1; $i<=15; $i++){ ?>
            
				/*	$('select#item_no<?php echo $i; ?>').change(function(){
						var name = $('#item_no<?php echo $i; ?>').val();
						//alert(name);					
						$.post("<?php echo site_url("billController/getTdata") ?>", {name : name}, function(data){
						    //alert(data);
							var d = jQuery.parseJSON(data);				
							 $('#item_name<?php echo $i; ?>').val(d.itemName);
							 $('#item_cat<?php echo $i; ?>').val(d.itemCat);
							  $('#item_quantity1<?php echo $i;?>').val(d.qunatity);
							 $('#item_size<?php echo $i; ?>').val(d.itemsize);
							 $('#item_price<?php echo $i; ?>').val(d.price);
							//alert(d);
						});
					});*/
						$("#item_no<?php echo $i; ?>").keyup(function(){
                								var min_length = 1; // min caracters to display the autocomplete
                								var keyword = $('#item_no<?php echo $i; ?>').val();
                								var county  =   $('#count<?php echo $i;?>').val();
                								var itemid= $('#item_id<?php echo $i;?>').val();
                								//alert(keyword);
                								if (keyword.length >= min_length) {
                    									$.ajax({
                    										url: '<?php echo site_url("billController/searchData");?>',
                    										type: 'POST',
                    										data: { keyword	:	keyword , county : county },
                    										success:function(data){
                    										    //alert(data);
                    											$('#namep<?php echo $i;?>').show();
                    											$('#namep<?php echo $i;?>').html(data);
                    										}
                    									});
                    								}else{
                    								    	$('#namep<?php echo $i;?>').hide();
                    								}
                    							
									    
						                 	});
						                 		$("#category<?php echo $i;?>").change(function(){	
                                            	    	var name        =   $('#item_no<?php echo $i;?>').val();
                                        				var category    =   $('#category<?php echo $i;?>').val();
                                        			//alert(name+category);
                                        				 $.post("<?php echo site_url('billController/getSubCategory') ?>", {name : name,category : category}, function(data){
                                        				     //alert(data)
                        								$("#subcategory<?php echo $i;?>").html(data);
                                            	    
                                            	});
                                            	});
					                            
					                            	$("#subcategory<?php echo $i;?>").change(function(){	
                                            	    	var name        =   $('#item_no<?php echo $i;?>').val();
                                            	    	var category    =   $('#category<?php echo $i;?>').val();
                                        				var subcategory    =   $('#subcategory<?php echo $i;?>').val();
                                        		
                                        				 $.post("<?php echo site_url('billController/prodataf') ?>", {name : name,category : category, subcategory : subcategory}, function(data){
                                        				     //alert(data);
                                        				     	var d = jQuery.parseJSON(data);	
                                        				 $('#item_quantity1<?php echo $i;?>').val(d.quan);
                            							 $('#item_size<?php echo $i; ?>').val(d.size);
                            							 $('#item_price<?php echo $i; ?>').val(d.price);
                                            	    
                                            	});
                                            	});
						$('input#item_quantity<?php echo $i; ?>').keyup(
						function(){
							var a = 0;
							var name = $('#item_price<?php echo $i; ?>').val();
							var name1 = Number($('#item_quantity<?php echo $i; ?>').val());
							var name2 = Number($('#item_quantity1<?php echo $i; ?>').val());
                             if(name2 >= name1){
							var total = name * name1;
							document.getElementById('total_price<?php echo $i; ?>').value=total;
							document.getElementById('sub_total<?php echo $i; ?>').value=total;
							$("#submit").show();
						}
						else
						{
                            alert('Please update');
							document.getElementById('total_price<?php echo $i; ?>').value=0;
							document.getElementById('sub_total<?php echo $i; ?>').value=0;
							$("#submit").hide();

						}
					});
						$('input#item_discount<?php echo $i; ?>').keyup(function(){
							var name = $('#total_price<?php echo $i; ?>').val();
							var name1 = $('#item_discount<?php echo $i; ?>').val();
							
							var dis = (name1 * name)/100;
							var total = name - dis;
							document.getElementById('total_price<?php echo $i; ?>').value=name;
							document.getElementById('sub_total<?php echo $i; ?>').value=total;
							document.getElementById('discount<?php echo $i; ?>').value=dis;
							
					});
					<?php } ?>
						$('input#total').focusin(function(){
					
					var name = Number($('#sub_total1').val()) + Number($('#sub_total2').val()) + Number($('#sub_total3').val()) + Number($('#sub_total4').val()) + Number($('#sub_total5').val()) + Number($('#sub_total6').val()) + Number($('#sub_total7').val()) + Number($('#sub_total8').val()) + Number($('#sub_total9').val()) + Number($('#sub_total10').val()) + Number($('#sub_total11').val()) + Number($('#sub_total12').val()) + Number($('#sub_total13').val()) + Number($('#sub_total14').val()) + Number($('#sub_total15').val());				
					$("#total").val(name);
				});
			    
				$('input#paid').keyup(function(){
						var name = $('#dsamount').val();
						var name1 = $('#paid').val();
						
						var a = name1-name ;				
						document.getElementById('balance').value=a;
					});
				$('input#dscount').keyup(function(){
						var dis = $('#dscount').val();
						var tot1 = $('#total').val();
						var a = tot1 - dis;				
						document.getElementById('dsamount').value=a;
					});
				
			/*	TableExport.init();
				Main.init();
				SVExamples.init();
				TableData.init();*/
			  	
                      	    	});
						 </script>
						 
						  </table>
						  	<div class="col-xs-6 col-md-6 col-lg-6">
												    	<div class="form-group row">
													<div class="col-md-12">
														<div class="form-group" >
															<button type="submit" class="btn btn-primary" style="margin-left:160%;">
																<i class="far fa-edit">&nbsp;Submit</i>
															</button>
														</div>
													</div>
												</div>
											</div>

							
							</div>
									</div>
								
						<!---------------------------------------------------------------------------------------->
						            
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>	
		<script>
			 	function set_item(item) {
                        							
                        var text = '';
                                var text2 = '';
                                var b=1;
                                var arr = item;
                                for(i=0;i<arr.length;i++) {
                                if((arr[i]=="-")||(b > 1)){
                                if(b>1){
                                text2+=arr[i]
                                }b++;
                                }
                                else{
                                text += arr[i]
                                }
                                    
                                }    
                                
                           	$("#item_no"+text2).val(text);  
                           	$.post("<?php echo site_url('billController/getCategory') ?>", {text : text}, function(data){
                           	    //alert(data);
								var d = jQuery.parseJSON(data);	
									$('#item_quantity1'+text2).val(d.quan);
								$('#item_name'+text2).val(d.name);	
       							 $('#item_size'+text2).val(d.size);
       							 $('#item_price'+text2).val(d.price);
       							 $('#namep'+text2).hide();

						});
                        						
                    	}
                    	
                    					      
			 </script>						
            

  