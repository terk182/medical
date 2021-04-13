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
                            <h2 class="pageheader-title">Process Value</h2>
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
                            <h5 class="card-header">Process Value</h5>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered first">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>process_name</th>
                                                <th>type</th>
                                                <th>code</th>
                                                <th>rev</th>
                                                <th>labview_revision</th>
                                                <th>Value</th>
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
                                                        $count = mysqli_num_rows($result_all);
                                                        $sn = 1;
                                                        if($count>0)
                                                        {
                                                            while($data = mysqli_fetch_array($result_all))
                                                            {
                                                                $process = $data['process_table'];
                                                                if(preg_match($process_str1, $process) OR preg_match($process_str2, $process))
                                                                {
                                                            
                                                               
                                                                    $process_name = $data['process_name'];
                                                                    $process_type = $data['process_type'];
                                                                    $code = $data['code'];
                                                                    $code_rev = $data['code_rev'];
                                                                    $wi_no = $data['wi_no'];
                                                                    $record_revision = $data['record_revision'];
                                                                    $process_id = $data['id'];
                                                                    ?>
                                                                     <tr>
                                                                        <td><?php echo $sn++;?></td>
                                                                        <td><?php echo $process_name;?> </td>
                                                                        <td><?php echo $process_type;?></td>
                                                                        <td><?php echo $code;?></td>
                                                                        <td><?php echo $code_rev ;?></td>
                                                                        <td><?php echo $record_revision ;?></td>
                                                                    <td> 
                                                                            <a href="<?php echo SITEURL; ?>Process_value_list.php?id=<?php echo $process_id.'&db='.$db ?>"class="btn btn-primary">Process Value</a>
                                                                            
                                                                    </td>

                                                                </tr>    
                                                                <?php
                                                                }
                                                            }
                                                        }
                                                        else
                                                        {
                                                                ?>
                                                                <tr>
                                                                <td colspan="6"><div class = "errer">No Category Added</div></td>
                                                                </tr>
                                    
                                                                <?php
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