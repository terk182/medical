<?php
session_start();
//Create Constants to Store Non Repeating Value
define('SITEURL', 'http://128.100.117.95/medical/');
define('LOCALHOST', '128.100.117.98');
define('DB_USERNAME', 'namiki');
define('DB_PASSWORD', 'namiki');
define('DB_NAME', 'npt-baxter-lvp');


$conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD) or die(mysqli_connect_error());;
$db_select = mysqli_select_db($conn, DB_NAME);
//$res = mysqli_query($conn,$sql) or die(mysqli_error()); 



function audit_t($op_name, $op_id, $remark, $source, $action, $details, $position_id, $db)
{

    if (empty($db)) {
        $db = "npt";
    } else {;
    }
    $date_now = date("'Y-m-d'");
    $time_now = date("h:i:s");
    $link = mysqli_connect('128.100.117.98', 'namiki', 'namiki');
    $db_select = mysqli_select_db($link, $db);
    $sql = "INSERT INTO `npt`.`audit_log` (`create_date`,`create_time`,`create_operator_name`,`create_operator_id`,`remark`,`source`,`action`,`details`,`position_id`) 
        VALUES ($date_now, '$time_now', '$op_name', '$op_id', '$remark', '$source', '$action', '$details', '$position_id');";
    mysqli_query($link, $sql);
}

class DB_con
{
    function __construct()
    {
        $conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
        $this->dbcon = $conn;
        $db_select = mysqli_select_db($conn, DB_NAME);
        if (mysqli_connect_errno()) {
            echo "Faild to connect to mySQL :" . mysqli_connect_error();
        }
    }

    public function insert($production_order, $code, $rev, $lot, $assy, $qty)
    {
        $result = mysqli_query($this->dbcon, "INSERT INTO card_tag(production_order,code,rev,lot,assy,qty) VALUES ('$production_order','$code','$rev','$lot','$assy','$qty')");
        return $result;
    }

    public function fetch_all($table)
    {
        $result = mysqli_query($this->dbcon, "SELECT * FROM $table");
        return $result;
    }

    public function updateterk($production_order, $code, $rev, $lot, $assy, $qty, $id)
    {
        $result = mysqli_query($this->dbcon, "UPDATE card_tag SET production_order = '$production_order',code = '$code',rev = '$rev',lot = '$lot' ,assy = '$assy',qty = '$qty' WHERE id = $id;");
        return $result;
    }

    public function fetchonerecord($userid)
    {
        $result = mysqli_query($this->dbcon, "SELECT * FROM card_tag WHERE id = '$userid'");
        return $result;
    }

    public function delete($userid)
    {
        $deleterecord = mysqli_query($this->dbcon, "DELETE FROM card_tag WHERE id = '$userid'");
        return $deleterecord;
    }

    //-------------------------------------------ดึงข้อมูล------------------------------------------
    public function zcode_a($code)
    {
        $conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
        $this->dbcon = $conn;
        $db_select = mysqli_select_db($conn, 'npt');
        $Standard = mysqli_query($this->dbcon, "SELECT distinct Standard,AuthorizerID,Standard_Revision,z_revision,new from qc_specification  WHERE Standard = '$code'");
        return $Standard;
    }
    public function zcode($code, $rev)
    {
        $conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
        $this->dbcon = $conn;
        $db_select = mysqli_select_db($conn, 'npt');
        $Standard = mysqli_query($this->dbcon, "SELECT Standard,AuthorizerID,Standard_Revision,z_revision,new from qc_specification  WHERE Standard = '$code' and z_revision = '$rev'");
        return $Standard;
    }

    public function receiving_check($code, $rev)
    {
        $conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
        $this->dbcon = $conn;
        $db_select = mysqli_select_db($conn, 'npt');
        $Standard = mysqli_query($this->dbcon, "SELECT * from receiving  WHERE Item_number = '$code' and Revision = '$rev'");
        return $Standard;
    }
    public function get_topic($code, $rev, $lot, $inv)
    {
        $conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
        $this->dbcon = $conn;
        $db_select = mysqli_select_db($conn, 'npt');
        $Standard = mysqli_query($this->dbcon, "SELECT * from qc_inspection_result where ItemNo = '$code' and Revision = '$rev' and LotNo = '$lot' and invoiceno = '$inv' AND Approved = 'Pending'");

        return $Standard;
    }
    public function get_spec($code, $rev)
    {
        $conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
        $this->dbcon = $conn;
        $db_select = mysqli_select_db($conn, 'npt');
        $Standard = mysqli_query($this->dbcon, "SELECT * from qc_specification where Standard = '$code' and z_revision = '$rev' and new = 'new' and Remark = 'Last'");

        return $Standard;
    }

    public function instrumant()
    {
        $conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
        $this->dbcon = $conn;
        $db_select = mysqli_select_db($conn, 'npt');
        $Standard = mysqli_query($this->dbcon, "SELECT * from calibration_list where Category = 'Instrument' and Dep = 'QC';");

        return $Standard;
    }

    public function process_check($database)
    {
        $conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
        $this->dbcon = $conn;
        $db_select = mysqli_select_db($conn, $database);
        $Standard = mysqli_query($this->dbcon, "SELECT * FROM `$database`.`process`ORDER BY id DESC;");

        return $Standard;
    }
    //-----------ตรวจสอบค่า assy หรือ serial ว่ามี่หรือไม่ ใน process main
    public function process_main_chk_assy($database, $process_name, $search)
    {
        $conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
        $this->dbcon = $conn;
        $db_select = mysqli_select_db($conn, $database);
        $Standard = mysqli_query($this->dbcon, "SELECT * FROM `$database`.`$process_name` WHERE assy_no = '$search';");

        return $Standard;
    }

    //------------------ดึง station name ----------------------
    public function get_station_param($database, $station_name)
    {
        $conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
        $this->dbcon = $conn;
        $db_select = mysqli_select_db($conn, $database);
        $Standard = mysqli_query($this->dbcon, "SELECT * FROM `$database`.`station` WHERE id = '$station_name'; ");

        return $Standard;
    }

     //------------------ดึง process name ----------------------
     public function get_process_param($database, $code)
     {
         $conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
         $this->dbcon = $conn;
         $db_select = mysqli_select_db($conn, $database);
         $Standard = mysqli_query($this->dbcon, "SELECT * FROM `$database`.`process` WHERE code = '$code'; ");
 
         return $Standard;
     }

      //------------------ดึง process name ----------------------
      public function get_pd_param($database,$process, $pd,$lot)
      {
          $conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
          $this->dbcon = $conn;
          $db_select = mysqli_select_db($conn, $database);
          $Standard = mysqli_query($this->dbcon, "SELECT * FROM `$database`.`$process` WHERE production_order_no = '$pd' AND lot_no = '$lot' LIMIT 1");
  
          return $Standard;
      }

//------------------ตรวจสอบว่ามีการ repair หรือไม่ ----------------------
      public function get_repiar_detail($database,$search)
      {
          $conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
          $this->dbcon = $conn;
          $db_select = mysqli_select_db($conn, $database);
          $Standard = mysqli_query($this->dbcon, "SELECT T2.code,T1.production_order_no,T1.lot_no,T1.production_order_no_new,T1.lot_no_new,T1.defect_1,T1.defect_2,defect_3,T1.analyzer,T1.action_by,T1.action_need,T1.status,T1.cause_of_defect,T1.create_date FROM `$database`.`repair` T1 LEFT JOIN production_order_no T2 ON T2.production_order_no = T1.production_order_no_new WHERE T1.assy_no = '$search';");
  
          return $Standard;
      }
      public function get_qa_inspec($database,$assy_no)
      {
          $conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
          $this->dbcon = $conn;
          $db_select = mysqli_select_db($conn, $database);
          $Standard = mysqli_query($this->dbcon, "SELECT * FROM `$database`.`qa_inspection`  WHERE assy_no = '$assy_no';");
  
          return $Standard;
      }
      public function get_qa_inspec_2($database,$assy_no,$search)
      {
          $conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
          $this->dbcon = $conn;
          $db_select = mysqli_select_db($conn, $database);
          $Standard = mysqli_query($this->dbcon, "SELECT * FROM `$database`.`qa_inspection`  WHERE assy_no = '$assy_no' OR serial_no = '$search';");
  
          return $Standard;
      }
      public function get_product_assy($database,$search)
      {
          $conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
          $this->dbcon = $conn;
          $db_select = mysqli_select_db($conn, $database);
          $Standard = mysqli_query($this->dbcon, "SELECT assy_no FROM `$database`.`product` WHERE serial_no = '$search' LIMIT 1; ");
  
          return $Standard;
      }

}
