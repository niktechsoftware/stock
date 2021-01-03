<?php 
    class Product extends CI_Model{
        /*function to get less then 10 quantity product*/
			function getProduct(){
			    $this->db->where('quantity <',10);
			  $query=  $this->db->get('stock_products');
			  return $query;
			}
       
    }

?>