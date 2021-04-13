<?php include('partials/menu.php') ?>

        <!--Menu Content Section Starts -->
        <div class="main-content">
            <div class="wrapper">
                <h1>DASHBOARD</h1>
                <br><br>
                <?php
                    if(isset($_SESSION['login']))
                    {
                        echo $_SESSION['login'];
                        unset($_SESSION['login']);
                    }

                 ?>
                <br><br>

                <div class="col-4 text-center">

                    <?php

                        $db_select = mysqli_select_db($conn,'npt-baxter-lvp') ; 
                        $sql = "SELECT * FROM process WHERE active = 'Y'";
                        $res = mysqli_query($conn,$sql);

                        $count = mysqli_num_rows(($res));

                    ?>
                    <h1><?php echo $count;?></h1>
                    <br />
                    Prcess
                </div>
                <div class="col-4 text-center">
                <?php
                        $sql2 = "SELECT * FROM station";
                        $res2 = mysqli_query($conn,$sql2);

                        $count2 = mysqli_num_rows(($res2));

                    ?>
                    <h1><?php echo $count2 ;?></h1>
                    <br />
                    Station

                </div>
                <div class="col-4 text-center">
                <?php
                        $sql3 = "SELECT * FROM production_order_no WHERE category = 'Mass Pro'";
                        $res3 = mysqli_query($conn,$sql3);

                        $count3 = mysqli_num_rows(($res3));

                    ?>
                    <h1><?php echo $count3 ;?></h1>
                    <br />
                    Production Order
                </div>
                <div class="col-4 text-center">
                <?php
                        $sql4 = "SELECT count(*) as Total FROM product_assy_no WHERE code LIKE '%S072858%' AND status= 'Complete' ";
                        $res4 = mysqli_query($conn,$sql4);

                        $row4 = mysqli_fetch_assoc($res4);

                        $total_revenue = $row4['Total'];

                    ?>
                    <h1><?php echo $total_revenue ;?></h1>
                    <br />
                    Product Complete
                </div>

                
                <div class="clearfix"></div>
            </div>
            
        </div>
        <!--Menu Content Section Ends -->
<?php include('partials/footer.php') ?>