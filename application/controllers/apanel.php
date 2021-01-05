<?php class Apanel extends CI_Controller{
	function __construct()
	{
		parent::__construct();
		$this->is_login();
		$this->load->model('cmodel');
	
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
	
	 function coupon()
	{
	     $data['subPage'] = ' coupon';
		$data['smallTitle'] = ' coupon';
		$data['bigTitle'] = 'coupon';
		$data['title'] = 'Chaanan | coupon';
		$data['headerCss'] = 'headerCss/customerlistcss';
		$data['footerJs'] = 'footerJs/customerlistjs';
		$data['mainContent'] = 'chaanan/coupon';
		$this->load->view("includes/mainContent", $data);
	}
	
	 function editcod(){
	    $id=$this->uri->segment(3);
	    $this->db->where('id',$id);
	    $amount=$this->db->get("cod_amount");
	    $data['cod']=$amount;
	     $data['subPage'] = ' Cash On Delivery Amonut';
	     $data['pageTitle'] = 'Admin Dashboard';
		$data['smallTitle'] = ' Cash On Delivery Amonut';
		$data['bigTitle'] = ' Cash On Delivery Amonut';
		$data['title'] = 'The life Styles | Cash On Delivery Amonut';
		$data['headerCss'] = 'headerCss/customerlistcss';
		$data['footerJs'] = 'footerJs/customerlistjs';
		$data['mainContent'] = "chaanan/editcod";
		$this->load->view("includes/mainContent", $data);
	}
	public	function addprofile(){
		$data['subPage'] = 'Profile';
		$data['smallTitle'] = 'New Branch';
		$data['bigTitle'] = 'Add New Branch';
		$data['title'] = 'The life Styles | New Branch';
		$data['headerCss'] = "admin/headerCss/studentRegisterCss";
		$data['footerJs'] = "admin/footerJs/studentRegisterJs";
		$data['body'] = 'newBranch';
		$this->load->view("include/admin/mainContent", $data);
	}
	
function profile(){
		$data['subPage'] = 'Profile';
		$data['smallTitle'] = 'Profile';
		$data['bigTitle'] = 'Your Profile';
		$data['title'] = 'NIT EDUCATION | Profile';
		$data['headerCss'] = "admin/headerCss/studentRegisterCss";
		$data['footerJs'] = "admin/footerJs/studentRegisterJs";
		$data['body'] = 'profile';
		
		$this->load->view("include/admin/mainContent", $data);
	}
	

	public	function branchList(){
		$data['subPage'] = 'Branch';
		$data['smallTitle'] = 'Branch List';
		$data['bigTitle'] = 'Branch List';
		$data['title'] = 'The life Styles | Branch List';
	   	$data['headerCss'] = "admin/headerCss/studentRegisterCss";
		$data['footerJs'] = "admin/footerJs/studentRegisterJs";
		$data['body'] = 'branchList';
		$this->db->where("status",1);
		$data['branchList'] = $this->db->get("branch");
		$this->load->view("include/admin/mainContent", $data);
	}
		public	function inactivebranchList(){
		$data['subPage'] = 'Branch';
		$data['smallTitle'] = 'Inactive Branch List';
		$data['bigTitle'] = ' Inactive Branch List';
		$data['title'] = 'The life Styles |Inactive Branch List';
	   	$data['headerCss'] = "admin/headerCss/studentRegisterCss";
		$data['footerJs'] = "admin/footerJs/studentRegisterJs";
		$data['body'] = 'inactivebranchList';
		$this->db->where("status",0);
		$data['branchList'] = $this->db->get("branch");
		$this->load->view("include/admin/mainContent", $data);
	}
	
	 function category(){
	    $data['pageTitle'] = 'Category';
	    $data['pageTitle'] = 'Category';
	    $data['title'] = "Website Category";
		$data['smallTitle'] = "Website/Category";
		$data['bigTitle'] = "category";
		$data['headerCss'] = 'headerCss/customerlistcss';
		$data['footerJs'] = 'footerJs/customerlistjs';
		$data['mainContent'] = "chaanan/category";
		$this->load->view("includes/mainContent",$data);
	}
	
		function searchCustomer(){
	
		$data['pageTitle'] = 'Search Customer';
	    $data['title'] = " Search Customer";
		$data['smallTitle'] = "Search Customer";
		$data['bigTitle'] = "Search Customer";
		$data['headerCss'] = 'headerCss/customerlistcss';
		$data['footerJs'] = 'footerJs/customerlistjs';
		$data['mainContent'] = "chaanan/Search Customer";
		$this->load->view("includes/mainContent",$data);
	}
function subcategory(){
		$data['pageTitle'] = 'Sub Category';
	    $data['title'] = " Sub Category";
		$data['smallTitle'] = "Product Sub Category";
		$data['bigTitle'] = "Product Sub Category";
		$data['headerCss'] = 'headerCss/customerlistcss';
		$data['footerJs'] = 'footerJs/customerlistjs';
		$data['mainContent'] = "chaanan/subcategory";
		$this->load->view("includes/mainContent",$data);
	}
	 function product_entry(){
	     
	     $data['pageTitle'] = 'Product Entry';
	    $data['title'] = " Product Entry";
		$data['smallTitle'] = "Product Entry";
		$data['bigTitle'] = "Product Entry";
		$data['headerCss'] = 'headerCss/customerlistcss';
		$data['footerJs'] = 'footerJs/customerlistjs';
		$data['mainContent'] = "chaanan/product_entry";
		$this->load->view("includes/mainContent",$data);
	}

	function customerRegistration(){
	  
		$data['pageTitle'] = 'Customer Registration Form';
		$data['smallTitle'] = 'Customer Registration Form';
		$data['mainPage'] = 'Customer Registration Form';
		$data['subPage'] = 'Customer Registration Form';
		$data['title'] = 'Customer Registration Form';
		$data['headerCss'] = 'headerCss/customerlistcss';
		$data['footerJs'] = 'footerJs/customerlistjs';
		$data['mainContent'] = 'chaanan/customerRegistration';
		$this->load->view("includes/mainContent", $data);
	}


	 function deleteinvoice(){
	    $this->uri->segment(3);
	    $this->db->where("invoice_no",$this->uri->segment(3));
	    $this->db->delete("admission");
	    redirect(base_url()."apanel/reglist/dels");
	}
	
	 function productEntry(){
	   $data['pageTitle'] = 'Product Entry';
	    $data['client_code'] =$this->session->userdata("client_code");
	    $data['title'] = "Product Entry";
		$data['smallTitle'] = "Product Entry";
		$data['bigTitle'] = "Product Enry";
		$data['body'] = "admin/productEntry";
	    $data['headerCss'] = 'headerCss/customerlistcss';
		$data['footerJs'] = 'footerJs/customerlistjs';
		$this->load->view("include/admin/mainContent",$data);
	}
	function getTotQ(){
	    $id = $this->input->post("item");
	    //$company_name = $this->input->post("subjectid");
	   // $name = $this->input->post("itamName");
	    
		$rows = $this->db->query("SELECT   sub_category, quantity, selling_price1 , hsn FROM `stock_products` WHERE `id`='".$id."';")->result();
		$queryString = "SELECT SUM(`quantity`) AS `quantity`  FROM `stock_products` WHERE `sub_category`='".$id."'";
		$oldQuantity = $this->db->query($queryString)->result();
		$actualq = $oldQuantity[0]->quantity;
		
		$dataArray = array(
		    'otherData' => $rows,
		    'quantity' => $actualq
		);
		echo json_encode($dataArray);
	}

    	function searchData(){
    	   $k= $this->input->post("county");
    	   $kj="-".$k;
    	   $keyword = '%'.$this->input->post("keyword").'%';
    	$sql = "SELECT distinct(name) FROM stock_products WHERE name LIKE '$keyword' ORDER BY name ASC LIMIT 0, 10";
    	$query = $this->db->query($sql);
    	if($query->num_rows()>0){
    	foreach ($query->result() as $rs) {
    	
    	    echo '<li onclick="set_item(\''.str_replace("'", "\'",$rs->name.$kj).'\')"><a href="#javascript();">'.$rs->name.'</a></li>';
    
    	 
    	}
    		
    	}
    	}
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
	function product_purchase()
	{
	   $j=$this->input->post("j");
	   $pname = $this->input->post("name");
	   $p_price = $this->input->post("pr");
	   $s_price = $this->input->post("sRate");
	   $discount = $this->input->post("discount");
	    $total_amount=$this->input->post('totalamount');
		
	
	   	$bill_num = $this->input->post("bill_num");
	   	$st = $this->input->post("st");
	   	$hsn = $this->input->post("hsn");
	   	$q=$this->input->post('q');
	   	$quantity=$st+$q;
	   	//echo $st;
	   	//echo $bill_num;
	   	//echo $hsn;
	   //	$total_amount = $p_price* $st;
	   	$data=array(
	   	    "product_hsn_code"=>$hsn,
	   	    "product_name"=>$pname,
	   	    
	   	    "p_price_pr_unit"=>$p_price,
	   	    "s_price"=>$s_price,
	   	    "discount"=>$discount,
	   	    
	   	    "extra_quantity"=>	$st,
	   	    "reff_bill_num"=>$bill_num ,
	   	    "total_amunt"=>$total_amount,
	   	    'date'=>date("Y-m-d")
	   	   );
	   	   if($j){
	   	   $data=array(
	   	     "product_hsn_code"=>$hsn,
	   	    "product_name"=>$pname,
	   	    "p_price_pr_unit"=>$p_price,
	   	    "s_price"=>$s_price,
	   	    "discount"=>$discount,
	   	    "extra_quantity"=>	$st,
	   	    "reff_bill_num"=>$bill_num ,
	   	    "total_amunt"=>$total_amount,
	   	    'date'=>date("Y-m-d")
	   	   );   
	   	   }
	    if($this->db->insert("purchase_product",$data)){
	   	     $pdata=array(
	   	         "product_price"=>$p_price,
	   	    "selling_price"=>$s_price, 
	   	    'quantity'=>$quantity
	   	         );
	   	     $this->db->where('hsn',$hsn);
	   	    $id= $this->db->update('stock_products',$pdata);
	   	   /* if($id){
	   	        echo 1;
	   	        
	   	    }
	   	    else{
	   	        echo 2;
	   	    }*/
	   	 }
	   	 //echo 	$j;
	}
	function prodataf(){
	  	$pname = $this->input->post("name");
		$pcat = $this->input->post("category");
		$psubcat = $this->input->post("subcategory");
			$pdata= $this->db->query("select * from stock_products where name ='$pname' and cat_id='$pcat' and sub_category='$psubcat'");
			if($pdata->num_rows()>0){
			    $dataar['hsn']=$pdata->row()->hsn;
			    $dataar['price']=$pdata->row()->product_price;
			    $dataar['quan']=$pdata->row()->quantity;
			    echo json_encode($dataar);
			}
	}
	
	
    function addformDetail()
	{


		$id = $this->uri->segment(3);
		$this->db->where("id",$id);
		
		$data['abc'] = $this->db->get("regenquiry")->row();
		$this->load->view('showform',$data);

	}
	 function deleteformDetail()
	{

		$id = $this->uri->segment(3);
		$this->db->where("id",$id);
		$a= $this->db->delete("regenquiry");
		 if($a)
		 {
		 	redirect ("apanel/printRegister");
		 }



	}


	
 function studentRegister()
	{
		$data['title'] = "New Student Registration";
		$data['smallTitle'] = "Student Registration";
		$data['bigTitle'] = "Student Registration";
		$data['body'] = "admin/studentRegister";
		$data['headerCss'] = "admin/headerCss/studentRegisterCss";
		$data['footerJs'] = "admin/footerJs/studentRegisterJs";
		$this->load->view("include/admin/mainContent",$data);
	}
 function editProfile()
	{
		$data['title'] = "Edit Student Profile";
		$data['smallTitle'] = "Student Profile";
		$data['bigTitle'] = "Student Profile";
		$data['body'] = "admin/editProfile";
		$data['headerCss'] = "admin/headerCss/studentRegisterCss";
		$data['footerJs'] = "admin/footerJs/studentRegisterJs";
		$this->load->view("include/admin/mainContent",$data);
	}
	

	 function printRegister()
	{
		$data['title'] = "Student Profile";
		$data['smallTitle'] = "Student Profile/Admission Invoice";
		$data['bigTitle'] = "Student Profile/Admission Invoice";
		$data['body'] = "admin/registrationform";
		$data['headerCss'] = "admin/headerCss/dashboardCss";
		$data['footerJs'] = "admin/footerJs/dashboardJs";
		$this->load->view("include/admin/mainContent",$data);
	}



	
	 function studentList()
	{
		$data['title'] = "Student List";
		$data['smallTitle'] = "Student List";
		$data['bigTitle'] = "Student List";
		$data['body'] = "admin/studentList";
		$data['headerCss'] = "admin/headerCss/studentListCss";
		$data['footerJs'] = "admin/footerJs/studentListJs";
		$this->load->view("include/admin/mainContent",$data);
	}

	 function pending(){
	    $data['title'] = "Pending";
		$data['smallTitle'] = "Website/Pending";
		$data['bigTitle'] = "Pending List";
		$data['headerCss'] = 'headerCss/customerlistcss';
		$data['footerJs'] = 'footerJs/customerlistjs';
		$data['mainContent'] = "chaanan/pending";
		$this->load->view("includes/mainContent",$data);
	}
	 function cod()
	
	{
	   
	    $data['subPage'] = ' Cash On Delivery Amonut';
		$data['smallTitle'] = ' Cash On Delivery Amonut';
		$data['bigTitle'] = ' Cash On Delivery Amonut';
		$data['title'] = 'The life Styles | Cash On Delivery Amonut';
		$data['headerCss'] = 'headerCss/customerlistcss';
		$data['footerJs'] = 'footerJs/customerlistjs';
		$data['mainContent'] = "chaanan/cod";
		$this->load->view("includes/mainContent", $data);
	}
	 function deliverd()
	{
	    $data['title'] = "Delivered";
		$data['smallTitle'] = "Website/Delivered";
		$data['bigTitle'] = "Delivered List";
		$data['headerCss'] = 'headerCss/customerlistcss';
		$data['footerJs'] = 'footerJs/customerlistjs';
		$data['mainContent'] = "chaanan/deliverd";
		$this->load->view("includes/mainContent",$data);
	}
		 function view_list()
	{
	    $data['title'] = "View List";
		$data['smallTitle'] = "Website/List";
		$data['bigTitle'] = "View List";
		$data['headerCss'] = 'headerCss/customerlistcss';
		$data['footerJs'] = 'footerJs/customerlistjs';
		$data['mainContent'] = "chaanan/list";
		$this->load->view("includes/mainContent",$data);
	}
	 function contact(){
		$data['title'] = "Pending";
		$data['smallTitle'] = "Website/Pending";
		$data['bigTitle'] = "Pending List";
		$data['body'] = "admin/contact";
		$data['headerCss'] = "admin/headerCss/studentListCss";
		$data['footerJs'] = "admin/footerJs/studentListJs";
		$this->load->view("include/admin/mainContent",$data);
	}
	
		 function suggestion(){
		    $data['title'] = "Website Suggestion";
		$data['smallTitle'] = "Website/Suggestion";
		$data['bigTitle'] = "Suggestion";
		$data['body'] = "admin/Suggestion";
		$data['headerCss'] = "admin/headerCss/homeCss";
		$data['footerJs'] = "admin/footerJs/homeJs";
		$this->load->view("include/admin/mainContent",$data);
		}
	
	 function index(){
	    $this->load->model('dashboardmodel');
	   
		$data['title'] = "Website home";
		$data['smallTitle'] = "Website/Dashboard";
		$data['bigTitle'] = "Dashboard";
		$data['body'] = "admin/dashboard";
	//	$data['body'] = "admin/home";
		$data['headerCss'] = "admin/headerCss/studentRegisterCss";
		$data['footerJs'] = "admin/footerJs/studentRegisterJs";
		$this->load->view("include/admin/mainContent",$data);
		
	}
	 function noticeBoard(){
		$data['title'] = "Website Notice Board";
		$data['smallTitle'] = "Website/Notice Board";
		$data['bigTitle'] = "Notice Board";
		$data['body'] = "admin/noticeBoard";
		$data['headerCss'] = "admin/headerCss/homeCss";
		$data['footerJs'] = "admin/footerJs/homeJs";
		$this->load->view("include/admin/mainContent",$data);
	}
		 function latestnews(){
		$data['title'] = "Website Delivered";
		$data['smallTitle'] = "Website/Delivered";
		$data['bigTitle'] = "Delivered";
		$data['body'] = "admin/latestnews";
		$data['headerCss'] = 'headerCss/customerlistcss';
		$data['footerJs'] = 'footerJs/customerlistjs';
		$data['mainContent'] = 'chaanan/popup';
		$this->load->view("include/mainContent",$data);
	}
		 function popup(){
		$data['title'] = "Website Category";
		$data['smallTitle'] = "Website/Category";
		$data['bigTitle'] = "category";
		$data['headerCss'] = 'headerCss/customerlistcss';
		$data['footerJs'] = 'footerJs/customerlistjs';
		$data['mainContent'] = "chaanan/popup";
		$this->load->view("includes/mainContent",$data);
	}

	
	 function logo()
	{
	   	$data['title'] = "Website Logo";
		$data['smallTitle'] = "Website/logo";
		$data['bigTitle'] = "Logo";
		$data['headerCss'] = 'headerCss/customerlistcss';
		$data['footerJs'] = 'footerJs/customerlistjs';
		$data['mainContent'] = "chaanan/logo";
		$this->load->view("includes/mainContent",$data); 
	}
		 function popup1(){
		$data['title'] = "Website logo";
		$data['smallTitle'] = "Website/Logo";
		$data['bigTitle'] = "logo";
		$data['body'] = "admin/popup1";
		$data['headerCss'] = "admin/headerCss/homeCss";
		$data['footerJs'] = "admin/footerJs/homeJs";
		$this->load->view("include/admin/mainContent",$data);
	}
	 function logo1()
	{
	    	$data['title'] = "Website Popup";
		$data['smallTitle'] = "Website/Popup";
		$data['bigTitle'] = "Popup";
		$data['body'] = "admin/logo1";
		$data['headerCss'] = "admin/headerCss/homeCss";
		$data['footerJs'] = "admin/footerJs/homeJs";
		$this->load->view("include/admin/mainContent",$data);
	}
	
	 function selectedStudent(){
		$data['title'] = "Selected Student";
		$data['smallTitle'] = "Website/Selected Student";
		$data['bigTitle'] = "Selected Student";
		$data['body'] = "admin/selectedStudent";
		$data['headerCss'] = "admin/headerCss/studentRegisterCss";
		$data['footerJs'] = "admin/footerJs/studentRegisterJs";
		$this->load->view("include/admin/mainContent",$data);
	}
	
		 function customer_list(){
		$data['title'] = "customer_list";
		$data['smallTitle'] = "Website/customer_list";
		$data['bigTitle'] = "Customer list";
		$data['body'] = "admin/customer_list";
		$data['headerCss'] = "admin/headerCss/studentRegisterCss";
		$data['footerJs'] = "admin/footerJs/studentRegisterJs";
		$this->load->view("include/admin/mainContent",$data);
	}
	
	 function applicent()
	{
	   	$data['title'] = "Applicent Detail";
		$data['smallTitle'] = "Website/applicent";
		$data['bigTitle'] = "Applicent";
		$data['body'] = "admin/applicent";
		$data['headerCss'] = "admin/headerCss/studentListCss";
		$data['footerJs'] = "admin/footerJs/studentListJs";
	//	$data['mainContent']="applicent";
		$this->load->view("include/admin/mainContent",$data); 
	}
	 function admission()
		{
	    $this->load->library("form_validation");
		$data['title'] = "Registration Form";
		$data['smallTitle'] = "Registration Form";
		$data['bigTitle'] = "Registration Form";
		$data['body'] = "admin/admission";
		$data['headerCss'] = "admin/headerCss/studentListCss";
		$data['footerJs'] = "admin/footerJs/studentListJs";
		$this->load->view("include/admin/mainContent",$data);
	}
		 function bookRecord()
		{
	    $this->load->library("form_validation");
		$data['title'] = "Book Registration Form";
		$data['smallTitle'] = "Book Registration Form";
		$data['bigTitle'] = "Book Registration Form";
		$data['body'] = "admin/bookRecord";
		$data['headerCss'] = "admin/headerCss/studentListCss";
		$data['footerJs'] = "admin/footerJs/studentListJs";
		$this->load->view("include/admin/mainContent",$data);
	}

	 function dgallery(){
		$data['title'] = "Gallery";
		$data['smallTitle'] = "Website/Gallery";
		$data['bigTitle'] = "Gallery Department";
		$data['body'] = "admin/dgallery";
		$data['headerCss'] = "admin/headerCss/studentListCss";
		$data['footerJs'] = "admin/footerJs/studentListJs";
		$this->load->view("include/admin/mainContent",$data);
	}
		 function gallery(){
		$data['title'] = "Gallery";
		$data['smallTitle'] = "Website/Gallery";
		$data['bigTitle'] = "Gallery";
		$data['body'] = "admin/gallery";
		$data['headerCss'] = "admin/headerCss/studentListCss";
		$data['footerJs'] = "admin/footerJs/studentListJs";
		$this->load->view("include/admin/mainContent",$data);
	}
	 function campus(){
		$data['title'] = "Campus";
		$data['smallTitle'] = "Website/campus";
		$data['bigTitle'] = "Campus";
		$data['body'] = "admin/campus";
		$data['headerCss'] = "admin/headerCss/studentListCss";
		$data['footerJs'] = "admin/footerJs/studentListJs";
		$this->load->view("include/admin/mainContent",$data);
	}
	 function games(){
		$data['title'] = "Games";
		$data['smallTitle'] = "Website/games";
		$data['bigTitle'] = "Games&Sports";
		$data['body'] = "admin/games";
		$data['headerCss'] = "admin/headerCss/studentListCss";
		$data['footerJs'] = "admin/footerJs/studentListJs";
		$this->load->view("include/admin/mainContent",$data);
	}
	 function staff(){
		$data['title'] = "Staff";
		$data['smallTitle'] = "Website/Staff";
		$data['bigTitle'] = "Staff";
		$data['body'] = "admin/staff";
		$data['headerCss'] = "admin/headerCss/studentListCss";
		$data['footerJs'] = "admin/footerJs/studentListJs";
		$this->load->view("include/admin/mainContent",$data);
	}
	
	 function uploadResult(){
		$data['title'] = "UPLOAD RESULT";
		$data['smallTitle'] = "Website/UPLOAD RESULT";
		$data['bigTitle'] = "UPLOAD RESULT";
		$data['body'] = "admin/uploadResult";
		$data['headerCss'] = "admin/headerCss/studentRegisterCss";
		$data['footerJs'] = "admin/footerJs/createTestJs";
		$this->load->view("include/admin/mainContent",$data);
	}
	 function singleSms(){
		$data['title'] = "Test";
		$data['smallTitle'] = "Test/Go for test";
		$data['bigTitle'] = "Select Test";
		$data['body'] = "admin/singleSms";
		$data['headerCss'] = "admin/headerCss/questionListCss";
		$data['footerJs'] = "admin/footerJs/questionListJs";
		$this->load->view("include/admin/mainContent",$data);
	}
	
	 function allStudent(){
		$data['title'] = "Test";
		$data['smallTitle'] = "Test/Go for test";
		$data['bigTitle'] = "Select Test";
		$data['body'] = "admin/allStudent";
		$data['headerCss'] = "admin/headerCss/questionListCss";
		$data['footerJs'] = "admin/footerJs/questionListJs";
		$this->load->view("include/admin/mainContent",$data);
	
	}
	 function takeFee(){
		$data['title'] = "Test";
		$data['smallTitle'] = "Test/Go for test";
		$data['bigTitle'] = "Select Test";
		$data['body'] = "admin/takeFee";
		$data['headerCss'] = "admin/headerCss/questionListCss";
		$data['footerJs'] = "admin/footerJs/questionListJs";
		$this->load->view("include/admin/mainContent",$data);
	}
	
	 function feeSlipList(){
		$data['title'] = "Test";
		$data['smallTitle'] = "Test/Go for test";
		$data['bigTitle'] = "Select Test";
		$data['body'] = "admin/feeSlipList";
		$data['headerCss'] = "admin/headerCss/questionListCss";
		$data['footerJs'] = "admin/footerJs/questionListJs";
		$this->load->view("include/admin/mainContent",$data);
	}
	 function viewfeeD(){
		$id = $this->uri->segment(3);
		$this->db->where("id",$id);
		$datastu = $this->db->get("student_info")->row();
		$data['row']=$datastu;
	
		$this->db->where("student_id",$data['row']->student_id);
		$row = $this->db->get("fee");
		if($row->num_rows() > 0){
			$val = $this->db->query("SELECT remaing_fee FROM fee WHERE student_id = '$datastu->student_id' ORDER BY sno DESC LIMIT 1")->row();
			$data['balance'] = $val->remaing_fee;
		}else{
			$data['balance'] = $data['row']->total_fee;
		}
		$data['title'] = "Collect Fee";
		$data['smallTitle'] = "Fee/Collect Fee";
		$data['bigTitle'] = "Collect Fee";
		$data['body'] = "admin/viewfeeD";
		$data['headerCss'] = "admin/headerCss/feeCss";
		$data['footerJs'] = "admin/footerJs/feeJs";
		$this->load->view("include/admin/mainContent",$data);
	}
	 function dailyExpense(){
		$data['title'] = "Daily Expense";
		$data['smallTitle'] = "Accounting / Daily Expense";
		$data['bigTitle'] = "Daily Expense";
		$data['body'] = "admin/dailyExpense";
		$data['headerCss'] = "admin/headerCss/dailyExpenseCss";
		$data['footerJs'] = "admin/footerJs/dailyExpenseJs";
		$this->load->view("include/admin/mainContent",$data);
	}
	 function save_fee(){
		$id=$this->input->post("student_id");
		$n = 1000 + $this->db->query("SELECT id FROM invoice_serial ORDER BY id DESC LIMIT 1")->row()->id;
		$invoice_no = "LAF".$n;
		$in = array(
				"invoice_no" => $invoice_no,
				"reason" => "fee Submit",
				"invoice_date" => date("Y-m-d")
		);
		$this->db->insert("invoice_serial",$in);
		$op1 = $this->db->query("select closing_balance from opening_closing_balance where opening_date='".date('Y-m-d')."'")->row();
		$balance = $op1->closing_balance;
		$clbalance = $balance + $this->input->post("feePay");
		$bal = array(
				"closing_balance" => $clbalance
		);
		$this->db->where("opening_date",date('Y-m-d'));
		$this->db->update("opening_closing_balance",$bal);
		$data=array(
				"student_id"=>$this->input->post("student_id"),
				"remaing_fee"=>$this->input->post("balance"),
				"paid"=>$this->input->post("feePay"),
				"paid_date"=>$this->input->post("issueDate"),
				"regifee"=>$this->input->post("regfee"),
				"onlinest"=>$this->input->post("onlinest"),
				"offlinest"=>$this->input->post("offlinest"),
				"otherfee"=>$this->input->post("otherfee"),
				"paid_month"=>$this->input->post("monthName"),
				"recieved_by"=>$this->input->post("recieved"),
				"till_date"=>$this->input->post("tillDate"),
				"invoice_no"=>$invoice_no
		);
		$this->db->insert("fee",$data);
		$am=0;
		$msg="Receive";
		if($this->input->post("feePay")>0)
		{$am=$this->input->post("feePay");
		$msg="Receive ( ".$this->input->post("feePay")." regularfee";
		}
		if($this->input->post("regfee")>0)
		{$am=$am+$this->input->post("regfee");
		$msg=$msg.$am+$this->input->post("regfee")."Registration fee";
		}
		if($this->input->post("onlinest")>0)
		{$am=$am+$this->input->post("onlinest");
		$msg=$msg.$am+$this->input->post("onlinest")."Online Test fee";
		}
		if($this->input->post("offlinest")>0)
		{$am=$am+$this->input->post("offlinest");
		$msg=$msg.$am+$this->input->post("offlinest")."Off line Test fee";
		}
		if($this->input->post("otherfee")>0)
		{$am=$am+$this->input->post("otherfee");
		$msg=$msg.$am+$this->input->post("otherfee")."Other charges";
		}
		
		$dayBook = array(
				"paid_to" => $this->session->userdata("name"),
				"paid_by" => $this->input->post("student_id"),
				"reason" => "Student Fee",
				"detail" => $msg,
				"dabit_cradit" => "credit",
				"amount" => $am,
				"closing_balance" => $clbalance,
				"pay_date" => date("Y-m-d"),
				"pay_mode" => "Cash",
				"invoice_no" => $invoice_no
		);
		$this->db->insert("day_book",$dayBook);
		$this->db->where("student_id",$id);
				$rowc = $this->db->get("student_info")->row();
				$sno=$rowc->id;
		
		redirect("apanel/feeInvoice/$sno/$invoice_no");
	}
	 function feeInvoice(){
		$data['stu_id']=$this->uri->segment(3);
		$data['invoice_no']=$this->uri->segment(4);
		$data['title'] = "Test";
		$data['smallTitle'] = "Fee / Fee Invoice";
		$data['bigTitle'] = "Fee Invoice";
		$data['body'] = "admin/feeInvoice";
		$data['headerCss'] = "admin/headerCss/feeCss";
		$data['footerJs'] = "admin/footerJs/feeJs";
		$this->load->view("include/admin/mainContent",$data);
	}
	 function dayBook(){
		$data['title'] = "Day Book";
		$data['smallTitle'] = "Accounting / Day Book";
		$data['bigTitle'] = "Day Book";
		$data['body'] = "admin/dayBook";
		$data['headerCss'] = "admin/headerCss/dailyExpenseCss";
		$data['footerJs'] = "admin/footerJs/dailyExpenseJs";
		$this->load->view("include/admin/mainContent",$data);
	}
	 function feeReports(){
		$data['title'] = "Day Book";
		$data['smallTitle'] = "Accounting / Day Book";
		$data['bigTitle'] = "Fee Reports";
		$data['body'] = "admin/feeReports";
		$data['headerCss'] = "admin/headerCss/feeReportCss";
		$data['footerJs'] = "admin/footerJs/feeReportJs";
		$this->load->view("include/admin/mainContent",$data);
	}
		 function invoice()
		{
		$this->load->library("form_validation");
		$data['title'] = "invoice";
		$data['smallTitle'] = "Website/invoice";
		$data['bigTitle'] = "invoice";
		$data['body'] = "admin/invoice";
		$data['headerCss'] = "admin/headerCss/studentListCss";
		$data['footerJs'] = "admin/footerJs/studentListJs";
		$this->load->view("include/admin/mainContent",$data);
	}
	
	 function billEntry(){
	     $data['pageTitle'] = 'Bill Entry';
 		$data['title'] = " Bill  Entry";
		$data['smallTitle'] = "Bill  Entry";
		$data['bigTitle'] = "Bill Entry";
		$data['headerCss'] = 'headerCss/customerlistcss';
		$data['footerJs'] = 'footerJs/customerlistjs';
		$data['mainContent'] = "chaanan/billEntry";
		$this->load->view("includes/mainContent",$data);
		}
	
	 function submitadmission()
	{

	/*	$this->load->library("form_validation");
		$this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
		$this->form_validation->set_rules('name','name','required');
		$this->form_validation->set_rules('f_name','Father-Name','required');
		$this->form_validation->set_rules('m_name','Mather-Name','required');
		$this->form_validation->set_rules('dob','Date of Brith','required');
		$this->form_validation->set_rules('mobile','Form-Number','required');
		$this->form_validation->set_rules('f_fees','Form-Fees','required');
		$this->form_validation->set_rules('g_by','Given_By','required');
		if($this->form_validation->run()){
	    $this->load->library("form_validation");
	    $name=$this->input->post('name');
	     $f_name=$this->input->post('f_name');
	      $m_name=$this->input->post('m_name');
	       $d_o_b=$this->input->post('dob');
	        $f_number=$this->input->post('');
	         $f_fees=$this->input->post('f_fees');
	          $g_by=$this->input->post('g_by');
	          
	          
	           $invoice_no=$this->input->post('invoice_no');
	           $data=array( 
						 "name"=>$name,
						 "f_name"=>$f_name,
						 "m_name"=>$m_name,
						 "d_o_b"=>$d_o_b,
						 "f_number"=>$f_number,
						 "f_fees"=>$f_fees,
						 "g_by"=>$g_by,
						 "invoice_no"=>$invoice_no
					 );
					 $this->load->model("loginmodel");
		$lid = $this->loginmodel->insert($data);
		redirect(base_url()."index.php/apanel/invoicefrem/".$lid); */
		
		$data['name' ]=$this->input->post("name");
		$data['f_name' ]=$this->input->post("fname");
		$data['m_name' ]=$this->input->post("m_name");
		$data['mobile_no' ]=$this->input->post("person_mobile");
		$data['d_o_b' ]=$this->input->post("dob");
		$data['address' ]=$this->input->post("address");
		$data['class' ]=$this->input->post("class_name");
		$data['f_fees' ]=$this->input->post("form_fee");
		$data['date' ]=date('Y-m-d h:s:i');
		$data['client_code' ]=$this->session->userdata("client_code");
		$this->db->select_max('id');
		$query = $this->db->get('admission');
		if($query->num_rows()>0){
			$max=$query->row()->id+1;
		}else{
			$max = 1;
		}
		$invno = "SIS10".$max;
		$data['invoice_no']=$invno;
		
		$this->db->insert("admission",$data);
		redirect(base_url()."index.php/apanel/invoicefrem/".$invno);
	}
	
	 function updateadmission()
	{

        $data['name' ]=$this->input->post("name");
		$data['f_name' ]=$this->input->post("fname");
		$data['m_name' ]=$this->input->post("m_name");
		$data['mobile_no' ]=$this->input->post("person_mobile");
		$data['address' ]=$this->input->post("address");
		$this->db->where("id",$this->input->post("id"));
		$this->db->update("admission",$data);
		redirect(base_url()."index.php/apanel/reglist");
	}
	
		 function updateadmissiontable()
	{
     		$inc=$this->db->get("updateadmission");
            if($inc->num_rows()>0){	
                                        	   
            foreach($inc->result() as $in): 
        $data['name' ]= $in->name;
		$data['f_name' ]= $in->f_name;
		$data['m_name' ]= $in->m_name;
		$data['mobile_no' ]= $in->address;
		$this->db->where("id",$in->id);
		$this->db->update("admission",$data);
                
            endforeach;
            }
	}
	 function bookSaleEntry()
	{
		$data['name' ]=$this->input->post("name");
		$data['f_name' ]=$this->input->post("fname");
		$data['class' ]=$this->input->post("class_name");
		$data['book_amount' ]=$this->input->post("book_amount");
		$data['date' ]=date('Y-m-d h:s:i');
		$data['client_code' ]=$this->session->userdata("client_code");
		$this->db->select_max('id');
		$query = $this->db->get('bookEntry');
		if($query->num_rows()>0){
			$max=$query->row()->id+1;
		}else{
			$max = 1;
		}
		$invno = "SISBOOK10".$max;
		$data['invoice_no']=$invno;
		
		$this->db->insert("bookEntry",$data);
		redirect(base_url()."index.php/apanel/bookinvoice/".$invno);
	}
	
	function invoicefrem(){
	    $this->load->view("admin/invoice/invoicefrem");
	}
	function invoicefinal(){
	   $id = $this->uri->segment(3);
	   
	   $this->load->view("admin/invoice/invoice");
	}
	
	 function reglist(){
	     	$data['pageTitle'] = 'Form List';
		$data['title'] = "Registration Form List";
		$data['smallTitle'] = "Registration List";
		$data['bigTitle'] = "Registration Form List";
		$data['body'] = "admin/reglist";
		$data['headerCss'] = "admin/headerCss/questionListCss";
		$data['footerJs'] = "admin/footerJs/questionListJs";
		$this->load->view("include/admin/mainContent",$data);
	}
/////////////////////////////////////////////////****UPASANA CODE****///////////////////////////////////////////////////////////
///////////////////////////*********FOR EMLOYEE************/////////////////////////////////////////////////////////////////////
	function addEmployee(){
	  
		$data['pageTitle'] = 'Add Employee';
		$data['smallTitle'] = 'Add Employee';
		$data['mainPage'] = 'Add Employee';
		$data['subPage'] = 'Add Employee';
		$data['title'] = 'Add Employee';
		$data['headerCss'] = 'headerCss/customerlistcss';
		$data['footerJs'] = 'footerJs/customerlistjs';
		$data['mainContent'] = 'admin/addEmployee';
		$this->load->view("includes/mainContent", $data);
	}
	function employeeList(){
	    $data['pageTitle'] = 'Employee List';
	    $data['title'] = " Employee List";
		$data['smallTitle'] = "Employee List";
		$data['bigTitle'] = "Employee List";
		$data['headerCss'] = 'headerCss/customerlistcss';
		$data['footerJs'] = 'footerJs/customerlistjs';
		$data['mainContent'] = "admin/employeeList";
		$this->load->view("includes/mainContent",$data);
	}
		function empProfile(){
		$uri= $this->uri->segment(3);
		$this->db->where("id",$uri);
		$emp=$this->db->get('employee');
		$data['emp']=$emp;
		$data['pageTitle'] = 'Employee Profile';
	    $data['title'] = " Employee Profile";
		$data['smallTitle'] = "Employee Profile";
		$data['bigTitle'] = "Employee Profile";
		$data['headerCss'] = 'headerCss/customerlistcss';
		$data['footerJs'] = 'footerJs/customerlistjs';
		$data['mainContent'] = "admin/empProfile";
		$this->load->view("includes/mainContent",$data);
	}
	
	
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////	

}
