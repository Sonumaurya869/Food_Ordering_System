<?php include('partials/menu.php')  ?>
  <div class="main-content">
          <div class="wrapper">
              <h1> Update Category </h1>
            <br> <br>
          <?php
                if(isset($_GET['id']))
                {   
                    $id=$_GET['id'];
                    $sql="SELECT *FROM tbl_category where id= $id";
                    $res=mysqli_query($conn,$sql);
                    $count=mysqli_num_rows($res);
                    if($count==1)
                    {
                         $row=mysqli_fetch_assoc($res);
                          $title= $row['title'];
                          $current_image= $row['image_name'];
                          $featured=$row['featured'];
                          $active=$row['active'];
                       }
                    else{
                        $_SESSION['no-category-found']="<div class='error'>Category Not Found </div>";
                         header("location:http://localhost/restorent/w/Admin/manage-category.php");
                        }
                }
            else{

                    header("location:http://localhost/restorent/w/Admin/manage-category.php");


                }
          ?>
  <br>
  
            <form action="" method="POST" enctype="multipart/form-data">
            <table class="tbl-full">
                  <tr>
                    <td>Title</td>  
                    <td> <input type="text" name="title" value="<?php echo $title; ?>"></td>  
                  </tr>
                  <tr>
                      <td> Current Image</td>
                      <td>
                          <?php
                            if($current_image != "")
                            {
                                ?>
                             <img src="../images/category/<?php echo $current_image ?>" alt="image" width="100px">

                                <?php
                            }
                            else{
                                echo "<div class='error'>Image Not Added </div>";
                            }
                          ?>
                      </td>
                  </tr>
                  <tr>
                      <td> New Image</td>
                      <td>
                          <input type="file" name="image">
                      </td>
                  </tr>
  
                  <tr>
                    <td>Featured</td>  
                    <td>
                     <input <?php if($featured=="Yes"){echo "checked";}   ?>  type="radio" name="featured" value="yes"> yes
                     <input <?php if($featured=="No"){echo "checked";}   ?> type="radio" name="featured" value="No"> No
  
                  </td>  
                  </tr>
                  <tr>
                    <td>Active:</td>  
                    <td> 
                      <input <?php if($active=="Yes"){echo "checked";}   ?> type="radio" name="active" value="Yes"> Yes
                      <input <?php if($active=="No"){echo "checked";}   ?> type="radio" name="active" value="No"> No
                  </td>  
                  <tr>
                      <td calspan="2">
                        
                          <input type="hidden" name="current_image" value="<?php echo $current_image; ?>">
                          <input type="hidden" name="id" value="<?php echo $id; ?>">

                          <input type="submit" name="submit" value="Update Category" class="btn-secundry">
                      </td>
                  </tr>
  
                  </tr>
              </table>
  
            </form>
  
  </div>
  </div>

  <?php
    if(isset($_POST['submit']))
    {
       $id=$_POST['id'];
       $title=$_POST['title'];
       $current_image=$_POST['current_image'];
       $featured=$_POST['featured'];
       $active=$_POST['active'];

       if(isset($_FILES['image']['name']))
      {
        $image_name= $_FILES['image']['name'];
           if($image_name != "")
          {
              $ext = end(explode('.',$image_name));
              $image_name="Food_category_".rand(000,999).'.'.$ext;
              $path=$_FILES['image']['tmp_name'];

              $destination="../images/category/".$image_name;

              $upload = move_uploaded_file($path,$destination);

              if($upload==false)
              {
                 $_SESSION['upload']="<div class='error'>Img Upload Failed!</div>";
                 header("location:http://localhost/restorent/w/Admin/manage-category.php");
                 die();
              }
              if($current_image!="")
              { 
                
                $remove_path= "../images/category/".$current_image;
                $remove= unlink($remove_path);

                if($remove==false)
                {
                 $_SESSION['fail_remove']="<div class='error'>Fail to remove current image </div>";
                 header("location:http://localhost/restorent/w/Admin/manage-category.php");
                 die();
                }
              }
          }
           else
           {
               $image_name=$current_image;
            }
      }   
      else
     {
        $image_name=$current_image;
     }




      $sql2="UPDATE tbl_category SET title='$title',image_name='$image_name',featured='$featured',active='$active' WHERE id=$id "; 
      
      $res2=mysqli_query($conn,$sql2);
       if($res2)
       {
       $_SESSION['update']="<div class='success'>category Update Successfully</div>";
       
       header("location:http://localhost/restorent/w/Admin/manage-category.php");
       }
       else{
           $_SESSION['update']="<div class='error'>category Not Update Successfully</div>";
       
           header("location:http://localhost/restorent/w/Admin/manage-category.php");
       }       

      
  }
?>







   <?php  include('partials/footer.php') ?>
  
