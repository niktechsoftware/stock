              <div id="main-wrapper" class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-white">
                            	<div class="panel-body">
                            	    	<div class="row">
                            			<div class="col-md-12">
                            			       <?php 
                            			        $categoryDe= $this->db->get("category");
                            			          ?>
		                                             <?php $size=$this->db->get("size_master");?>
                            				<form class="form-horizontal" action="<?php echo base_url()?>apanelForms/addProduct" method="post" enctype="multipart/form-data">
		                                        <?php $raj=$this->uri->segment(3);
		                                        if($raj)
		                                        {?>
		                                         <div class="col-md-12 alert alert-info">Added Successfully</div>
		                                      <?php   }
		                                         
		                                         if($this->uri->segment(3)=="Edit"){
		                                         $cid =$this->uri->segment(4); 
		                                         $this->db->where("id",$cid);
		                                         $categoryDetails = $this->db->get("stock_products")->row();
		                                           $this->db->where("id",$categoryDetails->sub_category);
		                                            $subcatagory=$this->db->get("sub_category");?>
		                                        <div class="col-md-6"> 
		                                        <input type ="hidden" name ="proid" value="<?php echo $categoryDetails->id;?>"/>
		                                         <div class="form-group">
		                                            <label class="col-sm-3 control-label">Select Category </label>
		                                            <div class="col-sm-9">
		                                              <select required="required" name ="mainCategory" id ="mainCategory1" class="form-control" required="required">
		                                                  <option value="">Select Category</option>
		                                                  <?php 
		                                                  $this->db->where("id",$categoryDetails->sub_category);
		                                                 $categoryid =  $this->db->get("sub_category")->row();
		                                                  foreach($categoryDe->result() as $cd):?>
		                                                    <option value = "<?php echo $cd->id;?>" <?php if($cd->id==$categoryid->cat_id){echo 'selected ="selected"';}?>><?php echo $cd->name;?></option>
		                                                  <?php endforeach;?>
		                                              </select>
		                                            </div>
		                                        </div>
		                                        </div>
		                                        <div class="col-md-6">
		                                         <div class="form-group">
		                                             <input type ="hidden" name="cateid" value = "0"/>
		                                              <input type ="hidden" name="subcateold"  id ="subcateold"  value = "<?php //echo $cd1->sub_category;?>"/>
		                                            <label for="input-Default" class="col-sm-3 control-label">Select Sub Category</label>
		                                            <div class="col-sm-9">
		                                                <select  name ="subCategory" id="subCategory1" class="form-control" required="required">
		                                                 <option value="">Select Category</option>
		                                                  <?php foreach($subcatagory->result() as $cd1):?>
		                                                    <option value = "<?php echo $cd1->id;?>"  <?php if($cd1->id == $categoryDetails->sub_category){echo 'selected="selected"';}?>><?php echo $cd1->name;?></option>
		                                                  <?php endforeach;?>
		                                              </select>
		                                            </div>
		                                        </div>
		                                        </div>
		                                        <div class="col-md-6">
		                                        <div class="form-group">
		                                           
		                                            <label for="input-Default" class="col-sm-3 control-label">Product Name </label>
		                                            <div class="col-sm-9">
		                                                <input type="text" class="form-control"  value="<?php echo $categoryDetails->name;?>" required name="productName">
		                                            </div>
		                                        </div>
		                                       </div>
		                                       	<div class="col-md-6">
		                                         <div class="form-group">
		                                             
		                                            <label for="input-Default" class="col-sm-3 control-label">Design no</label>
		                                            <div class="col-sm-9">
		                                                <input type="text" class="form-control"  value = "<?php echo $categoryDetails->company;?>" required name="company">
		                                            </div>
		                                        </div> 
		                                        </div>
		                                       	<div class="col-md-6"> 
		                                        <div class="form-group">
		                                            <label for="input-Default" class="col-sm-3 control-label">Product Type</label>
		                                            <div class="col-sm-9">
		                                                <input type="text" class="form-control"  value = "<?php echo $categoryDetails->p_type;?>" required name="p_type">
		                                            </div>
		                                        </div> 
		                                        </div>
		                                       	<div class="col-md-6"> 
		                                        <div class="form-group">
		                                            <label for="input-Default" class="col-sm-3 control-label">HSN </label>
		                                            <div class="col-sm-9">
		                                                <input type="text" class="form-control"  value ="<?php echo $categoryDetails->hsn;?>" required name="hsn">
		                                            </div>
		                                        </div>
		                                        </div>
		                                        
		                                        <div class="col-md-6">
		                                         <div class="form-group">
		                                            <label for="input-Default" class="col-sm-3 control-label">Size </label>
		                                             <?php $i=1;foreach($size->result() as $cd2):
		                                             $this->db->where("size_id",$cd2->id);
		                                             $this->db->where("product_id",$cid);
		                                             $getoldsize = $this->db->get("product_size");
		                                             if($getoldsize->num_rows()>0){
		                                             ?>
		                                              <input type="checkbox"  name="size<?php echo $i;?>" checked value= "<?php echo $cd2->id;?>"><?php echo $cd2->size_name;?>
		                                                  <?php }else{?>
		                                                      
		                                              <input type="checkbox"  name="size<?php echo $i;?>" value= "<?php echo $cd2->id;?>"><?php echo $cd2->size_name;?> 
		                                                      
		                                                  <?php  }  $i++; endforeach; 
		                                                 
		                                                  ?>
		                                                  
		                                        </div>
		                                        </div>
		                                       	<div class="col-md-6"> 
		                                         <div class="form-group">
		                                            <label for="input-Default" class="col-sm-3 control-label">Selling price </label>
		                                            <div class="col-sm-9">
		                                                <input type="text" class="form-control"  value ="<?php echo $categoryDetails->selling_price1;?>" required name="sellingprice">
		                                            </div>
		                                        </div>
		                                        </div>
		                                       <div class="col-md-6">
		                                         <div class="form-group">
		                                            <label for="input-Default" class="col-sm-3 control-label">Mrp Price </label>
		                                            <div class="col-sm-9">
		                                                <input type="text" class="form-control"  value="<?php echo $categoryDetails->mrp_price1;?>" required name="mrpprice">
		                                            </div>
		                                        </div>
		                                        </div>
		                                         <div class="col-md-6">
		                                         <div class="form-group">
		                                            <label for="input-Default" class="col-sm-3 control-label">Product Status </label>
		                                            <div class="col-sm-9">
		                                                 <select required="required" name ="status"  id ="status" class="form-control">
		                                                  <option value="">Select Status</option>
		                                                 <option value = "1">IN STOCK</option>
		                                                  <option value = "2">OUT OF STOCK</option>
		                                              </select>
		                                            </div>
		                                        </div>
		                                        </div>
		                                      <h4>Image Name Must Be 10 Digit</h4>
		                                       <div class="col-md-6">
		                                        <div class="form-group">
		                                            
		                                            <label class="col-sm-3 control-label">Procuct Image1</label>
		                                           
		                                            <div class="col-sm-9">
		                                                <img src="<?php echo base_url();?>assets/images/client_gallery/2/product/<?php echo $categoryDetails->file1; ?>" alt="Girl in a jacket" width="100" height="120">
		                                            	<input type="file"  name="selectedStu1" />
		                                            </div>
		                                        </div>
		                                        </div>
		                                        <div class="col-md-6">
		                                         <div class="form-group">
		                                            <label class="col-sm-3 control-label">Procuct Image2</label>
		                                            <div class="col-sm-9">
		                                                <img src="<?php echo base_url();?>assets/images/client_gallery/2/product/<?php echo $categoryDetails->file2; ?>" alt="Girl in a jacket" width="100" height="120">
		                                            	<input type="file"  name="selectedStu2" />
		                                            </div>
		                                        </div>
		                                        </div>
		                                        <div class="col-md-6">
		                                         <div class="form-group">
		                                            <label class="col-sm-3 control-label">Procuct Image3</label>
		                                            <div class="col-sm-9">
		                                                <img src="<?php echo base_url();?>assets/images/client_gallery/2/product/<?php echo $categoryDetails->file3; ?>" alt="Girl in a jacket" width="100" height="120">
		                                            	<input type="file"  name="selectedStu3" />
		                                            </div>
		                                        </div>
		                                        </div>
		                                         <div class="col-md-6">
		                                         <div class="form-group">
		                                            <label class="col-sm-3 control-label">Procuct Image4</label>
		                                            <div class="col-sm-9">
		                                                <img src="<?php echo base_url();?>assets/images/client_gallery/2/product/<?php echo $categoryDetails->file4; ?>" alt="Girl in a jacket" width="100" height="120">
		                                            	<input type="file"  name="selectedStu4" />
		                                            </div>
		                                        </div>
		                                        </div>
		                                        <div class="col-md-6">
		                                         <div class="col-sm-offset-3 col-sm-9">
		                                            <button type="submit" class="btn btn-success">Update Sub Category</button>
		                                         </div>
		                                        </div> 
		                                        
		                                        
		                                        
		                                        <?php }else{ ?>
		                                       	<div class="col-md-6"> 
		                                       	  <input type ="hidden" name ="proid" value="0"/>
		                                         <div class="form-group">
		                                            <label class="col-sm-3 control-label">Select Category </label>
		                                            <div class="col-sm-9">
		                                              <select required="required" name ="mainCategory"  id ="mainCategory" class="form-control">
		                                                  <option value="">Select Category</option>
		                                                  <?php foreach($categoryDe->result() as $cd):?>
		                                                    <option value = "<?php echo $cd->id;?>"><?php echo $cd->name;?></option>
		                                                  <?php endforeach;?>
		                                              </select>
		                                            </div>
		                                        </div>
		                                        </div>
		                                        <div class="col-md-6">
		                                         <div class="form-group">
		                                             <input type ="hidden" name="cateid" value = "0"/>
		                                            <label for="input-Default" class="col-sm-3 control-label">Select Sub Category</label>
		                                            <div class="col-sm-9">
		                                                <select  name ="subCategory"  id ="subCategory" class="form-control">
		                                               
		                                              </select>
		                                            </div>
		                                        </div>
		                                        </div>
		                                        <div class="col-md-6">
		                                        <div class="form-group">
		                                           
		                                            <label for="input-Default" class="col-sm-3 control-label">Product Name </label>
		                                            <div class="col-sm-9">
		                                                <input type="text" class="form-control"  required name="productName">
		                                            </div>
		                                        </div>
		                                       </div>
		                                       	<div class="col-md-6">
		                                         <div class="form-group">
		                                             
		                                            <label for="input-Default" class="col-sm-3 control-label">Company </label>
		                                            <div class="col-sm-9">
		                                                <input type="text" class="form-control"  required name="company">
		                                            </div>
		                                        </div> 
		                                        </div>
		                                       	<div class="col-md-6"> 
		                                        <div class="form-group">
		                                            <label for="input-Default" class="col-sm-3 control-label">Product Type</label>
		                                            <div class="col-sm-9">
		                                                <input type="text" class="form-control"  required name="p_type">
		                                            </div>
		                                        </div> 
		                                        </div>
		                                       	<div class="col-md-6"> 
		                                        <div class="form-group">
		                                            <label for="input-Default" class="col-sm-3 control-label">HSN </label>
		                                            <div class="col-sm-9">
		                                                <input type="text" class="form-control"  required name="hsn">
		                                            </div>
		                                        </div>
		                                        </div>
		                                        <div class="col-md-6">
		                                         <div class="form-group">
		                                            <label for="input-Default" class="col-sm-3 control-label">Size </label>
		                                           
		                                          
		                                           <?php $i=1;foreach($size->result() as $cd2):?>
		                                              <input type="checkbox" id="size<?php echo $i;?>" name="size<?php echo $i;?>" value="<?php echo $cd2->id;?>"><?php echo $cd2->size_name;?>
		                                                  <?php $i++;endforeach;?>
		                                        </div>
		                                        </div>
		                                       	<div class="col-md-6"> 
		                                         <div class="form-group">
		                                            <label for="input-Default" class="col-sm-3 control-label">Selling price </label>
		                                            <div class="col-sm-9">
		                                                <input type="text" class="form-control"  required name="sellingprice">
		                                            </div>
		                                        </div>
		                                        </div>
		                                       <div class="col-md-6">
		                                         <div class="form-group">
		                                            <label for="input-Default" class="col-sm-3 control-label">Mrp Price </label>
		                                            <div class="col-sm-9">
		                                                <input type="text" class="form-control"  required name="mrpprice">
		                                            </div>
		                                        </div>
		                                        </div>
		                                         <div class="col-md-6">
		                                         <div class="form-group">
		                                            <label for="input-Default" class="col-sm-3 control-label">Product Status </label>
		                                            <div class="col-sm-9">
		                                                 <select required="required" name ="status"  id ="status" class="form-control">
		                                                  <option value="">Select Status</option>
		                                                 <option value = "1">IN STOCK</option>
		                                                  <option value = "2">OUT OF STOCK</option>
		                                              </select>
		                                            </div>
		                                        </div>
		                                        </div>
		                                      <h4>Image Name Must Be 10 Digit</h4>
		                                       <div class="col-md-6">
		                                        <div class="form-group">
		                                            <label class="col-sm-3 control-label">Procuct Image1</label>
		                                            <div class="col-sm-9">
		                                            	<input type="file" required name="selectedStu1" />
		                                            </div>
		                                        </div>
		                                        </div>
		                                        <div class="col-md-6">
		                                         <div class="form-group">
		                                            <label class="col-sm-3 control-label">Procuct Image2</label>
		                                            <div class="col-sm-9">
		                                            	<input type="file" required name="selectedStu2" />
		                                            </div>
		                                        </div>
		                                        </div>
		                                        <div class="col-md-6">
		                                         <div class="form-group">
		                                            <label class="col-sm-3 control-label">Procuct Image3</label>
		                                            <div class="col-sm-9">
		                                            	<input type="file" required name="selectedStu3" />
		                                            </div>
		                                        </div>
		                                        </div>
		                                         <div class="col-md-6">
		                                         <div class="form-group">
		                                            <label class="col-sm-3 control-label">Procuct Image4</label>
		                                            <div class="col-sm-9">
		                                               	<input type="file"  name="selectedStu4" />
		                                            </div>
		                                        </div>
		                                        </div>
		                                          <div class="col-md-6">
		                                         <div class="col-sm-offset-3 col-sm-9">
		                                            <button type="submit" class="btn btn-success">Add Product</button>
		                                         </div>
		                                         </div>
		                                         <?php }?>
		                                    </form>
                            			</div>
                            		</div>
                                   <div class="table-responsive">
                                    <table id="example" class="display table" style="width: 100%; cellspacing: 0;">
                                        <thead>
                                            <tr>
                                                    <th>#               </th>
                                                    <th>CATEGORY        </th>
                                                    <th>SUB CATEGORY    </th>
                                                    <th>COMPANY         </th>
                                                    <th>PRODUCT NAME    </th>
                                                  <th>SIZE            </th>
                                                    <th>TYPE            </th>
                                              
                                                    <th>SELLING PRICE   </th>
                                                    <th>MRP PRICE       </th>
                                                    <th>HSN</th>
                                                    <th>STATUS</th>
                                                    <th>Image1</th>
                                                     <th>Image2</th>
                                                      <th>Image3</th>
                                                      <th>Image4</th>
                                                    <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        	<?php $i = 1;?>
                                        	<?php 
                                        	if($this->session->userdata("login_type")=="admin"){
                                        	  	$res =  $this->db->query("select * from stock_products ");
                                        	}else{
                                        	      $bcpde= $this->session->userdata("client_code");
                                        	 
                                        	    $res =  $this->db->query("select * from stock_products where branch_code='$bcpde'");
                                        
                                        	}?>
                                        
                                        	<?php foreach($res->result() as $row):?>
                                        	<?php $this->db->where('product_id',$row->id);
                                        	$psize=	$this->db->get("product_size");?>
                                            <tr>
                                              
                                             <td><?php echo $i; ?></td>
                                             <td></td>
                                             <td><?php echo $row->sub_category; ?></td>
                                                <td><?php echo $row->company; ?></td>
                                              <td><?php echo $row->name; ?></td>
                                             <td> <?php foreach($psize->result() as $ps):?>
		                                            <?php $this->db->where("id",$ps->size_id); 
		                                           $product_size=$this->db->get("size_master")->row();
		                                            ?>  <?php echo $product_size->size_name;?>  
		                                                  <?php endforeach;?></td>
                                            <!-- <td><?php //echo $row->size; ?></td>-->
                                             <td><?php echo $row->p_type; ?></td>
                                             <td><?php echo $row->selling_price1; ?></td>
                                              <td><?php echo $row->mrp_price1; ?></td>
                                              <td><?php echo $row->hsn; ?></td>
                                              <td><?php echo $row->status; ?></td>
                                             
                                              
                                               <td> <img src="<?php echo base_url();?>assets/images/client_gallery/2/product/<?php echo $row->file1; ?>" alt="Girl in a jacket" width="100" height="120"></td>
                                              <td> <img src="<?php echo base_url();?>assets/images/client_gallery/2/product/<?php echo $row->file2; ?>" alt="Girl in a jacket" width="100" height="120"></td>
                                                <td> <img src="<?php echo base_url();?>assets/images/client_gallery/2/product/<?php echo $row->file3; ?>" alt="Girl in a jacket" width="100" height="120"></td>
                                                <td>
                                                    <td> <img src="<?php echo base_url();?>assets/images/client_gallery/2/product/<?php echo $row->file4; ?>" alt="Girl in a jacket" width="100" height="120"></td>
                                                <td>
                                                	<a href="<?php echo base_url();?>apanelForms/deleteproduct/<?php echo $row->id; ?>" class ="btn btn-danger">
                                                		Delete
                                                	</a>
                                                	<a href="<?php echo base_url();?>apanel/productEntry/Edit/<?php echo $row->id; ?>" class ="btn btn-warning">
                                                		Edit
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
                <script>
                    
                $("#mainCategory").change(function(){
                    //alert("rah");
					var section = $("#mainCategory").val();
					//alert(testId);
					$.post("<?php echo site_url('ajax/getsucategory') ?>",{section : section},function(data){
						$("#subCategory").html(data);
					});
				});
				
				 $("#mainCategory1").change(function(){
                    //alert("rah");
					var section = $("#mainCategory1").val();
				    var sbid = $("#subcateold").val();
					$.post("<?php echo site_url('ajax/getsucategory1') ?>",{section : section , sbid : sbid},function(data){
						$("#subCategory1").html(data);
					});
				});
                </script>
                
                
                   <script>
                // alert("rahul");
			
        	
                  </script>