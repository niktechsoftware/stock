                <div id="main-wrapper" class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-white">
                                <div class="panel-body">
                                    <form class="form-horizontal" action="<?php echo base_url()?>allform/addNewProfile" method="post" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label for="inputEmail3" class="col-sm-2 control-label">Login Type</label>
                                            <div class="col-sm-4">
                                                <select  class="form-control" name="login_type" required="required">
			                                    	<option value="">-Login Type-</option>
			                                    <!--	<option value="admin">Admin</option>-->
			                                    	<option value="branch">Branch</option>
			                                    </select>
                                            </div>
                                            <label for="inputEmail3" class="col-sm-2 control-label">Branch/Company Name</label>
                                            <div class="col-sm-4">
                                                <input class="form-control" type="text" name="clinic_name" required="required">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputEmail3" class="col-sm-2 control-label">Branch/Company Address Line 1</label>
                                            <div class="col-sm-4">
                                                <input class="form-control" type="text" name="address_1" required="required">
                                            </div>
                                            <label for="inputEmail3" class="col-sm-2 control-label">Branch/Company Address Line 2</label>
                                            <div class="col-sm-4">
                                                <input type="text" name="address_2" class="form-control">
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="inputEmail3" class="col-sm-2 control-label">City</label>
                                            <div class="col-sm-4">
                                                <input type="text" name="city" class="form-control" required="required">
                                            </div>
                                            <label for="inputEmail3" class="col-sm-2 control-label">State</label>
                                            <div class="col-sm-4">
                                                <input type="text" name="state" class="form-control" required="required">
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="inputEmail3" class="col-sm-2 control-label">Area Pin Code</label>
                                            <div class="col-sm-4">
                                                <input type="text" name="pin" class="form-control">
                                            </div>
                                            <label for="inputEmail3" class="col-sm-2 control-label">Phone Number</label>
                                            <div class="col-sm-4">
                                                <input type="text" name="phone_number" class="form-control">
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="inputEmail3" class="col-sm-2 control-label">Fax Number</label>
                                            <div class="col-sm-4">
                                                <input type="text" name="fax_number" class="form-control">
                                            </div>
                                            <label for="inputEmail3" class="col-sm-2 control-label">Mobile Number</label>
                                            <div class="col-sm-4">
                                                <input type="text" name="mobile_number" class="form-control date-picker" required="required">
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="inputEmail3" class="col-sm-2 control-label">Email-1</label>
                                            <div class="col-sm-4">
                                                <input type="text" name="email1" class="form-control">
                                            </div>
                                            <label for="inputEmail3" class="col-sm-2 control-label">Email-2</label>
                                            <div class="col-sm-4">
                                                <input type="text" name="email2" class="form-control">
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="inputEmail3" class="col-sm-2 control-label">Org. Admin Name</label>
                                            <div class="col-sm-4">
                                                <input type="text" name="head_name" class="form-control" required="required">
                                            </div>
                                            <label for="inputEmail3" class="col-sm-2 control-label">GST Number</label>
                                            <div class="col-sm-4">
                                                <input type="text" name="gst_no" class="form-control">
                                            </div>
                                        </div>
                                       
                                     
                                        <div class="form-group">
                                            <label for="inputEmail3" class="col-sm-2 control-label">Browse Your's image (120 KB Max.)</label>
                                            <div class="col-sm-4">
                                                <input type="file" name="image" class="form-control">
                                            </div>
                                            <label for="inputEmail3" class="col-sm-2 control-label">Browse Branch Logo (100 KB Max.)</label>
                                            <div class="col-sm-4">
                                                <input type="file" name="logo" class="form-control" />
                                            </div>
                                        </div>
                                        
                                        <hr/>
                                        <div class="form-group">
                                            <label for="inputEmail3" class="col-sm-2 control-label">Complete Type</label>
                                        <div class="col-sm-4">
                                             <select  class="form-control" name="complete_type" required="required">
			                                    	<option value="">-Select Type-</option>
			                                	    <option value="Manufacturers">Manufacturers</option>
			                                    	<option value="wholesalers">wholesalers</option>
			                                    	<option value="resalars">resalars</option>
			                                    	<option value="retailers">retailers</option>
			                                    	<option value="Others">Others</option>
			                                    </select>
			                                    </div>
                                            <label for="inputEmail3" class="col-sm-2 control-label">Password</label>
                                            <div class="col-sm-4">
                                                <input type="password" name="pass" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-offset-2 col-sm-10">
                                            	<input type="hidden" name="submitType" value="admin">
                                                <button type="submit" class="btn btn-success">Add New Branch</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div><!-- Row -->
                </div><!-- Main Wrapper -->