<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('loginPage');
	}
	
	function login_check(){
	    
		$query = $this->loginmodel->validate();
		if($query['is_login']){  
			
			if($query['login_type'] == 1):
			$this->session->set_userdata($query);
			redirect("login/index");
			elseif($query['login_type'] == 2):
			$this->session->set_userdata($query);
			redirect("clogin/index");
			else:
			redirect("welcome/index/authFalse");
			endif;
		}
		else{ // if user not validate the credential ....
			redirect("welcome/index/authFalse");
		}
	}
	
	function unlock(){
		$query = $this->loginModel->validateLock();
	
		if($query){  //if user Lock validation return true after validation
			$this->session->set_userdata('is_lock',true);
			redirect("index.php/login/index");
		}
		else{ // if user not validate the credential ....
			redirect("index.php/homeController/lockPage/false");
		}
	}
	
	function logout()
	{
		$this->session->unset_userdata();
		$this->session->sess_destroy();
		redirect('welcome/index');
	}
	
	function lockPage(){
		if($this->session->userdata("is_login") == false){
			redirect('index.php/homeController');
		}
		$data['title'] = $this->session->userdata("name");
		$this->session->set_userdata('is_lock', false);
		$this->load->view("lockPage", $data);
	}
	        
	        function upgrade(){
	            $this->db->where("pair >",14);
	          $g =  $this->db->get("silver_tree")->result();
	            foreach($g as $r):
	                     $cgold =  $this->db->get("gold_tree");
	                    if($cgold->num_rows()){
	                    $this->db->where("c_id",$r->c_id);
	                   $gold =  $this->db->get("gold_tree");
	                   if($gold->num_rows()>0){
	                       
	                   }
	                   else{
	                       $goldp = array(
	                        "c_id"=>$r->c_id,
	                        "pair" =>0,
	                        "amount"=>0
	                        );
	                        $this->db->insert("gold_tree",$goldp);
	                        
	                       
	                   }
	                    
	                }else{
	                    $goldp = array(
	                        "c_id"=>$r->c_id,
	                        "pair" =>0,
	                        "amount"=>0
	                        );
	                        $this->db->insert("gold_tree",$goldp);
	                        
	                }
	                
	                endforeach;
	        }
	        
	        
	        function testpt(){
	          


/* Open the printer; this will change depending on how it is connected */
$connector = new WindowsPrintConnector("/dev/usb/lp0");
$printer = new Printer($connector);

/* Information for the receipt */
$items = array(
    new item("Example item #1", "4.00"),
    new item("Another thing", "3.50"),
    new item("Something else", "1.00"),
    new item("A final item", "4.45"),
);
$subtotal = new item('Subtotal', '12.95');
$tax = new item('A local tax', '1.30');
$total = new item('Total', '14.25', true);
/* Date is kept the same for testing */
// $date = date('l jS \of F Y h:i:s A');
$date = "Monday 6th of April 2015 02:56:25 PM";

/* Start the printer */
$logo = EscposImage::load("resources/escpos-php.png", false);
$printer = new Printer($connector);

/* Print top logo */
$printer -> setJustification(Printer::JUSTIFY_CENTER);
$printer -> graphics($logo);

/* Name of shop */
$printer -> selectPrintMode(Printer::MODE_DOUBLE_WIDTH);
$printer -> text("ExampleMart Ltd.\n");
$printer -> selectPrintMode();
$printer -> text("Shop No. 42.\n");
$printer -> feed();

/* Title of receipt */
$printer -> setEmphasis(true);
$printer -> text("SALES INVOICE\n");
$printer -> setEmphasis(false);

/* Items */
$printer -> setJustification(Printer::JUSTIFY_LEFT);
$printer -> setEmphasis(true);
$printer -> text(new item('', '$'));
$printer -> setEmphasis(false);
foreach ($items as $item) {
    $printer -> text($item);
}
$printer -> setEmphasis(true);
$printer -> text($subtotal);
$printer -> setEmphasis(false);
$printer -> feed();

/* Tax and total */
$printer -> text($tax);
$printer -> selectPrintMode(Printer::MODE_DOUBLE_WIDTH);
$printer -> text($total);
$printer -> selectPrintMode();

/* Footer */
$printer -> feed(2);
$printer -> setJustification(Printer::JUSTIFY_CENTER);
$printer -> text("Thank you for shopping at ExampleMart\n");
$printer -> text("For trading hours, please visit example.com\n");
$printer -> feed(2);
$printer -> text($date . "\n");

/* Cut the receipt and open the cash drawer */
$printer -> cut();
$printer -> pulse();

$printer -> close();

/* A wrapper to do organise item names & prices into columns */

	        }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */