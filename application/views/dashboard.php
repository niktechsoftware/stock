  <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="row ">
            <div class="col-xl-3 col-lg-6">
              <div class="card l-bg-green-dark">
                <div class="card-statistic-3">
                  <div class="card-icon card-icon-large"><i class="fa fa-award"></i></div>
                  <a href="#">
                      <?php $date = date('Y-m-d');
		$total = $this->daybook->datewiseCollecttion($date);
		?>
                  <div class="card-content text-white">
                    <h4 class="card-title">Debit</h4>
                    <span>
                  <?php 
					echo $total['dabitTotal'];
					?>
                    </span>
                    <div class="progress mt-1 mb-1" data-height="8">
                      <div class="progress-bar l-bg-purple" role="progressbar" data-width="25%" aria-valuenow="25"
                        aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                   
                  </div>
                  </a>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6">
              <div class="card l-bg-cyan-dark">
                <div class="card-statistic-3">
                  <div class="card-icon card-icon-large"><i class="fa fa-briefcase"></i></div>
                  <a href="#">
                  <div class="card-content text-white">
                    <h4 class="card-title"> Credit</h4>
                    <span> 
                    <?php 
                echo $total['creditTotal'];
                    ?>
                    </span>
                    <div class="progress mt-1 mb-1" data-height="8">
                      <div class="progress-bar l-bg-orange" role="progressbar" data-width="25%" aria-valuenow="25"
                        aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                  
                  </div>
                  </a>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6">
              <div class="card l-bg-purple-dark">
                <div class="card-statistic-3">
                  <div class="card-icon card-icon-large"><i class="fa fa-globe"></i></div>
                  <a href="">
                  <div class="card-content text-white">
                    <h4 class="card-title"> Stock Details [Today]</h4>
                    <span>
                    <?php $sub=$this->db->get("stock_products");
                    $i=1;
                           $sellingprice=0;
                            $ppprice=0;
                           foreach($sub->result() as $row):
                              $ppprice+= $row->product_price*$row->quantity; 
                              $sellingprice+= $row->selling_price*$row->quantity;
                              
                              endforeach;?>
                    </span>PP=<?php echo $ppprice;?> &nbsp;&nbsp; &nbsp;    SP=<?php echo $sellingprice;?>
                    <div class="progress mt-1 mb-1" data-height="8">
                      <div class="progress-bar 0-bg-cyan" role="progressbar" data-width="25%" aria-valuenow="25"
                        aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                   
                  </div>
                  </a>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6">
              <div class="card l-bg-orange-dark">
                <div class="card-statistic-3">
                  <div class="card-icon card-icon-large"><i class="fa fa-money-bill-alt"></i></div>
                  <a href="#">
                  <div class="card-content text-white">
                    <h4 class="card-title">Today's Profit</h4>
                  
                    <div class="row">
                    <div class="col-md-6">
                    <span>
                    <?php 
                    $cdate=date("Y-m-d");
                    $query=$this->db->query("select distinct (sale_product.item_id) as product from sale_product join sale_info on sale_product.bill_no_id = sale_info.id where DATE(sale_info.date)='$cdate'");
                   $profitc=0;
                   foreach($query->result() as $query):
                       $q1=$this->db->query("select sum(sale_product.item_quantity) as qua from sale_product join sale_info on sale_product.bill_no_id = sale_info.id where DATE(sale_info.date)='$cdate' and sale_product.item_id='$query->product'")->row();
                       $q2=$this->db->query("select sum(product_price) as pp , sum(selling_price) as sp from stock_products where id='$query->product'")->row();
                       //echo $q1->price."</br>";
                       //echo $q1->qua."</br>";
                       //echo $q2->pp;
                       $pq=$q2->pp*$q1->qua;
                       //echo $query->product."-".$q1->price."-".$q1->qua."-".$pq."</br>";
                       $profitc+=$q2->sp*$q1->qua-$pq;
                       
                       endforeach;
                       echo $profitc;
                    ?>
                    </span>
                    </div>
                    <div class="col-md-6">
                    <span>
                   </span>
                    </div>
                    </div>
                    <div class="progress mt-1 mb-1" data-height="8">
                      <div class="progress-bar l-bg-green" role="progressbar" data-width="25%" aria-valuenow="25"
                        aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    
                  </div>
                  </a>
                </div>
              </div>
            </div>
          </div>
         <div class="row ">
            <div class="col-xl-3 col-lg-6">
              <div class="card l-bg-green-dark">
                <div class="card-statistic-3">
                  <div class="card-icon card-icon-large"><i class="fa fa-award"></i></div>
                  <a href="#">
                  <div class="card-content text-white">
                    <h4 class="card-title">Opening Balance</h4>
                    <span>
                  <?php echo $openingBalance; ?>
                    </span>
                    <div class="progress mt-1 mb-1" data-height="8">
                      <div class="progress-bar l-bg-purple" role="progressbar" data-width="25%" aria-valuenow="25"
                        aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                   
                  </div>
                  </a>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6">
              <div class="card l-bg-cyan-dark">
                <div class="card-statistic-3">
                  <div class="card-icon card-icon-large"><i class="fa fa-briefcase"></i></div>
                  <a href="#">
                  <div class="card-content text-white">
                    <h4 class="card-title">Closing Balance</h4>
                    <span> 
                    
                     <?php echo $closingBalance; ?>
                    </span>
                    <div class="progress mt-1 mb-1" data-height="8">
                      <div class="progress-bar l-bg-orange" role="progressbar" data-width="25%" aria-valuenow="25"
                        aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                  
                  </div>
                  </a>
                </div>
              </div>
            </div>
             <div class="col-xl-3 col-lg-6">
              <div class="card l-bg-purple-dark">
                <div class="card-statistic-3">
                  <div class="card-icon card-icon-large"><i class="fa fa-globe"></i></div>
                  <a href="">
                  <div class="card-content text-white">
                    <h4 class="card-title">Todays Sale </h4>
                    <span>
                    <?php  $pr=$closingBalance-$openingBalance; 
                   echo $total['creditTotal'];
                    ?>
                    </span>
                    <div class="progress mt-1 mb-1" data-height="8">
                      <div class="progress-bar 0-bg-cyan" role="progressbar" data-width="25%" aria-valuenow="25"
                        aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                   
                  </div>
                  </a>
                </div>
              </div>
            </div>
             <div class="col-xl-3 col-lg-6">
              <div class="card l-bg-orange-dark">
                <div class="card-statistic-3">
                  <div class="card-icon card-icon-large"><i class="fa fa-money-bill-alt"></i></div>
                  <a href="#">
                  <div class="card-content text-white">
                    <h4 class="card-title">Total Profit</h4>
                    <div class="row">
                    <div class="col-md-6">
                    <span>
                   <?php $query=$this->db->query("select distinct (item_id) as product from sale_product");
                   $profit=0;
                   foreach($query->result() as $query):
                       $q1=$this->db->query("select sum(item_quantity) as qua from sale_product where item_id='$query->product'")->row();
                       $q2=$this->db->query("select sum(product_price) as pp , sum(selling_price) as sp from stock_products where id='$query->product'")->row();
                       //echo $q1->price."</br>";
                       //echo $q1->qua."</br>";
                       //echo $q2->pp;
                       $pq=$q2->pp*$q1->qua;
                       //echo $query->product."-".$q1->price."-".$q1->qua."-".$pq."</br>";
                       $profit+=$q2->sp*$q1->qua-$pq;
                       
                       endforeach;
                    ?>
                    <?php echo $profit; ?>
                    </span>
                    </div>
                    <div class="col-md-6">
                    <span>
                   </span>
                    </div>
                    </div>
                    <div class="progress mt-1 mb-1" data-height="8">
                      <div class="progress-bar l-bg-green" role="progressbar" data-width="25%" aria-valuenow="25"
                        aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    
                  </div>
                  </a>
                </div>
              </div>
            </div>
           </div>
          <div class="row">
            <div class="col-12 col-sm-12 col-lg-6">
              <div class="card">
                <div class="card-header">
                  <h4>Revenue</h4>
                </div>
                <div class="card-body">
                  <div id="echart_graph_line" class="chartsh"></div>
                </div>
              </div>
            </div>
            <div class="col-12 col-sm-12 col-lg-6">
              <div class="card">
                <div class="card-header">
                  <h4>Revenue</h4>
                </div>
                <div class="card-body">
                  <div class="summary">
                    <div class="summary-chart active" data-tab-group="summary-tab" id="summary-chart">
                      <div id="echart_area_line" class="chartsh"></div>
                    </div>
                    <div data-tab-group="summary-tab" id="summary-text">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          
      
        </section>
        <div class="settingSidebar">
          <a href="javascript:void(0)" class="settingPanelToggle"> <i class="fa fa-spin fa-cog"></i>
          </a>
          <div class="settingSidebar-body ps-container ps-theme-default">
            <div class=" fade show active">
              <div class="setting-panel-header">Setting Panel
              </div>
              <div class="p-15 border-bottom">
                <h6 class="font-medium m-b-10">Select Layout</h6>
                <div class="selectgroup layout-color w-50">
                  <label class="selectgroup-item">
                    <input type="radio" name="value" value="1" class="selectgroup-input select-layout" checked>
                    <span class="selectgroup-button">Light</span>
                  </label>
                  <label class="selectgroup-item">
                    <input type="radio" name="value" value="2" class="selectgroup-input select-layout">
                    <span class="selectgroup-button">Dark</span>
                  </label>
                </div>
              </div>
              <div class="p-15 border-bottom">
                <h6 class="font-medium m-b-10">Sidebar Color</h6>
                <div class="selectgroup selectgroup-pills sidebar-color">
                  <label class="selectgroup-item">
                    <input type="radio" name="icon-input" value="1" class="selectgroup-input select-sidebar">
                    <span class="selectgroup-button selectgroup-button-icon" data-toggle="tooltip"
                      data-original-title="Light Sidebar"><i class="fas fa-sun"></i></span>
                  </label>
                  <label class="selectgroup-item">
                    <input type="radio" name="icon-input" value="2" class="selectgroup-input select-sidebar" checked>
                    <span class="selectgroup-button selectgroup-button-icon" data-toggle="tooltip"
                      data-original-title="Dark Sidebar"><i class="fas fa-moon"></i></span>
                  </label>
                </div>
              </div>
              <div class="p-15 border-bottom">
                <h6 class="font-medium m-b-10">Color Theme</h6>
                <div class="theme-setting-options">
                  <ul class="choose-theme list-unstyled mb-0">
                    <li title="white" class="active">
                      <div class="white"></div>
                    </li>
                    <li title="cyan">
                      <div class="cyan"></div>
                    </li>
                    <li title="black">
                      <div class="black"></div>
                    </li>
                    <li title="purple">
                      <div class="purple"></div>
                    </li>
                    <li title="orange">
                      <div class="orange"></div>
                    </li>
                    <li title="green">
                      <div class="green"></div>
                    </li>
                    <li title="red">
                      <div class="red"></div>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="p-15 border-bottom">
                <div class="theme-setting-options">
                  <label>
                    <span class="control-label p-r-20">Mini Sidebar</span>
                    <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input"
                      id="mini_sidebar_setting">
                    <span class="custom-switch-indicator"></span>
                  </label>
                </div>
              </div>
              <div class="p-15 border-bottom">
                <div class="theme-setting-options">
                  <div class="disk-server-setting m-b-20">
                    <p>Disk Space</p>
                    <div class="sidebar-progress">
                      <div class="progress" data-height="5">
                        <div class="progress-bar l-bg-green" role="progressbar" data-width="80%" aria-valuenow="80"
                          aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                      <span class="progress-description">
                        <small>26% remaining</small>
                      </span>
                    </div>
                  </div>
                  <div class="disk-server-setting">
                    <p>Server Load</p>
                    <div class="sidebar-progress">
                      <div class="progress" data-height="5">
                        <div class="progress-bar l-bg-orange" role="progressbar" data-width="58%" aria-valuenow="25"
                          aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                      <span class="progress-description">
                        <small>Highly Loaded</small>
                      </span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="mt-4 mb-4 p-3 align-center rt-sidebar-last-ele">
                <a href="#" class="btn btn-icon icon-left btn-primary btn-restore-theme">
                  <i class="fas fa-undo"></i> Restore Default
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
     