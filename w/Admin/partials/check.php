<?php

   
   if(!isset($_SESSION['user']))
   {
       $_SESSION['no-login-message']="<div class='error'>Pleas Login to Access your Panale</div>";
     //  header("location:http://localhost/restorent/w/Admin/login.php");
         header("location:http://localhost/restorent/w/Admin/login.php");

   }
?>