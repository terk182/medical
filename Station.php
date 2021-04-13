<?php include('partials-front/menu.php'); 
if(isset($_GET['db']))
{
    $db = $_GET['db'];
}
else
{
    $db = "npt-baxter-lvp";
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
                            <h2 class="pageheader-title">Station Detail</h2>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="index.php" class="breadcrumb-link">Dashboard</a></li>
                                        <li class="breadcrumb-item"><a href="Station.php" class="breadcrumb-link">Staton Detail</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Data Tables</li>
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
                        <div class="card-header">
                                <h5 class="mb-0">Instrument</h5>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered first">
                                        <thead>
                                            <tr>
                                                <th>Station_name</th>
                                                <th>Process_name</th>
                                                <!--<th>Computer_name</th>-->
                                                <th>instrument1</th>
                                                <th>instrument2</th>
                                                <th>instrument3</th>
                                                <th>instrument4</th>
                                                <th>instrument5</th>
                                                <th>instrument6</th>
                                                <th>instrument7</th>
                                                <th>instrument8</th>
                                                <th>instrument9</th>
                                                <th>instrument10</th>
                                                
                                        
                                            </tr>
                                        </thead>
                                        <tbody> 
                                        <?php
                                                        
                                                       // $process_str1 = "/process/i";
                                                      //  $process_str2 = "/inspection/i";
                                                        $assocArr = array();
                                                        $pic_array = array();
                                                        $db_select = mysqli_select_db($conn,$db ) ; 
                                                        $sql_all = 'SELECT T1.station_name ,T2.process_name,T1.instrument_id_1,T1.instrument_id_2,T1.instrument_id_3,T1.instrument_id_4,T1.instrument_id_5,T1.instrument_id_6,T1.instrument_id_7,T1.instrument_id_8,T1.instrument_id_9,T1.instrument_id_10    FROM station T1 LEFT JOIN process T2 ON T2.id = T1.process_id ' ;
                                                        $result_all = mysqli_query($conn,$sql_all);
                                                        while($data = mysqli_fetch_array($result_all))
                                                        {
                                                            
                                                            
                                                                echo '<tr>';
                                                                echo '<td>'.$data['station_name'].'</td>';
                                                                echo '<td>'.$data['process_name'].'</td>';
                                                              //  echo '<td>'.$data['computer_name'].'</td>';

                                                                $data_v =  $data['instrument_id_1'];
                                                              
                                                                    $db_select = mysqli_select_db($conn,'npt') ; 
                                                                    $sql_cal = "SELECT Equipment_name,Control_No,Serial_No,Cal_Due_Date FROM `npt`.`calibration_list` WHERE id = '$data_v' ";
                                                                    $result_cal = mysqli_query($conn,$sql_cal);
                                                                    $count = mysqli_num_rows($result_cal);
                                                                    if($count==1)
                                                                    {
                                                                        $row = mysqli_fetch_assoc($result_cal);
                                                                        $Equipment_name = $row['Equipment_name'];
                                                                        $Control_No = $row['Control_No'];
                                                                        $Serial_No = $row['Serial_No'];
                                                                        $CalDate = $row['Cal_Due_Date'];
                                                                        

                                                                        echo '<td>'.'<table>'.'<thead class="table-info"">
                                                                        <tr>
                                                                            <th>Equipment_name</th>
                                                                            <th>Control_No</th>
                                                                            <th>Cal_Due_Date</th><th>Serial_No</th>'. '<tr>'.'<td>'.$Equipment_name.'</td>'.'<td>'.$Control_No.'</td>'.'<td>'.$CalDate.'</td>'.'<td>'.$Serial_No.'</td>'. '</tr>'.'</table>';
                                                                        
                                                                    }
                                                                    else{
                                                                        echo '<td>'.$data['instrument_id_1'].'</td>';
                                                                    }

                                                                    $data_v =  $data['instrument_id_2'];
                                                              
                                                                    $db_select = mysqli_select_db($conn,'npt') ; 
                                                                    $sql_cal = "SELECT Equipment_name,Control_No,Serial_No,Cal_Due_Date FROM `npt`.`calibration_list` WHERE id = '$data_v' ";
                                                                    $result_cal = mysqli_query($conn,$sql_cal);
                                                                    $count = mysqli_num_rows($result_cal);
                                                                    if($count==1)
                                                                    {
                                                                        $row = mysqli_fetch_assoc($result_cal);
                                                                        $Equipment_name = $row['Equipment_name'];
                                                                        $Control_No = $row['Control_No'];
                                                                        $Serial_No = $row['Serial_No'];
                                                                        $CalDate = $row['Cal_Due_Date'];
                                                                        

                                                                        echo '<td>'.'<table>'.'<thead class="table-info">
                                                                        <tr>
                                                                            <th>Equipment_name</th>
                                                                            <th>Control_No</th>
                                                                            <th>Cal_Due_Date</th><th>Serial_No</th>'. '<tr>'.'<td>'.$Equipment_name.'</td>'.'<td>'.$Control_No.'</td>'.'<td>'.$CalDate.'</td>'.'<td>'.$Serial_No.'</td>'. '</tr>'.'</table>';
                                                                        
                                                                    }
                                                                    else{
                                                                        echo '<td>'.$data['instrument_id_2'].'</td>';
                                                                    }

                                                                    $data_v =  $data['instrument_id_3'];
                                                              
                                                                    $db_select = mysqli_select_db($conn,'npt') ; 
                                                                    $sql_cal = "SELECT Equipment_name,Control_No,Serial_No,Cal_Due_Date FROM `npt`.`calibration_list` WHERE id = '$data_v' ";
                                                                    $result_cal = mysqli_query($conn,$sql_cal);
                                                                    $count = mysqli_num_rows($result_cal);
                                                                    if($count==1)
                                                                    {
                                                                        $row = mysqli_fetch_assoc($result_cal);
                                                                        $Equipment_name = $row['Equipment_name'];
                                                                        $Control_No = $row['Control_No'];
                                                                        $Serial_No = $row['Serial_No'];
                                                                        $CalDate = $row['Cal_Due_Date'];
                                                                        

                                                                        echo '<td>'.'<table>'.'<thead class="table-info">
                                                                        <tr>
                                                                            <th>Equipment_name</th>
                                                                            <th>Control_No</th>
                                                                            <th>Cal_Due_Date</th><th>Serial_No</th>'. '<tr>'.'<td>'.$Equipment_name.'</td>'.'<td>'.$Control_No.'</td>'.'<td>'.$CalDate.'</td>'.'<td>'.$Serial_No.'</td>'. '</tr>'.'</table>';
                                                                        
                                                                    }
                                                                    else{
                                                                        echo '<td>'.$data['instrument_id_3'].'</td>';
                                                                    }


                                                                    $data_v =  $data['instrument_id_4'];
                                                              
                                                                    $db_select = mysqli_select_db($conn,'npt') ; 
                                                                    $sql_cal = "SELECT Equipment_name,Control_No,Serial_No,Cal_Due_Date FROM `npt`.`calibration_list` WHERE id = '$data_v' ";
                                                                    $result_cal = mysqli_query($conn,$sql_cal);
                                                                    $count = mysqli_num_rows($result_cal);
                                                                    if($count==1)
                                                                    {
                                                                        $row = mysqli_fetch_assoc($result_cal);
                                                                        $Equipment_name = $row['Equipment_name'];
                                                                        $Control_No = $row['Control_No'];
                                                                        $Serial_No = $row['Serial_No'];
                                                                        $CalDate = $row['Cal_Due_Date'];
                                                                        

                                                                        echo '<td>'.'<table>'.'<thead class="table-info">
                                                                        <tr>
                                                                            <th>Equipment_name</th>
                                                                            <th>Control_No</th>
                                                                            <th>Cal_Due_Date</th><th>Serial_No</th>'. '<tr>'.'<td>'.$Equipment_name.'</td>'.'<td>'.$Control_No.'</td>'.'<td>'.$CalDate.'</td>'.'<td>'.$Serial_No.'</td>'. '</tr>'.'</table>';
                                                                        
                                                                    }
                                                                    else{
                                                                        echo '<td>'.$data['instrument_id_4'].'</td>';
                                                                    }

                                                                    $data_v =  $data['instrument_id_5'];
                                                              
                                                                    $db_select = mysqli_select_db($conn,'npt') ; 
                                                                    $sql_cal = "SELECT Equipment_name,Control_No,Serial_No,Cal_Due_Date FROM `npt`.`calibration_list` WHERE id = '$data_v' ";
                                                                    $result_cal = mysqli_query($conn,$sql_cal);
                                                                    $count = mysqli_num_rows($result_cal);
                                                                    if($count==1)
                                                                    {
                                                                        $row = mysqli_fetch_assoc($result_cal);
                                                                        $Equipment_name = $row['Equipment_name'];
                                                                        $Control_No = $row['Control_No'];
                                                                        $Serial_No = $row['Serial_No'];
                                                                        $CalDate = $row['Cal_Due_Date'];
                                                                        

                                                                        echo '<td>'.'<table>'.'<thead class="table-info">
                                                                        <tr>
                                                                            <th>Equipment_name</th>
                                                                            <th>Control_No</th>
                                                                            <th>Cal_Due_Date</th><th>Serial_No</th>'. '<tr>'.'<td>'.$Equipment_name.'</td>'.'<td>'.$Control_No.'</td>'.'<td>'.$CalDate.'</td>'.'<td>'.$Serial_No.'</td>'. '</tr>'.'</table>';
                                                                        
                                                                    }
                                                                    else{
                                                                        echo '<td>'.$data['instrument_id_5'].'</td>';
                                                                    }


                                                                    $data_v =  $data['instrument_id_6'];
                                                              
                                                                    $db_select = mysqli_select_db($conn,'npt') ; 
                                                                    $sql_cal = "SELECT Equipment_name,Control_No,Serial_No,Cal_Due_Date FROM `npt`.`calibration_list` WHERE id = '$data_v' ";
                                                                    $result_cal = mysqli_query($conn,$sql_cal);
                                                                    $count = mysqli_num_rows($result_cal);
                                                                    if($count==1)
                                                                    {
                                                                        $row = mysqli_fetch_assoc($result_cal);
                                                                        $Equipment_name = $row['Equipment_name'];
                                                                        $Control_No = $row['Control_No'];
                                                                        $Serial_No = $row['Serial_No'];
                                                                        $CalDate = $row['Cal_Due_Date'];
                                                                        

                                                                        echo '<td>'.'<table>'.'<thead class="table-info">
                                                                        <tr>
                                                                            <th>Equipment_name</th>
                                                                            <th>Control_No</th>
                                                                            <th>Cal_Due_Date</th><th>Serial_No</th>'. '<tr>'.'<td>'.$Equipment_name.'</td>'.'<td>'.$Control_No.'</td>'.'<td>'.$CalDate.'</td>'.'<td>'.$Serial_No.'</td>'. '</tr>'.'</table>';
                                                                        
                                                                    }
                                                                    else{
                                                                        echo '<td>'.$data['instrument_id_6'].'</td>';
                                                                    }

                                                                    $data_v =  $data['instrument_id_7'];
                                                              
                                                                    $db_select = mysqli_select_db($conn,'npt') ; 
                                                                    $sql_cal = "SELECT Equipment_name,Control_No,Serial_No,Cal_Due_Date FROM `npt`.`calibration_list` WHERE id = '$data_v' ";
                                                                    $result_cal = mysqli_query($conn,$sql_cal);
                                                                    $count = mysqli_num_rows($result_cal);
                                                                    if($count==1)
                                                                    {
                                                                        $row = mysqli_fetch_assoc($result_cal);
                                                                        $Equipment_name = $row['Equipment_name'];
                                                                        $Control_No = $row['Control_No'];
                                                                        $Serial_No = $row['Serial_No'];
                                                                        $CalDate = $row['Cal_Due_Date'];
                                                                        

                                                                        echo '<td>'.'<table>'.'<thead class="table-info">
                                                                        <tr>
                                                                            <th>Equipment_name</th>
                                                                            <th>Control_No</th>
                                                                            <th>Cal_Due_Date</th><th>Serial_No</th>'. '<tr>'.'<td>'.$Equipment_name.'</td>'.'<td>'.$Control_No.'</td>'.'<td>'.$CalDate.'</td>'.'<td>'.$Serial_No.'</td>'. '</tr>'.'</table>';
                                                                        
                                                                    }
                                                                    else{
                                                                        echo '<td>'.$data['instrument_id_7'].'</td>';
                                                                    }

                                                                    $data_v =  $data['instrument_id_8'];
                                                              
                                                                    $db_select = mysqli_select_db($conn,'npt') ; 
                                                                    $sql_cal = "SELECT Equipment_name,Control_No,Serial_No,Cal_Due_Date FROM `npt`.`calibration_list` WHERE id = '$data_v' ";
                                                                    $result_cal = mysqli_query($conn,$sql_cal);
                                                                    $count = mysqli_num_rows($result_cal);
                                                                    if($count==1)
                                                                    {
                                                                        $row = mysqli_fetch_assoc($result_cal);
                                                                        $Equipment_name = $row['Equipment_name'];
                                                                        $Control_No = $row['Control_No'];
                                                                        $Serial_No = $row['Serial_No'];
                                                                        $CalDate = $row['Cal_Due_Date'];
                                                                        

                                                                        echo '<td>'.'<table>'.'<thead class="table-info">
                                                                        <tr>
                                                                            <th>Equipment_name</th>
                                                                            <th>Control_No</th>
                                                                            <th>Cal_Due_Date</th><th>Serial_No</th>'. '<tr>'.'<td>'.$Equipment_name.'</td>'.'<td>'.$Control_No.'</td>'.'<td>'.$CalDate.'</td>'.'<td>'.$Serial_No.'</td>'. '</tr>'.'</table>';
                                                                        
                                                                    }
                                                                    else{
                                                                        echo '<td>'.$data['instrument_id_8'].'</td>';
                                                                    }

                                                                    $data_v =  $data['instrument_id_9'];
                                                              
                                                                    $db_select = mysqli_select_db($conn,'npt') ; 
                                                                    $sql_cal = "SELECT Equipment_name,Control_No,Serial_No,Cal_Due_Date FROM `npt`.`calibration_list` WHERE id = '$data_v' ";
                                                                    $result_cal = mysqli_query($conn,$sql_cal);
                                                                    $count = mysqli_num_rows($result_cal);
                                                                    if($count==1)
                                                                    {
                                                                        $row = mysqli_fetch_assoc($result_cal);
                                                                        $Equipment_name = $row['Equipment_name'];
                                                                        $Control_No = $row['Control_No'];
                                                                        $Serial_No = $row['Serial_No'];
                                                                        $CalDate = $row['Cal_Due_Date'];
                                                                        

                                                                        echo '<td>'.'<table>'.'<thead class="table-info">
                                                                        <tr>
                                                                            <th>Equipment_name</th>
                                                                            <th>Control_No</th>
                                                                            <th>Cal_Due_Date</th><th>Serial_No</th>'. '<tr>'.'<td>'.$Equipment_name.'</td>'.'<td>'.$Control_No.'</td>'.'<td>'.$CalDate.'</td>'.'<td>'.$Serial_No.'</td>'. '</tr>'.'</table>';
                                                                        
                                                                    }
                                                                    else{
                                                                        echo '<td>'.$data['instrument_id_9'].'</td>';
                                                                    }

                                                                    $data_v =  $data['instrument_id_10'];
                                                              
                                                                    $db_select = mysqli_select_db($conn,'npt') ; 
                                                                    $sql_cal = "SELECT Equipment_name,Control_No,Serial_No,Cal_Due_Date FROM `npt`.`calibration_list` WHERE id = '$data_v' ";
                                                                    $result_cal = mysqli_query($conn,$sql_cal);
                                                                    $count = mysqli_num_rows($result_cal);
                                                                    if($count==1)
                                                                    {
                                                                        $row = mysqli_fetch_assoc($result_cal);
                                                                        $Equipment_name = $row['Equipment_name'];
                                                                        $Control_No = $row['Control_No'];
                                                                        $Serial_No = $row['Serial_No'];
                                                                        $CalDate = $row['Cal_Due_Date'];
                                                                        

                                                                        echo '<td>'.'<table>'.'<thead class="table-info">
                                                                        <tr>
                                                                            <th>Equipment_name</th>
                                                                            <th>Control_No</th>
                                                                            <th>Cal_Due_Date</th><th>Serial_No</th>'. '<tr>'.'<td>'.$Equipment_name.'</td>'.'<td>'.$Control_No.'</td>'.'<td>'.$CalDate.'</td>'.'<td>'.$Serial_No.'</td>'. '</tr>'.'</table>';
                                                                        
                                                                    }
                                                                    else{
                                                                        echo '<td>'.$data['instrument_id_10'].'</td>';
                                                                    }


                                                                   

                                                                echo '</tr>';
                                                           
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
                    <!-- ============================================================== -->
                    <!-- data table  -->
                    <!-- ============================================================== -->
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="mb-0">Tool</h5>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered first">
                                        <thead>
                                            <tr>
                                            <tr>
                                                <th>Station_name</th>
                                                <th>Process_name</th>
                                                <!--<th>Computer_name</th>-->
                                                <th>tool1</th>
                                                <th>tool2</th>
                                                <th>tool3</th>
                                                <th>tool4</th>
                                                <th>tool5</th>
                                                <th>tool6</th>
                                                <th>tool7</th>
                                                <th>tool8</th>
                                                <th>tool9</th>
                                                <th>tool10</th>
                                                
                                        
                                            </tr>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                                        
                                                       // $process_str1 = "/process/i";
                                                      //  $process_str2 = "/inspection/i";
                                                        $assocArr = array();
                                                        $pic_array = array();
                                                        $db_select = mysqli_select_db($conn,'npt-baxter-lvp') ; 
                                                        $sql_tool = 'SELECT T1.station_name ,T2.process_name,T3.name AS computer_name ,T1.tool_id_1,T1.tool_id_2,T1.tool_id_3,T1.tool_id_4,T1.tool_id_5,T1.tool_id_6,T1.tool_id_7,T1.tool_id_8,T1.tool_id_9,T1.tool_id_10   FROM station T1 LEFT JOIN process T2 ON T2.id = T1.process_id LEFT JOIN computer T3 ON T3.id = T1.computer_id' ;
                                                        $result_tool = mysqli_query($conn,$sql_tool);
                                                        while($data1 = mysqli_fetch_array($result_tool))
                                                        {
                                                            
                                                            
                                                                echo '<tr>';
                                                                        echo '<td>'.$data1['station_name'].'</td>';
                                                                        echo '<td>'.$data1['process_name'].'</td>';
                                                                       // echo '<td>'.$data1['computer_name'].'</td>';
                                                                        $data_v =  $data1['tool_id_1'];
                                                              
                                                                        $db_select = mysqli_select_db($conn,'npt') ; 
                                                                        $sql_cal = "SELECT Equipment_name,Control_No,Serial_No FROM `npt`.`calibration_list` WHERE id = '$data_v' ";
                                                                        $result_cal = mysqli_query($conn,$sql_cal);
                                                                        $count = mysqli_num_rows($result_cal);
                                                                        if($count==1)
                                                                        {
                                                                            $row = mysqli_fetch_assoc($result_cal);
                                                                            $Equipment_name = $row['Equipment_name'];
                                                                            $Control_No = $row['Control_No'];
                                                                            $Serial_No = $row['Serial_No'];
                                                                            

                                                                            echo '<td>'.'<table>'.'<thead class="table-success">
                                                                            <tr>
                                                                                <th>Equipment_name</th>
                                                                                <th>Control_No</th>
                                                                                <th>Serial_No</th>'. '<tr>'.'<td>'.$Equipment_name.'</td>'.'<td>'.$Control_No.'</td>'.'<td>'.$Serial_No.'</td>'. '<tr>'.'</table>';
                                                                            
                                                                        }
                                                                        else{
                                                                            echo '<td>'.$data1['tool_id_1'].'</td>';
                                                                        }
                                                                        

                                                                        $data_v =  $data1['tool_id_2'];
                                                              
                                                                        $db_select = mysqli_select_db($conn,'npt') ; 
                                                                        $sql_cal = "SELECT Equipment_name,Control_No,Serial_No FROM `npt`.`calibration_list` WHERE id = '$data_v' ";
                                                                        $result_cal = mysqli_query($conn,$sql_cal);
                                                                        $count = mysqli_num_rows($result_cal);
                                                                        if($count==1)
                                                                        {
                                                                            $row = mysqli_fetch_assoc($result_cal);
                                                                            $Equipment_name = $row['Equipment_name'];
                                                                            $Control_No = $row['Control_No'];
                                                                            $Serial_No = $row['Serial_No'];
                                                                            

                                                                            echo '<td>'.'<table>'.'<thead class="table-success">
                                                                            <tr>
                                                                                <th>Equipment_name</th>
                                                                                <th>Control_No</th>
                                                                                <th>Serial_No</th>'. '<tr>'.'<td>'.$Equipment_name.'</td>'.'<td>'.$Control_No.'</td>'.'<td>'.$Serial_No.'</td>'. '<tr>'.'</table>';
                                                                            
                                                                        }
                                                                        else{
                                                                            echo '<td>'.$data1['tool_id_2'].'</td>';
                                                                        }


                                                                        $data_v =  $data1['tool_id_3'];
                                                              
                                                                        $db_select = mysqli_select_db($conn,'npt') ; 
                                                                        $sql_cal = "SELECT Equipment_name,Control_No,Serial_No FROM `npt`.`calibration_list` WHERE id = '$data_v' ";
                                                                        $result_cal = mysqli_query($conn,$sql_cal);
                                                                        $count = mysqli_num_rows($result_cal);
                                                                        if($count==1)
                                                                        {
                                                                            $row = mysqli_fetch_assoc($result_cal);
                                                                            $Equipment_name = $row['Equipment_name'];
                                                                            $Control_No = $row['Control_No'];
                                                                            $Serial_No = $row['Serial_No'];
                                                                            

                                                                            echo '<td>'.'<table>'.'<thead class="table-success">
                                                                            <tr>
                                                                                <th>Equipment_name</th>
                                                                                <th>Control_No</th>
                                                                                <th>Serial_No</th>'. '<tr>'.'<td>'.$Equipment_name.'</td>'.'<td>'.$Control_No.'</td>'.'<td>'.$Serial_No.'</td>'. '<tr>'.'</table>';
                                                                            
                                                                        }
                                                                        else{
                                                                            echo '<td>'.$data1['tool_id_3'].'</td>';
                                                                        }
                                                                        

                                                                        $data_v =  $data1['tool_id_4'];
                                                              
                                                                        $db_select = mysqli_select_db($conn,'npt') ; 
                                                                        $sql_cal = "SELECT Equipment_name,Control_No,Serial_No FROM `npt`.`calibration_list` WHERE id = '$data_v' ";
                                                                        $result_cal = mysqli_query($conn,$sql_cal);
                                                                        $count = mysqli_num_rows($result_cal);
                                                                        if($count==1)
                                                                        {
                                                                            $row = mysqli_fetch_assoc($result_cal);
                                                                            $Equipment_name = $row['Equipment_name'];
                                                                            $Control_No = $row['Control_No'];
                                                                            $Serial_No = $row['Serial_No'];
                                                                            

                                                                            echo '<td>'.'<table>'.'<thead class="table-success">
                                                                            <tr>
                                                                                <th>Equipment_name</th>
                                                                                <th>Control_No</th>
                                                                                <th>Serial_No</th>'. '<tr>'.'<td>'.$Equipment_name.'</td>'.'<td>'.$Control_No.'</td>'.'<td>'.$Serial_No.'</td>'. '<tr>'.'</table>';
                                                                            
                                                                        }
                                                                        else{
                                                                            echo '<td>'.$data1['tool_id_4'].'</td>';
                                                                        }
                                                                        

                                                                        $data_v =  $data1['tool_id_5'];
                                                              
                                                                        $db_select = mysqli_select_db($conn,'npt') ; 
                                                                        $sql_cal = "SELECT Equipment_name,Control_No,Serial_No FROM `npt`.`calibration_list` WHERE id = '$data_v' ";
                                                                        $result_cal = mysqli_query($conn,$sql_cal);
                                                                        $count = mysqli_num_rows($result_cal);
                                                                        if($count==1)
                                                                        {
                                                                            $row = mysqli_fetch_assoc($result_cal);
                                                                            $Equipment_name = $row['Equipment_name'];
                                                                            $Control_No = $row['Control_No'];
                                                                            $Serial_No = $row['Serial_No'];
                                                                            

                                                                            echo '<td>'.'<table>'.'<thead class="table-success">
                                                                            <tr>
                                                                                <th>Equipment_name</th>
                                                                                <th>Control_No</th>
                                                                                <th>Serial_No</th>'. '<tr>'.'<td>'.$Equipment_name.'</td>'.'<td>'.$Control_No.'</td>'.'<td>'.$Serial_No.'</td>'. '<tr>'.'</table>';
                                                                            
                                                                        }
                                                                        else{
                                                                            echo '<td>'.$data1['tool_id_5'].'</td>';
                                                                        }
                                                                        

                                                                        $data_v =  $data1['tool_id_6'];
                                                              
                                                                        $db_select = mysqli_select_db($conn,'npt') ; 
                                                                        $sql_cal = "SELECT Equipment_name,Control_No,Serial_No FROM `npt`.`calibration_list` WHERE id = '$data_v' ";
                                                                        $result_cal = mysqli_query($conn,$sql_cal);
                                                                        $count = mysqli_num_rows($result_cal);
                                                                        if($count==1)
                                                                        {
                                                                            $row = mysqli_fetch_assoc($result_cal);
                                                                            $Equipment_name = $row['Equipment_name'];
                                                                            $Control_No = $row['Control_No'];
                                                                            $Serial_No = $row['Serial_No'];
                                                                            

                                                                            echo '<td>'.'<table>'.'<thead class="table-success">
                                                                            <tr>
                                                                                <th>Equipment_name</th>
                                                                                <th>Control_No</th>
                                                                                <th>Serial_No</th>'. '<tr>'.'<td>'.$Equipment_name.'</td>'.'<td>'.$Control_No.'</td>'.'<td>'.$Serial_No.'</td>'. '<tr>'.'</table>';
                                                                            
                                                                        }
                                                                        else{
                                                                            echo '<td>'.$data1['tool_id_6'].'</td>';
                                                                        }
                                                                        

                                                                        $data_v =  $data1['tool_id_7'];
                                                              
                                                                        $db_select = mysqli_select_db($conn,'npt') ; 
                                                                        $sql_cal = "SELECT Equipment_name,Control_No,Serial_No FROM `npt`.`calibration_list` WHERE id = '$data_v' ";
                                                                        $result_cal = mysqli_query($conn,$sql_cal);
                                                                        $count = mysqli_num_rows($result_cal);
                                                                        if($count==1)
                                                                        {
                                                                            $row = mysqli_fetch_assoc($result_cal);
                                                                            $Equipment_name = $row['Equipment_name'];
                                                                            $Control_No = $row['Control_No'];
                                                                            $Serial_No = $row['Serial_No'];
                                                                            

                                                                            echo '<td>'.'<table>'.'<thead class="table-success">
                                                                            <tr>
                                                                                <th>Equipment_name</th>
                                                                                <th>Control_No</th>
                                                                                <th>Serial_No</th>'. '<tr>'.'<td>'.$Equipment_name.'</td>'.'<td>'.$Control_No.'</td>'.'<td>'.$Serial_No.'</td>'. '<tr>'.'</table>';
                                                                            
                                                                        }
                                                                        else{
                                                                            echo '<td>'.$data1['tool_id_7'].'</td>';
                                                                        }
                                                                        

                                                                        $data_v =  $data1['tool_id_8'];
                                                              
                                                                        $db_select = mysqli_select_db($conn,'npt') ; 
                                                                        $sql_cal = "SELECT Equipment_name,Control_No,Serial_No FROM `npt`.`calibration_list` WHERE id = '$data_v' ";
                                                                        $result_cal = mysqli_query($conn,$sql_cal);
                                                                        $count = mysqli_num_rows($result_cal);
                                                                        if($count==1)
                                                                        {
                                                                            $row = mysqli_fetch_assoc($result_cal);
                                                                            $Equipment_name = $row['Equipment_name'];
                                                                            $Control_No = $row['Control_No'];
                                                                            $Serial_No = $row['Serial_No'];
                                                                            

                                                                            echo '<td>'.'<table>'.'<thead class="table-success">
                                                                            <tr>
                                                                                <th>Equipment_name</th>
                                                                                <th>Control_No</th>
                                                                                <th>Serial_No</th>'. '<tr>'.'<td>'.$Equipment_name.'</td>'.'<td>'.$Control_No.'</td>'.'<td>'.$Serial_No.'</td>'. '<tr>'.'</table>';
                                                                            
                                                                        }
                                                                        else{
                                                                            echo '<td>'.$data1['tool_id_8'].'</td>';
                                                                        }
                                                                        

                                                                        $data_v =  $data1['tool_id_9'];
                                                              
                                                                        $db_select = mysqli_select_db($conn,'npt') ; 
                                                                        $sql_cal = "SELECT Equipment_name,Control_No,Serial_No FROM `npt`.`calibration_list` WHERE id = '$data_v' ";
                                                                        $result_cal = mysqli_query($conn,$sql_cal);
                                                                        $count = mysqli_num_rows($result_cal);
                                                                        if($count==1)
                                                                        {
                                                                            $row = mysqli_fetch_assoc($result_cal);
                                                                            $Equipment_name = $row['Equipment_name'];
                                                                            $Control_No = $row['Control_No'];
                                                                            $Serial_No = $row['Serial_No'];
                                                                            

                                                                            echo '<td>'.'<table>'.'<thead class="table-success">
                                                                            <tr>
                                                                                <th>Equipment_name</th>
                                                                                <th>Control_No</th>
                                                                                <th>Serial_No</th>'. '<tr>'.'<td>'.$Equipment_name.'</td>'.'<td>'.$Control_No.'</td>'.'<td>'.$Serial_No.'</td>'. '<tr>'.'</table>';
                                                                            
                                                                        }
                                                                        else{
                                                                            echo '<td>'.$data1['tool_id_9'].'</td>';
                                                                        }
                                                                        

                                                                        $data_v =  $data1['tool_id_10'];
                                                              
                                                                        $db_select = mysqli_select_db($conn,'npt') ; 
                                                                        $sql_cal = "SELECT Equipment_name,Control_No,Serial_No FROM `npt`.`calibration_list` WHERE id = '$data_v' ";
                                                                        $result_cal = mysqli_query($conn,$sql_cal);
                                                                        $count = mysqli_num_rows($result_cal);
                                                                        if($count==1)
                                                                        {
                                                                            $row = mysqli_fetch_assoc($result_cal);
                                                                            $Equipment_name = $row['Equipment_name'];
                                                                            $Control_No = $row['Control_No'];
                                                                            $Serial_No = $row['Serial_No'];
                                                                            

                                                                            echo '<td>'.'<table>'.'<thead class="table-success">
                                                                            <tr>
                                                                                <th>Equipment_name</th>
                                                                                <th>Control_No</th>
                                                                                <th>Serial_No</th>'. '<tr>'.'<td>'.$Equipment_name.'</td>'.'<td>'.$Control_No.'</td>'.'<td>'.$Serial_No.'</td>'. '<tr>'.'</table>';
                                                                            
                                                                        }
                                                                        else{
                                                                            echo '<td>'.$data1['tool_id_10'].'</td>';
                                                                        }

                                                                    
                                                                echo '</tr>';
                                                           
                                                        }
                                                        
                                        ?>
                                            
                                        </tbody>
                                        
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
               
                
         
        </div>
        <div class="row">
                    <!-- ============================================================== -->
                    <!-- data table rowgroup  -->
                    <!-- ============================================================== -->
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="mb-0">Jig</h5>
                            </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered first">
                                        <thead>
                                            <tr>
                                                <th>Station_name</th>
                                                <th>Process_name</th>
                                                <!--<th>Computer_name</th>-->
                                                <th>jig1</th>
                                                <th>jig2</th>
                                                <th>jig3</th>
                                                <th>jig4</th>
                                                <th>jig5</th>
                                                <th>jig6</th>
                                                <th>jig7</th>
                                                <th>jig8</th>
                                                <th>jig9</th>
                                                <th>jig10</th>
                                                
                                        
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                                        
                                                        // $process_str1 = "/process/i";
                                                       //  $process_str2 = "/inspection/i";
                                                         $assocArr = array();
                                                         $pic_array = array();
                                                         $db_select = mysqli_select_db($conn,'npt-baxter-lvp') ; 
                                                         $sql_tool = 'SELECT T1.station_name ,T2.process_name,T3.name AS computer_name ,T1.jig_id_1,T1.jig_id_2,T1.jig_id_3,T1.jig_id_4,T1.jig_id_5,T1.jig_id_6,T1.jig_id_7,T1.jig_id_8,T1.jig_id_9,T1.jig_id_10   FROM station T1 LEFT JOIN process T2 ON T2.id = T1.process_id LEFT JOIN computer T3 ON T3.id = T1.computer_id' ;
                                                         $result_tool = mysqli_query($conn,$sql_tool);
                                                         while($data1 = mysqli_fetch_array($result_tool))
                                                         {
                                                             
                                                             
                                                                 echo '<tr>';
                                                                         echo '<td>'.$data1['station_name'].'</td>';
                                                                         echo '<td>'.$data1['process_name'].'</td>';
                                                                        // echo '<td>'.$data1['computer_name'].'</td>';
                                                                         $data_v =  $data1['jig_id_1'];
                                                               
                                                                         $db_select = mysqli_select_db($conn,'npt') ; 
                                                                         $sql_cal = "SELECT Equipment_name,Control_No,Serial_No FROM `npt`.`calibration_list` WHERE id = '$data_v' ";
                                                                         $result_cal = mysqli_query($conn,$sql_cal);
                                                                         $count = mysqli_num_rows($result_cal);
                                                                         if($count==1)
                                                                         {
                                                                             $row = mysqli_fetch_assoc($result_cal);
                                                                             $Equipment_name = $row['Equipment_name'];
                                                                             $Control_No = $row['Control_No'];
                                                                             $Serial_No = $row['Serial_No'];
                                                                             
 
                                                                             echo '<td>'.'<table>'.'<thead class="table-warning">
                                                                             <tr>
                                                                                 <th>Equipment_name</th>
                                                                                 <th>Control_No</th>
                                                                                 <th>Serial_No</th>'. '<tr>'.'<td>'.$Equipment_name.'</td>'.'<td>'.$Control_No.'</td>'.'<td>'.$Serial_No.'</td>'. '<tr>'.'</table>';
                                                                             
                                                                         }
                                                                         else{
                                                                             echo '<td>'.$data1['jig_id_1'].'</td>';
                                                                         }
                                                                         
 
                                                                         $data_v =  $data1['jig_id_2'];
                                                               
                                                                         $db_select = mysqli_select_db($conn,'npt') ; 
                                                                         $sql_cal = "SELECT Equipment_name,Control_No,Serial_No FROM `npt`.`calibration_list` WHERE id = '$data_v' ";
                                                                         $result_cal = mysqli_query($conn,$sql_cal);
                                                                         $count = mysqli_num_rows($result_cal);
                                                                         if($count==1)
                                                                         {
                                                                             $row = mysqli_fetch_assoc($result_cal);
                                                                             $Equipment_name = $row['Equipment_name'];
                                                                             $Control_No = $row['Control_No'];
                                                                             $Serial_No = $row['Serial_No'];
                                                                             
 
                                                                             echo '<td>'.'<table>'.'<thead class="table-warning">
                                                                             <tr>
                                                                                 <th>Equipment_name</th>
                                                                                 <th>Control_No</th>
                                                                                 <th>Serial_No</th>'. '<tr>'.'<td>'.$Equipment_name.'</td>'.'<td>'.$Control_No.'</td>'.'<td>'.$Serial_No.'</td>'. '<tr>'.'</table>';
                                                                             
                                                                         }
                                                                         else{
                                                                             echo '<td>'.$data1['jig_id_2'].'</td>';
                                                                         }
 
 
                                                                         $data_v =  $data1['jig_id_3'];
                                                               
                                                                         $db_select = mysqli_select_db($conn,'npt') ; 
                                                                         $sql_cal = "SELECT Equipment_name,Control_No,Serial_No FROM `npt`.`calibration_list` WHERE id = '$data_v' ";
                                                                         $result_cal = mysqli_query($conn,$sql_cal);
                                                                         $count = mysqli_num_rows($result_cal);
                                                                         if($count==1)
                                                                         {
                                                                             $row = mysqli_fetch_assoc($result_cal);
                                                                             $Equipment_name = $row['Equipment_name'];
                                                                             $Control_No = $row['Control_No'];
                                                                             $Serial_No = $row['Serial_No'];
                                                                             
 
                                                                             echo '<td>'.'<table>'.'<thead class="table-warning">
                                                                             <tr>
                                                                                 <th>Equipment_name</th>
                                                                                 <th>Control_No</th>
                                                                                 <th>Serial_No</th>'. '<tr>'.'<td>'.$Equipment_name.'</td>'.'<td>'.$Control_No.'</td>'.'<td>'.$Serial_No.'</td>'. '<tr>'.'</table>';
                                                                             
                                                                         }
                                                                         else{
                                                                             echo '<td>'.$data1['jig_id_3'].'</td>';
                                                                         }
                                                                         
 
                                                                         $data_v =  $data1['jig_id_4'];
                                                               
                                                                         $db_select = mysqli_select_db($conn,'npt') ; 
                                                                         $sql_cal = "SELECT Equipment_name,Control_No,Serial_No FROM `npt`.`calibration_list` WHERE id = '$data_v' ";
                                                                         $result_cal = mysqli_query($conn,$sql_cal);
                                                                         $count = mysqli_num_rows($result_cal);
                                                                         if($count==1)
                                                                         {
                                                                             $row = mysqli_fetch_assoc($result_cal);
                                                                             $Equipment_name = $row['Equipment_name'];
                                                                             $Control_No = $row['Control_No'];
                                                                             $Serial_No = $row['Serial_No'];
                                                                             
 
                                                                             echo '<td>'.'<table>'.'<thead class="table-warning">
                                                                             <tr>
                                                                                 <th>Equipment_name</th>
                                                                                 <th>Control_No</th>
                                                                                 <th>Serial_No</th>'. '<tr>'.'<td>'.$Equipment_name.'</td>'.'<td>'.$Control_No.'</td>'.'<td>'.$Serial_No.'</td>'. '<tr>'.'</table>';
                                                                             
                                                                         }
                                                                         else{
                                                                             echo '<td>'.$data1['jig_id_4'].'</td>';
                                                                         }
                                                                         
 
                                                                         $data_v =  $data1['jig_id_5'];
                                                               
                                                                         $db_select = mysqli_select_db($conn,'npt') ; 
                                                                         $sql_cal = "SELECT Equipment_name,Control_No,Serial_No FROM `npt`.`calibration_list` WHERE id = '$data_v' ";
                                                                         $result_cal = mysqli_query($conn,$sql_cal);
                                                                         $count = mysqli_num_rows($result_cal);
                                                                         if($count==1)
                                                                         {
                                                                             $row = mysqli_fetch_assoc($result_cal);
                                                                             $Equipment_name = $row['Equipment_name'];
                                                                             $Control_No = $row['Control_No'];
                                                                             $Serial_No = $row['Serial_No'];
                                                                             
 
                                                                             echo '<td>'.'<table>'.'<thead class="table-warning">
                                                                             <tr>
                                                                                 <th>Equipment_name</th>
                                                                                 <th>Control_No</th>
                                                                                 <th>Serial_No</th>'. '<tr>'.'<td>'.$Equipment_name.'</td>'.'<td>'.$Control_No.'</td>'.'<td>'.$Serial_No.'</td>'. '<tr>'.'</table>';
                                                                             
                                                                         }
                                                                         else{
                                                                             echo '<td>'.$data1['jig_id_5'].'</td>';
                                                                         }
                                                                         
 
                                                                         $data_v =  $data1['jig_id_6'];
                                                               
                                                                         $db_select = mysqli_select_db($conn,'npt') ; 
                                                                         $sql_cal = "SELECT Equipment_name,Control_No,Serial_No FROM `npt`.`calibration_list` WHERE id = '$data_v' ";
                                                                         $result_cal = mysqli_query($conn,$sql_cal);
                                                                         $count = mysqli_num_rows($result_cal);
                                                                         if($count==1)
                                                                         {
                                                                             $row = mysqli_fetch_assoc($result_cal);
                                                                             $Equipment_name = $row['Equipment_name'];
                                                                             $Control_No = $row['Control_No'];
                                                                             $Serial_No = $row['Serial_No'];
                                                                             
 
                                                                             echo '<td>'.'<table>'.'<thead class="table-warning">
                                                                             <tr>
                                                                                 <th>Equipment_name</th>
                                                                                 <th>Control_No</th>
                                                                                 <th>Serial_No</th>'. '<tr>'.'<td>'.$Equipment_name.'</td>'.'<td>'.$Control_No.'</td>'.'<td>'.$Serial_No.'</td>'. '<tr>'.'</table>';
                                                                             
                                                                         }
                                                                         else{
                                                                             echo '<td>'.$data1['jig_id_6'].'</td>';
                                                                         }
                                                                         
 
                                                                         $data_v =  $data1['jig_id_7'];
                                                               
                                                                         $db_select = mysqli_select_db($conn,'npt') ; 
                                                                         $sql_cal = "SELECT Equipment_name,Control_No,Serial_No FROM `npt`.`calibration_list` WHERE id = '$data_v' ";
                                                                         $result_cal = mysqli_query($conn,$sql_cal);
                                                                         $count = mysqli_num_rows($result_cal);
                                                                         if($count==1)
                                                                         {
                                                                             $row = mysqli_fetch_assoc($result_cal);
                                                                             $Equipment_name = $row['Equipment_name'];
                                                                             $Control_No = $row['Control_No'];
                                                                             $Serial_No = $row['Serial_No'];
                                                                             
 
                                                                             echo '<td>'.'<table>'.'<thead class="table-warning">
                                                                             <tr>
                                                                                 <th>Equipment_name</th>
                                                                                 <th>Control_No</th>
                                                                                 <th>Serial_No</th>'. '<tr>'.'<td>'.$Equipment_name.'</td>'.'<td>'.$Control_No.'</td>'.'<td>'.$Serial_No.'</td>'. '<tr>'.'</table>';
                                                                             
                                                                         }
                                                                         else{
                                                                             echo '<td>'.$data1['jig_id_7'].'</td>';
                                                                         }
                                                                         
 
                                                                         $data_v =  $data1['jig_id_8'];
                                                               
                                                                         $db_select = mysqli_select_db($conn,'npt') ; 
                                                                         $sql_cal = "SELECT Equipment_name,Control_No,Serial_No FROM `npt`.`calibration_list` WHERE id = '$data_v' ";
                                                                         $result_cal = mysqli_query($conn,$sql_cal);
                                                                         $count = mysqli_num_rows($result_cal);
                                                                         if($count==1)
                                                                         {
                                                                             $row = mysqli_fetch_assoc($result_cal);
                                                                             $Equipment_name = $row['Equipment_name'];
                                                                             $Control_No = $row['Control_No'];
                                                                             $Serial_No = $row['Serial_No'];
                                                                             
 
                                                                             echo '<td>'.'<table>'.'<thead class="table-warning">
                                                                             <tr>
                                                                                 <th>Equipment_name</th>
                                                                                 <th>Control_No</th>
                                                                                 <th>Serial_No</th>'. '<tr>'.'<td>'.$Equipment_name.'</td>'.'<td>'.$Control_No.'</td>'.'<td>'.$Serial_No.'</td>'. '<tr>'.'</table>';
                                                                             
                                                                         }
                                                                         else{
                                                                             echo '<td>'.$data1['jig_id_8'].'</td>';
                                                                         }
                                                                         
 
                                                                         $data_v =  $data1['jig_id_9'];
                                                               
                                                                         $db_select = mysqli_select_db($conn,'npt') ; 
                                                                         $sql_cal = "SELECT Equipment_name,Control_No,Serial_No FROM `npt`.`calibration_list` WHERE id = '$data_v' ";
                                                                         $result_cal = mysqli_query($conn,$sql_cal);
                                                                         $count = mysqli_num_rows($result_cal);
                                                                         if($count==1)
                                                                         {
                                                                             $row = mysqli_fetch_assoc($result_cal);
                                                                             $Equipment_name = $row['Equipment_name'];
                                                                             $Control_No = $row['Control_No'];
                                                                             $Serial_No = $row['Serial_No'];
                                                                             
 
                                                                             echo '<td>'.'<table>'.'<thead class="table-warning">
                                                                             <tr>
                                                                                 <th>Equipment_name</th>
                                                                                 <th>Control_No</th>
                                                                                 <th>Serial_No</th>'. '<tr>'.'<td>'.$Equipment_name.'</td>'.'<td>'.$Control_No.'</td>'.'<td>'.$Serial_No.'</td>'. '<tr>'.'</table>';
                                                                             
                                                                         }
                                                                         else{
                                                                             echo '<td>'.$data1['jig_id_9'].'</td>';
                                                                         }
                                                                         
 
                                                                         $data_v =  $data1['jig_id_10'];
                                                               
                                                                         $db_select = mysqli_select_db($conn,'npt') ; 
                                                                         $sql_cal = "SELECT Equipment_name,Control_No,Serial_No FROM `npt`.`calibration_list` WHERE id = '$data_v' ";
                                                                         $result_cal = mysqli_query($conn,$sql_cal);
                                                                         $count = mysqli_num_rows($result_cal);
                                                                         if($count==1)
                                                                         {
                                                                             $row = mysqli_fetch_assoc($result_cal);
                                                                             $Equipment_name = $row['Equipment_name'];
                                                                             $Control_No = $row['Control_No'];
                                                                             $Serial_No = $row['Serial_No'];
                                                                             
 
                                                                             echo '<td>'.'<table>'.'<thead class="table-warning">
                                                                             <tr>
                                                                                 <th>Equipment_name</th>
                                                                                 <th>Control_No</th>
                                                                                 <th>Serial_No</th>'. '<tr>'.'<td>'.$Equipment_name.'</td>'.'<td>'.$Control_No.'</td>'.'<td>'.$Serial_No.'</td>'. '<tr>'.'</table>';
                                                                             
                                                                         }
                                                                         else{
                                                                             echo '<td>'.$data1['jig_id_10'].'</td>';
                                                                         }
 
                                                                     
                                                                 echo '</tr>';
                                                            
                                                         }
                                                         
                                         ?>
                                        </tbody>
                                        
                                    </table>
                                </div>
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
                            <h5 class="card-header">chemical</h5>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered first">
                                        <thead>
                                            <tr>
                                            <th>Station_name</th>
                                                <th>Process_name</th>
                                               <!-- <th>Computer_name</th>-->
                                                <th>chemical1</th>
                                                <th>chemical2</th>
                                                <th>chemical3</th>
                                                <th>chemical4</th>
                                                <th>chemical5</th>
                                                <th>chemical6</th>
                                                <th>chemical7</th>
                                                <th>chemical8</th>
                                                <th>chemical9</th>
                                                <th>chemical10</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                                        
                                                        // $process_str1 = "/process/i";
                                                       //  $process_str2 = "/inspection/i";
                                                         $assocArr = array();
                                                         $pic_array = array();
                                                         $db_select = mysqli_select_db($conn,'npt-baxter-lvp') ; 
                                                         $sql_tool = 'SELECT T1.station_name ,T2.process_name,T3.name AS computer_name ,T1.chemical_id_1,T1.chemical_id_2,T1.chemical_id_3,T1.chemical_id_4,T1.chemical_id_5,T1.chemical_id_6,T1.chemical_id_7,T1.chemical_id_8,T1.chemical_id_9,T1.chemical_id_10   FROM station T1 LEFT JOIN process T2 ON T2.id = T1.process_id LEFT JOIN computer T3 ON T3.id = T1.computer_id' ;
                                                         $result_tool = mysqli_query($conn,$sql_tool);
                                                         while($data1 = mysqli_fetch_array($result_tool))
                                                         {
                                                             
                                                             
                                                                         echo '<tr>';
                                                                         echo '<td>'.$data1['station_name'].'</td>';
                                                                         echo '<td>'.$data1['process_name'].'</td>';
                                                                         //echo '<td>'.$data1['computer_name'].'</td>';



                                                                         $data_v =  $data1['chemical_id_1'];
                                                               
                                                                         $db_select = mysqli_select_db($conn,'npt') ; 
                                                                         $sql_cal = "SELECT T2.code,T2.code_rev,T2.name,T1.expiration_date,T1.lot_no FROM `npt`.`chemical` T1 LEFT JOIN `npt`.`chemical_list` T2 ON T2.code = T1.code WHERE T2.id = '$data_v' ORDER BY T1.id DESC LIMIT 1 ";
                                                                         $result_cal = mysqli_query($conn,$sql_cal);
                                                                         $count = mysqli_num_rows($result_cal);
                                                                         if($count==1)
                                                                         {
                                                                             $row = mysqli_fetch_assoc($result_cal);
                                                                             $Equipment_name = $row['code'];
                                                                             $Control_No = $row['code_rev'];
                                                                             $Serial_No = $row['name'];
                                                                             $expiration_date = $row['expiration_date'];
                                                                             $lot = $row['lot_no'];
                                                                             
 
                                                                             echo '<td>'.'<table>'.'<thead class="table-primary">
                                                                             <tr>
                                                                                 <th>code</th>
                                                                                 <th>code_rev</th>
                                                                                 <th>name</th><th>lot</th><th>expiration_date</th>'. '<tr>'.'<td>'.$Equipment_name.'</td>'.'<td>'.$Control_No.'</td>'.'<td>'.$Serial_No.'</td>'.'<td>'.$lot.'</td>'.'<td>'.$expiration_date.'</td>'. '</tr>'.'</table>';
                                                                             
                                                                         }
                                                                         else{
                                                                             echo '<td>'.$data1['chemical_id_1'].'</td>';
                                                                         }

                                                                         $data_v =  $data1['chemical_id_2'];
                                                               
                                                                         $db_select = mysqli_select_db($conn,'npt') ; 
                                                                         $sql_cal = "SELECT T2.code,T2.code_rev,T2.name,T1.expiration_date,T1.lot_no FROM `npt`.`chemical` T1 LEFT JOIN `npt`.`chemical_list` T2 ON T2.code = T1.code WHERE T2.id = '$data_v' ORDER BY T1.id DESC LIMIT 1 ";
                                                                         $result_cal = mysqli_query($conn,$sql_cal);
                                                                         $count = mysqli_num_rows($result_cal);
                                                                         if($count==1)
                                                                         {
                                                                             $row = mysqli_fetch_assoc($result_cal);
                                                                             $Equipment_name = $row['code'];
                                                                             $Control_No = $row['code_rev'];
                                                                             $Serial_No = $row['name'];
                                                                             $expiration_date = $row['expiration_date'];
                                                                             $lot = $row['lot_no'];
                                                                             
 
                                                                             echo '<td>'.'<table>'.'<thead class="table-primary">
                                                                             <tr>
                                                                                 <th>code</th>
                                                                                 <th>code_rev</th>
                                                                                 <th>name</th><th>lot</th><th>expiration_date</th>'. '<tr>'.'<td>'.$Equipment_name.'</td>'.'<td>'.$Control_No.'</td>'.'<td>'.$Serial_No.'</td>'.'<td>'.$lot.'</td>'.'<td>'.$expiration_date.'</td>'. '</tr>'.'</table>';
                                                                             
                                                                         }
                                                                         else{
                                                                             echo '<td>'.$data1['chemical_id_2'].'</td>';
                                                                         }


                                                                         $data_v =  $data1['chemical_id_3'];
                                                               
                                                                         $db_select = mysqli_select_db($conn,'npt') ; 
                                                                         $sql_cal = "SELECT T2.code,T2.code_rev,T2.name,T1.expiration_date,T1.lot_no FROM `npt`.`chemical` T1 LEFT JOIN `npt`.`chemical_list` T2 ON T2.code = T1.code WHERE T2.id = '$data_v' ORDER BY T1.id DESC LIMIT 1 ";
                                                                         $result_cal = mysqli_query($conn,$sql_cal);
                                                                         $count = mysqli_num_rows($result_cal);
                                                                         if($count==1)
                                                                         {
                                                                             $row = mysqli_fetch_assoc($result_cal);
                                                                             $Equipment_name = $row['code'];
                                                                             $Control_No = $row['code_rev'];
                                                                             $Serial_No = $row['name'];
                                                                             $expiration_date = $row['expiration_date'];
                                                                             $lot = $row['lot_no'];
                                                                             
 
                                                                             echo '<td>'.'<table>'.'<thead class="table-primary">
                                                                             <tr>
                                                                                 <th>code</th>
                                                                                 <th>code_rev</th>
                                                                                 <th>name</th><th>lot</th><th>expiration_date</th>'. '<tr>'.'<td>'.$Equipment_name.'</td>'.'<td>'.$Control_No.'</td>'.'<td>'.$Serial_No.'</td>'.'<td>'.$lot.'</td>'.'<td>'.$expiration_date.'</td>'. '</tr>'.'</table>';
                                                                             
                                                                         }
                                                                         else{
                                                                             echo '<td>'.$data1['chemical_id_3'].'</td>';
                                                                         }

                                                                         $data_v =  $data1['chemical_id_4'];
                                                               
                                                                         $db_select = mysqli_select_db($conn,'npt') ; 
                                                                         $sql_cal = "SELECT T2.code,T2.code_rev,T2.name,T1.expiration_date,T1.lot_no FROM `npt`.`chemical` T1 LEFT JOIN `npt`.`chemical_list` T2 ON T2.code = T1.code WHERE T2.id = '$data_v' ORDER BY T1.id DESC LIMIT 1 ";
                                                                         $result_cal = mysqli_query($conn,$sql_cal);
                                                                         $count = mysqli_num_rows($result_cal);
                                                                         if($count==1)
                                                                         {
                                                                             $row = mysqli_fetch_assoc($result_cal);
                                                                             $Equipment_name = $row['code'];
                                                                             $Control_No = $row['code_rev'];
                                                                             $Serial_No = $row['name'];
                                                                             $expiration_date = $row['expiration_date'];
                                                                             $lot = $row['lot_no'];
                                                                             
 
                                                                             echo '<td>'.'<table>'.'<thead class="table-primary">
                                                                             <tr>
                                                                                 <th>code</th>
                                                                                 <th>code_rev</th>
                                                                                 <th>name</th><th>lot</th><th>expiration_date</th>'. '<tr>'.'<td>'.$Equipment_name.'</td>'.'<td>'.$Control_No.'</td>'.'<td>'.$Serial_No.'</td>'.'<td>'.$lot.'</td>'.'<td>'.$expiration_date.'</td>'. '</tr>'.'</table>';
                                                                             
                                                                         }
                                                                         else{
                                                                             echo '<td>'.$data1['chemical_id_4'].'</td>';
                                                                         }

                                                                         $data_v =  $data1['chemical_id_5'];
                                                               
                                                                         $db_select = mysqli_select_db($conn,'npt') ; 
                                                                         $sql_cal = "SELECT T2.code,T2.code_rev,T2.name,T1.expiration_date,T1.lot_no FROM `npt`.`chemical` T1 LEFT JOIN `npt`.`chemical_list` T2 ON T2.code = T1.code WHERE T2.id = '$data_v' ORDER BY T1.id DESC LIMIT 1 ";
                                                                         $result_cal = mysqli_query($conn,$sql_cal);
                                                                         $count = mysqli_num_rows($result_cal);
                                                                         if($count==1)
                                                                         {
                                                                             $row = mysqli_fetch_assoc($result_cal);
                                                                             $Equipment_name = $row['code'];
                                                                             $Control_No = $row['code_rev'];
                                                                             $Serial_No = $row['name'];
                                                                             $expiration_date = $row['expiration_date'];
                                                                             $lot = $row['lot_no'];
                                                                             
 
                                                                             echo '<td>'.'<table>'.'<thead class="table-primary">
                                                                             <tr>
                                                                                 <th>code</th>
                                                                                 <th>code_rev</th>
                                                                                 <th>name</th><th>lot</th><th>expiration_date</th>'. '<tr>'.'<td>'.$Equipment_name.'</td>'.'<td>'.$Control_No.'</td>'.'<td>'.$Serial_No.'</td>'.'<td>'.$lot.'</td>'.'<td>'.$expiration_date.'</td>'. '</tr>'.'</table>';
                                                                             
                                                                         }
                                                                         else{
                                                                             echo '<td>'.$data1['chemical_id_5'].'</td>';
                                                                         }


                                                                         $data_v =  $data1['chemical_id_6'];
                                                               
                                                                         $db_select = mysqli_select_db($conn,'npt') ; 
                                                                         $sql_cal = "SELECT T2.code,T2.code_rev,T2.name,T1.expiration_date,T1.lot_no FROM `npt`.`chemical` T1 LEFT JOIN `npt`.`chemical_list` T2 ON T2.code = T1.code WHERE T2.id = '$data_v' ORDER BY T1.id DESC LIMIT 1 ";
                                                                         $result_cal = mysqli_query($conn,$sql_cal);
                                                                         $count = mysqli_num_rows($result_cal);
                                                                         if($count==1)
                                                                         {
                                                                             $row = mysqli_fetch_assoc($result_cal);
                                                                             $Equipment_name = $row['code'];
                                                                             $Control_No = $row['code_rev'];
                                                                             $Serial_No = $row['name'];
                                                                             $expiration_date = $row['expiration_date'];
                                                                             $lot = $row['lot_no'];
                                                                             
 
                                                                             echo '<td>'.'<table>'.'<thead class="table-primary">
                                                                             <tr>
                                                                                 <th>code</th>
                                                                                 <th>code_rev</th>
                                                                                 <th>name</th><th>lot</th><th>expiration_date</th>'. '<tr>'.'<td>'.$Equipment_name.'</td>'.'<td>'.$Control_No.'</td>'.'<td>'.$Serial_No.'</td>'.'<td>'.$lot.'</td>'.'<td>'.$expiration_date.'</td>'. '</tr>'.'</table>';
                                                                             
                                                                         }
                                                                         else{
                                                                             echo '<td>'.$data1['chemical_id_6'].'</td>';
                                                                         }

                                                                         $data_v =  $data1['chemical_id_7'];
                                                               
                                                                         $db_select = mysqli_select_db($conn,'npt') ; 
                                                                         $sql_cal = "SELECT T2.code,T2.code_rev,T2.name,T1.expiration_date,T1.lot_no FROM `npt`.`chemical` T1 LEFT JOIN `npt`.`chemical_list` T2 ON T2.code = T1.code WHERE T2.id = '$data_v' ORDER BY T1.id DESC LIMIT 1 ";
                                                                         $result_cal = mysqli_query($conn,$sql_cal);
                                                                         $count = mysqli_num_rows($result_cal);
                                                                         if($count==1)
                                                                         {
                                                                             $row = mysqli_fetch_assoc($result_cal);
                                                                             $Equipment_name = $row['code'];
                                                                             $Control_No = $row['code_rev'];
                                                                             $Serial_No = $row['name'];
                                                                             $expiration_date = $row['expiration_date'];
                                                                             $lot = $row['lot_no'];
                                                                             
 
                                                                             echo '<td>'.'<table>'.'<thead class="table-primary">
                                                                             <tr>
                                                                                 <th>code</th>
                                                                                 <th>code_rev</th>
                                                                                 <th>name</th><th>lot</th><th>expiration_date</th>'. '<tr>'.'<td>'.$Equipment_name.'</td>'.'<td>'.$Control_No.'</td>'.'<td>'.$Serial_No.'</td>'.'<td>'.$lot.'</td>'.'<td>'.$expiration_date.'</td>'. '</tr>'.'</table>';
                                                                             
                                                                         }
                                                                         else{
                                                                             echo '<td>'.$data1['chemical_id_7'].'</td>';
                                                                         }

                                                                         $data_v =  $data1['chemical_id_8'];
                                                               
                                                                         $db_select = mysqli_select_db($conn,'npt') ; 
                                                                         $sql_cal = "SELECT T2.code,T2.code_rev,T2.name,T1.expiration_date,T1.lot_no FROM `npt`.`chemical` T1 LEFT JOIN `npt`.`chemical_list` T2 ON T2.code = T1.code WHERE T2.id = '$data_v' ORDER BY T1.id DESC LIMIT 1 ";
                                                                         $result_cal = mysqli_query($conn,$sql_cal);
                                                                         $count = mysqli_num_rows($result_cal);
                                                                         if($count==1)
                                                                         {
                                                                             $row = mysqli_fetch_assoc($result_cal);
                                                                             $Equipment_name = $row['code'];
                                                                             $Control_No = $row['code_rev'];
                                                                             $Serial_No = $row['name'];
                                                                             $expiration_date = $row['expiration_date'];
                                                                             $lot = $row['lot_no'];
                                                                             
 
                                                                             echo '<td>'.'<table>'.'<thead class="table-primary">
                                                                             <tr>
                                                                                 <th>code</th>
                                                                                 <th>code_rev</th>
                                                                                 <th>name</th><th>lot</th><th>expiration_date</th>'. '<tr>'.'<td>'.$Equipment_name.'</td>'.'<td>'.$Control_No.'</td>'.'<td>'.$Serial_No.'</td>'.'<td>'.$lot.'</td>'.'<td>'.$expiration_date.'</td>'. '</tr>'.'</table>';
                                                                             
                                                                         }
                                                                         else{
                                                                             echo '<td>'.$data1['chemical_id_8'].'</td>';
                                                                         }


                                                                         $data_v =  $data1['chemical_id_9'];
                                                               
                                                                         $db_select = mysqli_select_db($conn,'npt') ; 
                                                                         $sql_cal = "SELECT T2.code,T2.code_rev,T2.name,T1.expiration_date,T1.lot_no FROM `npt`.`chemical` T1 LEFT JOIN `npt`.`chemical_list` T2 ON T2.code = T1.code WHERE T2.id = '$data_v' ORDER BY T1.id DESC LIMIT 1 ";
                                                                         $result_cal = mysqli_query($conn,$sql_cal);
                                                                         $count = mysqli_num_rows($result_cal);
                                                                         if($count==1)
                                                                         {
                                                                             $row = mysqli_fetch_assoc($result_cal);
                                                                             $Equipment_name = $row['code'];
                                                                             $Control_No = $row['code_rev'];
                                                                             $Serial_No = $row['name'];
                                                                             $expiration_date = $row['expiration_date'];
                                                                             $lot = $row['lot_no'];
                                                                             
 
                                                                             echo '<td>'.'<table>'.'<thead class="table-primary">
                                                                             <tr>
                                                                                 <th>code</th>
                                                                                 <th>code_rev</th>
                                                                                 <th>name</th><th>lot</th><th>expiration_date</th>'. '<tr>'.'<td>'.$Equipment_name.'</td>'.'<td>'.$Control_No.'</td>'.'<td>'.$Serial_No.'</td>'.'<td>'.$lot.'</td>'.'<td>'.$expiration_date.'</td>'. '</tr>'.'</table>';
                                                                             
                                                                         }
                                                                         else{
                                                                             echo '<td>'.$data1['chemical_id_9'].'</td>';
                                                                         }

                                                                         $data_v =  $data1['chemical_id_10'];
                                                               
                                                                         $db_select = mysqli_select_db($conn,'npt') ; 
                                                                         $sql_cal = "SELECT T2.code,T2.code_rev,T2.name,T1.expiration_date,T1.lot_no FROM `npt`.`chemical` T1 LEFT JOIN `npt`.`chemical_list` T2 ON T2.code = T1.code WHERE T2.id = '$data_v' ORDER BY T1.id DESC LIMIT 1 ";
                                                                         $result_cal = mysqli_query($conn,$sql_cal);
                                                                         $count = mysqli_num_rows($result_cal);
                                                                         if($count==1)
                                                                         {
                                                                             $row = mysqli_fetch_assoc($result_cal);
                                                                             $Equipment_name = $row['code'];
                                                                             $Control_No = $row['code_rev'];
                                                                             $Serial_No = $row['name'];
                                                                             $expiration_date = $row['expiration_date'];
                                                                             $lot = $row['lot_no'];
                                                                             
 
                                                                             echo '<td>'.'<table>'.'<thead class="table-primary">
                                                                             <tr>
                                                                                 <th>code</th>
                                                                                 <th>code_rev</th>
                                                                                 <th>name</th><th>lot</th><th>expiration_date</th>'. '<tr>'.'<td>'.$Equipment_name.'</td>'.'<td>'.$Control_No.'</td>'.'<td>'.$Serial_No.'</td>'.'<td>'.$lot.'</td>'.'<td>'.$expiration_date.'</td>'. '</tr>'.'</table>';
                                                                             
                                                                         }
                                                                         else{
                                                                             echo '<td>'.$data1['chemical_id_10'].'</td>';
                                                                         }
                                                                        
                                                                         
                                                                         echo '</tr>';
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