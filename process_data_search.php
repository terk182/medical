<?php include('partials-front/menu.php');


error_reporting(0); //  ปิดการแจ้งเตือน error

if (isset($_GET['sh'])) {
    $sh = $_GET['sh'];
    $get_database = $_SESSION['database'];
    $process = $_SESSION['table'];
    $search = $_SESSION['$sh'];
    $toggle = true;
    $bk_search = $search;
    if(isset($_SESSION['Type']))
    {
        $process_type = $_SESSION['Type'];
    }
    else
    {
        $process_type = "SUB";
    }
   
} else {
    $get_database = $_POST['db'];
    $process = $_POST['process'];
    $search = $_POST['search'];
    $toggle = false;

    $db_select = mysqli_select_db($conn, `$get_database`);
    $bk_search = $search;
    $sql = "SELECT process_type,code FROM `$get_database`.`process` WHERE process_table = '$process';";
    $res = mysqli_query($conn, $sql);
    //echo $sql;
    if ($res == true) {

        $count = mysqli_num_rows($res);
        if ($count == 1) {
            // echo "admin Available";
            $row = mysqli_fetch_assoc($res);
           
            $process_type = $row['process_type'];
            $bk_search = $row['code'];
            $_SESSION['Type'] = $process_type ;
            $sh = $search;
            // echo $last;
        } else {
            //header("Location:".SITEURL.'admin/manage-admin.php');
        }
    }





}



if (isset($_SESSION['Class'])) {
    $Class_op = $_SESSION['Class'];
} else {
    $Class_op = "";
}

if ($search[0] == "W") {
    $db_select = mysqli_select_db($conn, `$get_database`);
    $bk_search = $search;
    $sql = "SELECT process_table,process_type FROM `$get_database`.`process` WHERE code = '$search';";
    $res = mysqli_query($conn, $sql);
    //echo $sql;
    if ($res == true) {

        $count = mysqli_num_rows($res);
        if ($count == 1) {
            // echo "admin Available";
            $row = mysqli_fetch_assoc($res);
            $process = $row['process_table'];
            $process_type = $row['process_type'];
            $_SESSION['Type'] = $process_type ;
            $search =  $sh;
            // echo $last;
        } else {
            //header("Location:".SITEURL.'admin/manage-admin.php');
        }
    }





    // echo $get_database;
    // echo $process;
    // echo $search;
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
                    <h2 class="pageheader-title">Data Table</h2>
                    <p class="pageheader-text">Proin placerat ante duiullam scelerisque a velit ac porta, fusce sit amet vestibulum mi. Morbi lobortis pulvinar quam.</p>
                    <div class="page-breadcrumb">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="database.php?db=<?php echo $get_database; ?>" class="breadcrumb-link"><?php echo $get_database; ?></a></li>
                                <li class="breadcrumb-item"><a href="process_data.php?db=<?php echo $get_database; ?>&process=<?php echo $process; ?> " class="breadcrumb-link"><?php echo $process; ?></a></li>
                                <li class="breadcrumb-item active" aria-current="page"><?php echo $search; ?></li>



                            </ol>
                        </nav>
                    </div>
                </div>
                <div>
                    <form action="<?php echo SITEURL; ?>process_data_search.php" method="POST">
                        <input type="hidden" name="db" value="<?php echo $get_database; ?>">
                        <input type="hidden" name="process" value="<?php echo $process; ?>">
                        <?php
                        if ($toggle == true) {
                            echo '<input type="search" name="search" placeholder="' . $sh . '" required>';
                        } else {
                            echo '<input type="search" name="search" placeholder="Search.." required>';
                        }
                        ?>

                        <input type="submit" name="submit" value="ค้นหา" class="btn btn-primary">
                    </form>
                </div>
                <br>
            </div>

        </div>
        <!-- ============================================================== -->
        <!-- end pageheader -->
        <!-- ============================================================== -->

        <div class="row">
            <!-- ============================================================== -->
            <!-- data table  -->
            <!-- ============================================================== -->
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">
                    <div class="card-header">

                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="table table-striped table-bordered second" style="width:100%">
                                <thead>

                                    <?php

                                    $db_select = mysqli_select_db($conn, $get_database);
                                    $sql_cl = "SHOW COLUMNS FROM  `$get_database`.`$process`";
                                    $result_cl = mysqli_query($conn, $sql_cl);
                                    $sql_ss = "";
                                    if ($result_cl === FALSE) {
                                    } else {
                                        if (isset($result_cl)) {
                                            echo '<tr>';
                                            $stack = array();
                                            $Fil = "";
                                            $sql_ss = "";
                                            $process_str2 = "/date/i";
                                            $process_str = "/time/i";
                                            if ($Class_op == "Admin") {
                                                echo '<th>Edit</th>';
                                            }
                                            while ($data = mysqli_fetch_array($result_cl)) {

                                                array_push($stack, $data['Field']);

                                                echo '<th>' . $data['Field'] . '</th>';
                                                $date11 = $data['Type'];
                                                $Fil = $sql_ss . $data['Field'];
                                                if (!$Fil == "id") {
                                                    if (preg_match($process_str2, $date11)) {
                                                        if (preg_match($process_str, $date11)) {

                                                            $sql_ss = ' CAST(`create_date` AS CHAR) LIKE ' . "'%$search%'" . ' OR ';
                                                        } else {
                                                            $sql_ss = ' CAST(`create_time` AS CHAR) LIKE ' . "'%$search%'" . ' OR ';
                                                        }
                                                    } else {
                                                        $sql_ss = "$Fil" . ' LIKE ' . "'%$search%'" . ' OR ';
                                                    }
                                                } else {
                                                    $sql_ss = "$Fil" . ' LIKE ' . "'%$search%'" . ' OR ';
                                                }
                                            }
                                            if ($Class_op == "Admin") {
                                                echo '<th>Edit</th>';
                                            }

                                            echo '</tr>';

                                            $sql_ss = substr($sql_ss, 0, strlen($sql_ss) - 3);
                                            //echo $sql_ss;

                                        }
                                    }


                                    ?>









                                </thead>
                                <tbody>

                                    <?php

                                    $db_select = mysqli_select_db($conn, $get_database);
                                   
                                    $sql = "SELECT * FROM `$get_database`.`$process` WHERE $sql_ss;";
                                    
                                    $res = mysqli_query($conn, $sql);

                                    if ($res === FALSE) {
                                        echo "No DATA";
                                    } else {
                                        $count = mysqli_num_rows($res);

                                        if ($count > 0) {

                                            while ($data_p = mysqli_fetch_array($res)) {
                                                if ($data_p['total_result'] == "NG")
                                                {
                                                    echo '<tr class="table-danger">';
                                                }
                                                else
                                                {
                                                    echo "<tr>";
                                                }
                                                
                                                if ($Class_op == "Admin") {
                                                    echo '<td>';
                                                    echo '<div class="btn-group ml-auto">';
                                                    echo '<a href="' . SITEURL . 'edit_process_data.php?id=' . $data_p['id'] . '&db=' . $get_database . '&tb=' . $process . '&sh=' . $search . '"class="btn btn-sm btn-outline-light" >Edit</a>';

                                                    echo '<a href="' . SITEURL . 'delete_process_data.php?id=' . $data_p['id'] . '"class="btn btn-sm btn-outline-light">delete</a>';
                                                    echo '</div>';
                                                    echo '</td>';
                                                }
                                                for ($x = 0; $x <= sizeof($stack) - 1; $x++) {

                                                    echo '<td>' . $data_p[$stack[$x]] . '</td>';
                                                }

                                                if ($Class_op == "Admin") {
                                                    echo '<td>';
                                                    echo '<div class="btn-group ml-auto">';
                                                    echo '<a href="' . SITEURL . 'edit_process_data.php?id=' . $data_p['id'] . '&db=' . $get_database . '&tb=' . $process . '&sh=' . $search . '"class="btn btn-sm btn-outline-light" >Edit</a>';

                                                    echo '<a href="' . SITEURL . 'delete_process_data.php?id=' . $data_p['id'] . '"class="btn btn-sm btn-outline-light">delete</a>';
                                                    echo '</div>';
                                                    echo '</td>';
                                                }
                                                echo "</tr>";
                                            }
                                        } else {

                                            // header("Location:".SITEURL.'process_value.php');
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
            <!-- end data table  -->
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