<div class="main-content">
        <section class="section">
          <div class="section-body">
            <div class="row">
              <div class="col-md-12">
                <div class="card">
                  <div class="card-header">
                    <h4><?php echo $smallTitle;?></h4>
                  </div>
                    <div class="card-body">
                     <div id="setValue"></div>
                    <div class="table-responsive">
                      <table class="table table-striped" id="table-1">
                     <?php $sub=$this->db->get("bill_info");?>
                         <thead>
                          <tr>
                            <th class="text-center">
                              #
                            </th>
                            <th> Company OR Dealer Name</th>
                            <th> Mobile</th>
                            <th>Product Quantity</th>
                            <th>Total Amount</th>
                            <th>Amount Paid</th>
                            <th>Balance</th>
                            <th>Pay Mode</th>
                            <th>Date</th>
                           <!-- <th>subcategory Image</th>-->
                            <th>Bill Number</th>
                            <th>Delete</th>
                      
                          </tr>
                           </thead>
                     <tbody>
                           <?php $i=1; foreach($sub->result() as $row):?>
                         <tr>
                             <td><?php echo $i;?></td>
                             <td><?php echo $row->product_company_name;?></td>
                           <!-- <td><img src="<?php //echo base_url();?>assets/images/client_gallery/<?php //echo $row->image;?>" height="50px;" width="80px;"></td>-->
                             <td><?php echo $row->dealar_mobile1 ;?></td>
                            <td><?php echo $row->product_quantity;?></td>
                            <td><?php echo $row->total_prize;?></td>
                            <td><?php echo $row->amount_paid;?></td>
                            <td><?php echo $row->balance;?></td>
                            <td><?php echo $row->pay_mode;?></td>
                            <td><?php echo $row->date1;?></td>
                            <td><a href="<?php echo base_url();?>apanelForms/invoicedetail/<?php echo $row->reff_bil_num;?>"><?php echo $row->reff_bil_num;?></a></td>
                            <td><button type="button" class="btn btn-danger">
                            <a href="<?php echo base_url();?>apanelForms/deletephistory/<?php $row->reff_bil_num;?>">
                            <i class="fa fa-trash" style="color:white"></i>
                            </a></button></td>
                             </tr>
                             <?php $i++; endforeach;?>
                       
                       </tbody>
                        
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
    </section>
</div>

