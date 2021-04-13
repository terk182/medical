<?php include('partials/menu.php') ?>
        <!--Menu Content Section Starts -->
        <div>
            <div class="wrapper">
                <h1>Manage user</h1>
                <br /><br />


                <?php
                    if(isset($_SESSION['add']))
                    {
                        echo $_SESSION['add'];
                        unset($_SESSION['add']);
                    }
                    if(isset($_SESSION['delete']))
                    {
                        echo $_SESSION['delete'];
                        unset($_SESSION['delete']);
                    }
                    if(isset($_SESSION['update']))
                    {
                        echo $_SESSION['update'];
                        unset($_SESSION['update']);
                    }
                    if(isset($_SESSION['user-not-found']))
                    {
                        echo $_SESSION['user-not-found'];
                        unset($_SESSION['user-not-found']);  //user-not-found
                    }
                    if(isset($_SESSION['pwd-not-match']))
                    {
                        echo $_SESSION['pwd-not-match'];
                        unset($_SESSION['pwd-not-match']);  //user-not-found
                    }
                    if(isset($_SESSION['change-pwd']))
                    {
                        echo $_SESSION['change-pwd'];
                        unset($_SESSION['change-pwd']);  //user-not-found
                    }
                ?>
                 <br>   <br>  <br>  
                <a href="add-admin.php" class="btn-primary">add operator</a>
                <br /><br /><br />
                <table class="tbl-full">
                    <tr>
                        <th>S.N.</th>
                        <th>Name</th>
                        <th>ID</th>
                        <th>Class</th>
                        <th>Active</th>
                        <th>Password</th>
                        <th>Actions</th>
                    </tr>

                    <?php
                        $db_select = mysqli_select_db($conn,'npt') ; 
                        $sql = "SELECT * FROM operator";
                        $res = mysqli_query($conn,$sql);

                        if($res == TRUE)
                        {
                            $count = mysqli_num_rows($res);

                            $sn = 1;

                            if($count > 0)
                            {
                                while($row=mysqli_fetch_assoc($res))
                                {
                                    $id = $row['id'];
                                    $OperatorName = $row['OperatorName'];
                                    $OperatorID = $row['OperatorID'];
                                    $Class = $row['Class'];
                                    $active = $row['active'];
                                    $Password = $row['Password'];
                                    ?>
                                        <tr>
                                            <td><?php echo $sn++; ?> </td>
                                            <td><?php echo $OperatorName; ?> </td>
                                            <td><?php echo $OperatorID; ?></td>
                                            <td><?php echo $Class; ?></td>
                                            <td><?php echo $active; ?></td>
                                            <td><?php echo $Password; ?></td>
                                            <td> 
                                            <a href="<?php echo SITEURL;?>admin/update-password.php?id=<?php echo $id; ?>" class="btn-primary">change</a>
                                            <a href="<?php echo SITEURL;?>admin/update-admin.php?id=<?php echo $id; ?> " class="btn-secondary">Update</a>
                                            <a href="<?php echo SITEURL;?>admin/delete-admin.php?id=<?php echo $id; ?> " class="btn-danger">Delete</a>
                        </td>

                    </tr>


                                    <?php




                                }
                            }
                            else
                            {

                            }
                        }

                    ?>

                </table>
            </div>
        </div>
        <!--Menu Content Section Ends -->
<?php include('partials/footer.php') ?>