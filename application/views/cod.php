                <div id="main-wrapper" class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-white">
                            	<div class="panel-body">
                            		<div class="row">
                            			<div class="col-md-12">
                            				<form class="form-horizontal" action="<?php echo base_url()?>apanelForms/cod" method="post" enctype="multipart/form-data">
		                                        <?php $raj=$this->uri->segment(3);
		                                        if($raj=="success")
		                                        {
		                                        echo "Successfully Updated ";
		                                         }
		                                        ?>
		                                        <div class="form-group">
		                                            <label for="input-Default" class="col-sm-3 control-label"> Create Delivery Amount</label>
		                                            <div class="col-sm-9">
		                                                <input type="text" class="form-control" id="input-Default" required name="amount">
		                                            </div>
		                                        </div>
		                                         <div class="form-group">
		                                            <label for="input-Default" class="col-sm-3 control-label"> State</label>
		                                            <div class="col-sm-9">
		                                                <input type="text" class="form-control" id="input-Default" required name="state">
		                                            </div>
		                                        </div>
		                                         <div class="form-group">
		                                            <label for="input-Default" class="col-sm-3 control-label"> Country</label>
		                                           <div class="col-sm-9">
		                                              <select required="required" name ="country"  id ="country" class="form-control">
		                                                  <option value="">Select Country</option>
		                                                  		   <option value = "1">India</option>
		                                                  		        <option value = "0">Nepal</option>
		                                                  </select>
		                                                  </div>
		                                        </div>
		                                        <div class="form-group">
		                                            <label class="col-sm-3 control-label">Select Category </label>
		                                            <div class="col-sm-9">
		                                              <select required="required" name ="status"  id ="mainCategory" class="form-control">
		                                                  <option value="">Select status</option>
		                                                  		   <option value = "1">Active</option>
		                                                  		        <option value = "0">Inactive</option>
		                                                  </select>
		                                                  </div>
		                                            </div>
		                                          
		                                         <div class="col-sm-offset-3 col-sm-9">
		                                            <button type="submit" class="btn btn-success">Create</button>
		                                         </div>
		                                    </form>
                            			</div>
                            		</div>
                            	<br/><hr/><br/>
                                   <div class="table-responsive">
                                    <table id="example" class="display table" style="width: 100%; cellspacing: 0;">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                               
                                                <th>Amount</th>
                                                <th>State</th>
                                                <th>Country</th>
                                                <th>Status</th>
                                                <th>Date</th>
                                                <th>Edit</th>
                                                <th>Delete</th>
                                              
                                            </tr>
                                        </thead>
                                        <tbody>
                                        	<?php $i = 1;?>
                                        	<?php //$this->db->where("client_code",$this->session->userdata("client_code"));?>
                                        	<?php $res = $this->db->get("cod_amount")->result();?>
                                        	<?php foreach($res as $row):?>
                                        	<?php
                                        	
                                        	?>
                                         <tr> <td><?php echo $i; ?></td>
                                               <td><?php echo $row->amount;?></td>
                                               <td><?php echo $row->state;?></td>
                                               <td><?php if( $row->country==1){
                                                   echo "india";
                                               }else{
                                                   echo "Nepal";
                                               }?>
                                               
                                             </td>
                                              <td><?php   if($row->status==1){
                                                   echo "Active";
                                               }else{
                                                   echo "Inactive";
                                               }?>  
                                                 <td><?php echo $row->date;?>  
                                                 <td><a href="<?php echo base_url();?>apanel/editcod/<?php echo $row->id;?>">
                                                	Edit
                                                	</a></td>
                                                <td>
                                                	<a href="<?php echo base_url();?>apanelForms/deletecod/<?php echo $row->id;?>">
                                                		Delete
                                                	</a>
                                                </td>
                                                 
                                            </tr>
                                            <?php $i++; ?>
                                            <?php endforeach;?>
                                        </tbody>
                                       </table>  
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- Row -->
                </div><!-- Main Wrapper -->