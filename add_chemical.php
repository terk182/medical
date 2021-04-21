<?php


//include('config/constants.php'); 
include('partials-front/menu.php');


$database = $_GET['db'];


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
                    <h2 class="pageheader-title">Add chemical</h2>

                    <div class="page-breadcrumb">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="process_data_search.php?sh=<?php echo $sh; ?>" class="breadcrumb-link">Tables</a></li>
                                <!--<li class="breadcrumb-item"><a href="process_data_search.php?sh=<?php echo $get_database; ?>&process=<?php echo $process; ?>$sh=<?php echo $sh; ?>" class="breadcrumb-link">Tables</a></li>-->
                                <li class="breadcrumb-item active" aria-current="page">Add chemical</li>


                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>




        <?php
        $stack = array();
        $db_select = mysqli_select_db($conn, $database);
        $sql_cl = "SHOW COLUMNS FROM  `$database`.`chemical`";
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









        /*
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
*/




        ?>

        <form action="" method="POST">
            <div class="offset-xl-1 col-xl-10">
                <div class="row">
                    <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">

                        <div>


                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <Table class="table table-striped table-bordered first">
                                                <tr>
                                                    <td colspan="2">
                                                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                                                        <!--  <input type="submit" name="submit" value="Add chemical" class="btn btn-warning" onclick="return confirm('คุณต้องการแก้ไขข้อมูลจริงๆใชมั้ย ?')" />-->
                                                    </td>
                                                </tr>

                                                <?php

                                                $date_now = date("Y-m-d");
                                                $time_now = date("h:i:s");
                                                $register_date = date("d-M-Y");


                                                for ($x = 0; $x <= sizeof($stack) - 1; $x++) {

                                                    // $tagname = $row[$stack[$x]];
                                                    echo "<tr>";
                                                    echo '<td>';
                                                    echo  $stack[$x];
                                                    echo '</td>';
                                                    echo '<td>';
                                                    if ($stack[$x] == 'id') {
                                                        echo '<input class="form-control" type="text" id = "' . $stack[$x] . '"name="' . $stack[$x] . '" value="N/A">';
                                                    } elseif ($stack[$x] == 'create_date') {
                                                        echo '<input class="form-control" type="text" id = "' . $stack[$x] . '" name="' . $stack[$x] . '" value="' . $date_now . '">';
                                                    } elseif ($stack[$x] == 'register_date') {
                                                        echo '<input class="form-control" type="text" id = "' . $stack[$x] . '" name="' . $stack[$x] . '" value="' . $register_date . '">';
                                                    } elseif ($stack[$x] == 'create_time') {
                                                        echo '<input class="form-control" type="text" id = "' . $stack[$x] . '" name="' . $stack[$x] . '" value="' . $time_now . '">';
                                                    } elseif ($stack[$x] == 'create_operator_name') {
                                                        echo '<input class="form-control" type="text" id = "' . $stack[$x] . '" name="' . $stack[$x] . '" value="' . $OperatorName . '">';
                                                    } elseif ($stack[$x] == 'create_operator_id') {
                                                        echo '<input class="form-control" type="text" id = "' . $stack[$x] . '" name="' . $stack[$x] . '" value="' . $OperatorID . '">';
                                                    } elseif ($stack[$x] == 'name') {
                                                        echo '<select name="chemical" class="custom-select" id="' . $stack[$x] . '">';

                                                        $get_chemical = new DB_con();
                                                        $sql = $get_chemical->get_chemical_list();
                                                        while ($data = mysqli_fetch_array($sql)) {

                                                ?>


                                                            <option class="chemical_name" value=<?php echo $data['name']; ?>><?php echo $data['name']; ?></option>



                                                        <?php
                                                        }
                                                        echo '</select>';
                                                    } elseif ($stack[$x] == 'code') {

                                                        $get_chemical = new DB_con();
                                                        $sql = $get_chemical->get_chemical_list();
                                                        echo '<select name="chemical" class="custom-select" id="' . $stack[$x] . '">';
                                                        while ($data = mysqli_fetch_array($sql)) {

                                                        ?>


                                                            <option class="chemical_code" value=<?php echo $data['code']; ?>><?php echo $data['code']; ?></option>



                                                <?php
                                                        }
                                                        echo '</select>';
                                                    } else {
                                                        echo '<input class="form-control" type="text" id = "' . $stack[$x] . '"  name="' . $stack[$x] . '" value="">';
                                                    }

                                                    echo '</td>';
                                                    echo "</tr>";
                                                }

                                                ?>


                                                <tr>
                                                    <td colspan="2">
                                                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                                                        <input type="submit" name="submit" value="Add chemical" class="btn btn-warning" onclick="return confirm('คุณต้องการแก้ไขข้อมูลจริงๆใชมั้ย ?')" />
                                                        <button type="button" name="save" id="save" class="btn btn-info">Save</button>
                                                    </td>
                                                </tr>

                                            </Table>
                                        </div>
                                    </div>
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

        $sql_insert = "INSERT INTO `$database`.`chemical`";
        $column = "";
        $value = "";
        for ($x = 0; $x <= sizeof($stack) - 1; $x++) {

            $fl = $stack[$x];
            $ne = $_POST[$stack[$x]];
            if ($fl !== "id") {
                $column = $column . "`$fl`,";
                $value = $value . "'$ne',";
            } else {;
            }
        }

        $column = substr($column, 0, strlen($column) - 1);
        $value = substr($value, 0, strlen($value) - 1);
        $sql_insert = $sql_insert . '(' . $column . ')' . 'VALUES' . '(' . $value . ');';



        // $sql_update = $sql_update . " WHERE id = '$id_rec'";

        $res = mysqli_query($conn, $sql_insert);

        if ($res == true) {
            //echo "admin Deleteed";http://128.100.117.95/medical/process_data.php?db=npt-baxter-lvp&process=Labview_chat
            $_SESSION['update'] = "<div class = 'success'>Add chemical Successfully.</div>";
            audit_t($OperatorName, $OperatorID, "position= $id", "Add chemical", "Add Process", "$detail add process $process", $ECN_No, "npt");
            echo '<script type="text/javascript">';
            echo ' alert("add chemical complete")';  //not showing an alert box.
            echo '</script>';
            //header("Location:" . SITEURL . 'process_data.php?db=' . $get_database . '&process=' . $process);
        } else {
            //echo "Failed Deleteed";
            $_SESSION['update'] = "<div class = 'error'>Failed to add. Try Again Later.</div>";
            // header("Location:" . SITEURL . 'process_data.php?db=' . $get_database . '&process=' . $process);
        }
    } else {
        echo '<script type="text/javascript">';
        echo ' alert("ต้องใส่เหตุผลในการ add chemical ด้วย")';  //not showing an alert box.
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


<script>
    let code_value = document.querySelector(".custom-select");
    let code_name = document.getElementById("name");
    let save_bt = document.getElementById("save");
    code_value.addEventListener('change', getcode);
    save_bt.addEventListener('click', insert_dat)

    function getcode() {

        var x = document.getElementById("code").selectedIndex;
        document.getElementById("name").selectedIndex = x;
        //  alert(x);

    }


    function insert_dat() {

        let get_data = document.querySelectorAll(".form-control")
        get_data.forEach
    }
</script>

</body>

</html>