<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    	<style type="text/css">

	@media print
	{
			body * { visibility: hidden; }
			#printcontent * { visibility: visible; }
			#printcontent { position: absolute; top: -20px; left: 30px; }
	    }
	    
	    .button {
  background-color: #4CAF50; /* Green */
  border: none;
  color: white;
  padding: 16px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  -webkit-transition-duration: 0.4s; /* Safari */
  transition-duration: 0.4s;
  cursor: pointer;
}
  
  
  .button2 {
  background-color: #008CBA; 
  color: white; 
  border: 2px solid #008CBA;
}

.button2:hover {
  background-color: #4CAF50;
  color: white;
  border: 2px solid #4CAF50;
}

    .nob{
    	border: none;
    }
   
	</style>
<?php $school_code = $this->session->userdata("school_code");?>
<head>
	<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
	
	<title>Cash Invoice</title>
	
	<link rel='stylesheet' type='text/css' href='<?php echo base_url(); ?>assets/css/invoice_css/style.css' />
	<link rel='stylesheet' type='text/css' href='<?php echo base_url(); ?>assets/css/invoice_css/print.css' media="print" />
	<script type='text/javascript' src='<?php echo base_url(); ?>assets/js/invoice_js/jquery-1.3.2.min.js'></script>
	<script type='text/javascript' src='<?php echo base_url(); ?>assets/js/invoice_js/example.js'></script>
	
</head>

<body>
<div id="printcontent">
	<div id="page-wrap">

		<?php 
	$school_info = mysqli_query($this->db->conn_id,"select * from school where id = '$school_code'");
	$info = mysqli_fetch_object($school_info);
?>		
		<table style="width: 100%">
			<tr>
				<td width="10%" style="border: none;">
					<img src="<?php echo base_url();?>assets/<?php echo $this->session->userdata("school_code");?>/images/empImage/<?php echo $this->session->userdata("logo");?>" alt="" width="100" />
				</td>
				<td style="border: none;">
					<h1 align="center" style="text-transform:uppercase;"><?php echo $info->school_name; ?></h1>
			        <h3 align="center" style="font-variant:small-caps;">
						<?php echo $info->address1." ".$info->address2." ".$info->city; ?>
			        </h3>
			        <h3 align="center" style="font-variant:small-caps;">
						<?php echo $info->state." - ".$info->pin; ?>
			        </h3>
			        <h3 align="center" style="font-variant:small-caps;">
						<?php if(strlen($info->email1 > 0 )){echo "Phone : ".$info->email1.", ";} ?>
			            <?php echo "Mobile : ".$info->mobile_no; ?>
			        </h3>
				</td>
			</tr>
		</table>
		
		
		<div style="clear:both"></div>
		
		<div id="customer">
        	<div style="display:inline-block;">
<?php
	$id = $this->uri->segment(3);
	
	$this->db->where("invoice_no",$id);
	$getDaybookDetails = $this->db->get("day_book")->row();
	$this->db->where("receipt_no",$id);
	$getCashPayment = $this->db->get("cash_payment")->row();
	
	$this->db->where("invoice_no",$id);
	$getInvoiceDate = $this->db->get("invoice_serial")->row();
	if($getInvoiceDate->heads==8){
	$id_name = $getCashPayment->id_name;
	if($getCashPayment->valid_id){
	$valid_id = $getCashPayment->valid_id;
	if(strlen($valid_id) > 0):
		$empInfo = $this->db->query("select * from employee_info where id = '$valid_id' AND school_code = '$school_code' ");
	endif;
	
	}
?>
            <table>
                    <tr><td style="border:none;"><strong>To</strong></td></tr>
                    <tr>
                    	<td style="border:none;">
                        	<?php $i = $id_name; ?>
                        	<?php if($getCashPayment->valid_id){
							if($empInfo->num_rows()>0){	echo $empInfo->row()->name; } else {echo "N/A";}
                        	}?>
                    		<strong><?php echo $getCashPayment->name; ?></strong>
                        </td>
                    </tr>
                    <tr>
                    	<td style="border:none;">
                        	<?php echo '<strong>Mobile No. :</strong>'.$getCashPayment->phone_no; ?>
                        	<?php if($getCashPayment->valid_id){
									if($empInfo->num_rows()>0){	echo $empInfo->row()->mobile;} else {
										echo "N/A";
									}
                        	} ?>
                        </td>
                    </tr>
            </table>
			</div>
            <div style="display:inline-block; float:right">
            <table>
                <tr>
                    <td class="meta-head" colspan="2"><h3>Cash Payment</h3></td>
                </tr>
                <tr>
                    <td class="meta-head">
                    	<?php
							
								echo 'Reciept No. :';
							?>
                    </td>
                    <td><?php echo $id; ?></td>
                </tr>
                <tr>
                    <td class="meta-head">Paid Date</td>
                    <td><?php echo $getDaybookDetails->pay_date; ?></td>
                </tr>
            </table>
            </div>
		
		</div>
		
		<table id="items">
		
		  <tr>
		       <th width="3%">No.</th>
		        <th width="12%">Expen. name</th>
		         <th width="12%">Expen. depart</th>
               <th width="8%">id_name</th>
               <th width="8%">valid_id</th>
               <th width="10%">name</th>
               <th width="10%">mobile</th>
               <th width="28%">reason</th>
               <th width="5%">amount</th>
               
		  </tr>
		  <tr class="item-row">
		      <td><?php echo 1; ?></td>
		      <td><?php echo $getCashPayment->exp_id; ?></td>
		      <td><?php echo $getCashPayment->sub_exp_id; ?></td>
		      <td><?php echo $getCashPayment->id_name; ?></td>
		      <td><?php echo $getCashPayment->valid_id; ?></td>
		      <td><?php echo $getCashPayment->name; ?></td>
		      <td>
		      	<?php echo $getCashPayment->phone_no; ?>
		      	<?php if($getCashPayment->valid_id){
					if($empInfo->num_rows()>0){
					    	echo $empInfo->mobile;
					}else{echo "N/A"; }
		      	}?>

		      </td>
		      <td><?php echo $getCashPayment->reason; ?></td>
              <td><?php echo $getDaybookDetails->amount; ?></td>
		     
		  </tr>
		</table>
		
		<div id="terms">
		  <h5>Terms</h5>
		  <textarea>NET 30 Days. Finance Charge of 1.5% will be made on unpaid balances after 30 days.</textarea>
		</div>
	
	</div>
	<br/><br/>
 
    <?php }elseif($getInvoiceDate->heads==7 || $getInvoiceDate->heads==6){ 
				$id_name = $getCashPayment->name;
			
				
			?>
									<table>
													<tr><td style="border:none;"><strong>To</strong></td></tr>
													<tr>
														<td style="border:none;">
															<?php if($getInvoiceDate->heads==6){?>
																<strong><?php echo "Transaction ID".$id_name; ?>
															<?php 	
															}else{?>
															<strong><?php echo "Director ".$id_name; ?></strong>
															<?php } ?>
															</td>
													</tr>
													<tr>
														<td style="border:none;">
																
															
															</td>
													</tr>
									</table>
						</div>
									<div style="display:inline-block; float:right">
									<table>
											<tr>
											<?php if($getInvoiceDate->heads==6){?>
											<td class="meta-head" colspan="2"><h3>Bank Transaction</h3></td>	
											<?php }else{?>
													<td class="meta-head" colspan="2"><h3>Director Transaction</h3></td>
											<?php }?>
											</tr>
											<tr>
													<td class="meta-head">
														<?php
										
											echo 'Reciept No. :';
										?>
													</td>
													<td><?php echo $id; ?></td>
											</tr>
											<tr>
													<td class="meta-head">Date</td>
													<td><?php echo $getDaybookDetails->pay_date; ?></td>
											</tr>
									</table>
									</div>
					
					</div>
					
					<table id="items">
					
						<tr>
								 <th width="3%">No.</th>
									<th width="12%">Transaction Mode</th>
									 <th width="12%">Deposit/Credit</th>
										
										
										 <th width="10%">Paid_by(Transaction ID)</th>
										 <th width="28%">reason</th>
										 <th width="5%">amount</th>
										 
						</tr>
						<tr class="item-row">
								<td><?php echo 1; ?></td>
								<td><?php echo $getDaybookDetails->pay_mode; ?></td>
								<td><?php echo $getDaybookDetails->dabit_cradit; ?></td>
							
								<td><?php echo $getCashPayment->name; ?></td>
								<td><?php echo $getCashPayment->reason; ?></td>
								<td><?php echo $getDaybookDetails->amount; ?></td>
							
								
						</tr>
					</table>
					
					<div id="terms">
						<h5>Terms</h5>
						<textarea> Notice Area:-</textarea>
					</div>
				
				</div>
				<br/><br/>
			 




	<?php	}
	elseif($rowd){ 

			
				
			?>
									<table>
													<tr><td style="border:none;"><strong>To</strong></td></tr>
													<tr>
														<td style="border:none;">
															
															<strong><?php echo "Director"; ?></strong>
															</td>
													</tr>
													<tr>
														<td style="border:none;">
																
															
															</td>
													</tr>
									</table>
						</div>
									<div style="display:inline-block; float:right">
									<table>
											<tr>
													<td class="meta-head" colspan="2"><h3>Cash Payment</h3></td>
											</tr>
											<tr>
													<td class="meta-head">
														<?php
										
											echo 'Reciept No. :';
										?>
													</td>
													<td><?php echo $id; ?></td>
											</tr>
											<tr>
													<td class="meta-head">Date</td>
													<td><?php echo $rowd->date; ?></td>
											</tr>
									</table>
									</div>
					
					</div>
					
					<table id="items">
					
						<tr>
								 <th width="3%">No.</th>
								
									 <th width="12%">Deposit/Credit</th>
										 <th width="8%">Cheque no</th>
										 <th width="8%">Bank Name</th>
										 <th width="10%">Account Number</th>
										
										 <th width="28%">reason</th>
										 <th width="5%">amount</th>
										 
						</tr>
						<tr class="item-row">
								<td><?php echo 1; ?></td>
								<td><?php echo $rowd->id_name; ?></td>
								<td><?php echo $rowd->chequeTran_no; ?></td>
								<td><?php echo $rowd->bank_name; ?></td>
								<td><?php echo $rowd->account_no; ?></td>
							
								<td><?php echo $rowd->remark; ?></td>
								<td><?php echo $rowd->amount; ?></td>
							
								
						</tr>
					</table>
					
					<div id="terms">
						<h5>Terms</h5>
						<textarea>NET 30 Days. Finance Charge of 1.5% will be made on unpaid balances after 30 days.</textarea>
					</div>
				
				</div>
				<br/><br/>
			 



<?php	}else{
        echo "<h1>Employee Salary Not Piad . Plz Pay First Employee Salary. </h1>";
    }
    
    
    ?>
    </div>
</body>
<div class="invoice-buttons" style="text-align:center;">
    <button class="button button2" type="button"  onclick="window.print();">
      <i class="fa fa-print padding-right-sm"></i> Print Reciept
    </button>
  </div>
</html>