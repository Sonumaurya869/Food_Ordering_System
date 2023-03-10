<link rel="stylesheet" href="./css/admin.css">
<?php
$id=$_GET['id'];

include("partials/dbconn.php");

$sql="DELETE FROM `tbl_admin` WHERE `id` = $id";
$res= mysqli_query($conn,$sql);
if($res)
{
$_SESSION['delete']="<div class='success'>Admin Delete Successfully</div>";

header("location:http://localhost/restorent/w/Admin/manage-admin.php");
}
else{
    $_SESSION['delete']="<div class='error'>Admin Not Delete Successfully</div>";

    header("location:http://localhost/restorent/w/Admin/manage-admin.php");
       
}

?>