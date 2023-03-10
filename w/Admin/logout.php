<?php
   include("partials/dbconn.php");
   unset($_SESSION['user']);
   session_destroy();
   header("location:http://localhost/restorent/w/Admin/login.php");

?>