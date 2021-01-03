                <div id="main-wrapper" class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-white">
                            	<div class="panel-body">
                                   <div class="table-responsive">
                                    <table id="example" class="display table" style="width: 100%; cellspacing: 0;">
                                        <thead>
                                            <tr>
                                             
                                                 <th>#</th>
                                                <th>Customer Name</th>
                                                <th>Product</td>
                                                <th>Address</th>
                                                 <th>Mobile No.</th>
                                                <th>Total Amount</th>
                                                <th>Email</th>
                                                <th>Invoice Num</th>
                                                <th>Status</th>
                                                  <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                           	<?php $i = 1;
                                           $od = $this->db->query("select * from day_book where status=0");
                                                if($od->num_rows()>0){
                                                   foreach($od->result() as $row):
                                                       $this->db->where("cid",$row->paid_by);
                                                     $pro= $this->db->get("like_product")->row();
                                                     
                                                      $this->db->where("id",$row->paid_by);
                                                      $cust1=$this->db->get("costumer");
                                                      if($cust1->num_rows()>0){
                                                          
                                                      $cust=$cust1->row();
                                                    
                                                      
                                                      ?>
                                            <tr>
                                                
                                                <td><?php echo $i; ?></td>
                                                <td>
                                                    <input type="text" value ="<?php echo $row->invoice_no;?>" id ="orderrow<?php echo $i;?>">
                                                    <?php echo $cust->name; ?></td>
                                                    <td><?php $j=1; $this->db->where("invoice_no",$row->id);
                                                   $pro=$this->db->get("like_product");
                                                   foreach($pro->result() as $row1):
                                                       $this->db->where("id",$row1->product_id);
                                                      $data= $this->db->get("stock_products");
                                                      foreach($data->result() as $row2)
                                                     if($row2->file1){?>
                                                     
                                                     <img src="<?php echo base_url()?>assets/images/client_gallery/2/product/<?php echo $row2->file1;?>" height="50" width="80"><br/>
                                                     <?php }
                                                   
                                                   $j++; endforeach;?></td>
                                                <td><?php echo $cust->address; 
                                                
                                             ?>
                                                
                                                
                                                
                                                </td>
                                                <td><?php echo $cust->mobile; ?></td>
                                                <td><?php echo $row->amount; ?></td>
                                                <td><?php echo $cust->email; ?></td> 
                                                <td><a href="<?php echo base_url()?>apanelForms/invoicedetail/<?php echo $row->invoice_no;  ?>" class="btn btn-blue"><?php echo $row->invoice_no;  ?> </a> </td>
                                                <td><button class="btn btn-danger"   id="inactive<?php echo $i;?>">Pending</button>
                                           <script>
                                            	$("#inactive<?php echo $i;?>").click(function(){
                                                var id = $("#orderrow<?php echo $i;?>").val();
                                                //alert(id);
                                         
												$.post("<?php echo site_url();?>apanelForms/delivered", { id:id }, function(data){
												    alert(data);
													$('#inactive<?php echo $i;?>').html(data);
												});
											});
                                            </script>
                                            </td>
                                                <td><a href="<?php echo base_url();?>apanelForms/deleteCareer/<?php echo $cust->id;?>">Delete	</a></td>
                                            </tr>
                                            <?php $i++; }?>
                                            <?php endforeach ;}?>
                                        </tbody>
                                       </table>  
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- Row -->
                </div>
                
						<?php //$prof = ((($branchP->mrp_price -$branchP->selling_price)*100)/$branchP->mrp_price); if($prof>0){echo "<mark1>".number_format((float)$prof, 2, '.', '')."%</mark1>";}else{ echo "0%";}?>
                           </div> <script>
                                   $("#active<?php echo $i;?>").hide();
                                        $("#inactive<?php echo $i;?>").hide();
                                         <?php $this->db->where('id',$row->id);
							                	$sb_data=$this->db->get('costumers')->row();
                                         $condtion= array('customer_id' =>$row->id,'status' =>0);
											if($fv_check>0) 
											    { ?>
											     $("#active<?php echo $i;?>").show();
                                                $("#inactive<?php echo $i;?>").hide();
										    <?php } 
										    else 
											    { ?>
    											$("#inactive<?php echo $i;?>").show();
                                                $("#active<?php echo $i;?>").hide();
										    <?php } ?>
										    
									
											/*
											 $("#active<?php echo $i;?>").click(function(){
                                                var id = $("#abc<?php echo $i;?>").val();
                                                //alert(id);
												$.post("<?php echo site_url();?>subscriberController/delete_in_fvlist", { id:id }, function(data){
													$("#active<?php echo $i;?>").hide();
                                                    $("#inactive<?php echo $i;?>").show();
													$('#number').html(data);
												});
											});*/

                             </script>       <!-- Main Wrapper -->