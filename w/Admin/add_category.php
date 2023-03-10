<?php include('partials/menu.php')  ?>
<div class="main-content">
        <div class="wrapper">
            <h1> Add Category </h1>
          <br> <br>
          <?php
              if(isset($_SESSION['add']))
              {
                echo $_SESSION['add'];
                unset($_SESSION['add']);
              }
              if(isset($_SESSION['upload']))
              {
                echo $_SESSION['upload'];
                unset($_SESSION['upload']);
              }

           ?>
<br>

          <form action="" method="POST" enctype="multipart/form-data">
          <table class="tbl-full">
                <tr>
                  <td>Title:</td>  
                  <td> <input type="text" name="title" placeholder="categoty title"></td>  
                </tr>
                <tr>
                    <td> Select Image</td>
                    <td>
                        <input type="file" name="image">
                    </td>
                </tr>


                <tr>
                  <td>Feature:</td>  
                  <td>
                   <input type="radio" name="featured" value="Yes"> yes
                   <input type="radio" name="featured" value="No"> No

                </td>  
                

                </tr>
                <tr>
                  <td>Active:</td>  
                  <td> 
                    <input type="radio" name="active" value="Yes"> Yes
                    <input type="radio" name="active" value="Yes"> No
                </td>  
                <tr>
                    <td calspan="2">
                        <input type="submit" name="submit" value="Add Category" class="btn-secundry">
                    </td>
                </tr>

                </tr>
            </table>

          </form>

         <?php
             if(isset($_POST['submit']))
             {
                $title=$_POST['title'];

               // print_r($_FILE['image']);
               if(isset($_FILES['image']['name']))
               {
                $image_name=$_FILES['image']['name'];
                
                if($image_name != "")
               {


                $ext = end(explode('.',$image_name));
                $image_name="Food_category_".rand(000,999).'.'.$ext;
                $path=$_FILES['image']['tmp_name'];

                $destination="../images/category/".$image_name;

                $upload=move_uploaded_file($path,$destination);

                if($upload==false)
                {
                    $_SESSION['upload']="<div class='error'>Img Upload Failed!</div>";
                    header("location:http://localhost/restorent/w/Admin/add-category.php");
                    die();
                    
                          
                }
              }
              

               }
               else{
                $image_name="";
               }
               
               


                if(isset($_POST['featured']))
                   {
                    $featured=$_POST['featured'];
                   }
                   else{
                    $featured="No";
                   }
                   if(isset($_POST['active']))
                   {
                    $active=$_POST['active'];
                   }
                   else{
                    $active="No";
                   }

            $sql="INSERT INTO tbl_category SET
                 title='$title',
                 image_name='$image_name',
                 featured='$featured',
                 active='$active'";

            $res=mysqli_query($conn,$sql);

            if($res)
            {
                $_SESSION['add']="<div class='success'>Category Add Successfully</div>";
                header("location:http://localhost/restorent/w/Admin/manage-category.php");
                
            }
            else{
                $_SESSION['add']="<div class='error'>Faild Catecory just try now!</div>";
                header("location:http://localhost/restorent/w/Admin/manage-category.php");
                   
            }



             }
         ?>



</div>
</div>
 <?php  include('partials/footer.php') ?>
