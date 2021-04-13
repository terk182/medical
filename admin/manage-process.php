<?php include('partials/menu.php') ?>

<div>
    <div class="wrapper">
        <h1>manage process</h1>
        <br /><br />

        <?php
                    if(isset($_SESSION['add'])) //checking whet
                    {
                        echo $_SESSION['add'];
                        unset($_SESSION['add']);
                    }
                    if(isset($_SESSION['remove'])) //checking whet
                    {
                        echo $_SESSION['remove'];
                        unset($_SESSION['remove']);
                    }
                    if(isset($_SESSION['detete'])) //checking whet
                    {
                        echo $_SESSION['detete'];
                        unset($_SESSION['detete']);
                    }
                    if(isset($_SESSION['no-category-found'])) //checking whet
                    {
                        echo $_SESSION['no-category-found'];
                        unset($_SESSION['no-category-found']);
                    }
                    if(isset($_SESSION['update'])) //checking whet
                    {
                        echo $_SESSION['update'];
                        unset($_SESSION['update']);
                    }
                    if(isset($_SESSION['upload'])) //checking whet
                    {
                        echo $_SESSION['upload'];
                        unset($_SESSION['upload']);
                    }
                    if(isset($_SESSION['failed-remove'])) //checking whet
                    {
                        echo $_SESSION['failed-remove'];
                        unset($_SESSION['failed-remove']);
                    }
                ?>

        <br><br>

        
        <a href="<?php echo SITEURL; ?>admin/add-category.php" class="btn-primary">add process</a>
                <br /><br /><br />
        <table> 
        <thead>
                    <tr>
                        <th>S.N.</th>
                        <th>process_name</th>
                        <th>process_type</th>
                        <th>process_table</th>
                        <th>code</th>
                        <th>code_rev</th>
                        <th>wi_no</th>
                        <th>wi_revision</th>
                        <th>wi_effective_date</th>
                        <th>record_no</th>
                        <th>record_effective_date</th>
                        <th>baxter_code</th>
                        <th>group_process</th>
                        <th>baxter code</th>
                        <th>active</th>
                        <th>Edit</th>
                    </tr>
                    </thead>

                    <?php
                        $db_select = mysqli_select_db($conn,'npt-baxter-lvp') ; 
                        $sql = "SELECT * FROM process";

                        $res = mysqli_query($conn,$sql);

                        $count = mysqli_num_rows($res);

                        $sn = 1;

                        if($count>0)
                        {
                            
                            while($row = mysqli_fetch_assoc($res))
                            {
                                $id = $row['id'];
                                $process_name = $row['process_name'];
                                $process_type = $row['process_type'];
                                $process_table = $row['process_table'];
                                $code = $row['code'];
                                $code_rev = $row['code_rev'];
                                $wi_no = $row['wi_no'];
                                $wi_revision = $row['wi_revision'];
                                $wi_effective_date = $row['wi_effective_date'];
                                $record_no = $row['record_no'];
                                $record_revision = $row['record_revision'];
                                $record_effective_date = $row['record_effective_date'];
                                $group_process = $row['group_process'];
                                $baxter_code = $row['baxter_code'];
                                $active = $row['active'];
                                
                                ?>
                                <tbody>
                                    <tr>
                                        <td><?php echo $sn++;?></td>
                                        <td><?php echo $process_name;?> </td>
                                        <td><?php echo $process_type;?> </td>
                                        <td><?php echo $process_table;?> </td>
                                        <td><?php echo $code;?> </td>
                                        <td><?php echo $code_rev;?> </td>
                                        <td><?php echo $wi_no;?> </td>
                                        <td><?php echo $wi_revision;?> </td>
                                        <td><?php echo $wi_effective_date;?> </td>
                                        <td><?php echo $record_no;?></td>
                                        <td><?php echo $record_revision;?></td>
                                        <td><?php echo $record_effective_date;?></td>
                                        <td><?php echo $group_process;?></td>

                                        
                                        <td><?php echo $baxter_code;?></td>
                                        <td><?php echo $active;?></td>
                                        <td> 
                                                <a href="<?php echo SITEURL; ?>admin/update-category.php?id=<?php echo $id; ?>"class="btn-secondary">Update Category</a>
                                                <a href="<?php echo SITEURL; ?>admin/delete-category.php?id=<?php echo $id; ?>&image_name=<?php echo $image_name; ?>"class="btn-danger">Delete Category</a>
                                        </td>

                                     </tr>    
                                     </tbody>
                                <?php


                            }
                        }
                        else
                        {
                            ?>
                            <tr>
                            <td colspan="6"><div class = "errer">No Category Added</div></td>
                            </tr>

                            <?php
                        }







                    ?>
 
            
                </table>
    </div>
</div>

<?php include('partials/footer.php') ?>