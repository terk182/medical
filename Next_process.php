<?php error_reporting(0); ?>
<?php include('partials-front/menu.php'); ?>


<div class="dashboard-wrapper">

            <div class="row">
                <section class="text-center">
                        <div class="container">
                            <?php
                                 $get_database = $_GET['database'];
                                 $get_pd = $_GET['PD'];
                                 $get_lot= $_GET['lot'];
                                 $get_main = $_GET['main'];
                                 $get_search = $_GET['search'];
                                 $get_Station = $_GET['Station'];  
                                 $get_result = $_GET['result'];   
                                 $get_WI = $_GET['WI'];
                                 $get_WINO  = $_GET['WV'];   
                                 $get_Station_id  = $_GET['SN']; 
                                 $get_DC = $_GET['DC'];  
                                 $get_assy = $_GET['AS'];  
                                 $get_type = $_GET['TY']; 
                                 $get_code = $_GET['CODE'];   //CODEV  
                                 $get_code_v = $_GET['CODEV'];  
                                 $date_now = date("d-M-Y");


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
                                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link"><?php echo $get_main; ?></a></li>
                                        <li class="breadcrumb-item active" aria-current="page"><?php echo $get_database; ?></li>
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
                                        

                                        <!--  ตรวจสอบ ค่าตรงนี้---------->
                                        <?php
                                                $db_select = mysqli_select_db($conn,'npt-baxter-lvp') ; 
                                                $sql_get = "SELECT * FROM $get_database WHERE production_order_no = '$get_pd' AND lot_no = '$get_lot';  ";   
                                                $result_tac = mysqli_query($conn,$sql_get);  
                                                if(isset($result_tac) )
                                                {
                                                    $row_topic = mysqli_fetch_assoc($result_tac);
                                                    {
                                                        
                                                        echo '<tr>';

//----------------------------------------------------------tablr1-------------------

                                                        echo '<td>'; 


                                                        echo '<table>';
                                                        echo '<thead>';
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
                                                                echo '<td>'.$get_database.'</td>';
                                                                echo '<td>'.$get_code.'</td>';
                                                                echo '<td>'.$get_code_v.'</td>';
                                                                echo '<td>'.$row_topic['lot_no'].'</td>';
                                                                echo '<td>'.$row_topic['production_order_no'].'</td>'; 
                                                                echo '<td>'.$row_topic['wi_no'].'</td>';  
                                                                echo '<td>'.$row_topic['station_id'].'</td>'; 
                                                                echo '<td>'.$row_topic['total_result'].'</td>'; 
                                                                echo '<td>'.$row_topic['assy_no'].'</td>'; 
                                                                echo '<td>';
                                                                echo '<a href='.SITEURL.'Sub_process.php?database='.$get_database.'&PD='.$get_pd.'&lot='.$get_lot.'&main='.$get_main.'&search='.$get_search.'&Station='.$get_Station.'&result='.$$get_result.'&WI='.$get_WI.'&WV='.$get_WINO.'&DC='.$get_DC.'&SN='.$get_Station.'&AS='.$get_assy.'&TY=SUB'.'&'.'type="button" class ="btn btn-info">Detail</a>';
                                                                echo '</td>';
                                                            echo '</tr>';
                                                        echo '</tbody>';
                                                        echo '</table>';
                                                        echo '</td>';
                                                        echo '<td>'; 
  //-----------------------------------------------------------------------------------------                                                     
                                                        for ($x = 1; $x <= 15; $x++) 
                                                        {
                                                            
                                                            $bf =$row_topic['parts_code_'.$x];
                                                           
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
                                                                                                                                                                                    // $sub_name = $row_t['process_name'];
                                                                                                
                                                                    $sub_WI = $row_t['wi_no'];
                                                                    $sub_WV = $row_t['wi_revision'];
                                                                    $sub_dc = $row_t['station_daily_check_id'];
                                                                    $sub_assy = $row_t['assy_no'];
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


                                                             if($count_p==1)
                                                            {
                                                                $row_t = mysqli_fetch_assoc($result_cal);
                                                                $sub_name = $row_t['process_name'];
                                                                $sub_type = $row_t['process_type'];
                                                                $sub_WI = $row_t['wi_no'];
                                                                $sub_WV = $row_t['wi_revision'];
                                                                $sub_dc = $row_t['station_daily_check_id'];

                                                            }
                                                            $b_rev =$row_topic['rev_parts_code_'.$x];
                                                            $b_lot =$row_topic['parts_lot_'.$x];
                                                            $b_inv =$row_topic['process_invoice_'.$x];
                                                            $b_result =$row_topic['check_result_'.$x];
                                                            
                                                            echo '<table>';
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
                                                                    echo '<a href='.SITEURL.'Next_process.php?database='.$sub_table.'&PD='.$b_inv.'&lot='.$b_lot.'&main='.$process_name.'&search='.$search.'&Station='.$station_n.'&result='.$b_result.'&WI='.$sub_WI.'&WV='.$sub_WV.'&DC='.$sub_dc.'&SN='.$station_name.'&AS='.$assy_get.'&TY=SUB'.'&'.' type="button" class ="btn btn-primary">Next Process</a>';
                                                                    echo '</td>'; 
                                                                }
                                                                else
                                                                {  
                                                                    $sub_table = "receiving";
                                                                    echo '<a href='.SITEURL.'Sub_part.php?part='.$bf.'&inv='.$b_inv.'&lot='.$b_lot.'&rev='.$b_rev.'&search='.$search.'&MN='.$get_database.'&'. 'type="button" class ="btn btn-info">Detail</a>';
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
                                                        
                                                   
                                        ?>
                                       
                                           <!-- ============================================================== --> 
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