<?php include('partials/menu.php')  ?>
<link rel="stylesheet" href="./css/admin.css">
<div class="main-contant">
    <div class="wrapper">
        <h1>Change Password</h1>
<br><br>
<?php
   // include("partials/dbconn.php");

     if(isset($_GET['id']))
     {
        $id=$_GET['id'];
     }
?>
        <form action="" method="POST">
      <table class="tbl_30">
        <tr>
            <td>Old Password</td>
            <td><input type="text" name="current_pass" placeholder="Enter Old Password"></td>
        </tr>

        <tr>
            <td>New Password</td>
            <td><input type="text" name="new_pass" placeholder=" New Password"></td>
        </tr>

        <tr>
            <td>Confirm Password</td>
            <td><input type="password" name="confirm_pass" placeholder="Confirm password"></td>
        </tr>
      </table>
      
      <tr>
            <td calspan="2">
                <input type="hidden" name="id" value="<?php echo $id ?>">
                <input type="submit" name="submit" value="Change Password" class="btn-secundry"></td>
                <a href="manage-admin.php" class="btn">GO TO HOME</a>;
        </tr>

    </form>
              
     
</div>
 
<?php
   if(isset($_POST['submit']))
   {
     
    $id=$_POST['id'];
    $current_pass=md5($_POST['current_pass']);
    $new_pass=md5($_POST['new_pass']);
    $confirm_pass=md5($_POST['confirm_pass']);


    $sql="SELECT *FROM tbl_admin WHERE id=$id AND password='$current_pass'";
    $res=mysqli_query($conn,$sql);
    if($res==TRUE)
    {
       $count=mysqli_num_rows($res);
       if($count==1)
       {
          if($new_pass==$confirm_pass)
          {
           $sql2="UPDATE tbl_admin SET password='$new_pass' WHERE id=$id";
           $res2=mysqli_query($conn,$sql2);
           if($res2)
           {
            $_SESSION['pass_not_match']="<div class='success'>change password successfully</div>";
            header("location:http://localhost/restorent/w/Admin/manage-admin.php");

           }
           else{
          echo $_SESSION['pass_not_match']="<div class='error'>Query error</div>";
          //  header("location:http://localhost/restorent/w/Admin/manage-admin.php");

           }

          }
          else{
           echo $_SESSION['pass_not_match']="<div class='error'>user not match password</div>";
          //  header("location:http://localhost/restorent/w/Admin/manage-admin.php");

          }




       
       } 
       else{
       echo $_SESSION['not_found']="<div class='error'>user not found</div>";
      //  header("location:http://localhost/restorent/w/Admin/manage-admin.php");

       }
    }
   }


?>



        <?php  include('partials/footer.php') ?>
