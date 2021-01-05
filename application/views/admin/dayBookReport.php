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
                    <input type="hidden" name ="sdate" value="<?php echo $sdate;?>" >
                    <input type="hidden" name ="edate" value="<?php echo $edate;?>" >
                
                    <div class="table-responsive">
                      <table class="table table-striped" id="table-1">
                     
                        <thead>
                          <tr>
                            <th class="text-center">
                              #
                            </th>
                            <th>PAID BY</th>
                            <th>RECIEVED BY</th>
                            <th>REASON</th>
                            <th>DEBIT</th>
                            <th>CREDIT</th>
                            <th>INVOICE NO.</th>
                            <th>PAY DATE</th>
                            <th>PRODUCT QU.</th>
                            <th>PROFIT</th>
                          </tr>
                        </thead>
                        <tbody>
                         
                          <?php 
                          $profit=0;
                          $dabit=0;
                          $credit=0;
                           if($gdbd->num_rows()>0){
                                $i=1;
                                foreach($gdbd->result() as $gt):  ?>
                                <td><?php echo $i;?></td>      
                                <td><?php echo $gt->paid_by;?></td> 
                                <td><?php echo $gt->paid_to;?></td> 
                                <td><?php echo $gt->reason;?></td> 
                                <td style="color: red"><?php if($gt->dabit_cradit == 0 ){ $dabit = $dabit + $gt->amount; echo $gt->amount; } ?></td>
                                <td style="color: green"><?php if($gt->dabit_cradit == 1 || $gt->dabit_cradit == 2){ $credit = $credit + $gt->amount; echo $gt->amount; } ?></td>
                                <td><a href="<?php echo base_url();?>index.php/billController/invoice/<?php echo $gt->invoice_no;?>"><?php echo $gt->invoice_no;?></a></td> 
                                <td><?php echo $gt->pay_date;?></td>  
                                <?php   $itemQuan=0;
                                        $this->db->where("bill_no",$gt->invoice_no);
                                        $sinfo=$this->db->get("sale_info");
                                        if($sinfo->num_rows()>0){
                                        $this->db->where('bill_no_id',$sinfo->row()->id);
                                        $sproduct=$this->db->get('sale_product');
                                     $amount1=0;
                                     foreach($sproduct->result() as $sproduct):
                                     $this->db->where('id',$sproduct->item_id);
                                    $sp=$this->db->get('stock_products');?>
                                <?php $itemQuan+= $sproduct->item_quantity;?>
                                <?php if($sp->num_rows() >0){
                                $amount1 += $sp->row()->selling_price*$sproduct->item_quantity - $sp->row()->product_price*$sproduct->item_quantity;
                                $profit = $profit + $amount1;
                               // echo $amount1;  
                               } ?>
                                 <?php endforeach;  }?>
                                 <td><?php echo $itemQuan;?></td>
                                 <td><?php echo $amount1;?></td>
                                 </tr>
                          </tbody>  
                          <?php $i++; endforeach; }?>
                        <tfoot>
							<tr>
								<td>----</td>
								<td>----------</td>
								<td align="right"><strong>Total</strong></td>
								<td>----------</td>
							
								<td><?php echo $dabit; ?></td>
								<td style="color: red"><?php echo $credit; ?></td>
								<td></td>
								<td></td>
								<td>----------</td>
								<td><b><?php echo $profit; ?></b></td>
							</tr>
						</tfoot>
                        
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>