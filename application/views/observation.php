
<div class="main-content">
	<div class="section">
		<div class="section-body">
			<div class="row">
				<div class="col-xs-12 col-md-12 col-lg-12">
					<div class="card">
						<div class="card-header">
							<h4>Observation Form</h4>

						</div>

						<form method="post"	action="<?php echo base_url()?>index.php/customer/matchempid" enctype="multipart/Form-data" >
							<div class="card-body">
								<div class="row" id="regForm">
									<div class="col-md-12 col-lg-12 col-xs-12">
										<div class="row">
											<div class="col-xs-6 col-md-6 col-lg-6">
												<div class="form-group row">
													<div class="col-md-4">
														<label>ENTER EMPLOYEE ID</label>
													</div>
													<div class="col-md-8">
														<div class="form-group">
															<input type="text" class="form-control"
																value="" name="username"
																id="reg_id" required="required">
														</div>
												 </div>
											</div>
										</div>
											<div class="col-xs-6 col-md-6 col-lg-6">
												<div class="form-group row">
													<div class="col-md-3"></div>
													<div class="col-md-9">
														<div class="form-group">
															<button type="submit" class="btn btn-primary"
																id="regisbtn" style="">
														<i class="fas fa-check">&nbsp;OK</i>
												</button>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
				</form>
			</div>
		</div>
	<?php $id=$this->uri->segment(4);
	if($this->uri->segment(3)=="false")
	{?><span style="color:red;font-weight:bold">
		<?php echo "Please Check Your ID";?></span>
<?php	}
if($id){?>
		<div class="col-xs-12 col-md-12 col-lg-12">
			<div class="form-group row">
				<div class="col-md-12 col-lg-12 col-xs-12">
					<div class="row">
						<div class="col-xs-6 col-md-6 col-lg-6">
												<div class="form-group row">

													<div class="col-md-3" style="margin-left:5%;">
														<label>DATE</label>
													</div>
													<div class="col-md-8">
														<div class="form-group">
															<input type="date" class="form-control"
																value="" name="date"
																id="" >
														</div>
												 </div>
											</div>
										</div>
						<div class="col-xs-6 col-md-6 col-lg-6">
												<div class="form-group row">
													<div class="col-md-3"></div>
													<div class="col-md-9">
														<div class="form-group">
															<button type="submit" class="btn btn-primary"
																id="" style="">
														<i class="fas fa-check">&nbsp;OK</i>
												</button>
											</div>
										</div>
									</div>
								</div>
					</div>
				</div>
			</div>
		</div>
<?php	}?>
</div>
</div>

</div>