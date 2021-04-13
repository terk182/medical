
<?php include('partials-front/menu.php'); ?>
<?php


$part = $_GET['part'];
$inv = $_GET['inv'];
$lot = $_GET['lot'];
$rev = $_GET['rev'];
$search = $_GET['search'];  
$MN = $_GET['MN']; //MN


//echo $part;
////echo $inv;
//echo $lot;
//echo $rev;
//echo $search;
//echo $MN ;

if(isset($_SESSION['model']))
        {
            $model_check = $_SESSION['model'];
            echo $model_check;
        }
        else
        {
            echo $model_check;


        }
    
        if($model_check == "model1")
        {

            $Trace_peag_redirect = "Traceability.php";
            $request_peag_redirect = "request-search.php";

        }
        else if($model_check == "model2")
        {

            $Trace_peag_redirect = "Traceability1.php";
            $request_peag_redirect = "request-search1.php";
        }
        else if($model_check == "model3")
        {

            $Trace_peag_redirect = "Traceability2.php";
            $request_peag_redirect = "request-search2.php";

        }

?>
<div class="dashboard-wrapper">
    <div class="container-fluid  dashboard-content">
                <!-- ============================================================== -->
                <!-- pageheader -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="page-header">
                            <h2 class="pageheader-title">Z-Code Detail</h2>
                            
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href=<?php echo $Trace_peag_redirect;?>  class="breadcrumb-link">Dashboard</a></li>
                                        <li class="breadcrumb-item"><a href=<?php echo $request_peag_redirect;?>  class="breadcrumb-link"><?php echo $MN; ?></a></li>
                                        <li class="breadcrumb-item active" aria-current="page"><?php echo $part; ?> </li>
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
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered first">
                                            <thead>
                                                <tr>
                                                    <th>Code</th>
                                                    <th>Rev</th>
                                                    <th>Lot Number</th>
                                                    <th>Invoice</th>
                                                    <th>Inspector name</th>
                                                    <th>Approved by</th>
                                                    <th>Approved Date</th>
                                                    <th>Approved by</th>
                                                    <th>Inspection Detail</th>
                                                </tr>
                                            </thead>
                                                    <?php
                                                        if(isset($part))
                                                        {
                                                            
                                                            $db_select = mysqli_select_db($conn,'npt') ;
                                                            $sql = "SELECT * FROM `npt`.`receiving` WHERE Item_number = '$part'AND Lot_number = '$lot' AND Invoice_number = '$inv';";  //AND  Revision = '$rev'
    
                                                            $res = mysqli_query($conn,$sql);
                                                            $count = mysqli_num_rows($res);
                                                            if($count>0)
                                                            {
                                                                while($data = mysqli_fetch_array($res))
                                                                {
                                                                   
                                                                    $sql_inspec = "SELECT * FROM `npt`.`qc_inspection_result` WHERE ItemNo = '$part'AND LotNo = '$lot'AND InvoiceNo = '$inv' ;";  //AND  Revision = '$rev'
                                                                    $res_inspec = mysqli_query($conn,$sql_inspec);
                                                                    $count_inspec = mysqli_num_rows($res_inspec);
                                                                    if($count_inspec>0)
                                                                    {
                                                                        while($data_inspec = mysqli_fetch_array($res_inspec))
                                                                        {
                                                                            echo '<tr>';
                                                                            echo '<td>'.$data['Item_number'].'</td>';
                                                                            echo '<td>'.$data['Revision'].'</td>';
                                                                            echo '<td>'.$data['Lot_number'].'</td>';
                                                                            echo '<td>'.$data['Invoice_number'].'</td>';
                                                                            echo '<td>'.$data_inspec['Ajudge'].'</td>';
                                                                            echo '<td>'.$data_inspec['Inspector'].'</td>';
                                                                            echo '<td>'.$data_inspec['Approved'].'</td>';
                                                                            echo '<td>'.$data_inspec['Update_date'].'</td>';
                                                                            echo '<td>'.$data_inspec['AInspection'].'</td>';
                                                                            echo '</tr>';
        
                                                                        }

                                                                    }
                                                                    
                                                                   

                                                                }
                                                            }
                                                            else
                                                            {
                                                                
                                                               // header("Location:".SITEURL.'process_value.php');
                                                            }
                                                            

                                                        }else 
                                                        {
                                                            //header("Location:".SITEURL.'process_value.php');
                                                        }








                                                    ?>
                                                <tbody> 

                                            </tbody>
                                          
                                       
                                        </table>

                                    </div>  
                                </div>
                               
                                      
                            </div>
                            <a href=<?php echo $request_peag_redirect;?> class="btn btn-primary" role="button">Back</a>
                        </div>  
             </div>
        </div>
        
    </div> 
 


    


 


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