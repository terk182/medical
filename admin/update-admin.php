<?php include('partials/menu.php') ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Update Admin</h1>
        <br><br>
        <?php
            $id = $_GET['id'];
            $sql = "SELECT * FROM tbl_admin WHERE id = $id";
            $res = mysqli_query($conn,$sql);

            if($res==true)
            {
                $count = mysqli_num_rows($res);
                if($count==1)
                {
                   // echo "admin Available";
                   $row=mysqli_fetch_assoc($res);
                   $full_name = $row['full_name'];
                   $usrname = $row['username'];
                }
                else
                {
                    header("Location:".SITEURL.'admin/manage-admin.php');
                }
            }





        ?>
        <form action="" method="POST">
            <Table class="tbl-30">
                <tr>
                    <td>FULL Name</td>
                    <td>
                        <input type="text" name="full_name" value="<?php echo $full_name; ?>">
                    </td>
                </tr>
                <tr>
                    <td>UserName</td>
                    <td>
                        <input type="text" name="username" value="<?php echo $usrname; ?>">
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="submit" name="submit" value="update Admin" class="btn-secondary">
                    </td>
                </tr>

            </Table>
        </form>
    </div>

</div>

<?php
    if(isset($_POST['submit']))
    {
       // echo "Button Clicked";
       $id = $_POST['id'];
       $full_name = $_POST['full_name'];
       $usrname = $_POST['username'];

       $sql = "UPDATE tbl_admin SET
       full_name = '$full_name',
       username = '$usrname'
       WHERE id = '$id'"
       ;

       $res = mysqli_query($conn,$sql);

       if($res== true)
    {
        //echo "admin Deleteed";
        $_SESSION['update'] = "<div class = 'success'>Admin Update Successfully.</div>";
        header("Location:".SITEURL.'admin/manage-admin.php');

    }
    else
    {
        //echo "Failed Deleteed";
        $_SESSION['update'] = "<div class = 'error'>Failed to Update Admin. Try Again Later.</div>";
        header("Location:".SITEURL.'admin/manage-admin.php');
    }


    }
?>

<?php include('partials/footer.php') ?>