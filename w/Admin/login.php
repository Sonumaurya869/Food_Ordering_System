
<?php
    include("partials/dbconn.php");  ?>

<html>
    <head>
        <title>Log IN- FOOD</title>
        <link rel="stylesheet" href="../css/admin.css">

    </head>
    <body>
       <div class="login">
        <h1 class="text-center" >LOGIN</h1>
              <br>
             <?php
              if(isset($_SESSION['login']))
              {
                echo $_SESSION['login'];
                unset ($_SESSION['login']);
              } 
              if(isset($_SESSION['no-login-message']))
                {
                    echo $_SESSION['no-login-message'];
                    unset($_SESSION['no-login-message']);
                }

              ?>
              <br><br>
            <form action="" method="POST"  class="text-center">
             username: <br> <br>
             <input type="text" name="username" placeholder="Enter Username"> <br> <br>
             password:  <br> <br>
             <input type="password" name="password" placeholder="Enter password"> <br> <br><br> <br>
               <input type="submit" value="login" name="submit" class="btn-primary">
            </form>


        <p  class="text-center">Creat By - <a href="#"> Sonu Maurya</a> </p>
       </div> 
    </body>
</html>

<?php

if(isset($_POST['submit']))
{
  $username=$_POST['username'];
  $password=md5($_POST['password']);

    $sql="SELECT *FROM tbl_admin WHERE username='$username' AND password='$password' ";
    $res=mysqli_query($conn,$sql);
    $count=mysqli_num_rows($res);
    if($count==1)
    {
        $_SESSION['login']= "<div class='success text-center'> Login Successfull</div>";
        $_SESSION['user']= $username;
        header("location:http://localhost/restorent/w/Admin/home.php");

    }
    else{
       $_SESSION['login']= "<div class='error texy-center'> Login Failed Try Now ! </div>";
      header("location:http://localhost/restorent/w/Admin/login.php");

    }
}

?>