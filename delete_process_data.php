<?php
include('config/constants.php');

$get_database = $_GET['db'];
$process = $_GET['tb'];
$id = $_GET['id'];


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
$sql = "SELECT * FROM `$get_database`.`$process` WHERE id = $id";
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

$jasonnn = "{";

for ($x = 0; $x <= sizeof($stack) - 1; $x++) {

       $tagname = $row[$stack[$x]];
      
       $value_t =  $stack[$x];
       $jasonnn = "'$tagname':'$value_t',";

       
}
$jasonnn = $jasonnn . "}";



$total_text = $process. $jasonnn;
audit_t($OperatorName, $OperatorID, "position= $id", "Add $process ", "Delete $process", " Delete in process" , "",$get_database);


$sql = "DELETE FROM `$get_database`.`$process` WHERE id = $id";
$res = mysqli_query($conn, $sql);

if ($res == true) {
       //echo "admin Deleteed";
       $_SESSION['delete'] = "<div class = 'success'>Admin Deleted Successfully.</div>";
       header("Location:" . SITEURL . 'process_data.php?db='.$get_database.'&process='.$process.'');  //.SITEURL.'delete_process_data.php
} else {
       //echo "Failed Deleteed";
       $_SESSION['delete'] = "<div class = 'error'>Failed to Delete Admin. Try Again Later.</div>";
       header("Location:" . SITEURL .  'process_data.php?db='.$get_database.'&process='.$process.'');
}
