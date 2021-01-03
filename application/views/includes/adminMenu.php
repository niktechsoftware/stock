<ul class="sidebar-menu">
            <li class="menu-header">Main</li>
            <li class="dropdown active">
              <a href="<?php echo base_url();?>index.php/login/" class="nav-link"><i data-feather="monitor"></i><span>Dashboard</span></a>
              
            </li>
            <li class="dropdown">
              <a href="#" class="nav-link has-dropdown"><i data-feather="briefcase"></i><span>Configuration</span></a>
              <ul class="dropdown-menu">
                 <li><a class="nav-link" href="<?php echo base_url();?>index.php/apanel/category/">Category </a></li>
                <li><a class="nav-link" href="<?php echo base_url();?>index.php/apanel/subcategory/">Sub Category</a></li>
               
                <li><a class="nav-link" href="<?php echo base_url();?>index.php/apanel/product_entry/">Product Entry</a></li>
             </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="nav-link has-dropdown"><i data-feather="user"></i><span class="icon icon-users">Customer </span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="<?php echo base_url();?>index.php/apanel/customerRegistration/">Customer Registration</a></li>
              <li><a class="nav-link" href="<?php echo base_url();?>index.php/apanel/searchCustomer">Search Customer </a></li>
               <!-- <li><a class="nav-link" href="<?php //echo base_url();?>index.php/apanel/view_list/">View List</a></li>-->
               
              </ul>
            </li>
              <li class="dropdown">
              <a href="#" class="nav-link has-dropdown"><i data-feather="user-plus"></i><span class="user-plus">Employee </span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="<?php echo base_url();?>index.php/apanel/addEmployee/">Employee Registration</a></li>
              <li><a class="nav-link" href="<?php echo base_url();?>index.php/apanel/employeeList">Search Employee </a></li>
               <!-- <li><a class="nav-link" href="<?php //echo base_url();?>index.php/apanel/view_list/">View List</a></li>-->
               
              </ul>
            </li>
              <li class="dropdown">
              <a href="#" class="nav-link has-dropdown"><i data-feather="briefcase"></i><span>Bill </span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="<?php echo base_url();?>index.php/apanel/billEntry/">Bill Entry</a></li>
              <li><a class="nav-link" href="<?php echo base_url();?>index.php/billController/pBillHistory">Purchase Bill History </a></li>
               <!-- <li><a class="nav-link" href="<?php //echo base_url();?>index.php/apanel/view_list/">View List</a></li>-->
               
              </ul>
            </li>
        <li class="dropdown">
              <a href="#" class="nav-link has-dropdown"><i data-feather="briefcase"></i><span>Product</span></a>
              <ul class="dropdown-menu">
               <li><a class="nav-link" href="<?php echo base_url();?>index.php/adminController/productList">Total Product</a></li>
               <li><a class="nav-link" href="<?php echo base_url();?>index.php/adminController/demandProduct">Demand Product</a></li>
               <li><a class="nav-link" href="<?php echo base_url();?>index.php/adminController/updateProduct">Update Product Quantity</a></li>
               </ul>
            </li>
             <li class="dropdown">
             
              <ul class="dropdown-menu">
               <li><a class="nav-link" href="<?php //echo base_url();?>index.php/apanel/cod/">Cod Amount</a></li>
                <li><a class="nav-link" href="<?php //echo base_url();?>index.php/apanel/coupon/">Coupon</a></li>
               
              </ul>
            </li>
             <li class="dropdown">
              <a href="#" class="nav-link has-dropdown"><i data-feather="shopping-bag"></i><span>Sale</span></a>
              <ul class="dropdown-menu">
               <li><a class="nav-link" href="<?php echo base_url();?>index.php/billController/saleProduct">Sale Product</a></li>
                 <li><a class="nav-link" href="<?php echo base_url();?>index.php/billController/returnProduct">Return Product</a></li>
                <li><a class="nav-link" href="<?php echo base_url();?>index.php/billController/sBillHistory">Sale Bill History</a></li>
              </ul>
            </li>
             <li class="dropdown">
              <a href="#" class="nav-link has-dropdown"><i data-feather="trending-up"></i><span>Expenditure</span></a>
              <ul class="dropdown-menu">
               <li><a class="nav-link" href="<?php echo base_url();?>index.php/billController/createEx">Create Expenditure</a></li>
                 <li><a class="nav-link" href="<?php echo base_url();?>index.php/billController/createSubEx">Create Sub Expenditure</a></li>
              </ul>
            </li>
                         <li class="dropdown">
              <a href="#" class="nav-link has-dropdown"><i data-feather="credit-card"></i><span>Transaction</span></a>
              <ul class="dropdown-menu">
               <li><a class="nav-link" href="<?php echo base_url();?>index.php/daybookController/cashPayment">Cash Payment</a></li>
               <li><a class="nav-link" href="<?php echo base_url();?>index.php/daybookController/dTransaction">Director Transaction</a></li>
               <!--<li><a class="nav-link" href="<?php echo base_url();?>index.php/daybookController/cashPayment">Received From Director</a></li>-->
              
              </ul>
            </li>
             
             <li class="dropdown">
              <a href="#" class="nav-link has-dropdown"><i data-feather="calendar"></i><span>Daybook</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="<?php echo base_url();?>index.php/daybookController/dBookDetail">Daybook Detail</a></li>
               
              </ul>
            </li>
        

          </ul>