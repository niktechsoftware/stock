                <div id="main-wrapper" class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-white">
                            	<div class="panel-body">
                            		<div class="row">
                            			<div class="col-md-12">
                            				<form class="form-horizontal" action="<?php echo base_url()?>apanelForms/copon" method="post" enctype="multipart/form-data">
		                                        <?php $raj=$this->uri->segment(3);
		                                        if($raj)
		                                        {
		                                        echo "Successfully Uploaded Image";
		                                         }?>
		                                        <div class="form-group">
		                                            <label for="input-Default" class="col-sm-3 control-label"> Coupon Code</label>
		                                            <div class="col-sm-9">
		                                                <input type="text" class="form-control" id="input-Default" required name="coupon">
		                                            </div>
		                                        </div>
		                                         <div class="form-group">
		                                            <label for="input-Default" class="col-sm-3 control-label">Amount</label>
		                                            <div class="col-sm-9">
		                                                <input type="text" class="form-control" id="input-Default" required name="amount">
		                                            </div>
		                                        </div>
		                                        <div class="form-group">
		                                            <label class="col-sm-3 control-label">Manage Coupon </label>
		                                            <div class="col-sm-9">
		                                              <select required="required" name ="applyfor"  id ="mainCategory" class="form-control">
		                                                  <option value="">Select Apply For</option>
		                                                  		   <option value = "forall">Apply At OnceFor All</option>
		                                                  		        <option value = "individual">Indivisual</option>
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
                                               <th>Coupon code</th>
                                               <th>Apply For</th>
                                                <th>Amount</th>
                                                <th>Status</th>
                                                <th>Date</th>
                                                <th>Delete</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                        	<?php $i = 1;?>
                                        	<?php //$this->db->where("client_code",$this->session->userdata("client_code"));?>
                                        	<?php $res = $this->db->get("coupon")->result();?>
                                        	<?php foreach($res as $row):?>
                                        	<?php
                                        	
                                        	?>
                                         <tr> <td><?php echo $i; ?></td>
                                         <td><?php echo $row->coupon_code;?></td>
                                         <td><?php echo $row->apply_for;?></td>
                                               <td><?php echo $row->amount;?></td>
                                              <td><?php echo $row->status;?>  
                                                 <td><?php echo $row->date;?>  
                                                <td>
                                                	<a href="<?php echo base_url();?>apanelForms/deletecoupon/<?php echo $row->id;?>">
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