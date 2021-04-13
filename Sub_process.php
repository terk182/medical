<?php include('partials-front/menu.php'); ?>
<!-- ============================================================== -->
<!-- wrapper  -->
<!-- ============================================================== -->
<?php
if (isset($_SESSION['model'])) {
    $model_check = $_SESSION['model'];
    echo $model_check;
} else {
    echo $model_check;
}




$get_database = $_GET['database'];
$get_pd = $_GET['PD'];
$get_lot = $_GET['lot'];
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
//$get_code = $_GET['CODE'];  
$date_now = date("d-M-Y");
if (empty($get_DC)) {

    $db_select = mysqli_select_db($conn,'npt-baxter-lvp') ; 
    $sql_get_dc = "SELECT station_daily_check_id FROM $get_database WHERE production_order_no = '$get_pd' and lot_no = '$get_lot'";

    $res_get_dc = mysqli_query($conn, $sql_get_dc);
    $count_get_dc = mysqli_num_rows($res_get_dc);
    if ($count_get_dc > 0) {
        $row_dc = mysqli_fetch_assoc($res_get_dc);
        $get_DC = $row_dc['station_daily_check_id'];
    }
}

//WI  &WINO                                                 


?>











<div class="dashboard-wrapper">
    <div class="container-fluid  dashboard-content">
        <!-- ============================================================== -->
        <!-- pageheader -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="page-header">
                    <h2 class="pageheader-title">Data Table</h2>
                    <?php echo $_SESSION['search']; ?>
                    <p class="pageheader-text">Proin placerat ante duiullam scelerisque a velit ac porta, fusce sit amet vestibulum mi. Morbi lobortis pulvinar quam.</p>
                    <div class="page-breadcrumb">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <?php
                                if ($model_check == "model1") {

                                    $Trace_peag_redirect = "Traceability.php";
                                    $request_peag_redirect = "request-search.php";
                                } else if ($model_check == "model2") {

                                    $Trace_peag_redirect = "Traceability1.php";
                                    $request_peag_redirect = "request-search1.php";
                                } else if ($model_check == "model3") {

                                    $Trace_peag_redirect = "Traceability2.php";
                                    $request_peag_redirect = "request-search2.php";
                                } else {
                                    $Trace_peag_redirect = "Traceability.php";
                                    $request_peag_redirect = "request-search.php";
                                }



                                ?>
                                <li class="breadcrumb-item"><a href=<?php echo $Trace_peag_redirect; ?> class="breadcrumb-link">search</a></li>
                                <li class="breadcrumb-item"><a href=<?php echo $request_peag_redirect; ?> class="breadcrumb-link"><?php echo $get_database; ?></a></li>
                                <li class="breadcrumb-item active" aria-current="page">Process Daetail</li>
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
                    <div><a href=<?php echo $request_peag_redirect; ?> class="btn btn-dark" role="button">Back</a></div>
                    <h5 class="card-header">Process Name</h5>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class="table-primary">
                                    <tr>
                                        <th>Station Name</th>
                                        <th>Process Name</th>
                                        <th>Wi No</th>
                                        <th>WI Rev</th>
                                        <th>Result</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><?php echo $get_Station; ?></td>
                                        <td><?php echo $get_database; ?></td>
                                        <td><?php echo $get_WI; ?></td>
                                        <td><?php echo $get_WINO; ?></td>
                                        <td><?php echo $get_result; ?></td>

                                    </tr>
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
        <div class="row">

            <!-- ============================================================== -->
            <!-- data table  -->
            <!-- ============================================================== -->
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">
                    <div><a href=<?php echo $request_peag_redirect; ?> class="btn btn-dark" role="button">Back</a></div>
                    <h5 class="card-header">Instrument details</h5>

                    <div class="card-header">


                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered first">
                                <thead class="table-primary">
                                    <tr>
                                        <th>Instrument ID</th>
                                        <th>Instrument Name</th>
                                        <th>Calibration Due Date</th>
                                        <th>Category</th>
                                        <th>value</th>
                                        <th>Daily check Instrument Result</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $db_select = mysqli_select_db($conn, 'npt-baxter-lvp');
                                    $sql = "SELECT * FROM station WHERE id = '$get_Station_id'";

                                    $res = mysqli_query($conn, $sql);
                                    $count = mysqli_num_rows($res);
                                    if ($count > 0) {
                                        $row = mysqli_fetch_assoc($res);
                                        for ($x = 1; $x <= 15; $x++) {
                                            $tag_result = 'result_instrument_' . $x;
                                            $tag_value = 'value_instrument_' . $x;
                                            $bf = $row['instrument_id_' . $x];

                                            if (!empty($bf)) {
                                                $db_select = mysqli_select_db($conn, 'npt');
                                                $sql_instrument = "SELECT * FROM `npt`.`calibration_list` WHERE id = '$bf'; ";
                                                $result_instrument = mysqli_query($conn, $sql_instrument);
                                                $count_instrument = mysqli_num_rows($result_instrument);


                                                if ($count_instrument > 0) {
                                                    $row_instrument = mysqli_fetch_assoc($result_instrument);
                                                    $instrument_id = $row_instrument['id'];
                                                    $instrument_name = $row_instrument['Equipment_name'];
                                                    $instrument_cal = $row_instrument['Cal_Due_Date'];
                                                    $instrument_cat = $row_instrument['Category'];
                                                    echo '<tr>';
                                                    echo '<td>' . $instrument_id . '</td>';
                                                    echo '<td>' . $instrument_name . '</td>';
                                                    echo '<td>' . $instrument_cal . '</td>';
                                                    echo '<td>' . $instrument_cat . '</td>';
                                                    if (!empty($get_DC)) {
                                                        $db_select = mysqli_select_db($conn, 'npt-baxter-lvp');
                                                        $sql_dc_result = "SELECT * FROM `npt-baxter-lvp`.`station_daily_check` WHERE id = '$get_DC'; ";
                                                        $result_cal = mysqli_query($conn, $sql_dc_result);
                                                        $count = mysqli_num_rows($result_cal);
                                                        if ($count == 1) {
                                                            $row_e = mysqli_fetch_assoc($result_cal);

                                                            if (!empty($row_e[$tag_value])) {
                                                                echo '<td>' . $row_e[$tag_value] . '</td>';
                                                            } else {
                                                                echo '<td>N/A</td>';
                                                            }
                                                            if (!empty($row_e[$tag_result])) {
                                                                echo '<td>' . $row_e[$tag_result] . '</td>';
                                                            } else {
                                                                echo '<td>N/A</td>';
                                                            }
                                                        }
                                                    } else {
                                                        echo '<td>N/A</td>';
                                                    }

                                                    echo '</tr>';
                                                }
                                            } else {;
                                            }
                                        }
                                        for ($x = 1; $x <= 15; $x++) {
                                            $tag_result = 'result_tool_' . $x;
                                            $tag_value = 'value_tool_' . $x;
                                            $bf = $row['tool_id_' . $x];

                                            if (!empty($bf)) {
                                                $db_select = mysqli_select_db($conn, 'npt');
                                                $sql_instrument = "SELECT * FROM `npt`.`calibration_list` WHERE id = '$bf'; ";
                                                $result_instrument = mysqli_query($conn, $sql_instrument);
                                                $count_instrument = mysqli_num_rows($result_instrument);


                                                if ($count_instrument > 0) {
                                                    $row_instrument = mysqli_fetch_assoc($result_instrument);
                                                    $instrument_id = $row_instrument['id'];
                                                    $instrument_name = $row_instrument['Equipment_name'];
                                                    $instrument_cal = $row_instrument['Cal_Due_Date'];
                                                    $instrument_cat = $row_instrument['Category'];
                                                    echo '<tr>';
                                                    echo '<td>' . $instrument_id . '</td>';
                                                    echo '<td>' . $instrument_name . '</td>';
                                                    echo '<td>' . $instrument_cal . '</td>';
                                                    echo '<td>' . $instrument_cat . '</td>';
                                                    if (!empty($get_DC)) {
                                                        $db_select = mysqli_select_db($conn, 'npt-baxter-lvp');
                                                        $sql_dc_result = "SELECT * FROM `npt-baxter-lvp`.`station_daily_check` WHERE id = '$get_DC'; ";
                                                        $result_cal = mysqli_query($conn, $sql_dc_result);
                                                        $count = mysqli_num_rows($result_cal);
                                                        if ($count == 1) {
                                                            $row_t = mysqli_fetch_assoc($result_cal);
                                                            $Torque_meter_cal_id = $row_t['Torque_meter_cal_id'];
                                                            if (!empty($row_t[$tag_value])) {
                                                                echo '<td>' . $row_t[$tag_value] . '</td>';
                                                            } else {
                                                                echo '<td>N/A</td>';
                                                            }
                                                            if (!empty($row_t[$tag_result])) {
                                                                echo '<td>' . $row_t[$tag_result] . '</td>';
                                                            } else {
                                                                echo '<td>N/A</td>';
                                                            }
                                                        }
                                                    } else {
                                                        echo '<td>N/A</td>';
                                                    }

                                                    echo '</tr>';
                                                }
                                            } else {;
                                            }
                                        }
                                        for ($x = 1; $x <= 15; $x++) {
                                            $tag_result = 'result_jig_' . $x;
                                            $tag_value = 'value_jig_' . $x;
                                            $bf = $row['jig_id_' . $x];

                                            if (!empty($bf)) {
                                                $db_select = mysqli_select_db($conn, 'npt');
                                                $sql_instrument = "SELECT * FROM `npt`.`calibration_list` WHERE id = '$bf'; ";
                                                $result_instrument = mysqli_query($conn, $sql_instrument);
                                                $count_instrument = mysqli_num_rows($result_instrument);


                                                if ($count_instrument > 0) {
                                                    $row_instrument = mysqli_fetch_assoc($result_instrument);
                                                    $instrument_id = $row_instrument['id'];
                                                    $instrument_name = $row_instrument['Equipment_name'];
                                                    $instrument_cal = $row_instrument['Cal_Due_Date'];
                                                    $instrument_cat = $row_instrument['Category'];
                                                    echo '<tr>';
                                                    echo '<td>' . $instrument_id . '</td>';
                                                    echo '<td>' . $instrument_name . '</td>';
                                                    echo '<td>' . $instrument_cal . '</td>';
                                                    echo '<td>' . $instrument_cat . '</td>';

                                                    if (!empty($get_DC)) {
                                                        $db_select = mysqli_select_db($conn, 'npt-baxter-lvp');
                                                        $sql_dc_result = "SELECT * FROM `npt-baxter-lvp`.`station_daily_check` WHERE id = '$get_DC'; ";
                                                        $result_cal = mysqli_query($conn, $sql_dc_result);
                                                        $count = mysqli_num_rows($result_cal);
                                                        if ($count == 1) {
                                                            $row_j = mysqli_fetch_assoc($result_cal);
                                                            if (empty($row_j[$tag_value])) {
                                                                echo '<td>' . $row_j[$tag_value] . '</td>';
                                                            } else {
                                                                echo '<td>N/A</td>';
                                                            }
                                                            if (empty($row_j[$tag_result])) {
                                                                echo '<td>' . $row_j[$tag_result] . '</td>';
                                                            } else {
                                                                echo '<td>N/A</td>';
                                                            }
                                                        }
                                                    } else {
                                                        echo '<td>N/A</td>';
                                                    }


                                                    echo '</tr>';
                                                }
                                            } else {;
                                            }
                                        }
                                        for ($x = 1; $x <= 15; $x++) {

                                            $tag_result = 'result_chemical_' . $x;
                                            $tag_value = 'value_chemical_' . $x;
                                            $bf = $row['chemical_id_' . $x];

                                            if (!empty($bf)) {
                                                $db_select = mysqli_select_db($conn, 'npt');
                                                $sql_instrument = "SELECT * FROM `npt`.`chemical` WHERE id = '$bf'; ";
                                                $result_instrument = mysqli_query($conn, $sql_instrument);
                                                $count_instrument = mysqli_num_rows($result_instrument);


                                                if ($count_instrument > 0) {
                                                    $row_instrument = mysqli_fetch_assoc($result_instrument);
                                                    $instrument_id = $row_instrument['id'];
                                                    $instrument_name = $row_instrument['name'];
                                                    $instrument_cal = $row_instrument['expiration_date'];
                                                    $instrument_cat = $row_instrument['category'];
                                                    echo '<tr>';
                                                    echo '<td>' . $instrument_id . '</td>';
                                                    echo '<td>' . $instrument_name . '</td>';
                                                    echo '<td>' . $instrument_cal . '</td>';
                                                    echo '<td>chemical</td>';

                                                    if (!empty($get_DC)) {
                                                        $db_select = mysqli_select_db($conn, 'npt-baxter-lvp');
                                                        $sql_dc_result = "SELECT * FROM `npt-baxter-lvp`.`station_daily_check` WHERE id = '$get_DC'; ";
                                                        $result_cal = mysqli_query($conn, $sql_dc_result);
                                                        $count = mysqli_num_rows($result_cal);
                                                        if ($count == 1) {
                                                            $row_ch = mysqli_fetch_assoc($result_cal);
                                                            if (empty($row_ch[$tag_value])) {
                                                                echo '<td>' . $row_ch[$tag_value] . '</td>';
                                                            } else {
                                                                echo '<td>N/A</td>';
                                                            }
                                                            if (empty($row_ch[$tag_result])) {
                                                                echo '<td>' . $row_ch[$tag_result] . '</td>';
                                                            } else {
                                                                echo '<td>N/A</td>';
                                                            }
                                                        }
                                                    } else {
                                                        echo '<td>N/A</td>';
                                                    }





                                                    echo '</tr>';
                                                }
                                            } else {;
                                            }
                                        }
                                        if (!empty($Torque_meter_cal_id)) {
                                            $db_select = mysqli_select_db($conn, 'npt');
                                            $sql_Tq_meter = "SELECT * FROM `npt`.`calibration_list` WHERE Control_No = '$Torque_meter_cal_id'; ";
                                            $result_Tq_meter = mysqli_query($conn, $sql_Tq_meter);
                                            $count_Tq_meter = mysqli_num_rows($result_Tq_meter);
                                            if ($count_Tq_meter > 0) {
                                                $row_Tq_meter = mysqli_fetch_assoc($result_Tq_meter);
                                                $instrument_id = $row_Tq_meter['id'];
                                                $instrument_name = $row_Tq_meter['Equipment_name'];
                                                $instrument_cal = $row_Tq_meter['Cal_Due_Date'];
                                                $instrument_cat = $row_Tq_meter['Category'];
                                                echo '<tr>';
                                                echo '<td>' . $instrument_id . '</td>';
                                                echo '<td>' . $instrument_name . '</td>';
                                                echo '<td>' . $instrument_cal . '</td>';
                                                echo '<td>Torque_meter</td>';
                                                echo '<td>' . $row_Tq_meter['Control_No'] . '</td>';

                                                $dateTimestamp1 = strtotime($date_now);
                                                $dateTimestamp2 = strtotime($instrument_cal);
                                                if ($dateTimestamp2 > $dateTimestamp1) {
                                                    echo '<td>OK</td>';
                                                } else {
                                                    echo '<td>NG</td>';
                                                }
                                                echo '</tr>';
                                            }
                                        } else {
                                        }
                                    } else {

                                        // header("Location:".SITEURL.'process_value.php');
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

        <!-- ============================================================== -->
        <!-- end fixed header  -->

        <div class="row">
            <!-- ============================================================== -->
            <!-- data table multiselects  -->
            <!-- ============================================================== -->
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">
                    <div><a href=<?php echo $request_peag_redirect; ?> class="btn btn-dark" role="button">Back</a></div>
                    <div class="card-header">

                        <h5 class="mb-0">Process data </h5>

                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example3" class="table table-striped table-bordered" style="width:100%">
                                <thead class="table-primary">
                                    <tr>
                                        <?php
                                        if ($get_type == 'MN') {
                                            echo '<th>No</th>';
                                            echo '<th>Check Topic</th>';
                                            echo '<th>Specification</th>';
                                            echo '<th>Result</th>';
                                            echo '<th>Judgement</th>';
                                        } else {
                                            echo '<th>No</th>';
                                            echo '<th>Check Topic</th>';
                                            echo '<th>QTY</th>';
                                            echo '<th>OK</th>';
                                            echo '<th>NG</th>';
                                        }
                                        ?>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                    $db_select = mysqli_select_db($conn, 'npt-baxter-lvp');
                                    if ($get_type == 'MN') {
                                        $sql_total = "SELECT * FROM `npt-baxter-lvp`.`$get_database` WHERE production_order_no = '$get_pd' AND lot_no = '$get_lot' AND assy_no = '$get_assy'; ";
                                    } else {
                                        $sql_total = "SELECT * FROM `npt-baxter-lvp`.`$get_database` WHERE production_order_no = '$get_pd' AND lot_no = '$get_lot'  ";
                                    }

                                    $result_total = mysqli_query($conn, $sql_total);
                                    $count_total = mysqli_num_rows($result_total);
                                    $no = 1;
                                    if ($count_total > 0) {
                                        $row_total = mysqli_fetch_assoc($result_total);

                                        for ($x = 1; $x <= 15; $x++) {
                                            $ps_id = 'process_value_id_' . $x;
                                            $ps_value = 'process_value_' . $x;
                                            $ps_result = 'check_result_' . $x;

                                            if (!$row_total[$ps_id] <= 0) {

                                                //Get topic name and spec
                                                $sql_topic = "SELECT * FROM `npt-baxter-lvp`.`process_value` WHERE id = '$row_total[$ps_id]'";
                                                $result_topic = mysqli_query($conn, $sql_topic);
                                                $count_topic = mysqli_num_rows($result_topic);
                                                if ($count_topic == 1) {
                                                    $row_topic = mysqli_fetch_assoc($result_topic);
                                                    if (!$row_topic['status'] == 'INVI') {

                                                        echo '<tr>';
                                                        echo '<td>' . $no++ . '</td>';
                                                        echo '<td>' . $row_topic['item_name'] . '</td>';



                                                        if ($get_type == 'MN') {
                                                            if (empty($row_topic['min'])) {
                                                                echo '<td>-</td>';
                                                            } else {
                                                                echo '<td>' . $row_topic['min'] . $row_topic['max'] . '</td>';
                                                            }
                                                            echo '<td>' . $row_total[$ps_value] . '</td>';
                                                            echo '<td>' . $row_total[$ps_result] . '</td>';
                                                            echo '</tr>';
                                                        } else {


                                                            $OK_count = 0;
                                                            $NG_count = 0;
                                                            for ($I = 0; $I <= $count_total; $I++) {

                                                                if ($row_total['total_result'] == "OK") {
                                                                    $OK_count++;
                                                                } else {
                                                                    $NG_count++;
                                                                }
                                                            }
                                                            echo '<td>' . $OK_count + $NG_count . '</td>';
                                                            echo '<td>' . $OK_count . '</td>';
                                                            echo '<td>' . $NG_count . '</td>';
                                                            echo '</tr>';
                                                        }
                                                    }
                                                }
                                            } else {
                                                break;
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
            <!-- end data table multiselects  -->
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