<?php
error_reporting(0); //  ปิดการแจ้งเตือน error
?>
<?php include('config/constants.php'); ?>


<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Required meta tags -->
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/libs/css/style.css">
    <link rel="stylesheet" href="assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <link rel="stylesheet" href="assets/vendor/vector-map/jqvmap.css">
    <link href="assets/vendor/jvectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/vendor/charts/chartist-bundle/chartist.css">
    <link rel="stylesheet" href="assets/vendor/charts/c3charts/c3.css">
    <link rel="stylesheet" href="assets/vendor/charts/morris-bundle/morris.css">
    <link rel="stylesheet" type="text/css" href="assets/vendor/daterangepicker/daterangepicker.css" />
    
 
  <style type="text/css">
   
  
    ul, li { list-style-type:none; padding:0px; color:#000; border:1px solid #000; }
    ul { padding:20px; }
    ul li { padding-left:50px; margin:10px 0; border:1px solid #000; }
    li div { padding:10px; background-color:#f0f0f0; border:1px solid #000; }
    table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}
th, td {
  padding: 10px;
}
table.center {
  margin-left: auto;
  margin-right: auto;
}
 
 
    
    
    #sTreeBase { width:100px; height:50px; background-color: blue; }
    #text { padding:0px 0; }
    #sTree { background-color: green; }
    #sTree2 { margin:10px 0; }
    #item_a{ background-color: whitesmoke; }
    #item_b{ background-color: whitesmoke; }
    #item_c{ background-color: whitesmoke; }
    
  </style>

<script src="assets/vendor/jquery/jquery-3.3.1.min.js"></script>
  <script src="jquery-sortable-lists.js"></script>
  <script type="text/javascript">
    $(function()
    {
      var options = {
        placeholderCss: {'background-color': '#ff8'},
    hintCss: {'background-color':'#bbf'},
    onChange: function( cEl )
    {
      console.log( 'onChange' );
    },
    complete: function( cEl )
    {
      console.log( 'complete' );
    },
    isAllowed: function( cEl, hint, target )
    {
      // Be carefull if you test some ul/ol elements here.
      // Sometimes ul/ols are dynamically generated and so they have not some attributes as natural ul/ols.
      // Be careful also if the hint is not visible. It has only display none so it is at the previouse place where it was before(excluding first moves before showing).
      if( target.data('module') === 'c' && cEl.data('module') !== 'c' )
      {
        hint.css('background-color', '#ff9999');
        return false;
      }
      else
      {
        hint.css('background-color', '#99ff99');
        return true;
      }
    },
    opener: {
      active: true,
      as: 'html',  // if as is not set plugin uses background image
      close: '<i class="fa fa-minus c3"></i>',  // or 'fa-minus c3',  // or './imgs/Remove2.png',
      open: '<i class="fa fa-plus"></i>',  // or 'fa-plus',  // or'./imgs/Add2.png',
      openerCss: {
        'display': 'inline-block',
        //'width': '18px', 'height': '18px',
        'float': 'left',
        'margin-left': '-35px',
        'margin-right': '5px',
        //'background-position': 'center center', 'background-repeat': 'no-repeat',
        'font-size': '1.1em'
      }
    },
    ignoreClass: 'clickable'
      };
      $('#sTree2').sortableLists(options);

      console.log($('#sTree2').sortableListsToArray());
      console.log($('#sTree2').sortableListsToHierarchy());
      console.log($('#sTree2').sortableListsToString());
    });
  </script>
</head>
<body>





<?php require('partials-front/sub_menu.php') ?>


<div class="dashboard-wrapper">
<div class="row">
                <section class="text-center">
                        <div class="container">
                            <?php
                                $match_text = "/01A/i";              //ตรวจสอบ serial or assy number
                                if(!isset($_SESSION['search']))
                                {
                                $search = $_POST['search'];
                                }
                                else
                                {
                                    $search = $_SESSION['search'];
                                }

                                if(!isset($_SESSION['model']))
                                {
                                  unset($_SESSION['model']);
                                  $_SESSION['model'] = "model2";
                                }
                                else
                                {
                                  $_SESSION['model'] = "model2";
                                }

                                
                                
                                if (preg_match($match_text, $search))
                                {
                                            $sql_SER = "SELECT assy_no FROM product WHERE serial_no = '$search' LIMIT 1; ";
                                            $result_all = mysqli_query($conn,$sql_SER);
                                            $count = mysqli_num_rows($result_all);
                                            if($count==1)
                                            {
                                                    $row = mysqli_fetch_assoc($result_all);
                                                    $assy_no = $row['assy_no'];
                                                    echo '<br>';
                                                    echo '<br>';
                                                    echo '<br>';
                                                    echo '<div>';
                                                    echo '<h2><a> &emsp; Seriel Number <a href="#">'.$search.'</a></h2>';
                                                    echo '<h2><a>Assy Number <a href="#">'.$assy_no.'</a></h2>';
                                                    $_SESSION['search'] = $search ;
                                                    $_SESSION['assy_no'] = $assy_no ;
                                                    echo '</div>';
                                                    
                                            }
                                            else
                                            {
                                                echo '<br>';
                                                echo '<br>';
                                                echo '<br>';   
                                                echo '<div>'; 
                                                echo '<h2>&emsp;Search <a href="#">'.$search.'</a></h2>';
                                                echo '</div>';
                                                $_SESSION['search'] = $search ;
                                            }
                                                                            

                                }
                                else
                                {
                                    echo '<br>';
                                    echo '<br>';
                                    echo '<br>'; 
                                    echo '<div>'; 
                                    echo '<h2>&emsp;Search <a href="#">'.$search.'</a></h2>';
                                    echo '</div>';
                                    $_SESSION['search'] = $search ;

                                }
                            ?>
                            
                           
                           
                                
                            

                        </div>
                </section>
                </div>
            <div class="row">
                <div class="container-fluid  dashboard-content">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <h5 class="card-header">Traceability Model2</h5>

                            <?php
                            //---------------------------------s
                                                        $_SESSION['model'] = "model2";  
                                                        $process_str1 = "/process/i";
                                                        $process_str2 = "/inspection/i";
                                                        $assocArr = array();
                                                        $pic_array = array();
                                                        $sql_all = "SELECT * FROM `npt-baxter-lvp`.`process`ORDER BY id DESC;";//DESC
                                                        $result_all = mysqli_query($conn,$sql_all);
                                                        $count = mysqli_num_rows($result_all);
                                                    
                                                        $sn = 0;
                                                        if($count>0)
                                                        {
                                                            echo '<ul class="sTree bgC4" id="sTree2">';
                                                            while($data = mysqli_fetch_array($result_all,MYSQLI_ASSOC))
                                                            {
                                                                $process = $data['process_table'];
                                                                
                                                                if(preg_match($process_str1, $process) OR !preg_match($process_str2, $process))
                                                                {
                                                                    
                                                                    $process_n = $data['process_name'];
                                                                    $process_name = $data['process_table'];
                                                                    $process_type = $data['process_type'];
                                                                    $code = $data['code'];
                                                                    $code_rev = $data['code_rev'];
                                                                    $wi_no = $data['wi_no'];
                                                                    $record_revision = $data['record_revision'];
                                                                    $process_id = $data['id'];
                                                            
                                                                    $pattern_str_mn = "/process_lvp_carton/i";
                                                                    $process_str1 = "/process/i";
                                                                    $process_str2 = "/inspection/i";
                                                                    
                                                                    if($process_type == "MAIN")
                                                                    {
                                                                            
                                                                      
                                                                            if(preg_match($pattern_str_mn, $process_name))
                                                                            {
                                                                               
                                                                                $sql_get = "SELECT * FROM `npt-baxter-lvp`.`$process_name` WHERE assy_no = '$search';  ";
                                                                               // echo $sql_get;
                                                                            }
                                                                            else
                                                                            {
                                                                                if(preg_match($process_str1, $process_name) OR preg_match($process_str2, $process_name))
                                                                                {
                                                                                    if(empty($assy_no))
                                                                                    {
                                                                                        $sql_get = "SELECT * FROM `npt-baxter-lvp`.`$process_name` WHERE assy_no = '$search'; ";
                                                                                    }
                                                                                    else
                                                                                    {
                                                                                        $sql_get = "SELECT * FROM `npt-baxter-lvp`.`$process_name` WHERE assy_no = '$assy_no'; ";
                                                                                    }
                                                                               // echo $sql_get;
                                                                                }
                                                                                else
                                                                                {
                                                                                    $sql_get = "";
                                                                                }

                                                                            }

                                                                           

                                                                            if(!empty($sql_get))
                                                                            {
                                                                               // echo $sql_get;
                                                                            $result_tac = mysqli_query($conn,$sql_get);
                                                                            if($result_tac === FALSE)
                                                                            {
                                                                                
                                                                            }
                                                                            else
                                                                            {
                                                                            if(isset($result_tac) )
                                                                            {
                                                                                
                                                                                while($data = mysqli_fetch_array($result_tac,MYSQLI_ASSOC))
                                                                                {
                                                                                  echo '<li class="bgC4 sortableListsClose" id="item_a">';
                                                                                  echo '<div><span class="sortableListsOpener"> </span>';



                                                                                  //-------------------------------------

                                                                                  echo '<tr>';
                                                                                    echo '<td>';
                                                                                    echo '<table >';
                                                                                    echo '<thead class="table-success">';
                                                                                    echo '<tr>';
                                                                                    echo '<th>code W1</th>';
                                                                                    echo '<th>Process Name</th>';
                                                                                    
                                                                                    echo '<th>Rev</th>';
                                                                                    echo '<th>Lot No</th>';
                                                                                    echo '<th>Production Order</th>';
                                                                                    echo '<th>Wi No</th>';
                                                                                    echo '<th>Station id</th>';
                                                                                    echo '<th>Result</th>';
                                                                                    echo '<th>Assy Number</th>';
                                                                                    echo '<th>operator</th>';
                                                                                    echo '<th>assembly date</th>';

                                                                                    echo '<th>Delail</th>';
                                                                                    echo '</tr>';
                                                                                    echo '</thead>';







                                                                                    echo '<tbody>';
                                                                                    echo '<tr>';
                                                                                    echo '<td>'.$code.'</td>';
                                                                                    echo '<td>'.$process_n.'</td>';
                                                                                    
                                                                                    echo '<td>'.$code_rev.'</td>';
                                                                                    echo '<td>'.$data['lot_no'].'</td>';
                                                                                    echo '<td>'.$data['production_order_no'].'</td>';  

                                                                                    $dc = $data['station_daily_check_id'];
                                                                                    $wi_rev = $data['wi_revision'];
                                                                                    $wi_no = $data['wi_no'];

                                                                                    $op_name = $data['create_operator_name'];
                                                                                    $op_id = $data['create_operator_id'];
                                                                                    $create_date = $data['create_date'];
                                                                                    echo '<td>'.$wi_no.'</td>';



                                                                                    $station_name =$data['station_id'];
                                                                                    $db_select = mysqli_select_db($conn,'npt-baxter-lvp') ; 
                                                                                    $sql_station = "SELECT * FROM `npt-baxter-lvp`.`station` WHERE id = '$station_name'; ";
                                                                                    $result_station = mysqli_query($conn,$sql_station);
                                                                                    $count_station = mysqli_num_rows($result_station);


                                                                                        if($count_station==1)
                                                                                        {
                                                                                        $row_station = mysqli_fetch_assoc($result_station);
                                                                                        $station_n = $row_station['station_name'];
                                                                                        echo '<td>'.$station_n.'</td>';

                                                                                        }
                                                
                                                                                        else
                                                                                        {
                                                                                            echo '<td>'.$data['station_id'].'</td>';
                                                                                        }


                                                                                    $result_m = $data['total_result'];
                                                                                    echo '<td>'.$result_m.'</td>';
                                                                                    $assy_get = $data['assy_no'];
                                                                                    echo '<td>'.$assy_get.'</td>';
                                                                                    echo '<td>'.$op_name.' // id :: '.$op_id.'</td>';
                                                                                    echo '<td>'.$create_date.'</td>';
                                                                                    echo '<td>';
                                                                                    echo '<a href='.SITEURL.'Sub_process.php?database='.$process.'&PD='.$data['production_order_no'].'&lot='.$data['lot_no'].'&main='.$process_name.'&search='.$search.'&Station='.$station_n.'&result='.$result_m.'&WI='.$wi_no.'&WV='.$wi_rev.'&DC='.$dc.'&SN='.$station_name.'&AS='.$assy_get.'&TY=MN'.'&'.'type="button" class ="btn btn-info">Detail</a>';
                                                                                    echo '</td>';
                                                                                    echo '<tr>';
                                                                                    echo '</tbody>';
                                                                                    echo '</table>';
                                                                                    echo '<td>';
                                                                                    




                                                                                  //-------------------------------------------
                                                                                  
                                                                                  
                                                                                  
                                                                                  echo '</div>';
                                                                                  echo '<ul class="">';

                                                                                  $station_name =$data['station_id'];
                                                                                  $Daliy_check_id =$data['station_daily_check_id'];
                                                                                  $get_assy =$data['assy_no'];
                                                                                  $total_result =$data['total_result'];
                                                                                  
                                                                                  $op_name = $data['create_operator_name'];
                                                                                  $op_id = $data['create_operator_id'];
                                                                                  $create_date = $data['create_date'];
                                                                                  
                                                                                  //-----\
                                                                                  for ($x = 1; $x <= 15; $x++) 
                                                                                      {
                                                                                        
                                                                                        $bf =$data['parts_code_'.$x];
                                                                                        $PD_inv =$data['process_invoice_'.$x];
                                                                                        $lott=$data['parts_lot_'.$x];
                                                                                        if(!empty($bf))
                                                                                        {
                                                                                                if($bf[0] == "W")
                                                                                                {
                                                                                                    
                                                                                                $sql_get_processname = "SELECT * FROM process WHERE code = '$bf'; ";
                                                                                                $result_cal = mysqli_query($conn,$sql_get_processname);
                                                                                                $count_p = mysqli_num_rows($result_cal);


                                                                                                    if($count_p==1)
                                                                                                    {
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
                                                                                                }
                                                                                                else
                                                                                                {
                                                                                                    
                                                                                                    $sql_get_processname = "SELECT Item_name ,vendor_code ,Dept FROM `npt`.`receiving` WHERE Item_number = '$bf'; ";   
                                                                                                    $result_cal = mysqli_query($conn,$sql_get_processname);
                                                                                                    $count_p = mysqli_num_rows($result_cal);
            
            
                                                                                                        if($count_p>0)
                                                                                                        {
                                                                                                        $row_t = mysqli_fetch_assoc($result_cal);
                                                                                                        $sub_name = $row_t['Item_name'];
                                                                                                        $sub_type = $row_t['vendor_code'];
                                                                                                        $sub_table = $row_t['Dept'];
            
                                                                                                        }
                                                                                                    

                                                                                                }
                                                                                                //$result_cal = mysqli_query($conn,$sql_get_processname);
                                                                                                //$count_p = mysqli_num_rows($result_cal);


                                                                                       // if($count_p==1)
                                                                                       // {
                                                                                       // $row_t = mysqli_fetch_assoc($result_cal);
                                                                                       // $sub_name = $row_t['process_name'];
                                                                                       // $sub_type = $row_t['process_type'];
                                                                                       // $sub_WI = $row_t['wi_no'];
                                                                                       // $sub_WV = $row_t['wi_revision'];
                                                                                      //  $sub_dc = $row_t['station_daily_check_id'];

                                                                                       // }
                                                                                                  $b_rev =$data['rev_parts_code_'.$x];
                                                                                                  $b_lot =$data['parts_lot_'.$x];
                                                                                                  $b_inv =$data['process_invoice_'.$x];
                                                                                                  $b_result =$data['check_result_'.$x];
                                                                                                 
                                                                                        if((!empty($bf)) AND (!empty($b_lot)))
                                                                                        {
                                                                                          
                                                                                          if($bf[0] == "W" OR $bf[0] == "S")
                                                                                          {
                                                                                          
                                                                                            
                                                                                            if($sub_type == "MAIN")
                                                                                            {
                                                                                              echo '<li class="bgC4" id="item_a">';
                                                                                              echo '<div>';
                                                                                            }
                                                                                            else
                                                                                            {
                                                                                              echo '<li class="bgC4" id="item_1">';
                                                                                           
                                                                                              echo '</li>';
                                                                                              echo '<li class="bgC4 sortableListsClose" id="item_a">';
                                                                                              echo '<div><span class="sortableListsOpener"> </span>';
                                                                                            }
                                                                                           


                                                                                          



                                                                                          echo '<table class="table table-striped table-bordered first">';
                                                                                          echo '<thead class="table-primary">';
                                                                                          echo '<tr>';
                                                                                          
                                                                                          echo '<th>Code W2</th>';   
                                                                                          echo '<th>Process Name</th>';
                                                                                          
                                                                                          echo '<th>Rev</th>';
                                                                                          echo '<th>Lot</th>';
                                                                                          echo '<th>Production Order</th>';
                                                                                          echo '<th>operator</th>';
                                                                                          echo '<th>assembly date</th>';
                                                                                          echo '<th>Result</th>';
                                                                                          echo '<th>Detail</th>';
                                                                                          
                                                                                        
                                                                                           
                                                                                          }
                                                                                        else
                                                                                          {



                                                                                            echo '<li class="bgC4" id="item_a">';
                                                                                            echo '<div>';
                                                                                            echo '<table class="table table-striped table-bordered first">';
                                                                                            echo '<thead class="table-primary">';
                                                                                            echo '<tr>';
                                                                                            echo '<th>Code Z2</th>';
                                                                                              echo '<th>Part Name</th>';
                                                                                              
                                                                                              echo '<th>Rev</th>';
                                                                                              echo '<th>Lot</th>';
                                                                                              echo '<th>Invoice</th>';
                                                                                              echo '<th>Result</th>';
                                                                                              echo '<th>Detail</th>';
                                                                                           
                                                                    
                                                                                         }

                                                                                          echo '</tr>';
                                                                                          echo '</thead>'; 
                                                                                          if($bf[0] == "W" OR $bf[0] == "S")
                                                                                            {
                                                                                               echo '<tbody class="table-info">';
                                                                                            }
                                                                                         else
                                                                                            {
                                                                                               echo '<tbody class="table-warning">'; 
                                                                                            }
                                                                                            //--------------------------------------
                                                                                            
                                                                          
                                                                                            echo '<tr>';
                                                                                            echo '<td>'.$bf.'</td>';
                                                                                            echo '<td>'.$sub_name.'</td>';
                          
                                                                                            echo '<td>'.$b_rev.'</td>';
                                                                                            echo '<td>'.$b_lot.'</td>';
                                                                                            echo '<td>'.$b_inv.'</td>';
                                                                                            if($bf[0] == "W" OR $bf[0] == "S")
                                                                                            {

                                                                                              echo '<td>'.$op_name.' // id :: '.$op_id.'</td>';
                                                                                              echo '<td>'.$create_date.'</td>';

                                                                                            }





                                                                                            echo '<td>'.$total_result.'</td>';

                                                                                            $station_name =$data['station_id'];
                                                                                            $db_select = mysqli_select_db($conn,'npt-baxter-lvp') ; 
                                                                                            $sql_station = "SELECT * FROM `npt-baxter-lvp`.`station` WHERE id = '$station_name'; ";
                                                                                            $result_station = mysqli_query($conn,$sql_station);
                                                                                            $count_station = mysqli_num_rows($result_station);
        
        
                                                                                                if($count_station==1)
                                                                                                {
                                                                                                $row_station = mysqli_fetch_assoc($result_station);
                                                                                                $station_n = $row_station['station_name'];
                                                                                                
        
                                                                                                }
                                                        
                                                                                                else
                                                                                                {
                                                                                                  
                                                                                                }

                                                                                                



                                                                                            
                                                                                            //$sub_table = "receiving";
                                                                                            echo '<td>';
                                                                                            if($bf[0] == "W" OR $bf[0] == "S")
                                                                                            {
                                                                                              echo '<a href='.SITEURL.'Sub_process.php?database='.$sub_table.'&PD='.$b_inv.'&lot='.$b_lot.'&main='.$process_name.'&search='.$search.'&Station='.$station_n.'&result='.$b_result.'&WI='.$sub_WI.'&WV='.$sub_WV.'&DC='.$Daliy_check_id.'&SN='.$station_name.'&AS='.$get_assy.'&TY=SUB'.'&'.'type="button" class ="btn btn-info">Detail</a>';
                                                                                            }
                                                                                            else
                                                                                            {

                                                                                              echo '<a href='.SITEURL.'Sub_part.php?part='.$bf.'&inv='.$b_inv.'&lot='.$b_lot.'&rev='.$b_rev.'&search='.$search.'&MN='.$process.' type="button"'. 'class ="btn btn-info"'.'>Detail</a>';
                                                                                            }
        
        
                                                                                          
                                                                                           
                                                                                            echo '</td>';

                                                                                            
                                                                                            echo '<tr>';
                                                                                            echo '</tbody>';
                                                                                            echo '</table>';
                                                                                            echo '<td>';
                                                                                     
                                                                                            echo'</div>';

                                                                                            if($bf[0] == "W" AND $sub_type == "SUB")
                                                                                            {
                                                                                                     
                                                                                              echo '<ul class="">';
                                                                                              
                                                                                                      
                                                                                                      
                                                                                                      $db_select = mysqli_select_db($conn,'npt-baxter-lvp') ; 
                                                                                                      $sql_loop3 = "SELECT * FROM `npt-baxter-lvp`.`$sub_table` WHERE production_order_no = '$b_inv' AND lot_no = '$b_lot';  ";   
                                                                                                      $result_loop3  = mysqli_query($conn,$sql_loop3); 
                                                                                                    
                                                                                                      if($result_loop3 === FALSE)
                                                                                                      {
                                                                                                        
                                                                                                      }
                                                                                                      else 
                                                                                                      {
                                                                                                        if(isset($result_loop3) )
                                                                                                        {

                                                                                                          
                                                                                                          $loop3_topic = mysqli_fetch_assoc($result_loop3);
                                                                                                          $PD_l3 = $loop3_topic['production_order_no'];
                                                                                                          $lot_l3 = $loop3_topic['lot_no'];
                                                                                                          $sd_id_l3 = $loop3_topic['station_id'];
                                                                                                          $sd_dc_l3 =  $loop3_topic['station_daily_check_id'];

                                                                                                          $process_id_l3 = $loop3_topic['process_id'];
                                                                                                          $result_l3 = $loop3_topic['total_result'];

                                                                                                          $sub_assy_l3 = $loop3_topic['assy_no'];


                                                                                                          $op_name = $loop3_topic['create_operator_name'];
                                                                                                          $op_id = $loop3_topic['create_operator_id'];
                                                                                                          $create_date = $loop3_topic['create_date'];

                                                                                                          $total_result =$loop3_topic['total_result'];


                                                                                                          for ($x = 1; $x <= 15; $x++) 
                                                                                                              {
                                                                                                              
                                                                                                                $bf_l3 =$loop3_topic['parts_code_'.$x];
                                                                                                                $PD_inv_l3 =$loop3_topic['process_invoice_'.$x];
                                                                                                                $lott_l3 =$loop3_topic['parts_lot_'.$x];

                                                                                                                if(!empty($bf_l3))
                                                                                                                {
                                                                                                                  
                                                                                                                  if($bf_l3[0] == "W")
                                                                                                                  {


                                                                                                                   
                                                                                                                   

                                                                                                                    $sql_get_processname_ll3 = "SELECT * FROM process WHERE code = '$bf_l3'; ";
                                                                                                                    $result_cal_ll3 = mysqli_query($conn,$sql_get_processname_ll3 );
                                                                                                                    $count_p_ll3 = mysqli_num_rows($result_cal_ll3);
                                                                                                                    if($count_p_ll3==1)
                                                                                                                    {
                                                                                                                    $row_l3 = mysqli_fetch_assoc($result_cal_ll3);
                                                                                                                    $sub_name = $row_l3['process_name'];
                                                                                                                    $sub_type = $row_l3['process_type'];
                                                                                                                    $sub_table = $row_l3['process_table'];
                                                                                                                    $sub_code = $row_l3['code'];
                                                                                                                    $sub_code_rev = $row_l3['code_rev'];
                                                                                                                                                                                                          // $sub_name = $row_t['process_name'];
                                                                                                                    
                                                                                                                    $sub_WI = $row_l3['wi_no'];
                                                                                                                    $sub_WV = $row_l3['wi_revision'];
                                                                                                                    $sub_dc = $row_l3['wi_revision'];
                                                                                                                    $sub_assy = $row_l3['wi_revision'];
                         
                                                                                                                    echo '<li class="bgC4" id="item_1">';
                                                                                                                    echo '<div>';
                                                                                                                    echo '<table class="table table-striped table-bordered first">';
                                                                                                                    echo '<thead class="table-primary">';
                                                                                                                    echo '<tr>';
                                                                                                                    echo '<th>Code3</th>';   
                                                                                                                    echo '<th>Process Name</th>';
                                                                                            
                                                                                                                    echo '<th>Rev</th>';
                                                                                                                    echo '<th>Lot</th>';
                                                                                                                    echo '<th>Production Order</th>';
                                                                                                                    
                                                                                                                    echo '<th>operator</th>';
                                                                                                                    echo '<th>assembly date</th>';
                                                                                                                    echo '<th>Result</th>';
                                                                                                                    echo '<th>Detail</th>';
                                                                                                                    echo '</tr>';
                                                                                                                    echo '</thead>';
                        
                                                                                                                    }

                                                                                                                    
                                                                                                                  }
                                                                                                                  else
                                                                                                                  {
                                                                                                                   // $db_select = mysqli_select_db($conn,'npt') ; 
                                                                                                                    $sql_get_processname_ll3 = "SELECT * FROM `npt`.`receiving` WHERE Item_number = '$bf_l3'; ";   
                                                                                                                    $result_cal_ll3 = mysqli_query($conn,$sql_get_processname_ll3);
                                                                                                                    $count_p_ll3 = mysqli_num_rows($result_cal);
                              
                              
                                                                                                                          if($count_p_ll3>0)
                                                                                                                          {
                                                                                                                            $row_l3 = mysqli_fetch_assoc($result_cal_ll3);
                                                                                                                            $sub_name = $row_l3['Item_name'];
                                                                                                                            $sub_type = $row_l3['vendor_code'];
                                                                                                                            $sub_table = $row_l3['Dept'];
                                                                                                                            $sub_code_rev = $row_l3['Revision'];  //
                              
                                                                                                                          }

                                                                                                                          echo '<li class="bgC4" id="item_1">';
                                                                                                                          echo '<div>';
                                                                                                                          echo '<table class="table table-striped table-bordered first">';
                                                                                                                          echo '<thead class="table-primary">';
                                                                                                                          echo '<tr>';
                                                                                                                          echo '<th>Code3</th>';   
                                                                                                                          echo '<th>Process Name</th>';
                                                                                                  
                                                                                                                          echo '<th>Rev</th>';
                                                                                                                          echo '<th>Lot</th>';
                                                                                                                          echo '<th>Invoice</th>';
                                                                                                                          echo '<th>Result</th>';
                                                                                                                          echo '<th>Detail</th>';
                                                                                                                          echo '</tr>';
                                                                                                                          echo '</thead>';
                                                                                                                      

                                                                                                                  }
                                                                                                                 



                                                                                                                  //---------------------------------table body--------------------------------
                                                                                                                  if($bf_l3[0] == "W" OR $bf_l3[0] == "S")
                                                                                                                  {
                                                                                                                     echo '<tbody class="table-info">';
                                                                                                                  }
                                                                                                                  else
                                                                                                                  {
                                                                                                                     echo '<tbody class="table-warning">'; 
                                                                                                                  }
                                                                                                                  echo '<tr>';
                                                                                                                  echo '<td>'.$bf_l3.'</td>';
                                                                                                                  echo  '<td>'.$sub_name.'</td>';
                                                                                                                  echo  '<td>'.$sub_code_rev.'</td>';
                                                                                                                  echo   '<td>'.$lott_l3.'</td>';
                                                                                                                  echo   '<td>'.$PD_inv_l3.'</td>';
                                                                                                                  
                                                                                                                  if($bf_l3[0] == "W" OR $bf_l3[0] == "S")
                                                                                                                  {

                                                                                                                    echo '<td>'.$op_name.' // id :: '.$op_id.'</td>';
                                                                                                                    echo '<td>'.$create_date.'</td>';
                      
                                                                                                                  }
                                                                                                                  echo   '<td>'.$total_result.'</td>';
                                                                                                                  
                                                                                                                  echo '<td>';
                                                                                                                  

                                                                                                                  
                                                                                                                  $db_select = mysqli_select_db($conn,'npt-baxter-lvp') ; 
                                                                                                                  $sql_station = "SELECT * FROM `npt-baxter-lvp`.`station` WHERE id = '$sd_id_l3'; ";
                                                                                                                  $result_station = mysqli_query($conn,$sql_station);
                                                                                                                  $count_station = mysqli_num_rows($result_station);
                              
                              
                                                                                                                      if($count_station==1)
                                                                                                                      {
                                                                                                                      $row_station = mysqli_fetch_assoc($result_station);
                                                                                                                      $station_n = $row_station['station_name'];
                                                                                                                      
                              
                                                                                                                      }
                                                                              
                                                                                                                      else
                                                                                                                      {
                                                                                                                        
                                                                                                                      }




                                                                                                                  if($bf_l3[0] == "W" OR $bf_l3[0] == "S")
                                                                                                                  {
                                                                                                                    echo '<a href='.SITEURL.'Sub_process.php?database='.$sub_table.'&PD='.$PD_inv_l3.'&lot='.$lott_l3.'&main='.$process_name.'&search='.$search.'&Station='.$station_n.'&result='.$result_l3.'&WI='.$sub_WI.'&WV='.$sub_WV.'&DC='.$sd_dc_l3.'&SN='.$sd_id_l3.'&AS='.$sub_assy_l3.'&TY=SUB'.'&'.'type="button" class ="btn btn-info">Detail</a>';
                                                                                                                  }
                                                                                                                  else
                                                                                                                  {

                                                                                                                    echo '<a href='.SITEURL.'Sub_part.php?part='.$bf_l3.'&inv='.$PD_inv_l3.'&lot='.$lott_l3.'&rev='.$sub_code_rev.'&search='.$search.'&MN='.$sub_table.' type="button"'. 'class ="btn btn-info"'.'>Detail</a>';
                                                                                                                  }
        
                                                                                           
        
        
                                                                                          
                                                                                           
                                                                                                                   echo '</td>';

                                                                                                                  echo   '</tr>';
                                                                                                                  echo'</tbody>';




                                                                                                                  //--------------------------------------------------------------------------
                                                                                                                 
                                                                                                                  echo'</table>';
                                                                                                                echo '</div>';


                                                                                                                if ((($bf_l3[0] == "W") OR ($bf_l3[0] == "S" )) AND ($sub_type == 'SUB'))
                                                                                                                {


                                                                                                                 
//----------------------------------------------------------LOOP4-------------------------------------------------------------------------------------------

                                                                                                                      echo '<ul class="">';

                                                                                                                      $db_select = mysqli_select_db($conn,'npt-baxter-lvp') ; 
                                                                                                                      $sql_loop4 = "SELECT * FROM `npt-baxter-lvp`.`$sub_table` WHERE production_order_no = '$PD_inv_l3' AND lot_no = '$lott_l3';  ";   
                                                                                                                    
                                                                                                                      
                                                                                                                      $result_loop4  = mysqli_query($conn,$sql_loop4); 
                                                                                                                    
                                                                                                                      if($result_loop4 === FALSE)
                                                                                                                      {
                                                                                                                        
                                                                                                                      }
                                                                                                                      else 
                                                                                                                      {
                                                                                                                      

                                                                                                                        if(isset($result_loop4) )
                                                                                                                        {
                
                                                                                                                          
                                                                                                                          $loop4_topic = mysqli_fetch_assoc($result_loop4);
                                                                                                                          $PD_l3 = $loop4_topic['production_order_no'];
                                                                                                                         
                                                                                                                          $lot_l3 = $loop4_topic['lot_no'];
                                                                                                                          $sd_id_l3 = $loop4_topic['station_id'];
                                                                                                                          $sd_dc_l3 =  $loop4_topic['station_daily_check_id'];
                
                                                                                                                          $process_id_l3 = $loop4_topic['process_id'];
                                                                                                                          $result_l3 = $loop4_topic['total_result'];
                                                                                                                          $op_name = $loop4_topic['create_operator_name'];
                                                                                                                          $op_id = $loop4_topic['create_operator_id'];
                                                                                                                          $create_date = $loop4_topic['create_date'];
                                                                                                                          $total_result =$loop3_topic['total_result'];

                                                                                                                          for ($x = 1; $x <= 15; $x++) 
                                                                                                                          {
                                                                                                                            
                                                                                                                            $bf_l3 =$loop4_topic['parts_code_'.$x];
                                                                                                                            $PD_inv_l3 =$loop4_topic['process_invoice_'.$x];
                                                                                                                            $lott_l3 =$loop4_topic['parts_lot_'.$x];

                                                                                                                           
                                                                                                                            if(!empty($bf_l3))
                                                                                                                            {
                                                                                                                             

                                                                                                                              if($bf_l3[0] == "W")
                                                                                                                              {
                                                                                                                                $db_select = mysqli_select_db($conn,'npt-baxter-lvp') ; 
                                                                                                                                $sql_get_processname_ll3 = "SELECT * FROM `npt-baxter-lvp`.`process` WHERE code = '$bf_l3'; ";
                                                                                                                                $result_cal_ll3 = mysqli_query($conn,$sql_get_processname_ll3 );
                                                                                                                                $count_p_ll3 = mysqli_num_rows($result_cal_ll3);
                                                                                                                                if($count_p_ll3==1)
                                                                                                                                {
                                                                                                                                $row_l3 = mysqli_fetch_assoc($result_cal_ll3);
                                                                                                                                $sub_name = $row_l3['process_name'];
                                                                                                                                $sub_type = $row_l3['process_type'];
                                                                                                                                $sub_table = $row_l3['process_table'];
                                                                                                                                $sub_code = $row_l3['code'];
                                                                                                                                $sub_code_rev = $row_l3['code_rev'];
                                                                                                                                                                                                                      // $sub_name = $row_t['process_name'];
                                                                                                                                
                                                                                                                                $sub_WI = $row_l3['wi_no'];
                                                                                                                                $sub_WV = $row_l3['wi_revision'];
                                                                                                                                $sub_dc = $row_l3['wi_revision'];
                                                                                                                                $sub_assy = $row_l3['wi_revision'];
                                                                                                                                echo '<li class="bgC4" id="item_1">';
                                                                                                                                echo '<div>';
                                                                                                                                echo '<table class="table table-striped table-bordered first">';
                                                                                                                                echo '<thead class="table-primary">';
                                                                                                                                echo '<tr>';
                                                                                                                                echo '<th>Code4</th>';   
                                                                                                                                echo '<th>Process Name</th>';
                                                                                                        
                                                                                                                                echo '<th>Rev</th>';
                                                                                                                                echo '<th>Lot</th>';
                                                                                                                                echo '<th>Production Order</th>';
                                                                                                                                echo '<th>Result</th>';
                                                                                                                                echo '<th>operator</th>';
                                                                                                                                echo '<th>assembly date</th>';
                                                                                                                                echo '<th>Detail</th>';
                                                                                                                                echo '</tr>';
                                                                                                                                echo '</thead>';
                                                                                                                               }
                                     
                                                                                                                              }
                                                                                                                              else
                                                                                                                              {
                                                                                                                                 $db_select = mysqli_select_db($conn,'npt') ; 
                                                                                                                                 $sql_get_processname_ll3 = "SELECT * FROM `npt`.`receiving` WHERE Item_number = '$bf_l3'; ";   
                                                                                                                                 $result_cal_ll3 = mysqli_query($conn,$sql_get_processname_ll3);
                                                                                                                                 $count_p_ll3 = mysqli_num_rows($result_cal_ll3);
                                           
                                           
                                                                                                                                       if($count_p_ll3>0)
                                                                                                                                       {
                                                                                                                                         $row_l3 = mysqli_fetch_assoc($result_cal_ll3);
                                                                                                                                         $sub_name = $row_l3['Item_name'];
                                                                                                                                         $sub_type = $row_l3['vendor_code'];
                                                                                                                                         $sub_table = $row_l3['Dept'];
                                                                                                                                         $sub_code_rev = $row_l3['Revision'];  //
                                           
                                                                                                                                       }
                                                                                                                                       echo '<li class="bgC4" id="item_1">';
                                                                                                                                        echo '<div>';
                                                                                                                                        echo '<table class="table table-striped table-bordered first">';
                                                                                                                                        echo '<thead class="table-primary">';
                                                                                                                                        echo '<tr>';
                                                                                                                                        echo '<th>Code4</th>';   
                                                                                                                                        echo '<th>Process Name</th>';
                                                                                                                
                                                                                                                                        echo '<th>Rev</th>';
                                                                                                                                        echo '<th>Lot</th>';
                                                                                                                                        echo '<th>Invoice</th>';
                                                                                                                                        echo '<th>Result</th>';
                                                                                                                                        echo '<th>Detail</th>';
                                                                                                                                        echo '</tr>';
                                                                                                                                        echo '</thead>';

                                                                                                                                   
             
                                                                                                                               }

                                                                                                                                
                                                                                                                                if($bf_l3[0] == "W" OR $bf_l3[0] == "S")
                                                                                                                                {
                                                                                                                                   echo '<tbody class="table-info">';
                                                                                                                                }
                                                                                                                                else
                                                                                                                                {
                                                                                                                                   echo '<tbody class="table-warning">'; 
                                                                                                                                }
                                                                                                                                echo '<tr>';
                                                                                                                                echo '<td>'.$bf_l3.'</td>';
                                                                                                                                echo  '<td>'.$sub_name.'</td>';
                                                                                                                                echo  '<td>'.$sub_code_rev.'</td>';
                                                                                                                                echo   '<td>'.$lott_l3.'</td>';
                                                                                                                                echo   '<td>'.$PD_inv_l3.'</td>';
                                                                                                                                echo   '<td>'.$total_result.'</td>';
                                                                                                                                if($bf_l3[0] == "W" OR $bf_l3[0] == "S")
                                                                                                                                {
                                                                                                                                  echo '<td>'.$op_name.' // id :: '.$op_id.'</td>';  
                                                                                                                                  echo '<td>'.$create_date.'</td>';

                                                                                                                                }
                                                                                                                                
                                                                                                                                echo '<td>';

                                                                                                                                $db_select = mysqli_select_db($conn,'npt-baxter-lvp') ; 
                                                                                                                                $sql_station = "SELECT * FROM `npt-baxter-lvp`.`station` WHERE id = '$sd_id_l3'; ";
                                                                                                                                $result_station = mysqli_query($conn,$sql_station);
                                                                                                                                $count_station = mysqli_num_rows($result_station);
                                            
                                            
                                                                                                                                    if($count_station==1)
                                                                                                                                    {
                                                                                                                                    $row_station = mysqli_fetch_assoc($result_station);
                                                                                                                                    $station_n = $row_station['station_name'];
                                                                                                                                    
                                            
                                                                                                                                    }
                                                                                            
                                                                                                                                    else
                                                                                                                                    {
                                                                                                                                      
                                                                                                                                    }




                                                                                                                                if($bf_l3[0] == "W" OR $bf_l3[0] == "S")
                                                                                                                                {
                                                                                                                                  echo '<a href='.SITEURL.'Sub_process.php?database='.$sub_table.'&PD='.$PD_inv_l3.'&lot='.$lott_l3.'&main='.$process_name.'&search='.$search.'&Station='.$station_n.'&result='.$result_l3.'&WI='.$sub_WI.'&WV='.$sub_WV.'&DC='.$sd_dc_l3.'&SN='.$sd_id_l3.'&AS='.$sub_assy_l3.'&TY=SUB'.'&'.'type="button" class ="btn btn-info">Detail</a>';
                                                                                                                                }
                                                                                                                                else
                                                                                                                                {

                                                                                                                                  echo '<a href='.SITEURL.'Sub_part.php?part='.$bf_l3.'&inv='.$PD_inv_l3.'&lot='.$lott_l3.'&rev='.$sub_code_rev.'&search='.$search.'&MN='.$sub_table.' type="button"'. 'class ="btn btn-info"'.'>Detail</a>';
                                                                                                                                }
        
                                                                                                         
                      
                      
                                                                                                        
                                                                                                         
                                                                                                                                 echo '</td>';
              
                                                                                                                                echo   '</tr>';
                                                                                                                                echo'</tbody>';
              
              
              
              
                                                                                                                                //--------------------------------------------------------------------------
                                                                                                                               
                                                                                                                                echo'</table>';
                                                                                                                              echo '</div>';

                                                                                                                              if ((($bf_l3[0] == "W") OR ($bf_l3[0] == "S" )) AND ($sub_type == 'SUB'))
                                                                                                                              {
              
              
                                                                                                                               
              //----------------------------------------------------------LOOP4-------------------------------------------------------------------------------------------
              
                                                                                                                                    echo '<ul class="">';
              
                                                                                                                                    $db_select = mysqli_select_db($conn,'npt-baxter-lvp') ; 
                                                                                                                                    $sql_loop4 = "SELECT * FROM `npt-baxter-lvp`.`$sub_table` WHERE production_order_no = '$PD_inv_l3' AND lot_no = '$lott_l3';  ";   
                                                                                                                                  
                                                                                                                                    
                                                                                                                                    $result_loop4  = mysqli_query($conn,$sql_loop4); 
                                                                                                                                  
                                                                                                                                    if($result_loop4 === FALSE)
                                                                                                                                    {
                                                                                                                                      
                                                                                                                                    }
                                                                                                                                    else 
                                                                                                                                    {
                                                                                                                                    
              
                                                                                                                                      if(isset($result_loop4) )
                                                                                                                                      {
                              
                                                                                                                                        
                                                                                                                                        $loop4_topic = mysqli_fetch_assoc($result_loop4);
                                                                                                                                        $PD_l3 = $loop4_topic['production_order_no'];
                                                                                                                                       
                                                                                                                                        $lot_l3 = $loop4_topic['lot_no'];
                                                                                                                                        $sd_id_l3 = $loop4_topic['station_id'];
                                                                                                                                        $sd_dc_l3 =  $loop4_topic['station_daily_check_id'];
                              
                                                                                                                                        $process_id_l3 = $loop4_topic['process_id'];
                                                                                                                                        $result_l3 = $loop4_topic['total_result'];
                                                                                                                                        $op_name = $loop4_topic['create_operator_name'];
                                                                                                                                        $op_id = $loop4_topic['create_operator_id'];
                                                                                                                                        $create_date = $loop4_topic['create_date'];
                                                                                                                                        $total_result =$loop4_topic['total_result'];




              
                                                                                                                                        for ($x = 1; $x <= 15; $x++) 
                                                                                                                                        {
                                                                                                                                          
                                                                                                                                          $bf_l3 =$loop4_topic['parts_code_'.$x];
                                                                                                                                          $PD_inv_l3 =$loop4_topic['process_invoice_'.$x];
                                                                                                                                          $lott_l3 =$loop4_topic['parts_lot_'.$x];
              
                                                                                                                                         
                                                                                                                                          if(!empty($bf_l3))
                                                                                                                                          {
                                                                                                                                           
              
                                                                                                                                            if($bf_l3[0] == "W")
                                                                                                                                            {
                                                                                                                                              $db_select = mysqli_select_db($conn,'npt-baxter-lvp') ; 
                                                                                                                                              $sql_get_processname_ll3 = "SELECT * FROM `npt-baxter-lvp`.`process` WHERE code = '$bf_l3'; ";
                                                                                                                                              $result_cal_ll3 = mysqli_query($conn,$sql_get_processname_ll3 );
                                                                                                                                              $count_p_ll3 = mysqli_num_rows($result_cal_ll3);
                                                                                                                                              if($count_p_ll3==1)
                                                                                                                                              {
                                                                                                                                              $row_l3 = mysqli_fetch_assoc($result_cal_ll3);
                                                                                                                                              $sub_name = $row_l3['process_name'];
                                                                                                                                              $sub_type = $row_l3['process_type'];
                                                                                                                                              $sub_table = $row_l3['process_table'];
                                                                                                                                              $sub_code = $row_l3['code'];
                                                                                                                                              $sub_code_rev = $row_l3['code_rev'];
                                                                                                                                                                                                                                    // $sub_name = $row_t['process_name'];
                                                                                                                                              
                                                                                                                                              $sub_WI = $row_l3['wi_no'];
                                                                                                                                              $sub_WV = $row_l3['wi_revision'];
                                                                                                                                              $sub_dc = $row_l3['wi_revision'];
                                                                                                                                              $sub_assy = $row_l3['wi_revision'];
                                                                                                                                             }

                                                                                                                                             echo '<li class="bgC4" id="item_1">';
                                                                                                                                              echo '<div>';
                                                                                                                                              echo '<table class="table table-striped table-bordered first">';
                                                                                                                                              echo '<thead class="table-primary">';
                                                                                                                                              echo '<tr>';
                                                                                                                                              echo '<th>Code5</th>';   
                                                                                                                                              echo '<th>Process Name</th>';
                                                                                                                      
                                                                                                                                              echo '<th>Rev</th>';
                                                                                                                                              echo '<th>Lot</th>';
                                                                                                                                              echo '<th>Production Order</th>';
                                                                                                                                              echo '<th>operator</th>';
                                                                                                                                              echo '<th>assembly date</th>';
                                                                                                                                              echo '<th>Result</th>';
                                                                                                                                              echo '<th>Detail</th>';
                                                                                                                                              echo '</tr>';
                                                                                                                                              echo '</thead>';
                                                   
                                                                                                                                            }
                                                                                                                                            else
                                                                                                                                            {
                                                                                                                                               $db_select = mysqli_select_db($conn,'npt') ; 
                                                                                                                                               $sql_get_processname_ll3 = "SELECT * FROM `npt`.`receiving` WHERE Item_number = '$bf_l3'; ";   
                                                                                                                                               $result_cal_ll3 = mysqli_query($conn,$sql_get_processname_ll3);
                                                                                                                                               $count_p_ll3 = mysqli_num_rows($result_cal_ll3);
                                                         
                                                         
                                                                                                                                                     if($count_p_ll3>0)
                                                                                                                                                     {
                                                                                                                                                       $row_l3 = mysqli_fetch_assoc($result_cal_ll3);
                                                                                                                                                       $sub_name = $row_l3['Item_name'];
                                                                                                                                                       $sub_type = $row_l3['vendor_code'];
                                                                                                                                                       $sub_table = $row_l3['Dept'];
                                                                                                                                                       $sub_code_rev = $row_l3['Revision'];  //
                                                         
                                                                                                                                                     }
                                                                                                                                                     echo '<li class="bgC4" id="item_1">';
                                                                                                                                                     echo '<div>';
                                                                                                                                                     echo '<table class="table table-striped table-bordered first">';
                                                                                                                                                     echo '<thead class="table-primary">';
                                                                                                                                                     echo '<tr>';
                                                                                                                                                     echo '<th>Code5</th>';   
                                                                                                                                                     echo '<th>Process Name</th>';
                                                                                                                             
                                                                                                                                                     echo '<th>Rev</th>';
                                                                                                                                                     echo '<th>Lot</th>';
                                                                                                                                                     echo '<th>Invioce</th>';
                                                                                                                                                     echo '<th>Result</th>';
                                                                                                                                                     echo '<th>Detail</th>';
                                                                                                                                                     echo '</tr>';
                                                                                                                                                     echo '</thead>';
                           
                                                                                                                                             }
              
                                                                                                                                              
                                                                                                                                              if($bf_l3[0] == "W" OR $bf_l3[0] == "S")
                                                                                                                                              {
                                                                                                                                                 echo '<tbody class="table-info">';
                                                                                                                                              }
                                                                                                                                              else
                                                                                                                                              {
                                                                                                                                                 echo '<tbody class="table-warning">'; 
                                                                                                                                              }
                                                                                                                                              echo '<tr>';
                                                                                                                                              echo '<td>'.$bf_l3.'</td>';
                                                                                                                                              echo  '<td>'.$sub_name.'</td>';
                                                                                                                                              echo  '<td>'.$sub_code_rev.'</td>';
                                                                                                                                              echo   '<td>'.$lott_l3.'</td>';
                                                                                                                                              echo   '<td>'.$PD_inv_l3.'</td>';
                                                                                                                                              if($bf_l3[0] == "W" OR $bf_l3[0] == "S")
                                                                                                                                              {


                                                                                                                                                echo '<td>'.$op_name.' // id :: '.$op_id.'</td>';
                                                                                                                                                echo '<td>'.$create_date.'</td>';

                                                                                                                                              }



                                                                                                                                              echo   '<td>'.$total_result.'</td>';
                                                                                                                                              echo '<td>';

                                                                                                                                              
                                                                                                                                              $db_select = mysqli_select_db($conn,'npt-baxter-lvp') ; 
                                                                                                                                              $sql_station = "SELECT * FROM `npt-baxter-lvp`.`station` WHERE id = '$sd_id_l3'; ";
                                                                                                                                              $result_station = mysqli_query($conn,$sql_station);
                                                                                                                                              $count_station = mysqli_num_rows($result_station);
                                                          
                                                          
                                                                                                                                                  if($count_station==1)
                                                                                                                                                  {
                                                                                                                                                  $row_station = mysqli_fetch_assoc($result_station);
                                                                                                                                                  $station_n = $row_station['station_name'];
                                                                                                                                                  
                                                          
                                                                                                                                                  }
                                                                                                          
                                                                                                                                                  else
                                                                                                                                                  {
                                                                                                                                                    
                                                                                                                                                  }







                                                                                                                                              if($bf_l3[0] == "W" OR $bf_l3[0] == "S")
                                                                                                                                              {
                                                                                                                                                echo '<a href='.SITEURL.'Sub_process.php?database='.$sub_table.'&PD='.$PD_inv_l3.'&lot='.$lott_l3.'&main='.$process_name.'&search='.$search.'&Station='.$station_n.'&result='.$result_l3.'&WI='.$sub_WI.'&WV='.$sub_WV.'&DC='.$sd_dc_l3.'&SN='.$sd_id_l3.'&AS='.$sub_assy_l3.'&TY=SUB'.'&'.'type="button" class ="btn btn-info">Detail</a>';
                                                                                                                                              }
                                                                                                                                              else
                                                                                                                                              {

                                                                                                                                                echo '<a href='.SITEURL.'Sub_part.php?part='.$bf_l3.'&inv='.$PD_inv_l3.'&lot='.$lott_l3.'&rev='.$sub_code_rev.'&search='.$search.'&MN='.$sub_table.' type="button"'. 'class ="btn btn-info"'.'>Detail</a>';
                                                                                                                                              }
                                                                                                                                    
                                    
                                    
                                                                                                                      
                                                                                                                       
                                                                                                                                               echo '</td>';
                            
                                                                                                                                              echo   '</tr>';
                                                                                                                                              echo'</tbody>';
                            
                            
                            
                            
                                                                                                                                              //--------------------------------------------------------------------------
                                                                                                                                             
                                                                                                                                              echo'</table>';
                                                                                                                                            echo '</div>';
              
                                                                                                                                            if ((($bf_l3[0] == "W") OR ($bf_l3[0] == "S" )) AND ($sub_type == 'SUB'))
                                                                                                                                            {
                            
                            
                                                                                                                                             
                            //----------------------------------------------------------LOOP4-------------------------------------------------------------------------------------------
                            
                                                                                                                                                  echo '<ul class="">';
                            
                                                                                                                                                  $db_select = mysqli_select_db($conn,'npt-baxter-lvp') ; 
                                                                                                                                                  $sql_loop4 = "SELECT * FROM `npt-baxter-lvp`.`$sub_table` WHERE production_order_no = '$PD_inv_l3' AND lot_no = '$lott_l3';  ";   
                                                                                                                                                
                                                                                                                                                  
                                                                                                                                                  $result_loop4  = mysqli_query($conn,$sql_loop4); 
                                                                                                                                                
                                                                                                                                                  if($result_loop4 === FALSE)
                                                                                                                                                  {
                                                                                                                                                    
                                                                                                                                                  }
                                                                                                                                                  else 
                                                                                                                                                  {
                                                                                                                                                  
                            
                                                                                                                                                    if(isset($result_loop4) )
                                                                                                                                                    {
                                            
                                                                                                                                                      
                                                                                                                                                      $loop4_topic = mysqli_fetch_assoc($result_loop4);
                                                                                                                                                      $PD_l3 = $loop4_topic['production_order_no'];
                                                                                                                                                     
                                                                                                                                                      $lot_l3 = $loop4_topic['lot_no'];
                                                                                                                                                      $sd_id_l3 = $loop4_topic['station_id'];
                                                                                                                                                      $sd_dc_l3 =  $loop4_topic['station_daily_check_id'];
                                            
                                                                                                                                                      $process_id_l3 = $loop4_topic['process_id'];
                                                                                                                                                      $result_l3 = $loop4_topic['total_result'];
                            
                                                                                                                                                      for ($x = 1; $x <= 15; $x++) 
                                                                                                                                                      {
                                                                                                                                                        
                                                                                                                                                        $bf_l3 =$loop4_topic['parts_code_'.$x];
                                                                                                                                                        $PD_inv_l3 =$loop4_topic['process_invoice_'.$x];
                                                                                                                                                        $lott_l3 =$loop4_topic['parts_lot_'.$x];
                            
                                                                                                                                                       
                                                                                                                                                        if(!empty($bf_l3))
                                                                                                                                                        {
                                                                                                                                                         
                            
                                                                                                                                                          if($bf_l3[0] == "W")
                                                                                                                                                          {
                                                                                                                                                            $db_select = mysqli_select_db($conn,'npt-baxter-lvp') ; 
                                                                                                                                                            $sql_get_processname_ll3 = "SELECT * FROM `npt-baxter-lvp`.`process` WHERE code = '$bf_l3'; ";
                                                                                                                                                            $result_cal_ll3 = mysqli_query($conn,$sql_get_processname_ll3 );
                                                                                                                                                            $count_p_ll3 = mysqli_num_rows($result_cal_ll3);
                                                                                                                                                            if($count_p_ll3==1)
                                                                                                                                                            {
                                                                                                                                                            $row_l3 = mysqli_fetch_assoc($result_cal_ll3);
                                                                                                                                                            $sub_name = $row_l3['process_name'];
                                                                                                                                                            $sub_type = $row_l3['process_type'];
                                                                                                                                                            $sub_table = $row_l3['process_table'];
                                                                                                                                                            $sub_code = $row_l3['code'];
                                                                                                                                                            $sub_code_rev = $row_l3['code_rev'];
                                                                                                                                                                                                                                                  // $sub_name = $row_t['process_name'];
                                                                                                                                                            
                                                                                                                                                            $sub_WI = $row_l3['wi_no'];
                                                                                                                                                            $sub_WV = $row_l3['wi_revision'];
                                                                                                                                                            $sub_dc = $row_l3['wi_revision'];
                                                                                                                                                            $sub_assy = $row_l3['wi_revision'];
                                                                                                                                                           }
                                                                 
                                                                                                                                                          }
                                                                                                                                                          else
                                                                                                                                                          {
                                                                                                                                                             $db_select = mysqli_select_db($conn,'npt') ; 
                                                                                                                                                             $sql_get_processname_ll3 = "SELECT * FROM `npt`.`receiving` WHERE Item_number = '$bf_l3'; ";   
                                                                                                                                                             $result_cal_ll3 = mysqli_query($conn,$sql_get_processname_ll3);
                                                                                                                                                             $count_p_ll3 = mysqli_num_rows($result_cal_ll3);
                                                                       
                                                                       
                                                                                                                                                                   if($count_p_ll3>0)
                                                                                                                                                                   {
                                                                                                                                                                     $row_l3 = mysqli_fetch_assoc($result_cal_ll3);
                                                                                                                                                                     $sub_name = $row_l3['Item_name'];
                                                                                                                                                                     $sub_type = $row_l3['vendor_code'];
                                                                                                                                                                     $sub_table = $row_l3['Dept'];
                                                                                                                                                                     $sub_code_rev = $row_l3['Revision'];  //
                                                                       
                                                                                                                                                                   }
                                                                                                                                                               
                                         
                                                                                                                                                           }
                            
                                                                                                                                                            echo '<li class="bgC4" id="item_1">';
                                                                                                                                                            echo '<div>';
                                                                                                                                                            echo '<table class="table table-striped table-bordered first">';
                                                                                                                                                            echo '<thead class="table-primary">';
                                                                                                                                                            echo '<tr>';
                                                                                                                                                            echo '<th>Code6</th>';   
                                                                                                                                                            echo '<th>Process Name</th>';
                                                                                                                                    
                                                                                                                                                            echo '<th>Rev</th>';
                                                                                                                                                            echo '<th>Lot</th>';
                                                                                                                                                            echo '<th>Production Order</th>';
                                                                                                                                                            echo '<th>Result</th>';
                                                                                                                                                            echo '<th>Detail</th>';
                                                                                                                                                            echo '</tr>';
                                                                                                                                                            echo '</thead>';
                                                                                                                                                            if($bf_l3[0] == "W" OR $bf_l3[0] == "S")
                                                                                                                                                            {
                                                                                                                                                               echo '<tbody class="table-info">';
                                                                                                                                                            }
                                                                                                                                                            else
                                                                                                                                                            {
                                                                                                                                                               echo '<tbody class="table-warning">'; 
                                                                                                                                                            }
                                                                                                                                                            echo '<tr>';
                                                                                                                                                            echo '<td>'.$bf_l3.'</td>';
                                                                                                                                                            echo  '<td>'.$sub_name.'</td>';
                                                                                                                                                            echo  '<td>'.$sub_code_rev.'</td>';
                                                                                                                                                            echo   '<td>'.$lott_l3.'</td>';
                                                                                                                                                            echo   '<td>'.$PD_inv_l3.'</td>';
                                                                                                                                                            echo   '<td>'.$result_l3.'</td>';
                                                                                                                                                            echo '<td>';
                                                                                                                                                            if($count_station==1)
                                                                                                                                                            {
                                                                                                                                                            $row_station = mysqli_fetch_assoc($result_station);
                                                                                                                                                            $station_n = $row_station['station_name'];
                                                                                                                                                            
                                                                    
                                                                                                                                                            }
                                                                                                                    
                                                                                                                                                            else
                                                                                                                                                            {
                                                                                                                                                              
                                                                                                                                                            }
          
          
          
          
          
          
          
                                                                                                                                                        if($bf_l3[0] == "W" OR $bf_l3[0] == "S")
                                                                                                                                                        {
                                                                                                                                                          echo '<a href='.SITEURL.'Sub_process.php?database='.$sub_table.'&PD='.$PD_inv_l3.'&lot='.$lott_l3.'&main='.$process_name.'&search='.$search.'&Station='.$station_n.'&result='.$result_l3.'&WI='.$sub_WI.'&WV='.$sub_WV.'&DC='.$sd_dc_l3.'&SN='.$sd_id_l3.'&AS='.$sub_assy_l3.'&TY=SUB'.'&'.'type="button" class ="btn btn-info">Detail</a>';
                                                                                                                                                        }
                                                                                                                                                        else
                                                                                                                                                        {
          
                                                                                                                                                          echo '<a href='.SITEURL.'Sub_part.php?part='.$bf_l3.'&inv='.$PD_inv_l3.'&lot='.$lott_l3.'&rev='.$sub_code_rev.'&search='.$search.'&MN='.$sub_table.' type="button"'. 'class ="btn btn-info"'.'>Detail</a>';
                                                                                                                                                        }
                                                                                                                                     
                                                  
                                                  
                                                                                                                                    
                                                                                                                                     
                                                                                                                                                             echo '</td>';
                                          
                                                                                                                                                            echo   '</tr>';
                                                                                                                                                            echo'</tbody>';
                                          
                                          
                                          
                                          
                                                                                                                                                            //--------------------------------------------------------------------------
                                                                                                                                                           
                                                                                                                                                            echo'</table>';
                                                                                                                                                          echo '</div>';
                            
                                                                                                                                                          if ((($bf_l3[0] == "W") OR ($bf_l3[0] == "S" )) AND ($sub_type == 'SUB'))
                                                                                                                                                          {
                                                                                                                                                          echo '<ul class="">
                                                                                                                                                          <li class="bgC4" id="item_1">
                                                                                                                                                            <div>Item 1</div>
                                                                                                                                                          </li>
                                                                                                                                                          <li class="bgC4" id="item_2">
                                                                                                                                                            <div>Item 2</div>
                                                                                                                                                          </li>
                                                                                                                                                          <li class="bgC4" id="item_3">
                                                                                                                                                            <div>Item 3</div>
                                                                                                                                                          </li>
                                                                                                                                                          <li class="bgC4" id="item_4">
                                                                                                                                                            <div>Item 4</div>
                                                                                                                                                          </li>
                                                                                                                                                          <li class="bgC4" id="item_5">
                                                                                                                                                            <div>Item 5</div>
                                                                                                                                                          </li>
                                                                                                                                                            </ul>';
                                                                                                                                                          }
                            
                            
                            
                            
                            
                            
                            
                            
                            
                                                                                                                                                       
                                                                                                                                                         
                                                                                                                                                          //
                                                                                                                                                        }
                                                                                                                                                      }
                            
                                                                                                                                                  
                                                                                                                                                    }
                                                                                                                                                  }
                            
                            
                                                                                                                                                  echo '</li>';
                                                                                                                                                  echo '</ul>';
                            
                                                                                                                                                
                            
                            
                                                                                                                                                 
                            //
                            
                            
                            
                            //---------------------------------------------------------------------------------------------------------------------------------------------------------------------                                                                                                              
                                                                                                                                            }
                            
              
              
              
              
              
              
              
              
              
                                                                                                                                         
                                                                                                                                           
                                                                                                                                            //
                                                                                                                                          }
                                                                                                                                        }
              
                                                                                                                                    
                                                                                                                                      }
                                                                                                                                    }
              
              
                                                                                                                                    echo '</li>';
                                                                                                                                    echo '</ul>';
              
                                                                                                                                  
              
              
                                                                                                                                   
              //
              
              
              
              //---------------------------------------------------------------------------------------------------------------------------------------------------------------------                                                                                                              
                                                                                                                              }
              









                                                                                                                           
                                                                                                                             
                                                                                                                              //
                                                                                                                            }
                                                                                                                          }

                                                                                                                      
                                                                                                                        }
                                                                                                                      }


                                                                                                                      echo '</li>';
                                                                                                                      echo '</ul>';

                                                                                                                    


                                                                                                                     
//



//---------------------------------------------------------------------------------------------------------------------------------------------------------------------                                                                                                              
                                                                                                                }



                                                                                                                  
                                                                                                              }


                                                                                                        }
                                                                                                          
                                                                                                      }
                                                                                                   }
                                                                                          
                                                                                            //echo '</div>';
                                                                                            echo '</li>';
                                                                                            echo '</ul>';

                                                                                            

                                                                                            }
                                                                                            else
                                                                                            {


                                                                                            }

                                                                                            echo '</li>';
                                                                                          
                                                                                          
                                                                                    
                                                                                        }


                                                                                        
                                                                                        else
                                                                                        {
                                                                                          
                                                                                            break;
                                                                                        }
                                                                                            
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

                                                            echo '</li>';
                                                            echo '</ul>';

                                                            echo '<div class="scrollUp dN"></div>';
                                                            echo '<div class="scrollDown dN"></div>';
                                                            echo '</div>';
                                                        }
                                                   ?>
                                                    
                                            



                                    </div>




                  <div class="row">
                   
                    

                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                        <br>
                            <h1>Repair details</h1>
                            <section class="text-center">
                                
                                <div>
                                    <table class="table table-striped table-bordered first">
                                        <thead class="table-warning" >
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
                                                            $db_select = mysqli_select_db($conn,'npt-baxter-lvp') ;
                                                          
                                                            $sql_repair = "SELECT T2.code,T1.production_order_no,T1.lot_no,T1.production_order_no_new,T1.lot_no_new,T1.defect_1,T1.defect_2,defect_3,T1.analyzer,T1.action_by,T1.action_need,T1.status,T1.cause_of_defect,T1.create_date FROM `npt-baxter-lvp`.`repair` T1 LEFT JOIN production_order_no T2 ON T2.production_order_no = T1.production_order_no_new WHERE T1.assy_no = '$assy_no';";  //AND  Revision = '$rev'
    
                                                            $res_repair = mysqli_query($conn,$sql_repair);
                                                            $count_repair = mysqli_num_rows($res_repair);
                                                            if($count_repair>0)
                                                            {
                                                                while($data_repair = mysqli_fetch_array($res_repair))
                                                                {
                                                                  echo '<tr>';
                                                                  echo '<td>'.$data_repair['code'].'</td>';
                                                                  echo '<td>'.$data_repair['production_order_no'].'</td>';
                                                                  echo '<td>'.$data_repair['lot_no'].'</td>';
                                                                  echo '<td>'.$data_repair['production_order_no_new'].'</td>';
                                                                  echo '<td>'.$data_repair['lot_no_new'].'</td>';
                                                                  echo '<td>'.$data_repair['defect_1'].'//'.$data_repair['defect_2'].'//'.$data_repair['defect_3'].'</td>';
                                                                  echo '<td>'.$data_repair['analyzer'].'</td>';
                                                                  echo '<td>'.$data_repair['action_by'].'</td>';  //cause_of_defect
                                                                  echo '<td>'.$data_repair['cause_of_defect'].'</td>';
                                                                  echo '<td>'.$data_repair['action_need'].'</td>';
                                                                  echo '<td>'.$data_repair['status'].'</td>';
                                                                  echo '<td>'.$data_repair['create_date'].'</td>';
                                                                  
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


                <div class="row">
                   
                    

                   <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                       <div class="card">
                       <br>
                           <h1>Inspection Detail</h1>
                           <section class="text-center">
                               
                               <div>
                                   <table class="table table-striped table-bordered first">
                                       <thead class="table-success" >
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
                                                           $db_select = mysqli_select_db($conn,'npt-baxter-lvp') ;
                                                          if(!empty($assy_no))
                                                          {
                                                           $sql_qa_inspection = "SELECT * FROM `npt-baxter-lvp`.`qa_inspection`  WHERE assy_no = '$assy_no' OR serial_no = '$search';";  //AND  Revision = '$rev'
                                                          }
                                                          else
                                                          {
                                                            $sql_qa_inspection = "SELECT * FROM `npt-baxter-lvp`.`qa_inspection`  WHERE assy_no = '$search';";
                                                          }
                                                           $res_qa_inspection = mysqli_query($conn,$sql_qa_inspection);
                                                           $count_qa_inspection = mysqli_num_rows($res_qa_inspection);
                                                           if($count_qa_inspection >0)
                                                           {
                                                               while($data_repair = mysqli_fetch_array($res_qa_inspection))
                                                               {
                                                                 echo '<tr>';
                                                                 echo '<td>'.$data_repair['serial_no'].$data_repair['assy_no'].'</td>';
                                                                 echo '<td>'.$data_repair['remark'].'</td>';
                                                                 echo '<td>'.$data_repair['lot_no'].'</td>';
                                                                 echo '<td>'.$data_repair['result'].'</td>';
                                                                 echo '<td>'.$data_repair['create_operator_name'].' id :: '.$data_repair['create_operator_id'].'</td>';
                                                                 echo '<td>'.$data_repair['create_date'].'</td>';
                                                                 
                                                                 echo '</tr>';


                                                               }
                                                           }
                                                           else
                                                           {
                                                            echo "<h1>Not Inspection</h1>";

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
                            
                            </div>


    </div>
             
        
<script type="text/javascript">

  

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>

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

