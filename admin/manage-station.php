<?php include('partials/menu.php') ?>

<div class="main-content">
    <div class="wrapper">
        <h1>manage food</h1>
        <br /><br />
        <a href="<?php echo SITEURL; ?>admin/add-request.php" class="btn-primary">Add food</a>
                <br /><br /><br />

        <?php

                if(isset($_SESSION['add'])) //checking whet
                {
                    echo $_SESSION['add'];
                    unset($_SESSION['add']);
                }
                if(isset($_SESSION['delete'])) //checking whet
                {
                    echo $_SESSION['delete'];
                    unset($_SESSION['delete']);
                }
                if(isset($_SESSION['upload'])) //checking whet
                {
                    echo $_SESSION['upload'];
                    unset($_SESSION['upload']);
                }
                if(isset($_SESSION['unauthorize'])) //checking whet
                {
                    echo $_SESSION['unauthorize'];
                    unset($_SESSION['unauthorize']);
                }
                if(isset($_SESSION['update'])) //checking whet
                {
                    echo $_SESSION['update'];
                    unset($_SESSION['update']);
                }

        ?>






        <table class="tbl-full">
                    <tr>
                        <th>S.N.</th>
                        <th>Title</th>
                        <th>proces Name</th>
                        <th>Image</th>
                        <th>Featured</th>
                        <th>Active</th>
                        <th>Actions</th>
                    </tr>

                    <?php
                        $db_select = mysqli_select_db($conn,'npt-baxter-lvp') ; 
                        $sql = "SELECT * FROM station";

                        $res = mysqli_query($conn,$sql);

                        $count = mysqli_num_rows($res);

                        $SN = 1;

                        if($count>0)
                        {
                            While($row = mysqli_fetch_assoc($res))
                            {
                                $id = $row['id'];
                                $title = $row['title'];
                                $process_name = $row['process_name'];
                                $image_name = $row['image_name'];
                                $featured = $row['featured'];
                                $active = $row['active'];
                                ?>
                                    <tr>
                                        <td><?php echo $SN++; ?></td>
                                        <td><?php echo $title; ?></td>
                                        <td><?php echo $process_name; ?></td>
                                        <td>
                                            <?php 
                                                if($image_name == "")
                                                {
                                                    echo "<div class = 'error'>Image not Added.</div>";
                                                }
                                                else
                                                {
                                                    ?>
                                                    <img src="<?php echo SITEURL; ?>images/food/<?php echo $image_name ?>" width="100px">
                                                    <?php
                                                }
                                                
                                            ?> 
                                        </td>
                                        <td><?php echo $featured; ?> </td>
                                        <td><?php echo $active; ?> </td>
                                        <td> 
                                            <a href="<?php echo SITEURL; ?>admin/update-request.php?id=<?php echo $id; ?>" class="btn-secondary">Update Food</a>
                                            <a href="<?php echo SITEURL; ?>admin/delete-request.php?id=<?php echo $id; ?>&image_name=<?php echo $image_name; ?>" class="btn-danger">Delete Food</a>
                                        </td>

                                    </tr>


                                <?php
                                
                            }
                        }
                        else
                        {
                            echo "<tr><td colspen = '7' class = 'error'> Food not Added Yet. </td></tr>";
                        }


                    ?>

         
                </table>
    </div>
</div>

<?php include('partials/footer.php') ?>