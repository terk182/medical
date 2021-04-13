<?php include('partials-front/menu.php'); ?>
        <!-- ============================================================== -->
        <!-- wrapper  -->
        <!-- ============================================================== -->


<?php
$create_date = date('d-M-Y');
$date_now = date("'Y-m-d'");
$Mn = date("'m/Y'");
$Md = date("'Y-m%'");
$count = 0;
$Total = 0;
$Total_actual = 0;

?>
        <div class="dashboard-wrapper">
            <div class="dashboard-ecommerce">
                <div class="container-fluid dashboard-content ">
                    <!-- ============================================================== -->
                    <!-- pageheader  -->
                    <!-- ============================================================== -->
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="page-header">
                                <h2 class="pageheader-title">LVP process assembly Dashboard </h2>
                                <p class="pageheader-text">namiki</p>
                                <div class="page-breadcrumb">
                                
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="product_assembly.php" class="breadcrumb-link">Dashboard</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">Assembly Detail in <?php echo $date_now ?> </li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ============================================================== -->
                    <!-- end pageheader  -->
                    <!-- ============================================================== -->
                    <div class="ecommerce-widget">

                        <div class="row">
                            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="text-muted">ACC. Total Carton box</h5>
                                            <?php
                                                $pattern_str1 = "/process_lvp_carton/i";
                                                $sql = 'SELECT * FROM process';
                                                $db_select = mysqli_select_db($conn,'npt-baxter-lvp') ; 
                                                $result = mysqli_query($conn,$sql);
                                                while($data = mysqli_fetch_array($result))
                                                {
                                                    $process = $data['process_table'];
                                                    if(preg_match($pattern_str1, $process))
                                                    {
                                                        
                                                        $sql2 = "SELECT * FROM $process";
                                                        $result1 = mysqli_query($conn,$sql2);
                                                        if($result1)
                                                            {
                                                            $count = mysqli_num_rows($result1);
                                                            $Total = $Total + $count;
                                                    
                                                            }
                                                        else
                                                        {
                                                            $Total = 0;
                                                        }
                                                    }
                                                    
                                                }


                                            ?>
                                        <div class="metric-value d-inline-block">
                                            <h1 class="mb-1"><?php echo $Total; ?></h1>
                                        </div>
                                        <div class="metric-label d-inline-block float-right text-success font-weight-bold">
                                            
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="text-muted">Today finish good Pump</h5>
                                        <div class="metric-value d-inline-block">
                                            <?php
                                                 $sql2 = "SELECT * FROM process_lvp_finish_goods_appearance_2 WHERE create_date = $date_now";
                                                 $result_finish_goods2 = mysqli_query($conn,$sql2);
                                                 if($result_finish_goods2)
                                                     {
                                                     $count_fg2 = mysqli_num_rows($result_finish_goods2);
                                                     
                                             
                                                     }
                                                 else
                                                 {
                                                    $count_fg2 = 0;
                                                 }


                                            ?>
                                            <h1 class="mb-1"><?php echo $count_fg2; ?></h1>
                                        </div>
                                        <div class="metric-label d-inline-block float-right text-success font-weight-bold">
                                           
                                        </div>
                                    </div>
                                   
                                </div>
                            </div>
                            
                            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="text-muted">This month's plan</h5>
                                        <div class="metric-value d-inline-block">
                                        <?php
                                                $sql_plan = "SELECT * FROM procduction_plan WHERE Date = $Mn ";
                                                $result_plan = mysqli_query($conn,$sql_plan);
                                                while($data_plan  = mysqli_fetch_array($result_plan))
                                                {
                                                    $process_plan = $data_plan['lvp'];
                                                    
                                                }


                                            ?>
                                            <h1 class="mb-1"><?php echo $process_plan; ?></h1>
                                        </div>
                                    
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="text-muted">actual month</h5>
                                        <div class="metric-value d-inline-block">
                                        <?php
                                                $pattern_str_mn = "/process_lvp_carton/i";
                                                $sql_actual = 'SELECT * FROM process';
                                                $result_actual = mysqli_query($conn,$sql_actual);
                                                while($data_actual = mysqli_fetch_array($result_actual))
                                                {
                                                    $process_actual = $data_actual['process_table'];
                                                    if(preg_match($pattern_str_mn, $process_actual))
                                                    {
                                                        
                                                        $sql2_actual = "SELECT * FROM $process_actual WHERE create_date LIKE $Md ";
                                                        $result1_actual = mysqli_query($conn,$sql2_actual);
                                                        if($result1_actual)
                                                            {
                                                                $count_actual = mysqli_num_rows($result1_actual);
                                                                $Total_actual = $Total_actual + $count_actual;
                                                    
                                                            }
                                                        else
                                                        {
                                                            $Total_actual = 0;
                                                        }
                                                    }
                                                    
                                                }


                                            ?>
                                            <h1 class="mb-1"><?php echo $Total_actual; ?></h1>
                                        </div>
                                    
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="text-muted">Repair Request</h5>
                                        <div class="metric-value d-inline-block">
                                            <?php
                                                $sql_repair = "SELECT * FROM repair WHERE create_date = $date_now ";
                                                $result_repair = mysqli_query($conn,$sql_repair);
                                                if($result_finish_goods2)
                                                     {
                                                     $count_repair = mysqli_num_rows($result_repair);
                                                     
                                             
                                                     }
                                                 else
                                                 {
                                                    $count_repair = 0;
                                                 }


                                            ?>
                                            <h1 class="mb-1"><?php echo $count_repair; ?></h1>
                                        </div>
                                        <div class="metric-label d-inline-block float-right text-primary font-weight-bold">
                                            <span>N/A</span>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <!-- ============================================================== -->
                      
                            <!-- ============================================================== -->

                                          <!-- recent orders  -->
                            <!-- ============================================================== -->
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="card">
                                    <h5 class="card-header">Process Action</h5>
                                    <div class="card-body p-0">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead class="bg-light">
                                                    <tr class="border-0">
                                                        <th class="border-0">#</th>
                                                        <th class="border-0">Image</th>
                                                        <th class="border-0">Process Name</th>
                                                        <th class="border-0">Code</th>
                                                        <th class="border-0">Qty</th>
                                                        <th class="border-0">Status</th>
                                                    </tr>
                                                </thead>

                                                <?php
                                                        
                                                        $process_str1 = "/process/i";
                                                        $process_str2 = "/inspection/i";
                                                        $assocArr = array();
                                                        $pic_array = array();
                                                        $sql_all = 'SELECT * FROM process';
                                                        $result_all = mysqli_query($conn,$sql_all);
                                                        while($data = mysqli_fetch_array($result_all))
                                                        {
                                                            $process = $data['process_table'];
                                                            $pic = $data['code'];
                                                            if(preg_match($process_str1, $process) OR preg_match($process_str1, $process))
                                                            {
                                                                
                                                                $sql_a = "SELECT * FROM  $process WHERE create_date = $date_now";
                                                                $result_a = mysqli_query($conn,$sql_a);
                                                                if($result_a)
                                                                {
                                                                $count_a = mysqli_num_rows($result_a);
                                                                array_push($pic_array,$pic);
                                                                $assocArr[$process] = $count_a;
                                                                }
                                                            }
                                                        }
                                                        
                                                ?>
                                                <tbody>
                                                    <?php
                                                        $no = 1;
                                                        $pic_count = 0;
                                                        echo '<tr>';
                                                        foreach ($assocArr as $key => $value) 
                                                        {   
                                                            $pic_read = $pic_array[$pic_count++];
                                                            echo '<td>'.$no++.'</td>';
                                                            echo '<td><div class="m-r-10"><img src="code/'.$pic_read.'.PNG" alt="user" class="rounded" width="100"></div></td>';
                                                            echo "<td>$key</td>";
                                                            echo '<td>'.$pic_read.'</td>';
                                                            echo "<td>$value</td>";
                                                            echo '<td><span class="badge-dot badge-brand mr-1"></span>InTransit </td>';
                                                            echo '</tr>';
                                                        }
                                                    ?>
                                                    <tr>
                                                        <td colspan="9"><a href="#" class="btn btn-outline-light float-right">View Details</a></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- ============================================================== -->
                            <!-- end recent orders  -->

    
                            <!-- ============================================================== -->
                            <!-- ============================================================== -->
                            <!-- customer acquistion  -->
                            <!-- ============================================================== -->

                            <!-- ============================================================== -->
                            <!-- end customer acquistion  -->
                            <!-- ============================================================== -->
                        </div>
                        

                        
               
                  
                    </div>
                </div>
                </div>

 
            <!-- ============================================================== -->
     <!-- ============================================================== -->

            <!-- ============================================================== -->
            <!-- end footer -->
            <!-- ============================================================== -->
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- end main wrapper -->
    <!-- ============================================================== -->
    
    <!-- Optional JavaScript -->
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