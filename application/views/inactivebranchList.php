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
                                            	<th>Branch Id</th>
                                               
                                                <th>User Name</th>
                                                <th>Branch Name</th>
                                                <th>Address</th>
                                                <th>Mobile</th>
                                                <th>Email1</th>
                                                <th>Complete Type</th>
                                                <th>Admin Name</th>
                                                <th>Head Name</th>
                                                 <th>Fax No</th>
                                                 <th>Gst No</th>
                                                  <th>Branch Logo</th>
                                                <th>Branch Admin photo</th>
                                                <th>Branch Owner Adhar</th>
                                                <th>Gst photo</th>
                                                 <th> Change Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        	<?php $i = 1; foreach($branchList->result() as $row):?>
                                            <tr>
                                            	<td><?php echo $i; ?></td>
                                                <td>
                                                	<a href="<?php echo base_url()?>apanel/profile/<?php echo $row->username; ?>/lkfjsaodif0w9809sodiuf4rifsd9f80w934oiwoifu">
                                                		<?php echo $row->username; ?>
                                                	</a>
                                                </td>
                                                 <input type="hidden" value ="<?php echo $row->id;?>" id ="orderrow<?php echo $i;?>">
                                                <td><?php echo $row->username; ?></td>
                                                <td><?php echo $row->cilnic_name; ?></td>
                                                <td><?php echo $row->address_1; ?></td>
                                                <td><?php echo $row->mobile_number; ?></td>
                                                <td><?php echo $row->email1; ?></td>
                                                <td><?php echo $row->complete_type;?></td>
                                                 <td><?php echo $row->org_admin_name; ?></td>
                                                <td><?php echo $row->head_name; ?></td>
                                                  <td><?php echo $row->fax_number;?></td>
                                                <td><?php echo $row->gst_no;?></td>
                                                 <td>
                                                      <?php if($row->branch_logo>0){?>
                                                      <img src="<?php echo base_url();?>assets/images/docImg/<?php echo $row->branch_logo;?>" height="40px;" width="60px;">
                                                      <?php }else{
                                                          }?></td>
                                                  <td><?php if($row->photo>0){?>
                                                  <img src="<?php echo base_url();?>assets/images/docImg/<?php echo $row->photo;?>" height="40px;" width="60px;">
                                                  <?php }else{
                                                          }?></td>
                                                  <td><?php if($row->owner_adhar>0){?>
                                                  <img src="https://thelifestylesapp.com/application/upload_image/images/<?php echo $row->owner_adhar;?>" height="40px;" width="60px;">
                                                   <?php }else{
                                                          }?></td>
                                                  <td> <?php if($row->gst_photo>0){?>
                                                  <img src="https://thelifestylesapp.com/application/upload_image/images/<?php echo $row->gst_photo;?>" height="40px;" width="60px;">
                                                    <?php }else{
                                                          }?></td>
                                                <td>
                                                <button type="button" class="btn btn-success" id="inactive<?php echo $i;?>">Active</button>
                                                 <script>
                                            	$("#inactive<?php echo $i;?>").click(function(){
                                                var id = $("#orderrow<?php echo $i;?>").val();
                                        // alert(id);
												$.post("<?php echo site_url();?>apanelForms/inactive", { id:id }, function(data){
												   // alert(data);
													$('#inactive<?php echo $i;?>').html("success");
												});
											});
                                            </script>
                                            
                                            </tr>
                                            <?php $i++; endforeach;?>
                                        </tbody>
                                       </table>  
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- Row -->
                </div><!-- Main Wrapper -->