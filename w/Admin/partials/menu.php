<?php  include("partials/dbconn.php");  ?>
<?php   include("partials/check.php"); ?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="../css/admin.css">
</head>
<body>
    <div class="manu text-center">
        <div class="wrapper">
            <ul>
                <li><a href="home.php">Home</a></li>
                <li><a href="manage-admin.php">Admin</a></li>
                <li><a href="manage-category.php">Category</a></li>
                <li><a href="manage-food.php"> Food</a></li>
                <li><a href="manage-order.php">Order</a></li>
                <li><a href="logout.php">LogOut</a></li>

            </ul>
        </div>
    </div>

    <?php 
                   //  echo $_SESSION['user'];

    ?>
