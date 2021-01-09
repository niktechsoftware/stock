<?php
class DaybookController extends CI_Controller{

  function __construct()
	{
		parent::__construct();
		$this->is_login();
		$this->load->model('daybook');
	
	}
	function is_login(){
		$is_login = $this->session->userdata('is_login');
		$is_lock = $this->session->userdata('is_lock');
		$logtype = $this->session->userdata('login_type');
		if(!$is_login){
			//echo $is_login;
			redirect("welcome/index");
		}
		elseif(!$is_lock){
			redirect("welcome/lockPage");
		}
  }
  
  function daybook(){
    $uri=$this->uri->segment(3);
   
    if($uri==1){
      $data['outdb']=$this->daybook->outer_daybook();
    }
    else{
      $data['inndb']=$this->daybook->inner_daybook();
    }
    $data['uri']=$uri;
    $data['pageTitle'] = 'Daybook';
    $data['smallTitle'] = 'Daybook ';
    $data['mainPage'] = 'Accounting';
    $data['subPage'] = 'Accounting';
    $data['title'] = 'Daybook';
    $data['headerCss'] = 'headerCss/customerlistcss';
    $data['footerJs'] = 'footerJs/customerlistjs';
    $data['mainContent'] = 'daybook';
    $this->load->view("includes/mainContent", $data);
  }
  

function getroiandpool(){
 
    $data['pageTitle'] = 'Daybook';
    $data['smallTitle'] = 'Daybook ';
    $data['mainPage'] = 'Accounting';
    $data['subPage'] = 'Accounting';
    $data['title'] = 'Daybook';
    $data['headerCss'] = 'headerCss/customerlistcss';
    $data['footerJs'] = 'footerJs/customerlistjs';
    $data['mainContent'] = 'daybookpool';
    $this->load->view("includes/mainContent", $data);
}

function daybookTrans(){
     $data['camount']=0;
     $data['pageTitle'] = 'Monthly Balance ';
    $data['smallTitle'] = 'Daybook ';
    $data['mainPage'] = 'Monthly Balance';
    $data['subPage'] = 'Monthly Balance';
    $data['title'] = 'Monthly Balance';
    $data['headerCss'] = 'headerCss/customerlistcss';
    $data['footerJs'] = 'footerJs/customerlistjs';
    $data['mainContent'] = 'daymonthly';
    $this->load->view("includes/mainContent", $data);
}

function getdata(){
    $camount =0;
    $sdate = $this->input->post("sdate");
     $edate = $this->input->post("edate");
     $this->db->select_sum("amount");
      $this->db->where("debit_credit",0);
     $this->db->where("transaction_type",14);
     $this->db->where("DATE(date1) > ",$sdate);
     $this->db->where("Date(date1) <",$edate);
    $cam =  $this->db->get("inner_daybook");
    if($cam->num_rows()>0){
    $camount= $cam->row()->amount;
     $data['sdate']=$sdate;
      $data['edate']=$edate;
    }
    else{
        $camount=0;
        
    }
    $data['camount']=$camount;
    $data['pageTitle'] = 'Monthly Balance ';
    $data['smallTitle'] = 'Daybook ';
    $data['mainPage'] = 'Monthly Balance';
    $data['subPage'] = 'Monthly Balance';
    $data['title'] = 'Monthly Balance';
    $data['headerCss'] = 'headerCss/customerlistcss';
    $data['footerJs'] = 'footerJs/customerlistjs';
    $data['mainContent'] = 'daymonthly';
    $this->load->view("includes/mainContent", $data);
     
}
function dBookDetail(){

    $data['pageTitle'] = 'Daybook Detail';
    $data['smallTitle'] = 'Daybook Detail';
    $data['mainPage'] = 'Daybook Detail';
    $data['subPage'] = 'Daybook Detail';
    $data['title'] = 'Daybook Detail';
    $data['headerCss'] = 'headerCss/customerlistcss';
    $data['footerJs'] = 'footerJs/customerlistjs';
    $data['mainContent'] = 'admin/dBookDetail';
    $this->load->view("includes/mainContent", $data);

}
function dayBookReport(){
    $sdate = $this->input->post("sdate");
    $edate = $this->input->post("edate");
    $q  = $this->input->post("type");
    $data['sdate']=$sdate;
    $data['edate']=$edate;
    $data['q']=$q;
    $this->load->model('daybook');
    $gdbd=$this->daybook->getdaybookByDate($sdate,$edate,$q);
    $data['gdbd']=$gdbd;
    $data['pageTitle'] = 'Daybook Detail';
    $data['smallTitle'] = 'Daybook Detail';
    $data['mainPage'] = 'Daybook Detail';
    $data['subPage'] = 'Daybook Detail';
    $data['title'] = 'Daybook Detail';
    $data['headerCss'] = 'headerCss/customerlistcss';
    $data['footerJs'] = 'footerJs/customerlistjs';
    $data['mainContent'] = 'admin/dayBookReport';
    $this->load->view("includes/mainContent", $data);
}
	function createxpe(){
		$exp= $this->input->post('exp');
		$this->load->model('daybook');
	    $expdata=$this->daybook->createxpe($exp);
		$data['expdata']=$expdata;
		redirect('billController/createEx/success/',$data);
	}
	
	public function deleteExp()
	{
	  $id=  $this->uri->segment('3');
      $this->load->model('daybook');
    $dexp=$this->daybook->deleteExp($id);
    $data['dexp']=$dexp;
    redirect(base_url()."billController/createEx");
	}
		public function deletesubexp()
	{
	  $id=  $this->uri->segment('3');
      $this->load->model('daybook');
    $dexp=$this->daybook->deleteSubExp($id);
    $data['dexp']=$dexp;
    redirect(base_url()."billController/createEx");
	}
	public function createSubexp(){
    	$data=array(
        	'sub_expenditure_name' => $this->input->post("subExpName"),
        	'exp_id'=> $this->input->post('expName'),		
        	
    	);	
    $this->load->model('daybook');
    $subExp=$this->daybook->createSubexp($data);
    $data['subExp']=$subExp;
    redirect(base_url()."billController/createSubEx/success/");
                 }	
                 
    function cashPayment(){

    $data['pageTitle'] = 'Cash Payment';
    $data['smallTitle'] = 'Cash Payment';
    $data['mainPage'] = 'Cash Payment';
    $data['subPage'] = 'Cash Payment';
    $data['title'] = 'Cash Payment';
    $data['headerCss'] = 'headerCss/customerlistcss';
    $data['footerJs'] = 'footerJs/customerlistjs';
    $data['mainContent'] = 'admin/cashPayment';
    $this->load->view("includes/mainContent", $data);

}             
                 
	function expenditure_depart(){
		$expenditure_id = $this->input->post("expenditure_id");
		$this->db->where("exp_id",$expenditure_id);
		$rt = $this->db->get("sub_expenditure");

		?> 
		<option value="0">-Select Sub Expenditure-</option>
		<?php 
		if($rt->num_rows()>0){
			foreach($rt->result() as $row):
			?>  <option value="<?php echo $row->id;?>"><?php echo $row->sub_expenditure_name;?> </option>
			 <?php  endforeach;}
	}                 
                 
   function addCPayment(){
        	$this->load->model("Daybook");
		    $tblnm ="cash_payment";
		    $maxid	=	$this->Daybook->cash_max($tblnm);
		    $maxid	=	$maxid+1;
			$billno="4000".$maxid;
			$rn=rand(9999,99999);
			$usern1=$maxid+$rn;
			$billno1="CPI".$usern1;
        $data=array(
           "exp_id"=>$this->input->post('expName'),
           "sub_exp_id" =>$this->input->post('expenditurer'),
           "valid_id"=>$this->input->post('empId'),
           "pay_date" =>$this->input->post('pdate'),
           "reason" => $this->input->post('reason'),
           "amount" =>$this->input->post('amount'),
           "receipt_no" =>$billno1,
           );
            $data1=array(
          "paid_to" =>"Classic Bakery",
           "paid_by"=>$this->input->post('empId'),
           "pay_date" =>$this->input->post('pdate'),
           "status" => 1,
           "dabit_cradit"=>0,
           "pay_mode" => "Cash",
           "reason" => $this->input->post('reason'),
           "amount" =>$this->input->post('amount'),
           "invoice_no" =>$billno1,
           );
           $cash=$this->Daybook->cashPayment($data);
            $daybook=$this->Daybook->ddata($data1);
         
           if($cash && $daybook){
               	redirect("daybookController/invoiceCashPayment/".$billno1);
           }else{
               	redirect("daybookController/cashPayment/fail/");
           }
   }              
      function invoiceCashPayment(){
         $this->load->view("admin/invoice/cashInvoice");
      }
    	function getClosingBalance($cdate){
			$datec = $cdate;
			$totCredit =	$this->db->query("select sum(amount) as totc from day_book where  (dabit_cradit = 1 or dabit_cradit = 2) and status=1 and DATE(pay_date) <= '$datec'")->row();
			$totDebit =	$this->db->query("select sum(amount) as totd from day_book where  dabit_cradit = 0 and status=1 and DATE(pay_date) <= '$datec'")->row();
			$actBalance = $totCredit->totc - $totDebit->totd;
			return $actBalance;
		}          
                 
                 
    function dTransaction(){
    $data['pageTitle'] = 'Director Transaction';
    $data['smallTitle'] = 'HandOver Transaction';
    $data['mainPage'] = 'HandOver Transaction';
    $data['subPage'] = 'HandOver Transaction';
    $data['title'] = 'HandOver Transaction';
    $data['headerCss'] = 'headerCss/customerlistcss';
    $data['footerJs'] = 'footerJs/customerlistjs';
    $data['mainContent'] = 'admin/dTransaction';
    $this->load->view("includes/mainContent", $data);

}             
  function directorTransaction(){
      	$this->load->model("Daybook");
		    $tblnm ="cash_payment";
		    $maxid	=	$this->Daybook->cash_max($tblnm);
		    $maxid	=	$maxid+1;
			$billno="4000".$maxid;
			$rn=rand(9999,99999);
			$usern1=$maxid+$rn;
			$billno1="DTI".$usern1;
		    $ac=$this->input->post('action');
			if($ac=="to director"){
			    $status=0;
			}else{
			  $status=1;
			}
      $data=array(
         "id_name" =>$this->input->post('action'),
         "bank_name" =>$this->input->post('bankname'),
         "account_number" =>$this->input->post('account'),
         "valid_id" =>$this->input->post('payeename'),
          "amount" =>$this->input->post('amount'),
          "reason" =>$this->input->post('reason'),
          "pay_date" => date("Y/m/d"),
          "receipt_no" =>$billno1
          );
          $data1=array(
         "paid_by" =>$this->input->post('action'),
        "paid_to" =>$this->input->post('payeename'),
          "amount" =>$this->input->post('amount'),
          "reason" =>$this->input->post('reason'),
          "dabit_cradit" =>$status,
          "pay_date" => date("Y/m/d"),
          "invoice_no" =>$billno1
          );
      $this->load->model('daybook');
      $dt=$this->daybook->directTrans($data);
       $dy=$this->daybook->directTransDaybook($data1);
      if($dt && $dy){
        	redirect("daybookController/invoiceDT/".$billno1);
      }else{
          	redirect("daybookController/dTransaction/fail");
      }
          
  }               
                 
    function invoiceDT(){
         $this->load->view("admin/invoice/invoiceDT");
      }              
                 
                 
                 
                 
                 
                 
                 
}
?>