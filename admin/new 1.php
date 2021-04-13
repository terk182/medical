<?php error_reporting(0); ?>
<?php include('partials-front/menu.php'); ?>

<div class="dashboard-wrapper">

            <div class="row">
                <section class="text-center">
                        <div class="container">
                            <?php
                                $match_text = "/01A/i";
                                $search = $_POST['search'];
                                
                                if (preg_match($match_text, $search))
                                {
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
                                                    echo '<h2><a>Seriel Number <a href="#">'.$search.'</a></h2>';
                                                    echo '<h2><a>Assy Number <a href="#">'.$assy_no.'</a></h2>';
                                                    
                                            }
                                            else
                                            {
                                                    
                                                echo '<h2>Search <a href="#">'.$search.'</a></h2>';
                                            }
                                                                            

                                }
                                else
                                {
                                    echo '<h2>Search <a href="#">'.$search.'</a></h2>';

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
                                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Tables</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Data Tables</li>
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
                                                <th>Process</th>
                                                <th>code</th>
                                                <th>rev</th>
                                                <th>lot No</th>
                                                <th>procduction Order</th>
                                                <th>WI No</th>
                                                <th>Station</th>
                                                <th>Total Result</th>
                                                <th>Assy Number</th>
                                                <th>Part Assembly</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <tbody>
                                        <?php
                                                        
                                                        $process_str1 = "/process/i";
                                                        $process_str2 = "/inspection/i";
                                                        $assocArr = array();
                                                        $pic_array = array();
                                                        $sql_all = 'SELECT * FROM process';
                                                        $result_all = mysqli_query($conn,$sql_all);
                                                        $count = mysqli_num_rows($result_all);
                                                        $sn = 1;
                                                        if($count>0)
                                                        {
                                                            while($data = mysqli_fetch_array($result_all))
                                                            {
                                                                $process = $data['process_table'];
                                                                if(preg_match($process_str1, $process) OR preg_match($process_str2, $process))
                                                                {
                                                            
                                                               
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
                                                                               
                                                                                $sql_get = "SELECT * FROM $process_name WHERE assy_no = '$search';  ";
                                                                               // echo $sql_get;
                                                                            }
                                                                            else
                                                                            {
                                                                                if(preg_match($process_str1, $process) OR preg_match($process_str2, $process_name))
                                                                                {
                                                                                    if(empty($assy_no))
                                                                                    {
                                                                                        $sql_get = "SELECT * FROM $process_name WHERE assy_no = '$search'; ";
                                                                                    }
                                                                                    else
                                                                                    {
                                                                                        $sql_get = "SELECT * FROM $process_name WHERE assy_no = '$assy_no'; ";
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
                                                                            $result_tac = mysqli_query($conn,$sql_get);
                                                                            
                                                                            if(isset($result_tac) )
                                                                            {
                                                                                while($data = mysqli_fetch_array($result_tac,MYSQLI_ASSOC))
                                                                                {
                                                                                    
                                                                                   
                                                                                    
                                                                                    echo '<tr>';
                                                                                    echo '<td>'.$process_name.'</td>';
                                                                                    echo '<td>'.$code.'</td>';
                                                                                    echo '<td>'.$code_rev.'</td>';
                                                                                    echo '<td>'.$data['lot_no'].'</td>';
                                                                                    echo '<td>'.$data['production_order_no'].'</td>';
                                                                                    echo '<td>'.$data['wi_no'].'</td>';
                                                                                    echo '<td>'.$data['station_id'].'</td>';
                                                                                    echo '<td>'.$data['total_result'].'</td>';
                                                                                    echo '<td>'.$data['assy_no'].'</td>';
                                                                                    echo '<td>';
                                                                                    
                                                                                        for ($x = 1; $x <= 15; $x++) 
                                                                                        {
                                                                                            
                                                                                            $bf =$data['parts_code_'.$x];
                                                                                            
                                                                                            if($bf[0] == "W")
                                                                                            {
                                                                                                
                                                                                            $sql_get_processname = "SELECT process_table,process_type,process_name FROM process WHERE code = '$bf'; ";
                                                                                            $result_cal = mysqli_query($conn,$sql_get_processname);
                                                                                            $count_p = mysqli_num_rows($result_cal);


                                                                                                if($count_p==1)
                                                                                                {
                                                                                                $row_t = mysqli_fetch_assoc($result_cal);
                                                                                                $sub_name = $row_t['process_name'];
                                                                                                $sub_type = $row_t['process_type'];
                                                                                                $sub_table = $row_t['process_table'];

                                                                                                }
                                                                                            }
                                                                                            else
                                                                                            {
                                                                                                
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
                                                                                            $sub_table = $row_t['process_table'];

                                                                                            }
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
                                                                                                            echo '<th>Next Sub</th>';
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
                                                                                                                echo '<a href='.SITEURL.'Sub_process.php?database='.$sub_table.'&PD='.$b_inv.'&lot='.$b_lot.' type="button"'. 'class ="btn btn-info"'.'>Next</a>';
                                                                                                            }
                                                                                                            else
                                                                                                            {  
                                                                                                                $sub_table = "receiving";
                                                                                                                echo '<a href='.SITEURL.'Sub_part.php?database='.$sub_table.'&inv='.$b_inv.'&lot='.$b_lot.' type="button"'. 'class ="btn btn-info"'.'>Next</a>';
                                                                                                            }
                                                                                                            echo '</td>';


                                                                                            }
                                                                                            else
                                                                                            {
                                                                                                
                                                                                                break;
                                                                                            }
                                                                                            
                                                                                        
                                                                                    
                                                                                        
                                                                                        echo'</table>'; 


                                                                                        
                                                                                        }
                                                                                }
                                                                        }
                                                                    }
                                                                          
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
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <div class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                            Copyright © 2018 Concept. All rights reserved. Dashboard by <a href="https://colorlib.com/wp/">Colorlib</a>.
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                            <div class="text-md-right footer-links d-none d-sm-block">
                                <a href="javascript: void(0);">About</a>
                                <a href="javascript: void(0);">Support</a>
                                <a href="javascript: void(0);">Contact Us</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- end footer -->
            <!-- ============================================================== -->
        </div>
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