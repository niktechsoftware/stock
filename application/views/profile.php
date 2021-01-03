<?php 
if(strlen($this->uri->segment(3)) > 0){
	$clinic_id = $this->uri->segment(3);
}else{
	$clinic_id = $this->session->userdata("client_code");
}
$profile = $this->db->query("select * from branch where username = '$clinic_id' or id ='$clinic_id'")->row();
/*$this->db->where("username",$clinic_id);
 $this->db->get("branch")->row();*/
?>
                <div id="main-wrapper" class="container">
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="panel panel-white" >
                                <div class="panel-body">
                                    <form class="form-horizontal" action="<?php echo base_url()?>allform/editProfile" method="post" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <input type="hidden" name = "row_id" value="<?php echo $profile->id;?>"/>
                                            <label for="inputEmail3" class="col-sm-2 control-label">Branch Name </label>
                                            <div class="col-sm-4">
                                                <label>
                                                	<strong>
                                                		<?php  echo $profile->id;
                                                			if(strlen($profile->cilnic_name) > 0){
                                                				echo $profile->cilnic_name;
                                                			}
                                                			else{ 
                                                				echo "N/A";
                                                			} 
                                                		?>
                                                	</strong>
                                                </label>
                                            </div>
                                            <label for="inputEmail3" class="col-sm-2 control-label">Branch Id</label>
                                            <div class="col-sm-4">
                                                <label>
                                                	<strong>
                                                		<?php 
                                                			if(strlen($profile->username) > 0){
                                                				echo $profile->username;
                                                			}
                                                			else{ 
                                                				echo "N/A";
                                                			} 
                                                		?>
                                                	</strong>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputEmail3" class="col-sm-2 control-label">Address</label>
                                            <div class="col-sm-4">
                                                <label>
                                                	<strong>
                                                		<?php 
                                                			if(strlen($profile->address_1) > 0){
                                                				echo $profile->address_1;
                                                				echo " ".$profile->address_2;
                                                				echo " ".$profile->city;
                                                				echo " ".$profile->state;
                                                				echo " ".$profile->pin;
                                                			}
                                                			else{ 
                                                				echo "N/A";
                                                			} 
                                                		?>
                                                	</strong>
                                                </label>
                                            </div>
                                            <label for="inputEmail3" class="col-sm-2 control-label">Phone Number</label>
                                            <div class="col-sm-4">
                                                <label>
                                                	<strong>
                                                		<?php 
                                                			if(strlen($profile->phone_number) > 0){
                                                				echo $profile->phone_number;
                                                			}
                                                			else{ 
                                                				echo "N/A";
                                                			} 
                                                		?>
                                                	</strong>
                                                </label>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="inputEmail3" class="col-sm-2 control-label">Fax Number</label>
                                            <div class="col-sm-4">
                                                <label>
                                                	<strong>
                                                		<?php 
                                                			if(strlen($profile->fax_number) > 0){
                                                				echo $profile->fax_number;
                                                			}
                                                			else{ 
                                                				echo "N/A";
                                                			} 
                                                		?>
                                                	</strong>
                                                </label>
                                            </div>
                                            <label for="inputEmail3" class="col-sm-2 control-label">Mobile Number</label>
                                            <div class="col-sm-4">
                                                <label>
                                                	<strong>
                                                		<?php 
                                                			if(strlen($profile->mobile_number) > 0){
                                                				echo $profile->mobile_number;
                                                			}
                                                			else{ 
                                                				echo "N/A";
                                                			} 
                                                		?>
                                                	</strong>
                                                </label>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="inputEmail3" class="col-sm-2 control-label">Email Address</label>
                                            <div class="col-sm-4">
                                                <label>
                                                	<strong>
                                                		<?php 
                                                			if(strlen($profile->email1) > 0){
                                                				echo $profile->email1;
                                                				echo ",".$profile->email2;
                                                			}
                                                			else{ 
                                                				echo "N/A";
                                                			} 
                                                		?>
                                                	</strong>
                                                </label>
                                            </div>
                                            <label for="inputEmail3" class="col-sm-2 control-label">Head Name</label>
                                            <div class="col-sm-4">
                                                <label>
                                                	<strong>
                                                		<?php 
                                                			if(strlen($profile->head_name) > 0){
                                                				echo $profile->head_name;
                                                			}
                                                			else{ 
                                                				echo "N/A";
                                                			} 
                                                		?>
                                                	</strong>
                                                </label>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="inputEmail3" class="col-sm-2 control-label">Address 2</label>
                                            <div class="col-sm-4">
                                                <label>
                                                	<strong>
                                                		<?php 
                                                			if(strlen($profile->address_2) > 0){
																
															?> <?php echo$profile->address_2;?>
															<?php
                                                			}
                                                			else{ 
                                                				echo "N/A";
                                                			} 
                                                		?>
                                                	</strong>
                                                </label>
                                            </div>
                                            <label for="inputEmail3" class="col-sm-2 control-label">Email 2</label>
                                            <div class="col-sm-4">
                                                <label>
                                                	<strong>
                                                		<?php 
                                                			if(strlen($profile->email2) > 0){?>
														<?php echo $profile->email2;?>" 
                                                				
                                                		<?php	}
                                                			else{ 
                                                				echo "N/A";
                                                			} 
                                                		?>
                                                	</strong>
                                                </label>
                                            </div>
                                        </div>
                                     
                                       
                                        <div class="form-group">
                                            <label for="inputEmail3" class="col-sm-2 control-label">Gst No</label>
                                            <div class="col-sm-4">
                                                <label>
                                                	<strong>
                                                		<?php 
                                                			if(strlen($profile->gst_no) > 0){
																
															?> <?php echo$profile->gst_no;?>
															<?php
                                                			}
                                                			else{ 
                                                				echo "N/A";
                                                			} 
                                                		?>
                                                	</strong>
                                                </label>
                                            </div>
                                            <label for="inputEmail3" class="col-sm-2 control-label">Admin Name</label>
                                            <div class="col-sm-4">
                                                <label>
                                                	<strong>
                                                		<?php 
                                                			if(strlen($profile->org_admin_name) > 0){
																
															?> <?php echo$profile->org_admin_name;?>
															<?php
                                                			}
                                                			else{ 
                                                				echo "N/A";
                                                			} 
                                                		?>
                                                	</strong>
                                                </label>
                                            </div>
                                        </div>
                                        
                                      
                                        <div class="form-group">
                                            <label for="inputEmail3" class="col-sm-2 control-label">Image</label>
                                            <div class="col-sm-4">
                                                <label>
                                                	<strong>
                                                		<?php 
                                                			if(strlen($profile->branch_logo) > 0){
																
															?> <img src="<?php echo base_url().'/assets/images/docImg/'.$profile->branch_logo;?>"width="100px;" height="100px;">
															<?php
                                                			}
                                                			else{ 
                                                				echo "N/A";
                                                			} 
                                                		?>
                                                	</strong>
                                                </label>
                                            </div>
                                            <label for="inputEmail3" class="col-sm-2 control-label">Logo</label>
                                            <div class="col-sm-4">
                                                <label>
                                                	<strong>
                                                		<?php 
                                                			if(strlen($profile->photo) > 0){?>
															<img src="<?php echo base_url().'/assets/images/docImg/'.$profile->photo;?>" width="100px;" height="100px;">;
                                                				
                                                		<?php	}
                                                			else{ 
                                                				echo "N/A";
                                                			} 
                                                		?>
                                                	</strong>
                                                </label>
                                            </div>
                                        </div>
                                        
                                      <br/>
                                      <br/>
                                       <br/>
                                        <br/>
                                        <br/> 
                                        <hr/>
                                        <div class="form-group">
                                            <div class="col-sm-offset-2 col-sm-10">
                                            	<input type="hidden" name="id" value="<?php echo $clinic_id;?>">
                                                <button type="submit" class="btn btn-success">Edit Profile</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div><!-- Row -->
                </div><!-- Main Wrapper -->