<link rel="stylesheet" href="./css/admin.css">
<?php
$id=$_GET['id'];

include("partials/dbconn.php");

if(isset($_GET['id']) AND isset($_GET['image_name']))
{
    $id=$_GET['id'];
    $image_name=$_GET['image_name'];

    if($image_name !="")
    {
        $path="../images/food/".$image_name;
        $remove = unlink($path);

        if($remove==false)
        {
            $_SESSION['remove']="<div class='error'>Failed Remove Successfully</div>";
            header("location:http://localhost/restorent/w/Admin/manage-food.php");

            die();
        }
    }
                $sql="DELETE FROM `tbl_food` WHERE `id` = $id";
                $res= mysqli_query($conn,$sql);
     if($res)
       {
      $_SESSION['delete']="<div class='success'>Food Delete Successfully</div>";

      header("location:http://localhost/restorent/w/Admin/manage-food.php");
       }
       else{
         $_SESSION['delete']="<div class='error'>Food Not Deleted</div>";

         header("location:http://localhost/restorent/w/Admin/manage-food.php");
       
        }

}
else{
    header("location:http://localhost/restorent/w/Admin/manage-food.php");
   
}






?>