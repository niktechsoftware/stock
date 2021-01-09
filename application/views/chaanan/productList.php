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
                     <?php $this->load->view("chaanan/exportjs"); ?>
                     <div class="table-responsive">
                          <!--<table class="display nowrap" id="example">-->
                   <table id="example" class="display nowrap" style="width:100%">
                     <?php $sub=$this->db->get("stock_products");?>

                        <thead>
                          <tr>
                            <th class="text-center">
                              #
                            </th>
                            <th> Company Name</th>
                            <th> Product Name</th>
                            <th>Product Image</th>
                            <th>Sub Category</th>
                            <th>HSN</th>
                            <th>product Price<th>
                            <th>Selling Price<th>
                            <th>Weight</th>
                            <th>Quantity</th>
                           <!-- <th>Edit</th>-->
                            <th>Delete</th>
                          </tr>
                            </thead>
                              <tbody>
                           <?php $i=1;
                           $sellingprice=0;
                            $ppprice=0;
                           foreach($sub->result() as $row):?>
                         <tr>
                             <td><?php echo $i;?></td>
                             <td><?php echo $row->name;?></td>
                             <td><?php echo $row->company;?></td>
                             <td><img src="<?php echo base_url();?>assets/images/client_gallery/<?php echo $row->image;?>" height="50px;" width="80px;"></td>
                             <td><?php $this->db->where('id',$row->sub_category);
                                $category=$this->db->get('sub_category');
                                echo $category->row()->name;?></td>
                             <td><?php echo $row->hsn;?></td>
                             <td><?php $ppprice+= $row->product_price*$row->quantity; echo $row->product_price;?></td>
                             <td></td>
                             <td><?php $sellingprice+= $row->selling_price*$row->quantity;   echo $row->selling_price;?></td>
                            <td></td>
                             <td><?php echo $row->weight;?></td>
                             <td><?php echo $row->quantity;?></td>
                           <!-- <td><button type="button" class="btn btn-info">
                            <a href="<?php //echo base_url();?>apanel/product_entry/<?php //echo $row->id;?>">
                            <i class="fa fa-edit" style="color:white"></i>
                            </a></button></td>-->
                             <td><button type="button" class="btn btn-danger">
                            <a href="<?php echo base_url();?>apanelForms/deleteproduct/<?php echo $row->id;?>">
                            <i class="fa fa-trash" style="color:white"></i>
                            </a></button></td>
                             </tr>
                             <?php $i++; endforeach;?>
                             <tr>
                                 <td></td>
                                 <td>Total</td>
                                 <td></td>
                                 <td></td>
                                 <td></td>
                                 <td></td>
                                 <td><?php echo $ppprice;?></td>
                                 <td></td>
                                 <td><?php echo $sellingprice;?></td>
                                 
                                 <td></td>
                                 <td></td>
                                 <td></td>
                                 <td></td>
                                 
                             </tr>
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

