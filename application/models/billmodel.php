<?php 
    class billmodel extends CI_Model{
        function getItemName($tid){
          
   $this->db->where("id",$tid);
	$req = $this->db->get("stock_products");
	return $req;
}
        
        
    }
        
        ?>