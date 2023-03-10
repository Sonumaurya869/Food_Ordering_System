<?php include('partials/menu.php')  ?>
<link rel="stylesheet" href="./css/admin.css">


<div class="main-content">
   <div class="wrapper">
    <h1> Add-Admin</h1>
     <br><br>
     <?php
           // include("partials/dbconn.php");

             if(isset($_SESSION['add']))
            {

                echo $_SESSION['add'];
                unset($_SESSION['add']);
             }
            ?>
    <form action="" method="POST">
      <table class="tbl_30">
        <tr>
            <td>Full Name</td>
            <td><input type="text" name="full_name" placeholder="Enter your full name"></td>
        </tr>

        <tr>
            <td>Username</td>
            <td><input type="text" name="username" placeholder=" username"></td>
        </tr>

        <tr>
            <td>Password</td>
            <td><input type="password" name="password" placeholder="Enter your password"></td>
        </tr>
      </table>
      
      <tr>
            <td calspan="2"><input type="submit" name="submit" value="Add Admin" class="btn-secundry"></td>
        </tr>

    </form>

   </div>
</div>




<?php  include('partials/footer.php') ?>

<?php
  
if(isset($_POST['submit']))
{
  //  include("partials/dbconn.php");
   $fullname= $_POST['full_name'];
   $username=$_POST['username'];
   $password=md5($_POST['password']);  //encript password

   $qury="INSERT INTO `tbl_admin` (`id`, `full_name`, `username`, `password`) VALUES (NULL, '$fullname', '$username', '$password')";
     $res=mysqli_query($conn,$qury) or die(mysqli_error());   
    if($res==TRUE)
    {
      $_SESSION['add']="<div class='success'>admin Added Successfully</div>";
      header("location:http://localhost/restorent/w/Admin/manage-admin.php");
      }
    else{

        $_SESSION['add']="<div class='error'>admin Added Faild !</div>";
        header("location:http://localhost/restorent/w/Admin/add-admin.php");
    }
    

   // mysqli_close($conn);
}

?>