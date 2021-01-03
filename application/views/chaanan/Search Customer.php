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
                     <?php $sub=$this->db->get("customer");?>
                        <thead>
                          <tr>
                            <th class="text-center">
                              #
                            </th>
                            <th>Username</th>
                            <th> Customer Name</th>
                            <th> Mobile</th>
                            <th>Address</th>
                            <th>Gender</th>
                            <th>GST No</th>
                            <th>Date</th>
                            <th>Delete</th>
                           </tr>
                           </thead>
                     <tbody>
                           <?php $i=1; foreach($sub->result() as $row):?>
                         <tr>
                             <td><?php echo $i;?></td>
                             <td><?php echo $row->username;?></td>
                             <td><?php echo $row->name;?></td>
                            <td><?php echo $row->mobile;?></td>
                            <td><?php echo $row->address;?></td>
                            <td><?php echo $row->gender;?></td>
                            <td><?php echo $row->gst;?></td>
                            <td><?php echo $row->date;?></td>
                             <td><button type="button" class="btn btn-danger">
                            <a href="<?php echo base_url();?>apanelForms/deletecustomer/<?php echo $row->id;?>">
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

