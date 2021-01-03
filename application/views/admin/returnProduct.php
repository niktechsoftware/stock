<div class="main-content">
  <div class="section">
    <div class="section-body">
      <div class="row">
        <div class="col-xs-12 col-md-12 col-lg-12">
          <div class="card">
            <div class="card-header">
              <h4>Return Product</h4>
            </div>
            <form method="post" action="<?php echo base_url();?>index.php/billController/matchid" enctype="multipart/Form-data">
              <div class="card-body">
                <div class="row" id="regForm">
                    <div class="col-md-12 col-lg-12 col-xs-12">
                    <div class="row">
                       <div class="col-xs-6 col-md-6 col-lg-6">

                        <div class="form-group row">
                          <div class="col-md-5">
                            <label>Bill Number<span title="Required" style="color: red;">*</span></label>
                          </div>
                          <div class="col-md-7">
                            <div class="form-group">
                              <input type="text" class="form-control"
                                value="" name="billno"
                                 required="required">
                            </div>
                
                                         </div>
                        </div>


                      </div>
                       <div class="col-xs-6 col-md-6 col-lg-6">

                          <div class="form-group row">
                          <div class="col-md-12">
                            <div class="form-group">
                              <button type="submit" class="btn btn-primary">
                                <i class="far fa-edit">&nbsp;OK</i>
                              </button>
                            </div>
                          </div>
                        </div>


                      </div>
                         <div class="col-xs-6 col-md-6 col-lg-6">

                          <div class="form-group row">
                          <div class="col-md-12">
                            <div class="form-group">
	<?php $id=$this->uri->segment(4);
	if($this->uri->segment(3)=="false"){?>
	<script>
	    alert("Wrong Bill Number! Please Check Your Bill Number.");
	    
	</script>
	<span style="color:red;font-weight:bold">
<?php echo "Please Check Your Bill Number";?></span>
<?php	} ?>
            
                </div>
                </div>
                </div>
                    </div>
                  </div>

                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
