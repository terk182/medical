<?php
    include('../config/constants.php'); 
    //echo "Delete Food Page";
    if(isset($_GET['id']) && isset($_GET['image_name']))
    {
        //echo "Process to delete";

        $id = $_GET['id'];
        $image_name = $_GET['image_name'];


        if($image_name != "")
        {
            $path = "../images/food/".$image_name;

            $remove = unlink($path);

            if($remove==false)
            {
                $_SESSION['upload'] = "<div class = 'error'>Failed to Remove Image File.</div>";
                header("Location:".SITEURL.'admin/manage-request.php');
                die();
            }

        }

        $sql = "DELETE FROM tbl_process WHERE id = $id";

        $res = mysqli_query($conn,$sql);

        if($res==true)
        {
            $_SESSION['delete'] = "<div class = 'success'>Food Deleted Successfully.</div>";
            header("Location:".SITEURL.'admin/manage-request.php');

        }
        else
        {
            $_SESSION['delete'] = "<div class = 'error'>Failed to Delete Food.</div>";
            header("Location:".SITEURL.'admin/manage-request.php');
        }

    } 
    else
    {
        //echo "Redirect";
        $_SESSION['unauthorize'] = "<div class = 'error'>Unauthorized Access.</div>";
        header("Location:".SITEURL.'admin/manage-request.php');
    }

?>
