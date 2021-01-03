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
                                                <th>Address</th>
                                                 <th>Mobile No.</th>
                                                <th>Email</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                         	<?php $i = 1;?>
                                        	<?php $this->db->where("client_code",$this->session->userdata("client_code"));?>
                                        	<?php $res = $this->db->get("costumer")->result();?>
                                        	<?php foreach($res as $row):?>
                                        	<?php
                                        	?>
                                            <tr>
                                                
                                                <td><?php echo $i; ?></td>
                                                <td>
                                                    <input type="hidden" value ="<?php echo $row->id;?>" id ="orderrow<?php echo $i;?>">
                                                    <?php echo $row->name; ?></td>
                                                <td><?php echo $row->address; ?></td>
                                                <td><?php echo $row->mobile; ?></td>
                                               
                                                <td><?php echo $row->email; ?></td> 
                                             </tr>
                                            <?php $i++;
                                            endforeach ;?>
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