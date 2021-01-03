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
                                                <th>Total Amount</th>
                                                <th>Email</th>
                                                  <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                           	<?php $i = 1;
                                           $od = $this->db->query("select * from day_book where status=1");
                                                if($od->num_rows()>0){
                                                   foreach($od->result() as $row):
                                                            $this->db->where("id",$row->paid_by);
                                                        $cust=$this->db->get("costumer")->row();
                                                          ?>
                                     
                                            <tr>
                                              
                                             <td><?php echo $i; ?></td>
                                                <td><?php echo $cust->name; ?></td>
                                                
                                                
                                                
                                                
                                                <td><?php echo $cust->address; ?></td>
                                                   <td><?php echo $cust->mobile; ?></td>
                                                      <td><?php echo $row->amount; ?></td>
                                                         <td><?php echo $cust->email; ?></td> 
                                                
                                              
                                                <td>
                                                	<a href="<?php echo base_url();?>apanelForms/deleteCareer/">
                                                		Delete
                                                	</a>
                                                </td>
                                            </tr>
                                            <?php $i++; ?>
                                            
                                            <?php endforeach ;}?>
                                        </tbody>
                                       </table>  
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- Row -->
                </div><!-- Main Wrapper -->