<?php include('partials-front/menu.php'); ?>

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





?>

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
                                <li class="breadcrumb-item"><a href="process_list.php" class="breadcrumb-link">Process list</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Process list</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">
                    <div class="card-body">
                        <form action="#" method="POST">

                            <input type="search" name="search" placeholder="Search.." required>
                            <input type="submit" name="submit" value="ค้นหา" class="btn btn-primary">
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <!-- ============================================================== -->
            <!-- basic table  -->
            <!-- ============================================================== -->
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">
                    <h5 class="card-header">Part Rev</h5>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered first">
                                <thead>
                                    <tr>
                                        <th>Standard</th>
                                        <th>AuthorizerID</th>
                                        <th>Standard_Revision</th>
                                        <th>z_revision</th>
                                        <th>new</th>
                                        <th>Inspec</th>
                                    </tr>
                                </thead>
                                <tbody>


                                    <?php


                                    if (isset($_POST['submit'])) {


                                        $check_submit  = true;


                                        $code = $_POST['search'];
                                        $status = str_replace("Z", "Q", $code);

                                        $zcode = new DB_con();
                                        $sql = $zcode->zcode_a($status);

                                        while ($row = mysqli_fetch_array($sql)) {

                                            $Standard =  $row['Standard'];
                                            $AuthorizerID =  $row['AuthorizerID'];
                                            $Standard_Revision =  $row['Standard_Revision'];
                                            $z_revision =  $row['z_revision'];
                                            $new =  $row['new'];
                                            if (!empty($AuthorizerID)) {
                                                if ($new == "Obsolete Rev.") {
                                                    echo '<tr class="table-danger">';
                                                } else {
                                                    echo '<tr>';
                                                }
                                    ?>
                                                <td><?php echo $Standard; ?></td>
                                                <td><?php echo $AuthorizerID; ?></td>
                                                <td><?php echo $Standard_Revision; ?></td>
                                                <td><?php echo $z_revision; ?></td>
                                                <td><?php echo $new; ?></td>
                                                <?php
                                                if ($new !== "Obsolete Rev.") {
                                                    echo '<td>';
                                                    echo '<a href=qc_check.php?standard=' . $Standard . '&st_rev=' . $z_revision . ' class="btn btn-primary">Inspection</a>';
                                                    echo '</td>';
                                                } else {
                                                    echo '<td>';
                                                    echo '<a href=qc_check.php?standard=' . $Standard . '&st_rev=' . $z_revision . ' class="btn btn-primary">Inspection</a>';
                                                    echo '</td>';
                                                }


                                                ?>






                                                </tr>
                                    <?php
                                            }
                                        }
                                    } else {;
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
    <!-- ============================================================== -->
    <!-- footer -->
    <!-- ============================================================== -->

    <!-- ============================================================== -->
    <!-- end footer -->
    <!-- ============================================================== -->
</div>
<?php

echo  $Standard;
echo  $AuthorizerID;
echo  $Standard_Revision;
echo  $z_revision;
echo  $new;

?>
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