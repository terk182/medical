
<?php include('partials-front/menu.php'); 

$get_database = $_GET['db'];



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
                                        <li class="breadcrumb-item"><a href="index.php" class="breadcrumb-link">index</a></li>
                                        <li class="breadcrumb-item"><a href="database.php?db=<?php echo $get_database?>" class="breadcrumb-link">Database</a></li>
                                        <li class="breadcrumb-item active" aria-current="page"><?php echo $get_database?></li>
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
                            <h5 class="card-header">Data base</h5>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered first">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>process_name</th>
                                                <th>Value</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                                        
                                                       
                                                        $link = mysqli_connect('128.100.117.98', 'namiki', 'namiki');
                                                        $res = mysqli_query($link, "SHOW TABLE STATUS FROM `$get_database`;");
                                                        $sn = 0;
                                                        if($res === FALSE)
                                                        {
                                                            
                                                        }
                                                        else
                                                        {
                                                        if(isset($res) )
                                                        {
                                                                    while ($data = mysqli_fetch_array($res))
                                                                    {
                                                                
                                                                        
                                                                        
                                                                        
                                                                                $process_name = $data['Name'];
                                                                                
                                                                                ?>
                                                                                <tr>
                                                                                    <td><?php echo $sn++;?></td>
                                                                                    <td><?php echo $process_name;?> </td>
                                                                                
                                                                                <td> 
                                                                                        <a href="<?php echo SITEURL; ?>process_data.php?db=<?php echo $get_database; ?>&process=<?php echo $process_name; ?>"class="btn btn-primary">View Data</a>
                                                                                        
                                                                                </td>

                                                                            </tr>    
                                                                            <?php
                                                                            
                                                                        
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