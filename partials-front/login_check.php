<?php

if(!isset($_SESSION['OperatorName']))
{
   // echo $_SESSION['user-not-found'];
   // unset($_SESSION['user-not-found']);  //user-not-found
   $_SESSION['no-login-message'] = "<div class='error>Please login to access Panal.</div>";
   header("Location:".SITEURL.'login.php');
}
?>