<!--<link rel="stylesheet" href="./css/admin.css">  -->$_COOKIE


<?php include('partials/menu.php')  ?>
<link rel="stylesheet" href="./css/admin.css">
<div class="main-contant">
    <div class="wrapper">
        <h1>Upadate Admin</h1>
         <br><br>
        <?php
                // include("partials/dbconn.php");
                 $id=$_GET['id'];
                 echo $id;
                 $query="SELECT * FROM tbl_admin WHERE id=$id";
                 $data=mysqli_query($conn,$query);
                 if($data)
                 {
                    $count=mysqli_num_rows($data);
                    if($count==1)
                    {
                        $row=mysqli_fetch_assoc($data);
                        $fullname=$row['full_name'];
                        $username=$row['username'];
                    }
                    else{
                             header("http://localhost/restorent/w/Admin/manage-admin.php");
                    }
                 }
           ?>
         <form action="" method="POST">
         <table class="tbl_30">
        <tr>
            <td>Full Name</td>
            <td><input type="text" name="full_name" value="<?php echo $fullname  ?>"></td>
        </tr>

        <tr>
            <td>Username</td>
            <td><input type="text" name="username"  value="<?php echo $username  ?>"></td>
        </tr>

        <tr>
            <td calspan="2">
                <input type="hidden" name="id" value="<?php echo $id ?>">
                <input type="submit" name="submit" value="Update Admin" class="btn-secundry"></td>
        </tr>
      </table>
         </form>
    </div>
</div>

<?php
    if(isset($_POST['submit']))
    {
       $id=$_POST['id'];
       $fullname=$_POST['full_name'];
       $username=$_POST['username'];

       $sql="UPDATE `tbl_admin` SET `full_name`='$fullname', `username` ='$username' WHERE `id`=$id";
       $res=mysqli_query($conn,$sql);
       if($res)
       {
       $_SESSION['update']="<div class='success'>Admin Update Successfully</div>";
       
       header("location:http://localhost/restorent/w/Admin/manage-admin.php");
       }
       else{
           $_SESSION['update']="<div class='error'>Admin Not Update Successfully</div>";
       
           header("location:http://localhost/restorent/w/Admin/manage-admin.php");
       }       


    }
?>


<?php  include('partials/footer.php') ?>






