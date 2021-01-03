<?php
class Home extends CI_Controller{
	function __construct()
	{
		parent::__construct();
		$this->isLogin();
	}
	function isLogin(){
		$is_login = $this->session->userdata('is_login');
		$is_lock = $this->session->userdata('is_lock');
		if(!$is_login){
			//echo $is_login;
			redirect(base_url()."login/index");
		}
		elseif(!$is_lock){
			redirect(base_url()."login/lockPage");
		}
	}
	public function replace(){
	
		$data['subPage'] = 'Product';
		$data['title'] = "Product Sale";
		$data['smallTitle'] = "Replace / Product";
		$data['pageTitle'] = "Product Replace";
		$data['mainContent'] = "replaceEntry";
		$data['headerCss'] = "headerCss/replaceEntryCss";
		$data['footerJs'] = "footerJs/replaceEntryJs";
	
		$this->load->view("include/template",$data);
	}
	
	public function printtex(){
		$data['ref'] = $this->db->get("ref")->result();
		$data['subPage'] = 'Tex Invoice';
		$data['title'] = "print Tex invoice";
		$data['smallTitle'] = "Sale / Taxinvoice";
		$data['pageTitle'] = "Product Sale";
		$data['mainContent'] = "printtex";
		$data['headerCss'] = "headerCss/saleProductCss";
		$data['footerJs'] = "footerJs/saleProductJs";
		$this->load->view("include/template",$data);
	}
	
	
	public function saleProduct(){
		$data['ref'] = $this->db->get("ref")->result();
		$data['subPage'] = 'Product';
		$data['title'] = "Product Sale";
		$data['smallTitle'] = "Sale / Product Sale";
		$data['pageTitle'] = "Product Sale";
		$data['mainContent'] = "saleProduct";
		$data['headerCss'] = "headerCss/saleProductCss";
		$data['footerJs'] = "footerJs/saleProductJs";
		$this->load->view("include/template",$data);
	}
	
	public function saleProduct1(){
		$data['ref'] = $this->db->get("ref")->result();
		$data['subPage'] = 'Product';
		$data['title'] = "Product Sale";
		$data['smallTitle'] = "Sale / Product Sale";
		$data['pageTitle'] = "Product Sale";
		$data['mainContent'] = "saleProduct1";
		$data['headerCss'] = "headerCss/saleProduct1Css";
		$data['footerJs'] = "footerJs/saleProductJs";
		$this->load->view("include/template",$data);
	}
	
	public function returnProduct(){
		$data['subPage'] = 'Product';
		$data['title'] = "Product Return";
		$data['smallTitle'] = "Sale / Product Return";
		$data['pageTitle'] = "Product Return";
		$data['mainContent'] = "returnProduct";
		$data['headerCss'] = "headerCss/saleProductCss";
		$data['footerJs'] = "footerJs/returnProductJs";
		$this->load->view("include/template",$data);
	}
	
	public function editBill(){
		$data['subPage'] = 'Bill';
		$data['title'] = "Edit Bill";
		$data['smallTitle'] = "Sale / Edit Bill";
		$data['pageTitle'] = "Edit Bill";
		$data['mainContent'] = "editBill";
		$data['headerCss'] = "headerCss/saleProductCss";
		$data['footerJs'] = "footerJs/editBillJs";
		$this->load->view("include/template",$data);
	}
	
	public function pBillEntry(){
		$data['subPage'] = 'Bill';
		$data['title'] = "Purchase Bill Entry";
		$data['smallTitle'] = "Sale / Purchase Bill Entry";
		$data['pageTitle'] = "Purchase Bill Entry";
		$data['mainContent'] = "pBillEntry";
		$data['headerCss'] = "headerCss/saleProductCss";
		$data['footerJs'] = "footerJs/pEntryJs";
		$this->load->view("include/template",$data);
	}
	////////////////////////
	public function pBillupdate(){
		$data['subPage'] = 'Bill';
		$data['title'] = "Purchase Bill Update";
		$data['smallTitle'] = "Sale / Purchase Bill Update";
		$data['pageTitle'] = "Purchase Bill Update";
		$data['mainContent'] = "pBillupdate";
		$data['headerCss'] = "headerCss/saleProductCss";
		$data['footerJs'] = "footerJs/pEntryJs";
		$this->load->view("include/template",$data);
	}
	////////////////
	public function getSubjects() {
	    $classID = $this->input->post("classID");
	
	    $copy=21;
	     $copy1=27;
	      $copy2=28;
	   
	    $subjects = $this->db->query('SELECT * FROM `enter_stock1` WHERE (`hsn_sac`= '.$classID.' OR `hsn_sac`= '.$copy.' OR `hsn_sac`= '.$copy1.' OR `hsn_sac`= '.$copy2.' )  GROUP BY `name`;')->result();
	 //  $subjects = $this->db->query('SELECT * FROM `enter_stock1` WHERE (`hsn_sac`= '.$classID.' OR `hsn_sac`= '.$copy.' OR `hsn_sac`= '.$copy1.' OR `hsn_sac`= '.$copy2.') GROUP BY `name`;')->result();
	    
	    $finalData =  array();
	    foreach($subjects AS $key => $value):
	    $this->db->where("bookclass_id",$value->hsn_sac);
	    $this->db->where("id",$value->product_code);
	   $subject= $this->db->get("booksubject")->row();
	        //$subject = $this->db->query('SELECT * FROM `booksubject` WHERE `bookclass_id`='.$value->hsn_sac.' AND  `booksubject`='.$value->company_name.';')->row();
	        
	       	$queryString = "SELECT SUM(`extraQuantity`) AS `extraQuantity`  FROM `enter_stock1` WHERE `product_code`='".$subject->id."';";
		    $oldQuantity = $this->db->query($queryString)->result();
		
		    $queryString = "SELECT SUM(`product_quantity`) AS `total` FROM `product_sale` WHERE  `product_code`='".$subject->id."';";
		    $saleQuantity = $this->db->query($queryString)->result();
		
		    $actualq = $oldQuantity[0]->extraQuantity - $saleQuantity[0]->total;
		    
		    array_push($finalData, array("total" => $actualq, "booksubject" => $subject->id));
	    endforeach;
	    echo json_encode(array("other" => $finalData, "tableData" => $subjects));
	}
	
	public function getStockDetail() {
	    $hsn_sac = $this->input->post("classID");
		$name = $this->input->post("name");
		$rows = $this->db->query("SELECT company_name, product_code, prize_perunit, vat, sat, discount, pRate FROM `enter_stock1` WHERE `hsn_sac`='".$hsn_sac."' AND `name`='".$name."' ORDER BY `sno` LIMIT 1;")->result();
		
		$queryString = "SELECT SUM(`extraQuantity`) AS `extraQuantity`  FROM `enter_stock1` WHERE `hsn_sac`='".$hsn_sac."' AND `name`='".$name."';";
		$oldQuantity = $this->db->query($queryString)->result();
		
		$queryString = "SELECT SUM(`product_quantity`) AS `total` FROM `product_sale` WHERE `hsn_sac`='".$hsn_sac."' AND `company_name`='".$name."';";
		$saleQuantity = $this->db->query($queryString)->result();
		
		$actualq = $oldQuantity[0]->extraQuantity - $saleQuantity[0]->total;
		
		$dataArray = array(
		    'otherData' => $rows,
		    'quantity' => $actualq
		);
		echo json_encode($dataArray);
	}
	
    	function printTable(){
		$w = $this->input->post("w");
		$r=$this->input->post("r");
	   //echo $r;
		?>
    	<div class="col-sm-12 ">
		<table class='table-hover' border='1' width='100%' >
		<thead>
		<tr style='height:40px;' >
		<th style='width:90px;	text-align:center;'>#</th>
		<th style='width:110px;	text-align:center;'>Product Name</th>
		<th style='width:110px;	text-align:center;'>Category</th>
		<th style='width:110px;	text-align:center;'>Subcategory</th>
		<th style='width:90px;	text-align:center;'>HSN</th>
		<th style='width:90px;	text-align:center;'>P Price</th>
		<th style='width:90px;	text-align:center;'>S Price</th>
		<th style='width:90px;	text-align:center;'>Old Q.</th>
		<th style='width:90px;	text-align:center;'>Add Q.</th>
		<th style='width:90px;	text-align:center;'>Discount</th>
		<th style='width:90px;text-align:center;'>Amount</th>
		
			</tr>
		</thead>
		
		<tbody>
		<?php  $b=1;
		for($i=1;$i<$w+1;$i++){
		?>
		
		<tr id='row<?php echo $i;?>'>
				<td ><?php echo '&nbsp;&nbsp;&nbsp;  '.$i.'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';?></td>
						                    <td>&nbsp;
						                    <input type="hidden" name="billnum" id="billnum" value="<?php echo $r;?>">
						                    <input type="hidden" name="count<?php echo $i;?>" id="count<?php echo $i;?>" value = "<?php echo $i;?>"    >
						                    <input type='text' class='form-control' id='itemName<?php echo $i;?>'   name='itemName<?php echo $i; ?>'  width='100%'>
							                 <ul style="list-style: none; padding:0px;" id="namep<?php echo $i;?>"></ul>
						                   </td>
						                    <td>&nbsp;<select class='form-control' id ="category<?php echo $i;?>"> </select></td>
						                     <td>&nbsp;<select class='form-control' id ="subcategory<?php echo $i;?>"> </select></td>
						                    <td>&nbsp;<input type='text' class='form-control' id='hsn_sac<?php echo $i; ?>'   name='hsn_sac<?php echo $i; ?>'  width='100%'>
						                     </td>
						                    <td><input type='text' class='form-control' id='pRate<?php echo $i; ?>' name='pRate<?php echo $i; ?>'  width='100%'> </td>
						                    <td><input type='text' class='form-control'  id='sRate<?php echo $i; ?>' name='sRate<?php echo $i; ?>'  width='100%'></td>
                                            <td><input type='text' class='form-control'  id ='quan<?php echo $i;?>' name ='quan<?php echo $i;?>' width='100%'/></td>
						                    <td><input type='text' class='form-control'  id='extraQuantity<?php echo $i; ?>' name='extraQuantity<?php echo $i; ?>'  width='100%'></td>
						                    <td><input type='text' class='form-control'  id ='discount<?php echo $i;?>' name ='discount<?php echo $i;?>' width='100%'/></td>
						                    <td><input type='text' class='form-control'  id ='amount<?php echo $i;?>' name ='sat<?php echo $i;?>' width='100%'/></td>
						                    
						                    <script>
						                    
						                 	$("#itemName<?php echo $i;?>").keyup(function(){
                								var min_length = 1; // min caracters to display the autocomplete
                								var keyword = $('#itemName<?php echo $i;?>').val();
                								var county  =   $('#count<?php echo $i;?>').val();
                							
                								if (keyword.length >= min_length) {
                    									$.ajax({
                    										url: '<?php echo site_url("apanel/searchData");?>',
                    										type: 'POST',
                    										data: {keyword:keyword , county : county},
                    										success:function(data){
                    											$('#namep<?php echo $i;?>').show();
                    											$('#namep<?php echo $i;?>').html(data);
                    										}
                    									});
                    								}else{
                    								    	$('#namep<?php echo $i;?>').hide();
                    								}
                    							
									    
						                 	});
						                 		$("#category<?php echo $i;?>").change(function(){	
                                            	    	var name        =   $('#itemName<?php echo $i;?>').val();
                                        				var category    =   $('#category<?php echo $i;?>').val();
                                        			//alert(name+category);
                                        				 $.post("<?php echo site_url('apanel/getSubCategory') ?>", {name : name,category : category}, function(data){
                                        				     //alert(data)
                        								$("#subcategory<?php echo $i;?>").html(data);
                                            	    
                                            	});
                                            	});
                                            	
                                            	$("#subcategory<?php echo $i;?>").change(function(){	
                                            	    	var name        =   $('#itemName<?php echo $i;?>').val();
                                            	    	var category    =   $('#category<?php echo $i;?>').val();
                                        				var subcategory    =   $('#subcategory<?php echo $i;?>').val();
                                        		
                                        				 $.post("<?php echo site_url('apanel/prodataf') ?>", {name : name,category : category, subcategory : subcategory}, function(data){
                                        				     //alert(data)
                                        				 	var d = jQuery.parseJSON(data);	
                        									$("#hsn_sac<?php echo $i; ?>").val(d.hsn);
                            								$("#pRate<?php echo $i; ?>").val(d.price);
                            						       	$("#quan<?php echo $i; ?>").val(d.quan);
                                            	    
                                            	});
                                            	});
                        	
						                               
						                           	$("#discount<?php echo $i;?>").keyup(function(){
        											var st = $("#extraQuantity<?php echo $i;?>").val();
        											var discount=$('#discount<?php echo $i; ?>').val();
        											var sRate=$('#sRate<?php echo $i; ?>').val();
        											var q=$('#quan<?php echo $i; ?>').val();
        									    	
        									        /*$("#tquantity<?php echo $i;?>").val(tq);*/
        											var count=<?php echo $i;?>;
        											var pr = $('#pRate<?php echo $i; ?>').val();
        											var totalamount= st*pr - discount;
        									    	var bal = totalamount ;
        									    	var name        =   $('#itemName<?php echo $i;?>').val();
        											var bill_num=$("#billnum").val();
        											var hsn=$("#hsn_sac<?php echo $i; ?>").val();
        											//alert(hsn);
        											
        											//alert(bill_num);
        											$("#amount<?php echo $i;?>").val(bal);
        											var totaly=0;
        											<?php for($g=1;$g<$w+1;$g++){?>
        											
        											totaly = totaly + Number($('#amount<?php echo $g;?>').val());
        											<?php }?>
        											 $.post("<?php echo site_url('apanel/product_purchase') ?>", {name : name,st : st,sRate: sRate, pr : pr, discount :discount ,totalamount :totalamount,q :q ,bill_num :bill_num,hsn :hsn}, function(data){
                                        			//alert(data);   
                                        		});
        											//$("#amount<?php echo $i;?>").val(totaly);
        											document.getElementById('total_prize').value = totaly;
        										
        										});
        									</script>     
						                    </tr>
						        <?php $b++;}
						        
						        ?>
        					</tbody>
				 </table><div id="msz" style="color:red;"></div>
			 </div><script>
			 	function set_item(item) {
                        							
                        var text = '';
                                var text2 = '';
                                var b=1;
                                var arr = item;
                                for(i=0;i<arr.length;i++) {
                                if((arr[i]=="-")||(b > 1)){
                                if(b>1){
                                text2+=arr[i]
                                }b++;
                                }
                                else{
                                text += arr[i]
                                }
                                    
                                }    
                                
                           	$("#itemName"+text2).val(text);  
                           	$.post("<?php echo site_url('apanel/getCategory') ?>", {text : text}, function(data){
                           	    //alert(data);
								$("#category"+text2).html(data);
									$('#namep'+text2).hide();

						});
                        						
                    	}
                    	
                    					      
			 </script><?php 
    	}
	function printSerial(){
		$c= $this->input->post("count");
		$rts = $this->input->post("st");
		?><table>
			<?php for($y=1;$y<$rts+1;$y++){?>
			<tr>
				<td> <input type="text" class='form-control' name ="serial<?php echo $c.$y;?>" width='100%'/></td>
			</tr>
			<?php }?>
		</table>	
	<?php }
	
	function pBillHistory(){
		$data['subPage'] = 'Bill';
		$data['title'] = "Purchase Bill History";
		$data['smallTitle'] = "Sale / Purchase Bill History";
		$data['pageTitle'] = "Purchase Bill History";
		$data['mainContent'] = "pBillHistory";
		$data['headerCss'] = "headerCss/listCss";
		$data['footerJs'] = "footerJs/listJs";
		$data['pBillInfo'] = $this->bill_info->getAll();
		$this->load->view("include/template",$data); 
	}
	
	function sBillHistory(){
	    $uri = $this->uri->segment(3);
		$data['subPage'] = 'Bill History';
		$data['title'] = "Sale Bill History";
		$data['smallTitle'] = "Sale / Sale Bill History";
		$data['pageTitle'] = "Sale Bill History";
		$data['mainContent'] = "sBillHistory";
		$data['headerCss'] = "headerCss/listCss";
		$data['footerJs'] = "footerJs/listJs";
		$data['sBillInfo'] = $this->sale_bill->getAll($uri)->result();
		$this->load->view("include/template",$data);
	}
	
	function tBillHistory(){
		$data['subPage'] = 'Bill History';
		$data['title'] = "Sale Bill History";
		$data['smallTitle'] = "Sale / Sale Bill History";
		$data['pageTitle'] = "Sale Bill History";
		$data['mainContent'] = "tBillHistory";
		$data['headerCss'] = "headerCss/listCss";
		$data['footerJs'] = "footerJs/listJs";
		$this->load->view("include/template",$data);
	}
	
	function rBillHistory(){
		$data['subPage'] = 'Bill';
		$data['title'] = "Return Bill History";
		$data['smallTitle'] = "Sale / Return Bill History";
		$data['pageTitle'] = "Return Bill History";
		$data['mainContent'] = "rBillHistory";
		$data['headerCss'] = "headerCss/listCss";
		$data['footerJs'] = "footerJs/listJs";
		$data['rBillInfo'] = $this->return_bill->getAll()->result();
		$this->load->view("include/template",$data);
	}
	
	public function enterStock(){
		$data['subPage'] = 'Product';
		$data['title'] = "Product Entry";
		$data['smallTitle'] = "Product / Product Entry";
		$data['pageTitle'] = "Product Entry";
		$data['mainContent'] = "enterStock";
		$data['headerCss'] = "headerCss/saleProductCss";
		$data['footerJs'] = "footerJs/enterStockJs";
		$data['proDetail'] = $this->enter_stock->getAll()->result();
		$this->load->view("include/template",$data);
	}
	
	function ref(){
		$this->db->where("id",$this->uri->segment(3));
		$ref = $this->db->get("ref");
		if($ref->num_rows() > 0){
			$data['isVal'] = true;
			$data['ref'] = $ref->row();
		}else{
			$data['isVal'] = false;
		}
		$data['subPage'] = 'Product';
		$data['title'] = "Refrance Entry";
		$data['smallTitle'] = "Product / Refrance Entry";
		$data['pageTitle'] = "Refrance Entry";
		$data['mainContent'] = "ref";
		$data['headerCss'] = "headerCss/saleProductCss";
		$data['footerJs'] = "footerJs/enterStockJs";
		$data['proDetail'] = $this->db->get("ref")->result();
		$this->load->view("include/template",$data);
	}
	
	function productDetail(){
		$data['subPage'] = 'Product';
		$data['title'] = "Product Detail";
		$data['smallTitle'] = "Sale / Product Detail";
		$data['pageTitle'] = "Product Detail";
		$data['mainContent'] = "productDetail";
		$data['headerCss'] = "headerCss/listCss";
		$data['footerJs'] = "footerJs/listJs";
		$data['proDetail'] = $this->enter_stock->getAll()->result();
		$this->load->view("include/template",$data);
	}
	
	function replacelist(){
		$data['subPage'] = 'Product';
		$data['title'] = "Product Detail";
		$data['smallTitle'] = "Sale / Product Detail";
		$data['pageTitle'] = "Product Detail";
		$data['mainContent'] = "replacelist";
		$data['headerCss'] = "headerCss/replacelistCss";
		$data['footerJs'] = "footerJs/replacelistJs";
		$list=$this->db->get("replace_list");
		$data['li']=$list->result();
		$data['proDetail'] = $this->enter_stock->getAll()->result();
		$this->load->view("include/template",$data);
	}
}