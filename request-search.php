<?php
error_reporting(0); //E_ALL
?>


<?php include('partials-front/menu.php'); ?>


<div class="dashboard-wrapper">
    
            <div class="row">
            
                <section class="text-center">
                        <div class="container">
                        
                            <?php
                                
                                $match_text = "/01A/i";
                                if(!isset($_SESSION['search']))
                                {
                                $search = $_POST['search'];
                                }
                                else
                                {
                                    $search = $_SESSION['search'];
                                }


                                if(!isset($_SESSION['model']))
                                {
                                  unset($_SESSION['model']);
                                  $_SESSION['model'] = "model1";
                                }
                                else
                                {
                                  $_SESSION['model'] = "model1";
                                }






                                
                                if (preg_match($match_text, $search))
                                {
                                            $db_select = mysqli_select_db($conn,'npt-baxter-lvp') ; 
                                            $sql_SER = "SELECT assy_no FROM product WHERE serial_no = '$search' LIMIT 1; ";
                                            $result_all = mysqli_query($conn,$sql_SER);
                                            $count = mysqli_num_rows($result_all);
                                            if($count==1)
                                            {
                                                    $row = mysqli_fetch_assoc($result_all);
                                                    $assy_no = $row['assy_no'];
                                                    echo '<br>';
                                                    echo '<br>';
                                                    echo '<br>';
                                                    echo '<div>';
                                                    echo '<h2><a> &emsp; Seriel Number <a href="#">'.$search.'</a></h2>';
                                                    echo '<h2><a>Assy Number <a href="#">'.$assy_no.'</a></h2>';
                                                    $_SESSION['search'] = $search ;
                                                    $_SESSION['assy_no'] = $assy_no ;
                                                    echo '</div>';
                                                    
                                            }
                                            else
                                            {
                                                echo '<br>';
                                                echo '<br>';
                                                echo '<br>';   
                                                echo '<div>'; 
                                                echo '<h2>&emsp;Search <a href="#">'.$search.'</a></h2>';
                                                echo '</div>';
                                                $_SESSION['search'] = $search ;
                                            }
                                                                            

                                }
                                else
                                {
                                    echo '<br>';
                                    echo '<br>';
                                    echo '<br>'; 
                                    echo '<div>'; 
                                    echo '<h2>&emsp;Search <a href="#">'.$search.'</a></h2>';
                                    echo '</div>';
                                    $_SESSION['search'] = $search ;

                                }
                            ?>
                            
                           
                           
                                
                            

                        </div>
                </section>
                </div>
            <div class="container-fluid  dashboard-content">
                <!-- ============================================================== -->
                <!-- pageheader -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="page-header">
                            <h2 class="pageheader-title">Data Table</h2>
                            <p class="pageheader-text">Proin placerat ante duiullam scelerisque a velit ac porta, fusce sit amet vestibulum mi. Morbi lobortis pulvinar quam.</p>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="index.php" class="breadcrumb-link">search</a></li>
                                        <li class="breadcrumb-item"><a href="Traceability.php" class="breadcrumb-link">search</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Traceability</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- end pageheader -->
                <!-- ============================================================== -->
                <div class="row">
                    <!-- ============================================================== -->
                    <!-- basic table  -->
                    <!-- ============================================================== -->
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <h5 class="card-header">Basic Table</h5>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered first">
                                    <thead class="table-light">
                                        <tr>
                                                <th>Main Process</th>
                                                <th>Sub Process Assembly</th>
                                        
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <tbody>
                                        <?php
                                                        
                                                        $process_str1 = "/process/i";
                                                        $process_str2 = "/inspection/i";
                                                        $assocArr = array();
                                                        $pic_array = array();
                                                        $db_select = mysqli_select_db($conn,'npt-baxter-lvp') ; 
                                                        $sql_all = "SELECT * FROM `npt-baxter-lvp`.`process`ORDER BY id DESC;";//DESC
                                                        $result_all = mysqli_query($conn,$sql_all);
                                                        $count = mysqli_num_rows($result_all);
                                                    
                                                        $sn = 0;
                                                        if($count>0)
                                                        {
                                                            while($data = mysqli_fetch_array($result_all,MYSQLI_ASSOC))
                                                            {
                                                                $process = $data['process_table'];
                                                                if(preg_match($process_str1, $process) OR !preg_match($process_str2, $process))
                                                                {
                                                                    
                                                                    $process_n = $data['process_name'];
                                                                    $process_name = $data['process_table'];
                                                                    $process_type = $data['process_type'];
                                                                    $code = $data['code'];
                                                                    $code_rev = $data['code_rev'];
                                                                    $wi_no = $data['wi_no'];
                                                                    $record_revision = $data['record_revision'];
                                                                    $process_id = $data['id'];
                                                            
                                                                    $pattern_str_mn = "/process_lvp_carton/i";
                                                                    $process_str1 = "/process/i";
                                                                    $process_str2 = "/inspection/i";
                                                                    
                                                                    if($process_type == "MAIN")
                                                                    {
                                                                            if(preg_match($pattern_str_mn, $process_name))
                                                                            {
                                                                               
                                                                                $sql_get = "SELECT * FROM `npt-baxter-lvp`.`$process_name` WHERE assy_no = '$search';  ";
                                                                               // echo $sql_get;
                                                                            }
                                                                            else
                                                                            {
                                                                                if(preg_match($process_str1, $process_name) OR preg_match($process_str2, $process_name))
                                                                                {
                                                                                    if(empty($assy_no))
                                                                                    {
                                                                                        $sql_get = "SELECT * FROM `npt-baxter-lvp`.`$process_name` WHERE assy_no = '$search'; ";
                                                                                    }
                                                                                    else
                                                                                    {
                                                                                        $sql_get = "SELECT * FROM `npt-baxter-lvp`.`$process_name` WHERE assy_no = '$assy_no'; ";
                                                                                    }
                                                                               // echo $sql_get;
                                                                                }
                                                                                else
                                                                                {
                                                                                    $sql_get = "";
                                                                                }

                                                                            }

                                                                            if(!empty($sql_get))
                                                                            {
                                                                               // echo $sql_get;
                                                                            $result_tac = mysqli_query($conn,$sql_get);
                                                                            if($result_tac === FALSE)
                                                                            {
                                                                                
                                                                            }
                                                                            else
                                                                            {
                                                                            if(isset($result_tac) )
                                                                            {
                                                                                while($data = mysqli_fetch_array($result_tac,MYSQLI_ASSOC))
                                                                                {
                                                                                    
                                                                                   
                                                                                    
                                                                                    echo '<tr>';
                                                                                    echo '<td>';
                                                                                    echo '<table >';
                                                                                    echo '<thead class="table-success">';
                                                                                    echo '<tr>';
                                                                                    echo '<th>Process Name</th>';
                                                                                    echo '<th>code</th>';
                                                                                    echo '<th>Rev</th>';
                                                                                    echo '<th>Lot No</th>';
                                                                                    echo '<th>Production Order</th>';
                                                                                    echo '<th>Wi No</th>';
                                                                                    echo '<th>Station id</th>';
                                                                                    echo '<th>Result</th>';
                                                                                    echo '<th>Assy Number</th>';
                                                                                    echo '<th>Delail</th>';
                                                                                    echo '</tr>';
                                                                                    echo '</thead>';







                                                                                    echo '<tbody>';
                                                                                    echo '<tr>';
                                                                                    echo '<td>'.$process_name.'</td>';
                                                                                    echo '<td>'.$code.'</td>';
                                                                                    echo '<td>'.$code_rev.'</td>';
                                                                                    echo '<td>'.$data['lot_no'].'</td>';
                                                                                    echo '<td>'.$data['production_order_no'].'</td>';  

                                                                                    $dc = $data['station_daily_check_id'];
                                                                                    $wi_rev = $data['wi_revision'];
                                                                                    $wi_no = $data['wi_no'];
                                                                                    echo '<td>'.$wi_no.'</td>';



                                                                                    $station_name =$data['station_id'];
                                                                                    $db_select = mysqli_select_db($conn,'npt-baxter-lvp') ; 
                                                                                    $sql_station = "SELECT station_name FROM station WHERE id = '$station_name'; ";
                                                                                    $result_station = mysqli_query($conn,$sql_station);
                                                                                    $count_station = mysqli_num_rows($result_station);


                                                                                        if($count_station==1)
                                                                                        {
                                                                                        $row_station = mysqli_fetch_assoc($result_station);
                                                                                        $station_n = $row_station['station_name'];
                                                                                        echo '<td>'.$station_n.'</td>';

                                                                                        }
                                                
                                                                                        else
                                                                                        {
                                                                                            echo '<td>'.$data['station_id'].'</td>';
                                                                                        }


                                                                                    $result_m = $data['total_result'];
                                                                                    echo '<td>'.$result_m.'</td>';
                                                                                    $assy_get = $data['assy_no'];
                                                                                    echo '<td>'.$assy_get.'</td>';
                                                                                    echo '<td>';
                                                                                    echo '<a href='.SITEURL.'Sub_process.php?database='.$process.'&PD='.$data['production_order_no'].'&lot='.$data['lot_no'].'&main='.$process_name.'&search='.$search.'&Station='.$station_n.'&result='.$result_m.'&WI='.$wi_no.'&WV='.$wi_rev.'&DC='.$dc.'&SN='.$station_name.'&AS='.$assy_get.'&TY=MN'.'&'.'type="button" class ="btn btn-info">Detail</a>';
                                                                                    echo '</td>';
                                                                                    echo '<tr>';
                                                                                    echo '</tbody>';
                                                                                    echo '</table>';
                                                                                    echo '<td>';
                                                                                    
                                                                                    
                                                                                    for ($x = 1; $x <= 15; $x++) 
                                                                                      {
                                                                                        
                                                                                        $bf =$data['parts_code_'.$x];
                                                                                        if(!empty($bf))
                                                                                        {
                                                                                        if($bf[0] == "W")
                                                                                        {
                                                                                            $db_select = mysqli_select_db($conn,'npt-baxter-lvp') ;  
                                                                                        $sql_get_processname = "SELECT * FROM process WHERE code = '$bf'; ";
                                                                                        
                                                                                        $result_cal = mysqli_query($conn,$sql_get_processname);
                                                                                        $count_p = mysqli_num_rows($result_cal);


                                                                                            if($count_p==1)
                                                                                            {
                                                                                            $row_t = mysqli_fetch_assoc($result_cal);
                                                                                            $sub_name = $row_t['process_name'];
                                                                                            $sub_type = $row_t['process_type'];
                                                                                            $sub_table = $row_t['process_table'];
                                                                                            $sub_code = $row_t['code'];
                                                                                            $sub_code_rev = $row_t['code_rev'];
                                                                                                                                                                                  // $sub_name = $row_t['process_name'];
                                                                                            
                                                                                             $sub_WI = $row_t['wi_no'];
                                                                                             $sub_WV = $row_t['wi_revision'];
                                                                                             $sub_dc = $row_t['wi_revision'];
                                                                                             $sub_assy = $row_t['wi_revision'];
 

                                                                                            }
                                                                                        }
                                                                                        else
                                                                                        {
                                                                                            $db_select = mysqli_select_db($conn,'npt') ; 
                                                                                            $sql_get_processname = "SELECT Item_name ,vendor_code ,Dept FROM `npt`.`receiving` WHERE Item_number = '$bf'; ";   
                                                                                            $result_cal = mysqli_query($conn,$sql_get_processname);
                                                                                            $count_p = mysqli_num_rows($result_cal);
    
    
                                                                                                if($count_p>0)
                                                                                                {
                                                                                                $row_t = mysqli_fetch_assoc($result_cal);
                                                                                                $sub_name = $row_t['Item_name'];
                                                                                                $sub_type = $row_t['vendor_code'];
                                                                                                $sub_table = $row_t['Dept'];
    
                                                                                                }
                                                                                            

                                                                                        }
                                                                                        $result_cal = mysqli_query($conn,$sql_get_processname);
                                                                                        $count_p = mysqli_num_rows($result_cal);


                                                                                       // if($count_p==1)
                                                                                       // {
                                                                                       // $row_t = mysqli_fetch_assoc($result_cal);
                                                                                       // $sub_name = $row_t['process_name'];
                                                                                       // $sub_type = $row_t['process_type'];
                                                                                       // $sub_WI = $row_t['wi_no'];
                                                                                       // $sub_WV = $row_t['wi_revision'];
                                                                                      //  $sub_dc = $row_t['station_daily_check_id'];

                                                                                       // }
                                                                                        $b_rev =$data['rev_parts_code_'.$x];
                                                                                        $b_lot =$data['parts_lot_'.$x];
                                                                                        $b_inv =$data['process_invoice_'.$x];
                                                                                        $b_result =$data['check_result_'.$x];
                                                                                        echo '<table class="table table-striped table-bordered first">';
                                                                                        if((!empty($bf)) AND (!empty($b_lot)))
                                                                                        {
                                                                                            echo '<thead class="table-primary">';
                                                                                            echo '<tr>';
                                                                                            if($bf[0] == "W")
                                                                                            {
                                                                                            echo '<th>Process Name</th>';
                                                                                            echo '<th>Code</th>';
                                                                                            echo '<th>Rev</th>';
                                                                                            echo '<th>Lot</th>';
                                                                                            echo '<th>Production Order</th>';
                                                                                            echo '<th>Result</th>';
                                                                                            echo '<th>Detail</th>';
                                                                                            echo '<th>Next Process</th>';
                                                                                            }
                                                                                            else
                                                                                            {
                                                                                            echo '<th>Part Name</th>';
                                                                                            echo '<th>Code</th>';
                                                                                            echo '<th>Rev</th>';
                                                                                            echo '<th>Lot</th>';
                                                                                            echo '<th>Invoice</th>';
                                                                                            echo '<th>Result</th>';
                                                                                            echo '<th>Next Part</th>';
                                                                                            }
                                                                                            echo '</tr>';
                                                                                            echo '</thead>'; 
                                                                                            if($bf[0] == "W")
                                                                                            {
                                                                                               echo '<tbody class="table-info">';
                                                                                            }
                                                                                            else
                                                                                            {
                                                                                                echo '<tbody class="table-warning">'; 
                                                                                            }
                                                                                            echo '<tr>';
                                                                                            echo '<td>'.$sub_name.'</td>';
                                                                                            echo '<td>'.$bf.'</td>';
                                                                                            echo '<td>'.$b_rev.'</td>';
                                                                                            echo '<td>'.$b_lot.'</td>';
                                                                                            echo '<td>'.$b_inv.'</td>';
                                                                                            echo '<td>'.$b_result.'</td>';
                                                                                            echo '<td>'; 
                                                                                            if($bf[0] == "W")
                                                                                            {
                                                                                                echo '<a href='.SITEURL.'Sub_process.php?database='.$sub_table.'&PD='.$b_inv.'&lot='.$b_lot.'&main='.$process_name.'&search='.$search.'&Station='.$station_n.'&result='.$b_result.'&WI='.$sub_WI.'&WV='.$sub_WV.'&DC='.$sub_dc.'&SN='.$station_name.'&AS='.$assy_get.'&TY=SUB'.'&'.' type="button" class ="btn btn-info">Detail</a>';
                                                                                                echo '<td>'; 
                                                                                                echo '<a href='.SITEURL.'Next_process.php?database='.$sub_table.'&PD='.$b_inv.'&lot='.$b_lot.'&main='.$process_name.'&search='.$search.'&Station='.$station_n.'&result='.$b_result.'&WI='.$sub_WI.'&WV='.$sub_WV.'&DC='.$sub_dc.'&SN='.$station_name.'&AS='.$assy_get.'&TY=SUB'.'&CODE='.$sub_code.'&CODEV='.$sub_code_rev.'&'.' type="button" class ="btn btn-primary">Next Process</a>';
                                                                                                echo '</td>'; 
                                                                                            }
                                                                                            else
                                                                                            {  
                                                                                                $sub_table = "receiving";
                                                                                                echo '<a href='.SITEURL.'Sub_part.php?part='.$bf.'&inv='.$b_inv.'&lot='.$b_lot.'&rev='.$b_rev.'&search='.$search.'&MN='.$process.' type="button"'. 'class ="btn btn-info"'.'>Detail</a>';
                                                                                            }
                                                                                            echo '</td>';



                                                                                            echo '<tr></table>';  
                                                                                            echo '<br>';
                                                                                        }
                                                                                        else
                                                                                        {
                                                                                            echo '</td></table>'; 
                                                                                            break;
                                                                                        }
                                                                                            
                                                                                      }
                                                                                    
                                                                                    } 

                                                                                }
                                                                                      
                                                                                }
                                                                            }
                                                                        }
                                                                            
                                                                           
                                                                          

                                                                        
                                                                            //if($count>0)
                                                                            //{
                                                                            //echo json_encode($result_tac);
                                                                           // }

                                                                    

                                                                    }




                                                                
                                                                }
                                                            }
                                                        }
                                                        else
                                                        {
                                                                
                                    
                                                                
                                                        }

                                               

                                        ?>
                                            
                                        </tbody>
                                        
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ============================================================== -->
                    <!-- end basic table  -->
                    <!-- ============================================================== -->
               
                
                
               
                </div>
            </div>
            </div> 
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
          
            <!-- ============================================================== -->
            <!-- end footer -->
            <!-- ============================================================== -->
        
    </div>


    <script src="assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
    <script src="assets/vendor/slimscroll/jquery.slimscroll.js"></script>
    <script src="assets/vendor/multi-select/js/jquery.multi-select.js"></script>
    <script src="assets/libs/js/main-js.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="assets/vendor/datatables/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
    <script src="assets/vendor/datatables/js/buttons.bootstrap4.min.js"></script>
    <script src="assets/vendor/datatables/js/data-table.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.colVis.min.js"></script>
    <script src="https://cdn.datatables.net/rowgroup/1.0.4/js/dataTables.rowGroup.min.js"></script>
    <script src="https://cdn.datatables.net/select/1.2.7/js/dataTables.select.min.js"></script>
    <script src="https://cdn.datatables.net/fixedheader/3.1.5/js/dataTables.fixedHeader.min.js"></script>
    
</body>
 
</html>