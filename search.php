<?php include('partials-front/menu.php');
error_reporting(0); //  ปิดการแจ้งเตือน error

?>
<!-- ============================================================== -->
<?php
if(isset($_POST['search']))
{
    $search = $_POST['search'];  
}
else
{
    $search = $_SESSION['search'];  
}

$match_text = "/01A/i";              //ตรวจสอบ serial or assy number
$match_syr_sr = "/02A/i"; 
$match_lvp_ay = "/LVP/i"; 
$match_syr_ay = "/SYR/i"; 
$serial_check = false;
$product_check = false;
$sql = "";
if (preg_match($match_text, $search)) {
    $database = 'npt-baxter-lvp';
    $table = "product";
    $product_check = true;
    $sql =  "SELECT * FROM `$database`.`$table` WHERE serial_no = '$search'; ";
    $serial_check = true;
} 
else if(preg_match($match_syr_sr, $search))
{
    $database = 'npt-baxter-syr';
    $table = "product";
    $product_check = true;
    $sql =  "SELECT * FROM `$database`.`$table` WHERE serial_no = '$search'; ";
    $serial_check = true;
  
}
else if(preg_match($match_lvp_ay, $search))
{
    $database = 'npt-baxter-lvp';
    $table = "product";
    $product_check = true;
    $sql =  "SELECT * FROM `$database`.`$table` WHERE serial_no = '$search'; ";
    $serial_check = true;
    if ($search[0] == "Z") 
    {
        $database = 'npt';
        $table = "receiving";
        $sql = "SELECT * FROM `$database`.`$table` WHERE Item_number = '$search'; ";
    } elseif ($search[0] == "W") 
    {

        $database = 'npt-baxter-lvp';
        $table = "process";
        $sql = "SELECT * FROM `$database`.`$table` WHERE code = '$search'; ";
    } else {
        $database = 'npt-baxter-lvp';

        if (strlen($search) >= 12) {
            $table = "production_order_no";
            $sql = "SELECT * FROM `$database`.`$table` WHERE production_order_no = '$search'; ";
        } else {
            $table = "product_assy_no";
            $product_check = true;
            $sql =  "SELECT * FROM `$database`.`$table` WHERE assy_no = '$search'; ";
        }
    }
  
}
else if(preg_match($match_syr_ay, $search))
{
    $database = 'npt-baxter-syr';
    $table = "product";
    $product_check = true;
    $sql =  "SELECT * FROM `$database`.`$table` WHERE serial_no = '$search'; ";
    $serial_check = true;
    if ($search[0] == "Z") 
    {
        $database = 'npt';
        $table = "receiving";
        $sql = "SELECT * FROM `$database`.`$table` WHERE Item_number = '$search'; ";
    } elseif ($search[0] == "W") 
    {

        $database = 'npt-baxter-syr';
        $table = "process";
        $sql = "SELECT * FROM `$database`.`$table` WHERE code = '$search'; ";
    } else {
        $database = 'npt-baxter-syr';

        if (strlen($search) >= 12) {
            $table = "production_order_no";
            $sql = "SELECT * FROM `$database`.`$table` WHERE production_order_no = '$search'; ";
        } else {
            $table = "product_assy_no";
            $product_check = true;
            $sql =  "SELECT * FROM `$database`.`$table` WHERE assy_no = '$search'; ";
        }
    }
  
}
else
{

;

}






$db_select = mysqli_select_db($conn, $database);
$sql_cl = "SHOW COLUMNS FROM  `$database`.`$table`";
$result_cl = mysqli_query($conn, $sql_cl);
$sql_ss = "";
if ($result_cl === FALSE) {
} else {
    if (isset($result_cl)) {
        //echo '<tr>';
        $stack = array();
        while ($data = mysqli_fetch_array($result_cl)) {

            array_push($stack, $data['Field']);

            //  echo '<th>'.$data['Field'].'</th>';





        }
    }
}


?>
<!-- ============================================================== -->
<div class="dashboard-wrapper">
    <div class="container-fluid dashboard-content">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <h1> Search :: <?php echo $search ?></h1>

                <div class="row">
                    <!-- ============================================================== -->
                    <!-- basic table  -->
                    <!-- ============================================================== -->
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <h5 class="card-header"><?php echo $table; ?></h5>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example" class="table table-striped table-bordered second" style="width:100%">
                                        <thead>
                                            <tr>
                                                <?php

                                                for ($x = 0; $x <= sizeof($stack) - 1; $x++) {

                                                    // $tagname = $row[$stack[$x]];

                                                    echo  '<th>' . $stack[$x] . '</th>';
                                                }

                                                if ($table == "production_order_no") {
                                                    echo  '<th>assembly data</th>';
                                                }
                                                else
                                                {
                                                    if($product_check == true)
                                                    {
                                                        echo  '<th>Traceability</th>';
                                                    }
                                                }
                                                ?>


                                            </tr>
                                        </thead>




                                        <tbody>



                                            <?php


                                            $db_select = mysqli_select_db($conn, $table);

                                            $result_tac  = mysqli_query($conn, $sql);

                                            if ($result_tac === FALSE) {
                                            } else {

                                                $count = mysqli_num_rows($result_tac);
                                                if ($count > 0) {

                                                    while ($data_p = mysqli_fetch_array($result_tac)) {
                                                        if ($data_p['Deleted']) {
                                                            echo  '<tr class="table-danger">';
                                                        } else {
                                                            echo  '<tr>';
                                                        }

                                                        for ($x = 0; $x <= sizeof($stack) - 1; $x++) {

                                                            echo '<td>' . $data_p[$stack[$x]] . '</td>'; //
                                                        }

                                                        if ($table == "production_order_no") {
                                                            echo '<td>';
                                                            echo '<div class="btn-group ml-auto">';
                                                            echo '<a href="' . SITEURL . 'process_data_search.php?sh=' . $search . '" class="btn btn-sm btn-outline-light" >assembly data</a>';
                                                            echo '</div>';
                                                            echo '</td>';
                                                            $_SESSION['database'] = $database;
                                                            $_SESSION['table'] = $table;
                                                            $_SESSION['$sh'] = $data_p['code'];
                                                        }
                                                        else
                                                        {
                                                            if($product_check == true)
                                                            {
                                                            echo '<td>';
                                                            echo '<div class="btn-group ml-auto">';
                                                            echo '<a href="' . SITEURL . 'request-search2.php?" class="btn btn-primary" >Next</a>';
                                                            echo '</div>';
                                                            echo '</td>';
                                                            $_SESSION['search'] = $search;
                                                            }
                                                        }
                                                        echo  '</tr>';
                                                    }
                                                } else {
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
                    <!-- ==============================================================onload="myFunction()" -->
                </div>
            </div>
        </div>
        <?php
        if ($serial_check == true) {
            echo '<div class="row">';
            $stack1 = array();
            $database = "npt";
            $table = "og_inspection_result";
            $result_cl = mysqli_query($conn, $sql_cl);
            $db_select = mysqli_select_db($conn, $database);
            $sql_cl = "SHOW COLUMNS FROM  `$database`.`$table`";
            $result_cl = mysqli_query($conn, $sql_cl);
            $sql_ss = "";
            if ($result_cl === FALSE) {
            } else {
                if (isset($result_cl)) {
                    //echo '<tr>';
                    $stack = array();
                    while ($data = mysqli_fetch_array($result_cl)) {

                        array_push($stack1, $data['Field']);

                        //  echo '<th>'.$data['Field'].'</th>';





                    }
                }
            }
        } else {
            echo '<div class="row" hidden>';
        }
        ?>

        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <h1> og_inspection_result :: <?php echo $search ?></h1>

            <div class="row">
                <!-- ============================================================== -->
                <!-- basic table  -->
                <!-- ============================================================== -->
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="card">

                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-striped table-bordered second" style="width:100%">
                                    <thead>
                                        <tr>
                                            <?php
                                            if ($serial_check == true) {
                                                for ($x = 0; $x <= sizeof($stack1) - 1; $x++) {

                                                    // $tagname = $row[$stack[$x]];

                                                    echo  '<th>' . $stack1[$x] . '</th>';
                                                }

                                                if ($table == "production_order_no") {
                                                    echo  '<th>assembly data</th>';
                                                }
                                            }
                                            ?>


                                        </tr>
                                    </thead>




                                    <tbody>



                                        <?php

                                        if ($serial_check == true) {
                                            $db_select = mysqli_select_db($conn, $database);
                                            $sql_qa = "SELECT * FROM `$database`.`$table` WHERE `Serial_No` = '$search'";
                                            // echo $sql_qa;
                                            $result_tac  = mysqli_query($conn, $sql_qa);

                                            if ($result_tac === FALSE) {
                                            } else {

                                                $count = mysqli_num_rows($result_tac);
                                                if ($count > 0) {

                                                    while ($data_p = mysqli_fetch_array($result_tac)) {
                                                        if ($data_p['Approved'] == "Edited") {
                                                            echo  '<tr class="table-danger">';
                                                        } else {
                                                            echo  '<tr>';
                                                        }

                                                        for ($x = 0; $x <= sizeof($stack1) - 1; $x++) {

                                                            echo '<td>' . $data_p[$stack1[$x]] . '</td>'; //
                                                        }

                                                        if ($table == "production_order_no") {
                                                            echo '<td>';
                                                            echo '<div class="btn-group ml-auto">';
                                                            echo '<a href="' . SITEURL . 'process_data_search.php?sh=' . $search . '" class="btn btn-sm btn-outline-light" >assembly data</a>';
                                                            echo '</div>';
                                                            echo '</td>';
                                                            $_SESSION['database'] = $database;
                                                            $_SESSION['table'] = $table;
                                                            $_SESSION['$sh'] = $data_p['code'];
                                                        }
                                                        echo  '</tr>';
                                                    }
                                                } else {
                                                }
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