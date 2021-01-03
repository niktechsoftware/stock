<?php 
class Client_model extends CI_Model {

	var $API ="";
	function __construct() {
		parent::__construct();
			$this->load->library('restclient');
		$this->API="https://vijayiti.org.in/";
	}

	//function list_product($cid){
	//	return json_decode($this->restclient->get1($cid));
	//}
	
	function saveClientDetails($data,$cid)
	{
	   // echo $cid;
	    // $this->db->insert("contactus",$data);
        //return true;
	   	return json_decode($this->restclient->getClientDetails($data,$cid)); 
	}
	
	
	
	
/*	function list_product($email,$msg,$cid){
		return json_decode($this->restclient->getClientDetails($email,$msg,$cid));
	}*/
	
	
	function get_emp_detail(){
	    $query = $this->db->query("SELECT * FROM employee_info ORDER BY id DESC LIMIT 1");
        $result = $query->result_array();
		return $result;
	}
	function get_stu_detail(){
	    $query = $this->db->query("SELECT * FROM student_info ORDER BY id DESC LIMIT 1");
        $result = $query->result_array();
		return $result;
	}
	function get_admin_detail(){
	    $query = $this->db->query("SELECT * FROM general_settings ORDER BY school_code DESC LIMIT 1");
        $result = $query->result_array();
		return $result;
	}
	function get_db_detail(){
	    $result=$this->db->get('db_name')->row()->name;
		return $result;
	}

/*	function product($id){
		$params = array('customer_id'=>  $id);
		return json_decode($this->restclient->get($params),true);
	}

	function save($array)
	{
		$this->restclient->post($array);
	}

	function update($array)
	{
		$this->restclient->put($array);
	}

	function delete($id)
	{
		$this->restclient->delete($id);
	}*/
}
?>