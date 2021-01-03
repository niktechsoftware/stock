<?php
Class billController extends CI_Controller{


     public function printPurchaseReciept(){
		$data['billNo'] = $this->uri->segment(3);
	    $data['subPage'] = "Reciept";
		$data['title'] = "Sale Reciept";
		$data['smallTitle'] = "Purchase Reciept";
		$data['pageTitle'] = "Product Purchase Reciept";
		$data['mainContent'] = "chaanan/printPurchaseReciept";
		$data['headerCss'] = "headerCss/saleProductCss";
		$data['footerJs'] = "footerJs/saleProductJs";
		$this->load->view("includes/mainContent",$data);
		}
	    public function printPurchase(){
			$this->db->where("reff_bil_num",$this->uri->segment(3));
			$detail = $this->db->get("bill_info")->row();
			$data['det'] = $detail;
			$this->load->view("invoice/purInvoice",$data);
		}
function printPage(){
   // echo "1";
    $handle = fopen("PRN", "w");
    fwrite($handle, 'text to printer');
    fclose($handle);
   
}
//**********************************************START UPASANA CODE*********************************************//
public function saleProduct(){
		$data['subPage'] = 'Product';
		$data['title'] = "Product Sale";
		$data['smallTitle'] = "Sale / Product Sale";
		$data['pageTitle'] = "Product Sale";
		$data['mainContent'] = "admin/saleProduct";
		$data['headerCss'] = "headerCss/customerlistcss";
		$data['footerJs'] = "footerJs/customerlistjs";
		$this->load->view("includes/mainContent",$data);
	} 
function returnProduct(){
		$data['subPage'] = 'Return Product';
		$data['smallTitle'] = 'Return Product';
		$data['bigTitle'] = 'Return Product';
		$data['title'] = 'Return Product';
		$data['headerCss'] = 'headerCss/customerlistcss';
		$data['footerJs'] = 'footerJs/customerlistjs';
		$data['mainContent'] = 'admin/returnProduct';
		$this->load->view("includes/mainContent", $data);

}
function pBillHistory(){
		$data['subPage'] = 'Bill';
		$data['title'] = "Purchase Bill History";
		$data['smallTitle'] = " Purchase Bill History";
		$data['pageTitle'] = "Purchase Bill History";
		$data['mainContent'] = "chaanan/pbillHistory";
		$data['headerCss'] = 'headerCss/customerlistcss';
		$data['footerJs'] = 'footerJs/customerlistjs';
	   $this->load->view("includes/mainContent",$data); 
	}
		public function deletephistory()
	{
	  $id=  $this->uri->segment('4');
       $bill_no=  $this->uri->segment('3');
      $data=array(
          "status"=>0
          );
      $this->db->where('bill_no_id',$id);
      $this->db->where('status',1);
     if($this->db->update("sale_product",$data)){
	    redirect(base_url()."billController/rProductBill/".$bill_no);
	  }else{
	      echo "1";
	}	

	}
function sBillHistory(){
        
		$data['subPage'] = 'Sale Bill History';
		$data['smallTitle'] = 'Sale Bill History';
		$data['bigTitle'] = 'Sale Bill History';
		$data['title'] = 'Sale Bill History';
		$data['headerCss'] = 'headerCss/customerlistcss';
		$data['footerJs'] = 'footerJs/customerlistjs';
		$data['mainContent'] = 'admin/sBillHistory';
		$this->load->view("includes/mainContent", $data);

}
function createEx(){
        $this->load->model('daybook');
        $gdbd=$this->daybook->getDaybookbyCredit();
        $data['gdbd']=$gdbd;
		$data['subPage'] = 'Expenditure';
		$data['smallTitle'] = 'Expenditure';
		$data['bigTitle'] = 'Expenditure';
		$data['title'] = 'Expenditure';
		$data['headerCss'] = 'headerCss/customerlistcss';
		$data['footerJs'] = 'footerJs/customerlistjs';
		$data['mainContent'] = 'admin/addExpenditure';
		$this->load->view("includes/mainContent", $data);

}
function createSubEx(){
        $this->load->model('daybook');
        $gdbd=$this->daybook->getDaybookbyCredit();
        $data['gdbd']=$gdbd;
		$data['subPage'] = 'Sub Expenditure';
		$data['smallTitle'] = 'Sub Expenditure';
		$data['bigTitle'] = 'Sub Expenditure';
		$data['title'] = 'Sub Expenditure';
		$data['headerCss'] = 'headerCss/customerlistcss';
		$data['footerJs'] = 'footerJs/customerlistjs';
		$data['mainContent'] = 'admin/addSubExpenditure';
		$this->load->view("includes/mainContent", $data);

}
/*function getTdata(){
  	$tid = $this->input->post("name");
  	echo $tid;
  	exit();
		//	print_r($tid);exit();
			$this->load->model("billmodel");
			$var = $this->billmodel->getItemName($tid);
			
			if($var->num_rows() > 0){
				foreach ($var->result() as $row){
					$itemData = array(
							"itemName" =>$row->name,
							"itemCat" =>$row->sub_category,
							"itemsize" =>$row->weight,
							"price" =>$row->selling_price1,
							"qunatity" =>$row->quantity,
							);
						//	print_r($itemData);exit();
				}		
				}
				echo (json_encode($itemData));
}
*/
    function sale_product(){
    	    $this->load->model("Daybook");
		    $tblnm ="sale_info";
		    $maxid	=	$this->Daybook->pro_max($tblnm);
		    $maxid	=	$maxid+1;
			$billno="4000".$maxid;
			$rn=rand(9999,99999);
			$usern1=$maxid+$rn;
			$billno1="CBI".$usern1;
			 $data=array(
                    	"cid"=> $this->input->post('custID'),
                    	"name" =>$this->input->post('name'),
						"mobile_number" => $this->input->post("number"),
					    "dis" => $this->input->post("item_discount"),
						"dis_rs" => $this->input->post("discount"),
						"total_price" => $this->input->post("tt"),
						"sub_total" => $this->input->post("paid"),
						"balance" => $this->input->post("balance"),
						"total_discount" =>$this->input->post("dscount"),
						"payable_amount" => $this->input->post("dsamount"),
					    "date"=> date("Y-m-d"),
						"bill_no" =>$billno1,
					    "status"=>1
						);
				$this->Daybook->sProduct($data);
			   	$last_id= $this->db->insert_id();
    		for($i=1; $i<=15; $i++){
    		    if($this->input->post("item_no".$i)){
    		        $name=$this->input->post("item_no".$i);
        		    $cat=$this->input->post("category".$i);
        		    $subcat=$this->input->post("subcategory".$i);
        		    $this->db->where('name',$name);
        		    $this->db->where('cat_id',$cat);
        		    $this->db->where('sub_category',$subcat);
        		    $sp=$this->db->get('stock_products');
        		    $q1=$this->input->post("item_quantity".$i);
            		    $data1=array(
                		    "item_id" => $sp->row()->id,
                			"item_pr_price" => $this->input->post("item_price".$i),
                			"item_quantity" => $this->input->post("item_quantity".$i),
                			"bill_no_id" =>$last_id,
                			"status"=>1
                		    );
            	        if($this->db->insert('sale_product',$data1)){
            	            $newq=$sp->row()->quantity-$q1;
            	         $dataq=array(
            	                "quantity" => $newq 
            	               );
            	         $this->db->where('id',$sp->row()->id);
            	         $this->db->update("stock_products",$dataq);
            	    }}}
             $invoicedata=array(
                        "invoice_no"=>$billno1,
                        "heads"=>"3",
                        "invoice_date"=>date("Y-m-d"),
                        );
             $this->db->insert('invoice_serial',$invoicedata);
 		    if($this->input->post('name')){
				    $cid=$this->input->post('name');
			}else{
				     $cid=$this->input->post('custID');
				}
			
         $daybook=array(
        				"paid_to" => "Classic Bakery",
        				"paid_by" =>$cid,
        				"reason"	=> "From sale Stock",
        				"dabit_cradit" => "1",
        				"amount" =>$this->input->post("paid"),
        				"status"=>1,
        				"pay_date"=> date("Y-m-d"),
        				"pay_mode"=>"Cash",
        				"invoice_no" =>$billno1
        		);
			$daybook1 = $this->Daybook->fromStock($daybook);
            redirect('billController/invoice/'.$billno1);	
}
    function invoice(){
        $data['subPage'] = 'Sale Bill History';
		$data['smallTitle'] = 'Sale Bill History';
		$data['bigTitle'] = 'Sale Bill History';
		$data['title'] = 'Sale Bill History';
		$data['headerCss'] = 'headerCss/customerlistcss';
		$data['footerJs'] = 'footerJs/customerlistjs';
		$this->load->view("admin/invoice/invoice", $data);
}
function checkCustID(){ 
			$pBalance = array();
			$tid = $this->input->post("cat");
			$this->load->model("daybook");
			$var = $this->daybook->checkcustID($tid);
			if($var->num_rows() > 0){
				$row=$var->row();	
					$msg = '<div class="alert alert-success">ID Found ! <strong>'. $row->name.' </strong></div>';
					$pBalance['msg'] = $msg;
					$pBalance['indicator'] = "true";
					
					$valid_id = $this->daybook->checkBal($tid);
					if($valid_id->num_rows() > 0){
						foreach ($valid_id->result() as $row){
							$pBalance['balance'] = $row->balance;
						}
					}
					echo (json_encode($pBalance));
			}
			else{
				$msg = '<div class="alert alert-danger">Sorry :( <strong> Customer Not Found ! Wrong Id !</strong></div>';
				$pBalance['msg'] = $msg;
				$pBalance['balance'] = '';
				$pBalance['indicator'] = "false";
				echo (json_encode($pBalance));
			}
			
		}
/*	function searchData(){
    	   $k= $this->input->post("county");
    	   $kj="-".$k;
    	   $key =$this->input->post("keyword");
    	   $keyword = '%'.$this->input->post("keyword").'%';
    	$sql = "SELECT distinct(name) ,id  FROM stock_products WHERE hsn = '$keyword' OR name LIKE '$keyword' ORDER BY name ASC LIMIT 0, 10";
    	$query = $this->db->query($sql);
    	if($query->num_rows()>0){
    	foreach ($query->result() as $rs) {
    	echo '<li onclick="set_item(\''.str_replace("'", "\'",$rs->name.$kj).'\')"><a href="#javascript();">'.$rs->name.'['.$rs->id.']'.'</a></li>';
    	}
    	}
    	}*/
    		function getcategory(){
	    $catArray=array();
		$name = $this->input->post("text");
	    $catD= $this->db->query("select cat_id from stock_products where name ='$name' ");
	    $i=0;foreach($catD->result() as $categoryd):
	               $catArray[$i]= $categoryd->cat_id;
	       $i++; endforeach;
	       
		$this->db->where_in("id",$catArray);
		$vt = $this->db->get("product_category");
	
		?><option value="">-Select Category-</option>
		<?php foreach($vt->result() as $v1):?>
		<option value="<?php echo $v1->id;?>"><?php echo $v1->category;?></option>
		<?php endforeach;
		
	}
    		function getSubCategory(){
	    $catArray=array();
		$pname = $this->input->post("name");
		$pcat = $this->input->post("category");
		$scatD= $this->db->query("select sub_category from stock_products where name ='$pname' and cat_id='$pcat'");
	    $i=0;
	    if($scatD->num_rows()>0){
	        foreach($scatD->result() as $scategoryd):
	               $catArray[$i]= $scategoryd->sub_category;
	       $i++; endforeach;
	       
		$this->db->where_in("id",$catArray);
		$vt1=$this->db->get('sub_category');
		?><option value="">-Select subcategory-</option>
		<?php foreach($vt1->result() as $v1):?>
		<option value="<?php echo $v1->id;?>"><?php echo $v1->name;?></option>
		<?php endforeach;
        }
	}
		function prodataf(){
	  	$pname = $this->input->post("name");
		$pcat = $this->input->post("category");
		$psubcat = $this->input->post("subcategory");
			$pdata= $this->db->query("select * from stock_products where name ='$pname' and cat_id='$pcat' and sub_category='$psubcat'");
			if($pdata->num_rows()>0){
			    $dataar['size']=$pdata->row()->weight;
			    $dataar['price']=$pdata->row()->selling_price;
			    $dataar['quan']=$pdata->row()->quantity;
			    
			    echo json_encode($dataar);
			}
	}
	
	function rProductBill(){
	    $data['subPage'] = 'Return Product';
		$data['title'] = "Return Product";
		$data['smallTitle'] = "Return Product ";
		$data['pageTitle'] = "Return Product";
		$data['mainContent'] = "admin/rProductBill";
		$data['headerCss'] = "headerCss/customerlistcss";
		$data['footerJs'] = "footerJs/customerlistjs";
	    $uri=$this->uri->segment(3);
	    $this->db->where('bill_no',$uri);
	    $this->db->where("status",1);
	    $sinfo=$this->db->get('sale_info');
	    
	    $data['sinfo']=$sinfo;
	     $this->db->where('invoice_no',$uri);
	    $dbook=$this->db->get('day_book');
	     $data['dbook']=$dbook;
		$this->load->view("includes/mainContent",$data);
	}
		function matchid(){
		$billno=$this->input->post("billno");
		$this->db->where("bill_no",$billno);
		$res=$this->db->get("sale_info")->row();
		if($res){
	        redirect(base_url()."index.php/billController/rProductBill/".$billno);
			}
		else{

			redirect(base_url()."index.php/billController/returnProduct/false/");
		}
	}
 /*	 function searchstudent(){
    	$keyword = '%'.$this->input->post("keyword").'%';
    	$sql = "SELECT * FROM customer WHERE name LIKE '$keyword' OR username LIKE '$keyword' ORDER BY name ASC LIMIT 0, 10";
    	$query = $this->db->query($sql);
    	foreach ($query->result() as $rs) {
    		echo '<li onclick="set_item(\''.str_replace("'", "\'", $rs->username).'\')"><a href="#javascript();">'.$rs->username." - ".$rs->name.'</a></li>';
    	}
    }*/
	
	
	
//************************************************END UPASANA CODE*********************************************//	
}

	?>