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
                     <?php $emp=$this->db->get("employee");?>
                        <thead>
                          <tr>
                            <th class="text-center">
                              #
                            </th>
                            <th>Customer Id</th>
                            <th>Name</th>
                            <th>INVOICE NO.</th>
                            <th>PAY DATE</th>
                          </tr>
                           </thead>
                     <tbody>
                            <?php $gdbd=$this->db->get('sale_info');
                             if($gdbd->num_rows()>0){
                                $i=1;  foreach($gdbd->result() as $gt): ?>
                         <tr>
                             <td><?php echo $i;?></td>      
                                <td><?php echo $gt->cid;?></td> 
                                <td><?php echo $gt->name;?></td> 
                                <td><a href="<?php echo base_url();?>index.php/billController/invoice/<?php echo $gt->bill_no;?>"><?php echo $gt->bill_no;?></a></td> 
                                <td><?php echo $gt->date;?></td>  
                             </tr>
                             <?php $i++; endforeach; }?>
                       
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

