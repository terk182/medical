<?php
    include('../config/constants.php');
    
    
    $id = $_GET['id'];
    $sql = "DELETE FROM tbl_admin WHERE id = $id";
    $res = mysqli_query($conn,$sql);

    if($res== true)
    {
        //echo "admin Deleteed";
        $_SESSION['delete'] = "<div class = 'success'>Admin Deleted Successfully.</div>";
        header("Location:".SITEURL.'admin/manage-admin.php');

    }
    else
    {
        //echo "Failed Deleteed";
        $_SESSION['delete'] = "<div class = 'error'>Failed to Delete Admin. Try Again Later.</div>";
        header("Location:".SITEURL.'admin/manage-admin.php');
    }


?>