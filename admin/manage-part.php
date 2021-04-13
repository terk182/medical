<?php include('partials/menu.php') ?>
        <!--Menu Content Section Starts -->
        <div class="main-content">
            <div class="wrapper">
                <h1>Manage order</h1>
                <br /><br />
                <a href="#" class="btn-primary">add order</a>
                <br /><br /><br />

                <?php
                    if(isset($_SESSION['update']))
                    {
                        echo $_SESSION['update'];
                        unset($_SESSION['update']);

                    }

                ?>
        <table class="tbl-full">
                    <tr>
                        <th>S.N.</th>
                        <th>food</th>
                        <th>price</th>
                        <th>Qty</th>
                        <th>Total</th>
                        <th>Order date</th>
                        <th>Status</th>
                        <th>Customer_name</th>
                        <th>contact</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>Actions</th>
                        <th>detail</th>
                    </tr>
                    <?php

                        $sql = "SELECT * FROM tbl_order ORDER BY id DESC";

                        $res = mysqli_query($conn,$sql);

                        $count = mysqli_num_rows($res);

                        $sn = 1;
                        if($count>0)
                        {

                            while($row = mysqli_fetch_assoc($res))
                            {
                                $id = $row['id'];
                                $food = $row['code'];
                                $price = $row['price'];
                                $qty = $row['qty'];
                                $total = $row['total'];
                                $order_date = $row['request_date'];
                                $status = $row['status'];
                                $customer_name = $row['customer_name'];
                                $customer_contact = $row['customer_contact'];
                                $customer_email = $row['customer_email'];
                                $customer_address = $row['customer_address'];
                                $detail = $row['detail'];

                                ?>

                                    <tr>
                                            <td><?php echo $sn++; ?></td>
                                            <td><?php echo $food; ?></td>
                                            <td><?php echo $price; ?></td>
                                            <td><?php echo $qty; ?></td>
                                            <td><?php echo $total; ?></td>
                                            <td><?php echo $order_date; ?></td>
                                            
                                            <td>
                                                <?php 
                                                    if($status=="request") 
                                                    {
                                                        echo "<label>$status</Label>";
                                                    }
                                                    elseif($status=="approve")
                                                    {
                                                        echo "<label style = 'color: orange;'>$status</Label>";
                                                    }
                                                    elseif($status=="complete")
                                                    {
                                                        echo "<label style = 'color: green;'>$status</Label>";
                                                    }
                                                    elseif($status=="Cancel")
                                                    {
                                                        echo "<label style = 'color: red;'>$status</Label>";
                                                    }
                                                ?>
                                            </td>

                                            <td><?php echo $customer_name; ?></td>
                                            <td><?php echo $customer_contact; ?></td>
                                            <td><?php echo $customer_email; ?></td>
                                            <td><?php echo $customer_address; ?></td>
                                            <td><?php echo $detail; ?></td>
                                            <td> 
                                                <a href="<?php echo SITEURL; ?>admin/update-order.php?id=<?php echo $id; ?>" class="btn-secondary">Update Order</a>
                                            
                                            </td>

                                     </tr>

                                <?php

                            }

                        }
                        else
                        {
                                echo "<tr><td colspan = '12' class = 'error'>Order not Available</td><tr>";

                        }

                     ?>

                   
                </table>

            </div>
            
        </div>
        <!--Menu Content Section Ends -->
<?php include('partials/footer.php') ?>