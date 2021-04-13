<?php

if(!isset($_SESSION['user']))
{
   // echo $_SESSION['user-not-found'];
   // unset($_SESSION['user-not-found']);  //user-not-found
   $_SESSION['no-login-message'] = "<div class='error>Please login to access admin Panal.</div>";
   header("Location:".SITEURL.'admin/login.php');
}
?>