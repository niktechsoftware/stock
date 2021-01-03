<?php
Class Daybook extends CI_Model{

function getDaybookDetail(){
	$gt=$this->db->get('day_book');
	return $gt;
}
function getdaybookByDate($sdate,$edate,$q){
    if($q==0){
			$res = $this->db->query("SELECT *  FROM day_book  WHERE dabit_cradit = 0 AND DATE(pay_date)>='".$sdate."' and DATE(pay_date)<='".$edate."'");
			return $res;
		}
		if($q==1){
			$res = $this->db->query("SELECT *  FROM day_book  WHERE  dabit_cradit = 1 AND DATE(pay_date)>='".$sdate."' and DATE(pay_date)<='".$edate."'");
				return $res;
		}
		if($q==2){
			$resd = $this->db->query("SELECT *  FROM day_book  WHERE  DATE(pay_date)>='".$sdate."' and DATE(pay_date)<='".$edate."'");
				$res =$resd;
			return $res;
		}
	

	}
//////////////////////////UPASANA CODE///////////////////////////////////
///////////FOR SALE BILL HISTORY /////////////////////////////////////
	function getDaybookbyCredit(){
	    	$res = $this->db->query("SELECT *  FROM day_book  WHERE dabit_cradit = 1");
			return $res;
	}
		function createxpe($exp){
		$data=array(
			'expenditure_name'=>$exp,
		);
		$this->db->insert('expenditure',$data);
		return true;
	}
	function deleteExp($id){
	    $this->db->where("id",$id);
	  if($this->db->delete("expenditure")){
	    redirect(base_url()."billController/createEx");
	  }else{
	      echo "1";
	 	}
	}
	function createSubexp($data){
	    $this->db->insert('sub_expenditure',$data);
	    return true;
	}
	
		function deleteSubExp($id){
	    $this->db->where("id",$id);
	    if($this->db->delete("sub_expenditure")){
	    redirect(base_url()."billController/createSubEx");
	  }else{
	      echo "1";
	 	}
	}
	function directTrans($data){
	    $this->db->insert('cash_payment',$data);
	    return true;
	}
		function directTransDaybook($data1){
	    $this->db->insert('day_book',$data1);
	    return true;
	}
	
	
	
	
	
	
	
/////////////////////////////////////////////////////////////////////////////	
        function sProduct($data){
           $reg= $this->db->insert('sale_info',$data);
           return true;
           
        }
  public function fromStock($daybook){
		$query = $this->db->insert("day_book", $daybook);
		return $query;
	}
	function pro_max($tblnm){
            $this->db->select_max('id');
						$this->db->from($tblnm);
						$maxid=$this->db->get();
						if($maxid->num_rows()>0){
			      	return $maxid->row()->id;
						}else{
							return 1; 
						}
        }
        	function checkCustID($tid){
        	$this->db->where("username",$tid);
        	$req=$this->db->get("customer");
        	return $req;
	}
		function checkBal($tid){
		  
		//$this->db->where("school_code",$this->session->userdata("school_code"));
		$this->db->where("cid",$tid);
		$var=$this->db->get("sale_info");
		return $var;
	}
		function cash_max($tblnm){
            $this->db->select_max('sno');
						$this->db->from($tblnm);
						$maxid=$this->db->get();
						if($maxid->num_rows()>0){
			      	return $maxid->row()->sno;
						}else{
							return 1; 
						}
        }
    function cashPayment($data){
        $this->db->insert('cash_payment',$data);
        return true;
    } 
     function ddata($data1){
        $this->db->insert('day_book',$data1);
        return true;
    } 
		function getClosingBalance($cdate){
			$datec = $cdate;
			$totCredit =	$this->db->query("select sum(amount) as totc from day_book where  (dabit_cradit = 1 or dabit_cradit = 2) and status=1 and DATE(pay_date) <= '$datec'")->row();
			$totDebit =	$this->db->query("select sum(amount) as totd from day_book where dabit_cradit = 0 and status=1 and DATE(pay_date) <= '$datec'")->row();
			$actBalance = $totCredit->totc - $totDebit->totd;
			return $actBalance;
		}
	function expenditureAmount($date){
	$gettot=	$this->db->query("select sum(amount) as exptot from day_book where  DATE(pay_date)='$date' ");
	return $gettot->row()->exptot;
	}
		function datewiseCollecttion($date){
// 		$this->db->select_sum("paid");
// 		$this->db->where('DATE(diposit_date)',$date);
// 		$stocktotal=$this->db->get('fee_deposit')->row();
// 		if($stocktotal->paid){
// 			$resulttotal['feeTotal'] =$stocktotal->paid;
// 		}
// 		else{
// 			$resulttotal['feeTotal']=0;
// 		}
		
		$this->db->select_sum("sub_total");
		$this->db->where('DATE(date)',$date);
		//	 $this->db->where('dabit_cradit',1);
		$stocktotal=$this->db->get('sale_info')->row();
		if($stocktotal->sub_total){
			$resulttotal['stockTotal']= $stocktotal->sub_total;
		}
		else{
			$resulttotal['stockTotal']=0;
		}
		
		$this->db->select_sum('amount');
		$this->db->where('date(pay_date)',$date);
		$this->db->where('dabit_cradit',0);
		$debit_amount=$this->db->get('day_book')->row();
		if($debit_amount->amount){
			$resulttotal['dabitTotal']=$debit_amount->amount;
		}else{
			$resulttotal['dabitTotal']=0;
		}
		
		
		$this->db->select_sum('amount');
		
		$this->db->where('date(pay_date)',$date);
		$this->db->where_not_in('dabit_cradit',0);
		// $this->db->or_where('dabit_cradit',2);
		$credit_amount=$this->db->get('day_book')->row();
		if($credit_amount->amount){
			$resulttotal['creditTotal']=$credit_amount->amount;
		}else{
			$resulttotal['creditTotal']=0;
		}
		
		return $resulttotal;
	}
}
?>