<?php


//include('config/constants.php'); 
include('partials-front/menu.php');

$get_database = $_GET['db'];
$process = $_GET['tb'];
$id = $_GET['id'];
$sh = $_GET['sh'];

$_SESSION['database'] = $get_database;
$_SESSION['table'] = $process;
$_SESSION['$sh'] = $sh;

if (isset($_SESSION['Class'])) {
    $Class_op = $_SESSION['Class'];
} else {
    $Class_op = "";
}

if (isset($_SESSION['OperatorID'])) {
    $OperatorID =  $_SESSION['OperatorID'];
}


if (isset($_SESSION['OperatorName'])) {

    $OperatorName = $_SESSION['OperatorName'];
}

?>
<!-- ============================================================== -->
<!-- wrapper  -->
<!-- ============================================================== -->
<div class="dashboard-wrapper">
    <div class="container-fluid dashboard-content">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="page-header">
                    <h2 class="pageheader-title">Edit database</h2>

                    <div class="page-breadcrumb">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="process_data_search.php?sh=<?php echo $sh; ?>" class="breadcrumb-link">Tables</a></li>
                                <!--<li class="breadcrumb-item"><a href="process_data_search.php?sh=<?php echo $get_database; ?>&process=<?php echo $process; ?>$sh=<?php echo $sh; ?>" class="breadcrumb-link">Tables</a></li>-->
                                <li class="breadcrumb-item active" aria-current="page">edit</li>


                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>




        <?php

        $db_select = mysqli_select_db($conn, $get_database);
        $sql_cl = "SHOW COLUMNS FROM  `$get_database`.`$process`";
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










        $db_select = mysqli_select_db($conn, $get_database);
        $sql = "SELECT * FROM $process WHERE id = $id";
        $res = mysqli_query($conn, $sql);

        if ($res == true) {
            $count = mysqli_num_rows($res);
            if ($count == 1) {
                // echo "admin Available";
                $row = mysqli_fetch_assoc($res);
            } else {
                //header("Location:".SITEURL.'admin/manage-admin.php');
            }
        }





        ?>

        <form action="" method="POST">
            <div class="offset-xl-1 col-xl-10">
                <div class="row">
                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">

                        <div>


                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <Table class="table table-striped table-bordered first">
                                                <tr>
                                                    <td colspan="2">
                                                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                                                        <input type="submit" name="submit" value="update" class="btn btn-warning" onclick="return confirm('???????????????????????????????????????????????????????????????????????????????????????????????? ?')" />
                                                    </td>
                                                </tr>

                                                <?php





                                                for ($x = 0; $x <= sizeof($stack) - 1; $x++) {

                                                    $tagname = $row[$stack[$x]];
                                                    echo "<tr>";
                                                    echo '<td>';
                                                    echo  $stack[$x];
                                                    echo '</td>';
                                                    echo '<td>';
                                                    echo '<input type="text" name="' . $stack[$x] . '" value="' . $tagname . '" >';
                                                    echo '</td>';
                                                    echo "</tr>";
                                                }

                                                ?>


                                                <tr>
                                                    <td colspan="2">
                                                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                                                        <input type="submit" name="submit" value="update Admin" class="btn btn-warning" onclick="return confirm('???????????????????????????????????????????????????????????????????????????????????????????????? ?')" />
                                                    </td>
                                                </tr>

                                            </Table>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>

                    <div class="col-xl- col-lg-6 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <div class="card-header bg-warning text-center p-3">
                                <h4 class="mb-0 text-white">edit detail</h4>
                            </div>

                            <div class="card-body border-top">
                                <div class="table-responsive">
                                    <Table class="table table-striped table-bordered first">
                                        <?php
                                        $topic = array('details', 'ECN_No', 'Labview_request_No');
                                        for ($x = 0; $x < 3; $x++) {


                                            echo "<tr>";
                                            echo '<td>';
                                            echo  $topic[$x];
                                            echo '</td>';
                                            echo '<td>';
                                            if ($x == 0) {
                                                echo '<textarea  name="' . $topic[$x] . '" value="' . $topic[$x] . 'cols="30" rows = "5"></textarea>';
                                            } else {
                                                echo '<input type="text" name="' . $topic[$x] . '" value="">';
                                            }
                                            // 
                                            echo '</td>';
                                            echo "</tr>";
                                        }
                                        ?>
                                    </Table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>



            </div>







        </form>

    </div>




</div>




<?php
if (isset($_POST['submit'])) {
    $id_rec;
    $detail =  $_POST['details'];
    $ECN_No = $_POST['ECN_No'];
    $lq = $_POST['Labview_request_No'];
    $date_now = date("Y-m-d");
    $time_now = date("h:i:s");

    if (!empty($detail)) {

        $sql_update = "UPDATE `$get_database`.`$process` SET ";
        for ($x = 0; $x <= sizeof($stack) - 1; $x++) {

            $fl = $stack[$x];
            $ne = $_POST[$stack[$x]];
            if ($fl !== "id") {

                if ($fl == "update_operator_name") 
                {
                    $sql_update = $sql_update . $fl . "='$OperatorName',";
                } elseif ($fl == "update_operator_id") {
                    $sql_update = $sql_update . $fl . "='$OperatorID',";
                }elseif($fl == "update_date"){
                    $sql_update = $sql_update . $fl . "='$date_now',";
                }elseif($fl == "update_time")
                {
                    $sql_update = $sql_update . $fl . "='$time_now',";
                }
                else
                {
                    $sql_update = $sql_update . $fl . "='$ne',";
                }




            } else {
                $id_rec = $ne;
            }
        }

        $sql_update = substr($sql_update, 0, strlen($sql_update) - 1);
        $sql_update = $sql_update . " WHERE id = '$id_rec'";

        $res = mysqli_query($conn, $sql_update);

        if ($res == true) {
            //echo "admin Deleteed";http://128.100.117.95/medical/process_data.php?db=npt-baxter-lvp&process=Labview_chat
            $_SESSION['update'] = "<div class = 'success'>Admin Update Successfully.</div>";
            audit_t($OperatorName, $OperatorID, "position= $id", "Update", "update", "$detail update in process $process", $ECN_No,$get_database);
            echo '<script type="text/javascript">';
            echo ' alert("Update complete")';  //not showing an alert box.
            echo '</script>';
            //header("Location:" . SITEURL . 'process_data.php?db=' . $get_database . '&process=' . $process);
        } else {
            //echo "Failed Deleteed";
            $_SESSION['update'] = "<div class = 'error'>Failed to Update. Try Again Later.</div>";
            // header("Location:" . SITEURL . 'process_data.php?db=' . $get_database . '&process=' . $process);
        }
    } else {
        echo '<script type="text/javascript">';
        echo ' alert("?????????????????????????????????????????????????????? update ????????????")';  //not showing an alert box.
        echo '</script>';
    }
}

?>
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