<div class="main-content">
        <section class="section">
          <div class="section-body">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4><?php echo $smallTitle;?></h4>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped">
                     
                        <thead>
                          <tr>
                            <th>Customer ID</th>
                            <th>Customer Name</th>
                            <th>Mobile Number</th>
                            <th>Bill Amount</th>
                            <th>Paid Amount</th>
                            <th>Balance</th>
                              <th>Date</th>
                            <th>Status</th>
                          </tr>
                        </thead>
                        <tbody>
                            <?php if($sinfo->num_rows()>0){
                            if($dbook->num_rows()>0){?>
                            <tr>
                                <td><?php echo $sinfo->row()->cid;?></td>
                                <?php $this->db->where('username',$sinfo->row()->cid);
                                         $cust=$this->db->get('customer');
                                        // if($cust->num_rows()>0){?>
                                <td><?php if($sinfo->row()->name){
                                          echo $sinfo->row()->name;
                                         }else{
                                             if($cust->num_rows()>0){
                                    echo $cust->row()->name; } }?></td>
                                <td><?php if($sinfo->row()->mobile_number){
                                          echo $sinfo->row()->mobile_number;
                                         }else{
                                             if($cust->num_rows()>0){
                                        echo $cust->row()->mobile; } }?></td>
                                <td><?php echo $sinfo->row()->total_price;?></td>
                                <td><?php echo $sinfo->row()->sub_total;?></td>
                                <td><?php echo $sinfo->row()->balance;?></td>\
                                <td><?php echo $sinfo->row()->date;?></td>
                                <td><?php echo $dbook->row()->status;?></td>
                            </tr>
                         <?php } //} ?>
                        </tbody>
                        </table>
                    </div>
                      <div class="col-md-12 col-lg-12 col-xs-12">
										<div class="row" id="rahul23">
									<table class="table table-hover" class="form-control">
						<thead>
	                        <tr class="text-uppercase">
	                           <th class="text-center"><label>Item Name</label></th>
	                           <th><label>Item Size</label></th>
	                           <th><label>Price/Item</label></th>
	                           <th><label>Remaining Item Quantity</label></th>
	                            <th><label>Purchase Item Quantity</label></th>
	                           <th><label>Discount(%)</label></th>
	                           <th><label>Discount Rs</label></th>
	                           <th><label>Total Price</label></th>
	                           <th><label>Sub Total</label></th>
	                           <th><label>Remove</label></th>
	                        </tr>
	                    </thead>
	                    <tbody>
                        <?php $i = 1; 
                          foreach($sinfo->result() as $sinfo){ 
                         $this->db->where("bill_no_id",$sinfo->id);
	                        $getpd = $this->db->get("sale_product");
	                        foreach($getpd->result() as $pd){
	                      
	                           $this->db->where('id',$pd->item_id);
	                            $sp=$this->db->get('stock_products');
	                            foreach($sp->result() as $sp):
	                        ?>
	                        <tr id="row<?php echo $i; ?>">
                             <td>   
						     <input type="hidden" name="count<?php echo $i;?>" id="count<?php echo $i;?>" value = "<?php echo $i;?>">
						     
						     <input type='text' class='form-control' id='item_no<?php echo $i; ?>'  value="<?php echo $sp->name;?>"  name='item_no<?php echo $i; ?>'  width='100%'>
						            <ul style="list-style: none; padding:0px;" id="namep<?php echo $i;?>"></ul>
						            <?php //} ?>
                            </td>
                           <!-- <td>&nbsp;<select class='form-control' id ="category<?php echo $i;?>" name="category<?php echo $i;?>"  value="<?php $sp->cat_id;?>"> </select>
						         <!-- <input readonly id="item_cat<?php echo $i; ?>" class="text-uppercase form-control" name="item_cat<?php echo $i; ?>" style="width:70px;">-->
                           <!-- </td>
                            <td>&nbsp;<select class='form-control' id ="subcategory<?php echo $i;?>"  value="<?php echo $sp->sub_category;?>" name="subcategory<?php echo $i;?>"> </select></td>
                             -->
                             <td>
                                  <input readonly id="item_size<?php echo $i; ?>"  value="<?php echo $sp->weight;?>" class="text-uppercase form-control" name="item_size<?php echo $i; ?>" style="width:70px;">
                            </td>
                             <td>
                                   <input readonly id="item_price<?php echo $i; ?>"  class="text-uppercase form-control" value="<?php echo $sp->selling_price;?>" name="item_price<?php echo $i; ?>" style="width:70px;">
                            </td>
                             <td>
                             <input readonly id="item_quantity1<?php echo $i; ?>" class="text-uppercase form-control" value="<?php echo $sp->quantity; ?>" name="item_quantity1<?php echo $i; ?>" style="width:50px;" type="text"/>
                             </td>
                            <td>
                            	
                                <input id="item_quantity<?php echo $i; ?>" class="text-uppercase form-control" value="<?php echo $pd->item_quantity; ?>" name="item_quantity<?php echo $i; ?>" style="width:50px;" type="text"/>
                            </td>
                            <td>
                                <input id="item_discount<?php echo $i; ?>" class="text-uppercase form-control" value="<?php echo $sinfo->dis; ?>" name="item_discount<?php echo $i; ?>" style="width:50px;" type="text"/>
                            </td>
                            <td>
                                <input id="discount<?php echo $i; ?>"  class="text-uppercase form-control" value="<?php echo $sinfo->dis_rs; ?>" name="discount<?php echo $i; ?>" style="width:70px;" type="text"/>
                            </td>
                             <td>
                                 <?php $tp=$sp->selling_price*$pd->item_quantity;?>
                                  <input readonly id="total_price<?php echo $i; ?>" class="text-uppercase form-control"  value="<?php echo $tp;?>"  name="total_price<?php echo $i; ?>" style="width:70px;" type="text"/>
                            </td>
                            <td>
                                <input  readonly id="sub_total<?php echo $i; ?>" class="text-uppercase form-control" value="<?php echo $tp;?>" name="sub_total<?php echo $i; ?>" style="width:70px;" type="text"/>
                            </td>
                             <td><a href="<?php echo base_url();?>billController/deletephistory/<?php echo $sinfo->bill_no;?>/<?php echo $sinfo->id;?>">
                                 <input type="button" class="btn btn-danger" value="Remove">
                            </a></td>
                            </tr>
                            <?php endforeach; } ?>
                            <tr>
                            	<td colspan="3"><strong>Previous Balance</strong></td>
                                <td colspan="5"><input  readonly id="valid_id" name="p_balance" style="width:180px;" class="form-control" type="text"/></td>
                       </tr>
                     
                       <tr>
                            	<td colspan="3"><strong>Total</strong></td>
                                <td colspan="5"><input id="total" name="tt" style="width:180px;" value="<?php echo $sinfo->total_price;?>" class="form-control" type="text" required /></td>
                       </tr>
                       
                       <tr>
                            	<td colspan="3"><strong>Paid</strong></td>
                                <td colspan="5"><input id="paid" name="paid" style="width:180px;" value="<?php echo $sinfo->sub_total;?>" class="form-control" type="text" required /></td>
                       </tr>
                       <tr>
                            	<td colspan="3"><strong>Balance</strong></td>
                                <td colspan="5"><input id="balance" name="balance" value="<?php echo $sinfo->balance;?>" style="width:180px;" class="form-control" type="text" /></td>
                       </tr>
                       <?php } } ?>
                      </tbody>
								<!------------------------------------------------------------>	
			
						 
						  </table>
						  <!--	<div class="col-xs-6 col-md-6 col-lg-6">
												    	<div class="form-group row">
													<div class="col-md-12">
														<div class="form-group" >
															<button type="submit" class="btn btn-primary" style="margin-left:160%;">
																<i class="far fa-edit">&nbsp;Submit</i>
															</button>
														</div>
													</div>
												</div>
											</div>-->

							
							</div>
									</div>
								
                  </div>
                </div>
              </div>
            </div>
