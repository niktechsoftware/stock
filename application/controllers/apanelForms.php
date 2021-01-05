<?php
class ApanelForms extends CI_Controller{
	public function headline(){
		$data = array(
				"subject" => $this->input->post("title"),
				"message" => $this->input->post("content"),
				"date" => date("Y-m-d")
		);
		if($this->db->insert("heading",$data)){
			redirect("apanel/headline");
		}
		else{
			echo "Somthing going wrong. Please Contact Site administrator";
		}
	}
//-------------------------------------------------------------------------------------------------------------------------	
	//zorba ----------
	

	function addCustomer(){
	     $username = "CB".rand(10000,99999);
	  $data=array(
	      'name'=>$this->input->post('name'),
	      'mobile'=>$this->input->post('mno'),
	      'gst'=>$this->input->post('gst'),
	      'address'=>$this->input->post('address'),
	      'gender'=>$this->input->post('gender'),
	      'username'=>$username,
	      'date'=> date("Y-m-d")
	       );
	       if($this->db->insert("customer",$data)){
	    	redirect("apanel/customerRegistration/success");
	       }
	}
	function enterBill(){
	    $bill=$this->input->post("billNumber");
            $data=array(
            'product_quantity'=>$this->input->post("product_quantity"),
            'tpcostin'=>$this->input->post("total_prize"),
            'vatper'=>$this->input->post("vatper"),
            'satper'=>$this->input->post("satper"),
            'round_off'=>$this->input->post("roff"),
            'freight'=>$this->input->post("freight"),
            'discount'=>$this->input->post("discount"),
            'total_prize'=>$this->input->post("total_prize"),
            'dealar_mobile1'=>$this->input->post("mobile"),
            'dealar_mobile2'=>$this->input->post("mobile2"),
            'dealer_email'=>$this->input->post("company_email"),
            'dealer_address'=>$this->input->post("daddress"),
            'product_company_name'=>$this->input->post('companyName'),
            'reff_bil_num'=>$bill,
            'amount_paid'=>$this->input->post("amount_paid"),
            'balance'=>$this->input->post("balance"),
            'pay_mode'=>$this->input->post("payMode"),
            'discription'=>$this->input->post("discount"),
            'date1'=>$this->input->post("billDate"),
            'Gst'=>$this->input->post("gst"),
            'statecode'=>$this->input->post("stcode"),
            'emailid'=>$this->input->post("emailid")
            
            );

            if($this->db->insert("bill_info",$data))
            {

             $arr=array(
            'pay_mode'=>$this->input->post("payMode"),
            'pay_date'=>$this->input->post("billDate"),
           'amount'=>$this->input->post("amount_paid"),
            "paid_by"=>$this->input->post('companyName'),
            "paid_to"=>"classic bakery",
            "status"=>0,
            "reason"=>"Purchase",
            "dabit_cradit"=>0,
            "invoice_no"=>$this->input->post("billNumber")
           );
          	$this->db->insert("day_book",$arr);
            redirect("apanel/billEntry/success");
	        }else
            {
            	redirect("apanel/billEntry/false");
            }
        	}
        	function category()
        	{
	    	$data=array(
				'category' => $this->input->post('name'),
				);
        	
        	    $this->db->insert("product_category",$data);
        	    $query =$this->db->insert_id();
        	   // $this->appcategory($query,$name);
		        redirect(base_url()."apanel/category/success/".$query);
            	}
        	function createCategory(){
        	   $this->load->library('image_lib');
        	   $client_code=$this->session->userdata('client_code');
        	   $photo_name = time().trim($_FILES['selectedStu']['name']);
               $photo_name=str_replace(' ', '_', $photo_name);
        	   $this->load->library('upload');
        	   $image_path = realpath(APPPATH . '../assets/images/client_gallery/');
        	   $config['upload_path'] = $image_path;
        	   $config['allowed_types'] = 'gif|jpg|jpeg|png';
        	    $config['max_size'] = '500000';
			$config['file_name'] = $photo_name;
        	if (!empty($_FILES['selectedStu']['name'])) {
        			$this->upload->initialize($config);
                if($this->upload->do_upload('selectedStu')){
        	 $configer = array(
                            'image_library' => 'gd2',
                            'source_image' => $image_path."/".$photo_name,
                            'create_thumb' => FALSE,//tell the CI do not create thumbnail on image
                            'maintain_ratio' => TRUE,
                            'quality' => '100%', //tell CI to reduce the image quality and affect the image size
                            'width' => 800,//new size of image
                            'height' => 900,//new size of image
                        );
                    $this->image_lib->clear();
                    $this->image_lib->initialize($configer);
                    $this->image_lib->resize();
                    $name=  $this->input->post('name');     
			        if($this->input->post("cateid")){
	    	        $cid = $this->input->post("cateid");
	    	       	$data=array(
				    'category' => $this->input->post('name'),
					'image'=>$photo_name,
				);
        		$this->db->where("id",$this->input->post("cateid"));
        		$this->db->update("product_category",$data);
        		redirect(base_url()."apanel/category/Edit/".$cid);
	    	    }
	    	    else{
				$data=array(
				'category' => $this->input->post('name'),
				'image'=>$photo_name,
				);
        	    $this->db->insert("product_category",$data);
        	    $query =$this->db->insert_id();
        	   // $this->appcategory($query,$name);
		        redirect(base_url()."apanel/category/success/".$query);
	    	   }
	        	}
    	    	else{
    			echo "Somthing going wrong. Please Contact Site administrator";
    	    	}
	        	}else{
	    	   if($this->input->post("cateid")){
	    	       $cid = $this->input->post("cateid");
	    	       	$data=array(
				        'name' => $this->input->post('categoryName'),
				);
        		$this->db->where("id",$this->input->post("cateid"));
        		$this->db->update("category",$data);
        		redirect(base_url()."apanel/category/Edit/".$cid);
	    	   }
	    	   else{
	    	       	$data=array(
				'category' => $this->input->post('name'),
				'image'=>2
				
        		);
        	 $this->db->insert("product_category",$data);
        	    $query =$this->db->insert_id();
        	   // $this->appcategory($query,$name);
		        redirect(base_url()."apanel/category/success/".$query);
	    	   }
                  }
            	}
        	public function cod_amount()
        	{
	    	$id=$this->input->post('aid');
	        $data=array(
	        'amount'=>$this->input->post("amount"),
	        'status'=>$this->input->post("status"),
	        'state'=>$this->input->post("state"),
	        'country'=>$this->input->post("country"),
	       'date'=>date("Y-m-d")
	        );
	        if($id){
	          $this->db->update("cod_amount",$data);
	         redirect("apanel/cod");   
	        }
	        	if($this->db->insert("cod_amount",$data)){
			redirect("apanel/cod");
		}
		else{
			echo "Somthing going wrong. Please Contact Site administrator";
	        	}
        	}

        function subcategory(){
            	$data=array(
        				'name' => $this->input->post('name'),
        				'image'=>"image",
        				'cat_id'=>$this->input->post("mainCategory"),
        				);
                	 $this->db->insert("sub_category",$data);
                	  $query =$this->db->insert_id();
                	//	echo $photo_name;
                	
        		redirect(base_url()."apanel/subcategory/success/".$query);
                 }
	
		function createSubCategory(){
		   
		$this->load->library('image_lib');
	    // $client_code=$this->session->userdata('client_code');
	   	$photo_name = time().trim($_FILES['selectedStu']['name']);
        $photo_name=str_replace(' ', '_', $photo_name);
	    $this->load->library('upload');
			$image_path = realpath(APPPATH . '../assets/images/client_gallery/');
			$config['upload_path'] = $image_path;
			$config['allowed_types'] = 'gif|jpg|jpeg|png';
			$config['max_size'] = '500000';
			$config['file_name'] = $photo_name;
		
	    if (!empty($_FILES['selectedStu']['name'])) {
	    $this->upload->initialize($config);
			if($this->upload->do_upload('selectedStu')){
			     //echo "1";
			    $configer = array(
                            'image_library' => 'gd2',
                            'source_image' => $image_path."/".$photo_name,
                            'create_thumb' => FALSE,//tell the CI do not create thumbnail on image
                            'maintain_ratio' => TRUE,
                            'quality' => '100%', //tell CI to reduce the image quality and affect the image size
                            'width' => 800,//new size of image
                            'height' => 1000,//new size of image
                        );
                    $this->image_lib->clear();
                    $this->image_lib->initialize($configer);
                    if($this->image_lib->resize()){
                        //echo $this->image_lib->resize();
                       // return "success";
                         if($this->input->post("cateid")){
	    	       $scid = $this->input->post("cateid");
	    	       	$data=array(
				    'name' => $this->input->post('name'),
					'image'=>$photo_name,
					'cat_id'=>$this->input->post("mainCategory")
			
        		);
        	
        		$this->db->where("id",$this->input->post("cateid"));
        		$this->db->update("sub_category",$data);
        		
        		redirect(base_url()."apanel/subcategory/Edit/".$scid);
	    	   }else{
				$data=array(
				'name' => $this->input->post('name'),
				'image'=>$photo_name,
				'cat_id'=>$this->input->post("mainCategory"),
			
        		);
        	
        		 $this->db->insert("sub_category",$data);
        	    $query =$this->db->insert_id();
        	//	echo $photo_name;
        	
		redirect(base_url()."apanel/subcategory/success/".$query);
	    	   }}
	    	   }else{
                         return "fail";
                        return $this->image_lib->display_errors();
                    }
			    
		//	echo $image_path;
	    	}
	    	else{
	    if($this->input->post("cateid")){
	    	       $cid = $this->input->post("cateid");
	    	       	$data=array(
				    'name' => $this->input->post('categoryName'),
				    	'cat_id'=>$this->input->post("mainCategory"),
				);
        		$this->db->where("id",$this->input->post("cateid"));
        		$this->db->update("sub_category",$data);
        		echo "ss";
        		//redirect(base_url()."apanel/subcategory/Edit/".$cid);
	    	   }
	    	   else{
	    	       echo "Please Tr Again";
	    	   }
	            }}
	            public function updateproduct()
	            {
	                $id=$this->input->post('pid');
	                $data=array(
	                    "product_price"=>$this->input->post("price"),
	                    'selling_price'=>$this->input->post("selling_price")
	                   
	                     );
	                     $this->db->where("id",$id);
	                     $this->db->update("stock_products",$data);
	                     redirect(base_url()."adminController/updateproduct");
	            }
	         public function addproduct1(){
	                 $id=$this->input->post("pid");
		            $this->load->library('image_lib');
	                // $client_code=$this->session->userdata('client_code');
	   	               $photo_name = time().trim($_FILES['selectedStu']['name']);
                        $photo_name=str_replace(' ', '_', $photo_name);
		                $this->load->library('upload');
            			$image_path = realpath(APPPATH . '../assets/images/client_gallery/');
            			$config['upload_path'] = $image_path;
            			$config['allowed_types'] = 'gif|jpg|jpeg|png';
            			$config['max_size'] = '500000';
            			$config['file_name'] = $photo_name;
	                 if (!empty($_FILES['selectedStu']['name'])) {
	    	$this->upload->initialize($config);
			if($this->upload->do_upload('selectedStu')){
			     $configer = array(
                            'image_library' => 'gd2',
                            'source_image' => $image_path."/".$photo_name,
                            'create_thumb' => FALSE,//tell the CI do not create thumbnail on image
                            'maintain_ratio' => TRUE,
                            'quality' => '100%', //tell CI to reduce the image quality and affect the image size
                            'width' => 800,//new size of image
                            'height' => 1000,//new size of image
                        );
                    $this->image_lib->clear();
                    $this->image_lib->initialize($configer);
                    if($this->image_lib->resize()){
                        //echo $this->image_lib->resize();
                       // return "success";
                     if($this->input->post("cateid")){
	    	       $scid = $this->input->post("cateid");
	    	       	$data=array(
				    'name' => $this->input->post('name'),
					'image'=>$photo_name,
					'cat_id'=>$this->input->post("mainCategory")
			
        		);
	            }
                    }
                    }
	            
	                 }
	                if($this->input->post("cateid")){
	    	       $scid = $this->input->post("cateid");
	    	       	$data=array(
				    'name' => $this->input->post('name'),
					'image'=>$photo_name,
					'cat_id'=>$this->input->post("mainCategory")
			
        		);
        	$this->db->where("id",$this->input->post("cateid"));
        		$this->db->update("sub_category",$data);
        		redirect(base_url()."apanel/subcategory/Edit/".$scid);
	    	   }else{
				    $unnumber = rand(111,999);
		            $data['company']       =$this->input->post('company_name');
		      
		          if($this->input->post("proid")){
		              $data['hsn']            =$this->input->post('hsn');
		          }else{
		           $data['hsn']            =$unnumber."h".$this->input->post('hsn');   
		          }
                 $data['name']           =$this->input->post('name');
		       // $data['size']           =$this->input->post('size');
		        $data['selling_price'] =$this->input->post('selling_price');
		        $data['product_price']=$this->input->post('price');
		        $data['sub_category']   =$this->input->post('subCategory');
		        $data['cat_id']         =$this->input->post('mainCategory');
		        $data['status']         =1;
		        $data['image']=$photo_name;
		        $data['create_date']    =date("Y-m-d");
		        $data['quantity']=$this->input->post('quantity');
		        $data['weight']=$this->input->post('weight');
		    	$data['sec']   =$this->input->post('hsn');
		    	
        		  if($id){
        		$data1['product_price']=$this->input->post('price');
        		$data1['selling_price'] =$this->input->post('selling_price');
		        $data1['sub_category']   =$this->input->post('subCategory');
		        $data1['cat_id']         =$this->input->post('mainCategory');
		        $data1['status']         =1;
		        //$data1['image']=$photo_name;
		        $data1['create_date']    =date("Y-m-d");
		        $data1['quantity']=$this->input->post('quantity');
		        $data1['weight']=$this->input->post('weight');
		    	$data1['sec']   =$this->input->post('hsn');
		    
        	   $this->db->where('id',$id);
        	   $this->db->update("stock_products",$data1);
        	   redirect(base_url()."apanel/product_entry");
        	
        	//	echo $photo_name;
        	  
        	  }	$this->db->insert("stock_products",$data);
        	    $query =$this->db->insert_id();
        	 redirect(base_url()."apanel/product_entry/success/"); 
	                
	    	   }    
	                
	            }
	            
        function addproduct(){
		   $id=$this->input->post("pid");
		    $this->load->library('image_lib');
	    // $client_code=$this->session->userdata('client_code');
	   	$photo_name = time().trim($_FILES['selectedStu']['name']);
        $photo_name=str_replace(' ', '_', $photo_name);
		$this->load->library('upload');
			$image_path = realpath(APPPATH . '../assets/images/client_gallery/');
			$config['upload_path'] = $image_path;
			$config['allowed_types'] = 'gif|jpg|jpeg|png';
			$config['max_size'] = '500000';
			$config['file_name'] = $photo_name;
	  if (!empty($_FILES['selectedStu']['name'])) {
	    	$this->upload->initialize($config);
			if($this->upload->do_upload('selectedStu')){
			    
			     //echo "1";
			    $configer = array(
                            'image_library' => 'gd2',
                            'source_image' => $image_path."/".$photo_name,
                            'create_thumb' => FALSE,//tell the CI do not create thumbnail on image
                            'maintain_ratio' => TRUE,
                            'quality' => '100%', //tell CI to reduce the image quality and affect the image size
                            'width' => 800,//new size of image
                            'height' => 1000,//new size of image
                        );
                    $this->image_lib->clear();
                    $this->image_lib->initialize($configer);
                    if($this->image_lib->resize()){
                        //echo $this->image_lib->resize();
                       // return "success";
                     if($this->input->post("cateid")){
	    	       $scid = $this->input->post("cateid");
	    	       	$data=array(
				    'name' => $this->input->post('name'),
					'image'=>$photo_name,
					'cat_id'=>$this->input->post("mainCategory")
			
        		);
        	$this->db->where("id",$this->input->post("cateid"));
        		$this->db->update("sub_category",$data);
        		redirect(base_url()."apanel/subcategory/Edit/".$scid);
	    	   }else{
				    $unnumber = rand(111,999);
		            $data['company']       =$this->input->post('company_name');
		      
		          if($this->input->post("proid")){
		              $data['hsn']            =$this->input->post('hsn');
		          }else{
		           $data['hsn']            =$unnumber."h".$this->input->post('hsn');   
		          }
                 $data['name']           =$this->input->post('name');
		       // $data['size']           =$this->input->post('size');
		        $data['selling_price1'] =$this->input->post('price');
		        $data['sub_category']   =$this->input->post('subCategory');
		        $data['cat_id']         =$this->input->post('mainCategory');
		        $data['status']         =1;
		        $data['image']=$photo_name;
		        $data['create_date']    =date("Y-m-d");
		        $data['quantity']=$this->input->post('quantity');
		        $data['weight']=$this->input->post('weight');
		    	$data['sec']   =$this->input->post('hsn');
        		$this->db->insert("stock_products",$data);
        	    $query =$this->db->insert_id();
        	//	echo $photo_name;
        	    if($id){
        	   $this->db->where('id',$id);
        	   $this->db->update("stock_products",$data);
        	   redirect(base_url()."apanel/product_entry");
        	  }
        	
		        redirect(base_url()."apanel/product_entry/success/");
	    	   }}
	    	   }else{
                         return "fail";
                        return $this->image_lib->display_errors();
                    }
			    
		//	echo $image_path;
	    	}
	    	else{
	    	    	
		 if($this->input->post("cateid")){
	    	       $cid = $this->input->post("cateid");
	    	       	$data=array(
				    'name' => $this->input->post('categoryName'),
				    	'cat_id'=>$this->input->post("mainCategory"),
			
        		);
        		$this->db->where("id",$this->input->post("cateid"));
        		$this->db->update("sub_category",$data);
        		echo "ss";
        		//redirect(base_url()."apanel/subcategory/Edit/".$cid);
	    	   }
	    	   else{
	    	       if($id){
	    	       $data['selling_price1'] =$this->input->post('price');
	    	        $data['quantity']=$this->input->post('quantity');
	    	        $this->db->where('id',$id);
	    	        $this->db->update("stock_products",$data);
	    	        redirect(base_url()."apanel/product_entry");
	    	       }
	    	   }
	}}
	public function coupon(){
	   $coupon_code=$this->input->post("c_code");
	   $amount=$this->input->post("amount"); 
	   $apply_for=$this->input->post("apply_for");
	   $status=$this->input->post("status");
	  $data=array(
	      'coupon_cod'=>$coupon_code,
	     'amount'=>$amount,
	     'status'=>$status,
	     'apply_for'=>$apply_for,
	     'date'=>date("Y-m-d")
	      );
	      	if($this->db->insert("coupon",$data)){
			redirect("apanel/coupon");
		}
		else{
			echo "Somthing going wrong. Please Contact Site administrator";
		}
	}
	public function savedproduct()
    {
      $client_code=$this->session->userdata('client_code');
	    //echo $client_code;
	   // exit();
	   	$photo_name = time().trim($_FILES['selectedStu']['name']);
        $photo_name=str_replace(' ', '_', $photo_name);
	
			$this->load->library('upload');
			$image_path = realpath(APPPATH . '../assets/images/client_gallery/product/');
			$config['upload_path'] = $image_path;
			$config['allowed_types'] = 'gif|jpg|jpeg|png';
			$config['max_size'] = '2048';
			$config['file_name'] = $photo_name;
			//echo $photo_name;
	if (!empty($_FILES['selectedStu']['name'])) {
	  
			$this->upload->initialize($config);
		//	echo $this->input->post("desc");
			if($this->upload->do_upload('selectedStu')){
			    //echo "2";
				$data=array(
				
				'depart' => $this->input->post('desc'),
			
				'image'=>$photo_name,
				'date'=>date("Y-m-d"),
				'client_code'=>$client_code
        		);
        		 $this->db->insert("product_depart",$data);
        	$query =$this->db->insert_id();
        	
        	//echo $photo_name;	
			redirect(base_url()."apanel/dgallery/".$query);
	    	}
	    	else{
			echo "Somthing going wrong. Please Contact Site administrator";
	    	}}else{
	    	    echo "file not Select";
	    	}
        	}
        	public function  saveGalleryProduct(){
       	$photo_name = time().trim($_FILES['selectedStu']['name']);
        $photo_name=str_replace(' ', '_', $photo_name);
		$this->load->library('upload');
			$image_path = realpath(APPPATH . '../assets/images/client_gallery/product/');
				//echo $image_path;
			$config['upload_path'] = $image_path;
			$config['allowed_types'] = 'gif|jpg|jpeg|png';
			$config['max_size'] = '5048';
			$config['file_name'] = $photo_name;
	if (!empty($_FILES['selectedStu']['name'])) {
			$this->upload->initialize($config);
			//	echo $this->input->post("img_depart");
			if($this->upload->do_upload('selectedStu')){
				$data=array(
				  'depart_id'=>$this->input->post("img_depart"),
				'name'=>$this->input->post("title"),
				'image' => $this->input->post('img_type'),
				'discription' => $this->input->post('desc'),
				'price'=>$this->input->post('price'),
				'image'=>$photo_name,
				'Specification'=>$this->input->post('Specification'),
				'date'=>date("Y-m-d")
        		);
        	 $this->db->insert("product_gallery",$data);
        	$query =	$this->db->insert_id();
        		//echo $photo_name;	
        redirect(base_url()."apanel/gallery/".$query);
			//echo $image_path;
	    	}
	    	else{
			 echo "Somthing going wrong. Please Contact Site administrator";
	    	}}else{
	    	    echo "file not Select";
	    	}
        	}
        public function delivered()
        	{
            $id= $this->input->post("id");
 
	      $data['status']=1;
	    $this->db->where("invoice_no",$id);
	      if($this->db->update("day_book", $data)){
	      
	      
	     echo "Delivered";
	  }else{
	       echo "Try Again";
	  }
	}	
   	public function inquiry(){
		$name = $this->input->post("name");
		$data = array(
				"name" => $this->input->post("name"),
				"mobile" => $this->input->post("mobile"),
				"email" => $this->input->post("email"),
				"msg" => $this->input->post("msg"),
				"date" => date("Y-m-d")
		);
		if($this->db->insert("inquiry",$data)){
			if($this->input->post("contact") == "contact"):
				redirect("welcome/contact/true/$name");
			else:
				redirect("welcome/index/true/$name");
			endif;
		}
		else{
			echo "Somthing going wrong. Please Contact Site administrator";
		}
	}
//-------------------------------------------------------------------------------------------------------------------------	
	public function editProfile(){
		$id = $this->input->post('row_id');
		$photo_name = time().trim($_FILES['stuImage']['name']);
		$new_img = array(
				"photo"=> $photo_name
		);
		$old_img = $this->input->post("old_stuImg");
		@chmod("assets/images/stuImage/" . $old_img, 0777);
		@unlink("assets/images/stuImage/" . $old_img);
		$this->db->where("id",$id);
		$up = $this->db->update("student_info",$new_img);
		if($up){
			$this->load->library('upload');
			// Set configuration array for uploaded photo.
			$image_path = realpath(APPPATH . '../assets/images/stuImage');
			$config['upload_path'] = $image_path;
			$config['allowed_types'] = 'gif|jpg|jpeg|png';
			$config['max_size'] = '1024';
			$config['file_name'] = $photo_name;
			// Upload first photo and create a thumbnail of it.
			if (!empty($_FILES['stuImage']['name'])) {
				$this->upload->initialize($config);
				if ($this->upload->do_upload('stuImage')) {
					// ---------------------------------- Redirect Success Page ----------------------
					$this->session->set_userdata("photo",$photo_name);
					$data = array(
						"student_id" => $this->input->post("student_id"),
						"name" => $this->input->post("name"),
						"fName" => $this->input->post("fname"),
						"address" => $this->input->post("address"),
						"city" => $this->input->post("city"),
						"state" => $this->input->post("state"),
						"pin" => $this->input->post("pin"),
						"mobile" => $this->input->post("mobile"),
						"dob" => date("Y-m-d", strtotime($this->input->post("dob"))),
						"heighQ" => $this->input->post("heighQ"),
						"courseApplied" => $this->input->post("courseApplied"),
						"timing" => $this->input->post("timing"),
						"gender" => $this->input->post("gender"),
						"email" => $this->input->post("email"),
						"password" => $this->input->post("password"),
						"total_fee" => $this->input->post("total_fee"),
						"fee_method" => $this->input->post("fee_method"),
						"joinDate" => $dt,
						"joinTime" => date("h:i:s"),
						"isApprove" => $isApprove
					);
					$this->db->where("id",$this->input->post("id"));
					if($this->db->update("student_info",$data)){
						redirect("apanel/studentList");
					}
					else{
						echo "Somthing going wrong. Please Contact Site administrator";
					}
				}
			}
		}
		}
//-----------------------------------------------------------------------------------------------------------------------------
	public function deleteEnquiry(){
		$this->db->where("id",$this->uri->segment(3));
		if($this->db->delete("inquiry")){
			redirect(base_url()."apanel/inquiry");
		}
		else{
			echo "Somthing going wrong. Please Contact Site administrator";
		}
	}
//-------------------------------------------------------------------------------------------------------------------------
	public function editHeadline(){
		$data = array(
				"subject" => $this->input->post("title"),
				"message" => $this->input->post("content"),
				"date" => date("Y-m-d")
		);
		$this->db->where("id",$this->input->post("id"));
		if($this->db->update("notice",$data)){
			redirect(base_url()."apanel/noticeBoard");
		}
		else{
			echo "Somthing going wrong. Please Contact Site administrator";
		}
	}
//-----------------------------------------------------------------------------------------------------------------------------	
	public function noticeBoard(){
		$data = array(
				"subject" => $this->input->post("title"),
				"message" => $this->input->post("content"),
				"date" => date("Y-m-d")
		);
		if($this->db->insert("notice",$data)){
			redirect(base_url()."apanel/noticeBoard");
		}
		else{
			echo "Somthing going wrong. Please Contact Site administrator";
		}
	}
	
//-----------------------------------------------------------------------------------------------------------------------------
	public function deleteHeadline(){
		$this->db->where("id",$this->uri->segment(3));
		if($this->db->delete("notice")){
			redirect(base_url()."apanel/noticeBoard");
		}
		else{
			echo "Somthing going wrong. Please Contact Site administrator";
		}
	}
	public function letestNews(){
	   $client_code= $this->session->userdata('client_code');
		$data = array(
				// "subject" => $this->input->post("title"),
				"news" => $this->input->post("title"),
				"date" => date('Y-m-d'),
				"client_code"=>$client_code
		);
		if($this->db->insert("latestnews",$data)){
			redirect(base_url()."apanel/latestNews");
		}
		else{
			echo "Somthing going wrong. Please Contact Site administrator";
		}
	}

	public function editNews(){
		$data = array(
				"news" => $this->input->post("title"),
				// "message" => $this->input->post("content"),
				// "url" => $this->input->post("url")
		);
		$this->db->where("id",$this->input->post("id"));
		if($this->db->update("latest_news",$data)){
			redirect(base_url()."apanel/latestNews");
		}
		else{
			echo "Somthing going wrong. Please Contact Site administrator";
		}
	}
	public function delete_news(){
		$this->db->where("id",$this->uri->segment(3));
		if($this->db->delete("latestnews")){
			redirect(base_url()."apanel/latestNews");
		}
		else{
			echo "Somthing going wrong. Please Contact Site administrator";
		}
	}
	public function deleteNews(){
		$this->db->where("id",$this->uri->segment(3));
		if($this->db->delete("latest_news")){
			redirect(base_url()."apanel/latestNews");
		}
		else{
			echo "Somthing going wrong. Please Contact Site administrator";
		}
	}
	function uploadbooks(){
		$photo_name = time().trim($_FILES['uploadbooks']['name']);
		$data=array(
				'bookName'=>$this->input->post("title"),
				'subject'=>$this->input->post("subject"),
				'photo'=>$photo_name
		);
		$query = $this->db->insert("upload_books",$data);
		if($query){
			$this->load->library('upload');
			$image_path = realpath(APPPATH . '../assets/images');
			$config['upload_path'] = $image_path;
			$config['allowed_types'] = 'gif|jpg|jpeg|png';
			$config['max_size'] = '1024';
			$config['file_name'] = $photo_name;
		}
		if (!empty($_FILES['uploadbooks']['name'])) {
			$this->upload->initialize($config);
			$this->upload->do_upload('uploadbooks');
			redirect(base_url()."apanel/uploadbooks/23");
		}
		else{
			echo "Somthing going wrong. Please Contact Site administrator";
		}
	}
	function uploadpdf(){
		$photo_name = time().trim($_FILES['uploadbooks']['name']);
		$data=array(
				'pdfName'=>$this->input->post("title"),
				'filename'=>$photo_name
		);
		$query = $this->db->insert("upload_pdf",$data);
		if($query){
			$this->load->library('upload');
			$image_path = realpath(APPPATH . '../assets/pdffile');
			$config['upload_path'] = $image_path;
			$config['allowed_types'] = 'gif|jpg|jpeg|png|pdf';
			$config['max_size'] = '10024';
			$config['file_name'] = $photo_name;
		}
		if (!empty($_FILES['uploadbooks']['name'])) {
			$this->upload->initialize($config);
			$this->upload->do_upload('uploadbooks');
			redirect(base_url()."apanel/uploadpdf/23");
		}
		else{
			echo "Somthing going wrong. Please Contact Site administrator";
		}
	}
	function saveSelectedStu(){
		$photo_name = time().trim($_FILES['selectedStu']['name']);
		$data=array(
				'studentName'=>$this->input->post("title"),
				'department'=>$this->input->post("department"),
				'photo'=>$photo_name
		);
		if($query){
			$this->load->library('upload');
			$image_path = realpath(APPPATH . '../assets/images');
			$config['upload_path'] = $image_path;
			$config['allowed_types'] = 'gif|jpg|jpeg|png';
			$config['max_size'] = '1024';
			$config['file_name'] = $photo_name;
		}
		if (!empty($_FILES['selectedStu']['name'])) {
			$this->upload->initialize($config);
			$this->upload->do_upload('selectedStu');
			$query = $this->db->insert("selected_stu",$data);
			redirect(base_url()."apanel/selectedStudent/23");
		}
		else{
			echo "Somthing going wrong. Please Contact Site administrator";
		}
	}
		function popup(){
	   // $client_code=$this->session->userdata('client_code');
	   	$photo_name = time().trim($_FILES['selectedStu']['name']);
        $photo_name=str_replace(' ', '_', $photo_name);
	
			$this->load->library('upload');
			$image_path = realpath(APPPATH . '../assets/images/client_gallery/');
			$config['upload_path'] = $image_path;
			$config['allowed_types'] = 'gif|jpg|jpeg|png';
			$config['max_size'] = '2048';
			$config['file_name'] = $photo_name;
    	    if (!empty($_FILES['selectedStu']['name'])) {
			$this->upload->initialize($config);
            if($this->upload->do_upload('selectedStu')){
				$data=array(
				'desc' => $this->input->post('name'),
				'image'=>$photo_name,
				'date'=>date("Y-m-d"),
				);
        	
        		$this->db->insert("popup_image",$data);
        	    $query =$this->db->insert_id();
        	
        		//echo $photo_name;	
		        redirect(base_url()."apanel/popup/success/".$query);
		//	echo $image_path;
	    	}
	    	else{
			echo "Somthing going wrong. Please Contact Site administrator";
	    	}}else{
	    	    echo "file not Select";
	    	}
        	}
        		function logo(){
	   // $client_code=$this->session->userdata('client_code');
	   	$photo_name = time().trim($_FILES['selectedStu']['name']);
        $photo_name=str_replace(' ', '_', $photo_name);
	
			$this->load->library('upload');
			$image_path = realpath(APPPATH . '../assets/images/client_gallery/');
			$config['upload_path'] = $image_path;
			$config['allowed_types'] = 'gif|jpg|jpeg|png';
			$config['max_size'] = '2048';
			$config['file_name'] = $photo_name;
    	    if (!empty($_FILES['selectedStu']['name'])) {
			$this->upload->initialize($config);
            if($this->upload->do_upload('selectedStu')){
				$data=array(
				'desc' => $this->input->post('name'),
				'image'=>$photo_name,
				'date'=>date("Y-m-d"),
				);
        	
        		$this->db->insert("logo_image",$data);
        	    $query =$this->db->insert_id();
        	
        		//echo $photo_name;	
		        redirect(base_url()."apanel/logo/success/");
		//	echo $image_path;
	    	}
	    	else{
			echo "Somthing going wrong. Please Contact Site administrator";
	    	}}else{
	    	    echo "file not Select";
	    	}
        	}
	function savedGallery(){
	    $client_code=$this->session->userdata('client_code');
	    //echo $client_code;
	   // exit();
	   	$photo_name = time().trim($_FILES['selectedStu']['name']);
        $photo_name=str_replace(' ', '_', $photo_name);
	
			$this->load->library('upload');
			$image_path = realpath(APPPATH . '../assets/images/client_gallery/'.$client_code.'/');
			$config['upload_path'] = $image_path;
			$config['allowed_types'] = 'gif|jpg|jpeg|png';
			$config['max_size'] = '2048';
			$config['file_name'] = $photo_name;
			//echo $photo_name;
	if (!empty($_FILES['selectedStu']['name'])) {
	  
			$this->upload->initialize($config);
		//	echo $this->input->post("desc");
			if($this->upload->do_upload('selectedStu')){
			    //echo "2";
				$data=array(
				
				'depart' => $this->input->post('desc'),
				'image'=>$photo_name,
				'date'=>date("Y-m-d"),
				'client_code'=>$client_code
        		);
        		 $this->db->insert("gallery_depart",$data);
        	$query =$this->db->insert_id();
        	
        	//echo $photo_name;	
			redirect(base_url()."apanel/dgallery/".$query);
	
	    	}
	    	else{
			echo "Somthing going wrong. Please Contact Site administrator";
	    	}}else{
	    	    echo "file not Select";
	    	}
        	}
        		function saveGallery(){
	    $client_code=$this->session->userdata('client_code');
	   	$photo_name = time().trim($_FILES['selectedStu']['name']);
        $photo_name=str_replace(' ', '_', $photo_name);
	
			$this->load->library('upload');
			$image_path = realpath(APPPATH . '../assets/images/client_gallery/'.$client_code.'/');
			$config['upload_path'] = $image_path;
			$config['allowed_types'] = 'gif|jpg|jpeg|png';
			$config['max_size'] = '2048';
			$config['file_name'] = $photo_name;
	if (!empty($_FILES['selectedStu']['name'])) {
			$this->upload->initialize($config);
			//	echo $this->input->post("img_depart");
			
			if($this->upload->do_upload('selectedStu')){
				$data=array(
				  'depart_id'=>$this->input->post("img_depart"),
				  
				'name'=>$this->input->post("title"),
				'image' => $this->input->post('img_type'),
				'desc' => $this->input->post('desc'),
				'image'=>$photo_name,
				'date'=>date("Y-m-d"),
				'client_code'=>$client_code
        		);
        	
        		 $this->db->insert("gallery",$data);
        	$query =	$this->db->insert_id();
        	
        		//echo $photo_name;	
        	
			redirect(base_url()."apanel/gallery/".$query);
			//echo $image_path;
	    	}
	    	else{
			 echo "Somthing going wrong. Please Contact Site administrator";
	    	}}else{
	    	    echo "file not Select";
	    	}
        	}
        		function savecmenu(){
	   $client_code=$this->session->userdata('client_code');
	   	$photo_name = time().trim($_FILES['selectedStu']['name']);
        $photo_name=str_replace(' ', '_', $photo_name);
	
			$this->load->library('upload');
			$image_path = realpath(APPPATH . '../assets/images/client_gallery/'.$client_code.'/');
			$config['upload_path'] = $image_path;
			$config['allowed_types'] = 'gif|jpg|jpeg|png';
			$config['max_size'] = '2048';
			$config['file_name'] = $photo_name;
	if (!empty($_FILES['selectedStu']['name'])) {
			$this->upload->initialize($config);
				//echo $this->input->post("img_depart");
			
			if($this->upload->do_upload('selectedStu')){
				$data=array(
				  'depart_id'=>$this->input->post("img_depart"),
				  
				'name'=>$this->input->post("title"),
				'image' => $this->input->post('img_type'),
				'desc' => $this->input->post('desc'),
				'image'=>$photo_name,
				'date'=>date("Y-m-d"),
				'client_code'=>$client_code
        		);
        	
        		 $this->db->insert("content",$data);
        	$query =	$this->db->insert_id();
        	
        		//echo $photo_name;	
			redirect(base_url()."apanel/menu_containt/".$query);
			//echo $image_path;
	    	}
	    	else{
			 echo "Somthing going wrong. Please Contact Site administrator";
	    	}}else{
	    	    echo "file not Select";
	    	}
        	}
        		function savemenu(){
	   $client_code=$this->session->userdata('client_code');
	   	$data=array(
				'depart' => $this->input->post('desc'),
				'date'=>date("Y-m-d"),
				'client_code'=>$client_code
        		);
        	
        		 $this->db->insert("menu",$data);
        	$query =$this->db->insert_id();
        	
        		//echo $photo_name;	
			redirect(base_url()."apanel/menu/".$query);
			//echo $image_path;
	    
	    
        	}
         function savegames(){
		$photo_name = time().trim($_FILES['selectedStu']['name']);
		$data=array(
				'name'=>$this->input->post("title"),
				'image'=>$photo_name,
				'date'=>date("Y-m-d")
	                	);
	        	$query = $this->db->insert("games",$data);
		        if($query){
			$this->load->library('upload');
			$image_path = realpath(APPPATH . '../assets/images');
			$config['upload_path'] = $image_path;
			$config['allowed_types'] = 'gif|jpg|jpeg|png';
			$config['max_size'] = '6048';
			$config['file_name'] = $photo_name;
		}
		if (!empty($_FILES['selectedStu']['name'])) {
			$this->upload->initialize($config);
			$this->upload->do_upload('selectedStu');
			
			redirect(base_url()."apanel/games");
			//echo $image_path;
		}
		else{
			echo "Somthing going wrong. Please Contact Site administrator";
		}
	}
	function savecampus(){
		$photo_name = time().trim($_FILES['selectedStu']['name']);
		$data=array(
				'image'=>$photo_name,
				'date'=>date("Y-m-d")
		);
		$query = $this->db->insert("campus",$data);
		if($query){
			$this->load->library('upload');
			$image_path = realpath(APPPATH . '../assets/images');
			$config['upload_path'] = $image_path;
			$config['allowed_types'] = 'gif|jpg|jpeg|png';
			$config['max_size'] = '2048';
			$config['file_name'] = $photo_name;
		}
		if (!empty($_FILES['selectedStu']['name'])) {
			$this->upload->initialize($config);
			$this->upload->do_upload('selectedStu');
			
			redirect(base_url()."apanel/campus");
			//echo $image_path;
		}
		else{
			echo "Somthing going wrong. Please Contact Site administrator";
		}
	}
        function saveStaff(){
    $client_code=$this->session->userdata("client_code");
		$photo_name = time().trim($_FILES['image']['name']);
		$photo_name=str_replace(' ', '_', $photo_name);
		$data=array(
		                'join_date'=>$this->input->post("joining_date"),
		            	'job_category'=>$this->input->post("job_category"),
				        'name'=>$this->input->post("name"),
					    'gender'=>$this->input->post("gender"),
					    'qualification'=>$this->input->post("qualification"),
					   	'post_desc'=>$this->input->post("post_desc"),
				    	'status'=>"Active",
					    'mobile'=>$this->input->post("mobile"),
			        	'photo'=>$photo_name,
				        'client_code'=>$client_code
		);
	//	print_r($data);
		$query = $this->db->insert("employee_info",$data);
		if($query){
			$this->load->library('upload');
			$image_path = realpath(APPPATH . '../assets/images');
			$config['upload_path'] = $image_path;
			$config['allowed_types'] = 'gif|jpg|jpeg|png';
			$config['max_size'] = '1024';
			$config['file_name'] = $photo_name;
		}
		if (!empty($_FILES['image']['name'])) {
			$this->upload->initialize($config);
			$this->upload->do_upload('image');
			redirect(base_url()."apanel/staff");
			//echo $image_path;
		}
		else{
			echo "Somthing going wrong. Please Contact Site administrator";
		}
	}
public function deleteCareer(){
		$this->db->where("paid_by",$this->uri->segment(3));
		if($this->db->delete("day_book")){
	redirect(base_url()."apanel/deliverd");
		}
		else{
			echo "Somthing going wrong. Please Contact Site administrator";
		}
	}
	public function deleteCareer1(){
		$this->db->where("paid_by",$this->uri->segment(3));
		if($this->db->delete("day_book")){
	redirect(base_url()."apanel/pending");
		}
		else{
			echo "Somthing going wrong. Please Contact Site administrator";
		}
	}
	public function deletesuggestion(){
		$this->db->where("id",$this->uri->segment(3));
		if($this->db->delete("suggestion")){
		redirect(base_url()."apanel/suggestion");
		}
		else{
			echo "Somthing going wrong. Please Contact Site administrator";
		}
	}
	public function deleteGallery(){
		$this->db->where("id",$this->uri->segment(3));
		if($this->db->delete("product_gallery")){
			redirect(base_url()."apanel/gallery");
		}
		else{
			echo "Somthing going wrong. Please Contact Site administrator";
		}
	}
		public function deletemenu(){
		$this->db->where("id",$this->uri->segment(3));
		if($this->db->delete("menu")){
			redirect(base_url()."apanel/menu");
		}
		else{
			echo "Somthing going wrong. Please Contact Site administrator";
		}
	}
		public function deletemenuc(){
		$this->db->where("id",$this->uri->segment(3));
		if($this->db->delete("content")){
			redirect(base_url()."apanel/menu_containt");
		}
		else{
			echo "Somthing going wrong. Please Contact Site administrator";
		}
	}
	
	
		public function deletedproduct(){
		$this->db->where("id",$this->uri->segment(3));
		if($this->db->delete("product_depart")){
			redirect(base_url()."apanel/dgallery");
		}
		else{
			echo "Somthing going wrong. Please Contact Site administrator";
		}
	}
		public function deletedGallery(){
		$this->db->where("depart_id",$this->uri->segment(3));
		if($this->db->delete("gallery_depart")){
			redirect(base_url()."apanel/dgallery");
		}
		else{
			echo "Somthing going wrong. Please Contact Site administrator";
		}
	}
	public function deletecategory(){
	    $this->db->where("cat_id",$this->uri->segment(3));
		$sp=$this->db->get("stock_products");
		if($sp->num_rows()>0){
		    redirect(base_url()."apanel/category/15");
		
		}else{
		  $this->db->where("id",$this->uri->segment(3));
		  if($this->db->delete("product_category")){
		  redirect(base_url()."apanel/category/deleted");
		  }
		}
		
		
		 
	}
	  
	    public function deletecod(){
		$this->db->where("id",$this->uri->segment(3));
		if($this->db->delete("cod_amount")){
			redirect(base_url()."apanel/cod");
		}
		else{
			echo "Somthing going wrong. Please Contact Site administrator";
		}
	}
	
		public function deletelogo(){
		$this->db->where("id",$this->uri->segment(3));
		if($this->db->delete("logo_image")){
			redirect(base_url()."apanel/logo");
		}
		else{
			echo "Somthing going wrong. Please Contact Site administrator";
		}
	}

public function deletesubcategory(){
		$this->db->where("id",$this->uri->segment(3));
		if($this->db->delete("sub_category")){
			redirect(base_url()."apanel/subcategory");
		}
		else{
			echo "Somthing going wrong. Please Contact Site administrator";
		}
	}
	public function deleteproduct(){
		$this->db->where("id",$this->uri->segment(3));
		if($this->db->delete("stock_products")){
			redirect(base_url()."apanel/product_entry");
		}
		else{
			echo "Somthing going wrong. Please Contact Site administrator";
		}
	}


	public function deletegames(){
		$this->db->where("id",$this->uri->segment(3));
		if($this->db->delete("games")){
			redirect(base_url()."apanel/games");
		}
		else{
			echo "Somthing going wrong. Please Contact Site administrator";
		}
	}
	public function deleteCampus(){
		$this->db->where("id",$this->uri->segment(3));
		if($this->db->delete("campus")){
			redirect(base_url()."apanel/campus");
		}
		else{
			echo "Somthing going wrong. Please Contact Site administrator";
		}
	}
	public function deleteStaff(){
		$this->db->where("id",$this->uri->segment(3));
		if($this->db->delete("employee_info")){
			redirect(base_url()."apanel/staff");
		}
		else{
			echo "Somthing going wrong. Please Contact Site administrator";
		}
	}
	public function deletequick(){
		$this->db->where("id",$this->uri->segment(3));
		if($this->db->delete("inquiry")){
			redirect(base_url()."apanel/quickContact");
		}
		else{
			echo "Somthing going wrong. Please Contact Site administrator";
		}
	}
	public function deleteBooks(){
		$this->db->where("SNo",$this->uri->segment(3));
		if($this->db->delete("upload_books")){
			redirect(base_url()."apanel/uploadbooks");
		}
		else{
			echo "Somthing going wrong. Please Contact Site administrator";
		}
	}
	
	public function deleteStudents(){
		$this->db->where("sno",$this->uri->segment(3));
		if($this->db->delete("selected_stu")){
			redirect(base_url()."apanel/selectedStudent");
		}
		else{
			echo "Somthing going wrong. Please Contact Site administrator";
		}
	}
	function getFeeDetails(){
		$type=$this->input->post("detailType");
		$sdt=$this->input->post("sdt");
		$edt=$this->input->post("edt");
		$a = mysql_query("select student_id,paid_date,$type as stufee from fee where paid_date >= '".date("Y-m-d", strtotime($sdt))."' AND paid_date <= '".date("Y-m-d", strtotime($edt))."'");
			?><table class="display table" style="width: 100%; cellspacing: 0;">
  <tr>
  <th>SNO</th>
    <th>Student Id</th>
     <th>student Name</th>
     <th><?php echo $type; ?> Fee</th>
    <th>Paid Date</th>
  </tr>
  <?php $i=1; while($row = mysql_fetch_object($a)){ ?>
  <tr>
  <?php if($row->stufee >0){?>
    <td><?php echo $i;?></td>
    <td><?php echo $row->student_id;?></td>
    <td>
    	 <?php 
    	 	$this->db->where("student_id",$row->student_id);
    		$name=$this->db->get("student_info")->row();
    	?>
    	<?php echo $name->name;?>
    </td>
    <td><?php echo $row->stufee;?></td>
     <td><?php echo $row->paid_date;?></td>
  </tr>
  <?php $i++;}}?>
</table>
<?php 

	}
	public 	function deletecustomer(){
	  $id= $this->uri->segment("3");
            $this->db->where("id",$id);
            $this->db->delete("customer");
           redirect(base_url()."apanel/searchCustomer"); 
	}
	public function deletephistory()
	{
	  $id=  $this->uri->segment('3');
	  $this->db->where("reff_bil_num",$id);
	  $this->db->delete("bill_info");
	  redirect(base_url()."billController/pBillHistory");
	}
	
	public function invoicedetail(){
		    $reff_bil_num=$this->uri->segment(3);
		    //echo $this->uri->segment(3);
		    $data['reff_bil_num']=$reff_bil_num;
		   
	$this->load->view('chaanan/invoicedetail',$data);
	}
	
/////////////////////////////////***********UPASANA CODE****************////////////////////////////////////
//////////////////////////////////FOR EMPLOYEE/////////////////////////////////////////////////////
        public function addEmployee(){
        	$this->load->model("Cmodel");
		    $tblnm ="employee";
		    $maxid	=	$this->Cmodel->cust_max($tblnm);
		    $maxid	=	$maxid+1;
			$billno="4000".$maxid;
			$rn=rand(9999,99999);
			$usern1=$maxid+$rn;
			$emp1="EMP".$usern1;
            $data=array(
                "name" => $this->input->post('empname'),
                "address" => $this->input->post('address'),
                "mobile" =>$this->input->post('mno'),
                "gender" =>$this->input->post('gender'),
                "username" =>$emp1,
                "date" => date("Y/m/d")
                );
              //  print_r($data);
              $addemp=$this->Cmodel->addEmp($data);
              if($addemp){
              redirect('apanel/addEmployee/success');
              }else{
                  echo '1';
              }
              
        }
        public function editEmployee(){
            $uri=$this->input->post('empid');
           
        	$this->load->model("Cmodel");
		    $data=array(
                "name" => $this->input->post('empname'),
                "address" => $this->input->post('address'),
                "mobile" =>$this->input->post('mno'),
                "gender" =>$this->input->post('gender'),
                );
              //  print_r($data);
              $editemp=$this->Cmodel->editEmp($data,$uri);
              if($editemp){
              redirect('apanel/addEmployee/'.$uri.'/success');
              }else{
                  echo '1';
              }
              
        }
        public function updateEmpInfo(){
            $uri=$this->uri->segment(3); 
           redirect('apanel/addEmployee/'.$uri);
        }
        
        
      	public function deleteEmp(){
      	$id=$this->uri->segment(3);   
		$this->db->where("id",$id);
		$this->load->model("Cmodel");
		$dltemp=$this->Cmodel->deleteEmp($id);	
		if($dltemp){
			redirect(base_url()."apanel/employeeList");
		}
		else{
			echo "Somthing going wrong. Please Contact Site administrator";
		}
	} 

	
}