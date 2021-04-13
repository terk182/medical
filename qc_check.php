<?php include('partials-front/menu.php'); ?>
<!-- ============================================================== -->
<!-- wrapper  -
        <?php
        $code = "";
        $create_date = date('d-M-Y');
        $Standard = "";
        $AuthorizerID = "";
        $Standard_Revision = "";
        $z_revision = "";
        $new = "";
        $Item_Name =  "";
        $Model_group =  "";
        $Lot_Size  = "";
        $Lot_number  = "";
        $Supplier_Name = "";
        $receiving_Date = "";
        $Packing_qty  = "";
        $Inspection_Date  = "";
        $Invoice_number  =  "";
        $status;
        $check_submit  = false;

        if (isset($_GET['standard'])) {


            $check_submit  = true;


            $status = $_GET['standard'];
            $rev = $_GET['st_rev'];

            $code = str_replace("Q", "Z", $status);

            $zcode = new DB_con();
            $sql = $zcode->zcode($status, $rev);

            while ($row = mysqli_fetch_array($sql)) {

                $Standard =  $row['Standard'];
                $AuthorizerID =  $row['AuthorizerID'];
                $Standard_Revision =  $row['Standard_Revision'];
                $z_revision =  $row['z_revision'];
                $new =  $row['new'];
            }

            $detail = $zcode->receiving_check($code, $z_revision);
            while ($row = mysqli_fetch_array($detail)) {

                $Item_Name =  $row['Item_name'];
                $Model_group =  $row['Model_group'];
                $Lot_Size  =  $row['Lot_size'];
                $Lot_number  =  $row['Lot_number'];
                $Supplier_Name =  $row['Supplier_name'];
                $receiving_Date =  $row['Receiving_date'];
                $Packing_qty  =  $row['Pack_Quantity'];
                $Inspection_Date  =  $row['Unit'];
                $Invoice_number  =  $row['Invoice_number'];
            }


            unset($_POST['inspec']);
        } else {;
        }



        ?>
<!--============================================================== -->
<div class="dashboard-wrapper">
    <div class="container-fluid dashboard-content">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="page-header">
                    <h2 class="pageheader-title">Qc Inspection</h2>
                    <div class="page-breadcrumb">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.php" class="breadcrumb-link">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="qc_nspection.php" class="breadcrumb-link">Part check</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Inspection Detail</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>


        <form action="#" method="post" role="form" autocomplete="off">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="card">
                        <div class="card-body">


                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="control-label" for="customer-first_name">Item Name</label>
                                        <input type="text" id="customer-first_name" class="form-control" name="search" value="<?php echo $code; ?>" maxlength="32" aria-required="true">

                                        <p class="help-block help-block-error"></p>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="control-label" for="customer-last_name">Model group</label>
                                        <input type="text" id="customer-last_name" class="form-control" name="Model_group" maxlength="64" value="<?php echo $Model_group; ?>" aria-required="true">

                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="control-label" for="customer-email">Lot Size</label>
                                        <input type="text" id="customer-email" class="form-control" name="Lot_size" maxlength="32" value="<?php echo $Lot_Size; ?>" aria-required="true">
                                        <p class="help-block help-block-error"></p>
                                    </div>
                                </div>
                                <div class="col-sm-6">

                                    <div class="form-group">
                                        <label class="control-label" for="customer-last_name">Supplier Name</label>
                                        <input type="text" id="customer-last_name" class="form-control" name="Supplier_name" maxlength="64" value="<?php echo $Supplier_Name; ?>" aria-required="true">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="control-label" for="customer-email">receiving Date</label>
                                        <input type="text" id="customer-email" class="form-control" name="Receiving_date" maxlength="32" value="<?php echo $receiving_Date; ?>" aria-required="true">
                                        <p class="help-block help-block-error"></p>
                                    </div>
                                </div>
                                <div class="col-sm-6">

                                    <div class="form-group">
                                        <label class="control-label" for="customer-last_name">Packing Q'ty </label>
                                        <input type="text" id="customer-last_name" class="form-control" name="Pack_Quantity" maxlength="64" value="<?php echo $Packing_qty; ?>" aria-required="true">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="control-label" for="customer-email">Inspection Date</label>
                                        <input type="text" id="customer-email" class="form-control" name="create_date" maxlength="32" value="<?php echo $create_date; ?>" aria-required="true">
                                        <p class="help-block help-block-error"></p>
                                    </div>
                                </div>

                            </div>


                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="control-label" for="customer-email">Item No.</label>
                                        <input type="text" id="customer-email" class="form-control" name="Standard" value="<?php echo $Standard; ?>" maxlength="32" aria-required="true">
                                        <p class="help-block help-block-error"></p>
                                    </div>
                                </div>
                                <div class="col-sm-6">

                                    <div class="form-group">
                                        <label class="control-label" for="customer-last_name">Rev Item</label>
                                        <input type="text" id="customer-last_name" class="form-control" name="z_revision" value="<?php echo $z_revision; ?>" maxlength="64" aria-required="true">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="control-label" for="customer-email">Lot No.</label>
                                        <input type="text" id="customer-email" class="form-control" name="Lot_number" maxlength="32" value="<?php echo $Lot_number; ?>" aria-required="true">
                                        <p class="help-block help-block-error"></p>
                                    </div>
                                </div>
                                <div class="col-sm-6">

                                    <div class="form-group">
                                        <label class="control-label" for="customer-last_name">Invoice No.</label>
                                        <input type="text" id="customer-last_name" class="form-control" name="Invoice_number" maxlength="64" value="<?php echo $Invoice_number; ?>" aria-required="true">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="control-label" for="customer-email">Standard No.</label>
                                        <input type="text" id="customer-email" class="form-control" name="AuthorizerID" value="<?php echo $AuthorizerID; ?>" maxlength="32" aria-required="true">
                                        <p class="help-block help-block-error"></p>
                                    </div>
                                </div>
                                <div class="col-sm-6">

                                    <div class="form-group">
                                        <label class="control-label" for="customer-last_name">Rev Standard</label>
                                        <input type="text" id="customer-last_name" class="form-control" name="Standard_Revision" maxlength="64" value="<?php echo $Standard_Revision; ?>" aria-required="true">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="control-label" for="customer-email">Sampling Pack</label>
                                        <input type="text" id="customer-email" class="form-control" name="Customer[Sampling_Pack" maxlength="32" aria-required="true">
                                        <p class="help-block help-block-error"></p>
                                    </div>
                                </div>
                                <div class="col-sm-6">

                                    <div class="form-group">
                                        <label class="control-label" for="customer-last_name">Last Inspection Date</label>
                                        <input type="text" id="customer-last_name" class="form-control" name="Last_Inspection_Date" value="<?php echo $create_date; ?>" maxlength="64" aria-required="true">
                                    </div>
                                </div>
                            </div>





                        </div>
                    </div>
                </div>
            </div>



            <div class="row">

                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="card">
                        <h5 class="card-header">Measurement </h5>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered first">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Spec</th>
                                            <th>Min</th>
                                            <th>Max</th>
                                            <th>Unit</th>
                                            <th>Tool id</th>
                                            <th>Value</th>
                                        </tr>
                                    </thead>

                                    <tbody>

                                        <?php
                                        $sn = 1;
                                        $ins_id = 1;
                                        if ($check_submit  == true) {
                                            $topic = $zcode->get_spec($Standard, $z_revision);

                                            while ($row = mysqli_fetch_array($topic)) {
                                                if (!empty($row['Spec'])) {
                                                    echo '<tr>';
                                                    echo '<td>' . $sn++ . '</td>';
                                                    echo '<td>' . $row['Spec'] . '</td>';
                                                    echo '<td>' . $row['Min'] . '</td>';
                                                    echo '<td>' . $row['Max'] . '</td>';
                                                    echo '<td>' . $row['Unit'] . '</td>';

                                        ?>
                                                    <td>

                                                        <div>
                                                            <label for="exampleDropdownFormEmail2">tool</label>
                                                            <input type="text" id="instrument_<?php echo $ins_id ?>">
                                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg" onclick="get_instru_id(<?php echo $ins_id++ ?>)">add tool</button>

                                                        </div>


                                                    </td>
                                                    <td>
                                                        <div>
                                                            <label for="exampleDropdownFormEmail2">value</label>
                                                            <input type="text" class="form-control" id="exampleDropdownFormEmail2">
                                                        </div>
                                                    </td>

                                                    </tr>


                                        <?php


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



            <div class="row">

                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="card">
                        <h5 class="card-header">Appearance </h5>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered first" id="terk_table">
                                    <thead>
                                        <tr>

                                            <th>Sequence Number</th>
                                            <th>Appearance Inspection Item</th>
                                            <th>Result</th>
                                            <th>judgement</th>

                                        </tr>
                                    </thead>

                                    <tbody>

                                        <?php
                                        $sn = 1;
                                        if ($check_submit  == true) {
                                            $topic = $zcode->get_spec($Standard, $z_revision);

                                            while ($row = mysqli_fetch_array($topic)) {
                                                if (!empty($row['AInspection'])) {
                                                    echo '<tr id="tr' . $sn . '">';
                                                    echo '<td>' . $sn . '</td>';
                                                    echo '<td>' . $row['AInspection'] . '</td>';
                                                    echo '<td></td>';
                                                    echo '<td>';
                                                    echo '<div class="input-group-append">';
                                                    echo '<button class="btn btn-success" type="button" onclick="justOK(' . $sn . ')" >OK</button>';
                                                    echo '<br>';
                                                    echo '<button class="btn btn-danger" type="button" onclick="justNG(' . $sn . ')">NG</button>';
                                                    echo '</div>';
                                                    echo '</td>';

                                                    $sn++;

                                                    echo '</tr>';
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

            <div class="card">
                <div>
                    <a class="btn btn-success btn-sm" id="add-more" href="javascript:;" role="button"><i class="fa fa-plus"></i> Add Standard</a>
                    <button type="submit" name="inspec" class="btn btn-primary btn-sm">Submit</button>
                </div>


            </div>

            <div class="modal fade" id="myModal" role="dialog">
                <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header" style="padding:35px 50px;">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4><span class="glyphicon glyphicon-lock"></span> Login</h4>
                        </div>
                        <div class="modal-body" style="padding:40px 50px;">
                            <form role="form">
                                <div class="form-group">
                                    <label for="usrname"><span class="glyphicon glyphicon-user"></span> Username</label>
                                    <input type="text" class="form-control" id="usrname" placeholder="Enter email">
                                </div>
                                <div class="form-group">
                                    <label for="psw"><span class="glyphicon glyphicon-eye-open"></span> Password</label>
                                    <input type="text" class="form-control" id="psw" placeholder="Enter password">
                                </div>
                                <div class="checkbox">
                                    <label><input type="checkbox" value="" checked>Remember me</label>
                                </div>
                                <button type="submit" class="btn btn-success btn-block"><span class="glyphicon glyphicon-off"></span> Login</button>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-danger btn-default pull-left" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                            <p>Not a member? <a href="#">Sign Up</a></p>
                            <p>Forgot <a href="#">Password?</a></p>
                        </div>
                    </div>

                </div>
            </div>




            <!-- Modal -->
            <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">

                            <div class="card">
                                <h5 class="card-header">Basic Table</h5>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered first" id="instrument_table">
                                            <thead>
                                                <tr>
                                                    <th>Control_No</th>
                                                    <th>Equipment_name</th>
                                                    <th>Serial_No</th>
                                                    <th>Model</th>
                                                    <th>Cal_Due_Date</th>
                                                    <th>add</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php

                                                $topic = $zcode->instrumant();
                                                $id_instrumebt = 1;
                                                while ($row = mysqli_fetch_array($topic)) {
                                                ?>
                                                    <tr>
                                                        <td><?php echo $row['Control_No']; ?></td>
                                                        <td><?php echo $row['Equipment_name']; ?></td>
                                                        <td><?php echo $row['Serial_No']; ?></td>
                                                        <td><?php echo $row['Model']; ?></td>
                                                        <td><?php echo $row['Cal_Due_Date']; ?></td>

                                                        <td><button type="button" class="btn btn-outline-primary" onclick="si_terk(<?php echo $id_instrumebt++ ?>)">add</button></td>


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
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-dismiss="modal">confirm</button>

                        </div>
                    </div>
                </div>
            </div>
        </form>
        <!--First Name:<input type="text" name="fname" id="fname"><br><br>-->
        <!--Last Name:<input type="text" name="lname" id="lname"><br><br>-->
        <!--Age:<input type="text" name="age" id="age"><br><br>-->
        <!-- ============================================================== -->
        <!-- footer   -->
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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/3.3.2/select2.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/js/bootstrap-select.js"></script>
<script src="https://cdn.ckeditor.com/4.5.1/standard/ckeditor.js"></script>
<script src="cloneData.js" type="text/javascript"></script>

<script>
    var id_t;

    function justOK(id) {
        var x = document.getElementById("terk_table").rows[id].cells;
        x[2].innerHTML = "OK";
        x[0].style.backgroundColor = "green";
        x[1].style.backgroundColor = "green";
        x[2].style.backgroundColor = "green";
        x[3].style.backgroundColor = "green";
        x[0].style.color = "white";
        x[1].style.color = "white";
        x[2].style.color = "white";
        x[3].style.color = "white";
    }

    function justNG(id) {
        var x = document.getElementById("terk_table").rows[id].cells;
        x[2].innerHTML = "NG";
        x[0].style.backgroundColor = "red";
        x[1].style.backgroundColor = "red";
        x[2].style.backgroundColor = "red";
        x[3].style.backgroundColor = "red";
        x[0].style.color = "black";
        x[1].style.color = "black";
        x[2].style.color = "black";
        x[3].style.color = "black"; //get_instrument
    }


    function get_instru_id(id) {

        id_t = id;
    }




    function si_terk(id) {

        var table = document.getElementById('instrument_table');
        var str1 = "instrument_";
        var str2 = id_t.toString();
        var res = str1.concat(str2);
        for (var i = 1; i < table.rows.length; i++) {
            table.rows[i].onclick = function() {
                //rIndex = this.rowIndex;
                document.getElementById(res).value = this.cells[0].innerHTML;
                //document.getElementById("lname").value = this.cells[1].innerHTML;
                // document.getElementById("age").value = this.cells[2].innerHTML;
                this.cells[0].style.backgroundColor = "#2ECC71 ";
                this.cells[1].style.backgroundColor = "#2ECC71 ";
                this.cells[2].style.backgroundColor = "#2ECC71 ";
                this.cells[3].style.backgroundColor = "#2ECC71 ";
                this.cells[4].style.backgroundColor = "#2ECC71 ";
                this.cells[5].style.backgroundColor = "#2ECC71 ";
            };
        }
    }
</script>


</script>
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