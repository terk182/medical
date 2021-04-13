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
                            <h2 class="pageheader-title">Process Part</h2>
                            <p class="pageheader-text">Proin placerat ante duiullam scelerisque a velit ac porta, fusce sit amet vestibulum mi. Morbi lobortis pulvinar quam.</p>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="index.php" class="breadcrumb-link">Dashboard</a></li>
                                        <li class="breadcrumb-item"><a href="Process_Part.php" class="breadcrumb-link">Tables</a></li>
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
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered first">
                                        <thead>
                                            <tr>
                                                <th>Stion Name</th>
                                                <th>Main Code</th>
                                                <th>Picture</th>
                                                <th>part1</th>
                                                <th>Picture</th>
                                                <th>part2</th>
                                                <th>Picture</th>
                                                <th>part3</th>
                                                <th>Picture</th>
                                                <th>part4</th>
                                                <th>Picture</th>
                                                <th>part5</th>
                                                <th>Picture</th>
                                                <th>part6</th>
                                                <th>Picture</th>
                                                <th>part7</th>
                                                <th>Picture</th>
                                                <th>part8</th>
                                                <th>Picture</th>
                                                <th>part9</th>
                                                <th>Picture</th>
                                                <th>part10</th>
                                                <th>Picture</th>
                                                <th>part11</th>
                                                <th>Picture</th>
                                                <th>part12</th>
                                                <th>Picture</th>
                                                <th>part13</th>
                                                <th>Picture</th>
                                                <th>part14</th>
                                                <th>Picture</th>
                                                <th>part14</th>
                                                <th>Picture</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                                        
                                                     
                                                      
                                                        $pic_array = array();
                                                        $db_select = mysqli_select_db($conn,$db) ; 
                                                        $sql_all = 'SELECT * FROM process_part';
                                                        $result_all = mysqli_query($conn,$sql_all);
                                                        while($data = mysqli_fetch_array($result_all))
                                                        {
                                                            
                                                                $pic = "lo_pic";
                                                                echo '<tr>';
                                                                echo '<td>'.$data['station_id'].'</td>';
                                                                echo '<td>'.$data['process_id'].'</td>';
                                                                if(empty($data['process_id']))
                                                                {
                                                                    echo '<td><div class="m-r-10"><img src="code/'.$pic.'.PNG" alt="user" class="rounded" width="100"></div></td>';
                                                                }
                                                                else
                                                                {
                                                                    echo '<td><div class="m-r-10"><img src="code/'.$data['process_id'].'.PNG" alt="user" class="rounded" width="100"></div></td>';
                                                                }
                                                                
                                                                echo '<td>'.$data['part1'].'</td>';

                                                                if(empty($data['part1']))
                                                                {
                                                                    echo '<td><div class="m-r-10"><img src="code/'.$pic.'.PNG" alt="user" class="rounded" width="100"></div></td>';
                                                                }
                                                                else
                                                                {
                                                                    echo '<td><div class="m-r-10"><img src="code/'.$data['part1'].'.PNG" alt="user" class="rounded" width="100"></div></td>';
                                                                }

                                                                echo '<td>'.$data['part2'].'</td>';

                                                                if(empty($data['part2']))
                                                                {
                                                                    echo '<td><div class="m-r-10"><img src="code/'.$pic.'.PNG" alt="user" class="rounded" width="100"></div></td>';
                                                                }
                                                                else
                                                                {
                                                                    echo '<td><div class="m-r-10"><img src="code/'.$data['part2'].'.PNG" alt="user" class="rounded" width="100"></div></td>';
                                                                }

                                                                echo '<td>'.$data['part3'].'</td>';

                                                                if(empty($data['part3']))
                                                                {
                                                                    echo '<td><div class="m-r-10"><img src="code/'.$pic.'.PNG" alt="user" class="rounded" width="100"></div></td>';
                                                                }
                                                                else
                                                                {
                                                                    echo '<td><div class="m-r-10"><img src="code/'.$data['part3'].'.PNG" alt="user" class="rounded" width="100"></div></td>';
                                                                }

                                                                echo '<td>'.$data['part4'].'</td>';

                                                                if(empty($data['part4']))
                                                                {
                                                                    echo '<td><div class="m-r-10"><img src="code/'.$pic.'.PNG" alt="user" class="rounded" width="100"></div></td>';
                                                                }
                                                                else
                                                                {
                                                                    echo '<td><div class="m-r-10"><img src="code/'.$data['part4'].'.PNG" alt="user" class="rounded" width="100"></div></td>';
                                                                }

                                                                echo '<td>'.$data['part5'].'</td>';

                                                                if(empty($data['part5']))
                                                                {
                                                                    echo '<td><div class="m-r-10"><img src="code/'.$pic.'.PNG" alt="user" class="rounded" width="100"></div></td>';
                                                                }
                                                                else
                                                                {
                                                                    echo '<td><div class="m-r-10"><img src="code/'.$data['part5'].'.PNG" alt="user" class="rounded" width="100"></div></td>';
                                                                }

                                                                echo '<td>'.$data['part6'].'</td>';

                                                                if(empty($data['part6']))
                                                                {
                                                                    echo '<td><div class="m-r-10"><img src="code/'.$pic.'.PNG" alt="user" class="rounded" width="100"></div></td>';
                                                                }
                                                                else
                                                                {
                                                                    echo '<td><div class="m-r-10"><img src="code/'.$data['part6'].'.PNG" alt="user" class="rounded" width="100"></div></td>';
                                                                }
                                                                echo '<td>'.$data['part7'].'</td>';

                                                                if(empty($data['part7']))
                                                                {
                                                                    echo '<td><div class="m-r-10"><img src="code/'.$pic.'.PNG" alt="user" class="rounded" width="100"></div></td>';
                                                                }
                                                                else
                                                                {
                                                                    echo '<td><div class="m-r-10"><img src="code/'.$data['part7'].'.PNG" alt="user" class="rounded" width="100"></div></td>';
                                                                }

                                                                echo '<td>'.$data['part8'].'</td>';

                                                                if(empty($data['part8']))
                                                                {
                                                                    echo '<td><div class="m-r-10"><img src="code/'.$pic.'.PNG" alt="user" class="rounded" width="100"></div></td>';
                                                                }
                                                                else
                                                                {
                                                                    echo '<td><div class="m-r-10"><img src="code/'.$data['part8'].'.PNG" alt="user" class="rounded" width="100"></div></td>';
                                                                }

                                                                echo '<td>'.$data['part9'].'</td>';

                                                                if(empty($data['part9']))
                                                                {
                                                                    echo '<td><div class="m-r-10"><img src="code/'.$pic.'.PNG" alt="user" class="rounded" width="100"></div></td>';
                                                                }
                                                                else
                                                                {
                                                                    echo '<td><div class="m-r-10"><img src="code/'.$data['part9'].'.PNG" alt="user" class="rounded" width="100"></div></td>';
                                                                }

                                                                echo '<td>'.$data['part10'].'</td>';

                                                                if(empty($data['part10']))
                                                                {
                                                                    echo '<td><div class="m-r-10"><img src="code/'.$pic.'.PNG" alt="user" class="rounded" width="100"></div></td>';
                                                                }
                                                                else
                                                                {
                                                                    echo '<td><div class="m-r-10"><img src="code/'.$data['part10'].'.PNG" alt="user" class="rounded" width="100"></div></td>';
                                                                }

                                                                echo '<td>'.$data['part11'].'</td>';

                                                                if(empty($data['part11']))
                                                                {
                                                                    echo '<td><div class="m-r-10"><img src="code/'.$pic.'.PNG" alt="user" class="rounded" width="100"></div></td>';
                                                                }
                                                                else
                                                                {
                                                                    echo '<td><div class="m-r-10"><img src="code/'.$data['part11'].'.PNG" alt="user" class="rounded" width="100"></div></td>';
                                                                }

                                                                echo '<td>'.$data['part12'].'</td>';

                                                                if(empty($data['part12']))
                                                                {
                                                                    echo '<td><div class="m-r-10"><img src="code/'.$pic.'.PNG" alt="user" class="rounded" width="100"></div></td>';
                                                                }
                                                                else
                                                                {
                                                                    echo '<td><div class="m-r-10"><img src="code/'.$data['part12'].'.PNG" alt="user" class="rounded" width="100"></div></td>';
                                                                }

                                                                echo '<td>'.$data['part13'].'</td>';

                                                                if(empty($data['part13']))
                                                                {
                                                                    echo '<td><div class="m-r-10"><img src="code/'.$pic.'.PNG" alt="user" class="rounded" width="100"></div></td>';
                                                                }
                                                                else
                                                                {
                                                                    echo '<td><div class="m-r-10"><img src="code/'.$data['part13'].'.PNG" alt="user" class="rounded" width="100"></div></td>';
                                                                }

                                                                echo '<td>'.$data['part14'].'</td>';

                                                                if(empty($data['part14']))
                                                                {
                                                                    echo '<td><div class="m-r-10"><img src="code/'.$pic.'.PNG" alt="user" class="rounded" width="100"></div></td>';
                                                                }
                                                                else
                                                                {
                                                                    echo '<td><div class="m-r-10"><img src="code/'.$data['part14'].'.PNG" alt="user" class="rounded" width="100"></div></td>';
                                                                }

                                                                echo '<td>'.$data['part15'].'</td>';

                                                                if(empty($data['part15']))
                                                                {
                                                                    echo '<td><div class="m-r-10"><img src="code/'.$pic.'.PNG" alt="user" class="rounded" width="100"></div></td>';
                                                                }
                                                                else
                                                                {
                                                                    echo '<td><div class="m-r-10"><img src="code/'.$data['part15'].'.PNG" alt="user" class="rounded" width="100"></div></td>';
                                                                }





                                                                echo '</tr>';
                                                            
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
            <!-- footer -->
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