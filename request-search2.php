<?php
error_reporting(0); //  ปิดการแจ้งเตือน error
?>


<?php include('config/constants.php'); ?>

<!DOCTYPE html>
<html>

<head>

    <link rel="stylesheet" href="css/terk.css">
    <link rel="stylesheet" href="css/style.css">

    <link rel="stylesheet" href="css/terk2.css">
    
</head>

<body>


    <div>
        <div>

            <div>
                <script type="text/javascript">
                    //-->
                </script>

                <div class="jquery-script-clear"></div>
            </div>
        </div>

        <div class="container">


            <?php
            $match_text = "/01A/i";              //ตรวจสอบ serial or assy number'
            if (!isset($_SESSION['search'])) {
                $search = $_POST['search'];
            } else {
                $search = $_SESSION['search'];
            }

            if (!isset($_SESSION['model'])) {
                unset($_SESSION['model']);
                $_SESSION['model'] = "model3";
            } else {
                $_SESSION['model'] = "model3";
            }


            $_SESSION['$search'] = $search;
            if (preg_match($match_text, $search)) {
                $database_project = "npt-baxter-lvp";
                $commant = new DB_con();
                
                $result_all = $commant->get_product_assy($database_project,$search);
                $count = mysqli_num_rows($result_all);
                if ($count == 1) {
                    $row = mysqli_fetch_assoc($result_all);
                    $assy_no = $row['assy_no'];
                    echo '<br>';
                    echo '<br>';
                    echo '<br>';
                    echo '<div>';
                    echo '<h2><a>Seriel Number <a href="#">' . $search . '</a></h2>';
                    echo '<h2><a>Assy Number <a href="#">' . $assy_no . '</a></h2>';
                    $_SESSION['search'] = $search;
                    $_SESSION['assy_no'] = $assy_no;
                    echo '</div>';
                } else {
                    echo '<br>';
                    echo '<br>';
                    echo '<br>';
                    echo '<div>';
                    echo '<h2>&emsp;Search <a href="#">' . $search . '</a></h2>';
                    echo '</div>';
                    $_SESSION['search'] = $search;
                }
            } else {
                echo '<br>';
                echo '<br>';
                echo '<br>';
                echo '<div>';
                echo '<h2>&emsp;Search <a href="#">' . $search . '</a></h2>';
                echo '</div>';
                $_SESSION['search'] = $search;
            }
            ?>

            <?php
            $_SESSION['model'] = "model3";
            $process_str1 = "/process/i";
            $process_str2 = "/inspection/i";
            
            
            $sql_all = $commant->process_check($database_project);
            $count = mysqli_num_rows($sql_all);

            $sn = 0;
            if ($count > 0) {
                echo '<ul>';
                while ($data = mysqli_fetch_array($sql_all, MYSQLI_ASSOC)) {
                    $process = $data['process_table'];
                    if (preg_match($process_str1, $process) or !preg_match($process_str2, $process)) {
                        $process_n = $data['process_name'];
                        $process_name = $data['process_table'];
                        $process_type = $data['process_type'];
                        $code = $data['code'];
                        $code_rev = $data['code_rev'];
                        $wi_no = $data['wi_no'];
                        $wi_no_v = $data['wi_revision'];
                        $record_revision = $data['record_revision'];
                        $process_id = $data['id'];

                        $pattern_str_mn = "/process_lvp_carton/i";
                        $process_str1 = "/process/i";
                        $process_str2 = "/inspection/i";
                        if ($process_type == "MAIN") {

                            if (preg_match($pattern_str_mn, $process_name)) {

                                $sql_get = $search;
                                // echo $sql_get;
                            } else {
                                if (preg_match($process_str1, $process_name) or preg_match($process_str2, $process_name)) {
                                    if (empty($assy_no)) {
                                        $sql_get = $search;
                                    } else {
                                        $sql_get = $assy_no;
                                    }
                                    // echo $sql_get;
                                } else {
                                    $sql_get = "";
                                }
                            }

                            if (!empty($sql_get)) {
                                $result_tac = $commant->process_main_chk_assy($database_project, $process_name, $sql_get);
                                if ($result_tac === FALSE) {
                                } else {
                                    $count_total = mysqli_num_rows($result_tac);
                                    if ($count_total > 0) {

                                        while ($data = mysqli_fetch_array($result_tac, MYSQLI_ASSOC)) {

                                            $station_name = $data['station_id'];

                                            $result_station = $commant->get_station_param($database_project, $station_name);
                                            $count_station = mysqli_num_rows($result_station);


                                            if ($count_station == 1) {
                                                $row_station = mysqli_fetch_assoc($result_station);
                                                $st_name = $row_station['station_name'];
                                            } else {
                                            }

                                            $DC_check = $data['station_daily_check_id'];
                                            $total_result = $data['total_result'];
                                            if($total_result == "NG")
                                            {
                                                $class_tag = 'class = "NG"';
                                            }
                                            
                                            echo '<li class = "NG" ><a href=' . SITEURL . 'Sub_process.php?database=' . $process_name . '&PD=' . $data['production_order_no'] . '&lot=' . $data['lot_no'] . '&main=' . $process_name . '&search=' . $search . '&Station=' . $station_n . '&result=' . $total_result . '&WI=' . $wi_no . '&WV=' . $wi_no_v . '&DC==' . $DC_check . '&SN=' . $station_name . '&AS=' . $data['assy_no'] . '&TY=MN>' . $code . ' //  PD :: ' . $data['production_order_no'] . ' //  LOT :: ' . $data['lot_no'] . ' //  REV :: ' . $code_rev . ' //  ASSY NUMBER :: ' . $data['assy_no'] .' //  Station :: ' . $st_name. ' //  RESULT :: ' . $data['total_result'] . '</a>';
                                            echo '<ul>';


                                            for ($x = 1; $x <= 15; $x++) {

                                                $code_Loop1 = $data['parts_code_' . $x];
                                                $PD_inv_Loop1 = $data['process_invoice_' . $x];
                                                $lot_Loop1 = $data['parts_lot_' . $x];

                                                if ((!empty($code_Loop1)) and (!empty($lot_Loop1)) and (!empty($PD_inv_Loop1))) {
                                                    if ($code_Loop1[0] == "W") {
                                                        echo '<li><a href="#">' . $code_Loop1 . ' PD :: ' . $PD_inv_Loop1 . '  LOT :: ' . $lot_Loop1 . '  RESULT :: ' . $total_result . ' </a>';
                                                    } else {
                                                        echo '<li><a href="' . SITEURL . 'Sub_part.php?part=' . $code_Loop1 . '&inv=' . $PD_inv_Loop1 . '&lot=' . $lot_Loop1 . '&rev=' . '&search=' . $search . '&MN=' . $process_name . ' ">' . $code_Loop1 . ' INV :: ' . $PD_inv_Loop1 . ' LOT :: ' . $lot_Loop1 . '  </a>';
                                                    }


                                                    if (($code_Loop1[0] == "W") and ($process_type == "MAIN")) {

                                                        $result_cal = $commant->get_process_param($database_project, $code_Loop1);
                                                        $count_p = mysqli_num_rows($result_cal);
                                                        if ($count_p == 1) {
                                                            $row_t = mysqli_fetch_assoc($result_cal);
                                                            $sub_name = $row_t['process_name'];
                                                            $sub_type = $row_t['process_type'];
                                                            $sub_table = $row_t['process_table'];
                                                            $sub_code = $row_t['code'];
                                                            $sub_code_rev = $row_t['code_rev'];
                                                            // $sub_name = $row_t['process_name'];

                                                            $sub_WI = $row_t['wi_no'];
                                                            $sub_WV = $row_t['wi_revision'];
                                                            $sub_dc = $row_t['wi_revision'];
                                                            $sub_assy = $row_t['wi_revision'];
                                                        }


                                                        //$db_select = mysqli_select_db($conn, 'npt-baxter-lvp');
                                                        // $sql_get = "SELECT * FROM `npt-baxter-lvp`.`$sub_table` WHERE production_order_no = '$PD_inv_Loop1' AND lot_no = '$lot_Loop1' LIMIT 1";
                                                        $result_tac  = $commant->get_pd_param($database_project, $sub_table, $PD_inv_Loop1, $lot_Loop1);
                                                        if ($result_tac === FALSE) {
                                                        } else {
                                                            $count = mysqli_num_rows($result_tac);
                                                            if ($count > 0) {

                                                                while ($data = mysqli_fetch_array($result_tac, MYSQLI_ASSOC)) {
                                                                    //echo '<li><a href="#">'.$code.'</a>';
                                                                    echo '<ul>';
                                                                    $total_result = $data['total_result'];
                                                                    $station_id = $data['station_id'];

                                                                    $result_cal = $commant->get_station_param($database_project, $station_id);
                                                                    $count_p = mysqli_num_rows($result_cal);
                                                                    if ($count_p == 1) {
                                                                        $row_t = mysqli_fetch_assoc($result_cal);
                                                                        $st_name = $row_t['station_name'];

                                                                    }
                                                                    for ($x = 1; $x <= 15; $x++) {

                                                                        $code_Loop2 = $data['parts_code_' . $x];
                                                                        $PD_inv_Loop2 = $data['process_invoice_' . $x];
                                                                        $lot_Loop2 = $data['parts_lot_' . $x];


                                                                        if (((!empty($code_Loop2)) and (!empty($lot_Loop2)) and (!empty($PD_inv_Loop2)))) {

                                                                            if ($code_Loop2[0] == "W") {
                                                                                echo '<li><a href="#">' . $code_Loop2 . ' // PD :: ' . $PD_inv_Loop2 . ' // LOT :: ' . $lot_Loop2 .' //  Station :: ' . $st_name.  ' // RESULT :: ' . $total_result . ' </a>';
                                                                            } else {
                                                                                echo '<li><a href="#">' . $code_Loop2 . ' // INV :: ' . $PD_inv_Loop2 . ' // LOT :: ' . $lot_Loop2 . ' </a>';
                                                                            }




                                                                            if (($code_Loop2[0] == "W") and ($sub_type == "SUB")) {


                                                                                $result_cal = $commant->get_process_param($database_project, $code_Loop2);
                                                                                $count_p = mysqli_num_rows($result_cal);
                                                                                if ($count_p == 1) {
                                                                                    $row_t = mysqli_fetch_assoc($result_cal);
                                                                                    $sub_name = $row_t['process_name'];
                                                                                    $sub_type = $row_t['process_type'];
                                                                                    $sub_table = $row_t['process_table'];
                                                                                    $sub_code = $row_t['code'];
                                                                                    $sub_code_rev = $row_t['code_rev'];
                                                                                    // $sub_name = $row_t['process_name'];

                                                                                    $sub_WI = $row_t['wi_no'];
                                                                                    $sub_WV = $row_t['wi_revision'];
                                                                                    $sub_dc = $row_t['wi_revision'];
                                                                                    $sub_assy = $row_t['wi_revision'];
                                                                                }




                                                                                $result_tac  = $commant->get_pd_param($database_project, $sub_table, $PD_inv_Loop2, $lot_Loop2);

                                                                                if ($result_tac === FALSE) {
                                                                                } else {

                                                                                    $count = mysqli_num_rows($result_tac);
                                                                                    if ($count > 0) {
                                                                                        echo '<ul>';
                                                                                        while ($data = mysqli_fetch_array($result_tac, MYSQLI_ASSOC)) {
                                                                                            $total_result = $data['total_result'];
                                                                                            $station_id = $data['station_id'];

                                                                                            $result_cal = $commant->get_station_param($database_project, $station_id);
                                                                                            $count_p = mysqli_num_rows($result_cal);
                                                                                            if ($count_p == 1) {
                                                                                                $row_t = mysqli_fetch_assoc($result_cal);
                                                                                                $st_name = $row_t['station_name'];

                                                                                            }
                                                                                            for ($x = 1; $x <= 15; $x++) {

                                                                                                $code_Loop2 = $data['parts_code_' . $x];
                                                                                                $PD_inv_Loop2 = $data['process_invoice_' . $x];
                                                                                                $lot_Loop2 = $data['parts_lot_' . $x];
                                                                                                if (((!empty($code_Loop2)) and (!empty($lot_Loop2)) and (!empty($PD_inv_Loop2)))) {


                                                                                                    if ($code_Loop2[0] == "W") {
                                                                                                        echo '<li><a href="#">' . $code_Loop2 . ' // PD :: ' . $PD_inv_Loop2 . ' //  LOT :: ' . $lot_Loop2 .' //  Station :: ' . $st_name.  ' //  RESULT :: ' . $total_result . '</a>';
                                                                                                    } else {
                                                                                                        echo '<li><a href="#">' . $code_Loop2 . ' // INV :: ' . $PD_inv_Loop2 . ' // LOT :: ' . $lot_Loop2 . ' </a>';
                                                                                                    }


                                                                                                    if (($code_Loop2[0] == "W") and ($sub_type == "SUB")) {

                                                                                                        $result_cal = $commant->get_process_param($database_project, $code_Loop2);
                                                                                                        $count_p = mysqli_num_rows($result_cal);
                                                                                                        if ($count_p == 1) {
                                                                                                            $row_t = mysqli_fetch_assoc($result_cal);
                                                                                                            $sub_name = $row_t['process_name'];
                                                                                                            $sub_type = $row_t['process_type'];
                                                                                                            $sub_table = $row_t['process_table'];
                                                                                                            $sub_code = $row_t['code'];
                                                                                                            $sub_code_rev = $row_t['code_rev'];
                                                                                                            // $sub_name = $row_t['process_name'];

                                                                                                            $sub_WI = $row_t['wi_no'];
                                                                                                            $sub_WV = $row_t['wi_revision'];
                                                                                                            $sub_dc = $row_t['wi_revision'];
                                                                                                            $sub_assy = $row_t['wi_revision'];
                                                                                                        }



                                                                                                        $result_tac  = $commant->get_pd_param($database_project, $sub_table, $PD_inv_Loop2, $lot_Loop2);
                                                                                                        if ($result_tac === FALSE) {
                                                                                                        } else {
                                                                                                            $count = mysqli_num_rows($result_tac);
                                                                                                            if ($count > 0) {
                                                                                                                echo '<ul>';
                                                                                                                while ($data = mysqli_fetch_array($result_tac, MYSQLI_ASSOC)) {
                                                                                                                    $total_result = $data['total_result'];
                                                                                                                    $station_id = $data['station_id'];

                                                                                                                    $result_cal = $commant->get_station_param($database_project, $station_id);
                                                                                                                    $count_p = mysqli_num_rows($result_cal);
                                                                                                                    if ($count_p == 1) {
                                                                                                                        $row_t = mysqli_fetch_assoc($result_cal);
                                                                                                                        $st_name = $row_t['station_name'];

                                                                                                                    }



                                                                                                                    for ($x = 1; $x <= 15; $x++) {

                                                                                                                        $code_Loop2 = $data['parts_code_' . $x];
                                                                                                                        $PD_inv_Loop2 = $data['process_invoice_' . $x];
                                                                                                                        $lot_Loop2 = $data['parts_lot_' . $x];
                                                                                                                        if (((!empty($code_Loop2)) and (!empty($lot_Loop2)) and (!empty($PD_inv_Loop2)))) {


                                                                                                                            if ($code_Loop2[0] == "W") {
                                                                                                                                echo '<li><a href"#">' . $code_Loop2 . ' // PD :: ' . $PD_inv_Loop2 . ' //  LOT :: ' . $lot_Loop2 .' //  Station :: ' . $st_name. ' //  RESULT :: ' . $total_result . '</a>';
                                                                                                                            } else {
                                                                                                                                echo '<li><a href="#">' . $code_Loop2 . ' // INV :: ' . $PD_inv_Loop2 . ' // LOT :: ' . $lot_Loop2 . ' </a>';
                                                                                                                            }
                                                                                                                        } else {
                                                                                                                            break;
                                                                                                                        }
                                                                                                                    }
                                                                                                                }
                                                                                                                echo '</ul>';
                                                                                                            }
                                                                                                        }
                                                                                                    }
                                                                                                    echo '</li>';
                                                                                                } else {
                                                                                                    break;
                                                                                                }
                                                                                            }
                                                                                        }
                                                                                        echo '</ul>';
                                                                                    }
                                                                                }
                                                                            }
                                                                            echo '</li>';
                                                                        } else {
                                                                            break;
                                                                        }
                                                                    }
                                                                }
                                                                echo '</ul>';
                                                            }
                                                        }
                                                    }
                                                    echo '</li>';
                                                } else {
                                                    break;
                                                }
                                            }

                                            echo '</ul>';
                                            echo '</li>';
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
                echo '</ul>';
            }
            ?>


        </div>

        <div class="container">



            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">
                    <br>
                    <h1>Repair details</h1>
                    <section class="text-center">

                        <div>
                            <table class="table table-striped table-bordered first">
                                <thead class="table-warning">
                                    <tr>
                                        <th>Code</th>
                                        <th>production order no</th>
                                        <th>Lot no</th>
                                        <th>New production order no</th>
                                        <th>New Lot No</th>
                                        <th>Defect</th>
                                        <th>Analytics Name</th>
                                        <th>Action by</th>
                                        <th>Cause of Defect</th>
                                        <th>Action Require</th>
                                        <th>Status</th>
                                        <th>income date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

                                    $res_repair = $commant->get_repiar_detail($database_project, $search);
                                    $count_repair = mysqli_num_rows($res_repair);
                                    if ($count_repair > 0) {
                                        while ($data_repair = mysqli_fetch_array($res_repair)) {
                                            echo '<tr>';
                                            echo '<td>' . $data_repair['code'] . '</td>';
                                            echo '<td>' . $data_repair['production_order_no'] . '</td>';
                                            echo '<td>' . $data_repair['lot_no'] . '</td>';
                                            echo '<td>' . $data_repair['production_order_no_new'] . '</td>';
                                            echo '<td>' . $data_repair['lot_no_new'] . '</td>';
                                            echo '<td>' . $data_repair['defect_1'] . '//' . $data_repair['defect_2'] . '//' . $data_repair['defect_3'] . '</td>';
                                            echo '<td>' . $data_repair['analyzer'] . '</td>';
                                            echo '<td>' . $data_repair['action_by'] . '</td>';  //cause_of_defect
                                            echo '<td>' . $data_repair['cause_of_defect'] . '</td>';
                                            echo '<td>' . $data_repair['action_need'] . '</td>';
                                            echo '<td>' . $data_repair['status'] . '</td>';
                                            echo '<td>' . $data_repair['create_date'] . '</td>';

                                            echo '</tr>';
                                        }
                                    }
                                    ?>



                                </tbody>
                            </table>
                        </div>


                    </section>
                </div>

            </div>
        </div>

        <div class="container">



            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">
                    <br>
                    <h1>Inspection Detail</h1>
                    <section class="text-center">

                        <div>
                            <table class="table table-striped table-bordered first">
                                <thead class="table-success">
                                    <tr>
                                        <th>serial_no or assy number</th>
                                        <th>remark</th>
                                        <th>Lot no</th>
                                        <th>result</th>
                                        <th>inspector</th>
                                        <th>inspec date</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $db_select = mysqli_select_db($conn, 'npt-baxter-lvp');
                                    if (!empty($assy_no)) {
                                        $res_qa_inspection = $commant->get_qa_inspec_2($database_project, $assy_no, $search);
                                    } else {
                                        $res_qa_inspection = $commant->get_qa_inspec($database_project, $assy_no);
                                    }

                                    $count_qa_inspection = mysqli_num_rows($res_qa_inspection);
                                    if ($count_qa_inspection > 0) {
                                        while ($data_repair = mysqli_fetch_array($res_qa_inspection)) {
                                            echo '<tr>';
                                            echo '<td>' . $data_repair['serial_no'] . $data_repair['assy_no'] . '</td>';
                                            echo '<td>' . $data_repair['remark'] . '</td>';
                                            echo '<td>' . $data_repair['lot_no'] . '</td>';
                                            echo '<td>' . $data_repair['result'] . '</td>';
                                            echo '<td>' . $data_repair['create_operator_name'] . ' id :: ' . $data_repair['create_operator_id'] . '</td>';
                                            echo '<td>' . $data_repair['create_date'] . '</td>';

                                            echo '</tr>';
                                        }
                                    } else {
                                        echo "<h1>Not Inspection<h1>";
                                    }
                                    ?>



                                </tbody>
                            </table>
                        </div>


                    </section>
                </div>

            </div>
        </div>

    </div>











</body>

</html>
<script src="assets/libs/js/jquery-1.1.1.js"></script>
<script src="MultiNestedList.js"></script>
<script type="text/javascript">
    var _gaq = _gaq || [];
    _gaq.push(['_setAccount', 'UA-36251023-1']);
    _gaq.push(['_setDomainName', 'jqueryscript.net']);
    _gaq.push(['_trackPageview']);

    (function() {
        var ga = document.createElement('script');
        ga.type = 'text/javascript';
        ga.async = true;
      //  ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0];
        s.parentNode.insertBefore(ga, s);
    })();
</script>