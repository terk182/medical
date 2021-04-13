
<?php include('partials-front/menu.php'); 


?>

<div class="dashboard-wrapper">
    <div class="container-fluid  dashboard-content">
                <!-- ============================================================== -->
                <!-- pageheader -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="page-header">
                            <h2 class="pageheader-title">Process Value</h2>
                            <p class="pageheader-text">Proin placerat ante duiullam scelerisque a velit ac porta, fusce sit amet vestibulum mi. Morbi lobortis pulvinar quam.</p>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="index.php" class="breadcrumb-link">Dashboard</a></li>
                                        <li class="breadcrumb-item"><a href="process_value.php" class="breadcrumb-link">Process Value</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Process Value List</li>
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
                                                    <th>item_name</th>
                                                    <th>min</th>
                                                    <th>max</th>
                                                    <th>unit</th>
                                                    <th>judgement_method</th>
                                                    <th>status</th>
                                                </tr>
                                            </thead>
                                            <tbody> 
                                                    <?php
                                                        if(isset($_GET['id']))
                                                        {
                                                            $db = $_GET['db'];
                                                            $id = $_GET['id'];
                                                            $db_select = mysqli_select_db($conn,$db) ; 
                                                            $sql = "SELECT * FROM process_value WHERE process_id = $id";
    
                                                            $res = mysqli_query($conn,$sql);
                                                            $count = mysqli_num_rows($res);
                                                            if($count>0)
                                                            {
                                                                while($data = mysqli_fetch_array($res))
                                                                {
                                                                    echo '<tr>';
                                                                    echo '<td>'.$data['item_name'].'</td>';
                                                                    echo '<td>'.$data['min'].'</td>';
                                                                    echo '<td>'.$data['max'].'</td>';
                                                                    echo '<td>'.$data['unit'].'</td>';
                                                                    echo '<td>'.$data['judgement_method'].'</td>';
                                                                    echo '<td>'.$data['status'].'</td>';
                                                                    echo '</tr>';

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
                                            </tbody>
                                          
                                       
                                        </table>

                                    </div>  
                                </div>
                               
                                      
                            </div>
                            <a href="process_value.php?db=<?php echo $db ?>" class="btn btn-primary" role="button">Back</a>
                        </div>  
             </div>
        </div>
        
    </div> 
    </div>    


    


 


<?php include('partials-front/footer.php'); ?>