<?php include('partials-front/menu.php'); 
if(isset($_GET['db']))
{
    $db = $_GET['db'];
}
else
{
    $db = "npt-baxter-lvp";
}


?>
        <!-- ============================================================== -->
        <!-- wrapper  -->
        <!-- ============================================================== -->
        <div class="dashboard-wrapper">
            <div class="container-fluid  dashboard-content">
                <!-- ============================================================== -->
                <!-- pageheader -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="page-header">
                            <h2 class="pageheader-title">Process List</h2>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="index.php" class="breadcrumb-link">Dashboard</a></li>
                                        <li class="breadcrumb-item"><a href="process_list.php" class="breadcrumb-link">Process list</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Process list</li>
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
                            
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered first">
                                        <thead>
                                            <tr>
                                                <th>process_name</th>
                                                <th>process_type</th>
                                                <th>process_table</th>
                                                <th>code</th>
                                                <th>code_rev</th>
                                                <th>wi_no</th>
                                                <th>labview_revision</th>
                                                <th>Go to process data</th>

                                            </tr>
                                        </thead>
                                        <tbody> 
                                        <?php
                                                        
                                                        $process_str1 = "/process/i";
                                                        $process_str2 = "/inspection/i";
                                                        $assocArr = array();
                                                        $pic_array = array();
                                                        $db_select = mysqli_select_db($conn,$db) ; 
                                                        $sql_all = 'SELECT * FROM process';
                                                        $result_all = mysqli_query($conn,$sql_all);
                                                        while($data = mysqli_fetch_array($result_all))
                                                        {
                                                            $process = $data['process_table'];
                                                            if(preg_match($process_str1, $process) OR preg_match($process_str2, $process))
                                                            {
                                                            
                                                                echo '<tr>';
                                                                echo '<td>'.$data['process_name'].'</td>';
                                                                echo '<td>'.$data['process_type'].'</td>';
                                                                echo '<td>'.$data['process_table'].'</td>';
                                                                echo '<td>'.$data['code'].'</td>';
                                                                echo '<td>'.$data['code_rev'].'</td>';
                                                                echo '<td>'.$data['wi_no'].'</td>';
                                                                echo '<td>'.$data['record_revision'].'</td>';

                                                                echo '<td><a href="' . SITEURL . 'process_data.php?db=npt-baxter-lvp&process='.$data['process_table'].'" class="btn btn-primary">go to record </a></td>';
                                                                echo '</tr>';
                                                            }
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