<?php include('partials/menu.php') ?>

<div class="main-content">
            <div class="wrapper">
                <h1>Update order</h1>
                    <br><br>
                <?php

                    if(isset($_GET['id']))
                    {

                        // echo "getting the data";
                        $id = $_GET['id'];
                        $sql = "SELECT * FROM tbl_order WHERE id = $id";
                        $res = mysqli_query($conn,$sql);
                        $count = mysqli_num_rows($res);
                        if($count==1)
                        {
                                $row = mysqli_fetch_assoc($res);
                                $food = $row['code'];
                                $price = $row['price'];
                                $qty = $row['qty'];
                                $status = $row['status'];
                                $customer_name = $row['customer_name'];
                                $customer_contact = $row['customer_contact'];
                                $customer_email = $row['customer_email'];
                                $customer_address = $row['customer_address'];
                        }
                        else
                        {
                                $_SESSION['no-category-found'] = "<div class = 'error'>Category not Found.</div>"; 
                                header("Location:".SITEURL.'admin/manage-order.php');
                        }

                    }
                    else
                    {

                         //header("Location:".SITEURL.'admin/manage-order.php');
                     }

                ?>
                <form action="" method="POST">
                        <table class = "tbl-30">
                        <tr>
                            <td>Food Name</td>
                            <td><b><?php echo $food; ?></b></td>
                        
                        </tr>
                        <tr>
                            <td>Price</td>
                            <td><b><?php echo $price; ?></b></td>

                        </tr>
                        <tr>
                            <td>Qty</td>
                            <td>
                                <input type="number" name="qty" value="<?php echo $qty; ?>">
                            </td>
                        
                        </tr>
                        <tr>
                            <td>Status</td>
                            <td>
                                <select name="status">
                                    <option <?php if($status=="Ordered"){echo "selected";}?>value="request">request</option>
                                    <option <?php if($status=="Ordered"){echo "selected";}?>value="approve">approve</option>
                                    <option <?php if($status=="Ordered"){echo "selected";}?>value="complete">complete</option>
                                    <option <?php if($status=="Ordered"){echo "selected";}?>value="Cancel">Cancel</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Customer Name: </td>
                            <td>
                                <input type="text" name="customer_name" value="<?php echo $customer_name; ?>">
                            </td>
                        </tr>
                        <tr>
                            <td>Customer contact: </td>
                            <td>
                                <input type="text" name="customer_contact" value="<?php echo $customer_contact; ?>">
                            </td>
                        </tr>
                        <tr>
                            <td>Customer email: </td>
                            <td>
                                <input type="text" name="customer_email" value="<?php echo $customer_email; ?>">
                            </td>
                        </tr>
                        <tr>
                            <td>Customer_Address: </td>
                            <td>
                                <textarea  name="customer_address" cols="30" rows = "5"><?php echo $customer_address; ?></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <input type="hidden" name="id" value="<?php echo $id; ?>">
                                <input type="hidden" name="price" value="<?php echo $price; ?>">

                                <input type="submit" name="submit" value="Update Order" class="btn-secondary">
                            </td>
                        
                        
                        </tr>
                        </table>
                </form>

<?php

if(isset($_POST['submit']))
{

    $id = $_POST['id'];
    $price = $_POST['price'];
    $qty = $_POST['qty'];
    $total = $qty;
    $status = $_POST['status'];
    $customer_name = $_POST['customer_name'];
    $customer_contact = $_POST['customer_contact'];
    $customer_email = $_POST['customer_email'];
    $customer_address = $_POST['customer_address'];

$sql2 = "UPDATE tbl_order SET
qty = $qty,
total = $total,
status = '$status',
customer_name = '$customer_name',
customer_contact = '$customer_contact',
customer_email = '$customer_email',
customer_address = '$customer_address'
WHERE id = $id
";

    $res2 = mysqli_query($conn,$sql2);
    if($res2==true)
    {
        $_SESSION['update'] = "<div class = 'success'>Order Update Successfully.</div>";
        header("location:".SITEURL.'admin/manage-order.php');
    }
    else
    {
        $_SESSION['update'] = "<div class = 'error'>Failed to Update Order.</div>";
        header("location:".SITEURL.'admin/manage-order.php');
    }

}



?>





            </div>
</div>

<?php include('partials/footer.php') ?>