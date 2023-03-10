<?php include('partials/menu.php')  ?>
<link rel="stylesheet" href="./css/admin.css">



    <!--Main section start-->
    <div class="main-content">
        <div class="wrapper">
        <h4 class="user">RAVI SINH</h4>     

            <h1> Manage Admin </h1>
            <br>
            <?php
           // include("partials/dbconn.php");
 
             if(isset($_SESSION['add']))
            {

                echo $_SESSION['add'];
                unset($_SESSION['add']);
             }
             if(isset($_SESSION['delete']))
             {
 
                 echo $_SESSION['delete'];
                 unset($_SESSION['delete']);
              }
              if(isset($_SESSION['update']))
             {
 
                 echo $_SESSION['update'];
                 unset($_SESSION['update']);
              }
              if(isset($_SESSION['not_found']))
             {
 
                 echo $_SESSION['not_found'];
                 unset($_SESSION['not_found']);
              }
              if(isset($_SESSION['pass_not_match']))
              {
  
                  echo $_SESSION['pass_not_match'];
                  unset($_SESSION['pass_not_match']);
               }
            ?>
            <br><br>
            <!--Button-->
            <a href="add-admin.php" class="btn-primary">Add Admin</a>
              <br><br><br>
            <table class="tbl-full">
                <tr>
                  <th>S.N.</th>  
                  <th>Full Name</th>  
                  <th>Username</th>  
                  <th>Actions</th>  

                </tr>
              <?php
                $sql="SELECT * FROM tbl_admin";
                $res=mysqli_query($conn,$sql);
                if($res==TRUE)
                {
                   $count= mysqli_num_rows($res);
                   $sn=1;
                   if($count>0){
                   while($row=mysqli_fetch_assoc($res))
                     {
                        $id=$row['id'];
                        $fullname=$row['full_name'];

                        $username=$row['username'];
                       ?>
                        <tr>
                        <td><?php echo $sn++;  ?>.</td>
                        <td><?php echo $fullname ?></td>
                        <td><?php echo $username ?></td>
                        <td>
                        <a href="change_pass.php?id=<?php echo $id ?>" class="btn-primary">ChangePassword</a>

                        <a href="update-admin.php?id=<?php echo $id ?>" class="btn-secundry">Update Admin</a>
    
                        <a href="delete-admin.php?id=<?php echo $id ?> " class="btn-denger">Delete Admin</a>
    
                        </td>
                    </tr>

                    
                
        <?php } } } ?>

                
               
            </table>
            
        </div>
    </div>


    <?php  include('partials/footer.php') ?>


   