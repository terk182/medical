<?php
    include('config/constants.php'); 
    session_destroy();
    header("Location:".SITEURL.'login.php');
?>