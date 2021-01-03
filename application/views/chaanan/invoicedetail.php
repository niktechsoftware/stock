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
} .nob{
    	border: none;
    }
    </style>
    <script>
        function convert_number(number)
        {
            if ((number < 0) || (number > 999999999))
            {
                return "Number is out of range";
            }
            var Gn = Math.floor(number / 10000000);  
            number -= Gn * 10000000;
            var kn = Math.floor(number / 100000);     /* lakhs */
            number -= kn * 100000;
            var Hn = Math.floor(number / 1000);      /* thousand */
            number -= Hn * 1000;
            var Dn = Math.floor(number / 100);       /* Tens (deca) */
            number = number % 100;               /* Ones */
            var tn= Math.floor(number / 10);
            var one=Math.floor(number % 10);
            var res = "";

            if (Gn>0){
                res += (convert_number(Gn) + " Crore");
            }
            if (kn>0){
                res += (((res=="") ? "" : " ") +
                    convert_number(kn) + " Lakhs");
            }
            if (Hn>0){
                res += (((res=="") ? "" : " ") +
                    convert_number(Hn) + " Thousand");
            }

            if (Dn){
                res += (((res=="") ? "" : " ") +
                    convert_number(Dn) + " hundred");
            }
            var ones = Array("", "One", "Two", "Three", "Four", "Five", "Six","Seven", "Eight", "Nine", "Ten", "Eleven", "Twelve", "Thirteen","Fourteen", "Fifteen", "Sixteen", "Seventeen", "Eightteen","Nineteen");
            var tens = Array("", "", "Twenty", "Thirty", "Fourty", "Fifty", "Sixty","Seventy", "Eigthy", "Ninety");

            if (tn>0 || one>0)
            {
                if (!(res==""))
                {
                    res += " and ";
                }
                if (tn < 2)
                {
                    res += ones[tn * 10 + one];
                }
                else
                {
             res += tens[tn];
                    if (one>0)
                    {
                        res += ("-" + ones[one]);
                    }
                }
            }

            if (res=="")
            {
                res = "zero";
            }
            return res;
        }

    </script>
<?php //$school_code = $this->session->userdata("school_code");?>
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
    <div id="page-wrap" style="background-color:#f2e6ff;">
<?php 

	$info=$this->db->get("general_settings")->row();
	$this->db->where("reff_bil_num",$reff_bil_num);
   $data=$this->db->get('bill_info');
	
?>		
		<table style="width: 100%; border: none;">
			<tr style="width: 100%; border: none;">
		<td calss="form-control" style="border: none;"><img src="http://niktechsoftware.in/bakery/assets/images/logo-1.png" style="width:90px; height:80px; margin-left:90px;"></td>
				<td width="90%" style="border: none; ">
				    <h2 align="center" style="font-variant:small-caps; color:black bold;">
					<?php echo $info->business_name; ?>
                    </h2>
			        <h3 align="center" style="font-variant:small-caps;">
					<?php echo $info->address_1; ?>
			        </h3>
			       
			        <h3 align="center" style="font-variant:small-caps;">
					<?php echo "Mobile : ".$info->phone_number; ?>,	<?php echo $info->mobile_number;?>
			        </h3>
			        <h3 align="center" style="font-variant:small-caps;">
						<?php if(strlen($info->email1 > 0 )){echo "email : ".$info->email2.", ";} ?>
			           
			        </h3>
				</td>
			</tr>
		</table>
		
		   <div id="customer">
        	  <div style="display:inline-block;">
<?php
   	    // $id = $this->uri->segment(3);
   	    // $this->db->where('invoice_no',$id);
   	    // $cod_amount=$this->db->get("day_book")->row();
   	    // $this->db->where("invoice_no",$id);
        // $cust=$this->db->get("like_product")->row();
        // $orderid=$this->uri->segment(3);
        // $this->db->where("invoice_no",$orderid);
        // $orderDetails =$this->db->get("day_book")->row();
        //  $this->db->where("order_id",$orderid);
        //  $ptm = $this->db->get("paytm_txn")->row();
        //  $this->db->where("id",$orderDetails->paid_by);
        //  $customerDetails = $this->db->get("costumer")->row();
        //  $this->db->where("id",$ptm->address);
        //  $cadd = $this->db->get("customer_address")->row();
        //  $this->db->where("order_id",$orderid);
        //  $pytmR=$this->db->get("paytm_txn")->row();
         
  
?>	<br/><br/>
            <table style="border:none; ">
                    <tr>
                       <td style="border:none; "><strong>To</strong></td>
                    </tr>
                    <tr>
                    	<td style="border:none;">
                    	 <span calss="form-control" style="color:#ff6666;">
                        <?php 
                    	       echo '<strong>Name. :</strong></span>&nbsp;&nbsp;'.$data->row()->product_company_name; ?>
                    	    
                          </strong>
                        </td>
                    </tr>

                    <tr>	<td style="border:none; ">
                    	 <span calss="form-control" style="color:#ff6666;"> <?php echo '<strong>Mobile No. :</strong></span>&nbsp;&nbsp;'.$data->row()->dealar_mobile1; ?></td></tr>
                  <tr>  <td style="border:none;margin-right:30%; "><span calss="form-control" style="color:#ff6666;">
                    	  <?php echo '<strong>Address. :</strong></span>&nbsp;&nbsp;'. $data->row()->dealer_address; ?>
                    
                        </td>
                        </tr>
                                            <tr>
                        <td style="border:none;"> <span calss="form-control" style="color:#ff6666;"><?php echo '<strong> GST NUMBER. :</strong></span>&nbsp;&nbsp;'.$data->row()->Gst;?></td>
                       </tr>
                     
            </table>
            	<br/><br/>
			</div>
		
            <div style="display:inline-block; float:right">
                	<br/><br/>
            <table>
                <tr>
                    <td class="meta-head" colspan="2"><h3>Cash Payment</h3></td>
                </tr>
                <tr>
                    <td >
                     <span calss="form-control" style="color:#ff6666;"> 	<?php echo 'Reciept No. :';	?></span>
                    </td>
                            <td><?php echo $data->row()->reff_bil_num; ?></td>
                </tr>
                <tr>
                 <td > <span calss="form-control" style="color:#ff6666;">    Date:</span></td>
                    <td><?php echo $data->row()->date1; ?></td>
                </tr>
                 <tr>
                 <td >  <span calss="form-control" style="color:#ff6666;">   Mode:</span></td>
                    <td><?php echo $data->row()->pay_mode; ?></td>
                </tr>
            </table>
            </div>
		 </div>
		 <table id="items">
		     <tr>
		       <th width="15%">#</th>
		       <th width="18%">Product Name</th>
		       <th width="18%">Amount</th>
               <th width="18%">Quantity</th>
               <th width="18%">Discount(RS.)</th>
               <th width="10%">Total</th>
             </tr>
<?php 
	$this->db->where('reff_bill_num',$data->row()->reff_bil_num);
	$likep=$this->db->get('purchase_product');
	//print_r($likep);
    $i=1; $totquantity=0; $totPrice=0;	
    foreach($likep->result() as $lp):
        $totPrice=$totPrice+$lp->total_amunt;
         $this->db->where("hsn",$lp->product_hsn_code);
	    $stockDetails= $this->db->get("stock_products");
	    
	    ?>
		 <tr class="item-row">
		      <td><?php echo $i; ?></td>
		      <td><?php echo $lp->product_name." [ ".$lp->id. " ]" ; ?>
		    </td>
	        <td><?php echo $lp->p_price_pr_unit;?></td>
		      <td><?php $totquantity = $totquantity+$lp->extra_quantity; echo $lp->extra_quantity; ?></td>
		      <td  width="10%"><?php echo $lp->discount;?></td>
		      <td><?php  echo $lp->total_amunt;?></td>
		 
		    </tr>
            <?php 
              $i++; 
        	  endforeach;
            ?> 
		  <tr >
		      <td><?php echo $i; ?></td>
		      <td>Total</td>
		     
		      <td></td>
		      
		      <td><?php echo $totquantity; ?></td>
		      <td></td>
		      <td><?php echo $totPrice; ?></td>
		   </tr>
		</table>
			
		<div>
		
		</br>
		<strong style="color:red;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Paid Amount in Words : </strong><script> document.write(convert_number(<?php  echo $totPrice; ?>)); </script> Only /-<br>
		
		<table style="width: 100%;border:1px solid black; ">
			<tbody>
				<tr>
					<td style="border:1px solid black; padding-left: 30px;">
                        	<?php
							
							//	echo '<strong> </strong>'.strtoupper($rowb->firm_name);
							?>
							
							<br></br>
							<br></br>
							Issuing Signatory<br>
							Name:</br>
							Designation:
                        </td>
					<td style="border:none;">
                        	<?php
							
								echo 'classic bakery';
							?>
							
							<br></br>
							<br></br>
							Issuing Signatory<br>
							Name:</br>
							Designation:
                        </td>
				</tr>
			</tbody>
		</table>
		</div>
		<div id="terms">
		  <h5>Terms</h5>
		  <textarea>NET 30 Days. Finance Charge of 1.5% will be made on unpaid balances after 30 days.</textarea>
		</div>
	</div>
	<br/><br/>
	<div class="invoice-buttons" style="text-align:center;">
    <button class="button button2" type="button"  onclick="window.print();">
      <i class="fa fa-print padding-right-sm"></i> Print Reciept
    </button>
  </div>
 </div>
 
</body>

</html>